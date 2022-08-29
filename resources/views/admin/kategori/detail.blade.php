@extends('layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h5 class="m-0 "> Detail Kategori </h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin-kategori') }}">Kategori</a></li>
              <li class="breadcrumb-item">Detail</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">

        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Detail Kategori</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <td><b class="d-block">Nama</b></td>
                    <td>{{ $data->nama}}</td>
                    <tr>
                    <td><b class="d-block">Tanggal Dibuat</b></td>
                    <td>{{ date("d-m-Y", strtotime($data->created_at)) }}</td>
                    <tr>
                    <td><b class="d-block">Tanggal Diedit</b></td>
                    <td>{{ date("d-m-Y", strtotime($data->updated_at)) }}</td>
                    <tr>
                    <td><b class="d-block">Dibuat Oleh</b></td>
                    <td>{{ $data->user->name}}</td>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body.. -->
            </div>
            <!-- /.card -->
                    <div><a href="{{ route('admin-kategori') }}" class="btn btn-success">Kembali</a></div><br>
          </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection