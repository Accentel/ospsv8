<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Test</title>
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


</style>
</head>
<body>
<?php //include('config.php');
include('dbconnection/connection.php');
$bid=$_GET['id'];
$q=mysqli_query($link,"select * from add_bill1 where id='$bid'") or die(mysqli_error($link));
$r=mysqli_fetch_array($q);
$service_no=$r['service_no'];
$po_no=$r['po_no'];
$po_date=$r['po_date'];
$site_name=$r['site_name'];
$district=$r['district'];
$indus_id=$r['indus_id'];
$req_ref=$r['req_ref'];
$seeking_id=$r['seeking_id'];
$state=$r['state'];
$seeking_opt=$r['seeking_opt'];
$rfaid_date=$r['rfaid_date'];
$allcoation_date=$r['allcoation_date'];
$wcc_num=$r['wcc_num'];
$wcc_rec_num=$r['wcc_rec_num'];
$total_amnt=$r['total_amnt'];
$total_sgst=$r['total_sgst'];
$total_cgst=$r['total_cgst'];
$total_gst=$r['total_gst'];

?>




    <table border='1'  cellpadding="0" cellspacing='0'>
        <thead>
            <tr class="noBorder" ><th   colspan="14"style="padding-top:200px;border-right:none !important;">Invoice</th></tr>
        </thead>
        <tfoot>
            <tr class="noBorder" style="border-color:#fff;border-left-color:#fff;"><th class="noBorder " colspan="14" style="padding-top:80px;"></th></tr>
        </tfoot>
        <tbody>
        </tbody>
        <tr><td colspan="14">
        <table  >
<tr>
<td >
<div style="border:1px solid #000;">

<table width="500" >
<tr>
<td>Serial No:<br/>Invoice Date:</td>
<td><?php echo $service_no; ?><br/><?php echo $po_date; ?></td>

</tr>
</table>

</div>
<div style="height:10px;" ></div>
<div style="border:1px solid #000;">

			<table border="1" cellpadding="0" cellspacing="0">
			<tr>
			<td>
			<b>Bill To Address:AP Circle Office</b><br/>
			Name:M/s INDUS TOWERS LIMITED<br/>
			Address:Survey No.133,4-51,8th Floor,<br/>
			SLN Terminus,Beside Botanical Gardens,<br/>
			Gachibowli,Hyderabad-500032<br/>
			TELANGANA,<br/>
			GSTIN:36AABC17776BIZJ<br/>
			State Name & Code:Telangana - 36
			</td>
			
			<td>
			<b>Ship To Address:ATL</b><br/>
			M/s INDUS TOWERS LIMITED<br/>
			AP-Telangana(ATL) Warehouse,<br/>
			Survey No.25 E Banda Mylaram Mulugu<Br/>
			Mandal,Telangana,502336,<br/>
			TELANGANA India.<br/>
			GSTIN:36AABC17776BIZJ<br/>
			State Name & Code:Telangana - 36<br/><br/><br/>
			
			</td>
			</tr>
			</table>
			
</div>
</td>
<td width="20"></td>
<td>
<div align="right">Original for Receipient</div>
<div style="border:1px solid #000;">
<table  width="500" >
<tr>
<td>PAN No:-AAACO8174A<br/>GST NO:-36AAACO8174AIZM</td>
<td>STATE:-TELANGANA1255<br/>STATE CODE:-36</td>
</tr>

</table>
</div>
<div style="height:20px;margin-top:15px;margin-bottom:0px; margin-top:20px;" ></div>
<div style="border:1px solid #000;">
<table >
		  <tr>
		  <th>Po No &nbsp;&nbsp;&nbsp; <?php echo $po_no; ?></th>
		  <th>PO DATE&nbsp;&nbsp;&nbsp;<?php echo $po_date; ?></th>
		  </tr>
		  <tr>
            <td>
			Site Name:<?php echo $site_name; ?><br/>
			Indus ID:<?php echo $indus_id; ?><br/>
			Seeking Opt ID:<?php echo $seeking_id; ?><br/>
			Seeking Opt:<?php echo $seeking_opt; ?><br/>
			Allocation Date:<?php echo $allcoation_date; ?><br/>
			WCC NO:<?php echo $wcc_num; ?><br/>
			WCC RECIEPT NO:<?php echo $wcc_rec_num; ?><br/>
			</td>
			<td>
			District:<?php echo $district; ?>,<br/>
			Req.ref.NO :<?php echo $req_ref; ?>,<br/>
			State :<?php echo $state; ?>,<br/>
			RFAID Date :<?php echo $rfaid_date; ?>,<br/>
			<br/><br/><br/>
			
			</td>

			</tr>
			
			
			
			
			
			
          </table>
		  </div>

