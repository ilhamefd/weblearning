<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('Dosen_home')?>">Home</a></li>
								<li class="active">Lihat Nilai</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Lihat Nilai</h2>
								<div class="graph">
									<div class="block-page">
										<p>
						<form method="post" action="<?php echo base_url(); ?>dosen_nilai/view/">
							
							<div class="vali-form">
												<div class="col-md-4 form-group1">
													<label class="control-label">Kode Matakuliah</label>
														<select name="kd_mk" class="form-control1" select-style select-style-bottom id="makul" required>
														<option value=""> -Pilih Mata Kuliah- </option>							<?php 
														foreach ($mkul as $key => $value) {
														echo "<option value='".$value->kd_mku."'>".$value->kd_mku." ".$value->nm_mk."</option>";
														}

														?>
														</select>
												</div>
											</div>

							<!-- <div class="col-md-3 form-group1 group-mail">
								<label class="control-label">Kode Matakuliah</label>
								<input type="text" name="kd_mk" placeholder="Masukkan Kode Matakuliah">
							</div>		 -->				
							<div class="clearfix"></div>

							<div class="col-md-4 form-group2 group-mail">
						<label class="control-label">Prodi</label>
							<select name="kd_prodi">
								<option value="">--Pilih Prodi--</option>
								<option value="PTIN">Pendidikan Teknik Informatika</option>
								<option value="PTEK">Pendidikan Teknik Elektro</option>
							</select>
					</div>
					<div class="clearfix"> </div>

					<div class="col-md-4 form-group2 group-mail">
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
							<!-- <div class="col-md-3 form-group1">
								<label class="control-label">Kode Dosen</label>
									<input type="text" name="kd_dosen" value="<?php echo $this->session->userdata('username'); ?>" disabled>
							</div>
							<div class="clearfix"></div> -->

							<div class="col-md-4 form-group1 group-mail">
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
							<div class="clearfix"> </div>
							<div class="col-md-4 form-group1 group-mail">
								<label class="control-label">Jenis</label>
									<select name="jenis" class="form-control1">
										<option value=""> -Pilih Jenis Test- </option>
											<option value="pre"> Pre-Test </option>
											<option value="pos"> Post-Test </option>
											<option value="quiz1"> Quiz 1 </option>
											<option value="quiz2"> Quiz 2 </option>
											<option value="quiz3"> Quiz 3 </option>
											<option value="quiz4"> Quiz 4 </option>
									</select>
							</div>						
							<div class="clearfix"> </div>
							<hr>
							<button class="btn btn-success btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Lihat Nilai Mahasiswa</button>
						</form>					
				

	<!-- 			<table class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Mata Kuliah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            
            <?php $i = 1;
              foreach ($mengajar as $key => $value) { ?>
                <tr class="odd gradeX">
                  <td><?php echo $i ?></td>
                  <td><?php echo $value->kd_mk ?></td>
                 

                  <td>
                      <a href="<?php echo site_url('dosen_nilai/view/'.strEncrypt($value->kd_mk).'') ?>"><button class="btn btn-success btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Lihat Nilai Mahasiswa</button></a>
                  </td>
                </tr>    
            <?php $i++;
            } ?>            
           
        </tbody>
    </table> -->	
										</p>
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
   		$('#mhs').DataTable();
	});
</script>