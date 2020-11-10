<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Job Fair</h3>
            </div>

            <div class="title_right">
            <div class="col-md-5 col-sm-5  form-group row pull-right top_search">
                <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                </div>
            </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        Settings
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <form method="post" action="<?php echo site_url('perusahaan/editProfile/'.$perusahaan->id_perusahaan)?>" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col col-md-6">
                                                <label>Nama perusahaan</label>
                                                <input type="text" class="form-control" name="nama_perusahaan" value="<?php echo $perusahaan->nama_perusahaan?>" required="">
                                                <br>
                                                <label>Alamat Perusahaan</label>
                                                <textarea class="form-control" name="alamat" required=""><?php echo $perusahaan->alamat ?></textarea>
                                                <br>
                                                <label>Telepon Perusahaan</label>
                                                <input type="text" name="telp_perusahaan" class="form-control" value="<?php echo $perusahaan->telp_perusahaan?>" required="">
                                                <br>
                                                <label>Penanggung Jawab</label>
                                                <input type="text" class="form-control" value="<?php echo $perusahaan->pj?>" name="pj" required="">
                                                <br>
                                                <label>No Handphone Penanggung Jawab</label>
                                                <input type="text" class="form-control" value="<?php echo $perusahaan->telp_pj?>" name="telp_pj" required="">
                                                <br>    
                                                <label>Upload Logo Perusahaan</label>
                                                <input type="file" class="dropify" height="100" name="logo_perusahaan" data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png" data-default-file="<?php echo site_url('assets/upload/logo/').$perusahaan->logo_perusahaan ?>">
                                                <br>
                                                <label>Deskripsi</label>
                                                <textarea name="deskripsi" id="syarat" class="editor"><?php echo $perusahaan->deskripsi?></textarea>
                                                <br>
                                                <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Submit</button>
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