<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
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
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 mt-4">
                                        <h6> <i class="fa fa-book"></i> Taggihan Kontrak Penyedia</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-10">
                                        <div class="card card-primary">
                                            <div class="card-header text-center">
                                                <label> <i class="fa fa-search-plus" aria-hidden="true"></i> FILTER NAMA PEKERJAAN</label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                                <input type="text" placeholder="Cari Nama Pekerjaan" class="form-control rounded-0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                                <input type="text" placeholder="Cari No Kontrak" class="form-control rounded-0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 mt-1">
                                                        <a href="#" class="btn btn-sm btn-outline-primary btn-block"> <i class="fa fa-search-plus" aria-hidden="true"></i> Filter Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>

                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <div class="card-tools">
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
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
                                                            font-size: 14px;
                                                            overflow: hidden;
                                                            padding: 10px 5px;
                                                            word-break: normal;
                                                        }

                                                        .tg th {
                                                            border-color: black;
                                                            border-style: solid;
                                                            border-width: 1px;
                                                            font-family: Arial, sans-serif;
                                                            font-size: 14px;
                                                            font-weight: normal;
                                                            overflow: hidden;
                                                            padding: 10px 5px;
                                                            word-break: normal;
                                                        }

                                                        .tg .tg-0pky {
                                                            border-color: inherit;
                                                            text-align: left;
                                                            vertical-align: top
                                                        }
                                                    </style>
                                                    <table class="tg table">
                                                        <thead>
                                                            <tr>
                                                                <th class="tg-0pky" rowspan="3">No</th>
                                                                <th class="tg-0pky">Nama Pekerjaan</th>
                                                                <th class="tg-0pky">Nomor Kontrak</th>
                                                                <th class="tg-0pky">Penyedia</th>
                                                                <th class="tg-0pky">Total Kontrak</th>
                                                                <th class="tg-0pky">Tanggal Kontrak</th>
                                                                <th class="tg-0pky">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1;
                                                            $j = 1;
                                                            foreach ($get_mata_anggaran as $key => $value) { ?>
                                                                <?php $id_detail_program_penyedia_jasa = $value['id_detail_program_penyedia_jasa'];  ?>
                                                                <?php
                                                                $this->db->select('*');
                                                                $this->db->from('tbl_sub_detail_program_penyedia_jasa');
                                                                $this->db->where('tbl_sub_detail_program_penyedia_jasa.id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
                                                                // $this->db->order_by('display_order', 'ASC');
                                                                $get_nilai_kontrak = $this->db->get() ?>
                                                                <?php
                                                                $total_kontrak  = 0;
                                                                foreach ($get_nilai_kontrak->result_array() as $value_kontrak) {
                                                                    $total_kontrak += $value_kontrak['nilai_hps']
                                                                ?>
                                                                <?php } ?>
                                                                <tr>
                                                                    <td class="tg-0pky"><?= $i++ ?></td>
                                                                    <td class="tg-0pky"> <label for=""><?= $value['nama_pekerjaan_program_mata_anggaran'] ?></label> </td>
                                                                    <td class="tg-0pky"> <?= $value['no_kontrak'] ?>
                                                                    </td>
                                                                    <td class="tg-0pky"><?= $value['nama_penyedia'] ?>
                                                                    </td>
                                                                    <td class="tg-0pky"> <?= "Rp " . number_format($total_kontrak, 2, ',', '.') ?>
                                                                    </td>
                                                                    <td class="tg-0pky"> <?= $value['tahun_kontrak'] ?>
                                                                    </td>
                                                                    <td class="tg-0pky">
                                                                        <a href="<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/buat_tagihan/') . $value['id_detail_program_penyedia_jasa'] ?>" class="btn btn-sm btn-primary btn-block">Taggihan Kontrak</a>
                                                                    </td>

                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $this->db->select('*');
                                                                $this->db->from('tbl_sub_detail_program_penyedia_jasa');
                                                                $this->db->where('tbl_sub_detail_program_penyedia_jasa.id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
                                                                // $this->db->order_by('display_order', 'ASC');
                                                                $query_result_sub_detail_program = $this->db->get() ?>
                                                                <?php
                                                                $b = 1;
                                                                foreach ($query_result_sub_detail_program->result_array() as $value_sub_detail_program) {

                                                                ?>

                                                                    <tr>
                                                                        <td class="tg-0pky"></td>
                                                                        <td class="tg-0pky" colspan="6"><?= $value_sub_detail_program['nama_program_mata_anggaran'] ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </div>
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
            <!--/. container-fluid -->
        </div>
    </section>
    <!-- /.content -->
</div>