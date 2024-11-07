<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=tmhdprdownload.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");

	require_once 'dbconnection/connection.php';
	
	$output = "";
	
	//if(ISSET($_POST['export'])){ 4583626
		$output .="
			<table border='1'>
				<thead>
					<tr>
						<th>SNO</th>
						<th>Request Reference</th>
						<th>Site Name</th>
						<th>District</th>
					    <th>State</th>
						<th>Indus Id</th>
						<th>Seeking Id</th>
						<th>Seeking Opt</th>
						<th>Allocation Date</th>
						<th>Site Type</th>
						<th>Complete Date</th>
						<th>Ptw</th>
						<th>Location</th>
				    </tr>
				<tbody>
		";
		
		$query = mysqli_query($link,"SELECT * FROM `mrefferences`") or die(mysqli_error($link));
		$i=1;
		while($fetch = mysqli_fetch_array($query)){
			
		$output .= "
					<tr>
						<td>".$i."</td>
						<td>".$fetch['req_ref']."</td>
						<td>".$fetch['site_name']."</td>
						<td>".$fetch['district']."</td>
						<td>".$fetch['state']."</td>
						<td>".$fetch['indus_id']."</td>
						<td>".$fetch['seeking_id']."</td>
						<td>".$fetch['seeking_opt']."</td>
						<td>".$fetch['allocation_date']."</td>
						<td>".$fetch['sitetype']."</td>
						<td>".$fetch['comp_date']."</td>
						<td>".$fetch['ptw']."</td>
						<td>MH</td>
						</tr>";
		$i++;}
		
		$output .="
				</tbody>
				
			</table>
		";
		
		echo $output;
	//}
	
?>