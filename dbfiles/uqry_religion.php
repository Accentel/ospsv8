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
   
    $acyear = trim($_POST['acyear']);
   $user=trim($_POST['user']);
   $id=trim($_POST['id']);
   

 //$res = mysqli_query($link, "insert into acyear(year,user) values('$acyear','$user')") or die("could not connected" . mysqli_error());
 //if the form variables are not empty then update data into database
   
        $sql = "update religion set rname='$acyear',user='$user' where id='$id'";
    $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

    if ($res) {

//if it is successfully update then display alert box in form
       print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='addreligion.php';";
        print "</script>";
    }
   
            
   

}else{
	
	$id=$_GET['id'];
	
	$sql = "select * from religion where id='$id'";
    $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());
$t=mysqli_fetch_array($res);
	$acyear=$t['rname'];
	$id1=$t['id'];
	
	
	
}


//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

