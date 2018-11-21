<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('Dosen_home')?>">Home</a></li>
								<li class="active">Soal</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Soal</h2>
								<div class="graph">
									<div class="block-page">
										<p>
											
				<hr>

				<table id="soal" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
                <th>Soal</th>
                <th>Jawaban A</th>
                <th>Jawaban B</th>
                <th>Jawaban C</th>
                <th>Jawaban D</th>
                <th>Jawaban E</th>
                <th>Kunci</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            
            <?php $i = 1;
              foreach ($eval as $key => $value) { ?>
                <tr class="odd gradeX">
                  <td></td>
                  <td><?php echo $value->soal ?></td>
                  <td><?php echo $value->a ?></td>
                  <td><?php echo $value->b ?></td>
                  <td><?php echo $value->c ?></td>
                  <td><?php echo $value->d ?></td>
                  <td><?php echo $value->e ?></td>                  
                  <td><?php echo $value->kunci ?></td>
                  <td>
                      <a href="<?php echo site_url('dosen_soal/edit/'.strEncrypt($value->eva_id).'') ?>"><button class="btn btn-warning btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit</button></a>
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
   		$('#soal').DataTable();
	});

  // $(document).on("click",".confirm",function(){
  //       var mgj_id=$(this).attr("value");
  //       swal({
  //           title:"Hapus",
  //           text:"Yakin akan menghapus data mengajar ini?",
  //           type: "warning",
  //           showCancelButton: true,
  //           confirmButtonText: "Hapus",
  //           closeOnConfirm: true,
  //       }).then(function(){
  //            $.ajax({
  //               url:"dosen_mengajar/delete/",
  //               type: "POST",
  //               data:{mgj_id:mgj_id},
  //               success: function(){
  //                   swal("Success!","Penghapusan data mengajar berhasil","success");
  //                       setTimeout(function() {
  //                           window.location.href = "<?php echo site_url('dosen_mengajar'); ?>";
  //                       }, 1000);
  //               }
  //            });
  //       });
  //   });
</script>