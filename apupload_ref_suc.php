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
        ini_set('max_execution_time', 300);
        error_reporting(E_ALL);

        $lname = $_POST['lname'];

        $uploadFilePath = 'uploaddpr/ap/' . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

        $spreadsheet = IOFactory::load($uploadFilePath);

        $totalSheet = $spreadsheet->getSheetCount();

        echo "You have total " . $totalSheet . " sheets";

        $html = "<table border='1'>";
        $html .= "<tr><th>Title</th><th>Description</th></tr>";

        /* For Loop for all sheets */
        for ($i = 0; $i < $totalSheet; $i++) {
            $sheet = $spreadsheet->getSheet($i);
            $sheetData = $sheet->toArray();

            foreach ($sheetData as $Row) {
                $html .= "<tr>";
                /* Check If sheet not empty */
                $req_ref = isset($Row[0]) ? $Row[0] : '';
                $site_name = isset($Row[1]) ? $Row[1] : '';
                $district = isset($Row[2]) ? $Row[2] : '';
                $state = isset($Row[3]) ? $Row[3] : '';
                $indus_id = isset($Row[4]) ? $Row[4] : '';
                $seeking_id = isset($Row[5]) ? $Row[5] : '';
                $seeking_opt = isset($Row[6]) ? $Row[6] : '';
                $po_num = isset($Row[7]) ? $Row[7] : '';
                $allocation_date1 = isset($Row[8]) ? $Row[8] : '';
                $comp_date1 = isset($Row[9]) ? $Row[9] : '';
                $sitetype = isset($Row[10]) ? $Row[10] : '';

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

                $q = "SELECT * FROM aprefferences WHERE location='$lname' AND indus_id='$indus_id' AND req_ref='$req_ref'";
                $p = mysqli_query($link, $q) or die(mysqli_error($link));
                $r = mysqli_fetch_array($p);

                if (!$r) {
                    if ($district != "Dist") {
                        $query = "INSERT INTO aprefferences(req_ref, site_name, district, state, indus_id, seeking_id, seeking_opt, po_num, allocation_date, location, comp_date, sitetype)
                            VALUES ('$req_ref', '$site_name', '$district', '$state', '$indus_id', '$seeking_id', '$seeking_opt', '$po_num', '$allocation_date', '$lname', '$comp_date', '$sitetype')";
                        $link->query($query);
                    }
                } else {
                    $m = "UPDATE aprefferences SET site_name ='" . addslashes($site_name) . "', district='$district', state='$state', seeking_id='$seeking_id', po_num='$po_num', allocation_date='$allocation_date', comp_date='$comp_date', sitetype='$sitetype' WHERE indus_id='$indus_id' AND sitetype='" . addslashes($r['sitetype']) . "' AND location='$lname' AND req_ref='" . addslashes($r['req_ref']) . "'";
                    $link->query($m);
                }
            }
        }

        $html .= "</table>";

        echo $html;

        // Provide feedback to the user
        echo "<br />Data Inserted in database";
        // echo "<script>alert('Successfully Registered '); window.location='andhrarefferno.php';</script>";
    } else {
        die("<br/>Sorry, File type is not allowed. Only Excel file.");
    }
}
?>
