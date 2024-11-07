<?php //include('config.php');

include('dbconnection/connection.php');

require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
//require('db_config.php');
	
if(isset($_POST['submit'])){

	$mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
	//if(in_array($_FILES["file"]["type"],$mimes)){

		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		  $lname=$_POST['lname'];
		   //$cat=$_POST['cat'];
		    $user=$_POST['user'];
		   $q = "insert into mubill (location,user) values('$lname','$user')";
		   $r=mysqli_query($link,$q) or die(mysqli_error($link));
		   $rid=mysqli_insert_id($link);
		  
		   
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
		        $line = isset($Row[0]) ? $Row[0] : '';
				 $desc = isset($Row[1]) ? $Row[1] : '';
				$uom = isset($Row[2]) ? $Row[2] : '';
				$price = isset($Row[3]) ? $Row[3] : '';
				$qty = isset($Row[4]) ? $Row[4] : '';
				$amount = isset($Row[5]) ? $Row[5] : '';
						
			$html.="<td>".$i."</td>";
				 $html.="<td>".$line."</td>";
				$html.="<td>".$desc."</td>";
				$html.="<td>".$uom."</td>";
				$html.="<td>".$price."</td>";
				$html.="<td>".$qty."</td>";
				$html.="<td>".$amount."</td>";
				$html.="</tr>";

				 			
	//$query = "insert into items(title,description) values('".$title."','".$description."')";
	if($line != "Line" and $line !=""){
	
      $query = "insert into mubill1(line,itemdesc,uom,price,qty,amount,id1)
							values('".$line."','".addslashes($desc)."','".addslashes($uom)."','".$price."','".$qty."','".$amount."','".$rid."')";     
	 $res=mysqli_query($link,$query) or die(mysqli_error($link));
	
				//$link->query($query);
				
	}else{

	}	
       }
	}

		$html.="</table>";
	//	 $html;
if($res){
		echo "<br />Data Inserted in dababase";
			print "<script>";
            print "alert('Successfully Registred ');";
			print "self.location='mbill1.php?id=$rid';";
			print "</script>";
}
//	}else { 
		die("<br/>Sorry, File type is not allowed. Only Excel file."); 
//	}
}
?>