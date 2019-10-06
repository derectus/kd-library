@extends('layouts.app')

@section('content')
    <section class="jumbotron bg-white  text-center">
        <div class="container">
            <img src="img/klavye-delikanlilari-logo.jpg" class="img-fluid" alt="">
            <h1 class="jumbotron-heading">Klavye Delikanlıları</h1>
            <h3 class="jumbotron-heading">Dijital Kütüphane</h3>
            <p class="lead text-muted"> Web güvenliğinin; ötesi, berisi, amcası, kuzeni hepsini konuşuyoruz.</p>
            <p class="">
                <a href="{{ route('login') }}" class="btn btn-info my-2">Giriş Yap</a>
                <a href="{{ route('collections.books') }}" class="btn btn-dark my-2">Kolleksiyonlar</a>
            </p>
        </div>
    </section>
@endsection

