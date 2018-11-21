 <!-- konten -->
  <!--/start-banner-->
  <!-- <div class="banner two">
       <div class="container">
	       <h2 class="inner-tittle">Daftar</h2>
        </div>
  </div> -->
   <!--//end-banner-->
<!--account-->
   <div class="account">
	  <div class="container">
	       <div class="account-bottom">
				<div class="col-md-3"></div>
				<div class="col-md-6">
                     <center><h1>DAFTAR</h1></center>
                     <hr>
					<form id="register" method="post" class="login" action="<?php echo base_url(); ?>register/act_add">
                <center><p class="lead">Silahkan Melakukan Registrasi!</p></center>
                <div class="address">
                    Nama
                    <input type="text" autocomplete="off" placeholder="Masukkan Nama *" name="nama" value="">
                </div>
                <div class="address">
                    NIM
                    <input type="text" autocomplete="off" placeholder="Masukkan NIM *" name="nim" value="">
                </div>
                    <br>
                    Jenis Kelamin
                    <select class="form-control" name="jk">
                        <option value="">  Pilih Jenis Kelamin  </option>
                        <option value="L">L</option>
                        <option value="P">P</option>
                    </select>
                    <br>
                    Tanggal Lahir : <input class="form-control" type="date" name="tgllahir">
              
                <div class="address">
                    Alamat
                    <input type="text" autocomplete="off" placeholder="Masukkan Alamat *" name="alamat" value="">
                </div>
                <div class="address">
                    Email
                    <input type="text" autocomplete="off" placeholder="Masukkan Email *" name="email" value="">
                </div>
                <div class="address">
                    Nomor HP
                    <input type="text" autocomplete="off" placeholder="Masukkan Nomor HP *" name="nohp" value="">
                </div>
                <div class="address">
                    Password
                    <input type="password" placeholder="Masukkan Password *" name="password" value="">
                </div>
                <div class="address">
                    Ulangi Password
                    <input type="password" placeholder="Ulangi Password *" name="repassword" value="">
                </div>
                
                <center>
                <div class="address">
                    <input type="submit" class="btn btn-primary" name="submit" value="Register">
                </div>
                <br>
                <p>Telah memiliki akun? <a href="<?php echo site_url('login')?>"> <button type="button" class="btn btn-xs"> Login </button>  </a></p></center>
            </form>
				</div> 
				<div class="col-md-3"></div>
				 </div>
				<div class="clearfix"></div>
			</div>
	  </div>

<!-- end konten -->
<script>
    $(document).ready(function(){
        $('#register').on('submit', function(e){
            e.preventDefault();

            var $this   = $(this),
                url     = $this.attr('action'),
                data    = $this.serialize();

            $.ajax({
                url     : url,
                type    : 'post',
                dataType: 'json',
                data    : data,
                success : function(data) {
                    if(data.sts == 1) {
                        $.notify({message: data.msg},{type:'success'});
                        setTimeout(function() {
                            window.location.href = "<?php echo site_url('login'); ?>";
                        }, 2000);
                    } else {
                        $.notify({message: data.msg},{type:'danger'});
                    }
                },
                error   : function(data) {
                    $.notify('Error', 'Internal Server Error !', 'error');
                }
            });
        });
    });
</script>