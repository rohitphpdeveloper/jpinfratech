<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>  @section('title') E-voting  @show</title>
  <!-- Data table CSS -->
  {{ Html::style('public/admin/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}
  {{ Html::style('public/admin/vendors/bower_components/bootstrap/dist/css/bootstrap.min.css') }}
  {{ Html::style('public/admin/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css') }}
    
  <!-- Custom CSS -->
   {{ Html::style('public/admin/dist/css/style.css') }}
   <meta id="token" name="token" content="{{ csrf_token() }}">
   <meta  id="base-url" name="base-url" content="{{url('/admin/')}}">
     
</head>

<body>
  <!-- Preloader -->
  <div class="preloader-it">
    <div class="la-anim-1"></div>
  </div>
  <!-- /Preloader -->
    <div class="wrapper box-layout theme-1-active pimary-color-pink">
    <!-- Top Menu Items -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="mobile-only-brand pull-left">
        <div class="nav-header pull-left">
          <div class="logo-wrap">
            <a href="#">
              {{Html::image('public/admin/images/logo.png','Image') }}
              <span class="brand-text">E-Voting</span>
            </a>
          </div>
        </div>  
        <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
        
      </div>
      <div id="mobile_only_nav" class="mobile-only-nav pull-right">
        <ul class="nav navbar-right top-nav pull-right">
     
          <li class="dropdown auth-drp">
            <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">Evoting<span class="user-online-status"></span></a>
            <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
              <li>
                <a href="{{ url('admin/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>  
    </nav>
    <!-- /Top Menu Items -->
    
    <!-- Left Sidebar Menu -->
    <div class="fixed-sidebar-left">
      <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
          <span>Main</span> 
          <i class="zmdi zmdi-more"></i>
        </li>
        <li>
          <a href="{{ URL::to('admin/dashboard') }}" class="active"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Home</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
        </li>
        @if(Auth::guard('admin')->user()->admin_type!=0)
        <li>
          <a href="{{ url('admin/resolution') }}"><div class="pull-left"><i class="fa fa-calendar mr-20"></i><span class="right-nav-text">Event</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
        </li>
        <li>
          <a href="{{ url('admin/reports') }}"><div class="pull-left"><i class="fa fa-file mr-20"></i><span class="right-nav-text">Reports</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
        </li>
        @else
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="fa fa-calendar mr-20"></i><span class="right-nav-text">Event </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="app_dr" class="collapse collapse-level-1">
              <li>
                <a href="{{ url('admin/resolution') }}">Event</a>
              </li>
              <li>
                <a href="{{ url('admin/voting') }}">Resolution</a>
              </li>
            </ul>
        </li>
        <li>
              <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr1"><div class="pull-left"><i class="fa fa-file mr-20"></i><span class="right-nav-text">Cms </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
              <ul id="app_dr1" class="collapse collapse-level-1">
                <li>
                  <a href="{{ url('admin/pages') }}">Cms List</a>
                </li>
                <li>
                  <a href="{{ url('admin/faq') }}">Faq List</a>
                </li>
                <li>
                  <a href="{{ url('admin/blog') }}">News List</a>
                </li>
              </ul>
        </li>
        <li>
              <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr2"><div class="pull-left"><i class="fa fa-question-circle mr-20"></i><span class="right-nav-text">Query </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
              <ul id="app_dr2" class="collapse collapse-level-1">
                <li>
                  <a href="{{ url('admin/queries') }}">Query</a>
                </li>
                <li>
                  <a href="{{ url('admin/contact_queries') }}">Contact Enquiry</a>
                </li>
              </ul>
        </li>
        <li>
           <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_ur"><div class="pull-left"><i class="fa fa-user mr-20"></i><span class="right-nav-text">User </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
           <ul id="app_ur" class="collapse collapse-level-1">
               <li> <a href="{{ url('/admin/users') }}"> User</a> </li>
               <li> <a href="{{ url('/admin/user_import') }}"> User import</a> </li>
           </ul>
        </li>

          <li>
             <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_ur4"><div class="pull-left"><i class="fa fa-user mr-20" style="color:red"></i><span class="right-nav-text">Sub Admin </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
             <ul id="app_ur4" class="collapse collapse-level-1">
                 <li> <a href="{{ url('/admin/sub_admin') }}"> Sub Admin</a> </li>
             </ul>
          </li>
          <li>
              <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr3"><div class="pull-left"><i class="fa fa-file mr-20"></i><span class="right-nav-text">Reports </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
              <ul id="app_dr3" class="collapse collapse-level-1">
                <li>
                  <a href="{{ url('admin/reports') }}">Reports</a>
                </li>
              </ul>
          </li>
        @endif
         
          </ul>
        </li>
      </ul>
    </div>
    <!-- /Left Sidebar Menu -->
    
  <!-- page content -->

      @yield('content')
    <!-- /page content -->





        </div>
    <!-- /#wrapper -->
  
  <!-- JavaScript -->
  
    <!-- jQuery -->
    {{ Html::script('public/admin/vendors/bower_components/jquery/dist/jquery.min.js') }}

    <!-- Bootstrap Core JavaScript -->
    {{ Html::script('public/admin/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
    
 <!-- Data table JavaScript -->
  {{ Html::script('public/admin/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}
  {{ Html::script('public/admin/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}
  {{ Html::script('public/admin/vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js') }}
  {{ Html::script('public/admin/vendors/bower_components/jszip/dist/jszip.min.js') }}
  {{ Html::script('public/admin/vendors/bower_components/pdfmake/build/pdfmake.min.js') }}
  {{ Html::script('public/admin/vendors/bower_components/pdfmake/build/vfs_fonts.js') }}
  
  {{ Html::script('public/admin/vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}
  {{ Html::script('public/admin/vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}
  {{ Html::script('public/admin/dist/js/export-table-data.js') }}
  
  <!-- Slimscroll JavaScript -->
  {{ Html::script('public/admin/dist/js/jquery.slimscroll.js') }}
  
  <!-- Progressbar Animation JavaScript -->
  {{ Html::script('public/admin/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js') }}
  {{ Html::script('public/admin/vendors/bower_components/jquery.counterup/jquery.counterup.min.js') }}
  
  <!-- Fancy Dropdown JS -->
  {{ Html::script('public/admin/dist/js/dropdown-bootstrap-extended.js') }}
  
  <!-- Sparkline JavaScript -->
  {{ Html::script('public/admin/vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}
  
  <!-- Owl JavaScript -->
  {{ Html::script('public/admin/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}
  
  <!-- Switchery JavaScript -->
  {{ Html::script('public/admin/vendors/bower_components/switchery/dist/switchery.min.js') }}
  
  <!-- EChartJS JavaScript -->
  {{ Html::script('public/admin/vendors/bower_components/echarts/dist/echarts-en.min.js') }}
  {{ Html::script('public/admin/vendors/echarts-liquidfill.min.js') }}
  
  <!-- Toast JavaScript -->
  {{ Html::script('public/admin/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js') }}
  
  <!-- Init JavaScript -->
  {{ Html::script('public/admin/dist/js/init.js') }}
 {{ Html::script('public/admin/dist/js/dashboard-data.js') }}
 {{ Html::script('public/admin/dist/js/custom.js') }}

  @yield('footerscript')

</body>

</html>
