<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <i class="nav-icon fas fa-file-alt"></i>
                        File Administrasi
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
                                <i class="nav-icon far fa-file-alt"></i>
                                File Administrasi / Administrasi Kontrak / Action Plan
                            </h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_kontrak">
                                        Tambah Kontrak
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <!-- Button trigger modal -->


                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="table" style="font-size: 12px;" class="table table-striped table-bordered table-hover ">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th style="width: 100px;">Nama Pekerjaan</th>
                                                    <th style="width: 100px;">Penyedia Jasa</th>
                                                    <th style="width: 100px;">Nomer Kontrak</th>
                                                    <th>Total Kontrak Awal</th>
                                                    <th style="width: 100px;">Tanggal Kontrak Awal</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

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

<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>


<!-- Modal tambah kontrak -->
<div class="modal fade" id="tambah_kontrak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kontrak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_kontrak">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-file-signature"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="no_kontrak" placeholder="No Kontrak">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa fa-briefcase"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="nama_pekerjaan" id="exampleInputPassword1" placeholder="Nama Pekerjaan">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="date" class="form-control" name="tanggal_kontrak" id="exampleInputPassword1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="total_kontrak" id="exampleInputPassword1" placeholder="Total Kontrak">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Penyedia Otomatis</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Penyedia Manual</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Penyedia</label>
                                        <br>
                                        <select name="id_vendor" class="select2 form-control form-control-sm" style="width: 100%;">
                                            <option value="">--Pilih--</option>
                                            <?php foreach ($vendor as $key => $value) { ?>
                                                <option value="<?= $value['id_vendor'] ?>"><?= $value['nama_vendor'] ?></option>
                                            <?php   } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Penyedia</label>
                                        <br>
                                        <input type="text" class="form-control" name="nama_vendor" id="exampleInputPassword1" placeholder="Nama Penyedia">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="save()">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </form>
            </div>
            <div class="modal-footer">

                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>


<!-- Modal adendum -->
<div class="modal fade" id="adendumKontrak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adendum Kontrak Pekerjaan <span id="nm_pekerjaan"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="no_kontrak">
                <button onclick="tambah_adendum()" class="btn btn-sm btn-primary">Tambah Adendum</button>
                <br>
                <br>
                <table class="table" id="table_adendum">
                    <thead>
                        <tr>
                            <th>No Kontrak</th>
                            <th>No Adendum</th>
                            <th>Tanggal Adendum</th>
                            <th>Nilai Adendum</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal adendum -->
<div class="modal fade" id="tambah_adendum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Adendum <span id="nm_pekerjaan"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_adendum">
                    <input type="hidden" id="no_kontrak2" name="no_kontrak_for_adendum">
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">No Adendum</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="no_adendum" placeholder="No Adendum">
                    </div> -->
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Adendum</label>
                        <input type="date" class="form-control" name="tanggal_adendum" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jumlah</label>
                        <input type="text" class="form-control" name="jumlah" id="exampleCheck1">
                    </div>
                    <button type="button" onclick="simpan_adendum()" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- modal edit kontrak -->

<div class="modal fade" id="modal_edit_kontrak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kontrak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_kontrak_edit">
                    <input type="hidden" name="no_kontrak_edit">
                    <input type="hidden" name="id_vendor_edit2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-file-signature"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="no_kontrak_edit" placeholder="No Kontrak">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa fa-briefcase"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="nama_pekerjaan_edit" id="exampleInputPassword1" placeholder="Nama Pekerjaan">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="date" class="form-control" name="tanggal_kontrak_edit" id="exampleInputPassword1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="total_kontrak_edit" id="exampleInputPassword1" placeholder="Total Kontrak">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-penyedia_otomatis" role="tab" aria-controls="nav-home" aria-selected="true">Penyedia Otomatis</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-penyedia_edit" role="tab" aria-controls="nav-profile" aria-selected="false">Penyedia Manual</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-penyedia_otomatis" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Penyedia</label>
                                        <br>
                                        <select name="id_vendor_edit" class="select2 form-control form-control-sm" style="width: 100%;">
                                            <option value="">--Pilih--</option>
                                            <?php foreach ($vendor as $key => $value) { ?>
                                                <option value="<?= $value['id_vendor'] ?>"><?= $value['nama_vendor'] ?></option>
                                            <?php   } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-penyedia_edit" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Penyedia</label>
                                        <br>
                                        <input type="text" class="form-control" name="nama_vendor_edit" id="exampleInputPassword1" placeholder="Nama Penyedia">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="edit_kontrak()">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>