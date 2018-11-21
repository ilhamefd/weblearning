<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('admin_home')?>">Home</a></li>
								<li class="active">Dosen</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Dosen</h2>
								<div class="graph">
									<div class="block-page">
										<p>
											<a href="<?php echo site_url('admin_dosen/add') ?>" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Dosen</a>
				<hr>

				<table id="dosen" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Email</th>
                <th>Aksi</th>

            </tr>
        </thead>
        <tbody>
            
            <?php $i = 1;
              foreach ($dosen as $key => $value) { ?>
                <tr class="odd gradeX">
                  <td><?php echo $i ?></td>
                  <td><?php echo $value->kd_dosen ?></td>
                  <td><?php echo $value->nm_dosen ?></td>
                  <td><center><?php echo $value->jk ?></center></td>
                  <td><?php echo tgl_indo($value->tgl_lahir) ?></td>
                  <td><?php echo $value->alamat ?></td>
                  <td><?php echo $value->hp ?></td>
                  <td><?php echo $value->email ?></td>
                  <td>
                      <a href="<?php echo site_url('admin_dosen/edit/'.strEncrypt($value->dsn_id).'') ?>"><button class="btn btn-warning btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit</button></a>
                    
                      <button value="<?php echo $value->kd_dosen?>" class="btn btn-danger btn-sm confirm"><i class='fa fa-trash-o' aria-hidden='true'></i>Hapus</button>
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
   		$('#dosen').DataTable();
	});

  $(document).on("click",".confirm",function(){
        var kd_dosen=$(this).attr("value");
        swal({
            title:"Hapus",
            text:"Yakin akan menghapus data dosen ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            closeOnConfirm: true,
        }).then(function(){
             $.ajax({
                url:"admin_dosen/delete/",
                type: "POST",
                data:{kd_dosen:kd_dosen},
                success: function(){
                    swal("Success!","Penghapusan data dosen berhasil","success");
                        setTimeout(function() {
                            window.location.href = "<?php echo site_url('admin_dosen'); ?>";
                        }, 1000);
                }
             });
        });
    });
</script>