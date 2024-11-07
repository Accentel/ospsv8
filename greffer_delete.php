<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
$id=$_GET['id'];




$sql=mysqli_query($link,"delete from grefferences where id='$id'");
if($sql){
	print "<script>";
	print "alert('Sucessfully Deleted');";
	print "self.location='addgrefferno.php';";
	print "</script>";
	}
?>