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
            url: "<?= base_url('admin/data_penyedia/byid/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    modal_edit.modal('show')
                    $('#nama_vendor2').val(response['nama_vendor'])
                    $('#telepon_vendor2').val(response['telepon_vendor'])
                    $('#alamat_penyedia2').val(response['alamat_penyedia'])
                    $('#username2').val(response['username'])
                    $('#email_penyedia2').val(response['email_vendor'])
                    $('[name="role2"]').val(response.role)
                    $('[name="status2"]').val(response.status)
                    $('[name="id_vendor"]').val(response.id_vendor)
                } else if (type == 'non_aktif') {
                    Question(response.id_vendor, response.nama_vendor, 'non_aktif', "Ingin Menon-aktifkan Penyedia   ");
                } else if (type == 'aktif') {
                    Question(response.id_vendor, response.nama_vendor, 'aktif', "Ingin Meng-aktifkan Penyedia   ")
                }
            }
        })
    }

    function Question(id_vendor, nama_vendor, status, text) {
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
                        url: "<?= base_url('admin/data_penyedia/status_control/') ?>" + id_vendor,
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
                        url: "<?= base_url('admin/data_penyedia/status_control/') ?>" + id_vendor,
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

    function save_vendor() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_penyedia/add_vendor/') ?>",
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
        var id_vendor = $('[name="id_vendor"]').val()
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_penyedia/update_pegawai/') ?>" + id_vendor,
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
                "url": "<?= base_url('admin/data_penyedia/get_data') ?>",
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