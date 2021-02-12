<section id="breadcrumbs" class="breadcrumbs">
	<div class="container">
		<div class="content-wrapper">
			<div class="container">
				<div class="row aos-init aos-animate" data-aos="fade-up">
					<div class="col-sm-12 grid-margin">
						<div class="card">
							<div class="card-body">
								<h1 id=judul><?php echo $iklan->judul ?></h1>
								<div style="margin-top:10px;">
									<small><?php echo date("d F Y", strtotime($iklan->created)) ?> - Administrator</small>
								</div>
								<hr>
								<?php if ($iklan->video != NULL) { ?>
									<?php echo $iklan->video ?>
								<?php } ?>
								<div>
									<?php echo $iklan->informasi ?>
								</div>
								<br>
								<div class="owl-carousel image-carousel">
									<?php foreach ($poster as $row) { ?>
										<center>
											<img src="<?php echo base_url('assets/upload/iklan/' . $row->file) ?>" alt="" style="width:500px;">
										</center>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>