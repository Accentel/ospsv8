<?php //include('config.php');

include('dbconnection/connection.php');
/*
if(isset($_POST['update'])){
	$id=$_POST['id'];
	$status=$_POST['status'];	
$user=$_POST['user'];

		$v1="update `add_mbill1` set `bill_status`='$status', apuser='$user' where id='$id'";
		$sq=mysqli_query($link,$v1) or die(mysqli_error($link));
	
	
 	
	
	//exit;
	if($sq){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='mabill_list.php';";
	print "</script>";

}
}
*/


if(isset($_POST['update'])){
	$id=$_POST['id'];
	$location=$_POST['location'];
	$email=$_POST['email'];
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

$status=$_POST['status'];	
$user=$_POST['user'];

$opo_no=$_POST['opo_no'];
$opo_date=$_POST['opo_date'];
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
   
    $u1=$qty*$price;

  $amnt1=number_format((float)$amnt, 2, '.', '');
// $u1=($u);
 $u=number_format((float)$u1, 2, '.', '');
 $pde=abs($u1-$amnt1);
 
 $gt=($u*$sgst)/100;
   
   if($pde < 1)
   {
   
   
 
   
   
   if($id1!=''){
	   $id1=$id1;
   }
   if($id1!='' and $id2!=''){
	  $query = "update add_mbill set `service_no`='$service_no', `item_code`='$item_code',item_desc='$item_desc', `price`='$price',uom='$uom',
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
   
   
   }else{
	   
	   print "<script>";
	print "alert('Amount Not Match Line No $lno,$u1,$amnt1 ');";
	print "self.location='maedit_bill1.php?id=$id'";
	print "</script>";
	   
   }
   
   
   
   
   
   
}
     
}
	}
	
	if($res){
	    
	    
	    if($bar_code!=''){
	 	$v="update `add_mbill1` set `date`='$date', `service_no`='$service_no', `po_no`='$po_no', `po_date`='$po_date', `site_name`='$site_name',
	 `district`='$district', `indus_id`='$indus_id', 
	`req_ref`='$req_ref', `seeking_id`='$seeking_id', `state`='$state', `seeking_opt`='$seeking_opt', `rfaid_date`='$rfaid_date',
	 `allcoation_date`='$allcoation_date', 
	`wcc_num`='$wcc_num', `wcc_rec_num`='$wcc_rec_num', `total_amnt`='$tot',`total_sgst`='$sgsttotal',
	`total_cgst`='$cgsttotal',`total_gst`='$tgsttotal',qr_code='$bar_code',`bill_status`='$status',apuser='$user',bill_submit_date='$sub_date',`payment_doc_date`='$payment_doc_date',`payment_doc_no`='$payment_doc_no',
	`opo_no`='$opo_no',`opo_date`='$opo_date',`wcc_pf`='$wcc_pf',`wcc_pt`='$wcc_pt',`type_work`='$type_work'	where id='$id'";
	
	$sq=mysqli_query($link,$v);
	
	} else {
		 $v1="update `add_mbill1` set `date`='$date', `service_no`='$service_no', `po_no`='$po_no', `po_date`='$po_date', `site_name`='$site_name',
	 `district`='$district', `indus_id`='$indus_id', 
	`req_ref`='$req_ref', `seeking_id`='$seeking_id', `state`='$state', `seeking_opt`='$seeking_opt', `rfaid_date`='$rfaid_date',
	 `allcoation_date`='$allcoation_date', 
	`wcc_num`='$wcc_num', `wcc_rec_num`='$wcc_rec_num', `bill_status`='$status',apuser='$user', `total_amnt`='$tot',`total_sgst`='$sgsttotal',
	`total_cgst`='$cgsttotal',`total_gst`='$tgsttotal',`payment_doc_date`='$payment_doc_date',`payment_doc_no`='$payment_doc_no',`opo_no`='$opo_no',`opo_date`='$opo_date',`wcc_pf`='$wcc_pf',`wcc_pt`='$wcc_pt',`type_work`='$type_work' where id='$id'";
		$sq=mysqli_query($link,$v1) or die(mysqli_error($link));
	}
	
	    
	    
	    
	    if($status=='apporved'){
			header('Location:mosinvoice1.php?id='.$id.'&loc='.$location.'&email='.$email);
			
		}else{
	    
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='mabill_list.php';";
	print "</script>";

}
}
}

?>
