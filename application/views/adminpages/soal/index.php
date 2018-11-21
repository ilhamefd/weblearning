<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="index.html">Home</a></li>
								<li class="active">Soal</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Soal</h2>
								<div class="graph">
									<div class="block-page">
										<center><?=$this->session->flashdata('pesan');?></center>
										<p>Halaman ini merupakan tempat upload soal. Soal diinput melalui microsoft excel yang formatnya dapat di download <a href="<?php echo base_url(); ?>admin_soal/download"><button class="btn btn-info btn-xs">disini</button></a>. Setelah soal diinputkan file excel di upload ke sistem.</p><hr><br>
										<h4>Upload file excel soal</h4>
										<form action="<?php echo base_url();?>admin_soal/action_add/" method="post" enctype="multipart/form-data">
   											<center><input type="file" name="file"/><br>
    										<input type="submit" class="btn btn-primary" value="Upload Soal"/></center>
										</form>
									</div>
						        </div>
						</div>
						<!--//graph-visual-->
					</div>
				</div>
			</div>
			<!--Konten Utama-->