<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
           <div class="col-md-6">
               <img src="https://jmtm.co.id/assets/img_jmtm/logo.png" alt="" width="300px"  style="margin-top:50px">
           </div>
        </div>
         <div class="row">
           <div class="col-md-4">
           </div>
            <div class="col-md-4">
           <h1>NOTA DINAS</h1>
           </div>
            <div class="col-md-2">
             
           </div>
        </div>


        <div class="row mt-5">
           <div class="col-md-1">
               Nomor 
           </div>
            <div class="col-md-6">
          <h5>: <?= $sub_program['no_surat_nota']?></h5>
           </div>
            <div class="col-md-2">
             
           </div>
           <div class="col-md-2">
             <?= date("d-M-Y", strtotime($sub_program['tgl_surat_nota']) ) ?>
           </div>
        </div>

                <div class="row">
           <div class="col-md-1">
               Lampiran 
           </div>
            <div class="col-md-6">
          <h5>: 1(Satu) Berkas </h5>
           </div>
            <div class="col-md-2">
             
           </div>
           <div class="col-md-2">
            
           </div>
        </div>

                <div class="row">
           <div class="col-md-1">
               Perihal 
           </div>
            <div class="col-md-6">
          <h5>: Permohonan Pelaksanaan Pengadaan <?= $sub_program['jenis_pengadaan']?>  &nbsp;  &nbsp;  &nbsp; &nbsp;<?= $sub_program['nama_pekerjaan_pip']?> </h5>
           </div>
            <div class="col-md-2">
             
           </div>
           <div class="col-md-2">
            
           </div>
        </div>

                <div class="row">
           <div class="col-md-1">
               Kepada 
           </div>
            <div class="col-md-6">
          <h5>: Procurement General Manager </h5>
           </div>
            <div class="col-md-2">
             
           </div>
           <div class="col-md-2">
            
           </div>
        </div>

               <div class="row">
           <div class="col-md-1">
               Dari 
           </div>
            <div class="col-md-6">
          <h5>: Operation 2 General Manager </h5>
           </div>
            <div class="col-md-2">
             
           </div>
           <div class="col-md-2">
            
           </div>
        </div>

        <div class="row mt-3">
          <div style="background-color:black;width:100%;height:3px">

          </div>
          <div class="mt-2">
            <h5>Sehubungan dengan telah ditetapkannya nilai Kontrak Manajemen Bidang Pemeliharaan Jalan Tol
                Pada Ruas Jalan Tol Jakarta-Cikampek Tahun 2022 serta Persetujuan Harga Perkiraan Sendini (HPS)
                oleh Direktur Operasi PT JMTM, dengan memperhatikan Surat Keputusan Direksi Nomor 120/DIR-
                /K9TS/2021 tanggal 12 November 2021 tentang Pedoman Pelaksanaan Pengadaan Barang/Jasa di
                Lingkungan PT Jasamarga Tollroad Maintenance, melalui surat ini kami mohon untuk dapat
                dilaksanakan kegiatan pengadaan jasa pada pekerjaan sebagai berikut : 
            </h5>
          </div>

          <div class="row mt-3">
              
            <table class="table table-bordered" style="width:100%">
            <tr>
                <th>
                    No.
                </th>
                 <th>
                    Nama Pekerjaan
                </th>
                 <th>
                    Nilai Hps(Rp)
                </th>
                  <th>
                    Perkiraan Waktu Pelaksanaan
                </th>
            </tr>
            <tr>
                <td>
                    1
                </td>
                 <td>
                   <?= $sub_program['nama_pekerjaan_program_mata_anggaran']?>
                </td>
                 <td>
                  <?= "Rp " . number_format($sub_program['total_hps_mata_anggaran'], 2, ',', '.') ?>
                </td>
                 <td>
                    <?= $sub_program['waktu_pelaksanaan_pip'] ?> Hari Kalender
                </td>
            </tr>
            </table>

            <div class="row mt-4">
                <h5>
                    Demikian disampaikan, atas perhatian dan kerja sama yang baik, kami ucapkan terima kasih.
                </h5>
            </div>
            <br>

             <div class="row mt-4">
                 <div class="col-md-2">

                 </div>
                
                  <div class="col-md-10">
                      <center>
                           <br>
                 <br>
                 <br><br><br><br>
                     <h5>Hendra Nata Saputra</h5>
                       <div style="background-color:black;width:100%;height:3px">

                       </div>
                       <h5>Operation 2 General Manager 
                    </h5> 
</center>
                 </div>
            </div>
                <div class="row">
                 <div class="col-md-12">
                     <br><br><br>
                    <h5>Tembusan, Yth
Direktur Operasi (sebagai laporan)</h5>
                    <br><br><br>
                 </div>
            </div>
          </div>
        </div>


    </div>
</body>
</html>