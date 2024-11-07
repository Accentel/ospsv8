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
    //$file=$_POST['file'];
$year=$_POST['year'];
$admindt1=$_POST['admindt'];
$date = DateTime::createFromFormat('d/m/Y', $admindt1);
$admindt= $date->format('Y-m-d'); 
//$admindt=$_POST['admindt'];
$adminno=$_POST['adminno'];
$class=$_POST['class'];
$rolno=$_POST['rolno'];
$medium=$_POST['medium'];
$section=$_POST['section'];
$stdnm=$_POST['stdnm'];
$gen=$_POST['gen'];
$fatnm=$_POST['fatnm'];
$fatqua=$_POST['fatqua'];
$fatocu=$_POST['fatocu'];
$momnm=$_POST['momnm'];
$momqua=$_POST['momqua'];
$adminno=$_POST['adminno'];
$momocu=$_POST['momocu'];
$bg=$_POST['bg'];
$dob1=$_POST['dob'];
$date = DateTime::createFromFormat('d/m/Y', $dob1);
$dob= $date->format('Y-m-d'); 
$nat=$_POST['nat'];
$rel=$_POST['rel'];
$caste=$_POST['caste'];
$subcaste=$_POST['subcaste'];
$mt=$_POST['mt'];
$adhar=$_POST['adhar'];
$np=$_POST['np'];
$addres=$_POST['addres'];
$pn=$_POST['pn'];
$email=$_POST['email'];
$Identity1=$_POST['Identity1'];
$Identity2=$_POST['Identity2'];
$med=$_POST['med'];
$fee=$_POST['fee'];
$fl=$_POST['fl'];
$sl=$_POST['sl'];
$doc=$_POST['doc'];
$lcs=$_POST['lcs'];
$yop=$_POST['yop'];
$nos=$_POST['nos'];
$tc=$_POST['tc']; 
$smed=$_POST['smed'];
   $user=trim($_POST['user']);
   $date=date('Y-m-d');
   $iname = $_FILES['file']['name'];
   if($iname!= ""){
				// echo "hi";
				 
	$code = md5(rand());
	 //$date=date("Y");
	echo $iname =$date."-".$_FILES['file']['name'];
	$tmp = $_FILES['file']['tmp_name'];
	
	 $dir = "photos";
		       $destination =  $dir . '/' . $iname;
		         move_uploaded_file($tmp, $destination);
	//move_uploaded_file($tmp,"../staff/" . $code.$_FILES["sfile"]["name"]);
	 $iname1 =$date."-".$_FILES['file']['name'];
	//$iname = $code.$_FILES["sfile"]["name"];
	$iname1 = ($iname1);
	}else{
	 $iname1 = ($image1);
	}
   
   
   $doc = $_FILES['doc']['name'];
   if($doc!= ""){
				// echo "hi";
				 
	$code = md5(rand());
	 //$date=date("Y");
	 $doc =$date."-".$_FILES['doc']['name'];
	$tmp = $_FILES['doc']['tmp_name'];
	
	 $dir = "photos";
		       $destination =  $dir . '/' . $doc;
		         move_uploaded_file($tmp, $destination);
	//move_uploaded_file($tmp,"../staff/" . $code.$_FILES["sfile"]["name"]);
	 $doc1 =$date."-".$_FILES['doc']['name'];
	//$iname = $code.$_FILES["sfile"]["name"];
	$doc1 = ($doc1);
	}else{
	 $doc1 = ($image1);
	}
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   

 $res = mysqli_query($link, "insert into student_register(acyear,admdate,admno,class,rollno,medium,section,sname,gender,fname,fqualification,foccupation,mname,mqualification,moccupation,bg,dob,nationality,religion,caste,scaste,mtounge,aadhar,nativeplace,address,phoneno,emailid,mark1,mark2,ftype,flangruage,slanguage,docupload,pclass,yearpass,schoolname,tcno,pmedium,user,photo)
 values('$year','$admindt','$adminno','$class','$rolno','$medium','$section','$stdnm','$gen','$fatnm','$fatqua','$fatocu','$momnm','$momqua','$momocu','$bg','$dob','$nat','$rel','$caste','$subcaste','$mt','$adhar','$np','$addres','$pn','$email','$Identity1','$Identity2','$fee','$fl','$sl','$doc1','$lcs','$yop','$nos','$tc','$smed','$user','$iname1')") or die("could not connected" . mysqli_error());
 //if the form variables are not empty then update data into database
   
      // $sql = "update bedtype set BEDTYPE='$bname',AUTH_BY='$user',REMARKS='$remarks' where BEDTYPE_ID='$id'";
   // $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

    if ($res) {

//if it is successfully update then display alert box in form
       print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='addadmissions.php';";
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

