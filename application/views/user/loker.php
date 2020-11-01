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
                                            <th>Perusahaan</th>
                                            <th>Judul Loker</th>
                                            <th>Posisi yang dibutuhkan</th>
                                            <th>Persyaratan</th>
                                            <th>Deskripsi</th>
                                            <th>Poster</th>
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
                                            <td><?php echo $row->nama_perusahaan ?></td>
                                            <td><?php echo $row->judul ?></td>
                                            <td><?php echo $row->posisi ?></td>
                                            <td><?php echo $row->syarat ?></td>
                                            <td><?php echo $row->deskripsi ?></td>
                                            <td><img src="<?php echo site_url('/assets/upload/poster/').$row->poster ?>" alt="" class="thumbnail"></td>
                                            <td>
                                                <a class="btn btn-warning" href="" data-toggle="modal" data-target="#lamarModal<?= $row->id_loker ?>"><i class="fa fa-edit"></i>Ajukan Lamaran</a>
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
        <?php 
            foreach($loker as $row){
        ?>
         <div id="lamarModal<?= $row->id_loker ?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Pengajuan Lamaran Pekerjaan</h3>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo site_url('admin/editLoker/').$row->id_loker ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col col-lg-12">
                                    <div class="form-group">
                                        <label>Posisi yang dibutuhkan</label>
                                        <input type="text" readonly class="form-control" name="posisi" required="" value="<?= $row->posisi ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Diri</label>
                                        <textarea name="deskripsi" id="deskripsi" class="editor"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>File Surat Lamaran Pekerjaan</label>
                                        <input type="file" class="dropify" height="50" require="" name="lamaran" data-max-file-size="1M" data-allowed-file-extensions="pdf">
                                    </div>
                                    <div class="form-group">
                                        <label>File Curriculum Vitae</label>
                                        <input type="file" class="dropify" height="50" require="" name="cv" data-max-file-size="1M" data-allowed-file-extensions="pdf">
                                    </div>
                                    <div class="form-group">
                                        <label>File Pengalaman Pekerjaan</label>
                                        <input type="file" class="dropify" height="50" require="" name="pengalaman" data-max-file-size="2M" data-allowed-file-extensions="pdf">
                                    </div>
                                    <div class="form-group">
                                        <label>File Surat Keahlian</label>
                                        <input type="file" class="dropify" height="50" name="keahlian" data-max-file-size="1M" data-allowed-file-extensions="pdf">
                                        <small>*) Jika tidak memiliki surat keahlian harap dikosongkan</small>
                                    </div>
                                    <div class="form-group">
                                        <label>File TOEFL/TOEIC</label>
                                        <input type="file" class="dropify" height="50" name="toefl" data-max-file-size="1M" data-allowed-file-extensions="pdf">
                                        <small>*) Jika tidak memiliki surat keahlian harap dikosongkan</small>
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