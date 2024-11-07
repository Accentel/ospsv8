<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST['insert'])){
    $deptcode = trim($_POST['deptcode']);
    $deptname = trim($_POST['deptname']);
    

    //check the form validations
    if (empty($deptcode) or empty($deptname) ) {
        $errorName = "Please Enter Department Name";
      
        $errorcode = "Please Enter Department Code";
    }else {
        $sql = "insert into  masterdept() values('$deptcode','$deptname')";
        $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

        if ($res) {

//if it is successfully update then display alert box in form
            $msg = '<div class="alert alert-success" id="success-alert"><b>Data Inserted Successfully </b> </div>';
        }
    }
}
if(isset($_POST['update'])){
    $deptcode = trim($_POST['deptcode']);
    $deptname = trim($_POST['deptname']);
    

    //check the form validations
    if (empty($deptcode) or empty($deptname) ) {
        $errorName = "Please Enter Department Name";
      
        $errorcode = "Please Enter Department Code";
    }else {
        $sql = "update masterdept set deptname='$deptname' where deptcode='$deptcode'";
        $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

        if ($res) {

//if it is successfully update then display alert box in form
            $msg = '<div class="alert alert-success" id="success-alert"><b>Data Updated Successfully </b> </div>';
        }
    }
}else{
    
    $dcode=$_REQUEST['pcode'];
    $q="select * from masterdept where deptcode='$dcode'";
    $k= mysqli_query($link, $q) or die(mysql_error());
   $p=mysqli_fetch_assoc($k);
    $deptcode=$p['deptcode'];
    $deptname=$p['deptname'];
}

 