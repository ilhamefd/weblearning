<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('Dosen_home')?>">Home</a></li>
								<li class="active">Mengajar</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Mengajar</h2>
								<div class="graph">
									<div class="block-page">
										<p>
											<a href="<?php echo site_url('dosen_mengajar/add') ?>" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data Mengajar</a>
				<hr>

				<table id="mengajar" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>Prodi</th>
                <th>OFF</th>
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
                     <!--  <a href="<?php echo site_url('dosen_mengajar/edit/'.strEncrypt($value->mgj_id).'') ?>"><button class="btn btn-warning btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit</button></a> -->
                    
                      <button value="<?php echo $value->mgj_id?>" class="btn btn-danger btn-sm confirm"><i class='fa fa-trash-o' aria-hidden='true'></i>Hapus</button>
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
   		$('#mengajar').DataTable();
	});

  $(document).on("click",".confirm",function(){
        var mgj_id=$(this).attr("value");
        swal({
            title:"Hapus",
            text:"Yakin akan menghapus data mengajar ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            closeOnConfirm: true,
        }).then(function(){
             $.ajax({
                url:"dosen_mengajar/delete/",
                type: "POST",
                data:{mgj_id:mgj_id},
                success: function(){
                    swal("Success!","Penghapusan data mengajar berhasil","success");
                        setTimeout(function() {
                            window.location.href = "<?php echo site_url('dosen_mengajar'); ?>";
                        }, 1000);
                }
             });
        });
    });
</script>