<?php

        /**/
       $content = '';

        
        /* you css */
include('dbconnection/connection.php');
 $bid=$_GET['id'];

$q=mysqli_query($link,"select * from add_bill1 where service_no='$bid'") or die(mysqli_error($link));
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


$html = '';
$html .= '<h5 align="center">Invoice</h5>';
$html .= '<table>
<tr>
<td>
<div style="border:1px solid #000;">

<table width="500" >
<tr>
<td>Invoice No:<br/>Invoice Date:</td>
<td>'.$service_no.'<br/>'.$invdate.'</td>

</tr>
</table>

</div>
 </td>
 <td>
 <div style="border:1px solid #000;">
 <table  width="500" >
<tr>
<td>PAN No:-AAACO8174A<br/>GST NO:-36AAACO8174AIZM</td>
<td>STATE:-TELANGANA1255<br/>STATE CODE:-36</td>
</tr>

</table>
 
 </div>
 </td>
 </tr>
 <tr>
 <td>
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
 
 
 </td>
 <td>
 <table >
		  <tr>
		  <td>Po No &nbsp;&nbsp;&nbsp;'.$po_no.'</td>
		  <td>PO DATE&nbsp;&nbsp;&nbsp;'.$po_date.'</td>
		  </tr>
		  <tr>
            <td>
			Site Name:'.$site_name.'<br/>
			Indus ID:'.$indus_id.'<br/>
			Seeking Opt ID:'.$seeking_id.'<br/>
			Seeking Opt:'.$seeking_opt.'<br/>
			Allocation Date:'.$allcoation_date.'<br/>
			WCC NO:'.$wcc_num.'<br/>
			WCC RECIEPT NO:'.$wcc_rec_num.'<br/>
			</td>
			<td>
			District:'.$district.',<br/>
			Req.ref.NO :'.$req_ref.',<br/>
			State :'.$state.',<br/>
			RFAID Date :'.$rfaid_date.',<br/>
			<br/><br/><br/>
			
			</td></tr></table></td></tr></table>';
 
 $html .= '<table border="1" cellpadding="0" cellspacing="0">
 <tr>
<th style="width:5px;">SNo</th>
<th style="width:75px;">Item Code</th>
<th  style="width:350px;">ITEM DESCRIPTION</th>
<th style="width:120px;">HSN/SAC No</th>
<th style="width:120px;">UNIT</th>
<th style="width:120px;">Qty</th>
<th style="width:120px;">RATE</th>
<th style="width:120px;">TAXABLE AMOUNT</th>


</tr>';


 
 
 
        require_once('html2pdf/html2pdf.class.php');


        $html2pdf = new HTML2PDF('P', 'A4', 'fr');

        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));

        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
		 //$html2pdf->WriteHTML($content);

        $html2pdf->WriteHTML($html);
		$html2pdf->Output('uploads/file_$bid.pdf', 'F');

        $to = "kolliparasrinu.srinu@gmail.com";
        $from = "test@gmail.com";
        $subject = "hi test mail with attachment";

        $message = "<p>Please see the attachment.</p>";
        $separator = md5(time());
        $eol = PHP_EOL;
        $filename = "pdf-document.pdf";
		$content = $html2pdf->Output('doc-'.$bid.'.pdf','F');
		
		
		
		header('Location:ap.php?id='.$bid);
		
		exit;
		
        $pdfdoc = $html2pdf->Output('', 'S');
        
        $attachment = chunk_split(base64_encode($pdfdoc));




        $headers = "From: " . $from . $eol;
        $headers .= "MIME-Version: 1.0" . $eol;
        $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;

        $body = '';

        $body .= "Content-Transfer-Encoding: 7bit" . $eol;
        $body .= "This is a MIME encoded message." . $eol; //had one more .$eol


        $body .= "--" . $separator . $eol;
        $body .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
        $body .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
        $body .= $message . $eol;


        $body .= "--" . $separator . $eol;
        $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
        $body .= "Content-Transfer-Encoding: base64" . $eol;
        $body .= "Content-Disposition: attachment" . $eol . $eol;
        $body .= $attachment . $eol;
        $body .= "--" . $separator . "--";

        if (mail($to, $subject, $body, $headers)) {

          echo  $msgsuccess = 'Mail Send Successfully';
        } else {

         echo   $msgerror = 'Main not send';
        }


        /**/
    

?>

