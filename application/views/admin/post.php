<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Post & News</h3>
              </div>
            </div>
          </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                  <a class="btn btn-success" href="" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah</a>
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
                                            <th>Judul Post</th>
                                            <th width="15%">User</th>
                                            <th width="15%">Tanggal Post</th>
                                            <th width="25%">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no=1;
                                            foreach($artikel as $row){
                                             ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $row->judul ?></td>
                                            <td><?php echo $row->user_post ?></td>
                                            <td><?php echo date("d F Y",strtotime($row->created)) ?></td>
                                            <td>
                                                <a class="btn btn-warning" href="" data-toggle="modal" data-target="#editModal<?= $row->id_artikel ?>"><i class="fa fa-edit"></i></a> | 
                                                <a class="btn btn-danger" href="<?php echo site_url('admin/hapusArtikel/').$row->id_artikel ?>"><i class="fa fa-trash"></i></a>
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
        <!-- /page content -->
        <div id="tambahModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Tambah Event</h3>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo site_url('admin/addPost')?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col col-lg-12">
                                    <div class="form-group">
                                        <label>Judul Post</label>
                                        <input type="text" class="form-control" name="judul" placeholder="Judul Post" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Headline</label>
                                        <textarea name="headline" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Paragraf Berita</label>
                                        <textarea name="konten" id="konten" class="editor"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Foto Post</label>
                                        <input type="file" class="dropify" height="100" name="gambar" data-max-file-size="1M" data-allowed-file-extensions="jpg png" required="">
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
foreach($artikel as $row){
?>
<div id="editModal<?= $row->id_artikel ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Post</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                        <form method="post" action="<?php echo site_url('admin/updatePost/'.$row->id_artikel)?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col col-lg-12">
                                    <div class="form-group">
                                        <label>Judul Post</label>
                                        <input type="text" class="form-control" name="nama_event" placeholder="Nama Event" value="<?php echo $row->judul ?>" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Headline</label>
                                        <textarea name="headline" class="form-control"><?php echo $row->headline ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Paragraf Berita</label>
                                        <textarea name="konten" id="konten" class="editor"><?php echo $row->konten ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Foto Post</label>
                                        <input type="file" class="dropify" height="100" name="gambar" data-max-file-size="1M" data-allowed-file-extensions="jpg png" data-default-file="<?php echo site_url('assets/upload/post/').$row->gambar ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Post</label>
                                        <input type="date" class="form-control" name="created" value="<?php echo date("Y-m-d",strtotime($row->created))?>" required="">
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