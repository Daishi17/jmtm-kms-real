<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">

                    </h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-sm-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?= base_url('assets/logo.png') ?>" width="250px" alt="">
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-5 mt-4">
                                        <h6> <i class="fa fa-book"></i> Administrasi Kontrak Penyedia Jasa Pasca Pengadaan</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id_detail_program_penyedia_jasa">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <table id="mytable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr class="bg-primary">
                                                        <th class="text-center" style="font-size: 13px;" rowspan="3">No</th>
                                                        <th class="text-center" style="font-size: 13px;">Nama Pekerjaan</th>
                                                        <th class="text-center" style="font-size: 13px;">Nomor Kontrak</th>
                                                        <th class="text-center" style="font-size: 13px;">Hps</th>
                                                        <th class="text-center" style="font-size: 13px;">Penyedia</th>
                                                        <th class="text-center" style="font-size: 13px;">Gunning</th>
                                                        <th class="text-center" style="font-size: 13px;">Sho</th>
                                                        <th class="text-center" style="font-size: 13px;">Smk</th>
                                                        <th class="text-center" style="font-size: 13px;">Tanggal Kontrak</th>
                                                        <th class="text-center" style="font-size: 13px;">Nilai Kontrak</th>
                                                        <th class="text-center" style="font-size: 13px;">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1;
                                                    $j = 1;
                                                    foreach ($get_mata_anggaran as $key => $value) { ?>
                                                        <?php $id_detail_program_penyedia_jasa = $value['id_detail_program_penyedia_jasa'];  ?>
                                                        <?php
                                                        $this->db->select('*');
                                                        $this->db->from('tbl_sub_detail_program_penyedia_jasa');
                                                        $this->db->where('tbl_sub_detail_program_penyedia_jasa.id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
                                                        // $this->db->order_by('display_order', 'ASC');
                                                        $get_nilai_kontrak = $this->db->get() ?>
                                                        <?php
                                                        $total_kontrak  = 0;
                                                        foreach ($get_nilai_kontrak->result_array() as $value_kontrak) {
                                                            $total_kontrak += $value_kontrak['nilai_hps']
                                                        ?>
                                                        <?php } ?>
                                                        <tr style="font-size: 11px;">
                                                            <td><?= $i++ ?></td>
                                                            <td> <label for=""><?= $value['nama_pekerjaan_program_mata_anggaran'] ?></label> </td>
                                                            <td> <?= $value['no_kontrak'] ?>
                                                            </td>
                                                            <td></td>
                                                            <td><?= $value['nama_penyedia'] ?>
                                                            </td>
                                                            <td>
                                                                <?php if (!$value['file_gunning']) { ?>
                                                                    <label for="">Belum Upload</label>
                                                                <?php  } else { ?>
                                                                    <a class="text-primary" target="_blank" href="<?= base_url('/file_gunning/') . $value['file_gunning'] ?>"><img src="<?= base_url('assets/pdf.png') ?>" style="width: 30px;" alt=""></a>
                                                                <?php   } ?>
                                                            </td>
                                                            <td>
                                                                <?php if (!$value['file_sho']) { ?>
                                                                    <label for="">Belum Upload</label>
                                                                <?php  } else { ?>
                                                                    <a class="text-primary" target="_blank" href="<?= base_url('/file_sho/') . $value['file_sho'] ?>"><img src="<?= base_url('assets/pdf.png') ?>" style="width: 30px;" alt=""></a>
                                                                <?php   } ?>
                                                            </td>
                                                            <td>
                                                                <?php if (!$value['file_smk']) { ?>
                                                                    <label for="">Belum Upload</label>
                                                                <?php  } else { ?>
                                                                    <a class="text-primary" target="_blank" href="<?= base_url('/file_smk/') . $value['file_smk'] ?>"><img src="<?= base_url('assets/pdf.png') ?>" style="width: 30px;" alt=""></a>
                                                                <?php   } ?>
                                                            </td>
                                                            <td> <?= $value['tahun_kontrak'] ?>
                                                            </td>
                                                            <td> <?= "Rp " . number_format($total_kontrak, 2, ',', '.') ?>
                                                            </td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-default btn-sm">Action</button>
                                                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                                        <span class="sr-only">Toggle Dropdown</span>
                                                                    </button>
                                                                    <div class="dropdown-menu" role="menu">
                                                                        <a href="<?= base_url('administrasi_kontrak/administrasi_kontrak/addendum_kontrak/') . $value['id_detail_program_penyedia_jasa'] ?>" style="font-size: 12px;" class="btn btn-sm btn-primary btn-block"><i class="fa fa-book"></i> Addendum Kontrak</a>
                                                                        <a href="javascript:;" onclick="KelolaDetail(<?= $value['id_detail_program_penyedia_jasa'] ?>)" style="font-size: 12px;" class="btn btn-sm btn-info btn-block"><i class="fa fa-book"></i> Kelola Detail Kontrak</a>
                                                                    </div>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $this->db->select('*');
                                                        $this->db->from('tbl_sub_detail_program_penyedia_jasa');
                                                        $this->db->where('tbl_sub_detail_program_penyedia_jasa.id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
                                                        // $this->db->order_by('display_order', 'ASC');
                                                        $query_result_sub_detail_program = $this->db->get() ?>
                                                        <?php
                                                        $b = 1;
                                                        foreach ($query_result_sub_detail_program->result_array() as $value_sub_detail_program) {

                                                        ?>

                                                            <tr style="font-size: 11px;">
                                                                <td class=""></td>
                                                                <td class=""><?= $value_sub_detail_program['nama_program_mata_anggaran'] ?></td>
                                                                <td class=""></td>
                                                                <td>
                                                                    <div style="width:150px">
                                                                        <?= "Rp " . number_format($value_sub_detail_program['nilai_hps'], 2, ',', '.') ?>
                                                                    </div>
                                                                </td>
                                                                <td class="" colspan="6">
                                                                </td>
                                                                <td class="">
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn btn-default btn-sm">Action</button>
                                                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                                            <span class="sr-only">Toggle Dropdown</span>
                                                                        </button>
                                                                        <div class="dropdown-menu" role="menu">
                                                                            <a href="<?= base_url('administrasi_kontrak/administrasi_kontrak/addendum_kontrak_sub_program/') . $value_sub_detail_program['id_detail_sub_program_penyedia_jasa'] ?>" style="font-size: 12px;" class="btn btn-sm btn-primary btn-block"><i class="fa fa-book"></i> Addendum FQ</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./card-body -->
                                <!-- /.card-footer -->
                            </div>
                        </div>
                    </div>

                    <!-- Button trigger modal -->
                    <!-- Modal -->


                    <div class="modal fade" id="modal_edit_global" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title">Kelola Detail Kontrak Penyedia Jasa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="card card-primary card-tabs">
                                            <div class="card-header p-0 pt-1">
                                                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                                    <li class="pt-2 px-3">
                                                        <h3 class="card-title"><i class="fas fa fa-database"></i></h3>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Pilih Penyedia</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Gunning</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Sho</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill" href="#custom-tabs-two-settings" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Smk</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content" id="custom-tabs-two-tabContent">
                                                    <!-- PIP -->
                                                    <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="card card-outline card-primary">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">
                                                                            Pilih Penyedia
                                                                        </h3>
                                                                    </div>
                                                                    <form id="form_penyedia" action="javascript;;">
                                                                        <input type="hidden" name="id_detail_program_penyedia_jasa">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <label for="">Nama Penyyedia</label>
                                                                                    <div class="input-group mb-6">
                                                                                        <div class="input-group-prepend">
                                                                                            <span class="input-group-text">
                                                                                                <i class="far fa-user"> </i>
                                                                                            </span>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" name="nama_penyedia" placeholder="Nama Penyedia">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <button type="button" onclick="simpan_data()" class="btn btn-sm btn-success float-right"><i class="fa fa-paper-plane" aria-hidden="true"></i> Simpan</button>
                                                            </div>
                                                            <div class="col-md-3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Hps -->
                                                    <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="card card-outline card-warning">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">
                                                                            Upload Gunning
                                                                        </h3>
                                                                    </div>
                                                                    <br>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="card card-outline card-primary">
                                                                                    <div class="card-header">
                                                                                        Form Upload Gunning
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <center>
                                                                                            <form id="form_gunning" enctype="multipart/form-data">
                                                                                                <div class="input-group col-md-12">
                                                                                                    <div class="input-group-append">
                                                                                                        <button class="input-group-text attach_btn btn-primary" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file').click();"><i class="fas fa-paperclip"></i></button>
                                                                                                        <input type="file" accept="application/msword, application/vnd.ms-excel,application/pdf" style="display:none;" id="file" class="file_gunning" name="file_gunning" />
                                                                                                    </div>
                                                                                                    <input type="text" name="nama_file_gunning" class="form-control form-control-sm" placeholder="Nama File....">
                                                                                                    <div class="input-group-append">
                                                                                                        <button type="submit" id="upload_gunning" name="upload" class="input-group-text  btn-primary"><i class="fas fa-upload"></i></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                            <br>
                                                                                            <div style="display: none;" id="error_file_gunning" class="alert alert-danger" role="alert">
                                                                                                ANDA BELUM MENGISI FILE !!!
                                                                                            </div>
                                                                                        </center>
                                                                                        <br>
                                                                                        <center>
                                                                                            <div class="form-group col-md-12" id="process_gunning" style="display:none;">
                                                                                                <small for="" style="display:none;" id="sedang_dikirim_gunning">Sedang Mengupload....</small>
                                                                                                <div class="progress">
                                                                                                    <div class="progress-bar progress-bar-striped active progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </center>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card card-outline card-danger">
                                                                                    <div class="card-header">
                                                                                        File Upload Gunning
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <table class="table">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>Nama File</th>
                                                                                                    <th>File</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td scope="row"><label id="nama_file_gunning_view" for=""></label></td>
                                                                                                    <td><label for="" id="file_gunning_view"></label></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Nota Dinas -->
                                                    <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="card card-outline card-info">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">
                                                                            Upload SHO
                                                                        </h3>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="card card-outline card-primary">
                                                                                    <div class="card-header">
                                                                                        Form Upload SHO
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <center>
                                                                                            <form id="form_sho" enctype="multipart/form-data">
                                                                                                <div class="input-group col-md-12">
                                                                                                    <div class="input-group-append">
                                                                                                        <button class="input-group-text attach_btn btn-primary" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file_sho').click();"><i class="fas fa-paperclip"></i></button>
                                                                                                        <input type="file" accept="application/msword, application/vnd.ms-excel,application/pdf" style="display:none;" id="file_sho" class="file_sho" name="file_sho" />
                                                                                                    </div>
                                                                                                    <input type="text" name="nama_file_sho" class="form-control form-control-sm" placeholder="Nama File....">
                                                                                                    <div class="input-group-append">
                                                                                                        <button type="submit" id="upload_sho" name="upload" class="input-group-text  btn-primary"><i class="fas fa-upload"></i></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                            <br>
                                                                                            <div style="display: none;" id="error_file_sho" class="alert alert-danger" role="alert">
                                                                                                ANDA BELUM MENGISI FILE !!!
                                                                                            </div>
                                                                                        </center>
                                                                                        <br>
                                                                                        <center>
                                                                                            <div class="form-group col-md-12" id="process_sho" style="display:none;">
                                                                                                <small for="" style="display:none;" id="sedang_dikirim_sho">Sedang Mengupload....</small>
                                                                                                <div class="progress">
                                                                                                    <div class="progress-bar progress-bar-striped active progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </center>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card card-outline card-danger">
                                                                                    <div class="card-header">
                                                                                        File Upload SHO
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <table class="table">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>Nama File</th>
                                                                                                    <th>File</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td scope="row"><label id="nama_file_sho_view" for=""></label></td>
                                                                                                    <td><label for="" id="file_sho_view"></label></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="card card-outline card-info">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">
                                                                            Upload SMK
                                                                        </h3>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="card card-outline card-primary">
                                                                                    <div class="card-header">
                                                                                        Form Upload SMK
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <center>
                                                                                            <form id="form_smk" enctype="multipart/form-data">
                                                                                                <div class="input-group col-md-12">
                                                                                                    <div class="input-group-append">
                                                                                                        <button class="input-group-text attach_btn btn-primary" type="button" id="loadFileXml" value="loadXml" onclick="document.getElementById('file_smk').click();"><i class="fas fa-paperclip"></i></button>
                                                                                                        <input type="file" accept="application/msword, application/vnd.ms-excel,application/pdf" style="display:none;" id="file_smk" class="file_smk" name="file_smk" />
                                                                                                    </div>
                                                                                                    <input type="text" name="nama_file_smk" class="form-control form-control-sm" placeholder="Nama File....">
                                                                                                    <div class="input-group-append">
                                                                                                        <button type="submit" id="upload_smk" name="upload" class="input-group-text  btn-primary"><i class="fas fa-upload"></i></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                            <br>
                                                                                            <div style="display: none;" id="error_file_smk" class="alert alert-danger" role="alert">
                                                                                                ANDA BELUM MENGISI FILE !!!
                                                                                            </div>
                                                                                        </center>
                                                                                        <br>
                                                                                        <center>
                                                                                            <div class="form-group col-md-12" id="process_smk" style="display:none;">
                                                                                                <small for="" style="display:none;" id="sedang_dikirim_smk">Sedang Mengupload....</small>
                                                                                                <div class="progress">
                                                                                                    <div class="progress-bar progress-bar-striped active progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </center>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card card-outline card-danger">
                                                                                    <div class="card-header">
                                                                                        File Upload SMK
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <table class="table">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>Nama File</th>
                                                                                                    <th>File</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td scope="row"><label id="nama_file_smk_view" for=""></label></td>
                                                                                                    <td><label for="" id="file_smk_view"></label></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>.
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <!-- /.row -->
            </div>
    </section>
    <!-- /.content -->
</div>
</div>