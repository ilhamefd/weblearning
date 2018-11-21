 <!-- konten -->
  <!--/start-banner-->
<!--   <div class="banner two">
       <div class="container">
	       <h2 class="inner-tittle">Login</h2>
        </div>
  </div> -->
   <!--//end-banner-->
<!--account-->
   <div class="account">
	  <div class="container">
	       <div class="account-bottom">
				<div class="col-md-8"><center><img style='height: 70%; width: 70%;' src="<?php echo base_url(); ?>assets/cm/images/network.png"><center></div>
				
        <div class="col-md-4">
        <center><h1>LOGIN</h1></center>
        <hr>
				<center><?php echo $this->session->flashdata('pesan');?></center>
                <form class="login" method="post" action="<?php echo base_url('login/in'); ?>">
                    <center><p class="lead">Selamat Datang Kembali!</p></center>
                    <div class="address">
                        <input autocomplete="off" type="text" name="username" placeholder="Username">
                    </div>
                    <div class="address">
                        <input autocomplete="off" type="password" placeholder="Password" name="password">
                    </div><center>
                    <div class="address">
                        <input type="submit" class="btn btn-primary" name="submit" value="Log In">
                    </div><br>
                    <p>Belum memiliki akun? <a href="<?php echo site_url('register')?>" title="Register"> <button type="button" class="btn btn-xs">Register</button></a></p></center><hr>
                    <center><p>Untuk mendapatkan username dan password Dosen harap menghubungi admin melalui <strong>kdjkteum@gmail.com</strong></p><center>
         </form>
        
				</div> 
			
				 </div>
				<div class="clearfix"></div>
			</div>
	  </div>

<!-- end konten -->
