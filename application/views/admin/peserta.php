<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Peserta Event</h3>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <h5><?php echo $nama->nama_event ?></h5>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="perusahaan-tab" data-toggle="tab" href="#perusahaan" role="tab" aria-controls="perusahaan" aria-selected="true">Perusahaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="peserta-tab" data-toggle="tab" href="#peserta" role="tab" aria-controls="peserta" aria-selected="false">Peserta</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="perusahaan" role="tabpanel" aria-labelledby="perusahaan-tab">
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
                          <th width="10%">Hapus</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($perusahaan as $row) {
                        ?>
                          <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $row->nama_perusahaan ?></td>
                            <td><?php echo $row->email ?></td>
                            <td><?php echo $row->telp_perusahaan ?></td>
                            <td><?php echo $row->pj ?></td>
                            <td><?php echo $row->telp_pj ?></td>
                            <td><?php echo $row->alamat ?></td>
                            <td>
                              <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#editModal<?= $row->id ?>"><i class="fa fa-plus"></i></a> |
                              <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#cpModal<?= $row->id ?>"><i class="fa fa-plus"></i> CP</a> |
                              <a class="btn btn-danger btn-sm" href="<?php echo site_url('Admin/tidakMengikuti/' . $row->id) ?>"><i class="fa fa-trash"></i></a>
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
            <div class="tab-pane fade" id="peserta" role="tabpanel" aria-labelledby="peserta-tab">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
                    <table id="" class="table table-striped table-bordered datatable" style="width:100%">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>No Handphone</th>
                          <th>Jenis</th>
                          <th>Asal Universitas</th>
                          <th width="5%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($peserta as $row) {
                        ?>
                          <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $row->nama ?></td>
                            <td><?php echo $row->email ?></td>
                            <td><?php echo $row->telp ?></td>
                            <td><?php echo $row->role ?></td>
                            <td><?php echo $row->universitas ?></td>
                            <td>
                              <a class="btn btn-danger btn-sm" href="<?php echo site_url('Admin/tidakMengikuti/' . $row->id) ?>"><i class="fa fa-trash"></i></a>
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
  </div>
</div>
<!-- /page content -->
<?php
foreach ($perusahaan as $row) {
?>
  <div id="editModal<?= $row->id ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Masukkan Video</h3>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo site_url('admin/update_stand/') . $row->id ?>" enctype="multipart/form-data">
            <div class="row">
              <div class="col col-lg-12">
                <div class="form-group">
                  <label>Video</label>
                  <input type="text" class="form-control" name="link" placeholder="ex :  stand.mp4" required value="<?php echo $row->link ?>">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Submit</button>
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
<?php
foreach ($perusahaan as $row) {
?>
  <div id="cpModal<?= $row->id ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Masukkan Company Profile</h3>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo site_url('admin/update_cp/') . $row->id_perusahaan ?>" enctype="multipart/form-data">
            <div class="row">
              <div class="col col-lg-12">
                <div class="form-group">
                  <label>Company Profile</label>
                  <input type="file" class="dropify" height="50" name="file_cp" data-default-file="<?php echo base_url('assets/upload/file_cp/' . $row->file_cp) ?>" data-allowed-file-extensions="pdf mp4">
                </div>
                <div class="form-group">
                  <label>Jenis</label>
                  <select name="jenis_cp" class="form-control">
                    <option value="" selected disabled hidden>Pilih...</option>
                    <option value="video" <?php if ($row->jenis->cp == "video") {
                                            echo "selected";
                                          } ?>>Video</option>
                    <option value="gambar" <?php if ($row->jenis->cp == "gambar") {
                                              echo "selected";
                                            } ?>>Gambar</option>
                    <option value="dokumen" <?php if ($row->jenis->cp == "dokumen") {
                                              echo "selected";
                                            } ?>>Dokumen</option>
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Submit</button>
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