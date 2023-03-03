<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <input type="hidden" name="id_program" value="<?= $program['id_program'] ?>">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <i class="nav-icon far fa-address-card"></i>
                        Data Addendum
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
                                Tabel Data Addendum
                            </h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-block bg-gradient-success" data-toggle="modal" data-target="#modal-lg1">
                                    <i class="fas fa-plus"></i>
                                    Tambah Addendum
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
                                                        No Addendum
                                                    </th>
                                                    <th>
                                                        <i class="fas fa-info-circle"></i>
                                                        Jumlah
                                                    </th>
                                                    <th>
                                                        <i class="fas fa-cogs"></i>
                                                        Tanggal
                                                    </th>
                                                    <th>
                                                        <i class="fas fa-cogs"></i>
                                                        Aksi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- belum keisi -->
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
<div class="modal fade" id="modal-lg1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-user-alt"></i>
                    Tambah Addendum
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
                                    <i class="fas fa-edit"></i>
                                    Form Input Data Addendum
                                </h3>
                            </div>
                            <form id="form_tambah">
                                <input type="text" name="id_program" value="<?= $program['id_program'] ?>">
                                <input type="text" name="id_kontrak" value="<?= $id_kontrak ?>">
                                <div class="card-body">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Data Addendum
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-clipboard"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="no_adendum" placeholder="No Addendum">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-money"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="jumlah" placeholder="Jumlah">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-calender"></i>
                                                    </span>
                                                </div>
                                                <input type="date" class="form-control" name="tanggal">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" onclick="save_addendum()" class="btn btn-success float-right">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-user-alt"></i>
                    Edit Data Addendum
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <form id="form_edit">
                        <input type="text" name="id_adendum">
                        <input type="text" name="id_kontrak" value="<?= $id_kontrak ?>">
                        <div class="card-body">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Data Addendum
                                    </h3>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-clipboard"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="no_adendum" placeholder="No Addendum">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-money"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="jumlah" placeholder="Jumlah">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calender"></i>
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" name="tanggal">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" onclick="edit_data()" class="btn btn-success float-right">Simpan</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between">

            </div>
        </div>
    </div>
</div>