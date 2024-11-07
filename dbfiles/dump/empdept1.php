<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../dbconnection/connection.php';
if (isset($_POST['update'])) {
    //reading form data
    $empdeptname = trim($_POST['empdeptname']);
    $empid = trim($_POST['empid']);
   

 
 //if the form variables are not empty then update data into database
   
       echo $sql = "update empdepartment set dept_name='$empdeptname' where empid='$empid'";
    $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

    if ($res) {

//if it is successfully update then display alert box in form
        header('Location:../employeedepartment.php');
        //$msg = '<div class="alert alert-success" id="success-alert"><b>Data Updated Successfully </b> </div>';
    }
   
            
   

}