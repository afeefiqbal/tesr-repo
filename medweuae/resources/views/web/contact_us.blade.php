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
	<section class="mw_contact_sec_01">
	  	<div class="container">
	    	<div class="row row_warpper">
		      	@if(isset($siteInformation) && $siteInformation->phone_number!=NULL)
		      		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 mw_col_wrapper">
		        		<div class="mw_col_inner_wrapper">
		          			<img src="{{asset('web/images/home-images/contact_icon_01.png')}}">
		          			<h4>Give us a call</h4>
		          			<h6><a href="tel:{{$siteInformation->phone_number}}" style="text-decoration:none; color:#444444">{{$siteInformation->phone_number}}</a></h6>
		          			<h6><a href="tel:{{$siteInformation->alternate_phone_number}}" style="text-decoration:none; color:#444444">{{$siteInformation->alternate_phone_number}}</a></h6>
		        		</div>
		      		</div>
	      		@endif
	      		@if(isset($siteInformation) && $siteInformation->email_id!=NULL)
		      		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 mw_col_wrapper">
		        		<div class="mw_col_inner_wrapper">
		          			<img src="{{asset('web/images/home-images/mail.png')}}">
		          			<h4>Drop us a line</h4>
		          			<h6><a href="mailto:{{strtolower($siteInformation->email_id)}}" style="text-decoration:none; color:#444444">{{strtolower($siteInformation->email_id)}}</a></h6>
		        		</div>
		      		</div>
	      		@endif
	      		@if(isset($siteInformation) && $siteInformation->address!=NULL)
		      		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 mw_col_wrapper">
		        		<div class="mw_col_inner_wrapper">
		          			<img src="{{asset('web/images/home-images/location.png')}}">
		          			<h4>Visit our office</h4>
		          			<h6>{!!$siteInformation->address!!}</h6>
		        		</div>
		      		</div>
	      		@endif
	    	</div>
	    	<form id="contactForm" action="{{ url('contact-form-submit') }}"  method="post" class="contact-form">
                {{csrf_field()}}
	    		<div class="row row_warpper_sec_02">
	        		<h2>Send Us a Message</h2>
		        	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_left">
		          		<input type="text" class="form-control contact-required" autocomplete="off" name="contact_first_name" id="contact_first_name" placeholder="First Name">
	                    <div class="invalid" id="contact_first_name_error"></div>
		        	</div>
		        	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_right">
		          		<input type="text" class="form-control contact-required" autocomplete="off" name="contact_last_name" id="contact_last_name" placeholder="Last Name">
	                    <div class="invalid" id="contact_last_name_error"></div>
		        	</div>
		        	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_left">
		          		<input type="text" class="theme-email theme-input form-control contact-required" autocomplete="off" id="contact_phone" name="contact_phone" placeholder="Phone" onkeypress="return isNumber(event)">
		          		<div class="invalid" id="contact_phone_error"></div>
		        	</div>
		        	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_right">
		          		<input type="text" class="theme-tel form-control contact-required" autocomplete="off" name="contact_email" id="contact_email" placeholder="Email">
                        <div class="invalid" id="contact_email_error"></div>
		        	</div>
		        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mw_col_wrapper">
		          		<textarea class="form-control form-control-message" name="contact_comments" autocomplete="off" id="contact_comments" placeholder="Message"></textarea>
		        	</div>
		        	<input type="hidden" name="prefixKey" value="contact">
		        	<button data-url="contact-form-submit" data-flag="contact" class="submit-form-btn" type="submit">Submit</button>
	    		</div>
	    	</form>		
	  	</div>
	</section>
	@if(isset($siteInformation) && $siteInformation->google_map!=NULL)
		<section class="mw_contact_sec_02" style="padding-bottom:0px">
		  	<iframe src="{{$siteInformation->google_map}}" width="100%" height="545" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</section>
	@endif
	@push('script')
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
// 		$(document).ready(function () {
// 			$('#contactForm').on('submit', function (e) {
// 				e.preventDefault();

// 				let formData = $(this).serialize();

// 				$.ajax({
// 					url: "{{ url('contact-form-submit') }}",
// 					method: "POST",
// 					data: formData,
// 					success: function (response) {
// 					    console.log('s');
// 						Swal.fire({
// 							toast: true,
// 							position: 'top-end',
// 							icon: response.status ? 'success' : 'warning',
// 							title: response.message,
// 							showConfirmButton: false,
// 							timer: 3000
// 						});
// 						console.log('s');
//                                 window.location.href = "{{ url('thankyou') }}";
//                             $('#contactForm')[0].reset(); // Reset form
                           
                           
// 					},
// 					error: function () {
// 						Swal.fire({
// 							toast: true,
// 							position: 'top-end',
// 							icon: 'error',
// 							title: 'An error occurred. Please try again later.',
// 							showConfirmButton: false,
// 							timer: 3000
// 						});
// 					}
// 				});
// 			});
// 		});
	</script>
	@endpush
@endsection