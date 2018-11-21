<!DOCTYPE HTML>
<html>
	<head>
		<title>E-learn | Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 		<!-- Bootstrap Core CSS -->
		<link href="<?php echo base_url(); ?>assets/augment/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<!-- Custom CSS -->
		<link href="<?php echo base_url(); ?>assets/augment/css/style.css" rel='stylesheet' type='text/css' />
		<!-- Graph CSS -->
		<link href="<?php echo base_url(); ?>assets/augment/css/font-awesome.css" rel="stylesheet"> 
		<!-- jQuery -->
		<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
		<!-- lined-icons -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/augment/css/icon-font.min.css" type='text/css' />
		<!-- //lined-icons -->
		<script src="<?php echo base_url(); ?>assets/augment/js/jquery-1.10.2.min.js"></script>
		<!--clock init-->
	</head> 
	
	<body>
		<!--/login-->
		<div class="error_page">
			<!--/login-top-->						
			<div class="error-top">
				<h2 class="inner-tittle page">E-learn</h2>
				    <div class="login">
						<h3 class="inner-tittle t-inner">Login</h3>
						<center><?php echo $this->session->flashdata('pesan');?></center>
							<div class="buttons login">
								<ul>
									<div class="clearfix"></div>
								</ul>
							</div>
							
							<form method="post" action="<?php echo base_url(); ?>/login/in/">
								<input type="text" class="text" name="username" placeholder="Username" >
								<input type="password" name="password" placeholder="Password">
								<div class="submit">
									<input type="submit" value="Login" ></div>
								<div class="clearfix"></div>
																			
								<div class="new">
									<p class="sign">Tidak punya akun ? <a href="sign.html">Daftar</a></p>
									<div class="clearfix"></div>
								</div>
							</form>
					</div>
			</div>
			<!--//login-top-->
		</div>
	  	<!--//login-->
		
		<!--footer section start-->
		<div class="footer">
			<p>&copy 2017 E-learn</p>
		</div>
		<!--footer section end-->
		<!--/404-->
		
		<!--js -->
		<script src="<?php echo base_url(); ?>assets/augment/js/jquery.nicescroll.js"></script>
		<script src="<?php echo base_url(); ?>assets/augment/js/scripts.js"></script>
		<!-- Bootstrap Core JavaScript -->
   		<script src="<?php echo base_url(); ?>assets/augment/js/bootstrap.min.js"></script>
	</body>
</html>
