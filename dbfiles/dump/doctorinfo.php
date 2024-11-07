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
     $specification = trim($_POST['specification']);
    $dname = trim($_POST['dname']);
     $desig = trim($_POST['desig']);
    $dutytype=$_POST['duty'];
     $joindate = trim($_POST['joindate']);
    
    //$var = "20/04/2012";
   $joindate1 = str_replace('/', '-', $joindate);
   $joindate2=date('Y-m-d', strtotime($joindate1));

    $dqualification = trim($_POST['dqualification']);
    $ddepartment = trim($_POST['ddepartment']);
    
    
    $dateob = trim($_POST['dateob']);
    $dateob1 = str_replace('/', '-', $dateob);
   $dob1=date('Y-m-d', strtotime($dateob1));
    $gender1 = trim($_POST['gender1']);
    $mobile1 = trim($_POST['mobile1']);
    $consultfee= trim($_POST['consultfee']);
    
    $aadhar1 = trim($_POST['aadhar1']);
    $demail = trim($_POST['demail']);
    $paddress1 = trim($_POST['paddress1']);
    $peraddress1 = trim($_POST['peraddress1']);
    $user = trim($_POST['user']);
    $phno = trim($_POST['phno']);
    $dshare = trim($_POST['dshare']);
    $hshare=trim($_POST['hshare']);
//department name validation if the value is empty display error other wise asssign a value
  if (empty($specification)) {
 $errorSpecification = "Please Enter Doctor Specification";
       
    } else {

        $specification = test_input($specification);
    }
//empname validation if the value is empty display error other wise asssign a value
    if (empty($dname)) {
 $errorDname = "Please Enter Doctor Name";
       
    } else {

        $dname = test_input($dname);
    }
//designation validation if the value is empty display error other wise asssign a value

    if (empty($desig)) {
 $errorDesig = "Please Enter Designation";
       
    } else {
        $desig = test_input($desig);
    }
    
    
    //join date validation if the value is empty display error other wise asssign a value

    if (empty($joindate)) {
 $errorJdate = "Please Enter Join Date";
       
    } else {
        $joindate = test_input($joindate);
    }
    
    //qualification validation if the value is empty display error other wise asssign a value

    if (empty($dqualification)) {
 $errorDqualification = "Please Enter Qualification";
       
    } else {
        $dqualification = test_input($dqualification);
    }
    
    //employee department validation if the value is empty display error other wise asssign a value

    if (empty($ddepartment)) {
 $errorDepartment = "Please Select Department";
       
    } else {
        $ddepartment = test_input($ddepartment);
    }
    
    //date of birth validation if the value is empty display error other wise asssign a value

    if (empty($dateob)) {
 $errorDateob = "Please Enter Date of Birth";
       
    } else {
        $dateobb = test_input($dateob);
    }
    
    //gender validation if the value is empty display error other wise asssign a value

    if (empty($gender1)) {
 $errorGender = "Please Select Gender";
       
    } else {
        $gender1 = test_input($gender1);
    }
    
    //mobile validation if the value is empty display error other wise asssign a value

    if (empty($mobile1)) {
 $errorMobile = "Please Enter Mobile No";
       
    }else if (!is_numeric($mobile1)) {
        $errorMobile = 'Enter a valid Mobile No.';
    }else if (strlen($mobile1) != 10) {
        $errorMobile = 'Enter a valid Mobile No.';
    }  else {
        $mobile = test_input($mobile);
    }
    
    //aadhar card validation if the value is empty display error other wise asssign a value

    if (empty($aadhar1)) {
 $errorAadhar = "Please Enter Aadhar No";
       
    }else if (!is_numeric($aadhar1)) {
        $errorAadhar = 'Enter a valid Aadhar No.';
    }else if (strlen($aadhar1) != 12) {
        $errorAadhar = 'Enter a valid Aadhar No.';
    } else {
        $aadhar1 = test_input($aadhar1);
    }
    
   //salary validation if the value is empty display error other wise asssign a value 
    if (empty($consultfee)) {
 $errorConsultfee = "Please Enter Consultfee";
       
    } else {
        $consultfee = test_input($consultfee);
    }
    //email validation if the value is empty display error other wise asssign a value
    if (empty($demail)) {
 $errorEmailid = "Please Enter Email Id";
       
    }else if (!filter_var($demail, FILTER_VALIDATE_EMAIL)) {
    $errorEmailid = 'Enter a valid Email.';
   } else {
        $demail = test_input($demail);
    }
    //Present Address validation if the value is empty display error other wise asssign a value
     if (empty($paddress1)) {
 $errorPresentaddress = "Please Enter Present Address";
       
    } else {
        $paddress1 = test_input($paddress1);
    }
    
    //permanent address validation if the value is empty display error other wise asssign a value
     if (empty($peraddress1)) {
 $errorPermentaddress = "Please Enter Permanent Address";
       
    } else {
        $peraddress1 = test_input($peraddress1);
    }
    
    
    //if the form variables are not empty then insert data into database
     if($dname!='' and $specification!='' and $desig!='' and $joindate!='' and $dqualification!='' and $ddepartment!='' and $dateob!='' and $gender1!='' and $mobile1!='' and $consultfee!='' and $aadhar1!='' and $demail!='' and $paddress1!='' and $peraddress1!=''){
        
        $sql = "insert into  doct_infor(specification,dname,qualification,designation,dept,doctorduty,phnum,mobile,present_address,consultfee,hos_share,doct_share,JOIN_DATE,EMAIL,dob,Gender,permient_address,user,aadharno) values"
                . "('$specification','$dname','$dqualification','$desig','$ddepartment','$dutytype','$phno','$mobile1','$paddress1','$consultfee','$hshare','$dshare','$joindate2','$demail','$dateob1','$gender1','$peraddress1','$user','$aadhar1')";
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
