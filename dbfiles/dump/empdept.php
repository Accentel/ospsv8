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
    
//department name validation if the value is empty display error other wise asssign a value
 
    
    //if the form variables are not empty then insert data into database
    
        $sql = "insert into  empdepartment(dept_name) values('$empdeptname')";
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
    $empid = trim($_POST['empid']);
   

 
 //if the form variables are not empty then update data into database
   
       $sql = "update empdepartment set dept_name='$empdeptname' where empid='$empid'";
    $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

    if ($res) {

//if it is successfully update then display alert box in form
        $msg = '<div class="alert alert-success" id="success-alert"><b>Data Updated Successfully </b> </div>';
    }
   
            
   

}else{
    
    //when click edit button then executed query based on id.and fetching data into variables
     $dcode = $_REQUEST['id'];
    $q = "select * from testdetails where id='$dcode'";
    $k = mysqli_query($link, $q) or die(mysql_error());
    $p = mysqli_fetch_assoc($k);

    $deptname = $p['Department'];
    $testname = $p['TestName'];
    $amount = $p['Amount'];
    $id = $p['id'];
}


//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

