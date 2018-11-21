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
						<div class="col-md-12">
							<h2 class="inner-tittle">Soal</h2><hr>
						

<?php
$jumlah = $_POST['jumlah'];
$tujuan = $_POST['tujuan'];
if($_POST['jumlah'])

{

?>

<form action="<?php echo base_url(); ?>dosen_soal/act_add" method="post" enctype="multipart/form-data">
	<?php
		$jumlah = $_POST['jumlah'];
		for($a=1;$a<=$jumlah;$a++)
		{

	?>
	<script type="text/javascript">
		  tinymce.init({
			  selector: '#myTextarea<?php echo $a; ?>',
			  plugins: 'image code advlist autolink link lists print preview hr anchor pagebreak spellchecker searchreplace wordcount visualblocks visualchars fullscreen insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor',
			  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code | print preview media fullpage | forecolor backcolor emoticons',
			  // enable title field in the Image dialog
			  image_title: true, 
			  // enable automatic uploads of images represented by blob or data URIs
			  automatic_uploads: true,

			  file_browser_callback: function(field, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: '/weblearning/assets/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'KCFinder',
            width: 700,
            height: 500,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    }
			});
		
  		</script>
	<br><br><br>
	<b>Soal – <?php echo $a; ?></b><br>
	<input type="hidden" name="kodemakul<?php echo $a; ?>" value="<?php echo $kd_m; ?>">
	<input type="hidden" name="kodedos<?php echo $a; ?>" value="<?php echo $kd_do; ?>">
	<input type="hidden" name="prodi<?php echo $a; ?>" value="<?php echo $pro; ?>">
	<input type="hidden" name="pertemuan<?php echo $a; ?>" value="<?php echo $per; ?>">
	<input type="hidden" name="jenis<?php echo $a; ?>" value="<?php echo $jen; ?>">
	<input type="hidden" name="jumlah" value="<?php echo $jum; ?>">

	<div class="col-md-12 form-group1 group-mail">
		<div class="col-md-2">
			<label class="control-label"> Tujuan : </label>				
		</div>
		<div class="col-md-3">
			<select name="tujuan<?php echo $a; ?>" class="form-control1" select-style select-style-bottom required>
					<option value=""> - Pilih Tujuan Pembelajaran - </option>	
					<?php  
						for ($x = 1; $x <= $tujuan; $x++) {
  							echo "<option value='".$x."'> ".$x."</option>";
						}
					?>  
				</select>
		</div>
	</div>

	<div class="col-md-12 form-group1 group-mail">
		<div class="col-md-2">
			<label class="control-label">Soal : </label>
		</div>
		<div class="col-md-10">
			<textarea id="myTextarea<?php echo $a; ?>" name="soal<?php echo $a; ?>"></textarea>
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="col-md-12 form-group1 group-mail">
		<div class="col-md-2">
			<label class="control-label">Jawaban A : </label>
		</div>
		<div class="col-md-8">
			<input type="text" name="jawabana<?php echo $a; ?>">
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="col-md-12 form-group1 group-mail">
		<div class="col-md-2">
			<label class="control-label">Jawaban B : </label>
		</div>
		<div class="col-md-8">
			<input type="text" name="jawabanb<?php echo $a; ?>">
		</div>
	</div>
	<div class="clearfix"></div>
	
	<div class="col-md-12 form-group1 group-mail">
		<div class="col-md-2">
			<label class="control-label">Jawaban C : </label>
		</div>
		<div class="col-md-8">
			<input type="text" name="jawabanc<?php echo $a; ?>">
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="col-md-12 form-group1 group-mail">
		<div class="col-md-2">
			<label class="control-label">Jawaban D : </label>
		</div>
		<div class="col-md-8">
			<input type="text" name="jawaband<?php echo $a; ?>">
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="col-md-12 form-group1 group-mail">
		<div class="col-md-2">
			<label class="control-label">Jawaban E : </label>
		</div>
		<div class="col-md-8">
			<input type="text" name="jawabane<?php echo $a; ?>">
		</div>
	</div>
	<div class="clearfix"></div>

		<div class="col-md-12 form-group1 group-mail">
			<div class="col-md-2">
				<label class="control-label">Kunci Jawaban : </label>
			</div>
			<br>
			<div class="col-md-8">
				<div class="radio-inline"><input type="radio" name="kunci<?php echo $a; ?>" value="a"> A </div>
				<div class="radio-inline"><input type="radio" name="kunci<?php echo $a; ?>" value="b"> B </div>
				<div class="radio-inline"><input type="radio" name="kunci<?php echo $a; ?>" value="c"> C </div>
				<div class="radio-inline"><input type="radio" name="kunci<?php echo $a; ?>" value="d"> D </div>
				<div class="radio-inline"><input type="radio" name="kunci<?php echo $a; ?>" value="e"> E </div>
			</div>
		</div>
		<div class="clearfix"></div>

	<?php
		}
	?>
<input type="submit" name="" value="Simpan"><br>
</form>

	<?php
	}
?>

    							
    					</div>			
					</div>
				</div>
			</div>
			<!--Konten Utama-->




										