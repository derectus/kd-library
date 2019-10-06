@extends('layouts.admin')
@section('css')
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

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
                        <a href="{{ route('admin.books.index')  }}"
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
                        <form action="{{ route('admin.books.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="cover"><b>Kapak</b> <i>JPG olmalı.</i></label>
                                    <input id="cover" name="cover" type="file"
                                           class="form-control-file{{ $errors->has('cover') ? ' is-invalid' : '' }}">
                                    @if ($errors->has('cover'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('cover') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="title"><b>Kitap Adı</b></label>
                                    <input type="text" placeholder="Kitap Adı"
                                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                           name="title" value="{{ old('title') }}" autocomplete="off"
                                           required>
                                    @if ($errors->has('title'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="type"><b>Tip</b></label>
                                    <input type="text" placeholder="Tip"
                                           class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}"
                                           name="type" value="{{ old('type') }}" autocomplete="off"
                                           required>
                                    @if ($errors->has('type'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('type') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="isbn"><b>ISBN</b></label>
                                    <input type="text" placeholder="ISBN"
                                           class="form-control{{ $errors->has('isbn') ? ' is-invalid' : '' }}"
                                           name="isbn" value="{{ old('isbn') }}" autocomplete="off">
                                    @if ($errors->has('isbn'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('isbn') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="city_id"><b>Şehir</b></label>
                                    <select id="location_id" name="location_id"
                                            class="form-control{{ $errors->has('location_id') ? ' is-invalid' : '' }}">
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('location_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('location_id') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="publication_year"><b>Basım Yılı</b></label>
                                    <input type="text" id="startDate" name="publication_year"
                                           class="form-control {{ $errors->has('publication_year') ? ' is-invalid' : '' }}"
                                           data-toggle="datepicker" value="{{ date("Y-m-d") }}">
                                    @if ($errors->has('publication_year'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('publication_year') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="edition"><b>Basım</b></label>
                                    <select id="edition" name="edition"
                                            class="form-control{{ $errors->has('edition') ? ' is-invalid' : '' }}">
                                        @for ($i = 1; $i<=15; $i++)
                                            <option value="{{ $i }}">{{ $i }}. Baskı</option>
                                        @endfor
                                    </select>
                                    @if ($errors->has('edition'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('edition') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="authors"><b>Yazarlar</b></label>
                                    <select id="sellector" name="authors[]" multiple
                                            class="sellector  form-control{{ $errors->has('issues') ? ' is-invalid' : '' }}"
                                            required>
                                        @foreach($authors as $author)
                                            <option value="{{ $author->id }}"> {{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('issues'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('issues') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="publisher"><b>Yayınevi</b></label>
                                    <select id="publisher" name="publisher"
                                            class="form-control{{ $errors->has('publisher') ? ' is-invalid' : '' }}">
                                        @foreach($publishers as $publisher)
                                            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('publisher'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('publisher') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="category"><b>Kategori</b></label>
                                    <select id="category" name="category"
                                            class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('category') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="description"><b>Açıklama</b></label>
                                    <textarea id="description" name="description"
                                              class="summernote form-control-file{{ $errors->has('description') ? ' is-invalid' : '' }}">
                                            {{ old('description') }}
                                        </textarea>
                                    @if ($errors->has('description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script>
        $('.sellector').selectpicker();
    </script>
    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 300
            });
        });
    </script>
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
