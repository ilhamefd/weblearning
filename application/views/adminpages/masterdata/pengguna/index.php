<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('admin_home')?>">Home</a></li>
								<li class="active">Pengguna</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Pengguna</h2>
								<div class="graph">
									<div class="block-page">
										<p>
											<a href="<?php echo site_url('admin_pengguna/add') ?>" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Pengguna</a>
				<hr>

				<table id="pengguna" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            
            <?php $i = 1;
              foreach ($pengguna as $key => $value) { ?>
                <tr class="odd gradeX">
                  <td><?php echo $i ?></td>
                  <td><?php echo $value->username ?></td>
                  <td><?php echo $value->level ?></td>
                  <td>
                      <!-- <a href="<?php echo site_url('admin_pengguna/edit/'.strEncrypt($value->usr_id).'') ?>"><button class="btn btn-warning btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit</button></a> -->
                    
                      <button value="<?php echo $value->usr_id?>" class="btn btn-danger btn-sm confirm"><i class='fa fa-trash-o' aria-hidden='true'></i>Hapus</button>
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
   		$('#pengguna').DataTable();
	});

  $(document).on("click",".confirm",function(){
        var usr_id=$(this).attr("value");
        swal({
            title:"Hapus",
            text:"Yakin akan menghapus data pengguna ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            closeOnConfirm: true,
        }).then(function(){
             $.ajax({
                url:"admin_pengguna/delete/",
                type: "POST",
                data:{usr_id:usr_id},
                success: function(){
                    swal("Success!","Penghapusan data pengguna berhasil","success");
                        setTimeout(function() {
                            window.location.href = "<?php echo site_url('admin_pengguna'); ?>";
                        }, 1000);
                }
             });
        });
    });
</script>