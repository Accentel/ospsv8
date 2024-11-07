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
		$id=$_POST['id'][$i];
		
		
		
		echo $que="update time_table1 set p1='$p1',p2='$p2',p3='$p3',p4='$p4',p5='$p5',p6='$p6',p7='$p7',p8='$p8' where id='$id'";
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