@extends('web.layouts.main')
@section('content')
@if($homeBanners->isNotEmpty())
  <section class="hero">
    <div class="swiper hero-swiper">
      <div class="swiper-wrapper">
        @foreach($homeBanners as $hBanner)
          <div class="swiper-slide">
            <div class="hero-main">
              <picture>
                @if($hBanner->image)
                  <source media="(max-width: 768px)" srcset="{{asset($hBanner->image)}}">
                  <img src="{{asset($hBanner->image)}}" {!!$hBanner->image_attribute!!}>
                @endif
              </picture>
              <div class="container">
                <div class="content">
                  @if($hBanner->title)
                    <h1>
                      {!!$hBanner->title!!}
                    </h1>
                  @endif
                  @if($hBanner->description)
                    {!!$hBanner->description!!}
                  @endif
                  <div class="btns">
                   @if($hBanner->button_url)
  <a href="{{ $hBanner->button_url }}" class="btn btn-default">
    {!! $hBanner->button_text !!}
  </a>
@endif

@if($hBanner->alternate_button_url)
  <a href="{{ $hBanner->alternate_button_url }}" class="btn btn-border clickable-element">
    {!! $hBanner->alternate_button_text !!}
  </a>
@endif

                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="container">
        <div class="dots">
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </section>
@endif
@if($about)
  <section class="about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="heading">
            @if($about->short_title)
              <p class="sub-heading">{!!$about->short_title!!}</p>
            @endif
            @if($about->title)
              <h2>
                {!!$about->title!!}
              </h2>
            @endif
            @if($about->home_description)
              {!!$about->home_description!!}
            @endif
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <figure>
            @if($about->home_image)
              <img class="w-100" src="{{asset('web/images/images/img2.png')}}" {!!$about->home_image_attribute!!} />
            @else
              <img class="w-100" src="{{asset('web/images/images/img2.png')}}" alt="{{config('app.name')}}" />
            @endif
          </figure>
        </div>
        @if($keyFeatures->isNotEmpty())
          <div class="col-md-6">
            <div class="content">
              @foreach($keyFeatures as $key)
                <div class="counter-section">
                  <span>
                    <span class="count">{{$key->count}}</span>
                    +</span
                  >
                  <p class="mb-0">{!!$key->title!!}</p>
                </div>
              @endforeach
            </div>
          </div>
        @endif  
      </div>
    </div>
  </section>
@endif  
@if($featuredProducts->isNotEmpty())  
<section class="featured-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="heading">
          @if(headingContent('Fproduct'))
            <p class="sub-heading">
              {!! headingContent('Fproduct')->short_title !!}
            </p>
            @if(headingContent('Fproduct')->title)
              <h2>
                {!! headingContent('Fproduct')->title !!}
              </h2>
            @endif
            @if(headingContent('Fproduct')->description)
              {!! headingContent('Fproduct')->description !!}
            @endif
          @endif  
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="swiper featured-products-list">
          <div class="swiper-wrapper">
            @foreach($featuredProducts as $product)
              @php 
                  $productUrl = url('product/'.$product->short_url);
                  $message = 'Hi there, You have an enquiry, Product Name : '.$product->title.', Product Url : '.$productUrl;
              @endphp
              <div class="swiper-slide">
                <div class="product-card">
                  @if($product->thumbnail_image)
                    <img src="{{asset($product->thumbnail_image)}}" {!!$product->thumbnail_image_attribute!!}/>
                  @else
                    <img src="{{asset('web/images/home-images/product1 (1).png')}}" alt="{{$featured->short_url}}"/>
                  @endif
                  <div class="content">
                    <h5>{{$product->title}}</h5>
                    <!--@if($product->description)-->
                    <!--  {!!$product->home_description!!}-->
                    <!--@endif-->
                    <div class="btns">
                      <a href="#" class="btn btn-default clickable-element cursor-pointer whatsapp" data-href="https://api.whatsapp.com/send/?phone={{$siteInformation->whatsapp_number}}&text={{nl2br($message)}}&type=phone_number&app_absent=0" data-target="_blank">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="20"
                          height="20"
                          viewBox="0 0 24 24">
                          <path
                            d="M19.05 4.91A9.82 9.82 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01m-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.26 8.26 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.18 8.18 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23m4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07s.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28"
                          />
                        </svg>
                        Buy now
                      </a>
                      <a href="{{url('product/'.$product->short_url)}}" class="btn btn-border">Details</a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

          <div class="controls">
            <div class="swiper-button-prev"></div>
            <a href="{{url('products')}}" class="btn btn-border">View all Products</a>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif
