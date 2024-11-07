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

        $insertQuery = "INSERT INTO ubill (location, cat, user) VALUES ('$lname', '$cat', '$user')";
        $insertResult = mysqli_query($link, $insertQuery);
        $rid = mysqli_insert_id($link);

        $uploadFilePath = 'uploadbilling/apnts/'.basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

        $spreadsheet = IOFactory::load($uploadFilePath);
        $totalSheet = $spreadsheet->getSheetCount();

        for ($i = 0; $i < $totalSheet; $i++) {
            $sheet = $spreadsheet->getSheet($i);
            foreach ($sheet->getRowIterator() as $row) {
                $rowData = $row->getCellIterator();
                $line = $rowData->current()->getValue();
                $rowData->next();
                $description = $rowData->current()->getValue();
                $rowData->next();
                $uom = $rowData->current()->getValue();
                $rowData->next();
                $price = $rowData->current()->getValue();
                $rowData->next();
                $qty = $rowData->current()->getValue();
                $rowData->next();
                $amount = $rowData->current()->getValue();

                if($line != "Line" and $line !=""){
                    $query = "INSERT INTO ubill1 (line, itemdesc, uom, price, qty, amount, id1)
                                VALUES ('$line', '".addslashes($description)."', '".addslashes($uom)."', '$price', '$qty', '$amount', '$rid')";
                    mysqli_query($link, $query);
                }
            }
        }

        echo "<br />Data Inserted in database";
        echo "<script>alert('Successfully Registered ');window.location.href='bill1.php?id=$rid';</script>";
    } else {
        die("<br/>Sorry, File type is not allowed. Only Excel file.");
    }
}
?>



