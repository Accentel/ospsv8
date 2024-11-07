<?php
/*$host="localhost";
$username="ospsbill_billing";
$pass="billing#123";
$db="ospsbill_ospsbilling";
$con=mysql_connect($host,$username,$pass) or die(mysql_error());
$db1=mysql_select_db($db) or die(mysql_error());
error_reporting(0);

*/

?>

<?php
//include('config.php');
define("HOST_NAME", "ospsbilling.com");
define("USER", "a16673ai_payamath");
define("PASSWORD", "Payamath@2016");
define("DB", "a16673ai_ospsbilling");
$link=mysqli_connect(HOST_NAME,USER,PASSWORD,DB);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
error_reporting(0);

?>