<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['update'])) {
    //reading form data
     $specification = trim($_POST['specification']);
    $dname = trim($_POST['dname']);
     $desig = trim($_POST['desig']);
    $dutytype=$_POST['duty'];
    $joindate1 = trim($_POST['joindate']);
    
    //$var = "20/04/2012";
   $joindate = str_replace('/', '-', $joindate1);
   $joindate=date('Y-m-d', strtotime($joindate));

    $dqualification = trim($_POST['dqualification']);
    $ddepartment = trim($_POST['ddepartment']);
    
    
     $dateob = trim($_POST['dateob']);
    $dateob1 = str_replace('/', '-', $dateob);
   echo $dob1=date('Y-m-d', strtotime($dateob1));
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
    $id=$_POST['id'];
//department name validation if the value is empty display error other wise asssign a value
 
//empname validation if the value is empty display error other wise asssign a value
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

    if (empty($joindate1)) {
 $errorJdate = "Please Enter Join Date";
       
    } else {
        $joindate1 = test_input($joindate1);
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
        $dateob = test_input($dateob);
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
        
       $sql = "update doct_infor set specification='$specification',dname='$dname',qualification='$dqualification',designation='$desig',dept='$ddepartment',doctorduty='$dutytype',phnum='$phno',mobile='$mobile1',present_address='$paddress1',consultfee='$consultfee',hos_share='$hshare',doct_share='$dshare',JOIN_DATE='$joindate',EMAIL='$demail',dob='$dob1',Gender='$gender1',permient_address='$peraddress1',user='$user',aadharno='$aadhar1' where id='$id'";
               
       // echo $link;
      $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

        if ($res) {
        print "<script>";
	print "alert('Record Updated Successfully');";
	print "self.location='doctorsview.php';";
	print "</script>";
      }
    }
            
   

}else{
    
    //when click edit button then executed query based on id.and fetching data into variables
     $dcode = $_REQUEST['id'];
    $q = "select * from doct_infor where id='$dcode'";
    $k = mysqli_query($link, $q) or die(mysql_error());
    $p = mysqli_fetch_assoc($k);
 
//    $jdate = $p['JOIN_DATE'];
//    
//    //$var = "20/04/2012";
//   $date = str_replace('/', '/', $jdate);
//   $jdate1=date('d/m/Y', strtotime($date));
//
//    $qualification = $p['QUALIFICATION'];
//    $department = $p['dept_code'];
//    
//    
//    $dob = $p['DOB'];
//    $date1 = str_replace('/', '-', $dob);
//   $dob1=date('d/m/Y', strtotime($date1));
//   
//   
   
   
    $specification = trim($p['specification']);
    $dname = trim($p['dname']);
     $desig = trim($p['designation']);
    $dutytype=$_POST['doctorduty'];
    $joindate1 = trim($p['JOIN_DATE']);
    
    //$var = "20/04/2012";
   $joindate = str_replace('-', '/', $joindate1);
   $joindate1=date('d/m/Y', strtotime($joindate));

    $dqualification = trim($p['qualification']);
    $ddepartment = trim($p['dept']);
    
    
    $dateob2 = trim($p['dob']);
    
    
    $dateob1 = str_replace('-', '/', $dateob2);
   $dateob=date('d/m/Y', strtotime($dateob1));
    $gender1 = trim($p['Gender']);
    $mobile1 = trim($p['mobile']);
    $consultfee= trim($p['consultfee']);
    
    $aadhar1 = trim($p['aadharno']);
    $demail = trim($p['EMAIL']);
    $paddress1 = trim($p['present_address']);
    $peraddress1 = trim($p['permient_address']);
    $user = trim($p['user']);
    $phno = trim($p['phnum']);
    $dshare = trim($p['doct_share']);
    $hshare=trim($p['hos_share']);
    $id=$p['id'];
    //$id=$p['id'];
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
