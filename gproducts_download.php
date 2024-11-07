<?php
require_once("dbconnection/connection.php");

$contents="S No \t Category \t Item_Code  \t Item_Description\t Primary _UOM\t Quantity \t Price_Unit \t Hsn \t Sac \t Item_Category \t Cgst \t Sgst \t Igst \n ";


$user_query = mysqli_query($link,"SELECT * FROM  gproducts") or die(mysqli_error($link));
$i=1;
//While loop to fetch the records
while($row = mysqli_fetch_array($user_query))
{
$contents.=$i."\t";
$contents.=$row['category']."\t";
$contents.=$row['item_code']."\t";
$contents.=$row['item_desc']."\t";
$contents.=$row['primary_uom']."\t";
$contents.=$row['qty']."\t";
$contents.=$row['sac']."\t";
$contents.=$row['hsn']."\t";
$contents.=$row['sac']."\t";
$contents.=$row['item_category']."\t";
$contents.=$row['cgst']."\t";
$contents.=$row['sgst']."\t";
$contents.=$row['igst']."\n";


$i++;
}

// remove html and php tags etc.
$contents = strip_tags($contents); 

//header to make force download the file
header("Content-Disposition: attachment; filename=Tsproducts-List".date('d-m-Y').".xls");
print $contents;

//For more examples related PHP visit www.webinfoipedia.com and enjoy demo and free download..
//}
?>