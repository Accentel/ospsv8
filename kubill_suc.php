<?php
//include('config.php');
include('dbconnection/connection.php');
require('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['submit'])) {
    $mimes = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.oasis.opendocument.spreadsheet'];
    if (in_array($_FILES["file"]["type"], $mimes)) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        
        $lname = $_POST['lname'];
        $cat = $_POST['cat'];
        $user = $_POST['user'];

        // Insert data into 'kubill' table
        $q = "INSERT INTO kubill (location, cat, user) VALUES ('$lname', '$cat', '$user')";
        $r = mysqli_query($link, $q) or die(mysqli_error($link));
        $rid = mysqli_insert_id($link);

        $uploadFilePath = 'uploadbilling/kn/' . basename($_FILES['file']['name']);
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
                $line = isset($Row['A']) ? $Row['A'] : '';
                $desc = isset($Row['B']) ? $Row['B'] : '';
                $uom = isset($Row['C']) ? $Row['C'] : '';
                $price = isset($Row['D']) ? $Row['D'] : '';
                $qty = isset($Row['E']) ? $Row['E'] : '';
                $amount = isset($Row['F']) ? $Row['F'] : '';

                $html .= "<td>" . $i . "</td>";
                $html .= "<td>" . $line . "</td>";
                $html .= "<td>" . $desc . "</td>";
                $html .= "<td>" . $uom . "</td>";
                $html .= "<td>" . $price . "</td>";
                $html .= "<td>" . $qty . "</td>";
                $html .= "<td>" . $amount . "</td>";
                $html .= "</tr>";

                // Insert data into 'kubill1' table
                if ($line != "Line" && $line != "") {
                    $query = "INSERT INTO kubill1(line, itemdesc, uom, price, qty, amount, id1) 
                              VALUES('$line', '" . addslashes($desc) . "', '" . addslashes($uom) . "', '$price', '$qty', '$amount', '$rid')";
                    $res = mysqli_query($link, $query) or die(mysqli_error($link));
                }
            }
        }

        $html .= "</table>";

        // Provide feedback to the user
        if ($res) {
            echo "<br />Data Inserted in database";
            print "<script>";
            print "alert('Successfully Registred ');";
            print "self.location='kbill1.php?id=$rid';";
            print "</script>";
        }
    } else {
        die("<br/>Sorry, File type is not allowed. Only Excel file.");
    }
}
?>
