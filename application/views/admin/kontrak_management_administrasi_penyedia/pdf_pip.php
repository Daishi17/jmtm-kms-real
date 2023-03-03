<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>PDF</title>
</head>

<body>
    <div class="container">
        <img class="mt-5" src="<?= base_url('assets/image/jmtm.png') ?>" alt="" width="350px">
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-1">
                    <label for="" style="margin-right: auto;">Nomor</label>
                </div>
                <div class="col-md-9">
                    <label for="" style="margin-right: auto;">: <?= $sub_program['no_surat_pip']?></label>
                </div>
                <div class="col-md-2">
                    <label for=""
                        style="margin-left: -15px;"><?= date("d-M-Y", strtotime($sub_program['tgl_surat_pip']) ) ?></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <label for="" style="margin-right: auto;">Lampiran</label>
                </div>
                <div class="col-md-9">
                    <label for="" style="margin-right: auto;">: -</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <label for="" style="margin-right: auto;">Perihal</label>
                </div>
                <div class="col-md-11">
                    <label for="" style="margin-left: auto;">:
                        <b><?= $sub_program['nama_pekerjaan_pip']?></b>
                    </label>
                </div>
            </div>
            <div class="mt-5">
                Yth.
                <br>
                <?php if ($sub_program['format_persetujuan_pip'] == 'Coordinator Area - Operation 2 Gm') { ?>
                <b> Operation 2 General Manager</b> <br>
                PT Jasamarga Tollroad Maintenance <br>
                Gedung C PT Jasa Marga (Persero) Tbk, Lt.1 <br>
                Plaza Tol Taman Mini Indonesia Indah, Jakarta 13550
                <?php   } else { ?>
                <b> Direktur Oprasional</b> <br>
                PT Jasamarga Tollroad Maintenance <br>
                Gedung C PT Jasa Marga (Persero) Tbk, Lt.1 <br>
                Plaza Tol Taman Mini Indonesia Indah, Jakarta 13550
                <?php   }
                ?>

            </div>
            <div class="mt-4">
                <div class="row">
                    <div class="col-md-12">
                        Sehubungan deengan akan dilaksanakannya <b>Pengadaan <?= $sub_program['jenis_pengadaan']?>
                            <?= $sub_program['nama_pekerjaan_pip']?></b>, bersama ini kami mengajukan permohonan izin
                        prinsip pengadaan pekerjaan dimaksud dengan penjelasan sebagai berikut :
                    </div>
                </div>
            </div>
            <center class="mt-4">
                <b>I. KETERANGAN PEKERJAAN</b>
            </center>
            <div class="mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <label for="">1. Lokasi Pekerjaan</label>
                    </div>
                    <div class="col-md-9">
                        <label for="">: <?= $sub_program['lokasi_pekerjaan_pip']?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">2. Sasaran Pekerjaan</label>
                    </div>
                    <div class="col-md-9">
                        <label for="">: <?= $sub_program['sasaran_pekerjaan_pip']?></label>
                    </div>
                </div>
            </div>

            <center class="mt-4">
                <b>II. KETERANGAN PEKERJAAN</b>
            </center>
            <div class="mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <label for="">1. Pekerjaan</label>
                    </div>
                    <div class="col-md-9">
                        <label for="">: <?= $sub_program['nama_pekerjaan_pip']?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">2. Pagu Biaya RKAP</label>
                    </div>
                    <div class="col-md-9">
                        <?php 
                        	function penyebut($nilai) {
                                $nilai = abs($nilai);
                                $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
                                $temp = "";
                                if ($nilai < 12) {
                                    $temp = " ". $huruf[$nilai];
                                } else if ($nilai <20) {
                                    $temp = penyebut($nilai - 10). " Belas";
                                } else if ($nilai < 100) {
                                    $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
                                } else if ($nilai < 200) {
                                    $temp = " Seratus" . penyebut($nilai - 100);
                                } else if ($nilai < 1000) {
                                    $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
                                } else if ($nilai < 2000) {
                                    $temp = " Seribu" . penyebut($nilai - 1000);
                                } else if ($nilai < 1000000) {
                                    $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
                                } else if ($nilai < 1000000000) {
                                    $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
                                } else if ($nilai < 1000000000000) {
                                    $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
                                } else if ($nilai < 1000000000000000) {
                                    $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
                                }     
                                return $temp;
                            }
                        
                            function terbilang($nilai) {
                                if($nilai<0) {
                                    $hasil = "minus ". trim(penyebut($nilai));
                                } else {
                                   $hasil = trim(penyebut($nilai));
                                }     		
                                  return $hasil;
                            }
 
                        
                        ?>
                        <label for="">: <b><?= "Rp " . number_format($sub_program['biaya_rkap_pip'], 2, ',', '.') ?></b>
                            (<?= terbilang($sub_program['biaya_rkap_pip']);?>) termasuk PPN 11%</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">3. Perkiraan Biaya</label>
                    </div>
                    <div class="col-md-9">
                        <label for="">:
                            <b><?= "Rp " . number_format($sub_program['perkiraan_biaya_pip'], 2, ',', '.') ?></b>
                            (<?= terbilang($sub_program['perkiraan_biaya_pip']);?>) termasuk PPN 11%</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">4. Waktu Pelaksanaan</label>
                    </div>
                    <div class="col-md-9">
                        <label for="">: <?= $sub_program['waktu_pelaksanaan_pip']?>
                            (<?= terbilang($sub_program['waktu_pelaksanaan_pip']);?>) Hari kalender</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">5. Waktu Pemeliharaan</label>
                    </div>
                    <div class="col-md-9">
                        <label for="">: <?= $sub_program['waktu_pemeliharaan_pip']?>
                            (<?= terbilang($sub_program['waktu_pemeliharaan_pip']);?>) Hari kalender</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">6. Metode Pengadaan</label>
                    </div>
                    <div class="col-md-9">
                        <label for="">: <?= $sub_program['jenis_pengadaan']?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">7. Pembebanan Biaya</label>
                    </div>
                    <div class="col-md-9">
                        <label for="">: <?= $sub_program['pembebanan_biaya']?></label>
                    </div>
                </div>
            </div>
            <br>
            <center class="mt-4">
                <b>III. ALASAN METODE PEMILIHAN PENYEDIA JASA</b>
            </center>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for=""><b>1. Alasan Administrasi</b></label>
                </div>
            </div>
            <div style="margin-left: 40px;">
                <div class="row">
                    <div class="col-md-1">
                        <label for="">1.1 &ensp;</label>
                    </div>
                    <div class="col-md-11" style="margin-left: -40px;">
                        <label for="">Berdasarkan Surat Keputusan Direksi PT. Jasamarga Tollroad Maintenance Nomor :
                            127/DIR-1/KPTS/2022 tanggal 20 Januari 2022 tentang Perubahan Kedua Atas Keputusan Direksi
                            Nomor: 107/DIR-I/KPTS/2020, tanggal 28 Desember 2022, tentang Pedoman Pelaksanaan Pengadaan
                            Barang/Jasa Di Lingkungan PT. Jasamarga Tollroad Maintenance:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <label for="">1.2 &ensp;</label>
                    </div>
                    <div class="col-md-11" style="margin-left: -40px;">
                        <label for="">Berdasarkan Surat Kepala Badan Pengatur Jalan Tol Nomor: BM.07.02-P/315, tanggal
                            17 Mei 2022 tentang Instruksi Peningkatan Kualitas Jalan Tol.</label>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <img class="mt-5" src="<?= base_url('assets/image/jmtm.png') ?>" alt="" width="350px">
            <br>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for=""><b>2. Alasan Teknis</b></label>
                </div>
            </div>
            <div style="margin-left: 40px;">
                <div class="row">
                    <div class="col-md-1">
                        <label for="">2.1 &ensp;</label>
                    </div>
                    <div class="col-md-11" style="margin-left: -40px;">
                        <label for="">Peserta Yang diundang untuk menyampaikan Dokumen Penawaran adalah Peserta yang
                            mempunyai kompetensi kemampuan usaha sebagai Penyedia Jasa yang telah memenuhi persyaratan
                            Kualifikasi sebagai Penyedia Jasa;</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <label for="">2.2 &ensp;</label>
                    </div>
                    <div class="col-md-11" style="margin-left: -40px;">
                        <label for="">Peserta yang diundang untuk menyampaikan Dokumen Penawaran adalah Peserta yang
                            tidak pernah terkena sanksi dari PT Jasamarga Tollroad Maintenance;</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <label for="">2.3 &ensp;</label>
                    </div>
                    <div class="col-md-11" style="margin-left: -40px;">
                        <label for="">Pada Metode Tender Terbatas dengan Pra Kualifikasi dapat dijamin proses Pengadaan
                            yang efektif, efisien, kompetitif dan transparan.</label>
                    </div>
                </div>
                <br>
                <br>
                <br>
                Demikian disampaikan, atas perhatian dan persetujuan Bapak, kami ucapkan Terima kasih.
                <br><br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <center>
                            <br>
                            <br>
                            <br><br><br><br>
                            <h5>Amri Sanusi</h5>
                            <div style="background-color:black;width:100%;height:3px">

                            </div>
                            <?php if ($sub_program['format_persetujuan_pip'] == 'Coordinator Area - Operation 2 Gm') { ?>
                            <h5>Coordinator Area
                            </h5>
                            <?php   } else { ?>
                            <h5>General Manager
                            </h5>
                            <?php   } ?>

                        </center>
                    </div>
                </div>
                <br><br>

                <?php if ($sub_program['format_persetujuan_pip'] == 'Coordinator Area - Operation 2 Gm') { ?>
                <?php   } else { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div style="background-color:black;width:100%;height:3px">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <b>IV. PERSETUJUAN DIREKTUR OPERASI</b>
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div style="background-color:black;width:100%;height:2px">

                        </div>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-1">
                        <label for="" style="margin-right: auto;">Nomor</label>
                    </div>
                    <div class="col-md-9">
                        <label for="" style="margin-right: auto;">: <?= $sub_program['no_surat_pip']?></label>
                    </div>
                    <div class="col-md-2">
                        <label for=""
                            style="margin-left: -15px;"><?= date("d-M-Y", strtotime($sub_program['tgl_surat_pip']) ) ?></label>
                    </div>
                </div>
                <div class="mt-5">
                    Yth.
                    <br>
                    <b> Operation 2 General Manager</b> <br>
                    PT Jasamarga Tollroad Maintenance <br>
                </div>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-12"> Menunjuk permohonan saudara di atas dan memperhatikan
                            ketentuan-ketentuan yang berlaku, maka
                            dengan ini kami :
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <center>
                            <b>MENYETUJUI / TIDAK MENYETUJUI</b>
                        </center>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-12"> Permohonan Saudara untuk melaksanakan Pengadaan
                            <?= $sub_program['jenis_pengadaan']?> <?= $sub_program['nama_pekerjaan_pip']?>, dengan tetap
                            berpedoman pada peraturan dan ketentuan yang beriaku
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                Demikian kami sampaikan, untuk dilaksanakan dengan sebaik-baiknya dan penuh tanggung jawab.
                <br><br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <center>
                            <br>
                            <br>
                            <br><br><br><br>
                            <h5>Suchandra P. Hutabarat</h5>
                            <div style="background-color:black;width:100%;height:3px">

                            </div>
                            <h5>Direktur Operasi
                            </h5>
                            <br><br><br>
                        </center>
                    </div>
                </div>
                <?php   } ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>

<script>
// window.print();
</script>