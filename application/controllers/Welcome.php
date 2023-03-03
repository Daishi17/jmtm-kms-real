<div class="preloader">
    <div class="loading">
        <img src="<?= base_url('assets/img/palsewait.gif') ?>" width="100%">
    </div>
</div>

<?php if ($paket_di_ikuti['id_kualifikasi'] == 6 || $paket_di_ikuti['id_kualifikasi'] == 4 || $paket_di_ikuti['id_kualifikasi'] == 10) { ?>
    <!-- INI UNTUK PRAKUALIFKIKASI 2 FILE -->
    <div id="main" class="container">
        <div class="breadcrumb bg-primary" style="margin-top: 20px; color: white;"><a href="<?= base_url('beranda') ?>" style="color: white;">Beranda</a>&ensp;&raquo;&ensp;Informasi Tender</div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="active">
                <a class="nav-link active bg-primary text-white" id="tender-tab" data-toggle="tab" href="<?= base_url('beranda/informasi_tender/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Informasi Tender</a>
            </li>
            <li class="nav-item">
                <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/penjelasan_lelang/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Penjelasan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/sanggahan_tender/' . $paket_di_ikuti['id_paket']) ?>">Sangahan Prakualifikasi</a>
            </li>
            <?php if ($get_pemenang['nilai_pringkat_teknis'] == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/negosiasi/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Negosiasi</a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/sanggahan_tender_akhir/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Sanggahan Tender</a>
            </li>
            <?php if ($get_pemenang['pemenang_tender'] == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/mengundurkan_diri/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Mengundurkan Diri</a>
                </li>
            <?php } ?>
        </ul>

        <div class="tab-content">
            <!-- tender -->
            <div class="tab-pane active" id="informasi-tender" role="tabpanel" aria-labelledby="tender-tab">
                <?= $this->session->flashdata('error') ?>
                <div style="overflow-x:auto">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="background-color: bisque; width:250px">Kode Tender</th>
                                <td><b><?= $paket_di_ikuti['kode_tender'] ?></b></td>
                            </tr>
                            <tr>
                                <th style="background-color: bisque; width:150px">Nama Tender</th>
                                <td>
                                    <b>
                                        <?= $paket_di_ikuti['nama_paket'] ?>
                                    </b>
                                </td>
                            </tr>
                            <tr>
                                <th style="background-color: bisque; width:250px">Tahap Tender</th>
                                <td>
                                    <a href="javascipt:;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_lihat_tahap"><img src="<?= base_url('assets/img/icon-jadwal.png') ?>" width="25px" alt=""> Lihat Tahap Tender Saat Ini</a>
                                </td>
                            </tr>
                            <tr>
                                <th style="background-color: bisque; width:180px">Jumlah Peserta</th>
                                <td> <a href="javascript:;" onclick="lihat_vendor_mengikuti(<?= $paket_di_ikuti['id_paket'] ?>)" class="btn btn-sm btn-primary"> <b><?= $jumlah_peserta ?> Peserta</b></a></td>
                            </tr>
                            <tr>
                                <th style="background-color: bisque;">Dokumen Lelang</th>
                                <td>
                                    <div class="row">
                                        <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                        <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
                                            <?php if ($cek_gugur['nilai_prakualifikasi'] == 0 || $cek_gugur['status_evaluasi_syarat_tambahan'] == 0) { ?>

                                            <?php } else { ?>
                                                <div class="col-md-6">
                                                    <div class=" card border-primary mb-3">
                                                        <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Lelang
                                                        </div>
                                                        <div class="card-body">
                                                            <table class="table table table-striped">
                                                                <?php foreach ($get_pdf_dokumen_kualifikasi_lelang as $key => $value) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <a target="_blank" href="https://eproc.jmtm.co.id/file_dokumen_lelang/<?= $value['file_dokumen_lelang'] ?>"><?= $value['nama_dokumen_lelang'] ?><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4"></a>
                                                                        </td>
                                                                        <td><label for="" class="ml-3"> Di Kirim : <?= $value['create_file_lelang'] ?></label></td>
                                                                    </tr>
                                                                <?php    } ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php    } else { ?>
                                            <?php if ($cek_gugur['nilai_prakualifikasi'] == 0 || $cek_gugur['status_evaluasi_syarat_tambahan'] == 0) { ?>

                                            <?php } else { ?>
                                                <div class="col-md-6">
                                                    <div class=" card border-primary mb-3">
                                                        <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Lelang
                                                        </div>
                                                        <div class="card-body">
                                                            <table class="table table table-striped">
                                                                <?php foreach ($get_pdf_dokumen_kualifikasi_lelang as $key => $value) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <a target="_blank" href="https://eproc.jmtm.co.id/file_dokumen_lelang/<?= $value['file_dokumen_lelang'] ?>"><?= $value['nama_dokumen_lelang'] ?><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4"></a>
                                                                        </td>
                                                                        <td><label for="" class="ml-3"> Di Kirim : <?= $value['create_file_lelang'] ?></label></td>
                                                                    </tr>
                                                                <?php    } ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                        <?php    } ?>
                                        <div class="col-md-6">
                                            <div class=" card border-primary mb-3">
                                                <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Prakualifikasi
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table table-striped">
                                                        <?php foreach ($get_pdf_dokumen_kualifikasi as $key => $value) { ?>
                                                            <tr>
                                                                <td>
                                                                    <a target="_blank" href="https://eproc.jmtm.co.id/dokumen_file_dokumen_kualifikasi_pdf/<?= $value['file_dokumen_kualifikasi_pdf'] ?>"><?= $value['nama_dokumen_kualifikasi_pdf'] ?><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4"></a>
                                                                </td>
                                                                <td><label for="" class="ml-3"> Di Kirim : <?= $value['create_at'] ?></label></td>
                                                            </tr>
                                                        <?php    } ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                    <?php    } else if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
                                        <div class="card border-primary mb-3">
                                            <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                Persyaratan Tambahan
                                            </div>
                                            <div class="card-body">
                                                <table class="table">
                                                    <tr>
                                                        <th>Nama Persyaratan</th>
                                                        <th>Keterangan</th>
                                                        <th>File</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    <?php foreach ($persyaratan_tambahan as $key => $value) { ?>
                                                        <tr>
                                                            <input type="hidden" value="<?= $value['nama_persyaratan'] ?>" name="nama_persyaratan_tambahan">
                                                            <td><?= $value['nama_persyaratan'] ?></td>
                                                            <input type="hidden" value="<?= $value['keterangan'] ?>">
                                                            <td><?= $value['keterangan'] ?></td>
                                                            <td>
                                                                <?php
                                                                if ($value['file_persyaratan_tambahan'] == NULL) { ?>
                                                                    <p>Tidak ada File</p>
                                                                <?php } else { ?>
                                                                    <a target="_blank" href="https://eproc.jmtm.co.id/file_persyaratan_tambahan/<?= $value['file_persyaratan_tambahan'] ?>"> <img src="<?= base_url('assets/img/file-icon.png') ?>" style="width: 30px;" alt=""></a>

                                                                <?php } ?>
                                                            </td>
                                                            <?php if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                            <?php    } else if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
                                                                <td>
                                                                    <a href="javascript:;" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#modalPersyaratanTambahan<?= $value['id_persyaratan_tender'] ?>"><i style="color: white;" class="fas fa-download"></i> UPLOAD</a>
                                                                </td>
                                                            <?php    } else { ?>
                                                                <td>
                                                                    <label class="badge badge-success"> <i class="fas fa fa-check"></i> Tahap Sudah Selesai </label>
                                                                </td>
                                                            <?php    } ?>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card border-primary mb-3">
                                            <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                File Yang Sudah Di Upload <div class="text-default"><i class="fa fa-check"></i></div>
                                            </div>
                                            <div class="card-body">
                                                <table class="table">
                                                    <tr>
                                                        <th>Nama Persyaratan</th>
                                                        <th>Keterangan</th>
                                                        <th>File</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    <?php foreach ($uploaded_file as $key => $value) { ?>
                                                        <tr>
                                                            <input type="hidden" value="<?= $value['nama_persyaratan_tambahan'] ?>" name="nama_persyaratan_tambahan">
                                                            <td><?= $value['nama_persyaratan_tambahan'] ?></td>
                                                            <input type="hidden" value="<?= $value['keterangan_persyaratan_tambahan'] ?>">
                                                            <td><?= $value['keterangan_persyaratan_tambahan'] ?></td>
                                                            <td>
                                                                <a target="_blank" href="<?= base_url() ?>file_persyaratan_tambahan/<?= $value['file_persyaratan_tambahan'] ?>"> <img src="<?= base_url('assets/img/file-icon.png') ?>" style="width: 20px;" alt=""></a>
                                                            </td>
                                                            <td> <?php if ($value['status_lengkap'] == 'tidak lulus') { ?>
                                                                    <a href="javascript:;" onclick="lihat_alasan_tidak_lulus_dokumen(<?= $value['id_paket'] ?>)" id="lihat_alasan_tidak_lulus_dokumen" class="badge badge-danger">Syarat Blom Terpenuhi / Lihat Alasan</a>
                                                                <?php } else if ($value['status_lengkap'] == 'lulus') { ?>
                                                                    <label for="" class="badge badge-success">Syarat Dokumen Sudah Terpenuhi</label>
                                                                <?php } else { ?>
                                                                    <label for="" class="badge badge-warning">Belum Diperiksa</label>
                                                                <?php } ?>
                                                            </td>
                                                            <?php if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

                                                            <?php    } else if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                                <td>
                                                                    <a href="<?= base_url('beranda/hapus_uploaded_file/' . $value['id_persyaratan_tambahan']) ?>/<?= $paket_di_ikuti['id_paket'] ?>">
                                                                        <div class="text-danger"><i class="fa fa-trash-alt"></i></div>
                                                                    </a>
                                                                </td>
                                                            <?php    } else { ?>
                                                                <td>
                                                                    <label class="badge badge-success"> <i class="fas fa fa-check"></i> Tahap Sudah Selesai </label>
                                                                </td>
                                                            <?php    } ?>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- update 30 juni 20222 -->
                                        <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                        <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                            <?php if ($paket_di_ikuti['sts_peralatan'] == '1') { ?>
                                                <div class="card border-primary mb-3">
                                                    <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                        <!-- Button trigger modal -->

                                                        <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                        <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_peralatan">
                                                                <i class="fa fa-plus"></i> Tambah Peralatan
                                                            </button>
                                                        <?php    } else { ?>
                                                            <button type="button" class="btn btn-danger btn-sm">
                                                                Tahap Sudah Selesai
                                                            </button>
                                                        <?php    } ?>
                                                    </div>
                                                    <div class="card-body">
                                                        <div style="overflow-x: true;">
                                                            <table class="table" id="tbl_peralatan_tender">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="font-size: 12px;" rowspan="2">No</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jenis Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Merk Dan Tipe</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jumlah Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Kapasitas Produksi</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Tahun Pembuatan Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Volume dan Satuan</th>
                                                                        <th>Status Kepemilikan Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Data Dukung Kepemilkan Alat</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Lokasi Alat Saat ini</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jarak Lokasi Alat Ke Lokasi Pekerjaan (KM)</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Bukti Kepemilikan Alat</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Aksi </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="font-size: 12px;">Milik Sendiri/Sewa</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php    } ?>
                                            <?php if ($paket_di_ikuti['sts_tenaga_ahli'] == '1') { ?>
                                                <div class="card border-primary mb-3">
                                                    <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                        <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                        <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                            <a href="#" data-toggle="modal" data-target="#tambah_tenaga_ahli_tender_modal" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Tenaga Ahli</a>
                                                        <?php    } else { ?>
                                                            <button type="button" class="btn btn-danger btn-sm">
                                                                Tahap Sudah Selesai
                                                            </button>
                                                        <?php    } ?>
                                                    </div>

                                                    <div class="card-body">
                                                        <table class="table" id="tbl_tenaga_ahli_tender">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2">No</th>
                                                                    <th rowspan="2">Nama Lengkap dengan Gelar</th>
                                                                    <th rowspan="2">Rencana Jabatan dalam Pekerjaan Ini</th>
                                                                    <th>Kelahiran</th>
                                                                    <th colspan="3">Pendidikan Formal</th>
                                                                    <th colspan="3">Sertifikasi Keahlian</th>
                                                                    <th colspan="2">Pengalaman</th>
                                                                    <th rowspan="2">Aksi</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tgl/Bln/Thn</th>
                                                                    <th>Program Studi</th>
                                                                    <th>Perguruan Tinggi/Sekolah</th>
                                                                    <th>Tahun Lulus</th>
                                                                    <th>Asosiasi (BSA)</th>
                                                                    <th>Kualifikasi Keahlian</th>
                                                                    <th>Tanggal masa berlaku</th>
                                                                    <th>Jumlah Tahun</th>
                                                                    <th>Jabatan Terakhir</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php }  ?>
                                        <?php } else { ?>
                                            <?php if ($paket_di_ikuti['sts_peralatan'] == '1') { ?>
                                                <div class="card border-primary mb-3">
                                                    <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                        <!-- Button trigger modal -->

                                                        <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                        <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_peralatan">
                                                                <i class="fa fa-plus"></i> Tambah Peralatan
                                                            </button>
                                                        <?php    } else { ?>
                                                            <button type="button" class="btn btn-danger btn-sm">
                                                                Tahap Sudah Selesai
                                                            </button>
                                                        <?php    } ?>
                                                    </div>
                                                    <div class="card-body">
                                                        <div style="overflow-x: true;">
                                                            <table class="table" id="tbl_peralatan_tender">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="font-size: 12px;" rowspan="2">No</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jenis Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Merk Dan Tipe</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jumlah Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Kapasitas Produksi</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Tahun Pembuatan Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Volume dan Satuan</th>
                                                                        <th>Status Kepemilikan Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Data Dukung Kepemilkan Alat</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Lokasi Alat Saat ini</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jarak Lokasi Alat Ke Lokasi Pekerjaan (KM)</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Bukti Kepemilikan Alat</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Aksi </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="font-size: 12px;">Milik Sendiri/Sewa</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php    } ?>

                                            <?php if ($paket_di_ikuti['sts_tenaga_ahli'] == '1') { ?>
                                                <div class="card border-primary mb-3">
                                                    <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                        <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                        <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                            <a href="#" data-toggle="modal" data-target="#tambah_tenaga_ahli_tender_modal" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Tenaga Ahli</a>
                                                        <?php    } else { ?>
                                                            <button type="button" class="btn btn-danger btn-sm">
                                                                Tahap Sudah Selesai
                                                            </button>
                                                        <?php    } ?>
                                                    </div>

                                                    <div class="card-body">
                                                        <table class="table" id="tbl_tenaga_ahli_tender">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2">No</th>
                                                                    <th rowspan="2">Nama Lengkap dengan Gelar</th>
                                                                    <th rowspan="2">Rencana Jabatan dalam Pekerjaan Ini</th>
                                                                    <th>Kelahiran</th>
                                                                    <th colspan="3">Pendidikan Formal</th>
                                                                    <th colspan="3">Sertifikasi Keahlian</th>
                                                                    <th colspan="2">Pengalaman</th>
                                                                    <th rowspan="2">Aksi</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tgl/Bln/Thn</th>
                                                                    <th>Program Studi</th>
                                                                    <th>Perguruan Tinggi/Sekolah</th>
                                                                    <th>Tahun Lulus</th>
                                                                    <th>Asosiasi (BSA)</th>
                                                                    <th>Kualifikasi Keahlian</th>
                                                                    <th>Tanggal masa berlaku</th>
                                                                    <th>Jumlah Tahun</th>
                                                                    <th>Jabatan Terakhir</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php }  ?>
                                        <?php } ?>


                                        <!-- end update 30 juni 20222 -->
                                    <?php    } else { ?>
                                        <div class="card border-primary mb-3">
                                            <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                Persyaratan Tambahan
                                            </div>
                                            <div class="card-body">
                                                <table class="table">
                                                    <tr>
                                                        <th>Nama Persyaratan</th>
                                                        <th>Keterangan</th>
                                                        <th>File</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    <?php foreach ($persyaratan_tambahan as $key => $value) { ?>
                                                        <tr>
                                                            <input type="hidden" value="<?= $value['nama_persyaratan'] ?>" name="nama_persyaratan_tambahan">
                                                            <td><?= $value['nama_persyaratan'] ?></td>
                                                            <input type="hidden" value="<?= $value['keterangan'] ?>">
                                                            <td><?= $value['keterangan'] ?></td>
                                                            <td>
                                                                <?php
                                                                if ($value['file_persyaratan_tambahan'] == NULL) { ?>
                                                                    <p>Tidak ada File</p>
                                                                <?php } else { ?>
                                                                    <a target="_blank" href="https://eproc.jmtm.co.id/file_persyaratan_tambahan/<?= $value['file_persyaratan_tambahan'] ?>"> <img src="<?= base_url('assets/img/file-icon.png') ?>" style="width: 30px;" alt=""></a>

                                                                <?php } ?>
                                                            </td>
                                                            <?php if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                            <?php    } else if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                                <td>
                                                                    <a href="javascript:;" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#modalPersyaratanTambahan<?= $value['id_persyaratan_tender'] ?>"><i style="color: white;" class="fas fa-download"></i> UPLOAD</a>
                                                                </td>
                                                            <?php    } else { ?>
                                                                <td>
                                                                    <label class="badge badge-success"> <i class="fas fa fa-check"></i> Tahap Sudah Selesai </label>
                                                                </td>
                                                            <?php    } ?>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card border-primary mb-3">
                                            <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                File Yang Sudah Di Upload <div class="text-default"><i class="fa fa-check"></i></div>
                                            </div>
                                            <div class="card-body">
                                                <table class="table">
                                                    <tr>
                                                        <th>Nama Persyaratan</th>
                                                        <th>Keterangan</th>
                                                        <th>File</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    <?php foreach ($uploaded_file as $key => $value) { ?>
                                                        <tr>
                                                            <input type="hidden" value="<?= $value['nama_persyaratan_tambahan'] ?>" name="nama_persyaratan_tambahan">
                                                            <td><?= $value['nama_persyaratan_tambahan'] ?></td>
                                                            <input type="hidden" value="<?= $value['keterangan_persyaratan_tambahan'] ?>">
                                                            <td><?= $value['keterangan_persyaratan_tambahan'] ?></td>
                                                            <td>
                                                                <a target="_blank" href="<?= base_url() ?>file_persyaratan_tambahan/<?= $value['file_persyaratan_tambahan'] ?>"> <img src="<?= base_url('assets/img/file-icon.png') ?>" style="width: 20px;" alt=""></a>
                                                            </td>
                                                            <td> <?php if ($value['status_lengkap'] == 'tidak lulus') { ?>
                                                                    <a href="javascript:;" onclick="lihat_alasan_tidak_lulus_dokumen(<?= $value['id_paket'] ?>)" id="lihat_alasan_tidak_lulus_dokumen" class="badge badge-danger">Syarat Blom Terpenuhi / Lihat Alasan</a>
                                                                <?php } else if ($value['status_lengkap'] == 'lulus') { ?>
                                                                    <label for="" class="badge badge-success">Syarat Dokumen Sudah Terpenuhi</label>
                                                                <?php } else { ?>
                                                                    <label for="" class="badge badge-warning">Belum Diperiksa</label>
                                                                <?php } ?>
                                                            </td>
                                                            <?php if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                            <?php    } else if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
                                                                <td>
                                                                    <a href="<?= base_url('beranda/hapus_uploaded_file/' . $value['id_persyaratan_tambahan']) ?>/<?= $paket_di_ikuti['id_paket'] ?>">
                                                                        <div class="text-danger"><i class="fa fa-trash-alt"></i></div>
                                                                    </a>
                                                                </td>
                                                            <?php    } else { ?>
                                                                <td>
                                                                    <label class="badge badge-success"> <i class="fas fa fa-check"></i> Tahap Sudah Selesai </label>
                                                                </td>
                                                            <?php    } ?>

                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- update 30 juni 20222 -->
                                        <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                        <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                            <?php if ($paket_di_ikuti['sts_peralatan'] == '1') { ?>
                                                <div class="card border-primary mb-3">
                                                    <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                        <!-- Button trigger modal -->

                                                        <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                        <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_peralatan">
                                                                <i class="fa fa-plus"></i> Tambah Peralatan
                                                            </button>
                                                        <?php    } else { ?>
                                                            <button type="button" class="btn btn-danger btn-sm">
                                                                Tahap Sudah Selesai
                                                            </button>
                                                        <?php    } ?>
                                                    </div>
                                                    <div class="card-body">
                                                        <div style="overflow-x: true;">
                                                            <table class="table" id="tbl_peralatan_tender">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="font-size: 12px;" rowspan="2">No</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jenis Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Merk Dan Tipe</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jumlah Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Kapasitas Produksi</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Tahun Pembuatan Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Volume dan Satuan</th>
                                                                        <th>Status Kepemilikan Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Data Dukung Kepemilkan Alat</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Lokasi Alat Saat ini</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jarak Lokasi Alat Ke Lokasi Pekerjaan (KM)</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Bukti Kepemilikan Alat</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Aksi </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="font-size: 12px;">Milik Sendiri/Sewa</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php    } ?>
                                            <?php if ($paket_di_ikuti['sts_tenaga_ahli'] == '1') { ?>
                                                <div class="card border-primary mb-3">
                                                    <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                        <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                        <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                            <a href="#" data-toggle="modal" data-target="#tambah_tenaga_ahli_tender_modal" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Tenaga Ahli</a>
                                                        <?php    } else { ?>
                                                            <button type="button" class="btn btn-danger btn-sm">
                                                                Tahap Sudah Selesai
                                                            </button>
                                                        <?php    } ?>
                                                    </div>

                                                    <div class="card-body">
                                                        <table class="table" id="tbl_tenaga_ahli_tender">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2">No</th>
                                                                    <th rowspan="2">Nama Lengkap dengan Gelar</th>
                                                                    <th rowspan="2">Rencana Jabatan dalam Pekerjaan Ini</th>
                                                                    <th>Kelahiran</th>
                                                                    <th colspan="3">Pendidikan Formal</th>
                                                                    <th colspan="3">Sertifikasi Keahlian</th>
                                                                    <th colspan="2">Pengalaman</th>
                                                                    <th rowspan="2">Aksi</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tgl/Bln/Thn</th>
                                                                    <th>Program Studi</th>
                                                                    <th>Perguruan Tinggi/Sekolah</th>
                                                                    <th>Tahun Lulus</th>
                                                                    <th>Asosiasi (BSA)</th>
                                                                    <th>Kualifikasi Keahlian</th>
                                                                    <th>Tanggal masa berlaku</th>
                                                                    <th>Jumlah Tahun</th>
                                                                    <th>Jabatan Terakhir</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php }  ?>
                                        <?php } else { ?>
                                            <?php if ($paket_di_ikuti['sts_peralatan'] == '1') { ?>
                                                <div class="card border-primary mb-3">
                                                    <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                        <!-- Button trigger modal -->

                                                        <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                        <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_peralatan">
                                                                <i class="fa fa-plus"></i> Tambah Peralatan
                                                            </button>
                                                        <?php    } else { ?>
                                                            <button type="button" class="btn btn-danger btn-sm">
                                                                Tahap Sudah Selesai
                                                            </button>
                                                        <?php    } ?>
                                                    </div>
                                                    <div class="card-body">
                                                        <div style="overflow-x: true;">
                                                            <table class="table" id="tbl_peralatan_tender">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="font-size: 12px;" rowspan="2">No</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jenis Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Merk Dan Tipe</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jumlah Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Kapasitas Produksi</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Tahun Pembuatan Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Volume dan Satuan</th>
                                                                        <th>Status Kepemilikan Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Data Dukung Kepemilkan Alat</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Lokasi Alat Saat ini</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jarak Lokasi Alat Ke Lokasi Pekerjaan (KM)</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Bukti Kepemilikan Alat</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Aksi </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="font-size: 12px;">Milik Sendiri/Sewa</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php    } ?>

                                            <?php if ($paket_di_ikuti['sts_tenaga_ahli'] == '1') { ?>
                                                <div class="card border-primary mb-3">
                                                    <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                        <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                        <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                            <a href="#" data-toggle="modal" data-target="#tambah_tenaga_ahli_tender_modal" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Tenaga Ahli</a>
                                                        <?php    } else { ?>
                                                            <button type="button" class="btn btn-danger btn-sm">
                                                                Tahap Sudah Selesai
                                                            </button>
                                                        <?php    } ?>
                                                    </div>

                                                    <div class="card-body">
                                                        <table class="table" id="tbl_tenaga_ahli_tender">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2">No</th>
                                                                    <th rowspan="2">Nama Lengkap dengan Gelar</th>
                                                                    <th rowspan="2">Rencana Jabatan dalam Pekerjaan Ini</th>
                                                                    <th>Kelahiran</th>
                                                                    <th colspan="3">Pendidikan Formal</th>
                                                                    <th colspan="3">Sertifikasi Keahlian</th>
                                                                    <th colspan="2">Pengalaman</th>
                                                                    <th rowspan="2">Aksi</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tgl/Bln/Thn</th>
                                                                    <th>Program Studi</th>
                                                                    <th>Perguruan Tinggi/Sekolah</th>
                                                                    <th>Tahun Lulus</th>
                                                                    <th>Asosiasi (BSA)</th>
                                                                    <th>Kualifikasi Keahlian</th>
                                                                    <th>Tanggal masa berlaku</th>
                                                                    <th>Jumlah Tahun</th>
                                                                    <th>Jabatan Terakhir</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php }  ?>
                                        <?php } ?>

                                        <!-- end update 30 juni 20222 -->
                                    <?php    } ?>
                                </td>

                            </tr>
                            <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                <tr>
                                    <th style="background-color: bisque;">Penawaran Anda</th>
                                    <?php if ($cek_gugur['nilai_prakualifikasi'] == 0 || $cek_gugur['status_evaluasi_syarat_tambahan'] == 0) { ?>
                                        <td><a class="btn btn-danger text-white">Maaf Anda Telah Gugur Dalam Tender Ini!!!</a></td>
                                    <?php } else { ?>
                                        <td>
                                            <p class="text-danger">Dokumen Kualifikasi Sudah Dikirim Saat Pendaftaran Penyedia</p>
                                            <div class="card">
                                                <div class="card-header">
                                                    <label for="">Data Penawaran & Teknis,Administrasi</label>
                                                </div>
                                                <div class="card-body">
                                                    <?php if ($status_kirim_data_enkrip == null) { ?>
                                                        <a href="javascript:;" class="badge badge-secondary float-right" style="font-size: small;">Status: Belum Dikirim</a>
                                                        <a href="<?= base_url('upload_dokumen') ?>" class="badge badge-secondary" style="color: white;">Kirim Dokumen Penawaran & Teknis <i class="fa fa-upload"></i></a>
                                                    <?php    } else { ?>
                                                        <?php foreach ($status_kirim_data_enkrip as $key => $value) { ?>
                                                            <table id="table_krim_data">
                                                                <a href="javascript:;" onclick="byid_status_kirim_data_penawaran(<?= $value['id_kirim_status_penawaran'] ?>)" class="badge badge-danger" style="font-size: small; margin-right:10px">Revisi</a>
                                                                <a href="javascript:;" class="badge badge-info" style="font-size: small;">Status: Sudah dikirim Pada <?= date('d-m-Y H:i', strtotime($value['waktu_kirim']))  ?></a> <i class="fas fa fa-check text-success ml-2"></i>
                                                            </table>
                                                        <?php    } ?>
                                                    <?php    } ?>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $paket_di_ikuti['token_vendor'] ?>" readonly style="margin-top: 10px;">
                                            <div class="bs-callout bs-callout-info">
                                                Silahkan Copy Paste Token Untuk Upload Dokumen
                                            </div>

                                        </td>
                                    <?php } ?>

                                </tr>


                            <?php    } else { ?>
                                <tr>
                                    <th style="background-color: bisque;">Penawaran Anda</th>
                                    <?php if ($cek_gugur['nilai_prakualifikasi'] == 0 || $cek_gugur['status_evaluasi_syarat_tambahan'] == 0) { ?>
                                        <td><a class="btn btn-danger text-white">Maaf Anda Telah Gugur Dalam Tender Ini!!!</a></td>
                                    <?php } else { ?>
                                        <td>
                                            <p class="text-danger">Dokumen Kualifikasi Sudah Dikirim Saat Pendaftaran Penyedia</p>
                                            <div class="card">
                                                <div class="card-header">
                                                    <label for="">Data Penawaran & Teknis,Administrasi</label>
                                                </div>
                                                <div class="card-body">
                                                    <?php if ($status_kirim_data_enkrip == null) { ?>
                                                        <a href="javascript:;" class="badge badge-secondary float-right" style="font-size: small;">Status: Belum Dikirim</a>
                                                        <a href="javascript:;" class="badge badge-danger" style="font-size: small; margin-right:10px">Waktu Sudah Habis</a>
                                                    <?php    } else { ?>
                                                        <?php foreach ($status_kirim_data_enkrip as $key => $value) { ?>
                                                            <table id="table_krim_data">
                                                                <a href="javascript:;" class="badge badge-danger" style="font-size: small; margin-right:10px">Waktu Sudah Habis</a>
                                                                <a href="javascript:;" class="badge badge-info" style="font-size: small;">Status: Sudah dikirim Pada <?= date('d-m-Y H:i', strtotime($value['waktu_kirim']))  ?></a> <i class="fas fa fa-check text-success ml-2"></i>
                                                            </table>
                                                        <?php    } ?>
                                                    <?php    } ?>
                                                </div>
                                            </div>
                                            <!-- <input type="text" class="form-control" value="<?= $paket_di_ikuti['token_vendor'] ?>" readonly style="margin-top: 10px;">
													<div class="bs-callout bs-callout-info">
														Silahkan Copy Paste Token Untuk Upload Dokumen
													</div> -->

                                        </td>
                                    <?php } ?>

                                </tr>

                            <?php    } ?>

                            <?php if (date('Y-m-d H:i', strtotime($Pembuktian_Kualifikasi2_file['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($Pembuktian_Kualifikasi2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($Pembuktian_Kualifikasi2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                <tr>
                                    <th style="background-color: bisque; width:180px">Undangan Pembuktian</th>
                                    <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_undangan_pembuktian'] ?>"><i class="fas fa-download"></i> Buka Undangan Pembuktian Kualifikasi Peserta</a><b></b></td>
                                </tr>

                            <?php    } else { ?>
                                <tr>
                                    <th style="background-color: bisque; width:180px">Undangan Pembuktian</th>
                                    <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_undangan_pembuktian'] ?>"><i class="fas fa-download"></i> Buka Undangan Pembuktian Kualifikasi Peserta</a><b></b></td>
                                </tr>

                            <?php    } ?>

                            <?php if (date('Y-m-d H:i', strtotime($pengumuman_hasil_prakualfikasi_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($pengumuman_hasil_prakualfikasi_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($pengumuman_hasil_prakualfikasi_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                <tr>
                                    <th style="background-color: bisque; width:180px">Pengumuman Hasil Prakualifikasi</th>
                                    <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_pengumuman_prakualifikasi/<?= $paket_di_ikuti['dokumen_pengumuman_hasil_prakualifikasi'] ?>"><i class="fas fa-download"></i> Buka Pengumuman Hasil Prakualifikasi Peserta</a><b></b></td>
                                </tr>
                            <?php    } else { ?>
                                <tr>
                                    <th style="background-color: bisque; width:180px">Pengumuman Hasil Prakualifikasi</th>
                                    <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_pengumuman_prakualifikasi/<?= $paket_di_ikuti['dokumen_pengumuman_hasil_prakualifikasi'] ?>"><i class="fas fa-download"></i> Buka Pengumuman Hasil Prakualifikasi Peserta</a><b></b></td>
                                </tr>
                            <?php    } ?>


                            <!-- 8 september -->
                            <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                <tr>
                                    <th style="background-color: bisque; width:180px">Undangan Penawaran</th>
                                    <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_penawaran/<?= $paket_di_ikuti['undangan_penawaran'] ?>"><i class="fas fa-download"></i> Buka Undangan Penawaran Peserta</a><b></b></td>
                                </tr>
                            <?php    } else { ?>
                                <tr>
                                    <th style="background-color: bisque; width:180px">Undangan Penawaran</th>
                                    <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_penawaran/<?= $paket_di_ikuti['undangan_penawaran'] ?>"><i class="fas fa-download"></i> Buka Undangan Penawaran Peserta</a><b></b></td>
                                </tr>
                            <?php    } ?>
                            <!-- end 8 september -->
                            <?php if ($cek_gugur['nilai_prakualifikasi'] == 0 || $cek_gugur['status_evaluasi_syarat_tambahan'] == 0) { ?>

                            <?php } else { ?>
                                <tr>
                                    <th style="background-color: bisque; width:180px">Berita Acara </th>
                                    <td>
                                        <div class="card">
                                            <div class="card-header">
                                                Berita Acara
                                            </div>
                                            <div class="body">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama File</th>
                                                        <th>File</th>
                                                        <th>Waktu Kirim</th>
                                                    </tr>
                                                    <?php $no = 1;
                                                    foreach ($get_pringkat_berita_acara as $key => $value) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $value['nama_file'] ?></td>
                                                            <td> <a href="https://eproc.jmtm.co.id/berita_acara_tender/<?= $value['file_berita_acara_peringkat'] ?>"><img src="<?= base_url('assets/img/pdf.png') ?>" width="50px" alt=""></a></td>
                                                            <td><?= $value['create_at'] ?></td>
                                                        </tr>
                                                    <?php    } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>

                            <!-- <?php if (date('Y-m-d H:i', strtotime($peringkat_teknis_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($peringkat_teknis_2_file['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($peringkat_teknis_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>

                                <tr>
                                    <th style="background-color: bisque; width:180px">Berita Acara </th>
                                    <td>
                                        <div class="card">
                                            <div class="card-header">
                                                Berita Acara
                                            </div>
                                            <div class="body">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama File</th>
                                                        <th>File</th>
                                                        <th>Waktu Kirim</th>
                                                    </tr>
                                                    <?php $no = 1;
                                                    foreach ($get_pringkat_berita_acara as $key => $value) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $value['nama_file'] ?></td>
                                                            <td> <a href="https://eproc.jmtm.co.id/berita_acara_tender/<?= $value['file_berita_acara_peringkat'] ?>"><img src="<?= base_url('assets/img/pdf.png') ?>" width="50px" alt=""></a></td>
                                                            <td><?= $value['create_at'] ?></td>
                                                        </tr>
                                                    <?php    } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php    } else { ?>

                                <tr>
                                    <th style="background-color: bisque; width:180px">Berita Acara</th>
                                    <td>
                                        <div class="card">
                                            <div class="card-header">
                                                Berita Acara
                                            </div>
                                            <div class="body">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama File</th>
                                                        <th>File</th>
                                                        <th>Waktu Kirim</th>
                                                    </tr>
                                                    <?php $no = 1;
                                                    foreach ($get_pringkat_berita_acara as $key => $value) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $value['nama_file'] ?></td>
                                                            <td> <a href="https://eproc.jmtm.co.id/berita_acara_tender/<?= $value['file_berita_acara_peringkat'] ?>"><img src="<?= base_url('assets/img/pdf.png') ?>" width="50px" alt=""></a></td>
                                                            <td><?= $value['create_at'] ?></td>
                                                        </tr>
                                                    <?php    } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php    } ?>

                            <?php if ($get_pemenang['pemenang_tender'] == 1) { ?>

                                <?php if (date('Y-m-d H:i', strtotime($surat_penunjukan2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                <?php    } else if (date('Y-m-d H:i', strtotime($surat_penunjukan2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($surat_penunjukan2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                    <tr>
                                        <th style="background-color: bisque; width:180px">Surat Penunjukan Langsung</th>
                                        <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_pengumuman_hasil_prakualifikasi'] ?>"><i class="fas fa-download"></i> Buka Surat Penunjukan Langsung Peserta</a><b></b></td>
                                    </tr>
                                <?php    } else { ?>
                                    <tr>
                                        <th style="background-color: bisque; width:180px">Surat Penunjukan Langsung</th>
                                        <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_pengumuman_hasil_prakualifikasi'] ?>"><i class="fas fa-download"></i> Buka Surat Penunjukan Langsung Peserta</a><b></b></td>
                                    </tr>
                                <?php    } ?>
                            <?php } else { ?>

                            <?php } ?> -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane" id="penjelasan" role="tabpanel" aria-labelledby="tender-tab">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th class="">Kode Tender</th>
                                        <td>18556415</td>
                                    </tr>
                                    <tr>
                                        <th>Kode Tender</th>
                                        <td>Pengembangan sistem pengadaan nasional / penguatan kapasitas, infrastruktur dan cloud LPSE/ cloude data center lpse / direktorat pengembangan sistem pengadaan secara elektronik</td>
                                    </tr>
                                    <tr>
                                        <th>Sisa Waktu</th>
                                        <td>8 jam/52 menit</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } else if ($paket_di_ikuti['id_kualifikasi'] == 13 || $paket_di_ikuti['id_kualifikasi'] == 8 || $paket_di_ikuti['id_kualifikasi'] == 15) { ?>
    <!-- INI UNTUK PRAKUALIFKIKASI 1 FILE -->
    <div id="main" class="container">
        <div class="breadcrumb bg-primary" style="margin-top: 20px; color: white;"><a href="<?= base_url('beranda') ?>" style="color: white;">Beranda</a>&ensp;&raquo;&ensp;Informasi Tender</div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="active">
                <a class="nav-link active bg-primary text-white" id="tender-tab" data-toggle="tab" href="<?= base_url('beranda/informasi_tender/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Informasi Tender</a>
            </li>
            <li class="nav-item">
                <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/penjelasan_lelang/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Penjelasan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/sanggahan_tender/' . $paket_di_ikuti['id_paket']) ?>">Sangahan Prakualifikasi</a>
            </li>
            <?php if ($get_pemenang['nilai_pringkat_teknis'] == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/negosiasi/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Negosiasi</a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/sanggahan_tender_akhir/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Sanggahan Tender</a>
            </li>
            <?php if ($get_pemenang['pemenang_tender'] == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/mengundurkan_diri/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Mengundurkan Diri</a>
                </li>
            <?php } ?>

        </ul>

        <div class="tab-content">
            <!-- tender -->
            <div class="tab-pane active" id="informasi-tender" role="tabpanel" aria-labelledby="tender-tab">
                <?= $this->session->flashdata('error') ?>
                <div style="overflow-x:auto">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="background-color: bisque; width:250px">Kode Tender</th>
                                <td><b><?= $paket_di_ikuti['kode_tender'] ?></b></td>
                            </tr>
                            <tr>
                                <th style="background-color: bisque; width:150px">Nama Tender</th>
                                <td>
                                    <b>
                                        <?= $paket_di_ikuti['nama_paket'] ?>
                                    </b>
                                </td>
                            </tr>
                            <tr>
                                <th style="background-color: bisque; width:250px">Tahap Tender</th>
                                <td>
                                    <a href="javascipt:;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_lihat_tahap"><img src="<?= base_url('assets/img/icon-jadwal.png') ?>" width="25px" alt=""> Lihat Tahap Tender Saat Ini</a>
                                </td>
                            </tr>
                            <tr>
                                <th style="background-color: bisque; width:180px">Jumlah Peserta</th>
                                <td> <a href="javascript:;" onclick="lihat_vendor_mengikuti(<?= $paket_di_ikuti['id_paket'] ?>)" class="btn btn-sm btn-primary"> <b><?= $jumlah_peserta ?> Peserta</b></a></td>
                            </tr>
                            <tr>
                                <th style="background-color: bisque;">Dokumen Lelang</th>
                                <td>
                                    <div class="row">
                                        <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                        <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                            <div class="col-md-6">
                                                <div class=" card border-primary mb-3">
                                                    <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Lelang
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table table-striped">
                                                            <?php foreach ($get_pdf_dokumen_kualifikasi_lelang as $key => $value) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <a target="_blank" href="https://eproc.jmtm.co.id/file_dokumen_lelang/<?= $value['file_dokumen_lelang'] ?>"><?= $value['nama_dokumen_lelang'] ?><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4"></a>
                                                                    </td>
                                                                    <td><label for="" class="ml-3"> Di Kirim : <?= $value['create_file_lelang'] ?></label></td>
                                                                </tr>
                                                            <?php    } ?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php    } else { ?>
                                            <div class="col-md-6">
                                                <div class=" card border-primary mb-3">
                                                    <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Lelang
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table table-striped">
                                                            <?php foreach ($get_pdf_dokumen_kualifikasi_lelang as $key => $value) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <a target="_blank" href="https://eproc.jmtm.co.id/file_dokumen_lelang/<?= $value['file_dokumen_lelang'] ?>"><?= $value['nama_dokumen_lelang'] ?><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4"></a>
                                                                    </td>
                                                                    <td><label for="" class="ml-3"> Di Kirim : <?= $value['create_file_lelang'] ?></label></td>
                                                                </tr>
                                                            <?php    } ?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php    } ?>
                                        <div class="col-md-6">
                                            <div class=" card border-primary mb-3">
                                                <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Prakualifikasi
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table table-striped">
                                                        <?php foreach ($get_pdf_dokumen_kualifikasi as $key => $value) { ?>
                                                            <tr>
                                                                <td>
                                                                    <a target="_blank" href="https://eproc.jmtm.co.id/dokumen_file_dokumen_kualifikasi_pdf/<?= $value['file_dokumen_kualifikasi_pdf'] ?>"><?= $value['nama_dokumen_kualifikasi_pdf'] ?><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4"></a>
                                                                </td>
                                                                <td><label for="" class="ml-3"> Di Kirim : <?= $value['create_at'] ?></label></td>
                                                            </tr>
                                                        <?php    } ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <?php if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                    <?php    } else if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                        <div class="card border-primary mb-3">
                                            <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                Persyaratan Tambahan
                                            </div>
                                            <div class="card-body">
                                                <table class="table">
                                                    <tr>
                                                        <th>Nama Persyaratan</th>
                                                        <th>Keterangan</th>
                                                        <th>File</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    <?php foreach ($persyaratan_tambahan as $key => $value) { ?>
                                                        <tr>
                                                            <input type="hidden" value="<?= $value['nama_persyaratan'] ?>" name="nama_persyaratan_tambahan">
                                                            <td><?= $value['nama_persyaratan'] ?></td>
                                                            <input type="hidden" value="<?= $value['keterangan'] ?>">
                                                            <td><?= $value['keterangan'] ?></td>
                                                            <td>
                                                                <?php
                                                                if ($value['file_persyaratan_tambahan'] == NULL) { ?>
                                                                    <p>Tidak ada File</p>
                                                                <?php } else { ?>
                                                                    <a target="_blank" href="https://eproc.jmtm.co.id/file_persyaratan_tambahan/<?= $value['file_persyaratan_tambahan'] ?>"> <img src="<?= base_url('assets/img/file-icon.png') ?>" style="width: 30px;" alt=""></a>

                                                                <?php } ?>
                                                            </td>
                                                            <?php if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                            <?php    } else if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
                                                                <td>
                                                                    <a href="javascript:;" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#modalPersyaratanTambahan<?= $value['id_persyaratan_tender'] ?>"><i style="color: white;" class="fas fa-download"></i> UPLOAD</a>
                                                                </td>
                                                            <?php    } else { ?>
                                                                <td>
                                                                    <label class="badge badge-success"> <i class="fas fa fa-check"></i> Tahap Sudah Selesai </label>
                                                                </td>
                                                            <?php    } ?>

                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card border-primary mb-3">
                                            <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                File Yang Sudah Di Upload <div class="text-default"><i class="fa fa-check"></i></div>
                                            </div>
                                            <div class="card-body">
                                                <table class="table">
                                                    <tr>
                                                        <th>Nama Persyaratan</th>
                                                        <th>Keterangan</th>
                                                        <th>File</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    <?php foreach ($uploaded_file as $key => $value) { ?>
                                                        <tr>
                                                            <input type="hidden" value="<?= $value['nama_persyaratan_tambahan'] ?>" name="nama_persyaratan_tambahan">
                                                            <td><?= $value['nama_persyaratan_tambahan'] ?></td>
                                                            <input type="hidden" value="<?= $value['keterangan_persyaratan_tambahan'] ?>">
                                                            <td><?= $value['keterangan_persyaratan_tambahan'] ?></td>
                                                            <td>
                                                                <a target="_blank" href="<?= base_url() ?>file_persyaratan_tambahan/<?= $value['file_persyaratan_tambahan'] ?>"> <img src="<?= base_url('assets/img/file-icon.png') ?>" style="width: 20px;" alt=""></a>
                                                            </td>
                                                            <td> <?php if ($value['status_lengkap'] == 'tidak lulus') { ?>
                                                                    <a href="javascript:;" onclick="lihat_alasan_tidak_lulus_dokumen(<?= $value['id_paket'] ?>)" id="lihat_alasan_tidak_lulus_dokumen" class="badge badge-danger">Syarat Blom Terpenuhi / Lihat Alasan</a>
                                                                <?php } else if ($value['status_lengkap'] == 'lulus') { ?>
                                                                    <label for="" class="badge badge-success">Syarat Dokumen Sudah Terpenuhi</label>
                                                                <?php } else { ?>
                                                                    <label for="" class="badge badge-warning">Belum Diperiksa</label>
                                                                <?php } ?>
                                                            </td>
                                                            <?php if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                            <?php    } else if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                                <td>
                                                                    <a href="<?= base_url('beranda/hapus_uploaded_file/' . $value['id_persyaratan_tambahan']) ?>/<?= $paket_di_ikuti['id_paket'] ?>">
                                                                        <div class="text-danger"><i class="fa fa-trash-alt"></i></div>
                                                                    </a>
                                                                </td>
                                                            <?php    } else { ?>
                                                                <td>
                                                                    <label class="badge badge-success"> <i class="fas fa fa-check"></i> Tahap Sudah Selesai </label>
                                                                </td>
                                                            <?php    } ?>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- update 30 juni 20222 -->
                                        <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                        <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                            <?php if ($paket_di_ikuti['sts_peralatan'] == '1') { ?>
                                                <div class="card border-primary mb-3">
                                                    <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                        <!-- Button trigger modal -->

                                                        <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                        <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_peralatan">
                                                                <i class="fa fa-plus"></i> Tambah Peralatan
                                                            </button>
                                                        <?php    } else { ?>
                                                            <button type="button" class="btn btn-danger btn-sm">
                                                                Tahap Sudah Selesai
                                                            </button>
                                                        <?php    } ?>
                                                    </div>
                                                    <div class="card-body">
                                                        <div style="overflow-x: true;">
                                                            <table class="table" id="tbl_peralatan_tender">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="font-size: 12px;" rowspan="2">No</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jenis Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Merk Dan Tipe</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jumlah Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Kapasitas Produksi</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Tahun Pembuatan Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Volume dan Satuan</th>
                                                                        <th>Status Kepemilikan Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Data Dukung Kepemilkan Alat</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Lokasi Alat Saat ini</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jarak Lokasi Alat Ke Lokasi Pekerjaan (KM)</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Bukti Kepemilikan Alat</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Aksi </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="font-size: 12px;">Milik Sendiri/Sewa</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php    } ?>
                                            <?php if ($paket_di_ikuti['sts_tenaga_ahli'] == '1') { ?>
                                                <div class="card border-primary mb-3">
                                                    <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                        <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                        <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                            <a href="#" data-toggle="modal" data-target="#tambah_tenaga_ahli_tender_modal" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Tenaga Ahli</a>
                                                        <?php    } else { ?>
                                                            <button type="button" class="btn btn-danger btn-sm">
                                                                Tahap Sudah Selesai
                                                            </button>
                                                        <?php    } ?>
                                                    </div>

                                                    <div class="card-body">
                                                        <table class="table" id="tbl_tenaga_ahli_tender">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2">No</th>
                                                                    <th rowspan="2">Nama Lengkap dengan Gelar</th>
                                                                    <th rowspan="2">Rencana Jabatan dalam Pekerjaan Ini</th>
                                                                    <th>Kelahiran</th>
                                                                    <th colspan="3">Pendidikan Formal</th>
                                                                    <th colspan="3">Sertifikasi Keahlian</th>
                                                                    <th colspan="2">Pengalaman</th>
                                                                    <th rowspan="2">Aksi</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tgl/Bln/Thn</th>
                                                                    <th>Program Studi</th>
                                                                    <th>Perguruan Tinggi/Sekolah</th>
                                                                    <th>Tahun Lulus</th>
                                                                    <th>Asosiasi (BSA)</th>
                                                                    <th>Kualifikasi Keahlian</th>
                                                                    <th>Tanggal masa berlaku</th>
                                                                    <th>Jumlah Tahun</th>
                                                                    <th>Jabatan Terakhir</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php }  ?>
                                        <?php } else { ?>
                                            <?php if ($paket_di_ikuti['sts_peralatan'] == '1') { ?>
                                                <div class="card border-primary mb-3">
                                                    <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                        <!-- Button trigger modal -->

                                                        <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                        <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_peralatan">
                                                                <i class="fa fa-plus"></i> Tambah Peralatan
                                                            </button>
                                                        <?php    } else { ?>
                                                            <button type="button" class="btn btn-danger btn-sm">
                                                                Tahap Sudah Selesai
                                                            </button>
                                                        <?php    } ?>
                                                    </div>
                                                    <div class="card-body">
                                                        <div style="overflow-x: true;">
                                                            <table class="table" id="tbl_peralatan_tender">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="font-size: 12px;" rowspan="2">No</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jenis Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Merk Dan Tipe</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jumlah Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Kapasitas Produksi</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Tahun Pembuatan Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Volume dan Satuan</th>
                                                                        <th>Status Kepemilikan Peralatan</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Data Dukung Kepemilkan Alat</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Lokasi Alat Saat ini</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Jarak Lokasi Alat Ke Lokasi Pekerjaan (KM)</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Bukti Kepemilikan Alat</th>
                                                                        <th style="font-size: 12px;" rowspan="2">Aksi </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="font-size: 12px;">Milik Sendiri/Sewa</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php    } ?>

                                            <?php if ($paket_di_ikuti['sts_tenaga_ahli'] == '1') { ?>
                                                <div class="card border-primary mb-3">
                                                    <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                        <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                        <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                            <a href="#" data-toggle="modal" data-target="#tambah_tenaga_ahli_tender_modal" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Tenaga Ahli</a>
                                                        <?php    } else { ?>
                                                            <button type="button" class="btn btn-danger btn-sm">
                                                                Tahap Sudah Selesai
                                                            </button>
                                                        <?php    } ?>
                                                    </div>

                                                    <div class="card-body">
                                                        <table class="table" id="tbl_tenaga_ahli_tender">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2">No</th>
                                                                    <th rowspan="2">Nama Lengkap dengan Gelar</th>
                                                                    <th rowspan="2">Rencana Jabatan dalam Pekerjaan Ini</th>
                                                                    <th>Kelahiran</th>
                                                                    <th colspan="3">Pendidikan Formal</th>
                                                                    <th colspan="3">Sertifikasi Keahlian</th>
                                                                    <th colspan="2">Pengalaman</th>
                                                                    <th rowspan="2">Aksi</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tgl/Bln/Thn</th>
                                                                    <th>Program Studi</th>
                                                                    <th>Perguruan Tinggi/Sekolah</th>
                                                                    <th>Tahun Lulus</th>
                                                                    <th>Asosiasi (BSA)</th>
                                                                    <th>Kualifikasi Keahlian</th>
                                                                    <th>Tanggal masa berlaku</th>
                                                                    <th>Jumlah Tahun</th>
                                                                    <th>Jabatan Terakhir</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php }  ?>
                                        <?php } ?>

                                        <!-- end update 30 juni 20222 -->
                                    <?php    } else { ?>

                                        <div class="card border-primary mb-3">
                                            <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                Persyaratan Tambahan
                                            </div>
                                            <div class="card-body">
                                                <table class="table">
                                                    <tr>
                                                        <th>Nama Persyaratan</th>
                                                        <th>Keterangan</th>
                                                        <th>File</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    <?php foreach ($persyaratan_tambahan as $key => $value) { ?>
                                                        <tr>
                                                            <input type="hidden" value="<?= $value['nama_persyaratan'] ?>" name="nama_persyaratan_tambahan">
                                                            <td><?= $value['nama_persyaratan'] ?></td>
                                                            <input type="hidden" value="<?= $value['keterangan'] ?>">
                                                            <td><?= $value['keterangan'] ?></td>
                                                            <td>
                                                                <?php
                                                                if ($value['file_persyaratan_tambahan'] == NULL) { ?>
                                                                    <p>Tidak ada File</p>
                                                                <?php } else { ?>
                                                                    <a target="_blank" href="https://eproc.jmtm.co.id/file_persyaratan_tambahan/<?= $value['file_persyaratan_tambahan'] ?>"> <img src="<?= base_url('assets/img/file-icon.png') ?>" style="width: 30px;" alt=""></a>

                                                                <?php } ?>
                                                            </td>
                                                            <?php if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                            <?php    } else if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                                <td>
                                                                    <a href="javascript:;" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#modalPersyaratanTambahan<?= $value['id_persyaratan_tender'] ?>"><i style="color: white;" class="fas fa-download"></i> UPLOAD</a>
                                                                </td>
                                                            <?php    } else { ?>
                                                                <td>
                                                                    <label class="badge badge-success"> <i class="fas fa fa-check"></i> Tahap Sudah Selesai </label>
                                                                </td>
                                                            <?php    } ?>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card border-primary mb-3">
                                            <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                File Yang Sudah Di Upload <div class="text-default"><i class="fa fa-check"></i></div>
                                            </div>
                                            <div class="card-body">
                                                <table class="table">
                                                    <tr>
                                                        <th>Nama Persyaratan</th>
                                                        <th>Keterangan</th>
                                                        <th>File</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    <?php foreach ($uploaded_file as $key => $value) { ?>
                                                        <tr>
                                                            <input type="hidden" value="<?= $value['nama_persyaratan_tambahan'] ?>" name="nama_persyaratan_tambahan">
                                                            <td><?= $value['nama_persyaratan_tambahan'] ?></td>
                                                            <input type="hidden" value="<?= $value['keterangan_persyaratan_tambahan'] ?>">
                                                            <td><?= $value['keterangan_persyaratan_tambahan'] ?></td>
                                                            <td>
                                                                <a target="_blank" href="<?= base_url() ?>file_persyaratan_tambahan/<?= $value['file_persyaratan_tambahan'] ?>"> <img src="<?= base_url('assets/img/file-icon.png') ?>" style="width: 20px;" alt=""></a>
                                                            </td>
                                                            <td> <?php if ($value['status_lengkap'] == 'tidak lulus') { ?>
                                                                    <a href="javascript:;" onclick="lihat_alasan_tidak_lulus_dokumen(<?= $value['id_paket'] ?>)" id="lihat_alasan_tidak_lulus_dokumen" class="badge badge-danger">Syarat Blom Terpenuhi / Lihat Alasan</a>
                                                                <?php } else if ($value['status_lengkap'] == 'lulus') { ?>
                                                                    <label for="" class="badge badge-success">Syarat Dokumen Sudah Terpenuhi</label>
                                                                <?php } else { ?>
                                                                    <label for="" class="badge badge-warning">Belum Diperiksa</label>
                                                                <?php } ?>
                                                            </td>

                                                            <?php if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                            <?php    } else if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                                <td>
                                                                    <a href="<?= base_url('beranda/hapus_uploaded_file/' . $value['id_persyaratan_tambahan']) ?>/<?= $paket_di_ikuti['id_paket'] ?>">
                                                                        <div class="text-danger"><i class="fa fa-trash-alt"></i></div>
                                                                    </a>
                                                                </td>
                                                            <?php    } else { ?>
                                                                <td>
                                                                    <label class="badge badge-success"> <i class="fas fa fa-check"></i> Tahap Sudah Selesai </label>
                                                                </td>
                                                            <?php    } ?>
                                                        </tr>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                    <?php    } ?>
                                    <!-- update 30 juni 20222 -->
                                    <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                    <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                        <?php if ($paket_di_ikuti['sts_peralatan'] == '1') { ?>
                                            <div class="card border-primary mb-3">
                                                <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                    <!-- Button trigger modal -->

                                                    <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                    <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_peralatan">
                                                            <i class="fa fa-plus"></i> Tambah Peralatan
                                                        </button>
                                                    <?php    } else { ?>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            Tahap Sudah Selesai
                                                        </button>
                                                    <?php    } ?>
                                                </div>
                                                <div class="card-body">
                                                    <div style="overflow-x: true;">
                                                        <table class="table" id="tbl_peralatan_tender">
                                                            <thead>
                                                                <tr>
                                                                    <th style="font-size: 12px;" rowspan="2">No</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Jenis Peralatan</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Merk Dan Tipe</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Jumlah Peralatan</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Kapasitas Produksi</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Tahun Pembuatan Peralatan</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Volume dan Satuan</th>
                                                                    <th>Status Kepemilikan Peralatan</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Data Dukung Kepemilkan Alat</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Lokasi Alat Saat ini</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Jarak Lokasi Alat Ke Lokasi Pekerjaan (KM)</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Bukti Kepemilikan Alat</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Aksi </th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="font-size: 12px;">Milik Sendiri/Sewa</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php    } ?>
                                        <?php if ($paket_di_ikuti['sts_tenaga_ahli'] == '1') { ?>
                                            <div class="card border-primary mb-3">
                                                <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                    <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                    <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                        <a href="#" data-toggle="modal" data-target="#tambah_tenaga_ahli_tender_modal" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Tenaga Ahli</a>
                                                    <?php    } else { ?>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            Tahap Sudah Selesai
                                                        </button>
                                                    <?php    } ?>
                                                </div>

                                                <div class="card-body">
                                                    <table class="table" id="tbl_tenaga_ahli_tender">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2">No</th>
                                                                <th rowspan="2">Nama Lengkap dengan Gelar</th>
                                                                <th rowspan="2">Rencana Jabatan dalam Pekerjaan Ini</th>
                                                                <th>Kelahiran</th>
                                                                <th colspan="3">Pendidikan Formal</th>
                                                                <th colspan="3">Sertifikasi Keahlian</th>
                                                                <th colspan="2">Pengalaman</th>
                                                                <th rowspan="2">Aksi</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Tgl/Bln/Thn</th>
                                                                <th>Program Studi</th>
                                                                <th>Perguruan Tinggi/Sekolah</th>
                                                                <th>Tahun Lulus</th>
                                                                <th>Asosiasi (BSA)</th>
                                                                <th>Kualifikasi Keahlian</th>
                                                                <th>Tanggal masa berlaku</th>
                                                                <th>Jumlah Tahun</th>
                                                                <th>Jabatan Terakhir</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <?php }  ?>
                                    <?php } else { ?>
                                        <?php if ($paket_di_ikuti['sts_peralatan'] == '1') { ?>
                                            <div class="card border-primary mb-3">
                                                <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                    <!-- Button trigger modal -->

                                                    <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                    <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_peralatan">
                                                            <i class="fa fa-plus"></i> Tambah Peralatan
                                                        </button>
                                                    <?php    } else { ?>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            Tahap Sudah Selesai
                                                        </button>
                                                    <?php    } ?>
                                                </div>
                                                <div class="card-body">
                                                    <div style="overflow-x: true;">
                                                        <table class="table" id="tbl_peralatan_tender">
                                                            <thead>
                                                                <tr>
                                                                    <th style="font-size: 12px;" rowspan="2">No</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Jenis Peralatan</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Merk Dan Tipe</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Jumlah Peralatan</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Kapasitas Produksi</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Tahun Pembuatan Peralatan</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Volume dan Satuan</th>
                                                                    <th>Status Kepemilikan Peralatan</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Data Dukung Kepemilkan Alat</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Lokasi Alat Saat ini</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Jarak Lokasi Alat Ke Lokasi Pekerjaan (KM)</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Bukti Kepemilikan Alat</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Aksi </th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="font-size: 12px;">Milik Sendiri/Sewa</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php    } ?>

                                        <?php if ($paket_di_ikuti['sts_tenaga_ahli'] == '1') { ?>
                                            <div class="card border-primary mb-3">
                                                <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                    <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                    <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                        <a href="#" data-toggle="modal" data-target="#tambah_tenaga_ahli_tender_modal" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Tenaga Ahli</a>
                                                    <?php    } else { ?>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            Tahap Sudah Selesai
                                                        </button>
                                                    <?php    } ?>
                                                </div>

                                                <div class="card-body">
                                                    <table class="table" id="tbl_tenaga_ahli_tender">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2">No</th>
                                                                <th rowspan="2">Nama Lengkap dengan Gelar</th>
                                                                <th rowspan="2">Rencana Jabatan dalam Pekerjaan Ini</th>
                                                                <th>Kelahiran</th>
                                                                <th colspan="3">Pendidikan Formal</th>
                                                                <th colspan="3">Sertifikasi Keahlian</th>
                                                                <th colspan="2">Pengalaman</th>
                                                                <th rowspan="2">Aksi</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Tgl/Bln/Thn</th>
                                                                <th>Program Studi</th>
                                                                <th>Perguruan Tinggi/Sekolah</th>
                                                                <th>Tahun Lulus</th>
                                                                <th>Asosiasi (BSA)</th>
                                                                <th>Kualifikasi Keahlian</th>
                                                                <th>Tanggal masa berlaku</th>
                                                                <th>Jumlah Tahun</th>
                                                                <th>Jabatan Terakhir</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <?php }  ?>
                                    <?php } ?>


                                    <!-- end update 30 juni 20222 -->
                                </td>
                            </tr>
                            <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                <tr>
                                    <th style="background-color: bisque;">Penawaran Anda</th>
                                    <?php if ($cek_gugur['nilai_prakualifikasi'] == 0 || $cek_gugur['status_evaluasi_syarat_tambahan'] == 0) { ?>
                                        <td><a class="btn btn-danger text-white">Maaf Anda Telah Gugur Dalam Tender Ini!!!</a></td>
                                    <?php } else { ?>
                                        <td>
                                            <p class="text-danger">Dokumen Kualifikasi Sudah Dikirim Saat Pendaftaran Penyedia</p>
                                            <div class="card">
                                                <div class="card-header">
                                                    <label for="">Data Penawaran & Teknis,Administrasi</label>
                                                </div>
                                                <div class="card-body">
                                                    <?php if ($status_kirim_data_enkrip == null) { ?>
                                                        <a href="javascript:;" class="badge badge-secondary float-right" style="font-size: small;">Status: Belum Dikirim</a>
                                                        <a href="<?= base_url('upload_dokumen') ?>" class="badge badge-secondary" style="color: white;">Kirim Dokumen Penawaran & Teknis <i class="fa fa-upload"></i></a>
                                                    <?php    } else { ?>
                                                        <?php foreach ($status_kirim_data_enkrip as $key => $value) { ?>
                                                            <table id="table_krim_data">
                                                                <a href="javascript:;" onclick="byid_status_kirim_data_penawaran(<?= $value['id_kirim_status_penawaran'] ?>)" class="badge badge-danger" style="font-size: small; margin-right:10px">Revisi</a>
                                                                <a href="javascript:;" class="badge badge-info" style="font-size: small;">Status: Sudah dikirim Pada <?= date('d-m-Y H:i', strtotime($value['waktu_kirim']))  ?></a> <i class="fas fa fa-check text-success ml-2"></i>
                                                            </table>
                                                        <?php    } ?>
                                                    <?php    } ?>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $paket_di_ikuti['token_vendor'] ?>" readonly style="margin-top: 10px;">
                                            <div class="bs-callout bs-callout-info">
                                                Silahkan Copy Paste Token Untuk Upload Dokumen
                                            </div>

                                        </td>
                                    <?php } ?>

                                </tr>


                            <?php    } else { ?>
                                <tr>
                                    <th style="background-color: bisque;">Penawaran Anda</th>
                                    <?php if ($cek_gugur['nilai_prakualifikasi'] == 0 || $cek_gugur['status_evaluasi_syarat_tambahan'] == 0) { ?>
                                        <td><a class="btn btn-danger text-white">Maaf Anda Telah Gugur Dalam Tender Ini!!!</a></td>
                                    <?php } else { ?>
                                        <td>
                                            <p class="text-danger">Dokumen Kualifikasi Sudah Dikirim Saat Pendaftaran Penyedia</p>
                                            <div class="card">
                                                <div class="card-header">
                                                    <label for="">Data Penawaran & Teknis,Administrasi</label>
                                                </div>
                                                <div class="card-body">
                                                    <?php if ($status_kirim_data_enkrip == null) { ?>
                                                        <a href="javascript:;" class="badge badge-secondary float-right" style="font-size: small;">Status: Belum Dikirim</a>
                                                        <a href="javascript:;" class="badge badge-danger" style="font-size: small; margin-right:10px">Waktu Sudah Habis</a>
                                                    <?php    } else { ?>
                                                        <?php foreach ($status_kirim_data_enkrip as $key => $value) { ?>
                                                            <table id="table_krim_data">
                                                                <a href="javascript:;" class="badge badge-danger" style="font-size: small; margin-right:10px">Waktu Sudah Habis</a>
                                                                <a href="javascript:;" class="badge badge-info" style="font-size: small;">Status: Sudah dikirim Pada <?= date('d-m-Y H:i', strtotime($value['waktu_kirim']))  ?></a> <i class="fas fa fa-check text-success ml-2"></i>
                                                            </table>
                                                        <?php    } ?>
                                                    <?php    } ?>
                                                </div>
                                            </div>
                                            <!-- <input type="text" class="form-control" value="<?= $paket_di_ikuti['token_vendor'] ?>" readonly style="margin-top: 10px;">
													<div class="bs-callout bs-callout-info">
														Silahkan Copy Paste Token Untuk Upload Dokumen
													</div> -->

                                        </td>
                                    <?php } ?>

                                </tr>

                            <?php    } ?>

                            <?php if (date('Y-m-d H:i', strtotime($Pembuktian_Kualifikasi2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($Pembuktian_Kualifikasi2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($Pembuktian_Kualifikasi2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                <tr>
                                    <th style="background-color: bisque; width:180px">Undangan Pembuktian</th>
                                    <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_undangan_pembuktian'] ?>"><i class="fas fa-download"></i> Buka Undangan Pembuktian Kualifikasi Peserta</a><b></b></td>
                                </tr>

                            <?php    } else { ?>
                                <tr>
                                    <th style="background-color: bisque; width:180px">Undangan Pembuktian</th>
                                    <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_undangan_pembuktian'] ?>"><i class="fas fa-download"></i> Buka Undangan Pembuktian Kualifikasi Peserta</a><b></b></td>
                                </tr>

                            <?php    } ?>

                            <?php if (date('Y-m-d H:i', strtotime($pengumuman_hasil_prakualfikasi_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($pengumuman_hasil_prakualfikasi_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($pengumuman_hasil_prakualfikasi_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                <tr>
                                    <th style="background-color: bisque; width:180px">Pengumuman Hasil Prakualifikasi</th>
                                    <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_pengumuman_prakualifikasi/<?= $paket_di_ikuti['dokumen_pengumuman_hasil_prakualifikasi'] ?>"><i class="fas fa-download"></i> Buka Pengumuman Hasil Prakualifikasi Peserta</a><b></b></td>
                                </tr>
                            <?php    } else { ?>
                                <tr>
                                    <th style="background-color: bisque; width:180px">Pengumuman Hasil Prakualifikasi</th>
                                    <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_pengumuman_prakualifikasi/<?= $paket_di_ikuti['dokumen_pengumuman_hasil_prakualifikasi'] ?>"><i class="fas fa-download"></i> Buka Pengumuman Hasil Prakualifikasi Peserta</a><b></b></td>
                                </tr>
                            <?php    } ?>


                            <!-- 8 september -->
                            <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                <tr>
                                    <th style="background-color: bisque; width:180px">Undangan Penawaran</th>
                                    <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_penawaran/<?= $paket_di_ikuti['undangan_penawaran'] ?>"><i class="fas fa-download"></i> Buka Undangan Penawaran Peserta</a><b></b></td>
                                </tr>
                            <?php    } else { ?>
                                <tr>
                                    <th style="background-color: bisque; width:180px">Undangan Penawaran</th>
                                    <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_penawaran/<?= $paket_di_ikuti['undangan_penawaran'] ?>"><i class="fas fa-download"></i> Buka Undangan Penawaran Peserta</a><b></b></td>
                                </tr>
                            <?php    } ?>
                            <!-- end 8 september -->
                            <?php if ($cek_gugur['nilai_prakualifikasi'] == 0 || $cek_gugur['status_evaluasi_syarat_tambahan'] == 0) { ?>

                            <?php } else { ?>
                                <tr>
                                    <th style="background-color: bisque; width:180px">Berita Acara </th>
                                    <td>
                                        <div class="card">
                                            <div class="card-header">
                                                Berita Acara
                                            </div>
                                            <div class="body">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama File</th>
                                                        <th>File</th>
                                                        <th>Waktu Kirim</th>
                                                    </tr>
                                                    <?php $no = 1;
                                                    foreach ($get_pringkat_berita_acara as $key => $value) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $value['nama_file'] ?></td>
                                                            <td> <a href="https://eproc.jmtm.co.id/berita_acara_tender/<?= $value['file_berita_acara_peringkat'] ?>"><img src="<?= base_url('assets/img/pdf.png') ?>" width="50px" alt=""></a></td>
                                                            <td><?= $value['create_at'] ?></td>
                                                        </tr>
                                                    <?php    } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>

                            <!-- <?php if (date('Y-m-d H:i', strtotime($peringkat_teknis_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($peringkat_teknis_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($peringkat_teknis_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>

                                <tr>
                                    <th style="background-color: bisque; width:180px">Berita Acara</th>
                                    <td>
                                        <div class="card">
                                            <div class="card-header">
                                                Berita Acara
                                            </div>
                                            <div class="body">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama File</th>
                                                        <th>File</th>
                                                        <th>Waktu Kirim</th>
                                                    </tr>
                                                    <?php $no = 1;
                                                    foreach ($get_pringkat_berita_acara as $key => $value) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $value['nama_file'] ?></td>
                                                            <td> <a href="https://eproc.jmtm.co.id/berita_acara_tender/<?= $value['file_berita_acara_peringkat'] ?>"><img src="<?= base_url('assets/img/pdf.png') ?>" width="50px" alt=""></a></td>
                                                            <td><?= $value['create_at'] ?></td>
                                                        </tr>
                                                    <?php    } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php    } else { ?>

                                <tr>
                                    <th style="background-color: bisque; width:180px">Berita Acara</th>
                                    <td>
                                        <div class="card">
                                            <div class="card-header">
                                                Berita Acara
                                            </div>
                                            <div class="body">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama File</th>
                                                        <th>File</th>
                                                        <th>Waktu Kirim</th>
                                                    </tr>
                                                    <?php $no = 1;
                                                    foreach ($get_pringkat_berita_acara as $key => $value) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $value['nama_file'] ?></td>
                                                            <td> <a href="https://eproc.jmtm.co.id/berita_acara_tender/<?= $value['file_berita_acara_peringkat'] ?>"><img src="<?= base_url('assets/img/pdf.png') ?>" width="50px" alt=""></a></td>
                                                            <td><?= $value['create_at'] ?></td>
                                                        </tr>
                                                    <?php    } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php    } ?> -->

                            <?php if ($get_pemenang['pemenang_tender'] == 1) { ?>

                                <?php if (date('Y-m-d H:i', strtotime($surat_penunjukan2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                <?php    } else if (date('Y-m-d H:i', strtotime($surat_penunjukan2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($surat_penunjukan2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                    <tr>
                                        <th style="background-color: bisque; width:180px">Surat Penunjukan Langsung</th>
                                        <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_pengumuman_hasil_prakualifikasi'] ?>"><i class="fas fa-download"></i> Buka Surat Penunjukan Langsung Peserta</a><b></b></td>
                                    </tr>
                                <?php    } else { ?>
                                    <tr>
                                        <th style="background-color: bisque; width:180px">Surat Penunjukan Langsung</th>
                                        <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_pengumuman_hasil_prakualifikasi'] ?>"><i class="fas fa-download"></i> Buka Surat Penunjukan Langsung Peserta</a><b></b></td>
                                    </tr>
                                <?php    } ?>
                            <?php } else { ?>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane" id="penjelasan" role="tabpanel" aria-labelledby="tender-tab">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th class="">Kode Tender</th>
                                        <td>18556415</td>
                                    </tr>
                                    <tr>
                                        <th>Kode Tender</th>
                                        <td>Pengembangan sistem pengadaan nasional / penguatan kapasitas, infrastruktur dan cloud LPSE/ cloude data center lpse / direktorat pengembangan sistem pengadaan secara elektronik</td>
                                    </tr>
                                    <tr>
                                        <th>Sisa Waktu</th>
                                        <td>8 jam/52 menit</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } else if ($paket_di_ikuti['id_kualifikasi'] == 12 || $paket_di_ikuti['id_kualifikasi'] == 9 || $paket_di_ikuti['id_kualifikasi'] == 14 || $paket_di_ikuti['id_kualifikasi'] == 18 || $paket_di_ikuti['id_kualifikasi'] == 20 || $paket_di_ikuti['id_kualifikasi'] == 21) { ?>
    <!-- INI PASCAKUALIFIKASI -->
    <div id="main" class="container">
        <div class="breadcrumb bg-primary" style="margin-top: 20px; color: white;"><a href="<?= base_url('beranda') ?>" style="color: white;">Beranda</a>&ensp;&raquo;&ensp;Informasi Tender</div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="active">
                <a class="nav-link active bg-primary text-white" id="tender-tab" data-toggle="tab" href="<?= base_url('beranda/informasi_tender/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Informasi Tender</a>
            </li>
            <li class="nav-item">
                <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/penjelasan_lelang/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Penjelasan</a>
            </li>
            <?php if ($get_pemenang['nilai_pringkat_teknis'] == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/negosiasi/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Negosiasi</a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/sanggahan_tender_akhir/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Sanggahan Tender</a>
            </li>
            <?php if ($get_pemenang['pemenang_tender'] == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/mengundurkan_diri/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Mengundurkan Diri</a>
                </li>
            <?php } ?>

        </ul>

        <div class="tab-content">
            <!-- tender -->
            <div class="tab-pane active" id="informasi-tender" role="tabpanel" aria-labelledby="tender-tab">
                <?= $this->session->flashdata('error') ?>
                <div style="overflow-x:auto">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="background-color: bisque; width:250px">Kode Tender</th>
                                <td><b><?= $paket_di_ikuti['kode_tender'] ?></b></td>
                            </tr>
                            <tr>
                                <th style="background-color: bisque; width:150px">Nama Tender</th>
                                <td>
                                    <b>
                                        <?= $paket_di_ikuti['nama_paket'] ?>
                                    </b>
                                </td>
                            </tr>
                            <tr>
                                <th style="background-color: bisque; width:250px">Tahap Tender</th>
                                <td>
                                    <a href="javascipt:;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_lihat_tahap"><img src="<?= base_url('assets/img/icon-jadwal.png') ?>" width="25px" alt=""> Lihat Tahap Tender Saat Ini</a>
                                </td>
                            </tr>
                            <tr>
                                <th style="background-color: bisque; width:180px">Jumlah Peserta</th>
                                <td> <a href="javascript:;" onclick="lihat_vendor_mengikuti(<?= $paket_di_ikuti['id_paket'] ?>)" class="btn btn-sm btn-primary"> <b><?= $jumlah_peserta ?> Peserta</b></a></td>
                            </tr>
                            <tr>
                                <th style="background-color: bisque;">Dokumen Lelang</th>
                                <td>
                                    <div class="row">
                                        <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_pasca_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                        <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_pasca_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_pasca_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                            <div class="col-md-6">
                                                <div class=" card border-primary mb-3">
                                                    <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Lelang
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table table-striped">
                                                            <?php foreach ($get_pdf_dokumen_kualifikasi_lelang as $key => $value) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <a target="_blank" href="https://eproc.jmtm.co.id/file_dokumen_lelang/<?= $value['file_dokumen_lelang'] ?>"><?= $value['nama_dokumen_lelang'] ?><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4"></a>
                                                                    </td>
                                                                    <td><label for="" class="ml-3"> Di Kirim : <?= $value['create_file_lelang'] ?></label></td>
                                                                </tr>
                                                            <?php    } ?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php    } else { ?>
                                            <div class="col-md-6">
                                                <div class=" card border-primary mb-3">
                                                    <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Lelang
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table table-striped">
                                                            <?php foreach ($get_pdf_dokumen_kualifikasi_lelang as $key => $value) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <a target="_blank" href="https://eproc.jmtm.co.id/file_dokumen_lelang/<?= $value['file_dokumen_lelang'] ?>"><?= $value['nama_dokumen_lelang'] ?><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4"></a>
                                                                    </td>
                                                                    <td><label for="" class="ml-3"> Di Kirim : <?= $value['create_file_lelang'] ?></label></td>
                                                                </tr>
                                                            <?php    } ?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php    } ?>
                                    </div>
                                    <div class="card border-primary mb-3">
                                        <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                            Persyaratan Tambahan
                                        </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <tr>
                                                    <th>Nama Persyaratan</th>
                                                    <th>Keterangan</th>
                                                    <th>File</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                <?php foreach ($persyaratan_tambahan as $key => $value) { ?>
                                                    <tr>
                                                        <input type="hidden" value="<?= $value['nama_persyaratan'] ?>" name="nama_persyaratan_tambahan">
                                                        <td><?= $value['nama_persyaratan'] ?></td>
                                                        <input type="hidden" value="<?= $value['keterangan'] ?>">
                                                        <td><?= $value['keterangan'] ?></td>
                                                        <td>
                                                            <?php
                                                            if ($value['file_persyaratan_tambahan'] == NULL) { ?>
                                                                <p>Tidak ada File</p>
                                                            <?php } else { ?>
                                                                <a target="_blank" href="https://eproc.jmtm.co.id/file_persyaratan_tambahan/<?= $value['file_persyaratan_tambahan'] ?>"> <img src="<?= base_url('assets/img/file-icon.png') ?>" style="width: 30px;" alt=""></a>

                                                            <?php } ?>
                                                        </td>
                                                        <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                        <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                            <td>
                                                                <a href="javascript:;" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#modalPersyaratanTambahan<?= $value['id_persyaratan_tender'] ?>"><i style="color: white;" class="fas fa-download"></i> UPLOAD</a>
                                                            </td>
                                                        <?php    } else { ?>
                                                            <td>
                                                                <label class="badge badge-success"> <i class="fas fa fa-check"></i> Tahap Sudah Selesai </label>
                                                            </td>
                                                        <?php    } ?>
                                                    </tr>
                                                <?php } ?>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="card border-primary mb-3">
                                        <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                            File Yang Sudah Di Upload <div class="text-default"><i class="fa fa-check"></i></div>
                                        </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <tr>
                                                    <th>Nama Persyaratan</th>
                                                    <th>Keterangan</th>
                                                    <th>File</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                <?php foreach ($uploaded_file as $key => $value) { ?>
                                                    <tr>
                                                        <input type="hidden" value="<?= $value['nama_persyaratan_tambahan'] ?>" name="nama_persyaratan_tambahan">
                                                        <td><?= $value['nama_persyaratan_tambahan'] ?></td>
                                                        <input type="hidden" value="<?= $value['keterangan_persyaratan_tambahan'] ?>">
                                                        <td><?= $value['keterangan_persyaratan_tambahan'] ?></td>
                                                        <td>
                                                            <a target="_blank" href="<?= base_url() ?>file_persyaratan_tambahan/<?= $value['file_persyaratan_tambahan'] ?>"> <img src="<?= base_url('assets/img/file-icon.png') ?>" style="width: 20px;" alt=""></a>
                                                        </td>
                                                        <td> <?php if ($value['status_lengkap'] == 'tidak lulus') { ?>
                                                                <a href="javascript:;" onclick="lihat_alasan_tidak_lulus_dokumen(<?= $value['id_paket'] ?>)" id="lihat_alasan_tidak_lulus_dokumen" class="badge badge-danger">Syarat Blom Terpenuhi / Lihat Alasan</a>
                                                            <?php } else if ($value['status_lengkap'] == 'lulus') { ?>
                                                                <label for="" class="badge badge-success">Syarat Dokumen Sudah Terpenuhi</label>
                                                            <?php } else { ?>
                                                                <label for="" class="badge badge-warning">Belum Diperiksa</label>
                                                            <?php } ?>
                                                        </td>
                                                        <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_pasca_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                        <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_pasca_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_pasca_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                            <td>
                                                                <a href="<?= base_url('beranda/hapus_uploaded_file/' . $value['id_persyaratan_tambahan']) ?>/<?= $paket_di_ikuti['id_paket'] ?>">
                                                                    <div class="text-danger"><i class="fa fa-trash-alt"></i></div>
                                                                </a>
                                                            </td>
                                                        <?php    } else { ?>
                                                            <td>
                                                                <label class="badge badge-success"> <i class="fas fa fa-check"></i> Tahap Sudah Selesai </label>
                                                            </td>
                                                        <?php    } ?>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- update 30 juni 20222 -->
                                    <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                    <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                        <?php if ($paket_di_ikuti['sts_peralatan'] == '1') { ?>
                                            <div class="card border-primary mb-3">
                                                <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                    <!-- Button trigger modal -->

                                                    <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                    <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_peralatan">
                                                            <i class="fa fa-plus"></i> Tambah Peralatan
                                                        </button>
                                                    <?php    } else { ?>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            Tahap Sudah Selesai
                                                        </button>
                                                    <?php    } ?>
                                                </div>
                                                <div class="card-body">
                                                    <div style="overflow-x: true;">
                                                        <table class="table" id="tbl_peralatan_tender">
                                                            <thead>
                                                                <tr>
                                                                    <th style="font-size: 12px;" rowspan="2">No</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Jenis Peralatan</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Merk Dan Tipe</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Jumlah Peralatan</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Kapasitas Produksi</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Tahun Pembuatan Peralatan</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Volume dan Satuan</th>
                                                                    <th>Status Kepemilikan Peralatan</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Data Dukung Kepemilkan Alat</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Lokasi Alat Saat ini</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Jarak Lokasi Alat Ke Lokasi Pekerjaan (KM)</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Bukti Kepemilikan Alat</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Aksi </th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="font-size: 12px;">Milik Sendiri/Sewa</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php    } ?>
                                        <?php if ($paket_di_ikuti['sts_tenaga_ahli'] == '1') { ?>
                                            <div class="card border-primary mb-3">
                                                <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                    <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                    <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                        <a href="#" data-toggle="modal" data-target="#tambah_tenaga_ahli_tender_modal" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Tenaga Ahli</a>
                                                    <?php    } else { ?>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            Tahap Sudah Selesai
                                                        </button>
                                                    <?php    } ?>
                                                </div>

                                                <div class="card-body">
                                                    <table class="table" id="tbl_tenaga_ahli_tender">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2">No</th>
                                                                <th rowspan="2">Nama Lengkap dengan Gelar</th>
                                                                <th rowspan="2">Rencana Jabatan dalam Pekerjaan Ini</th>
                                                                <th>Kelahiran</th>
                                                                <th colspan="3">Pendidikan Formal</th>
                                                                <th colspan="3">Sertifikasi Keahlian</th>
                                                                <th colspan="2">Pengalaman</th>
                                                                <th rowspan="2">Aksi</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Tgl/Bln/Thn</th>
                                                                <th>Program Studi</th>
                                                                <th>Perguruan Tinggi/Sekolah</th>
                                                                <th>Tahun Lulus</th>
                                                                <th>Asosiasi (BSA)</th>
                                                                <th>Kualifikasi Keahlian</th>
                                                                <th>Tanggal masa berlaku</th>
                                                                <th>Jumlah Tahun</th>
                                                                <th>Jabatan Terakhir</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <?php }  ?>
                                    <?php } else { ?>
                                        <?php if ($paket_di_ikuti['sts_peralatan'] == '1') { ?>
                                            <div class="card border-primary mb-3">
                                                <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                    <!-- Button trigger modal -->

                                                    <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                    <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_peralatan">
                                                            <i class="fa fa-plus"></i> Tambah Peralatan
                                                        </button>
                                                    <?php    } else { ?>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            Tahap Sudah Selesai
                                                        </button>
                                                    <?php    } ?>
                                                </div>
                                                <div class="card-body">
                                                    <div style="overflow-x: true;">
                                                        <table class="table" id="tbl_peralatan_tender">
                                                            <thead>
                                                                <tr>
                                                                    <th style="font-size: 12px;" rowspan="2">No</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Jenis Peralatan</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Merk Dan Tipe</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Jumlah Peralatan</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Kapasitas Produksi</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Tahun Pembuatan Peralatan</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Volume dan Satuan</th>
                                                                    <th>Status Kepemilikan Peralatan</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Data Dukung Kepemilkan Alat</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Lokasi Alat Saat ini</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Jarak Lokasi Alat Ke Lokasi Pekerjaan (KM)</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Bukti Kepemilikan Alat</th>
                                                                    <th style="font-size: 12px;" rowspan="2">Aksi </th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="font-size: 12px;">Milik Sendiri/Sewa</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php    } ?>

                                        <?php if ($paket_di_ikuti['sts_tenaga_ahli'] == '1') { ?>
                                            <div class="card border-primary mb-3">
                                                <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                    <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                    <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                        <a href="#" data-toggle="modal" data-target="#tambah_tenaga_ahli_tender_modal" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Tenaga Ahli</a>
                                                    <?php    } else { ?>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            Tahap Sudah Selesai
                                                        </button>
                                                    <?php    } ?>
                                                </div>

                                                <div class="card-body">
                                                    <table class="table" id="tbl_tenaga_ahli_tender">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2">No</th>
                                                                <th rowspan="2">Nama Lengkap dengan Gelar</th>
                                                                <th rowspan="2">Rencana Jabatan dalam Pekerjaan Ini</th>
                                                                <th>Kelahiran</th>
                                                                <th colspan="3">Pendidikan Formal</th>
                                                                <th colspan="3">Sertifikasi Keahlian</th>
                                                                <th colspan="2">Pengalaman</th>
                                                                <th rowspan="2">Aksi</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Tgl/Bln/Thn</th>
                                                                <th>Program Studi</th>
                                                                <th>Perguruan Tinggi/Sekolah</th>
                                                                <th>Tahun Lulus</th>
                                                                <th>Asosiasi (BSA)</th>
                                                                <th>Kualifikasi Keahlian</th>
                                                                <th>Tanggal masa berlaku</th>
                                                                <th>Jumlah Tahun</th>
                                                                <th>Jabatan Terakhir</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <?php }  ?>
                                    <?php } ?>

                                    <!-- end update 30 juni 20222 -->
                                </td>
                            </tr>
                            <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_pasca_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_pasca_file['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_pasca_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                <tr>
                                    <th style="background-color: bisque;">Penawaran Anda</th>
                                    <td>
                                        <p class="text-danger">Dokumen Kualifikasi Sudah Dikirim Saat Pendaftaran Penyedia</p>
                                        <div class="card">
                                            <div class="card-header">
                                                <label for="">Data Penawaran & Teknis,Administrasi</label>
                                            </div>
                                            <div class="card-body">
                                                <?php if ($status_kirim_data_enkrip == null) { ?>
                                                    <a href="javascript:;" class="badge badge-secondary float-right" style="font-size: small;">Status: Belum Dikirim</a>
                                                    <a href="<?= base_url('upload_dokumen') ?>" class="badge badge-secondary" style="color: white;">Kirim Dokumen Penawaran & Teknis <i class="fa fa-upload"></i></a>
                                                <?php    } else { ?>
                                                    <?php foreach ($status_kirim_data_enkrip as $key => $value) { ?>
                                                        <table id="table_krim_data">
                                                            <a href="javascript:;" onclick="byid_status_kirim_data_penawaran(<?= $value['id_kirim_status_penawaran'] ?>)" class="badge badge-danger" style="font-size: small; margin-right:10px">Revisi</a>
                                                            <a href="javascript:;" class="badge badge-info" style="font-size: small;">Status: Sudah dikirim Pada <?= date('d-m-Y H:i', strtotime($value['waktu_kirim']))  ?></a> <i class="fas fa fa-check text-success ml-2"></i>
                                                        </table>
                                                    <?php    } ?>
                                                <?php    } ?>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $paket_di_ikuti['token_vendor'] ?>" readonly style="margin-top: 10px;">
                                        <div class="bs-callout bs-callout-info">
                                            Silahkan Copy Paste Token Untuk Upload Dokumen
                                        </div>

                                    </td>
                                </tr>


                            <?php    } else { ?>
                                <tr>
                                    <th style="background-color: bisque;">Penawaran Anda</th>
                                    <td>
                                        <p class="text-danger">Dokumen Kualifikasi Sudah Dikirim Saat Pendaftaran Penyedia</p>
                                        <div class="card">
                                            <div class="card-header">
                                                <label for="">Data Penawaran & Teknis,Administrasi</label>
                                            </div>
                                            <div class="card-body">
                                                <?php if ($status_kirim_data_enkrip == null) { ?>
                                                    <a href="javascript:;" class="badge badge-secondary float-right" style="font-size: small;">Status: Belum Dikirim</a>
                                                    <a href="javascript:;" class="badge badge-danger" style="font-size: small; margin-right:10px">Waktu Sudah Habis</a>
                                                <?php    } else { ?>
                                                    <?php foreach ($status_kirim_data_enkrip as $key => $value) { ?>
                                                        <table id="table_krim_data">
                                                            <a href="javascript:;" class="badge badge-danger" style="font-size: small; margin-right:10px">Waktu Sudah Habis</a>
                                                            <a href="javascript:;" class="badge badge-info" style="font-size: small;">Status: Sudah dikirim Pada <?= date('d-m-Y H:i', strtotime($value['waktu_kirim']))  ?></a> <i class="fas fa fa-check text-success ml-2"></i>
                                                        </table>
                                                    <?php    } ?>
                                                <?php    } ?>
                                            </div>
                                        </div>
                                        <!-- <input type="text" class="form-control" value="<?= $paket_di_ikuti['token_vendor'] ?>" readonly style="margin-top: 10px;">
										<div class="bs-callout bs-callout-info">
											Silahkan Copy Paste Token Untuk Upload Dokumen
										</div> -->

                                    </td>
                                </tr>

                            <?php    } ?>

                            <?php if (date('Y-m-d H:i', strtotime($Pembuktian_Kualifikasipasca_file['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($Pembuktian_Kualifikasipasca_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($Pembuktian_Kualifikasipasca_file['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
                                <tr>
                                    <th style="background-color: bisque; width:180px">Undangan Pembuktian</th>
                                    <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_undangan_pembuktian'] ?>"><i class="fas fa-download"></i> Buka Undangan Pembuktian Kualifikasi Peserta</a><b></b></td>
                                </tr>

                            <?php    } else { ?>
                                <tr>
                                    <th style="background-color: bisque; width:180px">Undangan Pembuktian</th>
                                    <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_undangan_pembuktian'] ?>"><i class="fas fa-download"></i> Buka Undangan Pembuktian Kualifikasi Peserta</a><b></b></td>
                                </tr>

                            <?php    } ?>
                            <?php if (date('Y-m-d H:i', strtotime($peringkat_teknis_pasca_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                            <?php    } else if (date('Y-m-d H:i', strtotime($peringkat_teknis_pasca_file['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($peringkat_teknis_pasca_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>

                                <tr>
                                    <th style="background-color: bisque; width:180px">Berita Acara</th>
                                    <td>
                                        <div class="card">
                                            <div class="card-header">
                                                Berita Acara
                                            </div>
                                            <div class="body">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama File</th>
                                                        <th>File</th>
                                                        <th>Waktu Kirim</th>
                                                    </tr>
                                                    <?php $no = 1;
                                                    foreach ($get_pringkat_berita_acara as $key => $value) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $value['nama_file'] ?></td>
                                                            <td> <a href="https://eproc.jmtm.co.id/berita_acara_tender/<?= $value['file_berita_acara_peringkat'] ?>"><img src="<?= base_url('assets/img/pdf.png') ?>" width="50px" alt=""></a></td>
                                                            <td><?= $value['create_at'] ?></td>
                                                        </tr>
                                                    <?php    } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php    } else { ?>

                                <tr>
                                    <th style="background-color: bisque; width:180px">Berita Acara</th>
                                    <td>
                                        <div class="card">
                                            <div class="card-header">
                                                Berita Acara
                                            </div>
                                            <div class="body">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama File</th>
                                                        <th>File</th>
                                                        <th>Waktu Kirim</th>
                                                    </tr>
                                                    <?php $no = 1;
                                                    foreach ($get_pringkat_berita_acara as $key => $value) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $value['nama_file'] ?></td>
                                                            <td> <a href="https://eproc.jmtm.co.id/berita_acara_tender/<?= $value['file_berita_acara_peringkat'] ?>"><img src="<?= base_url('assets/img/pdf.png') ?>" width="50px" alt=""></a></td>
                                                            <td><?= $value['create_at'] ?></td>
                                                        </tr>
                                                    <?php    } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php    } ?>

                            <?php if ($get_pemenang['pemenang_tender'] == 1) { ?>

                                <?php if (date('Y-m-d H:i', strtotime($surat_penunjukanpasca_file['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

                                <?php    } else if (date('Y-m-d H:i', strtotime($surat_penunjukanpasca_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($surat_penunjukanpasca_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                    <tr>
                                        <th style="background-color: bisque; width:180px">Surat Penunjukan Langsung</th>
                                        <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_surat_penunjukan/<?= $paket_di_ikuti['surat_penunjukan'] ?>"><i class="fas fa-download"></i> Buka Surat Penunjukan Langsung Peserta</a><b></b></td>
                                    </tr>
                                <?php    } else { ?>
                                    <tr>
                                        <th style="background-color: bisque; width:180px">Surat Penunjukan Langsung</th>
                                        <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_surat_penunjukan/<?= $paket_di_ikuti['surat_penunjukan'] ?>"><i class="fas fa-download"></i> Buka Surat Penunjukan Langsung Peserta</a><b></b></td>
                                    </tr>
                                <?php    } ?>
                            <?php } else { ?>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane" id="penjelasan" role="tabpanel" aria-labelledby="tender-tab">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th class="">Kode Tender</th>
                                        <td>18556415</td>
                                    </tr>
                                    <tr>
                                        <th>Kode Tender</th>
                                        <td>Pengembangan sistem pengadaan nasional / penguatan kapasitas, infrastruktur dan cloud LPSE/ cloude data center lpse / direktorat pengembangan sistem pengadaan secara elektronik</td>
                                    </tr>
                                    <tr>
                                        <th>Sisa Waktu</th>
                                        <td>8 jam/52 menit</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } else if ($paket_di_ikuti['id_kualifikasi'] == 11 || $paket_di_ikuti['id_kualifikasi'] == 7 || $paket_di_ikuti['id_kualifikasi'] == 17) { ?>

    <div id="main" class="container">
        <div class="breadcrumb bg-primary" style="margin-top: 20px; color: white;"><a href="<?= base_url('beranda') ?>" style="color: white;">Beranda</a>&ensp;&raquo;&ensp;Informasi Tender</div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="active">
                <a class="nav-link active bg-primary text-white" id="tender-tab" data-toggle="tab" href="<?= base_url('beranda/informasi_tender/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Informasi Tender</a>
            </li>
            <li class="nav-item">
                <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/penjelasan_lelang/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Penjelasan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/sanggahan_tender/' . $paket_di_ikuti['id_paket']) ?>">Sangahan Prakualifikasi</a>
            </li>
            <?php if ($get_pemenang['nilai_pringkat_teknis'] == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/negosiasi/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Negosiasi</a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/sanggahan_tender_akhir/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Sanggahan Tender</a>
            </li>
            <?php if ($get_pemenang['pemenang_tender'] == 1) { ?>
                <li class="nav-item">
                    <a class="nav-link bg-info text-white ml-1" href="<?= base_url('beranda/mengundurkan_diri/' . $paket_di_ikuti['id_paket']) ?>" aria-controls="home" aria-selected="true">Mengundurkan Diri</a>
                </li>
            <?php } ?>

        </ul>

        <div class="tab-content">
            <!-- tender -->
            <div class="tab-pane active" id="informasi-tender" role="tabpanel" aria-labelledby="tender-tab">
                <div class="content">
                    <div class="container-fluid">
                        <?= $this->session->flashdata('error') ?>
                        <div class="row">
                            <div style="overflow-x:auto">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th style="background-color: bisque; width:250px">Kode Tender</th>
                                            <td><b><?= $paket_di_ikuti['kode_tender'] ?></b></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: bisque; width:150px">Nama Tender</th>
                                            <td>
                                                <b>
                                                    <?= $paket_di_ikuti['nama_paket'] ?>
                                                </b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: bisque; width:250px">Tahap Tender</th>
                                            <td>
                                                <a href="javascipt:;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_lihat_tahap"><img src="<?= base_url('assets/img/icon-jadwal.png') ?>" width="25px" alt=""> Lihat Tahap Tender Saat Ini</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: bisque; width:180px">Jumlah Peserta</th>
                                            <td> <a href="javascript:;" onclick="lihat_vendor_mengikuti(<?= $paket_di_ikuti['id_paket'] ?>)" class="btn btn-sm btn-primary"> <b><?= $jumlah_peserta ?> Peserta</b></a></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: bisque;">Dokumen Lelang</th>
                                            <td>
                                                <div class="row">
                                                    <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                    <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                        <div class="col-md-6">
                                                            <div class=" card border-primary mb-3">
                                                                <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Lelang
                                                                </div>
                                                                <div class="card-body">
                                                                    <table class="table table table-striped">
                                                                        <?php foreach ($get_pdf_dokumen_kualifikasi_lelang as $key => $value) { ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <a target="_blank" href="https://eproc.jmtm.co.id/file_dokumen_lelang/<?= $value['file_dokumen_lelang'] ?>"><?= $value['nama_dokumen_lelang'] ?><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4"></a>
                                                                                </td>
                                                                                <td><label for="" class="ml-3"> Di Kirim : <?= $value['create_file_lelang'] ?></label></td>
                                                                            </tr>
                                                                        <?php    } ?>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php    } else { ?>
                                                        <div class="col-md-6">
                                                            <div class=" card border-primary mb-3">
                                                                <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Lelang
                                                                </div>
                                                                <div class="card-body">
                                                                    <table class="table table table-striped">
                                                                        <?php foreach ($get_pdf_dokumen_kualifikasi_lelang as $key => $value) { ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <a target="_blank" href="https://eproc.jmtm.co.id/file_dokumen_lelang/<?= $value['file_dokumen_lelang'] ?>"><?= $value['nama_dokumen_lelang'] ?><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4"></a>
                                                                                </td>
                                                                                <td><label for="" class="ml-3"> Di Kirim : <?= $value['create_file_lelang'] ?></label></td>
                                                                            </tr>
                                                                        <?php    } ?>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php    } ?>
                                                    <div class="col-md-6">
                                                        <div class=" card border-primary mb-3">
                                                            <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">Dokumen Prakualifikasi
                                                            </div>
                                                            <div class="card-body">
                                                                <table class="table table table-striped">
                                                                    <?php foreach ($get_pdf_dokumen_kualifikasi as $key => $value) { ?>
                                                                        <tr>
                                                                            <td>
                                                                                <a target="_blank" href="https://eproc.jmtm.co.id/dokumen_file_dokumen_kualifikasi_pdf/<?= $value['file_dokumen_kualifikasi_pdf'] ?>"><?= $value['nama_dokumen_kualifikasi_pdf'] ?><img src="<?= base_url('assets/img/pdfku.png') ?>" style="width: 20px;" alt="" class="ml-4"></a>
                                                                            </td>
                                                                            <td><label for="" class="ml-3"> Di Kirim : <?= $value['create_at'] ?></label></td>
                                                                        </tr>
                                                                    <?php    } ?>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <?php if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                <?php    } else if (date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_dokumen_prakualifikasi_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                    <div class="card border-primary mb-3">
                                                        <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                            Persyaratan Tambahan
                                                        </div>
                                                        <div class="card-body">
                                                            <table class="table">
                                                                <tr>
                                                                    <th>Nama Persyaratan</th>
                                                                    <th>Keterangan</th>
                                                                    <th>File</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                                <?php foreach ($persyaratan_tambahan as $key => $value) { ?>
                                                                    <tr>
                                                                        <input type="hidden" value="<?= $value['nama_persyaratan'] ?>" name="nama_persyaratan_tambahan">
                                                                        <td><?= $value['nama_persyaratan'] ?></td>
                                                                        <input type="hidden" value="<?= $value['keterangan'] ?>">
                                                                        <td><?= $value['keterangan'] ?></td>
                                                                        <td>
                                                                            <?php
                                                                            if ($value['file_persyaratan_tambahan'] == NULL) { ?>
                                                                                <p>Tidak ada File</p>
                                                                            <?php } else { ?>
                                                                                <a target="_blank" href="https://eproc.jmtm.co.id/file_persyaratan_tambahan/<?= $value['file_persyaratan_tambahan'] ?>"> <img src="<?= base_url('assets/img/file-icon.png') ?>" style="width: 30px;" alt=""></a>

                                                                            <?php } ?>
                                                                        </td>

                                                                        <td>
                                                                            <a href="javascript:;" style="text-decoration: none; color:white;" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#modalPersyaratanTambahan<?= $value['id_persyaratan_tender'] ?>"><i style="color: white;" class="fas fa-download"></i> UPLOAD</a>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="card border-primary mb-3">
                                                        <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                            File Yang Sudah Di Upload <div class="text-default"><i class="fa fa-check"></i></div>
                                                        </div>
                                                        <div class="card-body">
                                                            <table class="table">
                                                                <tr>
                                                                    <th>Nama Persyaratan</th>
                                                                    <th>Keterangan</th>
                                                                    <th>File</th>
                                                                    <th>Status</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                                <?php foreach ($uploaded_file as $key => $value) { ?>
                                                                    <tr>
                                                                        <input type="hidden" value="<?= $value['nama_persyaratan_tambahan'] ?>" name="nama_persyaratan_tambahan">
                                                                        <td><?= $value['nama_persyaratan_tambahan'] ?></td>
                                                                        <input type="hidden" value="<?= $value['keterangan_persyaratan_tambahan'] ?>">
                                                                        <td><?= $value['keterangan_persyaratan_tambahan'] ?></td>
                                                                        <td>
                                                                            <a target="_blank" href="<?= base_url() ?>file_persyaratan_tambahan/<?= $value['file_persyaratan_tambahan'] ?>"> <img src="<?= base_url('assets/img/file-icon.png') ?>" style="width: 20px;" alt=""></a>
                                                                        </td>
                                                                        <td> <?php if ($value['status_lengkap'] == 'tidak lulus') { ?>
                                                                                <a href="javascript:;" onclick="lihat_alasan_tidak_lulus_dokumen(<?= $value['id_paket'] ?>)" id="lihat_alasan_tidak_lulus_dokumen" class="badge badge-danger">Syarat Blom Terpenuhi / Lihat Alasan</a>
                                                                            <?php } else if ($value['status_lengkap'] == 'lulus') { ?>
                                                                                <label for="" class="badge badge-success">Syarat Dokumen Sudah Terpenuhi</label>
                                                                            <?php } else { ?>
                                                                                <label for="" class="badge badge-warning">Belum Diperiksa</label>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?= base_url('beranda/hapus_uploaded_file/' . $value['id_persyaratan_tambahan']) ?>/<?= $paket_di_ikuti['id_paket'] ?>">
                                                                                <div class="text-danger"><i class="fa fa-trash-alt"></i></div>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- update 30 juni 20222 -->
                                                    <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                    <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                        <?php if ($paket_di_ikuti['sts_peralatan'] == '1') { ?>
                                                            <div class="card border-primary mb-3">
                                                                <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                                    <!-- Button trigger modal -->

                                                                    <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                                    <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_peralatan">
                                                                            <i class="fa fa-plus"></i> Tambah Peralatan
                                                                        </button>
                                                                    <?php    } else { ?>
                                                                        <button type="button" class="btn btn-danger btn-sm">
                                                                            Tahap Sudah Selesai
                                                                        </button>
                                                                    <?php    } ?>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div style="overflow-x: true;">
                                                                        <table class="table" id="tbl_peralatan_tender">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="font-size: 12px;" rowspan="2">No</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Jenis Peralatan</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Merk Dan Tipe</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Jumlah Peralatan</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Kapasitas Produksi</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Tahun Pembuatan Peralatan</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Volume dan Satuan</th>
                                                                                    <th>Status Kepemilikan Peralatan</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Data Dukung Kepemilkan Alat</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Lokasi Alat Saat ini</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Jarak Lokasi Alat Ke Lokasi Pekerjaan (KM)</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Bukti Kepemilikan Alat</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Aksi </th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th style="font-size: 12px;">Milik Sendiri/Sewa</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php    } ?>
                                                        <?php if ($paket_di_ikuti['sts_tenaga_ahli'] == '1') { ?>
                                                            <div class="card border-primary mb-3">
                                                                <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                                    <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                                    <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                                        <a href="#" data-toggle="modal" data-target="#tambah_tenaga_ahli_tender_modal" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Tenaga Ahli</a>
                                                                    <?php    } else { ?>
                                                                        <button type="button" class="btn btn-danger btn-sm">
                                                                            Tahap Sudah Selesai
                                                                        </button>
                                                                    <?php    } ?>
                                                                </div>

                                                                <div class="card-body">
                                                                    <table class="table" id="tbl_tenaga_ahli_tender">
                                                                        <thead>
                                                                            <tr>
                                                                                <th rowspan="2">No</th>
                                                                                <th rowspan="2">Nama Lengkap dengan Gelar</th>
                                                                                <th rowspan="2">Rencana Jabatan dalam Pekerjaan Ini</th>
                                                                                <th>Kelahiran</th>
                                                                                <th colspan="3">Pendidikan Formal</th>
                                                                                <th colspan="3">Sertifikasi Keahlian</th>
                                                                                <th colspan="2">Pengalaman</th>
                                                                                <th rowspan="2">Aksi</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Tgl/Bln/Thn</th>
                                                                                <th>Program Studi</th>
                                                                                <th>Perguruan Tinggi/Sekolah</th>
                                                                                <th>Tahun Lulus</th>
                                                                                <th>Asosiasi (BSA)</th>
                                                                                <th>Kualifikasi Keahlian</th>
                                                                                <th>Tanggal masa berlaku</th>
                                                                                <th>Jumlah Tahun</th>
                                                                                <th>Jabatan Terakhir</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody></tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        <?php }  ?>
                                                    <?php } else { ?>
                                                        <?php if ($paket_di_ikuti['sts_peralatan'] == '1') { ?>
                                                            <div class="card border-primary mb-3">
                                                                <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                                    <!-- Button trigger modal -->

                                                                    <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                                    <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_peralatan">
                                                                            <i class="fa fa-plus"></i> Tambah Peralatan
                                                                        </button>
                                                                    <?php    } else { ?>
                                                                        <button type="button" class="btn btn-danger btn-sm">
                                                                            Tahap Sudah Selesai
                                                                        </button>
                                                                    <?php    } ?>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div style="overflow-x: true;">
                                                                        <table class="table" id="tbl_peralatan_tender">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="font-size: 12px;" rowspan="2">No</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Jenis Peralatan</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Merk Dan Tipe</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Jumlah Peralatan</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Kapasitas Produksi</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Tahun Pembuatan Peralatan</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Volume dan Satuan</th>
                                                                                    <th>Status Kepemilikan Peralatan</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Data Dukung Kepemilkan Alat</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Lokasi Alat Saat ini</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Jarak Lokasi Alat Ke Lokasi Pekerjaan (KM)</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Bukti Kepemilikan Alat</th>
                                                                                    <th style="font-size: 12px;" rowspan="2">Aksi </th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th style="font-size: 12px;">Milik Sendiri/Sewa</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php    } ?>

                                                        <?php if ($paket_di_ikuti['sts_tenaga_ahli'] == '1') { ?>
                                                            <div class="card border-primary mb-3">
                                                                <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                                    <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                                    <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                                        <a href="#" data-toggle="modal" data-target="#tambah_tenaga_ahli_tender_modal" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Tenaga Ahli</a>
                                                                    <?php    } else { ?>
                                                                        <button type="button" class="btn btn-danger btn-sm">
                                                                            Tahap Sudah Selesai
                                                                        </button>
                                                                    <?php    } ?>
                                                                </div>

                                                                <div class="card-body">
                                                                    <table class="table" id="tbl_tenaga_ahli_tender">
                                                                        <thead>
                                                                            <tr>
                                                                                <th rowspan="2">No</th>
                                                                                <th rowspan="2">Nama Lengkap dengan Gelar</th>
                                                                                <th rowspan="2">Rencana Jabatan dalam Pekerjaan Ini</th>
                                                                                <th>Kelahiran</th>
                                                                                <th colspan="3">Pendidikan Formal</th>
                                                                                <th colspan="3">Sertifikasi Keahlian</th>
                                                                                <th colspan="2">Pengalaman</th>
                                                                                <th rowspan="2">Aksi</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Tgl/Bln/Thn</th>
                                                                                <th>Program Studi</th>
                                                                                <th>Perguruan Tinggi/Sekolah</th>
                                                                                <th>Tahun Lulus</th>
                                                                                <th>Asosiasi (BSA)</th>
                                                                                <th>Kualifikasi Keahlian</th>
                                                                                <th>Tanggal masa berlaku</th>
                                                                                <th>Jumlah Tahun</th>
                                                                                <th>Jabatan Terakhir</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody></tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        <?php }  ?>
                                                    <?php } ?>

                                                    <!-- end update 30 juni 20222 -->
                                                <?php    } else { ?>
                                                    <div class="card border-primary mb-3">
                                                        <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                            Persyaratan Tambahan
                                                        </div>
                                                        <div class="card-body">
                                                            <table class="table">
                                                                <tr>
                                                                    <th>Nama Persyaratan</th>
                                                                    <th>Keterangan</th>
                                                                    <th>File</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                                <?php foreach ($persyaratan_tambahan as $key => $value) { ?>
                                                                    <tr>
                                                                        <input type="hidden" value="<?= $value['nama_persyaratan'] ?>" name="nama_persyaratan_tambahan">
                                                                        <td><?= $value['nama_persyaratan'] ?></td>
                                                                        <input type="hidden" value="<?= $value['keterangan'] ?>">
                                                                        <td><?= $value['keterangan'] ?></td>
                                                                        <td>
                                                                            <?php
                                                                            if ($value['file_persyaratan_tambahan'] == NULL) { ?>
                                                                                <p>Tidak ada File</p>
                                                                            <?php } else { ?>
                                                                                <a target="_blank" href="https://eproc.jmtm.co.id/file_persyaratan_tambahan/<?= $value['file_persyaratan_tambahan'] ?>"> <img src="<?= base_url('assets/img/file-icon.png') ?>" style="width: 30px;" alt=""></a>

                                                                            <?php } ?>
                                                                        </td>
                                                                        <td>
                                                                            <label for="" class="badge badge-success"><i class="fas fa fa-check"></i>Tahap Sudah Selesai</label>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="card border-primary mb-3">
                                                        <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                            File Yang Sudah Di Upload <div class="text-default"><i class="fa fa-check"></i></div>
                                                        </div>
                                                        <div class="card-body">
                                                            <table class="table">
                                                                <tr>
                                                                    <th>Nama Persyaratan</th>
                                                                    <th>Keterangan</th>
                                                                    <th>File</th>
                                                                    <th>Status</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                                <?php foreach ($uploaded_file as $key => $value) { ?>
                                                                    <tr>
                                                                        <input type="hidden" value="<?= $value['nama_persyaratan_tambahan'] ?>" name="nama_persyaratan_tambahan">
                                                                        <td><?= $value['nama_persyaratan_tambahan'] ?></td>
                                                                        <input type="hidden" value="<?= $value['keterangan_persyaratan_tambahan'] ?>">
                                                                        <td><?= $value['keterangan_persyaratan_tambahan'] ?></td>
                                                                        <td>
                                                                            <a target="_blank" href="<?= base_url() ?>file_persyaratan_tambahan/<?= $value['file_persyaratan_tambahan'] ?>"> <img src="<?= base_url('assets/img/file-icon.png') ?>" style="width: 20px;" alt=""></a>
                                                                        </td>
                                                                        <td> <?php if ($value['status_lengkap'] == 'tidak lulus') { ?>
                                                                                <a href="javascript:;" onclick="lihat_alasan_tidak_lulus_dokumen(<?= $value['id_paket'] ?>)" id="lihat_alasan_tidak_lulus_dokumen" class="badge badge-danger">Syarat Blom Terpenuhi / Lihat Alasan</a>
                                                                            <?php } else if ($value['status_lengkap'] == 'lulus') { ?>
                                                                                <label for="" class="badge badge-success">Syarat Dokumen Sudah Terpenuhi</label>
                                                                            <?php } else { ?>
                                                                                <label for="" class="badge badge-warning">Belum Diperiksa</label>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <td>
                                                                            <label for="" class="badge badge-success"><i class="fas fa fa-check"></i>Tahap Sudah Selesai</label>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- update 30 juni 20222 -->
                                                    <?php if ($paket_di_ikuti['sts_peralatan'] == '1') { ?>
                                                        <div class="card border-primary mb-3">
                                                            <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                                <!-- Button trigger modal -->

                                                                <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                                <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_peralatan">
                                                                        <i class="fa fa-plus"></i> Tambah Peralatan
                                                                    </button>
                                                                <?php    } else { ?>
                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                        Tahap Sudah Selesai
                                                                    </button>
                                                                <?php    } ?>
                                                            </div>
                                                            <div class="card-body">
                                                                <div style="overflow-x: true;">
                                                                    <table class="table" id="tbl_peralatan_tender">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="font-size: 12px;" rowspan="2">No</th>
                                                                                <th style="font-size: 12px;" rowspan="2">Jenis Peralatan</th>
                                                                                <th style="font-size: 12px;" rowspan="2">Merk Dan Tipe</th>
                                                                                <th style="font-size: 12px;" rowspan="2">Jumlah Peralatan</th>
                                                                                <th style="font-size: 12px;" rowspan="2">Kapasitas Produksi</th>
                                                                                <th style="font-size: 12px;" rowspan="2">Tahun Pembuatan Peralatan</th>
                                                                                <th style="font-size: 12px;" rowspan="2">Volume dan Satuan</th>
                                                                                <th>Status Kepemilikan Peralatan</th>
                                                                                <th style="font-size: 12px;" rowspan="2">Data Dukung Kepemilkan Alat</th>
                                                                                <th style="font-size: 12px;" rowspan="2">Lokasi Alat Saat ini</th>
                                                                                <th style="font-size: 12px;" rowspan="2">Jarak Lokasi Alat Ke Lokasi Pekerjaan (KM)</th>
                                                                                <th style="font-size: 12px;" rowspan="2">Bukti Kepemilikan Alat</th>
                                                                                <th style="font-size: 12px;" rowspan="2">Aksi </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="font-size: 12px;">Milik Sendiri/Sewa</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php    } ?>

                                                    <?php if ($paket_di_ikuti['sts_tenaga_ahli'] == '1') { ?>
                                                        <div class="card border-primary mb-3">


                                                            <div class="card-header bg-primary" style="color: white;display: flex; justify-content:space-between;">
                                                                <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                                <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                                    <a href="#" data-toggle="modal" data-target="#tambah_tenaga_ahli_tender_modal" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Tenaga Ahli</a>
                                                                <?php    } else { ?>
                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                        Tahap Sudah Selesai
                                                                    </button>
                                                                <?php    } ?>
                                                            </div>

                                                            <div class="card-body">
                                                                <table class="table" id="tbl_tenaga_ahli_tender">
                                                                    <thead>
                                                                        <tr>
                                                                            <th rowspan="2">No</th>
                                                                            <th rowspan="2">Nama Lengkap dengan Gelar</th>
                                                                            <th rowspan="2">Rencana Jabatan dalam Pekerjaan Ini</th>
                                                                            <th>Kelahiran</th>
                                                                            <th colspan="3">Pendidikan Formal</th>
                                                                            <th colspan="3">Sertifikasi Keahlian</th>
                                                                            <th colspan="2">Pengalaman</th>
                                                                            <th rowspan="2">Aksi</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Tgl/Bln/Thn</th>
                                                                            <th>Program Studi</th>
                                                                            <th>Perguruan Tinggi/Sekolah</th>
                                                                            <th>Tahun Lulus</th>
                                                                            <th>Asosiasi (BSA)</th>
                                                                            <th>Kualifikasi Keahlian</th>
                                                                            <th>Tanggal masa berlaku</th>
                                                                            <th>Jumlah Tahun</th>
                                                                            <th>Jabatan Terakhir</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody></tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    <?php }  ?>

                                                    <!-- end update 30 juni 20222 -->
                                                <?php    } ?>
                                            </td>
                                        </tr>
                                        <?php if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

                                        <?php    } else if (date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($upload_penawaran_2_file['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
                                            <tr>
                                                <th style="background-color: bisque;">Penawaran Anda</th>
                                                <?php if ($cek_gugur['nilai_prakualifikasi'] == 0 || $cek_gugur['status_evaluasi_syarat_tambahan'] == 0) { ?>

                                                <?php } else { ?>
                                                    <td>
                                                        <p class="text-danger">Dokumen Kualifikasi Sudah Dikirim Saat Pendaftaran Penyedia</p>
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <label for="">Data Penawaran & Teknis,Administrasi</label>
                                                            </div>
                                                            <div class="card-body">
                                                                <?php if ($status_kirim_data_enkrip == null) { ?>
                                                                    <a href="javascript:;" class="badge badge-secondary float-right" style="font-size: small;">Status: Belum Dikirim</a>
                                                                    <a href="<?= base_url('upload_dokumen') ?>" class="badge badge-secondary" style="color: white;">Kirim Dokumen Penawaran & Teknis <i class="fa fa-upload"></i></a>
                                                                <?php    } else { ?>
                                                                    <?php foreach ($status_kirim_data_enkrip as $key => $value) { ?>
                                                                        <table id="table_krim_data">
                                                                            <a href="javascript:;" onclick="byid_status_kirim_data_penawaran(<?= $value['id_kirim_status_penawaran'] ?>)" class="badge badge-danger" style="font-size: small; margin-right:10px">Revisi</a>
                                                                            <a href="javascript:;" class="badge badge-info" style="font-size: small;">Status: Sudah dikirim Pada <?= date('d-m-Y H:i', strtotime($value['waktu_kirim']))  ?></a> <i class="fas fa fa-check text-success ml-2"></i>
                                                                        </table>
                                                                    <?php    } ?>
                                                                <?php    } ?>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="<?= $paket_di_ikuti['token_vendor'] ?>" readonly style="margin-top: 10px;">
                                                        <div class="bs-callout bs-callout-info">
                                                            Silahkan Copy Paste Token Untuk Upload Dokumen
                                                        </div>

                                                    </td>
                                                <?php } ?>

                                            </tr>


                                        <?php    } else { ?>
                                            <tr>
                                                <th style="background-color: bisque;">Penawaran Anda</th>
                                                <?php if ($cek_gugur['nilai_prakualifikasi'] == 0 || $cek_gugur['status_evaluasi_syarat_tambahan'] == 0) { ?>

                                                <?php } else { ?>
                                                    <td>
                                                        <p class="text-danger">Dokumen Kualifikasi Sudah Dikirim Saat Pendaftaran Penyedia</p>
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <label for="">Data Penawaran & Teknis,Administrasi</label>
                                                            </div>
                                                            <div class="card-body">
                                                                <?php if ($status_kirim_data_enkrip == null) { ?>
                                                                    <a href="javascript:;" class="badge badge-secondary float-right" style="font-size: small;">Status: Belum Dikirim</a>
                                                                    <a href="javascript:;" class="badge badge-danger" style="font-size: small; margin-right:10px">Waktu Sudah Habis</a>
                                                                <?php    } else { ?>
                                                                    <?php foreach ($status_kirim_data_enkrip as $key => $value) { ?>
                                                                        <table id="table_krim_data">
                                                                            <a href="javascript:;" class="badge badge-danger" style="font-size: small; margin-right:10px">Waktu Sudah Habis</a>
                                                                            <a href="javascript:;" class="badge badge-info" style="font-size: small;">Status: Sudah dikirim Pada <?= date('d-m-Y H:i', strtotime($value['waktu_kirim']))  ?></a> <i class="fas fa fa-check text-success ml-2"></i>
                                                                        </table>
                                                                    <?php    } ?>
                                                                <?php    } ?>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" value="<?= $paket_di_ikuti['token_vendor'] ?>" readonly style="margin-top: 10px;">
                                                        <div class="bs-callout bs-callout-info">
                                                            Silahkan Copy Paste Token Untuk Upload Dokumen
                                                        </div>

                                                    </td>
                                                <?php } ?>

                                            </tr>

                                        <?php    } ?>

                                        <?php if (date('Y-m-d H:i', strtotime($Pembuktian_Kualifikasi2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                        <?php    } else if (date('Y-m-d H:i', strtotime($Pembuktian_Kualifikasi2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($Pembuktian_Kualifikasi2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                            <tr>
                                                <th style="background-color: bisque; width:180px">Undangan Pembuktian</th>
                                                <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_undangan_pembuktian'] ?>"><i class="fas fa-download"></i> Buka Undangan Pembuktian Kualifikasi Peserta</a><b></b></td>
                                            </tr>

                                        <?php    } else { ?>
                                            <tr>
                                                <th style="background-color: bisque; width:180px">Undangan Pembuktian</th>
                                                <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_undangan_pembuktian'] ?>"><i class="fas fa-download"></i> Buka Undangan Pembuktian Kualifikasi Peserta</a><b></b></td>
                                            </tr>

                                        <?php    } ?>

                                        <?php if (date('Y-m-d H:i', strtotime($pengumuman_hasil_prakualfikasi_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                        <?php    } else if (date('Y-m-d H:i', strtotime($pengumuman_hasil_prakualfikasi_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($pengumuman_hasil_prakualfikasi_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                            <tr>
                                                <th style="background-color: bisque; width:180px">Pengumuman Hasil Prakualifikasi</th>
                                                <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_pengumuman_hasil_prakualifikasi'] ?>"><i class="fas fa-download"></i> Buka Pengumuman Hasil Prakualifikasi Peserta</a><b></b></td>
                                            </tr>
                                        <?php    } else { ?>
                                            <tr>
                                                <th style="background-color: bisque; width:180px">Pengumuman Hasil Prakualifikasi</th>
                                                <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_pengumuman_hasil_prakualifikasi'] ?>"><i class="fas fa-download"></i> Buka Pengumuman Hasil Prakualifikasi Peserta</a><b></b></td>
                                            </tr>
                                        <?php    } ?>

                                        <!-- 8 september -->
                                        <?php if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                        <?php    } else if (date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($get_tahap_dokumen_pemilihan_2_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                            <tr>
                                                <th style="background-color: bisque; width:180px">Undangan Penawaran</th>
                                                <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_penawaran/<?= $paket_di_ikuti['undangan_penawaran'] ?>"><i class="fas fa-download"></i> Buka Undangan Penawaran Peserta</a><b></b></td>
                                            </tr>
                                        <?php    } else { ?>
                                            <tr>
                                                <th style="background-color: bisque; width:180px">Undangan Penawaran</th>
                                                <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_penawaran/<?= $paket_di_ikuti['undangan_penawaran'] ?>"><i class="fas fa-download"></i> Buka Undangan Penawaran Peserta</a><b></b></td>
                                            </tr>
                                        <?php    } ?>
                                        <!-- end 8 september -->

                                        <?php if ($cek_gugur['nilai_prakualifikasi'] == 0 || $cek_gugur['status_evaluasi_syarat_tambahan'] == 0) { ?>

                                        <?php } else { ?>
                                            <tr>
                                                <th style="background-color: bisque; width:180px">Berita Acara </th>
                                                <td>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            Berita Acara
                                                        </div>
                                                        <div class="body">
                                                            <table class="table table-striped">
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Nama File</th>
                                                                    <th>File</th>
                                                                    <th>Waktu Kirim</th>
                                                                </tr>
                                                                <?php $no = 1;
                                                                foreach ($get_pringkat_berita_acara as $key => $value) { ?>
                                                                    <tr>
                                                                        <td><?= $no++ ?></td>
                                                                        <td><?= $value['nama_file'] ?></td>
                                                                        <td> <a href="https://eproc.jmtm.co.id/berita_acara_tender/<?= $value['file_berita_acara_peringkat'] ?>"><img src="<?= base_url('assets/img/pdf.png') ?>" width="50px" alt=""></a></td>
                                                                        <td><?= $value['create_at'] ?></td>
                                                                    </tr>
                                                                <?php    } ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if (date('Y-m-d H:i', strtotime($peringkat_teknis_pasca_file['tanggal_mulai_jadwal'])) >= date('Y-m-d H:i')) { ?>

                                        <?php    } else if (date('Y-m-d H:i', strtotime($peringkat_teknis_pasca_file['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($peringkat_teknis_pasca_file['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>

                                            <tr>
                                                <th style="background-color: bisque; width:180px">Berita Acara</th>
                                                <td>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            Berita Acara
                                                        </div>
                                                        <div class="body">
                                                            <table class="table table-striped">
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Nama File</th>
                                                                    <th>File</th>
                                                                    <th>Waktu Kirim</th>
                                                                </tr>
                                                                <?php $no = 1;
                                                                foreach ($get_pringkat_berita_acara as $key => $value) { ?>
                                                                    <tr>
                                                                        <td><?= $no++ ?></td>
                                                                        <td><?= $value['nama_file'] ?></td>
                                                                        <td> <a href="https://eproc.jmtm.co.id/berita_acara_tender/<?= $value['file_berita_acara_peringkat'] ?>"><img src="<?= base_url('assets/img/pdf.png') ?>" width="50px" alt=""></a></td>
                                                                        <td><?= $value['create_at'] ?></td>
                                                                    </tr>
                                                                <?php    } ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php    } else { ?>

                                            <tr>
                                                <th style="background-color: bisque; width:180px">Berita Acara</th>
                                                <td>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            Berita Acara
                                                        </div>
                                                        <div class="body">
                                                            <table class="table table-striped">
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Nama File</th>
                                                                    <th>File</th>
                                                                    <th>Waktu Kirim</th>
                                                                </tr>
                                                                <?php $no = 1;
                                                                foreach ($get_pringkat_berita_acara as $key => $value) { ?>
                                                                    <tr>
                                                                        <td><?= $no++ ?></td>
                                                                        <td><?= $value['nama_file'] ?></td>
                                                                        <td> <a href="https://eproc.jmtm.co.id/berita_acara_tender/<?= $value['file_berita_acara_peringkat'] ?>"><img src="<?= base_url('assets/img/pdf.png') ?>" width="50px" alt=""></a></td>
                                                                        <td><?= $value['create_at'] ?></td>
                                                                    </tr>
                                                                <?php    } ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php    } ?>

                                        <?php if ($paket_di_ikuti['id_kualifikasi'] == 7 || $paket_di_ikuti['id_kualifikasi'] == 11 || $paket_di_ikuti['id_kualifikasi'] == 17) { ?>

                                            <?php if ($get_pemenang['pemenang_tender'] == 1) { ?>

                                                <?php if (date('Y-m-d H:i', strtotime($surat_penunjukan2_file_seleksi_penunjukan_ka_nya_2['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                <?php    } else if (date('Y-m-d H:i', strtotime($surat_penunjukan2_file_seleksi_penunjukan_ka_nya_2['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($surat_penunjukan2_file_seleksi_penunjukan_ka_nya_2['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                    <tr>
                                                        <th style="background-color: bisque; width:180px">Surat Penunjukan Langsung</th>
                                                        <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_pengumuman_hasil_prakualifikasi'] ?>"><i class="fas fa-download"></i> Buka Surat Penunjukan Langsung Peserta</a><b></b></td>
                                                    </tr>
                                                <?php    } else { ?>
                                                    <tr>
                                                        <th style="background-color: bisque; width:180px">Surat Penunjukan Langsung</th>
                                                        <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_pengumuman_hasil_prakualifikasi'] ?>"><i class="fas fa-download"></i> Buka Surat Penunjukan Langsung Peserta</a><b></b></td>
                                                    </tr>
                                                <?php    } ?>
                                            <?php } else { ?>

                                            <?php } ?>
                                        <?php    } else { ?>

                                            <?php if ($get_pemenang['pemenang_tender'] == 1) { ?>

                                                <?php if (date('Y-m-d H:i', strtotime($surat_penunjukan2_file_seleksi['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>

                                                <?php    } else if (date('Y-m-d H:i', strtotime($surat_penunjukan2_file_seleksi['tanggal_selesai_jadwal']))  >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($surat_penunjukan2_file_seleksi['tanggal_mulai_jadwal']))  == date('Y-m-d H:i')) { ?>
                                                    <tr>
                                                        <th style="background-color: bisque; width:180px">Surat Penunjukan Langsung</th>
                                                        <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_pengumuman_hasil_prakualifikasi'] ?>"><i class="fas fa-download"></i> Buka Surat Penunjukan Langsung Peserta</a><b></b></td>
                                                    </tr>
                                                <?php    } else { ?>
                                                    <tr>
                                                        <th style="background-color: bisque; width:180px">Surat Penunjukan Langsung</th>
                                                        <td> <a target="blank_" class="btn btn-primary btn-sm" href="https://eproc.jmtm.co.id/file_undangan_pembuktian/<?= $paket_di_ikuti['dokumen_pengumuman_hasil_prakualifikasi'] ?>"><i class="fas fa-download"></i> Buka Surat Penunjukan Langsung Peserta</a><b></b></td>
                                                    </tr>
                                                <?php    } ?>
                                            <?php } else { ?>

                                            <?php } ?>
                                        <?php     } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="penjelasan" role="tabpanel" aria-labelledby="tender-tab">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th class="">Kode Tender</th>
                                        <td>18556415</td>
                                    </tr>
                                    <tr>
                                        <th>Kode Tender</th>
                                        <td>Pengembangan sistem pengadaan nasional / penguatan kapasitas, infrastruktur dan cloud LPSE/ cloude data center lpse / direktorat pengembangan sistem pengadaan secara elektronik</td>
                                    </tr>
                                    <tr>
                                        <th>Sisa Waktu</th>
                                        <td>8 jam/52 menit</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>

<?php } ?>

<!-- modal detail -->
<div class="modal fade" id="modal_download_dokumen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Dokumen Pemilihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Dokumen </th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody id="get_syarat_kulidikasi">
                                <?php foreach ($get_all_dokumen_perisapan as $key => $value) { ?>
                                    <tr>
                                        <td> <img src="<?= base_url('assets/img/pdf.png') ?>" width="50px" alt=""> <?= $value['nama_file_dokumen_rencana'] ?></td>
                                        <td><a href="https://jmtm-admin.kintekindo.net/dokumen_rencana_pemilihan_file/<?= $value['file_dokumen_persiapan'] ?>"> <i class="fas fa-download"></i> DOWNLOAD</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <label id="backuuu">
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_lihat_tahap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Tahap Tender Saat Ini</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="formData">
                    <div style="overflow-x: auto;">
                        <table class="table table-hover" style="background: rgb(249,249,249);
background: linear-gradient(63deg, rgba(249,249,249,0.9500175070028011) 15%, rgba(64,247,236,0.5018382352941176) 61%, rgba(26,90,247,0.4290091036414566) 77%);">
                            <tr>
                                <th>No</th>
                                <th>Nama Tahap</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Diubah Oleh</th>
                                <th>Alasan Perubahan</th>
                            </tr>
                            <?php $i = 1;
                            foreach ($jadwal_tahap1 as $jadwal) { ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td>
                                        <?php if (date('Y-m-d H:i', strtotime($jadwal['tanggal_mulai_jadwal']))  >= date('Y-m-d H:i')) { ?>
                                            <b class="text-secondary"> <?= $jadwal['nama_jadwal_tender'] ?></b>
                                        <?php    } else if (date('Y-m-d H:i', strtotime($jadwal['tanggal_selesai_jadwal'])) >= date('Y-m-d H:i') || date('Y-m-d H:i', strtotime($jadwal['tanggal_mulai_jadwal'])) == date('Y-m-d H:i')) { ?>
                                            <b class="text-danger"> <?= $jadwal['nama_jadwal_tender'] ?> <small class="badge badge-danger">Tahap Sedang Berlangsung</small></b>
                                        <?php    } else { ?>

                                            <b class="text-success"> <?= $jadwal['nama_jadwal_tender'] ?> <small class="badge badge-success">Tahap Sudah Selesai <i class="fa fa-check"></i> </small></b>
                                        <?php    } ?>
                                    </td>
                                    <td><?php if ($jadwal['tanggal_mulai_jadwal'] >= date('d-m-Y H:i')) { ?>
                                            <b><?= date('d F Y H:i', strtotime($jadwal['tanggal_mulai_jadwal']))  ?> </b>
                                        <?php    } else if ($jadwal['tanggal_selesai_jadwal']  >= date('d-m-Y H:i')) { ?>
                                            <b><?= date('d F Y H:i', strtotime($jadwal['tanggal_mulai_jadwal']))  ?> </b>
                                        <?php    } else { ?>

                                            <b><?= date('d F Y H:i', strtotime($jadwal['tanggal_mulai_jadwal']))  ?> </b>
                                        <?php    } ?>
                                    </td>
                                    <td>
                                        <?php if ($jadwal['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
                                            <b><?= date('d F Y H:i', strtotime($jadwal['tanggal_selesai_jadwal'])) ?></b>
                                        <?php    } else if ($jadwal['tanggal_selesai_jadwal'] >= date('d-m-Y H:i')) { ?>
                                            <b><?= date('d F Y H:i', strtotime($jadwal['tanggal_selesai_jadwal'])) ?></b>
                                        <?php    } else { ?>
                                            <b><?= date('d F Y H:i', strtotime($jadwal['tanggal_selesai_jadwal'])) ?></b>
                                        <?php    } ?>
                                    </td>
                                    <td>
                                        <?php if ($jadwal['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
                                            <b><?= $jadwal['user_created'] ?></b>
                                        <?php    } else if ($jadwal['tanggal_selesai_jadwal'] >= date('d-m-Y H:i')) { ?>
                                            <b><?= $jadwal['user_created'] ?></b>
                                        <?php    } else { ?>
                                            <b><?= $jadwal['user_created'] ?></b>
                                        <?php    } ?>
                                    </td>
                                    <td>
                                        <?php if ($jadwal['tanggal_mulai_jadwal']  >= date('d-m-Y H:i')) { ?>
                                            <b><?= $jadwal['alasan_perubahan'] ?></b>
                                        <?php    } else if ($jadwal['tanggal_selesai_jadwal'] >= date('d-m-Y H:i')) { ?>
                                            <b><?= $jadwal['alasan_perubahan'] ?></b>
                                        <?php    } else { ?>
                                            <b><?= $jadwal['alasan_perubahan'] ?></b>
                                        <?php    } ?>
                                    </td>
                                <?php } ?>
                        </table>
                    </div>
                    <div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($persyaratan_tambahan as $key => $value) { ?>
    <div class="modal fade" id="modalPersyaratanTambahan<?= $value['id_persyaratan_tender'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Persyaratan Tambahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('beranda/upload_persyaratan_tambahan/' . $paket_di_ikuti['id_paket']) ?>
                <div class="modal-body">
                    <label for=""><b> Nama Persyaratan Tambahan</b></label>
                    <input type="text" class="form-control" value="<?= $value['nama_persyaratan'] ?>" name="nama_persyaratan_tambahan" readonly>
                    <label for=""><b>Keterangan</b></label>
                    <textarea name="keterangan_persyaratan_tambahan" id="" class="form-control" readonly><?= $value['keterangan'] ?></textarea>
                    <label for=""><b>Nama File</b></label>
                    <input type="text" name="nama_file_persyaratan_tambahan" placeholder="Nama File" class="form-control mb-3">
                    <div class="input-group">
                        <input type="hidden" name="id_paket" value="<?= $paket_di_ikuti['id_paket'] ?>">
                        <input type="file" class="form-control form-control-sm" aria-describedby="inputGroupFileAddon04" accept=".pdf,.xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" name="file_persyaratan_tambahan" aria-label="Upload">
                    </div>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-sm btn-danger" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/img/file-icon.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>

                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?php } ?>


<!-- Modal -->
<div class="modal fade" id="modal_alasan_tidak_lengkap_dokumen_tamabahanya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Alasan Tidak Lulus / Tidak Lengkap Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea name="syarat_gak_lengkap" class="form-control form-control-sm"></textarea>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_lihat_vendor_mengikuti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Perserta Tender</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Vendor</th>
                            <th>Dokumen Administrasi</th>
                            <th>Dokumen Syarat Tambahan</th>
                            <!-- <th>Nilai Teknis</th> -->
                            <th>Peringkat Teknis</th>
                            <!-- <th>Pemenang</th> -->
                        </tr>
                    </thead>
                    <tbody id="lihat_vendor_mengikuti">

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- 30 juni 2020 -->
<!-- Modal -->
<div class="modal fade" id="tambah_peralatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peralatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_peralatan" enctype="multipart/form-data">
                <div class="modal-body">

                    <input type="hidden" name="id_paket_alat" value="<?= $paket_di_ikuti['id_paket'] ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jenis Peralatan</label>
                                <input type="text" name="jenis_peralatan" id="jenis_peralatan" class="form-control" placeholder="" aria-describedby="helpId">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Merk Dan Tipe</label>
                                <input type="text" name="merk_dan_tipe" id="merk_dan_tipe" class="form-control" placeholder="" aria-describedby="helpId">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Jumlah Peralatan</label>
                                <input type="text" name="jumlah_peralatan" id="jumlah_peralatan" class="form-control" placeholder="" aria-describedby="helpId">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Kapasitas Produksi</label>
                                <input type="text" name="kapasitas_produksi" id="satuan_volume" class="form-control" placeholder="" aria-describedby="helpId">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Volume & Satuan</label>
                                <input type="text" name="satuan_volume" id="satuan_volume" class="form-control" placeholder="" aria-describedby="helpId">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tahun</label>
                                <select name="tahun_pembuatan" id="tahun_pembuatan" class="form-control">
                                    <?php for ($i = 0; $i < 51; $i++) { ?>
                                        <?php if ($i < 10) { ?>
                                            <option value="<?= '200' . $i ?>"><?= '200' . $i ?></option>
                                        <?php    } else { ?>
                                            <option value="<?= '20' . $i ?>"><?= '20' . $i ?></option>
                                        <?php     } ?>
                                        ?>
                                    <?php    } ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Status Kepemilikan Peralatan</label>
                                <select name="kepemilikan" class="form-control" id="">
                                    <option value="Milik Sendiri">Milik Sendiri</option>
                                    <option value="Sewa">Sewa</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Data Dukung Kepemilkan Alat</label>
                                <input type="text" name="data_dukung_kepemilikan" id="data_dukung_kepemilikan" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Lokasi Alat Saat ini</label>
                                <input type="text" name="lokasi_saat_ini" id="lokasi_saat_ini" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jarak Lokasi Alat Ke Lokasi Pekerjaan (KM)</label>
                                <input type="text" name="jarak_lokasi" id="jarak_lokasi" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Bukti Kepemilikan Alat</label>
                                <input type="file" name="bukti_kepemilikan" id="bukti_kepemilikan" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="upload" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah_tenaga_ahli_tender_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tenaga Ahli Tender</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="javascript:;" id="form_tenaga_ahli">
                <input type="hidden" name="id_paket_tenaga" value="<?= $paket_di_ikuti['id_paket'] ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jabatan/Posisi di Pekerjaan ini</label>
                                <input type="text" name="jabatan" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Lengkap (dengan Gelar)</label>
                                <input type="text" name="nama_tenaga_ahli" id="" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat_tempat_tinggal" class="form-control" id="" cols="20" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Tanggal lahir</label>
                                <input type="date" name="tanggal_lahir" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Umur</label>
                                <input type="text" name="umur" id="" class="form-control">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Pendidikan</label>
                                <input type="text" name="pendidikan" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Program Studi</label>
                                <input type="text" name="program_studi" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tahun Lulus</label>
                                <input type="date" name="tahun_lulus" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    <b>
                        <label for="">SERTIFIKAT KEAHLIAN</label>
                    </b>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Kualifikasi Keahlian</label>
                                <input type="text" name="kualifikasi_keahlian" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Badan Sertifikasi Keahlian</label>
                                <input type="text" name="badan_sertifikat_keahlian" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tanggal Masa Berlaku</label>
                                <input type="date" name="tanggal_masa_berlaku" id="" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_tambah_riwayat" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Riwayat Pekerjaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_riwayat_pekerjaan" enctype="multipart/form-data">
                <input type="hidden" name="id_tenaga_ahli_detail">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal / Bulan / Tahun (Dari)</label>
                                <input type="date" class="form-control" name="tahun_detail_pekerjaan">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal / Bulan / Tahun (Sampai)</label>
                                <input type="date" class="form-control" name="tahun_detail_pekerjaan2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Pekerjaan / Proyek</label>
                                <input type="text" class="form-control" name="nama_proyek">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jabatan / Posisi</label>
                                <input type="text" class="form-control" name="posisi_pekerjaan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Bukti Refrensi Dari Pemberi Kerja</label>
                                <input type="file" class="form-control" id="bukti_pekerjaan" name="bukti_kerja">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="upload" class="btn btn-primary">Save</button>
                </div>
            </form>

            <div class="card">
                <div class="container">
                    <div class="card-header">
                        Data Riwayat Pekerjaan
                    </div>
                    <div class="card-body">
                        <div style="overflow-x: auto;">
                            <table class="table" id="tbl_riwayat_pekerjaan">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>Pekrjaan Proyek</th>
                                        <th>jabatan / Posisi</th>
                                        <th>Bukti Refrensi Dari Pemberi Kerja</th>
                                        <th>Aksi</th>
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