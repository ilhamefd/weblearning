<!--outter-wp-->
          <div class="outter-wp">
            <!--sub-heard-part-->
            <div class="sub-heard-part">
              <ol class="breadcrumb m-b-0">
                <li><a href="<?php echo site_url('mhs_home')?>">Home</a></li>
                <li><a href="<?php echo site_url('mhs_course')?>">Course</a></li>
                <li class="active">List</li>
              </ol>
            </div>
            <hr>  
            <div class="graph-visual tables-main">
              <h2 class="inner-tittle">List</h2>
                <div class="graph">
                  <div class="block-page">
                    <p>

                           <a href="<?php echo site_url('mhs_course') ?>" class="btn btn-warning"><i class="fa fa-undo" aria-hidden="true"></i> Kembali</a><br><br>
      
      <table id="list" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
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
                  <td>
                    
                    <?php 
                    if(empty($value->kuis)){
                      echo "Tidak Ada Quiz";
                    }else

                    {?>
                       <a href="<?php echo site_url('mhs_course/quiz/'.$value->kd_mk.'/'.$value->kd_dosen.'/'.$value->kd_prodi.'/'.$value->offering.'/'.$value->pertemuan.'/'.$value->kuis.'') ?>"><button class="btn btn-primary btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i>Quiz</button></a>
                    <?php } ?>
                      
                    </td>
                  <td>
                      <a href="<?php echo site_url('mhs_course/pre/'.$value->kd_mk.'/'.$value->kd_dosen.'/'.$value->kd_prodi.'/'.$value->offering.'/'.$value->pertemuan.'') ?>"><button class="btn btn-primary btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i>Pre-Test</button></a>
                      <a href="<?php echo site_url('mhs_course/detail/'.$value->mtr_id.'') ?>"><button class="btn btn-warning btn-sm"><i class='fa fa-book' aria-hidden='true'></i> Materi</button></a>
                      <a href="<?php echo site_url('mhs_course/pos/'.$value->kd_mk.'/'.$value->kd_dosen.'/'.$value->kd_prodi.'/'.$value->offering.'/'.$value->pertemuan.'') ?>"><button class="btn btn-danger btn-sm"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Post-Test</button></a>
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
