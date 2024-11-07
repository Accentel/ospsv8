


<?php
include('dbconnection/connection.php');


 echo $id=$_POST['id'];



	echo $q="select  DISTINCT rnum FROM attendence where class1='$id' ";
  $sql=mysqli_query($link,$q) or die(mysql_error());
echo '<option selected="selected">--Select--</option>';
while($row=mysqli_fetch_array($sql))
{
echo '<option value="'.$row['rnum'].'">'.$row['rnum'].'</option>';
}
//echo '<option value="'.$n.'">'.$n.'</option>';



?>