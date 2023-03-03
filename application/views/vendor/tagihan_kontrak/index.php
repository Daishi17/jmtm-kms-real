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
                            <!-- <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_kontrak">
                                        Tambah Kontrak
                                    </button>
                                </div>
                            </div> -->
                            <br>
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <!-- Button trigger modal -->


                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="table" class="table table-bordered table-hover ">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pekerjaan</th>
                                                    <th>Penyedia Jasa</th>
                                                    <th>Nomer Kontrak</th>
                                                    <th>Total Kontrak Awal</th>
                                                    <th>Tanggal Kontrak Awal</th>
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


<!-- Modal -->
<div class="modal fade" id="tambah_kontrak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kontrak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_kontrak">
                    <div class="form-group">
                        <label for="exampleInputEmail1">No. Kontrak</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="no_kontrak" placeholder="No Kontrak">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Pekerjaan</label>
                        <input type="text" class="form-control" name="nama_pekerjaan" id="exampleInputPassword1" placeholder="Nama Pekerjaan">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Kontrak</label>
                        <input type="date" class="form-control" name="tanggal_kontrak" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Total Kontrak</label>
                        <input type="text" class="form-control" name="total_kontrak" id="exampleInputPassword1" placeholder="Total Kontrak">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Penyedia</label>
                        <br>
                        <select name="id_vendor" class="select2 form-control form-control-sm">
                            <?php foreach ($vendor as $key => $value) { ?>
                                <option value="<?= $value['id_vendor'] ?>"><?= $value['nama_vendor'] ?></option>
                            <?php   } ?>
                        </select>
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


<!-- Modal -->
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
                <input type="text" id="no_kontrak">
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
                    <input type="text" id="no_kontrak2" name="no_kontrak_for_adendum">
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