<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';
include'dbfiles/org_update.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
    <style>
        strong{
            color:red;
        }
    </style>
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
                                <a href="#">Organization</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Organization Details

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title">Organization Details</h3>
								</div>
                                <?php echo $msg; ?>
                                <form class="form-horizontal" id="validation-form" role="form" method="post" action="" novalidate autocomplete="off">
                                   
									<div class="box-body">

								   <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Organization Name </label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="hospitalname" name="hospitalname" required placeholder="Organization Name"  value="<?php echo $schoolname; ?>" /> 
                                            <strong><?php echo $errorName; ?></strong>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Organization Address </label>

                                        <div class="col-sm-9">
                                            <textarea  id="address" name="address" placeholder="Organization Address" class="form-control" ><?php echo $r['org_address']; ?></textarea>
                                            <strong> <?php echo $erroraddress; ?></strong>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>

                                        <div class="col-sm-9">
                                            <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="<?php echo $r['org_email']; ?>"/>
                                            <strong><?php echo $erroremail; ?></strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Phone No </label>

                                        <div class="col-sm-9">
                                            <input type="text" id="phone" name="phone" placeholder="Phone No" class="form-control"  value="<?php echo $r['org_phone']; ?>"/>
                                            <strong><?php echo $errorphone; ?></strong>
                                        </div>
                                    </div> <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mobile No </label>

                                        <div class="col-sm-9">
                                            <input type="text" id="mobile" name="mobile" placeholder="Mobile No" class="form-control" value="<?php echo $r['org_mobile']; ?>"/>
                                            <strong><?php echo $errormobile; ?></strong>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Web Site </label>

                                        <div class="col-sm-9">
                                            <input type="url" id="website" name="website" placeholder="Web Site URL" class="form-control" value="<?php echo $r['org_url']; ?>"/>
                                            <strong><?php echo $errorurl; ?></strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Organization Code </label>

                                        <div class="col-sm-9">
                                            <input type="text" id="code" name="code" placeholder="Hospital Code" class="form-control" value="<?php echo $r['org_code']; ?>"/>
                                            <input type="hidden" id="id" name="id"  class="col-xs-10 col-sm-5" value="<?php echo $id; ?>"/>
                                            <strong><?php echo $errorcode; ?></strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="submit" id="Update">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                Update
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" type="reset">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                Reset
                                            </button>
											&nbsp; &nbsp; &nbsp;
                                           <a href="dashboard.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
									
					</div>				
					
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- PAGE CONTENT BEGINS -->

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
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

<!-- page specific plugin scripts -->

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script>
                    $(document).ready(function () {
                        $("#success-alert").hide();
                        $("#success-alert").fadeTo(1000, 500).slideUp(500, function () {
                            $("#success-alert").alert('close');
                        });
                        
                    });

</script>	<!-- inline scripts related to this page -->
</body>
<?php mysqli_close($link); ?>
</html>
<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>