<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('admin_home')?>">Home</a></li>
								<li class="active">Matakuliah</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Matakuliah</h2>
								<div class="graph">
									<div class="block-page">
										<p>
											<a href="<?php echo site_url('admin_matkul/add') ?>" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Matakuliah</a>
				<hr>

				<table id="matakuliah" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Nama Matakuliah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            
            <?php $i = 1;
              foreach ($matkul as $key => $value) { ?>
                <tr class="odd gradeX">
                  <td><?php echo $i ?></td>
                  <td><?php echo $value->kd_mk ?></td>
                  <td><?php echo $value->nm_mk ?></td>
                  <td>
                      <a href="<?php echo site_url('admin_matkul/edit/'.strEncrypt($value->mku_id).'') ?>"><button class="btn btn-warning btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit</button></a>
                    
                      <button value="<?php echo $value->mku_id?>" class="btn btn-danger btn-sm confirm"><i class='fa fa-trash-o' aria-hidden='true'></i>Hapus</button>
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
   		$('#matakuliah').DataTable();
	});

  $(document).on("click",".confirm",function(){
        var mku_id=$(this).attr("value");
        swal({
            title:"Hapus",
            text:"Yakin akan menghapus data matakuliah ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            closeOnConfirm: true,
        }).then(function(){
             $.ajax({
                url:"admin_matkul/delete/",
                type: "POST",
                data:{mku_id:mku_id},
                success: function(){
                    swal("Success!","Penghapusan data matakuliah berhasil","success");
                        setTimeout(function() {
                            window.location.href = "<?php echo site_url('admin_matkul'); ?>";
                        }, 1000);
                }
             });
        });
    });
</script>