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
                <h3 class="m-0 "> <a class="btn btn-primary" href="{{ route('admin-kategori-form') }}">Tambah </a> </h3>
              </div>
            </li>

            <li >
              <div class="col-sm-6">
                <h3 class="m-0 "> <a class="btn btn-primary" href="{{ route('admin-kategori-riwayat') }}">Riwayat </a> </h3>
              </div>
            </li>


          </ol>
         
          </div><!-- /.col -->


          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
              <li class="breadcrumb-item">Kategori</li>
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
                                        <th>Nama</th>
                                        <th>id</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Tanggal Diubah</th>
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
                                            <td>{{ $dt->nama}}</td>
                                            <td>{{ $dt->id}}</td>
                                            <td>{{ date("d-m-Y", strtotime($dt->created_at)) }}</td>
                                            <td>{{ date("d-m-Y", strtotime($dt->updated_at)) }}</td>
                                            <td>
                                              <a href= "{{ url('/admin/home/kategori/detail',['id'=>Crypt::encrypt($dt->id)]) }}" class="btn btn-success">Detail</a>
                                            </td>
                                            <td>
                                              <a href= "{{ url('/admin/home/kategori/edit',['id'=>Crypt::encrypt($dt->id)]) }}" class="btn btn-warning">Edit</a>
                                            </td>
                                            <td>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#a{{ $no }}">Hapus</button>
                                                          <div class="modal fade" id="a{{ $no }}" tabindex="-1" aria-labelledby="a{{ $no }}"  aria-hidden="true">
                                                            <div class="modal-dialog">
                                                              <div class="modal-content">
                                                                <div class="modal-header bg-danger">
                                                                  <h5 class="modal-title">Hapus</h5>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                  </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                  <center><h6>Data "{{ $dt->nama}}" Akan Dihapus </h6> Apakah Anda Yakin ?</center>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                  <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                  <form action="{{ url('/admin/home/kategori',['id'=>Crypt::encrypt($dt->id)]) }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                                  </form>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                            </td> 

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