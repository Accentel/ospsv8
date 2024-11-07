<?php
include'dbconnection/check.php';
include'dbfiles/org.php';
include'dbfiles/udoctorinfo.php';
?>
<!DOCTYPE html>
<html lang="en">

    <?php include 'template/headerfile.php'; ?>
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
    
    <style>
        strong{
            color:red;
        }
        span.rq{
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
                                <i class="ace-icon fa fa-cog home-icon"></i>
                                <a href="#">Doctor</a>
                            </li>
                            <li>
                                <a href="#">Add Doctor</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Add Doctor

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">

                                
                                <?php echo $msg; ?>
                                <form class="form-horizontal" id="register-form" role="form" method="post" action=""  autocomplete="off">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field"> Specification<span class="rq">*</span> </label>

                                        <div class="col-sm-4">
                                            <input type="text" id="specification" name="specification" placeholder="specification" class="form-control col-xs-10 col-sm-5"  value="<?php echo $specification; ?>" />

                                            <span class="rq"><?php echo $errorSpecification ?></span>
                                        </div>
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field"> Doctor Name<span class="rq">*</span> </label>

                                        <div class="col-sm-4">
                                            <input type="text" id="dname" name="dname" placeholder="Doctor Name" class="form-control col-xs-10 col-sm-5" value="<?php echo $dname; ?>"/>
                                            <span class="rq"><?php echo $errorDname ?></span>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field"> Designation<span class="rq">*</span></label>

                                        <div class="col-sm-4">
                                            <input type="text" id="desig" name="desig" placeholder="Doctor Designation" class="form-control col-xs-10 col-sm-5" value="<?php echo $desig; ?>"/>

                                <span class="rq"><?php echo $errorDesig ?></span>
                                        </div>
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field"> Join Date <span class="rq">*</span></label>

                                        <div class="col-sm-4">

                                            <div class="input-group">
                                                <input class="form-control date-picker" value="<?php echo $joindate1 ?>" placeholder="dd/mm/yyyy" id="id-date-picker-1" name="joindate" type="text" data-date-format="dd/mm/yyyy" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar bigger-110"></i>
                                                </span>
                                                
                                            </div>
                                            <span class="rq"><?php echo $errorJdate ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field"> Qualification<span class="rq">*</span></label>

                                        <div class="col-sm-4">
                                            <input type="text" id="dqualification" name="dqualification" placeholder="Doctor Qualification" class="form-control col-xs-10 col-sm-5" value="<?php echo $dqualification; ?>"/>
<span class="rq"><?php echo $errorDqualification ?></span>

                                        </div>
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field"> Department<span class="rq">*</span> </label>

                                        <div class="col-sm-4">
                                            <select id="ddepartment" name="ddepartment"  class="form-control col-xs-10 col-sm-5" >
                                                <option value="">Select Department</option>
                                                <?php
                                                $qrye = mysqli_query($link, "select * from dept") or die(mysqli_error());
                                                while ($result = mysqli_fetch_array($qrye)) {
                                                    ?>
                                                <option value="<?php echo $result['DEPT_CODE']; ?>" <?php if($result['DEPT_CODE']==$ddepartment){echo 'selected';} ?>><?php echo $result['DEPT_NAME']; ?></option>
                                                <?php }
                                                ?>
                                            </select>

<span class="rq"><?php echo $errorDepartment ?></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field">Date of Birth <span class="rq">*</span></label>

                                        <div class="col-sm-4">
                                           
                                            
                                                <div class="input-group">
                                                    <input class="form-control date-picker" name="dateob" value="<?php echo $dateob; ?>" placeholder="dd/mm/yyyy" id="id-date-picker-1" type="text" data-date-format="dd/mm/yyyy" />
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar bigger-110"></i>
                                                    </span>
                                                </div>
                                            <span class="rq"><?php echo $errorDateob ?></span>
                                        </div>
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field"> Gender<span class="rq">*</span></label>

                                        <div class="col-sm-4">
                                            <input type="radio" id="gender" name="gender1"   value="Male" <?php if($gender1=='Male'){ echo 'checked';} ?>>&nbsp;&nbsp;Male
                                            <input type="radio" id="gender" name="gender1"   value="Female" <?php if($gender1=='Female'){ echo 'checked';} ?>>&nbsp;&nbsp;Female
<span class="rq"><?php echo $errorGender ?></span>
                                        </div>

                                    </div> 


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field"> Mobile No<span class="rq">*</span> </label>

                                        <div class="col-sm-4">
                                            <input type="text" id="mobile1" name="mobile1" placeholder="Doctor Mobile No" class="form-control col-xs-10 col-sm-5" value="<?php echo $mobile1; ?>"/>
<span class="rq"><?php echo $errorMobile ?></span>

                                        </div>
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field"> Consultant Fee<span class="rq">*</span> </label>

                                        <div class="col-sm-4">
                                            <input type="text" id="consultfee" name="consultfee" placeholder="Doctor Consultant Fee"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control col-xs-10 col-sm-5" value="<?php echo $consultfee; ?>"/>

  <span class="rq"><?php echo $errorConsultfee ?></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field"> Aadhar No<span class="rq">*</span> </label>

                                        <div class="col-sm-4">
                                            <input type="text" id="aadhar1" name="aadhar1" placeholder="Aadhar  No" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="form-control col-xs-10 col-sm-5" value="<?php echo $aadhar1; ?>"/>

<span class="rq"><?php echo $errorAadhar ?></span>
                                        </div>

                                        <label class="col-sm-2 control-label no-padding-right" for="form-field"> Hospital Share</label>

                                        <div class="col-sm-4">
                                            <input type="text" id="hshare" name="hshare" placeholder="Hospital Share" class="form-control col-xs-10 col-sm-5" value="<?php echo $hshare; ?>"/>


                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field"> Phone No </label>

                                        <div class="col-sm-4">
                                            <input type="text" id="phno" name="phno" placeholder="Phone Number" class="form-control col-xs-10 col-sm-5" value="<?php echo $phno; ?>"/>


                                        </div>
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field"> Doctor Share </label>

                                        <div class="col-sm-4">
                                            <input type="text" id="dshare" name="dshare" placeholder="Doctor Share" class="form-control col-xs-10 col-sm-5" value="<?php echo $dshare; ?>"/>


                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field"> Email<span class="rq">*</span> </label>

                                        <div class="col-sm-4">
                                            <input type="email" id="demail" name="demail" placeholder="Doctor Email" class="form-control col-xs-10 col-sm-5" value="<?php echo $demail; ?>"/>

                            <span class="rq"><?php echo $errorEmailid ?></span>
                                        </div>

                                        <label class="col-sm-2 control-label no-padding-right" for="form-field"> Doctor Duty Type<span class="rq">*</span> </label>
                                        <div class="col-sm-4">
                                            <input type="hidden" id="user" name="user" placeholder="Employee Email" class="form-control col-xs-10 col-sm-5" value="<?php echo $user_check; ?>"/>
                                            <input type="text" id="duty" name="duty" placeholder="Doctor Duty" class="form-control col-xs-10 col-sm-5" value="<?php echo $dutytype; ?>"/>
                                            <input type="hidden" id="id" name="id" placeholder="Employee Email" class="form-control col-xs-10 col-sm-5" value="<?php echo $id; ?>"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field"> Present Address<span class="rq">*</span> </label>

                                        <div class="col-sm-4">
                                            <textarea id="paddress1" name="paddress1" placeholder="Present Address" class="form-control col-xs-10 col-sm-5" ><?php echo $paddress1; ?></textarea>   
                                            <span class="rq"><?php echo $errorPresentaddress ?></span>

                                        </div>
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field"> Permanent Address<span class="rq">*</span> </label>

                                        <div class="col-sm-4">
                                            <textarea id="peraddress1" name="peraddress1" placeholder="Permanent Address" class="form-control col-xs-10 col-sm-5" ><?php echo $peraddress1; ?></textarea>                                            

  <span class="rq"><?php echo $errorPermentaddress ?></span>

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
                                            <a href="doctorsview.php"><button class="btn btn-danger" type="button">
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


</script>	
<!-- inline scripts related to this page -->
</body>
</html>
