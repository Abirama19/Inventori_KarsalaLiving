@extends('layouts.app')
@section('title', 'Data Barang')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Barang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Data Barang</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Barang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <p><a href="{{ url('barang/create')  }}" class="btn btn-primary"> Tambah Barang </a></p>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode barang</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Satuan</th>
                  <th>Stok</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($barang as $data)
                <tr>
                  <td>{{ $data['id'] }}</td>
                  <td>{{ $data['nama_barang'] }}</td>
                  <td>{{ $data['kategori'] }}</td>
                  <td>{{ $data['satuan'] }}</td>
                  <td>{{ $data['stok'] }}</td>
                  <td>
                    <a href="/barang/update/{{ $data['id'] }}" class ="btn btn-success btn-sm">Update</a> 
                    || 
                    <a href="/barang/delete/{{ $data['id'] }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class ="btn btn-danger btn-sm">Hapus</a>
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
  <!-- /.content -->
</div>
@endsection