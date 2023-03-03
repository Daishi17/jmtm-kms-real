<script>
    // sweetalert
    function message(icon, text, title) {
        Swal.fire({
            title: title,
            text: text,
            icon: icon,
        });
    }
    var id_detail_program_penyedia_jasa = $('[name="id_detail_program_penyedia_jasa"]').val();
    cari_id_detail_program_penyedia_jasa(id_detail_program_penyedia_jasa)

    function cari_id_detail_program_penyedia_jasa(id_detail_program_penyedia_jasa) {
        $('.create_mcku').css('display', 'block');
        var tbl_adendum = $('#tbl_adendum');
        if (id_detail_program_penyedia_jasa == '') {
            message('No. Kontrak Belum Di isi!', 'warning', 'Gagal Mendapatkan Data!')
        } else {
            $.ajax({
                method: "POST",
                url: '<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/by_id_detail_program_penyedia_jasa/'); ?>' + id_detail_program_penyedia_jasa,
                dataType: "JSON",
                success: function(response) {

                    // ini untuk random kode
                    $('#no_urut_mc').text('Nomor Mc Ke' + response['no_urut_mc']);
                    if (response['jika_ada_um']) {
                        $('#jika_ada_um').css('display', 'block');
                        $('#jika_tidak_ada_um').css('display', 'none');
                        $('[name="jika_no_urut"]').val('Nomor Mc Ke ' + response['no_urut_mc']);
                        $('#header_no_mc').html('Nomor Mc Ke ' + response['no_urut_mc']);
                        $('[name="cek_um"]').val('tidak ada');
                    } else {
                        $('#jika_ada_um').css('display', 'none');
                        $('#jika_tidak_ada_um').css('display', 'block');
                    }
                    $('[name="id_detail_program_penyedia_jasau"]').val(id_detail_program_penyedia_jasa);
                    // var rpdata = 'Rp. ' + response['nilai_kontrak']['nilai_hps'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00';
                    // $('[name="total_kontrak"]').val(rpdata);
                    // $('[name="tanggal_kontrak"]').val(response['datakontrak'].tanggal_kontrak);


                    if (response['cek_pertama_mc_apa'].no_mc == 'um') {
                        $('[name="jumlah_mcku"]').val(response['selact_max2'].sd_bulan_ini);
                    } else if (response['cek_pertama_mc_apa'].no_mc == 1) {
                        $('[name="jumlah_mcku"]').val(response['selact_max2'].sd_bulan_ini);
                    } else {
                        $('[name="jumlah_mcku"]').val(response['selact_max2'].sd_bulan_ini);
                    }



                    // -------INI UNTUK GET DETAIL KONTRAK -------------
                    var html = '';
                    var i;
                    var start = response.start;
                    for (i = 0; i < response['get_detail_taggihan'].length; ++i) {
                        // logika bulan ini di sini
                        if (response['get_detail_taggihan'][i].no_mc == 'um') {
                            var mc = 'Um'
                        } else if (response['get_detail_taggihan'][i].no_mc == '1') {
                            var mc = response['get_detail_taggihan'][i].no_mc
                        } else {
                            var mc = response['get_detail_taggihan'][i].no_mc
                        }


                        //   logika hasil bulan lalu
                        var hasil_bulan_lalu = response['get_detail_taggihan'][i].sd_bulan_lalu;
                        var hasil_jumlah_mc = response['get_detail_taggihan'][i].jumlah_mc;
                        if (response['get_detail_taggihan'][i].no_mc == 'um') {
                            var sd_bulan_lalu = ''
                        } else if (response['get_detail_taggihan'][i].no_mc == '1') {
                            var sd_bulan_lalu = ''
                        } else {
                            var sd_bulan_lalu = 'Rp. ' + hasil_bulan_lalu.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00'
                        }

                        if (response['get_detail_taggihan'][i].no_mc == 'um') {
                            var bulan_ini = 'Rp. ' + response['get_detail_taggihan'][i].jumlah_mc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00'
                        } else if (response['get_detail_taggihan'][i].no_mc == '1') {
                            var bulan_ini = 'Rp. ' + response['get_detail_taggihan'][i].jumlah_mc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00'
                        } else {
                            var bulan_ini = 'Rp. ' + response['get_detail_taggihan'][i].jumlah_mc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00'
                        }

                        if (response['get_detail_taggihan'][i].no_mc == 'um') {
                            var sd_bulan_ini = 'Rp. ' + response['get_detail_taggihan'][i].jumlah_mc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00'
                        } else if (response['get_detail_taggihan'][i].no_mc == '1') {
                            var sd_bulan_ini = 'Rp. ' + response['get_detail_taggihan'][i].jumlah_mc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00'
                        } else {
                            var sd_bulan_ini = 'Rp. ' + response['get_detail_taggihan'][i].sd_bulan_ini.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00'
                        }

                        if (response['get_detail_taggihan'][0].no_mc == 'um') {
                            if (response['get_detail_taggihan'][i].no_mc == 'um') {
                                var nama_pekerjaan_program_mata_anggaran = '<td style="font-size:12px" class = "tg-d2hi" rowspan = "' + response['total_kontrak'].total + '">' + response['get_detail_taggihan'][i].nama_pekerjaan_program_mata_anggaran + '</td>'
                            } else {
                                var nama_pekerjaan_program_mata_anggaran = ''
                            }
                            if (response['get_detail_taggihan'][i].no_mc == 'um') {
                                var nama_vendor = '<td style="font-size:12px" class = "tg-d2hi" rowspan = "' + response['total_kontrak'].total + '">' + response['get_detail_taggihan'][i].nama_vendor + '</td>'
                            } else {
                                var nama_vendor = ''
                            }


                        } else {
                            if (response['get_detail_taggihan'][i].no_mc == '1') {
                                var nama_pekerjaan_program_mata_anggaran = '<td style="font-size:12px" class = "tg-d2hi" rowspan = "' + response['total_kontrak'].total + '">' + response['get_detail_taggihan'][i].nama_pekerjaan_program_mata_anggaran + '</td>'
                            } else {
                                var nama_pekerjaan_program_mata_anggaran = ''
                            }
                            if (response['get_detail_taggihan'][i].no_mc == '1') {
                                var nama_vendor = '<td style="font-size:12px" class = "tg-d2hi" rowspan = "' + response['total_kontrak'].total + '">' + response['get_detail_taggihan'][i].nama_vendor + '</td>'
                            } else {
                                var nama_vendor = ''
                            }
                        }


                        if (response['vendor_session']) {
                            if (response['get_detail_taggihan'][i].status_penaggihan == 1) {
                                var action = '<a style="font-size:10px" class="btn btn-sm btn-primary text-white" onclick="Traking_area2(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">View Traking</a> <a style="font-size:10px" class="btn btn-sm btn-warning text-white" onclick="Edit_traking(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Edit Traking</a>'

                            } else {
                                if (response['get_detail_taggihan'][i].status_penaggihan == 2) {
                                    var action = '<a style="font-size:10px" class="btn btn-sm btn-success text-white" onclick="Traking_area2(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Pencairan</a>'
                                } else {
                                    var action = '<a style="font-size:10px" class="btn btn-sm btn-primary text-white" onclick="Traking_area2(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">View Traking</a> <a style="font-size:10px" class="btn btn-sm btn-warning text-white" onclick="Edit_traking(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Edit Traking</a>'
                                }
                            }
                        } else {
                            if (response['pegawai']) {
                                if (response['get_detail_taggihan'][i].status_penaggihan == 1) {
                                    var action = '<a style="font-size:10px" class="btn btn-sm btn-primary text-white" onclick="Traking_area2(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">View Traking</a><a style="font-size:10px" class="btn btn-sm btn-warning text-white" onclick="Edit_traking(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Edit Traking</a>'
                                } else {
                                    if (response['get_detail_taggihan'][i].status_penaggihan == 2 || response['get_detail_taggihan'][i].status_terakhir == 'Pencairan') {
                                        var action = '<a style="font-size:10px" class="btn btn-sm btn-block btn-primary text-white" onclick="Traking_area2(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">View Traking</a><a style="font-size:10px" class="btn btn-block btn-sm btn-success text-white" onclick="Pencairan(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Pencairan</a> <a style="font-size:10px" class="btn btn-block btn-sm btn-warning text-white" onclick="Edit_traking(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Edit Traking</a>'
                                    } else {
                                        var action = '<a style="font-size:10px" class="btn btn-sm btn-primary text-white" onclick="Traking_area2(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">View Traking</a><a style="font-size:10px" class="btn btn-sm btn-warning text-white" onclick="Edit_traking(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Edit Traking</a>'
                                    }
                                }
                            } else if (response['pegawai']) {
                                if (response['get_detail_taggihan'][i].status_penaggihan == 1) {
                                    var action = '<a style="font-size:10px" class="btn btn-sm btn-primary text-white" onclick="Traking_area2(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">View Traking</a><a style="font-size:10px" class="btn btn-sm btn-warning text-white" onclick="Edit_traking(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Edit Traking</a>'
                                } else {
                                    if (response['get_detail_taggihan'][i].status_penaggihan == 2) {
                                        var action = '<a style="font-size:10px" class="btn btn-sm btn-success text-white" onclick="Traking_area2(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Pencairan</a>'
                                    } else {
                                        var action = '<a style="font-size:10px" class="btn btn-sm btn-primary text-white" onclick="Traking_area2(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">View Traking</a><a style="font-size:10px" class="btn btn-sm btn-warning text-white" onclick="Edit_traking(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Edit Traking</a>'
                                    }
                                }
                            } else if (response['pegawai']) {
                                if (response['get_detail_taggihan'][i].status_penaggihan == 1) {
                                    var action = '<a style="font-size:10px" class="btn btn-sm btn-primary text-white" onclick="Traking_area2(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">View Traking</a><a style="font-size:10px" class="btn btn-sm btn-warning text-white" onclick="Edit_traking(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Edit Traking</a>'
                                } else {
                                    if (response['get_detail_taggihan'][i].status_penaggihan == 2) {
                                        var action = '<a style="font-size:10px" class="btn btn-sm btn-success text-white" onclick="Traking_area2(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Pencairan</a>'
                                    } else {
                                        var action = '<a style="font-size:10px" class="btn btn-sm btn-primary text-white" onclick="Traking_area2(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">View Traking</a> <a style="font-size:10px" class="btn btn-sm btn-warning text-white" onclick="Edit_traking(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Edit Traking</a>'
                                    }
                                }
                            } else if (response['pegawai']) {
                                if (response['get_detail_taggihan'][i].status_penaggihan == 1) {
                                    var action = '<a style="font-size:10px" class="btn btn-sm btn-primary text-white" onclick="Traking_area2(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">View Traking <a style="font-size:10px" class="btn btn-sm btn-warning text-white" onclick="Edit_traking(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Edit Traking</a></a>'
                                } else {
                                    if (response['get_detail_taggihan'][i].status_penaggihan == 2) {
                                        var action = '<a style="font-size:10px" class="btn btn-sm btn-success text-white" onclick="Traking_area2(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Pencairan</a>'
                                    } else {
                                        var action = '<a style="font-size:10px" class="btn btn-sm btn-primary text-white" onclick="Traking_area2(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">View Traking <a style="font-size:10px" class="btn btn-sm btn-warning text-white" onclick="Edit_traking(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Edit Traking</a></a>'
                                    }
                                }
                            }

                        }

                        // nilai setelah ppn

                        if (response['get_detail_taggihan'][i].status_terakhir) {
                            var sts_trakhir = response['get_detail_taggihan'][i].status_terakhir;
                        } else {
                            var sts_trakhir = 'Belum Update';
                        }

                        if (response['get_detail_taggihan'][i].sts_tanggal_trakhir) {
                            var tanggal_trakhir = response['get_detail_taggihan'][i].sts_tanggal_trakhir;
                        } else {
                            var tanggal_trakhir = 'Belum Update';
                        }

                        // logika retensi
                        if (response['get_detail_taggihan'][i].sts_retensi == 1) {
                            var nilai_retensi = response['get_detail_taggihan'][i].nilai_retensi;
                        } else {
                            var persen_retensi = response['get_detail_taggihan'][i].nilai_retensi;
                            if (persen_retensi == 5) {
                                var nilai_retensi = response['get_detail_taggihan'][i].jumlah_mc * 0.05;
                            } else if (persen_retensi == 10) {
                                var nilai_retensi = response['get_detail_taggihan'][i].jumlah_mc * 0.10;
                            } else {
                                var nilai_retensi = response['get_detail_taggihan'][i].jumlah_mc * 0.15;
                            }
                        }

                        // logika potongan
                        var total_potongan = parseInt(nilai_retensi) + parseInt(response['get_detail_taggihan'][i].nilai_uang_muka);

                        html +=
                            '<tr style="font-size:12px">' + nama_pekerjaan_program_mata_anggaran + '' +
                            '<td style="font-size:12px" class = "tg-d2hi">' + response['row_kontrak'].nama_penyedia + '</td>' +
                            '<td style="font-size:12px" class = "tg-d2hi">' + mc + '</td>' +
                            '<td style="font-size:12px" class = "tg-d2hi">' + response['get_detail_taggihan'][i].tanggal_mc + ' </td> ' +
                            '<td style="font-size:12px" class = "tg-d2hi">' + sd_bulan_lalu + ' </td> ' +
                            '<td style="font-size:12px" class = "tg-d2hi"> ' + bulan_ini + ' </td> ' +
                            '<td style="font-size:12px" class = "tg-d2hi"> ' + sd_bulan_ini + ' </td> ' +
                            '<td style="font-size:12px" class = "tg-d2hi"> ' + 'Rp. ' + response['get_detail_taggihan'][i].ppn_total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00' + ' </td> ' +
                            '<td style="font-size:12px" class = "tg-d2hi"> ' + 'Rp. ' + response['get_detail_taggihan'][i].setelah_ppn.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00' + ' </td> ' +
                            '<td style="font-size:12px" class = "tg-d2hi"> ' + 'Rp. ' + nilai_retensi.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00' + '</td> ' +
                            '<td style="font-size:12px" class = "tg-d2hi"> ' + 'Rp. ' + response['get_detail_taggihan'][i].nilai_uang_muka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00' + '</td> ' +
                            '<td style="font-size:12px" class = "tg-d2hi">' + 'Rp. ' + total_potongan.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00' + '</td> ' +
                            '<td style="font-size:12px" class = "tg-d2hi"> ' + 'Rp. ' + response['get_detail_taggihan'][i].denda.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00' + ' </td> ' +
                            '<td style="font-size:12px" class = "tg-d2hi"> ' + response['get_detail_taggihan'][i].bobot + ' </td> ' +
                            '<td style="font-size:12px" class = "tg-d2hi"> PPN FP </td> ' +
                            '<td style="font-size:12px" class = "tg-d2hi">' + sts_trakhir + '</td> ' +
                            '<td style="font-size:12px" class = "tg-d2hi">' + tanggal_trakhir + ' </td> ' +
                            '<td style="font-size:12px" class = "tg-d2hi">' + action + '</td> ' +
                            '</tr>';
                    }
                    $('.result_datanya').html(html);
                    //   $('#pagination_link').html(response.pagination_link);
                },
                error: function() {
                    console.log(error);
                }
            })

            $(document).ready(function() {
                tbl_adendum.DataTable({
                    "responsive": true,
                    "autoWidth": false,
                    "processing": true,
                    "serverSide": true,
                    "searching": true,
                    "bDestroy": true,
                    "info": false,
                    "order": [],
                    "ajax": {
                        "url": "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/get_seacrh_dendum_by_kontrak/') ?>" + id_detail_program_penyedia_jasa,
                        "type": "POST",
                    },
                    "oLanguage": {
                        "sSearch": "Cari Data : ",
                        "sEmptyTable": "Data Tidak Tersedia",
                        "sLoadingRecords": "Silahkan Tunggu - loading...",
                        "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                        "sZeroRecords": "Tidak Ada Yang Di Cari",
                        "sProcessing": "Memuat Data...."
                    }
                });
            });

            function relodTable2() {
                tbl_adendum.DataTable().ajax.reload();
            }

            //   ini untuk detail taggihan
        }
    }




    function Edit_traking(id) {
        var edit_mc = $('#edit_mc')
        $.ajax({
            type: "POST",
            url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/by_id_mc/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                edit_mc.modal('show');
                $('#no_urut_mc_edit').text('Nomor Mc Ke' + response['row_mc'].no_mc);
                if (response['jika_ada_um_edit']) {
                    $('#jika_ada_um_edit').css('display', 'block');
                    $('#jika_tidak_ada_um_edit').css('display', 'none');
                    $('[name="jika_no_urut"]').val('Nomor Mc Ke ' + response['row_mc'].no_mc);
                    $('[name="cek_um"]').val('tidak ada');
                } else {
                    $('#jika_ada_um_edit').css('display', 'none');
                    $('#jika_tidak_ada_um_edit').css('display', 'block');
                }
                $('[name="tanggal_mc"]').val(response['row_mc'].tanggal_mc);
                $('[name="jumlah_mc"]').val(response['row_mc'].jumlah_mc);
                if (response['row_mc'].no_mc == 'um') {
                    $('[name="jumlah_mc_edit"]').val('');
                } else if (response['row_mc'].no_mc == '1') {
                    $('[name="jumlah_mc_edit"]').val();
                } else {
                    $('[name="jumlah_mc_edit"]').val(response['total_mc_sebelum_edit'].sd_bulan_ini);
                }
                $('[name="persen_ppn"]').val(response['row_mc'].persen_ppn);
                $('[name="data_no_mc"]').val(response['row_mc'].no_mc);
                $('[name="id_mc"]').val(response['row_mc'].id_mc);
            }
        });
    }

    // <
    // a style = "font-size:10px"
    // class = "btn btn-sm btn-warning text-white"
    // onclick = "Hapus_traking(' + response['get_detail_taggihan'][i].id_mc + ')"
    // href = "javascript:;" > Hapus Traking < /a>

    function Hapus_traking(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/hapus_traking/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('Berhasil!', 'success', 'Data Berhasil Di Hapus!')
                    cari_id_detail_program_penyedia_jasa(id_detail_program_penyedia_jasa)
                } else {}
            }
        });
    }

    function Simpan_mc() {
        var id_detail_program_penyedia_jasa = $('[name="id_detail_program_penyedia_jasa"]').val();
        if ($('[name="tanggal_mc"]').val() == '') {
            message('Harap Isi Tanggal!', 'warning', 'Tanggal Periode Belum Di Isi')
        } else {
            $.ajax({
                method: "POST",
                url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/tambah_mc') ?>",
                data: $('#form_mc').serialize(),
                dataType: "JSON",
                beforeSend: function() {
                    $('#simpan_mc_botton').css('display', 'none');
                    $('#loading_button_mc').css('display', 'block');
                },
                success: function(response) {
                    if (response == 'success') {
                        $('#simpan_mc_botton').css('display', 'block');
                        $('#loading_button_mc').css('display', 'none');
                        $('#modelId').modal('hide');
                        message('Berhasil!', 'success', 'Data Berhasil Disimpan!')
                        cari_id_detail_program_penyedia_jasa(id_detail_program_penyedia_jasa)
                    } else {
                        // $(".eror_password2").html(response.password2);
                        // $(".eror_password").html(response.password);
                        // $(".eror_username").html(response.username);
                        // $(".eror_nama_pegawai").html(response.nama_pegawai);
                        // $(".eror_email").html(response.email);
                        // $(".eror_nip").html(response.nip);
                    }
                }
            })
        }

    }


    function Simpan_edit_traking() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/edit_mc') ?>",
            data: $('#form_mc_edit').serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    $('#edit_mc').modal('hide');
                    message('Berhasil!', 'success', 'Data Berhasil Update!')
                    cari_id_detail_program_penyedia_jasa(id_detail_program_penyedia_jasa)
                } else {
                    // $(".eror_password2").html(response.password2);
                    // $(".eror_password").html(response.password);
                    // $(".eror_username").html(response.username);
                    // $(".eror_nama_pegawai").html(response.nama_pegawai);
                    // $(".eror_email").html(response.email);
                    // $(".eror_nip").html(response.nip);
                }
            }
        })
    }



    function UploadPenaggihan(id) {
        var ModalUploadPenaggihan = $('#modal_penagihan')
        $.ajax({
            type: "POST",
            url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/by_id_mc/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                ModalUploadPenaggihan.modal('show');
                $('[name="id_mc_upload"]').val(response['row_mc'].id_mc)
                $('[name="id_detail_program_penyedia_jasa_mc_upload"]').val(response['row_mc'].id_detail_program_penyedia_jasa)
            }

        })
    }

    function Pencairan(id) {
        var modal_cair = $('#modal_pencairan');
        $.ajax({
            type: "POST",
            url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/by_id_mc_rapot/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                modal_cair.modal('show');
                $('[name="id_detail_program_penyedia_jasau"]').val(response['row_rapot_dummy'].id_detail_program_penyedia_jasa)
                $('[name="id_mc"]').val(response['row_rapot_dummy'].id_mc)
                $('[name="sts_tanggal_trakhir"]').val(response['row_rapot_dummy'].sts_tanggal_trakhir)
                $('[name="setelah_ppn"]').val(response['row_rapot_dummy'].setelah_ppn)
            }
        })
    }

    function Pencairan_grafik() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/pencairan_grafik') ?>",
            data: $('#form_pencairan_grafik').serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('Berhasil!', 'success', 'Berhasil Di Cairkan!')
                    cari_id_detail_program_penyedia_jasa(id_detail_program_penyedia_jasa)
                    $('#modal_pencairan').modal('hide');
                } else {}
            }
        })
    }




    function Traking_area2(id) {
        var Modal_traking = $('#modal_traking2')
        $.ajax({
            type: "POST",
            url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/by_id_mc/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                Modal_traking.modal('show');

                // // INI FORM UNTUK UPLOAD MC DAN KIRIM VENDOR PERTAMA KALI
                // $('#waktu_kirim_vendor').text(response['traking'].waktu_kirim_vendor)
                // $('#nama_vendormc').text(response['traking'].nama_vendor)
                // $('#ket_upload').text('Upload Mc ' + response['traking'].no_mc)

                // bareng bareng jangan becanda
                $('[name="id_detail_program_penyedia_jasa"]').val(response['row_mc'].id_detail_program_penyedia_jasa)
                $('[name="tanggal_mc"]').val(response['row_mc'].tanggal_mc)
                $('[name="id_traking"]').val(response['traking'].id_traking)
                $('[name="id_mc"]').val(response['traking'].id_mc)
                // vendor
                // $('[name="jumlah_hari_vendor"]').val(response['traking'].jumlah_hari_vendor)
                // $('[name="waktu_kirim_vendor"]').val(response['traking'].waktu_kirim_vendor)
                // // area
                // $('[name="jumlah_hari_area"]').val(response['traking'].jumlah_hari_area)
                // $('[name="waktu_kirim_area"]').val(response['traking'].waktu_kirim_area)
                // // pusat
                // $('[name="jumlah_hari_pusat"]').val(response['traking'].jumlah_hari_pusat)
                // $('[name="waktu_kirim_pusat"]').val(response['traking'].waktu_kirim_pusat)
                // // finance
                // $('[name="jumlah_hari_finance"]').val(response['traking'].jumlah_hari_finance)
                // $('[name="waktu_kirim_finance"]').val(response['traking'].waktu_kirim_finance)

                // Ini Kondisi Button 
                if (response['traking'].approve_vendor == 1) {
                    $('#button_vendor').css('display', 'none');
                } else {
                    $('#button_vendor').css('display', 'block');
                }

                if (response['traking'].approve_area == 1) {
                    $('#button_area').css('display', 'none');
                } else {
                    $('#button_area').css('display', 'block');
                }

                if (response['traking'].approve_pusat == 1) {
                    $('#button_pusat').css('display', 'none');
                } else {
                    $('#button_pusat').css('display', 'block');
                }

                if (response['traking'].approve_finance == 1) {
                    $('#button_finance').css('display', 'none');
                    $('#button_pencairan').css('display', 'block');
                } else {
                    $('#button_finance').css('display', 'block');
                    $('#button_pencairan').css('display', 'none');
                }

                // ini logika time line vendor
                $('#hari_vendor').text(response['get_traking_data'].hari_vendor + " Hari");
                $('#uraian_vendor').text(response['get_traking_data'].uraian);

                if (response['get_traking_data'].hari_vendor <= 10) {
                    $("#vendor_line").addClass("bg-soft-success text-success");
                } else {
                    $("#vendor_line").addClass("bg-soft-danger text-danger");
                }

                if (response['get_traking_data']) {
                    $('#hari_area').text(response['get_traking_data'].hari_area + " Hari");
                    $('#uraian_area').text(response['get_traking_data'].uraian);
                    if (response['get_traking_data'].hari_area <= 10) {
                        $("#area_line").addClass("bg-soft-success text-success");
                    } else {
                        $("#area_line").addClass("bg-soft-danger text-danger");
                    }

                } else {

                }

                if (response['get_traking_data']) {
                    $('#hari_pusat').text(response['get_traking_data'].hari_pusat + " Hari");
                    $('#uraian_pusat').text(response['get_traking_data'].uraian);
                    if (response['get_traking_data'].hari_pusat <= 10) {
                        $("#pusat_line").addClass("bg-soft-success text-success");
                    } else {
                        $("#pusat_line").addClass("bg-soft-danger text-danger");
                    }
                } else {

                }

                if (response['get_traking_data']) {
                    $('#hari_finance').text(response['get_traking_data'].hari_finance + " Hari");
                    $('#uraian_finance').text(response['get_traking_data'].uraian);
                    if (response['get_traking_data'].hari_finance <= 10) {
                        $("#finance_line").addClass("bg-soft-success text-success");
                    } else {
                        $("#finance_line").addClass("bg-soft-danger text-danger");
                    }
                } else {

                }

                $(document).ready(function() {
                    $('#datatable_traking_mc').DataTable({
                        "responsive": true,
                        "autoWidth": false,
                        "processing": true,
                        "serverSide": true,
                        "searching": true,
                        "bDestroy": true,
                        "info": false,
                        "order": [],
                        "ajax": {
                            "url": "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/get_data_traking_mc/') ?>" + id,
                            "type": "POST",
                        },
                        "oLanguage": {
                            "sSearch": "Cari Data : ",
                            "sEmptyTable": "Data Tidak Tersedia",
                            "sLoadingRecords": "Silahkan Tunggu - loading...",
                            "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                            "sZeroRecords": "Tidak Ada Yang Di Cari",
                            "sProcessing": "Memuat Data...."
                        }
                    });
                });

                function relodTable3() {
                    $('#datatable_traking_mc').DataTable().ajax.reload();
                }

            }

        })
    }



    function daysdifference(today, batas_aprove_vendor) {

        var startDay = new Date(today);
        var endDay = new Date(batas_aprove_vendor);


        var millisBetween = startDay.getTime() - endDay.getTime();
        var days = millisBetween / (1000 * 3600 * 24);
        return Math.round(Math.abs(days));

    }

    var ModalUploadPenaggihan = $('#modal_penagihan')
    $('#form_upload_mc').on('submit', function(e) {
        e.preventDefault();
        if ($('.file-mc').val() == '') {
            alert('File Belum Di Isi!!!');
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>taggihan_kontrak_admin/tagihan_kontrak/upload_file_mc",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                //   beforeSend: function() {
                //       $('#upload_mcku').attr('disabled', 'disabled');angga
                //   },
                success: function(response) {
                    $('#form_upload_mc')[0].reset();
                    //   $('#upload_mcku').attr('disabled', false);
                    ModalUploadPenaggihan.modal('hide');
                    message('Berhasil!', 'success', 'Data Berhasil Di Upload!')
                    //   message('success', 'Data Berhasil Di Upload');
                    cari_id_detail_program_penyedia_jasa(id_detail_program_penyedia_jasa)
                }
            });
        }
    });

    function Setujui_area() {
        var id_traking = $('[name="id_mc_traking"]').val()
        $.ajax({
            method: "POST",
            url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/setujui_area') ?>",
            data: $('#form_aprove_area').serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('Berhasil!', 'success', 'Berhasil Di Aprove!')
                    cari_id_detail_program_penyedia_jasa(id_detail_program_penyedia_jasa)
                    $('#modal_traking').modal('hide');
                    $('#modal_aprove_area').modal('hide');
                } else {}
            }
        })
    }


    function Revisi_area() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/revisi_area') ?>",
            data: $('#form_revisi_area').serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('Berhasil!', 'success', 'Berhasil Mengirim Revisi!')
                    cari_id_detail_program_penyedia_jasa(id_detail_program_penyedia_jasa)
                    $('#modal_traking').modal('hide');
                    $('#modal_revisi_area').modal('hide');
                } else {}
            }
        })
    }

    function Setujui_pusat() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/setujui_pusat') ?>",
            data: $('#form_aprove_pusat').serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('Berhasil!', 'success', 'Berhasil Di Aprove!')
                    cari_id_detail_program_penyedia_jasa(id_detail_program_penyedia_jasa)
                    $('#modal_traking').modal('hide');
                    $('#modal_aprove_pusat').modal('hide');
                } else {}
            }
        })
    }

    function Revisi_pusat() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/revisi_pusat') ?>",
            data: $('#form_revisi_pusat').serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('Berhasil!', 'success', 'Berhasil Mengirim Revisi!')
                    cari_id_detail_program_penyedia_jasa(id_detail_program_penyedia_jasa)
                    $('#modal_traking').modal('hide');
                    $('#modal_revisi_pusat').modal('hide');
                } else {}
            }
        })
    }




    function Terima_finance() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/terima_berkas_finance') ?>",
            data: $('#form_aprove_finance').serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('Berhasil!', 'success', 'Berkas Di Terima!')
                    cari_id_detail_program_penyedia_jasa(id_detail_program_penyedia_jasa)
                    $('#modal_traking').modal('hide');
                    $('#modal_diterima_finance').modal('hide');
                } else {}
            }
        })
    }




    function Pencairan_finance() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/pencairan_finance') ?>",
            data: $('#form_pencairam').serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('Berhasil!', 'success', 'Berhasil Di Cairkan!')
                    cari_id_detail_program_penyedia_jasa(id_detail_program_penyedia_jasa)
                    $('#modal_traking').modal('hide');
                    $('#modal_pencairan').modal('hide');
                } else {}
            }
        })
    }



    function Kirim_revisi_vendor() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/kirim_revisi_vendor') ?>",
            data: $('#form_kirim_revisi_vendor').serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('Berhasil!', 'success', 'Berhasil Mengirim Revisi!')
                    cari_id_detail_program_penyedia_jasa(id_detail_program_penyedia_jasa)
                    $('#modal_traking').modal('hide');
                    $('#modal_kirim_revisi_vendor').modal('hide');
                } else {}
            }
        })
    }



    function pilih_pic() {
        var pic = $('[name="pic"]').val();
        var html = '';
        if (pic == 'Vendor') {
            html += '<option value="Kirim Berkas">Kirim Berkas</option>';
        } else if (pic == 'Area') {
            html += '<option value="Terima">Terima</option>' +
                '<option value="Aprove">Aprove</option>' +
                '<option value="Revisi">Revisi</option>';
        } else if (pic == 'Pusat') {
            html += '<option value="Terima">Terima</option>' +
                '<option value="Aprove">Aprove</option>' +
                '<option value="Revisi">Revisi</option>';
        } else if (pic == 'Finance') {
            html += '<option value="Pencairan">Pencairan</option>' +
                '<option value="Terima">Terima</option>' +
                '<option value="Revisi">Revisi</option>';
        }
        $('#uraian').html(html);
    }

    function Kirim_Traking() {
        var id_mcku = $('[name="id_mc"]').val();
        $.ajax({
            method: "POST",
            url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/kirim_traking') ?>",
            data: $('#form_kirim_traking').serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('Berhasil!', 'success', 'Berhasil Update Traking!')
                    cari_id_detail_program_penyedia_jasa(id_detail_program_penyedia_jasa)
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/by_id_mc/') ?>" + id_mcku,
                        dataType: "JSON",
                        success: function(response) {
                            $('#hari_vendor').text(response['get_traking_data'].hari_vendor + " Hari");
                            $('#uraian_vendor').text(response['get_traking_data'].uraian);
                            if (response['get_traking_data'].hari_vendor <= 10) {
                                $("#vendor_line").addClass("bg-soft-success text-success");
                            } else {
                                $("#vendor_line").addClass("bg-soft-danger text-danger");
                            }

                            if (response['get_traking_data']) {
                                $('#hari_area').text(response['get_traking_data'].hari_area + " Hari");
                                $('#uraian_area').text(response['get_traking_data'].uraian);
                                if (response['get_traking_data'].hari_area <= 10) {
                                    $("#area_line").addClass("bg-soft-success text-success");
                                } else {
                                    $("#area_line").addClass("bg-soft-danger text-danger");
                                }

                            } else {

                            }

                            if (response['get_traking_data']) {
                                $('#hari_pusat').text(response['get_traking_data'].hari_pusat + " Hari");
                                $('#uraian_pusat').text(response['get_traking_data'].uraian);
                                if (response['get_traking_data'].hari_pusat <= 10) {
                                    $("#pusat_line").addClass("bg-soft-success text-success");
                                } else {
                                    $("#pusat_line").addClass("bg-soft-danger text-danger");
                                }
                            } else {

                            }

                            if (response['get_traking_data']) {
                                $('#hari_finance').text(response['get_traking_data'].hari_finance + " Hari");
                                $('#uraian_finance').text(response['get_traking_data'].uraian);
                                if (response['get_traking_data'].hari_finance <= 10) {
                                    $("#finance_line").addClass("bg-soft-success text-success");
                                } else {
                                    $("#finance_line").addClass("bg-soft-danger text-danger");
                                }
                            } else {

                            }
                        }

                    })



                    $(document).ready(function() {
                        $('#datatable_traking_mc').DataTable({
                            "responsive": true,
                            "autoWidth": false,
                            "processing": true,
                            "serverSide": true,
                            "searching": true,
                            "bDestroy": true,
                            "info": false,
                            "order": [],
                            "ajax": {
                                "url": "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/get_data_traking_mc/') ?>" + id_mcku,
                                "type": "POST",
                            },
                            "oLanguage": {
                                "sSearch": "Cari Data : ",
                                "sEmptyTable": "Data Tidak Tersedia",
                                "sLoadingRecords": "Silahkan Tunggu - loading...",
                                "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                                "sZeroRecords": "Tidak Ada Yang Di Cari",
                                "sProcessing": "Memuat Data...."
                            }
                        });
                    });
                } else {

                }
            }
        })
    }
