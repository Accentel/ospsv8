<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

include('dbconnection/connection.php');

if (isset($_POST['submit'])) {
    // Define allowed file types
    $allowedTypes = ['Xlsx', 'Xls', 'Ods'];

    // Check if uploaded file type is allowed
    $inputFileName = $_FILES["file"]["tmp_name"];
    $spreadsheetType = IOFactory::identify($inputFileName);
    if (in_array($spreadsheetType, $allowedTypes)) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $lname = $_POST['lname'];

        $uploadFilePath = 'uploaddpr/kn/' . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

        $spreadsheet = IOFactory::load($uploadFilePath);

        $totalSheet = $spreadsheet->getSheetCount();

        echo "You have total " . $totalSheet . " sheets";

        $html = "<table border='1'>";
        $html .= "<tr><th>Title</th><th>Description</th></tr>";

        /* For Loop for all sheets */
        for ($i = 0; $i < $totalSheet; $i++) {
            $spreadsheet->setActiveSheetIndex($i);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            foreach ($sheetData as $Row) {
                $html .= "<tr>";
                /* Check If sheet not empty */
                $req_ref = isset($Row['A']) ? $Row['A'] : '';
                $site_name = isset($Row['B']) ? $Row['B'] : '';
                $district = isset($Row['C']) ? $Row['C'] : '';
                $state = isset($Row['D']) ? $Row['D'] : '';
                $indus_id = isset($Row['E']) ? $Row['E'] : '';
                $seeking_id = isset($Row['F']) ? $Row['F'] : '';
                $seeking_opt = isset($Row['G']) ? $Row['G'] : '';
                $po_num = isset($Row['H']) ? $Row['H'] : '';
                $allocation_date1 = isset($Row['I']) ? $Row['I'] : '';
                $comp_date1 = isset($Row['J']) ? $Row['J'] : '';
                $sitetype = isset($Row['K']) ? $Row['K'] : '';

                $html .= "<td>" . $i . "</td>";
                $html .= "<td>" . $req_ref . "</td>";
                $html .= "<td>" . $site_name . "</td>";
                $html .= "<td>" . $district . "</td>";
                $html .= "<td>" . $state . "</td>";
                $html .= "<td>" . $indus_id . "</td>";
                $html .= "<td>" . $seeking_id . "</td>";
                $html .= "<td>" . $seeking_opt . "</td>";
                $html .= "<td>" . $po_num . "</td>";
                $html .= "<td>" . $allocation_date1 . "</td>";
                $html .= "</tr>";

                $allocation_date = date("Y-m-d", strtotime($allocation_date1));
                $comp_date = date("Y-m-d", strtotime($comp_date1));

                $q = "SELECT * FROM krefferences WHERE location='$lname' AND indus_id='$indus_id' AND req_ref='$req_ref'";
                $p = mysqli_query($link, $q) or die(mysqli_error($link));
                $r = mysqli_fetch_array($p);

                if (!$r) {
                    if ($district != "Dist") {
                        $query = "INSERT INTO krefferences(`req_ref`, `site_name`, `district`, `state`, `indus_id`, `seeking_id`, `seeking_opt`, `po_num`, `allocation_date`, `location`, `comp_date`, `sitetype`)
                            VALUES('$req_ref', '$site_name', '$district', '$state', '$indus_id', '$seeking_id', '$seeking_opt', '$po_num', '$allocation_date', '$lname', '$comp_date', '$sitetype')";
                        $link->query($query);
                    }
                } else {
                    $m = "UPDATE krefferences SET `site_name`='" . addslashes($site_name) . "', `district`='$district', `state`='$state', `seeking_id`='$seeking_id', `po_num`='$po_num', `allocation_date`='$allocation_date', `comp_date`='$comp_date', `sitetype`='$sitetype' WHERE `indus_id`='$indus_id' AND `sitetype`='$sitetype' AND `location`='$lname' AND `req_ref`='$req_ref'";
                    $link->query($m);
                }
            }
        }

        $html .= "</table>";

        echo $html;

        // Provide feedback to the user
        echo "<br />Data Inserted in database";
    } else {
        die("<br/>Sorry, File type is not allowed. Only Excel file.");
    }
}
?>
