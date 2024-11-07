<?php 
function numberTowords2($number)
{
   
   $no = floor($number);
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
  return 'Total Invoice Amount in Words - '.strtoupper($result).' RUPEES ONLY ';
}
function numberTowords($num)
{ 
$ones = array( 
1 => "one", 
2 => "two", 
3 => "three", 
4 => "four", 
5 => "five", 
6 => "six", 
7 => "seven", 
8 => "eight", 
9 => "nine", 
10 => "ten", 
11 => "eleven", 
12 => "twelve", 
13 => "thirteen", 
14 => "fourteen", 
15 => "fifteen", 
16 => "sixteen", 
17 => "seventeen", 
18 => "eighteen", 
19 => "nineteen" 
); 
$tens = array( 
1 => "ten",
2 => "twenty", 
3 => "thirty", 
4 => "forty", 
5 => "fifty", 
6 => "sixty", 
7 => "seventy", 
8 => "eighty", 
9 => "ninety" 
); 
$hundreds = array( 
"hundred", 
"thousand", 
"million", 
"billion", 
"trillion", 
"quadrillion" 
); //limit t quadrillion 
$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){ 
if($i < 20){ 
$rettxt .= $ones[$i]; 
}elseif($i < 100){ 
$rettxt .= $tens[substr($i,0,1)]; 
$rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
$rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
$rettxt .= " ".$tens[substr($i,1,1)]; 
$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
} 
} 
if($decnum > 0){ 
$rettxt .= " and "; 
if($decnum < 20){ 
$rettxt .= $ones[$decnum]; 
}elseif($decnum < 100){ 
$rettxt .= $tens[substr($decnum,0,1)]; 
$rettxt .= " ".$ones[substr($decnum,1,1)]; 
} 
} 
return 'Total Invoice Amount in Words - '.strtoupper($rettxt).' RUPEES ONLY'; 
} 

extract($_POST);
if(isset($convert))
{
echo "<p align='center' style='color:blue'>".numberTowords2("$num")."</p>";
}

?>
<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//export.php

//export.php

//error_reporting(E_ALL);

/** PHPExcel */
require_once 'PHPExcel-1.8/Classes/PHPExcel.php';
include 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
include('dbconnection/connection.php');
$result = array();
$finalresults=array();
$outputFileType = 'Excel2007';
$objPHPExcel = new PHPExcel();

$objPHPExcel = PHPExcel_IOFactory::load("INVOICE FORMAT.xlsx");
$id=$_GET['id'];
$sq=mysqli_query($link,"select * from add_goabill1 where id='$id'");
$r=mysqli_fetch_array($sq);
$serviceno=$r['service_no'];
$pono=$r['po_no'];
$date=$r['date'];
$sitename=$r['site_name'];
$seekingoptid=$r['seeking_id'];
$seekingopt=$r['seeking_opt'];
$indus_id=$r['indus_id'];
$allocationdate=$r['allocation_date'];
$wccno=$r['wcc_num'];
$wccrecieptnum=$r['wcc_rec_num'];
$podate=$r['po_date'];
$district=$r['district'];
$refno=$r['req_ref'];
$state=$r['state'];
$rfaiddate=$r['rfaid_date'];
$pcw=$r['pcw'];

$total_gst=$r['total_gst'];
$total_amnt=$r['total_amnt'];
$objPHPExcel->getActiveSheet()->setTitle('Tax Invoice');
$objPHPExcel->getActiveSheet()->setCellValue('C3',$serviceno );
$objPHPExcel->getActiveSheet()->setCellValue('C4',$date );
$objPHPExcel->getActiveSheet()->setCellValue('I6',$pono );	
$objPHPExcel->getActiveSheet()->setCellValue('I7', $sitename);
$objPHPExcel->getActiveSheet()->setCellValue('I8', $indus_id);
$objPHPExcel->getActiveSheet()->setCellValue('I9', $seekingoptid);
$objPHPExcel->getActiveSheet()->setCellValue('I10',$seekingopt);
$objPHPExcel->getActiveSheet()->setCellValue('I11', $allocationdate);	
$objPHPExcel->getActiveSheet()->setCellValue('I12', $wccno);
$objPHPExcel->getActiveSheet()->setCellValue('I13', $wccrecieptnum);
$objPHPExcel->getActiveSheet()->setCellValue('L6', $podate);	
$objPHPExcel->getActiveSheet()->setCellValue('L7', $district);
$objPHPExcel->getActiveSheet()->setCellValue('L8', $refno);
$objPHPExcel->getActiveSheet()->setCellValue('L9', $state);	
$objPHPExcel->getActiveSheet()->setCellValue('L10', $rfaiddate);
$objPHPExcel->getActiveSheet()->setCellValue('L11', $pcw);
$objPHPExcel->getActiveSheet()->setCellValue('L43', $total_gst);
$objPHPExcel->getActiveSheet()->setCellValue('L44', $total_gst);
$objPHPExcel->getActiveSheet()->setCellValue('L45', $total_gst+$total_amnt);
$objPHPExcel->getActiveSheet()->setCellValue('A47', numberTowords2($total_gst+$total_amnt));


/*$objPHPExcel->getActiveSheet()->setCellValue('A7', 'FM Fault No: '.$falt_no);
$objPHPExcel->getActiveSheet()->setCellValue('G7', 'FM Fault Date: '.$falt_date);
$objPHPExcel->getActiveSheet()->setCellValue('A8', 'Fault Description: '.$falt_desc);
$objPHPExcel->getActiveSheet()->setCellValue('c10', $r1['company_name']);
$objPHPExcel->getActiveSheet()->setCellValue('c11', $r1['address']);
$objPHPExcel->getActiveSheet()->setCellValue('c12', $statefull);
$objPHPExcel->getActiveSheet()->setCellValue('c13', $r1['gst_in']);
$objPHPExcel->getActiveSheet()->setCellValue('c15', $ship_name);
$objPHPExcel->getActiveSheet()->setCellValue('c16', $store_name.','.$addr1);
$objPHPExcel->getActiveSheet()->setCellValue('c17', $ship_state);
$objPHPExcel->getActiveSheet()->setCellValue('c18', $ship_gst);*/

include_once('dbconnection/connection.php');
 $aa="select * from add_goabill where  id1='$id' ";
 
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$i=1;

$rowCount=17;
while($rows = mysqli_fetch_array($t))
{
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount, $i);
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $rows['item_desc']);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$rowCount, $rows['hsnno']);
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$rowCount, $rows['uom']);
     $objPHPExcel->getActiveSheet()->setCellValue('I'.$rowCount, $rows['qty']);
    $objPHPExcel->getActiveSheet()->setCellValue('K'.$rowCount, $rows['price']);
    $objPHPExcel->getActiveSheet()->setCellValue('L'.$rowCount, $rows['tax_amnt']);
    //$objPHPExcel->getActiveSheet()->setCellValue('L'.$rowCount, $rows['$totalgst']);
   $rowCount++;
   $i++;
    
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=".$serviceno." ".$state." ".OSPS.".xlsx");
header('Cache-Control: max-age=0');


$objPHPExcelWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,$outputFileType);
$objPHPExcelWriter->save('php://output');



?>