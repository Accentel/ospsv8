<?php
require_once("dbconnection/connection.php");

$contents="S No \t category \t  Item_Code  \t Item Desc \t primary_uom \t qty \t Hsn \t sac  \t item_category\n ";

/*$tu="SELECT category,item_code,item_desc,primary_uom,qty,sac,hsn,item_category, products.item_code
FROM products
INNER JOIN(
SELECT item_code
FROM products
GROUP BY item_code
HAVING COUNT(item_code) >1 dup
)temp ON products.item_code= temp.item_code;";
*/

$tt="SELECT category,`item_code`, `item_desc`,primary_uom,qty,item_category, `hsn`,`sac` FROM products WHERE item_code in (SELECT item_code FROM products GROUP BY item_code HAVING count(*) > 1)";

$user_query = mysqli_query($link,$tt) or die(mysqli_error($link));
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
$contents.=$row['hsn']."\t";
$contents.=$row['sac']."\t";
$contents.=$row['item_category']."\n";



$i++;
}

// remove html and php tags etc.
$contents = strip_tags($contents); 

//header to make force download the file
header("Content-Disposition: attachment; filename=Tsproducts-duplicateList".date('d-m-Y').".xls");
print $contents;

//For more examples related PHP visit www.webinfoipedia.com and enjoy demo and free download..
//}
?>