@extends('layouts.app')
@section('title', 'Data Transaksi')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Transaksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Data Transaksi</li>
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
              <h3 class="card-title">Data Riwayat Transaksi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <p><a href="{{ url('transaksi/create')  }}" class="btn btn-primary"> Lakukan Transaksi </a></p>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode transaksi</th>
                  <th>Nama barang</th>
                  <th>Jumlah</th>
                  <th>Nama Store</th>
                  <th>Penanggung Jawab</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transaksi as $data)
                <tr>
                  <td>{{ $data['id'] }}</td>
                  <td>{{ $data['barang']['nama_barang'] }}</td>
                  <td>{{ $data['jumlah'] }}</td>
                  <td>{{ $data['store']['nama_store'] }}</td>
                  <td>{{ $data['penanggung_jawab']['nama_pegawai'] }}</td>
                  <td>
                    <a href="/transaksi/delete/{{ $data['id'] }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class ="btn btn-danger btn-sm">Hapus</a>
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