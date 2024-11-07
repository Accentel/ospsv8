
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../dbconnection/connection.php';

$pcode=$_REQUEST['id'];
//$img=$_GET['img'];
//unlink('../photos/'.$img);
echo $query="delete from materials where id='$pcode'";
$rst= mysqli_query($link, $query) or die(mysqli_error($link));
if($rst){
    //header('Location:../addemployee.php');
    print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='../addmaterials.php';";
        print "</script>";
}