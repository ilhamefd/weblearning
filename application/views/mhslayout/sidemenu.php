<!--/sidebar-menu-->
			<div class="sidebar-menu">
				<header class="logo">
					<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1>KDJK</h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a> 
				</header>
				
				<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
				<!--/profil admin-->
				<div class="down">	
					<?php $i = 1;
             			foreach ($profil as $key => $value) { ?>
             			<img src=<?php echo base_url(); ?>assets/foto_profil/mahasiswa/<?php echo $value->foto?> >
             			<a href="#"><span class=" name-caret"><?php echo $value->nama?></span></a>
             		<?php $i++;
            		} ?>   
					
					<p>Mahasiswa</p>
					
					<ul>
						<li><a class="tooltips" href="<?php echo base_url('mhs_profil')?>"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
						<li><a class="tooltips" href="<?php echo base_url('login/out')?>"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
					</ul>
				</div>
				<!--//profil admin-->
				
				<!--Menu Kiri-->
				<div class="menu">
					<ul id="menu" >
						<li><a href="<?php echo site_url('mhs_home')?>"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
						<li><a href="<?php echo site_url('mhs_course')?>"><i class="lnr lnr-book"></i> <span>Course</span></a></li>
						<li><a href="<?php echo site_url('mhs_petunjuk/index/mahasiswa')?>"><i class="lnr lnr-enter"></i> <span>Petunjuk</span></a></li>
					</ul>
				</div>
			</div>
			
			<div class="clearfix"></div>
			<style>
				#myBtn {
				  display: none;
				  position: fixed;
				  bottom: 20px;
				  right: 20px;
				  z-index: 99;
				  border: none;
				  outline: none;
				  background-color: transparent;
				  color: white;
				  cursor: pointer;
				  padding: 11px;
				  border-radius: 10px;
				}

				#myBtn:hover {
				  background-color: none;
				}
			</style>
			 <div class="pull-right"><button onclick="topFunction()" id="myBtn" title="Go to top">
			 	<img width="40px" src="<?php echo base_url(); ?>assets/augment/images/totop.png">
			 </button></div>				
		</div>
		
<script>
	var toggle = true;							
		$(".sidebar-icon").click(function() {                
			if (toggle)
			{
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({"position":"absolute"});
			}
			else
			{
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
				$("#menu span").css({"position":"relative"});
				}, 400);
			}
											
			toggle = !toggle;
		});
</script>

<!--js -->
	<script src="<?php echo base_url(); ?>assets/augment/js/jquery.nicescroll.js"></script>
	<script src="<?php echo base_url(); ?>assets/augment/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="<?php echo base_url(); ?>assets/augment/js/bootstrap.min.js"></script>
   <script>
		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
		    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		        document.getElementById("myBtn").style.display = "block";
		    } else {
		        document.getElementById("myBtn").style.display = "none";
		    }
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
		    document.body.scrollTop = 0;
		    document.documentElement.scrollTop = 0;
		}
	</script>
</body>
</html>