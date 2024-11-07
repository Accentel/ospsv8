<?php
ob_start();
include('dbconnection/connection.php');
if(isset($_POST['submit'])){
	//print_r($_POST);exit;
	$name=$_POST['name'];
	$class=$_POST['class'];
	$Section=$_POST['Section'];
	$Medium=$_POST['Medium'];
	$rollno=$_POST['rollno'];
	$acd_year=$_POST['acd_year'];
	$test=$_POST['test'];
	echo $remarks=$_POST['remarks'];
	
	echo $q1="select * from remarks where class='$class' and section='$Section' and medium='$Medium' and rollno='$rollno'  and acdyear='$acd_year' and test='$test'";
	$rs41=mysqli_query($link,$q1) or die(mysql_error());
$rp1=mysqli_fetch_array($rs41);
$remarks1=$rp1['remarks'];
 $cs=$rp1['class'];
 $acyear=$rp1['acdyear'];
 $rno=$rp1['rollno'];
 $te=$rp1['test'];

if(  ($cs==$class) and ($rno==$rollno) and ($te==$test)   ){
echo	$ds="update  remarks set remarks='$remarks' where  class='$class' and section='$Section' and medium='$Medium' and rollno='$rollno'  and acdyear='$acd_year' and test='$test'";
	$query=mysqli_query($link,$ds) or die(mysql_error());
	
}else{


echo	$q="insert into remarks(name,class,section,medium,rollno,acdyear,remarks,test) values('$name','$class','$Section','$Medium','$rollno','$acd_year','$remarks','$test')";
	$query=mysqli_query($link,$q) or die(mysql_error());
	
}
	if($query){
		
		header("Location:print10.php?id=$rollno&id1=$test&id3=$class&id4=$Section&id5=$Medium&id6=$acd_year");
	}
	
	
	
	
	
}

?>