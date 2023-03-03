<script>
    var tabledata = $('#table')
    var form_edit = $('#form_edit')
    var form_tambah = $('#form_tambah')
    var modal_tambah = $('#modal-lg1')
    var modal_edit = $('#modal_edit')
    var id_program = $('[name="id_program"]').val()
    // sweetalert
    function message(icon, text, title) {
        swal({
            title: title,
            text: text,
            icon: icon,
        });
    }

    $('.select-field').select2({
        theme: 'bootstrap-5'
    });

    function byid(id, type) {
        if (type == 'edit') {
            saveData = 'edit';
            // formData[0].reset();
        }
        if (type == 'hapus') {
            saveData = 'hapus';
            // formData[0].reset();
        }
        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_kontrak/byid_addendum/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    modal_edit.modal('show')
                    $('[name="no_adendum"]').val(response.no_adendum)
                    $('[name="jumlah"]').val(response.jumlah)
                    $('[name="tanggal"]').val(response.tanggal)
                    $('[name="id_adendum"]').val(response.id_adendum)
                } else
                    Question(response.id_adendum, response.no_adendum, 'hapus', "Ingin Menghapus Data Addendum");
            }
        })
    }

    function Question(id_adendum, no_adendum, status, text) {
        swal({
            title: "Apakah Anda Yakin!?",
            text: text + no_adendum + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/data_kontrak/hapus_addendum/') ?>" + id_adendum,
                    dataType: "JSON",
                    data: {
                        status: 0
                    },
                    success: function(response) {
                        if (response == 'success') {
                            reloadTable();
                            message('success', 'Berhasil!', 'Data Berhasil Di Hapus')
                        }
                    }
                })
            }
        });
    }

    function save_addendum() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_kontrak/add_addendum/') ?>",
            data: form_tambah.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response) {
                    modal_tambah.modal('hide')
                    message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                    reloadTable()
                }
            }
        })
    }

    function edit_data() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_kontrak/update_adendum') ?>",
            data: form_edit.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response) {
                    modal_edit.modal('hide')
                    message('success', 'Data Berhasil Di Edit!', 'Berhasil')
                    reloadTable()
                }
            }
        })
    }

    function reloadTable() {
        tabledata.DataTable().ajax.reload();
    }

    $(document).ready(function() {
        tabledata.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('admin/data_kontrak/get_addendum/') ?>" + id_program,
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