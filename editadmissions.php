<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';
include'dbfiles/uqry_admissions.php';
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
                                <a href="#">Admissions</a>
                            </li>
                            <li>
                                <a href="#">Admission Details</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                               Admission Details

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title">Admission Details</h3>
								</div>
                               
                                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" >
              <div class="box-body">
			  	 <!-- /Student Photo-->
                <div class="form-group">			
                  <label for="lblfile" class="col-sm-2 control-label">Student Photo:</label>

                  <div class="col-sm-3">
                    <input type="file" class="form-control" id="file" name="file">
					<input type="hidden" name="photo" value="<?php echo $photo; ?>"/>
                  </div>				  
                </div>			
				 <!-- /Academic Year -->
				<div class="form-group">
                  <label for="lblaccyr" class="col-sm-2 control-label" >Academic Year</label>

                  <div class="col-sm-3">
                  
                <select class="form-control select2" requried id="year" name="year" >
				<option value="">Select year</option>
                   <?php 
				  $r10=mysqli_query($link,"select * from acyear") or die(mysqli_error($link));
				  while($r2=mysqli_fetch_array($r10)){
					  $cid=$r2['id'];
				  ?>
				  <option value="<?php echo $cid ?>" <?php if($acyear==$cid){echo 'selected';} ?>   ><?php echo $r2['year']; ?></option>
				  <?php }?>
                  
                </select>
                  </div>
				  	 <!-- /Admission Date -->
					
				  <label for="lbladmdt" class="col-sm-2 control-label">Admission Date</label>
 <div class="col-sm-3">
                     <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control date-picker pull-right" id="datepicker" value="<?php echo $admdate; ?>" name="admindt"">
                </div>
                </div></div>
					 <!-- /Admission No -->
				
				<div class="form-group">
                  <label for="lbladminno" class="col-sm-2 control-label" >Admission No</label>

                  <div class="col-sm-3">
                  
                <input type="text" class="form-control pull-right"  id="adminno" name="adminno" value="<?php echo $admno; ?>">
				<input type="text" class="form-control pull-right"  id="id" name="id" value="<?php echo $aid; ?>">
                  </div>
				  	 <!-- /Class -->
				  <label for="lblclass" class="col-sm-2 control-label">Class</label>

                     <div class="col-sm-3">
                  
                <select class="form-control select2" id="class" name="class" requried >
                  <option value="">Select Class </option>
                   <?php 
				  $r10=mysqli_query($link,"select * from class") or die(mysqli_error($link));
				  while($r2=mysqli_fetch_array($r10)){
					  $cid=$r2['id'];
				  ?>
				  <option value="<?php echo $cid ?>" <?php if($class==$cid){echo 'selected';} ?>><?php echo $r2['cname']; ?></option>
				  <?php }?>
                </select>
                  </div>
                </div>
					 <!-- /Roll.No -->
			<div class="form-group">
                  <label for="lblrolno" class="col-sm-2 control-label" >Roll.No</label>

                  <div class="col-sm-3">
                  
                <input type="text" class="form-control pull-right"  id="rolno" name="rolno" placeholder="Enter Roll.No" value="<?php echo $rollno; ?>">
				 <input type="hidden" class="form-control pull-right"  id="user" name="user" value="<?php echo $name; ?>">
                  </div>
				  	 <!-- /Medium -->
				  
                    
                  
                
                  <label for="lblsmed" class="col-sm-2 control-label">Medium </label>

                   <div class="col-sm-3">
                  
                <select class="form-control select2" id="med" name="med"  >
						<option value="">Select Medium</option>
                  <option value="E.M" <?php if($medium=="E.M"){echo 'selected';} ?>> E.M</option>
                   <option value="T.M" <?php if($medium=="T.M"){echo 'selected';} ?>> T.M</option>
                </select>
                  </div>
			  
                </div>				
					 <!-- /Section -->
				<div class="form-group">                

				  <label for="lblsection" class="col-sm-2 control-label">Section</label>

                     <div class="col-sm-3">
                  
                <select class="form-control select2" id="section" name="section" requried >
                  <option value="">Select Section </option>
                   <?php 
				  $r10=mysqli_query($link,"select * from section") or die(mysqli_error($link));
				  while($r2=mysqli_fetch_array($r10)){
					  $cid=$r2['id'];
				  ?>
				  <option value="<?php echo $cid ?>" <?php if($section==$cid){echo 'selected';} ?>><?php echo $r2['sname']; ?></option>
				  <?php }?>
                </select>
                  
                </select>
                  </div>
                </div>	
				 <!-- /Studentname -->
				<div class="form-group">
                  <label for="lblrolno" class="col-sm-2 control-label" >Student Name</label>

                  <div class="col-sm-3">
                  
                <input type="text" class="form-control pull-right"  id="stdnm" name="stdnm" placeholder="Enter Student Name" value="<?php echo $sname; ?>">
                  </div>
				  	 <!-- /Gender -->
					 <div class="form-group">
                  <label for="lblgender" class="col-sm-2 control-label" >Gender</label>
