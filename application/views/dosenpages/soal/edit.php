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
							<h2 class="inner-tittle">Edit Soal</h2><hr>

<form action="<?php echo base_url(); ?>dosen_soal/act_edit/<?=$eva_id?>" method="post" enctype="multipart/form-data">

	<div class="col-md-12 form-group1 group-mail">
		<div class="col-md-2">
			<label class="control-label">Soal : </label>
		</div>
		<div class="col-md-10">
			<textarea id="myTextarea" name="soal" required><?php echo $eval[0]->soal; ?></textarea>
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="col-md-12 form-group1 group-mail">
		<div class="col-md-2">
			<label class="control-label">Jawaban A : </label>
		</div>
		<div class="col-md-8">
			<input type="text" name="jawabana" value="<?php echo $eval[0]->a; ?>" required>
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="col-md-12 form-group1 group-mail">
		<div class="col-md-2">
			<label class="control-label">Jawaban B : </label>
		</div>
		<div class="col-md-8">
			<input type="text" name="jawabanb" value="<?php echo $eval[0]->b; ?>" required>
		</div>
	</div>
	<div class="clearfix"></div>
	
	<div class="col-md-12 form-group1 group-mail">
		<div class="col-md-2">
			<label class="control-label">Jawaban C : </label>
		</div>
		<div class="col-md-8">
			<input type="text" name="jawabanc" value="<?php echo $eval[0]->c; ?>" required>
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="col-md-12 form-group1 group-mail">
		<div class="col-md-2">
			<label class="control-label">Jawaban D : </label>
		</div>
		<div class="col-md-8">
			<input type="text" name="jawaband" value="<?php echo $eval[0]->d; ?>" required>
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="col-md-12 form-group1 group-mail">
		<div class="col-md-2">
			<label class="control-label">Jawaban E : </label>
		</div>
		<div class="col-md-8">
			<input type="text" name="jawabane" value="<?php echo $eval[0]->e; ?>" required>
		</div>
	</div>
	<div class="clearfix"></div>

		<div class="col-md-12 form-group1 group-mail">
			<div class="col-md-2">
				<label class="control-label">Kunci Jawaban : </label>
			</div>
			<br>
			<div class="col-md-8">
				<div class="radio-inline"><input type="radio" name="kunci" value="a" <?php if($eval[0]->kunci=='a'){?> checked=checked <?php } ?>> A </div>
				<div class="radio-inline"><input type="radio" name="kunci" value="b" <?php if($eval[0]->kunci=='b'){?> checked=checked <?php } ?>> B </div>
				<div class="radio-inline"><input type="radio" name="kunci" value="c" <?php if($eval[0]->kunci=='c'){?> checked=checked <?php } ?>> C </div>
				<div class="radio-inline"><input type="radio" name="kunci" value="d" <?php if($eval[0]->kunci=='d'){?> checked=checked <?php } ?>> D </div>
				<div class="radio-inline"><input type="radio" name="kunci" value="e" <?php if($eval[0]->kunci=='e'){?> checked=checked <?php } ?>> E </div>
			</div>
		</div>
		<div class="clearfix"></div>

<input type="submit" name="" value="Simpan"><br>
</form>
    					</div>			
					</div>
				</div>
			</div>
			<!--Konten Utama-->




										