<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Data Produk</title>
  @include('Templates.Table.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('Templates.navbar')

  <!-- /.navbar -->
  @include('Templates.left-sidebar')

  <!-- Main Sidebar Container -->
  

  <!-- Form Update -->
  <div class="content-wrapper">
    <section class="content">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>
                    @if(auth()->user()->level == 'super-admin')
                    Tambah Catatan Inventory
                    @else
                    Edit Data Inventory
                    @endif
                  </h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">
                      @if(auth()->user()->level == 'super-admin')
                      Tambah Data Catatan Inventory
                      @else
                      Edit Data Inventory
                      @endif
                    </li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if(isset($stock) && auth()->user()->level == 'admin')
                        <section class="update-form">
                            <form action="{{ url('update-stock',$stock->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-floating">
                                    <label for="nama_bahan">Nama Produk</label>
                                    <input type="text" class="form-control" id="nama_bahan" name="nama_bahan" placeholder="Input Nama Bahan" value="{{ $stock->nama_bahan }}">
                                </div>
                                <div class="form-floating">
                                    <label for="kategori_bahan">Kategori Bahan</label>
                                    <input type="text" class="form-control" id="kategori_bahan" name="kategori_bahan" placeholder="Input Kategori Bahan" value="{{ $stock->kategori_bahan }}">
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="stok_bahan">Stok Bahan</label>
                                    <input type="number" class="form-control" placeholder="Input Stok Bahan" id="stok_bahan" name="stok_bahan" value="{{ $stock->stok_bahan }}">
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="gambar_bahan">Gambar bahan</label>
                                    <input type="file" class="form-control-file" id="gambar_bahan" name="gambar_bahan"/>
                                </div>
                                <div class="form-floating mt-3">
                                    <button type="submit" class="btn btn-success">Ubah Data</button>
                                </div>
                            </div>
                            </form>
                        </section>
                        @elseif(isset($stock) && auth()->user()->level == 'super-admin')
                        <section class="update-form">
                          <form action="{{ url('update-stock',$stock->id) }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="form-floating">
                                  <label for="nama_bahan">Nama Produk</label>
                                  <input type="text" disabled class="form-control" id="nama_bahan" name="nama_bahan" placeholder="Input Nama Bahan" value="{{ $stock->nama_bahan }}">
                              </div>
                              <div class="form-floating">
                                  <label for="kategori_bahan">Kategori Bahan</label>
                                  <input type="text" disabled class="form-control" id="kategori_bahan" name="kategori_bahan" placeholder="Input Kategori Bahan" value="{{ $stock->kategori_bahan }}">
                              </div>
                              <div class="form-floating mb-3">
                                  <label for="stok_bahan">Stok Bahan</label>
                                  <input type="number" disabled class="form-control" placeholder="Input Stok Bahan" id="stok_bahan" name="stok_bahan" value="{{ $stock->stok_bahan }}">
                              </div>
                              <div class="form-floating mb-3">
                                  <label for="gambar_bahan">Gambar bahan</label>
                                  <input type="file" disabled class="form-control-file" id="gambar_bahan" name="gambar_bahan"/>
                              </div>
                              <div class="form-floating mb-3">
                                <label for="gambar_bahan">Tambah Catatan</label>
                                <textarea class="form-control" rows="5" id="catatan" name="catatan">{{ $stock->catatan }}</textarea>
                            </div>
                              <div class="form-floating mt-3">
                                  <button type="submit" class="btn btn-success">Ubah Data</button>
                              </div>
                          </div>
                          </form>
                      </section>
                        @elseif(isset($product) && auth()->user()->level == 'admin')
                        <section class="update-form">
                            <form action="{{ url('update-product',$product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-floating">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Input Nama Produk" value="{{ $product->nama_produk }}">
                                </div>
                                <div class="form-floating">
                                    <label for="kategori_produk">Kategori Produk</label>
                                    <input type="text" class="form-control" id="kategori_produk" name="kategori_produk" placeholder="Input Kategori Produk" value="{{ $product->kategori_produk }}">
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="stok_produk">Stok Produk</label>
                                    <input type="number" class="form-control" placeholder="Input Stok Produk" id="stok_produk" name="stok_produk" value="{{ $product->stok_produk }}">
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="gambar_produk">Gambar Produk</label>
                                    <input type="file" class="form-control-file" id="gambar_produk" name="gambar_produk"/>
                                </div>
                               
                                <div class="form-floating mt-3">
                                    <button type="submit" class="btn btn-success">Ubah Data</button>
                                </div>
                            </div>
                            </form>
                        </section>
                        @elseif(isset($product) && auth()->user()->level == 'super-admin')
                        <section class="update-form">
                          <form action="{{ url('update-product',$product->id) }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="form-floating">
                                  <label for="nama_produk">Nama Produk</label>
                                  <input  disabled type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Input Nama Produk" value="{{ $product->nama_produk }}">
                              </div>
                              <div class="form-floating">
                                  <label for="kategori_produk">Kategori Produk</label>
                                  <input  disabled type="text" class="form-control" id="kategori_produk" name="kategori_produk" placeholder="Input Kategori Produk" value="{{ $product->kategori_produk }}">
                              </div>
                              <div class="form-floating mb-3">
                                  <label for="stok_produk">Stok Produk</label>
                                  <input disabled type="number" class="form-control" placeholder="Input Stok Produk" id="stok_produk" name="stok_produk" value="{{ $product->stok_produk }}">
                              </div>
                              <div class="form-floating mb-3">
                                  <label for="gambar_produk">Gambar Produk</label>
                                  <input disabled type="file" class="form-control-file" id="gambar_produk" name="gambar_produk"/>
                              </div>
                              <div class="form-floating mb-3">
                                <label for="gambar_bahan">Tambah Catatan</label>
                                <textarea class="form-control" rows="5" id="catatan" name="catatan">{{ $product->catatan }}</textarea>
                            </div>
                              <div class="form-floating mt-3">
                                  <button type="submit" class="btn btn-success">Ubah Data</button>
                              </div>
                          </div>
                          </form>
                      </section>
                        @endif
                        
                    </div>
                </div>
            </div>
    </section>
  </div>

  <!-- Form Update -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('Templates.Table.script')
@include('sweetalert::alert')
</body>
</html>