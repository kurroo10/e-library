@extends('adminlte::page')

@section('title', 'E-Library')

@section('content_header')
    <h1>Halaman Tambah Petugas</h1>
@stop

@section('content')

{!! Form::open(['route' => ['admin.user.store'], 'method' => 'POST','id' => 'user-form']) !!}
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
                <label for="">NIP <span class="red">*</span></label>
                {!! Form::text('nip', null, ['class' => 'form-control','maxlength' => '18']) !!}
                @foreach($errors->get('nip') as $error)
                  <span class="help-block text-danger">{{ $error }}</span>
                @endforeach

              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Nama Lengkap <span class="red">*</span></label>
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                @foreach($errors->get('name') as $error)
                  <span class="help-block text-danger">{{ $error }}</span>
                @endforeach
              </div>

              <div class="form-group">
                <label>Jenis Kelamin <span class="red">*</span> </label>
                {!! Form::select('gender',['l' => 'Laki-Laki', 'p' => 'Perempuan'], [], ['class' => 'form-control', 'placeholder' => 'Pilih Jenis Kelamin']) !!}
                @foreach($errors->get('gender') as $error)
                  <span class="help-block text-danger">{{ $error }}</span>
                @endforeach
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Email <span class="red">*</span></label>
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                @foreach($errors->get('email') as $error)
                  <span class="help-block text-danger">{{ $error }}</span>
                @endforeach
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Username <span class="red">*</span></label>
                  {!! Form::text('username', null, ['class' => 'form-control']) !!}
                  @foreach($errors->get('username') as $error)
                    <span class="help-block text-danger">{{ $error }}</span>
                  @endforeach
              </div>

              <div class="form-group">
                <label>Password <span class="red">*</span></label>
                  {!! Form::text('password', null, ['class' => 'form-control']) !!}
                  @foreach($errors->get('password') as $error)
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
      </div>

{!! Form::close() !!}
@stop

@section('js')
  {!! JsValidator::formRequest('App\Http\Requests\UserRequest','#user-form') !!}
@stop
