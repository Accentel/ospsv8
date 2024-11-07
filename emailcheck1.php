<?php
include('dbconnection/config.php');
if($_GET['data']=='service_no'){
   $value=unique_name($_GET['service_no']);
}
if($_GET['data']=='wcc_num'){
    $value=unique_email($_GET['wcc_num']);
}
if($_GET['data']=='wcc_rec_num'){
   //$value=unique_email1($_GET['wcc_rec_num']);
    $value=unique_email1($_GET['wcc_rec_num']);
}
if($_GET['data']=='req_ref'){
   //$value=unique_email1($_GET['wcc_rec_num']);
    $value=unique_email2($_GET['req_ref']);
}
function unique_name($service_no=''){
	    $query="select count(service_no) from add_bill1 where `service_no`='$service_no'";
	   $response=mysqli_query($link,$query);
	   $result=mysqli_fetch_array($response);
	  //$result=1;
	   if($result[0]>0){
		  echo 'false';
	   }
	   else{
		   
		  echo 'true';
	   }

}


	
function unique_email($wcc_num=''){
	  $query1="select count(wcc_num) from add_bill1 where `wcc_num`='$wcc_num'";
	   $response1=mysqli_query($link,$query1);
	   $result1=mysqli_fetch_array($response1);
	   if($result1[0]>0){
		 echo 'false';
	   }
	   else{
		
		   echo 'true';
	   }

}

function unique_email1($wcc_rec_num=''){
	   $query2="select count(wcc_rec_num) from add_bill1 where `wcc_rec_num`='$wcc_rec_num' ";
	   $response2=mysqli_query($link,$query2);
	   $result2=mysqli_fetch_array($response2);
	   if($result2[0]>0){
		  echo 'false';
	   }
	   else{
		    echo 'true';
		
		 
	   }

}

function unique_email2($req_ref=''){
	   $query2="select count(req_ref) from refferences where `req_ref`='$req_ref' ";
	   $response2=mysqli_query($link,$query2);
	   $result2=mysqli_fetch_array($response2);
	   if($result2[0]>0){
		  echo 'false';
	   }
	   else{
		    echo 'true';
		
		 
	   }

}
?>