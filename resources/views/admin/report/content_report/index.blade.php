@extends('adminlte::page')

@section('title', 'E-Library')

@section('content_header')
    <h1>Halaman Report Buku Bermasalah</h1>
@stop

@section('content')
  @include('flash::message')
  <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="tables" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul Buku</th>
                      <th>Pelapor</th>
                      <th width="40%">Laporan</th>
                      <th>Tanggal Laporan</th>
                      <th></th>
                    </tr>
                  </thead>
                    <tbody>
                      @php
                        $no=1;
                      @endphp
                      @foreach ($content as $item)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $item->book->title }}</td>
                          <td>{{ $item->user->name }}</td>
                          <td>{{ $item->description }}</td>
                          <td>{{ $item->created_at }}</td>
                          <td align="center">
                            <a href="{{ route('user.show',encrypt($item->book_id)) }}" class="btn btn-primary btn-simple btn-xs" title="Lihat Buku" target="_blank"> <span class="fa fa-link"></span></a>
                            @if ($item->book->is_active)
                              <a href="#" class="btn btn-warning btn-simple btn-xs btn-nonactive" title="Non Aktifkan Buku" data-name='{{$item->book->title}}' data-url='{{ route('admin.content_report.nonactive', $item->book_id) }}'> <span class="fa fa-close"></span></a>
                            @else
                              <a href="#" class="btn btn-success btn-simple btn-xs btn-active" title="Aktifkan Buku" data-name='{{$item->book->title}}' data-url='{{ route('admin.content_report.active', $item->book_id) }}'> <span class="fa fa-check"></span></a>
                            @endif
                              <a href="#" class="btn btn-danger btn-simple btn-xs btn-delete" title="Hapus Laporan" data-name='{{$item->book->title}}' data-url='{{ route('admin.content_report.destroy', $item->id) }}'> <span class="fa fa-trash"></span></a>
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

@stop
