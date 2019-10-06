@extends('layouts.app')
@section('content')
    <main class="app">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="books bg-content">
                        <h4>İsteklerim</h4>
                        <hr>
                        @include('errors.message')
                        @if(count($requests) > 0)
                            <div class="table-responsive">
                                <table class="table table-sm table-hover table-striped" style="width:100%">
                                    <thead class="bg-primary text-white">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col" class="text-left">İstek</th>
                                        <th scope="col">İstek Tarihi</th>
                                        <th scope="col">Dönüş Tarihi</th>
                                        <th scope="col">Durumu</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($requests as $request)
                                        @foreach ($request->book as $book)
                                            <tr scope="row" style="font-size: small">
                                                <td class="text-left media-item-image">
                                                    <img
                                                        src="https://ae85df921b92073b52e8-a126a45a4c59e90797d94cd877fbe744.ssl.cf3.rackcdn.com/cover.png"
                                                        alt=""/>
                                                </td>
                                                <td>
                                                    <div class="data-item-value">
                                                        <a href="{{ route('collections.book', $book->slug) }}">{{ $book->title }}</a>
                                                        <div class="hints data-item-meta">
                                                            <div><span class="media-meta-field-name">Edition</span>:
                                                                <span class="media-meta-field-value">1</span></div>
                                                            <div><span>Year</span>: <span
                                                                    class="media-meta-field-value">{{ date('d/m/Y', strtotime($book->publication_year)) }}</span>
                                                            </div>
                                                            <div><span class="media-meta-field-name">ISBN</span>: <span
                                                                    class="media-meta-field-value">{{ $book->isbn }}</span>&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-left hidden-xs">
                                                    <div class="authors-tags" style="display:inline-block">
                                                        <div class="authors-tag"><span
                                                                class="authors-tag-name">{{ date('d/m/Y', strtotime($request->request_date)) }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-left hidden-xs">
                                                    <div class="authors-tags" style="display:inline-block">
                                                        <div class="authors-tag"><span
                                                                class="authors-tag-name">{{ date('d/m/Y', strtotime($request->request)) }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-left hidden-xs">
                                                    @if ($request->status == 'pending')
                                                        <span class="btn-sm btn-warning" data-toggle="tooltip"
                                                              title="En kısa zamanda geri dönüş sağlanacaktır. Lütfen E-Postanızı kontrol ediniz.">Onay Bekliyor</span>
                                                    @endif
                                                </td>
                                                <td class="text-left hidden-xs">
                                                    <form action="{{ route('cancel.item', $request->id) }}" method="post" >
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <input type="submit" class="btn btn-sm btn-info" value="Vazgeç">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="col-md-12 text-center">
                                <hr>
                                <p> Henüz bekleyen bir isteğiniz bulunmamaktadır. !</p>
                                <p><a class="btn btn-sm btn-info" href="{{route('collections.books')}}">Kitap Seç</a>
                                </p>
                            </div>
                        @endif
                        {{ $requests->onEachSide(3)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
