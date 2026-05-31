<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{!! isset($meta_data)?$meta_data->meta_title:'' !!} - {{ config('app.name') }} - </title>
        <!-- Favicons -->
        <link rel="icon" type="image/x-icon" href="{{asset('web/images/fav-icon.png')}}">
        <!-- Owl Stylesheets -->
        <link rel="stylesheet" href="{{asset('web/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('web/css/owl.theme.default.min.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
        <link rel="stylesheet" type="text/css" href="{{asset('web/css/jquery.fancybox.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('web/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('web/css/sweetalert.min.css')}}">
        <link rel="stylesheet" href="{{asset('web/css/sweetalert-overrides.css')}}">
        <script src="{{asset('web/js/jquery.min.js')}}"></script>
        <script src="{{asset('web/js/owl.carousel.js')}}"></script>
        </head>
    <body>
    @include('web.includes.menu')
    @yield('content')
    @if(isset($siteInformation))
        <section class="mobile_fixed_footer">
            <ul>
                @if($siteInformation->email_id!=NULL)
                    <li>
                        <a href="mailto:{{$siteInformation->email_id}}">
                            <img src="{{asset('web/images/email_icon.png')}}">
                        </a>
                    </li>
                @endif
                @if($siteInformation->phone_number!=NULL)
                    <li>
                        <a href="tel:{{$siteInformation->phone_number}}">
                            <img src="{{asset('web/images/phone_icon.png')}}">
                        </a>
                    </li>
                @endif
                @if($siteInformation->whatsapp_number!=NULL)
                    <li>
                        <a href="https://wa.me/{{$siteInformation->whatsapp_number}}">
                            <img src="{{asset('web/images/whatsapp_icon_product_details.png')}}">
                        </a>
                    </li>
                @endif
            </ul>
        </section>
    @endif
    <footer>
        <div class="container">
            <div class="row row_warpper">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mw_col_wrapper">
                    <img src="{{asset('web/images/footer_logo.png')}}" class="pb-2 footer_logo">
                    @if($siteInformation->footer_text!=NULL)
                        {!!$siteInformation->footer_text!!}
                    @endif
                    
                     <div class="social-icons">
              <a href="#" target="_blank">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 512 512"
                >
                  <path
                    d="M256 42.667c-111.476-.174-204.29 85.51-213.011 196.644c-8.72 111.134 69.593 210.245 179.731 227.462V317.44h-54.187V256h54.187v-46.933a75.094 75.094 0 0 1 80.427-82.987a335.5 335.5 0 0 1 47.786 4.053v52.48h-26.88a30.934 30.934 0 0 0-34.773 33.28V256h59.307l-9.6 61.653H289.28v149.334c110.805-16.546 189.934-115.984 181.174-227.675S368.03 41.735 256 42.667"
                  />
                </svg>
              </a>
              <a href="#">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                >
                  <g
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                  >
                    <path
                      d="M2.5 12c0-4.478 0-6.718 1.391-8.109S7.521 2.5 12 2.5c4.478 0 6.718 0 8.109 1.391S21.5 7.521 21.5 12c0 4.478 0 6.718-1.391 8.109S16.479 21.5 12 21.5c-4.478 0-6.718 0-8.109-1.391S2.5 16.479 2.5 12"
                    />
                    <path
                      d="M16.5 12a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0m1.008-5.5h-.01"
                    />
                  </g>
                </svg>
              </a>
              <a href="#">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93zM6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37z"
                  />
                </svg>
              </a>
            </div>
                </div>
                  <div class="col-md-5">
            <div class="quick-details">
              <h6>Quick Links</h6>
              <div class="footer-bottom-links">
              <ul>
              <li data-href="{{url('home')}}" class="clickable-element cursor-pointer">Home</li>
                        <li data-href="{{url('about-us')}}"class="clickable-element cursor-pointer">About Us</li>
                        <li data-href="{{url('products')}}"class="clickable-element cursor-pointer">Products</li>
                        <li data-href="{{url('blogs')}}"class="clickable-element cursor-pointer">Blogs</li>
                        <li data-href="{{url('contact-us')}}"class="clickable-element cursor-pointer">Contact</li>
              </ul>
              <ul>
                    @foreach($homeProducts as $hProduct)
                            <li data-href="{{url('product/'.$hProduct->short_url)}}" class="clickable-element cursor-pointer">{{$hProduct->title}}</li>
                        @endforeach
                <!--<li>-->
                <!--   <a href="#">Heart Plus Nanom AED Machine</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--   <a href="#">Medical Curtains</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--   <a href="#">ENT Diagnostic Set</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--   <a href="#">Intelect Mobile 2 Combo CHATTANOOGA USA</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--   <a href="#">Cami New Aspiret Suction Machine</a>-->
                <!--</li>-->
              </ul>
            </div>
            </div>
          </div>
                <!--<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mw_col_wrapper">-->
                <!--    <h4>Useful Links</h4>-->
                <!--    <ul>-->
                <!--        <li data-href="{{url('home')}}" class="clickable-element cursor-pointer">Home</li>-->
                <!--        <li data-href="{{url('about-us')}}"class="clickable-element cursor-pointer">About Us</li>-->
                <!--        <li data-href="{{url('products')}}"class="clickable-element cursor-pointer">Products</li>-->
                <!--        <li data-href="{{url('blogs')}}"class="clickable-element cursor-pointer">Blogs</li>-->
                <!--        <li data-href="{{url('contact-us')}}"class="clickable-element cursor-pointer">Contact</li>-->
                <!--    </ul>-->
                <!--</div>-->
                <!--<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mw_col_wrapper">-->
                <!--    <h4>Products</h4>-->
                <!--    <ul>-->
                <!--        @foreach($homeProducts as $hProduct)-->
                <!--            <li data-href="{{url('product/'.$hProduct->short_url)}}" class="clickable-element cursor-pointer">{{$hProduct->title}}</li>-->
                <!--        @endforeach-->
                <!--    </ul>-->
                <!--</div>-->
                @if(isset($siteInformation))
                 
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mw_col_wrapper">
                          <div class="contact-details">
              <h6>Contact details</h6>
              <p>
 <img src="{{asset('web/images/location.png')}}" class="">
                Office 412 B1 Building, Sheikh Rashid Bin Saeed Al Maktoum St, Al Bustan - Free Zone 1, Ajman-UAE
              </p>
              <a href="mailto:info@med-we.com" class="contact-links">
                   <img src="{{asset('web/images/mail.png')}}" class=" ">
                info@med-we.com
              </a>
              <a href="tel:+971569960643" class="contact-links pb-0 ">
                   <img src="{{asset('web/images/phone.png')}}" class=" ">
                +97 1569 96 0643
              </a>
              <a href="tel:065532668" class="contact-links" style="    padding-left: 34px;">
                <!-- <img src="./asstes/images/phone.png" alt=""> -->
               065 532 668
              </a>
            </div>
                        <!--<h4>Contact Info</h4>-->
                        <!--@if($siteInformation->address!=NULL)-->
                        <!--    <address>{!!$siteInformation->address!!}</address>-->
                        <!--@endif-->
                        <!--@if($siteInformation->email_id!=NULL)-->
                        <!--    <p><a href="mailto:{{$siteInformation->email_id}}">{{$siteInformation->email_id}}</a></p>-->
                        <!--@endif-->
                        <!--@if($siteInformation->phone_number!=NULL)-->
                        <!--    <p><a href="tel:{{$siteInformation->phone_number}}">{{$siteInformation->phone_number}}</a></p>-->
                        <!--@endif-->
                    </div>
                @endif
            </div>
        </div>
        <div class="secondary_footer">
            <div class="container">
                <p>© {{date('Y')}} Medwe All rights reserved. Design and Developed by <a href="https://www.hexacodes.in/"> Hexacodes</a></p>
            </div>
        </div>
    </footer>
    @if(isset($siteInformation) && $siteInformation->whatsapp_number!=NULL)
        <a href="https://wa.me/{{$siteInformation->whatsapp_number}}" target="_blank">
          <div class="mw_whatsapp_sticky">
            <img src="{{asset('web/images/whatsapp_icon_product_details.png')}}">
          </div>
        </a>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('web/js/sweetalert.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/js/sweetalert-init.js')}}"></script>
    <script src="{{asset('web/js/jquery.fancybox.js?v=2.1.4')}}"></script>
    <script src="{{asset('web/js/script.js')}}"></script>
    <script type="text/javascript">
        var base_url = "{{ url('/') }}";
        var token = "{{ csrf_token() }}";
    </script>
  </body>
</html> 
        