<?php
include('dbconnection/connection.php');

 $sdate=$_GET['sdate'];
 $edate=$_GET['edate'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
 
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Patients Report</title>
        <script type="text/javascript">
            function printt()
            {
                document.getElementById("prt").style.display="none";
                document.getElementById("cls").style.display="none";
             window.print();
            }
            function closs()
            {
                window.close();
            }
        </script>
        <style type="text/css">
            .header{
                font-family: monospace,sans-serif,arial;
                font-size: 20px;
                font-weight: bold;
                text-align: center;
                text-decoration: underline;
            }
            .heading1 {	
                    font-size:24px;
                    text-align:center;
                    font-weight: bold; 
            }
            .heading2 {	
                font-size:16px;
                text-align:center;
            }
            body {
	background: #FFFFFF;
	margin-top:0px;
}
.hc{
	font-size:10px;
	font-family:verdana;
}   
   </style>
    </head>
    <body>
<?php
			//include("config.php");

			$bno = $_REQUEST['id'];
			
			$ty="select * from add_apbill1 where id='$bno'";
			$t = mysqli_query($link,$ty);
			//$sql= mysql_query("select  b.mrno,b.BillDate,b.phoneno,b.PatientName,b.Age,b.Sex,b.DoctorName,b.conce_type,b.ptype,b1.Total,b1.Discount,b1.NetAmount,b1.PaidAmount,b1.BalanceAmount,b1.time from bill b,bill1 b1 where b.BillNO=b1.BillNO and b.BillNO='$bno'");
			$row=mysqli_fetch_array($t);
				$podate = date('d/m/Y',strtotime($row['po_date']));
				$pono = $row['po_no'];
				$service_no = $row['service_no'];
				$date = date('d/m/Y',strtotime($row['date']));
					
				
		?>

<table width="100%" cellpadding="0" cellspacing="0" > 
           
    <tr>
        <td> 
 <table cellpadding="4" cellspacing="0" width="100%" border="1" class="hc">
                        <tr>
                            <td align="left"><b>Partner Name:OSPS TELECOM SERVICES PVT.LTD </b></td>                                                     
                        </tr>
						   <tr>
                            <td align="left"><b>Invoice No.& Invoice Date: <?php echo $service_no."    &    ".$date ?> </b></td>                                                     
                        </tr>
						 <tr>
                            <td align="left"><b>PO No: <?php echo $pono; ?> </b></td>                                                     
                        </tr>
						 <tr>
                            <td align="left"><b>User Name & Dept:Deployment</b></td>                                                     
                        </tr>	 
						</table>
						</td>
						</tr>
						<tr>
						<td>
                    <table cellspacing="0" width="100%" border="1" class="hc">
                       <tr style="background-color:#ccc";>
 							<th align="center" rowspan="2" ><b>S.No.</b></th>
                            <th align="center" width="450px" rowspan="2"><b>Particulars</b></th>
                             <th align="center" rowspan="2"><b>Supply<br/>(Y/N)</b></th>
                             <th align="center" colspan="4"><b>Services</b></th>
							 </tr>
							 <tr style="background-color:#ccc";>
							 <td><b>TSP(Electrical/<br/>Civil&others)</b></td>
							 <td><b>OME/<br/>SME</b></td>
							 <td><b>EB/liasioning</b></td>
							 <td><b>Other Services<br/>(Legal/Rent etc.)</b></td>
							 </tr>
							 <tr>
							 <td>1</td>
							 <td>Invoice Must be Addressed to Indus Towers Limited (Number must not exceeds 16 Digits).</td>
							<td> </td>
							<td align="center">  Y  </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>2</td>
							 <td >WCC/Receipt for Service and ASN/GRN copy for Materila Supply </td>
							<td> </td>
							<td align="center">  Y  </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>3</td>
							 <td>Original LR copy attached </td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>4</td>
							 <td>PAN Number & PAN based GSTIN on Invoice </td>
							<td> </td>
							<td align="center">  Y  </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>5</td>
							 <td>Two copies of invoices (Original for Recipient and Duplicate for Supplier) </td>
							<td> </td>
							<td align="center">  Y  </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>6</td>
							 <td>"Three copies of invoices for Supply (Original for Recipient/Duplicate for transporter and Triplicate for Supplier)" </td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>7</td>
							 <td>Approved PO copy attached (with Indus and Partner GSTIN)</td>
							<td> </td>
							<td align="center">  Y  </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>8</td>
							 <td>Excise DFT Copy  (With warehouse ) with Chapted Heading or Tarrif Number </td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>9</td>
							 <td>Original delivery challan  </td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>10</td>
							 <td>Packing List attached  </td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>11</td>
							 <td>In case of Direct Tower Supply, PDI copy is required </td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>12</td>
							 <td>SAC and HSN Numbers Mentioned agaist description </td>
							<td> </td>
							<td align="center">  Y  </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>13</td>
							 <td>In case of Agreement based invoices, valid vendor contract summary/valid agreement  date/Year should be Mentioned over the invoice ( Mandatory)  </td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>14</td>
							 <td>PF/ESIC/Wages Register/Returns proof attached (in case labour charges are mentioned)  </td>
							<td> </td>
							<td align="center">  Y  </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>15</td>
							 <td>State wise separate invoice made  </td>
							<td> </td>
							<td align="center">  Y  </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>16</td>
							 <td>Rates are as per attached BOQ. In case not, approval to be taken from CCEO or SCM  </td>
							<td> </td>
							<td align="center">  Y  </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>17</td>
							 <td>Work Completion certifiacte should be signed by EB / Cluster Manager team </td>
							<td> </td>
							<td align="center">  Y  </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>18</td>
							 <td>Soft copy of indus ID list (in case no. of sites are more than 2) To VHD and copy to finance  </td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>19</td>
							 <td>Indus ID / Billing and Shipping Address along with State Name and Code Mentioned on Invoice </td>
							<td> </td>
							<td align="center">  Y  </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>20</td>
							 <td>NOC from owner attached (In case of civil work)  </td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>21</td>
							 <td>Photo of site attached with Co. stamp (In case of civil work-before and after) & New EB</td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>22</td>
							 <td>Third party Quality & Verification Sign </td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>23</td>
							 <td>Soil Testing report in case of Civil workon new site /Cube Test Reports </td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>24</td>
							 <td>Handover take over (HOTO) declartion(TSP)  </td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>25</td>
							 <td>ISQ Ref. no :-req as per site (TSP) (RL Number)</td>
							<td> </td>
							<td align="center">  Y  </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>26</td>
							 <td>KPI Sheets, Needs to be verified by all Opex Manager  </td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>27</td>
							 <td>Theft details along with FIR & DDR no's  should be mention</td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>28</td>
							 <td>Invoice period should be matched with PO period & Invoice Date Shuold be after PO Date</td>
							<td> </td>
							<td align="center">  Y  </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>29</td>
							 <td>Field survey Report attached  </td>
							<td> </td>
							<td align="center">Y</td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>30</td>
							 <td>Service period of the invoice after RFAI date for OME & SME  </td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>31</td>
							 <td>Receipt copy in cases of New connections / Load Up gradation / Transfer Installation  </td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>32</td>
							 <td>Original Receipt required in EB Reimbursement bills with security & other Expense bifurcation</td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>33</td>
							 <td>Increase of HT EB Liaisoning Electricity Board approval letter required </td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr>
							 <td>34</td>
							 <td>Transformer Test Certificate & Warranty Certificate (if supplied)</td>
							<td> </td>
							<td> </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
							 </tr>
							 <tr style="height:20px;"></tr></br>
							 <tr> 
							 <td colspan="7"><b>VHD Inward No.(Mandatory)</b></td>
							 </tr>
							 <tr>
							 <td colspan="7"><b>Remarks</b></td>
							 </tr>
							 <tr>
							 <td colspan="7"><br/> <b>VEREIFICATION & APPROVALS</b><br/>
							 <b>INVOICE ACCEPTED BY(STAMP & SIGNATURE):</b>
							 </td>
							 </tr>
							 
							 
							 
							 
							 </th>
							
  </tr>
							 </td>
							 
							 
                </td>
            </tr>
				
        
		 </table>
        	<!--<tr>
	<td align="right"><img src="images/images.png"/></td>
	</tr>
-->
<!--table>

<tr>
    <td  colspan="7" align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table-->
		<div align="center">
		<input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/>
		</div>
    </body>
</html>
