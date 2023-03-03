                                                                    <!-- BATAS CAPEX -->

                                                                    <?php
                                                                    $this->db->select('*');
                                                                    $this->db->from('tbl_capex');
                                                                    $this->db->where('tbl_capex.id_kontrak', $row_kontrak['id_kontrak']);
                                                                    $query_result_capex = $this->db->get() ?>
                                                                    <?php
                                                                    foreach ($query_result_capex->result_array() as $value_capex) { ?>
                                                                        <?php $id_capex = $value_capex['id_capex'];  ?>
                                                                        <?php
                                                                        $this->db->select('*');
                                                                        $this->db->from('tbl_capex_detail');
                                                                        $this->db->where('tbl_capex_detail.id_capex', $id_capex);
                                                                        $kondisi_detail_capex = $this->db->get()->result_array() ?>
                                                                        <tr>
                                                                            <td class="tg-0lax">
                                                                                1.1
                                                                            </td>
                                                                            <td class="tg-0lax">&nbsp;&nbsp; CAPEX</td>
                                                                            <?php if ($adendum_result) { ?>
                                                                                <?php foreach ($adendum_result as $key => $value) { ?>
                                                                                    <?php
                                                                                    if ($value['no_adendum'] == 1) {
                                                                                        $nilai = 'nilai_capex_add_I';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_1';
                                                                                        $cek_add = 1;
                                                                                    } else if ($value['no_adendum'] == 2) {
                                                                                        $nilai = 'nilai_capex_add_II';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_2';
                                                                                        $cek_add = 2;
                                                                                    } else if ($value['no_adendum'] == 3) {
                                                                                        $nilai = 'nilai_capex_add_III';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_3';
                                                                                        $cek_add = 3;
                                                                                    } else if ($value['no_adendum'] == 4) {
                                                                                        $nilai = 'nilai_capex_add_IV';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_4';
                                                                                        $cek_add = 4;
                                                                                    } else if ($value['no_adendum'] == 5) {
                                                                                        $nilai = 'nilai_capex_add_V';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_5';
                                                                                        $cek_add = 5;
                                                                                    } else if ($value['no_adendum'] == 6) {
                                                                                        $nilai = 'nilai_capex_add_VI';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_6';
                                                                                        $cek_add = 6;
                                                                                    } else if ($value['no_adendum'] == 7) {
                                                                                        $nilai = 'nilai_capex_add_VII';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_7';
                                                                                        $cek_add = 7;
                                                                                    } else if ($value['no_adendum'] == 8) {
                                                                                        $nilai = 'nilai_capex_add_VIII';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_8';
                                                                                        $cek_add = 8;
                                                                                    } else if ($value['no_adendum'] == 9) {
                                                                                        $nilai = 'nilai_capex_add_IX';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_9';
                                                                                        $cek_add = 9;
                                                                                    } else if ($value['no_adendum'] == 10) {
                                                                                        $nilai = 'nilai_capex_add_X';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_10';
                                                                                        $cek_add = 10;
                                                                                    } else if ($value['no_adendum'] == 11) {
                                                                                        $nilai = 'nilai_capex_add_XI';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_11';
                                                                                        $cek_add = 11;
                                                                                    } else if ($value['no_adendum'] == 12) {
                                                                                        $nilai = 'nilai_capex_add_XII';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_12';
                                                                                        $cek_add = 12;
                                                                                    } else if ($value['no_adendum'] == 13) {
                                                                                        $nilai = 'nilai_capex_add_XIII';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_13';
                                                                                        $cek_add = 13;
                                                                                    } else if ($value['no_adendum'] == 14) {
                                                                                        $nilai = 'nilai_capex_add_XIV';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_14';
                                                                                        $cek_add = 14;
                                                                                    } else if ($value['no_adendum'] == 15) {
                                                                                        $nilai = 'nilai_capex_add_XV';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_15';
                                                                                        $cek_add = 15;
                                                                                    } else if ($value['no_adendum'] == 16) {
                                                                                        $nilai = 'nilai_capex_add_XVI';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_16';
                                                                                        $cek_add = 16;
                                                                                    } else if ($value['no_adendum'] == 17) {
                                                                                        $nilai = 'nilai_capex_add_XVII';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_17';
                                                                                        $cek_add = 17;
                                                                                    } else if ($value['no_adendum'] == 18) {
                                                                                        $nilai = 'nilai_capex_add_XVIII';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_18';
                                                                                        $cek_add = 18;
                                                                                    } else if ($value['no_adendum'] == 19) {
                                                                                        $nilai = 'nilai_capex_add_XIX';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_19';
                                                                                        $cek_add = 19;
                                                                                    } else if ($value['no_adendum'] == 20) {
                                                                                        $nilai = 'nilai_capex_add_XX';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_20';
                                                                                        $cek_add = 20;
                                                                                    } else if ($value['no_adendum'] == 21) {
                                                                                        $nilai = 'nilai_capex_add_XXI';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_21';
                                                                                        $cek_add = 21;
                                                                                    } else if ($value['no_adendum'] == 22) {
                                                                                        $nilai = 'nilai_capex_add_XXII';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_22';
                                                                                        $cek_add = 22;
                                                                                    } else if ($value['no_adendum'] == 23) {
                                                                                        $nilai = 'nilai_capex_add_XXIII';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_23';
                                                                                        $cek_add = 23;
                                                                                    } else if ($value['no_adendum'] == 24) {
                                                                                        $nilai = 'nilai_capex_add_XXIV';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_24';
                                                                                        $cek_add = 24;
                                                                                    } else if ($value['no_adendum'] == 25) {
                                                                                        $nilai = 'nilai_capex_add_XXV';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_25';
                                                                                        $cek_add = 25;
                                                                                    } else if ($value['no_adendum'] == 26) {
                                                                                        $nilai = 'nilai_capex_add_XXVI';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_26';
                                                                                        $cek_add = 26;
                                                                                    } else if ($value['no_adendum'] == 27) {
                                                                                        $nilai = 'nilai_capex_add_XXVII';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_27';
                                                                                        $cek_add = 27;
                                                                                    } else if ($value['no_adendum'] == 28) {
                                                                                        $nilai = 'nilai_capex_add_XXVIII';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_28';
                                                                                        $cek_add = 28;
                                                                                    } else if ($value['no_adendum'] == 29) {
                                                                                        $nilai = 'nilai_capex_add_XXIX';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_29';
                                                                                        $cek_add = 29;
                                                                                    } else if ($value['no_adendum'] == 30) {
                                                                                        $nilai = 'nilai_capex_add_XXX';
                                                                                        $update_reusable = 'update_nilai_level_2_capex_add_30';
                                                                                        $cek_add = 30;
                                                                                    } else {
                                                                                        $cek_add = 1;
                                                                                        $nilai = 'nilai_capex';
                                                                                        $update_reusable = 'update_nilai_level_2_capex';
                                                                                    }
                                                                                    ?>
                                                                                    <td class="tg-0lax"> <?= "Rp " . number_format($value_capex[$nilai], 2, ',', '.') ?>
                                                                                    </td>
                                                                                    <td class="tg-0lax">
                                                                                        <?php if ($value_capex[$nilai] == null || $value_capex[$nilai] == 0) { ?>
                                                                                            <?php if ($kondisi_detail_capex) { ?>
                                                                                            <?php    } else { ?>
                                                                                                <?php $this->db->select('*');
                                                                                                $this->db->from('tbl_list_mata_anggran');
                                                                                                $this->db->where('tbl_list_mata_anggran.id_checking', $id_detail_capex);
                                                                                                $this->db->where('tbl_list_mata_anggran.no_add', $cek_add);
                                                                                                $checking_capex_detail = $this->db->get()->result_array() ?>
                                                                                                <?php if ($checking_capex_detail) { ?>
                                                                                                    <a onclick="modal_level_2_capex(<?= $value_capex['id_capex'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                <?php    } else { ?>
                                                                                                    <a onclick="modal_level_2_capex(<?= $value_capex['id_capex'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                <?php   }  ?>
                                                                                            <?php   }  ?>
                                                                                        <?php } else { ?>
                                                                                            <?php if ($kondisi_detail_capex) { ?>
                                                                                            <?php    } else { ?>
                                                                                                <a onclick="modal_level_2_capex(<?= $value_capex['id_capex'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                            <?php   }  ?>
                                                                                        <?php    } ?>
                                                                                    </td>
                                                                                <?php   } ?>
                                                                            <?php } else { ?>
                                                                                <?php
                                                                                $nilai = 'nilai_capex';
                                                                                $update_reusable = 'update_nilai_level_2_capex';
                                                                                ?>
                                                                                <td class="tg-0lax"> <?= "Rp " . number_format($value_capex[$nilai], 2, ',', '.') ?>
                                                                                </td>
                                                                                <td class="tg-0lax">
                                                                                    <?php if ($value_capex[$nilai] == null || $value_capex[$nilai] == 0) { ?>
                                                                                        <?php if ($kondisi_detail_capex) { ?>

                                                                                        <?php    } else { ?>
                                                                                            <?php $this->db->select('*');
                                                                                            $this->db->from('tbl_list_mata_anggran');
                                                                                            $this->db->where('tbl_list_mata_anggran.id_checking', $id_detail_capex);
                                                                                            $this->db->where('tbl_list_mata_anggran.no_add', $cek_add);
                                                                                            $checking_capex_detail = $this->db->get()->result_array() ?>
                                                                                            <?php if ($checking_capex_detail) { ?>
                                                                                                <a onclick="modal_level_2_capex(<?= $value_capex['id_capex'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                            <?php    } else { ?>
                                                                                                <a onclick="modal_level_2_capex(<?= $value_capex['id_capex'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                            <?php   }  ?>
                                                                                        <?php   }  ?>
                                                                                    <?php } else { ?>
                                                                                        <?php if ($kondisi_detail_capex) { ?>

                                                                                        <?php    } else { ?>
                                                                                            <a onclick="modal_level_2_capex(<?= $value_capex['id_capex'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                        <?php   }  ?>
                                                                                    <?php    } ?>
                                                                                </td>
                                                                            <?php  }  ?>
                                                                            <div class="modal fade" id="form_modal_level_2_capex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="title_modal_level_2_capex"></h5>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <form action="javascript:;" method="post" id="form_simpan_level_2_capex">
                                                                                                <input type="hidden" name="id_capex">
                                                                                                <input type="text" name="type_add">
                                                                                                <input type="text" name="id_kontrak" value="<?= $row_kontrak['id_kontrak'] ?>">
                                                                                                <div class="form-group" style="display: none;" id="form_tambah_level_2_capex">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-12">
                                                                                                            <div class="form-group">
                                                                                                                <label for="">Nama Uraian</label>
                                                                                                                <input type="text" name="nama_uraian" class="form-control">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="form-group" style="display: none;" id="form_input_nilai_level_2_capex">
                                                                                                    <label for="">Pilih Mata Anggran</label>
                                                                                                    <div class="row">
                                                                                                        <div class="col-6">
                                                                                                            <div class="input-group-prepend">
                                                                                                                <span class="">

                                                                                                                </span>
                                                                                                                <input type="hidden" class="form-control" name="nilai_capex" id="nilai_capex" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-6">
                                                                                                            <input type="hidden" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="rupiah_nilai_capex_level_2_capex">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                            <a href="javascript:;" style="display: none;" id="button_update_nilai_level_2_capex" class="btn btn-success button_simpan" onclick="Simpan_level_2_capex(<?= $value_capex['id_capex'] ?>,'update_nilai_level_2_capex')">Simpan</a>
                                                                                            <a href="javascript:;" id="button_tambah_level_2_capex" class="btn btn-success button_simpan" onclick="Simpan_level_2_capex(<?= $value_capex['id_capex'] ?>,'tambah_level_2_capex')">Update</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                            $this->db->select('*');
                                                                            $this->db->from('tbl_capex_detail');
                                                                            $this->db->where('tbl_capex_detail.id_capex', $id_capex);
                                                                            $query_result_detail_capex = $this->db->get() ?>
                                                                            <?php
                                                                            foreach ($query_result_detail_capex->result_array() as $value_detail_capex) { ?>
                                                                                <?php $id_capex_detail = $value_detail_capex['id_capex_detail'];  ?>
                                                                                <?php
                                                                                $this->db->select('*');
                                                                                $this->db->from('tbl_detail_capex_1');
                                                                                $this->db->where('tbl_detail_capex_1.id_capex_detail', $id_capex_detail);
                                                                                $kondisi_capex_detail_1 = $this->db->get()->result_array() ?>
                                                                        <tr>
                                                                            <td class="tg-0lax">
                                                                                <?= $value_detail_capex['no_urut'] ?> </td>
                                                                            <td class="tg-0lax">&nbsp;&nbsp;&nbsp; <?= $value_detail_capex['nama_uraian'] ?></td>
                                                                            <?php if ($adendum_result) { ?>
                                                                                <?php foreach ($adendum_result as $key => $value) { ?>
                                                                                    <?php
                                                                                        if ($value['no_adendum'] == 1) {
                                                                                            $nilai = 'nilai_detail_capex_add_I';
                                                                                            $cek_add = 1;
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_1';
                                                                                        } else if ($value['no_adendum'] == 2) {
                                                                                            $nilai = 'nilai_detail_capex_add_II';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_2';
                                                                                            $cek_add = 2;
                                                                                        } else if ($value['no_adendum'] == 3) {
                                                                                            $nilai = 'nilai_detail_capex_add_III';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_3';

                                                                                            $cek_add = 3;
                                                                                        } else if ($value['no_adendum'] == 4) {
                                                                                            $nilai = 'nilai_detail_capex_add_IV';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_4';

                                                                                            $cek_add = 4;
                                                                                        } else if ($value['no_adendum'] == 5) {
                                                                                            $nilai = 'nilai_detail_capex_add_V';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_5';

                                                                                            $cek_add = 5;
                                                                                        } else if ($value['no_adendum'] == 6) {
                                                                                            $nilai = 'nilai_detail_capex_add_VI';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_6';

                                                                                            $cek_add = 6;
                                                                                        } else if ($value['no_adendum'] == 7) {
                                                                                            $nilai = 'nilai_detail_capex_add_VII';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_7';

                                                                                            $cek_add = 7;
                                                                                        } else if ($value['no_adendum'] == 8) {
                                                                                            $nilai = 'nilai_detail_capex_add_VIII';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_8';

                                                                                            $cek_add = 8;
                                                                                        } else if ($value['no_adendum'] == 9) {
                                                                                            $nilai = 'nilai_detail_capex_add_IX';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_9';

                                                                                            $cek_add = 9;
                                                                                        } else if ($value['no_adendum'] == 10) {
                                                                                            $nilai = 'nilai_detail_capex_add_X';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_10';

                                                                                            $cek_add = 10;
                                                                                        } else if ($value['no_adendum'] == 11) {
                                                                                            $nilai = 'nilai_detail_capex_add_XI';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_11';

                                                                                            $cek_add = 11;
                                                                                        } else if ($value['no_adendum'] == 12) {
                                                                                            $nilai = 'nilai_detail_capex_add_XII';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_12';

                                                                                            $cek_add = 12;
                                                                                        } else if ($value['no_adendum'] == 13) {
                                                                                            $nilai = 'nilai_detail_capex_add_XIII';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_13';

                                                                                            $cek_add = 13;
                                                                                        } else if ($value['no_adendum'] == 14) {
                                                                                            $nilai = 'nilai_detail_capex_add_XIV';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_14';

                                                                                            $cek_add = 14;
                                                                                        } else if ($value['no_adendum'] == 15) {
                                                                                            $nilai = 'nilai_detail_capex_add_XV';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_15';

                                                                                            $cek_add = 15;
                                                                                        } else if ($value['no_adendum'] == 16) {
                                                                                            $nilai = 'nilai_detail_capex_add_XVI';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_16';

                                                                                            $cek_add = 16;
                                                                                        } else if ($value['no_adendum'] == 17) {
                                                                                            $nilai = 'nilai_detail_capex_add_XVII';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_17';

                                                                                            $cek_add = 17;
                                                                                        } else if ($value['no_adendum'] == 18) {
                                                                                            $nilai = 'nilai_detail_capex_add_XVIII';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_18';

                                                                                            $cek_add = 18;
                                                                                        } else if ($value['no_adendum'] == 19) {
                                                                                            $nilai = 'nilai_detail_capex_add_XIX';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_19';

                                                                                            $cek_add = 19;
                                                                                        } else if ($value['no_adendum'] == 20) {
                                                                                            $nilai = 'nilai_detail_capex_add_XX';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_20';

                                                                                            $cek_add = 20;
                                                                                        } else if ($value['no_adendum'] == 21) {
                                                                                            $nilai = 'nilai_detail_capex_add_XXI';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_21';

                                                                                            $cek_add = 21;
                                                                                        } else if ($value['no_adendum'] == 22) {
                                                                                            $nilai = 'nilai_detail_capex_add_XXII';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_22';

                                                                                            $cek_add = 22;
                                                                                        } else if ($value['no_adendum'] == 23) {
                                                                                            $nilai = 'nilai_detail_capex_add_XXIII';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_23';

                                                                                            $cek_add = 23;
                                                                                        } else if ($value['no_adendum'] == 24) {
                                                                                            $nilai = 'nilai_detail_capex_add_XXIV';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_24';

                                                                                            $cek_add = 23;
                                                                                        } else if ($value['no_adendum'] == 25) {
                                                                                            $nilai = 'nilai_detail_capex_add_XXV';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_25';

                                                                                            $cek_add = 25;
                                                                                        } else if ($value['no_adendum'] == 26) {
                                                                                            $nilai = 'nilai_detail_capex_add_XXVI';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_26';

                                                                                            $cek_add = 26;
                                                                                        } else if ($value['no_adendum'] == 27) {
                                                                                            $nilai = 'nilai_detail_capex_add_XXVII';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_27';

                                                                                            $cek_add = 27;
                                                                                        } else if ($value['no_adendum'] == 28) {
                                                                                            $nilai = 'nilai_detail_capex_add_XXVIII';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_28';

                                                                                            $cek_add = 28;
                                                                                        } else if ($value['no_adendum'] == 29) {
                                                                                            $nilai = 'nilai_detail_capex_add_XXIX';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_29';

                                                                                            $cek_add = 29;
                                                                                        } else if ($value['no_adendum'] == 30) {
                                                                                            $nilai = 'nilai_detail_capex_add_XXX';
                                                                                            $update_reusable = 'update_nilai_level_3_capex_add_30';

                                                                                            $cek_add = 30;
                                                                                        } else {

                                                                                            $cek_add = 1;
                                                                                            $nilai = 'nilai_detail_capex';
                                                                                            $update_reusable = 'update_nilai_level_3_capex';
                                                                                        }
                                                                                    ?>
                                                                                    <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex[$nilai], 2, ',', '.') ?>
                                                                                    </td>
                                                                                    <td class="tg-0lax">

                                                                                        <?php if ($value_detail_capex[$nilai] == null || $value_detail_capex[$nilai] == 0) { ?>
                                                                                            <?php if ($kondisi_capex_detail_1) { ?>
                                                                                            <?php    } else { ?>
                                                                                                <?php $this->db->select('*');
                                                                                                $this->db->from('tbl_list_mata_anggran');
                                                                                                $this->db->where('tbl_list_mata_anggran.id_checking', $id_detail_capex);
                                                                                                $this->db->where('tbl_list_mata_anggran.no_add', $cek_add);
                                                                                                $checking_capex_detail = $this->db->get()->result_array() ?>
                                                                                                <?php if ($checking_capex_detail) { ?>
                                                                                                    <a onclick="modal_level_3_capex(<?= $value_detail_capex['id_capex_detail'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                <?php    } else { ?>
                                                                                                    <a onclick="modal_level_3_capex(<?= $value_detail_capex['id_capex_detail'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                <?php   }  ?>

                                                                                            <?php   }  ?>
                                                                                        <?php } else { ?>
                                                                                            <?php if ($kondisi_capex_detail_1) { ?>

                                                                                            <?php    } else { ?>
                                                                                                <a onclick="modal_level_3_capex(<?= $value_detail_capex['id_capex_detail'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                            <?php   }  ?>
                                                                                        <?php    } ?>
                                                                                    </td>
                                                                                <?php   } ?>
                                                                            <?php } else { ?>
                                                                                <?php
                                                                                    $nilai = 'nilai_detail_capex';
                                                                                    $update_reusable = 'update_nilai_level_3_capex';
                                                                                ?>
                                                                                <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex[$nilai], 2, ',', '.') ?>
                                                                                </td>
                                                                                <td class="tg-0lax">
                                                                                    <?php if ($value_detail_capex[$nilai] == null || $value_detail_capex[$nilai] == 0) { ?>
                                                                                        <?php if ($kondisi_capex_detail_1) { ?>

                                                                                        <?php    } else { ?>
                                                                                            <a onclick="modal_level_3_capex(<?= $value_detail_capex['id_capex_detail'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                        <?php   }  ?>
                                                                                    <?php } else { ?>
                                                                                        <?php if ($kondisi_capex_detail_1) { ?>

                                                                                        <?php    } else { ?>
                                                                                            <a onclick="modal_level_3_capex(<?= $value_detail_capex['id_capex_detail'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                        <?php   }  ?>
                                                                                    <?php    } ?>
                                                                                </td>
                                                                            <?php  }  ?>

                                                                        </tr>
                                                                        <div class="modal fade" id="form_modal_level_3_capex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="title_modal_level_3_capex"></h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <form action="javascript:;" method="post" id="form_simpan_level_3_capex">
                                                                                            <input type="hidden" name="id_capex_detail">
                                                                                            <input type="text" name="type_add">
                                                                                            <input type="text" name="id_kontrak" value="<?= $row_kontrak['id_kontrak'] ?>">
                                                                                            <div class="form-group" style="display: none;" id="form_tambah_level_3_capex">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">
                                                                                                        <div class="form-group">
                                                                                                            <label for="">Nama Uraian</label>
                                                                                                            <input type="text" name="nama_uraian" class="form-control">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-group" style="display: none;" id="form_input_nilai_level_3_capex">
                                                                                                <label for="">Pilih Mata Anggran</label>
                                                                                                <div class="row">
                                                                                                    <div class="col-6">
                                                                                                        <div class="input-group-prepend">
                                                                                                            <span class="">

                                                                                                            </span>
                                                                                                            <input type="hidden" class="form-control" name="nilai_detail_capex" id="nilai_detail_capex" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-6">
                                                                                                        <input type="hidden" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="rupiah_nilai_detail_capex_level_3_capex">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <a href="javascript:;" style="display: none;" id="button_update_nilai_level_3_capex" class="btn btn-success button_simpan" onclick="Simpan_level_3_capex('update_nilai_level_3_capex')">Simpan</a>
                                                                                        <a href="javascript:;" id="button_tambah_level_3_capex" class="btn btn-success button_simpan" onclick="Simpan_level_3_capex('tambah_level_3_capex')">Update</a>
                                                                                        <a href="javascript:;" id="button_edit_level_3_capex" class="btn btn-success button_simpan" onclick="Simpan_level_3_capex('edit_level_3_capex')">Edit</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                                $this->db->select('*');
                                                                                $this->db->from('tbl_detail_capex_1');
                                                                                $this->db->where('tbl_detail_capex_1.id_capex_detail', $id_capex_detail);
                                                                                $this->db->order_by('display_order', 'ASC');
                                                                                $query_result_detail_capex_1 = $this->db->get() ?>
                                                                        <?php
                                                                                foreach ($query_result_detail_capex_1->result_array() as $value_detail_capex_1) { ?>
                                                                            <?php $id_detail_capex_1 = $value_detail_capex_1['id_detail_capex_1'];

                                                                            ?>
                                                                            <?php
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tbl_detail_capex_2');
                                                                                    $this->db->where('tbl_detail_capex_2.id_detail_capex_1', $id_detail_capex_1);
                                                                                    $kondisi_capex_detail_1 = $this->db->get()->result_array();

                                                                            ?>

                                                                            <tr>
                                                                                <td class="tg-0lax">
                                                                                    <?= $value_detail_capex_1['no_urut_1_capex'] ?> </td>
                                                                                </td>
                                                                                <td class="tg-0lax">&nbsp;&nbsp;&nbsp;&nbsp; <?= $value_detail_capex_1['nama_uraian_1_capex'] ?></td>
                                                                                <?php if ($adendum_result) { ?>
                                                                                    <?php foreach ($adendum_result as $key => $value) { ?>
                                                                                        <?php
                                                                                            if ($value['no_adendum'] == 1) {
                                                                                                $nilai = 'nilai_capex_detail_1_add_I';
                                                                                                $cek_add = 1;
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_1';
                                                                                            } else if ($value['no_adendum'] == 2) {
                                                                                                $cek_add = 2;
                                                                                                $nilai = 'nilai_capex_detail_1_add_II';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_2';
                                                                                            } else if ($value['no_adendum'] == 3) {
                                                                                                $cek_add = 3;
                                                                                                $nilai = 'nilai_capex_detail_1_add_III';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_3';
                                                                                            } else if ($value['no_adendum'] == 4) {
                                                                                                $cek_add = 4;
                                                                                                $nilai = 'nilai_capex_detail_1_add_IV';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_4';
                                                                                            } else if ($value['no_adendum'] == 5) {
                                                                                                $cek_add = 5;
                                                                                                $nilai = 'nilai_capex_detail_1_add_V';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_5';
                                                                                            } else if ($value['no_adendum'] == 6) {
                                                                                                $cek_add = 6;
                                                                                                $nilai = 'nilai_capex_detail_1_add_VI';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_6';
                                                                                            } else if ($value['no_adendum'] == 7) {
                                                                                                $cek_add = 7;
                                                                                                $nilai = 'nilai_capex_detail_1_add_VII';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_7';
                                                                                            } else if ($value['no_adendum'] == 8) {
                                                                                                $cek_add = 8;
                                                                                                $nilai = 'nilai_capex_detail_1_add_VIII';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_8';
                                                                                            } else if ($value['no_adendum'] == 9) {
                                                                                                $cek_add = 9;
                                                                                                $nilai = 'nilai_capex_detail_1_add_IX';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_9';
                                                                                            } else if ($value['no_adendum'] == 10) {
                                                                                                $cek_add = 10;
                                                                                                $nilai = 'nilai_capex_detail_1_add_X';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_10';
                                                                                            } else if ($value['no_adendum'] == 11) {
                                                                                                $cek_add = 11;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XI';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_11';
                                                                                            } else if ($value['no_adendum'] == 12) {
                                                                                                $cek_add = 12;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XII';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_12';
                                                                                            } else if ($value['no_adendum'] == 13) {
                                                                                                $cek_add = 13;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XIII';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_13';
                                                                                            } else if ($value['no_adendum'] == 14) {
                                                                                                $cek_add = 14;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XIV';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_14';
                                                                                            } else if ($value['no_adendum'] == 15) {
                                                                                                $cek_add = 15;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XV';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_15';
                                                                                            } else if ($value['no_adendum'] == 16) {
                                                                                                $cek_add = 16;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XVI';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_16';
                                                                                            } else if ($value['no_adendum'] == 17) {
                                                                                                $cek_add = 17;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XVII';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_17';
                                                                                            } else if ($value['no_adendum'] == 18) {
                                                                                                $cek_add = 18;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XVIII';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_18';
                                                                                            } else if ($value['no_adendum'] == 19) {
                                                                                                $cek_add = 19;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XIX';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_19';
                                                                                            } else if ($value['no_adendum'] == 20) {
                                                                                                $cek_add = 20;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XX';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_20';
                                                                                            } else if ($value['no_adendum'] == 21) {
                                                                                                $cek_add = 21;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XXI';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_21';
                                                                                            } else if ($value['no_adendum'] == 22) {
                                                                                                $cek_add = 22;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XXII';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_22';
                                                                                            } else if ($value['no_adendum'] == 23) {
                                                                                                $cek_add = 23;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XXIII';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_23';
                                                                                            } else if ($value['no_adendum'] == 24) {
                                                                                                $cek_add = 23;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XXIV';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_24';
                                                                                            } else if ($value['no_adendum'] == 25) {
                                                                                                $cek_add = 25;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XXV';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_25';
                                                                                            } else if ($value['no_adendum'] == 26) {
                                                                                                $cek_add = 26;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XXVI';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_26';
                                                                                            } else if ($value['no_adendum'] == 27) {
                                                                                                $cek_add = 27;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XXVII';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_27';
                                                                                            } else if ($value['no_adendum'] == 28) {
                                                                                                $cek_add = 28;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XXVIII';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_28';
                                                                                            } else if ($value['no_adendum'] == 29) {
                                                                                                $cek_add = 29;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XXIX';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_29';
                                                                                            } else if ($value['no_adendum'] == 30) {
                                                                                                $cek_add = 30;
                                                                                                $nilai = 'nilai_capex_detail_1_add_XXX';
                                                                                                $update_reusable = 'update_nilai_level_4_capex_add_30';
                                                                                            } else {
                                                                                                $cek_add = 3;
                                                                                                $nilai = 'nilai_capex_detail_1';
                                                                                                $update_reusable = 'update_nilai_level_4_capex';
                                                                                            }
                                                                                        ?>
                                                                                        <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_1[$nilai], 2, ',', '.') ?>
                                                                                        </td>
                                                                                        <td class="tg-0lax">
                                                                                            <?php $this->db->select('*');
                                                                                            $this->db->from('tbl_list_mata_anggran');
                                                                                            $this->db->where('tbl_list_mata_anggran.id_checking', $id_detail_capex_1);
                                                                                            $this->db->where('tbl_list_mata_anggran.no_add', $cek_add);
                                                                                            $checking_capex_detail_1 = $this->db->get()->result_array() ?>
                                                                                            <?php if ($value_detail_capex_1[$nilai] == null || $value_detail_capex_1[$nilai] == 0) { ?>
                                                                                                <?php if ($kondisi_capex_detail_1) { ?>

                                                                                                <?php    } else { ?>

                                                                                                    <?php if ($checking_capex_detail_1) { ?>
                                                                                                        <a onclick="modal_level_4_capex(<?= $value_detail_capex_1['id_detail_capex_1'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                    <?php    } else { ?>
                                                                                                        <a onclick="modal_level_4_capex(<?= $value_detail_capex_1['id_detail_capex_1'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                    <?php   }  ?>

                                                                                                <?php   }  ?>
                                                                                            <?php } else { ?>
                                                                                                <?php if ($kondisi_capex_detail_1) { ?>

                                                                                                <?php    } else { ?>
                                                                                                    <?php if ($checking_capex_detail_1) { ?>
                                                                                                        <a onclick="modal_level_4_capex(<?= $value_detail_capex_1['id_detail_capex_1'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                    <?php    } else { ?>
                                                                                                        <a onclick="modal_level_4_capex(<?= $value_detail_capex_1['id_detail_capex_1'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                    <?php   }  ?>

                                                                                                <?php   }  ?>
                                                                                            <?php    } ?>
                                                                                        </td>
                                                                                    <?php   } ?>
                                                                                <?php } else { ?>
                                                                                    <?php
                                                                                        $nilai = 'nilai_capex_detail_1';
                                                                                        $update_reusable = 'update_nilai_level_4_capex';
                                                                                    ?>
                                                                                    <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_1[$nilai], 2, ',', '.') ?>
                                                                                    </td>
                                                                                    <td class="tg-0lax">
                                                                                        <?php if ($value_detail_capex_1[$nilai] == null || $value_detail_capex_1[$nilai] == 0) { ?>
                                                                                            <?php if ($kondisi_capex_detail_1) { ?>

                                                                                            <?php    } else { ?>

                                                                                                <a onclick="modal_level_4_capex(<?= $value_detail_capex_1['id_detail_capex_1'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                            <?php   }  ?>
                                                                                        <?php } else { ?>
                                                                                            <?php if ($kondisi_capex_detail_1) { ?>

                                                                                            <?php    } else { ?>
                                                                                                <a onclick="modal_level_4_capex(<?= $value_detail_capex_1['id_detail_capex_1'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                            <?php   }  ?>
                                                                                        <?php    } ?>
                                                                                    </td>
                                                                                <?php  }  ?>

                                                                            </tr>


                                                                            <div class="modal fade" id="form_modal_level_4_capex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="title_modal_level_4_capex"></h5>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <form action="javascript:;" method="post" id="form_simpan_level_4_capex">
                                                                                                <input type="hidden" name="id_detail_capex_1">
                                                                                                <input type="hidden" name="type_add">
                                                                                                <input type="hidden" name="id_kontrak" value="<?= $row_kontrak['id_kontrak'] ?>">
                                                                                                <div class="form-group" style="display: none;" id="form_tambah_level_4_capex">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-12">
                                                                                                            <div class="form-group">
                                                                                                                <label for="">Nama Uraian</label>
                                                                                                                <input type="text" name="nama_uraian" class="form-control">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group" style="display: none;" id="form_input_nilai_level_4_capex">
                                                                                                    <label for="">Pilih Mata Anggran</label>
                                                                                                    <div class="row">
                                                                                                        <div class="col-6">
                                                                                                            <div class="input-group-prepend">
                                                                                                                <input type="hidden" class="form-control" name="nilai_capex_detail_1" id="nilai_capex_detail_1" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-6">
                                                                                                            <input type="hidden" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="rupiah_nilai_capex_detail_1_level_4_capex">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                            <a href="javascript:;" style="display: none;" id="button_update_nilai_level_4_capex" class="btn btn-success button_simpan" onclick="Simpan_level_4_capex('update_nilai_level_4_capex')">Simpan</a>
                                                                                            <a href="javascript:;" id="button_tambah_level_4_capex" class="btn btn-success button_simpan" onclick="Simpan_level_4_capex('tambah_level_4_capex')">Update</a>
                                                                                            <a href="javascript:;" id="button_edit_level_4_capex" class="btn btn-success button_simpan" onclick="Simpan_level_4_capex('edit_level_4_capex')">Edit</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <?php
                                                                                    $this->db->select('*');
                                                                                    $this->db->from('tbl_detail_capex_2');
                                                                                    $this->db->where('tbl_detail_capex_2.id_detail_capex_1', $id_detail_capex_1);
                                                                                    $this->db->order_by('display_order', 'ASC');
                                                                                    $query_result_detail_capex_2 = $this->db->get() ?>
                                                                            <?php
                                                                                    foreach ($query_result_detail_capex_2->result_array() as $value_detail_capex_2) { ?>
                                                                                <?php $id_detail_capex_2 = $value_detail_capex_2['id_detail_capex_2'];  ?>
                                                                                <?php
                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tbl_detail_capex_3');
                                                                                        $this->db->where('tbl_detail_capex_3.id_detail_capex_2', $id_detail_capex_2);
                                                                                        $kondisi_capex_detail_2 = $this->db->get()->result_array() ?>
                                                                                <tr>
                                                                                    <td class="tg-0lax">
                                                                                        <?= $value_detail_capex_2['no_urut_2_capex'] ?> </td>
                                                                                    </td>
                                                                                    <td class="tg-0lax">&nbsp;&nbsp;&nbsp;&nbsp; <?= $value_detail_capex_2['nama_uraian_2_capex'] ?></td>
                                                                                    <?php if ($adendum_result) { ?>
                                                                                        <!-- detail_2 -->
                                                                                        <!-- capex_2 -->
                                                                                        <!-- level_5 -->
                                                                                        <?php foreach ($adendum_result as $key => $value) { ?>
                                                                                            <?php
                                                                                                if ($value['no_adendum'] == 1) {
                                                                                                    $nilai = 'nilai_capex_detail_2_add_I';
                                                                                                    $cek_add = 1;
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_1';
                                                                                                } else if ($value['no_adendum'] == 2) {
                                                                                                    $cek_add = 2;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_II';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_2';
                                                                                                } else if ($value['no_adendum'] == 3) {
                                                                                                    $cek_add = 3;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_III';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_3';
                                                                                                } else if ($value['no_adendum'] == 4) {
                                                                                                    $cek_add = 4;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_IV';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_4';
                                                                                                } else if ($value['no_adendum'] == 5) {
                                                                                                    $cek_add = 5;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_V';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_5';
                                                                                                } else if ($value['no_adendum'] == 6) {
                                                                                                    $cek_add = 6;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_VI';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_6';
                                                                                                } else if ($value['no_adendum'] == 7) {
                                                                                                    $cek_add = 7;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_VII';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_7';
                                                                                                } else if ($value['no_adendum'] == 8) {
                                                                                                    $cek_add = 8;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_VIII';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_8';
                                                                                                } else if ($value['no_adendum'] == 9) {
                                                                                                    $cek_add = 9;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_IX';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_9';
                                                                                                } else if ($value['no_adendum'] == 10) {
                                                                                                    $cek_add = 10;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_X';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_10';
                                                                                                } else if ($value['no_adendum'] == 11) {
                                                                                                    $cek_add = 11;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XI';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_11';
                                                                                                } else if ($value['no_adendum'] == 12) {
                                                                                                    $cek_add = 12;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XII';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_12';
                                                                                                } else if ($value['no_adendum'] == 13) {
                                                                                                    $cek_add = 13;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XIII';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_13';
                                                                                                } else if ($value['no_adendum'] == 14) {
                                                                                                    $cek_add = 14;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XIV';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_14';
                                                                                                } else if ($value['no_adendum'] == 15) {
                                                                                                    $cek_add = 15;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XV';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_15';
                                                                                                } else if ($value['no_adendum'] == 16) {
                                                                                                    $cek_add = 16;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XVI';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_16';
                                                                                                } else if ($value['no_adendum'] == 17) {
                                                                                                    $cek_add = 17;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XVII';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_17';
                                                                                                } else if ($value['no_adendum'] == 18) {
                                                                                                    $cek_add = 18;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XVIII';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_18';
                                                                                                } else if ($value['no_adendum'] == 19) {
                                                                                                    $cek_add = 19;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XIX';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_19';
                                                                                                } else if ($value['no_adendum'] == 20) {
                                                                                                    $cek_add = 20;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XX';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_20';
                                                                                                } else if ($value['no_adendum'] == 21) {
                                                                                                    $cek_add = 21;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XXI';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_21';
                                                                                                } else if ($value['no_adendum'] == 22) {
                                                                                                    $cek_add = 22;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XXII';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_22';
                                                                                                } else if ($value['no_adendum'] == 23) {
                                                                                                    $cek_add = 23;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XXIII';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_23';
                                                                                                } else if ($value['no_adendum'] == 24) {
                                                                                                    $cek_add = 23;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XXIV';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_24';
                                                                                                } else if ($value['no_adendum'] == 25) {
                                                                                                    $cek_add = 25;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XXV';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_25';
                                                                                                } else if ($value['no_adendum'] == 26) {
                                                                                                    $cek_add = 26;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XXVI';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_26';
                                                                                                } else if ($value['no_adendum'] == 27) {
                                                                                                    $cek_add = 27;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XXVII';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_27';
                                                                                                } else if ($value['no_adendum'] == 28) {
                                                                                                    $cek_add = 28;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XXVIII';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_28';
                                                                                                } else if ($value['no_adendum'] == 29) {
                                                                                                    $cek_add = 29;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XXIX';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_29';
                                                                                                } else if ($value['no_adendum'] == 30) {
                                                                                                    $cek_add = 30;
                                                                                                    $nilai = 'nilai_capex_detail_2_add_XXX';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex_add_30';
                                                                                                } else {
                                                                                                    $cek_add = 3;
                                                                                                    $nilai = 'nilai_capex_detail_2';
                                                                                                    $update_reusable = 'update_nilai_level_5_capex';
                                                                                                }
                                                                                            ?>
                                                                                            <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_2[$nilai], 2, ',', '.') ?>
                                                                                            </td>
                                                                                            <td class="tg-0lax">
                                                                                                <?php $this->db->select('*');
                                                                                                $this->db->from('tbl_list_mata_anggran');
                                                                                                $this->db->where('tbl_list_mata_anggran.id_checking', $id_detail_capex_2);
                                                                                                $this->db->where('tbl_list_mata_anggran.no_add', $cek_add);
                                                                                                $checking_capex_detail_2 = $this->db->get()->result_array() ?>
                                                                                                <?php if ($value_detail_capex_2[$nilai] == null || $value_detail_capex_2[$nilai] == 0) { ?>
                                                                                                    <?php if ($kondisi_capex_detail_2) { ?>

                                                                                                    <?php    } else { ?>

                                                                                                        <?php if ($checking_capex_detail_2) { ?>
                                                                                                            <a onclick="modal_level_5_capex(<?= $value_detail_capex_2['id_detail_capex_2'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                        <?php    } else { ?>
                                                                                                            <a onclick="modal_level_5_capex(<?= $value_detail_capex_2['id_detail_capex_2'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                        <?php   }  ?>

                                                                                                    <?php   }  ?>
                                                                                                <?php } else { ?>
                                                                                                    <?php if ($kondisi_capex_detail_2) { ?>

                                                                                                    <?php    } else { ?>
                                                                                                        <?php if ($checking_capex_detail_2) { ?>
                                                                                                            <a onclick="modal_level_5_capex(<?= $value_detail_capex_2['id_detail_capex_2'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                        <?php    } else { ?>
                                                                                                            <a onclick="modal_level_5_capex(<?= $value_detail_capex_2['id_detail_capex_2'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                        <?php   }  ?>

                                                                                                    <?php   }  ?>
                                                                                                <?php    } ?>
                                                                                            </td>
                                                                                        <?php   } ?>
                                                                                    <?php } else { ?>
                                                                                        <?php
                                                                                            $nilai = 'nilai_capex_detail_2';
                                                                                            $update_reusable = 'update_nilai_level_5_capex';
                                                                                        ?>
                                                                                        <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_2[$nilai], 2, ',', '.') ?>
                                                                                        </td>
                                                                                        <td class="tg-0lax">
                                                                                            <?php if ($value_detail_capex_2[$nilai] == null || $value_detail_capex_2[$nilai] == 0) { ?>
                                                                                                <?php if ($kondisi_capex_detail_2) { ?>

                                                                                                <?php    } else { ?>

                                                                                                    <a onclick="modal_level_5_capex(<?= $value_detail_capex_2['id_detail_capex_2'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                                <?php   }  ?>
                                                                                            <?php } else { ?>
                                                                                                <?php if ($kondisi_capex_detail_2) { ?>

                                                                                                <?php    } else { ?>
                                                                                                    <a onclick="modal_level_5_capex(<?= $value_detail_capex_2['id_detail_capex_2'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                                <?php   }  ?>
                                                                                            <?php    } ?>
                                                                                        </td>
                                                                                    <?php  }  ?>

                                                                                </tr>

                                                                                <div class="modal fade" id="form_modal_level_5_capex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title" id="title_modal_level_5_capex"></h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <form action="javascript:;" method="post" id="form_simpan_level_5_capex">
                                                                                                    <input type="hidden" name="id_detail_capex_2">
                                                                                                    <input type="text" name="type_add">
                                                                                                    <input type="text" name="id_kontrak" value="<?= $row_kontrak['id_kontrak'] ?>">
                                                                                                    <div class="form-group" style="display: none;" id="form_tambah_level_5_capex">
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-12">
                                                                                                                <div class="form-group">
                                                                                                                    <label for="">Nama Uraian</label>
                                                                                                                    <input type="text" name="nama_uraian" class="form-control">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="form-group" style="display: none;" id="form_input_nilai_level_5_capex">
                                                                                                        <label for="">Pilih Mata Anggran</label>
                                                                                                        <div class="row">
                                                                                                            <div class="col-6">
                                                                                                                <div class="input-group-prepend">
                                                                                                                    <span class="">

                                                                                                                    </span>
                                                                                                                    <input type="hidden" class="form-control" name="nilai_capex_detail_2" id="nilai_capex_detail_2" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-6">
                                                                                                                <input type="hidden" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="rupiah_nilai_capex_detail_2_level_5_capex">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </form>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                <a href="javascript:;" style="display: none;" id="button_update_nilai_level_5_capex" class="btn btn-success button_simpan" onclick="Simpan_level_5_capex('update_nilai_level_5_capex')">Simpan</a>
                                                                                                <a href="javascript:;" id="button_tambah_level_5_capex" class="btn btn-success button_simpan" onclick="Simpan_level_5_capex('tambah_level_5_capex')">Update</a>
                                                                                                <a href="javascript:;" id="button_edit_level_5_capex" class="btn btn-success button_simpan" onclick="Simpan_level_5_capex('edit_level_5_capex')">Edit</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <!-- level 6 -->
                                                                                <?php
                                                                                        $this->db->select('*');
                                                                                        $this->db->from('tbl_detail_capex_3');
                                                                                        $this->db->where('tbl_detail_capex_3.id_detail_capex_2', $id_detail_capex_2);
                                                                                        $this->db->order_by('display_order', 'ASC');
                                                                                        $query_result_detail_capex_3 = $this->db->get() ?>
                                                                                <?php
                                                                                        foreach ($query_result_detail_capex_3->result_array() as $value_detail_capex_3) { ?>
                                                                                    <?php $id_detail_capex_3 = $value_detail_capex_3['id_detail_capex_3'];  ?>
                                                                                    <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tbl_detail_capex_4');
                                                                                            $this->db->where('tbl_detail_capex_4.id_detail_capex_3', $id_detail_capex_3);
                                                                                            $kondisi_capex_detail_4 = $this->db->get()->result_array() ?>
                                                                                    <tr>
                                                                                        <!-- detail_3 -->
                                                                                        <!-- capex_3 -->
                                                                                        <!-- level_6 -->
                                                                                        <td class="tg-0lax">
                                                                                            <?= $value_detail_capex_3['no_urut_3_capex'] ?> </td>
                                                                                        </td>
                                                                                        <td class="tg-0lax">&nbsp;&nbsp;&nbsp;&nbsp; <?= $value_detail_capex_3['nama_uraian_3_capex'] ?></td>
                                                                                        <?php if ($adendum_result) { ?>
                                                                                            <?php foreach ($adendum_result as $key => $value) { ?>
                                                                                                <?php
                                                                                                    if ($value['no_adendum'] == 1) {
                                                                                                        $nilai = 'nilai_capex_detail_3_add_I';
                                                                                                        $cek_add = 1;
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_1';
                                                                                                    } else if ($value['no_adendum'] == 2) {
                                                                                                        $cek_add = 2;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_II';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_2';
                                                                                                    } else if ($value['no_adendum'] == 3) {
                                                                                                        $cek_add = 3;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_III';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_3';
                                                                                                    } else if ($value['no_adendum'] == 4) {
                                                                                                        $cek_add = 4;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_IV';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_4';
                                                                                                    } else if ($value['no_adendum'] == 5) {
                                                                                                        $cek_add = 5;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_V';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_5';
                                                                                                    } else if ($value['no_adendum'] == 6) {
                                                                                                        $cek_add = 6;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_VI';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_6';
                                                                                                    } else if ($value['no_adendum'] == 7) {
                                                                                                        $cek_add = 7;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_VII';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_7';
                                                                                                    } else if ($value['no_adendum'] == 8) {
                                                                                                        $cek_add = 8;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_VIII';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_8';
                                                                                                    } else if ($value['no_adendum'] == 9) {
                                                                                                        $cek_add = 9;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_IX';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_9';
                                                                                                    } else if ($value['no_adendum'] == 10) {
                                                                                                        $cek_add = 10;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_X';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_10';
                                                                                                    } else if ($value['no_adendum'] == 11) {
                                                                                                        $cek_add = 11;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XI';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_11';
                                                                                                    } else if ($value['no_adendum'] == 12) {
                                                                                                        $cek_add = 12;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XII';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_12';
                                                                                                    } else if ($value['no_adendum'] == 13) {
                                                                                                        $cek_add = 13;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XIII';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_13';
                                                                                                    } else if ($value['no_adendum'] == 14) {
                                                                                                        $cek_add = 14;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XIV';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_14';
                                                                                                    } else if ($value['no_adendum'] == 15) {
                                                                                                        $cek_add = 15;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XV';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_15';
                                                                                                    } else if ($value['no_adendum'] == 16) {
                                                                                                        $cek_add = 16;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XVI';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_16';
                                                                                                    } else if ($value['no_adendum'] == 17) {
                                                                                                        $cek_add = 17;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XVII';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_17';
                                                                                                    } else if ($value['no_adendum'] == 18) {
                                                                                                        $cek_add = 18;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XVIII';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_18';
                                                                                                    } else if ($value['no_adendum'] == 19) {
                                                                                                        $cek_add = 19;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XIX';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_19';
                                                                                                    } else if ($value['no_adendum'] == 20) {
                                                                                                        $cek_add = 20;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XX';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_20';
                                                                                                    } else if ($value['no_adendum'] == 21) {
                                                                                                        $cek_add = 21;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XXI';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_21';
                                                                                                    } else if ($value['no_adendum'] == 22) {
                                                                                                        $cek_add = 22;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XXII';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_22';
                                                                                                    } else if ($value['no_adendum'] == 23) {
                                                                                                        $cek_add = 23;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XXIII';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_23';
                                                                                                    } else if ($value['no_adendum'] == 24) {
                                                                                                        $cek_add = 23;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XXIV';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_24';
                                                                                                    } else if ($value['no_adendum'] == 25) {
                                                                                                        $cek_add = 25;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XXV';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_25';
                                                                                                    } else if ($value['no_adendum'] == 26) {
                                                                                                        $cek_add = 26;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XXVI';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_26';
                                                                                                    } else if ($value['no_adendum'] == 27) {
                                                                                                        $cek_add = 27;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XXVII';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_27';
                                                                                                    } else if ($value['no_adendum'] == 28) {
                                                                                                        $cek_add = 28;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XXVIII';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_28';
                                                                                                    } else if ($value['no_adendum'] == 29) {
                                                                                                        $cek_add = 29;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XXIX';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_29';
                                                                                                    } else if ($value['no_adendum'] == 30) {
                                                                                                        $cek_add = 30;
                                                                                                        $nilai = 'nilai_capex_detail_3_add_XXX';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex_add_30';
                                                                                                    } else {
                                                                                                        $cek_add = 3;
                                                                                                        $nilai = 'nilai_capex_detail_3';
                                                                                                        $update_reusable = 'update_nilai_level_6_capex';
                                                                                                    }
                                                                                                ?>
                                                                                                <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_3[$nilai], 2, ',', '.') ?>
                                                                                                </td>
                                                                                                <td class="tg-0lax">
                                                                                                    <?php $this->db->select('*');
                                                                                                    $this->db->from('tbl_list_mata_anggran');
                                                                                                    $this->db->where('tbl_list_mata_anggran.id_checking', $id_detail_capex_3);
                                                                                                    $this->db->where('tbl_list_mata_anggran.no_add', $cek_add);
                                                                                                    $checking_capex_detail_3 = $this->db->get()->result_array() ?>
                                                                                                    <?php if ($value_detail_capex_3[$nilai] == null || $value_detail_capex_3[$nilai] == 0) { ?>
                                                                                                        <?php if ($kondisi_capex_detail_4) { ?>

                                                                                                        <?php    } else { ?>

                                                                                                            <?php if ($checking_capex_detail_3) { ?>
                                                                                                                <a onclick="modal_level_6_capex(<?= $value_detail_capex_3['id_detail_capex_3'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                            <?php    } else { ?>
                                                                                                                <a onclick="modal_level_6_capex(<?= $value_detail_capex_3['id_detail_capex_3'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                            <?php   }  ?>

                                                                                                        <?php   }  ?>
                                                                                                    <?php } else { ?>
                                                                                                        <?php if ($kondisi_capex_detail_4) { ?>

                                                                                                        <?php    } else { ?>
                                                                                                            <?php if ($checking_capex_detail_3) { ?>
                                                                                                                <a onclick="modal_level_6_capex(<?= $value_detail_capex_3['id_detail_capex_3'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                            <?php    } else { ?>
                                                                                                                <a onclick="modal_level_6_capex(<?= $value_detail_capex_3['id_detail_capex_3'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                            <?php   }  ?>

                                                                                                        <?php   }  ?>
                                                                                                    <?php    } ?>
                                                                                                </td>
                                                                                            <?php   } ?>
                                                                                        <?php } else { ?>
                                                                                            <?php
                                                                                                $nilai = 'nilai_capex_detail_3';
                                                                                                $update_reusable = 'update_nilai_level_6_capex';
                                                                                            ?>
                                                                                            <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_3[$nilai], 2, ',', '.') ?>
                                                                                            </td>
                                                                                            <td class="tg-0lax">
                                                                                                <?php if ($value_detail_capex_3[$nilai] == null || $value_detail_capex_3[$nilai] == 0) { ?>
                                                                                                    <?php if ($kondisi_capex_detail_4) { ?>

                                                                                                    <?php    } else { ?>

                                                                                                        <a onclick="modal_level_6_capex(<?= $value_detail_capex_3['id_detail_capex_3'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                                    <?php   }  ?>
                                                                                                <?php } else { ?>
                                                                                                    <?php if ($kondisi_capex_detail_4) { ?>

                                                                                                    <?php    } else { ?>
                                                                                                        <a onclick="modal_level_6_capex(<?= $value_detail_capex_3['id_detail_capex_3'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                                    <?php   }  ?>
                                                                                                <?php    } ?>
                                                                                            </td>
                                                                                        <?php  }  ?>

                                                                                    </tr>

                                                                                    <div class="modal fade" id="form_modal_level_6_capex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                        <div class="modal-dialog" role="document">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5 class="modal-title" id="title_modal_level_6_capex"></h5>
                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                    <form action="javascript:;" method="post" id="form_simpan_level_6_capex">
                                                                                                        <input type="hidden" name="id_detail_capex_3">
                                                                                                        <input type="text" name="type_add">
                                                                                                        <input type="text" name="id_kontrak" value="<?= $row_kontrak['id_kontrak'] ?>">
                                                                                                        <div class="form-group" style="display: none;" id="form_tambah_level_6_capex">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12">
                                                                                                                    <div class="form-group">
                                                                                                                        <label for="">Nama Uraian</label>
                                                                                                                        <input type="text" name="nama_uraian" class="form-control">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-group" style="display: none;" id="form_input_nilai_level_6_capex">
                                                                                                            <label for="">Pilih Mata Anggaran</label>
                                                                                                            <div class="row">
                                                                                                                <div class="col-6">
                                                                                                                    <div class="input-group-prepend">
                                                                                                                        <span class="">

                                                                                                                        </span>
                                                                                                                        <input type="hidden" class="form-control" name="nilai_capex_detail_3" id="nilai_capex_detail_3" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-6">
                                                                                                                    <input type="hidden" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="rupiah_nilai_capex_detail_3_level_6_capex">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                    <a href="javascript:;" style="display: none;" id="button_update_nilai_level_6_capex" class="btn btn-success button_simpan" onclick="Simpan_level_6_capex('update_nilai_level_6_capex')">Simpan</a>
                                                                                                    <a href="javascript:;" id="button_tambah_level_6_capex" class="btn btn-success button_simpan" onclick="Simpan_level_6_capex('tambah_level_6_capex')">Update</a>
                                                                                                    <a href="javascript:;" id="button_edit_level_6_capex" class="btn btn-success button_simpan" onclick="Simpan_level_6_capex('edit_level_6_capex')">Edit</a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>



                                                                                    <!-- level 7 -->
                                                                                    <?php
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('tbl_detail_capex_4');
                                                                                            $this->db->where('tbl_detail_capex_4.id_detail_capex_3', $id_detail_capex_3);
                                                                                            $this->db->order_by('display_order', 'ASC');
                                                                                            $query_result_detail_capex_4 = $this->db->get() ?>
                                                                                    <?php
                                                                                            foreach ($query_result_detail_capex_4->result_array() as $value_detail_capex_4) { ?>
                                                                                        <?php $id_detail_capex_4 = $value_detail_capex_4['id_detail_capex_4'];  ?>
                                                                                        <?php
                                                                                                $this->db->select('*');
                                                                                                $this->db->from('tbl_detail_capex_5');
                                                                                                $this->db->where('tbl_detail_capex_5.id_detail_capex_4', $id_detail_capex_4);
                                                                                                $kondisi_capex_detail_5 = $this->db->get()->result_array() ?>
                                                                                        <tr>
                                                                                            <!-- kondisi_capex_detail_5 -->
                                                                                            <!-- detail_4 -->
                                                                                            <!-- capex_4 -->
                                                                                            <!-- level_7 -->
                                                                                            <td class="tg-0lax">
                                                                                                <?= $value_detail_capex_4['no_urut_4_capex'] ?> </td>
                                                                                            </td>
                                                                                            <td class="tg-0lax">&nbsp;&nbsp;&nbsp;&nbsp; <?= $value_detail_capex_4['nama_uraian_4_capex'] ?></td>
                                                                                            <?php if ($adendum_result) { ?>
                                                                                                <?php foreach ($adendum_result as $key => $value) { ?>
                                                                                                    <?php
                                                                                                        if ($value['no_adendum'] == 1) {
                                                                                                            $nilai = 'nilai_capex_detail_4_add_I';
                                                                                                            $cek_add = 1;
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_1';
                                                                                                        } else if ($value['no_adendum'] == 2) {
                                                                                                            $cek_add = 2;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_II';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_2';
                                                                                                        } else if ($value['no_adendum'] == 3) {
                                                                                                            $cek_add = 3;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_III';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_3';
                                                                                                        } else if ($value['no_adendum'] == 4) {
                                                                                                            $cek_add = 4;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_IV';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_4';
                                                                                                        } else if ($value['no_adendum'] == 5) {
                                                                                                            $cek_add = 5;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_V';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_5';
                                                                                                        } else if ($value['no_adendum'] == 6) {
                                                                                                            $cek_add = 6;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_VI';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_6';
                                                                                                        } else if ($value['no_adendum'] == 7) {
                                                                                                            $cek_add = 7;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_VII';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_7';
                                                                                                        } else if ($value['no_adendum'] == 8) {
                                                                                                            $cek_add = 8;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_VIII';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_8';
                                                                                                        } else if ($value['no_adendum'] == 9) {
                                                                                                            $cek_add = 9;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_IX';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_9';
                                                                                                        } else if ($value['no_adendum'] == 10) {
                                                                                                            $cek_add = 10;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_X';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_10';
                                                                                                        } else if ($value['no_adendum'] == 11) {
                                                                                                            $cek_add = 11;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XI';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_11';
                                                                                                        } else if ($value['no_adendum'] == 12) {
                                                                                                            $cek_add = 12;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XII';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_12';
                                                                                                        } else if ($value['no_adendum'] == 13) {
                                                                                                            $cek_add = 13;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XIII';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_13';
                                                                                                        } else if ($value['no_adendum'] == 14) {
                                                                                                            $cek_add = 14;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XIV';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_14';
                                                                                                        } else if ($value['no_adendum'] == 15) {
                                                                                                            $cek_add = 15;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XV';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_15';
                                                                                                        } else if ($value['no_adendum'] == 16) {
                                                                                                            $cek_add = 16;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XVI';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_16';
                                                                                                        } else if ($value['no_adendum'] == 17) {
                                                                                                            $cek_add = 17;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XVII';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_17';
                                                                                                        } else if ($value['no_adendum'] == 18) {
                                                                                                            $cek_add = 18;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XVIII';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_18';
                                                                                                        } else if ($value['no_adendum'] == 19) {
                                                                                                            $cek_add = 19;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XIX';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_19';
                                                                                                        } else if ($value['no_adendum'] == 20) {
                                                                                                            $cek_add = 20;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XX';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_20';
                                                                                                        } else if ($value['no_adendum'] == 21) {
                                                                                                            $cek_add = 21;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XXI';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_21';
                                                                                                        } else if ($value['no_adendum'] == 22) {
                                                                                                            $cek_add = 22;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XXII';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_22';
                                                                                                        } else if ($value['no_adendum'] == 23) {
                                                                                                            $cek_add = 23;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XXIII';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_23';
                                                                                                        } else if ($value['no_adendum'] == 24) {
                                                                                                            $cek_add = 23;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XXIV';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_24';
                                                                                                        } else if ($value['no_adendum'] == 25) {
                                                                                                            $cek_add = 25;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XXV';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_25';
                                                                                                        } else if ($value['no_adendum'] == 26) {
                                                                                                            $cek_add = 26;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XXVI';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_26';
                                                                                                        } else if ($value['no_adendum'] == 27) {
                                                                                                            $cek_add = 27;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XXVII';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_27';
                                                                                                        } else if ($value['no_adendum'] == 28) {
                                                                                                            $cek_add = 28;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XXVIII';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_28';
                                                                                                        } else if ($value['no_adendum'] == 29) {
                                                                                                            $cek_add = 29;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XXIX';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_29';
                                                                                                        } else if ($value['no_adendum'] == 30) {
                                                                                                            $cek_add = 30;
                                                                                                            $nilai = 'nilai_capex_detail_4_add_XXX';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex_add_30';
                                                                                                        } else {
                                                                                                            $cek_add = 3;
                                                                                                            $nilai = 'nilai_capex_detail_4';
                                                                                                            $update_reusable = 'update_nilai_level_7_capex';
                                                                                                        }
                                                                                                    ?>
                                                                                                    <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_4[$nilai], 2, ',', '.') ?>
                                                                                                    </td>
                                                                                                    <td class="tg-0lax">
                                                                                                        <?php $this->db->select('*');
                                                                                                        $this->db->from('tbl_list_mata_anggran');
                                                                                                        $this->db->where('tbl_list_mata_anggran.id_checking', $id_detail_capex_4);
                                                                                                        $this->db->where('tbl_list_mata_anggran.no_add', $cek_add);
                                                                                                        $checking_capex_detail_4 = $this->db->get()->result_array() ?>
                                                                                                        <?php if ($value_detail_capex_4[$nilai] == null || $value_detail_capex_4[$nilai] == 0) { ?>
                                                                                                            <?php if ($kondisi_capex_detail_5) { ?>

                                                                                                            <?php    } else { ?>

                                                                                                                <?php if ($checking_capex_detail_4) { ?>
                                                                                                                    <a onclick="modal_level_7_capex(<?= $value_detail_capex_4['id_detail_capex_4'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                                <?php    } else { ?>
                                                                                                                    <a onclick="modal_level_7_capex(<?= $value_detail_capex_4['id_detail_capex_4'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                                <?php   }  ?>

                                                                                                            <?php   }  ?>
                                                                                                        <?php } else { ?>
                                                                                                            <?php if ($kondisi_capex_detail_5) { ?>

                                                                                                            <?php    } else { ?>
                                                                                                                <?php if ($checking_capex_detail_4) { ?>
                                                                                                                    <a onclick="modal_level_7_capex(<?= $value_detail_capex_4['id_detail_capex_4'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                                <?php    } else { ?>
                                                                                                                    <a onclick="modal_level_7_capex(<?= $value_detail_capex_4['id_detail_capex_4'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                                <?php   }  ?>

                                                                                                            <?php   }  ?>
                                                                                                        <?php    } ?>
                                                                                                    </td>
                                                                                                <?php   } ?>
                                                                                            <?php } else { ?>
                                                                                                <?php
                                                                                                    $nilai = 'nilai_capex_detail_4';
                                                                                                    $update_reusable = 'update_nilai_level_7_capex';
                                                                                                ?>
                                                                                                <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_4[$nilai], 2, ',', '.') ?>
                                                                                                </td>
                                                                                                <td class="tg-0lax">
                                                                                                    <?php if ($value_detail_capex_4[$nilai] == null || $value_detail_capex_4[$nilai] == 0) { ?>
                                                                                                        <?php if ($kondisi_capex_detail_5) { ?>

                                                                                                        <?php    } else { ?>

                                                                                                            <a onclick="modal_level_7_capex(<?= $value_detail_capex_4['id_detail_capex_4'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                                        <?php   }  ?>
                                                                                                    <?php } else { ?>
                                                                                                        <?php if ($kondisi_capex_detail_5) { ?>

                                                                                                        <?php    } else { ?>
                                                                                                            <a onclick="modal_level_7_capex(<?= $value_detail_capex_4['id_detail_capex_4'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                                        <?php   }  ?>
                                                                                                    <?php    } ?>
                                                                                                </td>
                                                                                            <?php  }  ?>

                                                                                        </tr>
                                                                                        <div class="modal fade" id="form_modal_level_7_capex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                            <div class="modal-dialog" role="document">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <h5 class="modal-title" id="title_modal_level_7_capex"></h5>
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                            <span aria-hidden="true">&times;</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <form action="javascript:;" method="post" id="form_simpan_level_7_capex">
                                                                                                            <input type="hidden" name="id_detail_capex_4">
                                                                                                            <input type="text" name="type_add">
                                                                                                            <input type="text" name="id_kontrak" value="<?= $row_kontrak['id_kontrak'] ?>">
                                                                                                            <div class="form-group" style="display: none;" id="form_tambah_level_7_capex">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-12">
                                                                                                                        <div class="form-group">
                                                                                                                            <label for="">Nama Uraian</label>
                                                                                                                            <input type="text" name="nama_uraian" class="form-control">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="form-group" style="display: none;" id="form_input_nilai_level_7_capex">
                                                                                                                <label for="">Pilih Mata Anggaran</label>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-6">
                                                                                                                        <div class="input-group-prepend">
                                                                                                                            <span class="">

                                                                                                                            </span>
                                                                                                                            <input type="hidden" class="form-control" name="nilai_capex_detail_4" id="nilai_capex_detail_4" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-6">
                                                                                                                        <input type="hidden" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="rupiah_nilai_capex_detail_4_level_7_capex">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                        <a href="javascript:;" style="display: none;" id="button_update_nilai_level_7_capex" class="btn btn-success button_simpan" onclick="Simpan_level_7_capex('update_nilai_level_7_capex')">Simpan</a>
                                                                                                        <a href="javascript:;" id="button_tambah_level_7_capex" class="btn btn-success button_simpan" onclick="Simpan_level_7_capex('tambah_level_7_capex')">Update</a>
                                                                                                        <a href="javascript:;" id="button_edit_level_7_capex" class="btn btn-success button_simpan" onclick="Simpan_level_7_capex('edit_level_7_capex')">Edit</a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <!-- level 8 -->
                                                                                        <?php
                                                                                                $this->db->select('*');
                                                                                                $this->db->from('tbl_detail_capex_5');
                                                                                                $this->db->where('tbl_detail_capex_5.id_detail_capex_4', $id_detail_capex_4);
                                                                                                $this->db->order_by('display_order', 'ASC');
                                                                                                $query_result_detail_capex_5 = $this->db->get() ?>
                                                                                        <?php
                                                                                                foreach ($query_result_detail_capex_5->result_array() as $value_detail_capex_5) { ?>
                                                                                            <?php $id_detail_capex_5 = $value_detail_capex_5['id_detail_capex_5'];  ?>
                                                                                            <?php
                                                                                                    $this->db->select('*');
                                                                                                    $this->db->from('tbl_detail_capex_6');
                                                                                                    $this->db->where('tbl_detail_capex_6.id_detail_capex_5', $id_detail_capex_5);
                                                                                                    $kondisi_capex_detail_6 = $this->db->get()->result_array() ?>

                                                                                            <tr>
                                                                                                <!-- kondisi_capex_detail_6 -->
                                                                                                <!-- detail_5 -->
                                                                                                <!-- capex_5 -->
                                                                                                <!-- level_8 -->
                                                                                                <td class="tg-0lax">
                                                                                                    <?= $value_detail_capex_5['no_urut_5_capex'] ?> </td>
                                                                                                </td>
                                                                                                <td class="tg-0lax">&nbsp;&nbsp;&nbsp;&nbsp; <?= $value_detail_capex_5['nama_uraian_5_capex'] ?></td>
                                                                                                <?php if ($adendum_result) { ?>
                                                                                                    <?php foreach ($adendum_result as $key => $value) { ?>
                                                                                                        <?php
                                                                                                            if ($value['no_adendum'] == 1) {
                                                                                                                $nilai = 'nilai_capex_detail_5_add_I';
                                                                                                                $cek_add = 1;
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_1';
                                                                                                            } else if ($value['no_adendum'] == 2) {
                                                                                                                $cek_add = 2;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_II';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_2';
                                                                                                            } else if ($value['no_adendum'] == 3) {
                                                                                                                $cek_add = 3;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_III';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_3';
                                                                                                            } else if ($value['no_adendum'] == 4) {
                                                                                                                $cek_add = 4;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_IV';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_4';
                                                                                                            } else if ($value['no_adendum'] == 5) {
                                                                                                                $cek_add = 5;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_V';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_5';
                                                                                                            } else if ($value['no_adendum'] == 6) {
                                                                                                                $cek_add = 6;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_VI';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_6';
                                                                                                            } else if ($value['no_adendum'] == 7) {
                                                                                                                $cek_add = 7;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_VII';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_7';
                                                                                                            } else if ($value['no_adendum'] == 8) {
                                                                                                                $cek_add = 8;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_VIII';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_8';
                                                                                                            } else if ($value['no_adendum'] == 9) {
                                                                                                                $cek_add = 9;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_IX';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_9';
                                                                                                            } else if ($value['no_adendum'] == 10) {
                                                                                                                $cek_add = 10;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_X';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_10';
                                                                                                            } else if ($value['no_adendum'] == 11) {
                                                                                                                $cek_add = 11;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XI';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_11';
                                                                                                            } else if ($value['no_adendum'] == 12) {
                                                                                                                $cek_add = 12;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XII';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_12';
                                                                                                            } else if ($value['no_adendum'] == 13) {
                                                                                                                $cek_add = 13;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XIII';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_13';
                                                                                                            } else if ($value['no_adendum'] == 14) {
                                                                                                                $cek_add = 14;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XIV';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_14';
                                                                                                            } else if ($value['no_adendum'] == 15) {
                                                                                                                $cek_add = 15;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XV';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_15';
                                                                                                            } else if ($value['no_adendum'] == 16) {
                                                                                                                $cek_add = 16;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XVI';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_16';
                                                                                                            } else if ($value['no_adendum'] == 17) {
                                                                                                                $cek_add = 17;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XVII';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_17';
                                                                                                            } else if ($value['no_adendum'] == 18) {
                                                                                                                $cek_add = 18;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XVIII';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_18';
                                                                                                            } else if ($value['no_adendum'] == 19) {
                                                                                                                $cek_add = 19;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XIX';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_19';
                                                                                                            } else if ($value['no_adendum'] == 20) {
                                                                                                                $cek_add = 20;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XX';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_20';
                                                                                                            } else if ($value['no_adendum'] == 21) {
                                                                                                                $cek_add = 21;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XXI';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_21';
                                                                                                            } else if ($value['no_adendum'] == 22) {
                                                                                                                $cek_add = 22;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XXII';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_22';
                                                                                                            } else if ($value['no_adendum'] == 23) {
                                                                                                                $cek_add = 23;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XXIII';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_23';
                                                                                                            } else if ($value['no_adendum'] == 24) {
                                                                                                                $cek_add = 23;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XXIV';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_24';
                                                                                                            } else if ($value['no_adendum'] == 25) {
                                                                                                                $cek_add = 25;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XXV';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_25';
                                                                                                            } else if ($value['no_adendum'] == 26) {
                                                                                                                $cek_add = 26;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XXVI';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_26';
                                                                                                            } else if ($value['no_adendum'] == 27) {
                                                                                                                $cek_add = 27;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XXVII';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_27';
                                                                                                            } else if ($value['no_adendum'] == 28) {
                                                                                                                $cek_add = 28;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XXVIII';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_28';
                                                                                                            } else if ($value['no_adendum'] == 29) {
                                                                                                                $cek_add = 29;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XXIX';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_29';
                                                                                                            } else if ($value['no_adendum'] == 30) {
                                                                                                                $cek_add = 30;
                                                                                                                $nilai = 'nilai_capex_detail_5_add_XXX';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex_add_30';
                                                                                                            } else {
                                                                                                                $cek_add = 3;
                                                                                                                $nilai = 'nilai_capex_detail_5';
                                                                                                                $update_reusable = 'update_nilai_level_8_capex';
                                                                                                            }
                                                                                                        ?>
                                                                                                        <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_5[$nilai], 2, ',', '.') ?>
                                                                                                        </td>
                                                                                                        <td class="tg-0lax">
                                                                                                            <?php $this->db->select('*');
                                                                                                            $this->db->from('tbl_list_mata_anggran');
                                                                                                            $this->db->where('tbl_list_mata_anggran.id_checking', $id_detail_capex_5);
                                                                                                            $this->db->where('tbl_list_mata_anggran.no_add', $cek_add);
                                                                                                            $checking_capex_detail_5 = $this->db->get()->result_array() ?>
                                                                                                            <?php if ($value_detail_capex_5[$nilai] == null || $value_detail_capex_5[$nilai] == 0) { ?>
                                                                                                                <?php if ($kondisi_capex_detail_6) { ?>

                                                                                                                <?php    } else { ?>

                                                                                                                    <?php if ($checking_capex_detail_5) { ?>
                                                                                                                        <a onclick="modal_level_8_capex(<?= $value_detail_capex_5['id_detail_capex_5'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                                    <?php    } else { ?>
                                                                                                                        <a onclick="modal_level_8_capex(<?= $value_detail_capex_5['id_detail_capex_5'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                                    <?php   }  ?>

                                                                                                                <?php   }  ?>
                                                                                                            <?php } else { ?>
                                                                                                                <?php if ($kondisi_capex_detail_6) { ?>

                                                                                                                <?php    } else { ?>
                                                                                                                    <?php if ($checking_capex_detail_5) { ?>
                                                                                                                        <a onclick="modal_level_8_capex(<?= $value_detail_capex_5['id_detail_capex_5'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                                    <?php    } else { ?>
                                                                                                                        <a onclick="modal_level_8_capex(<?= $value_detail_capex_5['id_detail_capex_5'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                                    <?php   }  ?>

                                                                                                                <?php   }  ?>
                                                                                                            <?php    } ?>
                                                                                                        </td>
                                                                                                    <?php   } ?>
                                                                                                <?php } else { ?>
                                                                                                    <?php
                                                                                                        $nilai = 'nilai_capex_detail_5';
                                                                                                        $update_reusable = 'update_nilai_level_8_capex';
                                                                                                    ?>
                                                                                                    <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_5[$nilai], 2, ',', '.') ?>
                                                                                                    </td>
                                                                                                    <td class="tg-0lax">
                                                                                                        <?php if ($value_detail_capex_5[$nilai] == null || $value_detail_capex_5[$nilai] == 0) { ?>
                                                                                                            <?php if ($kondisi_capex_detail_6) { ?>

                                                                                                            <?php    } else { ?>

                                                                                                                <a onclick="modal_level_8_capex(<?= $value_detail_capex_5['id_detail_capex_5'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                                            <?php   }  ?>
                                                                                                        <?php } else { ?>
                                                                                                            <?php if ($kondisi_capex_detail_6) { ?>

                                                                                                            <?php    } else { ?>
                                                                                                                <a onclick="modal_level_8_capex(<?= $value_detail_capex_5['id_detail_capex_5'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                                            <?php   }  ?>
                                                                                                        <?php    } ?>
                                                                                                    </td>
                                                                                                <?php  }  ?>

                                                                                            </tr>

                                                                                            <div class="modal fade" id="form_modal_level_8_capex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                                <div class="modal-dialog" role="document">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header">
                                                                                                            <h5 class="modal-title" id="title_modal_level_8_capex"></h5>
                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                            <form action="javascript:;" method="post" id="form_simpan_level_8_capex">
                                                                                                                <input type="hidden" name="id_detail_capex_5">
                                                                                                                <input type="text" name="type_add">
                                                                                                                <input type="text" name="id_kontrak" value="<?= $row_kontrak['id_kontrak'] ?>">
                                                                                                                <div class="form-group" style="display: none;" id="form_tambah_level_8_capex">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-md-12">
                                                                                                                            <div class="form-group">
                                                                                                                                <label for="">Nama Uraian</label>
                                                                                                                                <input type="text" name="nama_uraian" class="form-control">
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="form-group" style="display: none;" id="form_input_nilai_level_8_capex">
                                                                                                                    <label for="">Pilih Mata Anggaran</label>
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-6">
                                                                                                                            <div class="input-group-prepend">
                                                                                                                                <span class="">

                                                                                                                                </span>
                                                                                                                                <input type="hidden" class="form-control" name="nilai_capex_detail_5" id="nilai_capex_detail_5" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="col-6">
                                                                                                                            <input type="hidden" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="rupiah_nilai_capex_detail_5_level_8_capex">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </form>
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                            <a href="javascript:;" style="display: none;" id="button_update_nilai_level_8_capex" class="btn btn-success button_simpan" onclick="Simpan_level_8_capex('update_nilai_level_8_capex')">Simpan</a>
                                                                                                            <a href="javascript:;" id="button_tambah_level_8_capex" class="btn btn-success button_simpan" onclick="Simpan_level_8_capex('tambah_level_8_capex')">Update</a>
                                                                                                            <a href="javascript:;" id="button_edit_level_8_capex" class="btn btn-success button_simpan" onclick="Simpan_level_8_capex('edit_level_8_capex')">Edit</a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>


                                                                                            <!-- level 9 -->
                                                                                            <?php
                                                                                                    $this->db->select('*');
                                                                                                    $this->db->from('tbl_detail_capex_6');
                                                                                                    $this->db->where('tbl_detail_capex_6.id_detail_capex_5', $id_detail_capex_5);
                                                                                                    $this->db->order_by('display_order', 'ASC');
                                                                                                    $query_result_detail_capex_6 = $this->db->get() ?>
                                                                                            <?php
                                                                                                    foreach ($query_result_detail_capex_6->result_array() as $value_detail_capex_6) { ?>
                                                                                                <?php $id_detail_capex_6 = $value_detail_capex_6['id_detail_capex_6'];  ?>
                                                                                                <?php
                                                                                                        $this->db->select('*');
                                                                                                        $this->db->from('tbl_detail_capex_7');
                                                                                                        $this->db->where('tbl_detail_capex_7.id_detail_capex_6', $id_detail_capex_6);
                                                                                                        $kondisi_capex_detail_7 = $this->db->get()->result_array() ?>
                                                                                                <tr>
                                                                                                    <!-- kondisi_capex_detail_7 -->
                                                                                                    <!-- detail_6 -->
                                                                                                    <!-- capex_6 -->
                                                                                                    <!-- level_9 -->
                                                                                                    <td class="tg-0lax">
                                                                                                        <?= $value_detail_capex_6['no_urut_6_capex'] ?> </td>
                                                                                                    </td>
                                                                                                    <td class="tg-0lax">&nbsp;&nbsp;&nbsp;&nbsp; <?= $value_detail_capex_6['nama_uraian_6_capex'] ?></td>
                                                                                                    <?php if ($adendum_result) { ?>
                                                                                                        <?php foreach ($adendum_result as $key => $value) { ?>
                                                                                                            <?php
                                                                                                                if ($value['no_adendum'] == 1) {
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_I';
                                                                                                                    $cek_add = 1;
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_1';
                                                                                                                } else if ($value['no_adendum'] == 2) {
                                                                                                                    $cek_add = 2;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_II';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_2';
                                                                                                                } else if ($value['no_adendum'] == 3) {
                                                                                                                    $cek_add = 3;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_III';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_3';
                                                                                                                } else if ($value['no_adendum'] == 4) {
                                                                                                                    $cek_add = 4;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_IV';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_4';
                                                                                                                } else if ($value['no_adendum'] == 5) {
                                                                                                                    $cek_add = 5;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_V';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_5';
                                                                                                                } else if ($value['no_adendum'] == 6) {
                                                                                                                    $cek_add = 6;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_VI';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_6';
                                                                                                                } else if ($value['no_adendum'] == 7) {
                                                                                                                    $cek_add = 7;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_VII';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_7';
                                                                                                                } else if ($value['no_adendum'] == 8) {
                                                                                                                    $cek_add = 8;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_VIII';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_8';
                                                                                                                } else if ($value['no_adendum'] == 9) {
                                                                                                                    $cek_add = 9;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_IX';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_9';
                                                                                                                } else if ($value['no_adendum'] == 10) {
                                                                                                                    $cek_add = 10;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_X';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_10';
                                                                                                                } else if ($value['no_adendum'] == 11) {
                                                                                                                    $cek_add = 11;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XI';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_11';
                                                                                                                } else if ($value['no_adendum'] == 12) {
                                                                                                                    $cek_add = 12;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XII';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_12';
                                                                                                                } else if ($value['no_adendum'] == 13) {
                                                                                                                    $cek_add = 13;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XIII';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_13';
                                                                                                                } else if ($value['no_adendum'] == 14) {
                                                                                                                    $cek_add = 14;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XIV';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_14';
                                                                                                                } else if ($value['no_adendum'] == 15) {
                                                                                                                    $cek_add = 15;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XV';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_15';
                                                                                                                } else if ($value['no_adendum'] == 16) {
                                                                                                                    $cek_add = 16;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XVI';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_16';
                                                                                                                } else if ($value['no_adendum'] == 17) {
                                                                                                                    $cek_add = 17;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XVII';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_17';
                                                                                                                } else if ($value['no_adendum'] == 18) {
                                                                                                                    $cek_add = 18;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XVIII';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_18';
                                                                                                                } else if ($value['no_adendum'] == 19) {
                                                                                                                    $cek_add = 19;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XIX';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_19';
                                                                                                                } else if ($value['no_adendum'] == 20) {
                                                                                                                    $cek_add = 20;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XX';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_20';
                                                                                                                } else if ($value['no_adendum'] == 21) {
                                                                                                                    $cek_add = 21;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XXI';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_21';
                                                                                                                } else if ($value['no_adendum'] == 22) {
                                                                                                                    $cek_add = 22;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XXII';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_22';
                                                                                                                } else if ($value['no_adendum'] == 23) {
                                                                                                                    $cek_add = 23;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XXIII';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_23';
                                                                                                                } else if ($value['no_adendum'] == 24) {
                                                                                                                    $cek_add = 23;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XXIV';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_24';
                                                                                                                } else if ($value['no_adendum'] == 25) {
                                                                                                                    $cek_add = 25;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XXV';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_25';
                                                                                                                } else if ($value['no_adendum'] == 26) {
                                                                                                                    $cek_add = 26;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XXVI';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_26';
                                                                                                                } else if ($value['no_adendum'] == 27) {
                                                                                                                    $cek_add = 27;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XXVII';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_27';
                                                                                                                } else if ($value['no_adendum'] == 28) {
                                                                                                                    $cek_add = 28;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XXVIII';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_28';
                                                                                                                } else if ($value['no_adendum'] == 29) {
                                                                                                                    $cek_add = 29;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XXIX';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_29';
                                                                                                                } else if ($value['no_adendum'] == 30) {
                                                                                                                    $cek_add = 30;
                                                                                                                    $nilai = 'nilai_capex_detail_6_add_XXX';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex_add_30';
                                                                                                                } else {
                                                                                                                    $cek_add = 3;
                                                                                                                    $nilai = 'nilai_capex_detail_6';
                                                                                                                    $update_reusable = 'update_nilai_level_9_capex';
                                                                                                                }
                                                                                                            ?>
                                                                                                            <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_6[$nilai], 2, ',', '.') ?>
                                                                                                            </td>
                                                                                                            <td class="tg-0lax">
                                                                                                                <?php $this->db->select('*');
                                                                                                                $this->db->from('tbl_list_mata_anggran');
                                                                                                                $this->db->where('tbl_list_mata_anggran.id_checking', $id_detail_capex_6);
                                                                                                                $this->db->where('tbl_list_mata_anggran.no_add', $cek_add);
                                                                                                                $checking_capex_detail_6 = $this->db->get()->result_array() ?>
                                                                                                                <?php if ($value_detail_capex_6[$nilai] == null || $value_detail_capex_6[$nilai] == 0) { ?>
                                                                                                                    <?php if ($kondisi_capex_detail_7) { ?>

                                                                                                                    <?php    } else { ?>

                                                                                                                        <?php if ($checking_capex_detail_6) { ?>
                                                                                                                            <a onclick="modal_level_9_capex(<?= $value_detail_capex_6['id_detail_capex_6'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                                        <?php    } else { ?>
                                                                                                                            <a onclick="modal_level_9_capex(<?= $value_detail_capex_6['id_detail_capex_6'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                                        <?php   }  ?>

                                                                                                                    <?php   }  ?>
                                                                                                                <?php } else { ?>
                                                                                                                    <?php if ($kondisi_capex_detail_7) { ?>

                                                                                                                    <?php    } else { ?>
                                                                                                                        <?php if ($checking_capex_detail_6) { ?>
                                                                                                                            <a onclick="modal_level_9_capex(<?= $value_detail_capex_6['id_detail_capex_6'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                                        <?php    } else { ?>
                                                                                                                            <a onclick="modal_level_9_capex(<?= $value_detail_capex_6['id_detail_capex_6'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                                        <?php   }  ?>

                                                                                                                    <?php   }  ?>
                                                                                                                <?php    } ?>
                                                                                                            </td>
                                                                                                        <?php   } ?>
                                                                                                    <?php } else { ?>
                                                                                                        <?php
                                                                                                            $nilai = 'nilai_capex_detail_6';
                                                                                                            $update_reusable = 'update_nilai_level_9_capex';
                                                                                                        ?>
                                                                                                        <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_6[$nilai], 2, ',', '.') ?>
                                                                                                        </td>
                                                                                                        <td class="tg-0lax">
                                                                                                            <?php if ($value_detail_capex_6[$nilai] == null || $value_detail_capex_6[$nilai] == 0) { ?>
                                                                                                                <?php if ($kondisi_capex_detail_7) { ?>

                                                                                                                <?php    } else { ?>

                                                                                                                    <a onclick="modal_level_9_capex(<?= $value_detail_capex_6['id_detail_capex_6'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                                                <?php   }  ?>
                                                                                                            <?php } else { ?>
                                                                                                                <?php if ($kondisi_capex_detail_7) { ?>

                                                                                                                <?php    } else { ?>
                                                                                                                    <a onclick="modal_level_9_capex(<?= $value_detail_capex_6['id_detail_capex_6'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                                                <?php   }  ?>
                                                                                                            <?php    } ?>
                                                                                                        </td>
                                                                                                    <?php  }  ?>

                                                                                                </tr>

                                                                                                <div class="modal fade" id="form_modal_level_9_capex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                                    <div class="modal-dialog" role="document">
                                                                                                        <div class="modal-content">
                                                                                                            <div class="modal-header">
                                                                                                                <h5 class="modal-title" id="title_modal_level_9_capex"></h5>
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                            <div class="modal-body">
                                                                                                                <form action="javascript:;" method="post" id="form_simpan_level_9_capex">
                                                                                                                    <input type="hidden" name="id_detail_capex_6">
                                                                                                                    <input type="text" name="type_add">
                                                                                                                    <input type="text" name="id_kontrak" value="<?= $row_kontrak['id_kontrak'] ?>">
                                                                                                                    <div class="form-group" style="display: none;" id="form_tambah_level_9_capex">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-12">
                                                                                                                                <div class="form-group">
                                                                                                                                    <label for="">Nama Uraian</label>
                                                                                                                                    <input type="text" name="nama_uraian" class="form-control">
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <div class="form-group" style="display: none;" id="form_input_nilai_level_9_capex">
                                                                                                                        <label for="">Nilai</label>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-6">
                                                                                                                                <div class="input-group-prepend">
                                                                                                                                    <span class="">

                                                                                                                                    </span>
                                                                                                                                    <input type="hidden" class="form-control" name="nilai_capex_detail_6" id="nilai_capex_detail_6" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-6">
                                                                                                                                <input type="hidden" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="rupiah_nilai_capex_detail_6_level_9_capex">
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </form>
                                                                                                            </div>
                                                                                                            <div class="modal-footer">
                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                <a href="javascript:;" style="display: none;" id="button_update_nilai_level_9_capex" class="btn btn-success button_simpan" onclick="Simpan_level_9_capex('update_nilai_level_9_capex')">Simpan</a>
                                                                                                                <a href="javascript:;" id="button_tambah_level_9_capex" class="btn btn-success button_simpan" onclick="Simpan_level_9_capex('tambah_level_9_capex')">Update</a>
                                                                                                                <a href="javascript:;" id="button_edit_level_9_capex" class="btn btn-success button_simpan" onclick="Simpan_level_9_capex('edit_level_9_capex')">Edit</a>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- level 10 -->
                                                                                                <?php
                                                                                                        $this->db->select('*');
                                                                                                        $this->db->from('tbl_detail_capex_7');
                                                                                                        $this->db->where('tbl_detail_capex_7.id_detail_capex_6', $id_detail_capex_6);
                                                                                                        $this->db->order_by('display_order', 'ASC');
                                                                                                        $query_result_detail_capex_7 = $this->db->get() ?>
                                                                                                <?php
                                                                                                        foreach ($query_result_detail_capex_7->result_array() as $value_detail_capex_7) { ?>
                                                                                                    <?php $id_detail_capex_7 = $value_detail_capex_7['id_detail_capex_7'];  ?>
                                                                                                    <?php
                                                                                                            $this->db->select('*');
                                                                                                            $this->db->from('tbl_detail_capex_8');
                                                                                                            $this->db->where('tbl_detail_capex_8.id_detail_capex_7', $id_detail_capex_7);
                                                                                                            $kondisi_capex_detail_8 = $this->db->get()->result_array() ?>
                                                                                                    <tr>
                                                                                                        <!-- kondisi_capex_detail_8 -->
                                                                                                        <!-- detail_7 -->
                                                                                                        <!-- capex_7 -->
                                                                                                        <!-- level_10 -->
                                                                                                        <td class="tg-0lax">
                                                                                                            <?= $value_detail_capex_7['no_urut_7_capex'] ?> </td>
                                                                                                        </td>
                                                                                                        <td class="tg-0lax">&nbsp;&nbsp;&nbsp;&nbsp; <?= $value_detail_capex_7['nama_uraian_7_capex'] ?></td>
                                                                                                        <?php if ($adendum_result) { ?>
                                                                                                            <?php foreach ($adendum_result as $key => $value) { ?>
                                                                                                                <?php
                                                                                                                    if ($value['no_adendum'] == 1) {
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_I';
                                                                                                                        $cek_add = 1;
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_1';
                                                                                                                    } else if ($value['no_adendum'] == 2) {
                                                                                                                        $cek_add = 2;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_II';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_2';
                                                                                                                    } else if ($value['no_adendum'] == 3) {
                                                                                                                        $cek_add = 3;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_III';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_3';
                                                                                                                    } else if ($value['no_adendum'] == 4) {
                                                                                                                        $cek_add = 4;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_IV';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_4';
                                                                                                                    } else if ($value['no_adendum'] == 5) {
                                                                                                                        $cek_add = 5;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_V';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_5';
                                                                                                                    } else if ($value['no_adendum'] == 6) {
                                                                                                                        $cek_add = 6;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_VI';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_6';
                                                                                                                    } else if ($value['no_adendum'] == 7) {
                                                                                                                        $cek_add = 7;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_VII';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_7';
                                                                                                                    } else if ($value['no_adendum'] == 8) {
                                                                                                                        $cek_add = 8;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_VIII';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_8';
                                                                                                                    } else if ($value['no_adendum'] == 9) {
                                                                                                                        $cek_add = 9;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_IX';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_9';
                                                                                                                    } else if ($value['no_adendum'] == 10) {
                                                                                                                        $cek_add = 10;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_X';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_10';
                                                                                                                    } else if ($value['no_adendum'] == 11) {
                                                                                                                        $cek_add = 11;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XI';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_11';
                                                                                                                    } else if ($value['no_adendum'] == 12) {
                                                                                                                        $cek_add = 12;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XII';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_12';
                                                                                                                    } else if ($value['no_adendum'] == 13) {
                                                                                                                        $cek_add = 13;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XIII';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_13';
                                                                                                                    } else if ($value['no_adendum'] == 14) {
                                                                                                                        $cek_add = 14;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XIV';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_14';
                                                                                                                    } else if ($value['no_adendum'] == 15) {
                                                                                                                        $cek_add = 15;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XV';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_15';
                                                                                                                    } else if ($value['no_adendum'] == 16) {
                                                                                                                        $cek_add = 16;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XVI';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_16';
                                                                                                                    } else if ($value['no_adendum'] == 17) {
                                                                                                                        $cek_add = 17;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XVII';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_17';
                                                                                                                    } else if ($value['no_adendum'] == 18) {
                                                                                                                        $cek_add = 18;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XVIII';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_18';
                                                                                                                    } else if ($value['no_adendum'] == 19) {
                                                                                                                        $cek_add = 19;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XIX';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_19';
                                                                                                                    } else if ($value['no_adendum'] == 20) {
                                                                                                                        $cek_add = 20;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XX';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_20';
                                                                                                                    } else if ($value['no_adendum'] == 21) {
                                                                                                                        $cek_add = 21;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XXI';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_21';
                                                                                                                    } else if ($value['no_adendum'] == 22) {
                                                                                                                        $cek_add = 22;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XXII';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_22';
                                                                                                                    } else if ($value['no_adendum'] == 23) {
                                                                                                                        $cek_add = 23;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XXIII';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_23';
                                                                                                                    } else if ($value['no_adendum'] == 24) {
                                                                                                                        $cek_add = 23;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XXIV';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_24';
                                                                                                                    } else if ($value['no_adendum'] == 25) {
                                                                                                                        $cek_add = 25;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XXV';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_25';
                                                                                                                    } else if ($value['no_adendum'] == 26) {
                                                                                                                        $cek_add = 26;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XXVI';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_26';
                                                                                                                    } else if ($value['no_adendum'] == 27) {
                                                                                                                        $cek_add = 27;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XXVII';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_27';
                                                                                                                    } else if ($value['no_adendum'] == 28) {
                                                                                                                        $cek_add = 28;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XXVIII';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_28';
                                                                                                                    } else if ($value['no_adendum'] == 29) {
                                                                                                                        $cek_add = 29;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XXIX';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_29';
                                                                                                                    } else if ($value['no_adendum'] == 30) {
                                                                                                                        $cek_add = 30;
                                                                                                                        $nilai = 'nilai_capex_detail_7_add_XXX';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex_add_30';
                                                                                                                    } else {
                                                                                                                        $cek_add = 3;
                                                                                                                        $nilai = 'nilai_capex_detail_7';
                                                                                                                        $update_reusable = 'update_nilai_level_10_capex';
                                                                                                                    }
                                                                                                                ?>
                                                                                                                <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_7[$nilai], 2, ',', '.') ?>
                                                                                                                </td>
                                                                                                                <td class="tg-0lax">
                                                                                                                    <?php $this->db->select('*');
                                                                                                                    $this->db->from('tbl_list_mata_anggran');
                                                                                                                    $this->db->where('tbl_list_mata_anggran.id_checking', $id_detail_capex_7);
                                                                                                                    $this->db->where('tbl_list_mata_anggran.no_add', $cek_add);
                                                                                                                    $checking_capex_detail_7 = $this->db->get()->result_array() ?>
                                                                                                                    <?php if ($value_detail_capex_7[$nilai] == null || $value_detail_capex_7[$nilai] == 0) { ?>
                                                                                                                        <?php if ($kondisi_capex_detail_8) { ?>

                                                                                                                        <?php    } else { ?>

                                                                                                                            <?php if ($checking_capex_detail_7) { ?>
                                                                                                                                <a onclick="modal_level_10_capex(<?= $value_detail_capex_7['id_detail_capex_7'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                                            <?php    } else { ?>
                                                                                                                                <a onclick="modal_level_10_capex(<?= $value_detail_capex_7['id_detail_capex_7'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                                            <?php   }  ?>

                                                                                                                        <?php   }  ?>
                                                                                                                    <?php } else { ?>
                                                                                                                        <?php if ($kondisi_capex_detail_8) { ?>

                                                                                                                        <?php    } else { ?>
                                                                                                                            <?php if ($checking_capex_detail_7) { ?>
                                                                                                                                <a onclick="modal_level_10_capex(<?= $value_detail_capex_7['id_detail_capex_7'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                                            <?php    } else { ?>
                                                                                                                                <a onclick="modal_level_10_capex(<?= $value_detail_capex_7['id_detail_capex_7'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                                            <?php   }  ?>

                                                                                                                        <?php   }  ?>
                                                                                                                    <?php    } ?>
                                                                                                                </td>
                                                                                                            <?php   } ?>
                                                                                                        <?php } else { ?>
                                                                                                            <?php
                                                                                                                $nilai = 'nilai_capex_detail_7';
                                                                                                                $update_reusable = 'update_nilai_level_10_capex';
                                                                                                            ?>
                                                                                                            <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_7[$nilai], 2, ',', '.') ?>
                                                                                                            </td>
                                                                                                            <td class="tg-0lax">
                                                                                                                <?php if ($value_detail_capex_7[$nilai] == null || $value_detail_capex_7[$nilai] == 0) { ?>
                                                                                                                    <?php if ($kondisi_capex_detail_8) { ?>

                                                                                                                    <?php    } else { ?>

                                                                                                                        <a onclick="modal_level_10_capex(<?= $value_detail_capex_7['id_detail_capex_7'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                                                    <?php   }  ?>
                                                                                                                <?php } else { ?>
                                                                                                                    <?php if ($kondisi_capex_detail_8) { ?>

                                                                                                                    <?php    } else { ?>
                                                                                                                        <a onclick="modal_level_10_capex(<?= $value_detail_capex_7['id_detail_capex_7'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                                                    <?php   }  ?>
                                                                                                                <?php    } ?>
                                                                                                            </td>
                                                                                                        <?php  }  ?>

                                                                                                    </tr>

                                                                                                    <div class="modal fade" id="form_modal_level_10_capex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                                        <div class="modal-dialog" role="document">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    <h5 class="modal-title" id="title_modal_level_10_capex"></h5>
                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <div class="modal-body">
                                                                                                                    <form action="javascript:;" method="post" id="form_simpan_level_10_capex">
                                                                                                                        <input type="hidden" name="id_detail_capex_7">
                                                                                                                        <input type="text" name="type_add">
                                                                                                                        <input type="text" name="id_kontrak" value="<?= $row_kontrak['id_kontrak'] ?>">
                                                                                                                        <div class="form-group" style="display: none;" id="form_tambah_level_10_capex">
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <label for="">Nama Uraian</label>
                                                                                                                                        <input type="text" name="nama_uraian" class="form-control">
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>

                                                                                                                        <div class="form-group" style="display: none;" id="form_input_nilai_level_10_capex">
                                                                                                                            <label for="">Pilih Mata Anggaran</label>
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-6">
                                                                                                                                    <div class="input-group-prepend">
                                                                                                                                        <span class="">

                                                                                                                                        </span>
                                                                                                                                        <input type="hidden" class="form-control" name="nilai_capex_detail_7" id="nilai_capex_detail_7" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-6">
                                                                                                                                    <input type="hidden" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="rupiah_nilai_capex_detail_7_level_10_capex">
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                </div>
                                                                                                                <div class="modal-footer">
                                                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                    <a href="javascript:;" style="display: none;" id="button_update_nilai_level_10_capex" class="btn btn-success button_simpan" onclick="Simpan_level_10_capex('update_nilai_level_10_capex')">Simpan</a>
                                                                                                                    <a href="javascript:;" id="button_tambah_level_10_capex" class="btn btn-success button_simpan" onclick="Simpan_level_10_capex('tambah_level_10_capex')">Update</a>
                                                                                                                    <a href="javascript:;" id="button_edit_level_10_capex" class="btn btn-success button_simpan" onclick="Simpan_level_10_capex('edit_level_10_capex')">Edit</a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <!-- level 11 -->
                                                                                                    <?php
                                                                                                            $this->db->select('*');
                                                                                                            $this->db->from('tbl_detail_capex_8');
                                                                                                            $this->db->where('tbl_detail_capex_8.id_detail_capex_7', $id_detail_capex_7);
                                                                                                            $this->db->order_by('display_order', 'ASC');
                                                                                                            $query_result_detail_capex_8 = $this->db->get() ?>
                                                                                                    <?php
                                                                                                            foreach ($query_result_detail_capex_8->result_array() as $value_detail_capex_8) { ?>
                                                                                                        <?php $id_detail_capex_8 = $value_detail_capex_8['id_detail_capex_8'];  ?>
                                                                                                        <?php
                                                                                                                $this->db->select('*');
                                                                                                                $this->db->from('tbl_detail_capex_9');
                                                                                                                $this->db->where('tbl_detail_capex_9.id_detail_capex_8', $id_detail_capex_8);
                                                                                                                $kondisi_capex_detail_9 = $this->db->get()->result_array() ?>
                                                                                                        <tr>
                                                                                                            <!-- kondisi_capex_detail_9 -->
                                                                                                            <!-- detail_8 -->
                                                                                                            <!-- capex_8 -->
                                                                                                            <!-- level_11 -->
                                                                                                            <td class="tg-0lax">
                                                                                                                <?= $value_detail_capex_8['no_urut_8_capex'] ?> </td>
                                                                                                            </td>
                                                                                                            <td class="tg-0lax">&nbsp;&nbsp;&nbsp;&nbsp; <?= $value_detail_capex_8['nama_uraian_8_capex'] ?></td>
                                                                                                            <?php if ($adendum_result) { ?>
                                                                                                                <?php foreach ($adendum_result as $key => $value) { ?>
                                                                                                                    <?php
                                                                                                                        if ($value['no_adendum'] == 1) {
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_I';
                                                                                                                            $cek_add = 1;
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_1';
                                                                                                                        } else if ($value['no_adendum'] == 2) {
                                                                                                                            $cek_add = 2;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_II';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_2';
                                                                                                                        } else if ($value['no_adendum'] == 3) {
                                                                                                                            $cek_add = 3;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_III';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_3';
                                                                                                                        } else if ($value['no_adendum'] == 4) {
                                                                                                                            $cek_add = 4;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_IV';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_4';
                                                                                                                        } else if ($value['no_adendum'] == 5) {
                                                                                                                            $cek_add = 5;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_V';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_5';
                                                                                                                        } else if ($value['no_adendum'] == 6) {
                                                                                                                            $cek_add = 6;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_VI';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_6';
                                                                                                                        } else if ($value['no_adendum'] == 7) {
                                                                                                                            $cek_add = 7;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_VII';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_7';
                                                                                                                        } else if ($value['no_adendum'] == 8) {
                                                                                                                            $cek_add = 8;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_VIII';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_8';
                                                                                                                        } else if ($value['no_adendum'] == 9) {
                                                                                                                            $cek_add = 9;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_IX';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_9';
                                                                                                                        } else if ($value['no_adendum'] == 10) {
                                                                                                                            $cek_add = 10;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_X';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_10';
                                                                                                                        } else if ($value['no_adendum'] == 11) {
                                                                                                                            $cek_add = 11;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XI';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_11';
                                                                                                                        } else if ($value['no_adendum'] == 12) {
                                                                                                                            $cek_add = 12;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XII';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_12';
                                                                                                                        } else if ($value['no_adendum'] == 13) {
                                                                                                                            $cek_add = 13;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XIII';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_13';
                                                                                                                        } else if ($value['no_adendum'] == 14) {
                                                                                                                            $cek_add = 14;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XIV';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_14';
                                                                                                                        } else if ($value['no_adendum'] == 15) {
                                                                                                                            $cek_add = 15;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XV';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_15';
                                                                                                                        } else if ($value['no_adendum'] == 16) {
                                                                                                                            $cek_add = 16;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XVI';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_16';
                                                                                                                        } else if ($value['no_adendum'] == 17) {
                                                                                                                            $cek_add = 17;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XVII';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_17';
                                                                                                                        } else if ($value['no_adendum'] == 18) {
                                                                                                                            $cek_add = 18;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XVIII';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_18';
                                                                                                                        } else if ($value['no_adendum'] == 19) {
                                                                                                                            $cek_add = 19;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XIX';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_19';
                                                                                                                        } else if ($value['no_adendum'] == 20) {
                                                                                                                            $cek_add = 20;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XX';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_20';
                                                                                                                        } else if ($value['no_adendum'] == 21) {
                                                                                                                            $cek_add = 21;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XXI';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_21';
                                                                                                                        } else if ($value['no_adendum'] == 22) {
                                                                                                                            $cek_add = 22;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XXII';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_22';
                                                                                                                        } else if ($value['no_adendum'] == 23) {
                                                                                                                            $cek_add = 23;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XXIII';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_23';
                                                                                                                        } else if ($value['no_adendum'] == 24) {
                                                                                                                            $cek_add = 23;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XXIV';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_24';
                                                                                                                        } else if ($value['no_adendum'] == 25) {
                                                                                                                            $cek_add = 25;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XXV';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_25';
                                                                                                                        } else if ($value['no_adendum'] == 26) {
                                                                                                                            $cek_add = 26;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XXVI';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_26';
                                                                                                                        } else if ($value['no_adendum'] == 27) {
                                                                                                                            $cek_add = 27;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XXVII';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_27';
                                                                                                                        } else if ($value['no_adendum'] == 28) {
                                                                                                                            $cek_add = 28;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XXVIII';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_28';
                                                                                                                        } else if ($value['no_adendum'] == 29) {
                                                                                                                            $cek_add = 29;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XXIX';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_29';
                                                                                                                        } else if ($value['no_adendum'] == 30) {
                                                                                                                            $cek_add = 30;
                                                                                                                            $nilai = 'nilai_capex_detail_8_add_XXX';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex_add_30';
                                                                                                                        } else {
                                                                                                                            $cek_add = 3;
                                                                                                                            $nilai = 'nilai_capex_detail_8';
                                                                                                                            $update_reusable = 'update_nilai_level_11_capex';
                                                                                                                        }
                                                                                                                    ?>
                                                                                                                    <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_8[$nilai], 2, ',', '.') ?>
                                                                                                                    </td>
                                                                                                                    <td class="tg-0lax">
                                                                                                                        <?php $this->db->select('*');
                                                                                                                        $this->db->from('tbl_list_mata_anggran');
                                                                                                                        $this->db->where('tbl_list_mata_anggran.id_checking', $id_detail_capex_8);
                                                                                                                        $this->db->where('tbl_list_mata_anggran.no_add', $cek_add);
                                                                                                                        $checking_capex_detail_8 = $this->db->get()->result_array() ?>
                                                                                                                        <?php if ($value_detail_capex_8[$nilai] == null || $value_detail_capex_8[$nilai] == 0) { ?>
                                                                                                                            <?php if ($kondisi_capex_detail_9) { ?>

                                                                                                                            <?php    } else { ?>

                                                                                                                                <?php if ($checking_capex_detail_8) { ?>
                                                                                                                                    <a onclick="modal_level_11_capex(<?= $value_detail_capex_8['id_detail_capex_8'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                                                <?php    } else { ?>
                                                                                                                                    <a onclick="modal_level_11_capex(<?= $value_detail_capex_8['id_detail_capex_8'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                                                <?php   }  ?>

                                                                                                                            <?php   }  ?>
                                                                                                                        <?php } else { ?>
                                                                                                                            <?php if ($kondisi_capex_detail_9) { ?>

                                                                                                                            <?php    } else { ?>
                                                                                                                                <?php if ($checking_capex_detail_8) { ?>
                                                                                                                                    <a onclick="modal_level_11_capex(<?= $value_detail_capex_8['id_detail_capex_8'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                                                <?php    } else { ?>
                                                                                                                                    <a onclick="modal_level_11_capex(<?= $value_detail_capex_8['id_detail_capex_8'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                                                <?php   }  ?>

                                                                                                                            <?php   }  ?>
                                                                                                                        <?php    } ?>
                                                                                                                    </td>
                                                                                                                <?php   } ?>
                                                                                                            <?php } else { ?>
                                                                                                                <?php
                                                                                                                    $nilai = 'nilai_capex_detail_8';
                                                                                                                    $update_reusable = 'update_nilai_level_11_capex';
                                                                                                                ?>
                                                                                                                <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_8[$nilai], 2, ',', '.') ?>
                                                                                                                </td>
                                                                                                                <td class="tg-0lax">
                                                                                                                    <?php if ($value_detail_capex_8[$nilai] == null || $value_detail_capex_8[$nilai] == 0) { ?>
                                                                                                                        <?php if ($kondisi_capex_detail_9) { ?>

                                                                                                                        <?php    } else { ?>

                                                                                                                            <a onclick="modal_level_11_capex(<?= $value_detail_capex_8['id_detail_capex_8'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                                                        <?php   }  ?>
                                                                                                                    <?php } else { ?>
                                                                                                                        <?php if ($kondisi_capex_detail_9) { ?>

                                                                                                                        <?php    } else { ?>
                                                                                                                            <a onclick="modal_level_11_capex(<?= $value_detail_capex_8['id_detail_capex_8'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                                                        <?php   }  ?>
                                                                                                                    <?php    } ?>
                                                                                                                </td>
                                                                                                            <?php  }  ?>

                                                                                                        </tr>

                                                                                                        <div class="modal fade" id="form_modal_level_11_capex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                                            <div class="modal-dialog" role="document">
                                                                                                                <div class="modal-content">
                                                                                                                    <div class="modal-header">
                                                                                                                        <h5 class="modal-title" id="title_modal_level_11_capex"></h5>
                                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                            <span aria-hidden="true">&times;</span>
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    <div class="modal-body">
                                                                                                                        <form action="javascript:;" method="post" id="form_simpan_level_11_capex">
                                                                                                                            <input type="hidden" name="id_detail_capex_8">
                                                                                                                            <input type="text" name="type_add">
                                                                                                                            <input type="text" name="id_kontrak" value="<?= $row_kontrak['id_kontrak'] ?>">
                                                                                                                            <div class="form-group" style="display: none;" id="form_tambah_level_11_capex">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-md-12">
                                                                                                                                        <div class="form-group">
                                                                                                                                            <label for="">Nama Uraian</label>
                                                                                                                                            <input type="text" name="nama_uraian" class="form-control">
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>

                                                                                                                            <div class="form-group" style="display: none;" id="form_input_nilai_level_11_capex">
                                                                                                                                <label for="">Pilih Mata Anggaran</label>
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-6">
                                                                                                                                        <div class="input-group-prepend">
                                                                                                                                            <span class="">

                                                                                                                                            </span>
                                                                                                                                            <input type="hidden" class="form-control" name="nilai_capex_detail_8" id="nilai_capex_detail_8" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-6">
                                                                                                                                        <input type="hidden" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="rupiah_nilai_capex_detail_8_level_11_capex">
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </form>
                                                                                                                    </div>
                                                                                                                    <div class="modal-footer">
                                                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                        <a href="javascript:;" style="display: none;" id="button_update_nilai_level_11_capex" class="btn btn-success button_simpan" onclick="Simpan_level_11_capex('update_nilai_level_11_capex')">Simpan</a>
                                                                                                                        <a href="javascript:;" id="button_tambah_level_11_capex" class="btn btn-success button_simpan" onclick="Simpan_level_11_capex('tambah_level_11_capex')">Update</a>
                                                                                                                        <a href="javascript:;" id="button_edit_level_11_capex" class="btn btn-success button_simpan" onclick="Simpan_level_11_capex('edit_level_11_capex')">Edit</a>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <!-- level 12 -->
                                                                                                        <?php
                                                                                                                $this->db->select('*');
                                                                                                                $this->db->from('tbl_detail_capex_9');
                                                                                                                $this->db->where('tbl_detail_capex_9.id_detail_capex_8', $id_detail_capex_8);
                                                                                                                $this->db->order_by('display_order', 'ASC');
                                                                                                                $query_result_detail_capex_9 = $this->db->get() ?>
                                                                                                        <?php
                                                                                                                foreach ($query_result_detail_capex_9->result_array() as $value_detail_capex_9) { ?>
                                                                                                            <?php $id_detail_capex_9 = $value_detail_capex_9['id_detail_capex_9'];  ?>
                                                                                                            <?php
                                                                                                                    $this->db->select('*');
                                                                                                                    $this->db->from('tbl_detail_capex_10');
                                                                                                                    $this->db->where('tbl_detail_capex_10.id_detail_capex_9', $id_detail_capex_9);
                                                                                                                    $kondisi_capex_detail_9 = $this->db->get()->result_array() ?>
                                                                                                            <tr>
                                                                                                                <!-- kondisi_capex_detail_9 -->
                                                                                                                <!-- detail_8 -->
                                                                                                                <!-- capex_8 -->
                                                                                                                <!-- level_11 -->
                                                                                                                <td class="tg-0lax">
                                                                                                                    <?= $value_detail_capex_8['no_urut_8_capex'] ?> </td>
                                                                                                                </td>
                                                                                                                <td class="tg-0lax">&nbsp;&nbsp;&nbsp;&nbsp; <?= $value_detail_capex_8['nama_uraian_8_capex'] ?></td>
                                                                                                                <?php if ($adendum_result) { ?>
                                                                                                                    <?php foreach ($adendum_result as $key => $value) { ?>
                                                                                                                        <?php
                                                                                                                            if ($value['no_adendum'] == 1) {
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_I';
                                                                                                                                $cek_add = 1;
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_1';
                                                                                                                            } else if ($value['no_adendum'] == 2) {
                                                                                                                                $cek_add = 2;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_II';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_2';
                                                                                                                            } else if ($value['no_adendum'] == 3) {
                                                                                                                                $cek_add = 3;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_III';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_3';
                                                                                                                            } else if ($value['no_adendum'] == 4) {
                                                                                                                                $cek_add = 4;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_IV';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_4';
                                                                                                                            } else if ($value['no_adendum'] == 5) {
                                                                                                                                $cek_add = 5;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_V';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_5';
                                                                                                                            } else if ($value['no_adendum'] == 6) {
                                                                                                                                $cek_add = 6;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_VI';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_6';
                                                                                                                            } else if ($value['no_adendum'] == 7) {
                                                                                                                                $cek_add = 7;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_VII';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_7';
                                                                                                                            } else if ($value['no_adendum'] == 8) {
                                                                                                                                $cek_add = 8;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_VIII';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_8';
                                                                                                                            } else if ($value['no_adendum'] == 9) {
                                                                                                                                $cek_add = 9;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_IX';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_9';
                                                                                                                            } else if ($value['no_adendum'] == 10) {
                                                                                                                                $cek_add = 10;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_X';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_10';
                                                                                                                            } else if ($value['no_adendum'] == 11) {
                                                                                                                                $cek_add = 11;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XI';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_11';
                                                                                                                            } else if ($value['no_adendum'] == 12) {
                                                                                                                                $cek_add = 12;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XII';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_12';
                                                                                                                            } else if ($value['no_adendum'] == 13) {
                                                                                                                                $cek_add = 13;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XIII';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_13';
                                                                                                                            } else if ($value['no_adendum'] == 14) {
                                                                                                                                $cek_add = 14;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XIV';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_14';
                                                                                                                            } else if ($value['no_adendum'] == 15) {
                                                                                                                                $cek_add = 15;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XV';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_15';
                                                                                                                            } else if ($value['no_adendum'] == 16) {
                                                                                                                                $cek_add = 16;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XVI';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_16';
                                                                                                                            } else if ($value['no_adendum'] == 17) {
                                                                                                                                $cek_add = 17;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XVII';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_17';
                                                                                                                            } else if ($value['no_adendum'] == 18) {
                                                                                                                                $cek_add = 18;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XVIII';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_18';
                                                                                                                            } else if ($value['no_adendum'] == 19) {
                                                                                                                                $cek_add = 19;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XIX';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_19';
                                                                                                                            } else if ($value['no_adendum'] == 20) {
                                                                                                                                $cek_add = 20;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XX';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_20';
                                                                                                                            } else if ($value['no_adendum'] == 21) {
                                                                                                                                $cek_add = 21;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XXI';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_21';
                                                                                                                            } else if ($value['no_adendum'] == 22) {
                                                                                                                                $cek_add = 22;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XXII';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_22';
                                                                                                                            } else if ($value['no_adendum'] == 23) {
                                                                                                                                $cek_add = 23;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XXIII';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_23';
                                                                                                                            } else if ($value['no_adendum'] == 24) {
                                                                                                                                $cek_add = 23;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XXIV';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_24';
                                                                                                                            } else if ($value['no_adendum'] == 25) {
                                                                                                                                $cek_add = 25;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XXV';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_25';
                                                                                                                            } else if ($value['no_adendum'] == 26) {
                                                                                                                                $cek_add = 26;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XXVI';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_26';
                                                                                                                            } else if ($value['no_adendum'] == 27) {
                                                                                                                                $cek_add = 27;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XXVII';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_27';
                                                                                                                            } else if ($value['no_adendum'] == 28) {
                                                                                                                                $cek_add = 28;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XXVIII';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_28';
                                                                                                                            } else if ($value['no_adendum'] == 29) {
                                                                                                                                $cek_add = 29;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XXIX';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_29';
                                                                                                                            } else if ($value['no_adendum'] == 30) {
                                                                                                                                $cek_add = 30;
                                                                                                                                $nilai = 'nilai_capex_detail_8_add_XXX';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex_add_30';
                                                                                                                            } else {
                                                                                                                                $cek_add = 3;
                                                                                                                                $nilai = 'nilai_capex_detail_8';
                                                                                                                                $update_reusable = 'update_nilai_level_11_capex';
                                                                                                                            }
                                                                                                                        ?>
                                                                                                                        <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_8[$nilai], 2, ',', '.') ?>
                                                                                                                        </td>
                                                                                                                        <td class="tg-0lax">
                                                                                                                            <?php $this->db->select('*');
                                                                                                                            $this->db->from('tbl_list_mata_anggran');
                                                                                                                            $this->db->where('tbl_list_mata_anggran.id_checking', $id_detail_capex_8);
                                                                                                                            $this->db->where('tbl_list_mata_anggran.no_add', $cek_add);
                                                                                                                            $checking_capex_detail_8 = $this->db->get()->result_array() ?>
                                                                                                                            <?php if ($value_detail_capex_8[$nilai] == null || $value_detail_capex_8[$nilai] == 0) { ?>
                                                                                                                                <?php if ($kondisi_capex_detail_9) { ?>

                                                                                                                                <?php    } else { ?>

                                                                                                                                    <?php if ($checking_capex_detail_8) { ?>
                                                                                                                                        <a onclick="modal_level_11_capex(<?= $value_detail_capex_8['id_detail_capex_8'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                                                    <?php    } else { ?>
                                                                                                                                        <a onclick="modal_level_11_capex(<?= $value_detail_capex_8['id_detail_capex_8'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                                                    <?php   }  ?>

                                                                                                                                <?php   }  ?>
                                                                                                                            <?php } else { ?>
                                                                                                                                <?php if ($kondisi_capex_detail_9) { ?>

                                                                                                                                <?php    } else { ?>
                                                                                                                                    <?php if ($checking_capex_detail_8) { ?>
                                                                                                                                        <a onclick="modal_level_11_capex(<?= $value_detail_capex_8['id_detail_capex_8'] ?>,'hapus_list_anggaran',<?= $cek_add ?>)" class="btn btn-sm btn-success" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-check"></i></a>
                                                                                                                                    <?php    } else { ?>
                                                                                                                                        <a onclick="modal_level_11_capex(<?= $value_detail_capex_8['id_detail_capex_8'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>
                                                                                                                                    <?php   }  ?>

                                                                                                                                <?php   }  ?>
                                                                                                                            <?php    } ?>
                                                                                                                        </td>
                                                                                                                    <?php   } ?>
                                                                                                                <?php } else { ?>
                                                                                                                    <?php
                                                                                                                        $nilai = 'nilai_capex_detail_8';
                                                                                                                        $update_reusable = 'update_nilai_level_11_capex';
                                                                                                                    ?>
                                                                                                                    <td class="tg-0lax"> <?= "Rp " . number_format($value_detail_capex_8[$nilai], 2, ',', '.') ?>
                                                                                                                    </td>
                                                                                                                    <td class="tg-0lax">
                                                                                                                        <?php if ($value_detail_capex_8[$nilai] == null || $value_detail_capex_8[$nilai] == 0) { ?>
                                                                                                                            <?php if ($kondisi_capex_detail_9) { ?>

                                                                                                                            <?php    } else { ?>

                                                                                                                                <a onclick="modal_level_11_capex(<?= $value_detail_capex_8['id_detail_capex_8'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                                                            <?php   }  ?>
                                                                                                                        <?php } else { ?>
                                                                                                                            <?php if ($kondisi_capex_detail_9) { ?>

                                                                                                                            <?php    } else { ?>
                                                                                                                                <a onclick="modal_level_11_capex(<?= $value_detail_capex_8['id_detail_capex_8'] ?>,'<?= $update_reusable ?>')" class="btn btn-sm btn-danger" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Terpilih"><i class="fas fa-times"></i></a>

                                                                                                                            <?php   }  ?>
                                                                                                                        <?php    } ?>
                                                                                                                    </td>
                                                                                                                <?php  }  ?>

                                                                                                            </tr>
                                                                                                            <div class="modal fade" id="form_modal_level_12_capex" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                                                                                <div class="modal-dialog" role="document">
                                                                                                                    <div class="modal-content">
                                                                                                                        <div class="modal-header">
                                                                                                                            <h5 class="modal-title" id="title_modal_level_12_capex"></h5>
                                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                            </button>
                                                                                                                        </div>
                                                                                                                        <div class="modal-body">
                                                                                                                            <form action="javascript:;" method="post" id="form_simpan_level_12_capex">
                                                                                                                                <input type="hidden" name="id_detail_capex_9">
                                                                                                                                <input type="text" name="type_add">
                                                                                                                                <input type="text" name="id_kontrak" value="<?= $row_kontrak['id_kontrak'] ?>">
                                                                                                                                <div class="form-group" style="display: none;" id="form_tambah_level_12_capex">
                                                                                                                                    <div class="row">
                                                                                                                                        <div class="col-md-12">
                                                                                                                                            <div class="form-group">
                                                                                                                                                <label for="">Nama Uraian</label>
                                                                                                                                                <input type="text" name="nama_uraian" class="form-control">
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                                <div class="form-group" style="display: none;" id="form_input_nilai_level_12_capex">
                                                                                                                                    <label for="">Pilih Mata Anggaran</label>
                                                                                                                                    <div class="row">
                                                                                                                                        <div class="col-6">
                                                                                                                                            <div class="input-group-prepend">
                                                                                                                                                <span class="">

                                                                                                                                                </span>
                                                                                                                                                <input type="hidden" class="form-control" name="nilai_capex_detail_9" id="nilai_capex_detail_9" aria-describedby="helpId" placeholder="Jumlah Nilai">
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="col-6">
                                                                                                                                            <input type="hidden" disabled class="float-right form-control form-control-sm mt-1" style="width: 200px;" id="rupiah_nilai_capex_detail_9_level_12_capex">
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </form>
                                                                                                                        </div>

                                                                                                                        <div class="modal-footer">
                                                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                            <a href="javascript:;" style="display: none;" id="button_update_nilai_level_12_capex" class="btn btn-success button_simpan" onclick="Simpan_level_12_capex('update_nilai_level_12_capex')">Simpan</a>
                                                                                                                            <a href="javascript:;" id="button_tambah_level_12_capex" class="btn btn-success button_simpan" onclick="Simpan_level_12_capex('tambah_level_12_capex')">Update</a>
                                                                                                                            <a href="javascript:;" id="button_edit_level_12_capex" class="btn btn-success button_simpan" onclick="Simpan_level_12_capex('edit_level_12_capex')">Edit</a>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        <?php   }  ?>
                                                                                                    <?php   }  ?>
                                                                                                <?php   }  ?>
                                                                                            <?php   }  ?>
                                                                                        <?php   }  ?>
                                                                                    <?php   }  ?>
                                                                                <?php   }  ?>
                                                                            <?php   }  ?>
                                                                        <?php   }  ?>
                                                                    <?php   } ?>
                                                                    <?php   } ?>