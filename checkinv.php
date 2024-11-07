<!DOCTYPE HTML>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<title>OSPS BILLING</title>
 <script type="text/javascript">
            function printt()
            {
                document.getElementById("prt").style.display="none";
                document.getElementById("cls").style.display="none";
            window.print();
            }
            function closs()
            {
                window.close();
            }
        </script>
<style type="text/css">
    table { page-break-inside:auto;page-break-inside:auto;border-color:#fff;font-family: "Times New Roman", Times, serif;font-size:12px;  }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
    thead,tfoot{border:none !important;border-color:#fff;}
    
    tr.noBorder th {
  border:none !important;
  border-color:#fff;
}
#tds{
    
border:0;
}
table {
border-left:none !important;
border-top: none !important;
border-bottom: none !important;
border-right:none !important;
frame:box 
}
 .pageNumbering
{
display:block;
font-weight: normal;
font-size: 8pt;
color: #666666;
font-style: normal;
font-family: Arial, Helvetica;
text-decoration: none;
text-align: right; 
}
.pagenum:before { content: counter(page); }
footer {
  font-size: 24px;
  color: #f00;
  width:100%;
   text-align: center;
}
header {
  font-size: 9px;
  color: #f00;
  text-align: center;
}

@page {
  size: A4;
  margin: 11mm 9mm 11mm 5mm;
  
  @bottom {
	content: "Page " counter(page) " of " counter(pages)
    }
}

@media print {
  footer {
    position: fixed;
    bottom: 0;
	width:100%;
  }
header {
    position: fixed;
    top: 0;
  }
  .content-block, p {
    page-break-inside: avoid;
  }

  html, body {
    width: 210mm;
    height: 297mm;
  }
}
.pagenum:before { content: counter(page); }
</style>
</head>
<body>
    <div class="page" style="width:100%">
<?php //include('config.php');
ob_start();
include('dbconnection/connection.php');
$bid=$_GET['id'];
$loc=$_GET['loc'];
$q=mysqli_query($link,"select * from add_bill1 where id='$bid'") or die(mysqli_error($link));
$r=mysqli_fetch_array($q);
 $service_no=$r['service_no'];
$invdate1=$r['date'];

$invdate = date('d-M-y', strtotime( $invdate1 ));



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

$ackno=$r['ackno'];
//date('d-M-y', strtotime( $po_date1 ))
$ackdt=$r['ackdt'];
$qr_code=$r['qr_code'];

?>

<div style="width:100%;text-align:center;"><b>Tax Invoice </b></div> 
<table style="width:100%" border=1 > 
   <tr>
       
  <th style="width:50%" align="left" >
    <!--  <pre></pre>-->
<b>IRN: <?php echo $qr_code; ?> </th>
<th style="width:50%" align="left">
    Ack No:<?php echo $ackno; ?></b><br/>
<b>Ack Date:<?php echo $ackdt; ?></b></th>

     </tr> 
     </table>
   <table style="width:100%" border=1 > 
   <tr>
       
  <th style="width:50%" align="left" >
      <pre>
<b>Invoice No: <?php echo $service_no; ?> <br/>Invoice Date:<?php echo $invdate; ?></b> </pre></th>
<th style="width:50%" align="left"><pre>
<b>PAN No:-AAACO8174A   STATE:-TELANGANA1255<br/>GST NO:-36AAACO8174A1ZM STATE CODE:-36</b></pre></th>

     </tr> 
     </table>
     <table style="width:100%">
     <tr>
        <th style="width:50%" align="left"  >
 <?php 

 $sql=mysqli_query($link,"select * from location where id='$loc'");
 $re=mysqli_fetch_array($sql);
 $shippingto=$re['shippingto'];
 $billingto=$re['billingto'];
 ?>
			<table style="width:100%;" border=1 BORDERCOLOR=BLACK >
			<tr>
			<td>
			     <?php echo '<b>'.$billingto.'</b>'?>
            
		
			</td>
			<?php if($loc!='2'){ ?>
			<td>
           <?php echo '<b>'.$shippingto.'</b>'?>
            
		<br/><br/><br/>
			
			</td>
			<?php }else{}?>
			</tr>
			</table>
			
</th>
    <th style="width:50%" align="left" >
<table style="width:100%" border=1 BORDERCOLOR=BLACK>
		  <tr>
		  <td><b>Po No &nbsp;&nbsp;&nbsp; <?php echo $po_no; ?></b></td>
		  <td><b>PO DATE&nbsp;&nbsp;&nbsp;<?php echo $po_date; ?></b></td>
		  </tr>
		  <tr>
            <td>
		<b>	Site Name:<?php echo $site_name; ?><br/>
			Indus ID:<?php echo $indus_id; ?><br/>
			Seeking Opt ID:<?php echo $seeking_id; ?><br/>
			Seeking Opt:<?php echo $seeking_opt; ?><br/>
			Allocation Date:<?php echo $allcoation_date; ?><br/>
			WCC NO:<?php echo $wcc_num; ?><br/>
			WCC RECIEPT NO:<?php echo $wcc_rec_num; ?><br/></b>
			</td>
			<td>
			<b>District:<?php echo $district; ?>,<br/>
			Req.ref.NO :<?php echo $req_ref; ?>,<br/>
			State :<?php echo $state; ?>,<br/>
			RFAID Date :<?php
			if($rfaid_date1!='0000-00-00'){
			 echo $rfaid_date; } else {
			echo "N/A";	 
			 }?></b>,<br/>
			 <b>PTW No:<?php echo $pcw; ?></b>
			<br/><br/><br/>
			
			</td>
			</tr>
			
			
          </table>
          </th>
          </tr>
    </table>
    
 
    <table style="width:100%" border=1 BORDERCOLOR=BLACK></td>
        
<tr>
<th style="width:1%">SNo</th>
<!--<th style="width:75px;">Item Code</th>-->
<th style="width:40%">ITEM DESCRIPTION</th>
<th style="width:12%">HSN/SAC No</th>
<th style="width:12%">UNIT</th>
<th style="width:12%">Qty</th>
<th style="width:12%">RATE</th>
<th style="width:11%">TAXABLE AMOUNT</th>
</tr>
<?php
  $y="select distinct(cgst) from add_bill where service_no='$service_no' and id1='$bid' ";
$sq=mysqli_query($link,$y) or die(mysqli_error($link));
  $count=mysqli_num_rows($sq);
$cont=mysqli_num_rows($sq);
 $k='A';

 //echo $x;
 while($r=mysqli_fetch_array($sq)){
	 $sggst=$r['cgst'];
	 
	 $u="select  sum(tax_amnt) as tax_amnt,sum(gst_amnt) as gst from add_bill where service_no='$service_no' and cgst='$sggst' and id1='$bid'";
	 $sq1=mysqli_query($link,$u) or die(mysqli_error($link));

 while($r1=mysqli_fetch_array($sq1)){
	 $tax_amnt=$r1['tax_amnt'];
	 $gst=$r1['gst'];

	 
	 

//$t=mysqli_query($link,"select * from add_bill where service_no='$service_no'") or die(mysqli_error($link));
//while($r1=mysqli_fetch_array($t)){

 //$aa="select a.item_desc,a.primary_uom,a.hsn,a.sac,b.item_code,b.qty,b.price,b.tax_amnt,b.gst_amnt,b.sgst,b.cgst
 //from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code and b.cgst='$sggst' and a.category=b.temp_type";
 $aa="select * from add_bill where service_no='$service_no' and cgst='$sggst' and id1='$bid' ";
 
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$i=1;
$gst_amnt1=0;
$tx=0;
while($t1=mysqli_fetch_array($t)){
	
	?>
	<tr>
	<th style="width:1%;"><?php echo $t1['sno']; ?></th>
	
	<td  style="width:40%;"><?php echo '<b>'.$t1['item_desc'].'</b>'; ?></td>
	<th style="width:12%;">
	<?php 
	if($t1['hsnno']!=='0'){
	echo $t1['hsnno'];
	}else{
	echo $t1['sacno'];
	}?>
	</th>
	<th style="width:12%;"><?php echo $t1['uom']; ?></th>
	<th style="width:12%;"><?php echo number_format($t1['qty'],4); ?></th>
	<th style="width:12%;"><?php echo $t1['price']; ?></th>
	<th style="width:11%; border-right-color: #000 !important;"><?php echo $tax=number_format((float)$t1['tax_amnt'],1, '.', ''); ?></th>
	
	
	
	
	</tr>
<?php 

$gst_amnt=$t1['gst_amnt'];
$gst_amnt1=$gst_amnt+$gst_amnt1;


$tt_amt=$t1['total_price'];
$tt_amt1=$tt_amt+$tt_amt1;


$tx=$t1['tax_amnt'];
 $tx1=$tx+$tx1;
$total_price=$t1['total_price'];

 $gst_amnt2=$gst_amnt+$gst_amnt2;



$i++; }
?>
<tr>
 <td colspan="3">
 
 
 
 
 </td>
 <td colspan="3" align="right" style="font-size:14px;"><b>Basic Amounts - <?php echo $k;?> </b></td>
 <th style="font-size:16px; border-right-color: #000 !important;"> <?php echo number_format((float)$tax_amnt,2,'.','');?></th>
 </tr>
 
 
 
 <tr>
     <td colspan="3">
 
 </td>
 <td  colspan="3" align="right"  style="font-size:14px;"><b>CGST <?php echo $sggst;?>%</b></td>
 <th style="font-size:16px; border-right-color: #000 !important;"> <?php echo number_format((float)$gst_amnt1/2,1,'.',''); ?></th>
 </tr>
 <tr>
     <td colspan="3">
 
 
 
 
 </td>
 <td colspan="3" align="right" style="font-size:14px;"><b>SGST <?php echo $sggst;?>%</b></td>
 <th style="font-size:16px; border-right-color: #000 !important;"> <?php echo number_format((float)$gst_amnt1/2,1,'.',''); ?></th>
 </tr>
 <?php if($cont==1){?>
 <tr>
     <td colspan="3">
 
 </td>
 <td colspan="3" align="right" style="font-size:14px;"><b>Total Tax </b></td>
 <th style="font-size:16px; border-right-color: #000 !important;"> <?php echo number_format((float)$gst_amnt1,1,'.',''); ?></th>
 </tr>
 <?php }else{ ?>
 <tr></tr>
 <?php }?>
 <tr>
     <td colspan="3">
 
 
 
 
 </td>
 <td colspan="3" align="right" style="font-size:14px;"><b>Total Amount After Tax </b></td>
 <th style="font-size:16px; border-right-color: #000 !important;"> <?php echo $tamt=round($tax_amnt+$gst,0,PHP_ROUND_HALF_UP); ?></th>
 </tr>
 
 <?php  
 $tamt1=$tamt+$tamt1;
//$x++;
 $k++; } }

 ?>
 
 </fieldset>
 
 <?php if($cont ==1){ echo '<tr></tr>'; }else{ ?>
  <tr>
 <td colspan="3" ></td><
 <td colspan="3"  style="font-size:14px; border-right-color: #000 !important;"><b>Taxable Amount -

  <?php
   $count;
  if($count==1){;
$cnt="A";} else if($count==2){
$cnt="B";
} else if($count==3){
$cnt="C";
} else if($count==4){
$cnt="D";} else if($count==5){
$cnt="E";
}else if($count==6){
$cnt="F";
}else if($count==7){
$cnt="G";
}else if($count==8){
$cnt="H";
}else if($count==9){
$cnt="I";
}else if($count==10){
$cnt="J";
}else if($count==11){
$cnt="K";
}else if($count==12){
$cnt="L";
}else if($count==13){
$cnt="M";
}else if($count==14){
$cnt="N";
}else if($count==15){
$cnt="O";
}else if($count==16){
$cnt="P";
}else if($count==17){
$cnt="Q";
}else if($count==18){
$cnt="R";
}else if($count==19){
$cnt="S";
}else if($count==20){
$cnt="T";
}else if($count==21){
$cnt="U";
}else if($count==22){
$cnt="V";
}else if($count==23){
$cnt="W";
}else if($count==24){
$cnt="X";
}else if($count==25){
$cnt="Y";
}else if($count==26){
$cnt="Z";
}

    $start='A';$end=$cnt;
// $sa='A';
foreach(range($start, $end) as $i)
{
     $s[] = $i;
	   
}
echo implode('+', $s);
 ?>

 
   <?php 
 
 
	   
 
   
   
   
    for($i=1;$i<=$count;$i++){
	      
	    $xx=$i."+";
		  $c = array();
            $c[$i] = $xx; 
		
	  
 }
 ($xx);
  $xx;
 ?>
 
  </b></td>
 <th> <?php echo number_format((float)$tx1,2,'.','');?></th>
 </tr>
 <tr>
     <td colspan="3">
 
 
 
 
 </td>
 <td  colspan="3" align="right" style="font-size:14px;"><b>ADD:CGST </b></td>
 <th style="font-size:16px; border-right-color: #000 !important;"> <?php echo number_format((float)$total_cgst,1,'.',''); ?></th>
 </tr>
 <tr>
     <td colspan="3">
 
 
 
 
 </td>
 <td colspan="3" align="right" style="font-size:14px;"><b>ADD:SGST</b></td>
 <th style="font-size:16px; border-right-color: #000 !important;"> <?php echo number_format((float)$total_sgst,1,'.',''); ?></th>
 </tr>
 <tr>
     <td colspan="3">
 
 
 
 
 </td>
 <td colspan="3" align="right" style="font-size:14px;"><b>ADD:IGST</b></td>
 <th style="font-size:16px; border-right-color: #000 !important;"> <?php echo '--'; ?></th>
 </tr>
 <tr>
     <td colspan="3">&nbsp;</td>
 <td colspan="3" align="right" style="font-size:14px;"><b>TOTAL GST AMOUNT</b></td>
 <th style="font-size:16px; border-right-color: #000 !important;"> <?php echo number_format((float)$total_gst,1,'.',''); ?></th>
 </tr>
 
 <tr>
     <td colspan="3">
 
 
 
 
 </td>
 <td colspan="3" align="right" style="font-size:14px; "><b>Total Amount After Tax </b></td>
 <th style="font-size:16px; border-right-color: #000 !important;"> <?php echo number_format((float)$tamt1,2,'.',''); ?></th>
 </tr>
 
 <?php }?>
 <tr><!-- 500 more rows -->
			<th colspan="4" style="border-bottom-color: #000 !important;">
			
			<?php
     $tmt=round($tamt1);
      
     
     $number = round($tmt);
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  echo  "Total Invoice Amount in Words:Rupees- ".strtoupper($result) .  $points . " ONLY";
 ?> 
 
			
					
			
			</th>
        <th colspan="3" style="font-size:14px;  border-right-color: #000 !important; border-bottom-color: #000 !important;">For OSPS Telecom Services Pvt.Ltd.
        <br/><br/>
	   <br/>  <br/>  <br/>
        Authorized Signatory
        
        </th>
 </tr>       
 
 
 
        <!-- 500 more rows -->
      

 </table>
   
</div>
  <?php
    
    $body=ob_get_clean();
$body=iconv("UTF-8","UTF-8//IGNORE",$body);

include('mpdf/mpdf.php');

 
$mpdf=new \mPDF('c','A4','','',5,5,40,15,0,0);

$mpdf->SetHTMLHeader('<img src="aposps2.png"/>');
$mpdf->SetHTMLFooter('<div style="text-align:center">Regd.Office : Farha Villa, D.No.8-1-22/1/J/1, 7 Tombs Road, Tolichowki, Hyderabad - 500 008. T.S.</div>             
    <div style="text-align:center">Email : ospsinfo@ospsindia.com, ospshyd@yahoo.com, Website:www.ospsindia.com</div>
<div style="text-align:center">CIN:U64203TG2004PTC042772</div>');

$mpdf->writeHTML($body);
$mpdf->Output('demo.pdf','F');
error_reporting(E_ALL);
ini_set('display_errors', 1);
	print "<script>";
	print "self.location='demo.pdf';";
	print "</script>";
	
?>
</body>
</html>