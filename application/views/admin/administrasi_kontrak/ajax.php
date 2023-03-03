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
                "url": "<?= base_url('administrasi_kontrak/administrasi_kontrak/get_data/') ?>",
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



    var tbl_addendum = $('#tbl_addendum');
    var id_detail_program_penyedia_jasa = $('[name="id_detail_program_penyedia_jasa"]').val();

    function reloadTable_addendum_kontrak_penyedia_jasa() {
        tbl_addendum.DataTable().ajax.reload();
    }

    $(document).ready(function() {
        tbl_addendum.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('administrasi_kontrak/administrasi_kontrak/get_data_addendum/') ?>" + id_detail_program_penyedia_jasa,
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
                "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                "sProcessing": "Memuat Data...."
            }
        });
    });

    var modal_buat_addendum = $('#buat_addendum');
    var form_addendum_kontrak = $('#form_addendum_kontrak');

    function Simpan_addendum() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('administrasi_kontrak/administrasi_kontrak/save_addendum') ?>",
            data: form_addendum_kontrak.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    modal_buat_addendum.modal('hide');
                    message('success', 'Berhasil', 'Berhasil Buat Addendum!')
                    reloadTable_addendum_kontrak_penyedia_jasa()
                } else {}
            }
        })
    }

    var modal_edit_global = $('#modal_edit_global');
    var form_penyedia = $('#form_penyedia');

    function KelolaDetail(id) {
        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_administrasi_kontrak/byid_program_penyedia_jasa/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                modal_edit_global.modal('show');
                $('[name="id_detail_program_penyedia_jasa"]').val(response['row_program_penyedia_jasa'].id_detail_program_penyedia_jasa);
                $('[name="nama_penyedia"]').val(response['row_program_penyedia_jasa'].nama_penyedia);
                // gunning view
                $('#nama_file_gunning_view').html(response['row_program_penyedia_jasa'].nama_file_gunning);
                $('#file_gunning_view').html('<a class="text-primary" href="<?= base_url('/file_gunning/') ?>' + response['row_program_penyedia_jasa'].file_gunning + '"><img src="<?= base_url('assets/pdf.png') ?>" style="width: 30px;" alt=""></a>');
                // sho view
                $('#nama_file_sho_view').html(response['row_program_penyedia_jasa'].nama_file_sho);
                $('#file_sho_view').html('<a class="text-primary" href="<?= base_url('/file_sho/') ?>' + response['row_program_penyedia_jasa'].file_sho + '"><img src="<?= base_url('assets/pdf.png') ?>" style="width: 30px;" alt=""></a>');
                // smk view
                $('#nama_file_smk_view').html(response['row_program_penyedia_jasa'].nama_file_smk);
                $('#file_smk_view').html('<a class="text-primary" href="<?= base_url('/file_smk/') ?>' + response['row_program_penyedia_jasa'].file_smk + '"><img src="<?= base_url('assets/pdf.png') ?>" style="width: 30px;" alt=""></a>');

            }
        })
    }


    function simpan_data() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('administrasi_kontrak/administrasi_kontrak/simpan_penyedia') ?>",
            data: form_penyedia.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Berhasil', 'berhasil Di Ubah!')
                    location.reload()
                } else {}
            }
        })
    }



    var form_gunning = $('#form_gunning');
    form_gunning.on('submit', function(e) {
        e.preventDefault();
        var id_detail_program_penyedia_jasa = $('[name="id_detail_program_penyedia_jasa"]').val();
        if ($('.file_gunning').val() == '') {
            $('#error_file_gunning').show();
            setTimeout(function() {
                $('#error_file_gunning').hide();
            }, 4000);
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>administrasi_kontrak/administrasi_kontrak/upload_gunning/" + id_detail_program_penyedia_jasa,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#upload_gunning').attr('disabled', 'disabled');
                    $('#process_gunning').css('display', 'block');
                    $('#sedang_dikirim_gunning').show();
                },
                success: function(response) {
                    var percentage = 0;
                    var timer = setInterval(function() {
                        percentage = percentage + 20;
                        progress_bar_process_gunning(percentage, timer);
                    }, 1000);
                }
            });
        }
    });


    function progress_bar_process_gunning(percentage, timer) {
        $('.progress-bar').css('width', percentage + '%');
        if (percentage > 100) {
            clearInterval(timer);
            $('#form_gunning')[0].reset();
            $('#process_gunning').css('display', 'none');
            $('#sedang_dikirim_gunning').show();
            $('.progress-bar').css('width', percentage + '%');
            $('#upload_gunning').attr('disabled', false);
            message('success', 'Dokumen Berhasil Di Upload');
            location.reload()
        }
    }




    // sho
    var form_sho = $('#form_sho');
    form_sho.on('submit', function(e) {
        e.preventDefault();
        var id_detail_program_penyedia_jasa = $('[name="id_detail_program_penyedia_jasa"]').val();
        if ($('.file_sho').val() == '') {
            $('#error_file_sho').show();
            setTimeout(function() {
                $('#error_file_sho').hide();
            }, 4000);
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>administrasi_kontrak/administrasi_kontrak/upload_sho/" + id_detail_program_penyedia_jasa,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#upload_sho').attr('disabled', 'disabled');
                    $('#process_sho').css('display', 'block');
                    $('#sedang_dikirim_sho').show();
                },
                success: function(response) {
                    var percentage = 0;
                    var timer = setInterval(function() {
                        percentage = percentage + 20;
                        progress_bar_process_sho(percentage, timer);
                    }, 1000);
                }
            });
        }
    });


    function progress_bar_process_sho(percentage, timer) {
        $('.progress-bar').css('width', percentage + '%');
        if (percentage > 100) {
            clearInterval(timer);
            $('#form_sho')[0].reset();
            $('#process_sho').css('display', 'none');
            $('#sedang_dikirim_sho').show();
            $('.progress-bar').css('width', percentage + '%');
            $('#upload_sho').attr('disabled', false);
            message('success', 'Dokumen Berhasil Di Upload');
            location.reload()
        }
    }


    // smk
    var form_smk = $('#form_smk');
    form_smk.on('submit', function(e) {
        e.preventDefault();
        var id_detail_program_penyedia_jasa = $('[name="id_detail_program_penyedia_jasa"]').val();
        if ($('.file_smk').val() == '') {
            $('#error_file_smk').show();
            setTimeout(function() {
                $('#error_file_smk').hide();
            }, 4000);
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>administrasi_kontrak/administrasi_kontrak/upload_smk/" + id_detail_program_penyedia_jasa,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#upload_smk').attr('disabled', 'disabled');
                    $('#process_smk').css('display', 'block');
                    $('#sedang_dikirim_smk').show();
                },
                success: function(response) {
                    var percentage = 0;
                    var timer = setInterval(function() {
                        percentage = percentage + 20;
                        progress_bar_process_smk(percentage, timer);
                    }, 1000);
                }
            });
        }
    });


    function progress_bar_process_smk(percentage, timer) {
        $('.progress-bar').css('width', percentage + '%');
        if (percentage > 100) {
            clearInterval(timer);
            $('#form_smk')[0].reset();
            $('#process_smk').css('display', 'none');
            $('#sedang_dikirim_smk').show();
            $('.progress-bar').css('width', percentage + '%');
            $('#upload_smk').attr('disabled', false);
            message('success', 'Dokumen Berhasil Di Upload');
            location.reload()
        }
    }
