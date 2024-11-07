<?php
if(isset($_POST['submit']))
{

include('dbconnection/connection.php');

$Academic_Year=$_POST['cls'];	
$Admn_No=$_POST['sec1'];	
$Name=$_POST['med'];

$sql = mysqli_query($link,"select count(*) from time_table where class='$Academic_Year' and section='$Admn_No' and medium='$Name'");
if($sql){
	$row = mysqli_fetch_array($sql);
	$rows = $row[0];
}
if($rows <= 0){
	
	$count=count($_POST['p1']);
	$count8=count($_POST['p8']);
	if ($count > 0 && $count == $count8) {
    $insertArr = array();
    for ($i=0; $i<$count; $i++) {
		$p1=$_POST['p1'][$i];
		$p2=$_POST['p2'][$i];
		$p3=$_POST['p3'][$i];
		$p4=$_POST['p4'][$i];
		$p5=$_POST['p5'][$i];
		$p6=$_POST['p6'][$i];
		$p7=$_POST['p7'][$i];
		$p8=$_POST['p8'][$i];
		$day=$_POST['day'][$i];
		
		$period1=$_POST['period1'][$i];
		$period2=$_POST['period2'][$i];
		$period3=$_POST['period3'][$i];
		$period4=$_POST['period4'][$i];
		$period5=$_POST['period5'][$i];
		$period6=$_POST['period6'][$i];
		$period7=$_POST['period7'][$i];
		$period8=$_POST['period8'][$i];
		
		
		$que="insert into time_table1(class,section,medium,p1,period1,p2,period2,p3,period3,p4,period4,p5,period5,p6,period6,p7,period7,p8,period8,day) 
		values('$Academic_Year','$Admn_No','$Name','$p1','$period1','$p2','$period2','$p3','$period3','$p4','$period4','$p5','$period5','$p6','$period6','$p7','$period7','$p8','$period8','$day')";
		$res=mysqli_query($link,$que) or die(mysql_error());
	}
	}	
	

if($res){
	print "<script>";
	print "alert('Sucessfully Saved');";
	print "self.location='class_time.php';";
	print"</script>";
}else{
	print "<script>";
	print "alert('unable to save');";
	print "self.location='add_class_time.php';";
	print"</script>";


}
}else{
	print "<script>";
	print "alert('time table already entered with this class - section - medium');";
	print "self.location='add_class_time.php';";
	print"</script>";
}	
}
//echo "enter details....";
?>