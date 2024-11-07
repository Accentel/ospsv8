<?php
use PhpOffice\PhpSpreadsheet\IOFactory;

include 'vendor/autoload.php'; // Adjust the path to autoload.php as needed

include('dbconnection/connection.php');

if (isset($_POST['submit'])) {
    $lname = $_POST['lname'];
    $uploadFilePath = 'uploaddpr/goa/' . basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

    $spreadsheet = IOFactory::load($uploadFilePath);
    $totalSheet = $spreadsheet->getSheetCount();

    echo "You have total $totalSheet sheets";

    $html = "<table border='1'>";
    $html .= "<tr><th>Title</th><th>Description</th></tr>";

    for ($i = 0; $i < $totalSheet; $i++) {
        $sheet = $spreadsheet->getSheet($i);
        foreach ($sheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE); // Loop through all cells, even if they're empty
            $rowData = [];

            foreach ($cellIterator as $cell) {
                $rowData[] = $cell->getValue();
            }

            $req_ref = isset($rowData[0]) ? $rowData[0] : '';
            $site_name = isset($rowData[1]) ? $rowData[1] : '';
            $district = isset($rowData[2]) ? $rowData[2] : '';
            $state = isset($rowData[3]) ? $rowData[3] : '';
            $indus_id = isset($rowData[4]) ? $rowData[4] : '';
            $seeking_id = isset($rowData[5]) ? $rowData[5] : '';
            $seeking_opt = isset($rowData[6]) ? $rowData[6] : '';
            $po_num = isset($rowData[7]) ? $rowData[7] : '';
            $allocation_date1 = isset($rowData[8]) ? $rowData[8] : '';
            $comp_date1 = isset($rowData[9]) ? $rowData[9] : '';
            $sitetype = isset($rowData[10]) ? $rowData[10] : '';

            $html .= "<tr>";
            $html .= "<td>$i</td>";
            $html .= "<td>$req_ref</td>";
            $html .= "<td>$site_name</td>";
            $html .= "<td>$district</td>";
            $html .= "<td>$state</td>";
            $html .= "<td>$indus_id</td>";
            $html .= "<td>$seeking_id</td>";
            $html .= "<td>$seeking_opt</td>";
            $html .= "<td>$po_num</td>";
            $html .= "<td>$allocation_date1</td>";
            $html .= "</tr>";

            $allocation_date = $allocation_date1 ? date("Y-m-d", strtotime($allocation_date1)) : null;
            $comp_date = $comp_date1 ? date("Y-m-d", strtotime($comp_date1)) : null;

            $q = "SELECT * FROM goarefferences WHERE location='$lname' AND indus_id='$indus_id' AND req_ref='$req_ref'";
            $p = mysqli_query($link, $q) or die(mysqli_error($link));
            $r = mysqli_fetch_array($p);

            if (!$r) {
                $query = "INSERT INTO goarefferences(`req_ref`, `site_name`, `district`, `state`, `indus_id`, `seeking_id`, `seeking_opt`, `po_num`, `allocation_date`, `location`, `comp_date`, `sitetype`) 
                          VALUES ('$req_ref','$site_name','$district','$state','$indus_id','$seeking_id','$seeking_opt','$po_num','$allocation_date','$lname','$comp_date','$sitetype')";
                mysqli_query($link, $query);
            } else {
                $m = "UPDATE goarefferences SET site_name = '" . addslashes($site_name) . "', district='$district', state='$state', seeking_id='$seeking_id', po_num='$po_num', 
                      allocation_date='$allocation_date', comp_date='$comp_date', sitetype='$sitetype' WHERE indus_id='$indus_id' AND sitetype='$sitetype' 
                      AND location='$lname' AND req_ref='$req_ref'";
                mysqli_query($link, $m);
            }
        }
    }

    $html .= "</table>";
    echo $html;

    if ($p) {
        echo "<script>";
        echo "alert('Successfully Registered ');";
        echo "self.location='goarefferno.php';";
        echo "</script>";
    }
} else {
    die("<br/>Sorry, File type is not allowed. Only Excel file.");
}
?>
