<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{url('/')}}">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <title>{{ config('app.name', 'Welcome to E-Voting') }}</title>
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/fonts/font-awesome.min.css') }}">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/dashboard.css') }}" rel="stylesheet" />
</head>
<body class="">
    <div class="page">
        <div class="page-main">     
            <div class="header">
                <div class="container">
                    <div class="d-flex">
                        <a class="header-brand" href="{{url('/')}}"> {{Html::image('public/images/logo.jpg')}}
                        <p style="display: inline-block;"> @if (Auth::guest())  @else Welcome ({{Auth::user()->fd_no}}) @endif </p>
                        </a>
                        <div class="d-flex order-lg-2 ml-auto">
                            <div class="dropdown">

                                @if (Auth::guest())
                                 <!-- <a class="nav-blue" style="background: #0062ab;color: #fff;padding: 10px 40px;font-size: 18px;font-weight: bold;"  href="{{url('/login')}}">login</a> -->
                                @else
                                    <ul>
                                       <li>
                                           <a href="{{ route('logout') }}" class="nav-blue" style="background: #0062ab;color: #fff;padding: 10px 40px;font-size: 18px;font-weight: bold;"
                                               onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                               Logout
                                           </a>
                                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                               {{ csrf_field() }}
                                           </form>
                                       </li>
                                   </ul>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-3 my-md-5">
            <div class="vobilet-navbar fixed-heade" id="headerMenuCollapse">
                    <div class="container">
                        <ul class="nav">
                        
                            <li class="nav-item">
                                <a class="nav-link active" href="{{url('/home')}}">
                                    <i class="fa fa-home"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                                                   
                        </ul>

                    </div>
                </div>
                <!-- content-->
                @yield('content')
                <!-- end content-->

        <footer class="footer">
                <div class="container">
                     <div class="col-sm-12">
                        <div class="tt-copy-left"><p style="color:#fff;     color: #333;
    font-size: 13px;">All rights reserved @ 2018 Jaypee Infrastructure.</p></div>
                     </div>
                </div>
            </footer>
       </div>
    </div>
    </div>
	<style>
.nav-blue:hover{color:#fff;background:#fd7917 !important;}
       </style>
       <script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
       <script src="{{ asset('public/assets/js/bootstrap.js') }}"></script>
       <script src="{{ asset('public/assets/js/jquery.autocomplete.min.js') }}"></script>
       <script src="{{ asset('public/assets/js/app.js') }}"></script>
       <script src="{{ asset('public/assets/js/toastr.min.js') }}"></script>
     {!! Toastr::render() !!}

    @yield('footer_script')
    </body>
    </html>