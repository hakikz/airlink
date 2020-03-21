@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Content Wrapper -->
    <article> 
        <!-- Banner -->
        <section class="banner banner-style2 mask-overlay pt-120 white-clr">
            <div class="pad-50 hidden-xs"></div>
            <div class="container theme-container rel-div">
                <img class="pt-10 effect animated fadeInLeft" alt="" src="{{ asset('frontend/img/icons/icon-1.png') }}">
                <ul class="list-items fw-600 effect animated wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">   
                    <li><a href="#">fast</a></li>
                    <li><a href="#">secured</a></li>
                    <li><a href="#">worldwide</a></li>
                </ul>
                <h2 class="section-title fs-48 effect animated wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> fast & reliable <br> <span class="theme-clr"> courier </span> & <span class="theme-clr"> delivery </span> services </h2>
                <div class="pad-30"></div>
                <div class="col-md-8 col-md-offset-2 tracking-form text-left effect animated fadeInUp">     
                    <h2 class="title-1"> track your product </h2> <span class="font2-light fs-12">Now you can track your product easily</span>
                    <div class="row">
                        <form class="">
                            <div class="col-md-7 col-sm-7">
                                <div class="form-group">
                                    <input type="text" class="form-control box-shadow" required="" placeholder="Enter your product ID">
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="form-group">
                                    <button class="btn-1">track your product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="pad-10"></div>
                </div>
            </div>                    
        </section>
        <!-- /.Banner -->

        <!-- Feature-2 -->
        <section class="pad-50 feature feature-2 clrbg-before">                    
            <div class="theme-container container">  
                <div class="row">
                    <div class="col-sm-4">
                        <img alt="" src="{{asset('frontend/img/icons/icon-2.png')}}" class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> 
                        <div class="feature-content wow rotateInDownRight" data-wow-offset="50" data-wow-delay=".30s"> 
                            <h2 class="title-1">Fast delivery</h2> 
                            <p>Duis autem vel eum iriure dolor</p>                                            
                        </div>  
                    </div>
                    <div class="col-sm-4">
                        <img alt="" src="{{asset('frontend/img/icons/icon-3.png')}}" class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> 
                        <div class="feature-content wow rotateInDownRight" data-wow-offset="50" data-wow-delay=".30s"> 
                            <h2 class="title-1">secured service</h2> 
                            <p>Duis autem vel eum iriure dolor in hendrerit</p>                                            
                        </div>  
                    </div>
                    <div class="col-sm-4">
                        <img alt="" src="{{asset('frontend/img/icons/icon-4.png')}}" class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> 
                        <div class="feature-content wow rotateInDownRight" data-wow-offset="50" data-wow-delay=".30s"> 
                            <h2 class="title-1">worldwide shipping</h2> 
                            <p>Eum iriure dolor in hendrerit in vulputa</p>                                            
                        </div>  
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Feature-2 -->

        <!-- About Us -->
        <section class="pad-120 about-wrap about-2 clrbg-before">
            <span class="bg-text wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> About </span>
            <div class="theme-container container">               
                <div class="row">
                    <div class="col-md-6">
                        <div class="pt-80 visible-lg"></div>
                        <div class="about-us">
                            <h2 class="section-title pb-10 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> About Us </h2>
                            <p class="fs-16 wow fadeInUp" data-wow-offset="50" data-wow-delay=".25s">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam 
                                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam 
                                erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci 
                                tation ullamcorper suscipit lobortis nisl ut aliquip.</p>                                    
                        </div>
                    </div>
                    <div class="col-md-6 text-center">                                
                        <img alt="" src="{{asset('frontend/img/block/about-img.png')}}" class="wow slideInRight" data-wow-offset="50" data-wow-delay=".20s">
                    </div>
                </div>
            </div>
        </section>
        <!-- /.About Us -->

        <!-- Steps -->
        <section class="steps-wrap mask-overlay pad-80">                
            <div class="theme-container container">               
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="font-2 fs-50 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s"> 1. </div> 
                        <div class="steps-content wow fadeInLeft" data-wow-offset="50" data-wow-delay=".25s"> 
                            <h2 class="title-3">Order</h2> 
                            <p class="gray-clr">Duis autem vel eum iriur <br> hendrerit in vulputate</p>                                            
                        </div>  
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="font-2 fs-50 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s"> 2. </div> 
                        <div class="steps-content wow fadeInLeft" data-wow-offset="50" data-wow-delay=".25s"> 
                            <h2 class="title-3">Wait</h2> 
                            <p class="gray-clr">Duis autem vel eum iriur <br> hendrerit in vulputate</p>                                            
                        </div>  
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="font-2 fs-50 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s"> 3. </div> 
                        <div class="steps-content wow fadeInLeft" data-wow-offset="50" data-wow-delay=".25s"> 
                            <h2 class="title-3">Deliver</h2> 
                            <p class="gray-clr">Duis autem vel eum iriur <br> hendrerit in vulputate</p>                                            
                        </div>  
                    </div>
                </div>
            </div>
            <div class="step-img wow slideInRight" data-wow-offset="50" data-wow-delay=".20s"> <img src="{{asset('frontend/img/block/step-img.png')}}" alt=""> </div>
        </section>
        <!-- /.Steps -->


        <!-- Calculate Your Cost -->
        <section class="calculate pt-100">
            <div class="theme-container container">  
                <span class="bg-text right wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> calculate </span>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <img src="{{asset('frontend/img/block/Courier-Man.png')}}" alt="" class="wow slideInLeft" data-wow-offset="50" data-wow-delay=".20s">
                    </div>
                    <div class="col-md-6">   
                        <div class="pad-10"></div>
                        <h2 class="section-title pb-10 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> calculate your cost </h2>
                        <p class="fs-16 wow fadeInUp" data-wow-offset="50" data-wow-delay=".25s">Lorem ipsum dolor sit amet, consectetuer adipiscing elit nonummy nibh 
                            euismod tincidunt ut laoreet.</p>
                        <div class="calculate-form">
                            <form class="row">
                                <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                    <div class="col-sm-3"> <label class="title-2"> height (cm): </label></div>
                                    <div class="col-sm-9"> <input type="text" placeholder="" class="form-control"> </div>                                        
                                </div>
                                <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                    <div class="col-sm-3"> <label class="title-2"> width (cm): </label></div>
                                    <div class="col-sm-9"> <input type="text" placeholder="" class="form-control"> </div>                                        
                                </div>
                                <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                    <div class="col-sm-3"> <label class="title-2"> depth (cm): </label></div>
                                    <div class="col-sm-9"> <input type="text" placeholder="" class="form-control"> </div>                                        
                                </div>
                                <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                    <div class="col-sm-3"> <label class="title-2"> weight (kg): </label></div>
                                    <div class="col-sm-9"> <input type="text" placeholder="" class="form-control"> </div>                                        
                                </div>
                                <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                    <div class="col-sm-3"> <label class="title-2"> location: </label></div>
                                    <div class="col-sm-9"> 
                                        <div class="col-sm-6 no-pad">
                                            <input type="text" placeholder="From" class="form-control from fw-600">
                                        </div>
                                        <div class="col-sm-6 no-pad">
                                            <input type="text" placeholder="To" class="form-control to fw-600">
                                        </div>
                                    </div>                                        
                                </div>
                                <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                    <div class="col-sm-3"> <label class="title-2"> Package: </label></div>
                                    <div class="col-sm-9"> 
                                        <div class="form-group">
                                            <select class="selectpicker form-control" data-live-search="true" data-width="100%" data-toggle="tooltip" title="select your package">
                                                <option>Option 1</option>
                                                <option>Option 2</option>
                                                <option>Option 3</option>
                                            </select>
                                        </div>                                           
                                    </div>                                        
                                </div>                                    
                                <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                    <div class="col-sm-9 col-xs-12 pull-right"> 
                                        <div class="btn-1"> <span> Total Cost: </span> <span class="btn-1 dark"> $150 </span>  </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="pt-80 hidden-lg"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Calculate Your Cost -->

        <!-- Testimonial -->
        <section class="testimonial mask-overlay">
            <div class="theme-container container">               
                <div class="testimonial-slider no-pagination pad-120">
                    <div class="item">
                        <div class="testimonial-img darkclr-border theme-clr font-2 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <img alt="" src="{{asset('frontend/img/block/testimonial-1.png')}}">
                            <span>,,</span>
                        </div>
                        <div class="testimonial-content">
                            <p class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".25s">  <i class="gray-clr fs-16">
                                    Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla 
                                    <br> facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit 
                                    <br> augue duis dolore te feugait nulla facilisi.
                                </i> </p>
                            <h2 class="title-2 pt-10 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> <a href="#" class="white-clr fw-900"> Bushra Ahsani </a> </h2>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-img darkclr-border theme-clr font-2">
                            <img alt="" src="{{asset('frontend/img/block/testimonial-1.png')}}">
                            <span>,,</span>
                        </div>
                        <div class="testimonial-content">
                            <p>  <i class="gray-clr fs-16">
                                    Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla 
                                    <br> facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit 
                                    <br> augue duis dolore te feugait nulla facilisi.
                                </i> </p>
                            <h2 class="title-2 pt-10"> <a href="#" class="white-clr fw-900"> Bushra Ahsani </a> </h2>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-img darkclr-border theme-clr font-2">
                            <img alt="" src="{{asset('frontend/img/block/testimonial-1.png')}}">
                            <span>,,</span>
                        </div>
                        <div class="testimonial-content">
                            <p>  <i class="gray-clr fs-16">
                                    Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla 
                                    <br> facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit 
                                    <br> augue duis dolore te feugait nulla facilisi.
                                </i> </p>
                            <h2 class="title-2 pt-10"> <a href="#" class="white-clr fw-900"> Bushra Ahsani </a> </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Testimonial -->

        <!-- Product Delivery -->
        <section class="prod-delivery pad-120">
            <div class="theme-container container">               
                <div class="row">
                    <div class="col-md-11 col-md-offset-1">
                        <div class="pt-120 rel-div">
                            <div class="pb-50 hidden-xs"></div>
                            <h2 class="section-title wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> Get the <span class="theme-clr"> fastest </span> product delivery </h2>
                            <p class="fs-16 wow fadeInUp" data-wow-offset="50" data-wow-delay=".25s">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam <br>
                                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam <br>
                                erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci <br>
                                tation ullamcorper suscipit lobortis nisl ut aliquip.</p>
                            <div class="pb-120 hidden-xs"></div>
                        </div>
                        <div class="delivery-img pt-10">
                            <img alt="" src="{{asset('frontend/img/block/delivery.png')}}" class="wow slideInLeft" data-wow-offset="50" data-wow-delay=".20s">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.Product Delivery -->

        <!-- Pricing & Plans -->
        {{-- <section class="pricing-wrap  pricing-2">                
            <div class="theme-container container">    
                <span class="bg-text center wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> Pricing </span>
                <div class="title-wrap text-center  pb-50">
                    <h2 class="section-title wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">Pricing & plans</h2>
                    <p class="wow fadeInLeft" data-wow-offset="50" data-wow-delay=".25s">See our pricing & plans to get best service</p>
                </div>
                <div class="row">
                    <div class="col-md-4 wow slideInUp" data-wow-offset="50" data-wow-delay=".20s">
                        <div class="pricing-box clrbg-before clrbg-after transition">
                            <div class="block-inline text-center">
                                <div class="pad-10"></div>
                                <h3 class="title-2"> Basic </h3>
                                <h2 class="section-title fs-36">$50</h2>
                                <p>for single product</p>
                            </div>
                            <div class="price-content-2">                                    
                                <ul class="title-2">
                                    <li> Product Weight: <span class="gray-clr">&LT; 3kg</span> </li>
                                    <li> Country: <span class="gray-clr">  all</span> </li>
                                    <li> duration: <span class="gray-clr">7-14 days</span> </li>
                                    <li> support: <span class="gray-clr">yes</span> </li>
                                </ul>
                            </div>
                            <div class="text-center order-2">
                                <a href="#" class="btn-round"> order now </a>
                            </div>
                            <div class="pricing-hover clrbg-before clrbg-after transition"></div>
                        </div>
                    </div>
                    <div class="col-md-4 wow slideInUp" data-wow-offset="50" data-wow-delay=".30s">
                        <div class="pricing-box active">
                            <div class="block-inline text-center">
                                <div class="pad-10"></div>
                                <h3 class="title-2"> Premium </h3>
                                <h2 class="section-title fs-36">$250</h2>
                                <p>for package product</p>
                            </div>
                            <div class="price-content-2">                                    
                                <ul class="title-2">
                                    <li> Product Weight: <span class="gray-clr">&LT; 3kg</span> </li>
                                    <li> Country: <span class="gray-clr">  all</span> </li>
                                    <li> duration: <span class="gray-clr">7-14 days</span> </li>
                                    <li> support: <span class="gray-clr">yes</span> </li>
                                </ul>
                            </div>
                            <div class="text-center order-2">
                                <a href="#" class="btn-round"> order now </a>
                            </div>
                        </div>
                    </div>                            
                    <div class="col-md-4 wow slideInUp" data-wow-offset="50" data-wow-delay=".40s">
                        <div class="pricing-box clrbg-before clrbg-after transition">
                            <div class="block-inline text-center">
                                <div class="pad-10"></div>
                                <h3 class="title-2"> standard </h3>
                                <h2 class="section-title fs-36">$150</h2>
                                <p>for multiple product</p>
                            </div>
                            <div class="price-content-2">                                    
                                <ul class="title-2">
                                    <li> Product Weight: <span class="gray-clr">&LT; 3kg</span> </li>
                                    <li> Country: <span class="gray-clr">  all</span> </li>
                                    <li> duration: <span class="gray-clr">7-14 days</span> </li>
                                    <li> support: <span class="gray-clr">yes</span> </li>
                                </ul>
                            </div>
                            <div class="text-center order-2">
                                <a href="#" class="btn-round"> order now </a>
                            </div>
                            <div class="pricing-hover clrbg-before clrbg-after transition"></div>
                        </div>
                    </div>
                </div>                        
            </div>               
        </section> --}}
        <!-- /.Pricing & Plans -->

        <!-- Contact us -->
        <section class="contact-wrap contact-2 pad-120">   
            <span class="bg-text center wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s"> Contact </span>
            <div class="theme-container container">               
                <div class="row">
                    <div class="col-md-6 col-sm-8 col-sm-offset-2 col-md-offset-3">
                        <div class="title-wrap text-center">
                            <h2 class="section-title wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s">contact us</h2>
                            <p class="wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s">Get in touch with us easiky</p>
                        </div>
                        {{-- <ul class="contact-detail title-2">
                            <li class="wow slideInUp" data-wow-offset="50" data-wow-delay=".20s"> <span>uk numbers:</span> <p class="gray-clr"> +001-2463-957 <br> +001-4356-643 </p> </li>
                            <li class="wow slideInUp" data-wow-offset="50" data-wow-delay=".25s"> <span>usa numbers:</span> <p class="gray-clr"> +001-2463-957 <br> +001-4356-643 </p> </li>
                            <li class="wow slideInUp" data-wow-offset="50" data-wow-delay=".30s"> <span>Email address:</span> <p class="gray-clr"> support@go.com <br> info@go.com </p> </li>
                        </ul> --}}
                    </div> 
                    <div class="col-md-4 contact-detail title-2 text-center">
                        <div class="wow slideInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <span>uk numbers:</span> <p class="gray-clr"> +001-2463-957 <br> +001-4356-643 </p> 
                        </div>
                    </div>
                    <div class="col-md-4 contact-detail title-2 text-center">
                        <div class="wow slideInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <span>usa numbers:</span> <p class="gray-clr"> +001-2463-957 <br> +001-4356-643 </p> 
                        </div>
                    </div>
                    <div class="col-md-4 contact-detail title-2 text-center">
                        <div class="wow slideInUp" data-wow-offset="50" data-wow-delay=".20s">
                            <span>Email address:</span> <p class="gray-clr"> support@go.com <br> info@go.com </p> 
                        </div>
                    </div>                       
                </div>
            </div>               
        </section>
        <!-- /.Contact us -->
    </article>
    <!-- /.Content Wrapper -->
@endsection