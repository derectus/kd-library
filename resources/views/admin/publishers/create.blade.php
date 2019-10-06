@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('admin.publishers.index')  }}"
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
                        <form action="{{ route('admin.publishers.store') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="title"><b>Yayınevi Adı</b></label>
                                    <input type="text" placeholder="Yayınevi Adı"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" autocomplete="off"
                                           required>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
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

