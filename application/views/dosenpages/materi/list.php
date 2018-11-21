<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('Dosen_home')?>">Home</a></li>
								<li><a href="<?php echo site_url('Dosen_materi')?>">Matakuliah</a></li>
								<li class="active">List Materi</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">List Materi</h2>
								<div class="graph">
									<div class="block-page">
				
										<p>
        <?php $i = 1;
              foreach ($materi as $key => $value) { ?>
            <?php $i++<=16;
            } ?>     

				<a href="<?php echo site_url('dosen_materi/add/'.$kd_mk.'/'.$kd_prodi.'/'.$offering.'/'.$i.'') ?>" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Materi</a>
				<hr>
        <center><?=$this->session->flashdata('pesan');?></center>
				<table  id="list" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Pertemuan</th>
                <th>Judul</th>
                <th>Quiz</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
             <?php $i = 1;
              foreach ($materi as $key => $value) { ?>
                <tr class="odd gradeX">
                  <td><center><?php echo $value->pertemuan ?></center></td>
                  <td><?php echo $value->judul ?></td>
                  <td><?php echo $value->kuis ?></td>
                  <td>
                      <a href="<?php echo site_url('dosen_materi/detail/'.strEncrypt($value->mtr_id).'') ?>"><button class="btn btn-success btn-sm"><i class='fa fa-eye' aria-hidden='true'></i> Lihat Materi</button></a>
                      <a href="<?php echo site_url('dosen_materi/add_quiz/'.strEncrypt($value->mtr_id).'') ?>"><button class="btn btn-info btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Tambah Quiz</button></a>
                      <a href="<?php echo site_url('dosen_materi/cek_tugas/'.$value->mtr_id.'') ?>"><button class="btn btn-warning btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Cek Tugas</button></a>
                      <a href="<?php echo site_url('dosen_materi/updel/'.$value->mtr_id.'/'.$value->kd_mk.'/'.$value->kd_prodi.'/'.$value->offering.'/'.$value->library_id.'') ?>"><button class="btn btn-danger btn-sm"><i class='fa fa-trash-o' aria-hidden='true'></i> Hapus</button></a>

                      <!-- <button value="<?php echo $value->mtr_id.'/'.$value->kd_mk.'/'.$value->kd_prodi.'/'.$value->offering.'/'.$value->library_id.''?>" class="btn btn-danger btn-sm confirm"><i class='fa fa-trash-o' aria-hidden='true'></i>Hapus</button> -->
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
      $('#list').DataTable();
  });

  // $(document).on("click",".confirm",function(){
  //       var mtr_id=$(this).attr("value");
  //       swal({
  //           title:"Hapus",
  //           text:"Yakin akan menghapus materi ini?",
  //           type: "warning",
  //           showCancelButton: true,
  //           confirmButtonText: "Hapus",
  //           closeOnConfirm: true,
  //       }).then(function(){
  //            $.ajax({
  //               url:"<?php echo base_url(); ?>dosen_materi/delete/",
  //               type: "POST",
  //               data:{mtr_id:mtr_id},
  //               success: function(){
  //                   swal("Success!","Penghapusan materi berhasil","success");
  //                       setTimeout(function() {
  //                           window.location.href = "<?php echo site_url('dosen_materi/daftar/'.$value->kd_mk.'/'.$value->kd_prodi.'/'.$value->offering.''); ?>";
  //                       }, 1000);
  //               }
  //            });
  //       });
  //   });
</script>