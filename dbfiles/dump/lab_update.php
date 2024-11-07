<?php

/* =========================================================================================== */
#### Edit and Update data and checking validations for organization. if it is false display errors else redirect to dashboard ####
#### Author	: 	K Srinivasa Rao						####

/* =========================================================================================== */
session_start();
//load the db connection;
//require_once 'dbconnection/connection.php';
//update the organization details and validations
if (isset($_POST['update'])) {
    //read the login form variables
    $labname = trim($_POST['labname']);
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phno']);
    $mobile = trim($_POST['mblno']);
    $lwebsite = trim($_POST['website']);
    $labtin1 = trim($_POST['labtin1']);
    $id = trim($_POST['id']);
    
 $labtin2= trim($_POST['labtin2']);
   
    //check the form validations labname
    if (empty($labname)){
        $errolab = "Please Enter Lab Name";
    }else{
        $labname=test_input($labname);
    }
    //check address validation
    if(empty($address)){
        $erroraddress = "Please Enter Lab Address";
    }else{
       $address= test_input($address); 
    } 
       //check email validation
       if(empty($email)){
       $errorlabemail = "Please Enter Email";
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorlabemail = 'Enter a valid Email.';
    }else{
       $email= test_input($email); 
    }
      //check mobile validation
    if(empty($mobile)){
        $errormobile = "Please Enter Mobile No";
    }else if (!is_numeric($mobile)) {
        $errormobile = "Please Enter Mobile No";
    }else if (strlen($mobile) != 10) {
        $errormobile = 'Enter a valid Mobile No.';
    }else{
       $mobile= test_input($mobile); 
    }
    //check website url validation
if(empty($lwebsite)){
        $errorurl = "Please Enter Web Site URL";
    }else if (filter_var($lwebsite, FILTER_VALIDATE_URL)) {
        $errorurl = 'Enter a valid URL.';
    }else{
       $lwebsite= test_input($lwebsite); 
    }     
    //phone validation 
    if(empty($phone)){
         $errorphno = "Please Enter Phone No";
    }else{
       $phone= test_input($phone); 
    } 
    //check tin no validation
    if(empty($labtin1)){
        $errorlabtin1 = "Please Enter Lab Tin";
    }else{
       $labtin1= test_input($labtin1); 
    } 
   if($labname!='' and $address!='' and $labtin1!='' and $labtin2!='' and $email!='' and $phone!='' and $mobile!='' and $lwebsite!='') {
          $sql = "update labdetails set lab_name='$labname',lab_address='$address',lab_email='$email',lab_phone='$phone',lab_mobile='$mobile',lab_url='$lwebsite',lab_tin1='$labtin1', lab_tin2='$labtin2' where id='$id'";
        $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

        if ($res) {

//if it is successfully update then display alert box in form
            $msg = '<div class="alert alert-success" id="success-alert"><b>Successfully Updated</b> </div>';
        }
     }
       
    
} else {

    //organization edit form data and fetching data from database.
    $sql1 = "select * from labdetails where id='1'";
    $res1 = mysqli_query($link, $sql1)or die(mysql_error());
    $r = mysqli_fetch_assoc($res1);
    $labname = $r['lab_name'];
    $address = $r['lab_address'];
    $email = $r['lab_email'];
    $phone = $r['lab_phone'];
    $mobile = $r['lab_mobile'];
    $lwebsite = $r['lab_url'];
    $labtin1 = $r['lab_tin1'];
    $labtin2 = $r['lab_tin2'];
    $id = $r['id'];
}
?>
<?php 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>