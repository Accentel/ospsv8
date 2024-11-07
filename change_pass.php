<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';
include'dbfiles/iqry_emp.php';
$sql=mysqli_query($link,"select * from admin_login where user='$name'");
$r=mysqli_fetch_array($sql);
$password=$r['pwd'];
$mypassword=addslashes($password);
$password1 = md5(md5($mypassword));
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
	 <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
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
    <script type="text/javascript">


function movetoNext() {

var cp=document.getElementById('new-password').value;

var cp1=document.getElementById('confirm-password').value;

if(cp==cp1){



}

else

{

alert("Ur Entered Password and Confirm Password is Incorrect");
//document.getElementById('submit').style.disable="disable";
document.getElementById("submit").disabled = true;
//return false;

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
                                <a href="#">Change Password</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                               Change Password

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title">Change Password</h3>
								</div>
                               
                                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="change_pass1.php">
              <div class="box-body">
			  	 <!-- /Employee Photo-->
                <?php /*?><div class="form-group">			
                  <label for="lblempfile" class="col-sm-4 control-label">Current Password:</label>

                  <div class="col-sm-8">
                    <input name="currentPassword" class="krk1 form-control" id="current-password" value="" type="password" onBlur="fun()" onkeyup="movetoNext(this, 'new-password')" autocomplete="off">

   <input name="currentPassword1" id="current-password1" value="<?php echo $password1?>" type="text">
                  </div>
				  
                </div>	<?php */?>		
				 <!-- /Employee Name< -->
				<div class="form-group">
                  <label for="lblempnm" class="col-sm-4 control-label" >New password</label>

                  <div class="col-sm-8">
                  
              <input name="newPassword" class="krk form-control" id="new-password" required value="" type="password" >
                  </div>
				  	 <!-- /Admission Date -->
				 	
              </div>  <input name="ses" id="ses" value="<?php echo $name?>" type="hidden">
					 <!-- /Admission No -->
				
				
					 <!-- /Roll.No -->
			<div class="form-group">
                  <label for="lblempmt" class="col-sm-4 control-label" >Confirm Password</label>

                  <div class="col-sm-8">
                  
                <input name="newPasswordRepeated" id="confirm-password" class="form-control" required value="" type="password"   onchange="movetoNext()">
       <input type="hidden" name="uname" value="<?php echo $name?>" id="uname" />   </div>
				  	 <!-- /Medium -->
				  
                </div>				
					
				
				
				
			 		  
			  <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info"  id="submit"  type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Save
                                            </button>

                                          
											&nbsp; &nbsp; &nbsp;
                                           <a href="dashboard.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
									<br/>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
            </form>
								</div>
                            </div>
                        </div>
                        <!-- PAGE CONTENT BEGINS -->

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
					
					
					
					
					
					  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script type="text/javascript">

        $(function () {

            $("#submit").click(function () {

                var password = $("#new-password").val();

                var confirmPassword = $("#confirm-password").val();

                if (password != confirmPassword) {

                    alert("Passwords do not match.");

                    return false;

                }

                return true;

            });

        });

    </script>                
                     
        
			
					
					
					
					
					
					
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <?php include('template/footer.php'); ?>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
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
<script src="assets/js/jquery-ui.custom.min.js"></script>

<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/bootstrap-timepicker.min.js"></script>



<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script>
                    $(document).ready(function () {

                        $("#success-alert").hide();
                        $("#success-alert").fadeTo(1000, 500).slideUp(500, function () {
                            $("#success-alert").alert('close');
                            window.location.href=window.location.href;
                        });
                        //$( '#validation-form' ).reset();


                        $('.date-picker').datepicker({
                            autoclose: true,
                            todayHighlight: true
                        })
                                //show datepicker when clicking on the icon
                                .next().on(ace.click_event, function () {
                            $(this).prev().focus();
                        });

                       

                        //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
                       


                       



                      


                    });


</script>		<!-- inline scripts related to this page -->
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