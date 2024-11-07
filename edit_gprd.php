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
                                <a href=""> Gujarat Billing</a>
                            </li>
                            <li>
                                <a href="">Edit Items</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Edit Items

                            </h1>
                        </div>
                        
                        <?php $id=$_GET['id'];
						$sq=mysqli_query($link,"select * from gproducts where id='$id'");
						$r=mysqli_fetch_array($sq);
						
						?>
                        
                        
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                         
                                       
                                       
                                       
 <form name="frm" method="post" >
 <input type="hidden" name="id" value="<?php echo $id?>">
                                            <table class="table table-striped table-bordered table-hover">
                                            <tr><td align="right">Item Code</td><td align="left"><input type="text" class="form-control" value="<?php echo $item_code=$r['item_code'];?>" required name="item_code"></td>
											 <td align="right">Item Desc</td><td align="left"><textarea  class="form-control" required name="item_desc"><?php echo $item_desc=$r['item_desc'];?></textarea></td>
                                            </tr>
                                        
                                        <tr>
										<td align="right">List Price Per Unit</td><td align="left"><input  type="text" value="<?php echo $r['price_unit'];?>"  class="form-control" name="price_unit"></td>
										<td align="right">Quantity</td><td align="left"><input  type="text" value="<?php echo $r['qty'];?>"  class="form-control" name="quantity"></td>
                                        
                                        </tr>
                                      	 
                                         <tr>
										 <td align="right">HSN</td><td><input type="text" required name="hsn" value="<?php echo $r['hsn'];?>"  class="form-control"></td> 
										 
										 <td align="right">SAC</td><td align="left"><input type="text" value="<?php echo $r['sac'];?>" required class="form-control" name="sac"></td>
                                         
										 
										 </tr>
                                       <tr>
									   
									   <td align="right">Primary UOM Code</td><td align="left">
											<input type="text" class="form-control" value="<?php echo $r['primary_uom'];?>" required name="primary_uom">
											</td>
									   <td align="right">Item Category</td><td align="left"><textarea  class="form-control" required name="item_category"><?php echo $item_code=$r['item_category'];?></textarea></td>
									   </tr>
                                        
										
										
										
										 <tr>
									   
									   <td align="right">Cgst</td><td align="left">
											<input type="text" class="form-control" value="<?php echo $r['cgst'];?>" required name="cgst">
											</td>
									   <td align="right">Sgst</td><td align="left">
											<input type="text" class="form-control" value="<?php echo $r['sgst'];?>" required name="sgst">
											</td>
									   </tr>
									   
									   
									   <tr>
									   
									   <td align="right">Igst</td><td align="left">
											<input type="text" class="form-control" value="<?php echo $r['igst'];?>" required name="igst">
											</td>
									   <td align="right">Location</td><td align="left">
											<select name="location" class="form-control" >
                                         
                                         <?php $sq=mysqli_query($link,"select * from location ");
										 while($r1=mysqli_fetch_array($sq)){?>
                                         <option value="<?php echo $r1['id'];?>" <?php if($r1['id']==$r['location']){echo 'selected';} ?>><?php echo $r1['lname'];?></option>
                                         <?php }?>
										 </select>
											</td>
									   </tr>
									   
									   
									   
                                        </table>
                                    
                                        
                                     
                                      
                                          
                                            
                                            
                                            
                                        
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                          
                                          
                                            <button class="btn btn-info" type="submit" name="update" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update
                                            </button>

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="guploadproducts.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
                                        </div></div></div></div></div></div></div>
                                        
                                        
                                        <?php if(isset($_POST['update'])){
											$item_code=$_POST['item_code'];
											$primary_uom=$_POST['primary_uom'];
											$price_unit=$_POST['price_unit'];
											$hsn=$_POST['hsn'];
											$sac=$_POST['sac'];
											
											$item_desc=$_POST['item_desc'];
											$item_category=$_POST['item_category'];
											$cgst=$_POST['cgst'];
											$sgst=$_POST['sgst'];
											$igst=$_POST['igst'];
											$location=$_POST['location'];
											$quantity=$_POST['quantity'];
											
											
											
											
											
											$id=$_POST['id'];
											$sq=mysqli_query($link,"update gproducts set `item_code`='$item_code',
											`primary_uom`='$primary_uom',`price_unit`='$price_unit',`hsn`='$hsn',`sac`='$sac',
											item_category='$item_category',cgst='$cgst',sgst='$sgst',igst='$igst',location='$location',item_desc='$item_desc',qty='$quantity'
											where id='$id'");
											if($sq){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='guploadproducts.php';";
	print "</script>";

} 
											
										}?>
                                        
                                        
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
