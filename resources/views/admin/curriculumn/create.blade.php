@extends('adminlte::page')

@section('title', 'E-Library')

@section('content_header')
    <h1>Halaman Tambah Mata Pelajaran Kelas {{ $classes }}</h1>
@stop

@section('content')
@include('flash::message')

{!! Form::open(['route' => ['admin.curriculumn.store',$classes], 'method' => 'POST','id' => 'curriculumn-form']) !!}
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
                <label for="">Nama Mata Pelajaran <span class="red">*</span></label>
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                @foreach($errors->get('name') as $error)
                  <span class="help-block text-danger">{{ $error }}</span>
                @endforeach

              </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        @include('layouts.partial.button')
      </div>

{!! Form::close() !!}
@stop

@section('js')
  {!! JsValidator::formRequest('App\Http\Requests\StudentRequest','#curriculumn-form') !!}
@stop
