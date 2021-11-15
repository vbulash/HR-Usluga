<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }}@stack('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">

{{-- Генератор favicon: https://realfavicongenerator.net/ --}}
<!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- .Favicon -->

    <!-- Page styles -->
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini" @yield('body-params')>
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            {{--            <li class="nav-item d-none d-sm-inline-block">--}}
            {{--                <a href="../../index3.html" class="nav-link">Home</a>--}}
            {{--            </li>--}}
            {{--            <li class="nav-item d-none d-sm-inline-block">--}}
            {{--                <a href="#" class="nav-link">Contact</a>--}}
            {{--            </li>--}}
            @yield('back')
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            {{--            <div class="input-group input-group-sm">--}}
            {{--                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
            {{--                <div class="input-group-append">--}}
            {{--                    <button class="btn btn-navbar" type="submit">--}}
            {{--                        <i class="fas fa-search"></i>--}}
            {{--                    </button>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </form>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
    @include('admin.partials.brand')
    <!-- .Brand Logo -->

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
        @include('admin.partials.userpanel')
        <!-- .Sidebar user (optional) -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
					data-accordion="false">
					@php
						$menu = [
							['icon' => 'fas fa-home', 'title' => 'Главная', 'route' => 'admin.index'],
							['icon' => 'fas fa-id-card', 'title' => 'Пользователи', 'route' => 'users.index'],
							['icon' => 'fas fa-file-alt', 'title' => 'Блог', 'route' => 'blog.index']
						];
					@endphp
					@foreach($menu as $item)
						<li class="nav-item">
							<a href="{{ route($item['route']) }}" class="nav-link">
								<i class="nav-icon {{ $item['icon'] }}"></i>
								{{ $item['title'] }}
							</a>
						</li>
					@endforeach
				</ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
        @yield('modals')
    </div>
    <!-- /.content-wrapper -->

@include('admin.partials.footer')

<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{ asset('assets/admin/js/admin.js') }}"></script>
<script>
    // Инициализация pusher'а
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "0",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    String.prototype.trimRight = function (charlist) {
        if (charlist === undefined)
            charlist = "\s";
        return this.replace(new RegExp("[" + charlist + "]+$"), "");
    };

    $('.nav-sidebar a').each(function () {
        let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
        let link = this.href;
        //let cleared = link.trimRight("#");
        if (link === location) {
            $(this).addClass('active');
            $(this).parents('.has-treeview').addClass('menu-open');
        }
    });

    // Broadcast
    var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}'
    });

    var channel = pusher.subscribe('hgrusluga-channel');
    channel.bind('toast-event', (data) => {
        toastr[data.type](data.message, data.title);
    });

    // Ошибки и сообщения
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        toastr['error']("{!! $error !!}");
    @endforeach
        @elseif(session()->has('error'))
        toastr['error']("{!! session('error') !!}");
    @php
        session()->forget('error');
    @endphp
        @endif

        @if (session()->has('success'))
        toastr['success']("{!! session('success') !!}");
    @php
        session()->forget('success');
    @endphp
        @endif

        @if (session()->has('info'))
        toastr['success']("{!! session('info') !!}");
    @php
        session()->forget('info');
    @endphp
    @endif
</script>
<!-- Page file / URL scripts -->
@stack('scripts')
<!-- Page manual scripts -->
@stack('scripts.injection')

</body>
</html>
