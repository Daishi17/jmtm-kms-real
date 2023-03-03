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
            url: "<?= base_url('admin/data_kontrak/byid/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'detail_kontrak') {
                    window.location.href = "<?= base_url('admin/data_kontrak/detail_kontrak/') ?>" + id
                } else if (type == 'kelola_level') {
                    window.location.href = "<?= base_url('admin/data_kontrak/kelola_level/') ?>" + id
                } else if (type == 'kelola_level_unit_price') {
                    window.location.href = "<?= base_url('admin/data_kontrak/kelola_level_unit_price/') ?>" + id
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
                        url: "<?= base_url('admin/data_kontrak/status_control/') ?>" + id_pegawai,
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
                        url: "<?= base_url('admin/data_kontrak/status_control/') ?>" + id_pegawai,
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
            url: "<?= base_url('admin/data_kontrak/add_kontrak/') ?>",
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
            url: "<?= base_url('admin/data_kontrak/update_pegawai/') ?>" + id_pegawai,
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
                "url": "<?= base_url('admin/data_kontrak/get_data/') ?>",
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
            url: "<?= base_url('admin/data_kontrak/update_row_detail_capex') ?>",
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


<script>
    var modal_rup = $('#rup');
    var form_tambah_rup = $('#form_tambah_rup');
    function rup(id) {
        $('[name="id_detail_program_penyedia_jasa"]').val(id);
        modal_rup.modal('show');
    }

    function save_rup() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/administrasi_penyedia/add_rup') ?>",
            data: form_tambah_rup.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    modal_rup.modal('hide')
                    message('success', 'Data Berhasil Di Buat!', 'Berhasil');
                    location.reload()
                    form_tambah_rup[0].reset();
                }
            }
        })
    }
</script>

<script>
    // pip
    var modal_pip = $('#pip');
    var form_tambah_pip = $('#form_tambah_pip');
    function pip(id) {
        $('[name="id_detail_program_penyedia_jasa"]').val(id);
        modal_pip.modal('show');
    }

    function save_pip() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/administrasi_penyedia/add_pip') ?>",
            data: form_tambah_pip.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    modal_pip.modal('hide')
                    message('success', 'Data Berhasil Di Buat!', 'Berhasil');
                    location.reload()
                    form_tambah_pip[0].reset();
                }
            }
        })
    }
</script>

<script>
    // hps
    var modal_hps = $('#hps');
    var form_tambah_hps = $('#form_tambah_hps');
    function hps(id) {
        $('[name="id_detail_program_penyedia_jasa"]').val(id);
        modal_hps.modal('show');
    }

    function save_hps() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/administrasi_penyedia/add_hps') ?>",
            data: form_tambah_hps.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    modal_hps.modal('hide')
                    message('success', 'Data Berhasil Di Buat!', 'Berhasil');
                    location.reload()
                    form_tambah_hps[0].reset();
                }
            }
        })
    }
</script>

<script>
    // nota
    var modal_nota = $('#nota');
    var form_tambah_nota = $('#form_tambah_nota');
    function nota(id) {
        $('[name="id_detail_program_penyedia_jasa"]').val(id);
        modal_nota.modal('show');
    }

    function save_nota() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/administrasi_penyedia/add_nota') ?>",
            data: form_tambah_nota.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    modal_nota.modal('hide')
                    message('success', 'Data Berhasil Di Buat!', 'Berhasil');
                    location.reload()
                    form_tambah_nota[0].reset();
                }
            }
        })
    }
</script>

<script>
    var modal_kelola_surat = $('#kelola_surat');
    function Kelola_surat(id) {
        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/administrasi_penyedia/byid_detail_program_penyedia_jasa/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                modal_kelola_surat.modal('show')
                $('[name="id_detail_program_penyedia_jasa"]').val(response['row_program_detail'].id_detail_program_penyedia_jasa);
                $('[name="jenis_pengadaan"]').val(response['row_program_detail'].jenis_pengadaan);
                $('[name="nama_pekerjaan_pip"]').val(response['row_program_detail'].nama_pekerjaan_pip);
                $('[name="no_surat_pip"]').val(response['row_program_detail'].no_surat_pip);
                $('[name="tgl_surat_pip"]').val(response['row_program_detail'].tgl_surat_pip);
                $('[name="lokasi_pekerjaan_pip"]').val(response['row_program_detail'].lokasi_pekerjaan_pip);
                $('[name="sasaran_pekerjaan_pip"]').val(response['row_program_detail'].sasaran_pekerjaan_pip);
                $('[name="biaya_rkap_pip"]').val(response['row_program_detail'].biaya_rkap_pip);
                $('[name="perkiraan_biaya_pip"]').val(response['row_program_detail'].perkiraan_biaya_pip);
                $('[name="waktu_pelaksanaan_pip"]').val(response['row_program_detail'].waktu_pelaksanaan_pip);
                $('[name="waktu_pemeliharaan_pip"]').val(response['row_program_detail'].waktu_pemeliharaan_pip);
                $('[name="pembebanan_biaya"]').val(response['row_program_detail'].pembebanan_biaya);
                $('[name="format_persetujuan_pip"]').val(response['row_program_detail'].format_persetujuan_pip);
                $('[name="no_surat_hps"]').val(response['row_program_detail'].no_surat_hps);
                $('[name="tgl_surat_hps"]').val(response['row_program_detail'].tgl_surat_hps);
                $('[name="format_persetujuan_hps"]').val(response['row_program_detail'].format_persetujuan_hps);
                $('[name="no_surat_nota"]').val(response['row_program_detail'].no_surat_nota);
                $('[name="tgl_surat_nota"]').val(response['row_program_detail'].tgl_surat_nota);
                $('[name="format_persetujuan_nota"]').val(response['row_program_detail'].format_persetujuan_nota);
                $('[name="total_hps_mata_anggaran"]').val(response['row_program_detail'].total_hps_mata_anggaran);
            }
        })
    }
</script>