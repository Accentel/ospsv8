<?php //include('config.php');
ob_start();
include('dbconnection/connection.php');
session_start();
//echo $_SESSION['user'];
if($_SESSION['user'])
{
echo $name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php'
?>























<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>