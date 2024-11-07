<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

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
}
 .pageNumbering
{
display:block;
font-weight: bold;
font-size: 14pt;
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
    height: 277mm;
  }
}
.pagenum:before { content: counter(page); }
</style>
</head>
<body>
<div class="page">
<?php //include('config.php');
include('dbconnection/connection.php');
$bid=$_GET['id'];
$loc=$_GET['loc'];
$q=mysqli_query($link,"select * from add_gbill1 where id='$bid'") or die(mysqli_error($link));
$r=mysqli_fetch_array($q);
 $service_no=$r['service_no'];
$invdate1=$r['date'];

$invdate = date('d-M-y', strtotime( $invdate1 ));



$po_no=$r['po_no'];
$po_date1=$r['po_date'];

$po_date = date('d-M-y', strtotime( $po_date1 ));

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



$opo_no=$r['opo_no'];
$opo_date1=$r['opo_date'];

$opo_date = date('d-M-y', strtotime( $opo_date1 ));
$wcc_pf1=$r['wcc_pf'];
$wcc_pf = date('d-M-y', strtotime( $wcc_pf1 ));
$wcc_pt1=$r['wcc_pt'];
$wcc_pt = date('d-M-y', strtotime( $wcc_pt1 ));











?>
<header>
      <img src="headerlogo.jpg" style="width:100%;height:120px;"/>
    </header>

  <table border='1'  cellpadding="0" cellspacing='0'>
         <thead>
            <tr class="noBorder" ><th   colspan="14"style="padding-top:130px;border-right:none !important;font-size:18px;"></th></tr>
        </thead>
        <tfoot>
            <tr class="noBorder " style="border-color:#fff;border-left-color:#fff;"><th class="noBorder " colspan="14" style="padding-top:80px;"></th></tr>
        </tfoot>
        <tbody>
        </tbody>
        <tr><td colspan="8" style="text-align:center;font-size:18px;border:0px;"><b>Invoice</b></td></td></tr>
        <tr><td colspan="14">
        <table  >
<tr>
<td >
<div style="border:1px solid #000;">

<table width="500" style="font-weight:bold;font-size:14px;">
<tr>
<td>Serial No:<br/>Invoice Date:</td>
<td><?php echo $service_no; ?><br/><?php echo $invdate; ?></td>

</tr>
</table>

</div>
<div style="height:18px;" ></div>
<div style="border:1px solid #000;">
 <?php 

 $sql=mysqli_query($link,"select * from location where id='$loc'");
 $re=mysqli_fetch_array($sql);
 $shippingto=$re['shippingto'];
 $billingto=$re['billingto'];
 ?>
			<table border="1" cellpadding="0" cellspacing="0" style="font-weight:bold;font-size:16px;">
			<tr>
			
			<td>
			     <?php echo $billingto?>
            <br/><br/>
		
			</td>
						
			</tr>
			</table>
			
</div>
</td>
<td width="20"></td>
<td style="">

<div style="border:1px solid #000;margin-top:0px;margin-bottom:27px;margin-top:18px;">
<table  width="500" style="font-weight:bold;font-size:14px;">
<tr>
<td>PAN No:-AAACO8174A<br/>GST NO:-24AAACO8174A1ZR</td>

</tr>

</table>
</div>


<div style="border:1px solid #000;font-weight:bold;font-size:14px;margin-bottom:16px;" >
<table width="500">
		 
		  
		  <tr>
            <td  style="height:100px;font-size:14px;">
			Po No &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $po_no; ?><br/>
			PO DATE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $po_date; ?><br/>
			Site Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   :  <?php echo $site_name; ?><br/>
			Indus ID  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <?php echo $indus_id; ?><br/>
			
			Seeking Opt  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;         :  <?php echo $seeking_opt; ?><br/>
			Req.ref.NO : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;:  <?php echo $req_ref; ?><br/>
			RFAID Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; :<?php
			if($rfaid_date1!='0000-00-00'){
			 echo $rfaid_date; } else {
			echo "N/A";	 
			 }?></b>,<br/>
			WCC NO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  <?php echo $wcc_num; ?><br/>
			WCC RECIEPT NO:  <?php echo $wcc_rec_num; ?><br/>
			</td>
			</tr>
			
			
			
			
			
			
          </table>
		  </div>

