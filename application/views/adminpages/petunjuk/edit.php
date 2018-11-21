<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('admin_home')?>">Home</a></li>
								<li><a href="<?php echo site_url('admin_petunjuk')?>">Petunjuk</a></li>
								<li class="active">Edit</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Edit Petunjuk</h2>
								<div class="graph">
									<div class="block-page">
										<center><?=$this->session->flashdata('pesan');?></center>
										<form id="editpetunjuk" method="post" action="<?php echo base_url(); ?>admin_petunjuk/act_edit/<?=$petunjuk_id?>">

					<div class="col-md-12 form-group1 group-mail">
						<!-- <label class="control-label">Isi</label> -->
							<textarea name="isi" id="myTextarea" placeholder="Masukkan Petunjuk" value=""><?php echo $petunjuk[0]->isi; ?></textarea>
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
