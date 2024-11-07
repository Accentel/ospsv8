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

<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
  <script type="text/javascript">
$(document).ready(function()
{
	
$(".country").change(function()
{
var dataString = 'id='+ $(this).val();
$.ajax
({
type: "POST",
url: "search10.php",
data: dataString,
cache: false,
success: function(html)
{
$(".state").html(html);
} 
});

});

});
</script>
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
                                <a href="#">Student Attendence Graph</a>
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
                                          Student Attendance Graph
                                        </div>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
			
<?php
include('dbconnection/connection.php');
if(isset($_POST['submit'])){
  $class=$_POST['class'];
  $roll=$_POST['roll'];
  $year=$_POST['year'];
  $year1=$_POST['year1'];
}

  
  
  $sq1=mysqli_query($link,"select * from working_month where  year='$year1' and month='June' ");
while($re=mysqli_fetch_array($sq1)){
 $days1=$re['days'];
$mnt=$re['month'];
}
$sq=mysqli_query($link,"select * from attendence where class1='$class' and sect1='$year' and rnum='$roll' and month=06 ");
  $cnt1=mysqli_num_rows($sq);
while($re=mysqli_fetch_array($sq)){
$name=$re['name1'];
}
 $maximumPoints1  = $days1;
  $percentage = round(($cnt1)*100/$maximumPoints1);
  
    $sq1=mysqli_query($link,"select * from working_month where  year='$year1' and month='July' ");
while($re=mysqli_fetch_array($sq1)){
 $days2=$re['days'];
$mnt=$re['month'];
}
$sq=mysqli_query($link,"select * from attendence where class1='$class' and sect1='$year' and rnum='$roll' and month=07 ");
  $cnt2=mysqli_num_rows($sq);
while($re=mysqli_fetch_array($sq)){
$name=$re['name1'];
}
 $maximumPoints2  = $days2;
  $percentage1 = round(($cnt2)*100/$maximumPoints2);
  
  $sq1=mysqli_query($link,"select * from working_month where  year='$year1' and month='Aug' ");
while($re=mysqli_fetch_array($sq1)){
 $days3=$re['days'];
$mnt=$re['month'];
}
$sq=mysqli_query($link,"select * from attendence where class1='$class' and sect1='$year' and rnum='$roll' and month=08 ");
  $cnt3=mysqli_num_rows($sq);
while($re=mysqli_fetch_array($sq)){
$name=$re['name1'];
}
 $maximumPoints3  = $days3;
  $percentage3 = round(($cnt3)*100/$maximumPoints3);
  
  $sq1=mysqli_query($link,"select * from working_month where  year='$year1' and month='Sept' ");
while($re=mysqli_fetch_array($sq1)){
 $days4=$re['days'];
$mnt=$re['month'];
}
$sq=mysqli_query($link,"select * from attendence where class1='$class' and sect1='$year' and rnum='$roll' and month=09 ");
  $cnt4=mysqli_num_rows($sq);
while($re=mysqli_fetch_array($sq)){
$name=$re['name1'];
}
 $maximumPoints4  = $days4;
  $percentage4 = round(($cnt4)*100/$maximumPoints4);
  
  $sq1=mysqli_query($link,"select * from working_month where  year='$year1' and month='Oct' ");
while($re=mysqli_fetch_array($sq1)){
 $days5=$re['days'];
$mnt=$re['month'];
}
$sq=mysqli_query($link,"select * from attendence where class1='$class' and sect1='$year' and rnum='$roll' and month=10 ");
  $cnt5=mysqli_num_rows($sq);
while($re=mysqli_fetch_array($sq)){
$name=$re['name1'];
}
 $maximumPoints5  = $days5;
  $percentage5 = round(($cnt5)*100/$maximumPoints5);
  
  $sq1=mysqli_query($link,"select * from working_month where  year='$year1' and month='Nov' ");
while($re=mysqli_fetch_array($sq1)){
 $days6=$re['days'];
$mnt=$re['month'];
}
$sq=mysqli_query($link,"select * from attendence where class1='$class' and sect1='$year' and rnum='$roll' and month=11 ");
  $cnt6=mysqli_num_rows($sq);
while($re=mysqli_fetch_array($sq)){
$name=$re['name1'];
}
 $maximumPoints6  = $days6;
  $percentage6 = round(($cnt6)*100/$maximumPoints6);
  
  
  
   $sq1=mysqli_query($link,"select * from working_month where  year='$year1' and month='Dec' ");
while($re=mysqli_fetch_array($sq1)){
 $days7=$re['days'];
$mnt=$re['month'];
}
$sq=mysqli_query($link,"select * from attendence where class1='$class' and sect1='$year' and rnum='$roll' and month=12 ");
  $cnt7=mysqli_num_rows($sq);
while($re=mysqli_fetch_array($sq)){
$name=$re['name1'];
}
 $maximumPoints7  = $days7;
  $percentage7 = round(($cnt7)*100/$maximumPoints7);
  
  $sq1=mysqli_query($link,"select * from working_month where  year='$year1' and month='Jan' ");
while($re=mysqli_fetch_array($sq1)){
  $days=$re['days'];
$mnt=$re['month'];
}
$sq=mysqli_query($link,"select * from attendence where class1='$class' and sect1='$year' and rnum='$roll' and month=01 ");
   $cnt=mysqli_num_rows($sq);
