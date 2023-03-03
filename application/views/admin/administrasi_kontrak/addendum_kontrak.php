<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">

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
                    <div class="col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?= base_url('assets/logo.png') ?>" width="250px" alt="">
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-5 mt-4">
                                        <h6> <i class="fa fa-book"></i> Addendum Kontrak Pasca Pengadaan </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-header">
                                    <?= $row_program_kontrak_detail['nama_pekerjaan_program_mata_anggaran'] ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="card card-outline card-primary col-md-4">
                                                <div class="card-header">
                                                    Nilai Kontrak Awal
                                                </div>
                                                <div class="card-body">
                                                    <label for="">
                                                        <?= "Rp " . number_format($row_program_kontrak_detail['total_hps_mata_anggaran'], 2, ',', '.') ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="float-right">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-outline-primary mb-3" data-toggle="modal" data-target="#buat_addendum">
                                                    <i class="fas fa fa-database"></i> Buat Addendum
                                                </button>
                                            </div>
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
                                            </style>

                                            <table id="tbl_addendum" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr class="bg-primary">
                                                        <th>No</th>
                                                        <th>No Addendum</th>
                                                        <th>Nama Addendum</th>
                                                        <th>Tanggal Addendum</th>
                                                        <th>Nilai Addendum</th>
                                                        <th>Aksi Addendum</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./card-body -->
                                <!-- /.card-footer -->
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="buat_addendum" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title">Addendum Kontrak</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <form action="javascript:;" id="form_addendum_kontrak" method="post">
                                            <input type="hidden" name="id_detail_program_penyedia_jasa" value="<?= $row_program_kontrak_detail['id_detail_program_penyedia_jasa'] ?>">
                                            <div class="form-group">
                                                <label for="">No Addendum</label>
                                                <select name="no_addendum" class="form-control form-control-sm" id="">
                                                    <?php $i = 0;
                                                    for ($i = 1; $i <= 30; $i++) {  ?>
                                                        <option class="p-2" value="<?= $i ?>"><?= $i ?></option>
                                                    <?php  } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nama Addendum</label>
                                                <input type="text" name="nama_addendum" id="" class="form-control form-control-sm" placeholder="Masukan Nama Addendum">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nilai Addendum</label>
                                                <input type="number" name="nilai_addendum" id="" class="form-control form-control-sm" placeholder="Masukan Nilai Addendum">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tanggal Addendum</label>
                                                <input type="date" name="tanggal_addendum" id="" class="form-control form-control-sm">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fas fa fa-times"></i> Close</button>
                                    <a href="javascript:;" onclick="Simpan_addendum()" class="btn btn-sm btn-outline-success"><i class="fa fa-paper-plane" aria-hidden="true"></i> Simpan</a>
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
    </section>
    <!-- /.content -->
</div>
</div>