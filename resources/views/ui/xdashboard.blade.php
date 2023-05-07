
<!doctype html>
<html lang="en">
   
<!-- Mirrored from templates.iqonic.design/xray/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Dec 2022 08:18:36 GMT -->
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>@yield('title')</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('pic') }}/logo.png" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('layout') }}/css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{ asset('layout') }}/css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ asset('layout') }}/css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{ asset('layout') }}/css/responsive.css">
       <!-- Full calendar -->
      <link href='{{ asset('layout') }}/fullcalendar/core/main.css' rel='stylesheet' />
      <link href='{{ asset('layout') }}/fullcalendar/daygrid/main.css' rel='stylesheet' />
      <link href='{{ asset('layout') }}/fullcalendar/timegrid/main.css' rel='stylesheet' />
      <link href='{{ asset('layout') }}/fullcalendar/list/main.css' rel='stylesheet' />

      <link rel="stylesheet" href="{{ asset('layout') }}/css/flatpickr.min.css">
      @include('sweetalert::alert')
      {{-- @vite(['resources/js/app.js']) --}}
      <script src="{{ asset('vendor/jquery.js') }}"></script>
   </head>
   <body class="sidebar-main-menu">
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">

         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         @include('ui.nav')
         
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <!-- TOP Nav Bar -->
         <div class="iq-top-navbar header-top-sticky">
            <div class="iq-navbar-custom">
               <div class="iq-sidebar-logo">
                  <div class="top-logo">
                     <a href="index.html" class="logo">
                     <img src="{{ asset('layout') }}/images/logo.png" class="img-fluid" alt="">
                     <span>XRay</span>
                     </a>
                  </div>
               </div>
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-search-bar">
                     {{-- <form action="#" class="searchbox">
                        <input type="text" class="text search-input" placeholder="Type here to search...">
                        <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                     </form> --}}
                  </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="ri-more-fill"></i></div>
                           <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                     </div>
                  </div>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     {{-- <ul class="navbar-nav ml-auto navbar-list">
                        <li class="nav-item">
                           <a class="search-toggle iq-waves-effect language-title" href="#"><img src="{{ asset('layout') }}/images/small/flag-01.png" alt="img-flaf" class="img-fluid mr-1" style="height: 16px; width: 16px;" /> English <i class="ri-arrow-down-s-line"></i></a>
                           <div class="iq-sub-dropdown">
                              <a class="iq-sub-card" href="#"><img src="{{ asset('layout') }}/images/small/flag-02.png" alt="img-flaf" class="img-fluid mr-2" />French</a>
                              <a class="iq-sub-card" href="#"><img src="{{ asset('layout') }}/images/small/flag-03.png" alt="img-flaf" class="img-fluid mr-2" />Spanish</a>
                              <a class="iq-sub-card" href="#"><img src="{{ asset('layout') }}/images/small/flag-04.png" alt="img-flaf" class="img-fluid mr-2" />Italian</a>
                              <a class="iq-sub-card" href="#"><img src="{{ asset('layout') }}/images/small/flag-05.png" alt="img-flaf" class="img-fluid mr-2" />German</a>
                              <a class="iq-sub-card" href="#"><img src="{{ asset('layout') }}/images/small/flag-06.png" alt="img-flaf" class="img-fluid mr-2" />Japanese</a>

                           </div>
                        </li>
                     </ul> --}}
                  </div>
                  <ul class="navbar-list">
                     <li>
                        <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                           <img src="{{ asset('layout') }}/images/user/1.jpg" class="img-fluid rounded mr-3" alt="user">
                           <div class="caption">
                              <h6 class="mb-0 line-height">Halo, {{ auth()->user()->name }}</h6>
                              <span class="font-size-12">Available</span>
                           </div>
                        </a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                           <div class="iq-card shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">Halo, {{ auth()->user()->name }}</h5>
                                    <span class="text-white font-size-12">Available</span>
                                 </div>
                                 <a href="/user/profile" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-file-user-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">My Profile</h6>
                                          <p class="mb-0 font-size-12">View personal profile details.</p>
                                       </div>
                                    </div>
                                 </a>
                                 {{-- <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-profile-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Edit Profile</h6>
                                          <p class="mb-0 font-size-12">Modify your personal details.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-account-box-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Account settings</h6>
                                          <p class="mb-0 font-size-12">Manage your account parameters.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="privacy-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-lock-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Privacy Settings</h6>
                                          <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                                       </div>
                                    </div>
                                 </a> --}}
                                 <div class="d-inline-block w-100 text-center p-3">
                                    <form method="POST" action="{{ route('logout') }}">
                                       @csrf
                                       <div class="nav-item">
                                           <a class="btn btn-primary nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                       this.closest('form').submit(); " role="button">
                                               <i class="fas fa-sign-out-alt"></i>
                               
                                               {{ __('Log Out') }}
                                           </a>
                                       </div>
                                   </form>
                                    {{-- <a class="bg-primary iq-sign-btn" href="sign-in.html" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a> --}}
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </nav>

            </div>
         </div>
         <!-- TOP Nav Bar END -->
         <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
         @yield('content')
         </div>
         </div>
        </div>
            <!-- Footer -->
      <!-- Footer END -->
         </div>
      </div>
      <!-- Wrapper END -->
      
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{ asset('layout') }}/js/jquery.min.js"></script>
      <script src="{{ asset('layout') }}/js/popper.min.js"></script>
      <script src="{{ asset('layout') }}/js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="{{ asset('layout') }}/js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="{{ asset('layout') }}/js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="{{ asset('layout') }}/js/waypoints.min.js"></script>
      <script src="{{ asset('layout') }}/js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="{{ asset('layout') }}/js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="{{ asset('layout') }}/js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="{{ asset('layout') }}/js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="{{ asset('layout') }}/js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="{{ asset('layout') }}/js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="{{ asset('layout') }}/js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="{{ asset('layout') }}/js/smooth-scrollbar.js"></script>
      <!-- lottie JavaScript -->
      <script src="{{ asset('layout') }}/js/lottie.js"></script>
      <!-- am core JavaScript -->
      <script src="{{ asset('layout') }}/js/core.js"></script>
      <!-- am charts JavaScript -->
      <script src="{{ asset('layout') }}/js/charts.js"></script>
      <!-- am animated JavaScript -->
      <script src="{{ asset('layout') }}/js/animated.js"></script>
      <!-- am kelly JavaScript -->
      <script src="{{ asset('layout') }}/js/kelly.js"></script>
      <!-- Flatpicker Js -->
      <script src="{{ asset('layout') }}/js/flatpickr.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{ asset('layout') }}/js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="{{ asset('layout') }}/js/custom.js"></script>
   </body>

<!-- Mirrored from templates.iqonic.design/xray/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Dec 2022 08:19:44 GMT -->
</html>