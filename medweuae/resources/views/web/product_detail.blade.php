@extends('web.layouts.main')
@section('content')
	@if(isset($productDetail) && $productDetail->banner!=NULL)
		<section class="inner_page_banner" style="background: url({{asset($productDetail->banner)}}) no-repeat;padding: 170px 0;background-size: cover;background-position: right;">
	  		<div class="container">
	    		<h1>{{$productDetail->title}}</h1>
	    		<h5>Home / {{$productDetail->title}}</h5>
	  		</div>
		</section>
	@endif
	<section class="mw_product_details_sec_01">
  		<div class="container">
    		<div class="row row_warpper">
      			<div class="col-xs-12 col-sm-12 colmd-6 col-lg-6 mw_col_left_wrapper">
                  	<div class="gallery clearfix">
                  		@if($productDetail->photos->isNotEmpty())
	                    	<div class="previews">
	                    		@foreach($productDetail->photos as $photo)
		                      		<a href="" class="{{($loop->first)?'selected':''}} jumbing_top" data-full="{{asset($photo->image)}}">
		                        		<img src="{{asset($photo->image)}}" />
		                      		</a>
	                      		@endforeach
	                    	</div>
	                  		<div class="full"> 
	                  			<img src="{{asset($productDetail->photos[0]->image)}}" /> 
	                  		</div>
                  		@else
                  			<div class="full"> 
	                  			<img src="{{asset('web/images/product_gallery_01.png')}}" /> 
	                  		</div>
                  		@endif
                  	</div>
      			</div>
  				<div class="col-xs-12 col-sm-12 colmd-6 col-lg-6 mw_col_right_wrapper">
    				<label class="category">
    					{{$productDetail->category->title}}
    				</label>
    				<h2>{{$productDetail->title}}</h2>
    				<ul>
      					<li>
      						<label>Category:</label>
      						{{$productDetail->category->title}}
      					</li> 
      					@if($productDetail->brandData!=NULL) 
	      					<li>
	      						<label>Brand:</label>
	      						{{$productDetail->brandData->title}}
	      					</li>  
      					@endif
      					<li>
      						<label>Price:</label>
      						AED {{$productDetail->price}}
      					</li>
    				</ul>
    				@if($productDetail->description!=NULL)
    					{!!$productDetail->description!!}
    				@endif
    				<div class="btn_wrapper">
      					<a href="#">
      						@php 
			                    $productUrl = url('product/'.$productDetail->short_url);
			                    $message = 'Hi there, You have an enquiry, Product Name : '.$productDetail->title.', Product Url : '.$productUrl;
			                @endphp
        					<button class="mw_quick_enq clickable-element cursor-pointer" data-href="https://api.whatsapp.com/send/?phone={{$siteInformation->whatsapp_number}}&text={{nl2br($message)}}&type=phone_number&app_absent=0" data-target="_blank">
          						<span>Buy Now </span>
          						<i><img src="{{asset('web/images/whatsapp_icon_product_details.png')}}"></i>
        					</button>
      					</a>
      					@if($productDetail->brochure!=NULL)
	      					<span class="mobile_break_wrapper">
	        					<a target="_blank" href="{{asset($productDetail->brochure)}}" class="mw_re_quote">
	        						<button>Download Brochure</button>
	        					</a>
	      					</span>
      					@endif
      					@if(isset($siteInformation) && $siteInformation->whatsapp_number!=NULL)
	      					<a href="tel:{{$siteInformation->whatsapp_number}}" class="mw_product_details_call">
	            				<div class="content-center">
	                				<div class="pulse">
	                  					<i class="fas fa-phone fa-2x">
	                    					<img src="{{asset('web/images/	call_icon_product_details.svg')}}">
	                  					</i>
	                				</div>
	            				</div>
	        				</a>
        				@endif
    				</div>
  				</div>
    		</div>
    		@if($productDetail->alternate_description!=NULL)
	    		<div class="row row_warpper">
	      			<div class="col-xs-12 col-sm-12 colmd-12 col-lg-12 mw_col_left_wrapper mt-5 p-5 custom-class">
	      				{!!$productDetail->alternate_description!!}
	      			</div>
	      		</div>	
      		@endif
    	</div>
	</section>
@endsection