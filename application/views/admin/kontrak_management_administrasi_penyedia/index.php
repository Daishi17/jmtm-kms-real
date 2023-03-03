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
                                    <div class="col-md-5">
                                        <img src="<?= base_url('assets/logo.png') ?>" width="250px" alt="">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-5 mt-4">
                                        <h4> <i class="fa fa-book"></i> Administrasi Kontrak Penyedia Jasa Pra Pengadaan</h4>
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
                                                <h6> <i class="fa fa-search-plus" aria-hidden="true"></i> FILTER NAMA PEKERJAAN</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                                <input type="text" placeholder="Cari Nama Pekerjaan" class="form-control rounded-0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                                <input type="text" placeholder="Cari No Kontrak" class="form-control rounded-0">
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
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <style type="text/css">
                                                        .angga {
                                                            z-index: 999;
                                                            left: 0;
                                                            top: 0;
                                                            position: sticky;
                                                            border: 3px solid black;
                                                        }
                                                    </style>
                                                    <div style="height: 50%;overflow: scroll;">
                                                        <table class="table table-bordered" style="width:100%;">
                                                            <thead>
                                                                <tr class="text-center bg-primary">
                                                                    <th class="tg-0pky text-center" style="font-size: 12px;" rowspan="3">No</th>
                                                                    <th class="tg-0pky text-center angga bg-primary " style="font-size: 12px;width:300px !important;border: 1px solid #ccc;" rowspan="2">Uraian Pekerjaan</th>
                                                                    <th class="tg-0pky text-center" style="font-size: 12px;width:200px !important;" rowspan="2">Nilai Pagu</th>
                                                                    <th class="tg-0pky text-center" style="font-size: 12px;" colspan="3">Persetujuan Ijin Prinsip</th>
                                                                    <th class="tg-0pky text-center" style="font-size: 12px;" colspan="3">Persetujuan Hps</th>
                                                                    <th class="tg-0pky text-center" style="font-size: 12px;" colspan="2">Nota Dinas Permohonan Pengadaan</th>
                                                                    <th class="tg-0pky text-center" style="font-size: 12px;">Aksi</th>
                                                                </tr>
                                                                <tr class="text-center table-warning">
                                                                    <th class="tg-0pky text-center" style="font-size: 12px;width:200px !important;">Jenis Pengadaan</th>
                                                                    <th class="tg-0pky text-center" style="font-size: 12px;width:200px !important;">Nomor Surat</th>
                                                                    <th class="tg-0pky text-center" style="font-size: 12px;width:200px !important;">Tanggal Surat</th>
                                                                    <th class="tg-0pky text-center" style="font-size: 12px;width:200px !important;">Nilai HPS</th>
                                                                    <th class="tg-0pky text-center" style="font-size: 12px;width:200px !important;">Nomor Surat</th>
                                                                    <th class="tg-0pky text-center" style="font-size: 12px;width:200px !important;">Tanggal Surat</th>
                                                                    <th class="tg-0pky text-center" style="font-size: 12px;width:200px !important;">Nomor Surat</th>
                                                                    <th class="tg-0pky text-center" style="font-size: 12px;width:200px !important;">Tanggal Surat</th>
                                                                    <th class="tg-0pky text-center" style="font-size: 12px;width:200px !important;"></th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?php $i = 1;
                                                                $j = 1;
                                                                foreach ($get_mata_anggaran as $key => $value) { ?>
                                                                    <?php $id_detail_program_penyedia_jasa = $value['id_detail_program_penyedia_jasa'];  ?>
                                                                    <tr>
                                                                        <td class="tg-0pky table-warning" style="font-size: 12px;"><?= $i++ ?></td>
                                                                        <td class="tg-0pky angga table-warning" style="font-size: 12px;border: 1px solid #ccc;" colspan="2">
                                                                            <?= $value['nama_pekerjaan_program_mata_anggaran'] ?>
                                                                        </td>
                                                                        <td class="tg-0pky"><?= $value['jenis_pengadaan'] ?></td>
                                                                        <td class="tg-0pky"><a href="<?= base_url('admin/administrasi_penyedia/pdf_pip/' . $value['id_detail_program_penyedia_jasa']) ?>"><?= $value['no_surat_pip'] ?></a></td>
                                                                        <td class="tg-0pky"><?= $value['tgl_surat_pip'] ?></td>
                                                                        <td class="tg-0pky"></td>
                                                                        <td class="tg-0pky"><a href="<?= base_url('admin/administrasi_penyedia/pdf_hps/' . $value['id_detail_program_penyedia_jasa']) ?>"><?= $value['no_surat_hps'] ?></a></td>
                                                                        <td class="tg-0pky"><?= $value['tgl_surat_hps'] ?></td>
                                                                        <td class="tg-0pky"><a href="<?= base_url('admin/administrasi_penyedia/pdf_nota_dinas/' . $value['id_detail_program_penyedia_jasa']) ?>"><?= $value['no_surat_nota'] ?></a></td>
                                                                        <td class="tg-0pky"><?= $value['tgl_surat_nota'] ?></td>
                                                                        <td class="tg-0pky text-center" style="font-size: 12px;" colspan="2"><a style="font-size: 12px;" href="javascript:;" onclick="Kelola_surat(<?= $value['id_detail_program_penyedia_jasa'] ?>)" class="btn btn-block btn-outline-primary btn-sm" data-toggle="tooltip" title="Kelola Format Surat"><i class="fas fa fa-envelope"></i> </a>
                                                                    </tr>
                                                                    <?php
                                                                    $this->db->select('*');
                                                                    $this->db->from('tbl_sub_detail_program_penyedia_jasa');
                                                                    $this->db->where('tbl_sub_detail_program_penyedia_jasa.id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
                                                                    // $this->db->order_by('display_order', 'ASC');
                                                                    $query_result_sub_detail_program = $this->db->get() ?>
                                                                    <?php
                                                                    $b = 1;
                                                                    foreach ($query_result_sub_detail_program->result_array() as $value_sub_detail_program) { ?>
                                                                        <tr>

                                                                            <td class="tg-0pky" style="font-size: 12px;"></td>
                                                                            <td class="tg-0pky angga bg-white" style="font-size: 12px;border: 1px solid #ccc;"><?= $value_sub_detail_program['nama_program_mata_anggaran'] ?>
                                                                            </td>
                                                                            <td class="tg-0pky" style="font-size: 12px;"><?= "Rp " . number_format($value_sub_detail_program['nilai_program_mata_anggran'], 2, ',', '.') ?></td>
                                                                            <td class="tg-0pky" style="font-size: 12px;"></td>

                                                                            <td class="tg-0pky" style="font-size: 12px;"></td>

                                                                            <td class="tg-0pky" style="font-size: 12px;"></td>
                                                                            <td class="tg-0pky" style="font-size: 12px;"><?= "Rp " . number_format($value_sub_detail_program['nilai_hps'], 2, ',', '.') ?></td>

                                                                            <td class="tg-0pky" style="font-size: 12px;"></td>
                                                                            <td class="tg-0pky" style="font-size: 12px;"></td>
                                                                            <td class="tg-0pky" style="font-size: 12px;"></td>
                                                                            <td class="tg-0pky" style="font-size: 12px;"></td>
                                                                            <td class="tg-0pky" style="font-size: 12px;">
                                                                                <a style="font-size: 12px;" title="Buat Hps" class="btn btn-sm btn-outline-secondary btn-block" href="<?= base_url('admin/administrasi_penyedia/buat_hps/' . $value_sub_detail_program['id_detail_sub_program_penyedia_jasa']) ?>"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                <?php } ?>
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
        </div>
    </section>
    <!-- /.content -->
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="rup" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Rup</h5>
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
                                    Form Rup
                                </h3>
                            </div>
                            <form id="form_tambah_rup">
                                <input type="text" name="id_detail_program_penyedia_jasa">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Nilai Rup</label>
                                            <div class="input-group mb-6">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-clipboard"> </i>
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control" name="nilai_rup" placeholder="Rup">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Jenis Pengadaan</label>
                                            <div class="input-group mb-6">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-clipboard"> </i>
                                                    </span>
                                                </div>
                                                <select name="jenis_pengadaan" class="form-control">
                                                    <option value="Tender Umum"> Tender Umum</option>
                                                    <option value="Tender Terbatas"> Tender Terbatas</option>
                                                    <option value="Jasa Lain"> Jasa Lain</option>
                                                    <option value="Jasa Pemborongan"> Jasa Pemborongan</option>
                                                    <option value="Transaksi Langsung"> Transaksi Langsung</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" onclick="save_rup()" class="btn btn-sm btn-success float-right"><i class="fa fa-paper-plane" aria-hidden="true"></i> Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="kelola_surat" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Kelola Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                <li class="pt-2 px-3">
                                    <h3 class="card-title"><i class="fas fa fa-envelope"></i></h3>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Ijin Prinsip</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Persetujuan Hps</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Nota Dinas</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-two-tabContent">
                                <!-- PIP -->
                                <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-outline card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        Ijin Prinsip
                                                    </h3>
                                                </div>
                                                <form id="form_tambah_pip">
                                                    <input type="hidden" name="id_detail_program_penyedia_jasa">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="">Nomor Surat</label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-clipboard"> </i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="no_surat_pip" placeholder="No Surat">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="">Tanggal Surat</label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-clipboard"> </i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="date" class="form-control" name="tgl_surat_pip" placeholder="tanggal">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="">Lokasi Pekerjaan</label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-clipboard"> </i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="lokasi_pekerjaan_pip" placeholder="Lokasi Pekerjaan">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="">Sasaran Pekerjaan </label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-clipboard"> </i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="sasaran_pekerjaan_pip" placeholder="Sasaran Pekerjaan">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="">Pagu Biaya RKAP </label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-clipboard"> </i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="number" class="form-control" name="biaya_rkap_pip" placeholder="Pagu Biaya RKAP">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="">Perkiraan Biaya </label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-clipboard"> </i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="number" class="form-control" name="perkiraan_biaya_pip" placeholder="Perkiraan Biaya">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="">Waktu Pelaksanaan</label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-clipboard"> </i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="number" class="form-control" name="waktu_pelaksanaan_pip" placeholder="Waktu Pelaksanaan">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="">Waktu Pemeliharaan</label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-clipboard"> </i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="number" class="form-control" name="waktu_pemeliharaan_pip" placeholder="Waktu Pemeliharaan">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="">Pembebanan Biaya</label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-clipboard"> </i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="pembebanan_biaya" placeholder="Pembebanan Biaya">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="">Jenis Pengadaan</label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-clipboard"> </i>
                                                                        </span>
                                                                    </div>
                                                                    <select name="jenis_pengadaan" class="form-control">
                                                                        <option value="Tender Umum"> Tender Umum</option>
                                                                        <option value="Tender Terbatas"> Tender Terbatas</option>
                                                                        <option value="Jasa Lain"> Jasa Lain</option>
                                                                        <option value="Jasa Pemborongan"> Jasa Pemborongan</option>
                                                                        <option value="Transaksi Langsung"> Transaksi Langsung</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="">Format Surat Pengajuan</label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-clipboard"> </i>
                                                                        </span>
                                                                    </div>
                                                                    <select name="format_persetujuan_pip" class="form-control">
                                                                        <option value="Coordinator Area - Operation 2 Gm">Coordinator Area - Operation 2 Gm</option>
                                                                        <option value="Operation 2 Gm - Direktur Operasi"> Operation 2 Gm - Direktur Operasi</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <button type="button" onclick="save_pip()" class="btn btn-sm btn-success float-right"><i class="fa fa-paper-plane" aria-hidden="true"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Hps -->
                                <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-outline card-warning">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        Persetujuan Hps
                                                    </h3>
                                                </div>
                                                <form id="form_tambah_hps">
                                                    <input type="hidden" name="id_detail_program_penyedia_jasa">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="">Nomor Surat</label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-clipboard"> </i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="no_surat_hps" placeholder="No Surat">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="">Tanggal Surat</label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-clipboard"> </i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="date" class="form-control" name="tgl_surat_hps" placeholder="tanggal">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="">Format Surat Pengajuan</label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-clipboard"> </i>
                                                                        </span>
                                                                    </div>
                                                                    <select name="format_persetujuan_hps" class="form-control">
                                                                        <option value="Coordinator Area - Operation 2 Gm">Coordinator Area - Operation 2 Gm</option>
                                                                        <option value="Operation 2 Gm - Direktur Operasi"> Operation 2 Gm - Direktur Operasi</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <button type="button" onclick="save_hps()" class="btn btn-sm btn-success float-right"><i class="fa fa-paper-plane" aria-hidden="true"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Nota Dinas -->
                                <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-outline card-info">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        Nota Dinas
                                                    </h3>
                                                </div>
                                                <form id="form_tambah_nota">
                                                    <input type="hidden" name="id_detail_program_penyedia_jasa">
                                                    <div class="card-body">
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <label for="">Nomor Surat</label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-clipboard"> </i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="no_surat_nota" placeholder="No Surat">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="">Tanggal Surat</label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-clipboard"> </i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="date" class="form-control" name="tgl_surat_nota" placeholder="tanggal">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="">Format Surat Pengajuan</label>
                                                                <div class="input-group mb-6">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-clipboard"> </i>
                                                                        </span>
                                                                    </div>
                                                                    <select name="format_persetujuan_nota" class="form-control">
                                                                        <option value="Operation 2 Gm - Direktur Operasi"> Operation 2 Gm</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <button type="button" onclick="save_nota()" class="btn btn-sm btn-success float-right"><i class="fa fa-paper-plane" aria-hidden="true"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
                                    Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>