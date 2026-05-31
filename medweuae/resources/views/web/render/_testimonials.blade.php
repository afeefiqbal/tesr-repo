@if($testimonials->isNotEmpty())
    <section class="mw_home_sec_05">
        <div class="container">
            <h2 class="headeing">What <span>Client Say</span></h2>
            <div class="owl-carousel-sec  owl-carousel owl-theme">
                @foreach($testimonials as $testimonial)
                    <div class="item">
                        {!!$testimonial->message!!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_left">
                                <ul>
                                    @if($testimonial->image!=NULL)
                                        <li><img src="{{asset($testimonial->image)}}"></li>
                                    @else
                                        <li><img src="{{asset('web/images/testimonial_user.png')}}"></li>
                                    @endif
                                    <li>{{$testimonial->title}} <span>{{$testimonial->designation}}</span></li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mw_col_wrapper_right">
                            </div>
                        </div>
                    </div>
                @endforeach    
            </div>
        </div>    
    </section>
@endif    