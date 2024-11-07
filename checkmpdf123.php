 <html>
     <head>
<title></title>     

 </head>
 <body>
   <?php 
   ob_start();
   ?>  
     <h1>hello</h1>
</body>     
 <?php
    
    $body=ob_get_clean();
$body=iconv("UTF-8","UTF-8//IGNORE",$body);

include('mpdf/mpdf/mpdf.php');
$mpdf=new \mPDF('c','A4','','',0,0,0,0,0,0);
$mpdf->writeHTML($body);
$mpdf->Output('demo.pdf','F');
error_reporting(E_ALL);
ini_set('display_errors', 1);
	print "<script>";
	print "self.location='demo.pdf';";
	print "</script>";
	
?>
 </html>