</td>
</tr>
<tr>
<td>

</td>



</tr>



</table>
        
        </td></tr>
        
        <tr>
<th rowspan="2">S No</th>
<th rowspan="2" >ITEM DESCRIPTION</th>
<th rowspan="2">HSN/SAC No</th>
<th rowspan="2">UNIT</th>
<th rowspan="2">Qty</th>
<th rowspan="2">RATE</th>
<th rowspan="2">TAXABLE AMOUNT</th>
<th  colspan="2">GST</th>
<th  colspan="2">SGST</th>
<th  colspan="2">IGST</th>
<th>TOTAL</th>

</tr>


<tr>

<th>RATE</th>
<th>AMOUNT</th>
<th>RATE</th>
<th>AMOUNT</th>
<th>RATE</th>
<th>AMOUNT</th>
<th></th></th>
</tr>
<?php

//$t=mysqli_query($link,"select * from add_bill where service_no='$service_no'") or die(mysqli_error($link));
$aa="select a.item_desc,a.hsn,a.sac,b.qty,b.price,b.tax_amnt,b.gst_amnt,b.gst
 from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code";
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$i=1;
while($t1=mysqli_fetch_array($t)){
	
	?>
	<tr>
	<td><?php echo $i; ?></td>
	<td ><?php echo $t1['item_desc']; ?></td>
	<td>
	<?php 
	if($t1['hsn']!=='0'){
	echo $t1['hsn'];
	}else{
	echo $t1['sac'];
	}?>
	</td>
	<td><?php echo $i; ?></td>
	<td><?php echo $t1['qty']; ?></td>
	<td><?php echo $t1['price']; ?></td>
	<td><?php echo $t1['tax_amnt']; ?></td>
	<td><?php echo $t1['gst']; ?></td>
	<td><?php echo $t1['gst_amnt']; ?></td>
	<td><?php echo $t1['gst']; ?></td>
	<td><?php echo $t1['gst_amnt']; ?></td>
	<td><?php echo 0; ?></td>
	<td><?php echo 0; ?></td>
	<td><?php echo $t1['tax_amnt']+$t1['gst_amnt']+$t1['gst_amnt']; ?></td>
	
	
	</tr>
<?php $i++; }
 ?>
 <tr>
 <th colspan="6"></th>
 <th ><?php echo $total_amnt-$total_gst; ?></th>
 <th ></th>
 <th ><?php echo $total_cgst; ?></th>
 <th ></th>
 <th ><?php echo $total_sgst; ?></th>
 <th ></th>
 <th ><?php echo $total_igst; ?></th>
 <th ><?php echo $total_igst+$total_amnt ; ?></th>
 </tr>
 <tr>
 <th colspan="6"></th>
 <th ><?php echo $total_amnt-$total_gst; ?></th>
 <th ></th>
 <th ><?php echo $total_cgst; ?></th>
 <th ></th>
 <th ><?php echo $total_sgst; ?></th>
 <th ></th>
 <th ><?php echo $total_igst; ?></th>
 <th ><?php echo $total_igst+$total_amnt ; ?></th>
 </tr>
 <tr>
 <th rowspan="6" colspan="10"></th>
 <th colspan="3">Total Amount Before</th>
 <th><?php echo $total_amnt-$total_gst; ?></th>
 </tr>
 <tr>
 
 <th colspan="3">ADD:CGST</th>
 <th><?php echo $total_cgst; ?></th>
 </tr>
 <tr>
 
 <th colspan="3">ADD:SGST</th>
 <th><?php echo $total_sgst; ?></th>
 </tr>
 <tr>
 
 <th colspan="3">ADD:IGST</th>
 <th><?php echo '-'; ?></th>
 </tr>
 <tr>
 
 <th colspan="3">TAX AMOUNT:GST</th>
 <th><?php echo $total_gst; ?></th>
 </tr>
 <tr>
 
 <th colspan="3">TAX AMOUNT AFTER GST</th>
 <th><?php echo round($total_amnt); ?></th>
 </tr>
        <!-- 500 more rows -->
       
    </tbody>
    </table>
</body>
</html>