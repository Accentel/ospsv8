<?php

/* =========================================================================================== */
#### insert,edit,update operations for add Employee Details and  display form validations ####
#### Author	: 	K Srinivasa Rao						####

/* =========================================================================================== */
//to insert data into testdetails table.if the is no errrors in form then insert data into database. 
//include '../dbconnection/connection.php';
if (isset($_POST['insert'])) {
//reading form data
     $empdeptname = trim($_POST['empdeptname']);
     $deptname = trim($_POST['deptname']);
     $location = trim($_POST['location']);
     $user = trim($_POST['user']);
    
//department name validation if the value is empty display error other wise asssign a value
 
    
    //if the form variables are not empty then insert data into database
    
        $sql = "insert into  dept(DEPT_NAME,UDEPT_CODE,LOC,AUTH_BY) values('$empdeptname','$deptname','$location','$user')";
        $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

        if ($res) {

//if it is successfully insert then display alert box in form
            $msg = '<div class="alert alert-success" id="success-alert"><b>Data Inserted Successfully </b> </div>';
        }
    
}


//to update data into testdetails table.if the is no errrors in form then insert data into database. 
if (isset($_POST['update'])) {
    //reading form data
     $empdeptname = trim($_POST['empdeptname']);
     $deptname = trim($_POST['deptname']);
     $location = trim($_POST['location']);
     $user = trim($_POST['user']);
    $id = trim($_POST['id']);
   
   

 
 //if the form variables are not empty then update data into database
   
       $sql = "update dept set DEPT_NAME='$empdeptname',AUTH_BY='$user',UDEPT_CODE='$deptname',LOC='$location' where DEPT_CODE='$id'";
    $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

    if ($res) {

//if it is successfully update then display alert box in form
        $msg = '<div class="alert alert-success" id="success-alert"><b>Data Updated Successfully </b> </div>';
    }
   
            
   

}


//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

