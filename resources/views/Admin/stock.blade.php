
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <title>Inventory Penyimpanan Bahan Baku</title>
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manajemen Inventory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Stocks Inventory</li>
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
                <h3 class="card-title">Data Penyimpanan Bahan Baku</h3>
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
                    <th>Id Bahan Baku</th>
                    <th>Gambar</th>
                    <th>Bahan Baku</th>
                    <th>Kategori Bahan Baku</th>
                    <th>Stok Bahan Baku</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($dataStocks as $item)
                      <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                          <center>
                            <img src="/uploads/{{ $item->gambar_bahan }}" alt="" style="width: 50px; height: 50px;"/>
                          </center>
                        </td>
                        <td>
                            <p>{{ $item->nama_bahan }}</p>
                        </td>
                        <td>{{ $item->kategori_bahan }}</td>
                        <td>{{ $item->stok_bahan }}</td>
                        <td>
                          @if (auth()->user()->level == 'admin')
                          <a href="{{ url('edit-stock', $item->id) }}"><i class="fas fa-edit"></i></a> | <a href="{{ url('delete-stock',$item->id) }}"><i class="fas fa-trash-alt" style="color:red;"></i></a>
                          @else
                          <a href="{{ url('edit-stock', $item->id) }}" style="font-style: none; color: black;">
                            Tambah Catatan
                          </a>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
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
              <h5 class="modal-title" id="exampleModalLabel">Form Input Bahan Baku</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('addStock') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="form-floating">
                    <label for="nama_bahan">Nama Bahan Baku</label>
                    <input type="text" class="form-control" id="nama_bahan" name="nama_bahan" placeholder="Input Nama Bahan" required>
                  </div>
                  <div class="form-floating">
                      <label for="kategori_bahan">Kategori Bahan Baku</label>
                    <input type="text" class="form-control" id="kategori_bahan" name="kategori_bahan" placeholder="Input Kategori Bahan" required>
                  </div>
                  <div class="form-floating mb-3">
                    <label for="stok_bahan">Stok Bahan Baku</label>
                    <input type="number" class="form-control" placeholder="Input Stok Bahan" id="stok_bahan" name="stok_bahan" required>
                  </div>
                  <div class="form-floating mb-3">
                    <label for="gambar_bahan">Gambar Bahan Baku</label>
                    <input type="file" class="form-control-file" id="gambar_bahan" name="gambar_bahan"/>
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

    <section class="modal-form">
      <div class="modal fade" id="inputComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Bahan Baku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="form-floating">
                <label for="comment">Tambahkan Komentar</label>
                <textarea class="form-control" id="comment" name="comment" placeholder="Tambahkan Komentar" required> </textarea>
              </div>
                <div class="d-flex form-floating mt-5" >
                  <button type="submit" class="btn btn-success" style="margin-left:auto;">Kirim Komentar</button>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>

    @include('Templates.footer')

    <div class="d-block justify-content-center" style="width: 100px; length:100px ;" >
      {!! $dataStocks->links() !!}
     </div>
     <!-- /.content-wrapper -->
    </div>
  </div>
  <!-- ./wrapper -->


<!-- REQUIRED SCRIPTS -->
@include('Templates.Table.script')
@include('sweetalert::alert')

</body>
</html>

</html>
