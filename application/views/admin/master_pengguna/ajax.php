<script>
    var tabledata = $('#table')
    var form_edit = $('#form_edit')
    var form_tambah = $('#form_tambah')
    var modal_tambah = $('#modal-lg1')
    var modal_edit = $('#modal_edit')

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
        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_pengguna/byid/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    modal_edit.modal('show')
                    $('#nm').val(response['nama_pegawai'])
                    $('#nip').val(response['nip'])
                    $('#telepon').val(response['telepon'])
                    $('#alamat').val(response['alamat'])
                    $('#username').val(response['username'])
                    $('#email').val(response['email'])
                    $('[name="status"]').val(response.status)
                    $('[name="id_pegawai"]').val(response.id_pegawai)
                } else if (type == 'non_aktif') {
                    Question(response.id_pegawai, response.nama_user, 'non_aktif', "Ingin Menon-aktifkan Pegawai   ");
                } else if (type == 'aktif') {
                    Question(response.id_pegawai, response.nama_user, 'aktif', "Ingin Meng-aktifkan Pegawai   ")
                }
            }
        })
    }

    function Question(id_pegawai, nama_pegawai, status, text) {
        swal({
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
                        url: "<?= base_url('admin/data_pengguna/status_control/') ?>" + id_pegawai,
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
                        url: "<?= base_url('admin/data_pengguna/status_control/') ?>" + id_pegawai,
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

    function save_pegawai() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_pengguna/add_pegawai/') ?>",
            data: form_tambah.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response) {
                    modal_tambah.modal('hide')
                    message('success', 'Data Berhasil Di Buat!', 'Berhasil')
                    reloadTable()
                }
            }
        })
    }


    function edit_data() {
        var id_pegawai = $('[name="id_pegawai"]').val()
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_pengguna/update_pegawai/') ?>" + id_pegawai,
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
                "url": "<?= base_url('admin/data_pengguna/get_data') ?>",
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
	$(document).ready(function() {
		$('#id_departemen').change(function() {
			var id_departemen = $('#id_departemen').val();
			$.ajax({
				type: 'GET',
				url: '<?= base_url('admin/data_pengguna/get_area') ?>/' + id_departemen,
				success: function(html) {
					$('.area').html(html);
				}
			});
		})
	})
</script>


<script>
	$(document).ready(function() {
		$('#id_area').change(function() {
			var id_area = $('#id_area').val();
			$.ajax({
				type: 'GET',
				url: '<?= base_url('admin/data_pengguna/get_sub_area') ?>/' + id_area,
				success: function(html) {
					$('.sub_area').html(html);
				}
			});
		})
	})
</script>