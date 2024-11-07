<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
$id=$_GET['id'];
$sql=mysqli_query($link,"delete from krefferences where id='$id'");
if($sql){
	print "<script>";
	print "alert('Sucessfully Deleted');";
	print "self.location='kreffer_list.php';";
	print "</script>";
	}
?>