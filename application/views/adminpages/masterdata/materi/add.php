<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('admin_home')?>">Home</a></li>
								<li><a href="<?php echo site_url('admin_materi')?>">Materi</a></li>
								<li class="active">Tambah</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Tambah Materi</h2>
								<div class="graph">
									<div class="block-page">
										<center><?=$this->session->flashdata('pesan');?></center>
										<form id="addmateri" method="post" action="<?php echo base_url(); ?>admin_materi/act_add">
					<div class="vali-form">
						<div class="col-md-3 form-group1">
							<label class="control-label">Kode Matakuliah</label>
								<input type="text" name="kd_mk" placeholder="Masukkan Kode Matakuliah">
						</div>
						
					</div>
																						
					<div class="col-md-3 form-group1 group-mail">
						<label class="control-label">Kode Dosen</label>
							<input type="text" name="kd_dosen" placeholder="Masukkan Kode Dosen">
					</div>
						<div class="clearfix"> </div>

					<div class="col-md-3 form-group1 group-mail">
						<label class="control-label">Pertemuan</label>
							<select name="pertemuan" class="form-control1">
								<option value=""> -Pilih Pertemuan- </option>
								<option value="1"> Pertemuan 1 </option>
								<option value="2"> Pertemuan 2 </option>
								<option value="3"> Pertemuan 3 </option>
								<option value="4"> Pertemuan 4 </option>
								<option value="5"> Pertemuan 5 </option>
								<option value="6"> Pertemuan 6 </option>
								<option value="7"> Pertemuan 7 </option>
								<option value="8"> Pertemuan 8 </option>
								<option value="9"> Pertemuan 9 </option>
								<option value="10"> Pertemuan 10 </option>
								<option value="11"> Pertemuan 11 </option>
								<option value="12"> Pertemuan 12 </option>
								<option value="13"> Pertemuan 13 </option>
								<option value="14"> Pertemuan 14 </option>
								<option value="15"> Pertemuan 15 </option>
								<option value="16"> Pertemuan 16 </option>
							</select>
					</div>						
					

					<div class="col-md-3 form-group2 group-mail">
						<label class="control-label">Prodi</label>
							<select name="kd_prodi">
								<option value="">--Pilih Prodi--</option>
								<option value="PTIN">Pendidikan Teknik Informatika</option>
								<option value="PTEK">Pendidikan Teknik Elektro</option>
							</select>
					</div>
					

					<div class="col-md-3 form-group2 group-mail">
						<label class="control-label">Offering</label>
							<select name="offering">
								<option value="">--Pilih Offering--</option>
								<option value="A">Offering A</option>
								<option value="B">Offering B</option>
								<option value="C">Offering C</option>
								<option value="D">Offering D</option>
							</select>
					</div>
					<div class="clearfix"> </div>	

					<div class="col-md-6 form-group1 group-mail">
						<label class="control-label">Judul</label>
							<input type="text" name="judul" placeholder="Masukkan Judul">
					</div>

					<div class="col-md-12 form-group1 group-mail">
						<label class="control-label">Materi</label>
						<textarea name="materi" class="tinymce" id="myTextarea"></textarea>
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
<!-- <script>
	$(document).ready(function(){
		$('#addmateri').on('submit', function(e){
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
                            window.location.href = "<?php echo site_url('admin_materi'); ?>";
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
</script> -->