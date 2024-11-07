<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
$id=$_GET['id'];
$sql=mysqli_query($link,"delete from mrefferences where id='$id'");
if($sql){
	print "<script>";
	print "alert('Sucessfully Deleted');";
	print "self.location='mreffer_list.php';";
	print "</script>";
	}
?>