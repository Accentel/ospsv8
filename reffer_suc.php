<?php //include('config.php');

include('dbconnection/connection.php');
if(isset($_POST['submit'])){
$req_ref=$_POST['req_ref'];	
$site_name=$_POST['site_name'];	
$state=$_POST['state'];
$site_type=$_POST['site_type'];	
$district=$_POST['district'];
$indus_id=$_POST['indus_id'];
$seeking_id=$_POST['seeking_id'];
$seeking_opt=$_POST['seeking_opt'];
$allcoation_date=$_POST['allcoation_date'];
$po_num=$_POST['po_num'];
$comp_date=$_POST['comp_date'];
$location=$_POST['location'];
	
	$sq=mysqli_query($link,"INSERT INTO `refferences`(`req_ref`, `site_name`, `district`, `state`, `indus_id`, `seeking_id`, `seeking_opt`,`po_num`,`allocation_date`,`location`,`sitetype`,`comp_date`)
	 VALUES ('$req_ref', '$site_name', '$district', '$state', '$indus_id', '$seeking_id', '$seeking_opt','$po_num','$allcoation_date','$location','$site_type','$comp_date')");
	
	if($sq){
	print "<script>";
	print "alert('Sucessfully Saved');";
	print "self.location='reffer_list.php';";
	print "</script>";

}
}




if(isset($_POST['update'])){
	$id=$_POST['id'];
	$req_ref=$_POST['req_ref'];	
$site_name=$_POST['site_name'];	
$state=$_POST['state'];
 $district=$_POST['district'];	
$district=$_POST['district'];
$indus_id=$_POST['indus_id'];
$seeking_id=$_POST['seeking_id'];
$seeking_opt=$_POST['seeking_opt'];

	
	$sq=mysqli_query($link,"update  `refferences` set `req_ref`='$req_ref', `site_name`='$site_name', `district`='$district',
	 `state`='$state', `indus_id`='$indus_id', `seeking_id`='$seeking_id', `seeking_opt`='$seeking_opt' where id='$id'");
	
	if($sq){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='reffer_list.php';";
	print "</script>";
	}
}

?>
