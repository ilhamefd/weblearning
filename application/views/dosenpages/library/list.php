<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('Dosen_home')?>">Home</a></li>
								<li class="active">Library</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Library</h2>
								<div class="graph">
									<div class="block-page">
										<p>
											<a href="<?php echo site_url('dosen_library/add/'.$kd_mku.'') ?>" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Library</a>
				<hr>
        <center><?=$this->session->flashdata('pesan');?></center>
				<table id="library" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            
            <?php $i = 1;
              foreach ($library as $key => $value) { ?>
                <tr class="odd gradeX">
                  <td><?php echo $i ?></td>
                  <td><?php echo $value->judul ?></td>
                  <td>
                      <a href="<?php echo site_url('dosen_library/view/'.strEncrypt($value->lib_id).'') ?>"><button class="btn btn-primary btn-sm"><i class='fa fa-eye' aria-hidden='true'></i> Lihat</button></a>
                      
                      <a href="<?php echo site_url('dosen_library/edit/'.strEncrypt($value->lib_id).'') ?>"><button class="btn btn-warning btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit</button></a>
                      
                       <a href="<?php echo site_url('dosen_library/delete/'.$value->lib_id.'/'.$kd_mku.'') ?>"><button class="btn btn-danger btn-sm"><i class='fa fa-trash-o' aria-hidden='true'></i> Hapus</button></a>
                     <!--  <button value="<?php echo $value->lib_id?>" class="btn btn-danger btn-sm confirm"><i class='fa fa-trash-o' aria-hidden='true'></i>Hapus</button> -->
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
   		$('#library').DataTable();
	});

  // $(document).on("click",".confirm",function(){
  //       var lib_id=$(this).attr("value");
  //       swal({
  //           title:"Hapus",
  //           text:"Yakin akan menghapus library ini?",
  //           type: "warning",
  //           showCancelButton: true,
  //           confirmButtonText: "Hapus",
  //           closeOnConfirm: true,
  //       }).then(function(){
  //            $.ajax({
  //               url:"dosen_library/delete",
  //               type: "POST",
  //               data:{lib_id:lib_id},
  //               success: function(){
  //                   swal("Success!","Penghapusan library berhasil","success");
  //                       setTimeout(function() {
  //                           window.location.href = "<?php echo site_url('dosen_library/daftar/'.$kd_mku.''); ?>";
  //                       }, 1000);
  //               }
  //            });
  //       });
  //   });
</script>