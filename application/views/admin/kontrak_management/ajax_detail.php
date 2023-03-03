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
            "bDestroy": true,
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


    function byid(id, type) {
        var modal_level4 = $('#modal_uraian_level_4')
        if (type == 'buat_uraian_level4') {
            saveData = 'buat_uraian_level4';
        }
        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_kontrak/byid_capex/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'buat_uraian_level4') {
                    modal_level4.modal('show');
                    $('[name="id_capex"]').val(response['row_capex'].id_capex);
                    var table_uraian_capex = $('#table_uraian_capex');
                    $(document).ready(function() {
                        table_uraian_capex.DataTable({
                            "responsive": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "bDestroy": true,
                            "order": [],
                            "ajax": {
                                "url": "<?= base_url('admin/data_kontrak/get_detail_capex/') ?>" + response['row_capex'].id_capex,
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
                }
            }
        })
    }

    function save_uraian_level4() {
        var modal_level4 = $('#modal_uraian_level_4')
        var form_uraian = $('#form_uraian')
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_kontrak/simpan_uraian_level_4') ?>",
            data: form_uraian.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                    var id = $('[name="id_capex"]').val();
                    var table_uraian_capex = $('#table_uraian_capex');
                    $(document).ready(function() {
                        table_uraian_capex.DataTable({
                            "responsive": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "bDestroy": true,
                            "order": [],
                            "ajax": {
                                "url": "<?= base_url('admin/data_kontrak/get_detail_capex/') ?>" + id,
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

                }
            }
        })
    }

    // ini untuk detail Opex

    function byid_opex(id, type) {
        var modal_level4_opex = $('#modal_uraian_level_4_opex')
        if (type == 'buat_uraian_level4_opex') {
            saveData = 'buat_uraian_level4_opex';
        }
        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_kontrak/byid_opex/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'buat_uraian_level4_opex') {
                    modal_level4_opex.modal('show');
                    $('[name="id_opex"]').val(response['row_opex'].id_opex);
                    var table_uraian_opex = $('#table_uraian_opex');
                    $(document).ready(function() {
                        table_uraian_opex.DataTable({
                            "responsive": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "bDestroy": true,
                            "order": [],
                            "ajax": {
                                "url": "<?= base_url('admin/data_kontrak/get_detail_opex/') ?>" + response['row_opex'].id_opex,
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
                }
            }
        })
    }

    function save_uraian_level4_opex() {
        var form_uraian_opex = $('#form_uraian_opex')
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_kontrak/simpan_uraian_level_4_opex') ?>",
            data: form_uraian_opex.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                    var id = $('[name="id_opex"]').val();
                    var table_uraian_opex = $('#table_uraian_opex');
                    $(document).ready(function() {
                        table_uraian_opex.DataTable({
                            "responsive": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "bDestroy": true,
                            "order": [],
                            "ajax": {
                                "url": "<?= base_url('admin/data_kontrak/get_detail_opex/') ?>" + id,
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

                }
            }
        })
    }

    // ini untuk bua
    function byid_bua(id, type) {
        var modal_level4_bua = $('#modal_uraian_level_4_bua')
        if (type == 'buat_uraian_level4_bua') {
            saveData = 'buat_uraian_level4_bua';
        }
        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_kontrak/byid_bua/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'buat_uraian_level4_bua') {
                    modal_level4_bua.modal('show');
                    $('[name="id_bua"]').val(response['row_bua'].id_bua);
                    var table_uraian_bua = $('#table_uraian_bua');
                    $(document).ready(function() {
                        table_uraian_bua.DataTable({
                            "responsive": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "bDestroy": true,
                            "order": [],
                            "ajax": {
                                "url": "<?= base_url('admin/data_kontrak/get_detail_bua/') ?>" + response['row_bua'].id_bua,
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
                }
            }
        })
    }

    function save_uraian_level4_bua() {
        var form_uraian_bua = $('#form_uraian_bua')
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_kontrak/simpan_uraian_level_4_bua') ?>",
            data: form_uraian_bua.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                    var id = $('[name="id_bua"]').val();
                    var table_uraian_bua = $('#table_uraian_bua');
                    $(document).ready(function() {
                        table_uraian_bua.DataTable({
                            "responsive": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "bDestroy": true,
                            "order": [],
                            "ajax": {
                                "url": "<?= base_url('admin/data_kontrak/get_detail_bua/') ?>" + id,
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

                }
            }
        })
    }


    // ini untuk detail sdm

    function byid_sdm(id, type) {
        var modal_level4_sdm = $('#modal_uraian_level_4_sdm')
        if (type == 'buat_uraian_level4_sdm') {
            saveData = 'buat_uraian_level4_sdm';
        }
        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_kontrak/byid_sdm/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'buat_uraian_level4_sdm') {
                    modal_level4_sdm.modal('show');
                    $('[name="id_sdm"]').val(response['row_sdm'].id_sdm);
                    var table_uraian_sdm = $('#table_uraian_sdm');
                    $(document).ready(function() {
                        table_uraian_sdm.DataTable({
                            "responsive": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "bDestroy": true,
                            "order": [],
                            "ajax": {
                                "url": "<?= base_url('admin/data_kontrak/get_detail_sdm/') ?>" + response['row_sdm'].id_sdm,
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
                }
            }
        })
    }

    function save_uraian_level4_sdm() {
        var form_uraian_sdm = $('#form_uraian_sdm')
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_kontrak/simpan_uraian_level_4_sdm') ?>",
            data: form_uraian_sdm.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                    var id = $('[name="id_sdm"]').val();
                    var table_uraian_sdm = $('#table_uraian_sdm');
                    $(document).ready(function() {
                        table_uraian_sdm.DataTable({
                            "responsive": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "bDestroy": true,
                            "order": [],
                            "ajax": {
                                "url": "<?= base_url('admin/data_kontrak/get_detail_sdm/') ?>" + id,
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

                }
            }
        })
    }
</script>