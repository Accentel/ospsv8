<?php 
include('dbconnection/connection.php');
ini_set('precision',14);
ini_set('serialize_precision',-1);
$bid=$_GET['id'];
$loc=$_GET['loc'];

$q=mysqli_query($link,"select * from add_mbill1 where id='$bid'") or die(mysqli_error($link));
$r=mysqli_fetch_array($q);
 $service_no=$r['service_no'];
$invdate1=$r['date'];

$invdate = date("d/m/Y", strtotime( $invdate1 ));



$po_no=$r['po_no'];
$po_date1=$r['po_date'];

$po_date = date('d-M-y', strtotime( $po_date1 ));
$pcw=$r['pcw'];
$site_name=$r['site_name'];
$district=$r['district'];
$indus_id=$r['indus_id'];
$req_ref=$r['req_ref'];
$seeking_id=$r['seeking_id'];
$state=$r['state'];
$seeking_opt=$r['seeking_opt'];
$rfaid_date1=$r['rfaid_date'];

$rfaid_date = date('d-M-y', strtotime( $rfaid_date1 ));

$allcoation_date1=$r['allcoation_date'];

$allcoation_date = date('d-M-y', strtotime( $allcoation_date1 ));

$wcc_num=$r['wcc_num'];
$wcc_rec_num=$r['wcc_rec_num'];
$total_amnt=$r['total_amnt'];
$total_sgst=$r['total_sgst'];
$total_cgst=$r['total_cgst']; 
$total_gst=$r['total_gst'];
$sql=mysqli_query($link,"select * from location where id='$loc'");
$re=mysqli_fetch_array($sql);
$shippingto=$re['shippingto'];
$billingto=$re['billingto'];
$t=mysqli_query($link,"select * from add_mbill where service_no='$service_no'") or die(mysqli_error($link));

$i=1;
$gst_amnt1=0;
$tx=0;
$finalcgstamnt=0;
$finalsgstamnt=0;
$finalamnt=0;
$products=array();

