<?php

/* =========================================================================================== */
#### insert,edit,update operations for add lab test tariff and  display form validations ####
#### Author	: 	K Srinivasa Rao						####

/* =========================================================================================== */
//to insert data into hr_emp table.if the is no errrors in form then insert data into database. 
//include '../dbconnection/connection.php';
if (isset($_POST['insert'])) {
//reading form data
     $empcode = trim($_POST['empcode']);
    $empname = trim($_POST['empname']);
    $designation = trim($_POST['designation']);
    
    $jdate = trim($_POST['jdate']);
    
    //$var = "20/04/2012";
   $date = str_replace('/', '-', $jdate);
   $jdate1=date('Y-m-d', strtotime($date));

    $qualification = trim($_POST['qualification']);
    $department = trim($_POST['department']);
    
    
    $dob = trim($_POST['dob']);
    $date1 = str_replace('/', '-', $dob);
   $dob1=date('Y-m-d', strtotime($date1));
    $gender = trim($_POST['gender']);
    $mobile = trim($_POST['mobile']);
    $salary= trim($_POST['salary']);
    
    $aadhar = trim($_POST['aadhar']);
    $email = trim($_POST['email']);
    $paddress = trim($_POST['paddress']);
    $peraddress = trim($_POST['peraddress']);
    $user = trim($_POST['user']);
    $bankname = trim($_POST['bankname']);
    $branch = trim($_POST['branch']);
    $accno=trim($_POST['accno']);
//department name validation if the value is empty display error other wise asssign a value
 
//empname validation if the value is empty display error other wise asssign a value
    if (empty($empname)) {
 $errorEname = "Please Enter Employee Name";
       
    } else {

        $empname = test_input($empname);
    }
//designation validation if the value is empty display error other wise asssign a value

    if (empty($designation)) {
 $errorDesignation = "Please Enter Designation";
       
    } else {
        $designation = test_input($designation);
    }
    
    
    //join date validation if the value is empty display error other wise asssign a value

    if (empty($jdate)) {
 $errorJdate = "Please Enter Join Date";
       
    } else {
        $jdate = test_input($jdate);
    }
    
    //qualification validation if the value is empty display error other wise asssign a value

    if (empty($qualification)) {
 $errorQualification = "Please Enter Qualification";
       
    } else {
        $qualification = test_input($qualification);
    }
    
    //employee department validation if the value is empty display error other wise asssign a value

    if (empty($department)) {
 $errorDepartment = "Please Select Department";
       
    } else {
        $department = test_input($department);
    }
    
    //date of birth validation if the value is empty display error other wise asssign a value

    if (empty($dob)) {
 $errorDob = "Please Enter Date of Birth";
       
    } else {
        $dob = test_input($dob);
    }
    
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

    if (empty($aadhar)) {
 $errorAadhar = "Please Enter Aadhar No";
       
    }else if (!is_numeric($aadhar)) {
        $errorAadhar = 'Enter a valid Aadhar No.';
    }else if (strlen($aadhar) != 12) {
        $errorAadhar = 'Enter a valid Aadhar No.';
    } else {
        $aadhar = test_input($aadhar);
    }
    
   //salary validation if the value is empty display error other wise asssign a value 
    if (empty($salary)) {
 $errorSalary = "Please Enter Salary";
       
    } else {
        $salary = test_input($salary);
    }
    //email validation if the value is empty display error other wise asssign a value
    if (empty($email)) {
 $errorEmailid = "Please Enter Email Id";
       
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorEmailid = 'Enter a valid Email.';
   } else {
        $email = test_input($email);
    }
    //Present Address validation if the value is empty display error other wise asssign a value
     if (empty($paddress)) {
 $errorPresentaddress = "Please Enter Present Address";
       
    } else {
        $paddress = test_input($paddress);
    }
    
    //permanent address validation if the value is empty display error other wise asssign a value
     if (empty($peraddress)) {
 $errorPermentaddress = "Please Enter Email Id";
       
    } else {
        $peraddress = test_input($peraddress);
    }
    
    
    //if the form variables are not empty then insert data into database
     if($empname!='' and $designation!='' and $jdate!='' and $qualification!='' and $department!='' and $dob!='' and $gender!='' and $mobile!='' and $salary!='' and $aadhar!='' and $email!='' and $paddress!='' and $peraddress!=''){
        
        $sql = "insert into  hr_emp(EMP_CODE,EMP_NAME,DESIGNATION,JOIN_DATE,QUALIFICATION,EMAIL,DOB,Gender,PADDR,CADDR,PHONE1,salary,dept_code,user,aadharno,accountno,bankname,branchname) values('$empcode','$empname','$designation','$jdate1','$qualification','$email','$dob1','$gender','$peraddress','$paddress','$mobile','$salary','$department','$user','$aadhar','$accno','$bankname','$branch')";
       // echo $link;
      $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

        if ($res) {

//if it is successfully insert then display alert box in form
            $msg = '<div class="alert alert-success" id="success-alert"><b>Data Inserted Successfully </b> </div>';
        }
    }
}


