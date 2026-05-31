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
	<section class="mw_product_sec_01">
  		<div class="container">
  			<div class="row row_warpper">
	  			@include('web.render._product_category_list')
	  			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 mw_col_wrapper_right">
	  				<div class="mw_col_inner_wrapper" id="filter-result">
	  					@include('web.render._filter_products')	
	  				</div>
	  			</div>
			</div>	
    	</div>
  	</div>
</section>
@endsection