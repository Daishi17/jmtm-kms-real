<script>
    var table = $('#table')

    var form_kontrak = $('#form_kontrak')
    var tambah_kontrak = $('#tambah_kontrak')
    var adendumKontrak = $('#adendumKontrak')
    var table_adendum = $('#table_adendum')

    function message(icon, title, text) {
        swal({
            title: title,
            text: text,
            icon: icon,
        });
    }

    function save() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('vendor/data_administrasi_kontrak/add_kontrak') ?>",
            data: form_kontrak.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    tambah_kontrak.modal('hide');
                    message('success', 'Berhasil', 'Berhasil Di Tambah!')
                    reloadTable()

                } else {}
            }
        })
    }

    function reloadTable_adendum() {
        table.DataTable().ajax.reload();
    }

    $(document).ready(function() {
        table.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('vendor/data_administrasi_kontrak/get_data') ?>",
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



    function byid(id, type) {
        if (type == 'addendum') {
            saveData = 'addendum';
        }
        if (type == 'buat_tagihan') {
            saveData = 'buat_tagihan';
        }
        $.ajax({
            type: "GET",
            url: "<?= base_url('vendor/data_administrasi_kontrak/byid/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'addendum') {
                    adendumKontrak.modal('show')
                    $('#no_kontrak').val(id)
                    // table adendum
                    $(document).ready(function() {
                        table_adendum.DataTable({
                            "responsive": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "bDestroy": true,
                            "order": [],
                            "ajax": {
                                "url": "<?= base_url('vendor/data_administrasi_kontrak/get_data_adendum/') ?>" + id,
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
                } else {
                    location.replace('<?= base_url('vendor/tagihan_kontrak/buat_tagihan/') ?>' + id)
                }

            }
        })
    }




    function tambah_adendum() {
        var tambah_adendum = $('#tambah_adendum')
        var no_kontrak = $('#no_kontrak').val()
        var no_kontrak2 = $('#no_kontrak2').val(no_kontrak)
        tambah_adendum.modal('show')
    }

    var form_adendum = $('#form_adendum')

    function simpan_adendum() {
        var tambah_adendum = $('#tambah_adendum')
        $.ajax({
            method: "POST",
            url: "<?= base_url('vendor/data_administrasi_kontrak/add_adendum') ?>",
            data: form_adendum.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    tambah_adendum.modal('hide');
                    message('success', 'Berhasil', 'Berhasil Di Tambah!')
                    reloadTable_adendum()

                } else {}
            }
        })
    }

    function reloadTable_adendum() {
        table_adendum.DataTable().ajax.reload();
    }
</script>