<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <i class="nav-icon far fa-address-card"></i>
                        File Master / Data Pengguna
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
                                Tabel Data Pengguna
                            </h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-block bg-gradient-success" data-toggle="modal" data-target="#modal-lg1">
                                    <i class="fas fa-plus"></i>
                                    Tambah
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
                                                        Nama Penyedia
                                                    </th>
                                                    <th>
                                                        <i class="fas fa-info-circle"></i>
                                                        Email Penyedia
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
                    Tambah Data Penyedia
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
                                    Form Input Data Penyedia
                                </h3>
                            </div>
                            <form id="form_tambah">
                                <div class="card-body">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Biodata Penyedia
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
                                                <input type="text" class="form-control" name="nama_vendor" placeholder="Nama PT/CV">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="telepon_vendor" placeholder="Telepon Penyedia">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-address-card"></i>
                                                    </span>
                                                </div>
                                                <textarea name="alamat_penyedia" class="form-control" placeholder="Alamat Penyedia"></textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-body" style="margin-top: -40px;">
                                    <div class="card card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Pengaturan User Login
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user-lock"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="username" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-envelope-open"></i>
                                                    </span>
                                                </div>
                                                <input type="email" name="email_penyedia" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-key"></i>
                                                    </span>
                                                </div>
                                                <input type="password" name="password" class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control" name="status">
                                                    <option>Option</option>
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Non Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" onclick="save_vendor()" class="btn btn-success float-right">Simpan</button>
                                </div>
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
                    Edit Data Penyedia
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_vendor">
                <div class="row">
                    <form id="form_edit">
                        <div class="card-body">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Biodata Penyedia
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
                                        <input type="text" class="form-control" id="nama_vendor2" name="nama_vendor2" placeholder="Nama PT/CV">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="telepon_vendor2" name="telepon_vendor2" placeholder="Telepon Penyedia">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-address-card"></i>
                                            </span>
                                        </div>
                                        <textarea name="alamat_penyedia2" id="alamat_penyedia2" class="form-control" placeholder="Alamat Penyedia"></textarea>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="card-body" style="margin-top: -40px;">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Pengaturan User Login
                                    </h3>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-lock"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="username2" name="username2" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-envelope-open"></i>
                                            </span>
                                        </div>
                                        <input type="email" id="email_penyedia2" name="email_penyedia2" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-key"></i>
                                        </span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="status2">
                                            <option>Option</option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Non Aktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="button" onclick="edit_data()" class="btn btn-success float-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between">

            </div>
        </div>
    </div>
</div>