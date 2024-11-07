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
     
    $doctorname = trim($_POST['doctorname']);
     $time = trim($_POST['time']);
    $pname=$_POST['pname'];
     $dappointment = trim($_POST['dappointment']);
   //$var = "20/04/2012";
   $dappointment1 = str_replace('/', '-', $dappointment);
   $dappointment2=date('Y-m-d', strtotime($dappointment1));
    $age = trim($_POST['age']);
    $address = trim($_POST['address']);
   $gender = trim($_POST['gender']);
    $mobile = trim($_POST['mobile']);
     $user = trim($_POST['user']);
  //department name validation if the value is empty display error other wise asssign a value
  
//empname validation if the value is empty display error other wise asssign a value
    if (empty($doctorname)) {
 $errordoctorname = "Please Select Doctor Name";
       
    } else {

        $doctorname = test_input($doctorname);
    }
//designation validation if the value is empty display error other wise asssign a value

    if (empty($dappointment)) {
 $errordappointment = "Please Enter Date of Appointment";
       
    } else {
        $dappointment = test_input($dappointment);
    }
    
    
    //join date validation if the value is empty display error other wise asssign a value

   
    
    //qualification validation if the value is empty display error other wise asssign a value

    if (empty($time)) {
 $errortime = "Please Enter Time";
       
    } else {
        $time = test_input($time);
    }
    
    //employee department validation if the value is empty display error other wise asssign a value

    if (empty($pname)) {
 $errorpname = "Please Enter Patient Name";
       
    } else {
        $pname = test_input($pname);
    }
    
    //date of birth validation if the value is empty display error other wise asssign a value

    
    
    //gender validation if the value is empty display error other wise asssign a value

    if (empty($gender)) {
 $errorgender = "Please Select Gender";
       
    } else {
        $gender = test_input($gender);
    }
    
    //mobile validation if the value is empty display error other wise asssign a value

    if (empty($mobile)) {
 $errormobile = "Please Enter Mobile No";
       
    }else if (!is_numeric($mobile)) {
        $errormobile = 'Enter a valid Mobile No.';
    }else if (strlen($mobile) != 10) {
        $errormobile = 'Enter a valid Mobile No.';
    }  else {
        $mobile = test_input($mobile);
    }
    
    //aadhar card validation if the value is empty display error other wise asssign a value

    
    
   //salary validation if the value is empty display error other wise asssign a value 
    
    //email validation if the value is empty display error other wise asssign a value
    
    //Present Address validation if the value is empty display error other wise asssign a value
     if (empty($address)) {
 $errorAddress = "Please Enter  Address";
       
    } else {
        $address = test_input($address);
    }
    
    //permanent address validation if the value is empty display error other wise asssign a value
     
    
    
    //if the form variables are not empty then insert data into database
     if($doctorname!='' and $dappointment!='' and $time!='' and $pname!='' and $mobile!='' and $gender!='' and $address!=''){
        
        $sql = "insert into  dappointment(dname,adate,pname,mno,age,sex,address,user,time) values"
                . "('$doctorname','$dappointment2','$pname','$mobile','$age','$gender','$address','$user','$time')";
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
