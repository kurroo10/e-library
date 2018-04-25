@extends('layouts.user.master')

@section('content')
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


  			<a href="#" class="btn btn-danger">
          <i class="icon-flag"></i>
          Laporkan Buku
        </a>
        <a href="{{ route('user.pdf',encrypt($book->id)) }}" class="btn btn-info" target="_blank">
          <i class="icon-file"></i> PDF
        </a>
  		</div>
  </div>

@endsection
