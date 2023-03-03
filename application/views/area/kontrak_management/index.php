<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <i class="nav-icon far fa-address-card"></i>
                        Kontrak Mangement <?= $this->session->userdata('username'); ?> - <?= $this->session->userdata('id_area'); ?>

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