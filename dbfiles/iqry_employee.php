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
    
$empcd=$_POST['empcd'];
$empnm=$_POST['empnm'];
$empgen=$_POST['empgen'];
$empdob1=$_POST['empdob'];
$date = DateTime::createFromFormat('d/m/Y', $empdob1);
$empdob= $date->format('Y-m-d'); 
$empbg=$_POST['empbg'];
$empmt=$_POST['empmt'];
$empnt=$_POST['empnt'];
$emprel=$_POST['emprel'];
$empcast=$_POST['empcast'];
$empsubcst=$_POST['empsubcst'];
$empms=$_POST['empms'];
$empadhar=$_POST['empadhar'];
$empmbno=$_POST['empmbno'];
$empemail=$_POST['empemail'];
$empprad=$_POST['empprad'];
$empperad=$_POST['empperad'];
$empqua=$_POST['empqua'];
$empexp=$_POST['empexp'];
$empref=$_POST['empref'];
$empdoj1=$_POST['empdoj'];

$date = DateTime::createFromFormat('d/m/Y', $empdoj1);
$empdoj= $date->format('Y-m-d');

$empcatg=$_POST['empcatg'];
$empdesi=$_POST['empdesi'];
$empsal=$_POST['empsal'];
$user=trim($_POST['user']);
$date=date('Y-m-d');
$iname=$_FILES['empfile']['name'];
   if($iname!= ""){
				// echo "hi";
				 
	$code = md5(rand());
	 //$date=date("Y");
	echo $iname =$date."-".$_FILES['empfile']['name'];
	$tmp = $_FILES['empfile']['tmp_name'];
	
	 $dir = "photos";
		       $destination =  $dir . '/' . $iname;
		         move_uploaded_file($tmp, $destination);
	//move_uploaded_file($tmp,"../staff/" . $code.$_FILES["sfile"]["name"]);
	 $fileName15 =$date."-".$_FILES['empfile']['name'];
	//$iname = $code.$_FILES["sfile"]["name"];
	$fileName15 = mysql_real_escape_string($fileName15);
	}else{
	 $fileName15 = mysql_real_escape_string($image1);
	}

 $res = mysqli_query($link, "insert into employee(empname,empid,gender,dob,bgroup,mtounge,nationality,religion,caste,subcaste,mstatus,aadharno,mobile,email,presentaddress,permientaddress,qualification,experience,reference,doj,staffcategory,designitaion,salary,user,photo)
 values('$empnm','$empcd','$empgen','$empdob','$empbg','$empmt','$empnt','$emprel','$empcast','$empsubcst','$empms','$empadhar','$empmbno','$empemail','$empprad','$empperad','$empqua','$empexp','$empref','$empdoj','$empcatg','$empdesi','$empsal','$user','$fileName15')") or die("could not connected" . mysqli_error());
 //if the form variables are not empty then update data into database
   
      // $sql = "update bedtype set BEDTYPE='$bname',AUTH_BY='$user',REMARKS='$remarks' where BEDTYPE_ID='$id'";
   // $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

    if ($res) {

//if it is successfully update then display alert box in form
       print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='addemployee.php';";
        print "</script>";
    }
           
   

}


//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

