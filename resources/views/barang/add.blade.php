@extends('layouts.app')
@section('title', 'Input Barang')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambahkan Barang Baru</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Input Barang</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Input Barang</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ url('barang/store') }}">
                @csrf
                @method('POST')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Barang</label>
                  <input type="text" class="form-control" id="inputNamaBarang" name="nama_barang" placeholder="Nama Barang">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kategori</label>
                  <input type="text" class="form-control" id="inputKategoriBarang" name="kategori" placeholder="Kategori">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Satuan</label>
                  <input type="text" class="form-control" id="inputSatuanBarang" name="satuan" placeholder="Satuan">
                </div>
                  <div class="form-group">
                  <label for="exampleInputPassword1">Stok</label>
                  <input type="number" class="form-control" id="inputStokBarang" name="stok" placeholder="Stok">
                </div>
                
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
            
        </div>
            <!-- /.card-body -->
      </div>
          <!-- /.card -->
    </div>
        <!--/.col (right) -->
  </section>
  <!-- /.content -->
</div>
@endsection