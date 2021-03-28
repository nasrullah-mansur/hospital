<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Consultation Responsive  HTML5 Template</title>
    <meta name="description" content="Consultation Responsive  HTML5 Template " />
    <meta name="keywords" content="business,corporate, creative, woocommerach, design, gallery, minimal, modern, landing page, cv, designer, freelancer, html, one page, personal, portfolio, programmer, responsive, vcard, one page" />
    <meta name="author" content="Consultation" />
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <!-- fonts file -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- css file  -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <script src="{{ asset('assets/js/modernizr-3.11.2.min.js') }}"></script>
  </head>
  <body>
    <main class="page-wraper">
      <!-- main-sideba area start here  -->
      <aside class="main-sidebar">
        <div class="sidemenu-logo">
          <a href="index.html"><img src="{{ asset('assets/images/logo.png') }}" alt="logo" /></a>
        </div>
        <div class="main-sidebar-body">
          <nav class="main-menu">
            <ul id="metismenu">
              <li class="current-menu-item"><a href="{{ route('dashboard') }}"><i class="menu-icon flaticon-dashboard"></i> Dashboard</a></li>
              <li>
                <a href="{{ route('ticket.create') }}"><i class="menu-icon flaticon-support"></i> New Ticketing</a>
              </li>
              <li>
                <a href="{{ route('profile.edit', [Auth::user()->id, active_user_profile(Auth::user()->id)->slug]) }}"><i class="menu-icon flaticon-user"></i> Edit Profile</a>
              </li>
              <li>
                <a class="has-arrow" href="#"><i class="menu-icon flaticon-hand-cut"></i> Add Wound Photo</a>
                <ul>
                  <li><a href="add-wound-photo.html">Add Wound Photo</a></li>
                  <li><a href="trace-wound-analysis.html">Trace Wound Analysis</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
      <!-- main-sideba area end here  -->
      <div class="body-overlay"></div>
      <!-- content-body start here  -->
      <div class="content-body">
        <!-- header-area start here  -->
        <header class="header-area sticky-top">
          <div class="container-fluid">
            <div class="row align-items-center">
              <div class="col-9 col-md-8 col-sm-8">
                <div class="header-left d-flex align-items-center ">
                  <a href="#" class="menu-bar d-inline-block d-xl-none"><i class="fas fa-bars"></i></a>
                  <h2 class="page-title">Dashboard</h2>
                </div>
              </div>
              <div class="col-3 col-md-4 col-sm-4">
                <div class="header-right text-right">
                  <div class="dropdown user-dropdown">
                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" >
                       <span>{{ ucwords(active_user_profile(Auth::user()->id)->full_name) }} </span> <img class="user-image" src="{{ asset('assets/images/user.png') }}" alt="user" />
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <li class="dropdown-item"><a href="{{ route('profile.edit', [Auth::user()->id, active_user_profile(Auth::user()->id)->slug]) }}">Edit Profile</a></li>
                      <li class="dropdown-item"><a href="#" id="logOutBtn">Log Out</a></li>
                      <form class="d-none" id="logOutForm" action="{{ route('logout') }}" method="POST">
                          @csrf
                          <button class="d-none"></button>
                      </form>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>
        <!-- header-area end here  -->
        <div class="content-body-wrap">
          <div class="container-fluid">
            @yield('content')
          </div>
        </div>
      </div>
      <!-- content-body end here  -->
    </main>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
       $('#logOutBtn').on('click', function() {
           $('#logOutForm').submit();
       })
    </script>

    @yield('custom_js')
  </body>
</html>