<div class="col-sm-3">
				  <label><input type="radio" name="gen" value="Male" class="minimal" <?php if($gender=="Male"){echo 'checked';} ?> >Male</label>
                <label><input type="radio" name="gen" value="Female" class="minimal" <?php if($gender=="Female"){echo 'checked';} ?>>Female</label>
                <label><input type="radio" name="gen" value="Others" class="minimal" <?php if($gender=="Others"){echo 'checked';} ?>>Other</label>
                </div>		
              </div>
			  </div>
			  <!-- /Father Name -->
			  	  <div class="form-group">
                  <label for="lblfatnm" class="col-sm-2 control-label" >Father Name</label>

                  <div class="col-sm-2">
                  
                <input type="text" class="form-control pull-right"  id="fatnm" name="fatnm" placeholder="Enter Father Name" value="<?php echo $fname; ?>">
                  </div>
				  <!-- /Father Qualification -->
				  	 <div class="form-group">
                  <label for="lblfatqua" class="col-sm-1 control-label" >Qualification</label>
<div class="col-sm-2">
                <input type="text" class="form-control pull-right"  id="fatqua" name="fatqua" placeholder=" Father Qualification" value="<?php echo $fqualification; ?>">
                  
              </div>
				  	 <!-- /Father Occupation -->
					 <div class="form-group">
                  <label for="lblfatocu" class="col-sm-2 control-label" >Occupation</label>
<div class="col-sm-2">
                <input type="text" class="form-control pull-right"  id="fatocu" name="fatocu" placeholder=" Father Occupation" value="<?php echo $foccupation; ?>">
                  </div>
              </div>
			  </div>
			  </div>
			  <!-- /Mother Name -->
			  <div class="form-group">
                  <label for="lblmomnm" class="col-sm-2 control-label" >Mother Name</label>

                  <div class="col-sm-2">
                  
                <input type="text" class="form-control pull-right"  id="momnm" name="momnm" placeholder="Enter Mother Name" value="<?php echo $mname; ?>">
                  </div>
				  <!-- /mother Qualification -->
				  	 <div class="form-group">
                  <label for="lblmomqua" class="col-sm-1 control-label" >Qualification</label>
<div class="col-sm-2">
                <input type="text" class="form-control pull-right"  id="momqua" name="momqua" placeholder=" Mother Qualification" value="<?php echo $mqualification; ?>">
                  
              </div>
				  	 <!-- /Mother Occupation -->
					 <div class="form-group">
                  <label for="lblmomocu" class="col-sm-2 control-label" >Occupation</label>
<div class="col-sm-2">
                <input type="text" class="form-control pull-right"  id="momocu" name="momocu" placeholder=" Mother Occupation" value="<?php echo $moccupation; ?>">
                  </div>
              </div>
			  </div>
			  </div>
			  <!-- /Blood Group -->
			
			  
			  <div class="form-group">
                  <label for="lblbg" class="col-sm-2 control-label" >Blood Group</label>

                  <div class="col-sm-3">
                  
                <select class="form-control select2" id="bg" name="bg" requried >
                  <option value="">Select Blood Group </option>
				  <option value="A+" <?php if($bg=="A+"){echo 'selected';} ?>>A+ </option>
				  <option value="A-" <?php if($bg=="A-"){echo 'selected';} ?>>A- </option>
				  <option value="B+" <?php if($bg=="B+"){echo 'selected';} ?>>B+ </option>
				  <option value="B-" <?php if($bg=="B-"){echo 'selected';} ?>>B- </option>
				  <option value="O+" <?php if($bg=="O+"){echo 'selected';} ?>>O+ </option>
				  <option value="O-" <?php if($bg=="O-"){echo 'selected';} ?>>O- </option>
				  <option value="AB+" <?php if($bg=="AB+"){echo 'selected';} ?>>AB+ </option>
				  <option value="AB-" <?php if($bg=="AB-"){echo 'selected';} ?>>AB- </option>
				  
				  
                  
                </select>
                  </div>
				  	 <!-- /Admission Date -->
				  <label for="lbldob" class="col-sm-2 control-label"> Date of Birth</label>
