<?php

        /**/
       $content = '';
$content .= '
			<style>
       table.page_header {width: 100%;height:180px; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
    table.page_footer {width: 100%; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}

    div.niveau
    {
        padding-left: 5mm;
    }
         
        #wrapper
        {
            width:800px;
            margin:0 15mm;
        }
         
        .page
        {
            height:297mm;
            width:210mm;
            page-break-after:always;
        }
 
        table
        {
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
             
            border-spacing:0;
            border-collapse: collapse; 
             
        }
         
        table td 
        {
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 2mm;
        }
         
        table.heading
        {
            height:50mm;
        }
         
        h1.heading
        {
            font-size:14pt;
            color:#000;
            font-weight:normal;
        }
         
        h2.heading
        {
            font-size:9pt;
            color:#000;
            font-weight:normal;
        }
         
        hr
        {
            color:#ccc;
            background:#ccc;
        }
         
        #invoice_body
        {
            height: 149mm;
        }
         
        #invoice_body , #invoice_total
        {   
            width:100%;
        }
        #invoice_body table , #invoice_total table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
     
            border-spacing:0;
            border-collapse: collapse; 
             
            margin-top:5mm;
        }
         
        #invoice_body table td , #invoice_total table td
        {
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding:2mm 0;
        }
         
        #invoice_body table td.mono  , #invoice_total table td.mono
        {
            font-family:monospace;
            text-align:right;
            padding-right:3mm;
            font-size:10pt;
        }
         
        #footer
        {   
            width:180mm;
            margin:0 15mm;
            padding-bottom:3mm;
        }
        #footer table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
             
            background:#eee;
             
            border-spacing:0;
            border-collapse: collapse; 
        }
        #footer table td
        {
            width:25%;
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }

				</style>

				';
        
        /* you css */
include('dbconnection/connection.php');
$bid=$_GET['id'];
$loc=$_GET['loc'];
$id1=$_GET['id1'];
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

           // if($rfaid_date1 != '0000-00-00'){
			//   $rfaid_date=$rfaid_date;
			//   } else {
		//	$rfaid_date= "N/A";	 


$allcoation_date1=$r['allcoation_date'];

$allcoation_date = date('d-M-y', strtotime( $allcoation_date1 ));

$wcc_num=$r['wcc_num'];
$wcc_rec_num=$r['wcc_rec_num'];
$total_amnt=$r['total_amnt'];
$total_sgst=$r['total_sgst'];
$total_cgst=$r['total_cgst'];
$total_gst=$r['total_gst'];
$content = ob_get_clean();

$html = '';
$html .= '
<page backtop="14mm" backbottom="14mm"  style="font-size: 12pt">
    <page_header>
    <table class="page_header" style="margin-left:15px;">
            <tr>
                <td  text-align: center;">
                   <img src="images/logo.png"/>
                </td>
            </tr>
        </table>


