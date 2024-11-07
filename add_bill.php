<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';
//include'dbfiles/iqry_acyear.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
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
                                <a href="#">Add Billing</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                 
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Add Billing

                            </h1>
                            </div>
                            <div class="row">
                            
                            
                          <form name="frm" method="post" action=""> 
                           <table width="100%" style="margin-left:5%;"><tr><td><strong>Location</strong><select name="location" class="form-control" required>
                            <option value="">Select Location</option>
                           <?php $sq=mysqli_query($link,"select * from location order by id desc");
						   while($r=mysqli_fetch_array($sq)){?>
                            <option value="<?php echo $r['id'];?>"><?php echo $r['lname'];?></option>
                        <?php }?>
                            </select></td><td>
                            
                            <strong>Template Type</strong><select name="temp"  class="form-control" required>
                            <option value="">Select Template</option>
                           <?php $sq=mysqli_query($link,"select distinct category from products");
						   while($r=mysqli_fetch_array($sq)){?>
                            <option value="<?php echo $r['category'];?>"><?php echo $r['category'];?></option>
                        <?php }?>
                            </select></td>
                            <td></td>
                            <td>
                            <input type="submit" name="submit1" class="btn btn-info" value="GO"></td></tr></table></form>
                        </div>
                        
                        <!-- PAGE CONTENT BEGINS -->

 <form name="frm" method="post" action="bill1.php">  <div class="page-content">
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                       

                                         <?php if(isset($_POST['submit1'])){
 $location=$_POST['location'];
 $temp=$_POST['temp'];	
?>
         <?php $sq=mysqli_query($link,"select * from location order by id desc");
						   while($r2=mysqli_fetch_array($sq));
						   $loc=$r2['lname'];
						   ?>                                <div class="table-header">
                                         Items  List  - <?php echo $loc;?> - <?php echo $temp?> 
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

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                        <input type="hidden" name="loc" value="<?php echo $location?>">
                                         <input type="hidden" name="temp" value="<?php echo $temp?>">
                                            <table id="dynamic-table1" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
                                                        <th>S No</th>
                                                        <th>Category</th>
                                                        <th>Item Code</th>
                                                        <th>Item Description</th>
                                                        <th>Primary UOM Code</th>
                                                        <th>List Price Per Unit</th>
                                                        <th>HSN</th>
                                                        <th>SAC</th>
                                                        <th>Item Category</th>
                                                        
                                                      
                                                       <th></th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                               
                                                
                                                    <?php
                                                    $q="select * from products where location='$location' and category='$temp'";
                                                    $rs= mysqli_query($link, $q) or die(mysqli_error());
                                                    $i=1;
                                                    while($rs1= mysqli_fetch_array($rs)){
                                                    
                                                    ?>
                                                    <tr>
                                                        
<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" value="<?php echo $rs1['id'];?>" name="id[]" />
																<span class="lbl"></span>
															</label>
														</td>
                                                        <td><?php echo $i; ?></td>
                                                       
                                                      
                                                       
                                                        <td class="hidden-480"><?php echo $rs1['category']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['item_code']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['item_desc']; ?></td>
                                                        
                                                        <td class="hidden-480"><?php echo $rs1['primary_uom']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['price_unit']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['hsn']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['sac']; ?></td>
                                                        <td class="hidden-480"><?php echo $rs1['item_category']; ?></td>
                                                       
                                                       
                                                    </tr>
                                                    <?php $i++; } ?>
                                                    
                                                    
                                                </tbody>
                                            </table>
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
                                    </div><?php }?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
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
                                                                 null,null,null,null,null,null,null,null,
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
        </script><!-- inline scripts related to this page -->
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