<div class="col-sm-3">
                     <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control date-picker pull-right" id="dob" name="dob" value="<?php echo $dob; ?>">
                </div>
                </div>
				</div>
				
				
			  
			  <!-- /Nationality -->
			  <div class="form-group">
                  <label for="lblnat" class="col-sm-2 control-label">Nationality</label>

                   <div class="col-sm-3">
                <input type="text" class="form-control pull-right"  id="nat" name="nat"  value="<?php echo $nationality; ?>">
                  </div>
				  	 <!-- /Religion -->
					 <div class="form-group">
                  <label for="lblReligion" class="col-sm-2 control-label" >Religion</label>
<div class="col-sm-3">
                  
                 <select class="form-control select2" id="rel" name="rel"  >
                  <option value="">Select Religion </option>
				  <?php 
				  $r=mysqli_query($link,"select * from religion") or die(mysqli_error($link));
				  while($r1=mysqli_fetch_array($r)){
					  $rid=$r1['id'];
				  ?>
				  <option value="<?php echo $rid ?>" <?php if($religion==$rid){echo 'selected';} ?>><?php echo $r1['rname']; ?></option>
				  <?php }?>
                  
                </select>
                  </div>
              </div>
			  </div>
			  <!-- /Caste -->
			  <div class="form-group">
                  <label for="lblcaste" class="col-sm-2 control-label">Caste</label>

                   <div class="col-sm-3">
                  
                 <select class="form-control select2" id="caste" name="caste"  >
                  <option value="">Select Caste </option>
				  <?php 
				  $r10=mysqli_query($link,"select * from caste") or die(mysqli_error($link));
				  while($r2=mysqli_fetch_array($r10)){
					  $cid=$r2['id'];
				  ?>
				  <option value="<?php echo $cid ?>" <?php if($caste==$cid){echo 'selected';} ?>><?php echo $r2['caste_name']; ?></option>
				  <?php }?>
                  
                </select>
                  </div>
				  	 <!-- /Subcaste -->
					 <div class="form-group">
                  <label for="lblsubcast" class="col-sm-2 control-label" >Sub Caste</label>
<div class="col-sm-3">
                <input type="text" class="form-control pull-right"  id="subcaste" name="subcaste" placeholder="Enter Subcaste" value="<?php echo $scaste; ?>">
                  </div>
              </div>
			  </div>
			  	 <!-- /Mother Tounge -->
			   <div class="form-group">
                  <label for="lblmt" class="col-sm-2 control-label">Mother Tounge</label>

                   <div class="col-sm-3">
                <input type="text" class="form-control pull-right"  id="mt" name="mt" placeholder="Enter Mother Tounge" value="<?php echo $mtounge; ?>">
                  </div>

				  	 <!-- /Adhar No -->
					 <div class="form-group">
                  <label for="lbladhar" class="col-sm-2 control-label">Adhar No</label>
<div class="col-sm-3">
                <input type="text" class="form-control pull-right"  id="adhar" name="adhar" placeholder="Enter Adhar No" value="<?php echo $aadhar; ?>">
                  </div>
              </div>
			  </div>
			  	 <!-- /Native Place -->
			   <div class="form-group">
                  <label for="lblnp" class="col-sm-2 control-label">Native Place </label>

                   <div class="col-sm-3">
                <input type="text" class="form-control pull-right"  id="np" name="np" placeholder="Enter Native Place" value="<?php echo $nativeplace; ?>">
                  </div>
				  
				  	 <!-- /Address -->
					 <div class="form-group">
                  <label for="lbladdres" class="col-sm-2 control-label" >Address</label>
<div class="col-sm-3">
                <textarea class="form-control pull-right"  id="addres" name="addres"><?php echo $address; ?></textarea>
                  </div>
              </div>
			  </div>
			   	 <!-- /Phone No. -->
			     <div class="form-group">
                  <label for="lblphone" class="col-sm-2 control-label">Phone No. </label>

                   <div class="col-sm-3">
                <input type="text" class="form-control pull-right"  id="pn" name="pn" placeholder="Enter Phone No." value="<?php echo $phoneno; ?>">
                  </div>
				  
				  	 <!-- /Emailid -->
					 <div class="form-group">
                  <label for="lblemail" class="col-sm-2 control-label" >Email Id:</label>
<div class="col-sm-3">
                <input type="text" class="form-control pull-right"  id="email" name="email" placeholder="Enter Email ID" value="<?php echo $emailid; ?>">
                  </div>
              </div>
			  </div>
			  
			  <div class="form-group">
                  <label for="lblidentity" class="col-sm-2 control-label">Identification Marks </label>

                   <div class="col-sm-3">
                <input type="text" class="form-control pull-right"  id="Identity1" name="Identity1" placeholder="Enter Identification Mark1" value="<?php echo $mark1; ?>"><br/>
				<input type="text" class="form-control pull-right"  id="Identity2" name="Identity2" placeholder="Enter Identification Mark2" value="<?php echo $mark2; ?>">
                  </div>
				  <!-- /MEDIUM -->
				   <div class="form-group">
                  
				  	 <!-- /FEE -->
					<div class="form-group">
                  <label for="lblft" class="col-sm-1 control-label" >Fee Type</label>
