@extends('layouts.user.master')

@section('content')
<div id="fh5co-work">
    <div class="container">
        <div class="row top-line animate-box">
            <div class="input-group">
                  <input type="text" class="form-control" placeholder="Judul Buku / Pengarang / Penulis" id="search">
                  <span class="input-group-btn">
                    <input class="btn btn-blue" type="button" style="height: 54px;" id="btn-search" value="Search">
                  </span>
            </div><!-- /input-group -->
          </div>
        <div class="post">
          @foreach ($book as $item)
                <div class="col-md-4 text-center animate-box">
                  <a class="work" href="{{ route('user.show',encrypt($item->id)) }}">
                    <div class="work-grid" style="background-image:url('{{ asset('storage/cover/'.$item->image)}}');">
                      <div class="inner">
                        <div class="desc">
                          <span class="cat">( Judul )</span>
                            <h3>{{ $item->title }}</h3>
                          <span class="cat">( Penulis )</span>
                            @if ($item->author)
                              <h4>{{ $item->author }}</h4>
                            @endif
                          <span class="cat">{{ $item->year }}</span>
                      </div>
                      </div>
                    </div>
                  </a>
                </div>
          @endforeach
        </div>
    </div>
  </div>

  <div id="fh5co-work" style="margin-top: -150px;height: 10px;">
    <div class="container">
        <center>
            {{ $book->links() }}
        </center>
    </div>
  </div>

@endsection

@section('js')
  <script type="text/javascript">
    $('#btn-search').click(function(e) {
        search();
    });

    $('#search').on('keypress', function(e) {
      if (e.keyCode == 13) {
        search();
      }
    });

    function search() {
      val = $('#search');
      $.ajax({
            url: '{{ route('user.book.find') }}',
            type: 'POST',
            data: {
              '_token': '{{ csrf_token() }}',
              'val' : val.val(),
            },
            success : function(data) {
              $('.post').fadeIn('slow').delay(200).html(data); 
            }
        });

      val.val('');
    }
  </script>
@endsection
