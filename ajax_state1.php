<?php
include('dbconnection/connection.php');

if($_POST['id'])
{
$id=$_POST['id'];
 $sql=mysqli_query($link,"select  rollno FROM student_register where class='$id' ");
echo '<option selected="selected">--Select--</option>';
while($row=mysqli_fetch_array($sql))
{
echo '<option value="'.$row['rollno'].'">'.$row['rollno'].'</option>';
}
}

?>