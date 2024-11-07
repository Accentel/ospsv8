<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';
include'dbfiles/uqry_employee.php';
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
                                <a href="#">Employee Details</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                               Employee Details

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title">Employee Details</h3>
								</div>
                               
                                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="">
              <div class="box-body">
			  	 <!-- /Employee Photo-->
                <div class="form-group">			
                  <label for="lblempfile" class="col-sm-2 control-label">Employee Photo:</label>

                  <div class="col-sm-3">
                    <input type="file" class="form-control" id="empfile" name="empfile">
                  </div>
				  <label for="lblempcd" class="col-sm-2 control-label" >Employee Code</label>

                  <div class="col-sm-3">
                  
                <input type="text" class="form-control pull-right"  id="empcd" name="empcd" value="<?php echo $empcd; ?>">
				<input type="hidden" class="form-control pull-right"  id="image" name="image" value="<?php echo $photo;?>">
				<input type="hidden" class="form-control pull-right"  id="id" name="id" value="<?php echo $eid;?>">
                  </div>
                </div>			
				 <!-- /Employee Name< -->
				<div class="form-group">
                  <label for="lblempnm" class="col-sm-2 control-label" >Employee Name</label>

                  <div class="col-sm-3">
                  
                <input type="text" class="form-control pull-right"  id="empnm" name="empnm" value="<?php echo $empnm;?>">
				 <input type="hidden" class="form-control pull-right"  id="user" name="user" value="<?php echo $name; ?>">
                  </div>
				  	 <!-- /Admission Date -->
				 <label for="lblempgender" class="col-sm-2 control-label" >Gender</label>
<div class="col-sm-3">
				  <label><input type="radio" name="empgen" value="Male" class="minimal" <?php if($empgen=="Male"){echo 'checked';} ?>>Male</label>
                <label><input type="radio" name="empgen" value="Female" class="minimal" <?php if($empgen=="Female"){echo 'checked';} ?>>Female</label>
                <label><input type="radio" name="empgen" value="Others" class="minimal" <?php if($empgen=="Others"){echo 'checked';} ?>>Other</label>
                </div>		
              </div></div>
					 <!-- /Admission No -->
				
				<div class="form-group">
                 	  <label for="lblempdob" class="col-sm-2 control-label"> Date of Birth</label>
<div class="col-sm-3">
                     <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control date-picker pull-right" id="dob" name="empdob" value="<?php echo $empdob; ?>">
                </div>
                </div>
				  	 <!-- /Class -->
				  <label for="lblempbg" class="col-sm-2 control-label">Blood Group</label>

                     <div class="col-sm-3">
                  
                <select class="form-control select2" id="empbg" name="empbg" requried >
                  <option value="">Select Blood Group </option>
				  <option value="A+" <?php if($empbg=="A+"){echo 'selected';} ?> >A+ </option>
				  <option value="A-" <?php if($empbg=="A-"){echo 'selected';} ?>>A- </option>
				  <option value="B+" <?php if($empbg=="B+"){echo 'selected';} ?>>B+ </option>
				  <option value="B-" <?php if($empbg=="B-"){echo 'selected';} ?>>B- </option>
				  <option value="O+" <?php if($empbg=="O+"){echo 'selected';} ?>>O+ </option>
				  <option value="O-" <?php if($empbg=="O-"){echo 'selected';} ?>>O- </option>
				  <option value="AB+" <?php if($empbg=="AB+"){echo 'selected';} ?>>AB+ </option>
				  <option value="AB-" <?php if($empbg=="AB-"){echo 'selected';} ?>>AB- </option>
				  
				  
                  
                </select>
                  </div>
                </div>
					 <!-- /Roll.No -->
			<div class="form-group">
                  <label for="lblempmt" class="col-sm-2 control-label" >Mother Tounge</label>

                  <div class="col-sm-3">
                  
                <input type="text" class="form-control pull-right"  id="empmt" value="<?php echo $empmt; ?>" name="empmt" placeholder="Enter Mother Tounge">
                  </div>
				  	 <!-- /Medium -->
				  <label for="lblempnt" class="col-sm-2 control-label">Nationality</label>

                     <div class="col-sm-3">
                  
                <input type="text" class="form-control pull-right"  id="empnt" value="<?php echo $empnt; ?>" name="empnt" placeholder="Enter Nationality">
                  </div>
                </div>				
					
				
			  <!-- /Emp Religion -->
			  	  <div class="form-group">
                  <label for="lblemprel" class="col-sm-2 control-label" >Religion</label>

                  <div class="col-sm-2">
                  
          <select class="form-control select2" id="emprel" name="emprel"  >
                  <option value="">Select Religion </option>
				  <?php 
				  $r=mysqli_query($link,"select * from religion") or die(mysqli_error($link));
				  while($r1=mysqli_fetch_array($r)){
					  $rid=$r1['id'];
				  ?>
				  <option value="<?php echo $rid ?>" <?php if($emprel==$rid){echo 'selected';} ?>><?php echo $r1['rname']; ?></option>
				  <?php }?>
                  
                </select>
                  </div>
				  <!-- /Father Qualification -->
				  	 <div class="form-group">
                  <label for="lblempcast" class="col-sm-1 control-label" >Caste</label>
<div class="col-sm-2">
                <select class="form-control select2" id="empcast" name="empcast"  >
                  <option value="">Select Caste </option>
				  <?php 
				  $r10=mysqli_query($link,"select * from caste") or die(mysqli_error($link));
				  while($r2=mysqli_fetch_array($r10)){
					  $cid=$r2['id'];
				  ?>
				  <option value="<?php echo $cid ?>" <?php if($empcast==$cid){echo 'selected';} ?>><?php echo $r2['caste_name']; ?></option>
				  <?php }?>
                  
                </select>
              </div>
				  	 <!-- /Sub Caste -->
					 <div class="form-group">
                  <label for="lblempsubcst" class="col-sm-2 control-label" >Sub Caste</label>
