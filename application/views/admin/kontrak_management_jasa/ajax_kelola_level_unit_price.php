<script>
    function message(icon, text, title) {
        Swal.fire({
            title: title,
            text: text,
            icon: icon,
        });
    }

    var modal_add_level_1 = $('#add_level_1');
    var form_add_level_1 = $('#form_add_level_1');

    function Simpan_add_level_1(type) {
        if (type == 'tambah_level_1') {
            saveData = 'tambah_level_1';
            var url = "<?= base_url('admin/data_kontrak/tambah_level_1_unit_price') ?>";
        }

        $.ajax({
            method: "POST",
            url: url,
            data: form_add_level_1.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('.button_add_level_1').addClass('disabled');
            },
            success: function(response) {
                if (response == 'success') {
                    if (type == 'tambah_level_1') {
                        $('.button_add_level_1').removeClass('disabled');
                        modal_add_level_1.modal('hide')
                        message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                        location.reload()
                    }
                }
            }
        })
    }
</script>

<script>
    var id_kontrak = $('[name="id_kontrak"]').val();
    var grand_total = $('[name="grand_total"]').val();
    update_nilai_kontrak(id_kontrak)

    function update_nilai_kontrak(id_kontrak) {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/data_kontrak/update_nilai_kontrak/') ?>" + id_kontrak,
            data: {
                grand_total: grand_total
            },
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    // message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                }
            }
        })
    }
</script>

<!-- UNIT PRICE -->

<script>
    var form_modal_level_1_unit_price = $('#form_modal_level_1_unit_price')
    var form_simpan_level_1_unit_price = $('#form_simpan_level_1_unit_price')


    function modal_level_1_unit_price(id, type) {

        if (type == 'update_nilai_level_1_unit_price') {

        }
        if (type == 'tambah_level_1_unit_price') {

        }
        if (type == 'edit_level_1_unit_price') {

        }
        if (type == 'hapus_level_1_unit_price') {

        }
        if (type == 'urutan_level_1_unit_price') {

        }

        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_kontrak/by_id_unit_price/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'update_nilai_level_1_unit_price') {
                    form_modal_level_1_unit_price.modal('show');
                    // kondisi butoon dan form
                    $('#form_input_nilai_level_1_unit_price').css('display', 'block')
                    $('#button_update_nilai_level_1_unit_price').css('display', 'block')
                    // kondisi butoon dan form
                    $('#form_tambah_level_1_unit_price').css('display', 'none')
                    $('#button_tambah_level_1_unit_price').css('display', 'none')
                    $('#button_edit_level_1_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price'].id_unit_price);
                    $('[name="harga_satuan"]').val(response['row_unit_price'].harga_satuan);
                    $('[name="kuantitas"]').val(response['row_unit_price'].kuantitas);
                    $('[name="satuan"]').val(response['row_unit_price'].satuan);
                    $('#title_modal_level_1_unit_price').text('Update Nilai Kontrak')
                }
                if (type == 'tambah_level_1_unit_price') {
                    form_modal_level_1_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_1_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_1_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#form_tambah_level_1_unit_price').css('display', 'block')
                    $('#button_tambah_level_1_unit_price').css('display', 'block')
                    // edit button
                    $('#button_edit_level_1_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price'].id_unit_price);
                    $('#title_modal_level_1_unit_price').text('Tambah Uraian')
                }
                if (type == 'edit_level_1_unit_price') {
                    form_modal_level_1_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_1_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_1_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#button_tambah_level_1_unit_price').css('display', 'none')
                    // edit button
                    $('#form_tambah_level_1_unit_price').css('display', 'block')
                    $('#button_edit_level_1_unit_price').css('display', 'block')

                    $('[name="id_unit_price"]').val(response['row_unit_price'].id_unit_price);
                    $('[name="nama_uraian"]').val(response['row_unit_price'].nama_uraian);
                    $('#title_modal_level_1_unit_price').text('Edit Uraian')
                }
                if (type == 'hapus_level_1_unit_price') {
                    Question_level_1(response['row_unit_price'].nama_uraian, response['row_unit_price'].id_unit_price, response['row_unit_price'].id_kontrak)
                }
            }
        })
    }




    function Simpan_level_1_unit_price(type) {
        if (type == 'update_nilai_level_1_unit_price') {
            saveData = 'update_nilai_level_1_unit_price';
            var url = "<?= base_url('admin/data_kontrak/update_nilai_level_1_unit_price') ?>";
        }
        if (type == 'tambah_level_1_unit_price') {
            saveData = 'tambah_level_1_unit_price';
            var url = "<?= base_url('admin/data_kontrak/tambah_nama_uraian_level_1_unit_price') ?>";
        }
        if (type == 'edit_level_1_unit_price') {
            saveData = 'edit_level_1_unit_price';
            var url = "<?= base_url('admin/data_kontrak/edit_nama_uraian_level_1_unit_price') ?>";
        }

        $.ajax({
            method: "POST",
            url: url,
            data: form_simpan_level_1_unit_price.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('.button_simpan').addClass('disabled');
            },
            success: function(response) {
                if (response == 'success') {
                    if (type == 'update_nilai_level_1_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_1_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Update!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'tambah_level_1_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_1_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'edit_level_1_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_1_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Edit!', 'Berhasil')
                        location.reload()
                    }
                }
            }
        })
    }

    function Question_level_1(ket, id, id_kontrak) {
        Swal.fire({
            title: "Apakah Anda Yakin!?",
            text: 'Ingin Menghapus Data ' + ket + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/data_kontrak/hapus_induk_level_1_unit_price/') ?>" + id,
                    dataType: "JSON",
                    data: {
                        id_kontrak: id_kontrak
                    },
                    success: function(response) {
                        if (response == 'success') {
                            message('success', 'Berhasil!', 'Data Berhasil Di Hapus')
                            location.reload()
                        }
                    }
                })
            } else {
                message('success', 'Berhasil!', 'Data Tidak Jadi Di Hapus')
            }
        });
    }


    $(".harga_satuan").keyup(function() {
        var harga = $(".harga_satuan").val();
        var tanpa_rupiah = document.getElementById('rupiah_harga_satuan_level_1_unit_price');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });
</script>

