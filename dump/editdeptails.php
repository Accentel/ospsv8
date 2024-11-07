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
 $q="select * from dept where DEPT_CODE='$empid'";
$qry= mysqli_query($link, $q) or die(mysql_error());
$emprs= mysqli_fetch_assoc($qry);
$d=$emprs['UDEPT_CODE'];
$d1=$emprs['LOC'];
?>
<form class="form-horizontal" id="validation-form" role="form" method="post" action="deptdetails.php" novalidate autocomplete="off">
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Department Name </label>

                                        <div class="col-sm-8">
                                            <input type="text" required id="empdeptname" name="empdeptname" required placeholder="Hospital Deptname Name" class=" form-control col-xs-10 col-sm-5" value="<?php echo $emprs['DEPT_NAME']; ?>" /> 
                                            <input type="hidden" required id="user" name="user" required  class=" form-control col-xs-10 col-sm-5" value="<?php echo $user_check; ?>" /> 
                                            <input type="hidden" required id="id" name="id" required placeholder="Emp Deptname Name" class="col-xs-10 col-sm-5" value="<?php echo $emprs['DEPT_CODE']; ?>" />  
                                        </div>

                                    </div>
                                    
                                        <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Main Department</label>

                                        <div class="col-sm-8">
                                            <select required id="deptname" name="deptname" class=" form-control col-xs-10 col-sm-5" >
                                                <option value="">Select Dept Name</option>
                                                <?php
                                                $q="select * from department";
                                                $rste= mysqli_query($link, $q) or die(mysqli_error($link));
                                                while($tt= mysqli_fetch_assoc($rste)){
                                                ?>
                                                <option value="<?php echo $tt['d_id'] ?>" <?php if($tt['d_id']==$d){ echo 'selected';} ?>><?php echo $tt['dname'] ?></option>
                                                <?php }?>
                                            </select>
                                            
                                            
                                        </div>

                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Location</label>

                                        <div class="col-sm-8">
                                            <select required id="location" name="location" class=" form-control col-xs-10 col-sm-5" >
                                                <option value="">Select Location Name</option>
                                                <?php
                                                $q="select * from location";
                                                $rste= mysqli_query($link, $q) or die(mysqli_error($link));
                                                while($tt= mysqli_fetch_assoc($rste)){
                                                ?>
                                                <option value="<?php echo $tt['FLOOR_CODE'] ?>" <?php if($tt['FLOOR_CODE']==$d1){ echo 'selected';} ?>><?php echo $tt['FLOOR_NAME'] ?></option>
                                                <?php }?>
                                            </select>
                                            
                                            
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