<div class="col-sm-2">
                <input type="text" class="form-control pull-right"  id="empsubcst" value="<?php echo $empsubcst; ?>" name="empsubcst" placeholder=" Enter Sub Caste">
                  </div>
              </div>
			  </div>
			  </div>
			 
		
			  <!-- /Marital Status -->
			
			  
			  <div class="form-group">
                  <label for="lblempms" class="col-sm-2 control-label" >Marital Status</label>

                  <div class="col-sm-3">
                  
                <select class="form-control select2" requried id="empms" name="empms" >
                  <option value="Single" <?php if($empms=="Single"){echo 'selected';} ?>> Single</option>
                  <option value="Married" <?php if($empms=="Married"){echo 'selected';} ?>> Married </option>
                </select>
                  </div>
				  	 <!-- /Adhar No -->
				  <label for="lblempadhar" class="col-sm-2 control-label"> Adhar No.</label>
<div class="col-sm-2">
                <input type="text" class="form-control pull-right"  id="empadhar" value="<?php echo $empadhar; ?>" name="empadhar" placeholder=" Enter Adhar No.">
                  </div>
				</div>
				
				
			  
			  <!-- /Moblie No -->
			  <div class="form-group">
                  <label for="lblempmbno" class="col-sm-2 control-label">Moblie No.</label>

                   <div class="col-sm-3">
                <input type="text" class="form-control pull-right"  id="empmbno" value="<?php echo $empmbno; ?>" name="empmbno" placeholder=" Enter Mobile No.">
                  </div>
				  	 <!-- /Religion -->
					 <div class="form-group">
                  <label for="lblempemail" class="col-sm-2 control-label" >Email</label>
<div class="col-sm-3">
                  
                <input type="text" class="form-control pull-right"  value="<?php echo $empemail; ?>" id="empemail" name="empemail" placeholder=" Enter Email id">
                  </div>
              </div>
			  </div>
			  <!-- /Caste -->
			
			  	 <!-- /Mother Tounge -->
			   <div class="form-group">
                  <label for="lblempprad" class="col-sm-2 control-label">Present Address</label>

                   <div class="col-sm-3">
                <input type="textarea" class="form-control pull-right"  value="<?php echo $empprad; ?>" id="empprad" name="empprad">   
                  </div>

				  	 <!-- /Adhar No -->
					 <div class="form-group">
                  <label for="lblempperad" class="col-sm-2 control-label">Permanent Address</label>
				  <a href="#">Same as Present Address</a>
<div class="col-sm-3">

                <input type="textarea" class="form-control pull-right"  value="<?php echo $empperad; ?>" id="empperad" name="empperad">
                  </div>
              </div>
			  </div>
			  	 <!-- /Native Place -->
			   <div class="form-group">
                  <label for="lblempqua" class="col-sm-2 control-label">Qualification</label>

                   <div class="col-sm-3">
                <input type="text" class="form-control pull-right"  value="<?php echo $empqua; ?>" id="empqua" name="empqua" placeholder="Enter Qualification">
                  </div>
				  
				  	 <!-- /Address -->
					 <div class="form-group">
                  <label for="lblempexp" class="col-sm-2 control-label" >Experience</label>
<div class="col-sm-3">
                <input type="text" class="form-control pull-right" value="<?php echo $empexp; ?>" id="empexp" name="empexp">
                  </div>
              </div>
			  </div>
			   	 <!-- /Phone No. -->
			     <div class="form-group">
                  <label for="lblempref" class="col-sm-2 control-label">Reference</label>

                   <div class="col-sm-3">
                <input type="text" class="form-control pull-right" value="<?php echo $empref; ?>"  id="empref" name="empref" placeholder="Enter Refference if any">
                  </div>
				  
				  	 <!-- /Emailid -->
					 <div class="form-group">
                             	  <label for="lblempdoj" class="col-sm-2 control-label"> Date of Join</label>
<div class="col-sm-3">
                     <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right date-picker" id="datepicker" name="empdoj" value="<?php echo $empdoj; ?>">
                </div>
              </div>
			  </div>
			  
			 <div class="form-group">
                  <label for="lblempcatg" class="col-sm-2 control-label" >Category</label>

                  <div class="col-sm-2">
                  
          <select class="form-control select2" id="empcatg" name="empcatg"  >
                  <option value="Teaching" <?php if($empcatg=="Teaching"){echo 'selected';} ?>> Teaching</option>
                   <option value="Non-Teaching" <?php if($empcatg=="Non-Teaching"){echo 'selected';} ?>> Non-Teaching</option>
                </select>
                  </div>
				  <!-- /Father Qualification -->
				  	 <div class="form-group">
                  <label for="lblempdesi" class="col-sm-1 control-label" >Designation</label>
<div class="col-sm-2">
              <input type="text" class="form-control pull-right" value="<?php echo $empdesi; ?>"  id="empdesi" name="empdesi" placeholder=" Enter Designation">
                  </div>
                  
             
			
                  <label for="lblempsal" class="col-sm-2 control-label" >Salary</label>
<div class="col-sm-2">
                <input type="text" class="form-control pull-right" value="<?php echo $empsal; ?>"  id="empsal" name="empsal" placeholder=" Enter Salary">
                  </div>
              </div>
			  </div>
			  </div>
			  
			 
			
			
			 
			  
			  <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" type="reset">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                Reset
                                            </button>
											&nbsp; &nbsp; &nbsp;
                                           <a href="view_employees.php"><button class="btn btn-danger" type="button" name="button" id="Close">
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