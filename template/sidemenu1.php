<?php
include("../dbconnection/connection.php");
if($name != "admin"){
$emp_id = $name;
	
$r=mysqli_query($link,"select empname from admin_login where user='$emp_id'") or die(mysqli_error($link));
$row=mysqli_fetch_array($r);
  $empname=$row['empname'];	
	$p="SELECT D.menus FROM hr_user as D,admin_login as M  WHERE D.emp_id=M.empname and D.emp_id='$empname' ";
$sql = mysqli_query($link,$p) or die(mysqli_error($link));
if($sql){
$i=0;
while($row = mysqli_fetch_array($sql)){
  $menu= $row[0];
	if($menu == "2"){$menu2="2";}
	if($menu == "21"){$menu21="21";}
	if($menu == "22"){$menu22="22";}
	if($menu == "23"){$menu23="23";}
	if($menu == "24"){$menu24="24";}
	if($menu == "25"){$menu25="25";}
	if($menu == "26"){$menu26="26";}
	
	
	if($menu == "3"){$menu3="3";}
	if($menu == "31"){$menu31="31";}
	if($menu == "32"){$menu32="32";}
	if($menu == "33"){$menu33="33";}
	if($menu == "34"){$menu34="34";}
	
	if($menu == "4"){$menu4="4";}
	if($menu == "41"){$menu41="41";}
	if($menu == "42"){$menu42="42";}
	if($menu == "43"){$menu43="43";}
	if($menu == "44"){$menu44="44";}
	if($menu == "45"){$menu45="45";}
	if($menu == "46"){$menu46="46";}
	if($menu == "47"){$menu47="47";}
	if($menu == "48"){$menu48="48";}
	if($menu == "49"){$menu49="49";}
	if($menu == "410"){$menu410="410";}
	if($menu == "4110"){$menu4110="4110";}
	if($menu == "411"){$menu411="411";}
	if($menu == "412"){$menu412="412";}
	if($menu == "413"){$menu413="413";}
	if($menu == "414"){$menu414="414";}
	if($menu == "415"){$menu415="415";}
	if($menu == "416"){$menu416="416";}
	if($menu == "417"){$menu417="417";}
	if($menu == "418"){$menu418="418";}
		
	
	if($menu == "5"){$menu5="5";}
	if($menu == "51"){$menu51="51";}
	if($menu == "52"){$menu52="52";}
	if($menu == "53"){$menu53="53";}
	if($menu == "54"){$menu54="54";}
	if($menu == "55"){$menu55="55";}
	if($menu == "57"){$menu57="57";}
	
	if($menu == "6"){$menu6="6";}
	if($menu == "7"){$menu7="7";}
	if($menu == "71"){$menu71="71";}
		if($menu == "72"){$menu72="72";}
		if($menu == "73"){$menu73="73";}
		if($menu == "74"){$menu74="74";}
		
	if($menu == "8"){$menu8="8";}
	if($menu == "81"){$menu81="81";}
	if($menu == "82"){$menu82="82";}
	if($menu == "83"){$menu83="83";}
	if($menu == "84"){$menu84="84";}
	if($menu == "85"){$menu85="85";}
		
			if($menu == "9"){$menu9="9";}
	if($menu == "91"){$menu91="91";}
	if($menu == "92"){$menu92="92";}
	if($menu == "93"){$menu93="93";}
	if($menu == "94"){$menu94="94";}
	if($menu == "95"){$menu95="95";}
		if($menu == "100"){$menu100="100";}
	if($menu == "101"){$menu101="101";}
	if($menu == "102"){$menu102="102";}
	if($menu == "103"){$menu103="103";}
		
	//goa
	
	if($menu == "12"){$menu12="12";}
	if($menu == "114"){$menu114="114";}
	if($menu == "115"){$menu115="115";}
	if($menu == "116"){$menu116="116";}
	if($menu == "131"){$menu131="131";}
	if($menu == "132"){$menu132="132";}
	
	if($menu == "133"){$menu133="133";}
	if($menu == "134"){$menu134="134";}
	if($menu == "135"){$menu135="135";}
	if($menu == "75"){$menu75="75";}	
}
}
	
?>	
	
<ul class="nav nav-list">
				<li class="">
						<a href="dashboard.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if($menu2 == "2"){ ?>	 <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text">
								Settings
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
					<?php if($menu21 == "21"){ ?>	<li class="">
								<a href="organization.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Update Organization
								</a>

								
							</li><?php }?>
							
						<?php if($menu22 == "22"){ ?>	<li class="">
								<a href="addemployee.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Employee
								</a>

								
							</li><?php }?>
							<?php if($menu23 == "23"){ ?><li class="">
								<a href="location.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Locations
								</a>
			
							</li><?php }?>
							
							
                            
                           
						</ul>
					</li>
 <?php } ?>
                         <?php if($menu3 == "3"){ ?> <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text">
								Ap & TS Billing
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						   
						<?php if($menu24 == "24"){ ?><li class="">
								<a href="acyear.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Upload Products
								</a>
			
							</li><?php }?>
                            
							
							<?php if($menu25 == "25"){ ?><li class="">
								<a href="addrefferno.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 UploadDPR
								</a>
			
							</li><?php }?>
							
							
							
							
                             <?php if($menu26 == "26"){ ?><li class="">
								<a href="reffer_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add DPR
								</a>
			
							</li><?php }?>


						   
                          <?php if($menu31 == "31"){ ?>  <li class="">
								<a href="addbill.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Billing
								</a>
			
							</li><?php }?>

							 <?php if($menu32 == "32"){ ?>  <li class="">
								<a href="bill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 Billing List
								</a>
			
							</li><?php }?>

							<?php if($menu33 == "33"){ ?> <!-- <li class="">
								<a href="ebill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 Edit Bills
								</a>
			
							</li>--><?php }?>

							<?php if($menu34 == "34"){ ?>  <li class="">
								<a href="pbill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 Billing Prints List
								</a>
			
							</li><?php }?>

							

							

							
						</ul>
					</li>              
						 <?php }?>           
                                 




					<?php if($menu5 == "5"){ ?> 
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text">
								Maharashtra Billing
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						   
						<?php if($menu51 == "51"){ ?><li class="">
								<a href="muploadproducts.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Upload Products
								</a>
			
							</li><?php }?>
                            
							
							<?php if($menu52 == "52"){ ?><li class="">
								<a href="addmrefferno.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 UploadDPR
								</a>
			
							</li><?php }?>
							
							
							
							
                             <?php if($menu53 == "53"){ ?><li class="">
								<a href="mreffer_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add DPR
								</a>
			
							</li><?php }?>


						   
                          <?php if($menu54 == "54"){ ?>  <li class="">
								<a href="addmbill.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Billing
								</a>
			
							</li><?php }?>

							 <?php if($menu55 == "55"){ ?>  <li class="">
								<a href="mbill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 Billing List
								</a>
			
							</li><?php }?>

							<?php if($menu57 == "57"){ ?>  <li class="">
								<a href="pmbill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 Billing Prints List
								</a>
			
							</li><?php }?>

					</ul>
					</li>              
						 <?php }?> 








					<?php if($menu8 == "8"){ ?> 
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text">
								Gujarat Billing
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						   
						<?php if($menu81 == "81"){ ?><li class="">
								<a href="guploadproducts.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Upload Products
								</a>
			
							</li><?php }?>
                            
							
							<?php if($menu82 == "82"){ ?><li class="">
								<a href="addgrefferno.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 UploadDPR
								</a>
			
							</li><?php }?>
							
							
							
							
                             


						   
                          <?php if($menu83 == "83"){ ?>  <li class="">
								<a href="addgbill.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Billing
								</a>
			
							</li><?php }?>

							 <?php if($menu84 == "84"){ ?>  <li class="">
								<a href="gbill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 Billing List
								</a>
			
							</li><?php }?>

							<?php if($menu85 == "85"){ ?>  <li class="">
								<a href="pgbill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 Billing Prints List
								</a>
			
							</li><?php }?>

					</ul>
					</li>              
						 <?php }?> 






