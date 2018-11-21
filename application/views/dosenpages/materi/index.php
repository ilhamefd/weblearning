<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('Dosen_home')?>">Home</a></li>
								<li class="active">Matakuliah</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Materi</h2>
								<div class="graph">
									<div class="block-page">
										<p>
				<hr>
 				<center><?=$this->session->flashdata('pesan');?></center>
				<table class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>Prodi</th>
                <th>Offering</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            
            <?php $i = 1;
              foreach ($mengajar as $key => $value) { ?>
                <tr class="odd gradeX">
                  <td><?php echo $i ?></td>
                  <td><?php echo $value->kd_mk ?></td>
                  <td><?php echo $value->nm_mk ?></td>
                  <td><?php echo $value->kd_prodi ?></td>
                  <td><?php echo $value->offering ?></td>
                  <td>
                      <a href="<?php echo site_url('dosen_materi/daftar/'.$value->kd_mk.'/'.$value->kd_prodi.'/'.$value->offering.'') ?>"><button class="btn btn-success btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> List Materi</button></a>
                  </td>
                </tr>    
            <?php $i++;
            } ?>            
           
        </tbody>
    </table>	
										</p>
									</div>
						        </div>
						</div>
						<!--//graph-visual-->
					</div>
				</div>
			</div>
			<!--Konten Utama-->
