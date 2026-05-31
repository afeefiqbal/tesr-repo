@extends('web.layouts.main')
@section('content')
    @if($homeBanners->isNotEmpty())
        <section class="banner content">
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                @if(count($homeBanners)>1)
                    <div class="carousel-indicators">
                        @php $i=0;@endphp
                        @foreach($homeBanners as $hBanner)
                            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{$i}}" class="{{($loop->first)?'active':''}}" aria-current="{{($loop->first)?'true':'false'}}" aria-label="Slide {{$i+1}}"></button>
                            @php $i++;@endphp
                        @endforeach  
                    </div>
                @endif
                <div class="carousel-inner">
                    @foreach($homeBanners as $hBanner)
                        <div class="carousel-item {{($loop->first)?'active':''}}">
                            <img src="{{asset($hBanner->image)}}" width="100%" height="768px">
                            <div class="container">
                                <div class="carousel-caption">
                                    @if($hBanner->title!=NULL)
                                        <span>{!!$hBanner->title!!}</span>
                                    @endif
                                    @if($hBanner->sub_title!=NULL)
                                        <h1 class="animate__animated animate__fadeInUp">{!!$hBanner->sub_title!!}</h1>
                                    @endif
                                    @if($hBanner->description!=NULL)
                                        <p class="animate__animated animate__fadeInUp">
                                            {!!$hBanner->description!!}
                                        </p>
                                    @endif
                                    @if($hBanner->button_url!=NULL)
                                        <a href="{{url($hBanner->button_url)}}">
                                            <button class="animate__animated animate__fadeInUpBig">{{($hBanner->button_text!=NULL)?$hBanner->button_text:'View Products'}}</button>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach    
                </div>
                @if(count($homeBanners)>1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                @endif    
            </div>
        </section>
    @endif 
    @if($featuredProducts->isNotEmpty())   
        <section class="mw_home_sec_01">
            <div class="container">
                <h2 class="headeing">Featured <span>Product</span></h2>
                <div class="row mw_product_row">
                    @foreach($featuredProducts as $featured)
                        @include('web.render._single_product',['product'=>$featured,'column'=>3])
                    @endforeach
                </div>
                <center>
                    <a href="{{url('products')}}">
                        <button class="mw_more_product_btn">more Products 
                            <img src="{{asset('web/images/arrow_btn.svg')}}">
                        </button>
                    </a>
                </center>
            </div>
        </section>
    @endif    
    @if($whyChooseUs->isNotEmpty())
        <section class="mw_home_sec_02">
            <div class="container">
                <h2 class="headeing">Why <span>Choose US</span></h2>
                <div class="row row_warpper">
                    @foreach($whyChooseUs as $why)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 mw_col_wrapper">
                            <div class="mw_col_inner_wrapper">
                                @if($why->image!=NULL)
                                    <img src="{{asset($why->image)}}" class="mw_why_choose_icon" {!!$why->image_attribute!!}>
                                @else
                                    <img src="{{asset('web/images/why_choose_icon_01.png')}}" class="mw_why_choose_icon">
                                @endif
                                @if($why->hover_image!=NULL)
                                    <img src="{{asset($why->hover_image)}}" class="mw_why_choose_icon hover" {!!$why->hover_image_attribute!!}>
                                @else
                                    <img src="{{asset('web/images/why_choose_icon_01_h.png')}}" class="mw_why_choose_icon hover">
                                @endif
                                <h4>{{$why->title}}</h4>
                                {!!$why->description!!}
                            </div>
                        </div>
                    @endforeach    
                </div>  
            </div>
        </section>  
    @endif
    @if($about!=NULL)
        <section class="mw_home_sec_03">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_left">
                        <h2 class="headeing">
                            {!!$about->title!!}
                        </h2>
                        {!!$about->home_description!!}
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_right">
                        @if($about->home_image!=NULL)
                            <img src="{{asset($about->home_image)}}" class="responsive">
                        @else
                            <img src="{{asset('web/images/home_about_sect_img.png')}}" class="responsive">
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif    
    @include('web.render._partners')    
    @include('web.render._testimonials')
    @if($blogs->isNotEmpty())
        <section class="mw_home_sec_06">
            <div class="container">
                <h2 class="headeing">Our <span>Blogs</span></h2>
                <div class="row row_warpper">
                    @foreach($blogs as $blog)
                        @include('web.render._single_blog')
                    @endforeach    
                </div>
                <center>
                    <a href="{{url('blogs')}}">
                        <button class="mw_more_product_btn">more Blogs 
                            <img src="{{asset('web/images/arrow_btn.svg')}}">
                        </button>
                    </a>
                </center>
            </div>
        </section>
    @endif    
@endsection