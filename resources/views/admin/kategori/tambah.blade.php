@extends('layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin-kategori') }}">Kategori</a></li>
              <li class="breadcrumb-item">Tambah</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Tambah Kategori</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <form role="form" action="{{ route('admin-kategori-form') }}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}

                  <div class="row">
                    <div class="col-sm-6">
                    
                      <!-- text input -->
                      <div class="form-group">
                        <label for="text-input" class=" form-control-label">Nama</label>
                        <input type="text"  name="nama" placeholder="Nama" class="form-control" required>
                      </div>
                    </div>
                     <!-- text input -->
                  </div>

                  <div class="card-footer">
                      <button type="submit" class="btn btn-primary ">Submit</button>
                  </div>

                </form>
              </div>

            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection