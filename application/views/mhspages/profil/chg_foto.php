<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo base_url('mhs_home')?>">Home</a></li>
								<li class="active">Profil Mahasiswa</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Foto Mahasiswa</h2>
								<div class="graph">
									<div class="block-page">
            <form  action="<?php echo base_url(); ?>mhs_profil/act_chg_foto/<?php echo $mahasiswa[0]->mhs_id ?>" method="post" enctype="multipart/form-data">
            <?php $i = 1;
              foreach ($profil as $key => $value) { ?>
                <center><img src=<?php echo base_url(); ?>assets/foto_profil/mahasiswa/<?php echo $value->foto?>></center><br>
                <center><input type="file" name="img" value="<?php echo $mahasiswa[0]->foto ?>"></center>     
            <?php $i++;
            } ?>
            <br><br>
            <center><button type="button" class="btn btn-warning" onclick="window.history.go(-1); return false;">Kembali</button>
            <button type="submit" class="btn btn-primary">Simpan</button></center>
            </form>
									</div>
						        </div>
						</div>
						<!--//graph-visual-->
					</div>
				</div>
			</div>
			<!--Konten Utama-->