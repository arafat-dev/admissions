<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student | Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/hria/user/css/plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/hria/user/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/hria/user/unicons.iconscout.com/release/v4.0.0/css/line.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('hria/user/custom.css') }}">
    @stack('style-lib')
    @stack('style')
</head>

<body class="layout-light top-menu">
    <div class="mobile-author-actions"></div>
    <header class="header-top">
        <nav class="navbar navbar-light">
            <div class="navbar-left">
                <div class="logo-area">
                    <a class="navbar-brand" href="{{ route('student.dashboard') }}">
                        <img class="dark" src="{{ asset('assets/hria/user/img/logo.png') }}" width="300px"
                            alt="logo">
                        <img class="light" src="{{ asset('assets/hria/user/img/logo.png') }}" width="300px"
                            alt="logo">
                    </a>
                    <a href="#" class="sidebar-toggle">
                        <img class="svg" src="{{ asset('assets/hria/user/img/svg/align-center-alt.svg') }}"
                            alt="img"></a>
                </div>
                <div class="top-menu">
                    <div class="hexadash-top-menu position-relative">
                        <ul class="d-flex align-items-center flex-wrap">
                            {{-- <li>
                                <a href="{{ route('student.dashboard') }}" class> <span
                                        class="nav-icon uil uil-create-dashboard"></span>Dashboard</a>
                            </li> --}}

                        </ul>
                    </div>
                </div>
            </div>

            <div class="navbar-right">
                <ul class="navbar-right__menu">


                    <li class="nav-flag-select">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle"><img
                                    src="{{ asset('assets/hria/user/img/flag.png') }}" alt class="rounded-circle"></a>
                            <div class="dropdown-parent-wrapper">
                                <div class="dropdown-wrapper dropdown-wrapper--small">
                                    <a href><img src="{{ asset('assets/hria/user/img/eng.png') }}" alt> English</a>
                                    <a href><img src="{{ asset('assets/hria/user/img/ger.png') }}" alt> German</a>
                                    <a href><img src="{{ asset('assets/hria/user/img/spa.png') }}" alt> Spanish</a>
                                    <a href><img src="{{ asset('assets/hria/user/img/tur.png') }}" alt> Turkish</a>
                                    <a href><img src="{{ asset('assets/hria/user/img/iraq.png') }}" alt> Arabic</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-author">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle"><img
                                    src="{{ asset('assets/hria/user/img/author-nav.jpg') }}" alt
                                    class="rounded-circle">
                                <span class="nav-item__title">{{ Auth::guard('student')->user()->name }}<i
                                        class="las la-angle-down nav-item__arrow"></i></span>
                            </a>
                            <div class="dropdown-parent-wrapper">
                                <div class="dropdown-wrapper">
                                    <div class="nav-author__info">
                                        <div class="author-img">
                                            <img src="{{ asset('assets/hria/user/img/author-nav.jpg') }}" alt
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6>{{ Auth::guard('student')->user()->name }}</h6>
                                            <span>Student</span>
                                        </div>
                                    </div>
                                    <div class="nav-author__options">
                                        <ul>
                                            <li>
                                                <a href="{{ route('student.dashboard') }}">
                                                    <i class="uil uil-dashboard"></i> Dashboard</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('student.dashboard') }}">
                                                    <i class="uil uil-user"></i> Profile</a>
                                            </li>
                                        </ul>
                                        <a href="{{ route('student.logout') }}" class="nav-author__signout">
                                            <i class="uil uil-sign-out-alt"></i> Sign Out
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </li>

                </ul>

            </div>

        </nav>
    </header>
    <main class="main-content">
        <div class="contents">
            <div class="form-element">

                @yield('panel')

            </div>
        </div>
        <footer class="footer-wrapper">
            <div class="footer-wrapper__inside">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-copyright">
                                <p>© 2023 | Hizb ur Rahman Islamic Academy (HRIA) Pakistan All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-menu text-end">
                                <ul>
                                    <li>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <a href="#">Team</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('assets/hria/user/js/plugins.min.js') }}"></script>
    <script src="{{ asset('assets/hria/user/js/script.min.js') }}"></script>
    <script src="{{ asset('assets/js/previewImage.js') }}"></script>
    <script src="{{ asset('assets/js/iziToast.min.js') }}"></script>

    @stack('script-lib')

    @stack('script')

    @if (session()->has('notify'))
        @foreach (session('notify') as $msg)
            <script>
                "use strict";
                iziToast.{{ $msg[0] }}({
                    message: "{{ __($msg[1]) }}",
                    position: "topRight"
                });
            </script>
        @endforeach
    @endif

    @if (isset($errors) && $errors->any())
        @php
            $collection = collect($errors->all());
            $errors = $collection->unique();
        @endphp

        <script>
            "use strict";
            @foreach ($errors as $error)
                iziToast.error({
                    message: '{{ __($error) }}',
                    position: "topRight"
                });
            @endforeach
        </script>
    @endif
    <script>
        "use strict";

        function notify(status, message) {
            if (typeof message == 'string') {
                iziToast[status]({
                    message: message,
                    position: "topRight"
                });
            } else {
                $.each(message, function(i, val) {
                    iziToast[status]({
                        message: val,
                        position: "topRight"
                    });
                });
            }
        }
    </script>


</body>


</html>
