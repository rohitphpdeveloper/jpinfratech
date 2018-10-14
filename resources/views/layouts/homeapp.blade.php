<!DOCTYPE html>
<html lang="en">
<head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	     <title>{{ config('app.name', 'Welcome to E-Voting') }}</title>
      <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ asset('public/assets/css/responsive.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ asset('public/assets/css/font-awesome.min.css') }}" rel="stylesheet">
      <link href="{{ asset('public/assets/css/animate.css') }}" rel="stylesheet">
	  <link rel="stylesheet" href="{{ asset('public/assets/css/animate2.css') }}">	  
</head>
   <body>
       <header class="header1">
         <div class="tt-header">
            <div class="container">
               <div class="top-inner clearfix">
                  <a class="responsive_logo" href="{{url('/')}}">{{Html::image('public/assets/img/logo.jpg')}}</a>
                  <div class="cmn-toggle-switch"><span></span></div>
               </div>
               <div class="toggle-block">
                  <div class="toggle-block-container">
                     <nav class="main-nav clearfix">
                     
                         @if (Auth::guest())
                                @else
                                    <ul>
                                       <li><a href="{{url('/home')}}">Dashboard</a></li>
                                       <li>
                                           <a href="{{ route('logout') }}"
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
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>


          <!-- content-->
          @yield('content')
          <!-- end content-->

         <footer class="tt-footer">
            <div class="tt-copy">
               <div class="container" style="text-align: center;">
                  <div class="row">
                     
                     <div class="col-sm-12">
                        <h4 class="tt-foooter-title h5"><small>Follow Us:</small></h4>
						            <ul class="tt-socail">
                           <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                     <div class="col-sm-12">
                        <div class="tt-copy-left"><p style="color:#fff;">All rights reserved @ 2018 Jaypee Infrastructure.<span class="text-right">Created by <a class="by-link" href="https://www.clamourtechnologies.com/Default.aspx" target="_blank"><img src="/evoting/public/assets/img/by.png"></a></span></p></div>
                     </div>
                  </div>
               </div>
            </div>
         </footer>
         <script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
         <script src="{{ asset('public/assets/js/global.js') }}"></script>
         <script src="{{ asset('public/assets/js/bootstrap.js') }}"></script>
      	 <script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
      	 <script src="{{ asset('public/assets/js/animate.js') }}"></script>
      	 <script>
		  new WOW().init();
		  </script>
      </div>
      @yield('footer_script')
   </body>
</html>