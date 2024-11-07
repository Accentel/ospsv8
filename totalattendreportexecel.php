<?php
include('dbconnection/connection.php');
//if(isset($_POST['submit'])){
   $fdate=$_REQUEST['fdate1'];
    $tdate=$_REQUEST['tdate1'];
	 $class1=$_REQUEST['class'];
	  $sect=$_REQUEST['sect'];
	  $medi=$_REQUEST['medi'];
 



//This application is developed by www.webinfoipedia.com. || Copyright 2011.
//For more examples related PHP visit www.webinfoipedia.com and enjoy demo and free download..


//connect the database


//Enter the headings of the excel columns
//$fromdate=$_POST['datepicker'];
//$todate=$_POST['datepicker1'];
$contents="S NO\t Class\t Date\t Roll No\t Student Name\t Attendance \t Phone No\n";

//Mysql query to get records from datanbase
//You can customize the query to filter from particular date and month etc...Which will depends your database structure.
  $mn="select * from attendence where date2 between  '$fdate' and '$tdate' and class1='$class1' and sect1='$sect' and med1='$medi'";
$user_query = mysqli_query($link,$mn) or die(mysqli_error());
$i=1;
//While loop to fetch the records
while($row = mysqli_fetch_array($user_query))
{
	$class1=$row['class1'];
	$sq=mysqli_query($link,"select * from class where id='$class1'");
	$res=mysqli_fetch_array($sq);
	$canme=$res['cname'];
	
	if($row['atten'] == "P"){
		$atten = $row['atten'];
		}
		else{$atten = "A";}
		if($atten == "P"){ $p++; }elseif($atten != "P"){ $a++; }
$contents.=$i."\t";
$contents.=$canme."\t";
$contents.=date('d-m-Y',strtotime($row['date2']))."\t";
$contents.=$row['rnum']."\t";
$contents.=$row['name1']."\t";

$contents.=$atten."\t";
$contents.=$row['phone1']."\n";

$i++;

}


// remove html and php tags etc.
$contents = strip_tags($contents); 

//header to make force download the file
header("Content-Disposition: attachment; filename=classwiseattendance".date('d-m-Y').".xls");
print $contents;

//For more examples related PHP visit www.webinfoipedia.com and enjoy demo and free download..
//}
?>