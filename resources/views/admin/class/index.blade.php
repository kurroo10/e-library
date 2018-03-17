@extends('adminlte::page')

@section('title', 'E-Library | Kelola Kelas')

@section('content_header')
    <h1>Halaman Kelola Kelas</h1>
@stop

@section('content')
    <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                      <a href="" class="btn btn-success">
                          <span class="fa fa-plus"> Tambah Data Kelas</span>
                      </a>
                  </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="tables" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th width="1%">No</th>
                        <th>Kelas</th>
                        <th>Tanggal Input</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        
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