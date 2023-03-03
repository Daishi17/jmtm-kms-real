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
                        <div class="card-header bg-info">
                            <h5 class="card-title">
                                <i class="nav-icon far fa-file-alt"></i>
                                Tagihan Kontrak Penyedia
                            </h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <br>
                            <div class="card">
                                <div class="card-header bg-success">
                                    <center>
                                        <strong> <?= $row_kontrak['nama_pekerjaan'] ?></strong><span class="small ms-1"></span>

                                    </center>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="">Penyedia Jasa :</label>
                                        </div>
                                        <div class="col-md-9">
                                            <label for=""><?= $row_kontrak['nama_vendor'] ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="">Nomor Kontrak :</label>
                                        </div>
                                        <div class="col-md-9">
                                            <label for=""><?= $row_kontrak['no_kontrak'] ?></label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <!-- <small id="helpId" class="form-text text-muted">Ini Pake Search Select</small> -->
                                    <div class="input-group">
                                        <input type="hidden" class="form-control" value="<?= $row_kontrak['no_kontrak'] ?>" id="no_kontrak" name="no_kontrak" readonly placeholder="Cari No. Kontrak">
                                        <span class="input-group-btn">
                                            <!-- <a href="javascript:;" onclick="cari_no_kontrak()" class="btn btn-primary text-white"><i class="fas fa-search"></i> Cari</a> -->
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-warning">
                                    <strong class="text-white">Detail Kontrak</strong><span class="small ms-1"></span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Nilai Kontrak</label>
                                                <input disabled="" type="text" name="total_kontrak" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Tanggal Kontrak</label>
                                                <input disabled="" type="date" name="tanggal_kontrak" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card mb-4">
                                                <div class="card-header bg-info"><strong>Result Adendum</strong><span class="small ms-1"></span></div>
                                                <div class="card-body">
                                                    <div style="overflow-x: auto;">
                                                        <table id="tbl_adendum" class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>No Kontrak</th>
                                                                    <th>No Adendum</th>
                                                                    <th>Tanggal Adendum</th>
                                                                    <th>Nilai Adendum</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mb-4">
                                        <div class="card-header bg-secondary"><strong>Result Taggihan Penyedia</strong><span class="small ms-1"></span></div>
                                        <div class="card-body">
                                            <button style="display: none;" type="button" class="btn btn-primary create_mcku" data-toggle="modal" data-target="#modelId">
                                                Buat MC +
                                            </button>
                                            <br>
                                            <br>
                                            <div style="overflow-x: auto;">
                                                <table id="tabledetail" class="tg">
                                                    <thead>
                                                        <tr>
                                                            <th class="tg-d2hi" rowspan="2">Pekerjaan</th>
                                                            <th class="tg-d2hi" style="width: 250px;" rowspan="2">Penyedia jasa</th>
                                                            <th class="tg-d2hi" style="width: 200px;" rowspan="2">MC Ke</th>
                                                            <th class="tg-d2hi" rowspan="2">Periode</th>
                                                            <th class="tg-d2hi" colspan="3">Sebelum PPN</th>
                                                            <th class="tg-d2hi" colspan="2">Sertifikat Bulan Ini</th>
                                                            <th class="tg-d2hi" rowspan="2">Status Terakhir</th>
                                                            <th class="tg-d2hi" rowspan="2">Aksi</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="tg-d2hi" style="width: 200px;">S.D.Bulan Lalu</th>
                                                            <th class="tg-d2hi">Bulan Ini</th>
                                                            <th class="tg-d2hi">S.D Bulan Ini</th>
                                                            <th class="tg-d2hi">PPN</th>
                                                            <th class="tg-d2hi">Setelah PPN</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="result_datanya">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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



<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">
                    <div class="text-white">Buat MC</div>
                </h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <form action="javascript:;" id="form_mc" method="post">
                        <div class="form-group">
                            <input type="hidden" name="jumlah_mcku">
                            <label for="">No Kontrak</label>
                            <input type="text" class="form-control" readonly name="no_kontraku" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Otomartis Generate</small>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal mc</label>
                            <input type="date" class="form-control" name="tanggal_mc" aria-describedby="helpId" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah_mc" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">PPN</label>
                            <select name="persen_ppn" class="form-control">
                                <option value="">--- Pilih PPN ---</option>
                                <option value="10">10%</option>
                                <option value="11">11%</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Apakah Uang Muka ??</label>
                            <select name="cek_um" class="form-control">
                                <option value="">--- Plih ---</option>
                                <option value="ada">Uang Muka</option>
                                <option value="tidak ada">Bukan Uang Muka</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                            <a href="javascript:;" onclick="Simpan_mc()" class="btn btn-outline-success">Simpan</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

