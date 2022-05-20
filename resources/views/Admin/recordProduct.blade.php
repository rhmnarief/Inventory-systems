<!DOCTYPE html>
<html lang="en">
<head>
  <title>Catatan Produk Masuk dan Keluar</title>
  @include('Templates.Table.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('Templates.navbar')

  <!-- /.navbar -->
  @include('Templates.left-sidebar')

  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manajemen Inventory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Record of Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex align-items-center" style="justify-content: space-between; width:auto;">
                <h3 class="card-title">Catatan Masuk dan Keluar Produk</h3>
                @if (auth()->user()->level == 'admin')
                <button class="btn btn-success" style="margin-left:auto;" data-toggle="modal" data-target="#inputModal" >
                  <i class="fas fa-plus"></i>
                </button>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Id Produk</th>
                    <th>Nama Produk</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Diubah Oleh</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($dataRecordProduct as $record)
                    <tr>
                      <td>{{ $record->id }}</td>
                      <td>
                        {{ $record->id_product }}
                      </td>
                      <td>
                        {{ $dataFiltered->nama_produk != null ? $dataFiltered->nama_produk : 'Item Telah Dihapus' }}
                      </td>
                      <td> <p style="color: green">{{  $record->income === 0 ? '-' : $record->income }}</p> </td>
                      <td> <p style="color: red">{{ $record->exit === 0 ? '-' : $record->exit }}</p></td>
                      <td>
                          <p>{{ date('D, F, Y', strtotime($record->updated)); }}</p>
                      </td>
                      <td>
                        <p>{{ date('h:m', strtotime($record->updated)); }}</p>
                      </td>
                      <td>
                        <p>{{$record->editedBy }}</p>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="d-block justify-content-center" style="width: 100px; length:100px ;" >
                {!! $dataRecordProduct->links() !!}
            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <!-- Modal Form Input -->
    <section class="modal-form">
      <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Form Input Produk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('addRecordProduct') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="form-floating">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01" style="width: 30%">Pilih Produk</label>
                        <select class="form-control" id="inputGroupSelect01" name="unique_code" style="width: 70%">
                            @foreach ($dataProduct as $item)
                            <option value="{{ $item->kode_unik }}" name="unique_code" style="border-radius: 0" required>{{ $item->nama_produk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3 align-items-center">
                      <div class="check-form d-flex" style="width: 30%">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="statusRecord" id="exampleRadios1" value="income" checked>
                          <label class="form-check-label" for="exampleRadios1">
                            Masuk
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="statusRecord" id="exampleRadios2" value="exit" required>
                          <label class="form-check-label" for="exampleRadios2">
                            Keluar
                          </label>
                        </div>
                      </div>
                        <input type="number" name="changeValue" min="0" class="form-control" aria-label="Input perubahan barang">
                    </div>
                    <div class="input-group mb-3">
                      <label class="input-group-text" for="inputGroupSelect01" style="width: 30%">Tanggal</label>
                      <input class="form-control" type="datetime-local" name="updatedAt" style="width: 70%" required/>
                    </div>
                  <div class="d-flex form-floating mt-5" >
                      <button type="submit" class="btn btn-success" style="margin-left:auto;">Simpan Data</button>
                  </div>
                </form>

              </div>
            </div>
        </div>
      </div>
      
    </section>
     <!-- /.content-wrapper -->
    </div>
    @include('Templates.footer')
 
 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('Templates.Table.script')
@include('sweetalert::alert')
<style>
</style>
</body>
</html>

