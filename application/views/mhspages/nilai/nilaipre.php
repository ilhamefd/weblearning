<!--outter-wp-->
          <div class="outter-wp">
            <!--sub-heard-part-->
            <div class="sub-heard-part">
              <ol class="breadcrumb m-b-0">
                <li><a href="<?php echo site_url('mhs_home')?>">Home</a></li>
                <li><a href="<?php echo site_url('mhs_nilai')?>">Nilai</a></li>
                <li class="active">Nilai Pre Test</li>
              </ol>
            </div>
            <hr>  
            <div class="graph-visual tables-main">
              <h2 class="inner-tittle">Nilai Pre Test</h2>
                <div class="graph">
                  <div class="block-page">
                    <p>

                           <center><a href="<?php echo site_url('mhs_nilai') ?>" class="btn btn-warning"><i class="fa fa-undo" aria-hidden="true"></i> Kembali</a></center><br><br>
      <table class="table dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Pertemuan</th>
                <th>Nilai Pre Test<th>
            </tr>
        </thead>
        <tbody>
            
          
                <tr class="odd gradeX">
              <?php $i = 1;
              foreach ($pre as $key => $value) { ?>
                  <td>Pertemuan <?php echo $value->pertemuan ?></td>
                  <td><?php echo $value->nilai ?></td>
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
      <!--Konten Utama