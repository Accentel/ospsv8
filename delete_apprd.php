<?php
include('dbconnection/connection.php');
$id=$_GET['id'];
$qry="delete from approducts where id='$id'";
 $rs= mysqli_query($link, $qry) or die(mysqli_error($link));
if($rs){
	print "<script>";
	print "alert('Record Deleted Sucessfully');";
	print "self.location='andhrauploadproducts.php';";
	print "</script>";
	
}
mysqli_close($link);
?>