<!-- UNIT PRICE 1 -->
<script>
    var form_modal_level_2_unit_price = $('#form_modal_level_2_unit_price')
    var form_simpan_level_2_unit_price = $('#form_simpan_level_2_unit_price')


    function modal_level_2_unit_price(id, type) {

        if (type == 'update_nilai_level_2_unit_price') {

        }
        if (type == 'tambah_level_2_unit_price') {

        }
        if (type == 'edit_level_2_unit_price') {

        }
        if (type == 'hapus_level_2_unit_price') {

        }
        if (type == 'urutan_level_2_unit_price') {

        }

        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_kontrak/by_id_unit_price_1/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'update_nilai_level_2_unit_price') {
                    form_modal_level_2_unit_price.modal('show');
                    // kondisi butoon dan form
                    $('#form_input_nilai_level_2_unit_price').css('display', 'block')
                    $('#button_update_nilai_level_2_unit_price').css('display', 'block')
                    // kondisi butoon dan form
                    $('#form_tambah_level_2_unit_price').css('display', 'none')
                    $('#button_tambah_level_2_unit_price').css('display', 'none')
                    $('#button_edit_level_2_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_1'].id_unit_price_1);
                    $('[name="harga_satuan"]').val(response['row_unit_price_1'].harga_satuan);
                    $('[name="kuantitas"]').val(response['row_unit_price_1'].kuantitas);
                    $('[name="satuan"]').val(response['row_unit_price_1'].satuan);
                    $('#title_modal_level_2_unit_price').text('Update Nilai Kontrak')
                }
                if (type == 'tambah_level_2_unit_price') {
                    form_modal_level_2_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_2_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_2_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#form_tambah_level_2_unit_price').css('display', 'block')
                    $('#button_tambah_level_2_unit_price').css('display', 'block')
                    // edit button
                    $('#button_edit_level_2_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_1'].id_unit_price_1);
                    $('#title_modal_level_2_unit_price').text('Tambah Uraian')
                }
                if (type == 'edit_level_2_unit_price') {
                    form_modal_level_2_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_2_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_2_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#button_tambah_level_2_unit_price').css('display', 'none')
                    // edit button
                    $('#form_tambah_level_2_unit_price').css('display', 'block')
                    $('#button_edit_level_2_unit_price').css('display', 'block')

                    $('[name="id_unit_price"]').val(response['row_unit_price_1'].id_unit_price_1);
                    $('[name="nama_uraian"]').val(response['row_unit_price_1'].nama_uraian);
                    $('#title_modal_level_2_unit_price').text('Edit Uraian')
                }
                if (type == 'hapus_level_2_unit_price') {
                    Question_level_2(response['row_unit_price_1'].nama_uraian, response['row_unit_price_1'].id_unit_price_1, response['row_unit_price_1'].id_unit_price)
                }
                if (type == 'urutan_level_2_unit_price') {
                    Urutan_level_2(response['result_bua'], response)
                }
            }
        })
    }




    function Simpan_level_2_unit_price(type) {
        if (type == 'update_nilai_level_2_unit_price') {
            saveData = 'update_nilai_level_2_unit_price';
            var url = "<?= base_url('admin/data_kontrak/update_nilai_level_2_unit_price') ?>";
        }
        if (type == 'tambah_level_2_unit_price') {
            saveData = 'tambah_level_2_unit_price';
            var url = "<?= base_url('admin/data_kontrak/tambah_nama_uraian_level_2_unit_price') ?>";
        }
        if (type == 'edit_level_2_unit_price') {
            saveData = 'edit_level_2_unit_price';
            var url = "<?= base_url('admin/data_kontrak/edit_nama_uraian_level_2_unit_price') ?>";
        }

        $.ajax({
            method: "POST",
            url: url,
            data: form_simpan_level_2_unit_price.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('.button_simpan').addClass('disabled');
            },
            success: function(response) {
                if (response == 'success') {
                    if (type == 'update_nilai_level_2_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_2_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Update!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'tambah_level_2_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_2_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'edit_level_2_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_2_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Edit!', 'Berhasil')
                        location.reload()
                    }
                }
            }
        })
    }

    function Urutan_level_2(all_data, response) {
        var html = '';
        var i;
        var start = response.start;
        for (i = 0; i < all_data.length; ++i) {
            html += '' + all_data[i].display_order + '';
        }
        Swal.fire({
            title: 'Pilih Urutan',
            input: 'select',
            inputOptions: {
                '1': '1',
                '2': '2',
                '3': '3',
            },
            inputPlaceholder: '-- Pindahkan Urutan --',
            showCancelButton: true,
            inputValidator: function(value) {
                return new Promise(function(resolve, reject) {
                    if (value !== '') {
                        resolve();
                    } else {
                        resolve('You need to select a Tier');
                    }
                });
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    html: 'You selected: ' + result.value
                });
            }
        });
    }


    function Question_level_2(ket, id, id_unit_price) {
        Swal.fire({
            title: "Apakah Anda Yakin!?",
            text: 'Ingin Menghapus Data ' + ket + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/data_kontrak/hapus_induk_level_2_unit_price/') ?>" + id,
                    dataType: "JSON",
                    data: {
                        id_unit_price: id_unit_price
                    },
                    success: function(response) {
                        if (response == 'success') {
                            message('success', 'Berhasil!', 'Data Berhasil Di Hapus')
                            location.reload()
                        }
                    }
                })
            } else {
                message('success', 'Berhasil!', 'Data Tidak Jadi Di Hapus')
            }
        });
    }


    $(".harga_satuan").keyup(function() {
        var harga = $(".harga_satuan").val();
        var tanpa_rupiah = document.getElementById('rupiah_harga_satuan_level_2_unit_price');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });
</script>


<!-- UNIT PRICE 2 -->
<script>
    var form_modal_level_3_unit_price = $('#form_modal_level_3_unit_price')
    var form_simpan_level_3_unit_price = $('#form_simpan_level_3_unit_price')


    function modal_level_3_unit_price(id, type) {

        if (type == 'update_nilai_level_3_unit_price') {

        }
        if (type == 'tambah_level_3_unit_price') {

        }
        if (type == 'edit_level_3_unit_price') {

        }
        if (type == 'hapus_level_3_unit_price') {

        }
        if (type == 'urutan_level_3_unit_price') {

        }

        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_kontrak/by_id_unit_price_2/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'update_nilai_level_3_unit_price') {
                    form_modal_level_3_unit_price.modal('show');
                    // kondisi butoon dan form
                    $('#form_input_nilai_level_3_unit_price').css('display', 'block')
                    $('#button_update_nilai_level_3_unit_price').css('display', 'block')
                    // kondisi butoon dan form
                    $('#form_tambah_level_3_unit_price').css('display', 'none')
                    $('#button_tambah_level_3_unit_price').css('display', 'none')
                    $('#button_edit_level_3_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_2'].id_unit_price_2);
                    $('[name="harga_satuan"]').val(response['row_unit_price_2'].harga_satuan);
                    $('[name="kuantitas"]').val(response['row_unit_price_2'].kuantitas);
                    $('[name="satuan"]').val(response['row_unit_price_2'].satuan);
                    $('#title_modal_level_3_unit_price').text('Update Nilai Kontrak')
                }
                if (type == 'tambah_level_3_unit_price') {
                    form_modal_level_3_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_3_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_3_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#form_tambah_level_3_unit_price').css('display', 'block')
                    $('#button_tambah_level_3_unit_price').css('display', 'block')
                    // edit button
                    $('#button_edit_level_3_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_2'].id_unit_price_2);
                    $('#title_modal_level_3_unit_price').text('Tambah Uraian')
                }
                if (type == 'edit_level_3_unit_price') {
                    form_modal_level_3_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_3_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_3_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#button_tambah_level_3_unit_price').css('display', 'none')
                    // edit button
                    $('#form_tambah_level_3_unit_price').css('display', 'block')
                    $('#button_edit_level_3_unit_price').css('display', 'block')

                    $('[name="id_unit_price"]').val(response['row_unit_price_2'].id_unit_price_2);
                    $('[name="nama_uraian"]').val(response['row_unit_price_2'].nama_uraian);
                    $('#title_modal_level_3_unit_price').text('Edit Uraian')
                }
                if (type == 'hapus_level_3_unit_price') {
                    Question_level_3(response['row_unit_price_2'].nama_uraian, response['row_unit_price_2'].id_unit_price_2, response['row_unit_price_2'].id_unit_price_1)
                }
                if (type == 'urutan_level_3_unit_price') {
                    Urutan_level_3(response['result_bua'], response)
                }
            }
        })
    }




    function Simpan_level_3_unit_price(type) {
        if (type == 'update_nilai_level_3_unit_price') {
            saveData = 'update_nilai_level_3_unit_price';
            var url = "<?= base_url('admin/data_kontrak/update_nilai_level_3_unit_price') ?>";
        }
        if (type == 'tambah_level_3_unit_price') {
            saveData = 'tambah_level_3_unit_price';
            var url = "<?= base_url('admin/data_kontrak/tambah_nama_uraian_level_3_unit_price') ?>";
        }
        if (type == 'edit_level_3_unit_price') {
            saveData = 'edit_level_3_unit_price';
            var url = "<?= base_url('admin/data_kontrak/edit_nama_uraian_level_3_unit_price') ?>";
        }

        $.ajax({
            method: "POST",
            url: url,
            data: form_simpan_level_3_unit_price.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('.button_simpan').addClass('disabled');
            },
            success: function(response) {
                if (response == 'success') {
                    if (type == 'update_nilai_level_3_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_3_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Update!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'tambah_level_3_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_3_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'edit_level_3_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_3_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Edit!', 'Berhasil')
                        location.reload()
                    }
                }
            }
        })
    }

    function Urutan_level_3(all_data, response) {
        var html = '';
        var i;
        var start = response.start;
        for (i = 0; i < all_data.length; ++i) {
            html += '' + all_data[i].display_order + '';
        }
        Swal.fire({
            title: 'Pilih Urutan',
            input: 'select',
            inputOptions: {
                '1': '1',
                '2': '2',
                '3': '3',
            },
            inputPlaceholder: '-- Pindahkan Urutan --',
            showCancelButton: true,
            inputValidator: function(value) {
                return new Promise(function(resolve, reject) {
                    if (value !== '') {
                        resolve();
                    } else {
                        resolve('You need to select a Tier');
                    }
                });
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    html: 'You selected: ' + result.value
                });
            }
        });
    }


    function Question_level_3(ket, id, id_unit_price_1) {
        Swal.fire({
            title: "Apakah Anda Yakin!?",
            text: 'Ingin Menghapus Data ' + ket + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/data_kontrak/hapus_induk_level_3_unit_price/') ?>" + id,
                    dataType: "JSON",
                    data: {
                        id_unit_price_1: id_unit_price_1
                    },
                    success: function(response) {
                        if (response == 'success') {
                            message('success', 'Berhasil!', 'Data Berhasil Di Hapus')
                            location.reload()
                        }
                    }
                })
            } else {
                message('success', 'Berhasil!', 'Data Tidak Jadi Di Hapus')
            }
        });
    }


    $(".harga_satuan").keyup(function() {
        var harga = $(".harga_satuan").val();
        var tanpa_rupiah = document.getElementById('rupiah_harga_satuan_level_3_unit_price');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });
