<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
 $name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';
//include'dbfiles/iqry_acyear.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
    <style>
        strong{
            color:red;
        }
    </style>
	<script>
   
        function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
    }
    </script>
    <body class="no-skin">
        <?php include'template/logo.php'; ?>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')} catch (e) {
                    }
                </script>
                
                 <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>

<script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#register-form").validate({
    
        // Specify the validation rules
        rules: {
            service_no: {
					   required: true,
					
					   remote: "emailcheck.php?data=service_no"
					},
			
			wcc_num:{
					
					  required: true,
					
					 remote: "emailcheck.php?data=wcc_num"
				
				  },
				  
				  wcc_rec_num:{
					
					  required: true,
					
					 remote: "emailcheck.php?data=wcc_rec_num"
				
				  },
				  
				  
				   
		
            
        },
        
       
        messages: {
            service_no: { 	  required: "<strong style='color:#FF0000;font-size:14px;'>Please enter Serial Number</strong>",
							<!--minlength:"<strong style='color:#FF0000;font-size:14px;'>Mobile Number must have minimum  10 letters</strong>",-->
					       remote: "<strong style='color:#FF0000;font-size:14px;'>Serial Number Allready Entered </strong>"
				  },
			
			wcc_num:{ 
						   required: "<strong style='color:#FF0000;font-size:14px;'>Please WCC Number</strong>",
						  <!-- email: "<strong style='color:#FF0000;font-size:14px;'>Please enter a valid email address</strong>",-->
						   remote: "<strong style='color:#FF0000;font-size:14px;'>WCC Number Allready Entered </strong>"
						},
				wcc_rec_num:{ 
						   required: "<strong style='color:#FF0000;font-size:14px;'>Please Enter WCC Reciept Number</strong>",
						  <!-- email: "<strong style='color:#FF0000;font-size:14px;'>Please enter a valid email address</strong>",-->
						   remote: "<strong style='color:#FF0000;font-size:14px;'>WCC Reciept Number Allready Entered </strong>"
						},
			
			
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
  <script type="text/javascript">
function report()
{
   		

	  window.open('list.php','mywindow1','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')

	
}
</script>

 <script>
function showHint22(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	//document.getElementById("state").value=strar[1];
	
	//document.getElementById("city").value=strar[2];	
	document.getElementById("site_name").value=strar[1];	
	document.getElementById("district").value=strar[2];
    document.getElementById("state").value=strar[3];
	document.getElementById("indus_id").value=strar[4];	
	document.getElementById("seeking_id").value=strar[5];
	document.getElementById("seeking_opt").value=strar[6];
	document.getElementById("po_no").value=strar[7];
	document.getElementById("allcoation_date").value=strar[8];
	//document.getElementById("last").value=strar[11];
    }
  }
xmlhttp.open("GET","get-data1.php?q="+str,true);
xmlhttp.send();
}
</script>

                <!-- /.sidebar-shortcuts -->
                <?php include'template/sidemenu.php' ?>
                <!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>
         

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
								<li>
                                <i class="ace-icon fa fa-cog home-icon"></i>
                                <a href="#">Settings</a>
                            </li>
                            <li>
                                <a href="#">Add Billing</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Add Billing

                            </h1>
                        </div>
                        
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                    
                                       
 <form name="frm" method="post" id="register-form" action="bill_suc.php">
                                            <table class="table table-striped table-bordered table-hover">
                                            <tr><td align="right">Serial No</td><td align="left"><input type="text" id="service_no" class="form-control" required name="service_no"></td>
                                          
                                           <td align="right">Req.Ref.No</td><td>
                                            <input id=\"pname\" list=\"city1\" name="req_ref" required class="form-control" onblur="showHint22(this.value,1)" >
<datalist id=\"city1\" >

