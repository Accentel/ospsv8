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


 
  
  <script type="text/javascript">
function report()
{
   		

	  window.open('list.php','mywindow1','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')

	
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
                                <a href="#">Add Supplier</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">	
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Add Supplier

                            </h1>
                        </div>
                        
                          
                        
                        
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       <?php 
									   $res = mysqli_query($link,"select max(id) FROM suppliers");
	if($res)
	{
		$row = mysqli_fetch_array($res);
		echo $sid = $row[0]+1;	
	}
									   
									   
									   
									   
									   ?>
											<form name="frm" method="post" id="register-form" action="supplier_insert.php">
                                            <table class="table table-striped table-bordered table-hover">
                                            <tr> <td align="right">Supplier.No</td><td><input type="text" name="sno" id="sno" required class="form-control" readonly value="<?php echo "SUP-".$sid; ?>"></td>
                                            <td align="right"> Name</td><td align="left"><input type="text" required class="form-control" name="sname" id="sname"></td></tr>
                                        
                                       
                                        
                                         <tr><td align="right">Email</td><td align="left"><input type="email"  class="form-control" name="email" id="email"></td>
                                        <td align="right">Mobile No</td><td align="left"><input type="text"  class="form-control" name="mobileno" id="mobileno"></td>
                                        </tr>
                                       
                             
                                        <tr><td align="right">Phone No</td><td align="left"><input type="text"  class="form-control" name="phoneno" id="phoneno"></td>
                                      <td align="right">GST No</td><td align="left"><input type="text"  class="form-control" name="gstno" id="gstno"></td>
                                        </tr>
										<tr><td align="right">Address</td><td align="left"><textarea  class="form-control" name="address" id="address"></textarea></td>
                                      <td align="right">Pan No</td><td align="left"><input type="text"  class="form-control" name="tno" id="tno"></td>
                                        </tr>
                                         <tr>
										 <td align="right">Type of Material</td><td align="left"><select  class="form-control" name="material" id="material">
										 <option value="">Select Material</option>
										 <?php 
										 $t=mysqli_query($link,"select * from materials") or die(mysqli_error($link));
										 while($t1=mysqli_fetch_array($t)){?>
										 <option value="<?php echo $t1['id']; ?>"><?php echo $t1['mname']; ?></option>
										 <?php } ?>
										 </select></td>
                                      <td align="right">Location</td><td align="left"><select  class="form-control" name="location" id="location">
										 <option value="">Select Location</option>
										 <?php 
										 $t=mysqli_query($link,"select * from location") or die(mysqli_error($link));
										 while($t1=mysqli_fetch_array($t)){?>
										 <option value="<?php echo $t1['id']; ?>"><?php echo $t1['lname']; ?></option>
										 <?php } ?>
										 </select></td>
                                        </tr>                                      
                                        </table>
                                            
                                        
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Save
                                            </button>

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="supplier_list.php"><button class="btn btn-danger" type="button" name="button" id="Close">
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
