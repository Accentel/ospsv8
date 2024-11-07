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
echo $admindt= $date->format('Y-m-d'); 

//$admindt=$_POST['admindt'];
$adminno=$_POST['adminno'];
$class=$_POST['class'];
$rolno=$_POST['rolno'];
$medium=$_POST['smed'];
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
$med=$_POST['smed'];
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
   $image20 = $_POST['photo'];
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
	 $iname1 = ($image20);
	}
   
   
   $image10 = $_POST['doc1'];
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
	 $doc1 = ($image10);
	}
   
   $id=$_POST['id'];
   
 
echo $t="update  student_register set acyear='$year',admdate='$admindt',admno='$adminno',class='$class',rollno='$rolno',medium='$medium',section='$section',sname='$stdnm',gender='$gen',fname='$fatnm',fqualification='$fatqua',foccupation='$fatocu',mname='$momnm',mqualification='$momqua',moccupation='$momocu',bg='$bg',dob='$dob',nationality='$nat',religion='$rel',caste='$caste',scaste='$subcaste',mtounge='$mt',aadhar='$adhar',nativeplace='$np',address='$addres',phoneno='$pn',emailid='$email',mark1='$Identity1',mark2='$Identity2',ftype='$fee',flangruage='$fl',slanguage='$sl',docupload='$doc1',pclass='$lcs',yearpass='$yop',schoolname='$nos',tcno='$tc',pmedium='$smed',user='$user',photo='$iname1'  where id='$id'";
 //exit;
 $res = mysqli_query($link,$t ) or die("could not connected" . mysqli_error($link));
 //if the form variables are not empty then update data into database
   
      // $sql = "update bedtype set BEDTYPE='$bname',AUTH_BY='$user',REMARKS='$remarks' where BEDTYPE_ID='$id'";
   // $res = mysqli_query($link, $sql) or die("could not connected" . mysqli_error());

    if ($res) {

//if it is successfully update then display alert box in form
       print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='view_admissions.php';";
        print "</script>";
    }
   
            
   

}else{
	$id=$_GET['id'];
	$p=mysqli_query($link,"select * from student_register where id='$id'") or die(mysqli_error($link));
	$r=mysqli_fetch_array($p);
		$photo=$r['photo'];
		$acyear=$r['acyear'];
		$admdate1=$r['admdate'];
		
		$date = DateTime::createFromFormat('Y-m-d', $admdate1);
		$admdate= $date->format('d/m/Y'); 
		$admno=$r['admno'];
		$class=$r['class'];
		$rollno=$r['rollno'];
		$medium=$r['medium'];
		$section=$r['section'];
		$sname=$r['sname'];
		$gender=$r['gender'];
		$fname=$r['fname'];
		$fqualification=$r['fqualification'];
		$foccupation=$r['foccupation'];
		$mname=$r['mname'];
		$mqualification=$r['mqualification'];
		$moccupation=$r['moccupation'];
		$bg=$r['bg'];
		$dob1=$r['dob'];
		$date = DateTime::createFromFormat('Y-m-d', $dob1);
		$dob= $date->format('d/m/Y'); 
		$nationality=$r['nationality'];
		$religion=$r['religion'];
		$caste=$r['caste'];
		$scaste=$r['scaste'];
		$mtounge=$r['mtounge'];
		$aadhar=$r['aadhar'];
		$phoneno=$r['phoneno'];
		$nativeplace=$r['nativeplace'];
		$address=$r['address'];
		$emailid=$r['emailid'];
		$mark1=$r['mark1'];
		$mark2=$r['mark2'];
		$ftype=$r['ftype'];
		$flangruage=$r['flangruage'];
		$slangruage=$r['slangruage'];
		$docupload=$r['docupload'];
		$pclass=$r['pclass'];
		$yearpass=$r['yearpass'];
		$schoolname=$r['schoolname'];
		$tcno=$r['tcno'];
		$pmedium=$r['pmedium'];
		$aid=$r['id'];
		
	
}


//form input validations 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