</script>

<script>
    var completes = document.querySelectorAll(".complete");
    var toggleButton = document.getElementById("toggleButton");

    function toggleComplete() {
        var lastComplete = completes[completes.length - 1];
        lastComplete.classList.toggle("complete");
    }

    toggleButton.onclick = toggleComplete;
</script>
<script>
    $("#jumlah_mc2").keyup(function() {
        var harga = $("#jumlah_mc2").val();
        var tanpa_rupiah = document.getElementById('tanpa-rupiah');
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
<script>
    $("#jumlah_mc3").keyup(function() {
        var harga = $("#jumlah_mc3").val();
        var tanpa_rupiah = document.getElementById('tanpa-rupiah2');
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

<script>
    $('#modal_traking2').bind('hide', function() {
        cari_id_detail_program_penyedia_jasa(id_detail_program_penyedia_jasa)
    });
    $('#edit_mc').bind('hide', function() {
        cari_id_detail_program_penyedia_jasa(id_detail_program_penyedia_jasa)
    });
</script>


<script>
    function LogikaRetensi() {
        var sts_retensi = $('[name="sts_retensi"]').val();
        if (sts_retensi == 1) {
            $('#retensi_persen').css('display', 'none');
            $('#retensi_tidak_persen').css('display', 'block')
        } else if (sts_retensi == 2) {
            $('#retensi_persen').css('display', 'block');
            $('#retensi_tidak_persen').css('display', 'none')
        } else {
            $('[name="nilai_retensi"]').val('');
            $('#retensi_persen').css('display', 'none');
            $('#retensi_tidak_persen').css('display', 'none')
        }
    }
</script>


<script>
    $("#nilai_retensi2").keyup(function() {
        var harga = $("#nilai_retensi2").val();
        var tanpa_rupiah = document.getElementById('tanpa-rupiah-retensi');
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

<script>
    $("#denda2").keyup(function() {
        var harga = $("#denda2").val();
        var tanpa_rupiah = document.getElementById('tanpa-rupiah-denda');
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
<script>
    $("#nilai_uang_muka2").keyup(function() {
        var harga = $("#nilai_uang_muka2").val();
        var tanpa_rupiah = document.getElementById('tanpa-rupiah-uang-muka');
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

<!-- 
<script>
    function Traking_area2(id) {
        var Modal_traking = $('#modal_traking')
        $.ajax({
            type: "POST",
            url: "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/by_id_mc/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                Modal_traking.modal('show');

                // // INI FORM UNTUK UPLOAD MC DAN KIRIM VENDOR PERTAMA KALI
                // $('#waktu_kirim_vendor').text(response['traking'].waktu_kirim_vendor)
                // $('#nama_vendormc').text(response['traking'].nama_vendor)
                // $('#ket_upload').text('Upload Mc ' + response['traking'].no_mc)

                // bareng bareng jangan becanda
                $('[name="id_detail_program_penyedia_jasa"]').val(response['row_mc'].id_detail_program_penyedia_jasa)
                $('[name="tanggal_mc"]').val(response['row_mc'].tanggal_mc)
                $('[name="id_traking"]').val(response['traking'].id_traking)
                $('[name="id_mc"]').val(response['traking'].id_mc)
                // vendor
                $('[name="jumlah_hari_vendor"]').val(response['traking'].jumlah_hari_vendor)
                $('[name="waktu_kirim_vendor"]').val(response['traking'].waktu_kirim_vendor)
                // area
                $('[name="jumlah_hari_area"]').val(response['traking'].jumlah_hari_area)
                $('[name="waktu_kirim_area"]').val(response['traking'].waktu_kirim_area)
                // pusat
                $('[name="jumlah_hari_pusat"]').val(response['traking'].jumlah_hari_pusat)
                $('[name="waktu_kirim_pusat"]').val(response['traking'].waktu_kirim_pusat)
                // finance
                $('[name="jumlah_hari_finance"]').val(response['traking'].jumlah_hari_finance)
                $('[name="waktu_kirim_finance"]').val(response['traking'].waktu_kirim_finance)

                // Ini Kondisi Button 
                if (response['traking'].approve_vendor == 1) {
                    $('#button_vendor').css('display', 'none');
                } else {
                    $('#button_vendor').css('display', 'block');
                }

                if (response['traking'].approve_area == 1) {
                    $('#button_area').css('display', 'none');
                } else {
                    $('#button_area').css('display', 'block');
                }

                if (response['traking'].approve_pusat == 1) {
                    $('#button_pusat').css('display', 'none');
                } else {
                    $('#button_pusat').css('display', 'block');
                }

                if (response['traking'].approve_finance == 1) {
                    $('#button_finance').css('display', 'none');
                    $('#button_pencairan').css('display', 'block');
                } else {
                    $('#button_finance').css('display', 'block');
                    $('#button_pencairan').css('display', 'none');
                }

                // ini logika time line vendor
                $('#hari_vendor').text(response['get_traking_vendor'].hari_vendor + " Hari");
                $('#uraian_vendor').text(response['get_traking_vendor'].uraian);
                if (response['get_traking_vendor'].hari_vendor <= 10) {
                    $("#vendor_line").addClass("bg-soft-success text-success");
                } else {
                    $("#vendor_line").addClass("bg-soft-danger text-danger");
                }

                if (response['get_traking_area']) {
                    $('#hari_area').text(response['get_traking_area'].hari_area + " Hari");
                    $('#uraian_area').text(response['get_traking_area'].uraian);
                    if (response['get_traking_area'].hari_area <= 10) {
                        $("#area_line").addClass("bg-soft-success text-success");
                    } else {
                        $("#area_line").addClass("bg-soft-danger text-danger");
                    }

                } else {

                }

                if (response['get_traking_pusat']) {
                    $('#hari_pusat').text(response['get_traking_pusat'].hari_pusat + " Hari");
                    $('#uraian_pusat').text(response['get_traking_pusat'].uraian);
                    if (response['get_traking_pusat'].hari_pusat <= 10) {
                        $("#pusat_line").addClass("bg-soft-success text-success");
                    } else {
                        $("#pusat_line").addClass("bg-soft-danger text-danger");
                    }
                } else {

                }

                if (response['get_traking_finace']) {
                    $('#hari_finance').text(response['get_traking_finance'].hari_finance + " Hari");
                    $('#uraian_finance').text(response['get_traking_finance'].uraian);
                    if (response['get_traking_finance'].hari_finance <= 10) {
                        $("#finance_line").addClass("bg-soft-success text-success");
                    } else {
                        $("#finance_line").addClass("bg-soft-danger text-danger");
                    }
                } else {

                }






                $(document).ready(function() {
                    $('#datatable_traking_mc').DataTable({
                        "responsive": true,
                        "autoWidth": false,
                        "processing": true,
                        "serverSide": true,
                        "searching": true,
                        "bDestroy": true,
                        "info": false,
                        "order": [],
                        "ajax": {
                            "url": "<?= base_url('taggihan_kontrak_admin/tagihan_kontrak/get_data_traking_mc/') ?>" + response['traking'].id_mc,
                            "type": "POST",
                        },
                        "oLanguage": {
                            "sSearch": "Cari Data : ",
                            "sEmptyTable": "Data Tidak Tersedia",
                            "sLoadingRecords": "Silahkan Tunggu - loading...",
                            "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                            "sZeroRecords": "Tidak Ada Yang Di Cari",
                            "sProcessing": "Memuat Data...."
                        }
                    });
                });

                function relodTable3() {
                    $('#datatable_traking_mc').DataTable().ajax.reload();
                }

            }

        })
    }
</script> -->