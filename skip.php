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
    <script>

function showUser1(str)
{
if (str=="")
  {
  document.getElementById("comp1").innerHTML="";
  return;
  } 
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   // document.getElementById("country5").innerHTML=xmlhttp.responseText;
	//document.getElementById("country5").innerHTML=show;
	var show=xmlhttp.responseText;
	//alert(show);
	document.getElementById("subject").innerHTML=show;
	//document.getElementById("pname2").innerHTML=show;
	//document.getElementById("pname3").innerHTML=show;
	//document.getElementById("pname4").innerHTML=show;
	//document.location.reload();
    }
  }
xmlhttp.open("GET","get-sub.php?q="+str,true);
xmlhttp.send();
}
</script>

 


<script>
function showUser2(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	document.getElementById("max_marks").value=strar[1];
	//document.getElementById("roomrents").value=strar[2];
	
	
	
    }
  }
xmlhttp.open("GET","get-mark.php?q="+str,true);
xmlhttp.send();
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
                                <a href="#">Students Move Classes</a>
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
                                          Student Marks Entry
                                        </div>

                                        <!-- div.table-responsive -->

                                        <!-- div.dataTables_borderWrap -->
                                        <div>
                                       
                                       
                                       
                                       
                                       
                                        
                                        
                                        
                                         <form name="form1" method="post" action="" onsubmit="return fun1()">
                                                                <table class="mytable" border="0" cellspacing="0" cellpadding="3" width="100%">
                                                                    <tbody>
                                                                        <tr>
																		<td > <strong>Year</strong><font color="red">*</font> :
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
                                                    </td>
                                                                            <td ><strong>Class</strong> <font color="red">*</font>: 
                                                                  <select class="form-control" name="class1" id="class1" onChange="showUser1(this.value)">
                                    <option value="">--Select--</option>
                                                                                             <?php
										//include("config.php");
									
												$strSQL = mysqli_query($link,"SELECT * FROM  class limit 0,12 ");
												while($result=mysqli_fetch_array($strSQL))
												{
												 $class=$result['cname'];
												 $id=$result['id'];
												 
												  echo "<option value='$id'>$class</option>";
												
												
												
                                               }
											?>
                                             <input type="hidden" name="cls1" id="cls1" value="<?php echo "<option value='$id'>$class</option>";?>">
                                           
                                  </select>                                    </td> </tr>
								  <tr><td><br></td></tr>
								  <tr>
                                    
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
                                   
                                            
                                    
                                    <td valign="bottom" width="8%">
                                    <input type="submit" name="submit1" value="Go" id="submit1" class="button1" />
                                    <!--<input type="image" src="main_header.php/4/Go.png" alt="Search" onclick="javascript:exa_pop()"/>--></td>
                                  </tr>
								  
								  
                                </tbody>
                              </table>
                              </form>                                                            </td>
									
 <form name="myform" id="form_id" method="post" action="skip_move.php" autocomplete="off">
                        
		          <table border="0" cellpadding="0" cellspacing="0" class="expense_table" id="expense_table" width="100%">
                  <tr><td colspan="4"><hr></td></tr>
                      <tr>
                            <th >
                                <div align="left">
								<input type="hidden" name="acdyear" value="<?php echo $acdyear=$_REQUEST['acdyear'];?>" /><?php echo $acdyear=$_REQUEST['acdyear'];?>-
								<input type="hidden" name="class2" value="<?php echo $sec=$_REQUEST['class1'];?>" /><?php
								
								
								
								
								 echo $sec=$_REQUEST['class1'];?> - 
                                   
                                    <input type="hidden" name="sect2" value="<?php echo $sec1=$_REQUEST['section'];?>" /><?php echo $sec1=$_REQUEST['section'];?>-
                                    <input type="hidden" name="med2" value="<?php echo $sec2=$_REQUEST['medium'];?>" /><?php echo $sec2=$_REQUEST['medium'];?>
                                    
                                </div>
                            </th>
                            <th colspan="2">
                                <div align="left">
                                   <input type="hidden" name="all" id="all" value="Present" onclick="checkAll(true)"/>
                                    <script language="javascript" type="text/javascript">
                                        /*checked = false;
                                        function checkAll()
                                        {
                                         var cc=document.getElementById("count").value;
                                         //alert(cc);
                                        if (checked == false){checked = true}else{checked = false}
                                                //for (var i = 0; i < document.getElementById('myform').elements.length; i++) {
                                                document.getElementById('am').checked = checked;
                                                document.getElementById('am').value="present";
                                                
                                        }*/
                                         function checkAll(check) {
                                             
                                        var cc=document.getElementById("yes").value;
                                         //alert(cc);
                                            for (i=0;i<cc;i++) {
                                                if (check) { 
                                                    //document.forms['myform'].am[i].checked=true;
                                                    document.getElementById('yes'+i).checked=true;
                                                    //document.getElementById('amp'+i).value="present";
                                                   // document.getElementById('pmt'+i).checked=true;
                                                    //document.forms['myform'].pm[i].checked=true;
                                                   // document.getElementById('pmp'+i).value="present";
                                                    }
                                                else {
													 document.getElementById('yes'+i).checked=false;
                                                   // document.forms['myform'].selector[i].checked=false;
                                                   // document.forms['myform'].pmt[i].checked=false;
                                                    }
                                                }
                                            }
                                            checked = false;
                                           function ams(d)
                                           {
                                               //alert(d);
                                               if (checked == false){checked = true;ss="absent";}else{checked = false;ss="present";}
                                              for (var i = 0; i < document.getElementById('yes').length; i++) {
                                              document.getElementById('yes'+d).value=ss;
                                              }
                                           }
                                            checkes = false;
                                           function pms(k)
                                           {
                                               //alert(k);
                                               if (checkes == false){checkes = true;ss="absent";}else{checkes = false;ss="present";}
                                              for (var i = 0; i < document.getElementById('yes').length; i++) {
                                              document.getElementById('yes'+k).value=ss;
                                              }
                                           }
                                        </script>
                                </div>
                            </th>
                            <th colspan="2"> </th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                      <td><strong>Move Class</strong></td>
                      <td>
                      <select name="toclass" style="width:188px;height:25px;" required>
                                                            <option value="">--Select--</option>
                                                                 <?php
																

												$strSQL = mysqli_query($link,"SELECT DISTINCT cname,id FROM  class where id!='$sec' ");
												while($result=mysqli_fetch_array($strSQL))
												{
												$class2=$result['cname'];
												$idc=$result['id'];
												echo "<option value='$idc'>$class2</option>";
                                               }
											?>
                                                        </select>
                      </td>
                      <td><strong>Move Year</strong></td>
                      <td>
                      <select name="toyear" style="width:188px;height:25px;" required>
                                                            <option value="">--Select--</option>
                                                                 <?php
															

												$strSQL = mysqli_query($link,"SELECT DISTINCT year,id FROM  acyear ");
												while($result=mysqli_fetch_array($strSQL))
												{
												$class2=$result['year'];
												$idy=$result['id'];
												echo "<option value='$idy'>$class2</option>";
                                               }
											?>
                                                        </select>
                      </td>
                      </tr>
                      <tr><td colspan="4"><hr></td></tr>
                      
                        <tr>
                            <td width="10%" align="center" bgcolor="#fcfaf7"><strong>RollNo</strong></td>
                            <td width="24%" align="center" bgcolor="#fcfaf7"><strong>Stu. Name</strong></td>
                            
                           
                          <td width="23%" align="center" bgcolor="#fcfaf7" colspan="1"><strong>Mobile No</strong></td>
                          <td width="23%" align="center" bgcolor="#fcfaf7" colspan="1"><strong>Admission No</strong></td>
              <!--            <td width="25%" align="center" bgcolor="#fcfaf7"><strong>Report</strong></td>-->
                        </tr>
                        
