<?php include'dbconnection/check.php'; ?>
  <?php
  include'dbfiles/org.php';
  include'dbfiles/lab_update.php' ?>
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
                                <a href="#">Lab Details</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Lab Details

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                              
                                <?php echo $msg; ?>
                                <form class="form-horizontal" id="validation-form" role="form" method="post" action="" novalidate autocomplete="off">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Laboratory Name </label>

                                        <div class="col-sm-8">
                                            <input type="text" id="labname" name="labname" placeholder="Laboratory Name" class="col-xs-10 col-sm-5" value="<?php echo $labname; ?>"/>
                                            
                                            <strong><?php echo $errolab; ?></strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Address</label>

                                        <div class="col-sm-8">
                                            <textarea  id="address" name="address" placeholder=" Address" class="col-xs-10 col-sm-5" ><?php echo trim($address); ?></textarea> 
                                        </div>
                                        <strong><?php echo $erroraddress; ?></strong>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Tin No.1</label>

                                        <div class="col-sm-8">
                                            <input type="text" id="labtin1" name="labtin1" placeholder="Tin.No" class="col-xs-10 col-sm-5" value="<?php echo $labtin1; ?>"/>
                                            
                                            <strong><?php echo $errorlabtin1; ?></strong>
                                        </div>

                                    </div>
									<div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Tin No.2</label>

                                        <div class="col-sm-8">
                                            <input type="text" id="labtin2" name="labtin2" placeholder="Tin No" class="col-xs-10 col-sm-5" value="<?php echo $labtin2; ?>"/>
                                            
                                            <strong><?php echo $errorlabtin2; ?></strong>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Email</label>

                                        <div class="col-sm-8">
                                            <input type="text" id="email" name="email" placeholder="Email id" class="col-xs-10 col-sm-5" value="<?php echo $email; ?>"/>
                                            
                                            <strong><?php echo $errorlabemail; ?></strong>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Phone No </label>

                                        <div class="col-sm-8">
                                            <input type="text" id="phno" name="phno" placeholder="Phone No" class="col-xs-10 col-sm-5" value="<?php echo $phone; ?>"/>
                                            
                                            <strong><?php echo $errorphno; ?></strong>
                                        </div>

                                    </div>
									<div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Mobile No</label>

                                        <div class="col-sm-8">
                                            <input type="text" id="mblno" name="mblno" placeholder="Mobile No" class="col-xs-10 col-sm-5" value="<?php echo $mobile; ?>"/>
                                            
                                            <strong><?php echo $errormobile; ?></strong>
                                        </div>

                                    </div>
									<div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Website </label>

                                        <div class="col-sm-8">
                                            <input type="url" id="website" name="website" placeholder="website" class="col-xs-10 col-sm-5" value="<?php echo $lwebsite; ?>"/>
                                            <input type="hidden" id="id" name="id" placeholder="website" class="col-xs-10 col-sm-5" value="<?php echo $id; ?>"/>
                                            
                                            <strong><?php echo $errorurl; ?></strong>
                                        </div>

                                    </div>

                                    
                                    
                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="update" id="insert">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                Save
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" type="reset">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                Reset
                                            </button>
                                            &nbsp; &nbsp; &nbsp;
                                            <a href="#"><button class="btn btn-danger" type="button">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
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
                            window.location.href=window.location.href;
                        });
                        
                    });

</script>	<!-- inline scripts related to this page -->
</body>
</html>
