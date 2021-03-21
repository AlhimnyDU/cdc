<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Company</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        Company Profile
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="alert alert-primary">
                                    <div class="card-box">
                                        <form method="post" action="<?php echo site_url('perusahaan/editProfile/' . $perusahaan->id_perusahaan) ?>" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col col-md-12">
                                                    <label>Nama perusahaan</label>
                                                    <input type="text" class="form-control" name="nama_perusahaan" value="<?php echo $perusahaan->nama_perusahaan ?>" required="">
                                                    <br>
                                                    <label>Bergerak pada bidang</label>
                                                    <input type="text" class="form-control" name="bidang" value="<?php echo $perusahaan->bidang ?>" required="">
                                                    <br>
                                                    <label>Alamat Perusahaan</label>
                                                    <textarea class="form-control" name="alamat" required=""><?php echo $perusahaan->alamat ?></textarea>
                                                    <br>
                                                    <label>Telepon Perusahaan</label>
                                                    <input type="text" name="telp_perusahaan" class="form-control" value="<?php echo $perusahaan->telp_perusahaan ?>" required="">
                                                    <br>
                                                    <label>Penanggung Jawab</label>
                                                    <input type="text" class="form-control" value="<?php echo $perusahaan->pj ?>" name="pj" required="">
                                                    <br>
                                                    <label>No Handphone Penanggung Jawab</label>
                                                    <input type="text" class="form-control" value="<?php echo $perusahaan->telp_pj ?>" name="telp_pj" required="">
                                                    <br>
                                                    <label>Upload Logo Perusahaan</label>
                                                    <input type="file" class="dropify" height="100" name="logo_perusahaan" data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png" data-default-file="<?php echo site_url('assets/upload/logo/') . $perusahaan->logo_perusahaan ?>">
                                                    <br>
                                                    <label>Deskripsi</label>
                                                    <textarea name="deskripsi" id="syarat" class="editor"><?php echo $perusahaan->deskripsi ?></textarea>
                                                    <br>
                                                    <center>
                                                        <button type="submit" class="btn btn-primary" value="Tambah" name="submit">Update</button>
                                                    </center>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert bg-blue">
                                    <div class="card-box">
                                        <form method="post" action="<?php echo site_url('perusahaan/update_foto/' . $perusahaan->id_perusahaan) ?>" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col col-md-12">
                                                    <label>Foto Perusahaan</label>
                                                    <input type="file" class="dropify" height="100" name="foto" data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png" data-default-file="<?php echo site_url('assets/upload/foto_perusahaan/') . $perusahaan->foto_perusahaan ?>">
                                                </div>
                                                <div class="col col-md-12">
                                                    <label>Foto Perusahaan 2</label>
                                                    <input type="file" class="dropify" height="100" name="foto2" data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png" data-default-file="<?php echo site_url('assets/upload/foto_perusahaan/') . $perusahaan->foto_perusahaan2 ?>">
                                                    <hr>
                                                    <center>
                                                        <button type="submit" class="btn btn-warning" value="Tambah" name="submit">Update</button>
                                                    </center>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>