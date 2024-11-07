<?php
require 'vendor/autoload.php'; // Include PHPExcel's autoload.php

use PhpOffice\PhpSpreadsheet\IOFactory;

include('dbconnection/connection.php');

if(isset($_POST['submit'])){
    $lname = $_POST['lname'];

    $allowedMimeTypes = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.oasis.opendocument.spreadsheet'];
    if (in_array($_FILES['file']['type'], $allowedMimeTypes)) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $uploadFilePath = 'uploadproduct/mh/' . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

        $spreadsheet = IOFactory::load($uploadFilePath);
        $totalSheet = $spreadsheet->getSheetCount();

        $html = "<table border='1'>";
        $html .= "<tr><th>Title</th><th>Description</th></tr>";

        for ($i = 0; $i < $totalSheet; $i++) {
            $sheet = $spreadsheet->getSheet($i);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

            for ($row = 1; $row <= $highestRow; ++$row) {
                $html .= "<tr>";
                $rowData = [];
                for ($col = 1; $col <= $highestColumnIndex; ++$col) {
                    $rowData[] = $sheet->getCellByColumnAndRow($col, $row)->getValue();
                }

                $category = $rowData[0] ?? '';
                $item_code = $rowData[1] ?? '';
                $item_desc = $rowData[2] ?? '';
                $primary_uom = $rowData[3] ?? '';
                $qty = $rowData[4] ?? '';
                $price_unit = $rowData[5] ?? '';
                $hsn = $rowData[6] ?? '';
                $sac = $rowData[7] ?? '';
                $item_category = $rowData[8] ?? '';
                $cgst = $rowData[9] ?? '';
                $sgst = $rowData[10] ?? '';
                $igst = $rowData[11] ?? '';
                $service = $rowData[13] ?? '';

                $html .= "<td>" . $i . "</td>";
                $html .= "<td>" . $category . "</td>";
                $html .= "<td>" . $item_code . "</td>";
                $html .= "<td>" . ($item_desc) . "</td>";
                $html .= "<td>" . $primary_uom . "</td>";
                $html .= "<td>" . $qty . "</td>";
                $html .= "<td>" . $hsn . "</td>";
                $html .= "<td>" . $sac . "</td>";
                $html .= "<td>" . $item_category . "</td>";
                $html .= "<td>" . $cgst . "</td>";
                $html .= "<td>" . $sgst . "</td>";
                $html .= "<td>" . $igst . "</td>";
                $html .= "<td>" . $service . "</td>";
                $html .= "</tr>";

                $query = "SELECT * FROM mproducts WHERE location='$lname' AND category='$category' AND item_code='$item_code'";
                $result = mysqli_query($link, $query);
                $row_count = mysqli_num_rows($result);
                $row_data = mysqli_fetch_array($result);

                if ($row_count == 0) {
                    $insert_query = "INSERT INTO mproducts(category, item_code, item_desc, primary_uom, qty, price_unit, hsn, sac, item_category, cgst, sgst, igst, location, service)
                    VALUES('$category', '$item_code', '" . addslashes($item_desc) . "', '$primary_uom', '$qty', '$price_unit', '$hsn', '$sac', '$item_category', '$cgst', '$sgst', '$igst', '$lname', '$service')";
                    mysqli_query($link, $insert_query);
                } else {
                    $update_query = "UPDATE mproducts SET item_desc='" . addslashes($item_desc) . "', primary_uom='$primary_uom', qty='$qty', price_unit='$price_unit', hsn='$hsn', sac='$sac', item_category='$item_category', cgst='$cgst', sgst='$sgst', igst='$igst', service='$service' WHERE category='" . $row_data['category'] . "' AND item_code='" . $row_data['item_code'] . "' AND location='$lname'";
                    mysqli_query($link, $update_query);
                }
            }
        }

        $html .= "</table>";

        echo "<script>";
        echo "alert('Successfully Registered ');";
        echo "self.location='muploadproducts.php';";
        echo "</script>";
    } else {
        die("<br/>Sorry, File type is not allowed. Only Excel file.");
    }
}
?>
