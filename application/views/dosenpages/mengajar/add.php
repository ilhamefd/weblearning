<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('dosen_home')?>">Home</a></li>
								<li><a href="<?php echo site_url('dosen_mengajar')?>">Mengajar</a></li>
								<li class="active">Tambah</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Tambah Data Mengajar</h2>
								<div class="graph">
									<div class="block-page">
										<form id="addmengajar" method="post" action="<?php echo base_url(); ?>dosen_mengajar/act_add">
					
					<div class="vali-form">
						<div class="col-md-6 form-group1">
							<label class="control-label">Matakuliah</label>
								<select name="kd_mk" class="form-control1" select-style select-style-bottom id="makul" required>
									<option value=""> -Pilih Mata Kuliah- </option>	
										<?php 
										foreach ($mkul as $key => $value) {
											echo "<option value='".$value->kd_mk."'>".$value->kd_mk." ".$value->nm_mk."</option>";
										}
										?>
								</select>
						</div>
						<div class="clearfix"> </div>
					</div>
					
					<div class="col-md-6 form-group2 group-mail">
						<label class="control-label">Prodi</label>
							<select name="kd_prodi">
								<option value="">--Pilih Prodi--</option>
								<option value="PTIN">S1 Pendidikan Teknik Informatika</option>
								<option value="PTEL">S1 Pendidikan Teknik Elektro</option>
								<option value="NINF">S1 Teknik Informatika</option>
								<option value="NTEL">S1 Teknik Elektro</option>
								<option value="NEKA">D3 Teknik Elektro</option>
								<option value="NTRO">D3 Teknik Elektro</option>
							</select>
					</div>
					<div class="clearfix"> </div>

					<div class="col-md-6 form-group2 group-mail">
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
		$('#addmengajar').on('submit', function(e){
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
                            window.location.href = "<?php echo site_url('dosen_mengajar'); ?>";
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