//to update data into testdetails table.if the is no errrors in form then insert data into database. 
if (isset($_POST['update'])) {
    //reading form data
     $empcode = trim($_POST['empcode']);
    $empname = trim($_POST['empname']);
    $designation = trim($_POST['designation']);
    
    $jdate = trim($_POST['jdate']);
    
    //$var = "20/04/2012";
   $date = str_replace('/', '-', $jdate);
   $jdate1=date('Y-m-d', strtotime($date));

    $qualification = trim($_POST['qualification']);
    $department = trim($_POST['department']);
    
    
    $dob = trim($_POST['dob']);
    $date1 = str_replace('/', '-', $dob);
   $dob1=date('Y-m-d', strtotime($date1));
    $gender = trim($_POST['gender']);
    $mobile = trim($_POST['mobile']);
    $salary= trim($_POST['salary']);
    
    $aadhar = trim($_POST['aadhar']);
    $email = trim($_POST['email']);
    $paddress = trim($_POST['paddress']);
    $peraddress = trim($_POST['peraddress']);
    $user = trim($_POST['user']);
    $bankname = trim($_POST['bankname']);
    $branch = trim($_POST['branch']);
    $accno=trim($_POST['accno']);
    $id=$_POST['id'];
//department name validation if the value is empty display error other wise asssign a value
 
//empname validation if the value is empty display error other wise asssign a value
    if (empty($empname)) {
 $errorEname = "Please Enter Employee Name";
       
    } else {

        $empname = test_input($empname);
    }
//designation validation if the value is empty display error other wise asssign a value

    if (empty($designation)) {
 $errorDesignation = "Please Enter Designation";
       
    } else {
        $designation = test_input($designation);
    }
    
    
    //join date validation if the value is empty display error other wise asssign a value

    if (empty($jdate)) {
 $errorJdate = "Please Enter Join Date";
       
    } else {
        $jdate = test_input($jdate);
    }
    
    //qualification validation if the value is empty display error other wise asssign a value

    if (empty($qualification)) {
 $errorQualification = "Please Enter Qualification";
       
    } else {
        $qualification = test_input($qualification);
    }
    
    //employee department validation if the value is empty display error other wise asssign a value

    if (empty($department)) {
 $errorDepartment = "Please Select Department";
       
    } else {
        $department = test_input($department);
    }
    
    //date of birth validation if the value is empty display error other wise asssign a value

    if (empty($dob)) {
 $errorDob = "Please Enter Date of Birth";
       
    } else {
        $dob = test_input($dob);
    }
    
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

    if (empty($aadhar)) {
 $errorAadhar = "Please Enter Aadhar No";
       
    }else if (!is_numeric($aadhar)) {
        $errorAadhar = 'Enter a valid Aadhar No.';
    }else if (strlen($aadhar) != 12) {
        $errorAadhar = 'Enter a valid Aadhar No.';
    } else {
        $aadhar = test_input($aadhar);
    }
    
   //salary validation if the value is empty display error other wise asssign a value 
    if (empty($salary)) {
 $errorSalary = "Please Enter Salary";
       
    } else {
        $salary = test_input($salary);
    }
    //email validation if the value is empty display error other wise asssign a value
    if (empty($email)) {
 $errorEmailid = "Please Enter Email Id";
       
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorEmailid = 'Enter a valid Email.';
   } else {
        $email = test_input($email);
    }
    //Present Address validation if the value is empty display error other wise asssign a value
     if (empty($paddress)) {
 $errorPresentaddress = "Please Enter Present Address";
       
    } else {
        $paddress = test_input($paddress);
    }
    
    //permanent address validation if the value is empty display error other wise asssign a value
     if (empty($peraddress)) {
 $errorPermentaddress = "Please Enter Email Id";
       
    } else {
        $peraddress = test_input($peraddress);
    }
    
    
    //if the form variables are not empty then insert data into database
     if($empname!='' and $designation!='' and $jdate!='' and $qualification!='' and $department!='' and $dob!='' and $gender!='' and $mobile!='' and $salary!='' and $aadhar!='' and $email!='' and $paddress!='' and $peraddress!=''){
        
        $sql = "update hr_emp set EMP_CODE='$empcode',EMP_NAME='$empname',DESIGNATION='$designation',JOIN_DATE='$jdate1',QUALIFICATION='$qualification',EMAIL='$email',DOB='$dob1',Gender='$gender',PADDR='$peraddress',CADDR='$paddress',PHONE1='$mobile',salary='$salary',dept_code='$department',user='$user',aadharno='$aadhar',accountno='$accno',bankname='$bankname',branchname='$branch' where id='$id'" ;
       // echo $link;
      $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

        if ($res) {
        print "<script>";
	print "alert('Record Updated Successfully');";
	print "self.location='employeeview.php';";
	print "</script>";
      }
    }
            
   

}else{
    
    //when click edit button then executed query based on id.and fetching data into variables
     $dcode = $_REQUEST['id'];
    $q = "select * from hr_emp where id='$dcode'";
    $k = mysqli_query($link, $q) or die(mysql_error());
    $p = mysqli_fetch_assoc($k);

    $empcode = $p['EMP_CODE'];
    $empname = $p['EMP_NAME'];
    $designation =$p['DESIGNATION'];
    
    $jdate = $p['JOIN_DATE'];
    
    //$var = "20/04/2012";
   $date = str_replace('-', '/', $jdate);
   $jdate1=date('d/m/Y', strtotime($date));

    $qualification = $p['QUALIFICATION'];
    $department = $p['dept_code'];
    
    
    $dob = $p['DOB'];
    $date1 = str_replace('/', '-', $dob);
   $dob1=date('d/m/Y', strtotime($date1));
    $gender = $p['Gender'];
    $mobile = $p['PHONE1'];
    $salary= $p['salary'];
    
    $aadhar = $p['aadharno'];
    $email = $p['EMAIL'];
    $paddress = $p['CADDR'];
    $peraddress =$p['PADDR'];
    $user = $p['user'];
    $bankname = $p['bankname'];
    $branch = $p['branchname'];
    $accno=$p['accountno'];
    $id=$p['id'];
}


//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
