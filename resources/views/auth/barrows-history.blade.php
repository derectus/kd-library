@extends('layouts.app')
@section('content')
    <main class="app">
        <div class="container">
            <div class="row profile">
                <div class="col-md-3">
                    <div class="profile-sidebar bg-content">
                        <div class="profile-userpic">
                            <img src="https://image.flaticon.com/icons/png/512/206/206879.png" class="img-responsive"
                                 alt="">
                        </div>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-job">
                                {{ Auth::user()->name }}
                            </div>
                        </div>
                        <div class="profile-usermenu">
                            <ul class="list-group-flush ">
                                <li class="list-group-item-action ">
                                    <a href="{{ route('profile') }}"><i class="fa fa-home"></i> Profil </a>
                                </li>
                                <li class="list-group-item-action">
                                    <a href="{{ route('requests-history') }}"><i class="fa fa-book"></i> İstek Geçmişi
                                    </a>
                                </li>
                                <li class="list-group-item-action">
                                    <a href="{{ route('contact') }}"><i class="fa fa-flag"></i> Destek </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="books bg-content">
                        <h4>İstek Geçmişi</h4>
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($requests as $request)
                                        @foreach ($request->book as $book)
                                            <tr style="font-size: small">
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
                                                                class="authors-tag-name">{{ date('d/m/Y', strtotime($request->return_date)) }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-left hidden-xs">
                                                    @if ($request->status != 'pending')
                                                        <span
                                                            class="btn-sm btn-{{ $request->status == 'unsuccessful' ?  'danger' : ($request->return_status ? 'success' : 'warning')  }}">
                                                            {{  $request->status ==  'unsuccessful' ? 'Reddedildi' : ($request->return_status ? 'Başarılı' :
                                                                'Geri Gönderilmedi')
                                                            }}
                                                        </span>
                                                    @endif
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
                                <p> Henüz onaylanmış bir isteiğiniz bulunmamaktadır.</p>
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


