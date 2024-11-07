<?php //include('config.php');
include('dbconnection/connection.php');
//header("Content-Type: application/vnd.ms-excel");
//header("Content-disposition: attachment; filename=Invoice_summary".date('d-m-Y').".xls");
 $from=$_REQUEST['from_date'];
 $to=$_REQUEST['to_date'];
?>
<html><head><style>
.wrap {
  display: table;
 

}
.cell-wrap {
  display: table-cell;
  vertical-align: top;
  height: 100%;
}
.cell-wrap.left {

  padding-right: 10px;  /* if you need some whitespace */
}
table {
  border-collapse: collapse;
  border-spacing: 0;


}
table td, table th {
  border: 1px solid darkgrey;
  text-align: left;
  padding: 0.4em;

  font:Arial;
  font-size:15px;

   
    
    
}
</style></head>
<title>OSPS BILL</title><body>


<center><h2><u>HSN/SAC NO Wise Summary</u></h2></center>
<div >



    <table class="left" border="1">
      <tr>
        <th rowspan="2">S No:</th>
		<th rowspan="2">Invoice No</th>
		
		  <th rowspan="2">Invoice Date</th>
		<th rowspan="2">Item Description</th>
		 <th rowspan="2">HSN/SAC NO</th>
         <th rowspan="2">Qty </th>
		<th rowspan="2">Rate</th>
		 <th rowspan="2">Taxable Amount</th>
		<th colspan="2">CGST</th>
		<th colspan="2">SGST</th>
		<th colspan="2">IGST</th>
         
      </tr>
	  <tr>
	  <td>Rate</td>
	  <td>Amount</td>
	  <td>Rate</td>
	  <td>Amount</td>
	  <td>Rate</td>
	  <td>Amount</td>
	  
	  </tr>
      <tr>
          
      <?php 
      
      $t="select a.service_no,a.item_desc,a.hsnno,a.sacno,a.qty,a.price,a.cgst,a.tax_amnt,a.cgstamount,a.sgst,a.sgstamount,b.date from add_bill1 b,add_bill a where a.service_no=b.service_no and b.date between '$from' and '$to'  order by a.hsnno desc,b.date desc  ";
      $sq=mysqli_query($link,$t) or die(mysqli_error($link));
	     $i=1;
	  while($r=mysqli_fetch_array($sq))
	  {
		$hsn=$r['hsnno'];
		$sac=$r['sacno'];
		if($hsn!=0){
		    $hsn=$hsn;
		}else{
		    $hsn=$sac;
		}
		  ?>
     
     <td> <?php echo $i?></td>
	 <td><?php echo $r['service_no'];?></td>
     <td><?php echo $r['date'];?></td>
     <td><?php echo $r['item_desc'];?></td>
     
     <td><?php echo $hsn;?></td>
     <td><?php echo $r['qty'];?></td>
     <td><?php echo $r['price'];?></td>
     <td><?php echo $r['tax_amnt'];?></td>
     <td><?php echo $r['cgst'];?></td>
     <td><?php echo $r['cgstamount'];?></td>
	 <td><?php echo $r['sgst'];?></td>
     <td><?php echo $r['sgstamount'];?></td>
	 <td><?php echo '0';?></td>
     <td><?php echo '0';?></td>
    <?php /*?> <td><?php echo $r['seeking_id'];?></td>
     <td><?php echo $r['seeking_opt'];?></td>
     <td><?php echo $ser=$r['service_no'];?></td>
     <td><?php echo $r['date'];?></td>
    
     <td><?php echo $r['qr_code'];?></td>
     <td><?php  $rfaid_date1=$r['bill_submit_date'];?>
     <?php
			if($rfaid_date1!='0000-00-00'){
			 echo $rfaid_date; } else {
			echo "N/A";	 
			 }?>
     </td>
     <td><?php echo $r['total_amnt'];?></td>
    
    
     <td><?php echo $r['total_cgst'];?></td>
   
     <td><?php echo $r['total_sgst'];?></td>
   
      <td><?php echo $r['total_amnt']+$r['total_gst'];?></td><?php */?>
    
    <?php /*?> <td><table border="1"><tr>
	 <?php $sql=mysqli_query($link,"select distinct(cgst),sum(`gst_amnt`) as gst1 from add_bill where service_no='$ser' GROUP by `cgst` ");

	
	 while($r1=mysqli_fetch_array($sql)){
	
	?>
	 
     <td> <?php echo $r1['cgst'];?></td>
      <td> <?php echo $r1['gst1']/2;?></td>
     <?php }?></tr>
     </table></td><?php */?>
     
     
    <?php /*?>  <td><table border="1"><tr>
	 <?php $sql=mysqli_query($link,"select distinct(sgst),sum(`gst_amnt`) as gst2 from add_bill where service_no='$ser' GROUP by `sgst` ");

	
	 while($r1=mysqli_fetch_array($sql)){
	
	?>
	 
     <td> <?php echo $r1['sgst'];?></td>
      <td> <?php echo $r1['gst2']/2;?></td>
     <?php }?></tr>
     </table></td><?php */?>
     
     
     
     
    <?php /*?> <td><table border="1"><tr>
	 <?php $sql=mysqli_query($link,"select sum(`gst_amnt`) as gst1 from add_bill where service_no='$ser' GROUP by `cgst` 
	 ");

	
	 while($r1=mysqli_fetch_array($sql)){
	
	?>
	 
     <td> <?php echo $r1['gst1']/2;?></td>
     
     <?php }?></tr>
     </table></td><?php */?>
     
    <?php /*?> <td><table table border="1"><tr>
	 <?php $sql=mysqli_query($link,"select distinct(sgst) from add_bill where service_no='$ser'  ");

	
	 while($r1=mysqli_fetch_array($sql)){
	
	?>
	 
     <td> <?php echo $r1['sgst'];?></td>
     
     <?php }?></tr>
     </table></td>
     
     <td><table table border="1"><tr>
	 <?php $sql=mysqli_query($link,"select sum(`gst_amnt`) as gst1 from add_bill where service_no='$ser' GROUP by `sgst`  ");

	
	 while($r1=mysqli_fetch_array($sql)){
	
	?>
	 
     <td> <?php echo $r1['gst1']/2;?></td>
     
     <?php }?></tr>
     </table></td><?php */?>
   </tr>
      
      <?php $i++;}?>
      </table>
  </div></body></html>