<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>PDF</title>
</head>

<body>

    <?php
    function tanggal_indo($tanggal, $cetak_hari = true)
    {
        $hari = array(
            1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );
        $split       = explode('-', $tanggal);
        $tgl_indo = $split[0];

        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num];
        }
        return $tgl_indo;
    }
    function bulan_indo($tanggal)
    {

        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split       = explode('-', $tanggal);
        $bulanku = $bulan[(int)$split[0]];
        return $bulanku;
    }
    $hari = date('d', strtotime($bapp_row['tanggal_bapp']));
    $bulan = date('m', strtotime($bapp_row['tanggal_bapp']));
    $tahun = date('Y', strtotime($bapp_row['tanggal_bapp']));


    function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = penyebut($nilai - 10) . " Belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai / 10) . " Puluh" . penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " Seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai / 100) . " Ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " Seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai / 1000) . " Ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai / 1000000) . " Juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai / 1000000000) . " Milyar" . penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai / 1000000000000) . " Trilyun" . penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }
        return $hasil;
    }

    function tanggal_asli($tanggal, $cetak_hari = false)
    {
        $hari = array(
            1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split       = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }
        return $tgl_indo;
    }

    $date_indo = date('Y-m-d', strtotime($bapp_row['tanggal_bapp']));
    ?>


    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="https://jmtm.co.id/assets/img_jmtm/logo.png" alt="" width="300px" style="margin-top:10px">
            </div>
            <div class="col-md-5 mt-5">
                <center>
                <h3>BERITA ACARA PEMERIKSAAN PEKERJAAN</h3>
                </center>
                
            </div>
            <div class="col-md-3">
                <img src="https://kintekindo.net/assets/img/profil/30.png" alt="" width="250px" style="margin-top:10px">
            </div>
        </div>
