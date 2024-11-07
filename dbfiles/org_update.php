<?php

/* =========================================================================================== */
#### Edit and Update data and checking validations for organization. if it is false display errors else redirect to dashboard ####
#### Author	: 	K Srinivasa Rao						####

/* =========================================================================================== */
session_start();
//load the db connection;
//require_once 'dbconnection/connection.php';
//update the organization details and validations
if (isset($_POST['submit'])) {
    //read the login form variables
    $hospitalname = trim($_POST['hospitalname']);
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $mobile = trim($_POST['mobile']);
    $website = trim($_POST['website']);
    $code = trim($_POST['code']);
    $id = trim($_POST['id']);
    $password1 = trim($_POST['pwd']);
    $password = md5($password1);

    //check the form validations
    if (empty($hospitalname) or empty($address) or empty($email)or empty($phone)or empty($mobile)or empty($website) or empty($code)) {
        $errorName = "Please Enter Hospital Name";
        $erroraddress = "Please Enter Hospital Address";
        $erroremail = "Please Enter Email";
        $errorphone = "Please Enter Phone No";
        $errormobile = "Please Enter Mobile No";
        $errorurl = "Please Enter Web Site URL";
        $errorcode = "Please Enter Hospital Code";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erroremail = 'Enter a valid Email.';
    } else if (!is_numeric($mobile)) {
        $errormobile = 'Enter a valid Mobile No.';
    } else if (strlen($mobile) != 10) {
        $errormobile = 'Enter a valid Mobile No.';
    } else if (filter_var($website, FILTER_VALIDATE_URL)) {
        $errorurl = 'Enter a valid URL.';
    } else {
        $sql = "update organization set org_name='$hospitalname',org_address='$address',org_email='$email',org_phone='$phone',org_mobile='$mobile',org_url='$website',org_code='$code' where id='$id'";
        $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

        if ($res) {

//if it is successfully update then display alert box in form
           // $msg = '<div class="alert alert-success" id="success-alert"><b>Successfully Updated</b> </div>';
        print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='organization.php';";
        print "</script>";
	   }
    }
} else {

    //organization edit form data and fetching data from database.
    $sql1 = "select * from organization where id='1'";
    $res1 = mysqli_query($link, $sql1)or die(mysql_error());
    $r = mysqli_fetch_assoc($res1);
    $hospitalname = $r['org_name'];
    $address = $r['org_address'];
    $email = $r['org_email'];
    $phone = $r['org_phone'];
    $mobile = $r['org_mobile'];
    $website = $r['org_url'];
    $code = $r['org_code'];
    $id = $r['id'];
}
?>