@extends('layouts.app')
@section('title', 'Input Transaksi')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Input Transaksi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Input Transaksi</li>
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
              <h3 class="card-title">Transaksi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ url('transaksi/store') }}">
                @csrf
                @method('POST')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Barang</label>
                  <select name="id_barang" id="barangs">
                      @foreach($barang as $data)
                      <option value="{{ $data['id'] }}">{{ $data['nama_barang'] }} stok : {{ $data['stok'] }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah</label>
                  <input type="number" class="form-control" id="inputJumlahTransaksi" name="jumlah" placeholder="Jumlah">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Pilih Store</label>
                  <select name="store_id" id="stores">
                      @foreach($store as $data)
                      <option value="{{ $data['id'] }}">{{ $data['nama_store'] }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Pilih Penanggung Jawab</label>
                  <select name="penanggung_jawab_id" id="pegawais">
                      @foreach($pegawai as $data)
                      <option value="{{ $data['id'] }}">{{ $data['nama_pegawai'] }}</option>
                      @endforeach
                  </select>
                </div>
                {{-- <div class="form-group">
                  <label for="exampleInputFile">Kategori</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div> --}}
                {{-- <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> --}}
              </div>
              <!-- /.card-body -->

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