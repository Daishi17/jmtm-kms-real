<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?= base_url('assets/logo.png') ?>" width="250px" alt="">
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-5 mt-4">
                                        <h4> <i class="fa fa-book"></i> BUAT LAPORAN KINERJA</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <center>
                                            <h4>
                                                LAPORAN REALISASI KERJA DAN BIAYA PROGRAM CAPEX
                                            </h4>
                                        </center>
                                        <div class="card-tools">
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <div style="overflow-x: auto;">
                                                        <style type="text/css">
                                                            .tg {
                                                                border-collapse: collapse;
                                                                border-spacing: 0;
                                                            }

                                                            .tg td {
                                                                border-color: black;
                                                                border-style: solid;
                                                                border-width: 1px;
                                                                font-family: Arial, sans-serif;
                                                                font-size: 10px;
                                                                overflow: hidden;
                                                                padding: 10px 20px;
                                                                word-break: normal;
                                                            }

                                                            .tg th {
                                                                border-color: black;
                                                                border-style: solid;
                                                                border-width: 1px;
                                                                font-family: Arial, sans-serif;
                                                                font-size: 10px;
                                                                font-weight: normal;
                                                                overflow: hidden;
                                                                padding: 10px 20px;
                                                                word-break: normal;
                                                            }

                                                            .tg .tg-c3ow {
                                                                border-color: inherit;
                                                                text-align: center;
                                                                vertical-align: top;
                                                            }
                                                        </style>

                                                        <table id="mytable" class="tg table-striped">
                                                            <thead>
                                                                <tr style="font-size: 12px;" class="bg-primary">
                                                                    <th class="tg-c3ow bg-primary">NO </th>
                                                                    <th class="tg-c3ow bg-primary">
                                                                        <div style="width:200px;">
                                                                            URAIAN
                                                                        </div>
                                                                    </th>
                                                                    <th class="tg-c3ow" style="width:400px">
                                                                        <div style="width:200px;">
                                                                            NAMA PEKERJAAN
                                                                        </div>
                                                                    </th>
                                                                    <th class="tg-c3ow">
                                                                        <div style="width:200px;">
                                                                            NILAI ADDENDUM <br> XI
                                                                            KONTRAK MANAJEMEN
                                                                            TAHUN 2022
                                                                        </div>
                                                                    </th>
                                                                    <th class="tg-c3ow">
                                                                        <div style="width:200px;"> VENDOR </div>
                                                                    </th>
                                                                    <th class="tg-c3ow">
                                                                        <div style="width:200px;"> NOMOR & TANGGAL KONTRAK </div>
                                                                    </th>
                                                                    <th class="tg-c3ow">
                                                                        <div style="width:200px;"> KONTRAK AWAL VENDOR (inc ppn) </div>
                                                                    </th>
                                                                    <th class="tg-c3ow">
                                                                        <div style="width:200px;"> NILAI ADDENDUM FINAL QUANTITY VENDOR (inc ppn) </div>
                                                                    </th>
                                                                    <th class="tg-c3ow">
                                                                        <div style="width:200px;"> PROGNOSA BEBAN (inc ppn) </div>
                                                                    </th>
                                                                    <th class="tg-c3ow">
                                                                        <div style="width:200px;"> PROGRES FISIK </div>
                                                                    </th>
                                                                    <th class="tg-c3ow">
                                                                        <div style="width:200px;"> REALISASI PENDAPATAN SESUAI PROGRES FISIK </div>
                                                                    </th>
                                                                    <th class="tg-c3ow">
                                                                        <div style="width:200px;"> REALISASI BEBAN SESUAI PROGRES FISIK </div>
                                                                    </th>
                                                                    <th class="tg-c3ow">
                                                                        <div style="width:200px;"> EFISIENSI TOTAL (Rp) </div>
                                                                    </th>
                                                                    <th class="tg-c3ow">
                                                                        <div style="width:200px;"> MARGIN (%) </div>
                                                                    </th>
                                                                    <th class="tg-c3ow">
                                                                        <div style="width:200px;"> FEE JMTM (Rp) </div>
                                                                    </th>
                                                                    <th class="tg-c3ow">
                                                                        <div style="width:200px;"> DIKEMBALIKAN KE OWNER (Rp) </div>
                                                                    </th>
                                                                    <th class="tg-c3ow">
                                                                        <div style="width:200px;"> PROGNOSA BEBAN AKHIR TAHUN 2022 </div>
                                                                    </th>
                                                                    <th class="tg-c3ow">
                                                                        <div style="width:200px;"> KETERANGAN </div>
                                                                    </th>
                                                                    <th class="tg-c3ow bg-primary">
                                                                        <div style="width:115px;"> Aksi </div>
                                                                    </th>

                                                            </thead>
                                                            <tbody style="font-size: 12px;">
                                                                <!-- looping capex -->
                                                                <?php
                                                                $this->db->select('*');
                                                                $this->db->from('tbl_capex');
                                                                $this->db->where('tbl_capex.id_kontrak', $row_kontrak['id_kontrak']);
                                                                $this->db->where('tbl_capex.id_kontrak', $row_kontrak['id_kontrak']);
                                                                $query_result_capex = $this->db->get() ?>
                                                                <?php
                                                                foreach ($query_result_capex->result_array() as $value_capex) { ?>
                                                                    <?php $id_capex = $value_capex['id_capex'];  ?>
                                                                    <tr>
                                                                        <td class="tg-c3ow"><?= $value_capex['no_urut'] ?></td>
                                                                        <td class="tg-c3ow"><?= $value_capex['nama_uraian'] ?></td>
                                                                        <td class="tg-c3ow"></td>
                                                                        <td class="tg-c3ow"> <?= "Rp " . number_format($value_capex['nilai_capex' . $row_kontrak['add_terakhir']], 2, ',', '.') ?></td>
                                                                        <td class="tg-c3ow"></td>
                                                                        <td class="tg-c3ow"></td>
                                                                        <td class="tg-c3ow"></td>
                                                                        <td class="tg-c3ow"></td>
                                                                        <td class="tg-c3ow"></td>
                                                                        <td class="tg-c3ow"></td>
                                                                        <td class="tg-c3ow"></td>
                                                                        <td class="tg-c3ow"></td>
                                                                        <td class="tg-c3ow"></td>
                                                                        <td class="tg-c3ow"></td>
                                                                        <td class="tg-c3ow"></td>
                                                                        <td class="tg-c3ow"></td>
                                                                        <td class="tg-c3ow"></td>
                                                                        <td class="tg-c3ow"></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <?php
                                                                    $this->db->select('*');
                                                                    $this->db->from('tbl_capex_detail');
                                                                    $this->db->where('tbl_capex_detail.id_capex', $id_capex);
                                                                    $query_result_detail_capex = $this->db->get() ?>
                                                                    <?php
                                                                    foreach ($query_result_detail_capex->result_array() as $value_detail_capex) { ?>
                                                                        <?php $id_capex_detail = $value_detail_capex['id_capex_detail'];  ?>
                                                                        <tr>
                                                                            <td class="tg-c3ow"><?= $value_detail_capex['no_urut'] ?></td>
                                                                            <td class="tg-c3ow"><?= $value_detail_capex['nama_uraian'] ?></td>
                                                                            <td class="tg-c3ow"></td>
                                                                            <td class="tg-c3ow"> <?= "Rp " . number_format($value_detail_capex['nilai_detail_capex' . $row_kontrak['add_terakhir']], 2, ',', '.') ?></td>
                                                                            <td class="tg-c3ow"></td>
                                                                            <td class="tg-c3ow"></td>
                                                                            <td class="tg-c3ow"></td>
                                                                            <td class="tg-c3ow"></td>
                                                                            <td class="tg-c3ow"></td>
                                                                            <td class="tg-c3ow"></td>
                                                                            <td class="tg-c3ow"></td>
                                                                            <td class="tg-c3ow"></td>
                                                                            <td class="tg-c3ow"></td>
                                                                            <td class="tg-c3ow"></td>
                                                                            <td class="tg-c3ow"></td>
                                                                            <td class="tg-c3ow"></td>
                                                                            <td class="tg-c3ow"></td>
                                                                            <td class="tg-c3ow"></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <?php
                                                                        $this->db->select('*');
                                                                        $this->db->from('tbl_detail_capex_1');
                                                                        $this->db->where('tbl_detail_capex_1.id_capex_detail', $id_capex_detail);
                                                                        $query_result_detail_capex_1 = $this->db->get() ?>
                                                                        <?php
                                                                        foreach ($query_result_detail_capex_1->result_array() as $value_detail_capex_1) { ?>
                                                                            <?php $id_detail_capex_1 = $value_detail_capex_1['id_detail_capex_1'];  ?>
                                                                            <?php
                                                                            $this->db->select('*');
                                                                            $this->db->from('tbl_sub_detail_program_penyedia_jasa');
                                                                            $this->db->where('tbl_sub_detail_program_penyedia_jasa.id_checking', $id_detail_capex_1);
                                                                            $query_sub_program = $this->db->get() ?>
                                                                            <?php
                                                                            foreach ($query_sub_program->result_array() as $value_sub_program) { ?>
                                                                                <?php $id_detail_program_penyedia_jasa = $value_sub_program['id_detail_program_penyedia_jasa'];  ?>
                                                                                <?php
                                                                                $this->db->select('*');
                                                                                $this->db->from('tbl_detail_program_penyedia_jasa');
                                                                                $this->db->where('tbl_detail_program_penyedia_jasa.id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
                                                                                $query_program = $this->db->get() ?>
                                                                                <?php
                                                                                foreach ($query_program->result_array() as $value_program) { ?>
                                                                                    <?php
                                                                                    $total_relasi_pendapatan  =  $value_detail_capex_1['nilai_capex_detail_1' . $row_kontrak['add_terakhir']] * $value_sub_program['persen_progres_fisik'] / 100;
                                                                                    $total_relasi_beban = $value_sub_program['nilai_addendum_terakhir_fq'] * $value_sub_program['persen_progres_fisik'] / 100;
                                                                                    $total_efisiensi =  $value_detail_capex_1['nilai_capex_detail_1' . $row_kontrak['add_terakhir']] - $value_sub_program['nilai_addendum_terakhir_fq'];
                                                                                    $total_margin = $total_efisiensi / $value_detail_capex_1['nilai_capex_detail_1' . $row_kontrak['add_terakhir']] 
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td class="tg-c3ow"><?= $value_detail_capex_1['no_urut_1_capex'] ?></td>
                                                                                        <td class="tg-c3ow">
                                                                                            <?= $value_detail_capex_1['nama_uraian_1_capex'] ?>
                                                                                        </td>
                                                                                        <td class="tg-c3ow">
                                                                                            <?= $value_program['nama_pekerjaan_program_mata_anggaran'] ?>
                                                                                        </td>
                                                                                        <td class="tg-c3ow"> <?= "Rp " . number_format($value_detail_capex_1['nilai_capex_detail_1' . $row_kontrak['add_terakhir']], 2, ',', '.') ?></td>
                                                                                        <td class="tg-c3ow"><?= $value_program['nama_penyedia'] ?></td>
                                                                                        <td class="tg-c3ow"><?= $row_kontrak['no_kontrak'] ?> / <?= $row_kontrak['tahun_kontrak'] ?></td>
                                                                                        <td class="tg-c3ow"><?= "Rp " . number_format($value_sub_program['nilai_hps'], 2, ',', '.') ?></td>
                                                                                        <td class="tg-c3ow"><?= "Rp " . number_format($value_sub_program['nilai_addendum_terakhir_fq'], 2, ',', '.') ?></td>
                                                                                        <td class="tg-c3ow"><?= "Rp " . number_format($value_sub_program['nilai_addendum_terakhir_fq'], 2, ',', '.') ?></td>
                                                                                        <?php if ($value_sub_program['persen_progres_fisik']) { ?>
                                                                                            <td class="tg-c3ow"><?= $value_sub_program['persen_progres_fisik'] ?>%</td>
                                                                                        <?php   } else { ?>
                                                                                            <td class="tg-c3ow"></td>
                                                                                        <?php   }  ?>
                                                                                        <?php if ($value_sub_program['persen_progres_fisik']) { ?>
                                                                                            <td class="tg-c3ow"><?= "Rp " . number_format($total_relasi_pendapatan, 2, ',', '.') ?></td>
                                                                                        <?php   } else { ?>
                                                                                            <td class="tg-c3ow"></td>
                                                                                        <?php   }  ?>
                                                                                      
                                                                                        <?php if ($value_sub_program['persen_progres_fisik'] && $value_sub_program['nilai_addendum_terakhir_fq']) { ?>
                                                                                            <td class="tg-c3ow"><?= "Rp " . number_format($total_relasi_beban, 2, ',', '.') ?></td>
                                                                                        <?php   } else { ?>
                                                                                            <td class="tg-c3ow"></td>
                                                                                        <?php   }  ?>
                                                                                        <td class="tg-c3ow"><?= "Rp " . number_format($total_efisiensi, 2, ',', '.') ?></td>
                                                                                        <td class="tg-c3ow"><?= round($total_margin);  ?>%</td>
                                                                                        <td class="tg-c3ow"></td>
                                                                                        <td class="tg-c3ow"></td>
                                                                                        <td class="tg-c3ow"></td>
                                                                                        <td class="tg-c3ow"></td>
                                                                                        <td class="tg-c3ow">
                                                                                            <a href="javascript:;" onclick="ProgresFisik(<?= $value_sub_program['id_detail_sub_program_penyedia_jasa'] ?>)" style="font-size: 10px;" class="btn btn-sm btn-outline-primary"><i class="fas fa fa-file"></i> Keloa Progres Fisik</a>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- ./card-body -->
                                        <!-- /.card-footer -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <!-- /.row -->
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modal_progres_fisik" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">Update Progres Fisik</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <form action="javascript:;" id="form_progres_fisik" method="post">
                                    <input type="hidden" name="id_detail_sub_program_penyedia_jasa">
                                    <div class="form-group">
                                        <label for="">% Progres Fisik</label>
                                        <input type="number" name="persen_progres_fisik" id="" class="form-control" placeholder="Masukan Nilai Persen %">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="javascript:;" class="btn btn-outline-success" onclick="SimpanProgresFisik()">Simpan</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
</div>