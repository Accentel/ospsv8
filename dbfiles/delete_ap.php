
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../dbconnection/connection.php';

 $pcode=$_REQUEST['id'];
 $p1=$_REQUEST['id1'];
//exit;
 $query="delete from add_bill where id='$pcode'";
$rst= mysqli_query($link, $query) or die(mysqli_error($link));
if($rst){
   // echo 'hi';
    print "<script>";
	print "alert('Sucessfully Deleted');";
	print "self.location='../edit_bill1.php?id=$p1';";
	print "</script>";
   // header('Location:../edit_bill1.php?id='.$p1);
}