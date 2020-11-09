        <div class="body">
        <div class="sidebar">
				<div class="first">
					<h2><a href="#">Category</a></h2>
					<ul>
						<li><a href="#">Magang</a></li>
						<li><a href="#">Fresh Graduate</a></li>
                        <li><a href="<?php echo site_url('halaman/jobfair') ?>">Job Fair</a></li>
                        <li><a href="#">Beasiswa</a></li>			
					</ul>
				</div>
				<div>
                    <h2><a href="#">Major</a></h2>
                    <ul>
                        <li><a href="#">FTI</a></li>
                        <ul>
                            <li><a href="#">Teknik Elektro</a></li>
                            <li><a href="#">Teknik Mesin</a></li>
                            <li><a href="#">Teknik Industri</a></li>
                            <li><a href="#">Teknik Kimia</a></li>
                            <li><a href="#">Informatika</a></li>
                            <li><a href="#">Sistem Informasi</a></li>			
                        </ul>
                        <li><a href="#">FTSP</a></li>
                        <ul>
                            <li><a href="#">Teknik Sipil</a></li>
                            <li><a href="#">Teknik Geodesi</a></li>
                            <li><a href="#">Perancangan Wilayah dan Kota</a></li>
                            <li><a href="#">Teknik Lingkungan</a></li>	
                        </ul>
                        <li><a href="#">FAD</a></li>
                        <ul>
                            <li><a href="#">Arsitektur</a></li>
                            <li><a href="#">Desain Interior</a></li>
                            <li><a href="#">Desain Produk</a></li>
                            <li><a href="#">Desain Komunikasi Visual</a></li>			
                        </ul>			
					</ul>
				</div>  
			</div>
            <div class="content">
                <div class="blog">
				<center><h2 style="margin-bottom:15px;margin-top:0px;font-family:arial;font-weight:normal;font-size:32px;color: #ffa500;">Job Vacancy</h2></center>
				<hr style="border-color:#ffa500;">
					<?php foreach($data as $row){?>
					<div class="job-list" style="width:100%;">
						<div class="job">
							<div class="tanggal-post" style="margin-bottom:5px"><span><?php echo date('d F Y',strtotime($row->created)) ?></span></div>
							<table>
								<tbody>
								<tr>
									<td><img src="<?php echo site_url("assets/upload/logo/").$row->logo_perusahaan?>" style="margin-right:10px; height:150px; width:150px;"></td>
									<td>
										<h3 style="margin-bottom:5px;margin-top:0px;font-family:arial;font-weight:normal;font-size:20px;color: #ffa500;"><?php echo $row->posisi ?></h3>
										<p><?php echo $row->nama_perusahaan ?></p>
										<small style="color:red;">Deadline : <?php echo date('d F Y',strtotime($row->deadline)) ?></small>
										<p>Job Location : <?php echo $row->lokasi ?>	</p>
										<p>Program Studi : <?php echo $row->prodi?></p>
										<a href="<?php echo site_url("halaman/artikel/".$row->id_loker) ?>"><p style="color:blue;">Lihat Loker</p></a>
									</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
					<?php } ?>
					<?php echo $pagination; ?>
						<!-- <a href="#">previous</a>
						<div>
							<ul>
								<li class="selected"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">6</a></li>
								<li><a href="#">7</a></li>
								<li><a href="#">8</a></li>
								<li>...</li>
								<li><a href="#">34</a></li>							
							</ul>
							<a href="#">next</a>
						</div> -->
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