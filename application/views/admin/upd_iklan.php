<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pasang Iklan</h3>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    Tambah Iklan Lowongan
                </div>
                <div class="x_content">
                    <form action="<?php echo site_url('admin/updateIklan/' . $iklan->id_iklan) ?>" method="post" enctype="multipart/form-data" id="formulir">
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Jenis Iklan<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <select name="status" class="form-control" required>
                                    <option value="" selected disabled hidden>Pilih..</option>
                                    <option <?php if ($iklan->status == "vacancy") {
                                                echo "selected";
                                            } ?> value="vacancy">Vacancy</option>
                                    <option <?php if ($iklan->status == "magang") {
                                                echo "selected";
                                            } ?> value="magang">Magang (Internship)</option>
                                    <option <?php if ($iklan->status == "beasiswa") {
                                                echo "selected";
                                            } ?> value="beasiswa">Beasiswa</option>
                                </select>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Judul Iklan<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" name="judul" required="required" value="<?php echo $iklan->judul ?>">
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Informasi<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <textarea name="informasi" id="info" class="editor"><?php echo $iklan->informasi ?></textarea>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">URL Video</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" name="video" value='<?php echo $iklan->video ?>''>
                            </div>
                            <small style="color: red;">*jika ada</small>
                        </div>
                        <div class="form-group">
                            <center>
                                <div class="col-md-6 offset-md-3">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </center>
                        </div>
                    </form>
                    <div class="row">
                        <table id="" class="table table-striped table-bordered datatable2">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Poster</th>
                                    <th width="10%">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($poster as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><img src="<?php echo base_url('assets/upload/iklan/' . $row->file) ?>" class="img-fluid"></td>
                                        <td>
                                            <!-- <a class="btn btn-sm btn-danger" href="<?php echo site_url('admin/deleteIklan/' . $row->id_iklan . '/' . $row->poster) ?>"><i class="fa fa-trash"></i></a> -->
                                            Not Feature
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
</div>