</script>


<!-- UNIT PRICE 3 -->
<!-- level_4 -->
<!-- price_3 -->
<script>
    var form_modal_level_4_unit_price = $('#form_modal_level_4_unit_price')
    var form_simpan_level_4_unit_price = $('#form_simpan_level_4_unit_price')


    function modal_level_4_unit_price(id, type) {

        if (type == 'update_nilai_level_4_unit_price') {

        }
        if (type == 'tambah_level_4_unit_price') {

        }
        if (type == 'edit_level_4_unit_price') {

        }
        if (type == 'hapus_level_4_unit_price') {

        }
        if (type == 'urutan_level_4_unit_price') {

        }

        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_kontrak/by_id_unit_price_3/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'update_nilai_level_4_unit_price') {
                    form_modal_level_4_unit_price.modal('show');
                    // kondisi butoon dan form
                    $('#form_input_nilai_level_4_unit_price').css('display', 'block')
                    $('#button_update_nilai_level_4_unit_price').css('display', 'block')
                    // kondisi butoon dan form
                    $('#form_tambah_level_4_unit_price').css('display', 'none')
                    $('#button_tambah_level_4_unit_price').css('display', 'none')
                    $('#button_edit_level_4_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_3'].id_unit_price_3);
                    $('[name="harga_satuan"]').val(response['row_unit_price_3'].harga_satuan);
                    $('[name="kuantitas"]').val(response['row_unit_price_3'].kuantitas);
                    $('[name="satuan"]').val(response['row_unit_price_3'].satuan);
                    $('#title_modal_level_4_unit_price').text('Update Nilai Kontrak')
                }
                if (type == 'tambah_level_4_unit_price') {
                    form_modal_level_4_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_4_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_4_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#form_tambah_level_4_unit_price').css('display', 'block')
                    $('#button_tambah_level_4_unit_price').css('display', 'block')
                    // edit button
                    $('#button_edit_level_4_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_3'].id_unit_price_3);
                    $('#title_modal_level_4_unit_price').text('Tambah Uraian')
                }
                if (type == 'edit_level_4_unit_price') {
                    form_modal_level_4_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_4_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_4_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#button_tambah_level_4_unit_price').css('display', 'none')
                    // edit button
                    $('#form_tambah_level_4_unit_price').css('display', 'block')
                    $('#button_edit_level_4_unit_price').css('display', 'block')

                    $('[name="id_unit_price"]').val(response['row_unit_price_3'].id_unit_price_3);
                    $('[name="nama_uraian"]').val(response['row_unit_price_3'].nama_uraian);
                    $('#title_modal_level_4_unit_price').text('Edit Uraian')
                }
                if (type == 'hapus_level_4_unit_price') {
                    Question_level_4(response['row_unit_price_3'].nama_uraian, response['row_unit_price_3'].id_unit_price_3, response['row_unit_price_3'].id_unit_price_2)
                }
                if (type == 'urutan_level_4_unit_price') {
                    Urutan_level_4(response['result_bua'], response)
                }
            }
        })
    }




    function Simpan_level_4_unit_price(type) {
        if (type == 'update_nilai_level_4_unit_price') {
            saveData = 'update_nilai_level_4_unit_price';
            var url = "<?= base_url('admin/data_kontrak/update_nilai_level_4_unit_price') ?>";
        }
        if (type == 'tambah_level_4_unit_price') {
            saveData = 'tambah_level_4_unit_price';
            var url = "<?= base_url('admin/data_kontrak/tambah_nama_uraian_level_4_unit_price') ?>";
        }
        if (type == 'edit_level_4_unit_price') {
            saveData = 'edit_level_4_unit_price';
            var url = "<?= base_url('admin/data_kontrak/edit_nama_uraian_level_4_unit_price') ?>";
        }

        $.ajax({
            method: "POST",
            url: url,
            data: form_simpan_level_4_unit_price.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('.button_simpan').addClass('disabled');
            },
            success: function(response) {
                if (response == 'success') {
                    if (type == 'update_nilai_level_4_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_4_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Update!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'tambah_level_4_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_4_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'edit_level_4_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_4_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Edit!', 'Berhasil')
                        location.reload()
                    }
                }
            }
        })
    }

    function Urutan_level_4(all_data, response) {
        var html = '';
        var i;
        var start = response.start;
        for (i = 0; i < all_data.length; ++i) {
            html += '' + all_data[i].display_order + '';
        }
        Swal.fire({
            title: 'Pilih Urutan',
            input: 'select',
            inputOptions: {
                '1': '1',
                '2': '2',
                '3': '3',
            },
            inputPlaceholder: '-- Pindahkan Urutan --',
            showCancelButton: true,
            inputValidator: function(value) {
                return new Promise(function(resolve, reject) {
                    if (value !== '') {
                        resolve();
                    } else {
                        resolve('You need to select a Tier');
                    }
                });
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    html: 'You selected: ' + result.value
                });
            }
        });
    }


    function Question_level_4(ket, id, id_unit_price_2) {
        Swal.fire({
            title: "Apakah Anda Yakin!?",
            text: 'Ingin Menghapus Data ' + ket + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/data_kontrak/hapus_induk_level_4_unit_price/') ?>" + id,
                    dataType: "JSON",
                    data: {
                        id_unit_price_2: id_unit_price_2
                    },
                    success: function(response) {
                        if (response == 'success') {
                            message('success', 'Berhasil!', 'Data Berhasil Di Hapus')
                            location.reload()
                        }
                    }
                })
            } else {
                message('success', 'Berhasil!', 'Data Tidak Jadi Di Hapus')
            }
        });
    }


    $(".harga_satuan").keyup(function() {
        var harga = $(".harga_satuan").val();
        var tanpa_rupiah = document.getElementById('rupiah_harga_satuan_level_4_unit_price');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });
</script>


