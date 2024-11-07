<?php //include('config.php');
include('dbconnection/connection.php');
if(isset($_POST['submit'])){
$sno=$_POST['sno'];	
$sname=$_POST['sname'];	
$email=$_POST['email'];
$mobileno=$_POST['mobileno'];	
$phoneno=$_POST['phoneno'];
$gstno=$_POST['gstno'];
$address=$_POST['address'];
$tno=$_POST['tno'];
$mname=$_POST['material'];
	$location=$_POST['location'];
	$sq=mysqli_query($link,"INSERT INTO `suppliers`(`sid`, `sname`, `email`, `mobile`, `phone`, `gstno`, `address`,`tinno`,`mid`,`location`)
	 VALUES ('$sno', '$sname', '$email', '$mobileno', '$phoneno', '$gstno', '$address','$tno','$mname','$location')");
	
	if($sq){
	print "<script>";
	print "alert('Sucessfully Saved');";
	print "self.location='supplier_list.php';";
	print "</script>";

}
}




if(isset($_POST['update'])){
	$id=$_POST['id'];
	$sno=$_POST['sno'];	
	$sname=$_POST['sname'];	
	$email=$_POST['email'];
	$mobileno=$_POST['mobileno'];	
	$phoneno=$_POST['phoneno'];
	$gstno=$_POST['gstno'];
	$address=$_POST['address'];
	$tno=$_POST['tno'];
	$location=$_POST['location'];
    $mname=$_POST['material'];
	$sq=mysqli_query($link,"update  `suppliers` set `sid`='$sno',location='$location', `sname`='$sname', `email`='$email', `mobile`='$mobileno', `phone`='$phoneno', `gstno`='$gstno', `address`='$address',`tinno`='$tno',`mid`='$mname' where id='$id'");
	if($sq){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='supplier_list.php';";
	print "</script>";
	}
}

?>
