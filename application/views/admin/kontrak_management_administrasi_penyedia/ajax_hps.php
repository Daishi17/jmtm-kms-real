<script>
        function message(icon, text, title) {
        Swal.fire({
            title: title,
            text: text,
            icon: icon,
        });
    }

    var tabledata = $('#table_kuantitas_harga');
    var id = $('[name="id_detail_sub_program_penyedia_jasa"]').val();
    var modal_add_hps = $('#modal_add_hps')
            $(document).ready(function() {
            tabledata.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "bDestroy":true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('admin/Administrasi_penyedia/get_data_hps/') ?>" + id,
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

    var form_tambah = $('#form_tambah')
    function save_data() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/Administrasi_penyedia/tambah_hps_kontrak') ?>",
            data: form_tambah.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Data Berhasil Di Simpan!', 'Berhasil')
                    location.reload()
                }
            }
        })
    }
    


</script>