<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- All Library CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/LineIcons.css')}}">
    <link rel="stylesheet" href="{{asset('css/viewer.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/icofont.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/calendar.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <title>Mandal Management System</title>
    <style>
        .signup-link a:hover {
            text-decoration: underline;
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
   
    <div class="auth-main-content auth-bg-image">
        <div class="d-table">
            <div class="d-tablecell">
                <div class="auth-box">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="form-left-content">
                                <div class="auth-logo">
                                    <img src="{{asset('images/large-logo.png')}}" alt="Logo">
                                </div>

                                <div class="login-links">
                                    <a class="fb" href="#">
                                        <i data-feather="facebook" class="icon"></i>
                                        Sign Up with Facebook
                                    </a>
                                    <a class="twi" href="#">
                                        <i data-feather="twitter" class="icon"></i>
                                        Sign Up with Twitter
                                    </a>
                                    <a class="ema" href="#">
                                        <i data-feather="mail" class="icon"></i>
                                        Sign Up with Email
                                    </a>
                                    <a class="linkd" href="#">
                                        <i data-feather="linkedin" class="icon"></i>
                                        Sign Up with Linkedin
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-content">
                            @if($errors->any())
                                    <div class="alert alert-danger">
                                            @foreach($errors->all() as $error)
                                                <li>
                                                    {{ $error }}
                                                </li>
                                            @endforeach
                                    </div>
                                @endif 
                                <h1 class="heading">Log In</h1>
                                <form action="{{ route('login.check') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Username</label>
                                        <input type="mobile" id="mobile" name="mobile" class="form-control"
                                            placeholder="Enter your Username">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Enter your password">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Log In</button>
                                        <a class="fp-link" href="#">Forgot Password?</a>
                                    </div>
                                </form>
                                <div class="text-center signup-link mt-2">
                                    <p>Don't have an account? <a href="{{route('register')}}">Sign Up</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>