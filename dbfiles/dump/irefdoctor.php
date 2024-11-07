<?php

/* =========================================================================================== */
#### insert,edit,update operations for add lab test tariff and  display form validations ####
#### Author	: 	K Srinivasa Rao						####

/* =========================================================================================== */
//to insert data into hr_emp table.if the is no errrors in form then insert data into database. 
//include '../dbconnection/connection.php';
if (isset($_POST['insert'])) {
//reading form data
    //print_r($_POST);
     $refcode = trim($_POST['refcode']);
    $doctorname = trim($_POST['doctorname']);
     $mobile = trim($_POST['mobile']);
    $gender=$_POST['gender'];
     
    
    $address = trim($_POST['address']);
    $doctorshare = trim($_POST['doctorshare']);
    $iplab = trim($_POST['iplab']);
    $oplab = trim($_POST['oplab']);
    $user = trim($_POST['user']);
     $email = trim($_POST['email']);
    
//department name validation if the value is empty display error other wise asssign a value
  if (empty($doctorname)) {
 $errordoctorname = "Please Enter Doctor Name";
       
    } else {

        $doctorname = test_input($doctorname);
    }
//empname validation if the value is empty display error other wise asssign a value
    
//designation validation if the value is empty display error other wise asssign a value

    if (empty($address)) {
 $errorAddress = "Please Enter Address";
       
    } else {
        $address = test_input($address);
    }
    
    
    //join date validation if the value is empty display error other wise asssign a value

   
    //qualification validation if the value is empty display error other wise asssign a value

   
    
    //employee department validation if the value is empty display error other wise asssign a value

    
    //date of birth validation if the value is empty display error other wise asssign a value

   
    
    //gender validation if the value is empty display error other wise asssign a value

    if (empty($gender)) {
 $errorGender = "Please Select Gender";
       
    } else {
        $gender = test_input($gender);
    }
    
    //mobile validation if the value is empty display error other wise asssign a value

    if (empty($mobile)) {
 $errorMobile = "Please Enter Mobile No";
       
    }else if (!is_numeric($mobile)) {
        $errorMobile = 'Enter a valid Mobile No.';
    }else if (strlen($mobile) != 10) {
        $errorMobile = 'Enter a valid Mobile No.';
    }  else {
        $mobile = test_input($mobile);
    }
    
    //aadhar card validation if the value is empty display error other wise asssign a value
if (empty($doctorshare)) {
 $errorDoctorshare = "Please Select Gender";
       
    } else {
        $doctorshare = test_input($doctorshare);
    }
    
   //salary validation if the value is empty display error other wise asssign a value 
    if (empty($iplab)) {
 $erroriplab = "Please Enter IP Lab Share";
       
    } else {
        $iplab = test_input($iplab);
    }
    //email validation if the value is empty display error other wise asssign a value
    if (empty($oplab)) {
 $erroroplab = "Please Enter OP Lab";
       
    } else {
        $oplab = test_input($oplab);
    }
    //Present Address validation if the value is empty display error other wise asssign a value
    
    
    //permanent address validation if the value is empty display error other wise asssign a value
    
    
    
    //if the form variables are not empty then insert data into database
     if($doctorname!='' and $gender!='' and $mobile!='' and $address!='' and $doctorshare!='' and $iplab!='' and $oplab!=''){
        
        $sql = "insert into  referal_doctor(refcode,ref_docname,mobile,address,email,iplabshare,doctorshare,oplabshare,user,gender) values"
                . "('$refcode','$doctorname','$mobile','$address','$email','$iplab','$doctorshare','$oplab','$user','$gender')";
       // echo $link;
      $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error($link));

        if ($res) {

//if it is successfully insert then display alert box in form
            $msg = '<div class="alert alert-success" id="success-alert"><b>Data Inserted Successfully </b> </div>';
        }
    }
}


//to update data into testdetails table.if the is no errrors in form then insert data into database. 


//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
