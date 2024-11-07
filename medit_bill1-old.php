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
	 <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
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
	<script>
 $(document).on('keyup', '.txt1', function(){
 var id=$(this).attr('data-row');
 
 var qty=document.getElementById('qty'+id).value;
 var price=document.getElementById('price'+id).value;
 
 
 bal=parseFloat(qty)*parseFloat(price);
 document.getElementById('amnt'+id).value=bal;
 calculateTotal1();
 
 });
 
 
 $(document).on('keyup', '.txt20', function(){
 var id=$(this).attr('data-row');
 
 var amt=document.getElementById('amnt'+id).value;
 var sgst=document.getElementById('sgst'+id).value;
 
 
 bal=(parseFloat(amt)*parseFloat(sgst))/100;
 document.getElementById('sgstamt'+id).value=bal;
 calculateTotal2();
 
 });
 
 $(document).on('keyup', '.txt21', function(){
 var id=$(this).attr('data-row');
 
 var amt=document.getElementById('amnt'+id).value;
 var cgst=document.getElementById('sgst'+id).value;
 
 
 bal=(parseFloat(amt)*parseFloat(cgst))/100;
 document.getElementById('cgstamt'+id).value=bal;
 calculateTotal3();
 
 });
 
 
 function calculateTotal1(){
	subTotal = 0 ; total = 0; 
	$('.txt').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
 function calculateTotal2(){
	subTotal = 0 ; total = 0; 
	$('.txt50').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#sgsttotal').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 function calculateTotal3(){
	subTotal = 0 ; total = 0; 
	$('.txt51').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#cgsttotal').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
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
						$sq=mysqli_query($link,"select * from add_mbill1 where id='$id'");
						$r=mysqli_fetch_array($sq);
						
						?>
                        
                        
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       
 <form name="frm" method="post" action="mbill_suc.php">
 <input type="hidden" name="id" value="<?php echo $id?>">
                                            <table class="table table-striped table-bordered table-hover">
                                            <tr><td align="right">Serial No</td><td align="left"><input type="text" class="form-control" value="<?php echo $service_no=$r['service_no'];?>" required name="service_no"></td>
                                            <td align="right">Invoice Date</td><td align="left">
											<input type="date" class="form-control"  value="<?php echo $r['date'];?>" required name="inv_date">
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
										//$aa="select * from add_bill where id1='$id'";
										/*$aa="select a.item_desc,a.hsn,a.sac,b.qty,b.price,b.tax_amnt,b.gst_amnt,b.sgst,b.cgst,
										sum(b.tax_amnt) as tax,sum(b.gst_amnt) as gs
 from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code and a.category=b.temp_type";*/
//$/t=mysqli_query($link,$aa) or die(mysqli_error($link));?>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                       
                                      
                                          
                                            <div align="right">
	
<button type="button" class='btn btn-success addmore'>+</button>
<button type="button" class='btn btn-danger delete'>-</button>
	</div>
                                            <div class="table-responsive">
                                            <table id="dynamic-table1" class="table table-striped table-bordered table-hover">
 
                                             <tr>
														<th>C</th>
														<th>ID</th>
														<th>Sno</th>
                                                       <td>Code</td>
                                                        <th> Description</th>
                                                        <th>Primary<br/> UOM Code</th>
                                                        <th>Qunty</th>
                                                        <th>List Price<br/> Per Unit</th>
                                                          <th>SGST</th>
                                                           <th>CGST</th>
                                                        <th>Taxable Amount</th>
                                                       
                                                      <th>HSN</th>
                                                        <th>SAC</th>
                                                        <th>SGST Amount</th>
														 <th>GST Amount</th>
														</tr>
														<tbody>
                                                        <!--<th>HSN</th>
                                                        <th>SAC</th>
                                                        <th>Item Category</th>-->
                                              
											<?php   //$id=count($_POST['id']);
											 $aa="select * from add_mbill where id1='$id'";
											/* $aa="select b.id,a.item_desc,a.item_code,a.primary_uom,b.qty,b.price
											 ,b.tax_amnt,b.gst_amnt,b.sgst,b.cgst
 from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code";*/
												$sq=mysqli_query($link,$aa);
												$i=1;
												while($rs1=mysqli_fetch_array($sq)){
												
													?>
                                                    <tr>
													<td></td>
													<td><?php echo $i;?> <input type="hidden" name="cnt" id="cnt" value="<?php echo $cnt; ?>"></td>
                                                    <td width="20px;">
							<input type="text" name="sno[]" style="width:30px;" value="<?php echo $rs1['sno']; ?>">
							<input type="hidden" name="id1[]" style="width:30px;" value="<?php echo $rs1['id1']; ?>">
							<input type="hidden" name="id5[]" style="width:30px;" value="<?php echo $rs1['id']; ?>">
													
													</td>
													<td class="hidden-480"><input type="text" name="item_code[]" style="width:100px;" value="<?php echo $rs1['item_code']; ?>"></td>
                                                        <td class="hidden-480">
														
                            <input type="text" name="item_desc[]" style="width:100px;" value="<?php echo $rs1['item_desc']; ?>">
                                                        </td>
                                                        
                                                        <td class="hidden-480">
							<input type="text" name="uom[]" value="<?php echo $rs1['uom']; ?>" style="width:70px;">
														</td>
                                                        
                                                        <td>
							<input type="text" name="qty[]" value="<?php echo $rs1['qty']; ?>" style="width:60px;" data-row="<?php echo $i?>" class="" id="qty<?php echo $i?>" onkeyup='val(this.value,<?php echo $i?>)' /> 
														</td>
                                                        <td class="hidden-480">
                            <input type="text" name="price[]" id="price<?php echo $i?>" style="width:70px;" data-row="<?php echo $i?>" value="<?php echo $rs1['price']; ?>" class="txt1" onkeyup='val(this.value,<?php echo $i?>)' />
                                                        </td>
                                                       <td>
						<input type="text" name="sgst[]" value="<?php echo $rs1['sgst']; ?>" style="width:60px;" class="txt20"  data-row="<?php echo $i?>"  id="sgst<?php echo $i?>" />
														</td>
														<td>
						<input type="text" name="cgst[]" value="<?php echo $rs1['cgst']; ?>" style="width:60px;" class="txt21" data-row="<?php echo $i?>"    id="cgst<?php echo $i?>" />
														</td>
                                                        
                                                        <td>
						<input type="text" name="amnt[]" value="<?php echo $rs1['tax_amnt']; ?>" style="width:60px;" readonly class="txt" data-row="<?php echo $i?>" id="amnt<?php echo $i?>" />
														</td>
                                                       <td>
						<input type="text" name="hsn[]" value="<?php echo $rs1['hsnno']; ?>" style="width:50px;" class="" id="hsn<?php echo $i?>" />	   
													   </td>
                                                         <td>
						<input type="text" name="sac[]" value="<?php echo $rs1['sacno']; ?>" style="width:50px;" class="" id="sac<?php echo $i?>" />   
													   </td>
                                                        <td>
						<input type="text" name="sgstamt[]" value="<?php echo $rs1['sgstamount']; ?>" readonly style="width:60px;" class="txt50" id="sgstamt<?php echo $i?>" />   
													   </td>
                                                        <td>
						<input type="text" name="cgstamt[]" value="<?php echo $rs1['cgstamount']; ?>" style="width:60px;" readonly class="txt51" id="cgstamt<?php echo $i?>" />   
													   </td>
                                                       <?php /*?>  <input type="hidden" name="gst[]" readonly  value="<?php echo $rs1['cgst']; ?>" id="gst<?php echo $i?>" /><?php */?>
                                                      
                                                      

                                                      
                                                      
                                                     
                                                        </tr>
                                                        
                                                    
                                                    <?php 
													
											$i++;
											}
											 //$id=$_POST['id'];
											
									?>
                                        <tr><td colspan="10" align="right"><strong>Total Amount</strong></td>
                                        <td colspan="1"><strong><input style="width:60px;" type="text" readonly name="tot" value="<?php echo $tt;?>" id="tot" />
                                        <input type="hidden" name="tot1" id="tot1" value="<?php echo $tt1?>" />
                                        </strong></td>
										<td colspan="2"></td>
										<td colspan=""><input style="width:60px;" type="text" readonly name="totsgst" value="<?php echo $r['total_sgst'];?>" id="sgsttotal" /></td>
										
										<td colspan=""><input style="width:60px;" type="text" readonly name="totcgst" value="<?php echo $r['total_cgst'];?>" id="cgsttotal" /></td>
										</tr>
										</tbody>
                                        </table>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                          
                                        
                                            <button class="btn btn-info" type="submit" name="update" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update
                                            </button>

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="mbill_list.php"><button class="btn btn-danger" type="button" name="button" id="Close">
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
var i=100;

$(".addmore").on('click',function(){
    i++; 
	var data ="<tr>";
    data +="<td><input type='checkbox' class='case'/></td>";
	data +="<td>"+i+"</td>"; 
    data +="<td><input type='hidden' name='id1[]' id='id1"+i+"' style='width:30px;' data-row='"+i+"' value='<?php echo $id ?>'><input type='hidden' name='id5[]' id='id5"+i+"' style='width:30px;' data-row='"+i+"' value=''><input data-row='"+i+"' type='text' name='sno[]' id='sno"+i+"' style='width:30px;' value=''></td>";          
    data +="<td><input type='text' name='item_code[]' style='width:100px;' data-row='"+i+"' value=''></td>";
	data +="<td> <input type='text' name='item_desc[]' style='width:100px;' data-row='"+i+"' value=''></td>";          
    data +="<td><input type='text' name='uom[]' id='uom"+i+"' value='' style='width:70px;' data-row='"+i+"'></td>";
	data +="<td><input type='text' name='qty[]'  data-row='"+i+"' value='' style='width:60px;' class=' ' id='qty"+i+"' onkeyup='val(this.value)' /> </td>"; 
	data +="<td><input type='text' name='price[]' data-row='"+i+"' id='price"+i+"' style='width:70px;' value='' class='txt1 ' onkeyup='val(this.value,"+i+")' /></td>";
    data +="<td> <input type='text' name='sgst[]' data-row='"+i+"'  value='' style='width:60px;' class='txt20'   id='sgst"+i+"' /></td>";          
    data +="<td><input type='text' name='cgst[]' data-row='"+i+"' value='' style='width:60px;' class='txt21'    id='cgst"+i+"' /></td>";
   
   data +="<td><input type='text' name='amnt[]' data-row='"+i+"' value='' style='width:60px;' readonly class='txt' id='amnt"+i+"' /> </td>";          
    data +="<td><input type='text' name='hsn[]' value='' style='width:50px;'  id='hsn' />	   </td>";
	data +="<td> <input type='text' name='sac[]' value='' style='width:50px;'  id='sac' />   </td>";          
    data +="<td><input type='text' name='sgstamt[]' data-row='"+i+"' value='' readonly style='width:60px;' class='txt50'  id='sgstamt"+i+"' /></td>";
   data +="<td><input type='text' name='cgstamt[]' data-row='"+i+"' value='' style='width:60px;' readonly  class='txt51' id='cgstamt"+i+"' /></td>";
	data +="</tr>";
	$('#dynamic-table1 ').append(data).find('#dynamic-table1>tbody>tr:nth-child(2)');
	

	});
function select_all() {
	$('input[class=case]:checkbox').each(function(){ 
		if($('input[class=check_all]:checkbox:checked').length == 0){ 
			$(this).prop("checked", false); 
		} else {
			$(this).prop("checked", true); 
		} 
	});
}
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

$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal1();
	calculateTotal2();
	calculateTotal3();
});

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
