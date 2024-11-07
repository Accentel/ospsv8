<?php //include('config.php');

include('dbconnection/connection.php');
header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=Invoice_summary".date('d-m-Y').".xls");
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


<center><h2><u>Summery</u></h2></center>
<div >
    <table class="left" border="1">
      <tr>
        <th>S No:</th>
		<th>Name of the Party</th>
		
		  <th>Site Name</th>
		<th>District</th>
		 <th>WCC.No</th>
         <th>WCC Recipet No</th>
		<th>Indus Id</th>
		 <th>Reff.No</th>
		<th>Po Number</th>
		 <th>Po Date</th>
		  
		<th>A.Opco Id</th>
		 <th>A.Opco</th>
		<th>Invoice No</th>
		<th>Invoice Date</th>
				 <th>VHD BAR CODE Dcoument No</th>
		  <th>Submitte Date</th>
		<th>Invoice Basic Amount</th>
        <th>Total Invoice  Amount</th>
        <th>CGST Amount</th>
		
		<th>SGST Amount</th>
		
		<!--<th colspan="1">CGST </th>
		
		<th colspan="1">SGST </th>-->
	
		
      </tr>
      <tr>
      <?php $sq=mysqli_query($link,"select * from add_bill1 where `date` between '$from' and '$to'");
	     $i=1;
	  while($r=mysqli_fetch_array($sq))
	  {
		
		  ?>
     
     <td> <?php echo $i?></td><td>INDUS TOWER</td>
     <td><?php echo $r['site_name'];?></td>
     <td><?php echo $r['district'];?></td>
     
     <td><?php echo $r['wcc_num'];?></td>
     <td><?php echo $r['indus_id'];?></td>
     <td><?php echo $r['req_ref'];?></td>
     <td><?php echo $r['po_no'];?></td>
     <td><?php echo $r['po_date'];?></td>
     <td><?php echo $r['wcc_rec_num'];?></td>
     <td><?php echo $r['seeking_id'];?></td>
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
      <td><?php echo $r['total_amnt']+$r['total_gst'];?></td>
    
     <td><?php echo $r['total_cgst'];?></td>
   
     <td><?php echo $r['total_sgst'];?></td>
   
    
    
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