<?php
use PhpOffice\PhpSpreadsheet\IOFactory;

error_reporting(E_ALL);
ini_set('display_errors', 1);
include('dbconnection/connection.php');

require 'vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$check = 0;
if (isset($_POST['submit'])) {
    $lname = $_POST['lname'];
    $uploadFilePath = 'uploadproduct/apnts/' . basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

    $spreadsheet = IOFactory::load($uploadFilePath);
    $totalSheet = $spreadsheet->getSheetCount();

    $html = "<table border='1'>";
    $html .= "<tr><th>Title</th><th>Description</th></tr>";

    for ($i = 0; $i < $totalSheet; $i++) {
        $sheet = $spreadsheet->getSheet($i);
        $highestRow = $sheet->getHighestRow();
        for ($row = 1; $row <= $highestRow; $row++) {
            $category = $sheet->getCellByColumnAndRow(1, $row)->getValue();
            $item_code = $sheet->getCellByColumnAndRow(2, $row)->getValue();
            $item_desc = $sheet->getCellByColumnAndRow(3, $row)->getValue();
            $primary_uom = $sheet->getCellByColumnAndRow(4, $row)->getValue();
            $qty = $sheet->getCellByColumnAndRow(5, $row)->getValue();
            $price_unit = $sheet->getCellByColumnAndRow(6, $row)->getValue();
            $hsn = $sheet->getCellByColumnAndRow(7, $row)->getValue();
            $sac = $sheet->getCellByColumnAndRow(8, $row)->getValue();
            $item_category = $sheet->getCellByColumnAndRow(9, $row)->getValue();
            $cgst = $sheet->getCellByColumnAndRow(10, $row)->getValue();
            $sgst = $sheet->getCellByColumnAndRow(11, $row)->getValue();
            $igst = $sheet->getCellByColumnAndRow(12, $row)->getValue();
            $service = $sheet->getCellByColumnAndRow(13, $row)->getValue();

			$html .= "<tr>";
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
			$html .= "<td>" . $service . "</td>";
			$html .= "</tr>";
			

            // Check if the product exists in the database
            $query = "SELECT * FROM products WHERE location='$lname' AND item_code='$item_code'";
            $result = mysqli_query($link, $query);

            if (mysqli_num_rows($result) == 0) {
                // Product does not exist, insert into the database
                $query = "INSERT INTO products (category, item_code, item_desc, primary_uom, qty, price_unit, hsn, sac, item_category, cgst, sgst, igst, location, service)
                          VALUES ('$category', '$item_code', '$item_desc', '$primary_uom', '$qty', '$price_unit', '$hsn', '$sac', '$item_category', '$cgst', '$sgst', '$igst', '$lname', '$service')";
                mysqli_query($link, $query);
            } else {
                // Product exists, update its details
                $query = "UPDATE products SET item_desc='$item_desc', primary_uom='$primary_uom', qty='$qty', price_unit='$price_unit', 
                          hsn='$hsn', sac='$sac', item_category='$item_category', cgst='$cgst', sgst='$sgst', igst='$igst', service='$service'
                          WHERE location='$lname' AND item_code='$item_code'";
                mysqli_query($link, $query);
            }
        }
    }

    $html .= "</table>";

    echo "<br />Data Inserted in database";

    // Redirect user after successful operation
    echo "<script>alert('Successfully Registered ');window.location.href='acyear.php';</script>";
} else {
    die("<br/>Sorry, File type is not allowed. Only Excel file.");
}
?>