<section class="why-choose-us" style="background-image: url({{asset('web/images/home-images/Why\ choose\ us.png')}});">
  <div class="container">
    <div class="grid-col">
     <div class="column">
      <img class="first-bg" src="{{asset('web/images/home-images/why-choose-img.png')}}" alt="{{config('app.name')}}">
       @if(headingContent('Whychooseus'))
         <div class="heading container">        
           @if(headingContent('Whychooseus')->short_title)
             <p class="sub-heading">
              {!!headingContent('Whychooseus')->short_title!!}
             </p>
           @endif
           @if(headingContent('Whychooseus')->title)
             <h2>
               {!!headingContent('Whychooseus')->title!!}
             </h2>
           @endif
           @if(headingContent('Whychooseus')->description)
              {!!headingContent('Whychooseus')->description!!}
           @endif
         </div>
       @endif
     </div>
     @if($whyChooseUs->isNotEmpty())
       <div class="column">
        <img class="shadow-bg" src="{{asset('web/images/home-images/choose-us-shadow.png')}}" alt="{{config('app.name')}}">
         <div class="accordion">
           @foreach($whyChooseUs as $why)
             <div class="accordion-item">
              <span>0{{$loop->iteration}}</span>
               <div class="accordion-item-header">
                {{$why->title}}
               </div>
               @if($why->description)
                 <!-- /.accordion-item-header -->
                 <div class="accordion-item-body">
                   <div class="accordion-item-body-content">
                     {!!$why->description!!}
                   </div>
                 </div>
                 <!-- /.accordion-item-body -->
              @endif   
             </div>
            @endforeach 
         </div>
       </div>
     @endif
    </div>
  </div>
</section>
@if($blogs->isNotEmpty())
    <section class="blogs">
      <img src="{{asset('web/images/home-images/img4.png')}}" class="bg-img" alt="{{config('app.name')}}">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              @if(headingContent('Blog'))
               <div class="heading">        
                 @if(headingContent('Blog')->short_title)
                   <p class="sub-heading">
                    {!!headingContent('Blog')->short_title!!}
                   </p>
                 @endif
                 @if(headingContent('Blog')->title)
                   <h2>
                     {!!headingContent('Blog')->title!!}
                   </h2>
                 @endif
                 @if(headingContent('Blog')->description)
                    {!!headingContent('Blog')->description!!}
                 @endif
               </div>
              @endif
          </div>
        </div>
        <div class="row">
          @foreach($blogs as $blog)
            <div class="col-md-4">
              <a href="{{url('blog/'.$blog->short_url)}}" class="blog-card">
                <div class="image">
                  @if($blog->image!=NULL)
                      <img src="{{asset($blog->image)}}" {!!$blog->image_attribute!!}>
                  @else
                      <img src="{{asset('web/images/home-images/blog1.png')}}" alt="{{config('app.name')}}">
                  @endif
                  <div class="date">
                    {{ date("d", strtotime($blog->posted_date))  }}
                   <span>{{ date("M", strtotime($blog->posted_date)) }}</span>

                  </div>
                </div>
                <div class="content">
                  <h5>{!!$blog->title!!}</h5>
                  <p>{!!limit_text($blog->list_description, 50)!!}</p>
                </div>
              </a>
            </div>
          @endforeach
          <div class="col-md-12">
            <button class="btn blog-details" data-href="{{url('blogs')}}">View all Blogs</button>
          </div>
        </div>
      </div>
    </section>
  @endif
@endsection