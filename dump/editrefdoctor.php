<?php
include'dbconnection/check.php';
include'dbfiles/org.php';
include'dbfiles/urefdoctor.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
    <link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
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
                        ace.settings.loadState('sidebar')
                    } catch (e) {
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
                                <i class="ace-icon fa fa-user home-icon"></i>
                                <a href="#">Doctors</a>
                            </li>
                            <li>
                                <a href="#">Add Referral Doctor </a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Add Referral Doctor 

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">

<?php echo $msg; ?>
                                <?php echo $msg; 
                                
                                
                                
                                
                                ?>
                                <form class="form-horizontal" id="validation-form" role="form" method="post" action="" novalidate autocomplete="off">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Ref Code </label>

                                        <div class="col-sm-8">
                                            <input type="text" id="refcode" name="refcode" required placeholder="Ref Code" class="col-xs-10 col-sm-5" value="<?php echo $refcode; ?>" readonly/> 
                                            
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Doctor Name</label>

                                        <div class="col-sm-8">
                                            <input type="text" id="doctorname" name="doctorname" placeholder="Enter Doctor Name" class="col-xs-10 col-sm-5" value="<?php echo $doctorname; ?>" />
                                               <input type="hidden" id="user" name="user" placeholder="Enter Doctor Name" class="col-xs-10 col-sm-5" value="<?php echo $user_check; ?>" />
<input type="hidden" id="id" name="id" placeholder="Enter Doctor Name" class="col-xs-10 col-sm-5" value="<?php echo $id; ?>" />
                                            <strong><?php echo $errordoctorname; ?></strong>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Email </label>

                                        <div class="col-sm-8">
                                            <input type="email" id="email" name="email" required placeholder="Email" class="col-xs-10 col-sm-5" value="<?php echo $email; ?>" /> 
                                            <strong><?php echo $errorEmail; ?></strong>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Mobile No </label>

                                        <div class="col-sm-8">
                                            <input type="text" id="mobile" name="mobile" required placeholder="Mobile No" class="col-xs-10 col-sm-5" value="<?php echo $mobile; ?>" /> 
                                            <strong><?php echo $errorMobile; ?></strong>
                                        </div>

                                    </div>
                                    

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Gender </label>

                                        <div class="col-sm-8">
                                            <input type="radio" id="gender" name="gender"    value="Male" <?php if($gender=='Male'){ echo 'checked';} ?> >Male 
                                            <input type="radio" id="gender" name="gender"    value="Female" <?php if($gender=='Female'){ echo 'checked';} ?>>Female 
                                            <strong><?php echo $errorGender; ?></strong>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Address </label>

                                        <div class="col-sm-8">
                                            <textarea name="address" id="address" class="col-xs-10 col-sm-5"><?php echo $address; ?></textarea>
                                            <strong><?php echo $errorAddress; ?></strong>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Doctor Share(%)</label>

                                        <div class="col-sm-8">
                                            <input type="text" id="doctorshare" name="doctorshare" placeholder="Enter Doctor Share" class="col-xs-10 col-sm-5" value="<?php echo $doctorshare; ?>" />
                                               

                                            <strong><?php echo $errorDoctorshare; ?></strong>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> IP Lab Share(%)</label>

                                        <div class="col-sm-8">
                                            <input type="text" id="iplab" name="iplab" placeholder="Enter IP Lab Share" class="col-xs-10 col-sm-5" value="<?php echo $iplab; ?>" />
                                               

                                            <strong><?php echo $erroriplab; ?></strong>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1">OP Lab Share(%)</label>

                                        <div class="col-sm-8">
                                            <input type="text" id="oplab" name="oplab" placeholder="Enter Op Lab Share" class="col-xs-10 col-sm-5" value="<?php echo $oplab; ?>" />
                                               

                                            <strong><?php echo $erroroplab; ?></strong>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="update" id="insert">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                Update
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" type="reset">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                Reset
                                            </button>
                                            &nbsp; &nbsp; &nbsp;
                                            <a href="refdoctorsview.php"><button class="btn btn-danger" type="button">
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
<script src="assets/js/jquery-ui.custom.min.js"></script>

<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/bootstrap-timepicker.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/daterangepicker.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script>
                    $(document).ready(function () {

                        $("#success-alert").hide();
                        $("#success-alert").fadeTo(1000, 500).slideUp(500, function () {
                            $("#success-alert").alert('close');
                            window.location.href = window.location.href;
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

                        $('#timepicker1').timepicker({
                            
                            minuteStep: 1,
                            showSeconds: true,
                            showMeridian: false,
                            disableFocus: true,
                            icons: {
                                up: 'fa fa-chevron-up',
                                down: 'fa fa-chevron-down'
                            }
                        }).on('focus', function () {
                            $('#timepicker1').timepicker('showWidget');
                        }).next().on(ace.click_event, function () {
                            $(this).prev().focus();
                        });


                        if (!ace.vars['old_ie'])
                            $('#date-timepicker1').datetimepicker({
                                //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
                                icons: {
                                    format: 'DD/MM/YYYY',
                                    time: 'fa fa-clock-o',
                                    date: 'fa fa-calendar',
                                    up: 'fa fa-chevron-up',
                                    down: 'fa fa-chevron-down',
                                    previous: 'fa fa-chevron-left',
                                    next: 'fa fa-chevron-right',
                                    today: 'fa fa-arrows ',
                                    clear: 'fa fa-trash',
                                    close: 'fa fa-times'
                                }
                            }).next().on(ace.click_event, function () {
                                $(this).prev().focus();
                            });

                    });

</script>	<!-- inline scripts related to this page -->
</body>
</html>
