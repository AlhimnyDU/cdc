<!-- page content -->
<div id="jobModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Job Fair Itenas 2020</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('perusahaan/mengikuti/2') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <h5>Terima kasih perusahaan telah mendaftar di Career Development Center Itenas</h5>
                                <p>Career Development Center Itenas sedang mengadakan acara Virtua; Job Fair Itenas 2021, jika perusahaan yang ingin mengikuti acara job fair harus mengikuti peraturan dan ketentuan yang berlaku pada acara Job Fair Itenas 2020.</p>
                                <a href="#">Peraturan dan Ketentuan Virtual Job Fair Itenas 2021</a>
                                <input type="checkbox" value="" required> <small>Centang untuk menyetujui prosedur dan ketentuan</small>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary pull-right" value="Tambah" name="submit">Mengikuti</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Lain Kali</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Job Fair</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group row pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Job Fair Online</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- Smart Wizard -->
                        <p>Acara Job Fair Online akan berlangsung dengan tahapan berikut ini</p>
                        <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps anchor">
                                <li>
                                    <a href="#step-1" class="selected" isdone="1" rel="1">
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            Step 1<br>
                                            <small>Step 1 Pendaftaran Perusahaan (s/d 30 November 2020)</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-2" class="selected" isdone="0" rel="2">
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                            Step 2<br>
                                            <small>Step 2 Verifikasi oleh admin (s/d 30 November 2020)</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-3" class="selected" isdone="0" rel="3">
                                        <span class="step_no">3</span>
                                        <span class="step_descr">
                                            Step 3<br>
                                            <small>Step 3 Periode submit loker oleh peserta Job Fair</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-4" class="selected" isdone="0" rel="4">
                                        <span class="step_no">4</span>
                                        <span class="step_descr">
                                            Step 4<br>
                                            <small>Step 4 Acara Job Fair Online (via Zoom)</small>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->