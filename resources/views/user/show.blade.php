@extends('layouts.user.master')

@section('content')
  
  <div id="fh5co-work">
    <div class="container">
        <div class="col-md-2">
    <img src="{{ asset('storage/cover/'.$book->image)}}" alt="" width="500px" height="400px">
  </div>
  <div class="col-md-10">
    <div class="col-md-8 col-md-offset-3 col-md-push-2 text-left fh5co-heading">
        <h2>{{ $book->title }}</h2>
        <p>
          @if ($book->description)
            {{ $book->description }}
          @else
            Tidak Ada Sinopsis Pada Buku Ini.
          @endif
        </p>

        <div class="role">
          <table width="100%">
            <tr>
              <td>Penulis</td>
              <td>:</td>
              <td>{{ $book->author }}</td>
            </tr>

            <tr>
              <td>Penerbit</td>
              <td>:</td>
              <td>{{ $book->publisher }}</td>
            </tr>

            <tr>
              <td>Tahun Terbit</td>
              <td>:</td>
              <td>{{ $book->year }}</td>
            </tr>

            <tr>
              <td>Buku Kelas</td>
              <td>:</td>
              <td>{{ $book->class->name }}</td>
            </tr>
          </table>
        </div>


        <a href="#" class="btn btn-danger" id="report">
          <i class="icon-flag"></i>
          Laporkan Buku
        </a>
        <a href="{{ route('user.pdf',encrypt($book->id)) }}" class="btn btn-info" target="_blank">
          <i class="icon-file"></i> PDF
        </a>
      </div>
  </div>
    </div>
  </div>

@endsection


@section('js')
    <script>
        $('#report').click(function(event) {
            $('#reportModal').modal('show');
        });
    </script>
@endsection
<div id="reportModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Laporkan Buku {{$book->title}}</h4>
      </div>
      <div class="modal-body">
        <form action="show_submit" method="get" accept-charset="utf-8">
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="name" value="{{ $user->name }}" placeholder="" class="form-control" readonly="yes">
            </div>

            <div class="form-group">
                <label for="">Kelas</label>
                <input type="text" name="class" value="{{ $user->class->slug }}" placeholder="" class="form-control" readonly="yes">
            </div>

            <div class="form-group">
                <label for="">Tanggal Lapor</label>
                <input type="text" name="date" value="{{ date('d-m-Y H:i:s') }}" placeholder="" class="form-control" readonly="yes">
            </div>
            
            <div class="form-group">
                <label for="">Isi Laporan</label>
                <textarea name="report" class="form-control" style="resize: none;"></textarea>
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>