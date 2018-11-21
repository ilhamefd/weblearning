<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('admin_home')?>">Home</a></li>
								<li><a href="<?php echo site_url('admin_materi')?>">Materi</a></li>
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
										<form id="editmateri" method="post" action="<?php echo base_url(); ?>admin_materi/act_edit/<?=$lib_id?>"">
					
					<div class="clearfix"> </div>

					<div class="col-md-6 form-group1 group-mail">
						<label class="control-label">Judul</label>
							<input type="text" name="judul" placeholder="Masukkan Judul" value="<?=$materi[0]->judul; ?>">
					</div>
						<div class="clearfix"> </div>

					<div class="col-md-12 form-group1 group-mail">
						<label class="control-label">Materi</label>
							<textarea name="konten" id="myTextarea" placeholder="Masukkan Materi" value=""><?php echo $materi[0]->konten; ?></textarea>
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