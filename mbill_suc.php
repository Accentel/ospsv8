<?php //include('config.php');

include('dbconnection/connection.php');
if(isset($_POST['submit'])){
	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);
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
$type_work=$_POST['type_work'];
$opo_no=$_POST['opo_no'];
$opo_date=$_POST['opo_date'];
$wcc_pf=$_POST['wcc_pf'];
$wcc_pt=$_POST['wcc_pt'];
$ackno=$_POST['ackno'];
$ackdt=$_POST['ackdt'];


//$total_amnt=$_POST['total_amnt'];
 $tot=$_POST['tot'];
  $tot1=$_POST['tot1']; 
// $tot2=$tot1/2;
$tot2 = intval($tot1) / 2;
$sgsttotal=$_POST['sgsttotal'];
$cgsttotal=$_POST['cgsttotal'];
$tgsttotal=$sgsttotal+$cgsttotal;

//$total_amnt=$tot+$tot2;
	$date=$_POST['inv_date'];
	$loc=$_POST['loc'];
	$ses=$_POST['ses'];
	// $temp=$_POST['temp'];
	$temp = isset($_POST['temp']) ? $_POST['temp'] : ''; // Set a default value if the key is not set
	$t=mysqli_query($link,"select * from employee where username='$ses'") or die(mysqli_error($link));
	$tr=mysqli_fetch_array($t);
	//  $empemail=$tr['emp_email'];
	$empemail = isset($_POST['emp_email']) ? $_POST['emp_email'] : ''; // Set a default value if the key is not set
	 	$noofrecordsquery=mysqli_query($link,"select count(1) as noofrecords from `add_mbill1` where wcc_num ='$wcc_num' or service_no ='$service_no' ") or die(mysqli_error($link));
	$noofrecordsqueryfetch=mysqli_fetch_array($noofrecordsquery);
	$noofrecords=$noofrecordsqueryfetch['noofrecords'];
	 if($noofrecords==0)
	{
	
	$sq=mysqli_query($link,"INSERT INTO `add_mbill1`(`date`, `service_no`, `po_no`, `po_date`, `site_name`, `district`, `indus_id`, 
	`req_ref`, `seeking_id`, `state`, `seeking_opt`, `rfaid_date`, `allcoation_date`, 
	`wcc_num`, `wcc_rec_num`, `total_amnt`,`total_sgst`,`total_cgst`,`total_gst`,`location`,`user`,`wcc_pf`,`wcc_pt`,`type_work`)
	 VALUES ('$date','$service_no','$po_no','$po_date','$site_name','$district','$indus_id','$req_ref','$seeking_id',
	 '$state','$seeking_opt',
	 '$rfaid_date','$allcoation_date','$wcc_num','$wcc_rec_num','$tot','$sgsttotal','$cgsttotal','$tgsttotal','$loc','$ses','$wcc_pf','$wcc_pt','$type_work')");
	 $sno=mysqli_insert_id($link);
	
	$cnt = count($_POST['item_code']);
	if ($cnt > 0 && $cnt == $cnt) {

for ($i=0; $i<$cnt; $i++) {
if( $_POST['item_desc'][$i]!='' ){
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
$query = "INSERT INTO add_mbill ( `service_no`, `item_code`, `price`, `qty`, `tax_amnt`, `gst_amnt`, `sgst`, `cgst`,`date`,`temp_type`,`uom`,`item_desc`,`sgstamount`,`cgstamount`,`sno`,`id1`,`hsnno`,`sacno`) 
	VALUES 
 ('$service_no','$item_code','$price','$qty','$amnt','$gst_amnt','$sgst','$cgst','$date','$temp','$uom','".addslashes($item_desc)."','$sgstamt','$cgstamt','$lno','$sno','$hsn','$sac')";
 $res=mysqli_query($link,$query) or die(mysqli_error($link));
}
     
}
	}
	  
	if($res){
	   
	print "<script>";
	print "alert('Sucessfully Saved');";
	print "self.location='mbill_list.php';";
	print "</script>";

}
}
else{
    print "<script>";
	print "alert('ALERT:Duplicate Entry for WCC No or SNo!');";
	print "history.back();";
	print "</script>";
}
}




