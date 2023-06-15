@extends('layouts.app')
@section('title', 'Input Pegawai')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambahkan Pegawai Baru</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Input Pegawai</li>
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
              <h3 class="card-title">Input Pegawai</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ url('pegawai/store') }}">
                @csrf
                @method('POST')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Pegawai</label>
                  <input type="text" class="form-control" id="inputNamaPegawai" name="nama_pegawai" placeholder="Nama Pegawai">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jenis Kelamin</label>
                  <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki - laki">
                        <label class="form-check-label">laki - laki</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">
                        <label class="form-check-label">Perempuan</label>
                      </div>
                  </div>
                  {{-- <input type="text" class="form-control" id="inputJKPegawai" name="jenis_kelamin" placeholder="Jenis Kelamin"> --}}
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jabatan</label>
                  <input type="text" class="form-control" id="inputJabatanPegawai" name="jabatan" placeholder="Jabatan">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">No Handphone</label>
                  <input type="text" class="form-control" id="inputNoHandphonePegawai" name="no_handphone" placeholder="No Handphone">
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