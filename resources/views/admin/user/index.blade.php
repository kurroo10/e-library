@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Halaman Kelola Petugas</h1>
@stop

@section('content')
  @include('flash::message')
  <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <a href="{{route('admin.user.create')}} " class="btn btn-success">
                  <span class="fa fa-plus"></span> Tambah Petugas
                </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="tables" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIP</th>
                      <th>Nama Lengkap</th>
                      <th>Username</th>
                      <th>Tanggal Dibuat</th>
                      <th></th>
                    </tr>
                  </thead>
                    <tbody>
                      @php
                        $no=1;
                      @endphp
                      @foreach ($users as $item)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $item->nip }}</td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->user->username }}</td>
                          <td>{{ $item->user->created_at }}</td>
                          <td align="center">
                            <a href="#" class="btn btn-info btn-simple btn-xs btn-view" title="Detail"> <span class="fa fa-eye"></span></a>
                            <a href="#" class="btn btn-warning btn-simple btn-xs btn-edit" title="Edit"> <span class="fa fa-edit"></span></a>
                            <a href="#" class="btn btn-danger btn-simple btn-xs btn-delete" title="Delete" data-name='{{$item->name}}' data-url='{{ route('admin.user.destroy', $item->nip) }}'> <span class="fa fa-trash"></span></a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
@stop

@section('js')
  <script type="text/javascript">
    $(document).on('click','.btn-delete',function () {
        var nama = $(this).data('name');
        var url = $(this).data('url');
        swal({
          title: "Apakah Anda Yakin?",
          text: "Anda akan menghapus data milik "+nama+"!",
          icon: "error",
          buttons: ["Batal", "Hapus!"],
          dangerMode :true,
        })
        .then((willDelete) => {
          if (willDelete) {
            location.replace(url);
          }
        });
      });
  </script>
@stop
