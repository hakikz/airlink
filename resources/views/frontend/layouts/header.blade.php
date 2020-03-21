<header class="header-main header-style2">

    <!-- Header Topbar -->
    <div class="top-bar font2-title1 white-clr">
        <div class="theme-container container">
            <div class="row">
                <div class="col-md-6 col-sm-5">
                    <ul class="list-items fs-10">
                        <li><a href="#">sitemap</a></li>
                        {{-- <li class="active"><a href="#">Privacy</a></li>
                        <li><a href="#">Pricing</a></li> --}}
                    </ul>
                </div>
                <div class="col-md-6 col-sm-7 fs-12">
                    <p class="contact-num">  <i class="fa fa-phone"></i> Call us now: <span class="theme-clr"> +880-1756-390-370 </span> </p>
                </div>
            </div>
        </div>
        {{-- <a data-toggle="modal" href="#login-popup" class="sign-in fs-12 theme-clr-bg"> sign in </a> --}}
        <a href="{{ route('login') }}" class="sign-in fs-12 theme-clr-bg"> sign in </a>
    </div>
    <!-- /.Header Topbar -->

    <!-- Header Logo & Navigation -->
    <nav class="menu-bar font2-title1 white-clr">
        <div class="theme-container container">
            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-logo" href="{{ route('home') }}"> <img src="{{asset('frontend/img/logo/logo-2.png')}}" alt="logo"> </a>                                
                    <!-- <a class="navbar-logo" href="#"> <h5><i class="fa fa-plane"></i> Air Link Cargo</h5> </a>                                 -->
                </div>
                <div class="col-md-10 col-sm-10 fs-12">
                    <div id="navbar" class="collapse navbar-collapse no-pad">
                        <ul class="navbar-nav theme-menu">
                            <li class="dropdown active">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">Home </a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.html">Home Page1</a></li>
                                    <li><a href="index-2.html">Home Page2</a></li>
                                    <li><a href="index-3.html">Home Page3</a></li>

                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">Submenu Level 1 </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Submenu</a></li>
                                            <li><a href="#">Submenu</a></li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">Submenu Level 2</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Submenu</a></li>
                                                    <li><a href="#">Submenu</a></li>
                                                    <li><a href="#">Submenu</a></li>                                    
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li> <a href="about-us.html">about</a> </li>
                            <li> <a href="tracking.html"> tracking </a> </li>
                            {{-- <li> <a href="pricing-plans.html"> pricing </a> </li> --}}
                            <li> <a href="contact-us.html"> contact </a> </li>
                            {{-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">Blog</a>
                                <ul class="dropdown-menu">
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-left.html">Blog Left</a></li>
                                    <li><a href="single-blog.html">Single Post</a></li>                                    
                                </ul>
                            </li> --}}
                            {{-- <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">pages </a>
                                <ul class="dropdown-menu">
                                    <li><a href="get-quote.html"> Quote Page </a></li> 
                                    <li><a href="contact-us-2.html"> Contact-2 Page </a></li>
                                    <li><a href="404.html"> Error Page </a></li> 
                                    <li><a href="coming-soon.html"> Coming Soon Page </a></li>
                                </ul>
                            </li>   --}}
                            <li>&nbsp;</li>
                            {{-- <li><span class="search fa fa-search theme-clr transition"> </span></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- /.Header Logo & Navigation -->

</header>