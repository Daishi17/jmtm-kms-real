<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <i class="nav-icon far fa-address-card"></i>
                        Kontrak Mangement
                        <br>
                    </h1>
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
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                Table Kontrak
                            </h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-block bg-gradient-success" data-toggle="modal" data-target="#tambah_program">
                                    <i class="fas fa-plus"></i>
                                    Tambah Kontrak
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <table id="table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <i class="far fa-file-alt"></i>
                                                        No
                                                    </th>
                                                    <th>
                                                        <i class="far fa-envelope-open"></i>
                                                        Nama Kontrak
                                                    </th>
                                                    <th>
                                                        <i class="far fa-envelope-open"></i>
                                                        No Kontrak
                                                    </th>
                                                    <th>
                                                        <i class="fas fa-home"></i>
                                                        Tahun
                                                    </th>
                                                    <th>
                                                        <i class="fas fa-info-circle"></i>
                                                        Kontrak Awal
                                                    </th>
                                                    <th>
                                                        <i class="fas fa-cogs"></i>
                                                        Status
                                                    </th>
                                                    <th>
                                                        <i class="fas fa-cogs"></i>
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- ./card-body -->
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <!-- /.row -->
            </div>
            <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<div class="modal fade" id="tambah_program">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h4 class="modal-title">
                    <i class="fas fa-briefcase"></i>
                    Tambah Kontrak
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-navy">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Form Input Kontrak
                                </h3>
                            </div>
                            <form id="form_tambah_kontrak">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label for="">No. Kontrak</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-clipboard"> </i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="no_kontrak" placeholder="Nama Kontrak">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Nama Kontrak</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-clipboard"> </i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="nama_kontrak" placeholder="Nama Kontrak">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Tahun Anggaran</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar"> </i>
                                                    </span>
                                                </div>
                                                <input type="date" placeholder="Tahun" class="form-control" name="tahun_anggaran" placeholder="Tahun">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Nilai Kontrak Awal</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-money-bill-alt" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="nilai_kontrak_awal" placeholder="Nilai Kontrak Awal">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="">Departemen, Area, Ruas Kontrak, Owner</label>
                                            <div class="form-group">
                                                <select class="form-control" name="id_detail_role">
                                                    <?php foreach ($detail_role as $key => $value) { ?>
                                                        <option value="<?= $value['id_detail_role'] ?>">
                                                            <?= $value['nama_role'] . ' - ' . $value['nama_area'] . ' - ' . $value['nama_ruas'] . ' - ' . $value['nama_owner']   ?>
                                                        </option>
                                                    <?php  } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <button type="button" onclick="save_program()" class="btn btn-success float-right">Simpan</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="lihat_uraian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" id="table_uraian">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Uraian</th>
                            <th>Tanggan Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Tambah Uraian</button>
            </div>
        </div>
    </div>
</div>




