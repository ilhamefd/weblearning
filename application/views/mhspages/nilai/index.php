<!--outter-wp-->
          <div class="outter-wp">
            <!--sub-heard-part-->
            <div class="sub-heard-part">
              <ol class="breadcrumb m-b-0">
                <li><a href="<?php echo site_url('mhs_home')?>">Home</a></li>
                <li class="active">Nilai</li>
              </ol>
            </div>
            <hr>  
            <div class="graph-visual tables-main">
              <h2 class="inner-tittle">Nilai</h2>
                <div class="graph">
                  <div class="block-page">
                    <p>

 <center><?=$this->session->flashdata('pesan');?></center>
      <table id="list" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Matakuliah</th>
                <th>Kode Dosen</th>
                <th>Nilai</th>
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
                  <td>
                      <a href="<?php echo site_url('mhs_nilai/daftarpre/'.strEncrypt($value->kd_mk).'/'.strEncrypt($value->kd_dosen).'') ?>"><button class="btn btn-success btn-sm"><i class='fa fa-pencil' aria-hidden='true'></i> Pre Test</button></a>
                      <a href="<?php echo site_url('mhs_nilai/daftarpos/'.strEncrypt($value->kd_mk).'/'.strEncrypt($value->kd_dosen).'') ?>"><button class="btn btn-danger btn-sm"><i class='fa fa-pencil' aria-hidden='true'></i> Post Test</button></a>
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

</script>