@extends('adminlte::page')

@section('title', 'E-Library')

@section('content_header')
    <h1>Halaman Kelola Buku Kelas {{ $classes }}</h1>
@stop

@section('content')
@include('flash::message')
    <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                      <a href="{{ route('admin.book.create',$classes) }}" class="btn btn-success">
                          <span class="fa fa-plus"> Tambah Data Buku</span>
                      </a>
                  </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="tables" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th width="1%">No</th>
                        <th>ISBN</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Cover Buku</th>
                        <th>Kelas</th>
                        <th>Mata Pelajaran</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        @php
                          $no = 1;
                        @endphp
                          @foreach ($book as $item)
                            <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $item->isbn }}</td>
                              <td>{{ $item->title }}</td>
                              <td>{{ $item->author }}</td>
                              <td>{{ $item->publisher }}</td>
                              <td>{{ $item->year }}</td>
                              <td> <img src="{{ asset("storage/cover/$item->image") }}" width="150px" height="100px"> </td>
                              <td>{{ $item->class->name }}</td>
                              <td>{{ $item->curriculumn->name }}</td>
                              <td>
                                <a href="{{ route('file.pdf',$item->id) }}" target="_blank" class="btn btn-info btn-xs">
                                  <span class="fa fa-file"> PDF</span>
                                </a>
                              </td>
                            </tr>
                          @endforeach
                      </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
@stop
