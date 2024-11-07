<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');
$y=mysqli_query($link,"select * from employee where emp_name='$name'");
$y1=mysqli_fetch_array($y);
$email=$y1['emp_email'];


//include'dbfiles/iqry_acyear.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<?php
		//include("header.php");
	?>
	<style>
body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tahoma";
}
.styled-button-2 {
	 background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    min-height: 28.7cm;
    padding: 1.5cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 0.25cm;
    border: 0px red solid;
    height: 245mm;
	padding-top:0px;
	font:"Times New Roman", Times, serif;
	font-size:15px;
  
}
.ddd{
	
	padding-bottom:100px;
	
	}
	.ddd1{
	height: 100px;
	padding-top:50px;
	
	}

@page {
    size: A4;
    margin: 0;
}
@media print {
    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
	
}
@media screen {
    div#footer_wrapper {
      display: none;
    }
  }

  @media print {
    tfoot { visibility: hidden; }

    div#footer_wrapper {
      margin: 0px 2px 12px 7px;
      position: fixed;
      bottom: 0;
    }

    div#footer_content {
      font-weight: bold;
    }
  }

</style>
<script language="JavaScript" type="text/javascript">
function prnt(){
document.getElementById("prnt").style.display="none";
document.getElementById("cls").style.display="none";
window.print();
window.close();
}
function closew(){
window.close();
}

function abc(){
	
//document.getElementById('tr1').style.display='none';
window.print();
window.close();
//document.getElementById('tr1').style.display='';
}
</script>


	</head>

	<body style="margin-top:0px;">

	<div class="book">
     <div class="page">
        <div class="subpage">
       <div style="height:100px;"></div>
							<h3 align="center"><u>SAFETY SELF DECLARATION</u></h3>
  <div style="height:100px;"></div>
	<?php
			//include("config.php");

			$bno = $_REQUEST['id'];
			
			$ty="select * from add_apbill1 where id='$bno'";
			$t = mysqli_query($link,$ty);
			//$sql= mysql_query("select  b.mrno,b.BillDate,b.phoneno,b.PatientName,b.Age,b.Sex,b.DoctorName,b.conce_type,b.ptype,b1.Total,b1.Discount,b1.NetAmount,b1.PaidAmount,b1.BalanceAmount,b1.time from bill b,bill1 b1 where b.BillNO=b1.BillNO and b.BillNO='$bno'");
			$row=mysqli_fetch_array($t);
				$podate = date('d/m/Y',strtotime($row['po_date']));
				$pono = $row['po_no'];
					
				
		?>
   
  <div>We hereby declare to M/s Indus Towers Limited the all the works carried out with own and outsourced arrangements to complete the works pertaining to the PO No <b><?php echo $pono; ?></b>
  <br/>dated <b><?php echo $podate; ?></b> were executed as per Indus Safety policy rules. </div>
 <div style="height:50px;"></div>
 <div>We also declare that there were no deviations allowed against Indus Safety policy under any circumstances during entire peroid of work </div>
 <div style="height:150px;"></div>
  
      
      <div>Date : <?php echo date('d/m/Y'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Authorized</div>
	  <div style="height:150px;"></div>
 <div height="100" colspan="3" align="center"><input type="button" value="Print" id="prnt" class="butt" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="butt" onclick="window.close();"/></div>
    
      
      
      
      
      
     
        
       <div id="footer_wrapper">
  <div id="footer_content">
  <!--  <p>24x7 Emergency: *Cardiac  *Neuro  *Paediatric  *General Surgery  *Ortho Poly Trauma Services Available</p>
    <hr />
    <p>Super Bazar,HUZURABAD-505 468,Dist.Karimnagar.*Cell:9441773007, 9959954108,8008036663</p>-->
  </div>
</div>
		  
</div>
</div>
</div>
	</body>

</html>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:index.php');

}

?>