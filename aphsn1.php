<?php //include('config.php');

include('dbconnection/connection.php');
header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=aphsnreport".date('d-m-Y').".xls");
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


<center><h2><u>Ap HSN Code Wise Report Summery</u></h2></center>
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
		 <th rowspan="2">Tax Amount</th>
	   	<th colspan="2">IGST</th>
       
      </tr>
	  <tr>
	  <td>Rate</td>
	  <td>Amount</td>
	  
	  </tr>
      <tr>
      <?php

$t="select a.service_no,a.item_desc,a.hsnno,a.sacno,a.qty,a.price,a.cgst,a.tax_amnt,a.cgstamount,a.sgst,a.sgstamount,b.date from add_apbill1 b,add_apbill a where a.service_no=b.service_no and b.date between '$from' and '$to'  order by a.hsnno desc,b.date desc  ";

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
     <td><?php echo $r['cgst']+$r['sgst'];?></td>
     <td><?php echo $r['cgstamount']+$r['sgstamount'];?></td>
	
       
   </tr>
      
      <?php $i++;}?>
      </table>
  </div></body></html>