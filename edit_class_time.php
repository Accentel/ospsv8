<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';

?>
<!DOCTYPE html>
<html lang="en">
<?php include'template/headerfile.php'; ?>
  <head>  
  <link rel="stylesheet" type="text/css" href="js/tcal.css" />
<script type="text/javascript" src="js/tcal.js"></script>
<style>
#expense_table th {
    padding: .5em .3em;
    background: #9097A9;
    color: #fff;
    font-size: 0.75em;
    font-weight: bold;
}</style>
</head>

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
                                <a href="#">Timetable Entry</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->

                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       

                                        <div class="clearfix">
                                            <div class="pull-left"><!--<a href="addsubjects.php"><button type="button" class="btn-success btn-sm ">Add Subjects</button></a>--></div>
                                            <div class="pull-right tableTools-container"></div>
                                        </div>
                                        <div class="table-header">
                                          Student Timetable Entry
                                        </div>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                        
                                        
                                        
                                         <form name="form1" method="post" action="" onsubmit="return fun1()">
                                                                <table class="mytable" border="0" cellspacing="0" cellpadding="3" width="100%">
                                                                    <tbody>
                                                                        <tr>
																		<!--<td > <strong>Year</strong><font color="red">*</font> :
<select name="acdyear" class="form-control" required>
                                                            <option value="">--Select--</option>
                                                                 <?php
										//include("config.php");
									
												$strSQL = mysqli_query($link,"SELECT DISTINCT acyear FROM  student_register ");
												while($result=mysqli_fetch_array($strSQL))
												{
												 $acd=$result['acyear'];
												
												$strSQL = mysqli_query($link,"SELECT DISTINCT year,id FROM   acyear where id='$acd'");
												while($result=mysqli_fetch_array($strSQL))
												{
												 $year=$result['year'];
												 $id=$result['id'];
												 echo "<option value='$id'>$year</option>";
												}
												
                                               }
											?>
                                                        </select>                                                                            
                                                    </td>-->
                                                                            <td ><strong>Class</strong> <font color="red">*</font>: 
                                                                  <select class="form-control" name="class1" id="class1" onChange="showUser1(this.value)">
                                    <option value="">--Select--</option>
                                                                                             <?php
										//include("config.php");
									
												$strSQL = mysqli_query($link,"SELECT * FROM  class  ");
												while($result=mysqli_fetch_array($strSQL))
												{
												 $class=$result['cname'];
												 $id=$result['id'];
												 
												  echo "<option value='$id'>$class</option>";
												
												
												
                                               }
											?>
                                             
                                  </select>                                    </td>
                                    
                                    <td ><strong>Section</strong> <font color="red">*</font> :
                                    
                                      <select class="form-control" name="section" id="section">
                                        <option value="">--Select--</option>
                                       
                                                                                            <?php
										//include("config.php");
									
												$strSQL = mysqli_query($link,"SELECT DISTINCT section FROM  student_register ");
												while($result=mysqli_fetch_array($strSQL))
												{
												 $section=$result['section'];
												
												$strSQL1 = mysqli_query($link,"SELECT DISTINCT sname,id FROM   `section` where id='$section'");
												while($result=mysqli_fetch_array($strSQL1))
												{
												 $section1=$result['sname'];
												 $id=$result['id'];
												 echo "<option value='$id'>$section1</option>";
												}
												
                                               }
											?>
                                      </select>
                                    </td>
                                   
                                 
											
                                             <td ><strong>Medium</strong> <font color="red">*</font> :
                                    
                                      <select class="form-control" name="medium" id="medium">
                                        <option value="">--Select--</option>
                                                                              <?php
										//include("config.php");
									
												$strSQL = mysqli_query($link,"SELECT DISTINCT medium FROM  student_register ");
												while($result=mysqli_fetch_array($strSQL))
												{
												 $medium=$result['medium'];
												
												
												 echo "<option value='$medium'>$medium</option>";
											
												
                                               }
											?>
                                      </select>
                                    </td>
                                   
                                            
                                            							<!-- <td><strong>Date</strong><font color="red">*</font> : <input name="att_date" type="date" id="att_date" style="background-color:#FFF;" class="form-control" size="10" value=<?php echo date('d-m-Y')?> /></td>
                            -->        
                                    <td valign="bottom" >
                                    <input type="submit" value="Go" class="butt" alt="Search" />
                                    <!--<input type="image" src="main_header.php/4/Go.png" alt="Search" onclick="javascript:exa_pop()"/>--></td>
                                  </tr>
								  
								  
                                </tbody>
                              </table>
                              </form>                                                            </td>
									</tr>
								</tbody>
							</table>
               
                            	 <form method="post" name="contact" autocomplete="off" action="time_db_update.php">
                 <input type="hidden" name="cls" value="<?php echo $sec=$_REQUEST['class1'];?>" /> -<?php 
							  $ss="SELECT * FROM  class  where id='$sec'";
							  $sql=mysqli_query($link,$ss);
							  $re=mysqli_fetch_array($sql);
							  
							  
							 echo $cname=$re['cname'];
							
	   
							 ?>
                            
							  <input type="hidden" name="sec1" value="<?php echo $sec1=$_REQUEST['section'];?>" />   -<?php
							   $ss="SELECT * FROM  section  where id='$sec1'";
							  $sql=mysqli_query($link,$ss);
							  $re=mysqli_fetch_array($sql);
							  
							  
							 echo $sname=$re['sname'];?>
							 <input type="hidden" name="med" value="<?php echo $sec2=$_REQUEST['medium'];?>" />-<?php echo $sec2?>
                 <table id="expense_table" width="100%" border="0" align="center">
                  <thead>
                
                 
                    <tr>
                      <th width="56">Period</th>
                      <th width="115">I</th>
                      <th width="120">II</th>
                      <th width="123">III</th>
                      <th width="121">IV</th>
                      <th width="101">V</th>
                      <th width="107">VI</th>
					  <th width="107">VII</th>
					  <th width="107">VIII</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
				   $a="select * from time_table1 where class='$sec' and section='$sec1' ";
				  $tst=mysqli_query($link,$a) or die(mysql_error());
				  while($t=mysqli_fetch_array($tst)){
				  $p1=$t['p1'];
				  $p2=$t['p2'];
				  $p3=$t['p3'];
				  $p4=$t['p4'];
				  $p5=$t['p5'];
				  $p6=$t['p6'];
				  $p7=$t['p7'];
				  $p8=$t['p8'];
				  $cd=$t['id'];
				  ?>
                    <tr>
					<td><input type="hidden" name="id[]" value="<?php echo $cd; ?>"/><?php echo $t['day']; ?></td>
					<td>
					<select name="p1[]" style="width:100px;">
                      <option value="">Select Subject</option>
					<?php 
					   
					  $sq=mysqli_query($link,"select * from addsub where class='$sec' ");
					  while($row=mysqli_fetch_array($sq)){
						  	$r= $row["subject"];
	?>
    
    <option value="<?php echo $r?>" <?php if($r==$p1){echo 'selected';} ?>><?php echo $r?></option>
    <?php }?>
	</select>
					</td>
					<td>
					<select name="p2[]" style="width:100px;">
                      <option value="">Select Subject</option>
					<?php 
					   
					  $sq=mysqli_query($link,"select * from addsub where class='$sec' ");
					  while($row=mysqli_fetch_array($sq)){
						  	$r= $row["subject"];
	?>
    
    <option value="<?php echo $r?>" <?php if($r==$p2){echo 'selected';} ?>><?php echo $r?></option>
    <?php }?>
	</select>
					</td>
					<td>
					<select name="p3[]" style="width:100px;">
                      <option value="">Select Subject</option>
					<?php 
					   
					  $sq=mysqli_query($link,"select * from addsub where class='$sec' ");
					  while($row=mysqli_fetch_array($sq)){
						  	$r= $row["subject"];
	?>
    
    <option value="<?php echo $r?>" <?php if($r==$p3){echo 'selected';} ?>><?php echo $r?></option>
    <?php }?>
	</select>
					</td>
					<td>
					<select name="p4[]" style="width:100px;">
                      <option value="">Select Subject</option>
					<?php 
					   
					  $sq=mysqli_query($link,"select * from addsub where class='$sec' ");
					  while($row=mysqli_fetch_array($sq)){
						  	$r= $row["subject"];
	?>
    
    <option value="<?php echo $r?>" <?php if($r==$p4){echo 'selected';} ?>><?php echo $r?></option>
    <?php }?>
	</select>
					</td>
					<td>
					<select name="p5[]" style="width:100px;">
                      <option value="">Select Subject</option>
					<?php 
					   
					  $sq=mysqli_query($link,"select * from addsub where class='$sec' ");
					  while($row=mysqli_fetch_array($sq)){
						  	$r= $row["subject"];
	?>
    
    <option value="<?php echo $r?>" <?php if($r==$p5){echo 'selected';} ?>><?php echo $r?></option>
    <?php }?>
	</select>
					</td>
					<td>
					<select name="p6[]" style="width:100px;">
                      <option value="">Select Subject</option>
					<?php 
					   
					  $sq=mysqli_query($link,"select * from addsub where class='$sec' ");
					  while($row=mysqli_fetch_array($sq)){
						  	$r= $row["subject"];
	?>
    
    <option value="<?php echo $r?>" <?php if($r==$p6){echo 'selected';} ?>><?php echo $r?></option>
    <?php }?>
	</select>
					</td>
					<td>
					<select name="p7[]" style="width:100px;">
                      <option value="">Select Subject</option>
					<?php 
					   
					  $sq=mysqli_query($link,"select * from addsub where class='$sec' ");
					  while($row=mysqli_fetch_array($sq)){
						  	$r= $row["subject"];
	?>
    
    <option value="<?php echo $r?>" <?php if($r==$p7){echo 'selected';} ?>><?php echo $r?></option>
    <?php }?>
	</select>
					</td>
					<td>
					<select name="p8[]" style="width:100px;">
                      <option value="">Select Subject</option>
					<?php 
					   
					  $sq=mysqli_query($link,"select * from addsub where class='$sec' ");
					  while($row=mysqli_fetch_array($sq)){
						  	$r= $row["subject"];
	?>
    
    <option value="<?php echo $r?>" <?php if($r==$p8){echo 'selected';} ?>><?php echo $r?></option>
    <?php }?>
	</select>
					</td>
					</tr>
<?php }?>
                  </tbody>
				  <input type="hidden" value="<?php echo $id ?>" name="tid" />
                  <tr>
                       <td colspan="7" align="center" ><input type="submit" name="submit" value="Update" class="button1" />          
                                      <a href="class_time.php" ><input type="button" name="submit" value="Close" class="button1" onclick="save(0)"  /></a>
                                  </td></tr>
                              </tr>
                </table>
                   
                </form>	
                            
                                       </div>
                                </div>
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
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="assets/js/dataTables.buttons.min.js"></script>
        <script src="assets/js/buttons.flash.min.js"></script>
        <script src="assets/js/buttons.html5.min.js"></script>
        <script src="assets/js/buttons.print.min.js"></script>
        <script src="assets/js/buttons.colVis.min.js"></script>
        <script src="assets/js/dataTables.select.min.js"></script>

        <!-- ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>
        <script type="text/javascript">
                                            jQuery(function ($) {
                                                //initiate dataTables plugin
                                                var myTable =
                                                        $('#dynamic-table')
                                                        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                                                        .DataTable({
                                                            bAutoWidth: false,
                                                            "aoColumns": [
                                                                {"bSortable": false},
                                                                 null,null,null,
                                                                {"bSortable": false}
                                                            ],
                                                            "aaSorting": [],

                                                            


                                                            select: {
                                                                style: 'multi'
                                                            }
                                                        });



                                                $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

                                                new $.fn.dataTable.Buttons(myTable, {
                                                    buttons: [
                                                        {
                                                            "extend": "colvis",
                                                            "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                                                            "className": "btn btn-white btn-primary btn-bold",
                                                            columns: ':not(:first):not(:last)'
                                                        },
                                                        {
                                                            "extend": "copy",
                                                            "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                                                            "className": "btn btn-white btn-primary btn-bold"
                                                        },
                                                        {
                                                            "extend": "csv",
                                                            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                                                            "className": "btn btn-white btn-primary btn-bold"
                                                        },
                                                        {
                                                            "extend": "excel",
                                                            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                                                            "className": "btn btn-white btn-primary btn-bold"
                                                        },
                                                        {
                                                            "extend": "pdf",
                                                            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                                                            "className": "btn btn-white btn-primary btn-bold"
                                                        },
                                                        {
                                                            "extend": "print",
                                                            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                                                            "className": "btn btn-white btn-primary btn-bold",
                                                            autoPrint: false,
                                                            message: 'This print was produced using the Print button for DataTables'
                                                        }
                                                    ]
                                                });
                                                myTable.buttons().container().appendTo($('.tableTools-container'));

                                                //style the message box
                                                var defaultCopyAction = myTable.button(1).action();
                                                myTable.button(1).action(function (e, dt, button, config) {
                                                    defaultCopyAction(e, dt, button, config);
                                                    $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
                                                });


                                                var defaultColvisAction = myTable.button(0).action();
                                                myTable.button(0).action(function (e, dt, button, config) {

                                                    defaultColvisAction(e, dt, button, config);


                                                    if ($('.dt-button-collection > .dropdown-menu').length == 0) {
                                                        $('.dt-button-collection')
                                                                .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                                                                .find('a').attr('href', '#').wrap("<li />")
                                                    }
                                                    $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
                                                });

                                                ////

                                                setTimeout(function () {
                                                    $($('.tableTools-container')).find('a.dt-button').each(function () {
                                                        var div = $(this).find(' > div').first();
                                                        if (div.length == 1)
                                                            div.tooltip({container: 'body', title: div.parent().text()});
                                                        else
                                                            $(this).tooltip({container: 'body', title: $(this).text()});
                                                    });
                                                }, 500);





                                                myTable.on('select', function (e, dt, type, index) {
                                                    if (type === 'row') {
                                                        $(myTable.row(index).node()).find('input:checkbox').prop('checked', true);
                                                    }
                                                });
                                                myTable.on('deselect', function (e, dt, type, index) {
                                                    if (type === 'row') {
                                                        $(myTable.row(index).node()).find('input:checkbox').prop('checked', false);
                                                    }
                                                });




                                                /////////////////////////////////
                                                //table checkboxes
                                                $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

                                                //select/deselect all rows according to table header checkbox
                                                $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function () {
                                                    var th_checked = this.checked;//checkbox inside "TH" table header

                                                    $('#dynamic-table').find('tbody > tr').each(function () {
                                                        var row = this;
                                                        if (th_checked)
                                                            myTable.row(row).select();
                                                        else
                                                            myTable.row(row).deselect();
                                                    });
                                                });

                                                //select/deselect a row when the checkbox is checked/unchecked
                                                $('#dynamic-table').on('click', 'td input[type=checkbox]', function () {
                                                    var row = $(this).closest('tr').get(0);
                                                    if (this.checked)
                                                        myTable.row(row).deselect();
                                                    else
                                                        myTable.row(row).select();
                                                });



                                                $(document).on('click', '#dynamic-table .dropdown-toggle', function (e) {
                                                    e.stopImmediatePropagation();
                                                    e.stopPropagation();
                                                    e.preventDefault();
                                                });



                                                //And for the first simple table, which doesn't have TableTools or dataTables
                                                //select/deselect all rows according to table header checkbox
                                                

                                                //select/deselect a row when the checkbox is checked/unchecked
                                                



                                                /********************************/
                                                //add tooltip for small view action buttons in dropdown menu
                                              

                                                //tooltip placement on right or left
                                                


                                                /***************/
                                               





                                                /**
                                                 //add horizontal scrollbars to a simple table
                                                 $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
                                                 {
                                                 horizontal: true,
                                                 styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
                                                 size: 2000,
                                                 mouseWheelLock: true
                                                 }
                                                 ).css('padding-top', '12px');
                                                 */


                                            })
        </script>
        <!-- inline scripts related to this page -->
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