<!-- MODAL UPLOAD MC -->
<div class="modal fade" id="modal_penagihan" tabindex="-1" role="dialog" aria-labelledby="modal_penagihan" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Mc</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="javascript:;" id="form_upload_mc" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id_mc_upload">
                        <label for="">No Kontrak</label>
                        <input type="text" class="form-control" readonly name="no_kontrak_mc_upload" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea type="text" class="form-control" name="keterangan_upload_mc"> </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Upload <label class="text-danger">*</label></label>
                        <input type="file" name="file_mc" accept="application/msword, application/vnd.ms-excel,application/pdf" class="form-control form-control-sm file_mc">
                    </div>
                    <br>
                    <center>
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> Cancel</button>
                        <button type="submit" id="upload_mcku" name="upload" class="btn btn-outline-success"><i class="fas fa-save"></i> UPLOAD</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="modal_traking" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Traking MC</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <h3>TRAKING MC</h3>
                </center>
                <br>
                <div class="card">
                    <div class="card-header bg-success">
                        DATA TRACKING
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="hori-timeline" dir="ltr">
                                                <ul class="list-inline events">
                                                    <li class="list-inline-item event-list">
                                                        <div class="px-4">
                                                            <label for="">Vendor <i class="fas fa fa-user"></i></label>
                                                            <div id="vendor_line" class="event-date">
                                                                <label for="" id="hari_vendor"></label>
                                                            </div>
                                                            <h5 id="uraian_vendor" class="font-size-16"></h5>
                                                            <p class="text-muted"></p>

                                                        </div>
                                                    </li>
                                                    <li class="list-inline-item event-list">
                                                        <div class="px-4">
                                                            <label for="">Area <i class="fas fa fa-users"></i></label>
                                                            <div id="area_line" class="event-date ">
                                                                <label for="" id="hari_area"></label>
                                                            </div>
                                                            <h5 id="uraian_area" class="font-size-16"></h5>
                                                            <p class="text-muted"></p>

                                                        </div>
                                                    </li>
                                                    <li class="list-inline-item event-list">
                                                        <div class="px-4">
                                                            <label for="">Pusat <i class="fas fa fa-users"></i></label>
                                                            <div id="pusat_line" class="event-date">
                                                                <label for="" id="hari_pusat">Menunggu</label>
                                                            </div>
                                                            <h5 id="uraian_pusat" class="font-size-16">Menunggu Proses</h5>
                                                            <p class="text-muted"></p>

                                                        </div>
                                                    </li>
                                                    <li class="list-inline-item event-list">
                                                        <div class="px-4">
                                                            <label for="">Finance <i class="fas fa fa-users"></i></label>
                                                            <div id="finance_line" class="event-date">
                                                                <label for="" id="hari_finance">Menunggu</label>
                                                            </div>
                                                            <h5 id="uraian_finance" class="font-size-16">Menunggu Proses</h5>
                                                            <p class="text-muted"></p>

                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card -->
                                </div>
                            </div>
                            <br>
                            <table id="datatable_traking_mc" style="font-size: 14px;" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Uraian</th>
                                        <th>PIC</th>
                                        <th>Tanggal</th>
                                        <th>Catatan</th>
                                        <th>Vendor</th>
                                        <th>Area</th>
                                        <th>Pusat</th>
                                        <th>Finance</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <?php if ($this->session->userdata('id_vendor')) { ?>
                    <div id="button_vendor" class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <a class="btn-sm btn btn-success text-white" data-toggle="modal" data-target="#modal_kirim_revisi_vendor" href="javascript:;">Kirim Revisi</a>
                    </div>
                <?php     } else { ?>
                    <?php if ($this->session->userdata('role') ==  1 || $this->session->userdata('2')) { ?>

                    <?php } else if ($this->session->userdata('role') ==  3) { ?>
                        <div id="button_area" class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <a class="btn-sm btn btn-danger text-white" data-toggle="modal" data-target="#modal_revisi_area" href="javascript:;">Revisi</a>
                            <a class="btn-sm btn btn-success text-white" data-toggle="modal" data-target="#modal_aprove_area" href="javascript:;">Approve</a>
                        </div>
                    <?php  } else if ($this->session->userdata('role') ==  4) { ?>
                        <div id="button_pusat" class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <a class="btn-sm btn btn-danger text-white" data-toggle="modal" data-target="#modal_revisi_pusat" href="javascript:;">Revisi</a>
                            <a class="btn-sm btn btn-success text-white" data-toggle="modal" data-target="#modal_aprove_pusat" href="javascript:;">Approve</a>
                        </div>
                    <?php   } else if ($this->session->userdata('role') ==  5) { ?>
                        <div id="button_finance" class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <a class="btn-sm btn btn-success text-white" data-toggle="modal" data-target="#modal_diterima_finance" href=" javascript:;">Terima Berkas</a>
                        </div>
                        <div id="button_pencairan" class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <a class="btn-sm btn btn-success text-white" data-toggle="modal" data-target="#modal_pencairan" href=" javascript:;">Cairkan</a>
                        </div>
                    <?php } ?>

                <?php  }  ?>

            </div>
        </div>
    </div>


    <!-- ini untuk kirim revisi vendor -->

    <div class=" modal fade" id="modal_kirim_revisi_vendor" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kirim Revisi Vendor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javasript:;" id="form_kirim_revisi_vendor" method="post">
                        <div class="form-group">
                            <input type="hidden" name="no_kontrak">
                            <input type="hidden" name="id_mc">
                            <input type="hidden" name="id_traking">
                            <input type="hidden" name="tanggal_mc">
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea type="text" class="form-control" name="catatan_rapot"> </textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <a href="javascript:;" onclick="Kirim_revisi_vendor()" class="btn btn-sm btn-primary">Kirim revisi</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Ini Untuk Approve Area -->

    <div class="modal fade" id="modal_aprove_area" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Approve Area</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javasript:;" id="form_aprove_area" method="post">
                        <div class="form-group">
                            <input type="hidden" name="no_kontrak">
                            <input type="hidden" name="id_mc">
                            <input type="hidden" name="id_traking">
                            <input type="hidden" name="jumlah_hari_vendor">
                            <input type="hidden" name="waktu_kirim_vendor">
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea type="text" class="form-control" name="catatan_rapot"> </textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <a href="javascript:;" onclick="Setujui_area()" class="btn btn-sm btn-primary">Setujui</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_revisi_area" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Revisi Area</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javasript:;" id="form_revisi_area" method="post">
                        <div class="form-group">
                            <input type="hidden" name="no_kontrak">
                            <input type="hidden" name="id_mc">
                            <input type="hidden" name="id_traking">
                            <input type="hidden" name="jumlah_hari_vendor">
                            <input type="hidden" name="waktu_kirim_vendor">
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea type="text" class="form-control" name="catatan_rapot"> </textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <a href="javascript:;" onclick="Revisi_area()" class="btn btn-sm btn-danger">Revisi</a>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL PUSAT -->

    <div class="modal fade" id="modal_revisi_pusat" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Revisi Pusat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javasript:;" id="form_revisi_pusat" method="post">
                        <div class="form-group">
                            <input type="hidden" name="no_kontrak">
                            <input type="hidden" name="id_mc">
                            <input type="hidden" name="id_traking">
                            <input type="hidden" name="jumlah_hari_vendor">
                            <input type="hidden" name="jumlah_hari_area">
                            <input type="hidden" name="waktu_kirim_area">
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea type="text" class="form-control" name="catatan_rapot"> </textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <a href="javascript:;" onclick="Revisi_pusat()" class="btn btn-sm btn-danger">Revisi</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_aprove_pusat" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Aprove Pusat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="javasript:;" id="form_aprove_pusat" method="post">
                        <div class="form-group">
                            <input type="hidden" name="no_kontrak">
                            <input type="hidden" name="id_mc">
                            <input type="hidden" name="id_traking">
                            <input type="hidden" name="jumlah_hari_vendor">
                            <input type="hidden" name="jumlah_hari_area">
                            <input type="hidden" name="waktu_kirim_area">
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea type="text" class="form-control" name="catatan_rapot"> </textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <a href="javascript:;" onclick="Setujui_pusat()" class="btn btn-sm btn-danger">Aprove</a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal_diterima_finance" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terima Berkas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        Apa Anda Yakin Berkas Sudah Anda Terima ??
                    </center>
                    <form action="javasript:;" id="form_aprove_finance" method="post">
                        <div class="form-group">
                            <input type="hidden" name="no_kontrak">
                            <input type="hidden" name="id_mc">
                            <input type="hidden" name="id_traking">
                            <input type="hidden" name="jumlah_hari_vendor">
                            <input type="hidden" name="jumlah_hari_area">
                            <input type="hidden" name="jumlah_hari_pusat">
                            <input type="hidden" name="waktu_kirim_pusat">
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea type="text" class="form-control" name="catatan_rapot"> </textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Belum</button>
                    <a href="javascript:;" onclick="Terima_finance()" class="btn btn-sm btn-danger">Berkas Di Terima</a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal_pencairan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pencairan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        Apa Anda Yakin Ingin Mencairkan ??
                    </center>
                    <form action="javasript:;" id="form_pencairam" method="post">
                        <div class="form-group">
                            <input type="hidden" name="no_kontrak">
                            <input type="hidden" name="id_mc">
                            <input type="hidden" name="id_traking">
                            <input type="hidden" name="jumlah_hari_vendor">
                            <input type="hidden" name="jumlah_hari_area">
                            <input type="hidden" name="jumlah_hari_pusat">
                            <input type="hidden" name="jumlah_hari_finance">
                            <input type="hidden" name="waktu_kirim_finance">
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea type="text" class="form-control" name="catatan_rapot"> </textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <a href="javascript:;" onclick="Pencairan_finance()" class="btn btn-sm btn-danger">Cairkan</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Button trigger modal -->