<div class="col-sm-2">
				  <label><input type="radio" name="fee" value="Monthly" class="minimal" <?php if($ftype=="Monthly"){echo 'checked';} ?> >Monthly</label>
                <label><input type="radio" name="fee" value="Yearly" class="minimal" <?php if($ftype=="Yearly"){echo 'checked';} ?>>Yearly</label>
                
                </div>	
				  
              </div>
			  	   
		            </div>
					<!-- /FIRST LANGUAGE -->
			  <div class="form-group">
                  <label for="lblfirstlan" class="col-sm-2 control-label">First Language</label>

                   <div class="col-sm-3">
                  
                <select class="form-control select2" id="fl" name="fl"  >
                  <option value="">Select First Language</option>
                   
				   <option value="HINDI" <?php if($flangruage=="HINDI"){echo 'selected';} ?>> HINDI</option>
                   <option value="URDU" <?php if($flangruage=="URDU"){echo 'selected';} ?>> URDU</option>
				   
				   
				   
                </select>
                  </div>
				  
				  <!-- /SECOND LANGUAGE -->
					 <div class="form-group">
<label for="lblseclan" class="col-sm-2 control-label">Second Language</label>

                   <div class="col-sm-3">
                  
                <select class="form-control select2" id="sl" name="sl"  >
				<option value="">Select Second Language</option>
                  <option value="TELUGU" <?php if($slangruage=="TELUGU"){echo 'selected';} ?>> TELUGU</option>
                   <option value="ENGLISH" <?php if($slangruage=="ENGLISH"){echo 'selected';} ?>> ENGLISH</option>
                </select>
                  </div>
              </div>
			  </div>
			  <hr>
			    <div class="form-group">			
                  <label for="lbldoc" class="col-sm-2 control-label">Attach Documents:</label>

                  <div class="col-sm-3">
                    <input type="file" class="form-control" id="doc" name="doc">
					<input type="hidden" name="doc1" value="<?php echo $docupload;?>"/>
                  </div>				  
                </div>
			 <hr>
			<center> <p><font color="red"><b>****If The Student Had Already Studied in any School****</b></font></p></center>
			<div class="form-group">
                  <label for="lbllcs" class="col-sm-2 control-label">Class Last Studied</label>

                   <div class="col-sm-3">
                  
                <select class="form-control select2" id="lcs" name="lcs"  >
				<option value="">Select Last Class Studied</option>
                 <?php 
				  $r10=mysqli_query($link,"select * from class") or die(mysqli_error($link));
				  while($r2=mysqli_fetch_array($r10)){
					  $cid=$r2['id'];
				  ?>
				  <option value="<?php echo $cid ?>" <?php if($pclass==$cid){echo 'selected';} ?> ><?php echo $r2['cname']; ?></option>
				  <?php }?>
                   
                </select>
                  </div>
				  
				  	 <!-- /Address -->
					 <div class="form-group">
                  <label for="lblyop" class="col-sm-2 control-label" >Year of Passed</label>
<div class="col-sm-3">
                <input type="text" class="form-control pull-right"  id="yop" name="yop" placeholder="Enter Year of Passed" value="<?php echo $yearpass; ?>">
                  </div>
              </div>
			  </div>
			  <div class="form-group">
                  <label for="lblnos" class="col-sm-2 control-label">Name of the School </label>

                   <div class="col-sm-3">
                <input type="text" class="form-control pull-right"  id="nos" name="nos" placeholder="Enter Name of School Last Studied" value="<?php echo $schoolname; ?>">
                  </div>
				  
				  	 <!-- /Address -->
					 <div class="form-group">
                  <label for="lbltc" class="col-sm-2 control-label" >Trasfer Certificate No.</label>
<div class="col-sm-3">
                <input type="text" class="form-control pull-right"  id="tc" name="tc" placeholder="Enter Trasfer Certificate No." value="<?php echo $tcno; ?>">
                  </div>
              </div>
			  </div>
			  <div class="form-group">
                  <label for="lblsmed" class="col-sm-2 control-label">Medium </label>

                   <div class="col-sm-3">
                  
                <select class="form-control select2" id="smed" name="smed"  >
				<option value="">Select Medium</option>
                  <option value="E.M" <?php if($pmedium=="E.M"){echo 'selected';} ?>> E.M</option>
                   <option value="T.M" <?php if($pmedium=="T.M"){echo 'selected';} ?>> T.M</option>
                </select>
                  </div>
			  </div>
			  <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Save
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
							format:'d/m/yyyy',
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