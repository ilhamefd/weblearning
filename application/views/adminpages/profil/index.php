<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo base_url('admin_home')?>">Home</a></li>
								<li class="active">Profil Admin</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Profil Admin</h2>
								<div class="graph">
									<div class="block-page">
                                        <center><?=$this->session->flashdata('pesan');?></center>
											<table id="mahasiswa" class="table table-striped dt-responsive nowrap" cellspacing="0" width="400px">
      
            
                 
        
            
            <?php $i = 1;
              foreach ($profil as $key => $value) { ?>
                <center><img src=<?php echo base_url(); ?>assets/foto_profil/dosen/<?php echo $value->foto?>></center><br>
                <center><a href="<?php echo site_url('admin_profil/chg_foto/'.strEncrypt($value->dsn_id).'') ?>"><button class="btn btn-info btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Ganti Foto</button></a></center><br>
            <tr>
            	<td><strong>Kode Admin</strong></td>
            	<td><?php echo $value->kd_dosen ?></td>
            </tr>
            <tr>
            	<td><strong>Nama Admin</strong></td>
            	<td><?php echo $value->nm_dosen ?></td>
            </tr>
            <tr>
            	<td><strong>Jenis Kelamin</strong></td>
            	<td><?php echo $value->jk ?></td>
            </tr>
            <tr>
				<td><strong>Tanggal Lahir</strong></td>
            	 <td><?php echo tgl_indo($value->tgl_lahir) ?></td>
        	</tr>
            <tr>
            	<td><strong>Alamat</strong></td>
            	<td><?php echo $value->alamat ?></td>
            </tr>
            <tr>
            	<td><strong>No. HP</strong></td>
            	<td><?php echo $value->hp ?></td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td><?php echo $value->email ?></td>
            </tr>
                  
            <?php $i++;
            } ?>            
           
    </table>	
    <a href="<?php echo site_url('admin_profil/chg_profil/'.strEncrypt($value->dsn_id).'') ?>"><button class="btn btn-warning btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit Profil</button></a>

									</div>
						        </div>
						</div>
						<!--//graph-visual-->
					</div>
				</div>
			</div>
			<!--Konten Utama-->