</script>


<!-- INI UNTUK ADMINISTRASI KONTRAK -->

<script>
    var modal_bapp = $('#modal_bapp');
    var form_bapp = $('#form_bapp');

    function Bapp(id) {
        $.ajax({
            type: "GET",
            url: "<?= base_url('administrasi_kontrak/administrasi_kontrak/byid_program_penyedia_jasa/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                modal_bapp.modal('show');
                $('[name="id_detail_program_penyedia_jasa"]').val(response['row_program_penyedia_jasa'].id_detail_program_penyedia_jasa);
                $('[name="nama_penyedia"]').val(response['row_program_penyedia_jasa'].nama_penyedia);
                // bapp row
                $('[name="nomor_bapp"]').val(response['bapp_row'].nomor_bapp);
                $('[name="tanggal_bapp"]').val(response['bapp_row'].tanggal_bapp);
                $('[name="no_pekerjaan_bapp"]').val(response['bapp_row'].no_pekerjaan_bapp);
                $('[name="tanggal_pekerjaan_bapp"]').val(response['bapp_row'].tanggal_pekerjaan_bapp);
                $('[name="no_pekerjaan_spmk"]').val(response['bapp_row'].no_pekerjaan_spmk);
                $('[name="tanggal_pekerjaan_spmk"]').val(response['bapp_row'].tanggal_pekerjaan_spmk);
                $('[name="no_pekerjaan_ppp_pihak_kedua"]').val(response['bapp_row'].no_pekerjaan_ppp_pihak_kedua);
                $('[name="tanggal_pekerjaan_ppp_pihak_kedua"]').val(response['bapp_row'].tanggal_pekerjaan_ppp_pihak_kedua);
            }
        })
    }

    function simpan_bapp(id) {
        $.ajax({
            method: "POST",
            url: "<?= base_url('administrasi_kontrak/administrasi_kontrak/simpan_bapp/') ?>" + id,
            data: form_bapp.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('success', 'Berhasil', 'Berhasil Update Format!')
                    location.reload()
                } else {}
            }
        })
    }

</script>

<script>
    var tbl_addendum_fq = $('#tbl_addendum_fq');
    var id_detail_sub_program_penyedia_jasa = $('[name="id_detail_sub_program_penyedia_jasa"]').val();

    function reloadTable_addendum_pq() {
        tbl_addendum_fq.DataTable().ajax.reload();
    }

    $(document).ready(function() {
        tbl_addendum_fq.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('administrasi_kontrak/administrasi_kontrak/get_data_addendum_pq/') ?>" + id_detail_sub_program_penyedia_jasa,
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
                "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                "sProcessing": "Memuat Data...."
            }
        });
    });

    var modal_buat_addendum_pq = $('#buat_addendum_pq');
    var form_addendum_kontrak_pq = $('#form_addendum_kontrak_pq');

    function Simpan_addendum_pq() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('administrasi_kontrak/administrasi_kontrak/save_addendum_pq') ?>",
            data: form_addendum_kontrak_pq.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    modal_buat_addendum_pq.modal('hide');
                    message('success', 'Berhasil', 'Berhasil Buat Addendum!')
                    reloadTable_addendum_pq()
                } else {}
            }
        })
    }
</script>