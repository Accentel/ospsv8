<?php

/* =========================================================================================== */
#### insert,edit,update operations for add Employee Details and  display form validations ####
#### Author	: 	K Srinivasa Rao						####

/* =========================================================================================== */
//to insert data into testdetails table.if the is no errrors in form then insert data into database. 
//include '../dbconnection/connection.php';



//to update data into testdetails table.if the is no errrors in form then insert data into database. 
if (isset($_POST['submit'])) {
    //reading form data
    $emp_name = trim($_POST['empname']);
	$emp_email = trim(addslashes($_POST['email']));
	$username = trim(addslashes($_POST['uname']));
	$password = trim(addslashes($_POST['pwd']));
   $user=trim($_POST['user']);
   $id=trim($_POST['id1']);
   

 //$res = mysqli_query($link, "insert into acyear(year,user) values('$acyear','$user')") or die("could not connected" . mysqli_error());
 //if the form variables are not empty then update data into database
   
       $sql = "update employee set emp_name='$emp_name',emp_email='$emp_email',username='$username',password='$password' where empid='$id'";
    $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error($link));

    if ($res) {

//if it is successfully update then display alert box in form
       print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='addemployee.php';";
        print "</script>";
    }
   
            
   

}else{
	
	$id=$_GET['id'];
	
	$sql = "select * from employee where empid='$id'";
    $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());
$t=mysqli_fetch_array($res);
	$acyear=$t['lname'];
	$id1=$t['empid'];
	$emp_email=$t['emp_email'];
	$emp_name=$t['emp_name'];
	$username=$t['username'];
	$password=$t['password'];
	
}


//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
	
    $data = htmlspecialchars($data);
    return $data;
}

