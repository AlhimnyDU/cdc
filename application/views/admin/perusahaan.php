<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Perusahaan</h3>
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
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Telp. Perusahaan</th>
                                            <th>CP</th>
                                            <th>Telp. (CP)</th>
                                            <th>Alamat</th>
                                            <th width="20%">Edit | Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no=1;
                                            foreach($perusahaan as $row){
                                             ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $row->nama_perusahaan ?></td>
                                            <td><?php echo $row->email ?></td>
                                            <td><?php echo $row->pj ?></td>
                                            <td><?php echo $row->telp_pj ?></td>
                                            <td><?php echo $row->alamat ?></td>
                                            <td> <a class="btn btn-warning" href="" data-toggle="modal" data-target="#editModal<?= $row->id_perusahaan ?>"><i class="fa fa-edit"></i></a> | 
                                                <a class="btn btn-danger" href="<?php echo site_url('Admin/hapusPerusahaan/').$row->id_perusahaan ?>"><i class="fa fa-trash"></i></a></td>
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
                        <h3 class="modal-title">Tambah Akun Perusahaan</h3>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo site_url('admin/addPerusahaan')?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col col-lg-12">
                                    <div class="form-group">
                                        <label>Nama Perusahaan</label>
                                        <input type="text" class="form-control" name="nama_perusahaan" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Telp. Perusahaan </label>
                                        <input type="number" class="form-control" name="telp" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Person</label>
                                        <input type="text" class="form-control" name="pj" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Telp. CP</label>
                                        <input type="number" class="form-control" name="telp_pj" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" rows=5></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>File Company Profile</label>
                                        <input type="file" class="dropify" height="100" name="file_cv" required="" data-max-file-size="2M" data-allowed-file-extensions="pdf">
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
            foreach($perusahaan as $row){
        ?>
        <div id="editModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Edit Akun Perusahaan</h3>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo site_url('admin/editPerusahaan/').$row->id_perusahaan?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col col-lg-12">
                                    <div class="form-group">
                                        <label>Nama Perusahaan</label>
                                        <input type="text" class="form-control" name="nama_perusahaan" required="" value="<?= $row->nama_perusahaan ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" required="" value="<?= $row->email ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" required="" value="<?= $row->password ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Telp. Perusahaan </label>
                                        <input type="number" class="form-control" name="telp" required="" value="<?= $row->telp_perusahaan ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Person</label>
                                        <input type="text" class="form-control" name="pj" required="" value="<?= $row->pj ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Telp. CP</label>
                                        <input type="number" class="form-control" name="telp_pj" required="" value="<?= $row->telp_pj ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" rows=5><?= $row->alamat ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>File Company Profile</label>
                                        <input type="file" class="dropify" height="100" data-default-file="<?= $row->file_cv ?>" name="file_cv" required="" data-max-file-size="2M" data-allowed-file-extensions="pdf">
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