<?php 
$sql="select distinct req_ref from refferences ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[req_ref]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
                                           
                                          <!-- <input type="text" name="req_ref" onChange="showHint22(this.value)" required class="form-control">--></td>
                                        <tr><td align="right">PO No</td><td align="left"><input  type="text"  class="form-control" name="po_no" id="po_no"></td>
                                        <td align="right">PO Date</td><td><input type="date" value="<?php echo date('Y-m-d')?>" required name="po_date"  class="form-control"></td>
                                        </tr>
                                        
                                         <tr><td align="right">Site Name</td><td align="left"><input type="text" required class="form-control" name="site_name" id="site_name"></td>
                                        <td align="right">District</td><td><input type="text" name="district" id="district" required class="form-control"></td>
                                        </tr>
                                        <tr><td align="right">Indus ID</td><td align="left"><input type="text" required class="form-control" name="indus_id" id="indus_id"></td>
                                       
                                            <td align="right">Invoice Date</td><td align="left"><input type="date" required name="inv_date"  value="<?php echo date('Y-m-d')?>" class="form-control"></td></tr>
                                        
                                        </tr>
                                         <tr><td align="right">Seeking Opco ID</td><td align="left"><input type="text" required class="form-control" name="seeking_id" id="seeking_id"></td>
                                        <td align="right">State</td><td><input type="text" name="state" id="state" required class="form-control"></td>
                                        </tr>
                                        <tr><td align="right">Seeking Opco</td><td align="left"><input type="text" required class="form-control" name="seeking_opt" id="seeking_opt"></td>
                                        <td align="right">RFAID date</td><td><input type="date" name="rfaid_date"   class="form-control"></td>
                                        </tr>
                                        <tr><td align="right">Allocation Date</td><td align="left"><input type="text" id="allcoation_date"  required class="form-control" name="allcoation_date"></td>
                                        <td align="right">WCC NO</td><td><input type="text" name="wcc_num" id="wcc_num" required class="form-control">
                                        <button type="button" value="VIEW LIST" onclick="report();">VIEW LIST</button></td>
                                        </tr>
                                         <tr>
                                        <td align="right">WCC Reciept NO</td><td><input type="text" name="wcc_rec_num" id="wcc_rec_num" required class="form-control"></td>
                                        </tr>
                                        
                                        </table>
                                        
                                        
                                        <div class="table-header">
                                         Items  List
                                        </div>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                       
                                         
										<?php 
										$uid=$_GET['id'];
										
										$rt=mysqli_query($link,"select * from ubill where id='$uid'") or die(mysqli_error($link));
										$rt1=mysqli_fetch_array($rt);
										$loc=$rt1['location'];
										$cat=$rt1['cat'];
										$uib=$rt1['id'];
										
										?>
                                          
                                            <input type="hidden" name="loc" value="<?php echo $loc?>">
                                            
                                            <table id="dynamic-table1" class="table table-striped table-bordered table-hover">
 <tr><th>ID</th>
                                             <th>Sno</th>
                                              
                                                        <th>Item Code</th>
                                                        <th>Item Description</th>
                                                        <th>Primary UOM Code</th>
                                                        <th>Qunty</th>
                                                        <th>List Price Per Unit</th>
                                                          <th>SGST</th>
                                                           <th>CGST</th>
                                                        <th>Taxable Amount</th>
                                                        <!--<th>Total Amount</th>-->
                                                        <!--<th>HSN</th>
                                                        <th>SAC</th>
                                                        <th>Item Category</th>--></tr>
                                              
											<?php   
																				
												$sq=mysqli_query($link,"select a.line,a.itemdesc,a.uom,a.price,a.qty,a.amount,b.item_code,b.hsn,b.sac,b.cgst,b.sgst,b.igst from  ubill1 a,products b  where a.itemdesc=b.item_desc and b.location='$loc' and b.category='$cat'  and a.id1='$uib' order by a.uid asc") or die(mysqli_error($link));
												$i=1;
												while($rs1=mysqli_fetch_array($sq)){
										
													?>
                                                    <tr>
													<td><?php echo $i;?></td>
                                                    <td><?php echo $rs1['line'];?></td>
                                             
                                                        <td class="hidden-480"><?php echo $rs1['item_code']; ?>
                                                        <input type="hidden" name="item_code[]" 
                                                        value="<?php echo $rs1['itemdesc']; ?>">
                                                        </td>
                                                        <td class="hidden-480"><?php echo $rs1['itemdesc']; ?>
                                                         <input type="hidden" name="item_desc[]" 
                                                        value="<?php echo $rs1['itemdesc']; ?>">
                                                        </td>
                                                        
                                                        <td class="hidden-480"><?php echo $rs1['uom']; ?></td>
                                                        
                                                           <td><input type="text" name="qty[]" value="<?php echo $rs1['qty']; ?>" class="txt1 txt2" id="qty<?php echo $i?>" onkeyup='val(this.value,<?php echo $i?>)' /></td>
                                                        <td class="hidden-480">
                                                        <input type="text" name="price[]" id="price<?php echo $i?>" 
                                                        value="<?php echo $rs1['price']; ?>" class="txt1 txt2" onkeyup='val(this.value,<?php echo $i?>)' />
                                                        </td>
                                                       <td><input type="text" name="sgst[]" value="<?php echo $rs1['sgst']; ?>" class="txt1 txt2" onkeyup='val(this.value,<?php echo $i?>)' class="txt" id="sgst<?php echo $i?>" /></td>
                                                         <td><input type="text" name="cgst[]" value="<?php echo $rs1['cgst']; ?>" class="txt1 txt2" onkeyup='val(this.value,<?php echo $i?>)'  class="txt" id="cgst<?php echo $i?>" /></td>
                                                        
                                                        <td><input type="text" name="amnt[]" value="<?php echo $rs1['amount']; ?>" readonly class="txt" id="amnt<?php echo $i?>" /></td>
                                                       
                                                        
                                                        
                                                        
                                                       <?php /*?>  <input type="hidden" name="gst[]" readonly  value="<?php echo $rs1['cgst']; ?>" id="gst<?php echo $i?>" /><?php */?>
                                                      
                                                      <input type="hidden" name="gst_amnt[]" readonly class="txt3"  value="<?php echo $rs1['cgst']; ?>" id="gst_amnt<?php echo $i?>" /></td>

                                                      
                                                      
                                                      <!--  <td class="hidden-480"><?php echo $rs1['hsn']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['sac']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['item_category']; ?></td>-->
                                                        </tr>
                                                        
                                                     
                                                    <?php 
											$i ++;}
											
											 $id=$_POST['id'];
											
										 ?>
                                        <tr><td colspan="6" align="right"><strong>Total Amount</strong></td>
                                        <td colspan="1"><strong><input type="text" readonly name="tot" id="tot" />
                                        <input type="hidden" name="tot1" id="tot1" />
                                        </strong></td></tr>
                                        </table>
                                        
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Save
                                            </button>

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="add_bill.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
                                        </div></div></div></div></div></div></div>
                                        
                                        
                                        <!--<script src="assets/js/jquery-2.1.4.min.js"></script>-->

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
                            if ('ontouchstart' in document.documentElement)
                                document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- page specific plugin scripts -->
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="assets/js/dataTables.buttons.min.js"></script>
        <script src="assets/js/buttons.flash.min.js"></script>
        <script src="assets/js/buttons.html5.min.js"></script>
        <script src="assets/js/buttons.print.min.js"></script>
        <script src="assets/js/buttons.colVis.min.js"></script>
        <script src="assets/js/dataTables.select.min.js"></script>
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script> 
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>

        <!-- ace scripts -->
       <!-- <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>-->
                                        
                                    <!--<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>   
                                    <script src="assets/js/jquery-2.1.4.min.js"></script>-->  
                                      <script type="text/javascript">

function val(str,id)
{
cal=0;

var price=document.getElementById("price"+id).value;
var qty=document.getElementById("qty"+id).value;
var sgst=document.getElementById("sgst"+id).value;
var cgst=document.getElementById("cgst"+id).value;
var gst=Math.abs(sgst)+Math.abs(cgst);
cal=eval(price)*eval(qty);
document.getElementById("amnt"+id).value=Math.abs(cal);	

cal1=eval(price)*eval(qty)*eval(gst)/100;
document.getElementById("gst_amnt"+id).value=Math.abs(cal1);



}</script>
<script>
$(document).ready(function(){
$(".txt1").each(function(){
$(this).keyup(function(){
calculateSum();
});
});
});
function calculateSum(){
var sum=0;
$(".txt").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot").val(sum.toFixed(2));

}
</script> 

<script>
$(document).ready(function(){
$(".txt2").each(function(){
$(this).keyup(function(){
calculateSum1();
});
});
});
function calculateSum1(){
var sum=0;
$(".txt3").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot1").val(sum.toFixed(2));

}
</script> 

</body>
</html>
<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>