<input type="hidden" name="count" id="count" value="0"/>
                        
  <?php
						 $val1=$_POST['acdyear'];
						
						 $val2=$_POST['class1'];
						 $val3=$_POST['section'];
						$val4=$_POST['test'];
							$val6=$_POST['att_date'];
							$val5=date('Y-m-d',strtotime($val6));
						 $strSQL2 = "SELECT * FROM  student_register WHERE  acyear='$val1' and class='$val2' and section='$val3' and medium='$sec2'";

                              //$rs = mysql_query($strSQL);
							 $res=mysqli_query($link,$strSQL2) ;
		$cnt = mysqli_num_rows($res);
		if($cnt > 0){
	for($i = 0;$i < $cnt; $i++){
		$row1[]=mysqli_fetch_array($res);
	}
		foreach($row1 as $row){
	
								$rnum= $row['rollno'];
							    $fname=$row['sname'];
							    $phone=$row['phoneno'];
							   $Admission_No=$row['admno'];
?>
                            
                            
                             <tr>
							 <td><input type="text" readonly name="r_num[]" id="r_num" value="<?php echo $rnum?> " /></td>
							 <td><input type="text" readonly name="name[]" id="name" value="<?php echo $fname?> "  /></td>
							 
							 <td colspan="1"><input type="text" readonly name="phone[]" id="phone" value="<?php echo $phone?> " />
                            </td><td> <input type="text" readonly name="admission[]" id="admission" value="<?php echo $Admission_No?> " /></td>
								</tr>	
		<?php }?>
							
							 	
						<?php } ?>
                            
                           
                            <tr>
                                    <td colspan="4" align="center"><input type="hidden" name="cnt" value="<?php echo $cnt?>" /><input type="submit" name="submit1" class="button1"  value="MOVE"/>&nbsp;&nbsp;<input type="button" class="button1" name="Close" value="CLOSE" /></td>
                                </tr>

                      </tbody>
                    </table>
                        </form>
				 
			
                <script type="text/javascript">
    function paying(pay)
    {
        var amt=document.getElementById("max").value;
        if(amt=='' || amt==null){amt=0;}
        if(pay=='' || pay==null){pay=0;}
        if(eval(pay)>eval(amt))
            {
                alert("Maximum Marks is not greater than Student get marks");
                document.getElementById("marks").value="";
                //document.getElementById("pay").value=eval(amt).toFixed(2);
                return false;
            }
        //var sum=0;
        //sum=eval(amt)-eval(pay);
        //document.getElementById("sxy").value=eval(sum).toFixed(2);
    }