<!-- UNIT PRICE 4 -->
<!-- level_5 -->
<!-- price_4 -->
<script>
    var form_modal_level_5_unit_price = $('#form_modal_level_5_unit_price')
    var form_simpan_level_5_unit_price = $('#form_simpan_level_5_unit_price')


    function modal_level_5_unit_price(id, type) {

        if (type == 'update_nilai_level_5_unit_price') {

        }
        if (type == 'tambah_level_5_unit_price') {

        }
        if (type == 'edit_level_5_unit_price') {

        }
        if (type == 'hapus_level_5_unit_price') {

        }
        if (type == 'urutan_level_5_unit_price') {

        }

        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_kontrak/by_id_unit_price_4/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'update_nilai_level_5_unit_price') {
                    form_modal_level_5_unit_price.modal('show');
                    // kondisi butoon dan form
                    $('#form_input_nilai_level_5_unit_price').css('display', 'block')
                    $('#button_update_nilai_level_5_unit_price').css('display', 'block')
                    // kondisi butoon dan form
                    $('#form_tambah_level_5_unit_price').css('display', 'none')
                    $('#button_tambah_level_5_unit_price').css('display', 'none')
                    $('#button_edit_level_5_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_4'].id_unit_price_4);
                    $('[name="harga_satuan"]').val(response['row_unit_price_4'].harga_satuan);
                    $('[name="kuantitas"]').val(response['row_unit_price_4'].kuantitas);
                    $('[name="satuan"]').val(response['row_unit_price_4'].satuan);
                    $('#title_modal_level_5_unit_price').text('Update Nilai Kontrak')
                }
                if (type == 'tambah_level_5_unit_price') {
                    form_modal_level_5_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_5_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_5_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#form_tambah_level_5_unit_price').css('display', 'block')
                    $('#button_tambah_level_5_unit_price').css('display', 'block')
                    // edit button
                    $('#button_edit_level_5_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_4'].id_unit_price_4);
                    $('#title_modal_level_5_unit_price').text('Tambah Uraian')
                }
                if (type == 'edit_level_5_unit_price') {
                    form_modal_level_5_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_5_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_5_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#button_tambah_level_5_unit_price').css('display', 'none')
                    // edit button
                    $('#form_tambah_level_5_unit_price').css('display', 'block')
                    $('#button_edit_level_5_unit_price').css('display', 'block')

                    $('[name="id_unit_price"]').val(response['row_unit_price_4'].id_unit_price_4);
                    $('[name="nama_uraian"]').val(response['row_unit_price_4'].nama_uraian);
                    $('#title_modal_level_5_unit_price').text('Edit Uraian')
                }
                if (type == 'hapus_level_5_unit_price') {
                    Question_level_5(response['row_unit_price_4'].nama_uraian, response['row_unit_price_4'].id_unit_price_4, response['row_unit_price_4'].id_unit_price_3)
                }
                if (type == 'urutan_level_5_unit_price') {
                    Urutan_level_5(response['result_bua'], response)
                }
            }
        })
    }




    function Simpan_level_5_unit_price(type) {
        if (type == 'update_nilai_level_5_unit_price') {
            saveData = 'update_nilai_level_5_unit_price';
            var url = "<?= base_url('admin/data_kontrak/update_nilai_level_5_unit_price') ?>";
        }
        if (type == 'tambah_level_5_unit_price') {
            saveData = 'tambah_level_5_unit_price';
            var url = "<?= base_url('admin/data_kontrak/tambah_nama_uraian_level_5_unit_price') ?>";
        }
        if (type == 'edit_level_5_unit_price') {
            saveData = 'edit_level_5_unit_price';
            var url = "<?= base_url('admin/data_kontrak/edit_nama_uraian_level_5_unit_price') ?>";
        }

        $.ajax({
            method: "POST",
            url: url,
            data: form_simpan_level_5_unit_price.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('.button_simpan').addClass('disabled');
            },
            success: function(response) {
                if (response == 'success') {
                    if (type == 'update_nilai_level_5_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_5_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Update!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'tambah_level_5_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_5_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'edit_level_5_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_5_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Edit!', 'Berhasil')
                        location.reload()
                    }
                }
            }
        })
    }

    function Urutan_level_5(all_data, response) {
        var html = '';
        var i;
        var start = response.start;
        for (i = 0; i < all_data.length; ++i) {
            html += '' + all_data[i].display_order + '';
        }
        Swal.fire({
            title: 'Pilih Urutan',
            input: 'select',
            inputOptions: {
                '1': '1',
                '2': '2',
                '3': '3',
            },
            inputPlaceholder: '-- Pindahkan Urutan --',
            showCancelButton: true,
            inputValidator: function(value) {
                return new Promise(function(resolve, reject) {
                    if (value !== '') {
                        resolve();
                    } else {
                        resolve('You need to select a Tier');
                    }
                });
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    html: 'You selected: ' + result.value
                });
            }
        });
    }


    function Question_level_5(ket, id, id_unit_price_3) {
        Swal.fire({
            title: "Apakah Anda Yakin!?",
            text: 'Ingin Menghapus Data ' + ket + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/data_kontrak/hapus_induk_level_5_unit_price/') ?>" + id,
                    dataType: "JSON",
                    data: {
                        id_unit_price_3: id_unit_price_3
                    },
                    success: function(response) {
                        if (response == 'success') {
                            message('success', 'Berhasil!', 'Data Berhasil Di Hapus')
                            location.reload()
                        }
                    }
                })
            } else {
                message('success', 'Berhasil!', 'Data Tidak Jadi Di Hapus')
            }
        });
    }


    $(".harga_satuan").keyup(function() {
        var harga = $(".harga_satuan").val();
        var tanpa_rupiah = document.getElementById('rupiah_harga_satuan_level_5_unit_price');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });
</script>



<!-- UNIT PRICE 5 -->
<!-- level_6 -->
<!-- price_5 -->
<script>
    var form_modal_level_6_unit_price = $('#form_modal_level_6_unit_price')
    var form_simpan_level_6_unit_price = $('#form_simpan_level_6_unit_price')


    function modal_level_6_unit_price(id, type) {

        if (type == 'update_nilai_level_6_unit_price') {

        }
        if (type == 'tambah_level_6_unit_price') {

        }
        if (type == 'edit_level_6_unit_price') {

        }
        if (type == 'hapus_level_6_unit_price') {

        }
        if (type == 'urutan_level_6_unit_price') {

        }

        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_kontrak/by_id_unit_price_5/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'update_nilai_level_6_unit_price') {
                    form_modal_level_6_unit_price.modal('show');
                    // kondisi butoon dan form
                    $('#form_input_nilai_level_6_unit_price').css('display', 'block')
                    $('#button_update_nilai_level_6_unit_price').css('display', 'block')
                    // kondisi butoon dan form
                    $('#form_tambah_level_6_unit_price').css('display', 'none')
                    $('#button_tambah_level_6_unit_price').css('display', 'none')
                    $('#button_edit_level_6_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_5'].id_unit_price_5);
                    $('[name="harga_satuan"]').val(response['row_unit_price_5'].harga_satuan);
                    $('[name="kuantitas"]').val(response['row_unit_price_5'].kuantitas);
                    $('[name="satuan"]').val(response['row_unit_price_5'].satuan);
                    $('#title_modal_level_6_unit_price').text('Update Nilai Kontrak')
                }
                if (type == 'tambah_level_6_unit_price') {
                    form_modal_level_6_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_6_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_6_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#form_tambah_level_6_unit_price').css('display', 'block')
                    $('#button_tambah_level_6_unit_price').css('display', 'block')
                    // edit button
                    $('#button_edit_level_6_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_5'].id_unit_price_5);
                    $('#title_modal_level_6_unit_price').text('Tambah Uraian')
                }
                if (type == 'edit_level_6_unit_price') {
                    form_modal_level_6_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_6_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_6_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#button_tambah_level_6_unit_price').css('display', 'none')
                    // edit button
                    $('#form_tambah_level_6_unit_price').css('display', 'block')
                    $('#button_edit_level_6_unit_price').css('display', 'block')

                    $('[name="id_unit_price"]').val(response['row_unit_price_5'].id_unit_price_5);
                    $('[name="nama_uraian"]').val(response['row_unit_price_5'].nama_uraian);
                    $('#title_modal_level_6_unit_price').text('Edit Uraian')
                }
                if (type == 'hapus_level_6_unit_price') {
                    Question_level_6(response['row_unit_price_5'].nama_uraian, response['row_unit_price_5'].id_unit_price_5, response['row_unit_price_5'].id_unit_price_4)
                }
                if (type == 'urutan_level_6_unit_price') {
                    Urutan_level_6(response['result_bua'], response)
                }
            }
        })
    }




    function Simpan_level_6_unit_price(type) {
        if (type == 'update_nilai_level_6_unit_price') {
            saveData = 'update_nilai_level_6_unit_price';
            var url = "<?= base_url('admin/data_kontrak/update_nilai_level_6_unit_price') ?>";
        }
        if (type == 'tambah_level_6_unit_price') {
            saveData = 'tambah_level_6_unit_price';
            var url = "<?= base_url('admin/data_kontrak/tambah_nama_uraian_level_6_unit_price') ?>";
        }
        if (type == 'edit_level_6_unit_price') {
            saveData = 'edit_level_6_unit_price';
            var url = "<?= base_url('admin/data_kontrak/edit_nama_uraian_level_6_unit_price') ?>";
        }

        $.ajax({
            method: "POST",
            url: url,
            data: form_simpan_level_6_unit_price.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('.button_simpan').addClass('disabled');
            },
            success: function(response) {
                if (response == 'success') {
                    if (type == 'update_nilai_level_6_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_6_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Update!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'tambah_level_6_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_6_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'edit_level_6_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_6_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Edit!', 'Berhasil')
                        location.reload()
                    }
                }
            }
        })
    }

    function Urutan_level_6(all_data, response) {
        var html = '';
        var i;
        var start = response.start;
        for (i = 0; i < all_data.length; ++i) {
            html += '' + all_data[i].display_order + '';
        }
        Swal.fire({
            title: 'Pilih Urutan',
            input: 'select',
            inputOptions: {
                '1': '1',
                '2': '2',
                '3': '3',
            },
            inputPlaceholder: '-- Pindahkan Urutan --',
            showCancelButton: true,
            inputValidator: function(value) {
                return new Promise(function(resolve, reject) {
                    if (value !== '') {
                        resolve();
                    } else {
                        resolve('You need to select a Tier');
                    }
                });
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    html: 'You selected: ' + result.value
                });
            }
        });
    }


    function Question_level_6(ket, id, id_unit_price_4) {
        Swal.fire({
            title: "Apakah Anda Yakin!?",
            text: 'Ingin Menghapus Data ' + ket + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/data_kontrak/hapus_induk_level_6_unit_price/') ?>" + id,
                    dataType: "JSON",
                    data: {
                        id_unit_price_4: id_unit_price_4
                    },
                    success: function(response) {
                        if (response == 'success') {
                            message('success', 'Berhasil!', 'Data Berhasil Di Hapus')
                            location.reload()
                        }
                    }
                })
            } else {
                message('success', 'Berhasil!', 'Data Tidak Jadi Di Hapus')
            }
        });
    }


    $(".harga_satuan").keyup(function() {
        var harga = $(".harga_satuan").val();
        var tanpa_rupiah = document.getElementById('rupiah_harga_satuan_level_6_unit_price');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });
