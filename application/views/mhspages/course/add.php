<!--outter-wp-->
          <div class="outter-wp">
            <!--sub-heard-part-->
            <div class="sub-heard-part">
              <ol class="breadcrumb m-b-0">
                <li><a href="<?php echo site_url('mhs_home')?>">Home</a></li>
                <li><a href="<?php echo site_url('mhs_course')?>">Course</a></li>
                <li class="active">Ambil Course</li>
              </ol>
            </div>
            <hr>  
            <div class="graph-visual tables-main">
              <h2 class="inner-tittle">Ambil Course</h2>
                <div class="graph">
                  <div class="block-page">
                    <p>

                      <a href="<?php echo site_url('mhs_course') ?>" class="btn btn-warning"><i class="fa fa-undo" aria-hidden="true"></i> Kembali</a><br><br>
      <table id="listc" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
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
                      <a href="<?php echo site_url('mhs_course/act_add/'.($value->kd_mk).'/'.($value->kd_dosen).'/'.($value->kd_prodi).'/'.($value->offering).'') ?>"><button class="btn btn-success btn-sm" id="addcourse"><i class='fa fa-plus-square' aria-hidden='true'></i> Ambil</button></a>
                    
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
      $('#listc').DataTable();
     });
</script>