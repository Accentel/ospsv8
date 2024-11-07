<?php //include('config.php');
session_start();
include('dbconnection/connection.php');



if(isset($_POST['submit'])){

$newPassword=$_POST['newPassword'];
$ses=$_POST['ses'];

$newPasswordRepeated=$_POST['newPasswordRepeated'];
$password = md5($newPassword);
  $x="update admin_login set pwd='$password' where user='$ses'"; 
if($ses!='admin'){
$sq=mysqli_query($link,$x);
$x1="update employee set password='$newPassword' where username='$ses'"; 
}
$sq=mysqli_query($link,$x1);
if($sq){

print "<script>";

			print "alert('Password Successfully Updated');";

			print "self.location='dashboard.php';";

			print "</script>";

			}

			

			else{

mysql_error();}



}

		
?>