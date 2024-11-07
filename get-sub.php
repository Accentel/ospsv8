<?php
include('dbconnection/connection.php');
$q=$_GET["q"];

 $sql="SELECT DISTINCT subject,id	 FROM   addsub WHERE class ='$q'";

$result = mysqli_query($link,$sql);



echo "<select>";
echo "<option value=''>Select Subject Name  </option>";
while($row = mysqli_fetch_array($result))
  {
  
  echo "<option value=".$row['id'].">" . $row['subject'] . "</option>";
  }
echo "</select>";

//mysql_close($con);
?> 
