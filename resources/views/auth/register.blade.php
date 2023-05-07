
<!doctype html>
<html lang="en">
   
<!-- Mirrored from templates.iqonic.design/xray/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Dec 2022 08:20:49 GMT -->
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Daftar</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('pic') }}/name.png" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('layout') }}/css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{ asset('layout') }}/css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ asset('layout') }}/css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{ asset('layout') }}/css/responsive.css">
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page">
            <div class="container sign-in-page-bg mt-5 p-0">
                <div class="row no-gutters">
                    <div class="col-md-6 text-center">
                        <div class="sign-in-detail text-white">
                            <a class="sign-in-logo mb-5" href="#"><img src="{{ asset('pic') }}/full.png" class="img-fluid" alt="logo"></a>
                            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                <div class="item">
                                    <img src="{{ asset('pic') }}/name.png" class="img-fluid mb-4" alt="logo">
                                    {{-- <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p> --}}
                                </div>
                                {{-- <div class="item">
                                    <img src="{{ asset('layout') }}/images/login/2.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                                <div class="item">
                                    <img src="{{ asset('layout') }}/images/login/3.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <div class="sign-in-from">
                            <h1 class="mb-0">Daftar</h1>
                            <p>Masukkan Data Akun.</p>
                            <form class="mt-4" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control mb-0" id="exampleInputName1" placeholder="Enter name" name="name" :value="old('name')" required autofocus autocomplete="name">
                                    <div class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control mb-0" id="exampleInputEmail1" placeholder="Enter email" name="email" :value="old('email')" required>
                                    <div class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    {{-- <a href="#" class="float-right">Lupa Password?</a> --}}
                                    <input type="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Password" name="password" required autocomplete="new-password" >
                                    <div class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Password Confirmation</label>
                                    {{-- <a href="#" class="float-right">Lupa Password?</a> --}}
                                    <input type="password" class="form-control mb-0" id="password_confirmation" placeholder="Password Confirmation" name="password_confirmation" required autocomplete="new-password">
                                    <div class="text-danger">
                                        @error('password_confirmation')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-inline-block w-100">      
                                    <span class="dark-color d-inline-block line-height-2">Sudah punya akun? <a href="/login">Login</a></span>                                    
                                    <button type="submit" class="btn btn-primary float-right">Daftar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sign in END -->
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
      <!-- Chart Custom JavaScript -->
      <script src="{{ asset('layout') }}/js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="{{ asset('layout') }}/js/custom.js"></script>
   </body>

<!-- Mirrored from templates.iqonic.design/xray/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Dec 2022 08:20:52 GMT -->
</html>