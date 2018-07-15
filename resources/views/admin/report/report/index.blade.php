@extends('adminlte::page')

@section('title', 'E-Library')

@section('content_header')
    <h1>Halaman Report Analisis Buku</h1>
@stop

@section('content')
  @include('flash::message')
  <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                Analisis Kunjungan Buku
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="tables" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th width="30%">Judul Buku</th>
                      <th>Status Buku</th>
                      <th width="20%">Total Kunjungan</th>
                      <th>Tanggal Buku Dibuat</th>
                    </tr>
                  </thead>
                    <tbody>
                      @php
                        $no=1;
                      @endphp
                      @foreach ($book as $item)
                        <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $item->title }}</td>
                          <td>{{ ($item->is_active) ? 'Aktif' : 'Non Aktif' }}</td>
                          <td align="center">
                            <span class="fa fa-eye"></span> {{ $item->is_visited }}
                          </td>
                          <td>{{ $item->created_at }}</td>
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
