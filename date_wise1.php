<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/form_style.css" />
<link rel="stylesheet" type="text/css" href="../css/table_style.css" />
<link rel="stylesheet" type="text/css" href="../css/default.css" />
<script type="text/javascript" src="../js/tableruler.js"></script>
<script language="javascript" type="text/javascript" src="../js/actb.js"></script>
<script language="javascript" type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript" src="../js/sortable.js"></script>
<script type="text/javascript">window.onload=function(){tableruler();}</script>
<script language="JavaScript" src="../js/gen_validatorv31.js" type="text/javascript"></script>
<title>OSPS Billing</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color:#fff;
	color:#000;
}
.heading1 {	font-size:20px;
	text-align:center;
        font-family: "Times New Roman";
        font-weight: bold;
}
.heading2 {	font-size:12px;
	text-align:center;
        font-family: "arial";
}
.heading3 {	font-size:15px;
	text-align:center;
	
	text-decoration:underline;	
}
-->
</style>
<script type="text/javascript">
function printWindow(){
		document.getElementById("submit1").style.display='none';
	document.getElementById("submit2").style.display='none';
	window.print();	
	}
	function fun(){
	window.close();
	}
</script>

</head>
<body>
<?php
include('dbconnection/connection.php');



$rs=mysqli_query($link,"select * from  organization");
while($res = mysqli_fetch_array($rs)){
$HOSP_NAME=$res['org_name'];
$ADDR=$res['org_address'];     
     
$PHONE1=$res['org_phone'];

 }



?>

<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
    <tr>
    <td width="75%" align="center">
<table width="75%" border="0" cellpadding="0" cellspacing="0" >
    <tr><td>&nbsp;</td></tr>
  <tr>
    <td class="heading1"><?php echo $HOSP_NAME ?></td>
  </tr>
  <tr>
    <td class="heading2"> <?php echo $ADDR ?></td>
  </tr>
  <tr>
    <td class="heading2">Ph : <?php echo $PHONE1 ?></td>
  </tr>
</table>
  </td>
    </tr>
</table>
<p>&nbsp;</p>


<div align="center">
  <?php
$sdate=$_REQUEST['s_date'];
$edate=$_REQUEST['e_date'];


$s_date=date('Y-m-d',strtotime($_REQUEST['s_date']));
$e_date=date('Y-m-d',strtotime($_REQUEST['e_date']));



?>
  
  <table width="100%" cellpadding="0" cellspacing="0" border="1" style="font-family: arial;font-size: 12px">
    <tr><td colspan=11><div align="center"><strong>Date Wise Invoice  Entry Report</strong></div></td></tr>
  

  <tr><td colspan=4><div align="right"><strong>From  Date</strong>:</div></td><td><strong><?php echo $sdate ?></strong></td>
  <td colspan="5"><div align="right"><strong>To Date</strong>:</div></td><td><strong><?php echo $edate ?></strong></td>
  
     
	   
</tr>


<tr>
  <td align="center"><strong>S.No.</strong></td>
   <td align="center"><strong>Date.</strong></td>
   <td align="center"><strong>INV No.</strong></td>
  <td align="center"><strong>Site Name.</strong></td>
  <td align="center"><strong>Req.Ref No.</strong></td>
  <td align="center"><strong>Wcc No.</strong></td>
  <td align="center"><strong>Bill Status.</strong></td>
  <td align="center"><strong>Bill Submited Date.</strong></td>
  <td align="center"><strong>Invoice Amount</strong></td>
  <td align="center"><strong>GST Amount.</strong></td>
  
  <td align="center"><strong>Total Amount</strong></td>
  </tr>
  
   <?php

$counts=0;
   $s="select * from  add_bill1 where  
 date between '$s_date' and '$e_date'  order by date desc";
$qry=mysqli_query($link,$s);

$sno=0;
$tot3=0;
while($res1 = mysqli_fetch_array($qry)){
    $sno++;
//$tot2=$res1['total'];
?>
  
<tr>
  <td align="center"><?php echo $sno ?></td>
  
  <td align="center"><?php $d=$res1['date']; echo date('d-m-Y',strtotime($d)); ?></td>
    <td align="center"><?php echo $res1['service_no'] ?></td>
  <td align="center"><?php echo $res1['site_name']; ?></td>
  <td align="center"><?php echo $res1['req_ref']; ?></td>
   <td align="center"><?php echo $res1['wcc_num']; ?></td>
  <td align="center"><?php echo $res1['bill_status']; ?></td>
  <td align="center"><?php $d1=$res1['bill_submit_date']; echo date('d-m-Y',strtotime($d1)); ?></td>
   <td align="center"><?php echo $a=$res1['total_amnt']; ?></td>
    <td align="center"><?php echo $b=$res1['total_gst']; ?></td>
   <td align="center"><?php echo $c=$a+$b; ?></td>

  </tr>

<?php 		
	$a1=$a+$a1;
	$b1=$b+$b1;	
	$c1=$c+$c1;
}

?>
  <tr><td colspan="8" style="text-align:right;"><strong >Total</strong></td><td style="text-align:center;"><strong><?php echo $a1?></strong></td>
  <td td style="text-align:center;"><strong><?php echo $b1?></strong></td>
  <td td style="text-align:center;"><strong><?php echo $c1?></strong></td>
  </tr>
  

  <?php /*?>
<tr>
  <td colspan="2"><strong>S.No.</strong></td>
  <td colspan="1"><strong>Date</strong></td>
  <td colspan="2"><strong>Total</strong></td>
  </tr>
  
   <?php

$counts=0;
 
$qry=mysql_query("select  total_date,grand_total from z_gran_tot where total_date between '$s_date' and '$e_date'");
if($qry){
$sno=0;
$tot3=0;
while($res1 = mysql_fetch_array($qry)){
    $sno++;

?>
  
<tr>
  <td colspan="2"><?php echo $sno ?></td>
  <td colspan="1"><?php echo $res1[0] ?></td>
  <td colspan="2"><?php echo $res1[1] ?></td>

  </tr>
  
<?php 		
		$tot2=$res1[1];
        $tot3=$tot3+$tot2;
$counts++;

}
}
?>
<tr><td colspan=3><div align="right"><strong>Grand Total:</strong></div></td><td colspan="2"><div align="center"><b><?php echo $tot3 ?></b></div></td>
  <?php */?>

  </table>
   <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
              <tr>
                <td>&nbsp;</td>
                
              </tr>
            </table></td>
          </tr>
    <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
              <tr>
                <td>
                  <div align="right">
                    <input type="button" value="Print" id="submit1" onclick="javascript:printWindow()"  />
                </div></td>
					 <td>
                       <div align="left">
                         <input type="button" value="Close" id="submit2" onclick="fun()"  />
                     </div></td>
              </tr>
            </table></td>
          </tr>
</div>
</body>
</html>