<?php
include('dbconnection/connection.php');
$q=$_GET["q"];

if($q=='Formative Assessment-1'){
	$mark=20;
} else if($q=='Formative Assessment-2'){
	$mark=20;
}else if($q=='Formative Assessment-3'){
	$mark=20;
} else if($q=='Formative Assessment-4'){
	$mark=20;
}
else if($q=='Summative Assessment1'){
	$mark=80;
} else if($q=='Summative Assessment2'){
	$mark=80;
}  
$m=trim($mark);

  echo ":".$m;
?> 
