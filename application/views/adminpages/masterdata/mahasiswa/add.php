<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('admin_home')?>">Home</a></li>
								<li><a href="<?php echo site_url('admin_mahasiswa')?>">Mahasiswa</a></li>
								<li class="active">Tambah</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Tambah Data Mahasiswa</h2>
								<div class="graph">
									<div class="block-page">
										<form id="addmahasiswa" method="post" action="<?php echo base_url(); ?>admin_mahasiswa/act_add">
					<div class="vali-form">
						<div class="col-md-6 form-group1">
							<label class="control-label">NIM</label>
								<input type="text" name="nim" placeholder="Masukkan NIM">
						</div>
						<div class="clearfix"> </div>
					</div>
																						
					<div class="col-md-6 form-group1 group-mail">
						<label class="control-label">Nama Mahasiswa</label>
							<input type="text" name="nama" placeholder="Masukkan Nama Mahasiswa">
					</div>
						<div class="clearfix"> </div>

					<div class="col-md-6 form-group2 group-mail">
						<label class="control-label">Jenis Kelamin</label>
							<select name="jk">
								<option value="">--Pilih Jenis Kelamin--</option>>
								<option value="L">L</option>
								<option value="P">P</option>
							</select>
					</div>
					<div class="clearfix"> </div>

					<div class="col-md-6 form-group1 group-mail">
						<label class="control-label ">Tanggal Lahir</label>
							<input type="date" name="tgllahir" class="form-control1 ng-invalid ng-invalid-required" ng-model="model.date">
					</div>
						<div class="clearfix"> </div>

					<div class="col-md-6 form-group1 group-mail">
						<label class="control-label">Alamat</label>
							<input type="text" name="alamat" placeholder="Masukkan Alamat">
					</div>
						<div class="clearfix"> </div>

					<div class="col-md-6 form-group1 group-mail">
						<label class="control-label">Nomor HP</label>
							<input type="text" name="hp" placeholder="Masukkan Nomor HP">
					</div>
						<div class="clearfix"> </div>

					<div class="col-md-6 form-group1 group-mail">
						<label class="control-label">Email</label>
							<input type="text" name="email" placeholder="Masukkan Alamat Email">
					</div>
						<div class="clearfix"> </div>

					<!-- <div class="col-md-6 form-group2 group-mail">
						<label class="control-label">Prodi</label>
							<select name="kd_prodi">
								<option value="">--Pilih Prodi--</option>
								<option value="PTIN">Pendidikan Teknik Informatika</option>
								<option value="PTEK">Pendidikan Teknik Elektro</option>
							</select>
					</div>
					<div class="clearfix"> </div> -->

					<div class="col-md-6 form-group1 group-mail">
						<label class="control-label">Password</label>
							<input type="password" name="password" placeholder="Masukkan Password">
					</div>
						<div class="clearfix"> </div>

					<div class="col-md-6 form-group1 group-mail">
						<label class="control-label">Re-Password</label>
							<input type="password" name="repassword" placeholder="Masukkan Ulang Password">
					</div>
						<div class="clearfix"> </div>


						<div class="clearfix"> </div>					  
					<div class="col-md-12 form-group button-2">
						<button type="button" class="btn btn-warning" onclick="window.history.go(-1); return false;">Kembali</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
						<div class="clearfix"> </div>
				 </form>
									</div>
						        </div>
						</div>
						<!--//graph-visual-->
					</div>
				</div>
			</div>
			<!--Konten Utama-->
<script>
	$(document).ready(function(){
		$('#addmahasiswa').on('submit', function(e){
			e.preventDefault();

			var $this 	= $(this),
				url 	= $this.attr('action'),
				data 	= $this.serialize();

			$.ajax({
				url 	: url,
				type 	: 'post',
				dataType: 'json',
				data 	: data,
				success : function(data) {
					if(data.sts == 1) {
						$.notify({message: data.msg},{type:'success'});
						setTimeout(function() {
                            window.location.href = "<?php echo site_url('admin_mahasiswa'); ?>";
                        }, 2000);
					} else {
						$.notify({message: data.msg},{type:'danger'});
					}
				},
				error 	: function(data) {
					$.notify('Error', 'Internal Server Error !', 'error');
				}
			});
		});
	});
</script>