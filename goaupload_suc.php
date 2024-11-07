<?php //include('config.php');

include('dbconnection/connection.php');

require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
//require('db_config.php');
	
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
	        	$html.="<tr>";
				/* Check If sheet not emprt */
		        $category = isset($Row[0]) ? $Row[0] : '';
				 $item_code = isset($Row[1]) ? $Row[1] : '';
				//$item_desc = isset($Row[2]) ? $Row[2] : '';
				 $item_desc = isset($Row[2]) ? str_replace('?',' ',utf8_decode($Row[2])): '';
				$primary_uom = isset($Row[3]) ? $Row[3] : '';
				$qty = isset($Row[4]) ? $Row[4] : '';
				$price_unit = isset($Row[5]) ? $Row[5] : '';
				$hsn = isset($Row[6]) ? $Row[6] : '';
				$sac = isset($Row[7]) ? $Row[7] : '';
				$item_category = isset($Row[8]) ? $Row[8] : '';
				$cgst = isset($Row[9]) ? $Row[9] : '';
				$sgst = isset($Row[10]) ? $Row[10] : '';
				$igst = isset($Row[11]) ? $Row[11] : '';
			$html.="<td>".$i."</td>";
				 $html.="<td>".$category."</td>";
				$html.="<td>".$item_code."</td>";
				$html.="<td>".$item_desc."</td>";
				$html.="<td>".$primary_uom."</td>";
				$html.="<td>".$qty."</td>";
				$html.="<td>".$hsn."</td>";
				$html.="<td>".$sac."</td>";
				$html.="<td>".$item_category."</td>";
				$html.="<td>".$cgst."</td>";
				$html.="<td>".$sgst."</td>";
				$html.="<td>".$igst."</td>";
				$html.="</tr>";

				 $q="select * from goaproducts where location='$lname'  and item_code='$item_code' ";
				
				$p=mysqli_query($link,$q) or die(mysqli_error($link));
				//$p=$link->query($q);
				
				$r=mysqli_fetch_array($p);
				 $item_desc1=addslashes($r['item_desc'])."<br/>";
				$item_code1=$r['item_code']."<br/>";
				$primary_uom1=$r['primary_uom']."<br/>";
				$qty1=$r['qty']."<br/>";
				$price_unit1=$r['price_unit'];
				$hsn1=$r['hsn'];
				$sac1=$r['sac'];
				$item_category1=$r['item_category'];
				$cgst1=$r['cgst'];
				$sgst1=$r['sgst'];
				$igst1=$r['igst'];
				 $category1=$r['category'];
				 $location1=$r['location']."<br/>";
				
				
				if( ($location1!= $lname) and ($item_code1!= $item_code)){
					//echo 'hi';
				if($category!='category'){
								//$query = "insert into items(title,description) values('".$title."','".$description."')";
	 $query = "insert into goaproducts(category,item_code,item_desc,primary_uom,qty,price_unit,hsn,sac,item_category,cgst,sgst,igst,location)
							values('".$category."','".$item_code."','".addslashes($item_desc)."','".$primary_uom."','".$qty."','".$price_unit."','".$hsn."','".$sac."','".$item_category."','".$cgst."','".$sgst."','".$igst."','".$lname."')";     
    
	 //$res=mysql_query($ten_ins) or die(mysql_error());
				$link->query($query);
				
							}	else{}
						
				}else{
					$m="update goaproducts set  item_desc ='".addslashes($item_desc)."' ,primary_uom='$primary_uom', qty='$qty',price_unit='$price_unit', hsn='$hsn',sac='$sac',item_category='$item_category', cgst='$cgst',sgst='$sgst', igst='$igst'    where category='$category1' and item_code='$item_code1' and location='$location1' ";
					//$rt=mysqli_query($link,$m) or die(mysqli_error($link));
						$link->query($m);
							
				
				
				}
				
				
				
	        }

		}

		$html.="</table>";
		
		
	//	echo $html;

		echo "<br />Data Inserted in dababase";
			print "<script>";
            print "alert('Successfully Registred ');";
			print "self.location='goauploadproducts.php';";
			print "</script>";

	}else { 
		die("<br/>Sorry, File type is not allowed. Only Excel file."); 
	}

}

?>