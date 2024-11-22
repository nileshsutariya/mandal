<!DOCTYPE html><html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
               
                <!-- Search form -->
                <form class="nav-search-form d-none d-sm-block">
                    <input type="text" class="form-control" placeholder="Search..."> 
                    <button type="submit" class="search-success">
                        <i data-feather="search" class="icon"></i>
                    </button>
                </form>

                <!-- Right nav -->
                <ul class="navbar-nav right-nav ml-auto">
                 
                    <!-- Profile dropdown -->
                    <li class="nav-item dropdown profile-nav-item">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="menu-profile">
                                <span class="name">abc</span>
                                <img src="{{ asset('images/3.jpg') }}" alt="Profile Image" class="rounded-circle">
                            </div>
                        </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('user.profile')}}">
                                <i data-feather="user" class="icon"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="{{route('user.edit')}}">
                                <i data-feather="settings" class="icon"></i>
                                Settings
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
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="dropdown-title">
                                    <i data-feather="grid" class="icon"></i>
                                    <span class="title">
                                        Dashboard 
                                        <i data-feather="chevron-right" class="icon fr"></i>
                                    </span>
                                </div>
                            </a>
 
                            <div class="dropdown-menu">
                                <a class="dropdown-item active" href="">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Sales
                                </a>
                                <a class="dropdown-item" href="dashboard-ecommerce.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    eCommerce
                                </a>
                                <a class="dropdown-item" href="dashboard-analytics.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Analytics
                                </a>
                                <a class="dropdown-item" href="dashboard-crm.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    CRM
                                </a>
                                <a class="dropdown-item" href="dashboard-projects.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Projects
                                </a>
                            </div>
                        </div>

                        <a class="nav-link" href="{{route('mandal.list')}}">
                            <i data-feather="inbox" class="icon"></i> 
                            <span class="title">Add New Mandal</span>
                        </a>
