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
                    Edit Slideshow
                </div>
                <div class="x_content">
                    <form action="<?php echo site_url('admin/updSlideshow/' . $slideshow->id_slideshow) ?>" method="post" enctype="multipart/form-data" id="formulir">
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Judul Slideshow</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" name="judul" value="<?php echo $slideshow->judul ?>" required="required">
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Link URL Slideshow</label>
                            <small style="color: red;">*jika ada</small>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" name="link" value="<?php echo $slideshow->link ?>">
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Gambar</label>
                            <div class="col-md-6 col-sm-6">
                                <input type="file" class="dropify" height="50" name="slideshow" data-default-file="<?php echo base_url('assets/upload/slideshow/' . $slideshow->file)  ?>" data-min-width="1600" data-min-height="900" data-max-file-size="5M" data-allowed-file-extensions="png jpg jpeg">
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