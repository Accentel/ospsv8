<?php
use PhpOffice\PhpSpreadsheet\IOFactory;

include 'vendor/autoload.php'; // Adjust the path to autoload.php as needed

include('dbconnection/connection.php');

if (isset($_POST['submit'])) {
    $lname = $_POST['lname'];
    $cat = $_POST['cat'];
    $user = $_POST['user'];

    // Insert into goabill table
    $q = "INSERT INTO goabill (location, cat, user) VALUES ('$lname', '$cat', '$user')";
    $r = mysqli_query($link, $q) or die(mysqli_error($link));
    $rid = mysqli_insert_id($link);

    $uploadFilePath = 'uploadbilling/goa/' . basename($_FILES['file']['name']);
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

            $line = isset($rowData[0]) ? $rowData[0] : '';
            $desc = isset($rowData[1]) ? $rowData[1] : '';
            $uom = isset($rowData[2]) ? $rowData[2] : '';
            $price = isset($rowData[3]) ? $rowData[3] : '';
            $qty = isset($rowData[4]) ? $rowData[4] : '';
            $amount = isset($rowData[5]) ? $rowData[5] : '';

            $html .= "<tr>";
            $html .= "<td>$line</td>";
            $html .= "<td>$desc</td>";
            $html .= "<td>$uom</td>";
            $html .= "<td>$price</td>";
            $html .= "<td>$qty</td>";
            $html .= "<td>$amount</td>";
            $html .= "</tr>";

            if ($line != "Line" && $line != "") {
                $query = "INSERT INTO goabill1 (line, itemdesc, uom, price, qty, amount, id1)
                          VALUES ('$line', '" . addslashes($desc) . "', '" . addslashes($uom) . "', '$price', '$qty', '$amount', '$rid')";
                $res = mysqli_query($link, $query) or die(mysqli_error($link));
            }
        }
    }

    $html .= "</table>";

    if ($res) {
        echo "<br />Data Inserted in database";
        echo "<script>";
        echo "alert('Successfully Registered ');";
        echo "self.location='goabill1.php?id=$rid';";
        echo "</script>";
    }
} else {
    die("<br/>Sorry, File type is not allowed. Only Excel file.");
}
?>
