<section id="breadcrumbs" class="breadcrumbs">
	<div class="container">
		<div class="content-wrapper">
			<div class="container">
				<div class="row aos-init aos-animate" data-aos="fade-up">
					<div class="col-sm-12 grid-margin">
						<div class="card">
							<div class="card-body">
								<img src="<?php echo base_url('assets/upload/post/' . $artikel->gambar) ?>" alt="" style="width: 1040px;height:auto;">
								<br>
								<br>
								<h2 id=judul><?php echo $artikel->judul ?></h2>
								<div style="margin-top:10px;">
									<small><?php echo date("d M Y", strtotime($artikel->created)) ?></small> - <i><?php echo $artikel->user_post ?></i>
								</div>
								<br>
								<div>
									<?php echo $artikel->headline ?>
								</div>
								<br>
								<div>
									<?php echo $artikel->konten ?>
								</div>
								<br>
								<center>
									<div class="owl-carousel owl-theme">
										<div class="item" style="width:500px;height:auto;"><img class="d-block w-100" src="<?php echo site_url("assets/upload/post/" . $artikel->gambar) ?>" style="background-size:cover;background-repeat:no-repeat;background-position: center center;" /></div>
										<div class="item" style="width:500px;height:auto;"><img class="d-block w-100" src="<?php echo site_url("assets/upload/post/" . $artikel->gambar) ?>" style="width:500px;height:auto;" /></div>
									</div>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>