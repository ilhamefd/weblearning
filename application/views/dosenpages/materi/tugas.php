<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('Dosen_home')?>">Home</a></li>
								<li class="active">Data Tugas</li>
							</ol>
						</div>
						
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Data Tugas</h2>
								<div class="graph">
									<div class="block-page">
										<p>
											
				<hr>
				<center><?=$this->session->flashdata('pesan');?></center>
				<table class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nim</th>
                <th>Tugas</th>
                <th>Waktu</th>
                <th>Nilai</th>
                <th>Feedback</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        	
            
            <?php $i = 1;
              foreach ($tugas as $key => $value) { ?>
                <tr class="odd gradeX">
                  <td><?php echo $i ?></td>
                  <td><?php echo $value->nim ?></td>
                  <td><a href="<?php echo site_url('dosen_materi/download/'.$value->nm_file.'') ?>"><?php echo $value->nm_file ?></a></td>
                  <td><?php echo $value->time ?></td>
                  <td><?php echo $value->nilai ?></td>
                  <td><?php echo $value->feedback ?></td>
                  <td>
                  	<!-- Button trigger modal -->
					<button type="button" class="btn btn-success" data-toggle="modal" data-whatever="<?=$value->fil_id.'/'.$value->mtr_id.''?>" data-target="#myModal">
						 Nilai
					</button>

					<!-- Modal -->
					<div class="modal fade" id="myModal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
						    <div class="modal-content">
						    	<div class="modal-header">
								    <h5 class="modal-title" id="exampleModalLongTitle">Nilai dan Feedback</h5>
									    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
									    </button>
								</div>
							<div class="modal-body">
							<script type="text/javascript">
			 
  							</script>
  							
  							<form method="post" action="<?php echo base_url(); ?>dosen_materi/tgsnil/<?=$value->fil_id ?>">
  								<input type="hidden" name="mtr" value="<?php echo $value->mtr_id?>">
								Nilai :<br>
								<input type="number" name ="nilai" id="nilai" required/><br><br>
								Feedback :<br>
								<textarea style:width="500" name="feedback"></textarea><br>
								<button type="submit" class="btn btn-success">Simpan</button>
								<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
							</form>				        
							</div>
												     
							</div>
						</div>
					</div>
					<!-- Modal End -->
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
<script>
	$(document).ready(function(){
   		$('#mhs').DataTable();
	});
</script>