</script>  
                            
          <script type="text/javascript">
    function paying1(pay)
    {
        var amt=document.getElementById("max1").value;
        if(amt=='' || amt==null){amt=0;}
        if(pay=='' || pay==null){pay=0;}
        if(eval(pay)>eval(amt))
            {
                alert("Maximum Marks is not greater than Student get marks");
                document.getElementById("marks").value="";
                //document.getElementById("pay").value=eval(amt).toFixed(2);
                return false;
            }
        //var sum=0;
        //sum=eval(amt)-eval(pay);
        //document.getElementById("sxy").value=eval(sum).toFixed(2);
    }
</script>  

 <script type="text/javascript">
    function paying1(pay)
    {
        var amt=document.getElementById("max1").value;
        if(amt=='' || amt==null){amt=0;}
        if(pay=='' || pay==null){pay=0;}
        if(eval(pay)>eval(amt))
            {
                alert("Maximum Marks is not greater than Student get marks");
                document.getElementById("marks").value="";
                //document.getElementById("pay").value=eval(amt).toFixed(2);
                return false;
            }
        //var sum=0;
        //sum=eval(amt)-eval(pay);
        //document.getElementById("sxy").value=eval(sum).toFixed(2);
    }
</script>                                   
             <script type="text/javascript">
    function paying2(pay)
    {
        var amt=document.getElementById("max1").value;
        if(amt=='' || amt==null){amt=0;}
        if(pay=='' || pay==null){pay=0;}
        if(eval(pay)>eval(amt))
            {
                alert("Maximum Marks is not greater than Student get marks");
                document.getElementById("marks1").value="";
                //document.getElementById("pay").value=eval(amt).toFixed(2);
                return false;
            }
        //var sum=0;
        //sum=eval(amt)-eval(pay);
        //document.getElementById("sxy").value=eval(sum).toFixed(2);
    }
</script>  
  <script type="text/javascript">
    function paying3(pay)
    {
        var amt=document.getElementById("max1").value;
        if(amt=='' || amt==null){amt=0;}
        if(pay=='' || pay==null){pay=0;}
        if(eval(pay)>eval(amt))
            {
                alert("Maximum Marks is not greater than Student get marks");
                document.getElementById("marks2").value="";
                //document.getElementById("pay").value=eval(amt).toFixed(2);
                return false;
            }
        //var sum=0;
        //sum=eval(amt)-eval(pay);
        //document.getElementById("sxy").value=eval(sum).toFixed(2);
    }
</script>  
  <script type="text/javascript">
    function paying4(pay)
    {
        var amt=document.getElementById("max1").value;
        if(amt=='' || amt==null){amt=0;}
        if(pay=='' || pay==null){pay=0;}
        if(eval(pay)>eval(amt))
            {
                alert("Maximum Marks is not greater than Student get marks");
                document.getElementById("marks3").value="";
                //document.getElementById("pay").value=eval(amt).toFixed(2);
                return false;
            }
        //var sum=0;
        //sum=eval(amt)-eval(pay);
        //document.getElementById("sxy").value=eval(sum).toFixed(2);
    }
</script>                               </div>
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