@extends('layouts.app')
@section('title', 'Update Store')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>General Form</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Update Store</li>
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
              <h3 class="card-title">Update Store</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ url('store/update') }}">
                @csrf
                @method('POST')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Id</label>
                  <input type="text" class="form-control" value="{{ $id }}" id="inputIdStore" name="id" readonly>
                </div>  
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Store</label>
                  <input type="text" class="form-control" id="inputNamaStore" name="nama_store" placeholder="Nama Store">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat Store</label>
                  <input type="text" class="form-control" id="inputAlamatStore" name="alamat_store" placeholder="Alamat Store">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">No Telephone</label>
                  <input type="text" class="form-control" id="inputNoTelephoneStore" name="no_telephone" placeholder="No Telephone">
                </div>
                
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