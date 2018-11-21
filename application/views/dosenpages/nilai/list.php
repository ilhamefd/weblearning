<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('Dosen_home')?>">Home</a></li>
								<li><a href="<?php echo site_url('Dosen_nilai')?>">Lihat Nilai</a></li>
								<li class="active">Data Nilai</li>
							</ol>
						</div>
						
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Data Nilai</h2>
								<div class="graph">
									<div class="block-page">
										<p>
											
				<hr>

				<table class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            
            <?php $i = 1;
              foreach ($mahasiswa as $key => $value) { ?>
                <tr class="odd gradeX">
                  <td><?php echo $i ?></td>
                  <td><?php echo $value->nim ?></td>
                  <td><?php echo $value->nama ?></td>
                  <td><?php echo $value->nilai ?></td>
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