</td>
</tr>




</table>
        
        </td></tr>
        
        <tr>
<th style="width:5px;">SNo</th>
<!--<th style="width:75px;">Item Code</th>-->
<th  style="width:350px;"  colspan="2">ITEM DESCRIPTION</th>
<th style="width:120px;">ITEM Job Code</th>
<th style="width:120px;">HSN/SAC No</th>
<th style="width:120px;">UNIT</th>
<th style="width:120px;">Qty</th>
<th style="width:120px;">RATE</th>
<th style="width:120px;">TAXABLE AMOUNT</th>


</tr>



<?php
 $y="select distinct(cgst) from add_gbill where service_no='$service_no' ";
$sq=mysqli_query($link,$y) or die(mysqli_error($link));
  $count=mysqli_num_rows($sq);
$cont=mysqli_num_rows($sq);
 $k='A';

 //echo $x;
 while($r=mysqli_fetch_array($sq)){
	 $sggst=$r['cgst'];
	 
	 $u="select  sum(tax_amnt) as tax_amnt,sum(gst_amnt) as gst from add_gbill where service_no='$service_no' and cgst='$sggst'";
	 $sq1=mysqli_query($link,$u) or die(mysqli_error($link));

 while($r1=mysqli_fetch_array($sq1)){
	 $tax_amnt=$r1['tax_amnt'];
	 $gst=$r1['gst'];

	 
	 

//$t=mysqli_query($link,"select * from add_bill where service_no='$service_no'") or die(mysqli_error($link));
//while($r1=mysqli_fetch_array($t)){

 //$aa="select a.item_desc,a.primary_uom,a.hsn,a.sac,b.item_code,b.qty,b.price,b.tax_amnt,b.gst_amnt,b.sgst,b.cgst
 //from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code and b.cgst='$sggst' and a.category=b.temp_type";
 $aa="select * from add_gbill where service_no='$service_no' and cgst='$sggst' and id1='$bid' ";
 
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$i=1;
$gst_amnt1=0;
$tx=0;
while($t1=mysqli_fetch_array($t)){
	
	?>
	<tr style="font-size:16px;">
	<th style="width:5px;"><?php echo $t1['sno']; ?></th>
	
	<td colspan="2" style="width:350px;"><b><?php echo $t1['item_desc']; ?></b></td>
	<th style="width:120px;">
	<?php 
	if($t1['hsnno']!=='0'){
	echo $t1['hsnno'];
	}else{
	echo $t1['sacno'];
	}?>
	</th>
	<th style="width:120px;"><?php echo $t1['item_code']; ?></th>
	<th style="width:120px;"><?php echo $t1['uom']; ?></th>
	<th style="width:120px;"><?php echo $t1['qty']; ?></th>
	<th style="width:120px;"><?php echo $t1['price']; ?></th>
	<th style="width:120px;"><?php echo $tax=number_format((float)$t1['tax_amnt'],1, '.', ''); ?></th>
	
	
	
	
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
 <td colspan="5" rowspan="5">
 
 
 
 
 </td></td>
 <td colspan="3" align="right" style="font-size:14px;"><b>Basic Amounts - <?php echo $k;?> </b></td>
 <th> <?php echo number_format((float)$tax_amnt,2,'.','');?></th>
 </tr>
 
 
 
 <tr>
 <td  colspan="3" align="right" style="font-size:14px;"><b>CGST <?php echo $sggst;?>%</b></td>
 <th> <?php echo number_format((float)$gst_amnt1/2,1,'.',''); ?></th>
 </tr>
 <tr>
 <td colspan="3" align="right" style="font-size:14px;"><b>SGST <?php echo $sggst;?>%</b></td>
 <th> <?php echo number_format((float)$gst_amnt1/2,1,'.',''); ?></th>
 </tr>
 <?php if($cont==1){?>
 <tr>
 <td colspan="3" align="right" style="font-size:14px;"><b>Total Tax </b></td>
 <th> <?php echo number_format((float)$gst_amnt1,1,'.',''); ?></th>
 </tr>
 <?php }else{ ?>
 <tr></tr>
 <?php }?>
 <tr>
 <td colspan="3" align="right" style="font-size:14px;"><b>Gross Amount </b></td>
 <th> <?php echo $tamt=round($tax_amnt+$gst,2); ?></th>
 </tr>
 
 <?php  
 $tamt1=$tamt+$tamt1;
//$x++;
 $k++; } }

 ?>
 
 
 <tr><td colspan="8"><br /></td></tr>
 
 <?php if($cont!=1){ ?>
  <tr>
 <td colspan="4" rowspan="6"></td></td>
 <td colspan="4" align="right" style="font-size:14px;"><b>Taxable Amount -

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
 <td  colspan="4" align="right" style="font-size:14px;"><b>ADD:CGST </b></td>
 <th> <?php echo number_format((float)$total_cgst,1,'.',''); ?></th>
 </tr>
 <tr>
 <td colspan="4" align="right" style="font-size:14px;"><b>ADD:SGST</b></td>
 <th> <?php echo number_format((float)$total_sgst,1,'.',''); ?></th>
 </tr>
 <tr>
 <td colspan="4" align="right" style="font-size:14px;"><b>ADD:IGST</b></td>
 <th> <?php echo '--'; ?></th>
 </tr>
 <tr>
 <td colspan="4" align="right" style="font-size:14px;"><b>TOTAL GST AMOUNT</b></td>
 <th> <?php echo number_format((float)$total_gst,1,'.',''); ?></th>
 </tr>
 
 <tr>
 <td colspan="4" align="right" style="font-size:14px;"><b>Total Amount After Tax </b></td>
 <th> <?php echo number_format((float)$tamt1,2,'.',''); ?></th>
 </tr>
 
 <?php }else{}?>
 
 
 
        <!-- 500 more rows -->
       <tr><!-- 500 more rows -->
			<th colspan="5">
			
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
  echo  "Total Invoice Amount in Words:INR- ".strtoupper($result) .  $points . " ONLY";
 ?> 
 
			
					
			
			</th>
        <th colspan="4" style="font-size:14px;">For OSPS Telecom Services Pvt.Ltd.
        <br/><br/>
	   <br/>  <br/>  <br/>
        Authorized Signatory
        
        </th>
 </tr>       
       
       
    </tbody>
    </table>
    </table>
    <table align="center">
     <tr><td height="20px"></td></tr><tr>
    <td></td><td align="center"><input type="button" value="Print" id="prt" class="butt" onclick="printt()"/></td><td><input type="button" value="Close" id="cls" class="butt"  onclick="javascript:location.href='gbill_list.php'"/></td>
</tr></table>

<footer>
 <!--<div class="footer">Page: <span class="pagenum"></span></div>
 <span class="pagenum"></span>-->
    <hr/>
   <div>Regd.Office : Farha Villa, D.No.8-1-22/1/J/1, 7 Tombs Road, Tolichowki, Hyderabad - 500 008. T.S.</div>             
    <div>Email : ospsinfo@ospsindia.com, ospshyd@yahoo.com, Website:www.ospsindia.com</div>
<div>CIN:U64203TG2004PTC042772</div>
<div style="font-size:18px;">Branch Office : BUNGALOW NO. 11,GREENVILLA 1,JAIN NAGAR OPP DEV EXOTICA, GHUMA,Ahmedabad,Gujarat,380058.</div>

    </footer>
	</div>
</body>
</html>