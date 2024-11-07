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
	}
     .tdcolor{
		  background-color:#ccc;
	 }  
.hc{
	font-size:10px;
	font-family:verdana;
} 	 
    </style>
    </head>
    <body>
<?php 


 
?>
<?php
			//include("config.php");

			$bno = $_REQUEST['id'];
			
			$ty="select * from add_mbill1 where id='$bno'";
			$t = mysqli_query($link,$ty);
			//$sql= mysql_query("select  b.mrno,b.BillDate,b.phoneno,b.PatientName,b.Age,b.Sex,b.DoctorName,b.conce_type,b.ptype,b1.Total,b1.Discount,b1.NetAmount,b1.PaidAmount,b1.BalanceAmount,b1.time from bill b,bill1 b1 where b.BillNO=b1.BillNO and b.BillNO='$bno'");
			$row=mysqli_fetch_array($t);
				$podate = date('d/m/Y',strtotime($row['po_date']));
				$pono = $row['po_no'];
				$service_no = $row['service_no'];
				$date = date('d/M/Y',strtotime($row['date']));
					
				
		?>
<table width="100%" cellpadding="0" cellspacing="0" class="hc"> 
           
    <tr>
        <td> 
 <table cellpadding="4" cellspacing="0" width="100%" border="1" class="hc">
					 <tr style="height:20px;background-color:#ccc">
					 <td colspan="4">
					 </td></tr>
                        <tr>
                            <td align="left"><b>Inward Number-</b></td>
						<td >                      </td>
						<td ><b>Inward Date-       </b></td>
						<td >                      </td>
                        </tr>
						   <tr>
                            <td align="left"><b>Partner Name:- </b></td>                                                     
                        <td ><b>OSPS Telecom services PVT .LTD.  </b></td>
						<td ><b>Invoice No.                    </b></td>
						<td ><b>   <?php echo $service_no;?>                 </b></td>
						</tr>
						 <tr>
                            <td align="left"><b>PO NO: </b></td>                                                     
                        <td ><b>      <?php echo $pono;?>             </b></td>
						<td ><b>Invoice Date                   </b></td>
						<td > <b>         <?php echo $date;?>                      </b></td>
						</tr>
						 <tr>
                            <td align="left"><b>User Name :</b></td>                                                     
                        <td ><b>                   </b></td>
						<td ><b>Depart:             </b></td>
						<td ><b>Deployment                    </b></td>
						</tr>	 
						<tr>
                            <td align="left"><b>E-Mail ID:-</b></td>                                                     
                        <td ><u>ospshyd@yahoo.com</u>   </td>
						<td ><b>Contact No-             </b></td>
						<td ><b>9963766697              </b></td>
						</tr>
						</table>
                    <table cellspacing="0" width="100%" border="1" class="hc">
                       
                        <tr style="background-color:#ccc">
 							<th align="center" rowspan="2"><b>S.No.</b></th>
                            <th align="center" width="450px" rowspan="2"><b>Particulars</b></th>
                             <th align="center" rowspan="2"><b>Supply<br/>(Y/N)</b></th>
                             <th align="center" colspan="4"><b>Services</b></th>
							 </tr>
							 <tr style="background-color:#ccc">
							 <th><b>TSP(Electrical/<br/>Civil&others)</b></th>
							 <th><b>OME/<br/>SME</b></th>
							 <th><b>EB/Liasioning</b></th>
							 <th><b>Other Services<br/>(Legal/Rent etc.)</b></th>
							 </tr>
							 <tr>
							 <td>1</td>
							 <td>GRN copy for material supplied</td>
							<td align="center" class="tdcolor">&#10004;</td>
							<td align="center">x  </td>
							 <td align="center">x </td>
							 <td align="center">x </td>
							 <td align="center">x </td>
							 </tr>
							 <tr>
							 <td>2</td>
							 <td>Original LR copy attached</td>
							<td align="center" class="tdcolor"> &#10004;</td>
							<td align="center">  x</td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>3</td>
							 <td>PAN Number & PAN based Service Tax/TIN No. on Invoice </td>
							<td align="center" class="tdcolor"> &#10004;</td>
							<td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 </tr>
							 <tr>
							 <td>4</td>
							 <td>Two copies of invoices (One original and one duplicate)</td>
							<td align="center" class="tdcolor">&#10004; </td>
							<td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 </tr>
							 <tr>
							 <td>5</td>
							 <td>Approved PO copy attached  </td>
							<td align="center" class="tdcolor"> &#10004;</td>
							<td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 </tr>
							 <tr>
							 <td>6</td>
							 <td>Excise DFT Copy  (With warehouse ) </td>
							<td align="center" class="tdcolor">&#10004; </td>
							<td align="center"> x</td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>7</td>
							 <td>Original delivery challan </td>
							<td align="center" class="tdcolor"> &#10004;</td>
							<td align="center"> x</td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 <td align="center">x </td>
							 </tr>
							 <tr>
							 <td>8</td>
							 <td>Packing List attached  </td>
							<td align="center" class="tdcolor"> &#10004;</td>
							<td align="center"> x</td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>9</td>
							 <td>In case of Direct Tower Supply, PDI copy is required  </td>
							<td align="center" class="tdcolor"> &#10004;</td>
							<td align="center">x </td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>10</td>
							 <td>Service Category mentioned </td>
							<td align="center"> x</td>
							<td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor">&#10004;</td>
							 </tr>
							 <tr>
							 <td>11</td>
							 <td>In case of Agreement based invoices, valid vendor contract summary/valid agreement  date/Year should be Mentioned over the invoice ( Mandatory) </td>
							<td align="center"> x</td>
							<td align="center" class="tdcolor">&#10004; </td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 </tr>
							 <tr>
							 <td>12</td>
							 <td>PF/ESIC/Wages Register/Returns proof attached (in case labour charges are mentioned)</td>
							<td align="center"> x</td>
							<td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>13</td>
							 <td>State wise separate invoice made  </td>
							<td align="center"> x</td>
							<td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor">&#10004; </td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 </tr>
							 <tr>
							 <td>14</td>
							 <td>Rates are as per attached BOQ. In case not, approval to be taken from CCEO  </td>
							<td align="center"> x</td>
							<td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center" class="tdcolor">&#10004; </td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>15</td>
							 <td>Work Completion certifiacte should be signed by EB / Cluster Manager team  </td>
							<td align="center"> x</td>
							<td align="center" class="tdcolor">&#10004;  </td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>16</td>
							 <td>Soft copy of indus ID list (in case no. of sites are more than 10) To VHD and copy to finance  </td>
							<td align="center"> x</td>
							<td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center">x </td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>17</td>
							 <td>Indus ID / Complete address / State mentioned in invoice</td>
							<td align="center"> x</td>
							<td align="center" class="tdcolor">&#10004;</td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>18</td>
							 <td>NOC from owner attached (In case of civil work)  </td>
							<td align="center"> x</td>
							<td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center">x </td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>19</td>
							 <td>Photo of site attached with Co. stamp (In case of civil work-before and after) & New EB </td>
							<td align="center"> x</td>
							<td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center"> x</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>20</td>
							 <td>Third party Quality & Verification Sign  </td>
							<td align="center"> x</td>
							<td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center">x </td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>21</td>
							 <td>Soil Testing report in case of Civil workon new site /Cube Test Reports</td>
							<td align="center"> x</td>
							<td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center">x </td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>22</td>
							 <td>Handover take over (HOTO) declartion(TSP)</td>
							<td align="center"> x</td>
							<td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center">x </td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>23</td>
							 <td>ISQ Ref. no :-req as per site (TSP) </td>
							<td align="center"> x</td>
							<td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center">x </td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>24</td>
							 <td>KPI Sheets, Needs to be verified by all Opex Manager </td>
							<td align="center"> x</td>
							<td align="center"> x</td>
							 <td align="center" class="tdcolor">&#10004;</td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>25</td>
							 <td>Theft details along with FIR & DDR no's  should be mention</td>
							<td align="center"> x</td>
							<td align="center"> x</td>
							 <td align="center" class="tdcolor">&#10004;</td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>26</td>
							 <td>Invoice period should be matched with PO period</td>
							<td align="center"> x</td>
							<td align="center"> x</td>
							 <td align="center" class="tdcolor">&#10004;</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>27</td>
							 <td> Field survey Report attached</td>
							<td align="center"> x</td>
							<td align="center"> x</td>
							 <td align="center" class="tdcolor">&#10004;</td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>28</td>
							 <td>Service period of the invoice after RFAI date for OME & SME</td>
							<td align="center"> x</td>
							<td align="center"> x</td>
							 <td align="center" class="tdcolor">&#10004;</td>
							 <td align="center"> x</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>29</td>
							 <td>Receipt copy in cases of New connections / Load Up gradation / Transfer Installation</td>
							<td align="center"> x</td>
							<td align="center">x </td>
							 <td align="center"> x</td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>30</td>
							 <td>Original Receipt required in EB Reimbursement bills with security & other Expense bifurcation  </td>
							<td align="center"> x</td>
							<td align="center"> x</td>
							 <td align="center">x </td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>31</td>
							 <td>Increase of HT EB Liaisoning Electricity Board approval letter required</td>
							<td align="center"> x</td>
							<td align="center"> x</td>
							 <td align="center">x </td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center"> x</td>
							 </tr>
							 <tr>
							 <td>32</td>
							 <td>Transformer Test Certificate & Warranty Certificate (if supplied)</td>
							<td align="center"> x</td>
							<td align="center"> x</td>
							 <td align="center">x </td>
							 <td align="center" class="tdcolor"> &#10004;</td>
							 <td align="center"> x</td>
							 </tr>
							 
							 <td colspan="7" class="tdcolor"><b>VHD USE ONLY </b></td>
							 </tr>
							 <tr>
							 <td colspan="7"><b>RTV-Remarks</b> <br/>
							 <br/><b>
							 VERIFICATION & APPROVALS</b>
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
<!--<table>

<tr>
    <td  colspan="7" align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>-->
		<div align="center">
		<input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/>
		</div>
    </body>
</html>