</page_header>
    <page_footer>
    <table class="page_footer" style="width:100%;margin-left:15px;">
            <tr>
                <td >
                <img src="images/footer.png"/><br/>
                    page [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
    
    
    </page_footer>
    </page>';
$html .= '
<div style="height:30px;"></div>
<h5 align="center"  style="color:#ff0000;">Invoice</h5>
<table  border="1" style="font-size:10.5px;margin:15px;"  width="620" cellpadding="0" cellspacing="0">
<tr>
<td style="width:320px;">


<table  >
<tr>
<td>Invoice No:<br/>Invoice Date:</td>
<td>'.$service_no.'<br/>'.$invdate.'</td>

</tr>
</table>


 </td>
 <td  style="width:320px;">
 
 <table   >
<tr>
<td>PAN No:-AAACO8174A<br/>GST NO:-36AAACO8174AIZM</td>
<td>STATE:-TELANGANA1255<br/>STATE CODE:-36</td>
</tr>

</table>
 
 
 </td>
 </tr>
 
 <tr>
 <td style="width:320px;">
 <table cellpadding="0" cellspacing="10">
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
 <td style="width:320px;">
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
			RFAID Date :'; 
			if($rfaid_date1!="0000-00-00")
			{ 
		$html .='.$rfaid_date.';
			}else{ 
		$html .='NA';
			}
	$html .=',<br/>
			<br/><br/><br/>
			
			</td></tr></table></td></tr></table>';
 
 $html .= ' <table style="font-size:8.5px;margin:15px;width:900px;" border="1"  cellpadding="0" cellspacing="0">
 <tr>
<th style="text-align:center;">SNo</th>
<th  style="text-align:center;">ITEM DESCRIPTION</th>
<th style="text-align:center;">HSN/SAC No</th>
<th style="text-align:center;">UNIT</th>
<th style="text-align:center;">Qty</th>
<th style="text-align:center;">RATE</th>
<th style="text-align:center;">TAXABLE AMOUNT</th>


</tr>';

$sq=mysqli_query($link,"select distinct(sgst) from add_mbill where service_no='$service_no' ");
  $count=mysqli_num_rows($sq);
 $k=1;

 //echo $x;
 while($r=mysqli_fetch_array($sq)){
	 $sggst=$r['sgst'];
	 
	 
	 $sq1=mysqli_query($link,"select  sum(tax_amnt) as tax_amnt,sum(gst_amnt) as gst from add_mbill where service_no='$service_no' and sgst='$sggst'");

 while($r1=mysqli_fetch_array($sq1)){
	 $tax_amnt=$r1['tax_amnt'];
	 $gst=$r1['gst'];

	 

 /*$aa="select a.item_desc,a.primary_uom,a.hsn,a.sac,b.item_code,b.qty,b.price,b.tax_amnt,b.gst_amnt,b.sgst,b.cgst
 from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code and b.sgst='$sggst'";*/
 $aa="select * from add_mbill where service_no='$service_no' and cgst='$sggst' and id1='$id1' ";
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$i=1;
while($rows=mysqli_fetch_array($t)){
	$html .='
	<tr >
<th>' . "<br/> ". $i . '</th>
<td style="width:250px;">' . $rows['item_desc'] . '</td>
<th >' . $rows['hsnno'] . '</th>
<th style="width:60px;">' . $rows['uom'] . '</th>
<th style="width:80px;text-align:center;">' . $rows['qty'] . '</th>
<th style="width:80px;text-align:center;">' . $rows['price'] . '</th>
<th>' . $rows['tax_amnt'] . '</th>

</tr>';
	
	$gst_amnt=$t1['gst_amnt'];
$gst_amnt1=$gst_amnt+$gst_amnt1;


$tt_amt=$t1['total_price'];
$tt_amt1=$tt_amt+$tt_amt1;


$tx=$t1['tax_amnt'];
 $tx1=$tx+$tx1;
$total_price=$t1['total_price'];

 
$gst_amnt2=$gst_amnt+$gst_amnt2;
$tst=$gst_amnt1/2;
 $tamt=$tax_amnt+$gst;
	
	
	$i++; }
	
	$html .='<tr>
	<td colspan="4" rowspan="4"></td>
<td colspan="3" align="right" style="font-size:11px;"><b>Basic Amounts -'.$k.'</b></td><th>'.$tax_amnt.'</th></tr>
 <tr>
 <td  colspan="3" align="right" style="font-size:11px;"><b>CGST'.$sggst.'%</b></td>
 <th>'.$total_sgst .'</th>
 </tr>
 <tr>
 <td colspan="3" align="right" style="font-size:11px;"><b>SGST'.$sggst.'%</b></td>
 <th>'.($total_sgst).'</th>
 </tr>
 <tr>
 <td colspan="3" align="right" style="font-size:11px;"><b>Total Amount </b></td>
 <th>'. $tamt.'</th>
 </tr>';
	

 $k++; } } 
	$html .='<tr><td colspan="4" rowspan="4"></td>
 <td colspan="3" align="right" style="font-size:11px;"><b>Basic Amounts - A</b></td>
 <th>'.$total_amnt.'</th></tr>
 <tr>
 <td  colspan="3" align="right" style="font-size:11px;"><b>CGST 9%</b></td>
 <th>'.$total_cgst.'</th>
 </tr>
 <tr>
 <td colspan="3" align="right" style="font-size:11px;"><b>SGST 9%</b></td>
 <th>'.$total_sgst.'</th>
 </tr>
 <tr>
 <td colspan="3" align="right" style="font-size:11px;"><b>Total Amount </b></td>
 <th>'.$tamt.'</th></tr> 
 <tr>	<th colspan="4">';
 
 $tmt=round($tamt);
      
     
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
 
 
 
			$html .='Total Invoice Amount in Words:Rupees- "'.strtoupper($result) .  $points .' ONLY  	</th>
        <th colspan="4" style="font-size:11px;">For OSPS Telecom Services Pvt.Ltd.
        <br/><br/>
	   <br/>  <br/>  <br/>
        Authorized Signatory
        
        </th></tr> ';
 $html .='</table>';
 
 
 
        require_once('html2pdf/html2pdf.class.php');


        $html2pdf = new HTML2PDF('P', 'A4', 'fr');

        $html2pdf->setDefaultFont('Arial');
        
       $html2pdf->writeHTML($content, isset($_GET['vuehtml']));

        $html2pdf = new HTML2PDF('P', 'A4', 'fr',false, 'UTF-8', array(mL, mT, mR, mB));
		 //$html2pdf->WriteHTML($content);
//$html2pdf->SetHeader();
$html2pdf->setTestIsImage(false);
     // $html2pdf->setFallbackImage('/images/printer.png');
        
// different layout of odd and even pages


        $html2pdf->WriteHTML($html);
		$html2pdf->Output('file_$sno.pdf', 'F');

        $to = "kolliparasrinu.srinu@gmail.com";
        $from = "test@gmail.com";
        $subject = "hi test mail with attachment";

        $message = "<p>Please see the attachment.</p>";
        $separator = md5(time());
        $eol = PHP_EOL;
        $filename = "pdf-document.pdf";
		$content = $html2pdf->Output('doc-'.$sno.'.pdf','F');
		
		
		
		header('Location:map.php?id='.$bid.'&loc='.$loc);
		
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

