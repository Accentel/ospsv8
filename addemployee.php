<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';
include'dbfiles/iqry_emp.php';
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
                            <div class="col-xs-6">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title">Employee Details</h3>
								</div>
                               
                                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="">
              <div class="box-body">
			  	 <!-- /Employee Photo-->
                <div class="form-group">			
                  <label for="lblempfile" class="col-sm-4 control-label">Employee Name:</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" required id="empname" name="empname">
                  </div>
				  
                </div>			
				 <!-- /Employee Name< -->
				<div class="form-group">
                  <label for="lblempnm" class="col-sm-4 control-label" >Employee Email</label>

                  <div class="col-sm-8">
                  
                <input type="email" class="form-control pull-right" required id="email" name="email">
				 <input type="hidden" class="form-control pull-right"   id="user" name="user" value="<?php echo $name; ?>">
                  </div>
				  	 <!-- /Admission Date -->
				 	
              </div>
					 <!-- /Admission No -->
				
				
					 <!-- /Roll.No -->
			<div class="form-group">
                  <label for="lblempmt" class="col-sm-4 control-label" >User Name</label>

                  <div class="col-sm-8">
                  
                <input type="text" class="form-control pull-right" required  id="uname" name="uname" placeholder="Enter User Name">
                  </div>
				  	 <!-- /Medium -->
				  
                </div>				
					
				
				
				<div class="form-group">
				
				<label for="lblempnt" class="col-sm-4 control-label">Password</label>

                     <div class="col-sm-8">
                  
                <input type="password" class="form-control pull-right" required id="pwd" name="pwd" placeholder="Enter Password">
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
					
										<?php
										$datatable="employee";
										$results_per_page = 20;
										if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $results_per_page;
$sql = "SELECT * FROM ".$datatable." ORDER BY empid ASC LIMIT $start_from, ".$results_per_page;
$rs_result = mysqli_query($link,$sql) or die(mysqli_error($link));
?>
									<div class="col-xs-12">
									<div class="table-header">
                                         Employees  List
                                        </div>
										<div style="height:15px;"></div>
										<form method="post" action="" class="form-horizontal">
										
										<div class="form-group">
				
				

                     <div class="col-sm-9">
                  
                <input type="text" class="form-control pull-right" id="search" name="search" placeholder="Search By Emp Name or Email or User Name">
                  </div>
				   <div class="col-sm-3">
                  
               <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                Search
                                            </button>
                  </div>
				</div>
										
										</form>
										<table id="simple-table" class="table  table-bordered table-hover">
											<thead>
												<tr>
													
													<th class="detail-col">S No</th>
													<th>Emp Name</th>
													<th>Emp Email</th>
													<th class="hidden-480">User Name</th>
													<th class="hidden-480">Password</th>
         											<th class="hidden-480">Action</th>

													
												</tr>
											</thead>

											<tbody>
											<?php 
											if(isset($_POST['bsearch'])){
												$bsearch=$_POST['search'];
											 $y="select * from employee where emp_name like  '%$bsearch%' or emp_email like  '%$bsearch%' or username like  '%$bsearch%' ";
											$t=mysqli_query($link,$y) or die(mysqli_error($link));
											$i=1;
											while($t1=mysqli_fetch_array($t)){
												
												
											?>
											
											<tr>
													
													 <td><?php echo $i; ?></td>
													

													<td>
														<?php echo $t1['emp_name']; ?>
													</td>
													<td><?php echo $t1['emp_email']; ?></td>
													
													<td><?php echo $t1['username']; ?></td>

													<td >
														<?php echo $t1['password']; ?>
													</td>

													
														 <td class="hidden-480"><a href="editemp.php?id=<?php echo $t1['empid']; ?>"><i class="ace-icon fa fa-pencil bigger-130"></i></a>&nbsp;&nbsp;
                                                         <a onClick="return confirm('Are you sure you want to delete this item?');" href="dbfiles/deleteemployee.php?id=<?php echo $t1['empid']; ?>"><img src="images/Icon_Delete.png"></a></td>
                                                       
                                                       
                                                       

														
													
												</tr>
											
											
											
											
											<?php $i++; }   }else{ ?>
											
											<?php
                                                   
                                                    $i=1;
                                                    while($rs1= mysqli_fetch_array($rs_result)){
                                                    
                                                    ?>
												<tr>
													
													 <td><?php echo $i; ?></td>
													

													<td>
														<?php echo $rs1['emp_name']; ?>
													</td>
													<td><?php echo $rs1['emp_email']; ?></td>
													
													<td><?php echo $rs1['username']; ?></td>

													<td >
														<?php echo $rs1['password']; ?>
													</td>

													
														 <td class="hidden-480"><a href="editemp.php?id=<?php echo $rs1['empid']; ?>"><i class="ace-icon fa fa-pencil bigger-130"></i></a>&nbsp;&nbsp;
                                                         <a onClick="return confirm('Are you sure you want to delete this item?');" href="dbfiles/deleteemployee.php?id=<?php echo $rs1['empid']; ?>"><img src="images/Icon_Delete.png"></a></td>
                                                       
                                                       
                                                       

														
													
												</tr>

											<?php $i++; } }?>

										
												

												
											</tbody>
										</table>
										<div align="center">		
<?php 
$sql = "SELECT COUNT(empid) AS total FROM ".$datatable;
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($result);
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
  



echo "<ul class='pagination'>";
echo "<li><a href='addemployee.php?page=".($page-1)."' class='button'>Previous</a></li>"; 

echo "<li><a>".$page."</></li>";

echo "<li><a href='addemployee.php?page=".($page+1)."' class='button'>NEXT</a></li>";
echo "</ul>";
?>
												
</div>
									</div><!-- /.span -->
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