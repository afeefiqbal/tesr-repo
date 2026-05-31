@php 
    $thumbnailImage = App\Models\ProductGallery::where([['status','Active'],['product_id',$product->id]])->first();
@endphp

<style>
    .mw_col_inner_wrapper .card {
    padding: 20px;
        background: linear-gradient(to bottom, #c0ffe6, #e6e6e6);
    border: 0;
    text-align: start;
    height: 150px;
    display: flex
;
    justify-content: space-between;
}
    .mw_col_inner_wrapper .card p{
        text-align: start;
    }
    .mw_col_inner_wrapper .card h4{
      margin-bottom: 0 !important;
    }
    .mw_col_inner_wrapper .card .btn_wrapper a{
     text-decoration: none;
    }
    .mw_col_inner_wrapper .card .btn_wrapper button.whatsapp{
        background-color: #00CE7C;
        border: 1px solid #00CE7C !important;
        color: #fff;
    }
    .mw_col_inner_wrapper .card .btn_wrapper button.whatsapp:hover{
            background-color: #d8ffef;
    color: #00CE7C;
    border: 1px solid #00CE7C;
    }
    .mw_col_inner_wrapper .card .btn_wrapper button.whatsapp:hover svg{
           fill: #00CE7C
    }
    .mw_col_inner_wrapper .card .btn_wrapper button svg{
        fill: #fff;
    }
    .mw_col_inner_wrapper .card .btn_wrapper {
        justify-content: start;
            max-height: 400px;
    }
    .mw_col_inner_wrapper .card .btn_wrapper button{
           display: flex
;
    align-content: center;
    gap: 5px;
    padding: 5px 13px;
    height: auto;
    width: fit-content !important;
    border-radius: 10px !important;
    border: 0 !important;
    text-decoration: none;
    font-size: 13px;
    transition: 0.3s ease-in;
    }
    .mw_product_row .btn_wrapper button.mw_readmore{
        font-size: 13px;
    font-weight: 500;
    background: transparent;
    border: 1px solid #000 !important;
    }
    .mw_product_row .btn_wrapper button.mw_readmore:hover{
          background-color: #c3c3c3;
    border-color: #000;
    color: #000;
    }
    .mw_product_row .btn_wrapper button.mw_quick_enq:hover:before{
        content: none;
    }
    .mw_product_row .mw_col_inner_wrapper{
            padding: 0 20px 20px;
                /*min-height: 500px;*/
    }
    .mw_product_row .mw_col_inner_wrapper img.mw_product_img{
          width: 180px;
    margin-inline: auto;
    margin-block: 25px;
    }
    /*.mw_col_inner_wrapper .card{*/
    /*    margin-top: auto;*/
    /*}*/
    .mw_col_inner_wrapper {
       display: flex
;
    flex-direction: column;
    }
    .filter-dropdwon{
        display: none;
    }
      section.mw_product_sec_01 .mw_col_wrapper_left{
           position: sticky;
    top: 100px;
    height: 85vh;
    }
    
    
    
    section.mw_product_sec_01 .mw_col_wrapper_left {
  overflow-y: auto; /* Make sure scrolling is enabled */
  scrollbar-width: thin;            /* For Firefox */
  scrollbar-color: #00ce7c transparent; /* For Firefox */
}

/* For WebKit browsers */
section.mw_product_sec_01 .mw_col_wrapper_left::-webkit-scrollbar {
  width: 8px;
}

section.mw_product_sec_01 .mw_col_wrapper_left::-webkit-scrollbar-track {
  background: transparent;
}

section.mw_product_sec_01 .mw_col_wrapper_left::-webkit-scrollbar-thumb {
  background-color: #00ce7c;
  border-radius: 4px;
}

    @media screen and (max-width:767px){
       /*section.mw_product_sec_01 .mw_col_wrapper_left .mw_col_inner_wrapper{*/
       /*     display: none;*/
       /* }*/
           .filter-dropdwon{
        display: block;
            width: 100%;
    height: 55px;
    padding-left: 15px;
    border: 1px solid #D0D0D0;
 
    }
    
    section.mw_product_sec_01 .mw_col_wrapper_left .mw_col_inner_wrapper {
    background: #F5F8FE;
    padding: 20px 30px 35px;
    border-radius: 20px;
    margin-top: 35px;
    
}
           .filter-dropdwon:focus{
      box-shadow: none;
    }
    section.mw_product_sec_01 .mw_col_wrapper_left{
              height: auto;
        margin-top: 20px;
        position: sticky !important;
        top: 100px;
       z-index: 3;
    background-color: white;
    }
     section.mw_product_sec_01 .mw_col_wrapper_right{
             background-color: white;
    }
  section.mw_product_sec_01 .mw_col_wrapper_right .row.mw_product_row{
      z-index: 1;
  }
    }
</style>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-{{$column}} mw_col_wrapper">
    <div class="mw_col_inner_wrapper">
        <!--<div class="mw_price_tag">-->
        <!--    <h5>Price: <span>AED {{$product->price}}</span></h5>-->
        <!--</div>-->
        @if($product->thumbnail_image!=NULL)
            <img src="{{asset($product->thumbnail_image)}}" class="mw_product_img">
        @else
            <img src="{{asset('web/images/product_img_01.png')}}" class="mw_product_img">
        @endif     
       <div class="card">
            <h4>{{$product->title}}</h4>
        <!--<p>{!!$product->home_description!!}</p>-->
        <div class="btn_wrapper">
            <a href="https://google.com">
                @php 
                    $productUrl = url('product/'.$product->short_url);
                    $message = 'Hi there, You have an enquiry, Product Name : '.$product->title.', Product Url : '.$productUrl;
                @endphp
                 <style>
                        .btn-whatsapp {
                            display: inline-flex;
                            align-items: center;
                            background-color: #25D366;
                            color: white;
                            padding: 6px 10px;
                            /* Smaller padding */
                            font-size: 14px;
                            /* Smaller text */
                            border-radius: 10px;
                            text-decoration: none;
                            font-weight: 500;
                            border: none;
                            transition: background-color 0.3s ease;
                        }

                        .btn-whatsapp:hover {
                            background-color: #1DA851;
                            color: white;
                            cursor: pointer;
                        }
                    </style>
                    <a href="https://api.whatsapp.com/send/?phone={{ $siteInformation->whatsapp_number }}&text={{ urlencode($message) }}&type=phone_number&app_absent=0"
                        target="_blank" class="btn-whatsapp">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                            viewBox="0 0 24 24" style="margin-right: 5px;">
                            <path
                                d="M19.05 4.91A9.82 9.82 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01m-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.26 8.26 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.18 8.18 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23m4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07s.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28">
                            </path>
                        </svg>
                        Buy Now
                    </a>
            </a>
         
               <button class="details-btn">
    <a href="{{ url('product/'.$product->short_url) }}">Details</a>
</button>
           
        </div>
       </div>
    </div>
</div>