while($re=mysqli_fetch_array($sq)){
$name=$re['name1'];
}
 $maximumPoints  = $days;
  $percentage8 = round(($cnt)*100/$maximumPoints);
  
  $sq1=mysqli_query($link,"select * from working_month where  year='$year1' and month='Feb' ");
while($re=mysqli_fetch_array($sq1)){
 $days9=$re['days'];
$mnt=$re['month'];
}
$sq=mysqli_query($link,"select * from attendence where class1='$class' and sect1='$year' and rnum='$roll' and month=02 ");
  $cnt9=mysqli_num_rows($sq);
while($re=mysqli_fetch_array($sq)){
$name=$re['name1'];
}
 $maximumPoints9  = $days9;
  $percentage9 = round(($cnt9)*100/$maximumPoints9);
  
  $sq1=mysqli_query($link,"select * from working_month where  year='$year1' and month='Mar' ");
while($re=mysqli_fetch_array($sq1)){
 $days10=$re['days'];
$mnt=$re['month'];
}
$sq=mysqli_query($link,"select * from attendence where class1='$class' and sect1='$year' and rnum='$roll' and month=03 ");
  $cnt10=mysqli_num_rows($sq);
while($re=mysqli_fetch_array($sq)){
$name=$re['name1'];
}
 $maximumPoints10  = $days10;
  $percentage10 = round(($cnt10)*100/$maximumPoints10);
  
   $sq1=mysqli_query($link,"select * from working_month where  year='$year1' and month='Apr' ");
while($re=mysqli_fetch_array($sq1)){
 $days11=$re['days'];
$mnt=$re['month'];
}
$sq=mysqli_query($link,"select * from attendence where class1='$class' and sect1='$year' and rnum='$roll' and month=04 ");
  $cnt11=mysqli_num_rows($sq);
while($re=mysqli_fetch_array($sq)){
$name=$re['name1'];
}
 $maximumPoints11  = $days11;
  $percentage11 = round(($cnt11)*100/$maximumPoints11);
  
   $sq1=mysqli_query($link,"select * from working_month where  year='$year1' and month='May' ");
while($re=mysqli_fetch_array($sq1)){
 $days12=$re['days'];
$mnt=$re['month'];
}
$sq=mysqli_query($link,"select * from attendence where class1='$class' and sect1='$year' and rnum='$roll' and month=05 ");
  $cnt12=mysqli_num_rows($sq);
while($re=mysqli_fetch_array($sq)){
$name=$re['name1'];
}
 $maximumPoints12  = $days12;
  $percentage12 = round(($cnt12)*100/$maximumPoints12);
  
	/*
	 * This file is ready to run as standalone example. However, please do:
	 * 1. Add tags <html><head><body> to make a complete page
	 * 2. Change relative path in $KoolControlFolder variable to correctly point to KoolControls folder 
	 */

	//$KoolControlsFolder = "KoolControls";//Relative path to "KoolPHPSuite/KoolControls" folder
	
	//require $KoolControlsFolder."KoolChart/koolchart.php";
	
	
	
							  $ss="select * from acyear where id='$year1'";
							  $sql=mysqli_query($link,$ss);
							  $re=mysqli_fetch_array($sql);
							  
							  
							   $year=$re['year'];
							    $ss="SELECT * FROM  class  where id='$class'";
							  $sql=mysqli_query($link,$ss);
							  $re=mysqli_fetch_array($sql);
							  
							  
							  $cname=$re['cname'];
							  $ss="SELECT * FROM  section  where id='$sect'";
							  $sql=mysqli_query($link,$ss);
							  $re=mysqli_fetch_array($sql);
							  
							  
							  $sname=$re['sname'];
	
	
	include("KoolChart/koolchart.php");

	$chart = new KoolChart("chart");
	$chart->scriptFolder=$KoolControlsFolder."KoolChart";	
	$chart->Title->Text = "Attendence Report-Year -$year-roll num- $roll --class- $cname";
	$chart->Width = 820;
	$chart->Height = 500;
	//$chart->BackgroundColor = "#ffffee";
	$chart->PlotArea->XAxis->Title = "";
	$chart->PlotArea->XAxis->Set(array("Jun","Jul","Aug","Sept","Oct","Nov","Dec","Jan","Feb","Mar","Apr","May"));
	$chart->PlotArea->YAxis->Title = "Max Attendence 100 ";
	$chart->PlotArea->YAxis->LabelsAppearance->DataFormatString = "{0} %";
   
	$series = new ColumnSeries();
	$series->Name = "$name"."---"."Attendence Persntage 100%";
	$series->TooltipsAppearance->DataFormatString = "{0} % ";
	$series->ArrayData(array($percentage,$percentage1,$percentage3,$percentage4,$percentage5,$percentage6,$percentage7,$percentage8,$percentage9,$percentage10,$percentage11,$percentage12));
	$chart->PlotArea->AddSeries($series);
    
	//$series = new ColumnSeries();
	//$series->Name = "Computers";
	//$series->TooltipsAppearance->DataFormatString = "$ {0} millions";
	//$series->ArrayData(array(34,55,10,40));
	//$chart->PlotArea->AddSeries($series);
    
	//$series = new ColumnSeries();
	//$series->Name = "Tablets & e-readers";
	//$series->TooltipsAppearance->DataFormatString = "$ {0} millions";
	//$series->ArrayData(array(56,23,56,80));
	//$chart->PlotArea->AddSeries($series);
?>

<form id="form1" method="post">

	<?php echo $chart->Render();?>					
	
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