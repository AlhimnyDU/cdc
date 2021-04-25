<!-- page content -->
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
                    <a class="btn btn-success" href="<?php echo site_url('admin/add_slideshow') ?>"><i class="fa fa-plus"></i> Tambah Slideshow</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="" class="table table-striped table-bordered datatable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Judul</th>
                                            <th width="20%">Gambar</th>
                                            <th width="20%">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($slideshow as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row->judul ?></td>
                                                <td><img src="<?php echo base_url('assets/upload/slideshow/' . $row->file) ?>" class="img-thumbnail" style="width: 200px; height: auto;"></td>
                                                <td>
                                                    <?php if ($row->publish != "y") { ?>
                                                        <a class="btn btn-primary btn-sm" href="<?php echo site_url('admin/accSlideshow/') . $row->id_slideshow ?>"><i class="fa fa-check"></i>Aktif</a>
                                                    <?php } else { ?>
                                                        <a class="btn btn-secondary btn-sm" href="<?php echo site_url('admin/decSlideshow/') . $row->id_slideshow ?>"><i class="fa fa-times"></i>Non-aktif</a>
                                                    <?php } ?>
                                                    | <a class="btn btn-warning btn-sm" href="<?php echo site_url('admin/upd_slideshow/' . $row->id_slideshow) ?>"><i class="fa fa-edit"></i></a>
                                                    | <a class="btn btn-info btn-sm" href="<?php echo site_url('admin/deleteSlideshow/' . $row->id_slideshow . '/' . $row->file)  ?>"><i class="fa fa-trash"></i></a>
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
    </div>
</div>