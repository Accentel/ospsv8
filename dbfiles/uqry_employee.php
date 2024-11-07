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
$image10=$_POST['image'];
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
	 $fileName15 = mysql_real_escape_string($image10);
	}
$ed=$_POST['id'];
 $res = mysqli_query($link, "update employee set empname='$empnm',empid='$empcd',gender='$empgen',dob='$empdob',bgroup='$empbg',mtounge='$empmt',nationality='$empnt',religion='$emprel',caste='$empcast',subcaste='$empsubcst',mstatus='$empms',aadharno='$empadhar',mobile='$empmbno',email='$empemail',presentaddress='$empprad',permientaddress='$empperad',qualification='$empqua',experience='$empexp',reference='$empref',doj='$empdoj',staffcategory='$empcatg',designitaion='$empdesi',salary='$empsal',user='$user',photo='$fileName15' where eid='$ed'") or die("could not connected" . mysqli_error($link));
 //if the form variables are not empty then update data into database
   
      // $sql = "update bedtype set BEDTYPE='$bname',AUTH_BY='$user',REMARKS='$remarks' where BEDTYPE_ID='$id'";
   // $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

    if ($res) {

//if it is successfully update then display alert box in form
       print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='view_employees.php';";
        print "</script>";
    }
           
   

}else{
	$id=$_GET['id'];
	$rs=mysqli_query($link,"select * from employee where eid='$id'") or die(mysqli_error($link));
	$row=mysqli_fetch_array($rs);
	$empcd=$row['empid'];
$empnm=$row['empname'];
$empgen=$row['gender'];
$empdob1=$row['dob'];
$date = DateTime::createFromFormat('Y-m-d', $empdob1);
$empdob= $date->format('d/m/Y'); 
$empbg=$row['bgroup'];
$empmt=$row['mtounge'];
$empnt=$row['nationality'];
$emprel=$row['religion'];
$empcast=$row['caste'];
$empsubcst=$row['subcaste'];
$empms=$row['mstatus'];
$empadhar=$row['aadharno'];
$empmbno=$row['mobile'];
$empemail=$row['email'];
$empprad=$row['presentaddress'];
$empperad=$row['permientaddress'];
$empqua=$row['qualification'];
$empexp=$row['experience'];
$empref=$row['reference'];
$empdoj1=$row['doj'];
$date = DateTime::createFromFormat('Y-m-d', $empdoj1);
$empdoj= $date->format('d/m/Y');

$empcatg=$row['staffcategory'];
$empdesi=$row['designitaion'];
$empsal=$row['salary'];
$photo=$row['photo'];
$eid=$row['eid'];	
	
	
	
	
	
	
}


//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

