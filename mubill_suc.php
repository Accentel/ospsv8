<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include('dbconnection/connection.php');

if (isset($_POST['submit'])) {
    // Define allowed file types
    $allowedTypes = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.oasis.opendocument.spreadsheet'];

    // Check if uploaded file type is allowed
    if (in_array($_FILES["file"]["type"], $allowedTypes)) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $lname = $_POST['lname'];
        $user = $_POST['user'];
        $q = "insert into mubill (location,user) values('$lname','$user')";
        $r = mysqli_query($link, $q) or die(mysqli_error($link));
        $rid = mysqli_insert_id($link);

        $uploadFilePath = 'uploadbilling/mh/' . basename($_FILES['file']['name']);
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
                $line = isset($Row[0]) ? $Row[0] : '';
                $desc = isset($Row[1]) ? $Row[1] : '';
                $uom = isset($Row[2]) ? $Row[2] : '';
                $price = isset($Row[3]) ? $Row[3] : '';
                $qty = isset($Row[4]) ? $Row[4] : '';
                $amount = isset($Row[5]) ? $Row[5] : '';

                $html .= "<td>" . $i . "</td>";
                $html .= "<td>" . $line . "</td>";
                $html .= "<td>" . $desc . "</td>";
                $html .= "<td>" . $uom . "</td>";
                $html .= "<td>" . $price . "</td>";
                $html .= "<td>" . $qty . "</td>";
                $html .= "<td>" . $amount . "</td>";
                $html .= "</tr>";

                if ($line != "Line" && $line != "") {
                    $query = "insert into mubill1(line,itemdesc,uom,price,qty,amount,id1)
                                values('" . $line . "','" . addslashes($desc) . "','" . addslashes($uom) . "','" . $price . "','" . $qty . "','" . $amount . "','" . $rid . "')";
                    $res = mysqli_query($link, $query) or die(mysqli_error($link));
                }
            }
        }

        $html .= "</table>";

        if ($res) {
            echo "<br />Data Inserted in database";
            print "<script>";
            print "alert('Successfully Registred ');";
            print "self.location='mbill1.php?id=$rid';";
            print "</script>";
        }
    } else {
        die("<br/>Sorry, File type is not allowed. Only Excel file.");
    }
}

?>
