@extends('layouts.app')
@section('content')
    <main class="app">
        <div class="container">
            <div class="row justify-content-center">
                <div class="books bg-content ">
                    <div class="col-md-12">
                        <div class="jumbotron text-center">
                            <h1 style="font-size: 75px">404</h1>
                            <h5>Üzgünüz :(</h5>
                            <h5>Aradığınız sayfa bulunmadı...</h5>
                            <a href="{{ route('home') }}" class="btn btn-primary">Anasayfa'ya Dön</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
