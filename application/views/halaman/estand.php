<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col-sm-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <hr>
                            <h3>Nama Perusahaan</h3>
                            <hr>
                            <video autoplay muted loop>
                                <source src="<?php echo base_url() ?>assets/home/jobfair/stand_orange.mp4" type="video/mp4">
                            </video>
                            <hr>

                            <hr>
                            <div>
                                <a class="btn btn-primary btn-lg" id="demo01" href="#animatedModal">Company Profile</a> | <a class="btn btn-danger btn-lg" href="">Check Out Job</a>
                            </div>
                        </center>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="animatedModal">
    <!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID -->
    <div id="btn-close-modal" class="close-animatedModal">
        <center>
            CLOSE MODAL
        </center>
    </div>

    <div id="modal-container" class="col-sm-8 col-md-8 col-lg-8 col-lg-offset-2">
        <div class="thumb col-lg-4" style="opacity: 1; display: block; transform: scaleX(1) scaleY(1); transform-origin: 50% 50% 0px;">

        </div>

        <div class="thumb col-lg-4" style="opacity: 1; display: block; transform: scaleX(1) scaleY(1); transform-origin: 50% 50% 0px;">
            <img src="img/thumbnail.svg">
        </div>

        <div class="thumb col-lg-4" style="opacity: 1; display: block; transform: scaleX(1) scaleY(1); transform-origin: 50% 50% 0px;">
            <img src="img/thumbnail.svg">
        </div>
    </div>
</div>