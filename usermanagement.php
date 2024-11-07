<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';
//include'dbfiles/iqry_emp.php';
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
                                <i class="ace-icon fa fa-user"></i>
                                <a href="#">User Management</a>
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
                               
                                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="user_insert.php">
              <div class="box-body">
			  	 <!-- /Employee Photo-->
                <div class="form-group">			
                  <label for="lblempfile" class="col-sm-2 control-label">Employee Name:</label>

                  <div class="col-sm-4">
				  <input type="hidden" name="user" id="user" value="<?php echo $name; ?>" />
                    <select class="form-control" name="empname" id="empname">
					<option value="">Select Emp Name</option>
					<?php 
											$r=mysqli_query($link,"select * from employee") or die(mysqli_error($link));
											while($r1=mysqli_fetch_array($r)){?>
												
												<option value="<?php echo $r1['empid'] ?>"><?php echo $r1['emp_name']; ?></option>
										<?php	}
											?>
					</select>
                  </div>
				  
                </div>	


				<div class="form-group">			
                  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="2" />Settings<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="21" />Update Organization<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="22" />Add Employee<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="23" />Add Locations<br/>
				  
				  </div>

                  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="3" />Ap & Ts Billing<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="24" />Upload Products<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="25" />Upload DPR<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="26" />Add DPR<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="31" />Add Billing<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="32" />Billing List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="33" />Edit Bills<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="34" />Billing Prints List<br/>
				  				  
				  </div>
				  
				   <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="5" />Maharashtra Billing<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="51" />Upload Products<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="52" />Upload DPR<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="53" />Add DPR<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="54" />Add Billing<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="55" />Billing List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="56" />Edit Bills<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="57" />Billing Prints List<br/>				  
				  </div>
				  
				  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="8" />Gujarat Billing<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="81" />Upload Products<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="82" />Upload DPR<br/>
				  
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="83" />Add Billing<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="84" />Billing List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="85" />Billing Prints List<br/>
				  
				  				  
				  </div>
				  
				  
				  
				  
				   
                </div>	
				<div class="form-group">
				<div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="9" />AP Billing<br/>
					  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="94" />Upload Products<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="95" />Upload Dpr<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="91" />Add Billing<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="92" />Billing List<br/>
					&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="93" />Billing Prints List<br/>		  				  
				  </div>
				  
				     <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="12" />GOA Billing<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="114" />Upload Products<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="115" />Upload DPR<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="116" />Add DPR<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="131" />Add Billing<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="132" />Billing List<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="133" />Edit Bills<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="134" />Billing Prints List<br/>
				  				  
				  </div>				
				<div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="4" />Reports<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="41" />Ap & TS Summary<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="44" />MH Summary<br/>
				    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="45" />Gujarat Summary<br/>
					&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="46" />AP Summary<br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="135" />GOA Summary<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="42" />Date wise invoice<br/> 
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="42" />Date wise invoice list<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="43" />GST wise invoice list<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="47" />TS HSN/SCNO wise Report list<br/>
				   &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="48" />MH HSN/SCNO wise Report <br/>
				    &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="49" />GT HSN/SCNO wise Report list<br/>
					&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="410" />AP HSN/SCNO wise Report listy<br/>
					&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="4110" />MH-GOA HSN/SCNO wise Report listy<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="411" />TS Dpr Download Report<br/>			  
					&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="412" />MH Dpr Download Report<br/>			  
					&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="413" />GT Dpr Download Report<br/>			  
					&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="414" />AP Dpr Download Report<br/>
					
								  
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="415" />All TS Dpr Download Report<br/>			  
					&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="416" />All MH Dpr Download Report<br/>			  
					&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="417" />All GT Dpr Download Report<br/>			  
					&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="418" />All AP Dpr Download Report<br/>
				 				  
				  </div>
				<div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="6" />User Management
				  
				  				  
				  </div>
				  
				  <div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="7" />Apporve Bills<br/>
				   &nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="71" />Maharashtra Bills<br/>
				  	 &nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="72" />AP & TS Bills<br/>	
					&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="73" />Gujarat Bills<br/>	
					&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="74" />AP Bills<br/>
						&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="75" />GOA Bills<br/>
				  </div>
				  </div>
				  
				  
				  <div class="form-group">
				<div class="col-sm-3">
				  <input type="checkbox" name="menu[]" value="100" />Upload Formats<br/>
					  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="101" />Upload Products Formats<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="102" />Upload Dpr Format<br/>
				  &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="menu[]" value="103" />Upload Add Billing Format<br/>
				  				  
				  </div>
				  				
				
				
				  
				  
				  </div>
				 
				 <!-- /Employee Name< -->
				
					 <!-- /Admission No -->
				
				
					 <!-- /Roll.No -->
						
					
				
				
				
			 		  
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
                                           <a href="usermanagement.php"><button class="btn btn-danger" type="button" name="button" id="Close">
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
					
					
					<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       

                                        
                                        <div class="table-header">
                                         Users  List
                                        </div>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
                                                        <th>S No</th>
														 <th>Emp Name</th>
														 <th>User Name</th>
														 <th>Password</th>
                                                         
                                                                                                    
                                                      
                                                       <th ></th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $q="select a.user,a.empname,b.emp_name,b.password from admin_login a,employee b where a.empname=b.empid and a.user!='admin'";
                                                    $rs= mysqli_query($link, $q) or die(mysqli_error());
                                                    $i=1;
                                                    while($rs1= mysqli_fetch_array($rs)){
                                                    
                                                    ?>
                                                    <tr>
                                                        
<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>
                                                        <td><?php echo $i; ?></td>
                                                       
                                                      <td class="hidden-480"><?php echo $rs1['emp_name']; ?></td>
													     <td class="hidden-480"><?php echo $rs1['user']; ?></td>
													  <td class="hidden-480"><?php echo $rs1['password']; ?></td>
                                                     
                                                                                           
                                                       <td class="hidden-480"><a href="edituser.php?id=<?php echo $rs1['empname']; ?>"><i class="ace-icon fa fa-pencil bigger-130"></i></a>&nbsp;&nbsp;
                                                         <a onClick="return confirm('Are you sure you want to delete this item?');" href="dbfiles/deleteuser.php?id=<?php echo $rs1['empname']; ?>"><img src="images/Icon_Delete.png"></a></td>
                                                       
                                                       
                                                       
                                                    </tr>
                                                    <?php $i++; }?>
                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div>
					
					
					
					
					
					
					
					
					
					
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