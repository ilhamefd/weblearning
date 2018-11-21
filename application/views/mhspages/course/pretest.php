<!--outter-wp-->
          <div class="outter-wp">
            <!--sub-heard-part-->
            <div class="sub-heard-part">
              <ol class="breadcrumb m-b-0">
                <li><a href="<?php echo site_url('mhs_home')?>">Home</a></li>
                <li class="active">Pre Test</li>
              </ol>
            </div>
            <hr>  
            <div class="graph-visual tables-main">
              <h2 class="inner-tittle">Pre Test</h2>
                <div class="graph">
                  <div class="block-page">
                    <p>
                       <div>
                        
        <form method="post" action="<?php echo base_url(); ?>mhs_course/correct_pre/">
        <input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
        <input type="hidden" name="kd_mk" value=<?php echo $mk; ?>>
        <input type="hidden" name="kd_dosen" value=<?php echo $dos; ?>>
        <input type="hidden" name="kd_prodi" value=<?php echo $prod; ?>>
        <input type="hidden" name="offering" value=<?php echo $off; ?>>
        <input type="hidden" name="pertemuan" value=<?php  echo $pert; ?>>
         <?php $i = 1;
              foreach ($soal as $key => $value) { ?>
                  <div class="col-md-12">
                    <div class="col-md-1">
                      <?php echo $i ?>.
                    </div>
                    <div class="col-md-11">
                      <?php echo $value->soal ?>
                    </div>
                  </div>
                   <input type="hidden" name="id[]" value=<?php echo $value->eva_id; ?>>
                   <input type="hidden" name="pilihan[<?php echo $value->eva_id ?>]" value="">
                  <div class="col-md-12">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-11">
                      <input type="radio" name="pilihan[<?php echo $value->eva_id ?>]" value="a"> A. <?php echo $value->a ?><br>
                      <input type="radio" name="pilihan[<?php echo $value->eva_id ?>]" value="b"> B. <?php echo $value->b ?><br>
                      <input type="radio" name="pilihan[<?php echo $value->eva_id ?>]" value="c"> C. <?php echo $value->c ?><br>
                      <input type="radio" name="pilihan[<?php echo $value->eva_id ?>]" value="d"> D. <?php echo $value->d ?><br>
                      <input type="radio" name="pilihan[<?php echo $value->eva_id ?>]" value="e"> E. <?php echo $value->e ?><br>
                      <br><br>
                    </div>
                  </div>      
            <?php $i++;
            } ?>
          <!--   <center><br><br><h4>Sudah Yakin Dengan Jawaban Anda?</h4> -->
            <br><center><button type="submit" onClick="return confirm('Apakah anda yakin dengan jawaban anda?')" class="btn btn-primary">Simpan</button></center><br><br><br>            
            <!-- <script>
var countdown = 30 * 60 * 1000;
var timerId = setInterval(function(){
  countdown -= 1000;
  var min = Math.floor(countdown / (60 * 1000));
  //var sec = Math.floor(countdown - (min * 60 * 1000));  // wrong
  var sec = Math.floor((countdown - (min * 60 * 1000)) / 1000);  //correct

  if (countdown <= 0) {
     alert("30 min!");
     clearInterval(timerId);
     //doSomething();
  } else {
     $("#countTime").html(min + " : " + sec);
  }

}, 1000); //1000ms. = 1sec.
</script> -->
          </form>
      </div>    
                                  
                    </p>
                  </div>
                    </div>
            </div>
            <!--//graph-visual-->
          </div>
        </div>
      </div>
      <!--Konten Utama