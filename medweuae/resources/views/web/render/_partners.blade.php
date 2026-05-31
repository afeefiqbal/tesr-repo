@if($brands->isNotEmpty())
    <section class="mw_home_sec_04">
        <div class="container">
            <div class="row row_warpper">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mw_col_wrapper_left">
                    <h2 class="headeing">our<span>brands</span></h2>
                    <div class="owl-carousel owl-theme owl-carousel-one">
                        @foreach($brands as $brand)
                            <div class="item">
                                <h4>
                                    <img src="{{asset($brand->image)}}">
                                </h4>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif