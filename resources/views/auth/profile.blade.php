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
                                {{ $user->name }}
                            </div>
                        </div>
                        <div class="profile-usermenu">
                            <ul class="list-group-flush ">
                                <li class="list-group-item-action ">
                                    <a href="#"><i class="fa fa-home"></i> Profil </a>
                                </li>
                                <li class="list-group-item-action">
                                    <a href="{{ route('requests-history') }}"><i class="fa fa-book"></i> İstek Geçmişi
                                    </a>
                                </li>
                                <li class="list-group-item-action">
                                    <a href="{{ route('contact') }}">
                                        <i class="fa fa-flag"></i> Destek </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="books bg-content">
                        <h4> Profil</h4>
                        <hr>
                        @include('errors.message')
                        <form method="POST" action="{{ route('profile') }}">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="name"><b>Ad Soyad</b></label>
                                    <input type="text" class="form-control " name="name" value="{{ $user->name }}"
                                           disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email"><b>E-Posta</b></label>
                                    <input type="text" class="form-control" name="email" value="{{ $user->email }}"
                                           disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="address"><b>Adres</b></label>
                                    <input type="text"
                                           class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
                                           id="address"
                                           name="address" placeholder="Örn: Atatürk Mah. 950/5 Sok..."
                                           value="{{ $user->address }}">
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                         <strong>{{ $errors->first('address') }}</strong>
                                     </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="phone"><b>Telefon</b></label>
                                    <input type="text" id="phone"
                                           class="form-control  {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                           name="phone" placeholder="Örn: +905XX XXX XXXX" value="{{ $user->phone }}">
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                             <strong>{{ $errors->first('phone') }}</strong>
                                       </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label for="city"><b>Şehir</b></label>
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
                                <div class="col-md-4">
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
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="job"><b>Meslek</b></label>
                                    <input id="job" type="text"
                                           class="form-control{{ $errors->has('job') ? ' is-invalid' : '' }}" name="job"
                                           value="{{ $user->job }}">
                                    @if ($errors->has('job'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('job') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label for="sex"><b>Cinsiyet</b></label>
                                    <select id="sex" name="sex"
                                            class="form-control{{ $errors->has('sex') ? ' is-invalid' : '' }}">
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
                                <div class="form-group col-md-4">
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
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="password"><b>{{ __('Parola') }}</b></label>
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="password-confirm"><b>{{ __('Parola Onay') }}</b></label>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-6">
                                    <button type="submit" class="btn-sm btn-primary float-right" data-toggle="tooltip"
                                            data-placement="right" title="">
                                        {{ __('Güncelle') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="alert alert-info" role="alert">
                            Parola, e-posta ve iletişim bilgileriniz dışında hiç bir bilgiyi doldurmak zorunda
                            değilsiniz. Bilgileriniz kesinlikle 3. kişiler ile paylaşılmayacaktır.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('extra_footer')
    <script>
        $(function () {
            $('[data-toggle="datepicker"]').datepicker({
                autoHide: true,
                zIndex: 2048,
                format: 'yyyy-mm-dd',
                endDate: '2009-01-01',
                daysMin: ['Pz', 'Pzt', 'Sal', 'Çrş', 'Prş', 'Cum', 'Cmt'],
                months: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık']
            });
        });
    </script>
@endsection
