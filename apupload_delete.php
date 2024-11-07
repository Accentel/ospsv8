<?php
include('dbconnection/connection.php');
$id=$_REQUEST['id'];
$srno=$_REQUEST['srno'];
$img=$_REQUEST['img'];
unlink("uploads/ap/".$img);
$y=mysqli_query($link,"delete from apgallery where id='$id' and serviceno='$srno'") or die(mysqli_error($link));
if($y){
 print "<script>";
        print "alert('Successfully Deleted ');";
        print "self.location='apupload_view.php?id=$srno';";
        print "</script>";

}
?>