<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <input type="hidden" name="tahun_filter" value="2022">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard
                    </h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Grafik</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-wrench"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a href="#" class="dropdown-item">Action</a>
                                        <a href="#" class="dropdown-item">Another action</a>
                                        <a href="#" class="dropdown-item">Something else here</a>
                                        <a class="dropdown-divider"></a>
                                        <a href="#" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card card-primary" style="display:none">
                                                <div class="card-header">
                                                    <h3 class="card-title">Area Chart</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="chart">
                                                        <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="card card-danger" style="display:none">
                                                <div class="card-header">
                                                    <h3 class="card-title">Donut Chart</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                </div>

                                            </div>


                                            <div class="card card-danger" style="display:none">
                                                <div class="card-header">
                                                    <h3 class="card-title">Pie Chart</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-12">
                                            <div class="card card-info" style="display:none">
                                                <div class="card-header">
                                                    <h3 class="card-title">Line Chart</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="chart">
                                                        <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#tambah_pendaptan">
                                                Input Pendapatan
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="tambah_pendaptan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Input Pendapatan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="javascript:;" id="form_pendaptan">
                                                                <div class="container-fluid">
                                                                    <div class="form-group">
                                                                        <label for="">Nilai Pendapatan</label>
                                                                        <input type="text" name="nilai_pendapatan" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Tanggal Bulan & Tahun Pendapatan</label>
                                                                        <input type="date" name="tanggal_pendapatan" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="javascript:;" onclick="TambahPendapatan()" class="btn btn-primary">Simpan</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                $('#exampleModal').on('show.bs.modal', event => {
                                                    var button = $(event.relatedTarget);
                                                    var modal = $(this);
                                                    // Use above variables to manipulate the DOM

                                                });
                                            </script>
                                            <div class="card card-success">
                                                <div class="card-header">
                                                    <h3 class="card-title">Grafik Kontrak</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="chart">
                                                        <canvas id="barChart" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Modal -->
                                            <div class="modal fade" id="open_modal_diagram" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Grafik <label for="" id="label_diagram"></label></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="card">
                                                                        <div class="card-header bg-primary">
                                                                            Data Grafik Pendapatan
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="table_pendapatan" class="table">
                                                                                <thead >
                                                                                    <tr>
                                                                                        <th>No</th>
                                                                                        <th>Tanggal Pendapatan</th>
                                                                                        <th>Nilai Pendapatan</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="card">
                                                                        <div class="card-header bg-primary">
                                                                            Data Grafik Pencairan
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="table_pencairan" class="table">
                                                                                <thead >
                                                                                    <tr>
                                                                                        <th>No</th>
                                                                                        <th>Nama Kontrak</th>
                                                                                        <th>Nomor Kontrak</th>
                                                                                        <th>Nilai Pencairan</th>
                                                                                        <th>Tanggal Pencairan</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.row -->
                                    </div>
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

<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>