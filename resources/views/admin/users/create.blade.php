@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
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
                        <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name"><b>Ad Soyad</b></label>
                                    <input type="text" placeholder="Adı Soyad"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" autocomplete="off"
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
                                           name="email" value="{{ old('email') }}" autocomplete="off"
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
                                           value="{{ old('address') }}" autocomplete="off">
                                    @if ($errors->has('address'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('address') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="city_id"><b>Şehir</b></label>
                                    <select id="city_id" name="city_id"
                                            class="form-control{{ $errors->has('city_id') ? ' is-invalid' : '' }}">
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('city_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('city_id') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="zip"><b>Posta Kodu</b></label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('zip') ? ' is-invalid' : '' }}"
                                           name="zip" value="{{ old('zip') }}">
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
                                           name="phone" placeholder="Telefon Numarası" value="{{ old('phone') }}">
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
                                           data-toggle="datepicker" value="{{ date("Y-m-d") }}">
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
                                           value="{{ old('job') }}" autocomplete="off">
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
                                        <option value="yok">Seçiniz...</option>
                                        <option value="Kadın">Kadın</option>
                                        <option value="Erkek">Erkek</option>
                                        <option value="Diğer">Diğer</option>
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
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="password-confirm"><b>Parola Onay</b></label>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation">
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="col-md-2">
                                    <label for="is_admin"><b>Admin mi ?</b></label>
                                    <select id="is_admin" name="is_admin"
                                            class="form-control{{ $errors->has('is_admin') ? ' is-invalid' : '' }}"
                                            required>
                                        <option value="0">Hayır</option>
                                        <option value="1">Evet</option>
                                    </select>
                                    @if ($errors->has('is_admin'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('is_admin') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row ">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-success" type="submit">Onayla</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

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
@endsection
