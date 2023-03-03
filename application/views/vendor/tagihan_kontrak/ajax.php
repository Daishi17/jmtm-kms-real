<script>
    function message(title, icon, text) {
        swal({
            title: title,
            text: text,
            icon: icon,
        });
    }

    function cari_no_kontrak() {
        $('.create_mcku').css('display', 'block');
        var no_kontrak = $('[name="no_kontrak"]').val();
        var tbl_adendum = $('#tbl_adendum');
        if (no_kontrak == '') {
            message('No. Kontrak Belum Di isi!', 'warning', 'Gagal Mendapatkan Data!')
        } else {
            $.ajax({
                method: "POST",
                url: '<?= base_url('admin/tagihan_kontrak/by_no_kontrak/'); ?>' + no_kontrak,
                dataType: "JSON",
                success: function(response) {
                    var rpdata = 'Rp. ' + response['datakontrak']['total_kontrak'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00';
                    $('[name="total_kontrak"]').val(rpdata);
                    $('[name="tanggal_kontrak"]').val(response['datakontrak'].tanggal_kontrak);

                    $('[name="no_kontraku"]').val(no_kontrak);
                    if (response['selact_max'].no_mc == 1) {
                        $('[name="jumlah_mcku"]').val(response['selact_max'].jumlah_mc);
                    } else if (response['selact_max'].no_mc == 2) {
                        $('[name="jumlah_mcku"]').val(response['selact_max'].jumlah_mc);
                    } else {
                        $('[name="jumlah_mcku"]').val(response['selact_max'].sd_bulan_ini);
                    }


                    // -------INI UNTUK GET DETAIL KONTRAK -------------
                    var html = '';
                    var i;
                    var start = response.start;
                    for (i = 0; i < response['get_detail_taggihan'].length; ++i) {


                        // logika bulan ini di sini
                        if (response['get_detail_taggihan'][i].no_mc == 1) {
                            var mc = 'Um'
                        } else if (response['get_detail_taggihan'][i].no_mc == 2) {
                            var mc = response['get_detail_taggihan'][i].no_mc - 1
                        } else {
                            var mc = response['get_detail_taggihan'][i].no_mc - 1
                        }


                        //   logika hasil bulan lalu
                        var hasil_bulan_lalu = response['get_detail_taggihan'][i].sd_bulan_lalu;
                        var hasil_jumlah_mc = response['get_detail_taggihan'][i].jumlah_mc;
                        if (response['get_detail_taggihan'][i].no_mc == 1) {
                            var sd_bulan_lalu = ''
                        } else if (response['get_detail_taggihan'][i].no_mc == 2) {
                            var sd_bulan_lalu = ''
                        } else if (response['get_detail_taggihan'][i].no_mc >= 2) {
                            var sd_bulan_lalu = 'Rp. ' + hasil_bulan_lalu.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00'
                        }

                        if (response['get_detail_taggihan'][i].no_mc == 1) {
                            var bulan_ini = 'Rp. ' + response['get_detail_taggihan'][i].jumlah_mc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00'
                        } else if (response['get_detail_taggihan'][i].no_mc == 2) {
                            var bulan_ini = 'Rp. ' + response['get_detail_taggihan'][i].jumlah_mc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00'
                        } else {
                            var bulan_ini = 'Rp. ' + response['get_detail_taggihan'][i].jumlah_mc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00'
                        }

                        if (response['get_detail_taggihan'][i].no_mc == 1) {
                            var sd_bulan_ini = 'Rp. ' + response['get_detail_taggihan'][i].jumlah_mc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00'
                        } else if (response['get_detail_taggihan'][i].no_mc == 2) {
                            var sd_bulan_ini = 'Rp. ' + response['get_detail_taggihan'][i].jumlah_mc.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00'
                        } else {
                            var sd_bulan_ini = 'Rp. ' + response['get_detail_taggihan'][i].sd_bulan_ini.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00'
                        }

                        if (response['get_detail_taggihan'][i].no_mc == 1) {
                            var nama_pekerjaan = '<td class = "tg-d2hi" rowspan = "' + response['total_kontrak'].total + '">' + response['get_detail_taggihan'][i].nama_pekerjaan + '</td>'
                        } else {
                            var nama_pekerjaan = ''
                        }


                        if (response['get_detail_taggihan'][i].no_mc == 1) {
                            var nama_vendor = '<td class = "tg-d2hi" rowspan = "' + response['total_kontrak'].total + '">' + response['get_detail_taggihan'][i].nama_vendor + '</td>'
                        } else {
                            var nama_vendor = ''
                        }




                        if (response['vendor_session']) {
                            if (response['get_detail_taggihan'][i].status_penaggihan == 1) {
                                var action = '<a style="font-size:10px" class="btn btn-sm btn-primary text-white" onclick="Traking_area(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">View Traking</a>'
                            } else {
                                if (response['get_detail_taggihan'][i].status_penaggihan == 2) {
                                    var action = '<a style="font-size:10px" class="btn btn-sm btn-success text-white" onclick="Traking_area(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Pencairan</a>'
                                } else {
                                    var action = '<a style="font-size:10px" class="btn btn-sm btn-danger text-white" onclick="UploadPenaggihan(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Upload Tagihan</a>'
                                }
                            }
                        } else {
                            if (response['pegawai'] == 1 || response['pegawai'] == 2) {
                                if (response['get_detail_taggihan'][i].status_penaggihan == 1) {
                                    var action = '<a style="font-size:10px" class="btn btn-sm btn-primary text-white" onclick="Traking_area(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">View Traking</a>'
                                } else {
                                    if (response['get_detail_taggihan'][i].status_penaggihan == 2) {
                                        var action = '<a style="font-size:10px" class="btn btn-sm btn-success text-white" onclick="Traking_area(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Pencairan</a>'
                                    } else {
                                        var action = '<a style="font-size:10px" class="btn btn-sm btn-danger text-white"  href="javascript:;">Belum Ada Penagihan</a>'
                                    }
                                }
                            } else if (response['pegawai'] == 3) {
                                if (response['get_detail_taggihan'][i].status_penaggihan == 1) {
                                    var action = '<a style="font-size:10px" class="btn btn-sm btn-primary text-white" onclick="Traking_area(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">View Traking</a>'
                                } else {
                                    if (response['get_detail_taggihan'][i].status_penaggihan == 2) {
                                        var action = '<a style="font-size:10px" class="btn btn-sm btn-success text-white" onclick="Traking_area(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Pencairan</a>'
                                    } else {
                                        var action = '<a style="font-size:10px" class="btn btn-sm btn-danger text-white"  href="javascript:;">Belum Ada Penagihan</a>'
                                    }
                                }
                            } else if (response['pegawai'] == 4) {
                                if (response['get_detail_taggihan'][i].status_penaggihan == 1) {
                                    var action = '<a style="font-size:10px" class="btn btn-sm btn-primary text-white" onclick="Traking_area(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">View Traking</a>'
                                } else {
                                    if (response['get_detail_taggihan'][i].status_penaggihan == 2) {
                                        var action = '<a style="font-size:10px" class="btn btn-sm btn-success text-white" onclick="Traking_area(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Pencairan</a>'
                                    } else {
                                        var action = '<a style="font-size:10px" class="btn btn-sm btn-danger text-white"  href="javascript:;">Belum Ada Penagihan</a>'
                                    }
                                }
                            } else if (response['pegawai'] == 5) {
                                if (response['get_detail_taggihan'][i].status_penaggihan == 1) {
                                    var action = '<a style="font-size:10px" class="btn btn-sm btn-primary text-white" onclick="Traking_area(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">View Traking</a>'
                                } else {
                                    if (response['get_detail_taggihan'][i].status_penaggihan == 2) {
                                        var action = '<a style="font-size:10px" class="btn btn-sm btn-success text-white" onclick="Traking_area(' + response['get_detail_taggihan'][i].id_mc + ')" href="javascript:;">Pencairan</a>'
                                    } else {
                                        var action = '<a style="font-size:10px" class="btn btn-sm btn-danger text-white"  href="javascript:;">Belum Ada Penagihan</a>'
                                    }
                                }
                            }

                        }

                        html +=
                            '<tr>' + nama_pekerjaan + '' +
                            '' + nama_vendor + '' +
                            '<td class = "tg-d2hi">' + mc + '</td>' +
                            '<td class = "tg-d2hi">' + response['get_detail_taggihan'][i].tanggal_mc + ' </td> ' +
                            '<td class = "tg-d2hi">' + sd_bulan_lalu + ' </td> ' +
                            '<td class = "tg-d2hi"> ' + bulan_ini + ' </td> ' +
                            '<td class = "tg-d2hi"> ' + sd_bulan_ini + ' </td> ' +
                            '<td class = "tg-d2hi"> PPN </td> ' +
                            '<td class = "tg-d2hi"> S PPN </td> ' +
                            '<td class = "tg-d2hi"> Retensi </td> ' +
                            '<td class = "tg-d2hi"> P Uangmuka </td> ' +
                            '<td class = "tg-d2hi"> Potongan </td> ' +
                            '<td class = "tg-d2hi"> t Taggihan </td> ' +
                            '<td class = "tg-d2hi"> PPN FP </td> ' +
                            '<td class = "tg-d2hi"> Progresfisik Bi </td> ' +
                            '<td class = "tg-d2hi"> progeres fiskk kumulatif </td> ' +
                            '<td class = "tg-d2hi">' + action + '</td> ' +
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
                        "url": "<?= base_url('admin/tagihan_kontrak/get_seacrh_dendum_by_kontrak/') ?>" + no_kontrak,
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

    function Simpan_mc() {

        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/tagihan_kontrak/tambah_mc') ?>",
            data: $('#form_mc').serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    $('#modelId').modal('hide');
                    message('Berhasil!', 'success', 'Data Berhasil Disimpan!')
                    cari_no_kontrak()
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
            url: "<?= base_url('admin/tagihan_kontrak/by_id_mc/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                ModalUploadPenaggihan.modal('show');
                $('[name="id_mc_upload"]').val(response['row_mc'].id_mc)
                $('[name="no_kontrak_mc_upload"]').val(response['row_mc'].no_kontrak)
            }

        })
    }

    function Traking_area(id) {
        var Modal_traking = $('#modal_traking')
        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/tagihan_kontrak/by_id_mc/') ?>" + id,
            dataType: "JSON",
            success: function(response) {
                Modal_traking.modal('show');
                $('#tgl_upload').text(response['traking'].awal_aprove_vendor)
                $('#nama_vendormc').text(response['traking'].nama_vendor)
                $('#ket_upload').text('Upload Mc ' + response['traking'].no_mc)

                //   value post area
                $('[name="id_traking"]').val(response['traking'].id_traking)
                $('[name="id_mc_traking"]').val(response['traking'].id_mc)
                $('[name="awal_aprove_vendor"]').val(response['traking'].awal_aprove_vendor)
                $('[name="batas_aprove_vendor"]').val(response['traking'].batas_aprove_vendor)

                // value post pusat
                $('[name="awal_aprove_area"]').val(response['traking'].awal_aprove_area)
                $('[name="batas_aprove_area"]').val(response['traking'].batas_aprove_area)

                // LOGIKA WAKTU
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();
                var today = yyyy + '-' + mm + '-' + dd;

                var batas_aprove_vendor = new Date(response['traking'].batas_aprove_vendor);
                var days = daysdifference(today, batas_aprove_vendor);

                //   value post area 
                $('[name="sisa_batas_aprove_area"]').val(days + 10);
                $('[name="awal_aprove_area"]').val(today);

                //   INI LOGIKA AREA BATAS APPROVE
                if (response['traking'].approve_area == 1) {
                    var jumlah_hari_vendor = response['traking'].jumlah_hari_vendor;
                    var awal_aprove = response['traking'].awal_aprove_area;
                    var warning_area = parseInt(jumlah_hari_vendor) - 5;
                    var waktu_aarea = parseInt(jumlah_hari_vendor) - days;
                    var batas_prove = parseInt(jumlah_hari_vendor) - waktu_aarea;
                    $('#batas_area').text('Sudah Melakukan Aprove')
                    $('#waktu_aprove_area').text(awal_aprove)
                    if (waktu_aarea <= warning_area) {
                        $(".status_area").addClass("status");
                    } else if (waktu_aarea >= warning_area) {
                        $(".status_area").addClass("status2");
                    } else if (waktu_aarea >= jumlah_hari_vendor) {
                        $(".status_area").addClass("status3");
                    }
                } else {
                    var jumlah_hari_vendor = response['traking'].jumlah_hari_vendor;
                    var warning_area = parseInt(jumlah_hari_vendor) - 5;
                    var waktu_aarea = parseInt(jumlah_hari_vendor) - days;
                    var batas_prove = parseInt(jumlah_hari_vendor) - waktu_aarea;
                    $('#waktu_aprove_area').text('Dalam Proses Aprove')
                    $('#batas_area').text('Batas Aprove ' + batas_prove + ' Hari Lagi')
                    if (waktu_aarea <= warning_area) {
                        $(".status_area").addClass("status");
                    } else if (waktu_aarea >= warning_area) {
                        $(".status_area").addClass("status2");
                    } else if (waktu_aarea >= jumlah_hari_vendor) {
                        $(".status_area").addClass("status3");
                    }
                }




                var batas_aprove_area = new Date(response['traking'].batas_aprove_area);
                var days_area = daysdifference(today, batas_aprove_area);
                //   value post area 
                $('[name="sisa_batas_aprove_pusat"]').val(days_area + 10);
                $('[name="awal_aprove_pusat"]').val(today);
                //   INI LOGIKA PUSAT
                if (response['traking'].approve_pusat == 1) {
                    var jumlah_hari_area = response['traking'].jumlah_hari_area;
                    var awal_aprove_pusat = response['traking'].awal_aprove_pusat;
                    var warning_pusat = parseInt(jumlah_hari_area) - 5;
                    var waktu_apusat = parseInt(jumlah_hari_area) - days_area;
                    var batas_prove = parseInt(jumlah_hari_area) - waktu_apusat;
                    $('#waktu_aprove_pusat').text(awal_aprove_pusat)
                    $('#batas_pusat').text('Sudah Melakukan Aprove')
                    if (waktu_apusat <= warning_pusat) {
                        $(".status_pusat").addClass("status");
                    } else if (waktu_apusat >= warning_pusat) {
                        $(".status_pusat").addClass("status2");
                    } else if (waktu_apusat >= jumlah_hari_area) {
                        $(".status_pusat").addClass("status");
                    } else {
                        $(".status_pusat").addClass("status");
                    }
                } else {
                    if (response['traking'].approve_area == 0) {
                        var jumlah_hari_area = response['traking'].jumlah_hari_area;
                        var awal_aprove_pusat = response['traking'].awal_aprove_pusat;
                        var warning_pusat = parseInt(jumlah_hari_area) - 5;
                        var waktu_apusat = parseInt(jumlah_hari_area) - days_area;
                        var batas_prove = parseInt(jumlah_hari_area) - waktu_apusat;
                        $('#batas_pusat').text('Menunggu Giliran Aprove')
                        $('#waktu_aprove_pusat').text('Menunggu Giliran Aprove')
                        $(".status_pusat").addClass("status5");
                    } else {
                        var jumlah_hari_area = response['traking'].jumlah_hari_area;
                        var awal_aprove_pusat = response['traking'].awal_aprove_pusat;
                        var warning_pusat = parseInt(jumlah_hari_area) - 5;
                        var waktu_apusat = parseInt(jumlah_hari_area) - days_area;
                        var batas_prove = parseInt(jumlah_hari_area) - waktu_apusat;
                        $('#batas_pusat').text('Batas Aprove ' + batas_prove + ' Hari Lagi')
                        $('#waktu_aprove_pusat').text('Dalam Proses Aprove')
                        if (waktu_apusat <= warning_pusat) {
                            $(".status_pusat").addClass("status");
                        } else if (waktu_apusat >= warning_pusat) {
                            $(".status_pusat").addClass("status2");
                        } else if (waktu_apusat >= jumlah_hari_area) {
                            $(".status_pusat").addClass("status");
                        } else {
                            $(".status_pusat").addClass("status");
                        }

                    }

                }

                var batas_aprove_pusat = new Date(response['traking'].batas_aprove_pusat);
                var days_finance = daysdifference(today, batas_aprove_pusat);
                $('[name="awal_aprove_finance"]').val(today);
                // INI LOGIKA FINANCE
                if (response['traking'].approve_finance == 1) {
                    var jumlah_hari_pusat = response['traking'].jumlah_hari_pusat;
                    var warning_finance = parseInt(jumlah_hari_pusat) - 5;
                    var waktu_afinance = parseInt(jumlah_hari_pusat) - days_finance;
                    var batas_prove = parseInt(jumlah_hari_pusat) - waktu_afinance;
                    var awal_aprove_finance = response['traking'].awal_aprove_finance;
                    $('#waktu_aprove_finance').text(awal_aprove_finance)
                    $('#batas_finance').text('Sudah Melakukan Aprove')
                    if (waktu_afinance <= warning_finance) {
                        $(".status_finance").addClass("status");
                    } else if (waktu_afinance >= warning_finance) {
                        $(".status_finance").addClass("status2");
                    } else if (waktu_afinance >= jumlah_hari_pusat) {
                        $(".status_finance").addClass("status");
                    } else {
                        $(".status_finance").addClass("status");
                    }
                } else {
                    if (response['traking'].approve_pusat == 0) {
                        var jumlah_hari_pusat = response['traking'].jumlah_hari_pusat;
                        var warning_finance = parseInt(jumlah_hari_pusat) - 5;
                        var waktu_afinance = parseInt(jumlah_hari_pusat) - days_finance;
                        var batas_prove = parseInt(jumlah_hari_pusat) - waktu_afinance;
                        $('#batas_finance').text('Menunggu Giliran Aprove')
                        $('#waktu_aprove_finance').text('Menunggu Giliran Aprove')
                        $(".status_finance").addClass("status5");
                    } else {
                        $('#batas_finance').text('Batas Aprove ' + batas_prove + ' Hari Lagi')
                        $('#waktu_aprove_finance').text('Dalam Proses Aprove')
                        if (waktu_afinance <= warning_finance) {
                            $(".status_finance").addClass("status");
                        } else if (waktu_afinance >= warning_finance) {
                            $(".status_finance").addClass("status2");
                        } else if (waktu_afinance >= jumlah_hari_pusat) {
                            $(".status_finance").addClass("status");
                        } else {
                            $(".status_finance").addClass("status");
                        }
                    }

                }
                //   ini logika time line

                if (response['traking'].no_mc == 1) {
                    var mcke = 'Um'
                } else if (response['traking'].no_mc == 2) {
                    var mcke = response['traking'].no_mc - 1
                } else {
                    var mcke = response['traking'].no_mc - 1
                }
                // INI UNTUK VENDOR TBODY
                $('#mc_ke').text(mcke)
                $('#ket_vendor').text(response['traking'].ket_vendor)
                $('#file_mc').html('<a href="<?= base_url('file_maping/file_mc/') ?>' + response['traking'].file_mc + '" class="btn btn-sm btn-danger text-white">Lihat File</a>')

                //   INI UNTUK AREA

                if (response['traking'].approve_area == 1) {
                    $('#button_area').css('display', 'none')
                    var setujui_area = '<svg style="color: rgb(91, 226, 18);" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-file-earmark-check-fill" viewBox="0 0 16 16"> <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm1.354 4.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708z" fill="#5be212"></path> </svg>'
                } else if (response['traking'].approve_area == 2) {
                    $('#button_area').css('display', 'none')
                    var tidak_setuju = '<svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16"> <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" fill="red"></path> </svg>'
                } else {
                    $('#button_area').css('display', 'block')
                    var tidak_setuju = '';
                    var setujui_area = '';
                }

                $('#setuju_area').html(setujui_area)
                $('#ket_area').text(response['traking'].ket_area)
                $('#revisi_area').html(tidak_setuju)


                //   INI UNTUK pusat

                if (response['traking'].approve_pusat == 1) {
                    $('#button_pusat').css('display', 'none')
                    var setujui_pusat = '<svg style="color: rgb(91, 226, 18);" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-file-earmark-check-fill" viewBox="0 0 16 16"> <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm1.354 4.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708z" fill="#5be212"></path> </svg>'
                } else if (response['traking'].approve_pusat == 2) {
                    $('#button_pusat').css('display', 'none')
                    var tidak_setuju = '<svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16"> <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" fill="red"></path> </svg>'
                } else {
                    $('#button_pusat').css('display', 'block')
                    var tidak_setuju = '';
                    var setujui_pusat = '';
                }

                $('#setuju_pusat').html(setujui_pusat)
                $('#ket_pusat').text(response['traking'].ket_pusat)
                $('#revisi_pusat').html(tidak_setuju)

                //   INI UNTUK dinance

                if (response['traking'].approve_finance == 1) {
                    $('#button_finance').css('display', 'none')
                    var setujui_finance = '<svg style="color: rgb(91, 226, 18);" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-file-earmark-check-fill" viewBox="0 0 16 16"> <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm1.354 4.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708z" fill="#5be212"></path> </svg>'
                } else if (response['traking'].approve_finance == 2) {
                    $('#button_finance').css('display', 'none')
                    var tidak_setuju = '<svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16"> <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" fill="red"></path> </svg>'
                } else {
                    $('#button_finance').css('display', 'block')
                    var tidak_setuju = '';
                    var setujui_finance = '';
                }

                $('#setuju_finance').html(setujui_finance)
                $('#ket_finance').text(response['traking'].ket_finance)
                $('#revisi_finance').html(tidak_setuju)


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
                url: "<?php echo base_url(); ?>admin/tagihan_kontrak/upload_file_mc",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                //   beforeSend: function() {
                //       $('#upload_mcku').attr('disabled', 'disabled');
                //   },
                success: function(response) {
                    $('#form_upload_mc')[0].reset();
                    //   $('#upload_mcku').attr('disabled', false);
                    ModalUploadPenaggihan.modal('hide');
                    message('Berhasil!', 'success', 'Data Berhasil Di Upload!')
                    //   message('success', 'Data Berhasil Di Upload');
                    cari_no_kontrak()
                }
            });
        }
    });

    function Setujui_area() {
        var id_traking = $('[name="id_mc_traking"]').val()
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/tagihan_kontrak/update_traking') ?>",
            data: $('#form_aprove_area').serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('Berhasil!', 'success', 'Berhasil Di Aprove!')
                    cari_no_kontrak()
                    $('#modal_traking').modal('hide');
                    $('#modal_approve_area').modal('hide');
                } else {}
            }
        })
    }

    function Setujui_pusat() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/tagihan_kontrak/update_traking_pusat') ?>",
            data: $('#form_aprove_pusat').serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('Berhasil!', 'success', 'Berhasil Di Aprove!')
                    cari_no_kontrak()
                    $('#modal_traking').modal('hide');
                    $('#modal_approve_pusat').modal('hide');
                } else {}
            }
        })
    }

    function Setujui_finance() {
        $.ajax({
            method: "POST",
            url: "<?= base_url('admin/tagihan_kontrak/update_traking_finance') ?>",
            data: $('#form_aprove_finance').serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response == 'success') {
                    message('Berhasil!', 'success', 'Berhasil Di Aprove!')
                    cari_no_kontrak()
                    $('#modal_traking').modal('hide');
                    $('#modal_approve_finance').modal('hide');
                } else {}
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
    var table = $('#table')

    $(document).ready(function() {
        table.DataTable({
            "responsive": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('admin/data_administrasi_kontrak/get_data') ?>",
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