<?php if($menu9 == "9"){ ?> 
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text">
								AP Billing
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						    <?php if($menu94 == "94"){ ?>  <li class="">
								<a href="andhrauploadproducts.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Upload Products
								</a>
			
							</li><?php }?>
							
							
							 <?php if($menu95 == "95"){ ?>  <li class="">
								<a href="andhrarefferno.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Upload Dpr
								</a>
			
							</li><?php }?>
						   
                          <?php if($menu91 == "91"){ ?>  <li class="">
								<a href="addapbill.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Billing
								</a>
			
							</li><?php }?>

							 <?php if($menu92 == "92"){ ?>  <li class="">
								<a href="andhrabill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 Billing List
								</a>
			
							</li><?php }?>
							<?php if($menu93 == "93"){ ?>  <li class="">
								<a href="pandhrabill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 Billing List
								</a>
			
							</li><?php }?>
							

					</ul>
					</li>              
						 <?php }?> 


<!----GOA-->

<?php if($menu12 == "12"){ ?> 
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text">
								GOA Billing
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						    <?php if($menu114 == "114"){ ?>  <li class="">
								<a href="goauploadproducts.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Upload Products
								</a>
			
							</li><?php }?>
							
							
							 <?php if($menu115 == "115"){ ?>  <li class="">
								<a href="goarefferno.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Upload Dpr
								</a>
			
							</li><?php }?>
						   
                          <?php if($menu91 == "91"){ ?>  <li class="">
								<a href="addgoabill.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Add Billing
								</a>
			
							</li><?php }?>

							 <?php if($menu92 == "92"){ ?>  <li class="">
								<a href="goabill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 Billing List
								</a>
			
							</li><?php }?>
							<?php if($menu93 == "93"){ ?>  <li class="">
								<a href="goabill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									 Billing List
								</a>
			
							</li><?php }?>
							

					</ul>
					</li>              
						 <?php }?> 



								 

					 <?php if($menu4 == "4"){ ?>
					 <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text">
								Reports
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
					<?php if($menu41 == "41"){ ?><li class="">
								<a href="summary.php">
									<i class="menu-icon fa fa-caret-right"></i>
									AP & TS Summary
								</a>

								
							</li><?php }?>
							
							<?php if($menu44 == "44"){ ?><li class="">
								<a href="msummary.php">
									<i class="menu-icon fa fa-caret-right"></i>
									MH Summary
								</a>

								
							</li><?php }?>
							
							<?php if($menu45 == "45"){ ?><li class="">
								<a href="gsummary.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Gujarat Summary
								</a>

								
							</li><?php }?>
							
							<?php if($menu46 == "46"){ ?><li class="">
								<a href="ap-summary.php">
									<i class="menu-icon fa fa-caret-right"></i>
									AP Summary
								</a>

								
							</li><?php }?>
							
								<?php if($menu135 == "135"){ ?><li class="">
								<a href="goa-summary.php">
									<i class="menu-icon fa fa-caret-right"></i>
									GOA Summary
								</a>

								
							</li><?php }?>
							<?php if($menu42 == "42"){ ?><li class="">
								<a href="date_wise.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Date wise invoice list
								</a>

								
							</li><?php }?>
							
							<?php if($menu43 == "43"){ ?><li class="">
								<a href="date_wise.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Gst wise invoice list
								</a>

								
							</li><?php }?>

							
                            <?php if($menu47 == "47"){ ?><li class="">
								<a href="hsn_wise.php">
									<i class="menu-icon fa fa-caret-right"></i>
									TS HSN/SCNO wise Report list
								</a>

								
							</li><?php }?>

							
							<?php if($menu48 == "48"){ ?><li class="">
								<a href="mhhsn_wise.php">
									<i class="menu-icon fa fa-caret-right"></i>
									MH HSN/SCNO wise Report list
								</a>

								
							</li><?php }?>

							
							<?php if($menu49 == "49"){ ?><li class="">
								<a href="gthsn_wise.php">
									<i class="menu-icon fa fa-caret-right"></i>
									GT HSN/SCNO wise Report list
								</a>

								
							</li><?php }?>

							
							<?php if($menu410 == "410"){ ?><li class="">
								<a href="aphsn_wise.php">
									<i class="menu-icon fa fa-caret-right"></i>
									AP HSN/SCNO wise Report list
								</a>

								
							</li><?php }?>

	<?php if($menu4110 == "4110"){ ?><li class="">
								<a href="goahsn_wise.php">
									<i class="menu-icon fa fa-caret-right"></i>
								MH-GOA HSN/SCNO wise Report list
								</a>

								
							</li><?php }?>
							<?php if($menu411 == "411"){ ?><li class="">
								<a href="tsdprdownload.php">
									<i class="menu-icon fa fa-caret-right"></i>
									TS Dpr Download Report
								</a>

								
							</li><?php }?>
							
							<?php if($menu412 == "412"){ ?><li class="">
								<a href="mhdprdownload.php">
									<i class="menu-icon fa fa-caret-right"></i>
									MH Dpr Download Report
								</a>

								
							</li><?php }?>
							
							
							<?php if($menu413 == "413"){ ?><li class="">
								<a href="gtdprdownload.php">
									<i class="menu-icon fa fa-caret-right"></i>
									GT Dpr Download Report
								</a>

								
							</li><?php }?>
							
							<?php if($menu414 == "414"){ ?><li class="">
								<a href="apdprdownload.php">
									<i class="menu-icon fa fa-caret-right"></i>
									AP Dpr Download Report
								</a>

								
							</li><?php }?>
							
							

							
							<?php if($menu415 == "415"){ ?><li class="">
								<a href="alltsdprdownload.php">
									<i class="menu-icon fa fa-caret-right"></i>
									All TS Dpr Download Report
								</a>

								
							</li><?php }?>
							
							<?php if($menu416 == "416"){ ?><li class="">
								<a href="allmhdprdownload.php">
									<i class="menu-icon fa fa-caret-right"></i>
									All MH Dpr Download Report
								</a>

								
							</li><?php }?>
							
							
							<?php if($menu417 == "417"){ ?><li class="">
								<a href="allgtdprdownload.php">
									<i class="menu-icon fa fa-caret-right"></i>
									All GT Dpr Download Report
								</a>

								
							</li><?php }?>
							
							<?php if($menu418 == "418"){ ?><li class="">
								<a href="allapdprdownload.php">
									<i class="menu-icon fa fa-caret-right"></i>
									All AP Dpr Download Report
								</a>

								
							</li><?php }?>

							
						</ul>
					 </li><?php }?>
		
				<?php if($menu6 == "6"){ ?>	<li class="">
						<a href="usermanagement.php" >
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text">
								User Management
							</span>

							
						</a>

						

						
					</li>
				<?php }?>

					
					<?php if($menu7 == "7"){ ?>
					 <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text">
								Apporve Bills
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						<?php if($menu71 == "71"){ ?><li class="">
								<a href="mabill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Maharashtra Bills
								</a>

								
							</li><?php }?>
							<?php if($menu72 == "72"){ ?><li class="">
								<a href="apbill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									AP & TS Bills
								</a>

								
							</li><?php }?>
							
							
							<?php if($menu73 == "73"){ ?><li class="">
								<a href="gabill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Gujarat Bills
								</a>

								
							</li><?php }?>
							<?php if($menu74 == "74"){ ?><li class="">
								<a href="aandhrabill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Andhra Bills
								</a>

								
							</li><?php }?>
							
								<?php if($menu75 == "75"){ ?><li class="">
								<a href="goabill_list.php">
									<i class="menu-icon fa fa-caret-right"></i>
									GOA Bills
								</a>

								
							</li><?php }?>						
						</ul>
					 </li><?php }?>

					

					
				<?php if($menu100 == "100"){ ?> 
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog"></i>
							<span class="menu-text">
								Upload  Formats
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						    <?php if($menu101 == "101"){ ?>  <li class="">
								<a href="productsformat.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Upload Products Formats
								</a>
			
							</li><?php }?>
							
							
							 <?php if($menu102 == "102"){ ?>  <li class="">
								<a href="dprformat.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Upload Dpr Formats
								</a>
			
							</li><?php }?>
						   
                          <?php if($menu103 == "103"){ ?>  <li class="">
								<a href="billingformat.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Upload Add Billing Format 
								</a>
			
							</li><?php }?>
	

					</ul>
					</li>              
						 <?php }?> 	
					
					
					
					
					
					
					
					
				</ul>










	
	
	
	
	
	
	
	
<?php	
}
?>