if(isset($_POST['update'])){
	$id=$_POST['id'];
	$service_no=trim($_POST['service_no']);	
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
$wcc_num=trim($_POST['wcc_num']);
$wcc_rec_num=$_POST['wcc_rec_num'];
$type_work=$_POST['type_work'];



//$opo_no=$_POST['opo_no'];
//$opo_date=$_POST['opo_date'];
$wcc_pf=$_POST['wcc_pf'];
$wcc_pt=$_POST['wcc_pt'];
//$total_amnt=$_POST['total_amnt'];
$tot=$_POST['tot'];
  $tot1=$_POST['tot1']; 
$tot2=$tot1/2;
$sgsttotal=$_POST['totsgst'];
$cgsttotal=$_POST['totcgst'];
$tgsttotal=$sgsttotal+$cgsttotal;
//$total_amnt=$tot+$tot2;
	$date=$_POST['inv_date'];;
	$bar_code=$_POST['bar_code'];
	//$date=date('Y-m-d');
	$sub_date=$_POST['sub_date'];
	$payment_doc_date=$_POST['payment_doc_date'];
	$payment_doc_no=$_POST['payment_doc_no'];
	
		$ackno=$_POST['ackno'];
	$ackdt=$_POST['ackdt'];
	
	if($bar_code!=''){
	 	$v="update `add_mbill1` set `date`='$date', `service_no`='$service_no', `po_no`='$po_no', `po_date`='$po_date', `site_name`='$site_name',
	 `district`='$district', `indus_id`='$indus_id', 
	`req_ref`='$req_ref', `seeking_id`='$seeking_id', `state`='$state', `seeking_opt`='$seeking_opt', `rfaid_date`='$rfaid_date',
	 `allcoation_date`='$allcoation_date', 
	`wcc_num`='$wcc_num', `wcc_rec_num`='$wcc_rec_num', `total_amnt`='$tot',`total_sgst`='$sgsttotal',
	`total_cgst`='$cgsttotal',`total_gst`='$tgsttotal',qr_code='$bar_code',`bill_status`='Submited',bill_submit_date='$sub_date',`payment_doc_date`='$payment_doc_date',`payment_doc_no`='$payment_doc_no',
	`wcc_pf`='$wcc_pf',`wcc_pt`='$wcc_pt',`type_work`='$type_work',ackno='$ackno',ackdt='$ackdt' where id='$id'";
	
	$sq=mysqli_query($link,$v);
	
	} else {
		 $v1="update `add_mbill1` set `date`='$date', `service_no`='$service_no', `po_no`='$po_no', `po_date`='$po_date', `site_name`='$site_name',
	 `district`='$district', `indus_id`='$indus_id', 
	`req_ref`='$req_ref', `seeking_id`='$seeking_id', `state`='$state', `seeking_opt`='$seeking_opt', `rfaid_date`='$rfaid_date',
	 `allcoation_date`='$allcoation_date', 
	`wcc_num`='$wcc_num', `wcc_rec_num`='$wcc_rec_num', `total_amnt`='$tot',`total_sgst`='$sgsttotal',
	`total_cgst`='$cgsttotal',`total_gst`='$tgsttotal',`payment_doc_date`='$payment_doc_date',`payment_doc_no`='$payment_doc_no',`wcc_pf`='$wcc_pf',`wcc_pt`='$wcc_pt',`type_work`='$type_work',ackno='$ackno',ackdt='$ackdt'  where id='$id'";
		$sq=mysqli_query($link,$v1) or die(mysqli_error($link));
	}
	
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
$uom=$_POST['uom'][$i];
$hsn=$_POST['hsn'][$i];
$sac=$_POST['sac'][$i];
$lno=$_POST['sno'][$i];
$sgstamt=$_POST['sgstamt'][$i];
$cgstamt=$_POST['cgstamt'][$i];
$gst_amnt=$sgstamt+$cgstamt;
$id=$_POST['id'];
   $id2=$_POST['id5'][$i];
   
   if($id1!=''){
	   $id1=$id1;
   }
   if($id1!='' and $id2!=''){
	  $query = "update add_mbill set `service_no`='$service_no', `item_code`='$item_code',item_desc='".addslashes($item_desc)."', `price`='$price',uom='$uom',
	 `qty`='$qty', `tax_amnt`='$amnt', `gst_amnt`='$gst_amnt', `sgst`='$sgst',hsnno='$hsn',sacno='$sac',sgstamount='$sgstamt',cgstamount='$cgstamt',`cgst`='$cgst',`date`='$date' where id='$id2' and id1='$id1'"; 
 
 $res=mysqli_query($link,$query) or trigger_error("Update failed: " . mysqli_error($link));
   }else{
	  // if($id1!='' and $id=''){
	   $query = "INSERT INTO add_mbill ( `service_no`, `item_code`, `price`, `qty`, `tax_amnt`, `gst_amnt`, `sgst`, `cgst`,`date`,`temp_type`,`uom`,`item_desc`,`sgstamount`,`cgstamount`,`sno`,`id1`,`hsnno`,`sacno`) 
	VALUES 
 ('$service_no','$item_code','$price','$qty','$amnt','$gst_amnt','$sgst','$cgst','$date','$temp','$uom','".addslashes($item_desc)."','$sgstamt','$cgstamt','$lno','$id1','$hsn','$sac')";
 
 $res=mysqli_query($link,$query) or die(mysqli_error($link));
	 // }   
   }
}
     
}
	}
	
	if($res){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='mbill_list.php';";
	print "</script>";

}
}

if(isset($_POST['update1'])){
$id=$_POST['id'];
$bar_code=$_POST['bar_code'];
	//$date=date('Y-m-d');
	$sub_date=$_POST['sub_date'];
	$payment_doc_date=$_POST['payment_doc_date'];
	$payment_doc_no=$_POST['payment_doc_no'];
	$ackno=$_POST['ackno'];
$ackdt=$_POST['ackdt'];
$v="update `add_mbill1` set qr_code='$bar_code',bill_submit_date='$sub_date',`payment_doc_date`='$payment_doc_date',`payment_doc_no`='$payment_doc_no',ackno='$ackno',ackdt='$ackdt' where id='$id'";
$res=mysqli_query($link,$v) or die(mysqli_error($link));

if($res){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='mbill_list.php';";
	print "</script>";
	
	
}


}




?>
