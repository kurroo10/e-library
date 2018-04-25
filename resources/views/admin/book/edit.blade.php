@extends('adminlte::page')

@section('title', 'E-Library')

@section('content_header')
    <h1>Halaman Tambah Buku Kelas {{ $classes }}</h1>
@stop

@section('content')
@include('flash::message')

{!! Form::open(['route' => ['admin.book.update',$classes,$book->id], 'method' => 'POST','id' => 'book-form','files' => true]) !!}
  <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">ISBN <span class="red">*</span></label>
                {!! Form::text('isbn', $book->isbn, ['class' => 'form-control','maxlength' => '15']) !!}
                @foreach($errors->get('isbn') as $error)
                  <span class="help-block text-danger">{{ $error }}</span>
                @endforeach

              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Judul Buku <span class="red">*</span></label>
                {!! Form::text('title', $book->title, ['class' => 'form-control']) !!}
                @foreach($errors->get('title') as $error)
                  <span class="help-block text-danger">{{ $error }}</span>
                @endforeach
              </div>

              <div class="form-group">
                <label>Penulis</label>
                {!! Form::text('author', $book->author, ['class' => 'form-control']) !!}
                @foreach($errors->get('author') as $error)
                  <span class="help-block text-danger">{{ $error }}</span>
                @endforeach
              </div>

              <div class="form-group">
                <label>Penerbit</label>
                {!! Form::text('publisher', $book->publisher, ['class' => 'form-control']) !!}
                @foreach($errors->get('publisher') as $error)
                  <span class="help-block text-danger">{{ $error }}</span>
                @endforeach
              </div>

              <div class="form-group">
                <label>Tahun Terbit </label>
                {!! Form::select('year',$year, $book->year, ['class' => 'form-control', 'placeholder' => 'Pilih Tahun Terbit']) !!}
                @foreach($errors->get('year') as $error)
                  <span class="help-block text-danger">{{ $error }}</span>
                @endforeach
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Sinopsis Buku</label>
                {!! Form::textarea('description', $book->description, ['class' => 'form-control', 'style' => 'height:108px']) !!}
                @foreach($errors->get('description') as $error)
                  <span class="help-block text-danger">{{ $error }}</span>
                @endforeach
              </div>

              <div class="form-group">
                <label>Mata Pelajaran <span class="red">*</span></label>
                {!! Form::select('curriculumn',$curriculumn, $book->curriculumn_id, ['class' => 'form-control', 'placeholder' => 'Pilih Mata Pelajaran']) !!}
                @foreach($errors->get('curriculumn') as $error)
                  <span class="help-block text-danger">{{ $error }}</span>
                @endforeach
              </div>

              <div class="form-group">
                <label>File PDF Buku  <span class="red">*</span></label>
                {!! Form::file('file', ['class' => 'form-control', 'accept' => 'application/pdf']) !!}
                @foreach($errors->get('file') as $error)
                  <span class="help-block text-danger">{{ $error }}</span>
                @endforeach
              </div>

              <div class="form-group">
                <label>Cover Buku </label>
                {!! Form::file('cover', ['class' => 'form-control', 'accept' => 'image/*']) !!}
                @foreach($errors->get('cover') as $error)
                  <span class="help-block text-danger">{{ $error }}</span>
                @endforeach
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        @include('layouts.partial.button')
        <input type="hidden" name="_method" value="put">

      </div>

{!! Form::close() !!}
@stop

@section('js')
  {!! JsValidator::formRequest('App\Http\Requests\BookRequest','#book-form') !!}
@stop
