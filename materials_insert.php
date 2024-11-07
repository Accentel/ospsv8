<?php //include('config.php');
include('dbconnection/connection.php');
if(isset($_POST['submit'])){
$mname=$_POST['mname'];	
$user=$_POST['user'];	

	$sq=mysqli_query($link,"INSERT INTO `materials`(`mname`,`user`) VALUES ('$mname', '$user')");
	
	if($sq){
	print "<script>";
	print "alert('Sucessfully Saved');";
	print "self.location='addmaterials.php';";
	print "</script>";

}
}




if(isset($_POST['update'])){
	echo $id=$_POST['id'];
	
	$mname=$_POST['mname'];	
	
	$sq=mysqli_query($link,"update  `materials` set `mname`='$mname' where id='$id'");
	if($sq){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='addmaterials.php';";
	print "</script>";
	}
}else{
	$id=$_GET['id'];
	 $qry="select * from materials where id='$id'";
	$r=mysqli_query($link,$qry);
	$r1=mysqli_fetch_array($r);
	$id=$r1['id'];
	
	$mname=$r1['mname'];	
	
}

?>