<!-- 
                        <a class="nav-link" href="chat.html">
                            <i data-feather="message-square" class="icon"></i>
                            <span class="title">Chat</span>
                        </a>

                        <a class="nav-link" href="todos.html">
                            <i data-feather="check-square" class="icon"></i>
                            <span class="title">Todo List</span>
                        </a>

                        <a class="nav-link" href="notes.html">
                            <i data-feather="file-text" class="icon"></i>
                            <span class="title">Notes</span>
                        </a>

                        <a class="nav-link" href="calendar.html">
                            <i data-feather="calendar" class="icon"></i>
                            <span class="title">Calendar</span>
                        </a>

                        <a class="nav-link" href="search.html">
                            <i data-feather="search" class="icon"></i>
                            <span class="title">Search</span>
                        </a>

                        <div class="nav-item dropdown super-color">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="dropdown-title">
                                    <i data-feather="filter" class="icon"></i>
                                    <span class="title">
                                        UI Components 
                                        <i data-feather="chevron-right" class="icon fr"></i>
                                    </span>
                                </div>
                            </a>
 
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="ui-alerts.html">
                                    <i data-feather="bell" class="icon"></i>
                                    Alerts
                                </a>

                                <a class="dropdown-item" href="ui-badges.html">
                                    <i data-feather="award" class="icon"></i>
                                    Badges
                                </a>

                                <a class="dropdown-item" href="ui-buttons.html">
                                    <i data-feather="arrow-right-circle" class="icon"></i>
                                    Buttons
                                </a>

                                <a class="dropdown-item" href="ui-cards.html">
                                    <i data-feather="layers" class="icon"></i>
                                    Cards
                                </a>

                                <a class="dropdown-item" href="ui-dropdowns.html">
                                    <i data-feather="arrow-down-circle" class="icon"></i>
                                    Dropdowns
                                </a>

                                <a class="dropdown-item" href="ui-forms.html">
                                    <i data-feather="file-text" class="icon"></i>
                                    Forms
                                </a>

                                <a class="dropdown-item" href="ui-list-groups.html">
                                    <i data-feather="list" class="icon"></i>
                                    List Groups
                                </a>

                                <a class="dropdown-item" href="ui-modals.html">
                                    <i data-feather="airplay" class="icon"></i>
                                    Modals
                                </a>

                                <a class="dropdown-item" href="ui-progress-bars.html">
                                    <i data-feather="trending-up" class="icon"></i>
                                    Progress Bars
                                </a>

                                <a class="dropdown-item" href="ui-tables.html">
                                    <i data-feather="database" class="icon"></i>
                                    Tables
                                </a>
                                    
                                <a class="dropdown-item" href="ui-tabs.html">
                                    <i data-feather="triangle" class="icon"></i>
                                    Tabs
                                </a>
                            </div>
                        </div>

                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="dropdown-title">
                                    <i data-feather="user" class="icon"></i>
                                    <span class="title">
                                        User
                                        <i data-feather="chevron-right" class="icon fr"></i>
                                    </span>
                                </div>
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" target="_blank" href="signup.html">
                                    <i data-feather="user-plus" class="icon"></i>
                                    Sign Up
                                </a>

                                <a class="dropdown-item" target="_blank" href="login.html">
                                    <i data-feather="user-check" class="icon"></i>
                                    Login
                                </a>

                                <a class="dropdown-item" target="_blank" href="forgot-password.html">
                                    <i data-feather="unlock" class="icon"></i>
                                    Forgot Password
                                </a>
                            </div>
                        </div>

                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="dropdown-title">
                                    <i data-feather="bar-chart-2" class="icon"></i>
                                    <span class="title">
                                        Charts
                                        <i data-feather="chevron-right" class="icon fr"></i>
                                    </span>
                                </div>
                            </a>
 
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="apex-line-charts.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Line Charts
                                </a>

                                <a class="dropdown-item" href="apex-area-charts.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Area Charts
                                </a>

                                <a class="dropdown-item" href="apex-column-charts.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Column Charts
                                </a>

                                <a class="dropdown-item" href="apex-bar-charts.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Bar Charts
                                </a>

                                <a class="dropdown-item" href="apex-mixed-charts.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Mixed Charts
                                </a>

                                <a class="dropdown-item" href="apex-pie-donuts-charts.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Pie and Donuts Charts
                                </a>
                            </div>
                        </div>

                        <div class="dropdown nav-item">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="dropdown-title">
                                    <i data-feather="heart" class="icon"></i>
                                    <span class="title">
                                        Icons
                                        <i data-feather="chevron-right" class="icon fr"></i>
                                    </span>
                                </div>
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="feather-icons.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Feather Icons
                                </a>
                                <a class="dropdown-item" href="lineicons.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Line Icons
                                </a>
                                <a class="dropdown-item" href="icofont-icons.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Icofont Icons
                                </a>
                            </div>
                        </div>

                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="dropdown-title">
                                    <i data-feather="file-text" class="icon"></i>
                                    <span class="title">
                                        Pages
                                        <i data-feather="chevron-right" class="icon fr"></i>
                                    </span>
                                </div>
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="users-card.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Users Card
                                </a>

                                <a class="dropdown-item" href="notifications.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    <span class="title">Notifications</span>
                                </a>

                                <a class="dropdown-item" href="time-line.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Time line
                                </a>

                                <a class="dropdown-item" href="invoice-template.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Invoice Template
                                </a>

                                <a class="dropdown-item" href="gallery.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Gallery
                                </a>

                                <a class="dropdown-item" href="faq.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Faq
                                </a>

                                <a class="dropdown-item" href="pricing.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Pricing
                                </a>

                                <a class="dropdown-item" href="profile.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Profile
                                </a>

                                <a class="dropdown-item" href="profile-settings.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Profile Settings
                                </a>

                                <a class="dropdown-item" href="error-404.html">
                                    <i data-feather="chevron-right" class="icon"></i>
                                    Error 404
                                </a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </nav>
        </div>
        <!-- End Side Menu -->
        <div class="main-content d-flex flex-column hide-sidemenu">
