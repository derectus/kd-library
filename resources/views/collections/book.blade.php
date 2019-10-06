@extends('layouts.app')

@section('content')
    <main class="app">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="books bg-content">
                        <h4>{{ $book->title }}</h4>
                        <hr>
                        @include('errors.message')
                        @if(count($errors) > 0)
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </ul>
                        @endif
                        <div class="row">
                            <div class="col-md-9 col-md-pull-3 col-sm-7 col-sm-pull-5">
                                <div class="data-items data-items-horizontal">
                                    <div class="data-item">
                                        <div class="catalog-item data-item-field">Tip</div>
                                        <div class="catalog-item data-item-value">{{ $book->type }}</div>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-item-field">Yazarlar</div>
                                        @if(count($book->author) > 0 && !is_null($book->author) )
                                            @foreach($book->author as $author)
                                                <div class="data-item-value">
                                                    <a href="{{ route('collections.author', $author->slug) }}">
                                                        {{ count($book->author) > 1  && !$loop->last ?  $author->name.', ' : $author->name  }}
                                                    </a>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="data-item-value"></div>
                                        @endif
                                    </div>
                                    <div class="data-item">
                                        <div class="data-item-field">ISBN</div>
                                        <div class="data-item-value">{{ $book->isbn }}</div>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-item-field">Kategori</div>
                                        <div class="data-item-value"><a
                                                href="{{ route('collections.category', $book->categories->implode('slug',',')) }}">{{ $book->categories->implode('name',',') }}</a>
                                        </div>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-item-field">Baskı</div>
                                        <div class="data-item-value">{{ $book->edition }}</div>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-item-field">Yayın Yılı</div>
                                        <div
                                            class="data-item-value">{{ date('d/m/Y', strtotime($book->publication_year)) }}</div>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-item-field">Yayınevi</div>
                                        <div class="data-item-value"><a
                                                href="{{ route('collections.publisher',$book->publishers->implode('slug',',')) }}">{{ $book->publishers->implode('name',',') }}</a>
                                        </div>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-item-field">Kitap Adeti</div>
                                        <div class="data-item-value">{{ $book->copies }}</div>
                                    </div>
                                    <div class="data-item">
                                        <div class="data-item-field">Açıklama</div>
                                        <div class="data-item-value">
                                            <br>
                                            <p class="text-left" style="margin-left: 75px">
                                                {!! $book->description !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-md-push-9 col-sm-5 col-sm-push-7">
                                <div class="media-item-image text-center" style="margin-right:10px;">
                                    @if(File::exists(public_path('storage/'.$book->slug.'.jpg')))
                                        <img
                                            src="{{ asset('storage/'.$book->slug.'.jpg') }}" width="225px"
                                            height="275px" alt="{{ $book->name }}">
                                    @else
                                        <img
                                            src="{{ asset('img/cover.png') }}" alt="{{ $book->name }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-10 ">
                                <div style="margin-left: 50px" class="table-responsive-md">
                                    <table class="table table-sm table-bordered table-hover ">
                                        <thead class="thead-light">
                                        <th scope="col">Kopya No</th>
                                        <th scope="col">Lokasyon</th>
                                        <th scope="col">Dönüş Tarihi</th>
                                        <th scope="col">Durumu</th>
                                        </thead>
                                        <tbody>
                                        @foreach($details as $key => $detail)
                                            <tr>
                                                <td> {{ $key+1 }}</td>
                                                <td> {{ $detail->location->name != '' ? $detail->location->name  : '' }}</td>
                                                <td> {{ $detail->return_date != '' ? date('d/m/Y', strtotime($detail->return_date )) : '' }}</td>
                                                <td> @if($detail->availability == 1)
                                                        @auth
                                                            <span class="apply-book btn-sm btn-success"
                                                                  data-toggle="modal"
                                                                  data-id="{{ $detail->book_id }}"
                                                                  data-target="#Modal"> Müsait</span>
                                                        @else
                                                            <a class="btn-sm btn-success" href="{{ route('login') }}">
                                                                Müsait</a>
                                                        @endauth
                                                    @else
                                                        <span class="btn-sm btn-danger"> Müsait Değil</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @auth
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('apply.item',$book->slug) }}" method="post">
                            {{ csrf_field() }}
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $book->title }} için başvur !</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="startDate"
                                           class="col-md-4 col-form-label text-md-right">{{ __('İstek Tarihi') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" id="startDate"
                                               class="form-control" name="startDate"
                                               data-toggle="datepicker" value="{{ date("Y-m-d") }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="request_date"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Dönüş Tarihi') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" id="startDate" name="endDate"
                                               class="form-control"
                                               data-toggle="datepicker" value="{{ date("Y-m-d") }}">
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group row">
                                        <label for="request_note"
                                               class="col-md-4 col-form-label text-md-right">{{ __('İstek Notu') }}</label>
                                        <textarea class="form-control col-md-6" name="note"
                                                  id="exampleFormControlTextarea1" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Vazgeç
                                </button>
                                <button type="submit" class="btn btn-sm btn-primary" name="book_id" id="id" value="">
                                    Onay
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </main>
@endsection
@section('extra_footer')
    <script>
        $(function () {
            $('[data-toggle="datepicker"]').datepicker({
                autoHide: true,
                zIndex: 2048,
                format: 'yyyy-mm-dd',
                startDate: '{{ date("Y-m-d") }}',
                daysMin: ['Pz', 'Pzt', 'Sal', 'Çrş', 'Prş', 'Cum', 'Cmt'],
                months: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık']
            });
        });
    </script>
    <script>
        $(document).on("click", ".apply-book", function () {
            let book_id = $(this).data('id');
            $('.modal-footer #id').val(book_id);
        });
    </script>
@endsection
