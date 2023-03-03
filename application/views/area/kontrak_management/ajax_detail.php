<script>
    var reusable_id_kontrak = $('#id_kontrak').val()

    function message(icon, text, title) {
        swal({
            title: title,
            text: text,
            icon: icon,
        });
    }

    // capex 
    var tbl_capex = $('#tbl_capex');
    $(document).ready(function() {
        tbl_capex.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('admin/data_kontrak/get_data_capex/') ?>" + reusable_id_kontrak,
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
                "sZeroRecords": "Tidak Ada Data",
                "sProcessing": "Memuat Data...."
            }
        });
    });

    function Table_capex() {
        tbl_capex.DataTable().ajax.reload();
    }

    var tambah_capex = $('#tambah_capex')
    var form_capex = $('#form_capex')

    function save_uraian_capex(id_kontrak) {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_kontrak/simpan_capex/') ?>" + id_kontrak,
            data: form_capex.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    tambah_capex.modal('hide')
                    message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                    Table_capex()
                }
            }
        })
    }
    // end capex

    // opex
    var tbl_opex = $('#tbl_opex');
    $(document).ready(function() {
        tbl_opex.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('admin/data_kontrak/get_data_opex/') ?>" + reusable_id_kontrak,
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
                "sZeroRecords": "Tidak Ada Data",
                "sProcessing": "Memuat Data...."
            }
        });
    });

    function Table_opex() {
        tbl_opex.DataTable().ajax.reload();
    }

    var tambah_opex = $('#tambah_opex')
    var form_opex = $('#form_opex')

    function save_uraian_opex(id_kontrak) {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_kontrak/simpan_opex/') ?>" + id_kontrak,
            data: form_opex.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    tambah_opex.modal('hide')
                    message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                    Table_opex()
                }
            }
        })
    }
    // end opex

    // bua
    var table_bua = $('#table_bua');
    $(document).ready(function() {
        table_bua.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('admin/data_kontrak/get_data_bua/') ?>" + reusable_id_kontrak,
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
                "sZeroRecords": "Tidak Ada Data",
                "sProcessing": "Memuat Data...."
            }
        });
    });

    function Table_bua() {
        table_bua.DataTable().ajax.reload();
    }

    var tambah_bua = $('#tambah_bua')
    var form_bua = $('#form_bua')

    function save_uraian_bua(id_kontrak) {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_kontrak/simpan_bua/') ?>" + id_kontrak,
            data: form_bua.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    tambah_bua.modal('hide')
                    message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                    Table_bua()
                }
            }
        })
    }
    // end bua


    // sdm
    var table_sdm = $('#table_sdm');
    $(document).ready(function() {
        table_sdm.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('admin/data_kontrak/get_data_sdm/') ?>" + reusable_id_kontrak,
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
                "sZeroRecords": "Tidak Ada Data",
                "sProcessing": "Memuat Data...."
            }
        });
    });

    function Table_sdm() {
        table_sdm.DataTable().ajax.reload();
    }

    var tambah_sdm = $('#tambah_sdm')
    var form_sdm = $('#form_sdm')

    function save_uraian_sdm(id_kontrak) {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_kontrak/simpan_sdm/') ?>" + id_kontrak,
            data: form_sdm.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    tambah_sdm.modal('hide')
                    message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                    Table_sdm()
                }
            }
        })
    }
    // end sdm
</script>