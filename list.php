<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
 $name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';
//include'dbfiles/iqry_acyear.php';
?>
<!DOCTYPE html>
<html lang="en">
   <body>
   <table border="1"><tr><th>S.No</th><th>WCC NUMBER</th></tr>
   <?php $sq=mysqli_query($link,"select * from add_bill1 order by id desc");
  $i=1;
   while($r=mysqli_fetch_array($sq)){
	  
	   ?>
   <tr><td><?php echo $i;?></td><td><?php echo $r['wcc_num'];?> </td></tr>
<?php $i++;}?></table>
</body>
</html>
<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>
