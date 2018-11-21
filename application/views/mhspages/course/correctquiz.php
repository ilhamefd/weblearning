<!--outter-wp-->
          <div class="outter-wp">
            <!--sub-heard-part-->
            <div class="sub-heard-part">
              <ol class="breadcrumb m-b-0">
                <li><a href="<?php echo site_url('mhs_home')?>">Home</a></li>
                <li class="active">Hasil Quiz</li>
              </ol>
            </div>
            <hr>  
                    <p>
                      <center><?=$this->session->flashdata('pesan');?></center>
                       <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="panel panel-info">
            <div class="panel-heading"><center><h3><strong>Hasil Quiz</strong></h3></center></div>
            <div class="panel-body">
              <center>
              <table>
                <tr>
                  <td><h3>Tidak Dijawab</h3></td>
                  <td><h3>&nbsp : &nbsp</h3></td>
                  <td><h3><?php echo $kosong; ?></h3></td>
                </tr>
                <tr>
                  <td><h3>Salah</h3></td>
                  <td><h3>&nbsp : &nbsp</h3></td>
                  <td><h3><?php echo $salah; ?></h3></td>
                </tr>
                <tr>
                  <td><h3>Benar</h3></td>
                  <td><h3>&nbsp : &nbsp</h3></td>
                  <td><h3><?php echo $benar; ?></h3></td>
                </tr>
                <tr>
                  <td><h3>Nilai</h3></td>
                  <td><h3>&nbsp : &nbsp</h3></td>
                  <td><h3><?php echo $score; ?></h3></td>
                </tr>
              </table>
              </center>
            </div>
            <div class="panel-footer"><a href="<?php echo base_url('mhs_course')?>"><center><button class="btn btn-primary">Lanjut <i class="fa fa-arrow-circle-right"></i></button></center></a></div>
          </div>
           <br><br><br><br>
        </div>    
        <div class="col-md-4"></div>
                                  
                    </p>
                 
            <!--//graph-visual-->
          </div>
        </div>
      </div>
      <!--Konten Utama-->
