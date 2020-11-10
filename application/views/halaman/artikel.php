<div class="content-wrapper">
    <div class="container">
		<div class="row aos-init aos-animate" data-aos="fade-up">
			<div class="col-sm-12 grid-margin">
				<div class="card">
					<div class="card-body">
                        <center>
                            <img width="1000px" src="<?php echo site_url("assets/upload/post/".$artikel->gambar) ?>"/>
						</center>
						<br>
						<h1 id=judul><?php echo $artikel->judul ?></h1>
                        <div style="margin-top:10px;">
							<small><?php echo date("d M Y",strtotime($artikel->created)) ?></small> - <i><?php echo $artikel->user_post ?></i>    
						</div>
						<br>
						<div>
                            <?php echo $artikel->headline ?>
                        </div>
                        <br>
                        <div>
                            <?php echo $artikel->konten ?>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>