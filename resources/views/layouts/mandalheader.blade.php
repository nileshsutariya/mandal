<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- All Library CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/LineIcons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/viewer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}"> -->
    <title>Mandal Management System</title>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="d-table">
            <div class="d-tablecell">
                <span class="loader">
                    <span class="loader-inner"></span>
                </span>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand fixed-top top-menu">
        <a class="navbar-brand" href="#">
            <!-- Large logo -->
            <img src="{{ asset('images/large-logo.png') }}" alt="Logo" class="large-logo">

            <!-- Small logo -->
            <img src="{{ asset('images/small-logo.png') }}" alt="Small Logo" class="small-logo">
        </a>

        <!-- Burger menu -->
        <div class="burger-menu toggle-menu">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Mega Menu -->

            <!-- Right nav -->
            <ul class="navbar-nav right-nav ml-auto">

                <!-- Profile dropdown -->
                <li class="nav-item dropdown profile-nav-item">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="menu-profile">
                            <span class="name">
                                {{$mandal->mandal_name}}
                            </span>
                            <img src="{{asset('imageuploaded/' . $mandal->logo)}}" alt="Profile Image"
                                class="rounded-circle">
                        </div>
                    </a>
                    <div class="dropdown-menu">
                        @foreach ($mandals as $value)
                            @if($mandal->mandal_name != $value->mandal_name)
                                <a class="dropdown-item" href="{{ route('switchaccount', ['id' => $value->id]) }}">
                                    <img src="{{asset('imageuploaded/' . $value->logo)}}" class="rounded-circle p-0"
                                        style="height: 25px; width: 25px;">
                                    {{$value->mandal_name}}
                                </a>
                            @endif
                        @endforeach
                        <hr>
                        <a class="dropdown-item" href="{{route('dashboard')}}">
                            <img src="{{asset('imageuploaded/' . $user->image)}}" class="rounded-circle p-0"
                                style="height: 25px; width: 25px;">
                            {{$user->name}}
                        </a>
                        <a class="dropdown-item" href="{{route('logout')}}">
                            <i data-feather="log-out" class="icon"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</body>
<!-- End Top Navbar -->

<!-- Side Menu -->
<div class="sidemenu-area sidemenu-toggle default">
    <nav class="sidemenu navbar navbar-expand navbar-light hide-nav-title">
        <div class="navbar-collapse collapse">
            <div class="navbar-nav">
                <div class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('switchaccount', ['id' => $mandal->id]) }}">
                        <i data-feather="grid" class="icon"></i>
                        <span class="title">Dashboard </span>
                    </a>
                    <a class="nav-link" href="{{route('mandal.list')}}">
                        <i data-feather="inbox" class="icon"></i>
                        <span class="title">Add New Mandal</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- End Side Menu -->
<div class="main-content d-flex flex-column hide-sidemenu">