</script>



<!-- UNIT PRICE 6 -->
<!-- level_7 -->
<!-- price_6 -->
<script>
    var form_modal_level_7_unit_price = $('#form_modal_level_7_unit_price')
    var form_simpan_level_7_unit_price = $('#form_simpan_level_7_unit_price')


    function modal_level_7_unit_price(id, type) {

        if (type == 'update_nilai_level_7_unit_price') {

        }
        if (type == 'tambah_level_7_unit_price') {

        }
        if (type == 'edit_level_7_unit_price') {

        }
        if (type == 'hapus_level_7_unit_price') {

        }
        if (type == 'urutan_level_7_unit_price') {

        }

        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_kontrak/by_id_unit_price_6/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'update_nilai_level_7_unit_price') {
                    form_modal_level_7_unit_price.modal('show');
                    // kondisi butoon dan form
                    $('#form_input_nilai_level_7_unit_price').css('display', 'block')
                    $('#button_update_nilai_level_7_unit_price').css('display', 'block')
                    // kondisi butoon dan form
                    $('#form_tambah_level_7_unit_price').css('display', 'none')
                    $('#button_tambah_level_7_unit_price').css('display', 'none')
                    $('#button_edit_level_7_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_6'].id_unit_price_6);
                    $('[name="harga_satuan"]').val(response['row_unit_price_6'].harga_satuan);
                    $('[name="kuantitas"]').val(response['row_unit_price_6'].kuantitas);
                    $('[name="satuan"]').val(response['row_unit_price_6'].satuan);
                    $('#title_modal_level_7_unit_price').text('Update Nilai Kontrak')
                }
                if (type == 'tambah_level_7_unit_price') {
                    form_modal_level_7_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_7_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_7_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#form_tambah_level_7_unit_price').css('display', 'block')
                    $('#button_tambah_level_7_unit_price').css('display', 'block')
                    // edit button
                    $('#button_edit_level_7_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_6'].id_unit_price_6);
                    $('#title_modal_level_7_unit_price').text('Tambah Uraian')
                }
                if (type == 'edit_level_7_unit_price') {
                    form_modal_level_7_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_7_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_7_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#button_tambah_level_7_unit_price').css('display', 'none')
                    // edit button
                    $('#form_tambah_level_7_unit_price').css('display', 'block')
                    $('#button_edit_level_7_unit_price').css('display', 'block')

                    $('[name="id_unit_price"]').val(response['row_unit_price_6'].id_unit_price_6);
                    $('[name="nama_uraian"]').val(response['row_unit_price_6'].nama_uraian);
                    $('#title_modal_level_7_unit_price').text('Edit Uraian')
                }
                if (type == 'hapus_level_7_unit_price') {
                    Question_level_7(response['row_unit_price_6'].nama_uraian, response['row_unit_price_6'].id_unit_price_6, response['row_unit_price_6'].id_unit_price_5)
                }
                if (type == 'urutan_level_7_unit_price') {
                    Urutan_level_7(response['result_bua'], response)
                }
            }
        })
    }




    function Simpan_level_7_unit_price(type) {
        if (type == 'update_nilai_level_7_unit_price') {
            saveData = 'update_nilai_level_7_unit_price';
            var url = "<?= base_url('admin/data_kontrak/update_nilai_level_7_unit_price') ?>";
        }
        if (type == 'tambah_level_7_unit_price') {
            saveData = 'tambah_level_7_unit_price';
            var url = "<?= base_url('admin/data_kontrak/tambah_nama_uraian_level_7_unit_price') ?>";
        }
        if (type == 'edit_level_7_unit_price') {
            saveData = 'edit_level_7_unit_price';
            var url = "<?= base_url('admin/data_kontrak/edit_nama_uraian_level_7_unit_price') ?>";
        }

        $.ajax({
            method: "POST",
            url: url,
            data: form_simpan_level_7_unit_price.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('.button_simpan').addClass('disabled');
            },
            success: function(response) {
                if (response == 'success') {
                    if (type == 'update_nilai_level_7_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_7_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Update!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'tambah_level_7_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_7_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'edit_level_7_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_7_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Edit!', 'Berhasil')
                        location.reload()
                    }
                }
            }
        })
    }

    function Urutan_level_7(all_data, response) {
        var html = '';
        var i;
        var start = response.start;
        for (i = 0; i < all_data.length; ++i) {
            html += '' + all_data[i].display_order + '';
        }
        Swal.fire({
            title: 'Pilih Urutan',
            input: 'select',
            inputOptions: {
                '1': '1',
                '2': '2',
                '3': '3',
            },
            inputPlaceholder: '-- Pindahkan Urutan --',
            showCancelButton: true,
            inputValidator: function(value) {
                return new Promise(function(resolve, reject) {
                    if (value !== '') {
                        resolve();
                    } else {
                        resolve('You need to select a Tier');
                    }
                });
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    html: 'You selected: ' + result.value
                });
            }
        });
    }


    function Question_level_7(ket, id, id_unit_price_5) {
        Swal.fire({
            title: "Apakah Anda Yakin!?",
            text: 'Ingin Menghapus Data ' + ket + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/data_kontrak/hapus_induk_level_7_unit_price/') ?>" + id,
                    dataType: "JSON",
                    data: {
                        id_unit_price_5: id_unit_price_5
                    },
                    success: function(response) {
                        if (response == 'success') {
                            message('success', 'Berhasil!', 'Data Berhasil Di Hapus')
                            location.reload()
                        }
                    }
                })
            } else {
                message('success', 'Berhasil!', 'Data Tidak Jadi Di Hapus')
            }
        });
    }


    $(".harga_satuan").keyup(function() {
        var harga = $(".harga_satuan").val();
        var tanpa_rupiah = document.getElementById('rupiah_harga_satuan_level_7_unit_price');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });
