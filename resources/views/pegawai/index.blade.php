@extends('layouts.app')
@section('title','Data Pegawai')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pegawai</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Data Pegawai</li>
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
              <h3 class="card-title">Data Pegawai</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <p><a href="{{ url('pegawai/create')  }}" class="btn btn-primary"> Tambah Pegawai </a></p>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode pegawai</th>
                  <th>Nama pegawai</th>
                  <th>Jenis kelamin</th>
                  <th>Jabatan</th>
                  <th>No handphone</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pegawai as $data)
                <tr>
                  <td>{{ $data['id'] }}</td>
                  <td>{{ $data['nama_pegawai'] }}</td>
                  <td>{{ $data['jenis_kelamin'] }}</td>
                  <td>{{ $data['jabatan'] }}</td>
                  <td>{{ $data['no_handphone'] }}</td>
                  <td>
                    <a href="/pegawai/update/{{ $data['id'] }}" class ="btn btn-success btn-sm">Update</a> 
                    || 
                    <a href="/pegawai/delete/{{ $data['id'] }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class ="btn btn-danger btn-sm">Hapus</a>
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