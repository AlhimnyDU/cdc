<div class="content-wrapper">
    <div class="container">
		<div class="row aos-init aos-animate" data-aos="fade-up">
			<div class="col-sm-12 grid-margin">
				<div class="card">
					<div class="card-body">
                        <center>
                             <?php if(empty($row->logo_perusahaan)){?>
                              <img
                                src="<?php echo site_url("assets/upload/logo/default.png")?>"
                                width="300px"
                              />
                            <?php }else{?>
                              <img width="300px" src="<?php echo site_url("assets/upload/logo/".$job->logo_perusahaan) ?>"/>
                            <?php }?>
                            <br>
                            <small><?php echo $job->nama_perusahaan ?></small>
                            <h1 id=judul><?php echo $job->posisi ?></h1>
                        </center>
                        <h3>Description</h3>
                        <div>
                            <i><?php echo $job->deskripsi ?></i>    
                        </div>
                        <hr>
                        <h3>Requirements</h3>
                        <div>
                            <?php echo $job->syarat ?>
                        </div>
                        <hr>
                        <h3>Other Information</h3>
                        <div>
                            <?php echo $job->informasi ?>
                        </div>
                        <hr>
                        <h3>Poster</h3>
                        
                        <?php if($job->poster){?>
                            <center><img width="500px" src="<?php echo site_url("assets/upload/poster/".$job->poster) ?>"/></center>
                        <?php }else {?>
                            <label>This job vacancy not have poster</label>
                        <?php } ?>
                        <hr>
                        <center>
                        <?php if($this->session->userdata('nama')){?>
                            <a class="btn btn-info" href="#">Apply job here</a>
                        <?php }else {?>
                            <a class="btn btn-info disabled" href="#">Apply job here</a> | <a class="btn btn-info" href="<?php echo site_url("login") ?>">Login</a> <br>
                            <small style="color:red;">*Log In required</small>
                        <?php } ?>
                        </center>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>