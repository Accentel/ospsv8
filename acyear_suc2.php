<?php //include('config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('dbconnection/connection.php');

require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
//require('db_config.php');
	$check=0;
if(isset($_POST['submit'])){

	$mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
	if(in_array($_FILES["file"]["type"],$mimes)){

		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		  $lname=$_POST['lname'];
		$uploadFilePath = 'upload/'.basename($_FILES['file']['name']);
		move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

		$Reader = new SpreadsheetReader($uploadFilePath);

		$totalSheet = count($Reader->sheets());

		 "You have total ".$totalSheet." sheets".

		$html="<table border='1'>";
		$html.="<tr><th>Title</th><th>Description</th></tr>";

		/* For Loop for all sheets */
		for($i=0;$i<$totalSheet;$i++){

			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row)
	        {
	            $check++;
	        	$html.="<tr>";
				/* Check If sheet not emprt */
		        $itemcode = isset($Row[0]) ? $Row[0] : '';
				$hsn = isset($Row[1]) ? $Row[1] : '';
				//$item_desc = isset($Row[2]) ? $Row[2] : '';
				$hsn12 = isset($Row[2]) ? str_replace('?',' ',$Row[2]): '';
				$item=trim($itemcode);
			    $html.="<td>".$i."</td>";
			    $html.="<td>".$itemcode."</td>";
				$html.="<td>".$hsn."</td>";
				$html.="<td>".$hsn12."</td>";
				$html.="</tr>";

			echo	$m="update mproducts set   sac='$hsn12' where sac='$hsn' and item_code='$itemcode'";
				
						//$link->query($m);
				
					mysqli_query($link,$m) or die(mysqli_error($link));
				
				
	        }

		}

		$html.="</table>";
		
		
		echo $html;
exit;
		echo "<br />Data Inserted in dababase";
			print "<script>";
            print "alert('Successfully Registred ');";
			print "self.location='hsnupload.php';";
			print "</script>";

	}else { 
	    echo $check;
		die("<br/>Sorry, File type is not allowed. Only Excel file."); 
	}

}

?>