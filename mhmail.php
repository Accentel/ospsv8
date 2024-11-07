
<?php

function multi_attach_mail($to, $subject, $message, $senderEmail, $senderName, $files = array()){ 
 
    $from = $senderName." <".$senderEmail.">";  
$headers = "From: $from"; 
//    $headers = "From: ospsbilling@ospsindia.com";

    // Boundary  
    $semi_rand = md5(time());  
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
 
    // Headers for attachment  
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";  
 
    // Multipart boundary  
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
    "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";  
 
    // Preparing attachment 
    if(!empty($files)){ 
        for($i=0;$i<count($files);$i++){ 
            if(is_file($files[$i])){ 
                $file_name = basename($files[$i]); 
                $file_size = filesize($files[$i]); 
                 
                $message .= "--{$mime_boundary}\n"; 
                $fp =    @fopen($files[$i], "rb"); 
                $data =  @fread($fp, $file_size); 
                @fclose($fp); 
                $data = chunk_split(base64_encode($data)); 
                $message .= "Content-Type: application/octet-stream; name=\"".$file_name."\"\n" .  
                "Content-Description: ".$file_name."\n" . 
                "Content-Disposition: attachment;\n" . " filename=\"".$file_name."\"; size=".$file_size.";\n" .  
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
            } 
        } 
    } 
     
    $message .= "--{$mime_boundary}--"; 
    $returnpath = "-f" . $senderEmail; 
     
    // Send email 
    $mail = @mail($to, $subject, $message, $headers, $returnpath);  
     
    // Return true, if email sent, otherwise return false 
    if($mail){ 
        return true; 
    }else{ 
        return false; 
    } 
}
// Email configuration 
include('dbconnection/connection.php');
$id=$_GET['id'];
$sno=$_GET['sno'];
$u=mysqli_query($link,"select * from add_mbill1 where service_no='$sno'") or die(mysqli_error($link));
$u1=mysqli_fetch_array($u);
$pno=$u1['po_no'];
$wcc_num=$u1['wcc_num'];
$wcc_rec_num=$u1['wcc_rec_num'];
$loc=$u1['location'];
$l1=mysqli_query($link,"select * from location where id='$loc'") or die(mysqli_error($link));
$l2=mysqli_fetch_array($l1);
$location=$l2['lname'];
$rnew=mysqli_query($link,"select * from mgallery where serviceno='$sno'") or die(mysqli_error($link));
$checknr= mysqli_num_rows($rnew);
 
 if($checknr!=2)
 {
 print "<script>";
			print "alert('Only 2  attachments are allowed!Kindly check and delete Inapropriate attachements');";
			print "self.location='mbill_list.php';";
			print "</script>";
			exit;
 }
$from="ospsbilling@ospsindia.com";
$to ='invoiceDesk@industowers.com'.',';
$to .='billingosps@gmail.com'.',';
$to .='ghousekhan@ospsindia.com'.',';
$to .='a-omer.md3@industowers.com'.','; 
$to .='ospshyd@yahoo.com';
 //$to;
$fromName = 'OSPS Billing'; 
 
$subject = "Invoice Number:-".$sno." -Po:".$pno."-WCC:".$wcc_num."-Rec:".$wcc_rec_num."-".$location;  
 $r=mysqli_query($link,"select * from mgallery where serviceno='$sno'") or die(mysqli_error($link));
while($r1=mysqli_fetch_array($r)){
     $imgname=$r1['image'];
    
     if($r1['extension']!='pdf' && $r1['extension']!='PDF')
		{
		 print "<script>";
			print "alert('Only Pdf files supported ');";
			print "self.location='mbill_list.php';";
			print "</script>";
		exit;
		}
  $files[]="uploads/mah/".$imgname;
$file = fopen($doc,"rb");
		$data = fread($file,filesize($doc));
		$countfs =$countfs + filesize($doc)/1000000; 
		if($countfs > 10)
		{
		 print "<script>";
			print "alert('File Size exceeding 10 Mb! Kindly reduce the file size and retry !');";
			print "self.location='mbill_list.php';";
			print "</script>";
		exit;
		}
}
// Attachment files 

$htmlContent ="
    <p>Dear Sir/Madam,</p></br><p>
Greeting from our side!</p></br>
<p>Please find the attached  Invoice with DSC</p></br>
<table border=1><tr><td>Invoice no: $sno</td></tr>
<tr><td>Purchase Order no: $pno</td></tr>
<tr><td>WCC no           : $wcc_num</td></tr>
<tr><td>Reciept no       : $wcc_rec_num</td></tr>
<tr><td>Circle           : $location</td></tr></table></br></br>
<p>Thanks and Regards</p></br>
<p>OSPSBILLING</p></br>
<p>*This is a system generated email! Do not reply!</p>"; 
 
// Call function and pass the required arguments 
$sendEmail = multi_attach_mail($to, $subject, $htmlContent, $from, $fromName, $files); 
 
// Email sending status 
if($sendEmail){ 
    echo '<script language="javascript">';
echo 'alert("mail successfully sent")';
echo '</script>';
	print "<script>";
	print "self.location='mbill_list.php';";
	print "</script>";
}else{ 
    echo 'Mail sending failed!'; 
}
?>
