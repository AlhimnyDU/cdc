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
                                            <th width="5%">Hapus</th>
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
                                            <td><?php echo $row->telp_perusahaan ?></td>
                                            <td><?php echo $row->pj ?></td>
                                            <td><?php echo $row->telp_pj ?></td>
                                            <td><?php echo $row->alamat ?></td>
                                            <td> 
                                                <a class="btn btn-danger btn-sm" href="<?php echo site_url('Admin/tidakMengikuti/'.$row->id) ?>"><i class="fa fa-trash"></i></a>
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
                                            <th width="5%">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no=1;
                                            foreach($peserta as $row){
                                             ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $row->nama ?></td>
                                            <td><?php echo $row->email ?></td>
                                            <td><?php echo $row->telp ?></td>
                                            <td> 
                                                <a class="btn btn-danger btn-sm" href="<?php echo site_url('Admin/tidakMengikuti/'.$row->id) ?>"><i class="fa fa-trash"></i></a>
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