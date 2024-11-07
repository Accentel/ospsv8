<?php
include('dbconnection/connection.php');
?>

<?php
$q=$_GET["q"];

 $sql="SELECT *  FROM mrefferences WHERE req_ref = '$q'";

$result = mysqli_query($link,$sql);


while($row = mysqli_fetch_array($result))
  {
 // echo ":" . $row['SUPPL_NAME'];
  //echo ":" . $row['state'];
  
   //echo ":" . $row['city'];
   echo ":" . $row['site_name'];
   echo ":" . $row['district'];
      echo ":" . $row['state'];
	  
	    echo ":" . $row['indus_id'];
   echo ":" . $row['seeking_id'];
   echo ":" . $row['seeking_opt'];
   echo ":" . $row['po_num'];
 echo ":" . $row['allocation_date'];
  
  echo ":" .trim($row['comp_date']);
  //$d1= date("Y-m-d", strtotime($d));
	  //echo ":" . $d1;
  //echo "</tr>";
  }

?>     