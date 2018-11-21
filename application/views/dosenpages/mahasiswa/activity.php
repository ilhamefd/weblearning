<!--outter-wp-->
          <div class="outter-wp">
            <!--sub-heard-part-->
            <div class="sub-heard-part">
              <ol class="breadcrumb m-b-0">
                <li><a href="<?php echo site_url('dosen_home')?>">Home</a></li>
                <li class="active">Aktifitas</li>
              </ol>
            </div>
            <hr>  
            <div class="graph-visual tables-main">
                <div class="graph">
                  <div class="block-page">
                    <p>
                      <h2 class="inner-tittle">Materi</h2>
                      <table id="logmateri" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul Materi</th>
                                <th>Keterangan</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php $i = 1;
                              foreach ($logmateri as $key => $value) { ?>
                                <tr class="odd gradeX">
                                  <td><?php echo $i ?></td>
                                  <td><?php echo $value->judul ?></td>
                                  <td><?php echo $value->keterangan ?></td>
                                  <td><?php echo $value->time ?></td>
                                </tr>    
                            <?php $i++;
                            } ?>            
                           
                        </tbody>
                      </table>  
                      <br><hr><br>

                      <h2 class="inner-tittle">Pre Test</h2>
                      <table id="logpre" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Pertemuan</th>
                                <th>Keterangan</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php $i = 1;
                              foreach ($logpos as $key => $value) { ?>
                                <tr class="odd gradeX">
                                  <td><?php echo $i ?></td>
                                  <td>Pertemuan <?php echo $value->pertemuan ?></td>
                                  <td><?php echo $value->keterangan ?></td>
                                  <td><?php echo $value->time ?></td>
                                </tr>    
                            <?php $i++;
                            } ?>            
                           
                        </tbody>
                      </table>
                      <br><hr><br>  
                      
                      <h2 class="inner-tittle">Post Test</h2>
                      <table id="logpos" class="table table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Pertemuan</th>
                                <th>Keterangan</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php $i = 1;
                              foreach ($logpos as $key => $value) { ?>
                                <tr class="odd gradeX">
                                  <td><?php echo $i ?></td>
                                  <td>Pertemuan <?php echo $value->pertemuan ?></td>
                                  <td><?php echo $value->keterangan ?></td>
                                  <td><?php echo $value->time ?></td>
                                </tr>    
                            <?php $i++;
                            } ?>            
                           
                        </tbody>
                      </table>
                      <br><hr><br>

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
      $('#logmateri').DataTable();
  });
      $(document).ready(function(){
      $('#logpre').DataTable();
  });
      $(document).ready(function(){
      $('#logpos').DataTable();
  });
</script>