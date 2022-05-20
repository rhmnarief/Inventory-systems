<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Produk</title>
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
              <li class="breadcrumb-item active">Products Inventory</li>
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
                <h3 class="card-title">Data Penyimpanan Produk</h3>
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
                    <th>Id Produk</th>
                    <th>Gambar</th>
                    <th>Produk</th>
                    <th>Kategori Produk</th>
                    <th>Stok Produk</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($dataProduct as $item)
                    <tr>
                      <td>{{ $item->id }}</td>
                      <td>
                        <center>
                          <img src="/uploads/{{ $item->gambar_produk }}" alt="" style="width: 50px; height: 50px;"/>
                        </center>
                      </td>
                      <td>
                          <p>{{ $item->nama_produk }}</p>
                      </td>
                      <td>{{ $item->kategori_produk }}</td>
                      <td>{{ $item->stok_produk }}</td>
                      <td>
                        @if (auth()->user()->level == 'admin')
                        <a href="{{ url('edit-product', $item->id) }}"><i class="fas fa-edit"></i></a> | <a href="{{ url('delete-product',$item->id) }}"><i class="fas fa-trash-alt" style="color:red;"></i></a>
                        @else
                        <a href="{{ url('edit-product', $item->id) }}" style="font-style: none; color: black;">
                          Tambah Catatan
                        </a>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  {{-- <tfoot>
                  <tr>
                    <th>Rendering </th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot> --}}
                </table>
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
              <form action="{{ route('addProduct') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="form-floating">
                      <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Input Nama Produk" required>
                  </div>
                  <div class="form-floating">
                      <label for="kategori_produk">Kategori Produk</label>
                    <input type="text" class="form-control" id="kategori_produk" name="kategori_produk" placeholder="Input Kategori Produk" required>
                  </div>
                  <div class="form-floating mb-3">
                    <label for="stok_produk">Stok Produk</label>
                    <input type="number" class="form-control" placeholder="Input Stok Produk" id="stok_produk" name="stok_produk" required>
                  </div>
                  <div class="form-floating mb-3">
                    <label for="gambar_produk">Gambar Produk</label>
                    <input type="file" class="form-control-file" id="gambar_produk" name="gambar_produk"/>
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
    <div class="d-block justify-content-center" style="width: 100px; length:100px ;" >
      {!! $dataProduct->links() !!}
     </div>
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

