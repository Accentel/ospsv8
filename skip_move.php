<?php
include('dbconnection/connection.php');
if(isset($_POST['submit1'])){
	//print_r($_POST);
	 $class1=$_POST['class2'];
	 $sect2=$_POST['sect2'];
	 $med2=$_POST['med2'];
	 $acdyear1=$_POST['toyear'];
	  $toclass=$_POST['toclass'];
	 
	// $m=date('m');
	
	 
	 
$cnt = count($_POST['r_num']);
//$cnt5 = count($_POST['acdyear']);
$cnt2 = count($_POST['name']);
//$cnt3 = count($_POST['selector']);
$cnt4 = count($_POST['phone']);
 
if ($cnt > 0 && $cnt == $cnt4) {
    $insertArr = array();

    for ($i=0; $i<$cnt; $i++) {
			if( $_POST['r_num'][$i]!='' ){
		
       

$r_num=$_POST['r_num'][$i];
$name=$_POST['name'][$i];
$phone=$_POST['phone'][$i];
$Admission_No=$_POST['admission'][$i];
echo $p="update student_register set 	acyear='$acdyear1',class='$toclass' where rollno='$r_num' and sname='$name'  and phoneno='$phone' and admno='$Admission_No'  ";
$query=mysqli_query($link,$p) or die();


}
	


}
 if($query){

	 	print "<script>";
		print "alert('Sucessfully Saved');";
		print "self.location='skip.php';";
		print "</script>";

 }
 else{
		print "<script>";
		print "alert('unable to save');";
		print "self.location='skip.php';";
		print "</script>";
	}
	 
}
}

?>
	