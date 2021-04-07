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
        background-color: #fff9f7;
        color: black;
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
        background-color: #fff9f7;
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
                            <h3><?php echo $company->nama_perusahaan ?></h3>
                            <hr>
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <video autoplay muted loop>
                                            <source src="<?php echo base_url('assets/home/jobfair/' . $company->link) ?>" type="video/mp4">
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
                                                            : <?php echo $company->nama_perusahaan ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Bergerak di Bidang
                                                        </td>
                                                        <td>
                                                            : <?php echo $company->bidang ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Nomor Telepon
                                                        </td>
                                                        <td>
                                                            : <?php echo $company->telp_perusahaan ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Alamat Perusahaan
                                                        </td>
                                                        <td>
                                                            : <?php echo $company->alamat ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row" style="margin-left: 10px;margin-right: 10px;">
                                            <div class="col-md-12">
                                                <p align="justify"><?php echo substr($company->deskripsi, 0, 400) ?>..<a href="#">Read More</a></p>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <?php if ($company->foto_perusahaan != NULL) { ?>
                                                            <img src="<?php echo site_url('assets/upload/foto_perusahaan/') . $company->foto_perusahaan ?>" class="img-thumbnail">
                                                        <?php } else { ?>
                                                            <img src="<?php echo site_url('assets/home/jobfair/poster.jpg') ?>" class="img-thumbnail" style="width:200px; height:200px;">
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <?php if ($company->foto_perusahaan2 != NULL) { ?>
                                                            <img src="<?php echo site_url('assets/upload/foto_perusahaan/') . $company->foto_perusahaan2 ?>" class="img-thumbnail">
                                                        <?php } else { ?>
                                                            <img src="<?php echo site_url('assets/home/jobfair/poster.jpg') ?>" class="img-thumbnail" style="width:200px; height:200px;">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <a class="btn btn-primary" id="demo01" href="#animatedModal">Check Out Job</a> <?php if ($company->jenis_cp == "video") { ?> | <a class="btn btn-info" href="<?php echo base_url('assets/upload/file_cp/' . $company->file_cp) ?>" data-vbtype="iframe" title="<?php echo $company->nama_perusahaan ?>">Company Profile</a> <?php } else if ($company->jenis_cp == "dokumen") { ?> | <a class="btn btn-info" href="<?php echo base_url('assets/upload/file_cp/' . $company->file_cp) ?>">Company Profile</a> <?php } ?>
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
        <div class="close-animatedModal" style="margin-top: 10px;"><i class="fa fa-times-circle" style="color: silver; font-size: 30px;"></i></div>
    </center>
    <div class="center">
        <center>
            <h2 style="margin-top: 10px;">Lowongan Kerja</h2>
        </center>
        <div class="row">
            <?php foreach ($jobfair as $row) { ?>
                <div class="col-md-4" style="margin-bottom: 10px;">
                    <div class="card">
                        <center>
                            <img class="card-img-top" src="<?php echo site_url('assets/upload/logo/' . $row->logo_perusahaan) ?>" style="width: 200px;height: auto;" alt="Card image cap">
                        </center>
                        <div class="card-body">
                            <center>
                                <span class="badge badge-warning" style="margin-bottom: 10px;"><?php echo $row->posisi ?></span>
                            </center>
                            <p style="font-size: 10px; text-align: justify;"><?php echo substr($row->deskripsi, 0, 50) ?></p>
                            <hr>
                            <center>
                                <a href="<?php echo site_url('halaman/job/' . $row->id_loker) ?>" class="btn btn-success btn-sm">Lihat Lowongan</a>
                            </center>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>