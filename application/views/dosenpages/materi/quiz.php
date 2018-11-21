<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('dosen_home')?>">Home</a></li>
								<li><a href="<?php echo site_url('dosen_materi')?>">Materi</a></li>
								<li class="active">Tambah Quiz</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Tambah Quiz</h2>
								<div class="graph">
									<div class="block-page">
										<center><?=$this->session->flashdata('pesan');?></center>
										<form id="editmateri" method="post" action="<?php echo base_url(); ?>dosen_materi/quiz_act_edit/<?=$mtr_id?>"">
					

					<div class="col-md-3 form-group1 group-mail">
						<label class="control-label">Pilih Quiz</label>
							<select name="quiz" class="form-control1">
				<option value="quiz1"> Quiz 1 </option>
				<option value="quiz2"> Quiz 2 </option>
				<option value="quiz3"> Quiz 3 </option>
				<option value="quiz4"> Quiz 4 </option>
							</select>
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