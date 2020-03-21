<!DOCTYPE html>
<html>
    <head>
        <title>Air Link Cargo - @yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap Css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/bootstrap-3.3.6/css/bootstrap.min.css') }}">        
        <!-- Bootstrap Select Css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css') }}">
        <!-- Fonts Css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/font-awesome-4.6.1/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/font-elegant/elegant.css') }}">
        <!-- OwlCarousel2 Slider Css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/owl.carousel.2/assets/owl.carousel.css') }}">


        <!-- Animate Css -->       
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/animate.css') }}">

        @stack('styles')

        <!-- Main Css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/theme.css') }}">


        <!--[if lt IE 9]>
        <script src="assets/plugins/iesupport/html5shiv.js"></script>
        <script src="assets/plugins/iesupport/respond.js"></script>
        <![endif]-->
    </head>
    <body id="home">

        <!-- Preloader -->
        @section('preloader')
            @include('frontend.layouts.preloader')
        @show
        <!-- /.Preloader -->

        <!-- Main Wrapper -->        
        <main class="wrapper">

            <!-- Header -->
            @section('header') 
                @include('frontend.layouts.header')
            @show
            <!-- /.Header -->

            <!-- Content Wrapper -->
            @section('content')
        
            @show
            <!-- /.Content Wrapper -->

            <!-- Footer -->
            <footer>
                <div class="footer-main pad-120 white-clr">
                    <div class="theme-container container">               
                        <div class="row">
                            <div class="col-md-3 col-sm-6 footer-widget">
                                <a href="#"> <img class="logo" alt="#" src="{{asset('frontend/img/logo/logo-2.png')}}">  </a>
                            </div>
                            <div class="col-md-3 col-sm-6 footer-widget">
                                <h2 class="title-1 fw-900">quick links</h2>
                                <ul>
                                    <li> <a href="#">sitemap</a> </li>
                                    <li> <a href="#">support</a> </li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-6 footer-widget">
                                <h2 class="title-1 fw-900">important links</h2>
                                <ul>
                                    <li> <a href="#">Sign In</a> </li>
                                    <li> <a href="#">Forgot Password</a> </li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-6 footer-widget">
                                <h2 class="title-1 fw-900">get in touch</h2>
                                <ul class="social-icons list-inline">
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".20s"> <a href="#" class="fa fa-facebook"></a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".25s"> <a href="#" class="fa fa-twitter"></a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".30s"> <a href="#" class="fa fa-google-plus"></a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".35s"> <a href="#" class="fa fa-linkedin"></a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="theme-container container">               
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <p> © Copyright 2016, All rights reserved </p>                            
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <p> Site By <a href="https://iciclecorporation.com" class="main-clr"> Icicle Corporation </a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- /.Footer -->


        </main>
        <!-- / Main Wrapper -->

        <!-- Top -->
        <div class="to-top theme-clr-bg transition"> <i class="fa fa-angle-up"></i> </div>

        <!-- Popup: Login -->
        <div class="modal fade login-popup" id="login-popup" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">                
                <a class="close close-btn" data-dismiss="modal" aria-label="Close"> x </a>

                <div class="modal-content">   
                    <div class="login-wrap text-center">                        
                        <h2 class="title-3"> sign in </h2>
                        <p> Sign in to <strong> GO </strong> for getting all details </p>                        

                        <div class="login-form clrbg-before">
                            <form class="login">
                                <div class="form-group"><input type="text" placeholder="Email address" class="form-control"></div>
                                <div class="form-group"><input type="password" placeholder="Password" class="form-control"></div>
                                <div class="form-group">
                                    <button class="btn-1 " type="submit"> Sign in now </button>
                                </div>
                            </form>
                            <a href="#" class="gray-clr"> Forgot Passoword? </a>                            
                        </div>                        
                    </div>
                    {{-- <div class="create-accnt">
                        <a href="#" class="white-clr"> Don’t have an account? </a>  
                        <h2 class="title-2"> <a href="#" class="green-clr under-line">Create a free account</a> </h2>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- /Popup: Login --> 

        <!-- Search Popup -->
        <div class="search-popup">
            <div>
                <div class="popup-box-inner">
                    <form>
                        <input class="search-query" type="text" placeholder="Search and hit enter">
                    </form>
                </div>
            </div>
            <a href="javascript:void(0)" class="close-search"><i class="fa fa-close"></i></a>
        </div>
        <!-- / Search Popup -->

        <!-- Main Jquery JS -->
        <script src="{{ asset('frontend/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>        
        <!-- Bootstrap JS -->
        <script src="{{ asset('frontend/plugins/bootstrap-3.3.6/js/bootstrap.min.js') }}" type="text/javascript"></script>    
        <!-- Bootstrap Select JS -->
        <script src="{{ asset('frontend/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js') }}" type="text/javascript"></script>    
        <!-- OwlCarousel2 Slider JS -->
        <script src="{{ asset('frontend/plugins/owl.carousel.2/owl.carousel.min.js') }}" type="text/javascript"></script>   
        <!-- Sticky Header -->
        <script src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
        <!-- Wow JS -->
        <script src="{{ asset('frontend/plugins/WOW-master/dist/wow.min.js') }}" type="text/javascript"></script>   

        <!-- Slider JS -->        

        @stack('scripts')
        <!-- Theme JS -->
        <script src="{{ asset('frontend/js/theme.js') }}" type="text/javascript"></script>

    </body>
</html>
