<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- All Library CSS -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/LineIcons.css') }}">
    <link rel="stylesheet" href="{{asset('css/viewer.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/calendar.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{asset('css/responsive.css') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('favicons/img-favicon.png')}}">
    <title>Mandal Management System</title>
    <style>
           .signin-link a:hover {
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
    <!-- End Preloader -->

    <!-- Signup Area -->
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
                                <h1 class="heading">Sign Up</h1>
                                <form class="" action="{{route('user.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter your name">
                                        @error('name')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="mobile" class="form-control" id="mobile" name="mobile"
                                            placeholder="Enter your Mobile number">
                                        @error('mobile')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter Password">
                                        @error('password')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" id="confirmpassword"
                                            name="confirmpassword" placeholder="Please Re-Enter Your Password">
                                        @error('confirmpassword')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Sign Up</button>
                                    </div>
                                </form>
                                <div class="text-center signin-link mt-3">
                                    <p>Already have an account? <a href="{{route('login')}}">Sign In</a></p>
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