<?php $nolevel3 = 1;
foreach ($datakontrak as $key => $datapost) { ?>
    <?php $id_kontrak = $datapost['id_kontrak'];  ?>
    <?php
    $this->db->select('*');
    $this->db->from('tbl_capex');
    $this->db->where('tbl_capex.id_kontrak', $id_kontrak);
    $query = $this->db->get() ?>
    <tr>
        <td class="tg-0lax"><?= $nolevel3++ ?></td>
        <td class="tg-0lax" colspan="5"><?= $datapost['nama_kontrak']; ?></td>
        <td class="tg-0lax"><?= "Rp " . number_format($datapost['nilai_kontrak_awal'], 2, ',', '.') ?></td>
        <td class="tg-0lax">
            <?php if ($datapost['nilai_kontrak_awal'] == null || $datapost['nilai_kontrak_awal'] == 0) { ?>
                <div class="btn-group">
                    <?php if ($query) { ?>
                    <?php  } else { ?>
                        <a href="javascript:;" onclick="masukan_nilai_kontrak(<?= $id_kontrak ?>)" class="btn btn-warning"><i class="fas fa-dollar-sign"></i></a>
                    <?php   } ?>
                    <a href="javascript:;" onclick="tambah_level_2(<?= $id_kontrak ?>)" class="btn btn-success"><i class="fas fa fa-plus"></i></a>
                    <a href="javascript:;" class="btn btn-info"><i class="fas fa fa-edit"></i></a>
                    <a href="javascript:;" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                </div>
            <?php   } else { ?>
                <div class="btn-group">
                    <?php if ($query) { ?>
                        <a href="javascript:;" onclick="masukan_nilai_kontrak(<?= $id_kontrak ?>)" class="btn btn-warning"><i class="fas fa-dollar-sign"></i></a>
                    <?php     } else { ?>
                        <a href="javascript:;" onclick="tambah_level_2(<?= $id_kontrak ?>)" class="btn btn-success"><i class="fas fa fa-plus"></i></a>
                    <?php   } ?>
                    <a href="javascript:;" class="btn btn-info"><i class="fas fa fa-edit"></i></a>
                    <a href="javascript:;" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                </div>
            <?php   } ?>
        </td>
    </tr>
    <div class="modal fade" id="modal_add_value_level_1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="title_lv1"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:;" id="form_impan_level_nilai_kontrak_level_1" method="post">
                        <input type="text" name="id_kontrak_level_1">
                        <div class="form-group">
                            <label for="">Nilai Kontrak / Addendum</label>
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-money-bill-alt" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" class="form-control" name="nilai_kontrak_awal" id="nilai_kontrak_awal1" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="tanpa-rupiah">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="javascript:;" id="reset_button_level_1" onclick="reset_nilai_kontrak_level_1()" class="btn btn-danger">Reset Nilai</a>
                    <a href="javascript:;" id="simpan_button_level_1" onclick="simpan_nilai_kontrak_level_1()" class="btn btn-primary">Update</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_pilih_level_2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="title_lv2"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:;" id="form_pilih_level_2" method="post">
                        <input type="hidden" name="id_kontrak_level_2">
                        <input type="text" name="simpan_no_urut_level_2">
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group">
                                    <label for="">Plih Level</label>
                                    <select class="form-control" name="pilih_level2" id="">
                                        <option value="">--- Plih Level ---</option>
                                        <option value="Capex">Capex</option>
                                        <option value="Opex">Opex</option>
                                        <option value="Bua">Bua</option>
                                        <option value="Sdm">Sdm</option>
                                    </select>
                                </div>
                            </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="javascript:;" id="simpan_button_level_2" onclick="simpan_level_2()" class="btn btn-primary">Pilih & Simpan</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    $this->db->select('*');
    $this->db->from('tbl_capex');
    $this->db->where('tbl_capex.id_kontrak', $id_kontrak);
    $query_0 = $this->db->get() ?>
    <?php $nolevel1 = 1;
    foreach ($query_0->result_array() as $key => $value_1) { ?>
        <?php $id_capex = $value_1['id_capex'];  ?>
        <?php
        $this->db->select('*');
        $this->db->from('tbl_capex_detail');
        $this->db->where('tbl_capex_detail.id_capex', $id_capex);
        $kondisi_capex_detail = $this->db->get()->result_array() ?>
        <tr>
            <td class="tg-0lax"><?= $value_1['no_urut'] ?></td>
            <td class="tg-0lax" colspan="5">&nbsp;&nbsp;<?= $value_1['nama_uraian']; ?></td>
            <td class="tg-0lax"><?= "Rp " . number_format($value_1['nilai_capex'], 2, ',', '.') ?></td>
            <td class="tg-0lax">

                <?php if ($value_1['nilai_capex'] == null || $value_1['nilai_capex'] == 0) { ?>
                    <div class="btn-group">
                        <?php if ($kondisi_capex_detail) { ?>
                        <?php     } else { ?>
                            <a href="javascript:;" onclick="masukan_nilai_level_3(<?= $id_capex ?>)" class="btn btn-warning"><i class="fas fa-dollar-sign"></i></a>

                        <?php   } ?>
                        <a href="javascript:;" onclick="tambah_level_3(<?= $id_capex ?>)" class="btn btn-success"><i class="fas fa fa-plus"></i></a>
                        <a href="javascript:;" class="btn btn-info"><i class="fas fa fa-edit"></i></a>
                        <a href="javascript:;" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                    </div>
                <?php   } else { ?>
                    <div class="btn-group">
                        <?php if ($kondisi_capex_detail) { ?>
                            <a href="javascript:;" onclick="tambah_level_3(<?= $id_capex ?>)" class="btn btn-success"><i class="fas fa fa-plus"></i></a>
                        <?php     } else { ?>
                            <a href="javascript:;" onclick="masukan_nilai_level_3(<?= $id_capex ?>)" class="btn btn-warning"><i class="fas fa-dollar-sign"></i></a>
                        <?php   } ?>
                        <a href="javascript:;" class="btn btn-info"><i class="fas fa fa-edit"></i></a>
                        <a href="javascript:;" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                    </div>
                <?php   } ?>
            </td>
        </tr>
        <!-- INI UNTUK LEVEL 2 -->
        <div class="modal fade" id="modal_add_value_level_2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="title_level2"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:;" id="form_simpan_nilai_level_2" method="post">
                            <input type="text" name="id_capex_level_2">
                            <input type="text" name="id_kontrak_capex">
                            <div class="form-group">
                                <label for="">Nilai</label>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-money-bill-alt" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" class="form-control" name="nilai_capex" id="nilai_capex1" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="tanpa_rupiah1">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="javascript:;" id="reset_button_data_lvl_2" onclick="reset_nilai_level_2()" class="btn btn-danger">Reset Nilai</a>
                        <a href="javascript:;" id="simpan_button_data_lvl_2" onclick="simpan_nilai_level2()" class="btn btn-primary">Update</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ini untuk level 3 -->
        <div class="modal fade" id="modal_tambah_level_3" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="title_level3"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:;" id="form_tambah_level_3" method="post">
                            <input type="hidden" name="id_capex_lv3">
                            <input type="hidden" name="simpan_no_urut_level_3">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nama Uraian Pekerjaan</label>
                                            <input type="text" name="nama_uraian_lv3" class="form-control">
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="javascript:;" id="simpan_button_level_3" onclick="simpan_level_3()" class="btn btn-primary">Pilih & Simpan</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->db->select('*');
        $this->db->from('tbl_capex_detail');
        $this->db->where('tbl_capex_detail.id_capex', $id_capex);
        $this->db->order_by('display_order');
        $query1 = $this->db->get() ?>
        <?php $nolevel1_1 = 1;
        foreach ($query1->result_array() as $key => $value_2) { ?>
            <?php $id_capex_detail = $value_2['id_capex_detail'];  ?>
            <?php
            $this->db->select('*');
            $this->db->from('tbl_detail_capex_1');
            $this->db->where('tbl_detail_capex_1.id_capex_detail', $id_capex_detail);
            $kondisi_capex_detail_1 = $this->db->get()->result_array() ?>
            <tr>
                <td class="tg-0lax"><?= $value_2['no_urut'] ?></td>
                <td class="tg-0lax" colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;<?= $value_2['nama_uraian']; ?></td>
                <td class="tg-0lax"><?= "Rp " . number_format($value_2['nilai_detail_capex'], 2, ',', '.') ?></td>

                <td class="tg-0lax">

                    <?php if ($value_2['nilai_detail_capex'] == null || $value_2['nilai_detail_capex'] == 0) { ?>
                        <div class="btn-group">
                            <?php if ($kondisi_capex_detail_1) { ?>

                            <?php     } else { ?>
                                <a href="javascript:;" onclick="masukan_nilai_capex_detail_1(<?= $id_capex_detail ?>)" class="btn btn-warning"><i class="fas fa-dollar-sign"></i></a>
                            <?php   } ?>
                            <a href="javascript:;" onclick="tambah_level_capex_detail_1(<?= $id_capex_detail ?>)" class="btn btn-success"><i class="fas fa fa-plus"></i></a>
                            <a href="javascript:;" class="btn btn-info"><i class="fas fa fa-edit"></i></a>
                            <a href="javascript:;" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                        </div>
                    <?php   } else { ?>
                        <div class="btn-group">
                            <a href="javascript:;" onclick="masukan_nilai_capex_detail_1(<?= $id_capex_detail ?>)" class="btn btn-warning"><i class="fas fa-dollar-sign"></i></a>
                            <a href="javascript:;" class="btn btn-info"><i class="fas fa fa-edit"></i></a>
                            <a href="javascript:;" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                        </div>
                    <?php   } ?>
                </td>
            </tr>
            <!-- modal update level sebelumnya -->
            <div class="modal fade" id="modal_level_4" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="title_level_4"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:;" id="form_simpan_nilai_4" method="post">
                                <input type="text" name="id_capex_detail">
                                <div class="form-group">
                                    <label for="">Nilai Level</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-money-bill-alt" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" class="form-control" name="nilai_detail_capex" id="nilai_detail_capex" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="tanpa_rupiah_detail_capex">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="javascript:;" id="reset_button_data_lvl_3" onclick="reset_nilai_level_3()" class="btn btn-danger">Reset Nilai</a>
                            <a href="javascript:;" id="simpan_button_data_lvl_3" onclick="simpan_nilai_level_3()" class="btn btn-primary">Update</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal tambah  -->
            <div class="modal fade" id="modal_tambah_level_4" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="title_level4_1"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:;" id="form_tambah_level_4" method="post">
                                <input type="hidden" name="id_capex_detail">
                                <input type="text" name="simpan_no_urut_level_4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Nama Uraian Pekerjaan</label>
                                                <input type="text" name="nama_uraian_1_capex" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="javascript:;" id="simpan_button_level_4" onclick="simpan_level_4()" class="btn btn-primary">Simpan</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $this->db->select('*');
            $this->db->from('tbl_detail_capex_1');
            $this->db->where('tbl_detail_capex_1.id_capex_detail', $id_capex_detail);
            $query2 = $this->db->get() ?>
            <?php $nolevel2_2 = 1;
            foreach ($query2->result_array() as $key => $value_3) { ?>
                <?php $id_detail_capex_1 = $value_3['id_detail_capex_1'];  ?>
                <?php
                $this->db->select('*');
                $this->db->from('tbl_detail_capex_2');
                $this->db->where('tbl_detail_capex_2.id_detail_capex_1', $id_detail_capex_1);
                $kondisi_capex_detail_2 = $this->db->get()->result_array() ?>
                <tr>
                    <td class="tg-0lax"><?= $value_3['no_urut_1_capex'] ?></td>
                    <td class="tg-0lax" colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $value_3['nama_uraian_1_capex']; ?></td>
                    <td class="tg-0lax"><?= "Rp " . number_format($value_3['nilai_capex_detail_1'], 2, ',', '.') ?></td>
                    <td class="tg-0lax">

                        <?php if ($value_3['nilai_capex_detail_1'] == null || $value_3['nilai_capex_detail_1'] == 0) { ?>
                            <div class="btn-group">
                                <?php if ($kondisi_capex_detail_2) { ?>

                                <?php     } else { ?>

                                    <a href="javascript:;" onclick="masukan_nilai_capex_detail_4_1(<?= $id_detail_capex_1 ?>)" class="btn btn-warning"><i class="fas fa-dollar-sign"></i></a>
                                <?php   } ?>
                                <a href="javascript:;" onclick="tambah_level_capex_detail_4_2(<?= $id_detail_capex_1 ?>)" class="btn btn-success"><i class="fas fa fa-plus"></i></a>
                                <a href="javascript:;" class="btn btn-info"><i class="fas fa fa-edit"></i></a>
                                <a href="javascript:;" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                            </div>
                        <?php   } else { ?>
                            <div class="btn-group">
                                <a href="javascript:;" onclick="masukan_nilai_capex_detail_4_1(<?= $id_detail_capex_1 ?>)" class="btn btn-warning"><i class="fas fa-dollar-sign"></i></a>
                                <a href="javascript:;" class="btn btn-info"><i class="fas fa fa-edit"></i></a>
                                <a href="javascript:;" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                            </div>
                        <?php   } ?>
                    </td>
                </tr>
                <div class="modal fade" id="modal_level_4_1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title" id="title_level_4_1"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="javascript:;" id="form_simpan_nilai_4_1" method="post">
                                    <input type="text" name="id_detail_capex_1">
                                    <div class="form-group">
                                        <label for="">Nilai 3 CAPEX DETAIL</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-money-bill-alt" aria-hidden="true"></i>
                                                    </span>
                                                    <input type="text" class="form-control" name="nilai_capex_detail_1" id="nilai_capex_detail_1" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="tanpa_rupiah_detail_capex_4_2">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="javascript:;" id="simpan_button_data_lvl_4_1" onclick="reset_nilai_level_4_1()" class="btn btn-danger">Reset Nilai</a>
                                <a href="javascript:;" id="reset_button_data_lvl_4_1" onclick="simpan_nilai_level_4_1()" class="btn btn-primary">Simpan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal tambah  -->
                <div class="modal fade" id="modal_tambah_level_4_2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title" id="title_level_4_2"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="javascript:;" id="form_tambah_level_4_2" method="post">
                                    <input type="text" name="id_detail_capex_1">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Nama Uraian Pekerjaan</label>
                                                    <input type="text" name="nama_uraian_2_capex" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="javascript:;" id="simpan_button_level_4_2" onclick="simpan_level_4_2()" class="btn btn-primary">Simpan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $this->db->select('*');
                $this->db->from('tbl_detail_capex_2');
                $this->db->where('tbl_detail_capex_2.id_detail_capex_1', $id_detail_capex_1);
                $query_4_2 = $this->db->get() ?>
                <?php $nolevel_4_2 = 1;
                foreach ($query_4_2->result_array() as $key => $value_level_4_2) { ?>
                    <?php $id_detail_capex_2 = $value_level_4_2['id_detail_capex_2'];  ?>
                    <?php
                    $this->db->select('*');
                    $this->db->from('tbl_detail_capex_3');
                    $this->db->where('tbl_detail_capex_3.id_detail_capex_2', $id_detail_capex_2);
                    $kondisi_capex_detail_3 = $this->db->get()->result_array() ?>
                    <tr>
                        <td class="tg-0lax"><?= $nolevel_4_2++  ?></td>
                        <td class="tg-0lax" colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $value_level_4_2['nama_uraian_2_capex']; ?></td>
                        <td class="tg-0lax"><?= "Rp " . number_format($value_level_4_2['nilai_capex_detail_2'], 2, ',', '.') ?></td>
                        <td class="tg-0lax">

                            <?php if ($value_level_4_2['nilai_capex_detail_2'] == null || $value_level_4_2['nilai_capex_detail_2'] == 0) { ?>
                                <div class="btn-group">
                                    <?php if ($kondisi_capex_detail_3) { ?>
                                    <?php     } else { ?>
                                        <a href="javascript:;" onclick="masukan_nilai_capex_detail_4_2(<?= $id_detail_capex_2 ?>)" class="btn btn-warning"><i class="fas fa-dollar-sign"></i></a>
                                    <?php   } ?>
                                    <a href="javascript:;" onclick="tambah_level_capex_detail_4_3(<?= $id_detail_capex_2 ?>)" class="btn btn-success"><i class="fas fa fa-plus"></i></a>
                                    <a href="javascript:;" class="btn btn-info"><i class="fas fa fa-edit"></i></a>
                                    <a href="javascript:;" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                                </div>
                            <?php   } else { ?>
                                <div class="btn-group">
                                    <a href="javascript:;" onclick="masukan_nilai_capex_detail_4_2(<?= $id_detail_capex_2 ?>)" class="btn btn-warning"><i class="fas fa-dollar-sign"></i></a>
                                    <a href="javascript:;" class="btn btn-info"><i class="fas fa fa-edit"></i></a>
                                    <a href="javascript:;" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                                </div>
                            <?php   } ?>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal_level_4_2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title" id="title_level_4_2"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="javascript:;" id="form_simpan_nilai_4_2" method="post">
                                        <input type="text" name="id_detail_capex_2">
                                        <div class="form-group">
                                            <label for="">Nilai</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-money-bill-alt" aria-hidden="true"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="nilai_capex_detail_2" id="nilai_capex_detail_2" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="tanpa_rupiah_detail_capex_2">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="javascript:;" id="simpan_button_data_lvl_4_2" onclick="reset_nilai_level_4_2()" class="btn btn-danger">Reset Nilai</a>
                                    <a href="javascript:;" id="reset_button_data_lvl_4_2" onclick="simpan_nilai_level_4_2()" class="btn btn-primary">Simpan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal tambah  -->
                    <div class="modal fade" id="modal_tambah_level_4_3" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title" id="title_level_4_3"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="javascript:;" id="form_tambah_level_4_3" method="post">
                                        <input type="text" name="id_detail_capex_2">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Nama Uraian Pekerjaan</label>
                                                        <input type="text" name="nama_uraian_3_capex" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="javascript:;" id="simpan_button_level_4_3" onclick="simpan_level_4_3()" class="btn btn-primary">Simpan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $this->db->select('*');
                    $this->db->from('tbl_detail_capex_3');
                    $this->db->where('tbl_detail_capex_3.id_detail_capex_2', $id_detail_capex_2);
                    $query_4_3 = $this->db->get() ?>
                    <?php $nolevel_4_3 = 1;
                    foreach ($query_4_3->result_array() as $key => $value_level_4_3) { ?>
                        <?php $id_detail_capex_3 = $value_level_4_3['id_detail_capex_3'];  ?>
                        <tr>
                            <td class="tg-0lax"><?= $nolevel_4_3++  ?></td>
                            <td class="tg-0lax" colspan="5"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $value_level_4_3['nama_uraian_3_capex']; ?></td>
                            <td class="tg-0lax"><?= "Rp " . number_format($value_level_4_3['nilai_capex_detail_3'], 2, ',', '.') ?></td>
                            <td class="tg-0lax">
                                <div class="btn-group">
                                    <a href="javascript:;" onclick="masukan_nilai_capex_detail_4_3(<?= $id_detail_capex_3 ?>)" class="btn btn-warning"><i class="fas fa-dollar-sign"></i></a>
                                    <a href="javascript:;" onclick="tambah_level_capex_detail_4_4(<?= $id_detail_capex_3 ?>)" class="btn btn-success"><i class="fas fa fa-plus"></i></a>
                                    <a href="javascript:;" class="btn btn-info"><i class="fas fa fa-edit"></i></a>
                                    <a href="javascript:;" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php    } ?>
                <?php    } ?>
            <?php    } ?>
        <?php    } ?>
    <?php    } ?>
    <!-- OPEX BATAS -->
    <?php
    $this->db->select('*');
    $this->db->from('tbl_opex');
    $this->db->where('tbl_opex.id_kontrak', $id_kontrak);
    $query_0 = $this->db->get() ?>
    <?php $nolevel1 = 1;
    foreach ($query_0->result_array() as $key => $value_1) { ?>
        <?php $id_opex = $value_1['id_opex'];  ?>
        <?php
        $this->db->select('*');
        $this->db->from('tbl_opex_detail');
        $this->db->where('tbl_opex_detail.id_opex', $id_opex);
        $kondisi_opex_detail = $this->db->get()->result_array() ?>
        <tr>
            <td class="tg-0lax"><?= $value_1['no_urut'] . '.' . $nolevel1++ ?></td>
            <td class="tg-0lax" colspan="5">&nbsp;&nbsp;<?= $value_1['nama_uraian']; ?></td>
            <td class="tg-0lax"><?= "Rp " . number_format($value_1['nilai_opex'], 2, ',', '.') ?></td>
            <td class="tg-0lax">
                <div class="btn-group">
                    <a href="javascript:;" onclick="masukan_nilai_level_3_opex(<?= $id_opex ?>)" class="btn btn-warning"><i class="fas fa-dollar-sign"></i></a>
                    <a href="javascript:;" onclick="tambah_level_3_opex(<?= $id_opex ?>)" class="btn btn-success"><i class="fas fa fa-plus"></i></a>
                    <a href="javascript:;" class="btn btn-info"><i class="fas fa fa-edit"></i></a>
                    <a href="javascript:;" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                </div>
            </td>
        </tr>
        <!-- INI UNTUK LEVEL 2 -->
        <div class="modal fade" id="modal_add_value_level_2_opex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="title_level2_opex"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:;" id="form_simpan_nilai_level_2_opex" method="post">
                            <input type="text" name="id_opex_level_2">
                            <input type="text" name="id_kontrak_opex">
                            <div class="form-group">
                                <label for="">Nilai</label>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-money-bill-alt" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" class="form-control" name="nilai_opex" id="nilai_opex1" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="tanpa_rupiah1_opex">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="javascript:;" id="reset_button_data_lvl_2_opex" onclick="reset_nilai_level_2_opex()" class="btn btn-danger">Reset Nilai</a>
                        <a href="javascript:;" id="simpan_button_data_lvl_2_opex" onclick="simpan_nilai_level2_opex()" class="btn btn-primary">Update</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ini untuk level 3 -->
        <div class="modal fade" id="modal_tambah_level_3_opex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="title_level3_opex"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:;" id="form_tambah_level_3_opex" method="post">
                            <input type="hidden" name="id_opex_lv3">
                            <input type="hidden" name="simpan_no_urut_level_3_opex">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nama Uraian Pekerjaan</label>
                                            <input type="text" name="nama_uraian_lv3" class="form-control">
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="javascript:;" id="simpan_button_level_3_opex" onclick="simpan_level_3_opex()" class="btn btn-primary">Pilih & Simpan</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->db->select('*');
        $this->db->from('tbl_opex_detail');
        $this->db->where('tbl_opex_detail.id_opex', $id_opex);
        $query1 = $this->db->get() ?>
        <?php $nolevel1_1 = 1;
        foreach ($query1->result_array() as $key => $value_2) { ?>
            <?php $id_opex_detail = $value_2['id_opex_detail'];  ?>
            <?php
            $this->db->select('*');
            $this->db->from('tbl_detail_opex_1');
            $this->db->where('tbl_detail_opex_1.id_opex_detail', $id_opex_detail);
            $kondisi_opex_detail_1 = $this->db->get()->result_array() ?>

            <tr>
                <td class="tg-0lax">1.1<?= $value_2['no_urut'] . '.' . $nolevel1_1++ ?></td>
                <td class="tg-0lax" colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;<?= $value_2['nama_uraian']; ?></td>
                <td class="tg-0lax"><?= "Rp " . number_format($value_2['nilai_detail_opex'], 2, ',', '.') ?></td>

                <td class="tg-0lax">
                    <div class="btn-group">
                        <a href="javascript:;" onclick="masukan_nilai_opex_detail_1(<?= $id_opex_detail ?>)" class="btn btn-warning"><i class="fas fa-dollar-sign"></i></a>
                        <a href="javascript:;" onclick="tambah_level_opex_detail_1(<?= $id_opex_detail ?>)" class="btn btn-success"><i class="fas fa fa-plus"></i></a>
                        <a href="javascript:;" class="btn btn-info"><i class="fas fa fa-edit"></i></a>
                        <a href="javascript:;" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                    </div>

                </td>
            </tr>
            <!-- modal update level sebelumnya -->
            <div class="modal fade" id="modal_level_4_opex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="title_level_4"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:;" id="form_simpan_nilai_4_opex" method="post">
                                <input type="text" name="id_opex_detail">
                                <div class="form-group">
                                    <label for="">Nilai</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-money-bill-alt" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" class="form-control" name="nilai_detail_opex" id="nilai_detail_opex" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="tanpa_rupiah_detail_opex">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="javascript:;" id="reset_button_data_lvl_3_opex" onclick="reset_nilai_level_3_opex()" class="btn btn-danger">Reset Nilai</a>
                            <a href="javascript:;" id="simpan_button_data_lvl_3_opex" onclick="simpan_nilai_level_3_opex()" class="btn btn-primary">Update</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal tambah  -->
            <div class="modal fade" id="modal_tambah_level_4_opex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="title_level4_1_opex"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:;" id="form_tambah_level_4_opex" method="post">
                                <input type="text" name="id_opex_detail">
                                <input type="text" name="simpan_no_urut_level_4_opex">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Nama Uraian asdaPekerjaan</label>
                                                <input type="text" name="nama_uraian_1_opex" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="javascript:;" id="simpan_button_level_4_opex" onclick="simpan_level_4_opex()" class="btn btn-primary">Simpan</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $this->db->select('*');
            $this->db->from('tbl_detail_opex_1');
            $this->db->where('tbl_detail_opex_1.id_opex_detail', $id_opex_detail);
            $query2 = $this->db->get() ?>
            <?php $nolevel2_2 = 1;
            foreach ($query2->result_array() as $key => $value_3) { ?>
                <?php $id_detail_opex_1 = $value_3['id_detail_opex_1'];  ?>
                <?php
                $this->db->select('*');
                $this->db->from('tbl_detail_opex_2');
                $this->db->where('tbl_detail_opex_2.id_detail_opex_1', $id_detail_opex_1);
                $kondisi_opex_detail_2 = $this->db->get()->result_array() ?>
                <tr>
                    <td class="tg-0lax">1.1.1<?= $value_3['no_urut_1_opex'] . '.' . $nolevel2_2++ ?></td>
                    <td class="tg-0lax" colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $value_3['nama_uraian_1_opex']; ?></td>
                    <td class="tg-0lax"><?= "Rp " . number_format($value_3['nilai_opex_detail_1'], 2, ',', '.') ?></td>
                    <td class="tg-0lax">
                        <div class="btn-group">
                            <a href="javascript:;" onclick="masukan_nilai_opex_detail_4_1(<?= $id_detail_opex_1 ?>)" class="btn btn-warning"><i class="fas fa-dollar-sign"></i></a>
                            <a href="javascript:;" onclick="tambah_level_opex_detail_4_2(<?= $id_detail_opex_1 ?>)" class="btn btn-success"><i class="fas fa fa-plus"></i></a>
                            <a href="javascript:;" class="btn btn-info"><i class="fas fa fa-edit"></i></a>
                            <a href="javascript:;" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                        </div>

                    </td>
                </tr>
                <div class="modal fade" id="modal_level_4_1_opex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title" id="title_level_4_1_opex"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="javascript:;" id="form_simpan_nilai_4_1_opex" method="post">
                                    <input type="text" name="id_detail_opex_1">
                                    <div class="form-group">
                                        <label for="">Nilai</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-money-bill-alt" aria-hidden="true"></i>
                                                    </span>
                                                    <input type="text" class="form-control" name="nilai_opex_detail_1" id="nilai_opex_detail_1" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="tanpa_rupiah_detail_opex_4_2_opex">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="javascript:;" id="simpan_button_data_lvl_4_1_opex" onclick="reset_nilai_level_4_1_opex()" class="btn btn-danger">Reset Nilai</a>
                                <a href="javascript:;" id="reset_button_data_lvl_4_1_opex" onclick="simpan_nilai_level_4_1_opex()" class="btn btn-primary">Simpan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal tambah  -->
                <div class="modal fade" id="modal_tambah_level_4_2_opex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title" id="title_level_4_2_opex"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="javascript:;" id="form_tambah_level_4_2_opex" method="post">
                                    <input type="text" name="id_detail_opex_1">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Nama Uraian Pekerjaan</label>
                                                    <input type="text" name="nama_uraian_2_opex" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="javascript:;" id="simpan_button_level_4_2_opex" onclick="simpan_level_4_2_opex()" class="btn btn-primary">Simpan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $this->db->select('*');
                $this->db->from('tbl_detail_opex_2');
                $this->db->where('tbl_detail_opex_2.id_detail_opex_1', $id_detail_opex_1);
                $query_4_2 = $this->db->get() ?>
                <?php $nolevel_4_2 = 1;
                foreach ($query_4_2->result_array() as $key => $value_level_4_2) { ?>
                    <?php $id_detail_opex_2 = $value_level_4_2['id_detail_opex_2'];  ?>
                    <?php
                    $this->db->select('*');
                    $this->db->from('tbl_detail_opex_3');
                    $this->db->where('tbl_detail_opex_3.id_detail_opex_2', $id_detail_opex_2);
                    $kondisi_opex_detail_3 = $this->db->get()->result_array() ?>
                    <tr>
                        <td class="tg-0lax"> 1.1.1.1.<?= $nolevel_4_2++  ?></td>
                        <td class="tg-0lax" colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $value_level_4_2['nama_uraian_2_opex']; ?></td>
                        <td class="tg-0lax"><?= "Rp " . number_format($value_level_4_2['nilai_opex_detail_2'], 2, ',', '.') ?></td>
                        <td class="tg-0lax">

                            <?php if ($value_level_4_2['nilai_opex_detail_2'] == null || $value_level_4_2['nilai_opex_detail_2'] == 0) { ?>
                                <div class="btn-group">
                                    <?php if ($kondisi_opex_detail_3) { ?>
                                    <?php     } else { ?>
                                        <a href="javascript:;" onclick="masukan_nilai_opex_detail_4_2(<?= $id_detail_opex_2 ?>)" class="btn btn-warning"><i class="fas fa-dollar-sign"></i></a>
                                    <?php   } ?>
                                    <a href="javascript:;" onclick="tambah_level_opex_detail_4_3(<?= $id_detail_opex_2 ?>)" class="btn btn-success"><i class="fas fa fa-plus"></i></a>
                                    <a href="javascript:;" class="btn btn-info"><i class="fas fa fa-edit"></i></a>
                                    <a href="javascript:;" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                                </div>
                            <?php   } else { ?>
                                <div class="btn-group">
                                    <a href="javascript:;" onclick="masukan_nilai_opex_detail_4_2(<?= $id_detail_opex_2 ?>)" class="btn btn-warning"><i class="fas fa-dollar-sign"></i></a>
                                    <a href="javascript:;" class="btn btn-info"><i class="fas fa fa-edit"></i></a>
                                    <a href="javascript:;" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                                </div>
                            <?php   } ?>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal_level_4_2_opex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title" id="title_level_4_2_opex"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="javascript:;" id="form_simpan_nilai_4_2_opex" method="post">
                                        <input type="text" name="id_detail_opex_2">
                                        <div class="form-group" id="form_input_nilai_level_1" style="display: none;">
                                            <label for="">Nilai</label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-money-bill-alt" aria-hidden="true"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="nilai_opex_detail_2" id="nilai_opex_detail_2" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="tanpa_rupiah_detail_opex_2">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="javascript:;" id="simpan_button_data_lvl_4_2_opex" onclick="reset_nilai_level_4_2_opex()" class="btn btn-danger">Reset Nilai</a>
                                    <a href="javascript:;" id="reset_button_data_lvl_4_2_opex" onclick="simpan_nilai_level_4_2_opex()" class="btn btn-primary">Simpan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal tambah  -->
                    <div class="modal fade" id="modal_tambah_level_4_3_opex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title" id="title_level_4_3_opex"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="javascript:;" id="form_tambah_level_4_3_opex" method="post">
                                        <input type="text" name="id_detail_opex_2">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Nama Uraian Pekerjaan</label>
                                                        <input type="text" name="nama_uraian_3_opex" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="javascript:;" id="simpan_button_level_4_3_opex" onclick="simpan_level_4_3_opex()" class="btn btn-primary">Simpan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $this->db->select('*');
                    $this->db->from('tbl_detail_opex_3');
                    $this->db->where('tbl_detail_opex_3.id_detail_opex_2', $id_detail_opex_2);
                    $query_4_3 = $this->db->get() ?>
                    <?php $nolevel_4_3 = 1;
                    foreach ($query_4_3->result_array() as $key => $value_level_4_3) { ?>
                        <?php $id_detail_opex_3 = $value_level_4_3['id_detail_opex_3'];  ?>
                        <tr>
                            <td class="tg-0lax"> 1.1.1.1.1.<?= $nolevel_4_3++  ?></td>
                            <td class="tg-0lax" colspan="5"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $value_level_4_3['nama_uraian_3_opex']; ?></td>
                            <td class="tg-0lax"><?= "Rp " . number_format($value_level_4_3['nilai_opex_detail_3'], 2, ',', '.') ?></td>
                            <td class="tg-0lax">
                                <div class="btn-group">
                                    <a href="javascript:;" onclick="masukan_nilai_opex_detail_4_3(<?= $id_detail_opex_3 ?>)" class="btn btn-warning"><i class="fas fa-dollar-sign"></i></a>
                                    <a href="javascript:;" onclick="tambah_level_opex_detail_4_4(<?= $id_detail_opex_3 ?>)" class="btn btn-success"><i class="fas fa fa-plus"></i></a>
                                    <a href="javascript:;" class="btn btn-info"><i class="fas fa fa-edit"></i></a>
                                    <a href="javascript:;" class="btn btn-danger"><i class="fas fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php    } ?>
                <?php    } ?>
            <?php    } ?>
        <?php    } ?>
    <?php    } ?>
<?php     } ?>