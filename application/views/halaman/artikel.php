        <div class="body">
        <div class="sidebar">
				<div class="first">
					<h2><a href="#">Kategori</a></h2>
					<ul>
						<li><a href="#">Magang</a></li>
						<li><a href="#">Fresh Graduate</a></li>
                        <li><a href="#">Job Fair</a></li>
                        <li><a href="#">Beasiswa</a></li>			
					</ul>
				</div> 
			</div>
            <div class="content">
                <div class="blog">
					<div>
						<div class="stats">
							<div class="date"><span><?php echo date("d M Y",strtotime($artikel->created)) ?></span></div>
							<div class="share" style="font-family:sans-serif;">
								
							</div>
						</div>
						<div>
							<h2><?php echo $artikel->judul ?></h2>
							<p>Program Studi : <?php echo $artikel->prodi ?></p>
							<p><img style="max-width: 100%; height: auto;" src="<?php echo base_url().'assets/upload/poster/'.$artikel->poster?>" class="img-thumbnail"></img></p>
                            <?php echo $artikel->deskripsi ?>
                            <p>Persyaratan Pelamar :</p>
                            <p>
                            <?php echo $artikel->syarat ?>
                            </p>
						</div>
					</div>
				</div>
            </div>
			<div class="article">
				<div class="first">
					<h3>Please Read</h3>
					<p>This website template has been designed by <a href="http://www.freewebsitetemplates.com/">Free Website Templates</a> for you, for free. You can replace all this text with your own text.</p>
					<p>You can remove any link to our website from this website template, you're free to use this website template without linking back to us.</p>
					<p>If you're having problems editing this website template, then don't hesitate to ask for help on the <a href="http://www.freewebsitetemplates.com/forums/">Forum</a>.</p>
					<p>Before using a template from Free Website Templates, you must read all the for further information <a href="http://www.freewebsitetemplates.com/about/terms">Terms of Use</a></p>
				</div>
				<div>
					<h3>Sed Elementum</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vestibulum nibh eget justo dapibus eu porttitor purus hendrerit.</p>
					<a href="http://www.freewebsitetemplates.com">www.freewebsitetemplates.com</a>
					<a href="http://www.freewebsitetemplates.com/forums/">www.freewebsitetemplates.com/forum</a>
				</div>
				<div class="connect">
					<h2>Follow us</h2>
					<a href="http://facebook.com/freewebsitetemplates" id="facebook">Facebook</a>
					<a href="http://twitter.com/fwtemplates" id="twitter">Twitter</a>
					<a href="#" id="comments">Comments</a>
					<a href="http://www.flickr.com/freewebsitetemplates/" id="flickr">Flickr</a>
				</div>
            </div>
		</div>