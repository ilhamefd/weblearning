<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('dosen_home')?>">Home</a></li>
								<li><a href="<?php echo site_url('dosen_mengajar')?>">Mengajar</a></li>
								<li class="active">Edit</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Edit Data Mengajar</h2>
								<div class="graph">
									<div class="block-page">
										<form id="editmengajar" method="post" action="<?php echo base_url(); ?>dosen_mengajar/act_edit/<?=$mgj_id?>"">
					<div class="vali-form">
						<div class="col-md-6 form-group1">
							<label class="control-label">Kode Matakukiah</label>
								<input type="text" name="kd_mk" placeholder="Masukkan Kode Matakukiah" value="<?=$mengajar[0]->kd_mk; ?>" >
						</div>
						<div class="clearfix"> </div>
					</div>
																						
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
		$('#editmengajar').on('submit', function(e){
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
                            window.location.href = "<?php echo site_url('dosen_mengajar'); ?>";
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