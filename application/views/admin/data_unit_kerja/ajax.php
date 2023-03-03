<script>
    var tabledata = $('#table')
    var form_edit = $('#form_edit')
    var form_tambah = $('#form_tambah')
    var modal_tambah = $('#modal-lg1')
    var modal_edit = $('#modal_edit')

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
        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_unit_kerja/byid/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    modal_edit.modal('show')
                    $('[name="id_unit_kerja"]').val(response['id_unit_kerja'])
                    $('#nama_unit_kerja2').val(response['nama_unit_kerja'])
                    $('[name="status2"]').val(response.status)
                } else if (type == 'non_aktif') {
                    Question(response.id_unit_kerja, response.nama_unit_kerja, 'non_aktif', "Ingin Menon-aktifkan Penyedia   ");
                } else if (type == 'aktif') {
                    Question(response.id_unit_kerja, response.nama_unit_kerja, 'aktif', "Ingin Meng-aktifkan Penyedia   ")
                }
            }
        })
    }

    function Question(id_unit_kerja, nama_vendor, status, text) {
        swal({
            title: "Apakah Anda Yakin!?",
            text: text + nama_vendor + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                if (status == 'non_aktif') {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('admin/data_unit_kerja/status_control/') ?>" + id_unit_kerja,
                        dataType: "JSON",
                        data: {
                            status: 0
                        },
                        success: function(response) {
                            if (response == 'success') {
                                reloadTable();
                                message('success', 'Berhasil!', 'Data Berhasil Di Aktifkan')
                            }
                        }
                    })
                } else {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('admin/data_unit_kerja/status_control/') ?>" + id_unit_kerja,
                        dataType: "JSON",
                        data: {
                            status: 1
                        },
                        success: function(response) {
                            if (response == 'success') {
                                reloadTable();
                                message('success', 'Berhasil!', 'Data Berhasil Di Aktifkan')
                            }
                        }
                    })
                }
            }
        });
    }

    function save_data() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_unit_kerja/add_unit_kerja/') ?>",
            data: form_tambah.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response) {
                    modal_tambah.modal('hide')
                    message('success', 'Data Berhasil Di Edit!', 'Berhasil')
                    reloadTable()
                }
            }
        })
    }

    function edit_data() {
        var id_unit_kerja = $('[name="id_unit_kerja"]').val()
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_unit_kerja/update/') ?>" + id_unit_kerja,
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
                "url": "<?= base_url('admin/data_unit_kerja/get_data') ?>",
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