<?php include'dbconnection/check.php'; 
   include'dbfiles/org.php';
  include'dbfiles/labtest.php';
  
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
                                <i class="ace-icon fa fa-cog home-icon"></i>
                                <a href="#">Settings</a>
                            </li>

                            <li>
                                Edit Lab Test Tariff
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Edit Lab Test Tariff

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                              
                                <?php echo $msg; ?>
                                <form class="form-horizontal" id="validation-form" role="form" method="post" action="" novalidate autocomplete="off">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Department Name </label>

                                        <div class="col-sm-8">
                                            <select  id="deptname"  name="deptname" required="required"  class="col-xs-10 col-sm-5" >
                                                <option value="">Select Test  Department</option>
                                                <?php
                                                
                                                $t="select * from masterdept";
                                                $rt= mysqli_query($link, $t) or die(mysqli_error($link));
                                                while($drow= mysqli_fetch_assoc($rt)){
                                                    $dn=$drow['deptname'];
                                                ?>
                                                <option value="<?php echo $dn; ?>" <?php if($dn==$deptname){echo 'selected';} ?>><?php echo $dn; ?></option>
                                                <?php }?>
                                            </select>
                                            
                                            <strong><?php echo $errordName; ?></strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Test Name </label>

                                        <div class="col-sm-8">
                                            <input type="text" required="required" id="testname" name="testname" required placeholder="Test Name" class="col-xs-10 col-sm-5" value="<?php echo $testname; ?>" /> 
                                            <strong><?php echo $errortest; ?></strong>
                                        </div>

                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Test Amount </label>

                                        <div class="col-sm-8">
                                            <input type="text" required="required" id="amount" name="amount" required placeholder="Test Amount" class="col-xs-10 col-sm-5" value="<?php echo $amount; ?>" /> 
                                            <input type="hidden" id="id" name="id" required placeholder="Test Amount" class="col-xs-10 col-sm-5" value="<?php echo $id; ?>" /> 
                                            <strong><?php echo $erroramt; ?></strong>
                                        </div>

                                    </div>
                                    

                                    
                                    
                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="update" id="update">
                                                <i class="ace-icon fa fa-upload bigger-110"></i>
                                                Update
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" type="reset">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                Reset
                                            </button>
                                            &nbsp; &nbsp; &nbsp;
                                            <a href="labtesttariff.php"><button class="btn btn-danger" type="button">
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
                            window.location.href='labtesttariff.php';  
                        });
                        //$( '#validation-form' ).reset();
                        
                    });

</script>	<!-- inline scripts related to this page -->
</body>
</html>
