<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Slideshow</h3>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    Tambah Slideshow
                </div>
                <div class="x_content">
                    <form action="<?php echo site_url('admin/addSlideshow') ?>" method="post" enctype="multipart/form-data" id="formulir">
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Judul Slideshow<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" name="judul" required="required">
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Link URL Slideshow</label>
                            <small style="color: red;">*jika ada</small>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" name="link">
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Gambar</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="file" class="dropify" height="50" name="slideshow" data-max-file-size="5M" data-allowed-file-extensions="png jpg jpeg" required>
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