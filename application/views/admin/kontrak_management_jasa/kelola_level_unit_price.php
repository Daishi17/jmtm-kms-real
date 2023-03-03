<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <i class="nav-icon far fa-address-card"></i>
                        Kontrak Mangement Unit Price
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
                                Plilih Program Kontrak Penyedia <?= $row_kontrak['nama_kontrak'] ?>
                                <input type="hidden" name="id_kontrak" id="id_kontrak"
                                    value="<?= $row_kontrak['id_kontrak'] ?>">
                            </h5>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="row">
                                <style type="text/css">
                                .tg {
                                    border-collapse: collapse;
                                    border-color: #9ABAD9;
                                    border-spacing: 0;
                                }

                                .tg td {
                                    background-color: #EBF5FF;
                                    border-color: #9ABAD9;
                                    border-style: solid;
                                    border-width: 1px;
                                    color: #444;
                                    font-family: Arial, sans-serif;
                                    font-size: 14px;
                                    overflow: hidden;
                                    padding: 10px 5px;
                                    word-break: normal;
                                }

                                .tg th {
                                    background-color: #409cff;
                                    border-color: #9ABAD9;
                                    border-style: solid;
                                    border-width: 1px;
                                    color: #fff;
                                    font-family: Arial, sans-serif;
                                    font-size: 14px;
                                    font-weight: normal;
                                    overflow: hidden;
                                    padding: 10px 5px;
                                    word-break: normal;
                                }

                                .tg .tg-0lax {
                                    text-align: left;
                                    vertical-align: top
                                }
                                </style>

                                <!-- <a href="javascript:;" data-toggle="modal" data-target="#add_level_1" class="btn btn-sm btn-primary mb-3"> + Tambah Level 1</a><br> -->
                                <table class="tg table">
                                    <thead>
                                        <tr>
                                            <th class="tg-0lax text-center" rowspan="2"></th>
                                            <th class="tg-0lax text-center" rowspan="2">No</th>
                                            <th class="tg-0lax text-center" rowspan="2">Nama Uraian</th>
                                            <th class="tg-0lax text-center" rowspan="2">Satuan</th>
                                            <th class="tg-0lax text-center" colspan="3">Rencana Addendum</th>
                                            <th class="tg-0lax text-center" rowspan="2">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th class="tg-0lax text-center">Kuantitas</th>
                                            <th class="tg-0lax text-center">Harga Satuan</th>
                                            <th class="tg-0lax text-center">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('tbl_unit_price');
                                        $this->db->where('tbl_unit_price.id_kontrak', $row_kontrak['id_kontrak']);
                                        $this->db->order_by('display_order', 'ASC');
                                        $query_tbl_unit_price = $this->db->get() ?>
                                        <?php $total_unit_price = 0;
                                        foreach ($query_tbl_unit_price->result_array() as $key => $valur_total_unit_price) {
                                            if ($valur_total_unit_price['total_harga']) {
                                                $total_unit_price +=  $valur_total_unit_price['total_harga'];
                                            } else {
                                                $total_unit_price +=  0;
                                            }
                                        }; ?>
                                        <?php
                                        foreach ($query_tbl_unit_price->result_array() as $value_tb_unit_price) { ?>
                                        <?php $id_unit_price = $value_tb_unit_price['id_unit_price'];  ?>
                                        <?php
                                            $this->db->select('*');
                                            $this->db->from('tbl_unit_price_1');
                                            $this->db->where('tbl_unit_price_1.id_unit_price', $id_unit_price);
                                            $kondisi_tbl_unit_price_1 = $this->db->get()->result_array() ?>
                                        <tr>
                                            <td class="tg-0lax">Level 1</td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price['no_urut']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price['nama_uraian']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price['satuan']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price['kuantitas']; ?></td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price['harga_satuan'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price['total_harga'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?php if ($value_tb_unit_price['harga_satuan'] == null || $value_tb_unit_price['harga_satuan'] == 0) { ?>
                                                <?php if ($kondisi_tbl_unit_price_1) { ?>


                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'edit_level_1_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'urutan_level_1_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>

                                                <?php if ($value_tb_unit_price['no_urut'] == 1) { ?>
                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'update_nilai_level_1_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>
                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'tambah_level_1_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'edit_level_1_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'urutan_level_1_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'update_nilai_level_1_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>
                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'tambah_level_1_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'hapus_level_1_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'edit_level_1_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'urutan_level_1_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>

                                                <?php   }  ?>
                                                <?php } else { ?>
                                                <?php if ($kondisi_tbl_unit_price_1) { ?>
                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'update_nilai_level_1_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>

                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'edit_level_1_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'urutan_level_1_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php if ($value_tb_unit_price['no_urut'] == 1) { ?>

                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'edit_level_1_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'urutan_level_1_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>


                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'hapus_level_1_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'edit_level_1_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'urutan_level_1_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'update_nilai_level_1_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>

                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'edit_level_1_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_1_unit_price(<?= $value_tb_unit_price['id_unit_price'] ?>,'urutan_level_1_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php    } ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="form_modal_level_1_unit_price" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_modal_level_1_unit_price">
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="javascript:;" method="post"
                                                            id="form_simpan_level_1_unit_price">

                                                            <input type="hidden" name="id_unit_price">
                                                            <input type="hidden" name="id_kontrak"
                                                                value="<?= $row_kontrak['id_kontrak'] ?>">
                                                            <input type="text" name="grand_total_post">
                                                            <div class="form-group" style="display: none;"
                                                                id="form_tambah_level_1_unit_price">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Nama Uraian</label>
                                                                            <input type="text" name="nama_uraian"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group" style="display: none;"
                                                                id="form_input_nilai_level_1_unit_price">
                                                                <label for="">Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa fa-edit"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="satuan" id="satuan"
                                                                                placeholder="Satuan">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Kuantitas</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="kuantitas" id="kuantitas"
                                                                                placeholder="kuantitas">
                                                                        </div>
                                                                        <small id="helpId" class="text-muted">Harap
                                                                            Menggunakan titik jika koma ex :
                                                                            60.00</small>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Harga Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text"
                                                                                class="form-control harga_satuan"
                                                                                name="harga_satuan"
                                                                                aria-describedby="helpId"
                                                                                placeholder="Jumlah Nilai">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="text" disabled
                                                                            class="float-right form-control form-control-sm mt-1"
                                                                            style="width: 200px;"
                                                                            id="rupiah_harga_satuan_level_1_unit_price">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="javascript:;" style="display: none;"
                                                            id="button_update_nilai_level_1_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_1_unit_price('update_nilai_level_1_unit_price')">Simpan</a>
                                                        <a href="javascript:;" id="button_tambah_level_1_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_1_unit_price('tambah_level_1_unit_price')">Update</a>
                                                        <a href="javascript:;" id="button_edit_level_1_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_1_unit_price('edit_level_1_unit_price')">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            $this->db->select('*');
                                            $this->db->from('tbl_unit_price_1');
                                            $this->db->where('tbl_unit_price_1.id_unit_price', $id_unit_price);
                                            $this->db->order_by('display_order', 'ASC');
                                            $query_tbl_unit_price_1 = $this->db->get() ?>
                                        <?php $total_unit_price_1 = 0;
                                            foreach ($query_tbl_unit_price_1->result_array() as $key => $valur_total_unit_price_1) {
                                                if ($valur_total_unit_price_1['total_harga']) {
                                                    $total_unit_price_1 +=  $valur_total_unit_price_1['total_harga'];
                                                } else {
                                                    $total_unit_price_1 +=  0;
                                                }
                                            }; ?>
                                        <?php
                                            foreach ($query_tbl_unit_price_1->result_array() as $value_tb_unit_price_1) { ?>
                                        <?php $id_unit_price_1 = $value_tb_unit_price_1['id_unit_price_1'];  ?>
                                        <?php
                                                $this->db->select('*');
                                                $this->db->from('tbl_unit_price_2');
                                                $this->db->where('tbl_unit_price_2.id_unit_price_1', $id_unit_price_1);
                                                $kondisi_tbl_unit_price_2 = $this->db->get()->result_array() ?>
                                        <tr>
                                            <td class="tg-0lax">Level 2</td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_1['no_urut']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_1['nama_uraian']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_1['satuan']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_1['kuantitas']; ?></td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_1['harga_satuan'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_1['total_harga'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?php if ($value_tb_unit_price_1['harga_satuan'] == null || $value_tb_unit_price_1['harga_satuan'] == 0) { ?>
                                                <?php if ($kondisi_tbl_unit_price_2) { ?>

                                                <a onclick="modal_level_2_unit_price(<?= $value_tb_unit_price_1['id_unit_price_1'] ?>,'tambah_level_2_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_2_unit_price(<?= $value_tb_unit_price_1['id_unit_price_1'] ?>,'edit_level_2_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_2_unit_price(<?= $value_tb_unit_price_1['id_unit_price_1'] ?>,'urutan_level_2_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_2_unit_price(<?= $value_tb_unit_price_1['id_unit_price_1'] ?>,'update_nilai_level_2_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>
                                                <a onclick="modal_level_2_unit_price(<?= $value_tb_unit_price_1['id_unit_price_1'] ?>,'tambah_level_2_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_2_unit_price(<?= $value_tb_unit_price_1['id_unit_price_1'] ?>,'hapus_level_2_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_2_unit_price(<?= $value_tb_unit_price_1['id_unit_price_1'] ?>,'edit_level_2_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_2_unit_price(<?= $value_tb_unit_price_1['id_unit_price_1'] ?>,'urutan_level_2_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php } else { ?>
                                                <?php if ($kondisi_tbl_unit_price_2) { ?>

                                                <a onclick="modal_level_2_unit_price(<?= $value_tb_unit_price_1['id_unit_price_1'] ?>,'tambah_level_2_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_2_unit_price(<?= $value_tb_unit_price_1['id_unit_price_1'] ?>,'edit_level_2_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_2_unit_price(<?= $value_tb_unit_price_1['id_unit_price_1'] ?>,'urutan_level_2_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_2_unit_price(<?= $value_tb_unit_price_1['id_unit_price_1'] ?>,'update_nilai_level_2_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>
                                                <a onclick="modal_level_2_unit_price(<?= $value_tb_unit_price_1['id_unit_price_1'] ?>,'hapus_level_2_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_2_unit_price(<?= $value_tb_unit_price_1['id_unit_price_1'] ?>,'edit_level_2_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_2_unit_price(<?= $value_tb_unit_price_1['id_unit_price_1'] ?>,'urutan_level_2_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php    } ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="form_modal_level_2_unit_price" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_modal_level_2_unit_price">
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="javascript:;" method="post"
                                                            id="form_simpan_level_2_unit_price">

                                                            <input type="hidden" name="id_unit_price">
                                                            <input type="hidden" name="id_kontrak"
                                                                value="<?= $row_kontrak['id_kontrak'] ?>">
                                                            <input type="text" name="grand_total_post">
                                                            <div class="form-group" style="display: none;"
                                                                id="form_tambah_level_2_unit_price">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Nama Uraian</label>
                                                                            <input type="text" name="nama_uraian"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group" style="display: none;"
                                                                id="form_input_nilai_level_2_unit_price">
                                                                <label for="">Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa fa-edit"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="satuan" id="satuan"
                                                                                placeholder="Satuan">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Kuantitas</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="kuantitas" id="kuantitas"
                                                                                placeholder="kuantitas">
                                                                        </div>
                                                                        <small id="helpId" class="text-muted">Harap
                                                                            Menggunakan titik jika koma ex :
                                                                            60.00</small>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Harga Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text"
                                                                                class="form-control harga_satuan"
                                                                                name="harga_satuan"
                                                                                aria-describedby="helpId"
                                                                                placeholder="Jumlah Nilai">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="text" disabled
                                                                            class="float-right form-control form-control-sm mt-1"
                                                                            style="width: 200px;"
                                                                            id="rupiah_harga_satuan_level_2_unit_price">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="javascript:;" style="display: none;"
                                                            id="button_update_nilai_level_2_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_2_unit_price('update_nilai_level_2_unit_price')">Simpan</a>
                                                        <a href="javascript:;" id="button_tambah_level_2_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_2_unit_price('tambah_level_2_unit_price')">Update</a>
                                                        <a href="javascript:;" id="button_edit_level_2_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_2_unit_price('edit_level_2_unit_price')">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- UNIT PRICE 2 -->
                                        <?php
                                                $this->db->select('*');
                                                $this->db->from('tbl_unit_price_2');
                                                $this->db->where('tbl_unit_price_2.id_unit_price_1', $id_unit_price_1);
                                                $this->db->order_by('display_order', 'ASC');
                                                $query_tbl_unit_price_2 = $this->db->get() ?>
                                        <?php $total_unit_price_2 = 0;
                                                foreach ($query_tbl_unit_price_2->result_array() as $key => $valur_total_unit_price_2) {
                                                    if ($valur_total_unit_price_2['total_harga']) {
                                                        $total_unit_price_2 +=  $valur_total_unit_price_2['total_harga'];
                                                    } else {
                                                        $total_unit_price_2 +=  0;
                                                    }
                                                }; ?>
                                        <?php
                                                foreach ($query_tbl_unit_price_2->result_array() as $value_tb_unit_price_2) { ?>
                                        <?php $id_unit_price_2 = $value_tb_unit_price_2['id_unit_price_2'];  ?>
                                        <?php
                                                    $this->db->select('*');
                                                    $this->db->from('tbl_unit_price_3');
                                                    $this->db->where('tbl_unit_price_3.id_unit_price_2', $id_unit_price_2);
                                                    $kondisi_tbl_unit_price_2 = $this->db->get()->result_array() ?>
                                        <tr>
                                            <td class="tg-0lax">Level 3</td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_2['no_urut']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_2['nama_uraian']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_2['satuan']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_2['kuantitas']; ?></td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_2['harga_satuan'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_2['total_harga'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?php if ($value_tb_unit_price_2['harga_satuan'] == null || $value_tb_unit_price_2['harga_satuan'] == 0) { ?>
                                                <?php if ($kondisi_tbl_unit_price_2) { ?>

                                                <a onclick="modal_level_3_unit_price(<?= $value_tb_unit_price_2['id_unit_price_2'] ?>,'tambah_level_3_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_3_unit_price(<?= $value_tb_unit_price_2['id_unit_price_2'] ?>,'edit_level_3_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_3_unit_price(<?= $value_tb_unit_price_2['id_unit_price_2'] ?>,'urutan_level_3_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_3_unit_price(<?= $value_tb_unit_price_2['id_unit_price_2'] ?>,'update_nilai_level_3_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>
                                                <a onclick="modal_level_3_unit_price(<?= $value_tb_unit_price_2['id_unit_price_2'] ?>,'tambah_level_3_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_3_unit_price(<?= $value_tb_unit_price_2['id_unit_price_2'] ?>,'hapus_level_3_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_3_unit_price(<?= $value_tb_unit_price_2['id_unit_price_2'] ?>,'edit_level_3_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_3_unit_price(<?= $value_tb_unit_price_2['id_unit_price_2'] ?>,'urutan_level_3_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php } else { ?>
                                                <?php if ($kondisi_tbl_unit_price_2) { ?>

                                                <a onclick="modal_level_3_unit_price(<?= $value_tb_unit_price_2['id_unit_price_2'] ?>,'tambah_level_3_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_3_unit_price(<?= $value_tb_unit_price_2['id_unit_price_2'] ?>,'edit_level_3_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_3_unit_price(<?= $value_tb_unit_price_2['id_unit_price_2'] ?>,'urutan_level_3_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_3_unit_price(<?= $value_tb_unit_price_2['id_unit_price_2'] ?>,'update_nilai_level_3_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>

                                                <a onclick="modal_level_3_unit_price(<?= $value_tb_unit_price_2['id_unit_price_2'] ?>,'hapus_level_3_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_3_unit_price(<?= $value_tb_unit_price_2['id_unit_price_2'] ?>,'edit_level_3_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_3_unit_price(<?= $value_tb_unit_price_2['id_unit_price_2'] ?>,'urutan_level_3_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php    } ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="form_modal_level_3_unit_price" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_modal_level_3_unit_price">
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="javascript:;" method="post"
                                                            id="form_simpan_level_3_unit_price">

                                                            <input type="hidden" name="id_unit_price">
                                                            <input type="hidden" name="id_kontrak"
                                                                value="<?= $row_kontrak['id_kontrak'] ?>">
                                                            <input type="text" name="grand_total_post">
                                                            <div class="form-group" style="display: none;"
                                                                id="form_tambah_level_3_unit_price">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Nama Uraian</label>
                                                                            <input type="text" name="nama_uraian"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group" style="display: none;"
                                                                id="form_input_nilai_level_3_unit_price">
                                                                <label for="">Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa fa-edit"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="satuan" id="satuan"
                                                                                placeholder="Satuan">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Kuantitas</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="kuantitas" id="kuantitas"
                                                                                placeholder="kuantitas">
                                                                        </div>
                                                                        <small id="helpId" class="text-muted">Harap
                                                                            Menggunakan titik jika koma ex :
                                                                            60.00</small>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Harga Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text"
                                                                                class="form-control harga_satuan"
                                                                                name="harga_satuan"
                                                                                aria-describedby="helpId"
                                                                                placeholder="Jumlah Nilai">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="text" disabled
                                                                            class="float-right form-control form-control-sm mt-1"
                                                                            style="width: 200px;"
                                                                            id="rupiah_harga_satuan_level_3_unit_price">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="javascript:;" style="display: none;"
                                                            id="button_update_nilai_level_3_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_3_unit_price('update_nilai_level_3_unit_price')">Simpan</a>
                                                        <a href="javascript:;" id="button_tambah_level_3_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_3_unit_price('tambah_level_3_unit_price')">Update</a>
                                                        <a href="javascript:;" id="button_edit_level_3_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_3_unit_price('edit_level_3_unit_price')">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- UNIT PRICE 3 -->
                                        <!-- price_3 -->
                                        <?php
                                                    $this->db->select('*');
                                                    $this->db->from('tbl_unit_price_3');
                                                    $this->db->where('tbl_unit_price_3.id_unit_price_2', $id_unit_price_2);
                                                    $this->db->order_by('display_order', 'ASC');
                                                    $query_tbl_unit_price_3 = $this->db->get() ?>
                                        <?php $total_unit_price_3 = 0;
                                                    foreach ($query_tbl_unit_price_3->result_array() as $key => $valur_total_unit_price_3) {
                                                        if ($valur_total_unit_price_3['total_harga']) {
                                                            $total_unit_price_3 +=  $valur_total_unit_price_3['total_harga'];
                                                        } else {
                                                            $total_unit_price_3 +=  0;
                                                        }
                                                    }; ?>
                                        <?php
                                                    foreach ($query_tbl_unit_price_3->result_array() as $value_tb_unit_price_3) { ?>
                                        <?php $id_unit_price_3 = $value_tb_unit_price_3['id_unit_price_3'];  ?>
                                        <?php
                                                        $this->db->select('*');
                                                        $this->db->from('tbl_unit_price_4');
                                                        $this->db->where('tbl_unit_price_4.id_unit_price_3', $id_unit_price_3);
                                                        $kondisi_tbl_unit_price_3 = $this->db->get()->result_array() ?>
                                        <tr>
                                            <td class="tg-0lax">Level 4</td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_3['no_urut']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_3['nama_uraian']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_3['satuan']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_3['kuantitas']; ?></td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_3['harga_satuan'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_3['total_harga'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?php if ($value_tb_unit_price_3['harga_satuan'] == null || $value_tb_unit_price_3['harga_satuan'] == 0) { ?>
                                                <?php if ($kondisi_tbl_unit_price_3) { ?>

                                                <a onclick="modal_level_4_unit_price(<?= $value_tb_unit_price_3['id_unit_price_3'] ?>,'tambah_level_4_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_4_unit_price(<?= $value_tb_unit_price_3['id_unit_price_3'] ?>,'edit_level_4_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_4_unit_price(<?= $value_tb_unit_price_3['id_unit_price_3'] ?>,'urutan_level_4_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_4_unit_price(<?= $value_tb_unit_price_3['id_unit_price_3'] ?>,'update_nilai_level_4_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>
                                                <a onclick="modal_level_4_unit_price(<?= $value_tb_unit_price_3['id_unit_price_3'] ?>,'tambah_level_4_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_4_unit_price(<?= $value_tb_unit_price_3['id_unit_price_3'] ?>,'hapus_level_4_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_4_unit_price(<?= $value_tb_unit_price_3['id_unit_price_3'] ?>,'edit_level_4_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_4_unit_price(<?= $value_tb_unit_price_3['id_unit_price_3'] ?>,'urutan_level_4_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php } else { ?>
                                                <?php if ($kondisi_tbl_unit_price_3) { ?>

                                                <a onclick="modal_level_4_unit_price(<?= $value_tb_unit_price_3['id_unit_price_3'] ?>,'tambah_level_4_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_4_unit_price(<?= $value_tb_unit_price_3['id_unit_price_3'] ?>,'edit_level_4_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_4_unit_price(<?= $value_tb_unit_price_3['id_unit_price_3'] ?>,'urutan_level_4_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_4_unit_price(<?= $value_tb_unit_price_3['id_unit_price_3'] ?>,'update_nilai_level_4_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>

                                                <a onclick="modal_level_4_unit_price(<?= $value_tb_unit_price_3['id_unit_price_3'] ?>,'hapus_level_4_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_4_unit_price(<?= $value_tb_unit_price_3['id_unit_price_3'] ?>,'edit_level_4_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_4_unit_price(<?= $value_tb_unit_price_3['id_unit_price_3'] ?>,'urutan_level_4_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php    } ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="form_modal_level_4_unit_price" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_modal_level_4_unit_price">
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="javascript:;" method="post"
                                                            id="form_simpan_level_4_unit_price">

                                                            <input type="hidden" name="id_unit_price">
                                                            <input type="hidden" name="id_kontrak"
                                                                value="<?= $row_kontrak['id_kontrak'] ?>">
                                                            <input type="text" name="grand_total_post">
                                                            <div class="form-group" style="display: none;"
                                                                id="form_tambah_level_4_unit_price">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Nama Uraian</label>
                                                                            <input type="text" name="nama_uraian"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group" style="display: none;"
                                                                id="form_input_nilai_level_4_unit_price">
                                                                <label for="">Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa fa-edit"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="satuan" id="satuan"
                                                                                placeholder="Satuan">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Kuantitas</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="kuantitas" id="kuantitas"
                                                                                placeholder="kuantitas">
                                                                        </div>
                                                                        <small id="helpId" class="text-muted">Harap
                                                                            Menggunakan titik jika koma ex :
                                                                            60.00</small>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Harga Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text"
                                                                                class="form-control harga_satuan"
                                                                                name="harga_satuan"
                                                                                aria-describedby="helpId"
                                                                                placeholder="Jumlah Nilai">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="text" disabled
                                                                            class="float-right form-control form-control-sm mt-1"
                                                                            style="width: 200px;"
                                                                            id="rupiah_harga_satuan_level_4_unit_price">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="javascript:;" style="display: none;"
                                                            id="button_update_nilai_level_4_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_4_unit_price('update_nilai_level_4_unit_price')">Simpan</a>
                                                        <a href="javascript:;" id="button_tambah_level_4_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_4_unit_price('tambah_level_4_unit_price')">Update</a>
                                                        <a href="javascript:;" id="button_edit_level_4_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_4_unit_price('edit_level_4_unit_price')">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- UNIT PRICE 4 -->
                                        <!-- price_4 -->
                                        <!-- level_5 -->
                                        <?php
                                                        $this->db->select('*');
                                                        $this->db->from('tbl_unit_price_4');
                                                        $this->db->where('tbl_unit_price_4.id_unit_price_3', $id_unit_price_3);
                                                        $this->db->order_by('display_order', 'ASC');
                                                        $query_tbl_unit_price_4 = $this->db->get() ?>
                                        <?php $total_unit_price_4 = 0;
                                                        foreach ($query_tbl_unit_price_4->result_array() as $key => $valur_total_unit_price_4) {
                                                            if ($valur_total_unit_price_4['total_harga']) {
                                                                $total_unit_price_4 +=  $valur_total_unit_price_4['total_harga'];
                                                            } else {
                                                                $total_unit_price_4 +=  0;
                                                            }
                                                        }; ?>
                                        <?php
                                                        foreach ($query_tbl_unit_price_4->result_array() as $value_tb_unit_price_4) { ?>
                                        <?php $id_unit_price_4 = $value_tb_unit_price_4['id_unit_price_4'];  ?>
                                        <?php
                                                            $this->db->select('*');
                                                            $this->db->from('tbl_unit_price_5');
                                                            $this->db->where('tbl_unit_price_5.id_unit_price_4', $id_unit_price_4);
                                                            $kondisi_tbl_unit_price_4 = $this->db->get()->result_array() ?>
                                        <tr>
                                            <td class="tg-0lax">Level 5</td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_4['no_urut']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_4['nama_uraian']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_4['satuan']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_4['kuantitas']; ?></td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_4['harga_satuan'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_4['total_harga'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?php if ($value_tb_unit_price_4['harga_satuan'] == null || $value_tb_unit_price_4['harga_satuan'] == 0) { ?>
                                                <?php if ($kondisi_tbl_unit_price_4) { ?>

                                                <a onclick="modal_level_5_unit_price(<?= $value_tb_unit_price_4['id_unit_price_4'] ?>,'tambah_level_5_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_5_unit_price(<?= $value_tb_unit_price_4['id_unit_price_4'] ?>,'edit_level_5_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_5_unit_price(<?= $value_tb_unit_price_4['id_unit_price_4'] ?>,'urutan_level_5_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_5_unit_price(<?= $value_tb_unit_price_4['id_unit_price_4'] ?>,'update_nilai_level_5_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>
                                                <a onclick="modal_level_5_unit_price(<?= $value_tb_unit_price_4['id_unit_price_4'] ?>,'tambah_level_5_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_5_unit_price(<?= $value_tb_unit_price_4['id_unit_price_4'] ?>,'hapus_level_5_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_5_unit_price(<?= $value_tb_unit_price_4['id_unit_price_4'] ?>,'edit_level_5_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_5_unit_price(<?= $value_tb_unit_price_4['id_unit_price_4'] ?>,'urutan_level_5_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php } else { ?>
                                                <?php if ($kondisi_tbl_unit_price_4) { ?>

                                                <a onclick="modal_level_5_unit_price(<?= $value_tb_unit_price_4['id_unit_price_4'] ?>,'tambah_level_5_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_5_unit_price(<?= $value_tb_unit_price_4['id_unit_price_4'] ?>,'edit_level_5_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_5_unit_price(<?= $value_tb_unit_price_4['id_unit_price_4'] ?>,'urutan_level_5_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_5_unit_price(<?= $value_tb_unit_price_4['id_unit_price_4'] ?>,'update_nilai_level_5_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>

                                                <a onclick="modal_level_5_unit_price(<?= $value_tb_unit_price_4['id_unit_price_4'] ?>,'hapus_level_5_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_5_unit_price(<?= $value_tb_unit_price_4['id_unit_price_4'] ?>,'edit_level_5_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_5_unit_price(<?= $value_tb_unit_price_4['id_unit_price_4'] ?>,'urutan_level_5_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php    } ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="form_modal_level_5_unit_price" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_modal_level_5_unit_price">
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="javascript:;" method="post"
                                                            id="form_simpan_level_5_unit_price">

                                                            <input type="hidden" name="id_unit_price">
                                                            <input type="hidden" name="id_kontrak"
                                                                value="<?= $row_kontrak['id_kontrak'] ?>">
                                                            <input type="text" name="grand_total_post">
                                                            <div class="form-group" style="display: none;"
                                                                id="form_tambah_level_5_unit_price">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Nama Uraian</label>
                                                                            <input type="text" name="nama_uraian"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group" style="display: none;"
                                                                id="form_input_nilai_level_5_unit_price">
                                                                <label for="">Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa fa-edit"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="satuan" id="satuan"
                                                                                placeholder="Satuan">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Kuantitas</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="kuantitas" id="kuantitas"
                                                                                placeholder="kuantitas">
                                                                        </div>
                                                                        <small id="helpId" class="text-muted">Harap
                                                                            Menggunakan titik jika koma ex :
                                                                            60.00</small>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Harga Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text"
                                                                                class="form-control harga_satuan"
                                                                                name="harga_satuan"
                                                                                aria-describedby="helpId"
                                                                                placeholder="Jumlah Nilai">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="text" disabled
                                                                            class="float-right form-control form-control-sm mt-1"
                                                                            style="width: 200px;"
                                                                            id="rupiah_harga_satuan_level_5_unit_price">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="javascript:;" style="display: none;"
                                                            id="button_update_nilai_level_5_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_5_unit_price('update_nilai_level_5_unit_price')">Simpan</a>
                                                        <a href="javascript:;" id="button_tambah_level_5_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_5_unit_price('tambah_level_5_unit_price')">Update</a>
                                                        <a href="javascript:;" id="button_edit_level_5_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_5_unit_price('edit_level_5_unit_price')">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- UNIT PRICE 5 -->
                                        <!-- price_5 -->
                                        <!-- level_6 -->
                                        <?php
                                                            $this->db->select('*');
                                                            $this->db->from('tbl_unit_price_5');
                                                            $this->db->where('tbl_unit_price_5.id_unit_price_4', $id_unit_price_4);
                                                            $this->db->order_by('display_order', 'ASC');
                                                            $query_tbl_unit_price_5 = $this->db->get() ?>
                                        <?php $total_unit_price_5 = 0;
                                                            foreach ($query_tbl_unit_price_5->result_array() as $key => $valur_total_unit_price_5) {
                                                                $total_unit_price_5 +=  $valur_total_unit_price_5['total_harga'];
                                                            }; ?>
                                        <?php
                                                            foreach ($query_tbl_unit_price_5->result_array() as $value_tb_unit_price_5) { ?>
                                        <?php $id_unit_price_5 = $value_tb_unit_price_5['id_unit_price_5'];  ?>
                                        <?php
                                                                $this->db->select('*');
                                                                $this->db->from('tbl_unit_price_6');
                                                                $this->db->where('tbl_unit_price_6.id_unit_price_5', $id_unit_price_5);
                                                                $kondisi_tbl_unit_price_5 = $this->db->get()->result_array() ?>
                                        <tr>
                                            <td class="tg-0lax">Level 6</td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_5['no_urut']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_5['nama_uraian']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_5['satuan']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_5['kuantitas']; ?></td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_5['harga_satuan'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_5['total_harga'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?php if ($value_tb_unit_price_5['harga_satuan'] == null || $value_tb_unit_price_5['harga_satuan'] == 0) { ?>
                                                <?php if ($kondisi_tbl_unit_price_5) { ?>

                                                <a onclick="modal_level_6_unit_price(<?= $value_tb_unit_price_5['id_unit_price_5'] ?>,'tambah_level_6_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_6_unit_price(<?= $value_tb_unit_price_5['id_unit_price_5'] ?>,'edit_level_6_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_6_unit_price(<?= $value_tb_unit_price_5['id_unit_price_5'] ?>,'urutan_level_6_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_6_unit_price(<?= $value_tb_unit_price_5['id_unit_price_5'] ?>,'update_nilai_level_6_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>
                                                <a onclick="modal_level_6_unit_price(<?= $value_tb_unit_price_5['id_unit_price_5'] ?>,'tambah_level_6_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_6_unit_price(<?= $value_tb_unit_price_5['id_unit_price_5'] ?>,'hapus_level_6_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_6_unit_price(<?= $value_tb_unit_price_5['id_unit_price_5'] ?>,'edit_level_6_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_6_unit_price(<?= $value_tb_unit_price_5['id_unit_price_5'] ?>,'urutan_level_6_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php } else { ?>
                                                <?php if ($kondisi_tbl_unit_price_5) { ?>

                                                <a onclick="modal_level_6_unit_price(<?= $value_tb_unit_price_5['id_unit_price_5'] ?>,'tambah_level_6_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_6_unit_price(<?= $value_tb_unit_price_5['id_unit_price_5'] ?>,'edit_level_6_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_6_unit_price(<?= $value_tb_unit_price_5['id_unit_price_5'] ?>,'urutan_level_6_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_6_unit_price(<?= $value_tb_unit_price_5['id_unit_price_5'] ?>,'update_nilai_level_6_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>

                                                <a onclick="modal_level_6_unit_price(<?= $value_tb_unit_price_5['id_unit_price_5'] ?>,'hapus_level_6_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_6_unit_price(<?= $value_tb_unit_price_5['id_unit_price_5'] ?>,'edit_level_6_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_6_unit_price(<?= $value_tb_unit_price_5['id_unit_price_5'] ?>,'urutan_level_6_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php    } ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="form_modal_level_6_unit_price" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_modal_level_6_unit_price">
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="javascript:;" method="post"
                                                            id="form_simpan_level_6_unit_price">

                                                            <input type="hidden" name="id_unit_price">
                                                            <input type="hidden" name="id_kontrak"
                                                                value="<?= $row_kontrak['id_kontrak'] ?>">
                                                            <input type="text" name="grand_total_post">
                                                            <div class="form-group" style="display: none;"
                                                                id="form_tambah_level_6_unit_price">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Nama Uraian</label>
                                                                            <input type="text" name="nama_uraian"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group" style="display: none;"
                                                                id="form_input_nilai_level_6_unit_price">
                                                                <label for="">Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa fa-edit"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="satuan" id="satuan"
                                                                                placeholder="Satuan">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Kuantitas</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="kuantitas" id="kuantitas"
                                                                                placeholder="kuantitas">
                                                                        </div>
                                                                        <small id="helpId" class="text-muted">Harap
                                                                            Menggunakan titik jika koma ex :
                                                                            60.00</small>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Harga Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text"
                                                                                class="form-control harga_satuan"
                                                                                name="harga_satuan"
                                                                                aria-describedby="helpId"
                                                                                placeholder="Jumlah Nilai">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="text" disabled
                                                                            class="float-right form-control form-control-sm mt-1"
                                                                            style="width: 200px;"
                                                                            id="rupiah_harga_satuan_level_6_unit_price">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="javascript:;" style="display: none;"
                                                            id="button_update_nilai_level_6_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_6_unit_price('update_nilai_level_6_unit_price')">Simpan</a>
                                                        <a href="javascript:;" id="button_tambah_level_6_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_6_unit_price('tambah_level_6_unit_price')">Update</a>
                                                        <a href="javascript:;" id="button_edit_level_6_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_6_unit_price('edit_level_6_unit_price')">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- UNIT PRICE 6 -->
                                        <!-- price_6 -->
                                        <!-- level_7 -->
                                        <?php
                                                                $this->db->select('*');
                                                                $this->db->from('tbl_unit_price_6');
                                                                $this->db->where('tbl_unit_price_6.id_unit_price_5', $id_unit_price_5);
                                                                $this->db->order_by('display_order', 'ASC');
                                                                $query_tbl_unit_price_6 = $this->db->get() ?>
                                        <?php $total_unit_price_6 = 0;
                                                                foreach ($query_tbl_unit_price_6->result_array() as $key => $valur_total_unit_price_6) {
                                                                    $total_unit_price_6 +=  $valur_total_unit_price_6['total_harga'];
                                                                }; ?>
                                        <?php
                                                                foreach ($query_tbl_unit_price_6->result_array() as $value_tb_unit_price_6) { ?>
                                        <?php $id_unit_price_6 = $value_tb_unit_price_6['id_unit_price_6'];  ?>
                                        <?php
                                                                    $this->db->select('*');
                                                                    $this->db->from('tbl_unit_price_7');
                                                                    $this->db->where('tbl_unit_price_7.id_unit_price_6', $id_unit_price_6);
                                                                    $kondisi_tbl_unit_price_6 = $this->db->get()->result_array() ?>
                                        <tr>
                                            <td class="tg-0lax">Level 7</td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_6['no_urut']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_6['nama_uraian']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_6['satuan']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_6['kuantitas']; ?></td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_6['harga_satuan'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_6['total_harga'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?php if ($value_tb_unit_price_6['harga_satuan'] == null || $value_tb_unit_price_6['harga_satuan'] == 0) { ?>
                                                <?php if ($kondisi_tbl_unit_price_6) { ?>

                                                <a onclick="modal_level_7_unit_price(<?= $value_tb_unit_price_6['id_unit_price_6'] ?>,'tambah_level_7_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_7_unit_price(<?= $value_tb_unit_price_6['id_unit_price_6'] ?>,'edit_level_7_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_7_unit_price(<?= $value_tb_unit_price_6['id_unit_price_6'] ?>,'urutan_level_7_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_7_unit_price(<?= $value_tb_unit_price_6['id_unit_price_6'] ?>,'update_nilai_level_7_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>
                                                <a onclick="modal_level_7_unit_price(<?= $value_tb_unit_price_6['id_unit_price_6'] ?>,'tambah_level_7_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_7_unit_price(<?= $value_tb_unit_price_6['id_unit_price_6'] ?>,'hapus_level_7_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_7_unit_price(<?= $value_tb_unit_price_6['id_unit_price_6'] ?>,'edit_level_7_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_7_unit_price(<?= $value_tb_unit_price_6['id_unit_price_6'] ?>,'urutan_level_7_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php } else { ?>
                                                <?php if ($kondisi_tbl_unit_price_6) { ?>

                                                <a onclick="modal_level_7_unit_price(<?= $value_tb_unit_price_6['id_unit_price_6'] ?>,'tambah_level_7_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_7_unit_price(<?= $value_tb_unit_price_6['id_unit_price_6'] ?>,'edit_level_7_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_7_unit_price(<?= $value_tb_unit_price_6['id_unit_price_6'] ?>,'urutan_level_7_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_7_unit_price(<?= $value_tb_unit_price_6['id_unit_price_6'] ?>,'update_nilai_level_7_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>

                                                <a onclick="modal_level_7_unit_price(<?= $value_tb_unit_price_6['id_unit_price_6'] ?>,'hapus_level_7_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_7_unit_price(<?= $value_tb_unit_price_6['id_unit_price_6'] ?>,'edit_level_7_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_7_unit_price(<?= $value_tb_unit_price_6['id_unit_price_6'] ?>,'urutan_level_7_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php    } ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="form_modal_level_7_unit_price" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_modal_level_7_unit_price">
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="javascript:;" method="post"
                                                            id="form_simpan_level_7_unit_price">

                                                            <input type="hidden" name="id_unit_price">
                                                            <input type="hidden" name="id_kontrak"
                                                                value="<?= $row_kontrak['id_kontrak'] ?>">
                                                            <input type="text" name="grand_total_post">
                                                            <div class="form-group" style="display: none;"
                                                                id="form_tambah_level_7_unit_price">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Nama Uraian</label>
                                                                            <input type="text" name="nama_uraian"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group" style="display: none;"
                                                                id="form_input_nilai_level_7_unit_price">
                                                                <label for="">Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa fa-edit"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="satuan" id="satuan"
                                                                                placeholder="Satuan">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Kuantitas</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="kuantitas" id="kuantitas"
                                                                                placeholder="kuantitas">
                                                                        </div>
                                                                        <small id="helpId" class="text-muted">Harap
                                                                            Menggunakan titik jika koma ex :
                                                                            60.00</small>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Harga Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text"
                                                                                class="form-control harga_satuan"
                                                                                name="harga_satuan"
                                                                                aria-describedby="helpId"
                                                                                placeholder="Jumlah Nilai">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="text" disabled
                                                                            class="float-right form-control form-control-sm mt-1"
                                                                            style="width: 200px;"
                                                                            id="rupiah_harga_satuan_level_7_unit_price">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="javascript:;" style="display: none;"
                                                            id="button_update_nilai_level_7_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_7_unit_price('update_nilai_level_7_unit_price')">Simpan</a>
                                                        <a href="javascript:;" id="button_tambah_level_7_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_7_unit_price('tambah_level_7_unit_price')">Update</a>
                                                        <a href="javascript:;" id="button_edit_level_7_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_7_unit_price('edit_level_7_unit_price')">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- UNIT PRICE 7 -->
                                        <!-- price_7 -->
                                        <!-- level_8 -->
                                        <?php
                                                                    $this->db->select('*');
                                                                    $this->db->from('tbl_unit_price_7');
                                                                    $this->db->where('tbl_unit_price_7.id_unit_price_6', $id_unit_price_6);
                                                                    $this->db->order_by('display_order', 'ASC');
                                                                    $query_tbl_unit_price_7 = $this->db->get() ?>
                                        <?php $total_unit_price_7 = 0;
                                                                    foreach ($query_tbl_unit_price_7->result_array() as $key => $valur_total_unit_price_7) {
                                                                        $total_unit_price_7 +=  $valur_total_unit_price_7['total_harga'];
                                                                    }; ?>
                                        <?php
                                                                    foreach ($query_tbl_unit_price_7->result_array() as $value_tb_unit_price_7) { ?>
                                        <?php $id_unit_price_7 = $value_tb_unit_price_7['id_unit_price_7'];  ?>
                                        <?php
                                                                        $this->db->select('*');
                                                                        $this->db->from('tbl_unit_price_8');
                                                                        $this->db->where('tbl_unit_price_8.id_unit_price_7', $id_unit_price_7);
                                                                        $kondisi_tbl_unit_price_7 = $this->db->get()->result_array() ?>
                                        <tr>
                                            <td class="tg-0lax">Level 8</td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_7['no_urut']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_7['nama_uraian']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_7['satuan']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_7['kuantitas']; ?></td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_7['harga_satuan'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_7['total_harga'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?php if ($value_tb_unit_price_7['harga_satuan'] == null || $value_tb_unit_price_7['harga_satuan'] == 0) { ?>
                                                <?php if ($kondisi_tbl_unit_price_7) { ?>

                                                <a onclick="modal_level_8_unit_price(<?= $value_tb_unit_price_7['id_unit_price_7'] ?>,'tambah_level_8_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_8_unit_price(<?= $value_tb_unit_price_7['id_unit_price_7'] ?>,'edit_level_8_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_8_unit_price(<?= $value_tb_unit_price_7['id_unit_price_7'] ?>,'urutan_level_8_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_8_unit_price(<?= $value_tb_unit_price_7['id_unit_price_7'] ?>,'update_nilai_level_8_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>
                                                <a onclick="modal_level_8_unit_price(<?= $value_tb_unit_price_7['id_unit_price_7'] ?>,'tambah_level_8_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_8_unit_price(<?= $value_tb_unit_price_7['id_unit_price_7'] ?>,'hapus_level_8_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_8_unit_price(<?= $value_tb_unit_price_7['id_unit_price_7'] ?>,'edit_level_8_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_8_unit_price(<?= $value_tb_unit_price_7['id_unit_price_7'] ?>,'urutan_level_8_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php } else { ?>
                                                <?php if ($kondisi_tbl_unit_price_7) { ?>

                                                <a onclick="modal_level_8_unit_price(<?= $value_tb_unit_price_7['id_unit_price_7'] ?>,'tambah_level_8_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_8_unit_price(<?= $value_tb_unit_price_7['id_unit_price_7'] ?>,'edit_level_8_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_8_unit_price(<?= $value_tb_unit_price_7['id_unit_price_7'] ?>,'urutan_level_8_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_8_unit_price(<?= $value_tb_unit_price_7['id_unit_price_7'] ?>,'update_nilai_level_8_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>

                                                <a onclick="modal_level_8_unit_price(<?= $value_tb_unit_price_7['id_unit_price_7'] ?>,'hapus_level_8_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_8_unit_price(<?= $value_tb_unit_price_7['id_unit_price_7'] ?>,'edit_level_8_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_8_unit_price(<?= $value_tb_unit_price_7['id_unit_price_7'] ?>,'urutan_level_8_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php    } ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="form_modal_level_8_unit_price" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_modal_level_8_unit_price">
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="javascript:;" method="post"
                                                            id="form_simpan_level_8_unit_price">

                                                            <input type="hidden" name="id_unit_price">
                                                            <input type="hidden" name="id_kontrak"
                                                                value="<?= $row_kontrak['id_kontrak'] ?>">
                                                            <input type="text" name="grand_total_post">
                                                            <div class="form-group" style="display: none;"
                                                                id="form_tambah_level_8_unit_price">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Nama Uraian</label>
                                                                            <input type="text" name="nama_uraian"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group" style="display: none;"
                                                                id="form_input_nilai_level_8_unit_price">
                                                                <label for="">Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa fa-edit"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="satuan" id="satuan"
                                                                                placeholder="Satuan">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Kuantitas</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="kuantitas" id="kuantitas"
                                                                                placeholder="kuantitas">
                                                                        </div>
                                                                        <small id="helpId" class="text-muted">Harap
                                                                            Menggunakan titik jika koma ex :
                                                                            60.00</small>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Harga Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text"
                                                                                class="form-control harga_satuan"
                                                                                name="harga_satuan"
                                                                                aria-describedby="helpId"
                                                                                placeholder="Jumlah Nilai">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="text" disabled
                                                                            class="float-right form-control form-control-sm mt-1"
                                                                            style="width: 200px;"
                                                                            id="rupiah_harga_satuan_level_8_unit_price">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="javascript:;" style="display: none;"
                                                            id="button_update_nilai_level_8_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_8_unit_price('update_nilai_level_8_unit_price')">Simpan</a>
                                                        <a href="javascript:;" id="button_tambah_level_8_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_8_unit_price('tambah_level_8_unit_price')">Update</a>
                                                        <a href="javascript:;" id="button_edit_level_8_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_8_unit_price('edit_level_8_unit_price')">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- UNIT PRICE 8 -->
                                        <!-- price_8 -->
                                        <!-- level_9 -->
                                        <?php
                                                                        $this->db->select('*');
                                                                        $this->db->from('tbl_unit_price_8');
                                                                        $this->db->where('tbl_unit_price_8.id_unit_price_7', $id_unit_price_7);
                                                                        $this->db->order_by('display_order', 'ASC');
                                                                        $query_tbl_unit_price_8 = $this->db->get() ?>
                                        <?php $total_unit_price_8 = 0;
                                                                        foreach ($query_tbl_unit_price_8->result_array() as $key => $valur_total_unit_price_8) {
                                                                            $total_unit_price_8 +=  $valur_total_unit_price_8['total_harga'];
                                                                        }; ?>
                                        <?php
                                                                        foreach ($query_tbl_unit_price_8->result_array() as $value_tb_unit_price_8) { ?>
                                        <?php $id_unit_price_8 = $value_tb_unit_price_8['id_unit_price_8'];  ?>
                                        <?php
                                                                            $this->db->select('*');
                                                                            $this->db->from('tbl_unit_price_9');
                                                                            $this->db->where('tbl_unit_price_9.id_unit_price_8', $id_unit_price_8);
                                                                            $kondisi_tbl_unit_price_8 = $this->db->get()->result_array() ?>
                                        <tr>
                                            <td class="tg-0lax">Level 9</td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_8['no_urut']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_8['nama_uraian']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_8['satuan']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_8['kuantitas']; ?></td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_8['harga_satuan'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_8['total_harga'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?php if ($value_tb_unit_price_8['harga_satuan'] == null || $value_tb_unit_price_8['harga_satuan'] == 0) { ?>
                                                <?php if ($kondisi_tbl_unit_price_8) { ?>

                                                <a onclick="modal_level_9_unit_price(<?= $value_tb_unit_price_8['id_unit_price_8'] ?>,'tambah_level_9_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_9_unit_price(<?= $value_tb_unit_price_8['id_unit_price_8'] ?>,'edit_level_9_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_9_unit_price(<?= $value_tb_unit_price_8['id_unit_price_8'] ?>,'urutan_level_9_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_9_unit_price(<?= $value_tb_unit_price_8['id_unit_price_8'] ?>,'update_nilai_level_9_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>
                                                <a onclick="modal_level_9_unit_price(<?= $value_tb_unit_price_8['id_unit_price_8'] ?>,'tambah_level_9_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_9_unit_price(<?= $value_tb_unit_price_8['id_unit_price_8'] ?>,'hapus_level_9_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_9_unit_price(<?= $value_tb_unit_price_8['id_unit_price_8'] ?>,'edit_level_9_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_9_unit_price(<?= $value_tb_unit_price_8['id_unit_price_8'] ?>,'urutan_level_9_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php } else { ?>
                                                <?php if ($kondisi_tbl_unit_price_8) { ?>

                                                <a onclick="modal_level_9_unit_price(<?= $value_tb_unit_price_8['id_unit_price_8'] ?>,'tambah_level_9_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_9_unit_price(<?= $value_tb_unit_price_8['id_unit_price_8'] ?>,'edit_level_9_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_9_unit_price(<?= $value_tb_unit_price_8['id_unit_price_8'] ?>,'urutan_level_9_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_9_unit_price(<?= $value_tb_unit_price_8['id_unit_price_8'] ?>,'update_nilai_level_9_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>

                                                <a onclick="modal_level_9_unit_price(<?= $value_tb_unit_price_8['id_unit_price_8'] ?>,'hapus_level_9_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_9_unit_price(<?= $value_tb_unit_price_8['id_unit_price_8'] ?>,'edit_level_9_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_9_unit_price(<?= $value_tb_unit_price_8['id_unit_price_8'] ?>,'urutan_level_9_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php    } ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="form_modal_level_9_unit_price" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_modal_level_9_unit_price">
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="javascript:;" method="post"
                                                            id="form_simpan_level_9_unit_price">

                                                            <input type="hidden" name="id_unit_price">
                                                            <input type="hidden" name="id_kontrak"
                                                                value="<?= $row_kontrak['id_kontrak'] ?>">
                                                            <input type="text" name="grand_total_post">
                                                            <div class="form-group" style="display: none;"
                                                                id="form_tambah_level_9_unit_price">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Nama Uraian</label>
                                                                            <input type="text" name="nama_uraian"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group" style="display: none;"
                                                                id="form_input_nilai_level_9_unit_price">
                                                                <label for="">Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa fa-edit"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="satuan" id="satuan"
                                                                                placeholder="Satuan">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Kuantitas</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="kuantitas" id="kuantitas"
                                                                                placeholder="kuantitas">
                                                                        </div>
                                                                        <small id="helpId" class="text-muted">Harap
                                                                            Menggunakan titik jika koma ex :
                                                                            60.00</small>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Harga Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text"
                                                                                class="form-control harga_satuan"
                                                                                name="harga_satuan"
                                                                                aria-describedby="helpId"
                                                                                placeholder="Jumlah Nilai">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="text" disabled
                                                                            class="float-right form-control form-control-sm mt-1"
                                                                            style="width: 200px;"
                                                                            id="rupiah_harga_satuan_level_9_unit_price">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="javascript:;" style="display: none;"
                                                            id="button_update_nilai_level_9_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_9_unit_price('update_nilai_level_9_unit_price')">Simpan</a>
                                                        <a href="javascript:;" id="button_tambah_level_9_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_9_unit_price('tambah_level_9_unit_price')">Update</a>
                                                        <a href="javascript:;" id="button_edit_level_9_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_9_unit_price('edit_level_9_unit_price')">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- UNIT PRICE 9 -->
                                        <!-- price_9 -->
                                        <!-- level_10 -->
                                        <?php
                                                                            $this->db->select('*');
                                                                            $this->db->from('tbl_unit_price_9');
                                                                            $this->db->where('tbl_unit_price_9.id_unit_price_8', $id_unit_price_8);
                                                                            $this->db->order_by('display_order', 'ASC');
                                                                            $query_tbl_unit_price_9 = $this->db->get() ?>
                                        <?php $total_unit_price_9 = 0;
                                                                            foreach ($query_tbl_unit_price_9->result_array() as $key => $valur_total_unit_price_9) {
                                                                                if ($valur_total_unit_price_9['total_harga']) {
                                                                                    $total_unit_price_9 +=  $valur_total_unit_price_9['total_harga'];
                                                                                } else {
                                                                                    $total_unit_price_9 +=  0;
                                                                                }
                                                                            }; ?>
                                        <?php
                                                                            foreach ($query_tbl_unit_price_9->result_array() as $value_tb_unit_price_9) { ?>
                                        <?php $id_unit_price_9 = $value_tb_unit_price_9['id_unit_price_9'];  ?>
                                        <?php
                                                                                $this->db->select('*');
                                                                                $this->db->from('tbl_unit_price_10');
                                                                                $this->db->where('tbl_unit_price_10.id_unit_price_9', $id_unit_price_9);
                                                                                $kondisi_tbl_unit_price_9 = $this->db->get()->result_array() ?>
                                        <tr>
                                            <td class="tg-0lax">Level 10</td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_9['no_urut']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_9['nama_uraian']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_9['satuan']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_9['kuantitas']; ?></td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_9['harga_satuan'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_9['total_harga'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?php if ($value_tb_unit_price_9['harga_satuan'] == null || $value_tb_unit_price_9['harga_satuan'] == 0) { ?>
                                                <?php if ($kondisi_tbl_unit_price_9) { ?>

                                                <a onclick="modal_level_10_unit_price(<?= $value_tb_unit_price_9['id_unit_price_9'] ?>,'tambah_level_10_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_10_unit_price(<?= $value_tb_unit_price_9['id_unit_price_9'] ?>,'edit_level_10_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_10_unit_price(<?= $value_tb_unit_price_9['id_unit_price_9'] ?>,'urutan_level_10_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_10_unit_price(<?= $value_tb_unit_price_9['id_unit_price_9'] ?>,'update_nilai_level_10_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>
                                                <a onclick="modal_level_10_unit_price(<?= $value_tb_unit_price_9['id_unit_price_9'] ?>,'tambah_level_10_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_10_unit_price(<?= $value_tb_unit_price_9['id_unit_price_9'] ?>,'hapus_level_10_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_10_unit_price(<?= $value_tb_unit_price_9['id_unit_price_9'] ?>,'edit_level_10_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_10_unit_price(<?= $value_tb_unit_price_9['id_unit_price_9'] ?>,'urutan_level_10_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php } else { ?>
                                                <?php if ($kondisi_tbl_unit_price_9) { ?>

                                                <a onclick="modal_level_10_unit_price(<?= $value_tb_unit_price_9['id_unit_price_9'] ?>,'tambah_level_10_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_10_unit_price(<?= $value_tb_unit_price_9['id_unit_price_9'] ?>,'edit_level_10_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_10_unit_price(<?= $value_tb_unit_price_9['id_unit_price_9'] ?>,'urutan_level_10_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_10_unit_price(<?= $value_tb_unit_price_9['id_unit_price_9'] ?>,'update_nilai_level_10_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>

                                                <a onclick="modal_level_10_unit_price(<?= $value_tb_unit_price_9['id_unit_price_9'] ?>,'hapus_level_10_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_10_unit_price(<?= $value_tb_unit_price_9['id_unit_price_9'] ?>,'edit_level_10_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_10_unit_price(<?= $value_tb_unit_price_9['id_unit_price_9'] ?>,'urutan_level_10_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php    } ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="form_modal_level_10_unit_price" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_modal_level_10_unit_price">
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="javascript:;" method="post"
                                                            id="form_simpan_level_10_unit_price">

                                                            <input type="hidden" name="id_unit_price">
                                                            <input type="hidden" name="id_kontrak"
                                                                value="<?= $row_kontrak['id_kontrak'] ?>">
                                                            <input type="text" name="grand_total_post">
                                                            <div class="form-group" style="display: none;"
                                                                id="form_tambah_level_10_unit_price">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Nama Uraian</label>
                                                                            <input type="text" name="nama_uraian"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group" style="display: none;"
                                                                id="form_input_nilai_level_10_unit_price">
                                                                <label for="">Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa fa-edit"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="satuan" id="satuan"
                                                                                placeholder="Satuan">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Kuantitas</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="kuantitas" id="kuantitas"
                                                                                placeholder="kuantitas">
                                                                        </div>
                                                                        <small id="helpId" class="text-muted">Harap
                                                                            Menggunakan titik jika koma ex :
                                                                            60.00</small>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Harga Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text"
                                                                                class="form-control harga_satuan"
                                                                                name="harga_satuan"
                                                                                aria-describedby="helpId"
                                                                                placeholder="Jumlah Nilai">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="text" disabled
                                                                            class="float-right form-control form-control-sm mt-1"
                                                                            style="width: 200px;"
                                                                            id="rupiah_harga_satuan_level_10_unit_price">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="javascript:;" style="display: none;"
                                                            id="button_update_nilai_level_10_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_10_unit_price('update_nilai_level_10_unit_price')">Simpan</a>
                                                        <a href="javascript:;" id="button_tambah_level_10_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_10_unit_price('tambah_level_10_unit_price')">Update</a>
                                                        <a href="javascript:;" id="button_edit_level_10_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_10_unit_price('edit_level_10_unit_price')">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- UNIT PRICE 10 -->
                                        <!-- price_10 -->
                                        <!-- level_11 -->
                                        <?php
                                                                                $this->db->select('*');
                                                                                $this->db->from('tbl_unit_price_10');
                                                                                $this->db->where('tbl_unit_price_10.id_unit_price_9', $id_unit_price_9);
                                                                                $this->db->order_by('display_order', 'ASC');
                                                                                $query_tbl_unit_price_10 = $this->db->get() ?>
                                        <?php $total_unit_price_10 = 0;
                                                                                foreach ($query_tbl_unit_price_10->result_array() as $key => $valur_total_unit_price_10) {
                                                                                    $total_unit_price_10 +=  $valur_total_unit_price_10['total_harga'];
                                                                                }; ?>
                                        <?php
                                                                                foreach ($query_tbl_unit_price_10->result_array() as $value_tb_unit_price_10) { ?>
                                        <?php $id_unit_price_10 = $value_tb_unit_price_10['id_unit_price_10'];  ?>
                                        <?php
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tbl_unit_price_11');
                                                                                    $this->db->where('tbl_unit_price_11.id_unit_price_10', $id_unit_price_10);
                                                                                    $kondisi_tbl_unit_price_10 = $this->db->get()->result_array() ?>
                                        <tr>
                                            <td class="tg-0lax">Level 11</td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_10['no_urut']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_10['nama_uraian']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_10['satuan']; ?></td>
                                            <td class="tg-0lax"><?= $value_tb_unit_price_10['kuantitas']; ?></td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_10['harga_satuan'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?= "Rp " . number_format($value_tb_unit_price_10['total_harga'], 2, ',', '.') ?>
                                            </td>
                                            <td class="tg-0lax">
                                                <?php if ($value_tb_unit_price_10['harga_satuan'] == null || $value_tb_unit_price_10['harga_satuan'] == 0) { ?>
                                                <?php if ($kondisi_tbl_unit_price_10) { ?>

                                                <a onclick="modal_level_11_unit_price(<?= $value_tb_unit_price_10['id_unit_price_10'] ?>,'tambah_level_11_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_11_unit_price(<?= $value_tb_unit_price_10['id_unit_price_10'] ?>,'edit_level_11_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_11_unit_price(<?= $value_tb_unit_price_10['id_unit_price_10'] ?>,'urutan_level_11_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_11_unit_price(<?= $value_tb_unit_price_10['id_unit_price_10'] ?>,'update_nilai_level_11_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>
                                                <a onclick="modal_level_11_unit_price(<?= $value_tb_unit_price_10['id_unit_price_10'] ?>,'tambah_level_11_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_11_unit_price(<?= $value_tb_unit_price_10['id_unit_price_10'] ?>,'hapus_level_11_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_11_unit_price(<?= $value_tb_unit_price_10['id_unit_price_10'] ?>,'edit_level_11_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_11_unit_price(<?= $value_tb_unit_price_10['id_unit_price_10'] ?>,'urutan_level_11_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php } else { ?>
                                                <?php if ($kondisi_tbl_unit_price_10) { ?>

                                                <a onclick="modal_level_11_unit_price(<?= $value_tb_unit_price_10['id_unit_price_10'] ?>,'tambah_level_11_unit_price')"
                                                    class="btn btn-sm btn-primary" href="javascript:;"><i
                                                        class="fas fa-plus"></i></a>
                                                <a onclick="modal_level_11_unit_price(<?= $value_tb_unit_price_10['id_unit_price_10'] ?>,'edit_level_11_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_11_unit_price(<?= $value_tb_unit_price_10['id_unit_price_10'] ?>,'urutan_level_11_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php    } else { ?>
                                                <a onclick="modal_level_11_unit_price(<?= $value_tb_unit_price_10['id_unit_price_10'] ?>,'update_nilai_level_11_unit_price')"
                                                    class="btn btn-sm btn-warning" href="javascript:;"><i
                                                        class="fas fa-dollar-sign"></i></a>

                                                <a onclick="modal_level_11_unit_price(<?= $value_tb_unit_price_10['id_unit_price_10'] ?>,'hapus_level_11_unit_price')"
                                                    class="btn btn-sm btn-danger" href="javascript:;"><i
                                                        class="fas fa-trash"></i></a>
                                                <a onclick="modal_level_11_unit_price(<?= $value_tb_unit_price_10['id_unit_price_10'] ?>,'edit_level_11_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa-edit"></i></a>
                                                <!-- UBAH urutan -->
                                                <a onclick="modal_level_11_unit_price(<?= $value_tb_unit_price_10['id_unit_price_10'] ?>,'urutan_level_11_unit_price')"
                                                    class="btn btn-sm btn-info" href="javascript:;"><i
                                                        class="fas fa fa-list-ol"></i></a>
                                                <?php   }  ?>
                                                <?php    } ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="form_modal_level_11_unit_price" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="title_modal_level_11_unit_price">
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="javascript:;" method="post"
                                                            id="
                                                                                                    form_simpan_level_11_unit_price">
                                                            <input type="hidden" name="id_unit_price">
                                                            <input type="hidden" name="id_kontrak"
                                                                value="<?= $row_kontrak['id_kontrak'] ?>">
                                                            <input type="text" name="grand_total_post">
                                                            <div class="form-group" style="display: none;"
                                                                id="form_tambah_level_11_unit_price">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Nama Uraian</label>
                                                                            <input type="text" name="nama_uraian"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group" style="display: none;"
                                                                id="form_input_nilai_level_11_unit_price">
                                                                <label for="">Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa fa-edit"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="satuan" id="satuan"
                                                                                placeholder="Satuan">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Kuantitas</label>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text" class="form-control"
                                                                                name="kuantitas" id="kuantitas"
                                                                                placeholder="kuantitas">
                                                                        </div>
                                                                        <small id="helpId" class="text-muted">Harap
                                                                            Menggunakan titik jika koma ex :
                                                                            60.00</small>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <label for="">Harga Satuan</label>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-money-bill-alt"
                                                                                    aria-hidden="true"></i>
                                                                            </span>
                                                                            <input type="text"
                                                                                class="form-control harga_satuan"
                                                                                name="harga_satuan"
                                                                                aria-describedby="helpId"
                                                                                placeholder="Jumlah Nilai">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="text" disabled
                                                                            class="float-right form-control form-control-sm mt-1"
                                                                            style="width: 200px;"
                                                                            id="rupiah_harga_satuan_level_11_unit_price">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a href="javascript:;" style="display: none;"
                                                            id="button_update_nilai_level_11_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_11_unit_price('update_nilai_level_11_unit_price')">Simpan</a>
                                                        <a href="javascript:;" id="button_tambah_level_11_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_11_unit_price('tambah_level_11_unit_price')">Update</a>
                                                        <a href="javascript:;" id="button_edit_level_11_unit_price"
                                                            class="btn btn-success button_simpan"
                                                            onclick="Simpan_level_11_unit_price('edit_level_11_unit_price')">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>

                                        <?php if ($total_unit_price) { ?>
                                        <?php $data_unit_price = $total_unit_price ?>
                                        <?php  } else { ?>
                                        <?php $data_unit_price = 0 ?>
                                        <?php  } ?>

                                        <?php if ($total_unit_price_1) { ?>
                                        <?php $data_unit_price_1 = $total_unit_price_1 ?>
                                        <?php  } else { ?>
                                        <?php $data_unit_price_1 = 0 ?>
                                        <?php  } ?>

                                        <?php if ($total_unit_price_2) { ?>
                                        <?php $data_unit_price_2 = $total_unit_price_2 ?>
                                        <?php  } else { ?>
                                        <?php $data_unit_price_2 = 0 ?>
                                        <?php  } ?>

                                        <?php if ($total_unit_price_3) { ?>
                                        <?php $data_unit_price_3 = $total_unit_price_3 ?>
                                        <?php  } else { ?>
                                        <?php $data_unit_price_3 = 0 ?>
                                        <?php  } ?>

                                        <?php if ($total_unit_price_4) { ?>
                                        <?php $data_unit_price_4 = $total_unit_price_4 ?>
                                        <?php  } else { ?>
                                        <?php $data_unit_price_4 = 0 ?>
                                        <?php  } ?>

                                        <?php if ($total_unit_price_5) { ?>
                                        <?php $data_unit_price_5 = $total_unit_price_5 ?>
                                        <?php  } else { ?>
                                        <?php $data_unit_price_5 = 0 ?>
                                        <?php  } ?>

                                        <?php if ($total_unit_price_6) { ?>
                                        <?php $data_unit_price_6 = $total_unit_price_6 ?>
                                        <?php  } else { ?>
                                        <?php $data_unit_price_6 = 0 ?>
                                        <?php  } ?>

                                        <?php if ($total_unit_price_7) { ?>
                                        <?php $data_unit_price_7 = $total_unit_price_7 ?>
                                        <?php  } else { ?>
                                        <?php $data_unit_price_7 = 0 ?>
                                        <?php  } ?>

                                        <?php if ($total_unit_price_8) { ?>
                                        <?php $data_unit_price_8 = $total_unit_price_8 ?>
                                        <?php  } else { ?>
                                        <?php $data_unit_price_8 = 0 ?>
                                        <?php  } ?>

                                        <?php if ($total_unit_price_9) { ?>
                                        <?php $data_unit_price_9 = $total_unit_price_9; ?>
                                        <?php  } else { ?>
                                        <?php $data_unit_price_9 = 0 ?>
                                        <?php  } ?>


                                        <?php if ($total_unit_price_10) { ?>
                                        <?php $data_unit_price_10 = $total_unit_price_10 ?>
                                        <?php  } else { ?>
                                        <?php $data_unit_price_10 = 0 ?>
                                        <?php  } ?>

                                        <tr>
                                            <td></td>
                                            <td> </td>
                                            <td>SUB TOTAL
                                                <?php
                                                $this->db->select('*');
                                                $this->db->from('tbl_unit_price');
                                                $this->db->where('tbl_unit_price.id_kontrak', $row_kontrak['id_kontrak']);
                                                $this->db->order_by('display_order', 'ASC');
                                                $query_tbl_unit_price = $this->db->get() ?>
                                                <?php foreach ($query_tbl_unit_price->result_array() as $key => $dataku) { ?>
                                                <label for="">Level 1</label>
                                                <?php    }; ?>
                                            </td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td>
                                                <?php $sub_total = $data_unit_price  ?>
                                                <?= "Rp " . number_format($sub_total, 2, ',', '.') ?>

                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td> </td>
                                            <td>PPN 10%</td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td>

                                                <?php $ppn_sub_total = $data_unit_price;
                                                $ppn10 = 10;
                                                $total_setalah_ppn10 = ($ppn_sub_total * 10) / 100;
                                                $grand_setalah_ppn = $ppn_sub_total + $total_setalah_ppn10;
                                                ?>
                                                <?= "Rp " . number_format($total_setalah_ppn10, 2, ',', '.') ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td> </td>
                                            <td>PPN 11%</td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td>

                                                <?php $ppn_sub_total11 = $data_unit_price;
                                                $ppn11 = 11;
                                                $total_setalah_ppn11 = ($ppn_sub_total11 * 11) / 100;
                                                $grand_setalah_ppn11 = $ppn_sub_total11 + $total_setalah_ppn11;
                                                ?>
                                                <?= "Rp " . number_format($total_setalah_ppn11, 2, ',', '.') ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td> </td>
                                            <td> TOTAL
                                                <?php
                                                $this->db->select('*');
                                                $this->db->from('tbl_unit_price');
                                                $this->db->where('tbl_unit_price.id_kontrak', $row_kontrak['id_kontrak']);
                                                $this->db->order_by('display_order', 'ASC');
                                                $query_tbl_unit_price = $this->db->get() ?>
                                                <?php foreach ($query_tbl_unit_price->result_array() as $key => $dataku) { ?>
                                                <label for="">Level 1</label>
                                                <?php    }; ?>
                                            </td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php $ppn_sub_total11 = $data_unit_price;
                                                $ppn11 = 11;
                                                $total_setalah_ppn11 = ($ppn_sub_total11 * 11) / 100;
                                                $total_setalah_ppn10 = ($ppn_sub_total11 * 10) / 100;
                                                $grand_setalah_ppn11 = $ppn_sub_total11 + $total_setalah_ppn11 + $total_setalah_ppn10;
                                                ?> <?= "Rp " . number_format($grand_setalah_ppn11, 2, ',', '.') ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td> </td>
                                            <td>TOTAL</td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?php $ppn_sub_total11 = $data_unit_price;
                                                $ppn11 = 11;
                                                $total_setalah_ppn11 = ($ppn_sub_total11 * 11) / 100;
                                                $total_setalah_ppn10 = ($ppn_sub_total11 * 10) / 100;
                                                $grand_setalah_ppn11 = $ppn_sub_total11 + $total_setalah_ppn11 + $total_setalah_ppn10;
                                                ?> <?= "Rp " . number_format($grand_setalah_ppn11, 2, ',', '.') ?></td>
                                            <td></td>
                                            <input type="hidden" name="grand_total" value="<?= $grand_setalah_ppn11 ?>">
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>
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

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="add_level_1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Level 1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="javascript;;" id="form_add_level_1" method="post">
                    <input type="hidden" id="id_kontrak" name="id_kontrak" value="<?= $row_kontrak['id_kontrak'] ?>">
                    <div class="form-group">
                        <label for="">Nama Uraian</label>
                        <input type="text" name="nama_uraian" id="" class="form-control"
                            placeholder="Masukan Nama Uraian">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="javascript:;" id="button_add_level_1" class="btn btn-success button_add_level_1"
                    onclick="Simpan_add_level_1('tambah_level_1')">Simpan</a>
            </div>
        </div>
    </div>
</div>