@extends('layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-left">
            <li >
              <div class="col-sm-6">
            
              </div>
            </li>


          </ol>
         
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
              <li class="breadcrumb-item">Riwayat</li>
            </ol>
          </div>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
   
                
            
    <!-- Main content -->
    <section class="content">
    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php $no=1; ?>
                                        @foreach($data as $dt)
                                        <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $dt->user->name}}</td>
                                            <td>{{ $dt->nama}}</td>
                                            <td>
                                            @if ($dt->kategori === null)
                                            @else
                                              {{$dt->kategori->nama }}
                                            @endif 
                                            </td>
                                            <td>{{ date("H:i", strtotime($dt->created_at)) }}</td>

                                            <td>{{ date("d-m-Y", strtotime($dt->created_at)) }}</td>

                                        <?php $no++; ?>    
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection