@extends('adminlte::page')

@section('title', 'E-Library | Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<section class="content">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box" id="btn-content" style="cursor: pointer;">
              <span class="info-box-icon bg-red">
                  <i class="fa fa-warning"></i>
                </span>
  
              <div class="info-box-content">
                <span class="info-box-text">Buku Bermasalah</span>
                <span class="info-box-number">{{$content_report}}<small> Laporan</small></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box" id="btn-admin" style="cursor: pointer;">
              <span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Petugas</span>
                <span class="info-box-number">{{$admin}} Akun</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
  
          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>
  
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-book"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Buku</span>
                <span class="info-box-number">{{$book}} Judul</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Siswa</span>
                <span class="info-box-number">{{ $student }} Orang</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
      <div class="col-xs-6">
        <div class="box">
          <div class="box-header">
            <h3>5 Buku Terakhir Di Input</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul Buku</th>
                  <th>Penulis</th>
                  <th>Penerbit</th>
                  <th>Tahun Terbit</th>
                </tr>
              </thead>
                <tbody>
                  @php
                    $no=1;
                  @endphp
                  @foreach ($last_book as $item)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $item->title }}</td>
                      <td>{{ $item->author }}</td>
                      <td>{{ $item->publisher }}</td>
                      <td>{{ $item->year }}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>

          <div class="col-xs-6">
              <div class="box">
                <div class="box-header">
                  <h3>5 Petgas Terakhir Di Daftarkan</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                      <tbody>
                        @php
                          $no=1;
                        @endphp
                        @foreach ($last_admin as $item)
                          <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
</section>

@stop

@section('js')
    <script>
        $(document).ready(function(){
            $('#btn-content').click(function(event) {
                window.location.href = "{{route('admin.content_report.index')}}";
            });

            $('#btn-admin').click(function(event) {
                window.location.href = "{{route('admin.user.index')}}";
            });

        });
    </script>
@endsection