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
	<section class="mw_blogdetails_sec_01">
	    <div class="container">
	      	<div class="row row_warpper">
	          	<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 mw_col_wrapper_left">
	            	<div class="mw_col_inner_wrapper">
	              		@if($blog->image!=NULL)
			                <img src="{{asset($blog->image)}}" class="responsive mb-3">
			            @else
			                <img src="{{asset('web/images/blog_details_img.jpg')}}" class="responsive mb-3">
			            @endif
	                	<ul class="blog_time_list">
	                  		<li>
	                  			{{ date("d M Y", strtotime($blog->posted_date))  }}
	                  		</li>
	                   		<li>
	                   			<span>
	                   				<img src="{{asset('web/images/author_icon.png')}}">
	                   			</span>
	                   			{{$blog->author}}
	                   		</li>
	                	</ul>
	                	@if($blog->title!=NULL)
	                		<h2>{{$blog->title}}</h2>
	                	@endif
	                	@if($blog->description!=NULL)
	                		{!!$blog->description!!}
	                	@endif
	              	</div>
	          	</div>
	          	@if($recentBlogs->isNotEmpty())
		          	<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 mw_col_wrapper_right">
		            	<div class="mw_col_inner_wrapper">
		                	<h4>Related  Recent Posts</h4>
		            		<ul>
		            			@foreach($recentBlogs as $rBlog)
			                		<li>
			                    		<a href="{{url('blog/'.$rBlog->short_url)}}">
			                    			@if($rBlog->image!=NULL)
								                <img src="{{asset($rBlog->image)}}" style="width:100px">
								            @else
								                <img src="{{asset('web/images/recent_post.png')}}" style="width:100px">
								            @endif
			                    			<p>
			                    				{{$rBlog->title}}
			                    				<span>{{ date("d M Y", strtotime($rBlog->posted_date))  }}</span>
			                    				
			                    			</p>
			                    		</a>
			                		</li>
		                		@endforeach
		            		</ul>
		            	</div>
		        	</div>
		        @endif	
	    	</div>
		</div>
	</section>
@endsection