<!--<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 mw_col_wrapper">-->
<!--    <a href="{{url('blog/'.$blog->short_url)}}">-->
<!--        <div class="mw_col_inner_wrapper">-->
<!--            @if($blog->image!=NULL)-->
<!--                <img src="{{asset($blog->image)}}" class="mw_blog_img">-->
<!--            @else-->
<!--                <img src="{{asset('web/images/blog_01.jpg')}}" class="mw_blog_img">-->
<!--            @endif-->
<!--            <div class="mw_blog_content_wrapper">-->
<!--                <ul class="blog_time_list">-->
<!--                    <li>{{ date("d M Y", strtotime($blog->posted_date))  }}</li>-->
<!--                </ul>-->
<!--                {!!$blog->list_description!!}-->
<!--            </div>-->
<!--        </div>-->
<!--    </a> -->
<!--</div>-->


 <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">
              <a href="{{url('blog/'.$blog->short_url)}}" class="blog-card" style="background-color:#dddcfe">
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