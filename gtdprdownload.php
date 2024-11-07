<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=gtdprdownload.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");

	require_once 'dbconnection/connection.php';
	
	$output = "";
	
	//if(ISSET($_POST['export'])){
		$output .="
			<table border='1'>
				<thead>
					<tr>
						<th>SNO</th>
						<th>Circle</th>
						<th>Request Reference</th>
						<th>Indus Site Id</th>
						<th>Site Name</th>
						<th>Op Co</th>
						<th>TSP</th>
						<th>Allocation Date</th>
						<th>Po No</th>
						<th>Billing Status</th>
						<th>Remaks</th>
					</tr>
				<tbody>
		";
		
		$query = mysqli_query($link,"SELECT * FROM `add_gbill1` where bill_status=''") or die(mysqli_error($link));
		$i=1;
		while($fetch = mysqli_fetch_array($query)){
			
		$output .= "
					<tr>
						<td>".$i."</td>
						<td>Gujarath</td>
						<td>".$fetch['req_ref']."</td>
						<td>".$fetch['indus_id']."</td>
						<td>".$fetch['site_name']."</td>
						<td>".$fetch['seeking_opt']."</td>
						<td>OSPS</td>
						<td>".$fetch['allcoation_date']."</td>
						<td>".$fetch['po_no']."</td>
						<td>".$fetch['bill_status']."</td>
						<td></td>
					</tr>
		";
		$i++;}
		
		$output .="
				</tbody>
				
			</table>
		";
		
		echo $output;
	//}
	
?>