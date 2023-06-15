@extends('layouts.app')
@section('title', 'Register User')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Masukkan Data User Baru</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Register User</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
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
              <h3 class="card-title">Register User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ url('user/save') }}">
                @csrf
                @method('POST')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email User</label>
                  <input type="text" class="form-control" id="inputEmail" name="email" placeholder="Email User Baru" value="{{old('email')}}">
                  @error('email')     
                  <div class="ml-2 text-sm text-danger">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama User</label>
                  <input type="text" class="form-control" id="inputNama" name="name" placeholder="Nama User Baru" value="{{old('name')}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password User Baru">
                </div>
                <div class="form-group">
                  <label for="exampleInputRole1">Role</label>
                  <select name="roles" id="roles" class="form-control">
                      <option value="Pegawai" @if(old('roles') == 'Pegawai') selected @endif; class="form-control">Pegawai</option>
                      <option value="Owner" @if(old('roles') == 'Owner') selected @endif; class="form-control">Owner</option>
                  </select>
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