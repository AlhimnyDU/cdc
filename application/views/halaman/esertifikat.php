<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col-sm-12 grid-margin">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4>Cari E-Sertifikat</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('halaman/cariEsertifikat') ?>" method="post" enctype="multipart/form-data" class="form-floating" id="formulir">
                            <div class="form-group">
                                <select name="acara" required class="form-control col-3">
                                    <option value="" disabled selected hidden>Pilih Acara</option>
                                    <?php foreach ($acara as $row) { ?>
                                        <option value="<?php echo $row->id_acara ?>"><?php echo $row->nama_acara ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group float-left">
                                <input class="form-control" name="nim" required="required" placeholder="Masukan NIM" type="number">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Cari">
                            </div>
                        </form>
                        <hr>
                        <table id="" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>NIM</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Acara</th>
                                    <th>Sertifikat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($sertifikat as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row->nim ?></td>
                                        <td><?php echo $row->nama_lengkap ?></td>
                                        <td><?php echo $row->email ?></td>
                                        <td><?php echo $row->nama_acara ?></td>
                                        <td>
                                            <center><a class="btn btn-success" href="<?php echo $row->drive ?>"><i class="fa fa-download"></i></a></center>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>