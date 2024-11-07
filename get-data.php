<?php
include('dbconnection/connection.php');

$q=$_GET["q"];

 echo $sql="SELECT districts FROM location_districts WHERE state_id ='$q' order by districts";

$result = mysqli_query($link,$sql);



echo "<select>";
echo "<option value=''>Select  Districts</option>";
while($row = mysqli_fetch_array($result))
  {
  
  echo "<option>" . $row['districts'] . "</option>";
  }
echo "</select>";

//mysql_close($con);
?> 
