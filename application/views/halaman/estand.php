<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .center {
        margin: auto;
        width: 50%;
    }

    .flip-card {
        background-color: transparent;
        width: 800px;
        height: 600px;
        perspective: 1000px;
    }

    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: left;
        transition: transform 0.6s;
        transform-style: preserve-3d;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }

    .flip-card-front,
    .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    .flip-card-front {
        background-color: #bbb;
        color: black;
    }

    .flip-card-back {
        background-color: #2980b9;
        color: white;
        transform: rotateY(180deg);
    }

    .modal-contents {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        width: 100%;
        height: 100%;
        pointer-events: auto;
        background-color: #fffdd0;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, .2);
        border-radius: .3rem;
        outline: 0;
    }
</style>
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col-sm-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <hr>
                            <h3>Institut Teknologi Nasional Bandung</h3>
                            <hr>
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <video autoplay muted loop>
                                            <source src="<?php echo base_url() ?>assets/home/jobfair/stand_orange.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                    <div class="flip-card-back">
                                        <center>
                                            <h3>Company Profile</h3>
                                        </center>
                                        <hr>
                                        <div class="row" style="margin-left: 10px;">
                                            <div class="col-md-12">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            Nama Perusahaan
                                                        </td>
                                                        <td>
                                                            : Institut Teknologi Nasional Bandung
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Bergerak di Bidang
                                                        </td>
                                                        <td>
                                                            : Pendidikan
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Nomor Telepon
                                                        </td>
                                                        <td>
                                                            : 022-7272215
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Alamat Perusahaan
                                                        </td>
                                                        <td>
                                                            : Jl. P.H.H. Mustofa
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row" style="margin-left: 10px;margin-right: 10px;">
                                            <div class="col-md-12">
                                                <p align="justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img src="<?php echo site_url('assets/halaman/slideshow/bg1.jpeg') ?>" class="img-thumbnail">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <img src="<?php echo site_url('assets/halaman/slideshow/bg2.jpeg') ?>" class="img-thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <a class="btn btn-primary" id="demo01" href="#animatedModal">Check Out Job</a>
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
    <center>
        <div class="close-animatedModal" style="margin-top: 10px;"><i class="fa fa-times-circle" style="color: green; font-size: 30px;"></i></div>
    </center>
    <div class="center">
        <center>
            <h2 style="margin-top: 10px;">Lowongan Kerja</h2>
        </center>
        <div class="row">
            <div class="col-md-4" style="margin-bottom: 10px;">
                <div class="card">
                    <img class="card-img-top" src="<?php echo site_url('assets/halaman/Logo-itenas.jpg') ?>" alt="Card image cap">
                    <div class="card-body">
                        <center>
                            <span class="badge badge-warning" style="margin-bottom: 10px;">Tenaga Kependidikan</span>
                        </center>
                        <p style="font-size: 10px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <hr>
                        <center>
                            <a href="#" class="btn btn-success btn-sm">Ajukan Lamaran</a> | <a href="#" class="btn btn-primary btn-sm">Info</a>

                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom: 10px;">
                <div class="card">
                    <img class="card-img-top" src="<?php echo site_url('assets/halaman/Logo-itenas.jpg') ?>" alt="Card image cap">
                    <div class="card-body">
                        <center>
                            <span class="badge badge-warning" style="margin-bottom: 10px;">Tenaga Kependidikan</span>
                        </center>
                        <p style="font-size: 10px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <hr>
                        <center>
                            <a href="#" class="btn btn-success btn-sm">Ajukan Lamaran</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom: 10px;">
                <div class="card">
                    <img class="card-img-top" src="<?php echo site_url('assets/halaman/Logo-itenas.jpg') ?>" alt="Card image cap">
                    <div class="card-body">
                        <center>
                            <span class="badge badge-warning" style="margin-bottom: 10px;">Tenaga Kependidikan</span>
                        </center>
                        <p style="font-size: 10px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <hr>
                        <center>
                            <a href="#" class="btn btn-success btn-sm">Ajukan Lamaran</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom: 10px;">
                <div class="card">
                    <img class="card-img-top" src="<?php echo site_url('assets/halaman/Logo-itenas.jpg') ?>" alt="Card image cap">
                    <div class="card-body">
                        <center>
                            <span class="badge badge-warning" style="margin-bottom: 10px;">Tenaga Kependidikan</span>
                        </center>
                        <p style="font-size: 10px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <hr>
                        <center>
                            <a href="#" class="btn btn-success btn-sm">Ajukan Lamaran</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom: 10px;">
                <div class="card">
                    <img class="card-img-top" src="<?php echo site_url('assets/halaman/Logo-itenas.jpg') ?>" alt="Card image cap">
                    <div class="card-body">
                        <center>
                            <span class="badge badge-warning" style="margin-bottom: 10px;">Tenaga Kependidikan</span>
                        </center>
                        <p style="font-size: 10px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <hr>
                        <center>
                            <a href="#" class="btn btn-success btn-sm">Ajukan Lamaran</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom: 10px;">
                <div class="card">
                    <img class="card-img-top" src="<?php echo site_url('assets/halaman/Logo-itenas.jpg') ?>" alt="Card image cap">
                    <div class="card-body">
                        <center>
                            <span class="badge badge-warning" style="margin-bottom: 10px;">Tenaga Kependidikan</span>
                        </center>
                        <p style="font-size: 10px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <hr>
                        <center>
                            <a href="#" class="btn btn-success btn-sm">Ajukan Lamaran</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom: 10px;">
                <div class="card">
                    <img class="card-img-top" src="<?php echo site_url('assets/halaman/Logo-itenas.jpg') ?>" alt="Card image cap">
                    <div class="card-body">
                        <center>
                            <span class="badge badge-warning" style="margin-bottom: 10px;">Tenaga Kependidikan</span>
                        </center>
                        <p style="font-size: 10px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <hr>
                        <center>
                            <a href="#" class="btn btn-success btn-sm">Ajukan Lamaran</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom: 10px;">
                <div class="card">
                    <img class="card-img-top" src="<?php echo site_url('assets/halaman/Logo-itenas.jpg') ?>" alt="Card image cap">
                    <div class="card-body">
                        <center>
                            <span class="badge badge-warning" style="margin-bottom: 10px;">Tenaga Kependidikan</span>
                        </center>
                        <p style="font-size: 10px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <hr>
                        <center>
                            <a href="#" class="btn btn-success btn-sm">Ajukan Lamaran</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-bottom: 10px;">
                <div class="card">
                    <img class="card-img-top" src="<?php echo site_url('assets/halaman/Logo-itenas.jpg') ?>" alt="Card image cap">
                    <div class="card-body">
                        <center>
                            <span class="badge badge-warning" style="margin-bottom: 10px;">Tenaga Kependidikan</span>
                        </center>
                        <p style="font-size: 10px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <hr>
                        <center>
                            <a href="#" class="btn btn-success btn-sm">Ajukan Lamaran</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>