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
                                <a href="reffer_list.php"> Reffer List</a>
                            </li>
                            <li>
                                <a href="">Edit Reffer </a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Edit Reffer

                            </h1>
                        </div>
                        
                        <?php $id=$_GET['id'];
						$sq=mysqli_query($link,"select * from aprefferences where id='$id'");
						$r=mysqli_fetch_array($sq);
						 $stype=$r['sitetype'];
						?>
                        
                        
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       
 <form name="frm" method="post" action="apreffer_suc.php">
 <input type="hidden" name="id" value="<?php echo $id?>">
                                            <table class="table table-striped table-bordered table-hover">
                                           
                                           
                                           
                                           
                                           
                                            <tr> <td align="right">Req.Ref.No</td><td><input type="text" name="req_ref" id="req_ref" value="<?php echo $r['req_ref'];?>" required class="form-control"></td>
                                            <td align="right">Site Name</td><td align="left"><input type="text" value="<?php echo $r['site_name'];?>" required class="form-control" name="site_name"></td></tr>
                                        
                                        <tr>
                                         <td align="right">State</td><td>
                                         
                                         <input type="text" name="state" class="form-control" value="<?php echo $st=$r['state'];?>" required>
                                         
                                       </td>
                                        <td align="right">District</td><td>
                                         <input type="text" name="district" value="<?php echo $r['district'];?>" id="city" class="form-control" />
    
      
                                        
                                       </td>
                                      
                                        </tr>
                                        
                                         <tr><td align="right">Indus ID</td><td align="left"><input type="text" value="<?php echo $r['indus_id'];?>" required class="form-control" name="indus_id"></td>
                                        <td align="right">Seeking Opco ID</td><td align="left"><input type="text" value="<?php echo $r['seeking_id'];?>" required class="form-control" name="seeking_id"></td>
                                        </tr>
                                       
                             
                                        <tr><td align="right">Seeking Opco</td><td align="left"><input type="text" value="<?php echo $r['seeking_opt'];?>" required class="form-control" name="seeking_opt"></td>
                                      <td align="right">Allocation Date</td><td align="left"><input type="date"  class="form-control" value="<?php echo $r['allocation_date'];?>" name="allcoation_date"></td>
                                        </tr>
										<tr><td align="right">PO Num</td><td align="left"><input type="text"  class="form-control" name="po_num" value="<?php echo $r['po_num'];?>"></td>
                                      <td align="right">Completion Date</td><td align="left"><input type="date"  class="form-control" name="comp_date" value="<?php echo $r['comp_date'];?>"></td>
                                        </tr>
                                       <tr><td align="right">Location</td><td align="left"><select name="location" class="form-control" >
                                         
                                         <?php $sq=mysqli_query($link,"select * from location ");
										 while($r1=mysqli_fetch_array($sq)){?>
                                         <option value="<?php echo $r1['id'];?>" <?php if($r1['id']==$r['location']){echo 'selected';} ?>><?php echo $r1['lname'];?></option>
                                         <?php }?>
										 </select>
										 </td>
                                      <td align="right">Site Type</td><td align="left"><input type="text"  class="form-control" name="site_type"  value="<?php echo $stype;?>"></td>
                                        </tr>
                                       
                                           
                                           
                                           
                                         
                                        </table>
                                        
                                        <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="update" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update
                                            </button>

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="andhrarefferno.php"><button class="btn btn-danger" type="button" name="button" id="Close">
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
