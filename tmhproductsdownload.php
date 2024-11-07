<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=tmhproductsdownload.xls");  
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
						<th>category</th>
						<th>item_code</th>
						<th>item_desc</th>
					    <th>primary_uom</th>
						<th>qty</th>
						<th>price_unit</th>
						<th>hsn</th>
						<th>sac</th>
						<th>item_category</th>
						<th>cgst</th>
						<th>sgst</th>
						<th>igst</th>
				    </tr>
				<tbody>
		";
		
		$query = mysqli_query($link,"SELECT * FROM `mproducts`") or die(mysqli_error($link));
		$i=1;
		while($fetch = mysqli_fetch_array($query)){
			
		$output .= "
					<tr>
						<td>".$i."</td>
						<td>".$fetch['category']."</td>
						<td>".$fetch['item_code']."</td>
						<td>".$fetch['item_desc']."</td>
						<td>".$fetch['primary_uom']."</td>
						<td>".$fetch['qty']."</td>
						<td>".$fetch['price_unit']."</td>
						<td>".$fetch['hsn']."</td>
						<td>".$fetch['sac']."</td>
						<td>".$fetch['item_category']."</td>
						<td>".$fetch['cgst']."</td>
						<td>".$fetch['sgst']."</td>
						<td>".$fetch['igst']."</td>
						</tr>";
		$i++;}
		
		$output .="
				</tbody>
				
			</table>
		";
		
		echo $output;
	//}
	
?>