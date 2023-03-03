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
                                    <div class="col-md-3">
                                        <img src="<?= base_url('assets/logo.png') ?>" width="250px" alt="">
                                    </div>
                                    <div class="col-md-7 mt-4">
                                        <h6> <i class="fa fa-book"></i> DAFTAR KELENGKAPAN DAN URUTAN PENYUSUNAN
                                            DOKUMEN PENAGIHAN PEMBAYARAN </h6>
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
                                            <div class="card card-outline card-primary col-md-12">
                                                <div class="card-header">
                                                    Note
                                                </div>
                                                <div class="card-body">
                                                    <label for="">
                                                        <center>
                                                            ATURAN UMUM DALAM PROSES PENAGIHAN
                                                            <br><br>
                                                        </center>
                                                        1. Pembayaran Pekerjaan dilakukan secara terpusat melalui Departemen Keuangan PT. JMTM.

                                                        <br> 2. Tata cara pembayaran mengacu pada kontrak kerja yang disepakati oleh para pihak.
                                                        <br>3. Pembayaran akan dilakukan berdasarkan prestasi pekerjaan (perhitungan yang disepakati
                                                        oleh kedua belah pihak).
                                                        <br> 4. Nilai/jumlah pembayaran yang dinyatakan dalam Berita Acara Pemeriksaan Pekerjaan harus
                                                        berdasarkan pemeriksaan pekerjaan yang dilampirkan atau dilengkapi dengan semua
                                                        kelengkapan dokumen (back up data, foto dokumentasi, dan ketentuan-ketentuan lain
                                                        dalam dokumen kontrak) yang terkait dengan proses pembayaran.
                                                        <br> 5. Pada setiap sertifikat pembayaran harus sudah diperhitungkan atau dikurangi dengan halhal sebagai berikut:
                                                        <br> a) Jumlah nilai pembayaran pada sertifikat pembayaran yang terdahulu;
                                                        <br>b) Potongan-potongan lain sebagaimana ditentukan dalam Kontrak dan ketentuan lainnya,
                                                        antara lain kewajiban perpajakan dan denda (bila ada).
                                                        <br> 6. Pelaksanaan pembayaran dilakukan dalam jangka waktu selambat-lambatnya 30 (tiga puluh)
                                                        hari kerja, terhitung sejak sertifikat pembayaran termasuk seluruh administrasi pembayaran
                                                        diterima secara lengkap dan benar oleh Departemen Keuangan PT. JMTM.
                                                        <br> 7. Pada saat pengiriman berkas ke Area, faktur pajak cukup dengan faktur pajak non barcode.
                                                        Pada saat pengiriman berkas ke Departemen Keuangan, faktur pajak sudah harus barcode
                                                    </label>
                                                </div>
                                            </div>
                                            <br>
                                            <table class="table table-striped table-bordered">
                                                <thead class="text-center">
                                                    <tr class="bg-primary">
                                                        <th>No</th>
                                                        <th>Nama Format</th>
                                                        <th>Keterangan Dokumen</th>
                                                        <th style="width:250px">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Checklist</td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Nota Dinas Permohonan Pembayaran</td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Sertifikat Pembayaran</td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Surat Permohonan Pembayaran</td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Kwitansi Pembayaran</td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Faktur Pajak dan E-NOFA</td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>Surat Permohonan Pemeriksaan Pekerjaan dan Serah Terima Pekerjaan</td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>8</td>
                                                        <td>Berita Acara Pemeriksaan Pekerjaan</td>
                                                        <td></td>
                                                        <td><a href="javascript:;" onclick="Bapp(<?= $row_program_kontrak_detail['id_detail_program_penyedia_jasa'] ?>)" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>9</td>
                                                        <td>Acara Serah Terima Pekerjaan/BA PHO</td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>10</td>
                                                        <td>BA Progress Fisik 100%</td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>11</td>
                                                        <td>Monthly Certificate</td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>12</td>
                                                        <td>Referensi Bank </td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>13</td>
                                                        <td>KTP</td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>14</td>
                                                        <td>NPWP</td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>15</td>
                                                        <td>Surat Pengukuhan Pengusahan Kena Pajak (Copy)</td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>16</td>
                                                        <td>SBU dan SIUJK / SIUP</td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>17</td>
                                                        <td>Kontrak Jasa Pemborongan</td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>18</td>
                                                        <td>Addendum</td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>19</td>
                                                        <td>SPMK</td>
                                                        <td></td>
                                                        <td><a href="" class="btn btn-block btn-sm btn-outline-primary"><i class="fas fa fa-database"></i> Keloa Format Dokumen</a></td>
                                                    </tr>
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
                    <!-- MODAL BAPP NO 8 -->
                    <div class="modal fade" id="modal_bapp" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title">KELOLA FORMAT BERITA ACARA PEMERIKSAAN PEKERJAAN</h5>
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
                                                        <h3 class="card-title"><i class="fas fa fa-database"></i></h3>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Form BAPP</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?= base_url('administrasi_kontrak/administrasi_kontrak/view_dokumen_8/') . $row_program_kontrak_detail['id_detail_program_penyedia_jasa'] ?>">View Format</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content" id="custom-tabs-two-tabContent">
                                                    <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                                        <form id="form_bapp" action="javascript:;">
                                                            <div class="col-md-12">
                                                                <div class="card card-outline card-primary">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">
                                                                            Nomor Surat BAPP
                                                                        </h3>
                                                                    </div>
                                                                    <input type="hidden" name="id_detail_program_penyedia_jasa">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label for="">Nomor</label>
                                                                                <div class="input-group mb-6">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                            <i class="far fa-user"> </i>
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control" name="nomor_bapp" placeholder="Nomor">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="">Tanggal </label>
                                                                                <div class="input-group mb-6">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                            <i class="far fa-calendar"> </i>
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="date" class="form-control" name="tanggal_bapp" placeholder="tanggal">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="card card-outline card-primary">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">
                                                                            Kontrak Pekerjaan
                                                                        </h3>
                                                                    </div>
                                                                    <input type="hidden" name="id_detail_program_penyedia_jasa">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label for="">Nomor</label>
                                                                                <div class="input-group mb-6">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                            <i class="far fa-user"> </i>
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control" name="no_pekerjaan_bapp" placeholder="Nomor">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="">Tanggal </label>
                                                                                <div class="input-group mb-6">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                            <i class="far fa-calendar"> </i>
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="date" class="form-control" name="tanggal_pekerjaan_bapp" placeholder="Nomor">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="card card-outline card-primary">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">
                                                                            Surat Perintah Mulai Kerja
                                                                        </h3>
                                                                    </div>
                                                                    <input type="hidden" name="id_detail_program_penyedia_jasa">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label for="">Nomor</label>
                                                                                <div class="input-group mb-6">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                            <i class="far fa-user"> </i>
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control" name="no_pekerjaan_spmk" placeholder="Nomor">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="">Tanggal </label>
                                                                                <div class="input-group mb-6">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                            <i class="far fa-calendar"> </i>
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="date" class="form-control" name="tanggal_pekerjaan_spmk" placeholder="Nomor">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="card card-outline card-primary">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">
                                                                            Permohonan Pemeriksaan Pekerjaan dari Pihak Kedua
                                                                        </h3>
                                                                    </div>
                                                                    <input type="hidden" name="id_detail_program_penyedia_jasa">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label for="">Nomor</label>
                                                                                <div class="input-group mb-6">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                            <i class="far fa-user"> </i>
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="text" class="form-control" name="no_pekerjaan_ppp_pihak_kedua" placeholder="Nomor">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="">Tanggal </label>
                                                                                <div class="input-group mb-6">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">
                                                                                            <i class="far fa-calendar"> </i>
                                                                                        </span>
                                                                                    </div>
                                                                                    <input type="date" class="form-control" name="tanggal_pekerjaan_ppp_pihak_kedua" placeholder="Nomor">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" onclick="simpan_bapp(<?= $row_program_kontrak_detail['id_detail_program_penyedia_jasa'] ?>)" class="btn btn-sm btn-success float-right"><i class="fa fa-paper-plane" aria-hidden="true"></i> Simpan</button>
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