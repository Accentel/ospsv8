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

        $uploadFilePath = 'uploadproduct/gj/' . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

        $spreadsheet = IOFactory::load($uploadFilePath);
        $totalSheet = $spreadsheet->getSheetCount();

        echo "You have total " . $totalSheet . " sheets";

        $html = "<table border='1'>";
        $html .= "<tr><th>Title</th><th>Description</th></tr>";

        /* For Loop for all sheets */
        for ($i = 0; $i < $totalSheet; $i++) {
            $spreadsheet->setActiveSheetIndex($i);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            foreach ($sheetData as $Row) {
                $html .= "<tr>";
                /* Check If sheet not empty */
                $category = isset($Row[0]) ? $Row[0] : '';
                $item_code = isset($Row[1]) ? $Row[1] : '';
                $item_desc = isset($Row[2]) ? $Row[2] : '';
                $primary_uom = isset($Row[3]) ? $Row[3] : '';
                $qty = isset($Row[4]) ? $Row[4] : '';
                $price_unit = isset($Row[5]) ? $Row[5] : '';
                $hsn = isset($Row[6]) ? $Row[6] : '';
                $sac = isset($Row[7]) ? $Row[7] : '';
                $item_category = isset($Row[8]) ? $Row[8] : '';
                $cgst = isset($Row[9]) ? $Row[9] : '';
                $sgst = isset($Row[10]) ? $Row[10] : '';
                $igst = isset($Row[11]) ? $Row[11] : '';

                $html .= "<td>" . $i . "</td>";
                $html .= "<td>" . $category . "</td>";
                $html .= "<td>" . $item_code . "</td>";
                $html .= "<td>" . $item_desc . "</td>";
                $html .= "<td>" . $primary_uom . "</td>";
                $html .= "<td>" . $qty . "</td>";
                $html .= "<td>" . $hsn . "</td>";
                $html .= "<td>" . $sac . "</td>";
                $html .= "<td>" . $item_category . "</td>";
                $html .= "<td>" . $cgst . "</td>";
                $html .= "<td>" . $sgst . "</td>";
                $html .= "<td>" . $igst . "</td>";
                $html .= "</tr>";

                $q = "select * from gproducts where location='$lname' and category='$category' and item_code='$item_code' ";
                $p = mysqli_query($link, $q) or die(mysqli_error($link));
                $r = mysqli_fetch_array($p);
                $category1 = $r['category'] ?? '';
                $item_code1 = $r['item_code'] ?? '';
                $location1 = $r['location'] ?? '';

                if ($location1 != $lname && $item_code1 != $item_code) {
                    if ($category != 'category') {
                        $query = "insert into gproducts(category,item_code,item_desc,primary_uom,qty,price_unit,hsn,sac,item_category,cgst,sgst,igst,location)
                            values('$category','$item_code', '$item_desc','$primary_uom','$qty','$price_unit','$hsn','$sac','$item_category','$cgst','$sgst','$igst','$lname')";

                        $link->query($query);
                    }
                } else {
                    $m = "update gproducts set  item_desc ='$item_desc' ,primary_uom='$primary_uom', qty='$qty',price_unit='$price_unit', hsn='$hsn',sac='$sac',item_category='$item_category', cgst='$cgst',sgst='$sgst', igst='$igst'    where category='$category1' and item_code='$item_code1' and location='$location1' ";

                    $link->query($m);
                }
            }
        }

        $html .= "</table>";

        echo $html;
        exit;

        echo "<br />Data Inserted in database";
        print "<script>";
        print "alert('Successfully Registred ');";
        print "self.location='guploadproducts.php';";
        print "</script>";
    } else {
        die("<br/>Sorry, File type is not allowed. Only Excel file.");
    }
}

?>
