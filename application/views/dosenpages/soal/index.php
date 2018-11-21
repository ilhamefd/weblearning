<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo base_url(); ?>dosen_home">Home</a></li>
								<li class="active">Lihat Soal</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Lihat Soal</h2>
								<div class="graph">
									<div class="block-page">
										<center><?=$this->session->flashdata('pesan');?></center>
										<a href="<?php echo base_url(); ?>dosen_soal/add"><button class="btn btn-success"> <i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Soal</button></a>
										<p>Halaman ini merupakan tempat melihat soal yang telah diupload. Apabila soal belum ada silakan upload dengan klik tombol <strong>Tambah Soal</strong>.<hr> 
										<form id="ads" action="<?php echo base_url(); ?>dosen_soal/view" method="post">
   											
						   					<div class="vali-form">
												<div class="col-md-4 form-group1">
													<label class="control-label">Kode Matakuliah</label>
														<select name="kodemakul" class="form-control1" select-style select-style-bottom id="makul" required>
														<option value=""> -Pilih Mata Kuliah- </option>							<?php 
														foreach ($mkul as $key => $value) {
														echo "<option value='".$value->kd_mku."'>".$value->kd_mku." ".$value->nm_mk."</option>";
														}

														?>
														</select>
												</div>
											</div>

											<input type="hidden" name="kodedos" value="<?php echo $un ?>">
												
											</div>
						   					
											<div class="col-md-3 form-group1 group-mail">
												<label class="control-label">Prodi</label>
													<select name="prodi" class="form-control1" required>
														<option value=""> -Pilih Prodi- </option>
														<option value="PTIN"> Pendidikan Teknik Informatika </option>
														<option value="PTEK"> Pendidikan Teknik Elektro </option>
													</select>
											</div>		

																						
											<div class="col-md-2 form-group1 group-mail">
												<label class="control-label">Pertemuan</label>
													<select name="pertemuan" class="form-control1" required>
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

											<div class="col-md-2 form-group1 group-mail">
												<label class="control-label">Jenis Test</label>
													<select name="jenis" class="form-control1" required>
														<option value=""> -Pilih Test- </option>
														<option value="prepos"> Pre/Post-Test </option>
														<option value="quiz1"> Quiz 1 </option>
														<option value="quiz2"> Quiz 2 </option>
														<option value="quiz3"> Quiz 3 </option>
														<option value="quiz4"> Quiz 4 </option>
													</select>
											</div>					

											<div class="clearfix"></div>	
    										<input type="submit" class="btn btn-primary" value="Lihat"/><br><br>
										</form>
									</div>
						        </div>
						</div>
						<!--//graph-visual-->
					</div>
				</div>
			</div>
			<!--Konten Utama-->

			