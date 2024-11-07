<?php
include('dbconnection/connection.php');
  $id=$_GET['id'];
  $loc=$_GET['loc'];
   $sno=$_GET['sno'];
 $from=$_GET['email'];
 
 
 $p=mysqli_query($link,"select * from add_mbill1 where id=' $id'") or die(mysqli_error($link));
 $r=mysqli_fetch_array($p);
 $invno=$r['service_no'];
 $req_ref=$r['req_ref'];
 $wcc_num=$r['wcc_num'];
 $date1=$r['date'];
 $date=date('d-m-Y',strtotime($date1));
 $wcc_rec_num=$r['wcc_rec_num'];
 $total_amnt=$r['total_amnt'];
 $total_gst=$r['total_gst'];
 $total=$total_amnt+$total_gst;
 
 $k="select * from location where id='$loc'";
$q1=mysqli_query($link,$k) or die(mysqli_error($link));
while($r1=mysqli_fetch_array($q1)){
   // $to = "ospshyd@yahoo.com".",";
   $to = $r1['e1'].",";
    $to .=$r1['e2']. ",";
    $to .=$r1['e3'].',';
 }
 $to .='ospshyd@yahoo.com'.',';
  $to .='kolliparasrinu.srinu@gmail.com';
  $to;
 
//$to = "ospshyd@yahoo.com".",";
//$to ="kolliparasrinu.srinu@gmail.com"; 
//$to .= "ospshyd@gmail.com";
//$to .= "arifansari.aaru@gmail.com";
$subject = "OSPS Maharashtra Billing Invoice No:".$sno;
//$from="srinu100.kollipara@gmail.com";
//$from .= "kollipara@gmail.com";
$headers = "From: $from\r\n";
$headers .= "MIME-Version: 1.0\r\n"
  ."Content-Type: multipart/mixed; boundary=\"1a2a3a\"";

$message .= "If you can see this MIME than your client doesn't accept MIME types!\r\n"
  ."--1a2a3a\r\n";
 
$message .= "Content-Type: text/html; charset=\"iso-8859-1\"\r\n"
  ."Content-Transfer-Encoding: 7bit\r\n\r\n"
  ."Dear Sir/Madam,<br/>"
  ."This is to inform you that a below invoice has been generated";
 $message .="<table><tr><td>Invoice No</td><td colspaan='2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>:</td><td colspaan='2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$invno."</td></tr>";
  $message .="<tr><td>Invoice Date</td><td colspaan='2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>:</td><td colspaan='2'>       </td><td>".$date."</td></tr>";
  $message .="<tr><td>Invoice Amount</td><td colspaan='2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>:</td><td colspaan='2'>       </td><td>".$total."</td></tr>";
  $message .="<tr><td>Reference Number</td><td colspaan='2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>:</td><td colspaan='2'>       </td><td>".$req_ref."</td></tr>";
  $message .="<tr><td>WCC Number</td><td colspaan='2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>:</td><td colspaan='2'>       </td><td>".$wcc_num."</td></tr>";
  $message .="<tr><td>Receipt Number</td><td colspaan='2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>:</td><td colspaan='2'></td><td>".$wcc_rec_num."</td></tr></table>";
  $message .="This is a System generated automatic E-Mail Message. Please do not reply."
  ." \r\n"
  ."--1a2a3a\r\n";
 
  $doc="minvoice-".$id.".pdf";
$file = file_get_contents($doc);
 
$message .= "Content-Type: application/pdf; name=\"$doc\"\r\n"
  ."Content-Transfer-Encoding: base64\r\n"
  ."Content-disposition: attachment; file=\"$doc\"\r\n"
  ."\r\n"
  .chunk_split(base64_encode($file))
  ."--1a2a3a--";
 
// Send email
 
$success = mail($to,$subject,$message,$headers);
   if (!$success) {
    
  echo "Mail to " . $to . " failed .";
   }else {
         unlink($doc);
        header('Location:mabill_list.php');
  //echo "Success : Mail was send to " . $to ;
   }
 mysqli_close($link);
?>