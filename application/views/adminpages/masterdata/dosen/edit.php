<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('admin_home')?>">Home</a></li>
								<li><a href="<?php echo site_url('admin_dosen')?>">Dosen</a></li>
								<li class="active">Edit</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Edit Data Dosen</h2>
								<div class="graph">
									<div class="block-page">
										<form id="editdosen" method="post" action="<?php echo base_url(); ?>admin_dosen/act_edit/<?=$dsn_id?>"">
					<div class="vali-form">
						<div class="col-md-6 form-group1">
							<label class="control-label">Kode Dosen</label>
								<input type="text" name="kddosen" placeholder="Masukkan Kode Dosen" value="<?=$dosen[0]->kd_dosen; ?>" >
						</div>
						<div class="clearfix"> </div>
					</div>
																						
					<div class="col-md-6 form-group1 group-mail">
						<label class="control-label">Nama Dosen</label>
							<input type="text" name="nmdosen" placeholder="Masukkan Nama Dosen" value="<?=$dosen[0]->nm_dosen; ?>">
					</div>
						<div class="clearfix"> </div>

					<div class="col-md-6 form-group2 group-mail">
						<label class="control-label">Jenis Kelamin</label>
							<select name="jk">
								<option value="L" <?php if ($dosen[0]->jk == 'L') {echo "selected";} ?> >L</option>
							    <option value="P" <?php if ($dosen[0]->jk == 'P') {echo "selected";} ?> >P</option>
							</select>
					</div>
					<div class="clearfix"> </div>

					<div class="col-md-6 form-group1 group-mail">
						<label class="control-label ">Tanggal Lahir</label>
							<input type="date" name="tgllahir" placeholder="Masukkan Tanggal Lahir" class="form-control1 ng-invalid ng-invalid-required" ng-model="model.date" value="<?=$dosen[0]->tgl_lahir; ?>">
					</div>
						<div class="clearfix"> </div>

					<div class="col-md-6 form-group1 group-mail">
						<label class="control-label">Alamat</label>
							<input type="text" name="alamat" placeholder="Masukkan Alamat" value="<?=$dosen[0]->alamat; ?>">
					</div>
						<div class="clearfix"> </div>

					<div class="col-md-6 form-group1 group-mail">
						<label class="control-label">Nomor HP</label>
							<input type="text" name="nohp" placeholder="Masukkan Nomor HP" value="<?=$dosen[0]->hp; ?>">
					</div>
						<div class="clearfix"> </div>

					<div class="col-md-6 form-group1 group-mail">
						<label class="control-label">Email</label>
							<input type="text" name="email" placeholder="Masukkan email" value="<?=$dosen[0]->email; ?>">
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
		$('#editdosen').on('submit', function(e){
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
						$.notify({message: data.msg}, {type: 'success'});
						setTimeout(function() {
                            window.location.href = "<?php echo site_url('admin_dosen'); ?>";
                        }, 2000);
					} else {
						$.notify({message: data.msg},{type: 'danger'});
					}
				},
				error 	: function(data) {
					$.notify('Error', 'Internal Server Error !', 'error');
				}
			});
		});
	});
</script>