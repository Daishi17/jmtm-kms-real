<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <input type="text" name="id_detail_sub_program_penyedia_jasa" value="<?= $sub_program['id_detail_sub_program_penyedia_jasa']?>">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <i class="nav-icon far fa-address-card"></i>
                        Daftar Kuantitas Harga
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
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                Tabel Daftar Kuantitas Harga
                            </h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-block bg-gradient-success" data-toggle="modal" data-target="#modal_add_hps">
                                    <i class="fas fa-plus"></i>
                                    Tambah
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <table id="table_kuantitas_harga" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <i class="far fa-file-alt"></i>
                                                        No
                                                    </th>
                                                    <th>
                                                        <i class="far fa-envelope-open"></i>
                                                        Uraian
                                                    </th>
                                                     <th>
                                                        <i class="fas fa-cogs"></i>
                                                        Satuan
                                                    </th>
                                                    <th>
                                                        <i class="fas fa-cogs"></i>
                                                        Volume
                                                    </th>
                                                      <th>
                                                        <i class="fas fa-cogs"></i>
                                                        Harga Satuan
                                                    </th>
                                                     <th>
                                                        <i class="fas fa-cogs"></i>
                                                        Jumlah Harga
                                                    </th>
                                                       <th>
                                                        <i class="fas fa-cogs"></i>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                        <br>

                                        <table>
                                      <tfoot>

                                        <tr>
                                            <td></td>
                                            <td> </td>
                                            <td>SUB TOTAL
                                                <?php
                                                $this->db->select('*');
                                                $this->db->from('tbl_hps_kontrak_penyedia_jasa');
                                                $this->db->where('tbl_hps_kontrak_penyedia_jasa.id_detail_sub_program_penyedia_jasa', $sub_program['id_detail_sub_program_penyedia_jasa']);
                                                $this->db->where('tbl_hps_kontrak_penyedia_jasa.harga_satuan_hps !=',null);
                                                $this->db->order_by('id_detail_sub_program_penyedia_jasa', 'ASC');
                                                $query_tbl_hps = $this->db->get() ?>
                                                <?php $total = 0; foreach ($query_tbl_hps->result_array() as $key => $dataku) { 
                                                    
                                                $total += $dataku['total_harga'];
                                                } ?>
                                            </td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td>
                                                <?= "Rp " . number_format($total, 2, ',', '.') ?>

                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td> </td>
                                            <td>PPN 10%</td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td>

                                                <?php
                                                $total_setalah_ppn10 = ($total * 10) / 100;
                                                ?>
                                                <?= "Rp " . number_format($total_setalah_ppn10, 2, ',', '.') ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td> </td>
                                            <td>PPN 11%</td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td>

                                                <?php
                                                $total_setalah_ppn11 = ($total * 11) / 100;
                                                ?>
                                                <?= "Rp " . number_format($total_setalah_ppn11, 2, ',', '.') ?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td> </td>
                                            <td>TOTAL</td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <td><?= "Rp " . number_format($total, 2, ',', '.') ?></td>
                                            <td></td>
                                            <input type="hidden" name="grand_total" value="<?= $total ?>">
                                        </tr>
                                    </tfoot>
                                    </table>
                                    </div>
                                    <!-- belum keisi -->
                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./card-body -->
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<div class="modal fade" id="modal_add_hps">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-user-alt"></i>
                    Tambah Hps
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-navy">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    Form Add Hps
                                </h3>
                            </div>
                            <form id="form_tambah">
                                <div class="card-body">
                                    <input type="text" name="id_detail_sub_program_penyedia_jasa" value="<?= $sub_program['id_detail_sub_program_penyedia_jasa']?>">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                               <label for="">No</label>
                                               <input type="text" name="no_hps" class="form-control">
                                            </div>
                                        </div>
                                          <div class="col-md-12">
                                            <div class="form-group">
                                               <label for="">Uraian</label>
                                               <input type="text" name="uraian_hps" class="form-control">
                                            </div>
                                        </div>
                                          <div class="col-md-12">
                                            <div class="form-group">
                                               <label for="">Satuan</label>
                                               <input type="text" name="satuan_hps" class="form-control">
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <div class="form-group">
                                               <label for="">Volume</label>
                                               <input type="text" name="volume_hps" class="form-control">
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <div class="form-group">
                                               <label for="">Harga Satuan</label>
                                               <input type="text" name="harga_satuan_hps" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                    <button type="button" onclick="save_data()" class="btn btn-success float-right">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_edit">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-user-alt"></i>
                    Edit Data Penyedia
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_unit_kerja">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-navy">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i>
                                    Form Input Data Unit Kerja
                                </h3>
                            </div>
                            <form id="form_edit">
                                <input type="hidden" name="id_unit_kerja">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-clipboard"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="nama_unit_kerja2" id="nama_unit_kerja2" placeholder="Nama Unit Kerja">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select class="form-control" name="status2">
                                                    <option>--Status Data--</option>
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Non Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" onclick="edit_data()" class="btn btn-success float-right">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">

            </div>
        </div>
    </div>
</div>