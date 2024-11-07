<?php
include('connection.php');
session_start();
$user_check=$_SESSION['user'];

$sql = mysqli_query($link,"SELECT user FROM admin_login WHERE user='$user_check' ");

$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);

 $login_user=$row['user'];

if(!isset($user_check))
{
	//session_destroy();
header("Location: index.php");
}
?>