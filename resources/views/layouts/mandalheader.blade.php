<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- All Library CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <style>
        .top-menu .message-item .chat-content .message-title {
            font-size: 15px;
        }
        .decline,
        .accept {
            padding: 10px 37px;
            /* border-radius: 40px; */
            transition: transform 0.2s ease, color 0.2s ease;
        }
        .top-menu .message-item .user-pic .profile-status {
            position: absolute;
            height: 10px;
            width: 10px;
            border-radius: 50%;
            right: 2px;
            bottom: 4px;
        }
        .decline:hover,
        .accept:hover {
            transform: scale(1.05);
        }
    </style>
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
                <li class="message-box dropdown nav-item">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="count-info">
                            <i data-feather="bell" class="icon"></i>
                            <span class="ci-number">
                                <span class="ripple"></span>
                                <span class="ripple"></span>
                                <span class="ripple"></span>
                            </span>
                        </div>
                    </a>

                    <div class="dropdown-menu" style="overflow-y: auto; max-height: 600px;">
                    @if (isset($request) && count($request) > 0)
                            @foreach ($request as $value)
                                <a class="dropdown-item" href="javascript:void(0);">
                                    <div class="message-item">
                                        <div class="user-pic">
                                            <img src="{{asset('imageuploaded/' . $value->image)}}" alt="User Image"
                                                class="rounded-circle" style="width: 60px; height: 60px;">
                                            <span class="profile-status online"></span>
                                        </div>
                                        <div class="chat-content ml-4">
                                            <span class="message-title"><b>{{$value->sender_name}}</b> invite you to join {{$value->mandal_name}}</span>
                                        </div>
                                        <div class="ml-4">
                                            <span class="time">{{ \Carbon\Carbon::parse($value->created_at)->diffForHumans() }}</span>
                                            <div class="col-12 mx-auto mt-2">
                                                <button type="button" data-val="accept" id="notification" class="btn btn-primary accept" value="{{ $value->id }}">Accept</button>
                                                <button type="button" data-val="decline" id="notification" class="btn btn-secondary text-light decline ml-2" value="{{ $value->id }}">Decline</button>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                            <!-- <a class="dropdown-item" href="{{route('user.notification')}}">
                                Check all notifications
                                <i data-feather="chevron-right" class="icon"></i>
                            </a> -->
                            @else
                              <a class="dropdown-item" href="#">
                            </a>
                        @endif
                    </div>
                </li>

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
                        @if (isset($mandals))
                        <hr>
                        @endif

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
                </div>
            </div>
        </div>
    </nav>
</div>
<script>
    
    $(document).on('click', '#notification', function () {
        var id = $(this).val();
        var data = $(this).data('val'); 
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('store.request') }}",
            data: {
                'id': id,
                'data':data,
            },
            type: 'GET',
            success: function (response) {
                location.reload();
            }
        });
    });
</script>
<!-- End Side Menu -->
<div class="main-content d-flex flex-column hide-sidemenu">