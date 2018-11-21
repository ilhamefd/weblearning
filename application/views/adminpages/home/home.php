<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="<?php echo site_url('admin_home')?>">Home</a></li>
								<li class="active">Dashboard</li>
							</ol>
						</div>
						<hr>
						<!--//sub-heard-part-->
						<!--Konten Utama-->	
						<div class="col-md-12">
							<h2 class="inner-tittle">Dashboard</h2>
								<div class="col-md-4">
									<div class="panel panel-primary" width=30%>
      									<div class="panel-heading">
      										<h1><i class="lnr lnr-users"></i></h1>
      											<?php echo $mhs;?> Mahasiswa
      									</div>
      									<div class="panel-footer" align="right">
      										<a href="<?php echo site_url('admin_mahasiswa')?>">Detail <i class="lnr lnr-arrow-right-circle"></i></a>
    									</div>
    								</div>
    							</div>
    							<div class="col-md-4">
									<div class="panel panel-primary" width=30%>
      									<div class="panel-heading">
      										<h1><i class="lnr lnr-book"></i></h1>
      											<?php echo $dsn; ?> Dosen
      									</div>
      									<div class="panel-footer" align="right">
      										<a href="<?php echo site_url('admin_dosen')?>">Detail <i class="lnr lnr-arrow-right-circle"></i></a>
    									</div>
    								</div>
    							</div>
    							<div class="col-md-4">
									<div class="panel panel-primary" width=30%>
      									<div class="panel-heading">
      										<h1><i class="lnr lnr-briefcase"></i></h1>
      											<?php echo $mk;	?> Mata Kuliah
      									</div>
      									<div class="panel-footer" align="right">
      										<a href="<?php echo site_url('admin_matkul')?>">Detail <i class="lnr lnr-arrow-right-circle"></i></a>
    									</div>
    								</div>
    							</div>
    					</div>		
					</div>
				</div>
			</div>
			<!--Konten Utama-->