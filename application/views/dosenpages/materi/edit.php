<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('dosen_home')?>">Home</a></li>
								<li><a href="<?php echo site_url('dosen_materi')?>">Materi</a></li>
								<li class="active">Edit</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Edit Materi</h2>
								<div class="graph">
									<div class="block-page">
										<center><?=$this->session->flashdata('pesan');?></center>
										<form id="editmateri" method="post" action="<?php echo base_url(); ?>dosen_materi/act_edit/<?=$mtr_id?>"">
					<div class="vali-form">
						<div class="col-md-3 form-group1">
							<label class="control-label">Kode Matakukiah</label>
								<input type="text" name="kd_mk" placeholder="Masukkan Kode Matakukiah" value="<?=$materi[0]->kd_mk; ?>" >
						</div>
						
					</div>
																						
					<div class="col-md-3 form-group1 group-mail">
						<label class="control-label">Kode Dosen</label>
							<input type="text" name="kd_dosen" placeholder="Masukkan Kode Dosen" value="<?=$materi[0]->kd_dosen; ?>">
					</div>
						<div class="clearfix"> </div>

					<div class="col-md-3 form-group1 group-mail">
						<label class="control-label">Pertemuan</label>
							<select name="pertemuan" class="form-control1">
				<option value="1" <?php if ($materi[0]->pertemuan == '1') {echo "selected";} ?>> Pertemuan 1 </option>
								
				<option value="2" <?php if ($materi[0]->pertemuan == '2') {echo "selected";} ?>> Pertemuan 2 </option>
				<option value="3" <?php if ($materi[0]->pertemuan == '3') {echo "selected";} ?>> Pertemuan 3 </option>
				<option value="4" <?php if ($materi[0]->pertemuan == '4') {echo "selected";} ?>> Pertemuan 4 </option>
				<option value="5" <?php if ($materi[0]->pertemuan == '5') {echo "selected";} ?>> Pertemuan 5 </option>
				<option value="6" <?php if ($materi[0]->pertemuan == '6') {echo "selected";} ?>> Pertemuan 6 </option>
				<option value="7" <?php if ($materi[0]->pertemuan == '7') {echo "selected";} ?>> Pertemuan 7 </option>
				<option value="8" <?php if ($materi[0]->pertemuan == '8') {echo "selected";} ?>> Pertemuan 8 </option>
				<option value="9" <?php if ($materi[0]->pertemuan == '9') {echo "selected";} ?>> Pertemuan 9 </option>
				<option value="10"<?php if ($materi[0]->pertemuan == '10') {echo "selected";} ?>> Pertemuan 10 </option>
				<option value="11"<?php if ($materi[0]->pertemuan == '11') {echo "selected";} ?>> Pertemuan 11 </option>
				<option value="12"<?php if ($materi[0]->pertemuan == '12') {echo "selected";} ?>> Pertemuan 12 </option>
				<option value="13"<?php if ($materi[0]->pertemuan == '13') {echo "selected";} ?>> Pertemuan 13 </option>
				<option value="14"<?php if ($materi[0]->pertemuan == '14') {echo "selected";} ?>> Pertemuan 14 </option>
				<option value="15"<?php if ($materi[0]->pertemuan == '15') {echo "selected";} ?>> Pertemuan 15 </option>
				<option value="16"<?php if ($materi[0]->pertemuan == '16') {echo "selected";} ?>> Pertemuan 16 </option>
							</select>
					</div>						
					<div class="clearfix"> </div>

					<div class="col-md-6 form-group1 group-mail">
						<label class="control-label">Judul</label>
							<input type="text" name="judul" placeholder="Masukkan Judul" value="<?=$materi[0]->judul; ?>">
					</div>
						<div class="clearfix"> </div>

					<div class="col-md-12 form-group1 group-mail">
						<label class="control-label">Materi</label>
							<textarea name="materi" id="myTextarea" placeholder="Masukkan Materi" value=""><?php echo $materi[0]->materi; ?></textarea>
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
		$('#editmateri').on('submit', function(e){
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
                            window.location.href = "<?php echo site_url('admin_materi'); ?>";
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
</script> -->