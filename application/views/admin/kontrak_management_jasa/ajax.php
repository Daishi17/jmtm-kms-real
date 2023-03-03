<script>
    var tabledata = $('#table')
    var form_edit = $('#form_edit')
    var form_tambah_kontrak = $('#form_tambah_kontrak')
    var modal_tambah = $('#tambah_program')
    var lihat_uraian = $('#lihat_uraian')
    var table_uraian = $('#table_uraian')

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

    function byid(id, type) {
        if (type == 'edit') {
            saveData = 'edit';
            // formData[0].reset();
        }
        if (type == 'kelola_level') {
            saveData = 'kelola_level';
        }
        if (type == 'kelola_level_unit_price') {
            saveData = 'kelola_level_unit_price';
        }

        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_kontrak_penyedia_jasa/byid/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'detail_kontrak') {
                    window.location.href = "<?= base_url('admin/data_kontrak_penyedia_jasa/detail_kontrak/') ?>" + id
                } else if (type == 'kelola_level') {
                    window.location.href = "<?= base_url('admin/data_kontrak_penyedia_jasa/kelola_level/') ?>" + id
                } else if (type == 'kelola_level_unit_price') {
                    window.location.href = "<?= base_url('admin/data_kontrak_penyedia_jasa/kelola_level_unit_price/') ?>" + id
                }
            }
        })
    }

    function Question(id_pegawai, nama_pegawai, status, text) {
        Swal.fire({
            title: "Apakah Anda Yakin!?",
            text: text + nama_pegawai + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                if (status == 'non_aktif') {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('admin/data_kontrak_penyedia_jasa/status_control/') ?>" + id_pegawai,
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
                        url: "<?= base_url('admin/data_kontrak_penyedia_jasa/status_control/') ?>" + id_pegawai,
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

    function save_program() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_kontrak_penyedia_jasa/add_kontrak/') ?>",
            data: form_tambah_kontrak.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    modal_tambah.modal('hide')
                    message('success', 'Data Berhasil Di Edit!', 'Berhasil');
                    reloadTable()
                    form_tambah_kontrak[0].reset();
                }
                if (response == 'sudah_ada') {
                    message('warning', 'Silakan Buat Addendumn Baru!!', 'No Kontrak Dengan Tahun Anggran Ini Sudah Ada');
                }
            }
        })
    }

    function edit_data() {
        var id_pegawai = $('[name="id_pegawai"]').val()
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_kontrak_penyedia_jasa/update_pegawai/') ?>" + id_pegawai,
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
                "url": "<?= base_url('admin/data_kontrak_penyedia_jasa/get_data/') ?>",
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
    $(".row_position_detail_capex").sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $(".row_position_detail_capex").each(function() {
                selectedData.push($(this).attr('id'))
            })
            updateOrder(selectedData);
        }
    })

    function updateOrder(aData) {
        $.ajax({
            url: "<?= base_url('admin/data_kontrak_penyedia_jasa/update_row_detail_capex') ?>",
            method: 'post',
            dataType: "JSON",
            data: {
                alldata: aData
            },
            success: function() {
                alert("youchange succesfull")
            }
        })
    }
</script>

<!-- login post kontrak -->
<script>
    function pilih_addendum() {
        var cek_kondisi = $('[name="no_adendum_post_kontrak"]').val()
        if (cek_kondisi == 'Kontrak Awal') {
            $('#tanggal_adendum_kontrak').css('display', 'none')
        } else {
            $('#tanggal_adendum_kontrak').css('display', 'block')
        }

    }
</script>