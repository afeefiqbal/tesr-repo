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
	@if($blogs->isNotEmpty())
		<section class="mw_home_sec_06 mw_blog_sec_01 blog">
		    <div class="container">
		      	<div class="row row_warpper">
		      		@foreach($blogs as $blog)
			          	@include('web.render._single_blog')
			        @endforeach  	
		      	</div>
		    </div>
		</section>
	@endif
@endsection