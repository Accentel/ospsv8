<?php //include('config.php');

include('dbconnection/connection.php');
if(isset($_POST['submit'])){
	$service_no=$_POST['service_no'];	
$po_no=$_POST['po_no'];	
$po_date=$_POST['po_date'];
 $site_name=$_POST['site_name'];	
$district=$_POST['district'];
$indus_id=$_POST['indus_id'];
$req_ref=$_POST['req_ref'];
$seeking_id=$_POST['seeking_id'];
$state=$_POST['state'];
$seeking_opt=$_POST['seeking_opt'];
$rfaid_date=$_POST['rfaid_date'];
$allcoation_date=$_POST['allcoation_date'];
$wcc_num=$_POST['wcc_num'];
$wcc_rec_num=$_POST['wcc_rec_num'];
//$total_amnt=$_POST['total_amnt'];
 $tot=$_POST['tot'];
  $tot1=$_POST['tot1']; 
$tot2=$tot1/2;
//$total_amnt=$tot+$tot2;
	$date=$_POST['inv_date'];
	
	
	$sq=mysqli_query($link,"INSERT INTO `add_bill1`(`date`, `service_no`, `po_no`, `po_date`, `site_name`, `district`, `indus_id`, 
	`req_ref`, `seeking_id`, `state`, `seeking_opt`, `rfaid_date`, `allcoation_date`, 
	`wcc_num`, `wcc_rec_num`, `total_amnt`,`total_sgst`,`total_cgst`,`total_gst`)
	 VALUES ('$date','$service_no','$po_no','$po_date','$site_name','$district','$indus_id','$req_ref','$seeking_id',
	 '$state','$seeking_opt',
	 '$rfaid_date','$allcoation_date','$wcc_num','$wcc_rec_num','$tot','$tot2','$tot2','$tot1')");
//	$id4=mysqli_insert_id($link);
	
	$cnt = count($_POST['item_code']);
	if ($cnt > 0 && $cnt == $cnt) {

for ($i=0; $i<$cnt; $i++) {
if( $_POST['item_code'][$i]!='' ){
$item_code=$_POST['item_code'][$i];
$item_desc=$_POST['item_desc'][$i];
$price=$_POST['price'][$i];
$qty=$_POST['qty'][$i];
$amnt=$_POST['amnt'][$i];
$sgst=$_POST['sgst'][$i];
$cgst=$_POST['cgst'][$i];
$gst_amnt=$_POST['gst_amnt'][$i];
   
	$query = "INSERT INTO add_bill ( `service_no`, `item_code`, `price`, `qty`, `tax_amnt`, `gst_amnt`, `sgst`, `cgst`) 
	VALUES 
 ('$service_no','$item_code','$price','$qty','$amnt','$gst_amnt','$sgst','$cgst')";
 $res=mysqli_query($link,$query) or trigger_error("Insert failed: " . mysql_error());
}
     
}
	}
	if($res){
	print "<script>";
	print "alert('Sucessfully Saved');";
	print "self.location='osinvoice.php?id=$service_no';";
	print "</script>";
//header('Location:osinvoice.php?id=');
}
}




if(isset($_POST['update'])){
	$id=$_POST['id'];
	$service_no=$_POST['service_no'];	
$po_no=$_POST['po_no'];	
$po_date=$_POST['po_date'];
 $site_name=$_POST['site_name'];	
$district=$_POST['district'];
$indus_id=$_POST['indus_id'];
$req_ref=$_POST['req_ref'];
$seeking_id=$_POST['seeking_id'];
$state=$_POST['state'];
$seeking_opt=$_POST['seeking_opt'];
$rfaid_date=$_POST['rfaid_date'];
$allcoation_date=$_POST['allcoation_date'];
$wcc_num=$_POST['wcc_num'];
$wcc_rec_num=$_POST['wcc_rec_num'];
//$total_amnt=$_POST['total_amnt'];
$tot=$_POST['tot'];
  $tot1=$_POST['tot1']; 
$tot2=$tot1/2;
//$total_amnt=$tot+$tot2;
	$date=$_POST['inv_date'];;
	$bar_code=$_POST['bar_code'];
	$date=date('Y-m-d');
	
	if($bar_code!=''){
	$sq=mysqli_query($link,"update `add_bill1` set `date`='$date', `service_no`='$service_no', `po_no`='$po_no', `po_date`='$po_date', `site_name`='$site_name',
	 `district`='$district', `indus_id`='$indus_id', 
	`req_ref`='$req_ref', `seeking_id`='$seeking_id', `state`='$state', `seeking_opt`='$seeking_opt', `rfaid_date`='$rfaid_date',
	 `allcoation_date`='$allcoation_date', 
	`wcc_num`='$wcc_num', `wcc_rec_num`='$wcc_rec_num', `total_amnt`='$tot',`total_sgst`='$tot1',
	`total_cgst`='$tot1',`total_gst`='$tot2',qr_code='$bar_code',`bill_status`='Approved',bill_submit_date='$date' where id='$id'");
	
	} else {
		$sq=mysqli_query($link,"update `add_bill1` set `date`='$date', `service_no`='$service_no', `po_no`='$po_no', `po_date`='$po_date', `site_name`='$site_name',
	 `district`='$district', `indus_id`='$indus_id', 
	`req_ref`='$req_ref', `seeking_id`='$seeking_id', `state`='$state', `seeking_opt`='$seeking_opt', `rfaid_date`='$rfaid_date',
	 `allcoation_date`='$allcoation_date', 
	`wcc_num`='$wcc_num', `wcc_rec_num`='$wcc_rec_num', `total_amnt`='$tot',`total_sgst`='$tot2',
	`total_cgst`='$tot2',`total_gst`='$tot1' where id='$id'");
	}
	
	$cnt = count($_POST['item_code']);
	if ($cnt > 0 && $cnt == $cnt) {

for ($i=0; $i<$cnt; $i++) {
if( $_POST['item_code'][$i]!='' ){
$item_code=$_POST['item_code'][$i];
$item_desc=$_POST['item_desc'][$i];
$price=$_POST['price'][$i];
$qty=$_POST['qty'][$i];
$amnt=$_POST['amnt'][$i];
$sgst=$_POST['sgst'][$i];
$cgst=$_POST['cgst'][$i];
$gst_amnt=$_POST['gst_amnt'][$i];
$id1=$_POST['id1'][$i];
   
	 $query = "update add_bill set `service_no`='$service_no', `item_code`='$item_code', `price`='$price',
	 `qty`='$qty', `tax_amnt`='$amnt', `gst_amnt`='$gst_amnt', `sgst`='$sgst', `cgst`='$cgst' where id='$id1'"; 
 $res=mysqli_query($link,$query) or trigger_error("Update failed: " . mysql_error());
}
     
}
	}
	if($res){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='bill_list.php';";
	print "</script>";

}
}

?>
