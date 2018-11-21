<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('Admin_home')?>">Home</a></li>
								<li class="active">Petunjuk</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Petunjuk</h2>
								<div class="graph">
									<div class="block-page">
										<p>
											
 				<center><?=$this->session->flashdata('pesan');?></center>
				<table class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Pengguna</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            
            <?php $i = 1;
              foreach ($petunjuk as $key => $value) { ?>
                <tr class="odd gradeX">
                  <td><?php echo $i ?></td>
                  <td><?php echo $value->user ?></td>
                  <td>
                      <a href="<?php echo site_url('admin_petunjuk/detail/'.strEncrypt($value->petunjuk_id).'') ?>"><button class="btn btn-success btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Lihat</button></a>
                      <a href="<?php echo site_url('admin_petunjuk/edit/'.strEncrypt($value->petunjuk_id).'') ?>"><button class="btn btn-warning btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit</button></a>
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
