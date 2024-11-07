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
$sgsttotal=$_POST['sgsttotal'];
$cgsttotal=$_POST['cgsttotal'];
$tgsttotal=$sgsttotal+$cgsttotal;

//$total_amnt=$tot+$tot2;
	$date=$_POST['inv_date'];
	$loc=$_POST['loc'];
	$ses=$_POST['ses'];
	$temp=$_POST['temp'];
	$t=mysqli_query($link,"select * from employee where username='$ses'") or die(mysqli_error($link));
	$tr=mysqli_fetch_array($t);
	 $empemail=$tr['emp_email'];
	
	$sq=mysqli_query($link,"INSERT INTO `add_bill1`(`date`, `service_no`, `po_no`, `po_date`, `site_name`, `district`, `indus_id`, 
	`req_ref`, `seeking_id`, `state`, `seeking_opt`, `rfaid_date`, `allcoation_date`, 
	`wcc_num`, `wcc_rec_num`, `total_amnt`,`total_sgst`,`total_cgst`,`total_gst`,`location`,`user`)
	 VALUES ('$date','$service_no','$po_no','$po_date','$site_name','$district','$indus_id','$req_ref','$seeking_id',
	 '$state','$seeking_opt',
	 '$rfaid_date','$allcoation_date','$wcc_num','$wcc_rec_num','$tot','$sgsttotal','$cgsttotal','$tgsttotal','$loc','$ses')");
	 $sno=mysqli_insert_id($link);
	
	$cnt = count($_POST['item_code']);
	if ($cnt > 0 && $cnt == $cnt) {

for ($i=0; $i<$cnt; $i++) {
if( $_POST['item_code'][$i]!='' ){
$lno=$_POST['sno'][$i];
$item_code=$_POST['item_code'][$i];
$item_desc=$_POST['item_desc'][$i];
$price=$_POST['price'][$i];
$qty=$_POST['qty'][$i];
$amnt=$_POST['amnt'][$i];
$sgst=$_POST['sgst'][$i];
$cgst=$_POST['cgst'][$i];
//$gst_amnt=$_POST['gst_amnt'][$i];
$uom=$_POST['uom'][$i];
$hsn=$_POST['hsn'][$i];
$sac=$_POST['sac'][$i];
$sgstamt=$_POST['sgstamt'][$i];
$cgstamt=$_POST['cgstamt'][$i];
   $gst_amnt=$sgstamt+$cgstamt;
$query = "INSERT INTO add_bill ( `service_no`, `item_code`, `price`, `qty`, `tax_amnt`, `gst_amnt`, `sgst`, `cgst`,`date`,`temp_type`,`uom`,`item_desc`,`sgstamount`,`cgstamount`,`sno`,`id1`,`hsnno`,`sacno`) 
	VALUES 
 ('$service_no','$item_code','$price','$qty','$amnt','$gst_amnt','$sgst','$cgst','$date','$temp','$uom','$item_desc','$sgstamt','$cgstamt','$lno','$sno','$hsn','$sac')";
 $res=mysqli_query($link,$query) or die(mysqli_error($link));
}
     
}
	}
	  
	if($res){
	   
	print "<script>";
	print "alert('Sucessfully Saved');";
	print "self.location='osinvoice.php?id=$service_no&loc=$loc&id1=$sno';";
	print "</script>";

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
	$sub_date=$_POST['sub_date'];
	$payment_doc_date=$_POST['payment_doc_date'];
	$payment_doc_no=$_POST['payment_doc_no'];
	
	if($bar_code!=''){
		$v="update `add_bill1` set `date`='$date', `service_no`='$service_no', `po_no`='$po_no', `po_date`='$po_date', `site_name`='$site_name',
	 `district`='$district', `indus_id`='$indus_id', 
	`req_ref`='$req_ref', `seeking_id`='$seeking_id', `state`='$state', `seeking_opt`='$seeking_opt', `rfaid_date`='$rfaid_date',
	 `allcoation_date`='$allcoation_date', 
	`wcc_num`='$wcc_num', `wcc_rec_num`='$wcc_rec_num', `total_amnt`='$tot',`total_sgst`='$tot1',
	`total_cgst`='$tot1',`total_gst`='$tot2',qr_code='$bar_code',`bill_status`='Submited',bill_submit_date='$sub_date',`payment_doc_date`='$payment_doc_date',`payment_doc_no`='$payment_doc_no' where id='$id'";
	
	$sq=mysqli_query($link,$v);
	
	} else {
		$v1="update `add_bill1` set `date`='$date', `service_no`='$service_no', `po_no`='$po_no', `po_date`='$po_date', `site_name`='$site_name',
	 `district`='$district', `indus_id`='$indus_id', 
	`req_ref`='$req_ref', `seeking_id`='$seeking_id', `state`='$state', `seeking_opt`='$seeking_opt', `rfaid_date`='$rfaid_date',
	 `allcoation_date`='$allcoation_date', 
	`wcc_num`='$wcc_num', `wcc_rec_num`='$wcc_rec_num', `total_amnt`='$tot',`total_sgst`='$tot2',
	`total_cgst`='$tot2',`total_gst`='$tot1',`payment_doc_date`='$payment_doc_date',`payment_doc_no`='$payment_doc_no' where id='$id'";
		$sq=mysqli_query($link,$v1);
	}
	//exit;
	$cnt = count($_POST['item_code']);
	if ($cnt > 0 && $cnt == $cnt) {

for ($i=0; $i<$cnt; $i++) {
if( $_POST['item_desc'][$i]!='' ){
$item_code=$_POST['item_code'][$i];
$item_desc=$_POST['item_desc'][$i];
$price=$_POST['price'][$i];
$qty=$_POST['qty'][$i];
$amnt=$_POST['amnt'][$i];
$sgst=$_POST['sgst'][$i];
$cgst=$_POST['cgst'][$i];
$gst_amnt=$_POST['gst_amnt'][$i];
$id1=$_POST['id1'][$i];
   $id=$_POST['id'][$i];
	 $query = "update add_bill set `service_no`='$service_no', `item_code`='$item_code',item_desc='$item_desc', `price`='$price',
	 `qty`='$qty', `tax_amnt`='$amnt', `gst_amnt`='$gst_amnt', `sgst`='$sgst', `cgst`='$cgst',`date`='$date' where id='$id' and id1='$id1'"; 
 $res=mysqli_query($link,$query) or trigger_error("Update failed: " . mysqli_error($link));
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
