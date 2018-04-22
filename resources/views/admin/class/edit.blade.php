@extends('adminlte::page')

@section('title', 'E-Library')

@section('content_header')
    <h1>Halaman Tambah Kelas</h1>
@stop

@section('content')

{!! Form::open(['route' => ['admin.classes.update',$classes->id], 'method' => 'POST','id' => 'class-form']) !!}
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
                <label for="">Kelas <span class="red">*</span></label>
                {!! Form::text('class', $classes->name, ['class' => 'form-control','maxlength' => '18']) !!}
                @foreach($errors->get('class') as $error)
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
  {!! JsValidator::formRequest('App\Http\Requests\ClassRequest','#class-form') !!}
@stop
