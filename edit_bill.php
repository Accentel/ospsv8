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
                                <a href="bill_list.php"> Billing List</a>
                            </li>
                            <li>
                                <a href="">Edit Billing</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Edit Billing

                            </h1>
                        </div>
                        
                        <?php $id=$_GET['id'];
						$sq=mysqli_query($link,"select * from add_bill1 where id='$id'");
						$r=mysqli_fetch_array($sq);
						
						?>
                        
                        
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       
 <form name="frm" method="post" action="bill_suc.php">
 <input type="hidden" name="id" value="<?php echo $id?>">
                                            <table class="table table-striped table-bordered table-hover">
                                            <tr><td align="right">Serial No</td><td align="left"><input type="text" class="form-control" value="<?php echo $service_no=$r['service_no'];?>" required name="service_no"></td>
                                            <td align="right">Invoice Date</td><td align="left">
											<input type="date" class="form-control" value="<?php echo $r['date'];?>" required name="inv_date">
											</td></tr>
                                        
                                        <tr><td align="right">PO No</td><td align="left"><input  type="text" value="<?php echo $r['po_no'];?>"  class="form-control" name="po_no"></td>
                                        <td align="right">PO Date</td><td><input type="date" required name="po_date" value="<?php echo $r['po_date'];?>"  class="form-control"></td>
                                        </tr>
                                        
                                         <tr><td align="right">Site Name</td><td align="left"><input type="text" value="<?php echo $r['site_name'];?>" required class="form-control" name="site_name"></td>
                                        <td align="right">District</td><td><input type="text" name="district" value="<?php echo $r['district'];?>" required class="form-control"></td>
                                        </tr>
                                        <tr><td align="right">Indus ID</td><td align="left"><input type="text" value="<?php echo $r['indus_id'];?>" required class="form-control" name="indus_id"></td>
                                        <td align="right">Req.Ref.No</td><td><input type="text" name="req_ref" value="<?php echo $r['req_ref'];?>" required class="form-control"></td>
                                        </tr>
                                         <tr><td align="right">Seeking Opco ID</td><td align="left"><input type="text" value="<?php echo $r['seeking_id'];?>" required class="form-control" name="seeking_id"></td>
                                        <td align="right">State</td><td><input type="text" name="state" required value="<?php echo $r['state'];?>" class="form-control"></td>
                                        </tr>
                                        <tr><td align="right">Seeking Opco</td><td align="left"><input type="text" value="<?php echo $r['seeking_opt'];?>" required class="form-control" name="seeking_opt"></td>
                                        <td align="right">RFAID date</td><td><input type="date" name="rfaid_date" value="<?php echo $r['rfaid_date'];?>"  class="form-control"></td>
                                        </tr>
                                        <tr><td align="right">Allocation Date</td><td align="left"><input type="date" value="<?php echo $r['allcoation_date'];?>" required class="form-control" name="allcoation_date"></td>
                                        <td align="right">WCC NO</td><td><input type="text" name="wcc_num" value="<?php echo $r['wcc_num'];?>" required class="form-control"></td>
                                        </tr>
                                         <tr>
                                        <td align="right">WCC Reciept NO</td><td><input type="text" value="<?php echo $r['wcc_rec_num'];?>" name="wcc_rec_num" required class="form-control"></td>
                                         
                                        </tr>
                                         <tr>
                                         <td align="right">Bar Code</td><td><input type="text" value="<?php echo $r['qr_code'];?>" name="bar_code"  class="form-control"></td>
                                        
                                        <td align="right">Submited Date</td><td><input type="date" value="<?php echo $r['bill_submit_date'];?>" name="sub_date"  class="form-control"></td>
                                        
                                        </tr>
                                         <tr>
                                         <td align="right">Payment Document No</td><td><input type="text" value="<?php echo $r['payment_doc_no'];?>" name="payment_doc_no"  class="form-control"></td>
                                        
                                        <td align="right">Payment Documen Date</td><td><input type="date" value="<?php echo $r['payment_doc_date'];?>" name="payment_doc_date"  class="form-control"></td>
                                        
                                        </tr>
                                        
                                        </table>
                                        <?php  $tt=$r['total_amnt'];
										$tt1=$r['total_sgst'];
										
										?>
                                        
                                        <div class="table-header">
                                         Items  List
                                        </div>
                                        
                                        <?php 
										
										$aa="select a.item_desc,a.hsn,a.sac,b.qty,b.price,b.tax_amnt,b.gst_amnt,b.sgst,b.cgst,
										sum(b.tax_amnt) as tax,sum(b.gst_amnt) as gs
 from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code and a.category=b.temp_type";
