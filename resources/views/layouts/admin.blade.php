<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel | {{ config('app.name') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.min.css" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    @yield('css')


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark" id="sidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin') }}">
            <div class="sidebar-brand-text mx-3">{{ __('KD - Kütüphane ') }}</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
               href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}"
               href="{{ route('admin.users.index') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Kullanıcılar</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.books.index') ? 'active' : '' }}"
               href="{{ route('admin.books.index') }}">
                <i class="fas fa-fw fa-book"></i>
                <span>Koleksiyonlar</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.authors.index') ? 'active' : '' }}"
               href="{{ route('admin.authors.index') }}">
                <i class="fas fa-fw fa-at"></i>
                <span>Yazarlar</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.publishers.index') ? 'active' : '' }}"
               href="{{ route('admin.publishers.index') }}">
                <i class="fas fa-podcast"></i>
                <span>Yayınevleri</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.barrows.index') ? 'active' : '' }}"
               href="{{ route('admin.barrows.index') }}">
                <i class="fas fa-fw fa-box"></i>
                <span>İstek Logları</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.logs.index') ? 'active' : '' }}"
               href="{{ route('admin.logs.index') }}">
                <i class="fas fa-fw fa-box"></i>
                <span>Kullanıcı Logları</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-backspace"></i>
                <span>Uygulamaya Geri Dön</span>
            </a>
        </li>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <nav class="navbar"></nav>
            <div class="container-fluid">
                @if(Session::has('message'))
                    <div class="alert alert-{{Session::get('class')}}" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
            </div>

            @yield('content')

        </div>
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Kalavye Delikanlıları, 2019</span>
                </div>
            </div>
        </footer>

    </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="{{ asset('js/admin.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>

@yield('js')

</body>
</html>
