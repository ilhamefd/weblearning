<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('admin_home')?>">Home</a></li>
								<li class="active">Materi</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Materi</h2>

								<div class="graph">
									<center><?=$this->session->flashdata('pesan');?></center>
									<div class="block-page">

										<form id="tampilmateri" method="post" action="<?php echo base_url(); ?>admin_materi/tampil">
					<div class="vali-form">
						<div class="col-md-3 form-group1">
							<label class="control-label">Kode Matakuliah</label>
								<input type="text" name="kd_mk" placeholder="Masukkan Kode Matakuliah">
						</div>
						
					</div>
					<div class="clearfix"></div>
																						
					<div class="col-md-3 form-group1 group-mail">
						<label class="control-label">Kode Dosen</label>
							<input type="text" name="kd_dosen" placeholder="Masukkan Kode Dosen">
					</div>

						<div class="clearfix"> </div>


					<div class="col-md-3 form-group2 group-mail">
						<label class="control-label">Prodi</label>
							<select name="kd_prodi">
								<option value="">--Pilih Prodi--</option>
								<option value="PTIN">Pendidikan Teknik Informatika</option>
								<option value="PTEK">Pendidikan Teknik Elektro</option>
							</select>
					</div>
					<div class="clearfix"> </div>

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
					<div class="col-md-12 form-group button-2">
						
						<button type="submit" class="btn btn-success">Tampilkan</button>
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
