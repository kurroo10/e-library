@foreach ($book as $item)
  <div class="">
      <div class="col-md-4 text-center">
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
  </div>
@endforeach
