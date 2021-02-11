<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Lowongan Pekerjaan</h3>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    Tambah Iklan Lowongan
                </div>
                <div class="x_content">
                    <form action="<?php echo site_url('admin/addIklan') ?>" method="post" enctype="multipart/form-data" id="formulir">
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Iklan<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <select name="status" class="form-control" required>
                                    <option value="" selected disabled hidden>Pilih..</option>
                                    <option value="vacancy">Vacancy</option>
                                    <option value="magang">Magang (Internship)</option>
                                    <option value="beasiswa">Beasiswa</option>
                                </select>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Judul Iklan<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" name="judul" required="required">
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Informasi<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <textarea name="informasi" id="info" class="editor" required></textarea>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Poster</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="file" class="dropify" height="50" name="poster" data-max-file-size="2M" data-allowed-file-extensions="png jpg jpeg">
                            </div>
                        </div>
                        <div class="form-group">
                            <center>
                                <div class="col-md-6 offset-md-3">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>