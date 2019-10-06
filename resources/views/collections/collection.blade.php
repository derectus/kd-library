@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
                <div class="books bg-content">
                    <div class="row ">
                        <div class="col-md-8 col-sm-8 text-left  ">
                            <h4>Koleksiyonlar</h4>
                        </div>
                        <div class="col-md-4 col-sm-4 text-right">
                            <form class="navbar-form navbar-left" action="{{ route('collections.search') }}"
                                  method="post">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Yayın Ara"
                                           value="{{ old('search') }}">
                                    <a type="button" class="btn btn-secondary">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    @if (count($books) > 0)
                        <div class="table-responsive">
                            <table class="table table-sm table-hover table-striped" style="width:100%">
                                <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" class="text-left">Başlık</th>
                                    <th scope="col">Yazar/Editör</th>
                                    <th scope="col">Yayınevi&nbsp;&nbsp;</th>
                                    <th scope="col">Tip&nbsp;&nbsp;</th>
                                    <th scope="col">Adet&nbsp;&nbsp;</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($books->unique('slug') as $book)
                                    <tr style="font-size: small">
                                        <td class="text-center media-item-image">
                                            @if(File::exists(public_path('storage/'.$book->slug.'.jpg')))
                                                <img
                                                    src="{{ asset('storage/'.$book->slug.'.jpg') }}" width="80px"
                                                    height="100px" alt="{{$book->name}}">
                                            @else
                                                <img
                                                    src="{{ asset('img/cover.png') }}">
                                            @endif
                                        </td>
                                        <td class="text-left  media-item-title">
                                            <a style="font-size: medium"
                                               href="{{ route('collections.book', $book->slug) }}"> {{ $book->title }}</a>
                                            <div class="hints media-item-meta">
                                                <div>
                                                    <span class="media-meta-field-name">Baskı</span>:
                                                    <span class="media-meta-field-value">{{ $book->edition }}</span>
                                                </div>
                                                <div>
                                                    <span>Basım Yılı</span>:
                                                    <span class="media-meta-field-value">
                                                        {{ date('d/m/Y', strtotime($book->publication_year)) }}
                                                    </span>
                                                </div>
                                                <div>
                                                    <span class="media-meta-field-name">ISBN</span>:
                                                    <span class="media-meta-field-value">{{ $book->isbn }}</span>&nbsp;
                                                </div>
                                            </div>
                                        </td>
                                        @if(count($book->author) > 0 && !is_null($book->author) )
                                            <td class="text-center hidden-xs">
                                                <div class="authors-tags" style="display:inline-block">
                                                    <div class="authors-tag">
                                                        @foreach($book->author as $author)
                                                            <span class="authors-tag-name">
                                                            <a href="{{ route('collections.author', $author->slug) }}">{{ count($book->author) > 1  && !$loop->last ?  $author->name.', ' : $author->name  }}</a>
                                                        </span>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        @else
                                            <td class="text-center hidden-xs">
                                                <div class="authors-tags" style="display:inline-block">
                                                    <div class="authors-tag">
                                                        <span class="authors-tag-name">
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif

                                        <td class="text-center  hidden-xs"><a
                                                href="{{ route('collections.publisher', $book->publishers->implode('slug',',')) }}">{{ $book->publishers->implode('name',',') }}</a>&nbsp;
                                        </td>
                                        <td class="hidden-xs">{{ $book->type }}&nbsp;</td>
                                        <td style=>{{ $book->copies }}&nbsp;&nbsp;</td>
                                        <td class="text-center">
                                            <a href="{{ route('collections.book', $book->slug) }}"
                                               class="btn-sm btn-success">Detay&nbsp;</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="col-md-12 text-center">
                            <hr>
                            <p> Herhangi bir eşleşme bulunmadı.</p>
                            <p><a class="btn btn-sm btn-info" href="{{route('collections.books')}}">Geri Dön</a>
                            </p>
                        </div>
                    @endif
                    {{ $books->onEachSide(3)->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