$t=mysqli_query($link,$aa) or die(mysqli_error($link));?>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                       
                                      
                                          
                                            
                                            
                                            <table id="dynamic-table1" class="table table-striped table-bordered table-hover">
 <tr>
                                             <th>Sno</th>
                                              
                                                        <th>Item Code</th>
                                                        <th>Item Description</th>
                                                        <th>Primary UOM Code</th>
                                                         <th>Qunty</th>
                                                        <th>List Price Per Unit</th>
                                                       <th>SGST</th>
                                                       <th>CGST</th>
                                                        <th>Amount</th>
                                                        <!--<th>HSN</th>
                                                        <th>SAC</th>
                                                        <th>Item Category</th>--></tr>
                                              
											<?php   $id=count($_POST['id']);
											 
											 $aa="select b.id,a.item_desc,a.item_code,a.primary_uom,b.qty,b.price
											 ,b.tax_amnt,b.gst_amnt,b.sgst,b.cgst
 from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code";
												$sq=mysqli_query($link,$aa);
												$i=1;
												while($rs1=mysqli_fetch_array($sq)){
												
													?>
                                                    <tr>
                                                    <td><?php echo $i?></td>
                                             
                                                        <td class="hidden-480">
														<input type="hidden" name="id1[]" value="<?php echo $rs1['id']; ?>">
														
														<?php echo $rs1['item_code']; ?>
                                                        <input type="hidden" name="item_code[]" 
                                                        value="<?php echo $rs1['item_code']; ?>">
                                                        </td>
                                                        <td class="hidden-480"><?php echo $rs1['item_desc']; ?>
                                                         <input type="hidden" name="item_desc[]" 
                                                        value="<?php echo $rs1['item_desc']; ?>">
                                                        </td>
                                                        
                                                        <td class="hidden-480"><?php echo $rs1['primary_uom']; ?></td>
                                                         <td><input type="text" name="qty[]" value="<?php echo $rs1['qty'];?>" class="txt1 txt2" id="qty<?php echo $i?>" onkeyup='val(this.value,<?php echo $i?>)' /></td>
                                                        <td class="hidden-480">
                                                        <input type="text" name="price[]" id="price<?php echo $i?>" 
                                                        value="<?php echo $rs1['price']; ?>" class="txt1 txt2" onkeyup='val(this.value,<?php echo $i?>)' />
                                                        </td>
                                                       <td><input type="text" name="sgst[]" value="<?php echo $rs1['sgst']; ?>" class="txt1 txt2" onkeyup='val(this.value,<?php echo $i?>)' class="txt" id="sgst<?php echo $i?>" /></td>
                                                         <td><input type="text" name="cgst[]" value="<?php echo $rs1['cgst']; ?>" class="txt1 txt2" onkeyup='val(this.value,<?php echo $i?>)'  class="txt" id="cgst<?php echo $i?>" /></td>
                                                        
                                                        <td><input type="text" name="amnt[]" value="<?php echo $rs1['tax_amnt'];?>" readonly class="txt" id="amnt<?php echo $i?>" /></td>
                                                        <!-- <input type="hidden" name="gst[]" readonly  value="<?php echo $rs1['sgst']; ?>" id="gst<?php echo $i?>" />-->
                                                      
                                                       <input type="hidden" name="gst_amnt[]" readonly class="txt3"  value="<?php echo $rs1['gst_amnt']; ?>" id="gst_amnt<?php echo $i?>" />

                                                      
                                                      
                                                      <!--  <td class="hidden-480"><?php echo $rs1['hsn']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['sac']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['item_category']; ?></td>-->
                                                        </tr>
                                                        
                                                    
                                                    <?php 
													
											$i++;
											}
											 $id=$_POST['id'];
											
									?>
                                        <tr><td colspan="6" align="right"><strong>Total Amount</strong></td>
                                        <td colspan="1"><strong><input type="text" readonly name="tot" value="<?php echo $tt;?>" id="tot" />
                                        <input type="hidden" name="tot1" id="tot1" value="<?php echo $tt1?>" />
                                        </strong></td></tr>
                                        </table>
                                        
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                          
                                          
                                            <button class="btn btn-info" type="submit" name="update" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update
                                            </button>

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="ebill_list.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
                                        </div></div></div></div></div></div></div>
                                    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>   
                                    <script src="assets/js/jquery-2.1.4.min.js"></script>  
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
<script src="assets/js/jquery-2.1.4.min.js"></script>

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

        <!-- ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>
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
