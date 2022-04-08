<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <title>AdminLTE 3 | Starter</title>
    @include('Templates.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('Templates.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('Templates.left-sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Starter Page</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                      <section class="col-lg-12 connectedSortable">

                        <!-- Map card -->
                        <div class="card bg-gradient-primary">
                          <div class="card-header border-0">
                            <h3 class="card-title">
                              <i class="fas fa-map-marker-alt mr-1"></i>
                              Visitors
                            </h3>
                            <!-- card tools -->
                            <div class="card-tools">
                              <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                                <i class="far fa-calendar-alt"></i>
                              </button>
                              <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                              </button>
                            </div>
                            <!-- /.card-tools -->
                          </div>
                          <div class="card-body">
                            <div id="world-map" style="height: 250px; width: 100%;"></div>
                          </div>
                          <!-- /.card-body-->
                          <div class="card-footer bg-transparent">
                            <div class="row">
                              <div class="col-4 text-center">
                                <div id="sparkline-1"></div>
                                <div class="text-white">Visitors</div>
                              </div>
                              <!-- ./col -->
                              <div class="col-4 text-center">
                                <div id="sparkline-2"></div>
                                <div class="text-white">Online</div>
                              </div>
                              <!-- ./col -->
                              <div class="col-4 text-center">
                                <div id="sparkline-3"></div>
                                <div class="text-white">Sales</div>
                              </div>
                              <!-- ./col -->
                            </div>
                            <!-- /.row -->
                          </div>
                        </div>
                        <!-- /.card -->
            
                        <!-- solid sales graph -->
                        <div class="card bg-gradient-info">
                          <div class="card-header border-0">
                            <h3 class="card-title">
                              <i class="fas fa-th mr-1"></i>
                              Sales Graph
                            </h3>
            
                            <div class="card-tools">
                              <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                              </button>
                            </div>
                          </div>
                          <div class="card-body">
                            <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer bg-transparent">
                            <div class="row">
                              <div class="col-4 text-center">
                                <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                                       data-fgColor="#39CCCC">
            
                                <div class="text-white">Mail-Orders</div>
                              </div>
                              <!-- ./col -->
                              <div class="col-4 text-center">
                                <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                                       data-fgColor="#39CCCC">
            
                                <div class="text-white">Online</div>
                              </div>
                              <!-- ./col -->
                              <div class="col-4 text-center">
                                <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                                       data-fgColor="#39CCCC">
            
                                <div class="text-white">In-Store</div>
                              </div>
                              <!-- ./col -->
                            </div>
                            <!-- /.row -->
                          </div>
                          <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
            
                        <!-- Calendar -->
                        <div class="card bg-gradient-success">
                          <div class="card-header border-0">
            
                            <h3 class="card-title">
                              <i class="far fa-calendar-alt"></i>
                              Calendar
                            </h3>
                            <!-- tools card -->
                            <div class="card-tools">
                              <!-- button with a dropdown -->
                              <div class="btn-group">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                  <i class="fas fa-bars"></i>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                  <a href="#" class="dropdown-item">Add new event</a>
                                  <a href="#" class="dropdown-item">Clear events</a>
                                  <div class="dropdown-divider"></div>
                                  <a href="#" class="dropdown-item">View calendar</a>
                                </div>
                              </div>
                              <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                              </button>
                            </div>
                            <!-- /. tools -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body pt-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </section>
                       
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('Templates.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @include('Templates.script')

</body>

</html>

</html>