<br><br><br>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-2">
                    <label for="" style="margin-right: auto;">Pekerjaan</label>
                </div>
                <div class="col-md-3">
                    <label for="" style="margin-right: auto;">: <?= $row_program_kontrak_detail['nama_pekerjaan_program_mata_anggaran'] ?></label>
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-1">
                    <label for="" style="margin-right: -50px;"> Nomor</label>
                    <br>
                    <label for="" style="margin-right: -50px;"> Tanggal</label>
                </div>
                <div class="col-md-2">
                    <label for="" style="margin-right: -50px;"> : <?= $bapp_row['nomor_bapp'] ?></label>
                    <br>
                    <label for="" style="margin-right: -50px;"> : <?= tanggal_asli($date_indo) ?></label>
                </div>
            </div><br><br>
            <div class="row">
                <div class="col-md-2">
                    <label for="" style="margin-right: auto;">Unit Pekerjaan</label>
                </div>
                <div class="col-md-4">
                    <label for="" style="margin-right: auto;">: <?= $row_program_kontrak_detail['nama_departemen'] ?> - <?= $row_program_kontrak_detail['nama_area'] ?> - <?= $row_program_kontrak_detail['nama_sub_area'] ?></label>
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-3">

                </div>
            </div>
            <div class="mt-5">
                <p>
                    Pada hari ini <label style="font-weight: bold;" for=""><?= tanggal_indo($hari) ?></label> tanggal <label style="font-weight: bold;" for=""><?= terbilang(date('d', strtotime($bapp_row['tanggal_bapp']))) ?></label> bulan <label for="" style="font-weight: bold;"><?= bulan_indo($bulan) ?></label> tahun <label for="" style="font-weight: bold;"><?= terbilang($tahun) ?></label> (<label style="font-weight: bold;" for=""><?= tanggal_indo($hari) ?>,<?= tanggal_asli($date_indo) ?></label>) berdasarkan:
                </p>
            </div>
            <div class="mt-4">
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
            </div>
            <center class="mt-4">
                <b>I. KETERANGAN PEKERJAAN</b>
            </center>
            <div class="mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <label for="">a. Kontrak Pekerjaan</label>
                    </div>
                    <div class="col-md-9">
                        <label for=""> </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for=""> &nbsp;&nbsp;&nbsp; Nomor</label>
                    </div>
                    <div class="col-md-6">
                        <label for="">: <?= $bapp_row['no_pekerjaan_bapp'] ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for=""> &nbsp;&nbsp;&nbsp; Tanggal</label>
                    </div>
                    <div class="col-md-6">
                        <label for="">: <?= $bapp_row['tanggal_pekerjaan_bapp'] ?></label>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <label for="">b. Surat Perintah Mulai Kerja</label>
                    </div>
                    <div class="col-md-9">
                        <label for=""> </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for=""> &nbsp;&nbsp;&nbsp; Nomor</label>
                    </div>
                    <div class="col-md-6">
                        <label for="">: <?= $bapp_row['no_pekerjaan_spmk'] ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for=""> &nbsp;&nbsp;&nbsp; Tanggal</label>
                    </div>
                    <div class="col-md-6">
                        <label for="">: <?= $bapp_row['tanggal_pekerjaan_spmk'] ?></label>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">c. Permohonan Pemeriksaan Pekerjaan dari PIHAK KEDUA</label>
                    </div>
                    <div class="col-md-3">
                        <label for=""> </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for=""> &nbsp;&nbsp;&nbsp; Nomor</label>
                    </div>
                    <div class="col-md-6">
                        <label for="">: <?= $bapp_row['no_pekerjaan_ppp_pihak_kedua'] ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for=""> &nbsp;&nbsp;&nbsp; Tanggal</label>
                    </div>
                    <div class="col-md-6">
                        <label for="">: <?= $bapp_row['tanggal_pekerjaan_ppp_pihak_kedua'] ?></label>
                    </div>
                </div>
            </div>
            <div style="margin-left: 40px;">
                <div class="row">
                    <div class="col-md-1">
                        <label for="">1 &ensp;</label>
                    </div>
                    <div class="col-md-11" style="margin-left: -40px;">
                        <label for="">PT Jasamarga Tollroad Maintenance dan PT/CV <?= $row_program_kontrak_detail['nama_penyedia']?> bersama-sama telah melakukan pemeriksaan dan pengesahan laporan
                            administrasi pekerjaan</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <label for="">2 &ensp;</label>
                    </div>
                    <div class="col-md-11" style="margin-left: -40px;">
                        <label for="">PT Jasamarga Tollroad Maintenance dan PT/CV <?= $row_program_kontrak_detail['nama_penyedia']?>  bersama-sama telah melakukan pemeriksaan pekerjaan sampai dengan
                            periode <?= $row_mc['tanggal_mc']?>, adapun kemajuan fisik yang telah dicapai sampai dengan saat ini dan telah disetujui adalah sebagai berikut:
                            PEKERJAAN <?= $row_program_kontrak_detail['nama_pekerjaan_program_mata_anggaran']?>  (diisi sesuai nama program RKAP)</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-6">
                        <label for="">Kemajuan Fisik yang dicapai pada MC <?= $row_mc['no_mc']?> &ensp;</label>
                    </div>
                    <div class="col-md-5" style="margin-left: -40px;">
                        <label for="">: %</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-6">
                        <label for="">PEKERJAAN <?= $row_program_kontrak_detail['nama_pekerjaan_program_mata_anggaran']?>  (diisi sesuai nama program RKAP) &ensp;</label>
                    </div>
                    <div class="col-md-5" style="margin-left: -40px;">
                        <label for="">: %</label>
                    </div>
                </div>
                <di class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-11">
                        Total Kemajuan Fisik yang dicapai pada MC <?= $row_mc['no_mc']?> Pekerjaan <?= $row_program_kontrak_detail['nama_pekerjaan_program_mata_anggaran']?>  (diisi Sesuai Nama Kontrak) adalah sebesar ____ %
                    </div>
                </di>
                <div class="row">
                    <div class="col-md-1">
                        <label for="">3 &ensp;</label>
                    </div>
                    <div class="col-md-11" style="margin-left: -40px;">
                        <label for="">PT/CV <?= $row_program_kontrak_detail['nama_penyedia']?>  telah menyelesaikan pekerjaan dan telah memenuhi ketentuan sebagaimana dimaksud dalam Surat Perintah Mulai
                            Kerja tersebut diatas</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <label for="">4 &ensp;</label>
                    </div>
                    <div class="col-md-11" style="margin-left: -40px;">
                        <label for="">Dengan telah selesainya pekerjaan sebagaimana dimaksud dalam Berita Acara Pemeriksaan Pekerjaan ini, maka pekerjaan tersebut siap untuk diserahterimakan dari PT/CV <?= $row_program_kontrak_detail['nama_penyedia']?>  kepada PT Jasamarga Tollroad Maintenanace</label>
                    </div>
                </div>
                <br>
                <br>
                <br>
                Demikian Berita Acara ini untuk dapat dipergunakan sebagaimana mestinya.
                <br><br>
                <div class="row">
                    <div class="col-md-3">
                    <center>
                            <br>
                            <br>
                            <br><br><br><br>
                            <h5>PIHAK KEDUA</h5>
                            <br>
                            PT/CV <?= $row_program_kontrak_detail['nama_penyedia']?> 
                            <br><br><br>
                            <br><br><br>
                            <h5>NAMA DIREKTUR PT
                                <br>General Superintendent
                            </h5>
                        </center>
                    </div>
                    <div class="col-md-5"></div>
                    <div class="col-md-3">
                        <center>
                            <br>
                            <br>
                            <br><br><br><br>
                            <h5>PIHAK PERTAMA</h5>
                            <br>PT Jasamarga Tollroad Maintenance
<br><br><br><br><br>
                            <h5>Viraldi
                            <br>Coordinator/Manager Area
                            </h5>
                        </center>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>

<script>
    // window.print();
</script>