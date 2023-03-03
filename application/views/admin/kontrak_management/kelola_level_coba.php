<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <i class="nav-icon far fa-address-card"></i>
                        Kontrak Mangement JENIS LUMPSUM
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
                                Kelola Level Kontrak <?= $kontrak['nama_kontrak'] ?>
                                <input type="hidden" name="id_kontrak" id="id_kontrak" value="<?= $kontrak['id_kontrak'] ?>">
                            </h5>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <style type="text/css">

                            </style>
                            <div class="row">
                                <table class="table table-bordered" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="bg-info"><?= $kontrak['nama_program'] ?> &ensp;

                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="bg-info"><?= $kontrak['nama_kontrak'] ?> &ensp;
                                                <a href="javascript:;" class="badge badge-success" data-toggle="modal" data-target="#level2">Buat Level +</a>
                                            </th>
                                        </tr>
                                        <?php if ($capex['nama_uraian']) { ?>
                                            <tr>
                                                <th><?= $capex['no_urut'] ?></th>
                                                <th colspan="2" class="bg-info"><?= $capex['nama_uraian'] ?> &ensp;
                                                    <a href="javascript:;" class="badge badge-success" data-toggle="modal" data-target="#level2">Buat Level +</a>
                                                </th>
                                            </tr>
                                            <?php foreach ($detail_capex as $key => $value) { ?>
                                                <tr>
                                                    <td><?= $value['no_urut'] ?></td>
                                                    <td><?= $value['nama_uraian'] ?></td>
                                                    <td>67.000.000,00</td>
                                                </tr>
                                            <?php } ?>

                                        <?php  } else { ?>

                                        <?php   }    ?>

                                    </thead>
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
    <div class="modal fade" id="modal_tambah_level3" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title">Add Level 3</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:;" id="form_uraian_lvl3" method="post">
                        <input type="hidden" name="id_kontrak" value="<?= $kontrak['id_kontrak'] ?>">
                        <div class="form-group">
                            <label for="">Nama Uraian</label>
                            <textarea required name="nama_uraian_lv3" id="" class="form-control" cols="10" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="javascript:;" id="simpan_button_lv3" onclick="simpan_level3()" class="btn btn-primary">Save</a>
                </div>
            </div>
        </div>
    </div>

    <!-- edit modal level 3 -->
    <div class="modal fade" id="modal_edit_level3" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:;" id="form_uraian_lvl3_edit" method="post">
                        <input type="hidden" name="id_capex_edit">
                        <div class="form-group">
                            <label for="">Nama Uraian</label>
                            <textarea required name="nama_uraian_lv3_edit" id="" class="form-control" cols="10" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="javascript:;" id="simpan_button_lv3_edit" onclick="simpan_level3_edit()" class="btn btn-primary">Save</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_tambah_level4" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="title_lv3"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javascript:;" id="form_uraian_lvl4" method="post">
                        <input type="hidden" name="id_capex_detail">
                        <div class="form-group">
                            <label for="">Nama Uraian</label>
                            <textarea required name="nama_uraian_lv4" id="" class="form-control" cols="10" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Nilai Uraian</label>
                            <input type="text" placeholder="Rp.xxxx" name="harga_capex" id="" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="javascript:;" id="simpan_button_lv4" onclick="simpan_level4()" class="btn btn-primary">Save</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="level2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Level </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tambah_uraian_level2">
                    <div class="modal-body">
                        <label for="">Pilih Uraian Level</label>
                        <select name="level2" id="" class="form-control">
                            <option value="Capex">Capex</option>
                            <option value="Opex">Opex</option>
                            <option value="BUA">BUA</option>
                            <option value="SDM">SDM</option>
                        </select>
                        <label for="">Nama Uraian</label>
                        <input type="text" name="nama_uraian" id="" class="form-control">
                        <input type="text" name="id_kontrak_lv2" id="id_kontrak_lv2" value="<?= $kontrak['id_kontrak'] ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" id="btn_save_lv2" class="btn btn-primary" onclick="">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>