<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Lowongan Pekerjaan</h3>
            </div>

            <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                </div>
            </div>
            </div>
        </div>
    </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                  <a class="btn btn-success" href="" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Loker</a>
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
                                            <th>Judul Loker</th>
                                            <th>Posisi yang dibutuhkan</th>
                                            <th>Persyaratan</th>
                                            <th>Deskripsi</th>
                                            <th>Poster</th>
                                            <th>Status Loker</th>
                                            <th width="20%">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no=1;
                                            foreach($loker as $row){
                                             ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $row->judul ?></td>
                                            <td><?php echo $row->posisi ?></td>
                                            <td><?php echo $row->syarat ?></td>
                                            <td><?php echo $row->deskripsi ?></td>
                                            <td><img src="<?php echo site_url('/assets/upload/poster/').$row->poster ?>" class="thumbnail"></td>
                                            <td><?php echo $row->status ?></td>
                                            <?php if($row->status=="Disetujui"){ ?>
                                                <td>
                                                    <a class="btn btn-warning disabled" href="" data-toggle="modal" data-target="#editModal<?= $row->id_loker ?>"><i class="fa fa-edit"></i></a>
                                                </td>
                                            <?php }else{ ?>
                                                <td>
                                                    <a class="btn btn-warning" href="" data-toggle="modal" data-target="#editModal<?= $row->id_loker ?>"><i class="fa fa-edit"></i></a>
                                                </td>
                                            <?php } ?>
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
        <!-- /page content -->
        <div id="tambahModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Tambah Lowongan Pekerjaan</h3>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo site_url('perusahaan/addLoker')?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col col-lg-12">
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" class="form-control" name="judul" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Posisi yang dibutuhkan</label>
                                        <input type="text" class="form-control" name="posisi" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Syarat/Requirements</label>
                                        <textarea name="syarat" id="syarat" class="editor"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" class="editor"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>File Poster</label>
                                        <input type="file" class="dropify" height="100" name="poster" required="" data-max-file-size="1M" data-allowed-file-extensions="jpg">
                                    </div>
                                    <div class="form-group">
                                        <label>Progam studi yang dicari</label>
                                        <input type="text" class="form-control" name="prodi" required="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Tambah</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
        </div>

        <?php 
            foreach($loker as $row){
        ?>
         <div id="editModal<?= $row->id_loker ?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Edit Lowongan Pekerjaan</h3>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo site_url('perusahaan/addLoker')?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col col-lg-12">
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" class="form-control" name="judul" required="" value="<?= $row->judul ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Posisi yang dibutuhkan</label>
                                        <input type="text" class="form-control" name="posisi" required="" value="<?= $row->posisi ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Syarat/Requirements</label>
                                        <textarea name="syarat" id="syarat" class="editor"><?= $row->syarat ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" class="editor"><?= $row->deskripsi ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>File Poster</label>
                                        <input type="file" class="dropify" height="100" data-default-file="<?php echo site_url('assets/upload/poster/').$row->poster ?>" name="poster" required="" data-max-file-size="1M" data-allowed-file-extensions="jpg">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Tambah</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
        </div>

<?php } ?>