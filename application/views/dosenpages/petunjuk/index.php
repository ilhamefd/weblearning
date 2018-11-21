<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('Dosen_home')?>">Home</a></li>
								<li class="active">Petunjuk</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->			
						<div class="graph-visual tables-main">
							<h2 class="inner-tittle">Petunjuk</h2>
								<div class="graph">
									<div class="block-page">

										<p>
											<!-- <base href="http://localhost:800/weblearning"> -->
										 <?php $i = 1;
							              foreach ($petunjuk as $key => $value) { ?>
							                <?php echo $value->isi ?>
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
