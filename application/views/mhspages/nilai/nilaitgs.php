<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('Mhs_home')?>">Home</a></li>
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
				<table id="list" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Materi</th>
                <th>File Tugas</th>
                <th>Selesai dikumpulkan</th>
                <th>Nilai</th>
                <th>Feedback</th>
            </tr>
        </thead>
        <tbody>            
            <?php $i = 1;
              foreach ($tgs as $key => $value) { ?>
                <tr class="odd gradeX">
                  <td><?php echo $i ?></td>
                  <td><?php echo $value->judul ?></td>
                  <td><a href="<?php echo site_url('mhs_nilai/download/'.$value->nm_file.'') ?>"><?php echo $value->nm_file ?></a></td>
                  <td><?php echo $value->time ?></td>
                  <td><?php echo $value->nilai ?></td>
                  <td><?php echo $value->feedback ?></td>
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
      $('#list').DataTable();
  });
</script>