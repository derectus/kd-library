@extends('layouts.admin')
@section('css')
    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $title }}'i Düzenle</h6>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('admin.users.index')  }}"
                           class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                            <span class="text">Geri Dön</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-dark">
                        <form action="{{ route('admin.users.update' , $user->id )}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name"><b>Ad Soyad</b></label>
                                    <input type="text" placeholder="Adı Soyad"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ $user->name }}" autocomplete="off"
                                           required>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email"><b>E-Posta</b></label>
                                    <input type="text" placeholder="@email.com"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ $user->email }}" autocomplete="off"
                                           required>
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="address"><b>Adres</b></label>
                                    <input id="address" name="address" type="text" placeholder="Anywhere :)"
                                           class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                           value="{{ $user->address }}" autocomplete="off">
                                    @if ($errors->has('address'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('address') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="city_id"><b>Şehir</b></label>
                                    <select name="city_id" id="city_id"
                                            class="form-control {{ $errors->has('city_id') ? ' is-invalid' : '' }}">
                                        @foreach ($cities as $key =>  $city)
                                            <option
                                                value="{{ $city->id }}" {{ $city->id == $user->city_id ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                        @if ($errors->has('city'))
                                            <span class="invalid-feedback" role="alert">
                                             <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="zip"><b>Posta Kodu</b></label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('zip') ? ' is-invalid' : '' }}"
                                           name="zip" value="{{ $user->zip }}">
                                    @if ($errors->has('zip'))
                                        <span class="invalid-feedback" role="alert">
                                         <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone"><b>Telefon</b></label>
                                    <input type="text" id="phone"
                                           class="form-control  {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                           name="phone" placeholder="Telefon Numarası" value="{{ $user->phone }}">
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                             <strong>{{ $errors->first('phone') }}</strong>
                                       </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="birthdate"><b>Doğum Yılı</b></label>
                                    <input type="text" id="startDate" name="birthdate"
                                           class="form-control {{ $errors->has('birthdate') ? ' is-invalid' : '' }}"
                                           data-toggle="datepicker"
                                           value="{{ $user->birthdate ? date('Y-m-d', strtotime($user->birthdate)) :  date("Y-m-d") }}">
                                    @if ($errors->has('birthdate'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('birthdate') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="job"><b>Meslek</b></label>
                                    <input id="job" name="job" type="text" placeholder="Meslek"
                                           class="form-control{{ $errors->has('job') ? ' is-invalid' : '' }}"
                                           value="{{ $user->job }}" autocomplete="off">
                                    @if ($errors->has('job'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('job') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="sex"><b>Cinsiyet</b></label>
                                    <select id="sex" name="sex"
                                            class="form-control{{ $errors->has('sex') ? ' is-invalid' : '' }}"
                                            required>
                                        <option value="null" {{ $user->sex == 'null' ? 'selected' : '' }}>Seçiniz...
                                        </option>
                                        <option value="kadın" {{ $user->sex == 'kadın' ? 'selected' : '' }}>Kadın
                                        </option>
                                        <option value="erkek" {{ $user->sex == 'erkek' ? 'selected' : '' }}>Erkek
                                        </option>
                                        <option value="diğer" {{ $user->sex == 'diğer' ? 'selected' : '' }}>Diğer
                                        </option>
                                    </select>
                                    @if ($errors->has('sex'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('sex') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="password"><b>Parola</b></label>
                                    <input id="password" name="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           autocomplete="off"
                                           placeholder="Parola bilgisi değiştirilmeyecekse boş bırakılabilir. !">
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="password-confirm"><b>Parola Onay</b></label>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="is_admin"><b>Admin?</b></label>
                                    <select id="is_admin" name="is_admin"
                                            class="form-control{{ $errors->has('is_admin') ? ' is-invalid' : '' }}"
                                            required>
                                        <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Evet</option>
                                        <option value="0" {{ $user->is_admin ? '' : 'selected' }}>Hayır</option>
                                    </select>
                                    @if ($errors->has('is_admin'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('is_admin') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="is_banned"><b>Banlı mı ?</b></label>
                                    <select id="is_banned" name="is_banned"
                                            class="form-control{{ $errors->has('is_banned') ? ' is-invalid' : '' }}"
                                            required>
                                        <option value="0" {{ $user->is_banned ? '' : 'selected' }}>Hayır</option>
                                        <option value="1" {{ $user->is_banned ? 'selected' : '' }}>Evet</option>
                                    </select>
                                    @if ($errors->has('is_banned'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('is_banned') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email_verified_at"><b>Email Doğrulama Tarihi</b></label>
                                    <input id="email_verified_at" name="email_verified_at" type="text"
                                           class="form-control"
                                           value="{{ $user->email_verified_at ? $user->email_verified_at : 'E-Posta Onaylanmamış' }}"
                                           disabled>
                                    @if ($errors->has('email_verified_at'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email_verified_at') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row ">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-success" type="submit" name="user_update">Onayla</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $title }} - İstekler</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover" id="barrowTable" cellpadding="0" width="100%">
                            <thead>
                            <tr>
                                <th scope="col">İstek</th>
                                <th scope="col">İstek Tarihi</th>
                                <th scope="col">Dönüş Tarihi</th>
                                <th scope="col">Durumu</th>
                                <th scope="col">Dönüş Durumu</th>
                                <th scope="col">İstek Notu</th>
                                <th scope="col">Gönderim Bilgileri</th>
                                <th scope="col">İşlem</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach ($requests as $request)
                                @foreach ($request->book as $book)
                                    <tr scope="row">
                                        <td>
                                            <div class="data-item-value">
                                                <a href="{{ route('collections.book', $book->slug) }}">{{ $book->title }}</a>
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
                                                @if(\Carbon\Carbon::parse($request->return_date)->lt(\Carbon\Carbon::now()))
                                                    <div class="authors-tag"><span
                                                            class="authors-tag-name  text-danger">{{ date('d/m/Y', strtotime($request->return_date)) }}</span>
                                                    </div>
                                                @else
                                                    <div class="authors-tag "><span
                                                            class="authors-tag-name">{{ date('d/m/Y', strtotime($request->return_date)) }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-left hidden-xs">
                                            @if ($request->status == 'pending')
                                                <span class="btn-sm btn-warning"
                                                      data-toggle="tooltip">Onay Bekliyor</span>
                                            @elseif($request->status == 'successful')
                                                <span class="btn-sm btn-success"
                                                      data-toggle="tooltip">Onaylandı</span>
                                            @else
                                                <span class="btn-sm btn-danger"
                                                      data-toggle="tooltip">Reddedildi</span>
                                            @endif
                                        </td>
                                        <td class="tooltip-bottom text-center"
                                            title="Kolleksiyonun geri dönüş durmunu ifade eder.">
                                            <span
                                                class="badge badge-{{ $request->return_status ? 'success' : 'danger' }}">
                                                {{ $request->return_status ? 'Döndü' : 'Dönmedi' }}
                                            </span>
                                        </td>
                                        <td>
                                            @if(!is_null($request->note))
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#requestModal">
                                                    İstek Notu
                                                </button>
                                                <div class="modal fade" id="requestModal" tabindex="-1" role="dialog"
                                                     aria-labelledby="modalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalLabel">İstek
                                                                    Notu</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {{ $request->note }}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-info"
                                                                        data-dismiss="modal">Kapat
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!is_null($request->sent_code))
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#requestModal">
                                                    Gönderim Bilgileri
                                                </button>
                                                <div class="modal fade" id="requestModal" tabindex="-1" role="dialog"
                                                     aria-labelledby="modalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalLabel"> Gönderim
                                                                    Bilgileri</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <b>Kargo Firması</b> : {{ $request->shipping_company }}
                                                                <br><br>
                                                                <b>Kargo Takip No</b> : {{ $request->sent_code }}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-info"
                                                                        data-dismiss="modal">Kapat
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        @if($request->status == 'pending')
                                            <td class="text-left form-inline hidden-xs">
                                                <form
                                                    action="{{ route('admin.bookStatus' , [$user->id, $request->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    {{ method_field('POST') }}
                                                    <button class="btn btn-success" type="submit" name="accept">Onayla
                                                    </button>
                                                </form>
                                                &nbsp
                                                <form
                                                    action="{{ route('admin.bookStatus' , [$user->id ,$request->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    {{ method_field('POST') }}
                                                    <button class="btn btn-danger" type="submit" name="reject">Reddet
                                                    </button>
                                                </form>
                                            </td>
                                        @elseif($request->status == 'successful' && $request->return_status != 1)
                                            <td>
                                                <form
                                                    action="{{ route('admin.bookStatus' , [$user->id, $request->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    {{ method_field('POST') }}
                                                    <button class="btn btn-sm btn-warning" type="submit" name="return">
                                                        Geri Döndü
                                                    </button>
                                                </form>
                                            </td>
                                        @else
                                            <td>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $title }} - Bilgilendirme Mail'i Göder</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.emails.send' , $user->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="user"><b>Kime: </b></label>
                                    <select id="user" class="form-control">
                                        <option selected>{{ $user->name }} -
                                            {{ $user->email }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="barrow"><b>Eposta Taslağı:</b></label>
                                    <select id="mailtype" name="mailtype"
                                            class="form-control{{ $errors->has('mailtype') ? ' is-invalid' : '' }}">
                                        <option value="0">-- Seçiniz --</option>
                                        @foreach($user->barrow as $barrow)
                                            @if($barrow->status == 'successful' && !$barrow->return_status)
                                                <option value="sc-{{ $barrow->id }}">
                                                    "{{ $barrow->book->implode('title',',') }}" Kargo E-postası
                                                </option>
                                            @endif
                                            @if($barrow->status == 'successful' && !$barrow->return_status &&
                                            !\Carbon\Carbon::parse($request->return_date)->lt(\Carbon\Carbon::now())))
                                            <option value="sr-{{ $barrow->id }}">
                                                "{{ $barrow->book->implode('title',',') }}" Hatırlatma E-postası
                                            </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('mailtype'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('mailtype') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="code"><b>Kargo Takip Kodu</b></label>
                                    <input type="text" placeholder="Kargo Takip Kodu"
                                           class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}"
                                           name="code" value="" autocomplete="off">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="company"><b>Kargo Firması</b></label>
                                    <input type="text" placeholder="Kargo Firması"
                                           class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}"
                                           name="company" value="" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-row ">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-success" type="submit" name="sent_mail">Gönder</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $title }} - Logları</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover " id="userLog" cellpadding="0" width="100%">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Action</th>
                                <th scope="col">IP Adres</th>
                                <th scope="col">Tarih</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->logs as $log)
                                <tr>
                                    <th scope="row">{{ $log->id }}</th>
                                    <td>{{ $log->action }}</td>
                                    <td>{{ $log->ip_address }}</td>
                                    <td>{{ $log->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('js')
    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script>
        $(function () {
            $('[data-toggle="datepicker"]').datepicker({
                autoHide: true,
                zIndex: 2048,
                format: 'yyyy-mm-dd',
                endDate: '{{ date("Y-m-d") }}',
                daysMin: ['Pz', 'Pzt', 'Sal', 'Çrş', 'Prş', 'Cum', 'Cmt'],
                months: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık']
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#barrowTable').DataTable({
                "processing": true,
                "language": {
                    "sDecimal": ",",
                    "sEmptyTable": "Tabloda herhangi bir veri mevcut değil",
                    "sInfo": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                    "sInfoEmpty": "Kayıt yok",
                    "sInfoFiltered": "(_MAX_ kayıt içerisinden bulunan)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "Sayfada _MENU_ kayıt göster",
                    "sLoadingRecords": "Yükleniyor...",
                    "sProcessing": "İşleniyor...",
                    "sSearch": "Ara:",
                    "sZeroRecords": "Eşleşen kayıt bulunamadı",
                    "oPaginate": {
                        "sFirst": "İlk",
                        "sLast": "Son",
                        "sNext": "Sonraki",
                        "sPrevious": "Önceki"
                    },
                    "oAria": {
                        "sSortAscending": ": artan sütun sıralamasını aktifleştir",
                        "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                    },
                    "select": {
                        "rows": {
                            "_": "%d kayıt seçildi",
                            "0": "",
                            "1": "1 kayıt seçildi"
                        }
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#userLog').DataTable({
                "processing": true,
                "language": {
                    "sDecimal": ",",
                    "sEmptyTable": "Tabloda herhangi bir veri mevcut değil",
                    "sInfo": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
                    "sInfoEmpty": "Kayıt yok",
                    "sInfoFiltered": "(_MAX_ kayıt içerisinden bulunan)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "Sayfada _MENU_ kayıt göster",
                    "sLoadingRecords": "Yükleniyor...",
                    "sProcessing": "İşleniyor...",
                    "sSearch": "Ara:",
                    "sZeroRecords": "Eşleşen kayıt bulunamadı",
                    "oPaginate": {
                        "sFirst": "İlk",
                        "sLast": "Son",
                        "sNext": "Sonraki",
                        "sPrevious": "Önceki"
                    },
                    "oAria": {
                        "sSortAscending": ": artan sütun sıralamasını aktifleştir",
                        "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
                    },
                    "select": {
                        "rows": {
                            "_": "%d kayıt seçildi",
                            "0": "",
                            "1": "1 kayıt seçildi"
                        }
                    }
                }
            });
        });
    </script>
@endsection
