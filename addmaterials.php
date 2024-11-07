<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
include'dbfiles/org.php';
include'materials_insert.php';
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
                                <a href="#">Materials Details</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                               Materials Details

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title">Materials Details</h3>
								</div>
                               
                                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="">
              <div class="box-body">
			  	 <!-- /Employee Photo-->
                <div class="form-group">			
                  <label for="lblempfile" class="col-sm-4 control-label">Materials Name:</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" required id="mname" name="mname" placeholder="Enter Materials Name">
					<input type="hidden" class="form-control pull-right"   id="user" name="user" value="<?php echo $name; ?>">
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
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       

                                        
                                        <div class="table-header">
                                         Materials  List
                                        </div>
<div style="height:15px;"></div>
										<form method="post" action="" class="form-horizontal">
										
										<div class="form-group">
				
				

                     <div class="col-sm-9">
                  
                <input type="text" class="form-control pull-right" id="search" name="search" placeholder="Search By Material Name">
                  </div>
				   <div class="col-sm-3">
                  
               <button class="btn btn-info" type="submit" name="bsearch" id="bsearch">
                                                <i class="ace-icon fa fa-search bigger-110"></i>
                                                Search
                                            </button>
                  </div>
				</div>
										
										</form>
                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>S No</th>
                                                        <th>Materials Name</th>
                                                                                                                                                          
                                                      
                                                       <th ></th>
                                                    </tr>
                                                </thead>

                                                <tbody>
												
												<?php 
											if(isset($_POST['bsearch'])){
												$bsearch=$_POST['search'];
											 $y="select * from materials where mname like  '%$bsearch%' ";
											$t=mysqli_query($link,$y) or die(mysqli_error($link));
											$i=$start_from;
											$start=1;
											while($t1=mysqli_fetch_array($t)){
												
												
											?>
												
												 <tr>
                                                        
                                                        <td><?php echo $i+$start; ?></td>
                                                        <td class="hidden-480"><?php echo $t1['mname']; ?></td>
                                                       <td class="hidden-480"><a href="editmaterials.php?id=<?php echo $t1['id']; ?>"><i class="ace-icon fa fa-pencil bigger-130"></i></a>&nbsp;&nbsp;
                                                         <a onClick="return confirm('Are you sure you want to delete this item?');" href="dbfiles/deletematerials.php?id=<?php echo $t1['id']; ?>"><img src="images/Icon_Delete.png"></a></td>
                                                    </tr>
												
																						
												
                                                    <?php $i++; }   }else{ ?>
											
											<?php
                                                   
										$datatable="materials";
										$results_per_page = 20;
										if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $results_per_page;
$sql = "SELECT * FROM ".$datatable." ORDER BY id desc LIMIT $start_from, ".$results_per_page;
$rs_result = mysqli_query($link,$sql) or die(mysqli_error($link));

                                                    $i=$start_from;
													$start=1;
                                                    while($rs1= mysqli_fetch_array($rs_result)){
                                                    
                                                    ?>
                                                    <tr>
                                                        

                                                        <td><?php echo $i+$start; ?></td>
                                                       
                                                      
                                                       
                                                        <td class="hidden-480"><?php echo $rs1['mname']; ?></td>
                                                        
                                                       <td class="hidden-480"><a href="editmaterials.php?id=<?php echo $rs1['id']; ?>"><i class="ace-icon fa fa-pencil bigger-130"></i></a>&nbsp;&nbsp;
                                                         <a onClick="return confirm('Are you sure you want to delete this item?');" href="dbfiles/deletematerials.php?id=<?php echo $rs1['id']; ?>"><img src="images/Icon_Delete.png"></a></td>
                                                    </tr>
                                                   <?php $i++; } }?>
                                                    
                                                    
                                                </tbody>
                                            </table>
											<div align="center">		
<?php 
$sql = "SELECT COUNT(id) AS total FROM ".$datatable;
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($result);
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
  



echo "<ul class='pagination'>";
echo "<li><a href='addmaterials.php?page=".($page-1)."' class='button'>Previous</a></li>"; 

echo "<li><a>".$page."</></li>";

echo "<li><a href='addmaterials.php?page=".($page+1)."' class='button'>NEXT</a></li>";
echo "</ul>";
?>
												
</div>
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