<?php
include("dbconnection/connection.php");
if(isset($_REQUEST['submit'])){
 $empname = $_REQUEST['empname'];
$uname = $_REQUEST['user'];

$menu=$_REQUEST['menu'];
$result = mysqli_query($link,"select * from admin_login where empname='$empname'") or die(mysqli_error($link));
 $rows = mysqli_num_rows($result);

 
 $r=mysqli_fetch_array($result);
 $y=mysqli_query($link,"select * from employee where empid='$empname'") or die(mysqli_error($link));
	$r=mysqli_fetch_array($y);
$userid=$r['username'];
$password1=$r['password'];
$password=md5($password1);
	$empname1=$r['empid'];
//$userid=$r['username'];
//$password1=$r['password'];
//$password=md5($password1);
//$empname1=$r['empid'];
if($rows >0){
	
	$query1="update  admin_login set empname='$uname',pwd='$pwd' where empname='$ename'";
}else{
	
	$query1="insert into admin_login(user,pwd,empname) values('$userid','$password','$empname1')";
}

$query = mysqli_query($link,$query1) or die(mysqli_error($link));


//if($query){
$sql = mysqli_query($link,"delete from hr_user where emp_id=$empname1");


for($j = 0; $j < count($menu); $j++){
 $menuname = $menu[$j];
//echo  $ts="select * from hr_user where emp_id='$empname1' and menus='$menuname' ";

//$p=mysqli_query($link,$ts) or die(mysqli_error($link));

 // $count=mysqli_num_rows($p);
//if($count > 0){
	
	 //$t="update hr_user set  menus='$menuname' where emp_id='$empname1' and menus='$menuname'";
	
	//$qry=mysqli_query($t) or die(mysqli_error($link));
//}else{
	
		 echo $t="insert into hr_user(emp_id, menus, currentdate,auth_by) values('$empname1','$menuname',now(),'$uname')"; 
			
	//$qry=mysqli_query($link,$t) or die(mysqli_error($link));

	//}
	
	$qry=mysqli_query($link,$t) or die(mysqli_error($link));
		 }
 
//}		
//exit;
if($query){
	print "<script>";
	print "alert('Successfully added');";
	print "self.location='usermanagement.php';";
	print "</script>";
}else{
	print "<script>";
	print "alert('unable to add');";
	print "self.location='usermanagement.php';";
	print "</script>";
}
}
else{
	print "<script>";
	print "alert('Username or password already exists');";
	print "self.location='user.php';";
	print "</script>";
}

?>