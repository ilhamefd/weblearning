<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('Dosen_home')?>">Home</a></li>
								<li><a href="<?php echo site_url('Dosen_materi')?>">Matakuliah</a></li>
								<li class="active">Materi</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
								<div class="graph">
									<div class="block-page">
										<p>
											<center><?=$this->session->flashdata('pesan');?></center>
											<?php $i = 1;
							              	foreach ($materi as $key => $value) { ?>
							                
							                  <h3>Pertemuan <?php echo $value->pertemuan ?></h3>
							                  <center><h2><?php echo $value->judul ?></h2></center>
							                  <hr>
							                  <?php echo $value->konten ?>
							            	<?php $i++;
							            	} ?>            
										</p>
										<hr>
										<strong>Tambahkan Pesan</strong><br><br>

										<form id="addkomentar" method="post" action="<?php echo base_url(); ?>dosen_materi/add_komen/<?=$value->mtr_id?>"">
											<textarea name="add_komen" id="myTextarea"></textarea>
											<br>
											<button type="submit" class="btn btn-success">Simpan</button>
										</form>
										<br><hr>
										<strong>Komentar</strong>
											<?php $i = 1;
							              	foreach ($komentar as $key => $value) { ?>
							              		<hr>
							                 	<strong><?php echo "<br>".$value->nim ?></strong><br>
							                 	<p><?php echo $value->komentar ?></p>
							                 	
							                 	<!-- Button trigger modal -->
												<button type="button" class="btn btn-success" data-toggle="modal" data-whatever="<?=$value->id_komen?>" data-target="#myModal">
												 Balas
												</button>

												<!-- Modal -->
												<div class="modal fade" id="myModal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												  <div class="modal-dialog modal-dialog-centered" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <h5 class="modal-title" id="exampleModalLongTitle">Balasan</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
												      <div class="modal-body">
												      	<script type="text/javascript">
		  

		 
  		</script>
												        <form id="addbalasan" method="post" action="<?php echo base_url(); ?>dosen_materi/add_balasan/<?=$value->mtr_id?>">
												        	<input type="hidden" name ="id_bls" id="balasan-kode"/><br>
															<textarea name="add_balasan"></textarea><br>
														<button type="submit" class="btn btn-success">Simpan</button>
														 <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
														</form>
												        
												      </div>
												     
												    </div>
												  </div>
												</div>
												<!-- Modal End -->
							                 	<hr>
							                 	<strong>Balasan</strong>
							                 		<?php $i = 1;
							                 		foreach ($balasan as $keyb => $val) {
							                 			if($val->id_balasan == $value->id_komen) {
							                 				echo "<br><strong>".$val->nim."</strong>";
							                 				echo "<br>".$val->komentar."<br>";
							                 			}
							                 				?>
							            			<?php $i++;
							            			} ?>      
							            	<?php $i++;
							            	} ?>       
									</div>
						        </div>
						</div>
						<!--//graph-visual-->
					</div>
				</div>
			</div>
			<!--Konten Utama-->


<script>
	tinymce.init({
		    selector: 'textarea',
		    file_browser_callback_types: 'file image media',
		    theme: 'modern',
		    height: 200,
		    plugins: [
		      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
		      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
		      'save table contextmenu directionality emoticons template paste textcolor',
		      'image',
		    ],
		    content_css: 'css/content.css',
		    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
		  });

  $('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  //modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)

})

	// $(document).ready(function(){
	// 	$('#addkomentar').on('submit', function(e){
	// 		e.preventDefault();

	// 		var $this 	= $(this),
	// 			url 	= $this.attr('action'),
	// 			data 	= $this.serialize();

	// 		$.ajax({
	// 			url 	: url,
	// 			type 	: 'post',
	// 			dataType: 'json',
	// 			data 	: data,
	// 			success : function(data) {
	// 				if(data.sts == 1) {
	// 					$.notify({message: data.msg},{type:'success'});
	// 					setTimeout(function() {
 //                            window.location.href = "<?php echo site_url('dosen_materi/detail/'.strEncrypt($value->mtr_id).''); ?>";
 //                        }, 2000);
	// 				} else {
	// 					$.notify({message: data.msg},{type:'danger'});
	// 				}
	// 			},
	// 			error 	: function(data) {
	// 				$.notify('Error', 'Internal Server Error !', 'error');
	// 			}
	// 		});
	// 	});
	// });
</script>