</script>


<!-- UNIT PRICE 7 -->
<!-- level_8 -->
<!-- price_7 -->
<script>
    var form_modal_level_8_unit_price = $('#form_modal_level_8_unit_price')
    var form_simpan_level_8_unit_price = $('#form_simpan_level_8_unit_price')


    function modal_level_8_unit_price(id, type) {

        if (type == 'update_nilai_level_8_unit_price') {

        }
        if (type == 'tambah_level_8_unit_price') {

        }
        if (type == 'edit_level_8_unit_price') {

        }
        if (type == 'hapus_level_8_unit_price') {

        }
        if (type == 'urutan_level_8_unit_price') {

        }

        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_kontrak/by_id_unit_price_7/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'update_nilai_level_8_unit_price') {
                    form_modal_level_8_unit_price.modal('show');
                    // kondisi butoon dan form
                    $('#form_input_nilai_level_8_unit_price').css('display', 'block')
                    $('#button_update_nilai_level_8_unit_price').css('display', 'block')
                    // kondisi butoon dan form
                    $('#form_tambah_level_8_unit_price').css('display', 'none')
                    $('#button_tambah_level_8_unit_price').css('display', 'none')
                    $('#button_edit_level_8_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_7'].id_unit_price_7);
                    $('[name="harga_satuan"]').val(response['row_unit_price_7'].harga_satuan);
                    $('[name="kuantitas"]').val(response['row_unit_price_7'].kuantitas);
                    $('[name="satuan"]').val(response['row_unit_price_7'].satuan);
                    $('#title_modal_level_8_unit_price').text('Update Nilai Kontrak')
                }
                if (type == 'tambah_level_8_unit_price') {
                    form_modal_level_8_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_8_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_8_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#form_tambah_level_8_unit_price').css('display', 'block')
                    $('#button_tambah_level_8_unit_price').css('display', 'block')
                    // edit button
                    $('#button_edit_level_8_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_7'].id_unit_price_7);
                    $('#title_modal_level_8_unit_price').text('Tambah Uraian')
                }
                if (type == 'edit_level_8_unit_price') {
                    form_modal_level_8_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_8_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_8_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#button_tambah_level_8_unit_price').css('display', 'none')
                    // edit button
                    $('#form_tambah_level_8_unit_price').css('display', 'block')
                    $('#button_edit_level_8_unit_price').css('display', 'block')

                    $('[name="id_unit_price"]').val(response['row_unit_price_7'].id_unit_price_7);
                    $('[name="nama_uraian"]').val(response['row_unit_price_7'].nama_uraian);
                    $('#title_modal_level_8_unit_price').text('Edit Uraian')
                }
                if (type == 'hapus_level_8_unit_price') {
                    Question_level_8(response['row_unit_price_7'].nama_uraian, response['row_unit_price_7'].id_unit_price_7, response['row_unit_price_7'].id_unit_price_6)
                }
                if (type == 'urutan_level_8_unit_price') {
                    Urutan_level_8(response['result_bua'], response)
                }
            }
        })
    }




    function Simpan_level_8_unit_price(type) {
        if (type == 'update_nilai_level_8_unit_price') {
            saveData = 'update_nilai_level_8_unit_price';
            var url = "<?= base_url('admin/data_kontrak/update_nilai_level_8_unit_price') ?>";
        }
        if (type == 'tambah_level_8_unit_price') {
            saveData = 'tambah_level_8_unit_price';
            var url = "<?= base_url('admin/data_kontrak/tambah_nama_uraian_level_8_unit_price') ?>";
        }
        if (type == 'edit_level_8_unit_price') {
            saveData = 'edit_level_8_unit_price';
            var url = "<?= base_url('admin/data_kontrak/edit_nama_uraian_level_8_unit_price') ?>";
        }

        $.ajax({
            method: "POST",
            url: url,
            data: form_simpan_level_8_unit_price.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('.button_simpan').addClass('disabled');
            },
            success: function(response) {
                if (response == 'success') {
                    if (type == 'update_nilai_level_8_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_8_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Update!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'tambah_level_8_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_8_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'edit_level_8_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_8_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Edit!', 'Berhasil')
                        location.reload()
                    }
                }
            }
        })
    }

    function Urutan_level_8(all_data, response) {
        var html = '';
        var i;
        var start = response.start;
        for (i = 0; i < all_data.length; ++i) {
            html += '' + all_data[i].display_order + '';
        }
        Swal.fire({
            title: 'Pilih Urutan',
            input: 'select',
            inputOptions: {
                '1': '1',
                '2': '2',
                '3': '3',
            },
            inputPlaceholder: '-- Pindahkan Urutan --',
            showCancelButton: true,
            inputValidator: function(value) {
                return new Promise(function(resolve, reject) {
                    if (value !== '') {
                        resolve();
                    } else {
                        resolve('You need to select a Tier');
                    }
                });
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    html: 'You selected: ' + result.value
                });
            }
        });
    }


    function Question_level_8(ket, id, id_unit_price_6) {
        Swal.fire({
            title: "Apakah Anda Yakin!?",
            text: 'Ingin Menghapus Data ' + ket + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/data_kontrak/hapus_induk_level_8_unit_price/') ?>" + id,
                    dataType: "JSON",
                    data: {
                        id_unit_price_6: id_unit_price_6
                    },
                    success: function(response) {
                        if (response == 'success') {
                            message('success', 'Berhasil!', 'Data Berhasil Di Hapus')
                            location.reload()
                        }
                    }
                })
            } else {
                message('success', 'Berhasil!', 'Data Tidak Jadi Di Hapus')
            }
        });
    }


    $(".harga_satuan").keyup(function() {
        var harga = $(".harga_satuan").val();
        var tanpa_rupiah = document.getElementById('rupiah_harga_satuan_level_8_unit_price');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });
</script>



