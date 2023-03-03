<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">
            <i class="nav-icon far fa-address-card"></i>
            File Master / Data Pengguna
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
                Tabel Data Pengguna
              </h5>
              <div class="card-tools">
                <button type="button" class="btn btn-block bg-gradient-success" data-toggle="modal" data-target="#modal-lg1">
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
                    <table id="table" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>
                            <i class="far fa-file-alt"></i>
                            No
                          </th>
                          <th>
                            <i class="far fa-envelope-open"></i>
                            Nama Pegawai
                          </th>
                          <th>
                            <i class="fas fa-home"></i>
                            NIP
                          </th>
                          <th>
                            <i class="fas fa-info-circle"></i>
                            Username
                          </th>
                          <th>
                            <i class="fas fa-cogs"></i>
                            Status
                          </th>
                          <th>
                            <i class="fas fa-cogs"></i>
                            Aksi
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- <tr>
                          <td>Trident</td>
                          <td>Internet
                            Explorer 4.0
                          </td>
                          <td>Win 95+</td>
                          <td> 4</td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-default">
                                <i class="fas fa-glasses"></i>
                              </button>
                              <button type="button" class="btn btn-default">
                                <i class="fas fa-edit"></i>
                              </button>
                              <button type="button" class="btn btn-default">
                                <i class="fas fa-trash-alt"></i>
                              </button>
                            </div>
                          </td>
                        </tr> -->
                      </tbody>
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
<div class="modal fade" id="modal-lg1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fas fa-user-alt"></i>
          Tambah Data Pengguna
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
                  Form Input Data Pengguna
                </h3>
              </div>
              <form id="form_tambah">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">
                        Biodata Pengguna
                      </h3>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-clipboard"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" name="nama_pegawai" placeholder="Nama Lengkap">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-clipboard"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" name="nip" placeholder="NIP">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-phone"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" name="telepon" placeholder="Telepon">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-address-card"></i>
                          </span>
                        </div>
                        <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
                      </div>
                    </div>
                    <!-- <div class="col-md-12 ">
                        <select class="select2 form-control form-control-sm" id="unit" style="width: 100%;">
                          <option>Pilih Unit Kerja</option>
                          <option>Human Resource & Ganeral Affair</option>
                          <option>Procurment & Asset</option>
                          <option>Operation</option>
                          <option>Finance & Accounting</option>
                        </select>
                      </div> -->
                  </div>


                </div>
                <div class="card-body" style="margin-top: -40px;">
                  <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">
                        Pengaturan User Login
                      </h3>
                    </div>
                  </div>
                  <div class="form-row">
                    
                    <div class="col-md-6">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-user-lock"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-envelope-open"></i>
                          </span>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-key"></i>
                          </span>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <select class="form-control" name="status">
                          <option>Option</option>
                          <option value="1">Aktif</option>
                          <option value="0">Non Aktif</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="">Pilih Departemen</label>
                      <select class="form-control" name="id_departemen" id="id_departemen" data-placeholder="ilih" style="width: 100%;">
                        <option value="">-- Departemen --</option>
                        <?php foreach ($departemen as $key => $value) { ?>
                          <option value="<?= $value['id_departemen'] ?>"><?= $value['nama_departemen'] ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="">Pilih Area</label>
                      <select name="id_area" id="id_area" class="form-control area">
                        <option value="">-- Area --</option>
                      </select>
                      <small class="text-danger">Area Akan Muncul Jika Departement Telah Di Pilih</small>
                    </div>
                    <div class="col-md-6">
                      <label for="">Pilih Area</label>
                      <select name="id_sub_area" id="id_sub_area" class="form-control sub_area">
                        <option value="">-- Sub Area --</option>
                      </select>
                      <small class="text-danger">Sub Area Akan Muncul Jika Departement Telah Di Pilih</small>
                    </div>
                  </div>
                  <button type="button" onclick="save_pegawai()" class="btn btn-success float-right">Simpan</button>
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


<div class="modal fade" id="modal_edit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fas fa-user-alt"></i>
          Edit Data Pengguna
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
                  Form Edit Data Pengguna
                </h3>
              </div>
              <form id="form_edit">
                <input type="hidden" name="id_pegawai">
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">
                        Biodata Pengguna
                      </h3>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-clipboard"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" name="nama_user" id="nm" placeholder="Nama Lengkap">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-clipboard"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-phone"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-address-card"></i>
                          </span>
                        </div>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"></textarea>
                      </div>
                    </div>
                    <!-- <div class="col-md-12 ">
                        <select class="select2 form-control form-control-sm" id="unit" style="width: 100%;">
                          <option>Pilih Unit Kerja</option>
                          <option>Human Resource & Ganeral Affair</option>
                          <option>Procurment & Asset</option>
                          <option>Operation</option>
                          <option>Finance & Accounting</option>
                        </select>
                      </div> -->
                  </div>


                </div>
                <div class="card-body" style="margin-top: -40px;">
                  <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">
                        Pengaturan User Login
                      </h3>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-user-lock"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-envelope-open"></i>
                          </span>
                        </div>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                      </div>
                    </div>
                    <!-- <div class="col-md-6">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-key"></i>
                          </span>
                        </div>
                        <input type="password" name="password" class="form-control" id="pwd1" placeholder="Password">
                      </div>
                    </div> -->
                    <div class="col-md-6">
                      <select class="form-control" name="id_pegawai" id="usr_log" data-placeholder="Pilih User Login" style="width: 100%;">
                        <?php foreach ($detail_role as $key => $value) { ?>
                          <option value="<?= $value['id_pegawai'] ?>">
                            <?php if ($value['id_area'] == 0 || $value['id_ruas_kontrak'] == 0 || $value['id_owner'] == 0) { ?>
                              <?= $value['nama_role'] ?> - <?= $value['nama_area'] ?>
                            <?php } else { ?>
                              <?= $value['nama_role'] ?> - <?= $value['nama_area']  ?> - <?= $value['nama_ruas'] ?> - <?= $value['nama_owner']  ?>
                            <?php  }   ?>
                          </option>
                        <?php  } ?>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <select class="form-control" name="status">
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