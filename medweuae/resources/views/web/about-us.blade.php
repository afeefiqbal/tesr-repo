@extends('web.layouts.main')
@section('content')
	@if(isset($banner) && $banner!=NULL)
		<section class="inner_page_banner" style="background: url({{asset($banner->banner)}}) no-repeat;padding: 170px 0;background-size: cover;background-position: right;">
	  		<div class="container">
	    		<h1>{{$banner->title}}</h1>
	    		<h5>Home / {{$banner->title}}</h5>
	  		</div>
		</section>
	@endif
	<!-- breadcrumbs end -->
	@if($about!=NULL)
		<section class="mw_about_sec_01">
	  		<div class="container">
	    		<div class="row row_warpper">
	      			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 mw_col_wrapper_left">
	      				@if($about->image!=NULL)
	        				<img src="{{asset($about->image)}}" class="responsive">
	        			@else
	        				<img src="{{asset('web/images/about_innerpage_img.png')}}" class="responsive">
	        			@endif
	      			</div>
		      		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 mw_col_wrapper_right">
		      			@if($about->title!=NULL)
		        			<h2 class="headeing">{!!$about->title!!}</h2>
		        		@endif
		        		@if($about->description!=NULL)
			        		{!!$about->description!!}
		                @endif
		      		</div>
	    		</div>
	    		<div class="row row_warpper_02">
	    			@if($about->vision!=NULL)
			      		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_left">
			        		<div class="mw_col_inner_wrapper">
			          			<h2>
			          				<span>
			          					@if($about->vision_image!=NULL)
			          						<img src="{{asset($about->vision_image)}}">
			          					@else
			          						<img src="{{asset('web/images/our_vision_icon.png')}}">
			          					@endif
			          				</span>Our Vision
			          			</h2>
			          			{!!$about->vision!!}
			        		</div>
			      		</div>
		      		@endif
		      		@if($about->mission!=NULL)
			      		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_right">
				        	<div class="mw_col_inner_wrapper">
			          			<h2>
			          				<span>
			          					@if($about->mission_image!=NULL)
			          						<img src="{{asset($about->mission_image)}}">
			          					@else
			          						<img src="{{asset('web/images/our_mission_icon.png')}}">
			          					@endif
			          				</span>Our Mission
			          			</h2>
			          			{!!$about->mission!!}
			        		</div>
			      		</div>
			      	@endif	
	    		</div>
	  		</div>
		</section>
	@endif
	@if($keyFeatures->isNotEmpty())
		<section class="mw_about_sec_02">
			<div class="container">
	    		<div class="row">
	    			@foreach($keyFeatures as $feature)
				        <div class="four col-xs-6 col-sm-6 col-md-3 mw_col_wrapper">
				            <div class="counter-box"> 
				            	@if($feature->image!=NULL)
				            		<img src="{{asset($feature->image)}}" class="mw_counter_icon"> 
				            	@else
				            		<img src="{{asset('web/images/about_counter_icon_01.png')}}" class="mw_counter_icon"> 
				            	@endif		
				            	@if($feature->title!=NULL)		            	
					                <h2 data-max="{{$feature->count}}" class="ms-animated">{{$feature->count}}
					                	<span>{{$feature->title}}</span>
					                </h2>
				                @endif
				            </div>
				        </div>
			        @endforeach
	    		</div>
			</div>
		</section>
	@endif
	<!--@include('web.render._partners')    -->
    @include('web.render._testimonials')
@endsection