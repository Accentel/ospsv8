	<?php include'dbfiles/login_process1.php' ?>
	<?php include'dbfiles/org.php' ?>
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
			<meta charset="utf-8" />
			<title>OSPS - Billing</title>

			<meta name="description" content="User login page" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
			<link rel="shortcut icon" href="assets/css/favicon-32x32.png">
			<!-- bootstrap & fontawesome -->
			<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
			<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

			<!-- text fonts -->
			<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

			<!-- ace styles -->
			<link rel="stylesheet" href="assets/css/ace.min.css" />

			<!--[if lte IE 9]>
				<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
			<![endif]-->
			<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
			<script>
        function checkLogin() {
            var num1 = Math.floor(Math.random() * 10);
            var num2 = Math.floor(Math.random() * 10);
            var correctSum = num1 + num2;
            var userInput = prompt('Please solve this: ' + num1 + ' + ' + num2);

            if (userInput !== null && parseInt(userInput) === correctSum) {
                document.querySelector('form').submit();
            } else {
                alert('Incorrect or canceled. Please enter the correct sum to login.');
            }
        }
    </script>
		</head>

		<body class="login-layout" style="background-color:#E4E6E9;">
	
			<div class="main-container">
				<div class="main-content">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1">
							<div class="login-container">
								<div class="center">
									<h1>
										
										<span class="red"><img src="osps logo.png"/>Billing</span>
										<span class="red" id="id-text2">Application</span>
									</h1>
									<h4 class="blue" id="id-company-text">&copy; OSPS TELECOM SERVICES PVT.LTD.</h4>
								</div>

								<div class="space-6"></div>

								<div class="position-relative">
									<div id="login-box" class="login-box visible widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header blue lighter bigger">
													
													Please Enter Login Information
												</h4>
													
												
												
												
				<?php echo $error; ?>
				
												
												<form method="post" action=""  novalidate="novalidate" autocomplete="off" >
													<fieldset>
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="text" name="uname" id="uname" class="form-control" placeholder="Username" value="<?php echo @$user_email ?>" required/>
																<i class="ace-icon fa fa-user"></i>
															</span>
														</label>
	<strong class="alert-danger"><?php echo $errorName; ?></strong>
														<label class="block clearfix">
															<span class="block input-icon input-icon-right">
																<input type="password" name="pwd" id="pwd" required class="form-control" placeholder="Password" value="<?php echo @$password1 ?>" />
																<i class="ace-icon fa fa-lock"></i>
															</span>
														</label>
	<strong class="alert-danger"><?php echo $errorpss; ?></strong>
														<div class="space"></div>

														<div class="clearfix">
															<button type="button" class="width-35 pull-right btn btn-sm btn-primary" onclick="checkLogin()">Login</button>		
														</div>

														<div class="space-4"></div>
													</fieldset>
												</form>


												<div class="space-6"></div>

											
											</div>

											<div style="background-color:#1b6aaa;height:50px;padding:15px 25px;">
											
												<div class="background-color:#1b6aaa;text-align:left;">
													
													<b style="color:#c4ee00;">Design & Developed By&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>	<a href="https://www.accentelsoft.com" target="_blank"><b style="color:#fff;text-align:center;text-align:center;">Accentel Software </b></a>
														
													
												</div>
												
												
											</div>
											
										</div><!-- /.widget-body -->
									</div><!-- /.login-box -->

								
								</div><!-- /.position-relative -->

								
							</div>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.main-content -->
			</div><!-- /.main-container -->


		</body>
	</html>
	</html>
