<script src="<?php echo base_url(); ?>assets/sweet-alert/js/sweetalert2.min.js"></script>
<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('admin_home')?>">Home</a></li>
								<li class="active">Materi</li>
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
                      <center><?=$this->session->flashdata('pesan');?></center>
											<!-- <a href="<?php echo site_url('admin_materi/add') ?>" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Materi</a>
 -->
				<hr>

				<table id="materi" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Pertemuan</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            
            <?php $i = 1;
              foreach ($materi as $key => $value) { ?>
                <tr class="odd gradeX">
                  <td><?php echo $i ?></td>
                  <td>Pertemuan <?php echo $value->pertemuan ?></td>
                  <td><?php echo $value->judul ?></td>
                  <td>
                      <a href="<?php echo site_url('admin_materi/edit/'.strEncrypt($value->lib_id).'') ?>"><button class="btn btn-warning btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit</button></a>
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
   		$('#materi').DataTable();
	});

  $(document).on("click",".confirm",function(){
        var mtr_id=$(this).attr("value");
        swal({
            title:"Hapus",
            text:"Yakin akan menghapus materi ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            closeOnConfirm: true,
        }).then(function(){
             $.ajax({
                url:"admin_materi/hapus/",
                type: "POST",
                data:{mtr_id:mtr_id},
                success: function(){
                    swal("Success!","Penghapusan materi berhasil","success");
                        setTimeout(function() {
                            window.location.href = "<?php echo site_url('admin_materi'); ?>";
                        }, 1000);
                }
             });
        });
    });
</script>