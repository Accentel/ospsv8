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
xmlhttp.open("GET","get-mdata1.php?q="+str,true);
xmlhttp.send();
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
                                <a href="#">Maharashtra Billing</a>
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
                                    
                                       
 <form name="frm" method="post" id="register-form" action="mbill_suc.php">
                                            <table class="table table-striped table-bordered table-hover">
                                            <tr><td align="right">Serial No</td><td align="left"><input type="text" id="service_no" class="form-control" required name="service_no"></td>
                                          
                                           <td align="right">Req.Ref.No</td><td>
                                            <input id=\"pname\" list=\"city1\" name="req_ref" required class="form-control" onblur="showHint22(this.value,1)" >
<datalist id=\"city1\" >

<?php 
$sql="select distinct req_ref from mrefferences ";  // Query to collect records
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
										
										$rt=mysqli_query($link,"select * from mubill where id='$uid'") or die(mysqli_error($link));
										$rt1=mysqli_fetch_array($rt);
										$loc=$rt1['location'];
										//$cat=$rt1['cat'];
										$uib=$rt1['id'];
										
										?>
                                          
                                            <input type="hidden" name="loc" value="<?php echo $loc?>">
											<input type="hidden" name="ses" value="<?php echo $_SESSION['user']?>">
                                            <div align="right">
	
<button type="button" class='btn btn-success addmore'>+</button>
<button type="button" class='btn btn-danger delete'>-</button>
	</div>
                                            <table id="dynamic-table1" class="table table-striped table-bordered table-hover">

														<tr>
														<th>C</th>
														<th>ID</th>
														<th>Sno</th>
                                                        <th>Item Code</th>
                                                        <th>Item Description</th>
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
											<?php   
											// $y1="select a.line,a.itemdesc,a.uom,a.price,a.qty,a.amount,b.item_code,b.hsn,b.sac,b.cgst,b.sgst,b.igst from  mubill1 a,products b  where a.itemdesc=b.item_desc and b.location='$loc' and b.category=''  and a.id1='$uib' order by a.uid asc";
											$y1="select a.line,a.itemdesc,a.uom,a.price,a.qty,a.amount,b.item_code,b.hsn,b.sac,b.cgst,b.sgst,b.igst from  mubill1 a left join mproducts b  on a.itemdesc=b.item_desc  where  b.location='$loc'  and a.id1='$uib' order by a.uid asc";
												$sq=mysqli_query($link,$y1) or die(mysqli_error($link));
												$i=1;
												$sgsttotal1=0;
												$cgsttotal1=0;
												$tot1=0;
												$cnt=mysqli_num_rows($sq);
											
												while($rs1=mysqli_fetch_array($sq)){
										        
												  $amount=$rs1['amount'];
												  
												$sgst=$rs1['sgst'];
												$cgst=$rs1['cgst'];
												$sgstamt=($amount*$sgst)/100;
												$cgstamt=($amount*$cgst)/100;
												$tot1=$tot1+$amount;
												 $sgsttotal1=$sgsttotal1+$sgstamt;
												 $cgsttotal1=$cgsttotal1+$cgstamt;
													?>
                                                    <tr>
													<td></td>
													<td><?php echo $i;?> <input type="hidden" name="cnt" id="cnt" value="<?php echo $cnt; ?>"></td>
                                                    <td width="20px;">
							<input type="text" name="sno[]" style="width:30px;" value="<?php echo $rs1['line']; ?>">
													
													</td>
													<td class="hidden-480">
                            <input type="text" name="item_code[]" style="width:120px;" value="<?php echo $rs1['item_code']; ?>">
                                                        </td>
                                                        <td class="hidden-480">
                            <input type="text" name="item_desc[]" style="width:120px;" value="<?php echo $rs1['itemdesc']; ?>">
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
						<input type="text" name="amnt[]" value="<?php echo round($rs1['amount'],1); ?>" style="width:60px;" readonly class="txt" data-row="<?php echo $i?>" id="amnt<?php echo $i?>" />
														</td>
                                                       <td>
						<input type="text" name="hsn[]" value="<?php echo $rs1['hsn']; ?>" style="width:50px;" class="" id="hsn<?php echo $i?>" />	   
													   </td>
                                                         <td>
						<input type="text" name="sac[]" value="<?php echo $rs1['sac']; ?>" style="width:50px;" class="" id="sac<?php echo $i?>" />   
													   </td>
                                                        <td>
						<input type="text" name="sgstamt[]" value="<?php echo $sgstamt; ?>" readonly style="width:60px;" class="txt50" id="sgstamt<?php echo $i?>" />   
													   </td>
                                                        <td>
						<input type="text" name="cgstamt[]" value="<?php echo $cgstamt; ?>" style="width:60px;" readonly class="txt51" id="cgstamt<?php echo $i?>" />   
													   </td>
                                                       <?php /*?>  <input type="hidden" name="gst[]" readonly  value="<?php echo $rs1['cgst']; ?>" id="gst<?php echo $i?>" /><?php */?>
                                                      
                                                      

                                                      
                                                      
                                                     
                                                        </tr>
                                                        
                                                    
                                                    <?php 
											$i ++;}
											
											 $id=$_POST['id'];
											
										 ?>
										  
                                        <tr><td colspan="10" align="right"><strong>Total Amount</strong></td>
                                        <td colspan="1"><strong><input type="text" style="width:60px;" readonly name="tot" id="tot" value="<?php echo $tot1; ?>" />
                                        <input type="hidden" name="tot1" id="tot1" />
                                        </strong></td>
										
										<td colspan="2"></td>
										<td><input type="text" style="width:60px;" readonly name="sgsttotal" id="sgsttotal" value="<?php echo $sgsttotal1 ?>"/></td>
										<td><input type="text" style="width:60px;" readonly name="cgsttotal" id="cgsttotal" value="<?php echo $cgsttotal1 ?>"/></td>
										
										</tr>
										</tbody>
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
<script>
/*$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
calculateTableSum(currentTable);
});*/

$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal1();
	calculateTotal2();
	calculateTotal3();
});
var i=$( "#cnt" ).val();

$(".addmore").on('click',function(){
    i++; 
	var data ="<tr>";
    data +="<td><input type='checkbox' class='case'/></td>";
	data +="<td>"+i+"</td>"; 
    data +="<td><input type='text' name='sno[]' style='width:30px;' value=''></td>";          
    data +="<td><input type='text' name='item_code[]' style='width:120px;' value=''></td>";
	data +="<td> <input type='text' name='item_desc[]' style='width:120px;' value=''></td>";          
    data +="<td><input type='text' name='uom[]' value='' style='width:70px;'></td>";
	data +="<td><input type='text' name='qty[]' data-row='"+i+"' value='' style='width:60px;' class=' ' id='qty"+i+"' onkeyup='val(this.value)' /> </td>"; 
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
</script>
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
