<!--outter-wp-->
          <div class="outter-wp">
            <!--sub-heard-part-->
            <div class="sub-heard-part">
              <ol class="breadcrumb m-b-0">
                <li><a href="<?php echo site_url('mhs_home')?>">Home</a></li>
                <li class="active">Course</li>
              </ol>
            </div>
            <hr>  
            <div class="graph-visual tables-main">
              <h2 class="inner-tittle">Course</h2>
                <div class="graph">
                  <div class="block-page">
                    <p>

 <center><?=$this->session->flashdata('pesan');?></center>
      <a href="<?php echo site_url('mhs_course/add') ?>" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Course</a><br><br>
      <table id="list" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Matakuliah</th>
                <th>Kode Dosen</th>
                <th>Prodi</th>
                <th>Offering</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            
            <?php $i = 1;
              foreach ($ambmk as $key => $value) { ?>
                <tr class="odd gradeX">
                  <td><?php echo $i ?></td>
                  <td><?php echo $value->kd_mk ?></td>
                  <td><?php echo $value->nm_mk ?></td>
                  <td><?php echo $value->kd_dosen ?></td>
                  <td><?php echo $value->kd_prodi ?></td>
                  <td><?php echo $value->offering ?></td>
                  <td>
                      <a href="<?php echo site_url('mhs_course/daftar/'.$value->kd_mk.'/'.$value->kd_dosen.'/'.$value->kd_prodi.'/'.$value->offering.'') ?>"><button class="btn btn-primary btn-sm"><i class='fa fa-book' aria-hidden='true'></i> Lihat</button></a>
                      <button value="<?php echo $value->abl_id?>" class="btn btn-danger btn-sm confirm"><i class='fa fa-ban' aria-hidden='true'></i> Batalkan</button>
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

  $(document).on("click",".confirm",function(){
        var abl_id=$(this).attr("value");
        swal({
            title:"Batalkan",
            text:"Yakin akan membatalkan course ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Batalkan",
            closeOnConfirm: true,
        }).then(function(){
             $.ajax({
                url:"mhs_course/batalkan/",
                type: "POST",
                data:{abl_id:abl_id},
                success: function(){
                    swal("Success!","Pembatalan Course Berhasil","success");
                        setTimeout(function() {
                            window.location.href = "<?php echo site_url('mhs_course'); ?>";
                        }, 1000);
                }
             });
        });
    });
</script>