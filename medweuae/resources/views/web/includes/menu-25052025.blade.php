<style>
    header{
        position: fixed;
    top: 0;
    width: 100%;
    z-index: 99;
    transition: background-color 0.5s ease, padding 0.5s ease;
    }
    header .container{
            max-width: 1400px;
    margin-inline: auto;
    }
    
   header nav {
            background-color: var(--white);
    border-radius: 0 0 15px 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px !important;
    transition: all 0.5s ease;
    overflow: hidden;
    }
    header ul li {
    list-style: none;
    margin-right: 25px !important;
        margin: 0 !important;
}
header nav ul.navbar-nav li a{
    font-size: 16px;
}
.btn {
  border-radius: 15px;
  font-size: 15px;
  padding: 9px 15px;
  border: 1px solid #00ce7c;
    background-color: #00ce7c;
  font-family: 'Epilogue', sans-serif;
  transition: 0.3s ease-in-out;
  color: #fff;
}
.btn:hover {
  background-color: transparent;
  color: #00ce7c;
  border: 1px solid #00ce7c;
}
header .navbar-expand-lg .navbar-collapse{
    justify-content: center !important;
}
.btn.mobile{
    display: none;
}
@media screen and (max-width:786px){
    header .mw_menu_btn{
    display: none !important
    ;
}
.btn.mobile{
    display: block;
}
header a.mobile_request_quote{
    display: none;
}
header .btn{
    display: none;
}
header nav ul.navbar-nav li a{
        color: #333333 !important;
}
}
footer{
        background: linear-gradient(180deg, rgba(141, 165, 253, 1) 0%, rgba(255, 255, 255, 1) 100%);
}
footer h4,footer p,footer ul li,footer p a{
  color: #222222;
  font-size:16px;
  font-weight: 500;
}
footer .secondary_footer{
        background-color: #0b1a51;
       
}
footer .secondary_footer p{
     color:#fff !important;
     font-size: 16px;
}
footer h4{
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 15px;
}
footer ul li{
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 15px;
    position: relative;
}
footer ul {
       padding-left: 15px;
}
footer .quick-details h6, footer .contact-details h6 {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 25px;
    color: #222222;
}
footer .footer-bottom-links {
    display: flex
;
}footer .quick-details ul {
    padding-left: 15px;
}
footer .footer-bottom-links ul:last-child {
    padding-left: 25px;
}
footer .quick-details ul li::before {
    content: '';
    position: absolute;
    width: 7px;
    height: 7px;
    left: -15px;
    top: 8px;
    background-color: transparent;
    border-radius: 15px;
}
footer .quick-details ul li:hover::before {
    background-color: #00ce7c;
}
footer .quick-details ul li a {
    text-decoration: none;
    width: 100px;
    color:#222222;
    text-decoration: none;
    
}
    footer .quick-details ul li a.active::before {
    background-color: #00ce7c;
}
footer .quick-details ul li a.active {
    color: #00ce7c;
}
footer .quick-details ul li a:hover{
    color: ;
}
footer .contact-links{
        display: flex
;
    align-items: flex-start;
    font-size: 16px;
        padding-bottom: 15px;
    text-decoration: none;
    color: #444444;
    font-weight: 500;
}

footer ul li:hover{
    color: #00ce7c;
}
footer .contact-links:hover{
    color: #00ce7c;
}
footer .social-icons {
  display: flex;
  align-items: center;
  gap: 10px;
}
footer .social-icons a {
  text-decoration: none;
  transition: 0.3s ease;
}
footer .social-icons a:hover svg {
  fill: #00ce7c;
}
footer .social-icons a:nth-child(2) {
  stroke: #444444;
  color: #444444;
}
footer .social-icons a:nth-child(2):hover svg {
  stroke: #00ce7c;
  color: #00ce7c;
}
header ul li a::before {
      content: '';
    position: absolute;
    left: 0;
    bottom: -35px;
    width: 0;
    height: 3px;
    background-color: #00ce7c;
    transition: 0.3s ease-in;
}
header ul li a:hover::before, header ul li a.active::before {
    width: 100%;
}
header ul li a {
    text-decoration: none;
    color: var(--nav-text-color);
    position: relative;
}
header ul li a:hover,
header ul li a.active {
    color: #00ce7c !important;
}
footer .quick-details p, footer .contact-details p, footer .contact-details a {
    display: flex
;
    align-items: flex-start;
    gap: 8px;
    font-size: 16px;
}
header ul.navbar-nav li.nav-item.active a.nav-link{
    color: #00ce7c;
}
header ul.navbar-nav li.nav-item.active a.nav-link::before{
    width: 100%;
}
/*header ul.navbar-nav li.nav-item.active::before {*/
/*  width: 100%;*/
/*}*/
</style>
<header>
    <div class="container">
    <div class="header" id="myHeader">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mw_bg_red" aria-label="Tenth navbar example">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('web/images/logo.png')}}">
                </a>
                <a href="{{url('request-quote')}}" class="mobile_request_quote">
                    <button>Request Quote</button>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExample08">
                  <ul class="navbar-nav">
                    <li class="nav-item {{ (Request::segment(1)=='/')?'active':'' }}">
                      <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item {{ (Request::segment(1)=='about-us')?'active':'' }}">
                      <a class="nav-link" href="{{url('about-us')}}">About Us</a>
                    </li>
                    <li class="nav-item {{ (Request::segment(1)=='products')?'active':'' }}">
                      <a class="nav-link" href="{{url('products')}}">Products</a>
                    </li>
                    <li class="nav-item {{ (Request::segment(1)=='blogs')?'active':'' }}">
                      <a class="nav-link" href="{{url('blogs')}}">Blogs</a>
                    </li>
                    <li class="nav-item {{ (Request::segment(1)=='contact-us')?'active':'' }}">
                      <a class="nav-link" href="{{url('contact-us')}}">Contact Us</a>
                    </li>
                    <li class="nav-item {{ (Request::segment(1)=='request-quote')?'active':'' }}">
  <a href="{{url('request-quote')}}" class="btn mobile">
            <span>Requested products</span>
          </a>
                    </li>
                    @if(isset($siteinformation->phone_number) && $siteinformation->phone_number!=NULL)
                        <li class="nav-item mw_toggle_phone d-none">
                          <a class="nav-link" href="tel:{{$siteinformation->phone_number}}">{{$siteinformation->phone_number}}</a>
                        </li>
                    @endif
                    @if(isset($siteinformation->email_id) && $siteinformation->email_id!=NULL)
                        <li class="nav-item mw_toggle_phone mw_toggle_email d-none">
                          <a class="nav-link" href="mailto: {{$siteinformation->email_id}}">{{$siteinformation->email_id}}</a>
                        </li>
                    @endif
                  </ul>
                    </div>
                  <a href="{{url('request-quote')}}" class="btn">
            <span>Requested products</span>
          </a>
              
        </nav>
    </div>
    </div>
</header>