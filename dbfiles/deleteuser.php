
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
$query="delete from admin_login where empname='$pcode'";
$rst= mysqli_query($link, $query) or die(mysqli_error($link));
$query="delete from hr_user where emp_id='$pcode'";
$rst= mysqli_query($link, $query) or die(mysqli_error($link));
if($rst){
    //header('Location:../addemployee.php');
    print "<script>";
        print "alert('Successfully Deleted ');";
        print "self.location='../usermanagement.php';";
        print "</script>";
}