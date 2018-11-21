<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('dosen_home')?>">Home</a></li>
								<li><a href="<?php echo site_url('dosen_materi')?>">Materi</a></li>
								<li class="active">Tambah</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Tambah Materi</h2>
								<div class="graph">
									<div class="block-page">
										<center><?=$this->session->flashdata('pesan');?></center>
										<form id="addmateri" method="post" action="<?php echo base_url(); ?>dosen_materi/act_add/">
					<div class="vali-form">
						<div class="col-md-3 form-group1">
							<label class="control-label">Prodi : <?php echo $kd_prodi?> </label>
								<input type="hidden" name="kodeprodi" value="<?php echo $kd_prodi?>">
						</div>
						
					</div>

					<div class="vali-form">
						<div class="col-md-3 form-group1">
							<label class="control-label">Offering : <?php echo $offering?> </label>
								<input type="hidden" name="off" value="<?php echo $offering?>">
						</div>
						
					</div>

					<div class="vali-form">
						<div class="col-md-3 form-group1">
							<label class="control-label">Kode Matakuliah : <?php echo $kd_mk?> </label>
								<input type="hidden" name="kodemakul" value="<?php echo $kd_mk?>">
						</div>
						
					</div>
					<div class="clearfix"></div><hr>

					<div class="col-md-3 form-group1 group-mail">
						<label class="control-label">Pertemuan</label>
						<select name="pertemuan" class="form-control1" select-style select-style-bottom id="pertemuan" required>
							<option value=""> -Pilih Pertemuan- </option>
			
					
				
				<option value="1" <?php if ($a == '1') {echo "selected";} ?>> Pertemuan 1 </option>				
				<option value="2" <?php if ($a == '2') {echo "selected";} ?>> Pertemuan 2 </option>
				<option value="3" <?php if ($a == '3') {echo "selected";} ?>> Pertemuan 3 </option>
				<option value="4" <?php if ($a == '4') {echo "selected";} ?>> Pertemuan 4 </option>
				<option value="5" <?php if ($a == '5') {echo "selected";} ?>> Pertemuan 5 </option>
				<option value="6" <?php if ($a == '6') {echo "selected";} ?>> Pertemuan 6 </option>
				<option value="7" <?php if ($a == '7') {echo "selected";} ?>> Pertemuan 7 </option>
				<option value="8" <?php if ($a == '8') {echo "selected";} ?>> Pertemuan 8 </option>
				<option value="9" <?php if ($a == '9') {echo "selected";} ?>> Pertemuan 9 </option>
				<option value="10"<?php if ($a == '10') {echo "selected";} ?>> Pertemuan 10 </option>
				<option value="11"<?php if ($a == '11') {echo "selected";} ?>> Pertemuan 11 </option>
				<option value="12"<?php if ($a == '12') {echo "selected";} ?>> Pertemuan 12 </option>
				<option value="13"<?php if ($a == '13') {echo "selected";} ?>> Pertemuan 13 </option>
				<option value="14"<?php if ($a == '14') {echo "selected";} ?>> Pertemuan 14 </option>
				<option value="15"<?php if ($a == '15') {echo "selected";} ?>> Pertemuan 15 </option>
				<option value="16"<?php if ($a == '16') {echo "selected";} ?>> Pertemuan 16 </option>	   
					</select>
					</div>				

					<div class="clearfix"></div>	
					
					<div class="col-md-12">
					<label class="control-label">Pilih Materi</label><hr>
					<table id="library" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
				        <thead>
				            <tr>
				                <th>No.</th>
				                <th>Judul</th>
				                <th>Pilih</th>
				            </tr>
				        </thead>
				        <tbody>
				            <?php $i = 1;
				              foreach ($library as $key => $value) { ?>
				                <tr class="odd gradeX">
				                  <td><?php echo $i ?></td>
				                  <td><?php echo $value->judul ?></td>
				                  <td>
				                      <input type="radio" name="lib" value="<?php echo $value->lib_id ?>" required>
				                  </td>
				                </tr>    
				            <?php $i++;
				            } ?>            
				           
				        </tbody>
				    </table>	
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
<script type="text/javascript">
	  $(document).ready(function(){
      $('#library').DataTable();
  });
</script>