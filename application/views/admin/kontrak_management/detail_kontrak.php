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
                                Detail <?= $kontrak['nama_kontrak'] ?>
                                <input type="hidden" name="id_kontrak" id="id_kontrak" value="<?= $kontrak['id_kontrak'] ?>">
                            </h5>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active btn btn-sm" id="nav-home-tab" data-toggle="tab" href="#nav-capex" role="tab" aria-controls="nav-home" aria-selected="true">Capex</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-opex" role="tab" aria-controls="nav-profile" aria-selected="false">Opex</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-bua" role="tab" aria-controls="nav-contact" aria-selected="false">BUA</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-sdm" role="tab" aria-controls="nav-contact" aria-selected="false">SDM</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-capex" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            Capex
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_capex">
                                                Tambah Uraian
                                            </button>
                                            <br>
                                            <br>
                                            <table class="table" id="tbl_capex">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Uraian</th>
                                                        <th>Tanggal Dibuat</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td scope="row"></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-opex" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="card">

                                        <div class="card-header bg-primary">
                                            Opex
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_opex">
                                                Tambah Uraian
                                            </button>
                                            <br>
                                            <br>
                                            <table class="table" id="tbl_opex">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Uraian</th>
                                                        <th>Tanggal Dibuat</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td scope="row"></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-bua" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            BUA
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_bua">
                                                Tambah BUA
                                            </button>
                                            <br>
                                            <br>
                                            <table class="table" id="table_bua">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Uraian</th>
                                                        <th>Tanggal Dibuat</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td scope="row"></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-sdm" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="card">
                                        <div class="card-header bg-primary">
                                            SDM
                                        </div>
                                        <div class="card-body">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_sdm">
                                                Tambah SDM
                                            </button>
                                            <br>
                                            <br>
                                            <table class="table" id="table_sdm">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Uraian</th>
                                                        <th>Tanggal Dibuat</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td scope="row"></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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


<!-- Modal tambah capex -->
<div class="modal fade" id="tambah_capex" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Uraian Capex</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_capex" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Nama Uraian Capex</label>
                        <textarea name="nama_uraian_lv3" id="nama_uraian_lv3" class="form-control"></textarea>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" onclick="save_uraian_capex(<?= $kontrak['id_kontrak'] ?>)" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal tambah opex -->
<div class="modal fade" id="tambah_opex" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Uraian Opex</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_opex" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Nama Uraian Opex</label>
                        <textarea name="nama_uraian_lv3" id="nama_uraian_lv3" class="form-control"></textarea>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" onclick="save_uraian_opex(<?= $kontrak['id_kontrak'] ?>)" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal tambah bua -->
<div class="modal fade" id="tambah_bua" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Uraian BUA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_bua" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Nama Uraian BUA</label>
                        <textarea name="nama_uraian_lv3" id="nama_uraian_lv3" class="form-control"></textarea>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" onclick="save_uraian_bua(<?= $kontrak['id_kontrak'] ?>)" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal tambah sdm -->
<div class="modal fade" id="tambah_sdm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Uraian SDM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_sdm" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Nama Uraian SDM</label>
                        <textarea name="nama_uraian_lv3" id="nama_uraian_lv3" class="form-control"></textarea>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" onclick="save_uraian_sdm(<?= $kontrak['id_kontrak'] ?>)" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal uraian level 4 -->
<div class="modal fade" id="modal_uraian_level_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Uraian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_uraian" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id_capex">
                    <div class="form-group">
                        <label for="">Nama Uraian Capex</label>
                        <textarea name="nama_uraian_level_4" id="nama_uraian_level_4" class="form-control"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" onclick="save_uraian_level4()" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            <br>
            <div class="container">
                <div class="card">
                    <div class="card-header bg-primary">
                        URAIAN DETAIL
                    </div>
                    <div class="card-body">
                        <table class="table" id="table_uraian_capex">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Uraian</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row"></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal_uraian_level_4_opex" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Uraian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_uraian_opex" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id_opex">
                    <div class="form-group">
                        <label for="">Nama Uraian Opex</label>
                        <textarea name="nama_uraian_level_4_opex" id="nama_uraian_level_4_opex" class="form-control"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" onclick="save_uraian_level4_opex()" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            <br>
            <div class="container">
                <div class="card">
                    <div class="card-header bg-primary">
                        URAIAN DETAIL
                    </div>
                    <div class="card-body">
                        <table class="table" id="table_uraian_opex">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Uraian</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row"></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_uraian_level_4_bua" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Uraian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_uraian_bua" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id_bua">
                    <div class="form-group">
                        <label for="">Nama Uraian bua</label>
                        <textarea name="nama_uraian_level_4_bua" id="nama_uraian_level_4_bua" class="form-control"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" onclick="save_uraian_level4_bua()" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            <br>
            <div class="container">
                <div class="card">
                    <div class="card-header bg-primary">
                        URAIAN DETAIL
                    </div>
                    <div class="card-body">
                        <table class="table" id="table_uraian_bua">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Uraian</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row"></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal_uraian_level_4_sdm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Uraian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_uraian_sdm" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id_sdm">
                    <div class="form-group">
                        <label for="">Nama Uraian sdm</label>
                        <textarea name="nama_uraian_level_4_sdm" id="nama_uraian_level_4_sdm" class="form-control"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" onclick="save_uraian_level4_sdm()" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            <br>
            <div class="container">
                <div class="card">
                    <div class="card-header bg-primary">
                        URAIAN DETAIL
                    </div>
                    <div class="card-body">
                        <table class="table" id="table_uraian_sdm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Uraian</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row"></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>