while($t1=mysqli_fetch_array($t)){
$total=	$t1['tax_amnt']+$t1['gst_amnt'];
$total=(float)number_format((float)$total, 2, '.', '');
$gst=$t1['cgst']+$t1['sgst'];
$itemlist= array();
$itemlist['SlNo'] = (string)$i; 
$itemlist['PrdDesc'] = $t1['item_desc'];

if($t1['hsnno']==0)
$t1['hsnno']='39174000';
$itemlist['HsnCd'] = $t1['hsnno'];
$hsnno=$t1['hsnno'];  
$hsnquery=mysqli_query($link,"select service from mproducts where hsn='$hsnno' or sac='$hsnno' limit 1") or die(mysqli_error($link));
$hsnt=mysqli_fetch_array($hsnquery);
$itemlist['Qty'] = (int)number_format($t1['qty'],4);
$itemlist['IsServc']=$hsnt['service'];
$itemlist['FreeQty'] = (int)number_format(0,4);

if(trim($t1['uom'])=="Each")
$t1['uom']='NOS';

if(trim($t1['uom'])=="Meters" || trim($t1['uom'])=="Meter")
$t1['uom']='MTR';

if(trim($t1['uom'])=="kilogram" || trim($t1['uom'])=="kilograms")
$t1['uom']='KGS';

if(trim($t1['uom'])=="CUBIC METER" || trim($t1['uom'])=="CUBIC METERS")
$t1['uom']='CBM';

if(trim($t1['uom'])=="Sq. Meter" || trim($t1['uom'])=="Sq. Meter")
$t1['uom']='SQUARE METERS';

$itemlist['Unit'] = $t1['uom']; 
$itemlist['UnitPrice'] = (float)$t1['price']; 
$itemlist['TotAmt'] = (float)number_format((float)$t1['tax_amnt'], 2, '.', '');
$itemlist['Discount'] = 0;
$itemlist['PreTaxVal'] = 0;
$itemlist['AssAmt'] = (float)number_format((float)$t1['tax_amnt'], 2, '.', '');
$itemlist['GstRt'] = $gst;
$itemlist['IgstAmt'] = 0;
$itemlist['CgstAmt'] =(float)number_format((float)($t1['gst_amnt']/2), 2, '.', '');
$itemlist['SgstAmt'] = (float)number_format((float)($t1['gst_amnt']/2), 2, '.', '');
$itemlist['CesRt'] = 0;
$itemlist['CesAmt'] = 0;
$itemlist['CesNonAdvlAmt'] = 0;
$itemlist['StateCesRt'] = 0;
$itemlist['StateCesAmt'] = 0;
$itemlist['StateCesNonAdvlAmt'] = 0;
$itemlist['OthChrg'] = 0;
$itemlist['TotItemVal'] =(float)$total;

$tax=(float)number_format((float)$t1['tax_amnt'],1, '.', '');
	
	


$gst_amnt=$t1['gst_amnt'];
$gst_amnt1=$gst_amnt+$gst_amnt1;


$tt_amt=$t1['total_price'];
$tt_amt1=$tt_amt+$tt_amt1;


$tx=$t1['tax_amnt'];
 $tx1=$tx+$tx1;
$total_price=$t1['total_price'];

 $gst_amnt2=$gst_amnt+$gst_amnt2;

$finalcgstamnt=$finalcgstamnt+($t1['gst_amnt']/2);
$finalsgstamnt=$finalsgstamnt+($t1['gst_amnt']/2);
$finalamnt=$finalamnt+$t1['tax_amnt'];

$i++; 
array_push($products, $itemlist);    
}
$finaltotaltamnt =$finalamnt+$finalcgstamnt+$finalsgstamnt;
$temp = array();
$temp['Version'] = '1.1'; 
 $temp['TranDtls']['TaxSch'] = 'GST'; 
 $temp['TranDtls']['SupTyp'] = 'B2B'; 
 $temp['TranDtls']['IgstOnIntra'] = 'N'; 
 $temp['TranDtls']['RegRev'] = 'N'; 
 $temp['TranDtls']['EcmGstin'] = null; 
 $temp['DocDtls']['Typ'] = 'INV';
 $temp['DocDtls']['No'] =$service_no;
 //(int)number_format((float)$service_no, 2, '.', '');
 $temp['DocDtls']['Dt'] =$invdate;
 //(int)number_format((float)$invdate, 2, '.', '');
 
  $temp['SellerDtls']['Gstin'] = '27AAACO8174A1ZL';
  $temp['SellerDtls']['LglNm'] = 'OSPS TELECOM SERVICES PVT LTD';
  $temp['SellerDtls']['Addr1'] = 'A3/302, KOHINOOR ESTATE MULLA';
  $temp['SellerDtls']['Addr2'] = 'ROAD WAKEDEWADI PUNE';
  $temp['SellerDtls']['Loc'] = 'PUNE 411001 MAHARASHTRA';
  $temp['SellerDtls']['Pin'] = (float)number_format((float)411001, 2, '.', '');
  //'500029';
    $temp['SellerDtls']['Stcd'] = '27';
    $temp['SellerDtls']['Ph'] = null;
  $temp['SellerDtls']['Em'] = 'ghousekhan@ospsindia.com';
   $temp['BuyerDtls']['Gstin'] = '27AADCB0274F3ZY';
    $temp['BuyerDtls']['LglNm'] = 'INDUS TOWERS LIMITED';
     $temp['BuyerDtls']['Addr1'] = 'MNGC OFFICE office NO 2010 2ND FLOOR, EWING, MARVEL EDGE VIMAN NAGAR ROAD (S.NO';
      $temp['BuyerDtls']['Addr2'] = '207 HISSA NO 1, LOHEGAON & S.NO 33, HISSA NO 2A/1 VADGAONSHERT TALUKA, HAVELI';
       $temp['BuyerDtls']['Loc'] = 'PUNE Place of Supply: MAHARASHTRA 411014 MAHARASHTRA';
        $temp['BuyerDtls']['Pin'] = (float)number_format((float)411014, 2, '.', '');
         $temp['BuyerDtls']['Pos'] = '27';
          $temp['BuyerDtls']['Stcd'] = '27';
           $temp['BuyerDtls']['Ph'] = null;
             $temp['BuyerDtls']['Em'] = null;
    $temp['ValDtls']['AssVal'] = (float)number_format((float)$finalamnt, 2, '.', '');
    $temp['ValDtls']['IgstVal'] = 0;
    $temp['ValDtls']['CgstVal'] =(float) number_format((float)$finalcgstamnt, 2, '.', '');
    $temp['ValDtls']['SgstVal'] = (float)number_format((float)$finalsgstamnt, 2, '.', '');
    $temp['ValDtls']['CesVal'] = 0;
    $temp['ValDtls']['StCesVal'] = 0;
    $temp['ValDtls']['Discount'] = 0;
    $temp['ValDtls']['OthChrg'] = 0;
    $temp['ValDtls']['RndOffAmt'] = 0;
    $temp['ValDtls']['TotInvVal'] = (float)number_format((float)$finaltotaltamnt, 2, '.', '');
    
     $temp['RefDtls']['InvRm'] = 'NICGEPP2.0';
      $temp['ItemList'] = $products;
    // $temp = json_encode($temp);
    $finalist=array();
    array_push($finalist, $temp);
     $generate_json = json_encode ( $finalist );


// Create filename
$filename = 'INV'.$service_no.date( 'Y-m-d' );

// Force download .json file with JSON in it
header("Content-type: application/vnd.ms-excel");
header("Content-Type: application/force-download");
header("Content-Type: application/download");
header("Content-disposition: " . $filename . ".json");
header("Content-disposition: filename=" . $filename . ".json");

print $generate_json;
exit;
// echo json_encode($temp);			

?>