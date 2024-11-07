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
		ini_set('max_execution_time', 300);
		error_reporting(E_ALL);
		  $lname=$_POST['lname'];
		$uploadFilePath = 'upload/'.basename($_FILES['file']['name']);
		move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

		$Reader = new SpreadsheetReader($uploadFilePath);

		$totalSheet = count($Reader->sheets());

		echo "You have total ".$totalSheet." sheets".

		$html="<table border='1'>";
		$html.="<tr><th>Title</th><th>Description</th></tr>";

		/* For Loop for all sheets */
		for($i=0;$i<$totalSheet;$i++){

			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row)
	        {
	        	$html.="<tr>";
				/* Check If sheet not emprt */
		        $req_ref = isset($Row[0]) ? $Row[0] : '';
				$site_name = isset($Row[1]) ? $Row[1] : '';
				$district = isset($Row[2]) ? $Row[2] : '';
				$state = isset($Row[3]) ? $Row[3] : '';
				$indus_id = isset($Row[4]) ? $Row[4] : '';
				$seeking_id = isset($Row[5]) ? $Row[5] : '';
				$seeking_opt = isset($Row[6]) ? $Row[6] : '';
				$po_num = isset($Row[7]) ? $Row[7] : '';
				$allocation_date1 = isset($Row[8]) ? $Row[8] : '';
				$comp_date1 = isset($Row[9]) ? $Row[9] : '';
				$sitetype = isset($Row[10]) ? $Row[10] : '';
				$html.="<td>".$i."</td>";
				$html.="<td>".$req_ref."</td>";
				$html.="<td>".$site_name."</td>";
				$html.="<td>".$district."</td>";
				$html.="<td>".$state."</td>";
				$html.="<td>".$indus_id."</td>";
				$html.="<td>".$seeking_id."</td>";
				$html.="<td>".$seeking_opt."</td>";
				$html.="<td>".$po_num."</td>";
				$html.="<td>".$allocation_date1."</td>";
				$html.="</tr>";
				
				$allocation_date= date("Y-m-d", strtotime($allocation_date1));
				$comp_date= date("Y-m-d", strtotime($comp_date1));
				
				 $q="select * from mrefferences where location='$lname' and indus_id='$indus_id' and req_ref='$req_ref' ";
				
				$p=mysqli_query($link,$q) or die(mysqli_error($link));
				//$p=$link->query($q);
				
				$r=mysqli_fetch_array($p);
				 $req_ref1=addslashes($r['req_ref'])."<br/>";
				$site_name1=$r['site_name']."<br/>";
				$district1=$r['district']."<br/>";
				$state1=$r['state']."<br/>";
				$indus_id1=$r['indus_id'];
				$seeking_id1=$r['seeking_id'];
				$seeking_opt1=$r['seeking_opt'];
				$po_num1=$r['po_num'];
				$allocation_date12=$r['allocation_date'];
				$allocation_date2= date("Y-m-d", strtotime($allocation_date12));
				 $location1=$r['location']."<br/>";
				$sitetype1=$r['sitetype'];
					if( ($location1!= $lname) and  ($indus_id1!= $indus_id ) and ($req_ref1!= $req_ref ) ){	
				
						if($district!="Dist")	{	
				$query = "insert into mrefferences(`req_ref`,`site_name`,`district`,`state`,`indus_id`,`seeking_id`,`seeking_opt`,`po_num`,`allocation_date`,`location`,`comp_date`,`sitetype`)
							values('".$req_ref."','".$site_name."','".$district."','".$state."','".$indus_id."','".$seeking_id."','".$seeking_opt."','".$po_num."','".$allocation_date."','".$lname."','".$comp_date."','".$sitetype."')";     
    
	 //$res=mysql_query($ten_ins) or die(mysql_error());
			$q=$link->query($query);
						}else{}
				
					}else{
						
						$m="update mrefferences set  site_name ='".addslashes($site_name)."' ,district='$district',  state='$state',seeking_id='$seeking_id', po_num='$po_num',allocation_date='$allocation_date2',comp_date='$comp_date',sitetype='$sitetype'  where indus_id='$indus_id1' and sitetype='$sitetype1' and location='$location1' and req_ref='$req_ref1' ";
					//$rt=mysqli_query($link,$m) or die(mysqli_error($link));
					$q=$link->query($m);
						
				
					}
		        }

		}

		$html.="</table>";
		 $html;
		//exit;
		//echo "<br />Data Inserted in dababase";
		if($q){
		print "<script>";
			print "alert('Successfully Registred ');";
			print "self.location='addmrefferno.php';";
			print "</script>";
		}
	}else { 
		die("<br/>Sorry, File type is not allowed. Only Excel file."); 
	}

}

?>