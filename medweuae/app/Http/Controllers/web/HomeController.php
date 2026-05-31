<?php

namespace app\Http\Controllers\web;
use App\Http\Controllers\Controller;
use App\Models\MetaData;
use App\Models\HomeBanner;
use App\Models\KeyFeature;
use App\Models\WhyChooseUs;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\MetaTag;
use App\Models\ExtraTag;
use App\Models\Blog;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGallery;
use App\Models\ProductBrand;
use App\Models\GetQuote;
use App\Models\ContactFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct(){
        $siteInformation = Contact::first();
        $extra_meta_data = ExtraTag::first();
        $homeProducts = Product::where([['status','Active'],['display_to_home','Yes']])->take(5)->orderBy('sort_order')->get();
        $brands = Client::where('status','Active')->latest()->get();
        View::share(compact('siteInformation', 'extra_meta_data','homeProducts', 'brands'));
    }

    public function seo_content($type, $page_name, $key = NULL){
        if ($type == 1) {
            $meta_data = MetaTag::where('page_name',$page_name)->first();
            return $meta_data;
        } else {
            $model = 'App\\Models\\' . $page_name;
            $meta_data = $model::find($key);
            return $meta_data;
        }
    }

    public function home(){
        $homeBanners = HomeBanner::where('status','Active')->orderBy('sort_order')->get();
        $featuredProducts = Product::where([['status','Active'],['display_to_home','Yes']])->with('thumbnail','photos')->latest()->take(4)->get();
        $whyChooseUs = WhyChooseUs::where('status','Active')->orderBy('sort_order')->take(6)->get();
        $products = Product::where('status','Active')->with('thumbnail','photos')->orderBy('sort_order')->get();
        $about = AboutUs::first();
        $testimonials = Testimonial::where('status','Active')->latest()->get();
        $blogs = Blog::where('status','Active')->orderBy('posted_date')->take(10)->get();
        $keyFeatures = KeyFeature::where('status','Active')->orderBy('sort_order')->take(4)->get();
        $meta_data = $this->seo_content(1, 'Home');
        return view('web.home', compact('homeBanners', 'featuredProducts','whyChooseUs', 'products', 'about', 'testimonials', 'blogs', 'meta_data', 'keyFeatures'));
    }

    public function about_us(){
        $banner = Banner::where('type','About')->first();
        $about = AboutUs::first();
        $keyFeatures = KeyFeature::where('status','Active')->orderBy('sort_order')->take(4)->get();
        $brands = Client::where('status','Active')->latest()->get();
        $testimonials = Testimonial::where('status','Active')->latest()->get();
        $meta_data = $this->seo_content(1, 'About');
        return view('web.about-us', compact('banner','about', 'keyFeatures','brands', 'testimonials','meta_data'));
    }

    public function product(){
        $banner = Banner::where('type','Product')->first();
        $categories = ProductCategory::whereNull('parent_id')->with('products')->get();
        // dd($categories);
        $products = Product::with('thumbnail')->orderBy('sort_order')->get();
        $productBrands = ProductBrand::where('status','Active')->latest()->get();
        $meta_data = $this->seo_content(1, 'Product');
        return view('web.products', compact('banner', 'categories', 'productBrands', 'products', 'meta_data'));
    }

    public function filterProducts(Request $request){
        $explodeBrand = [];
        if($request->filter_param!=NULL || $request->category_id!=NULL || $request->brand_id!=NULL){
            $categoryQuery = Product::with('thumbnail')->where('status','Active');
            if($request->category_id!=NULL){
                $categoryQuery->where('category_id',$request->category_id);
            }
            if($request->filter_param!=NULL){
                $categoryQuery->where('title', 'LIKE', "%{$request->filter_param}%");
            }
            if($request->brand_id!=NULL){
                $explodeBrand = explode(',',$request->brand_id);
                $categoryQuery->orWhereIn('brand',$explodeBrand);
            }
            $products = $categoryQuery->orderBy('sort_order')->get();
            $categories = ProductCategory::whereNull('parent_id')->with('childs')->get();
        }else{
            $categories = ProductCategory::whereNull('parent_id')->with('childs')->get();
        }
        $filterParam = $request->filter_param;
        $categoryId = $request->category_id;
        $productBrands = ProductBrand::where('status','Active')->latest()->get();
        return response()->json([
            'data' => view('web.render._filter_products', compact('categories','productBrands','products','filterParam', 'categoryId', 'explodeBrand'))->render(),
            'status' => true,
        ]);
    }

    public function product_detail($short_url){
        $productDetail = Product::where([['short_url', $short_url],['status','Active']])->with('photos', 'category', 'thumbnail', 'brandData')->first();
        if ($productDetail) {
            $meta_data = $this->seo_content(0, 'Product', $productDetail->id);
            return view('web.product_detail', compact('productDetail', 'meta_data'));
        } else {
            return view('web.error.404');
        }
    }

    public function blogs(){
        $banner = Banner::where('type','Blog')->first();
        $blogs = Blog::where('status','Active')->latest()->take(9)->get();
        $currentCount = 9;
        $meta_data = $this->seo_content(1, 'Blog');
        return view('web.blogs', compact('meta_data', 'blogs', 'banner', 'currentCount'));
    }

    public function blog_detail($short_url){
        $blog = Blog::where([['short_url', $short_url],['status','Active']])->first();
        if ($blog) {
            $banner = $blog;
            $recentBlogs = Blog::where('status','Active')->where('id', '!=', $blog->id)->latest('posted_date')->take(5)->get();
            $meta_data = $this->seo_content(0, 'Blog', $blog->id);
            return view('web.blog_detail', compact('blog', 'banner', 'recentBlogs', 'meta_data'));
        } else {
            return view('web.error.404');
        }
    }

    public function contact_us(){
        $banner = Banner::where('type','Contact')->first();
        $meta_data = $this->seo_content(1, 'Contact');
        return view('web.contact_us', compact('banner', 'meta_data'));
    }

    public function contact_store(Request $request){
        
        if (filter_var($request['contact_email'], FILTER_VALIDATE_EMAIL)) {
            $contact = new ContactFormRequest;
            $contact->first_name = ($request['contact_first_name'])??'';
            $contact->last_name = ($request['contact_last_name'])??'';
            $contact->email = ($request['contact_email'])??'';
            $contact->phone = ($request['contact_phone'])??'';
            $contact->comments = ($request['contact_comments'])??'';
          
            if ($contact->save()) {
                $sendContactMail = SendContactMail($contact);
                if ($sendContactMail) {
                    return response()->json(['status' => true, 'message' => "Submitted successfully"]);
                } else {
                    return response()->json(['status' => true, 'message' => "Submitted successfully, but mail couldn't be sent now"]);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Error while saving the contact']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Please enter a valid email id']);
        }
    }

    public function request_quote(){
        $banner = Banner::where('type','Quote')->first();
        $meta_data = $this->seo_content(1, 'Quote');
        return view('web.request-quote', compact('banner', 'meta_data'));
    }

    public function getAQuoteStore(Request $request){
        $keyFlag = $request->prefixKey;
        $first_name = $keyFlag.'_first_name';
        $last_name = $keyFlag.'_last_name';
        $email = $keyFlag.'_email';
        $phone = $keyFlag.'_phone';
        $comments = $keyFlag.'_comments';
        if (filter_var($request->$email, FILTER_VALIDATE_EMAIL)) {
            $enquiry = new GetQuote();
            $enquiry->first_name = $request->$first_name;
            $enquiry->last_name = $request->$last_name;
            $enquiry->email = $request->$email;
            $enquiry->phone = $request->$phone;
            $enquiry->message = $request->$comments;
            if ($request->hasFile('quote_product_image')) {
                $enquiry->product_image = uploadFile($request->quote_product_image, 'quote', 'uploads/quote/product_image/');
            }
            if ($enquiry->save()) {
                if (SendQuoteMail($enquiry)) {
                     return response()->json([
                            'status' => true
                    ]);
                } else {
                    return response()->json(['status' => true,
                        'message' => "Quote has been submitted successfully,Can't sent the mail right now"]);
                }
            } else {
                return response()->json(['status' => false,
                    'message' => 'Error : Error while submitting the quote']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Error : Please enter a valid email id']);
        }
    }
}
