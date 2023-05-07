
<!doctype html>
<html lang="en">
   
<!-- Mirrored from templates.iqonic.design/xray/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Dec 2022 08:20:49 GMT -->
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Login</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('pic') }}/full.png" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('layout') }}/css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{ asset('layout') }}/css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ asset('layout') }}/css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{ asset('layout') }}/css/responsive.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                            <div class="owl-carousel" data-autoplay="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                {{-- <div class="owl-carousel"></div> --}}
                                @php
                                $data = array();
                                @endphp
                                <div class="container" id="my-element">                                    
                                        <h4 class="mb-1 text-white">Lowongan Saat ini</h4>
                                        <table class="table table-borderless">
                                            @foreach ($data as $lowongan)
                                            <tr>
                                                <td>{{ $lowongan }}</td>
                                            </tr>                                                
                                            @endforeach
                                        </table>
                                </div>
                                {{-- Batas --}}
                                {{-- <img src="{{ asset('pic') }}/name.png" class="img-fluid mb-4" alt="logo"> --}}
                                    {{-- <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p> --}}
                                {{-- Batas Bawah --}}
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
                        <br>
                        <br>
                    </div>
                    <div class="col-md-6 position-relative">
                        <div class="sign-in-from">
                            <h1 class="mb-0">Login</h1>
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <p>Masukkan Email dan Password untuk masuk.</p>
                            <form class="mt-4" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control mb-0" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    {{-- <a href="#" class="float-right">Lupa Password?</a> --}}
                                    <input type="password" name="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="d-inline-block w-100">
                                    <span class="dark-color d-inline-block line-height-2">Tidak punya akun? <a href="/register">Daftar</a></span>                                    
                                    <button type="submit" class="btn btn-primary float-right">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<script>
  $(document).ready(function() {
    getData();
  });

  function getData() {
    $.ajax({
      url: `/api/lowongan`,
      type: "GET",
      cache: false,
      success: function(response) {
        var $data = "";
                $.each(response, function(index, value) {
                    $data += "<p>" + value.posisi + "</p>";
                });
                // console.log($data);
                $('#my-element').append($data);
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.log('Error:', textStatus, errorThrown);
      }
    });
  }
</script>
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