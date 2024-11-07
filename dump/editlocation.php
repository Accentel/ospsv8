<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//include './template/headerfile.php';
include'dbconnection/connection.php';
include 'dbconnection/check.php';
 $empid=$_REQUEST['empid'];
 $q="select * from location where FLOOR_CODE='$empid'";
$qry= mysqli_query($link, $q) or die(mysql_error());
$emprs= mysqli_fetch_assoc($qry);
?>
<form class="form-horizontal" id="validation-form" role="form" method="post" action="location.php" novalidate autocomplete="off">
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Location Name </label>

                                        <div class="col-sm-8">
                                            <input type="text" required id="empdeptname" name="lname" required placeholder="Location Name" class=" form-control col-xs-10 col-sm-5" value="<?php echo $emprs['FLOOR_NAME']; ?>" /> 
                                            <input type="hidden" required id="id" name="id" required placeholder="Emp Deptname Name" class="col-xs-10 col-sm-5" value="<?php echo $emprs['FLOOR_CODE']; ?>" />  
                                        </div><input type="hidden" required id="user" name="user" required placeholder="Emp Deptname Name" class="col-xs-10 col-sm-5" value="<?php echo $user_check; ?>" />  

                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Remarks </label>

                                        <div class="col-sm-8">
                                            <textarea name="remarks" id="remarks" class="form-control"><?php echo $emprs['REMARKS']; ?></textarea>
                                        </div>

                                    </div>
                                    
                                    

                                    
                                    
                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="update" id="update">
                                                <i class="ace-icon fa fa-upload bigger-110"></i>
                                                Update
                                            </button>

                                           
                                            
                                            &nbsp; &nbsp; &nbsp;
                                            <a href="location.php"><button class="btn btn-danger" type="button">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button>
                                            </a>
                                        </div>
                                    </div>
                                </form>