<!-- UNIT PRICE 8 -->
<!-- level_9 -->
<!-- price_8 -->
<script>
    var form_modal_level_9_unit_price = $('#form_modal_level_9_unit_price')
    var form_simpan_level_9_unit_price = $('#form_simpan_level_9_unit_price')


    function modal_level_9_unit_price(id, type) {

        if (type == 'update_nilai_level_9_unit_price') {

        }
        if (type == 'tambah_level_9_unit_price') {

        }
        if (type == 'edit_level_9_unit_price') {

        }
        if (type == 'hapus_level_9_unit_price') {

        }
        if (type == 'urutan_level_9_unit_price') {

        }

        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_kontrak/by_id_unit_price_8/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'update_nilai_level_9_unit_price') {
                    form_modal_level_9_unit_price.modal('show');
                    // kondisi butoon dan form
                    $('#form_input_nilai_level_9_unit_price').css('display', 'block')
                    $('#button_update_nilai_level_9_unit_price').css('display', 'block')
                    // kondisi butoon dan form
                    $('#form_tambah_level_9_unit_price').css('display', 'none')
                    $('#button_tambah_level_9_unit_price').css('display', 'none')
                    $('#button_edit_level_9_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_8'].id_unit_price_8);
                    $('[name="harga_satuan"]').val(response['row_unit_price_8'].harga_satuan);
                    $('[name="kuantitas"]').val(response['row_unit_price_8'].kuantitas);
                    $('[name="satuan"]').val(response['row_unit_price_8'].satuan);
                    $('#title_modal_level_9_unit_price').text('Update Nilai Kontrak')
                }
                if (type == 'tambah_level_9_unit_price') {
                    form_modal_level_9_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_9_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_9_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#form_tambah_level_9_unit_price').css('display', 'block')
                    $('#button_tambah_level_9_unit_price').css('display', 'block')
                    // edit button
                    $('#button_edit_level_9_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_8'].id_unit_price_8);
                    $('#title_modal_level_9_unit_price').text('Tambah Uraian')
                }
                if (type == 'edit_level_9_unit_price') {
                    form_modal_level_9_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_9_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_9_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#button_tambah_level_9_unit_price').css('display', 'none')
                    // edit button
                    $('#form_tambah_level_9_unit_price').css('display', 'block')
                    $('#button_edit_level_9_unit_price').css('display', 'block')

                    $('[name="id_unit_price"]').val(response['row_unit_price_8'].id_unit_price_8);
                    $('[name="nama_uraian"]').val(response['row_unit_price_8'].nama_uraian);
                    $('#title_modal_level_9_unit_price').text('Edit Uraian')
                }
                if (type == 'hapus_level_9_unit_price') {
                    Question_level_9(response['row_unit_price_8'].nama_uraian, response['row_unit_price_8'].id_unit_price_8, response['row_unit_price_8'].id_unit_price_7)
                }
                if (type == 'urutan_level_9_unit_price') {
                    Urutan_level_9(response['result_bua'], response)
                }
            }
        })
    }




    function Simpan_level_9_unit_price(type) {
        if (type == 'update_nilai_level_9_unit_price') {
            saveData = 'update_nilai_level_9_unit_price';
            var url = "<?= base_url('admin/data_kontrak/update_nilai_level_9_unit_price') ?>";
        }
        if (type == 'tambah_level_9_unit_price') {
            saveData = 'tambah_level_9_unit_price';
            var url = "<?= base_url('admin/data_kontrak/tambah_nama_uraian_level_9_unit_price') ?>";
        }
        if (type == 'edit_level_9_unit_price') {
            saveData = 'edit_level_9_unit_price';
            var url = "<?= base_url('admin/data_kontrak/edit_nama_uraian_level_9_unit_price') ?>";
        }

        $.ajax({
            method: "POST",
            url: url,
            data: form_simpan_level_9_unit_price.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('.button_simpan').addClass('disabled');
            },
            success: function(response) {
                if (response == 'success') {
                    if (type == 'update_nilai_level_9_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_9_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Update!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'tambah_level_9_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_9_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'edit_level_9_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_9_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Edit!', 'Berhasil')
                        location.reload()
                    }
                }
            }
        })
    }

    function Urutan_level_9(all_data, response) {
        var html = '';
        var i;
        var start = response.start;
        for (i = 0; i < all_data.length; ++i) {
            html += '' + all_data[i].display_order + '';
        }
        Swal.fire({
            title: 'Pilih Urutan',
            input: 'select',
            inputOptions: {
                '1': '1',
                '2': '2',
                '3': '3',
            },
            inputPlaceholder: '-- Pindahkan Urutan --',
            showCancelButton: true,
            inputValidator: function(value) {
                return new Promise(function(resolve, reject) {
                    if (value !== '') {
                        resolve();
                    } else {
                        resolve('You need to select a Tier');
                    }
                });
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    html: 'You selected: ' + result.value
                });
            }
        });
    }


    function Question_level_9(ket, id, id_unit_price_7) {
        Swal.fire({
            title: "Apakah Anda Yakin!?",
            text: 'Ingin Menghapus Data ' + ket + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/data_kontrak/hapus_induk_level_9_unit_price/') ?>" + id,
                    dataType: "JSON",
                    data: {
                        id_unit_price_7: id_unit_price_7
                    },
                    success: function(response) {
                        if (response == 'success') {
                            message('success', 'Berhasil!', 'Data Berhasil Di Hapus')
                            location.reload()
                        }
                    }
                })
            } else {
                message('success', 'Berhasil!', 'Data Tidak Jadi Di Hapus')
            }
        });
    }


    $(".harga_satuan").keyup(function() {
        var harga = $(".harga_satuan").val();
        var tanpa_rupiah = document.getElementById('rupiah_harga_satuan_level_9_unit_price');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });
</script>


<!-- UNIT PRICE 9 -->
<!-- level_10 -->
<!-- price_9 -->
<script>
    var form_modal_level_10_unit_price = $('#form_modal_level_10_unit_price')
    var form_simpan_level_10_unit_price = $('#form_simpan_level_10_unit_price')


    function modal_level_10_unit_price(id, type) {

        if (type == 'update_nilai_level_10_unit_price') {

        }
        if (type == 'tambah_level_10_unit_price') {

        }
        if (type == 'edit_level_10_unit_price') {

        }
        if (type == 'hapus_level_10_unit_price') {

        }
        if (type == 'urutan_level_10_unit_price') {

        }

        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_kontrak/by_id_unit_price_9/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'update_nilai_level_10_unit_price') {
                    form_modal_level_10_unit_price.modal('show');
                    // kondisi butoon dan form
                    $('#form_input_nilai_level_10_unit_price').css('display', 'block')
                    $('#button_update_nilai_level_10_unit_price').css('display', 'block')
                    // kondisi butoon dan form
                    $('#form_tambah_level_10_unit_price').css('display', 'none')
                    $('#button_tambah_level_10_unit_price').css('display', 'none')
                    $('#button_edit_level_10_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_9'].id_unit_price_9);
                    $('[name="harga_satuan"]').val(response['row_unit_price_9'].harga_satuan);
                    $('[name="kuantitas"]').val(response['row_unit_price_9'].kuantitas);
                    $('[name="satuan"]').val(response['row_unit_price_9'].satuan);
                    $('#title_modal_level_10_unit_price').text('Update Nilai Kontrak')
                }
                if (type == 'tambah_level_10_unit_price') {
                    form_modal_level_10_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_10_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_10_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#form_tambah_level_10_unit_price').css('display', 'block')
                    $('#button_tambah_level_10_unit_price').css('display', 'block')
                    // edit button
                    $('#button_edit_level_10_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_9'].id_unit_price_9);
                    $('#title_modal_level_10_unit_price').text('Tambah Uraian')
                }
                if (type == 'edit_level_10_unit_price') {
                    form_modal_level_10_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_10_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_10_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#button_tambah_level_10_unit_price').css('display', 'none')
                    // edit button
                    $('#form_tambah_level_10_unit_price').css('display', 'block')
                    $('#button_edit_level_10_unit_price').css('display', 'block')

                    $('[name="id_unit_price"]').val(response['row_unit_price_9'].id_unit_price_9);
                    $('[name="nama_uraian"]').val(response['row_unit_price_9'].nama_uraian);
                    $('#title_modal_level_10_unit_price').text('Edit Uraian')
                }
                if (type == 'hapus_level_10_unit_price') {
                    Question_level_10(response['row_unit_price_9'].nama_uraian, response['row_unit_price_9'].id_unit_price_9, response['row_unit_price_9'].id_unit_price_8)
                }
                if (type == 'urutan_level_10_unit_price') {
                    Urutan_level_10(response['result_bua'], response)
                }
            }
        })
    }




    function Simpan_level_10_unit_price(type) {
        if (type == 'update_nilai_level_10_unit_price') {
            saveData = 'update_nilai_level_10_unit_price';
            var url = "<?= base_url('admin/data_kontrak/update_nilai_level_10_unit_price') ?>";
        }
        if (type == 'tambah_level_10_unit_price') {
            saveData = 'tambah_level_10_unit_price';
            var url = "<?= base_url('admin/data_kontrak/tambah_nama_uraian_level_10_unit_price') ?>";
        }
        if (type == 'edit_level_10_unit_price') {
            saveData = 'edit_level_10_unit_price';
            var url = "<?= base_url('admin/data_kontrak/edit_nama_uraian_level_10_unit_price') ?>";
        }

        $.ajax({
            method: "POST",
            url: url,
            data: form_simpan_level_10_unit_price.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('.button_simpan').addClass('disabled');
            },
            success: function(response) {
                if (response == 'success') {
                    if (type == 'update_nilai_level_10_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_10_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Update!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'tambah_level_10_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_10_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'edit_level_10_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_10_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Edit!', 'Berhasil')
                        location.reload()
                    }
                }
            }
        })
    }

    function Urutan_level_10(all_data, response) {
        var html = '';
        var i;
        var start = response.start;
        for (i = 0; i < all_data.length; ++i) {
            html += '' + all_data[i].display_order + '';
        }
        Swal.fire({
            title: 'Pilih Urutan',
            input: 'select',
            inputOptions: {
                '1': '1',
                '2': '2',
                '3': '3',
            },
            inputPlaceholder: '-- Pindahkan Urutan --',
            showCancelButton: true,
            inputValidator: function(value) {
                return new Promise(function(resolve, reject) {
                    if (value !== '') {
                        resolve();
                    } else {
                        resolve('You need to select a Tier');
                    }
                });
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    html: 'You selected: ' + result.value
                });
            }
        });
    }


    function Question_level_10(ket, id, id_unit_price_8) {
        Swal.fire({
            title: "Apakah Anda Yakin!?",
            text: 'Ingin Menghapus Data ' + ket + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/data_kontrak/hapus_induk_level_10_unit_price/') ?>" + id,
                    dataType: "JSON",
                    data: {
                        id_unit_price_8: id_unit_price_8
                    },
                    success: function(response) {
                        if (response == 'success') {
                            message('success', 'Berhasil!', 'Data Berhasil Di Hapus')
                            location.reload()
                        }
                    }
                })
            } else {
                message('success', 'Berhasil!', 'Data Tidak Jadi Di Hapus')
            }
        });
    }


    $(".harga_satuan").keyup(function() {
        var harga = $(".harga_satuan").val();
        var tanpa_rupiah = document.getElementById('rupiah_harga_satuan_level_10_unit_price');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });
