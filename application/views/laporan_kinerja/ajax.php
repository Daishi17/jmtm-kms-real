<script>
    var tabledata = $('#table')
    // sweetalert
    function message(icon, text, title) {
        Swal.fire({
            title: title,
            text: text,
            icon: icon,
        });
    }

    $('.select-field').select2({
        theme: 'bootstrap-5'
    });

    function reloadTable() {
        tabledata.DataTable().ajax.reload();
    }

    $(document).ready(function() {
        tabledata.DataTable({
            "responsive": false,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            scrollX: true,
            scrollCollapse: true,
            "dom": 'Bfrtip',
            fixedColumns: {
                left: 2,
            },
            buttons: [{
                    extend: 'excelHtml5',
                    text: '<i class="fa fa-file-excel"> Excel</i>',
                    titleAttr: 'Excel'
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fa fa-file-pdf"> Pdf</i>',
                    titleAttr: 'PDF'
                }
            ],
            "order": [],
            "ajax": {
                "url": "<?= base_url('laporan_kinerja/get_data') ?>",
                "type": "POST"
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
                "sZeroRecords": "Tidak Ada Data Area Yang Di Cari",
                "sProcessing": "Memuat Data...."
            }
        });
    });
</script>


<script>
    $(document).ready(function() {

        $('#mytable').DataTable({
            "responsive": false,
            scrollX: true,
            scrollCollapse: true,
            "dom": 'Bfrtip',
            fixedColumns: {
                left: 2,
                right: 1,
            },
            buttons: [{
                    extend: 'excelHtml5',
                    text: '<i class="fa fa-file-excel"> Excel</i>',
                    titleAttr: 'Excel'
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fa fa-file-pdf"> Pdf</i>',
                    titleAttr: 'PDF'
                }
            ],
        });

    });


    var modal_progres_fisik = $('#modal_progres_fisik');
    var form_progres_fisik = $('#form_progres_fisik');

    function ProgresFisik(id) {
        modal_progres_fisik.modal('show');
        var id_detail_sub_program_penyedia_jasa = $('[name="id_detail_sub_program_penyedia_jasa"]').val(id)
    }

    function SimpanProgresFisik() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('laporan_kinerja/update_progres_fisik') ?>",
            data: form_progres_fisik.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    modal_progres_fisik.modal('hide')
                    message('success', 'Data Berhasil Di Edit!', 'Berhasil');
                    location.reload()
                }
            }
        })
    }
</script>