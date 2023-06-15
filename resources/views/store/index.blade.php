@extends('layouts.app')
@section('title', 'Data Store')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Store</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Data Store</li>
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
              <h3 class="card-title">Data Store</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <p><a href="{{ url('store/create')  }}" class="btn btn-primary"> Tambah Store </a></p>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode pegawai</th>
                  <th>Nama store</th>
                  <th>Alamat store</th>
                  <th>No telephone</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($store as $data)
                <tr>
                  <td>{{ $data['id'] }}</td>
                  <td>{{ $data['nama_store'] }}</td>
                  <td>{{ $data['alamat_store'] }}</td>
                  <td>{{ $data['no_telephone'] }}</td>
                  <td>
                    <a href="/store/update/{{ $data['id'] }}" class ="btn btn-success btn-sm">Update</a> 
                    || 
                    <a href="/store/delete/{{ $data['id'] }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class ="btn btn-danger btn-sm">Hapus</a>
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