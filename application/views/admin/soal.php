<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pertanyaan</h3>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <a class="btn btn-success" href="" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Pertanyaan</a>
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
                                            <th>Pertanyaan</th>
                                            <th>Jenis Jawaban</th>
                                            <th width="25%">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($soal as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row->soal ?></td>
                                                <td><?php echo $row->jenis_jawaban ?></td>

                                                <td>
                                                    <a class="btn btn-warning" href="" data-toggle="modal" data-target="#editModal<?= $row->id_soal ?>"><i class="fa fa-edit"></i></a>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Pertanyaan</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('admin/addSoal') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <label>Pertanyaan & Soal</label>
                                <input type="text" class="form-control" name="soal" required="">
                            </div>
                            <div class="form-group">
                                <label>Jenis Jawaban</label>
                                <select name="jenis_jawaban" class="form-control" required>
                                    <option value="" disabled hidden selected>Pilih..</option>
                                    <option value="email">Email</option>
                                    <option value="textfield">Text Field</option>
                                    <option value="textfield_non">Text Field (Non-required)</option>
                                    <option value="ipk">IPK</option>
                                    <option value="textfield_number">Text Field (Angka Saja)</option>
                                    <option value="textfield_number_non">Text Field (Angka Saja) Non-Required</option>
                                    <option value="jeniskelamin">Jenis Kelamin</option>
                                    <option value="textarea">Text Area (Memo)</option>
                                    <option value="pilihanganda">Pilihan Ganda (Ya/Tidak)</option>
                                    <option value="penilaian">Penilaian (Sangat Kurang/Kurang/Cukup/Baik/Sangat Baik)</option>
                                    <option value="kepentingan">Kepentingan (Sangat Tidak Pending/Tidak Penting/Cukup Penting/Perint/Sangat Penting)</option>
                                    <option value="kepuasan">Kepuasan (Sangat Tidak Puas/Tidak Puas/Cukup Puas/Puas/Sangat Puas)</option>
                                    <option value="prodi">Program Studi Itenas</option>
                                    <option value="fakultas">Fakultas Itenas</option>
                                    <option value="info">Informasi Seminar / Webinar / Acara</option>
                                    <option value="pdf">Upload File PDF</option>
                                    <option value="pdfnon">Upload File PDF(*non required)</option>
                                    <option value="gambar">Upload File Gambar</option>
                                    <option value="gambarnon">Upload File Gambar(*non required)</option>
                                    <option value="PKMI">PKMI</option>
                                    <option value="date">Tanggal</option>
                                    <option value="label">Label</option>
                                    <option value="1_respond">*Kuesioner ini hanya dapat mengisikan satu kali jawaban</option>
                                    <option value="label_kecil">Label Kecil</option>
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
<?php
foreach ($soal as $row) {
?>
    <div id="editModal<?= $row->id_soal ?>" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Soal</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo site_url('admin/updateSoal/') . $row->id_soal ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="form-group">
                                    <label>Pertanyaan & Soal</label>
                                    <input type="text" class="form-control" name="soal" required="" value="<?php echo $row->soal ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Jawaban</label>
                                    <select name="jenis_jawaban" class="form-control" required>
                                        <option value="" disabled hidden selected>Pilih..</option>
                                        <option value="email" <?php if ($row->jenis_jawaban == "email") {
                                                                    echo "selected";
                                                                } ?>>Email</option>
                                        <option value="textfield" <?php if ($row->jenis_jawaban == "textfield") {
                                                                        echo "selected";
                                                                    } ?>>Text Field</option>
                                        <option value="textfield_non" <?php if ($row->jenis_jawaban == "textfield_non") {
                                                                            echo "selected";
                                                                        } ?>>Text Field (Non-required)</option>
                                        <option value="ipk" <?php if ($row->jenis_jawaban == "ipk") {
                                                                echo "selected";
                                                            } ?>>IPK</option>
                                        <option value="textfield_number" <?php if ($row->jenis_jawaban == "textfield_number") {
                                                                                echo "selected";
                                                                            } ?>>Text Field (Angka Saja)</option>
                                        <option value="textfield_number_non" <?php if ($row->jenis_jawaban == "textfield_number_non") {
                                                                                    echo "selected";
                                                                                } ?>>Text Field (Angka Saja) Non-Required</option>
                                        <option value="textarea" <?php if ($row->jenis_jawaban == "textarea") {
                                                                        echo "selected";
                                                                    } ?>>Text Area (Memo)</option>
                                        <option value="pilihanganda" <?php if ($row->jenis_jawaban == "pilihanganda") {
                                                                            echo "selected";
                                                                        } ?>>Pilihan Ganda (Ya/Tidak)</option>
                                        <option value="penilaian" <?php if ($row->jenis_jawaban == "penilaian") {
                                                                        echo "selected";
                                                                    } ?>>Penilaian (Sangat Kurang/Kurang/Cukup/Baik/Sangat Baik)</option>
                                        <option value="kepentingan" <?php if ($row->jenis_jawaban == "kepentingan") {
                                                                        echo "selected";
                                                                    } ?>>Kepentingan (Sangat Tidak Pending/Tidak Penting/Cukup Penting/Perint/Sangat Penting)</option>
                                        <option value="kepuasan" <?php if ($row->jenis_jawaban == "kepuasan") {
                                                                        echo "selected";
                                                                    } ?>>Kepuasan (Sangat Tidak Puas/Tidak Puas/Cukup Puas/Puas/Sangat Puas)</option>
                                        <option value="prodi" <?php if ($row->jenis_jawaban == "prodi") {
                                                                    echo "selected";
                                                                } ?>>Program Studi Itenas</option>
                                        <option value="fakultas" <?php if ($row->jenis_jawaban == "fakultas") {
                                                                        echo "selected";
                                                                    } ?>>Fakultas Itenas</option>
                                        <option value="info" <?php if ($row->jenis_jawaban == "info") {
                                                                    echo "selected";
                                                                } ?>>Informasi Seminar / Webinar / Acara</option>
                                        <option value="pdf" <?php if ($row->jenis_jawaban == "pdf") {
                                                                echo "selected";
                                                            } ?>>Upload File PDF</option>
                                        <option value="pdfnon" <?php if ($row->jenis_jawaban == "pdfnon") {
                                                                    echo "selected";
                                                                } ?>>Upload File PDF (*Non Required)</option>
                                        <option value="gambar" <?php if ($row->jenis_jawaban == "gambar") {
                                                                    echo "selected";
                                                                } ?>>Upload File Gambar</option>
                                        <option value="gambarnon" <?php if ($row->jenis_jawaban == "gambarnon") {
                                                                        echo "selected";
                                                                    } ?>>Upload File Gambar (*Non Required)</option>
                                        <option value="jeniskelamin" <?php if ($row->jenis_jawaban == "jeniskelamin") {
                                                                            echo "selected";
                                                                        } ?>>Jenis Kelamin</option>
                                        <option value="PKMI" <?php if ($row->jenis_jawaban == "PKMI") {
                                                                    echo "selected";
                                                                } ?>>PKMI</option>
                                        <option value="tanggal" <?php if ($row->jenis_jawaban == "tanggal") {
                                                                    echo "selected";
                                                                } ?>>Tanggal</option>
                                        <option value="label" <?php if ($row->jenis_jawaban == "label") {
                                                                    echo "selected";
                                                                } ?>>Label</option>
                                        <option value="label_kecil" <?php if ($row->jenis_jawaban == "label_kecil") {
                                                                        echo "selected";
                                                                    } ?>>Label Kecil</option>
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