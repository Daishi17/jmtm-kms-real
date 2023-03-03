<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
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
                                        <h4> <i class="fa fa-book"></i> MANGEMENT KONTRAK</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-10">
                                        <div class="card card-primary">
                                            <div class="card-header text-center">
                                                <h6> <i class="fa fa-search-plus" aria-hidden="true"></i> FILTER KONTRAK</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                                <input type="text" placeholder="Cari Kontrak" class="form-control rounded-0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                                <input type="text" placeholder="Cari No.Kontrak" class="form-control rounded-0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 mt-1">
                                                        <a href="#" class="btn btn-sm btn-outline-primary btn-block"> <i class="fa fa-search-plus" aria-hidden="true"></i> Filter Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>

                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-block" data-toggle="modal" data-target="#tambah_program">
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
                                                    <div style="overflow-x: auto;">
                                                        <table  id="table" class="table-bordered table-striped">
                                                            <thead>
                                                                <tr style="font-size: 12px;" class="bg-primary">
                                                                    <th class="text-center bg-primary" rowspan="2" >No </th>
                                                                    <th class="text-center bg-primary" style="width:200px;" rowspan="2" >Kontrak Manajemen</th>
                                                                    <th class="text-center bg-primary" style="width:100px;" rowspan="2" >Departemen</th>
                                                                    <th class="text-center" style="width:100px" rowspan="2" >No Kontrak</th>
                                                                    <th class="text-center" style="width:100px" rowspan="2" >Tahun Kontrak</th>
                                                                    <th class="text-center" style="width:100px" rowspan="2" >Tahun Anggaran</th>
                                                                    <th class="text-center" colspan="3" >Informasi Addendum Terakhir</th>
                                                                    <th class="text-center" style="width:100px" rowspan="2" >Jenis Kontrak</th>
                                                                    <th class="text-center" rowspan="2" >Aksi</th>
                                                                </tr>
                                                                <tr style="font-size: 12px;" class="table-warning">
                                                                    <th class="text-center" style="width:100px">Nilai Add</th>
                                                                    <th class="text-center" style="width:100px">Tanggal Add</th>
                                                                    <th class="text-center" style="width:100px">Periode Add</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody style="font-size: 12px;">

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
                            </div>
                        </div>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title">
                    <i class="fas fa-briefcase"></i>
                    Tambah Kontrak
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Form Input Kontrak
                                </h3>
                            </div>
                            <form id="form_tambah_kontrak">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="row">
                                            <div class="col-md-6">
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

                                            <div class="col-md-6">
                                                <label for="">Tahuh Anggaran</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-clipboard"> </i>
                                                        </span>
                                                    </div>
                                                    <select name="tahun_anggaran" class="form-control" id="">
                                                        <?php $i = 0;
                                                        for ($i = 20; $i < 30; $i++) {  ?>
                                                            <option value="20<?= $i ?>">20<?= $i ?></option>
                                                        <?php  } ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">No. Kontrak</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-clipboard"> </i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" name="no_kontrak" placeholder="No Kontrak">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Tahun Kontrak</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar"> </i>
                                                        </span>
                                                    </div>
                                                    <input type="date" placeholder="Tahun" class="form-control" name="tahun_kontrak" placeholder="Tahun">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Jenis Kontrak</label>
                                                <select class="form-control" name="jenis_kontrak">
                                                    <option value="Lumpsum">Capex At Cost,Opex Lumpsum</option>
                                                    <option value="Unit Price">Unit Price</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Priode Kontrak</label>
                                                <select class="form-control" name="no_adendum_post_kontrak" onchange="pilih_addendum()">
                                                    <option>-- Pilih Periode --</option>
                                                    <option value="Kontrak Awal">Kontrak Awal</option>
                                                    <option value="1">I</option>
                                                    <option value="2">II</option>
                                                    <option value="3">III</option>
                                                    <option value="4">IV</option>
                                                    <option value="5">V</option>
                                                    <option value="6">VI</option>
                                                    <option value="7">VII</option>
                                                    <option value="8">VIII</option>
                                                    <option value="9">IX</option>
                                                    <option value="10">X</option>
                                                    <option value="11">XI</option>
                                                    <option value="12">XII</option>
                                                    <option value="13">XIII</option>
                                                    <option value="14">XIV</option>
                                                    <option value="15">XV</option>
                                                    <option value="16">XVI</option>
                                                    <option value="17">XVII</option>
                                                    <option value="18">XVIII</option>
                                                    <option value="19">XIX</option>
                                                    <option value="20">XX</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6" style="display: none;" id="tanggal_adendum_kontrak">
                                                <label for="">Tanggal Addendum</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar"> </i>
                                                        </span>
                                                    </div>
                                                    <input type="date" placeholder="Tahun" class="form-control" name="tanggal_adendum_post_kontrak" placeholder="Tahun">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <button type="button" onclick="save_program()" class="btn btn-outline-success float-right"> <i class="fa fa-paper-plane" aria-hidden="true"></i> Simpan</button>
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
</div>