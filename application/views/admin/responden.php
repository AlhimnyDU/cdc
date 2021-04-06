<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Responden <?php echo $acara->nama_acara ?></h3>
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
                                            <?php
                                            $id = 1;
                                            foreach ($form as $row) {
                                            ?>
                                                <th width="5%"><?php echo $row->soal ?></th>
                                            <?php
                                                $id++;
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($no = 1; $no <= $max->responden; $no++) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <?php
                                                $query = $this->db->where('responden', $no)->where('id_acara', $acara->id_acara)->where('tbl_soal.jenis_jawaban !=', 'label')->where('tbl_soal.jenis_jawaban !=', 'label_kecil')->where('tbl_soal.jenis_jawaban !=', '1_respond')->join('tbl_soal', 'tbl_soal.id_soal=tbl_jawaban.id_soal', 'left')->get('tbl_jawaban')->result();
                                                foreach ($query as $row) { ?>
                                                    <td>
                                                        <?php if ($row->jawaban != NULL) { ?>
                                                            <?php if (($row->jenis_jawaban == "gambar") || ($row->jenis_jawaban == "gambarnon") || ($row->jenis_jawaban == "pdf")) { ?>
                                                                <a href="<?php echo base_url('assets/upload/form/' . $row->jawaban);  ?>">Download</a>
                                                            <?php } else {
                                                                echo $row->jawaban;
                                                            } ?>
                                                        <?php } else {
                                                            echo "Nothing";
                                                        } ?>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php
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