<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('Dosen_home')?>">Home</a></li>
								<li><a href="<?php echo site_url('Dosen_library')?>">Library</a></li>
								<li class="active">Library view</li>
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
							              	foreach ($library as $key => $value) { ?>
							                  <center><h2><?php echo $value->judul ?></h2></center>
							                  <hr>
							                  <?php echo $value->konten ?>
							            	<?php $i++;
							            	} ?>            
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
</script>
