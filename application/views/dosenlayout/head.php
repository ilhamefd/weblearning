<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $title; ?></title>
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
		<!-- <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'> -->
		<!-- lined-icons -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/augment/css/icon-font.min.css" type='text/css' />
		<!-- /js -->
		<script src="<?php echo base_url(); ?>assets/augment/js/jquery-1.10.2.min.js"></script>
		<!-- //js-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/mhs/datatables.min.css" type='text/css' />
		<script src="<?php echo base_url(); ?>assets/datatables/mhs/datatables.min.js"></script>
		<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/jquery.dataTables.min.css" type='text/css' />
		<script src="<?php echo base_url(); ?>assets/datatables/jquery.dataTables.min.js"></script> -->
		<!-- sweet alert -->
		<link href="<?php echo base_url(); ?>assets/sweet-alert/css/sweetalert2.min.css" rel="stylesheet">
		<script src="<?php echo base_url(); ?>assets/sweet-alert/js/sweetalert2.min.js"></script>
		<!-- notify -->
		<!-- <script src="<?php echo base_url(); ?>assets/notify/jquery.js"></script> -->
		<script src="<?php echo base_url(); ?>assets/notify/bootstrap-notify.js"></script>
		<!-- <script src="<?php echo base_url(); ?>assets/notify/jquery.js"></script> -->
		<script src="<?php echo base_url(); ?>assets/notify/bootstrap-notify.min.js"></script>
			<!-- <script src="<?php echo base_url(); ?>assets/notify/app.js"></script> -->
		<link href="<?php echo base_url(); ?>assets/notify/animate.css" rel="stylesheet">
		<script type="text/javascript" src="<?php echo base_url();?>assets/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/tinymce/jquery.tinymce.min.js"></script>
		<script type="text/javascript">
		  tinymce.init({
			  selector: '#myTextarea',
			  plugins: 'image code advlist autolink link lists print preview hr anchor pagebreak spellchecker searchreplace wordcount visualblocks visualchars fullscreen insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor',
			  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code | print preview media fullpage | forecolor backcolor emoticons',
			  // enable title field in the Image dialog
			  image_title: true, 
			  // enable automatic uploads of images represented by blob or data URIs
			  automatic_uploads: true,

			  file_browser_callback: function(field, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: '/weblearning/assets/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'KCFinder',
            width: 700,
            height: 500,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    }
			});
		
  		</script>
	</head> 