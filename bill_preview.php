<?php
include('dbconnection/connection.php');
 $bid=$_GET['id'];
 $a="select * from add_bill1 where id='$bid'";
$q=mysqli_query($link,$a) or die(mysqli_error($link));
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
<table border="1" cellpadding="0" cellspacing="0">
<tr>
<th rowspan="2">S No</th>
<th rowspan="2">ITEM DESCRIPTION</th>
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
</tr>
<?php
 $aa="select a.item_desc,a.hsn,a.sac,b.qty,b.price,b.tax_amnt,b.gst_amnt,b.gst
 from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code";
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$i=1;
while($t1=mysqli_fetch_array($t)){
	
	?>
	<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $t1['item_desc']; ?></td>
	<td><?php echo $t1['hsn']." ".$t1['sac']; ?></td>
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
 <th ><?php echo $total_amnt; ?></th>
 <th ></th>
 <th ><?php echo $total_cgst; ?></th>
 <th ></th>
 <th ><?php echo $total_sgst; ?></th>
 <th ></th>
 <th ><?php echo $total_igst; ?></th>
 <th ><?php echo $total_igst+$total_sgst+$total_cgst+$total_amnt ; ?></th>
 </tr>
 </table>