<?php
include('dbconnection/connection.php');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if(isset($_POST['submit'])){
    $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
    if(in_array($_FILES["file"]["type"],$mimes)){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
        $cat = isset($_POST['cat']) ? $_POST['cat'] : '';
        $user = isset($_POST['user']) ? $_POST['user'] : '';

        if(empty($lname) || empty($user)) {
            die("Location and user are required fields.");
        }

        $insertQuery = "INSERT INTO apbill (location, cat, user) VALUES ('$lname', '$cat', '$user')";
        $insertResult = mysqli_query($link, $insertQuery);
        $rid = mysqli_insert_id($link);

        $uploadFilePath = 'uploadbilling/ap/'.basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

        $spreadsheet = IOFactory::load($uploadFilePath);
        $totalSheet = $spreadsheet->getSheetCount();

        for ($i = 0; $i < $totalSheet; $i++) {
            $sheet = $spreadsheet->getSheet($i);
            $highestRow = $sheet->getHighestRow();
            for ($row = 1; $row <= $highestRow; $row++) {
                $line = $sheet->getCellByColumnAndRow(1, $row)->getValue();
                $desc = $sheet->getCellByColumnAndRow(2, $row)->getValue();
                $uom = $sheet->getCellByColumnAndRow(3, $row)->getValue();
                $price = $sheet->getCellByColumnAndRow(4, $row)->getValue();
                $qty = $sheet->getCellByColumnAndRow(5, $row)->getValue();
                $amount = $sheet->getCellByColumnAndRow(6, $row)->getValue();

                if($line != "Line" and $line !=""){
                    $query = "INSERT INTO apbill1 (line, itemdesc, uom, price, qty, amount, id1)
                                VALUES ('$line', '".addslashes($desc)."', '".addslashes($uom)."', '$price', '$qty', '$amount', '$rid')";
                    mysqli_query($link, $query);
                }
            }
        }

        echo "<br />Data Inserted in database";
        echo "<script>alert('Successfully Registered ');window.location.href='apbill1.php?id=$rid';</script>";
    } else {
        die("<br/>Sorry, File type is not allowed. Only Excel file.");
    }
}
?>
