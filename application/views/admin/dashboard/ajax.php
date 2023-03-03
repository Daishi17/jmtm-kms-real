 <script>
   /* ChartJS
    * -------
    * Here we will create a few charts using ChartJS
    */

   //--------------
   //- AREA CHART -
   //--------------

   // Get context with jQuery - using jQuery's .get() method.
   var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

   // januari
   var januari = <?= $januari ?>;
   var januari_pendapatan = <?= $januari_pendapatan ?>;
   // februari
   var februari = <?= $februari ?>;
   var februari_pendapatan = <?= $februari_pendapatan ?>;
   // maret
   var maret = <?= $maret ?>;
   var maret_pendapatan = <?= $maret_pendapatan ?>;
   // april
   var april = <?= $april ?>;
   var april_pendapatan = <?= $april_pendapatan ?>;
   // mei
   var mei = <?= $mei ?>;
   var mei_pendapatan = <?= $mei_pendapatan ?>;
   // juni
   var juni = <?= $juni ?>;
   var juni_pendapatan = <?= $juni_pendapatan ?>;
   // juli
   var juli = <?= $juli ?>;
   var juli_pendapatan = <?= $juli_pendapatan ?>;
   // agustus
   var agustus = <?= $agustus ?>;
   var agustus_pendapatan = <?= $agustus_pendapatan ?>;
   // september
   var september = <?= $september ?>;
   var september_pendapatan = <?= $september_pendapatan ?>;
   // oktober
   var oktober = <?= $oktober ?>;
   var oktober_pendapatan = <?= $oktober_pendapatan ?>;
   // november
   var november = <?= $november ?>;
   var november_pendapatan = <?= $november_pendapatan ?>;
   // desember
   var desember = <?= $desember ?>;
   var desember_pendapatan = <?= $desember_pendapatan ?>;

   var ctx = document.getElementById("barChart").getContext('2d');
   var open_modal_diagram = $('#open_modal_diagram');
   var myChart = new Chart(ctx, {
     type: 'bar',
     data: {
       labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
       datasets: [{
           label: 'Pendapatan',
           backgroundColor: 'rgba(60,141,188,0.9)',
           borderColor: 'rgba(60,141,188,0.8)',
           pointRadius: false,
           pointColor: '#3b8bba',
           pointStrokeColor: 'rgba(60,141,188,1)',
           pointHighlightFill: '#fff',
           pointHighlightStroke: 'rgba(60,141,188,1)',
           data: [januari_pendapatan, februari_pendapatan, maret_pendapatan, april_pendapatan, mei_pendapatan, juni_pendapatan, juli_pendapatan, agustus_pendapatan, september_pendapatan, oktober_pendapatan, november_pendapatan, desember_pendapatan]
         },
         {
           label: 'Pencairan',
           backgroundColor: 'rgba(210, 214, 222, 1)',
           borderColor: 'rgba(210, 214, 222, 1)',
           pointRadius: false,
           pointColor: 'rgba(210, 214, 222, 1)',
           pointStrokeColor: '#c1c7d1',
           pointHighlightFill: '#fff',
           pointHighlightStroke: 'rgba(220,220,220,1)',
           data: [januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember]
         }
       ]
     },
     options: {
       scales: {
         yAxes: [{
           ticks: {
             beginAtZero: true
           }
         }]
       },
       onClick: function(e) {
         var activePoints = myChart.getElementsAtEvent(e);
         var selectedIndex = activePoints[0]._index;
         open_modal_diagram.modal('show');
         var tahun_filter = $('[name="tahun_filter"]').val();
         var bulan = activePoints[0]['_model'].label;
         $('#label_diagram').html(bulan);
         var pendapatan = activePoints[0]['_model'].datasetLabel;
         var pencairan = activePoints[1]['_model'].datasetLabel;
         var table_pencairan = $('#table_pencairan');
         var table_pendapatan = $('#table_pendapatan');
         // pendaptan
         table_pendapatan.DataTable({
           "responsive": false,
           "autoWidth": false,
           "processing": true,
           "serverSide": true,
           "bDestroy": true,
           "order": [],
           "ajax": {
             "url": "<?= base_url('admin/dashboard/get_data_pendapatan') ?>",
             "type": "POST",
             data: {
               tahun_filter: tahun_filter,
               bulan: bulan,
               pendapatan: pendapatan
             },
           },
           "columnDefs": [{
             "target": [-1],
             "orderable": false
           }],
           "oLanguage": {
             "sSearch": "Pencarian : ",
             "sEmptyTable": "Data Tidak Tersedia",
             "sLoadingRecords": "Silahkan Tunggu - loading...",
             "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
             "sZeroRecords": "Tidak Ada Data  Yang Di Cari",
             "sProcessing": "Memuat Data...."
           }
         });
         // pencairan
         table_pencairan.DataTable({
           "responsive": false,
           "autoWidth": false,
           "processing": true,
           "serverSide": true,
           "bDestroy": true,
           "order": [],
           "ajax": {
             "url": "<?= base_url('admin/dashboard/get_data_pencairan') ?>",
             "type": "POST",
             data: {
               tahun_filter: tahun_filter,
               bulan: bulan,
               pencairan: pencairan
             },
           },
           "columnDefs": [{
             "target": [-1],
             "orderable": false
           }],
           "oLanguage": {
             "sSearch": "Pencarian : ",
             "sEmptyTable": "Data Tidak Tersedia",
             "sLoadingRecords": "Silahkan Tunggu - loading...",
             "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
             "sZeroRecords": "Tidak Ada Data  Yang Di Cari",
             "sProcessing": "Memuat Data...."
           }
         });
       }
     }
   });
 </script>

 <script>
   // sweetalert
   function message(icon, text, title) {
     Swal.fire({
       title: title,
       text: text,
       icon: icon,
     });
   }


   var form_pendaptan = $('#form_pendaptan');
   var tambah_pendaptan = $('#tambah_pendaptan');

   function TambahPendapatan() {
     var tambah_adendum = $('#tambah_adendum')
     $.ajax({
       method: "POST",
       url: "<?= base_url('admin/dashboard/add_pendapatan') ?>",
       data: form_pendaptan.serialize(),
       dataType: "JSON",
       success: function(response) {
         if (response == 'success') {
           tambah_pendaptan.modal('hide');
           message('success', 'Berhasil', 'Berhasil Di Tambah!')
           reloadTable_adendum()

         } else {}
       }
     })
   }
 </script>