</script>


<!-- UNIT PRICE 10 -->
<!-- level_11 -->
<!-- price_10 -->
<script>
    var form_modal_level_11_unit_price = $('#form_modal_level_11_unit_price')
    var form_simpan_level_11_unit_price = $('#form_simpan_level_11_unit_price')


    function modal_level_11_unit_price(id, type) {

        if (type == 'update_nilai_level_11_unit_price') {

        }
        if (type == 'tambah_level_11_unit_price') {

        }
        if (type == 'edit_level_11_unit_price') {

        }
        if (type == 'hapus_level_11_unit_price') {

        }
        if (type == 'urutan_level_11_unit_price') {

        }

        $.ajax({
            type: "GET",
            url: "<?= base_url('admin/data_kontrak/by_id_unit_price_10/'); ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'update_nilai_level_11_unit_price') {
                    form_modal_level_11_unit_price.modal('show');
                    // kondisi butoon dan form
                    $('#form_input_nilai_level_11_unit_price').css('display', 'block')
                    $('#button_update_nilai_level_11_unit_price').css('display', 'block')
                    // kondisi butoon dan form
                    $('#form_tambah_level_11_unit_price').css('display', 'none')
                    $('#button_tambah_level_11_unit_price').css('display', 'none')
                    $('#button_edit_level_11_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_10'].id_unit_price_10);
                    $('[name="harga_satuan"]').val(response['row_unit_price_10'].harga_satuan);
                    $('[name="kuantitas"]').val(response['row_unit_price_10'].kuantitas);
                    $('[name="satuan"]').val(response['row_unit_price_10'].satuan);
                    $('#title_modal_level_11_unit_price').text('Update Nilai Kontrak')
                }
                if (type == 'tambah_level_11_unit_price') {
                    form_modal_level_11_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_11_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_11_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#form_tambah_level_11_unit_price').css('display', 'block')
                    $('#button_tambah_level_11_unit_price').css('display', 'block')
                    // edit button
                    $('#button_edit_level_11_unit_price').css('display', 'none')
                    $('[name="id_unit_price"]').val(response['row_unit_price_10'].id_unit_price_10);
                    $('#title_modal_level_11_unit_price').text('Tambah Uraian')
                }
                if (type == 'edit_level_11_unit_price') {
                    form_modal_level_11_unit_price.modal('show');
                    // kondisi butoon update dan form
                    $('#form_input_nilai_level_11_unit_price').css('display', 'none')
                    $('#button_update_nilai_level_11_unit_price').css('display', 'none')
                    // kondisi butoon tambah dan form
                    $('#button_tambah_level_11_unit_price').css('display', 'none')
                    // edit button
                    $('#form_tambah_level_11_unit_price').css('display', 'block')
                    $('#button_edit_level_11_unit_price').css('display', 'block')

                    $('[name="id_unit_price"]').val(response['row_unit_price_10'].id_unit_price_10);
                    $('[name="nama_uraian"]').val(response['row_unit_price_10'].nama_uraian);
                    $('#title_modal_level_11_unit_price').text('Edit Uraian')
                }
                if (type == 'hapus_level_11_unit_price') {
                    Question_level_11(response['row_unit_price_10'].nama_uraian, response['row_unit_price_10'].id_unit_price_10, response['row_unit_price_10'].id_unit_price_9)
                }
                if (type == 'urutan_level_11_unit_price') {
                    Urutan_level_11(response['result_bua'], response)
                }
            }
        })
    }




    function Simpan_level_11_unit_price(type) {
        if (type == 'update_nilai_level_11_unit_price') {
            saveData = 'update_nilai_level_11_unit_price';
            var url = "<?= base_url('admin/data_kontrak/update_nilai_level_11_unit_price') ?>";
        }
        if (type == 'tambah_level_11_unit_price') {
            saveData = 'tambah_level_11_unit_price';
            var url = "<?= base_url('admin/data_kontrak/tambah_nama_uraian_level_11_unit_price') ?>";
        }
        if (type == 'edit_level_11_unit_price') {
            saveData = 'edit_level_11_unit_price';
            var url = "<?= base_url('admin/data_kontrak/edit_nama_uraian_level_11_unit_price') ?>";
        }

        $.ajax({
            method: "POST",
            url: url,
            data: form_simpan_level_11_unit_price.serialize(),
            dataType: "JSON",
            beforeSend: function() {
                $('.button_simpan').addClass('disabled');
            },
            success: function(response) {
                if (response == 'success') {
                    if (type == 'update_nilai_level_11_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_11_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Update!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'tambah_level_11_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_11_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Tambah!', 'Berhasil')
                        location.reload()
                    }
                    if (type == 'edit_level_11_unit_price') {
                        $('.button_simpan').removeClass('disabled');
                        form_modal_level_11_unit_price.modal('hide')
                        message('success', 'Data Berhasil Di Edit!', 'Berhasil')
                        location.reload()
                    }
                }
            }
        })
    }

    function Urutan_level_11(all_data, response) {
        var html = '';
        var i;
        var start = response.start;
        for (i = 0; i < all_data.length; ++i) {
            html += '' + all_data[i].display_order + '';
        }
        Swal.fire({
            title: 'Pilih Urutan',
            input: 'select',
            inputOptions: {
                '1': '1',
                '2': '2',
                '3': '3',
            },
            inputPlaceholder: '-- Pindahkan Urutan --',
            showCancelButton: true,
            inputValidator: function(value) {
                return new Promise(function(resolve, reject) {
                    if (value !== '') {
                        resolve();
                    } else {
                        resolve('You need to select a Tier');
                    }
                });
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    html: 'You selected: ' + result.value
                });
            }
        });
    }


    function Question_level_11(ket, id, id_unit_price_9) {
        Swal.fire({
            title: "Apakah Anda Yakin!?",
            text: 'Ingin Menghapus Data ' + ket + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/data_kontrak/hapus_induk_level_11_unit_price/') ?>" + id,
                    dataType: "JSON",
                    data: {
                        id_unit_price_9: id_unit_price_9
                    },
                    success: function(response) {
                        if (response == 'success') {
                            message('success', 'Berhasil!', 'Data Berhasil Di Hapus')
                            location.reload()
                        }
                    }
                })
            } else {
                message('success', 'Berhasil!', 'Data Tidak Jadi Di Hapus')
            }
        });
    }


    $(".harga_satuan").keyup(function() {
        var harga = $(".harga_satuan").val();
        var tanpa_rupiah = document.getElementById('rupiah_harga_satuan_level_11_unit_price');
        tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>