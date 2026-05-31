<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\app\auth\LoginController;
use App\Http\Controllers\app\AdminController;
use App\Http\Controllers\app\HomeController;
use App\Http\Controllers\app\BlogController;
use App\Http\Controllers\app\BannerController;
use App\Http\Controllers\web\HomeController as WebHome;
use App\Http\Controllers\app\SiteController;
use App\Http\Controllers\app\AboutController;
use App\Http\Controllers\app\TagController;
use App\Http\Controllers\app\ContactController;
use App\Http\Controllers\app\ProductController;
use App\Http\Controllers\app\CategoryController;
use App\Models\Contact;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WebHome::class,'home']);
Route::get('/home', [WebHome::class,'home']);
Route::get('/about-us', [WebHome::class,'about_us']);
Route::get('/products', [WebHome::class,'product']);
Route::get('/product/{short_url}', [WebHome::class,'product_detail']);
Route::get('/blogs', [WebHome::class,'blogs']);
Route::get('/blog/{short_url}', [WebHome::class,'blog_detail']);
Route::get('/contact-us', [WebHome::class,'contact_us']);
Route::get('/request-quote', [WebHome::class,'request_quote']);
Route::post('/contact-form-submit', [WebHome::class,'contact_store']);
Route::post('/quote-form-submit', [WebHome::class,'getAQuoteStore']);
Route::post('/filter-products', [WebHome::class,'filterProducts']);
   
    Route::get('thankyou', function () {
         $siteInformation = Contact::first();
        return view('web.thankyou',compact('siteInformation'));
    })->name('thankyou');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [LoginController::class,'showLoginForm'])->middleware('guest');
    Route::post('/', [LoginController::class,'login']);
    Route::post('forgot-password', [LoginController::class,'forgot_password']);
    Route::get('reset-password/{token}', [LoginController::class,'reset_password']);
    Route::post('reset-password', [LoginController::class,'reset_password_store']);
    Route::post('reset-password-store', [LoginController::class,'reset_password_store']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('dashboard', [HomeController::class,'dashboard']);

    /************************** Admin starts *****************************/

    Route::group(['prefix' => 'administration'], function () {
        Route::get('/', [AdminController::class,'list']);
        Route::get('create', [AdminController::class,'create']);
        Route::post('create', [AdminController::class,'store']);
        Route::get('edit/{id}', [AdminController::class,'edit']);
        Route::get('view/{id}', [AdminController::class,'view']);
        Route::post('edit/{id}', [AdminController::class,'update']);
        Route::post('delete/', [AdminController::class,'delete_admin']);
        Route::group(['prefix' => 'reset_password'], function () {
            Route::get('/{id}', [AdminController::class,'reset_password']);
            Route::post('/{id}', [AdminController::class,'reset_password_store']);
        }); 
    }); 

    /************************** Admin ends ********************************/

    Route::prefix('banner')->group(function () {
        Route::get('/{type}', [BannerController::class, 'banner']);   
        Route::post('{type}', [BannerController::class, 'banner_store']);     
    });

    /***************************** Site Information ***********************/

    Route::group(['prefix' => 'contact'], function () {
        Route::get('list/', [ContactController::class, 'contact_list']);
        Route::get('view/{id}', [ContactController::class, 'contact_view']);
        Route::post('replay_to_contact/',[ContactController::class, 'replay_to_contact']);
        Route::post('delete_contact/',[ContactController::class, 'delete_contact']);
        Route::post('delete_multi_contact/',[ContactController::class, 'delete_multi_contact']);
        
        Route::get('quote_list/', [ContactController::class, 'quote_list']);
        Route::post('replay_to_quote/',[ContactController::class, 'replay_to_quote']);
        Route::post('delete_quote/',[ContactController::class, 'delete_quote']);
        Route::post('delete_multi_quote/',[ContactController::class, 'delete_multi_quote']);
        
        Route::get('page', [ContactController::class, 'contact_page']);
        Route::post('page', [ContactController::class, 'contact_page_store']);
    });

    Route::group(['prefix' => 'site-information'], function () {
        Route::get('/', [ContactController::class, 'site_information']);
        Route::post('/', [ContactController::class, 'site_information_store']);
    });

    /************************** Home starts *******************************/
 
    Route::group(['prefix' => 'home'], function () {
        Route::post('sort_order/', [HomeController::class,'sort_order']);

        Route::group(['prefix' => 'slider'], function () {
            Route::get('/', [HomeController::class,'slider_list']);
            Route::get('create', [HomeController::class,'slider_create']);
            Route::post('create', [HomeController::class,'slider_store']);
            Route::get('edit/{id}', [HomeController::class,'slider_edit']);
            Route::post('edit/{id}', [HomeController::class,'slider_update']);
            Route::post('delete', [HomeController::class,'delete_slider']);
        }); 

        Route::group(['prefix' => 'why-choose-us'], function () {
            Route::get('/', [HomeController::class,'list']);
            Route::get('create', [HomeController::class,'list_create']);
            Route::post('create', [HomeController::class,'list_store']);
            Route::get('edit/{id}', [HomeController::class,'list_edit']);
            Route::post('edit/{id}', [HomeController::class,'list_update']);
            Route::post('delete', [HomeController::class,'delete_list']);
        });

        Route::group(['prefix' => 'testimonial'], function () {
            Route::get('/', [HomeController::class,'testimonial']);
            Route::get('create', [HomeController::class,'testimonial_create']);
            Route::post('create', [HomeController::class,'testimonial_store']);
            Route::get('edit/{id}', [HomeController::class,'testimonial_edit']);
            Route::post('edit/{id}', [HomeController::class,'testimonial_update']);
            Route::post('delete', [HomeController::class,'delete_testimonial']);
        });

        Route::group(['prefix' => 'brand'], function () {
            Route::get('/', [HomeController::class,'brand']);
            Route::get('create/', [HomeController::class,'brand_create']);
            Route::post('create/', [HomeController::class,'brand_store']);
            Route::get('edit/{id}', [HomeController::class,'brand_edit']);
            Route::post('edit/{id}', [HomeController::class,'brand_update']);
            Route::get('view/{id}', [HomeController::class,'brand_view']);
            Route::post('delete/', [HomeController::class,'delete_brand']);
        });
    });

    Route::post('status-change', [HomeController::class,'status_change']);

    /******************* Home ends **********************/

    /****************** About starts *********************/

    Route::group(['prefix' => 'about-us'], function () {        
        Route::get('/', [AboutController::class,'about_us']);
        Route::post('/', [AboutController::class,'about_us_store']);
        Route::group(['prefix' => 'key-feature'], function () {
            Route::get('/', [AboutController::class,'key_feature']);
            Route::get('create', [AboutController::class,'key_feature_create']);
            Route::post('create', [AboutController::class,'key_feature_store']);
            Route::get('edit/{id}', [AboutController::class,'key_feature_edit']);
            Route::post('edit/{id}', [AboutController::class,'key_feature_update']);
            Route::post('delete', [AboutController::class,'delete_key_feature']);
        }); 
    });

    /***************** About ends *************************/

    /**************** Blog starts *************************/

    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', [BlogController::class,'list']);
        Route::get('create', [BlogController::class,'create']);
        Route::post('create', [BlogController::class,'store']);
        Route::get('edit/{id}', [BlogController::class,'edit']);
        Route::post('edit/{id}', [BlogController::class,'update']);
        Route::post('delete', [BlogController::class,'delete']);
    });

    /***************** Blog ends ***************************/

    /******************* product starts ************************/

    Route::group(['prefix' => 'product'], function () {

        Route::group(['prefix' => 'category'], function () {
            Route::get('/', [CategoryController::class, 'category']);
            Route::get('create/', [CategoryController::class, 'category_create']);
            Route::post('create/', [CategoryController::class, 'category_store']);
            Route::get('edit/{id}', [CategoryController::class, 'category_edit']);
            Route::post('edit/{id}', [CategoryController::class, 'category_update']);
            Route::get('view/{id}', [CategoryController::class, 'category_view']);
            Route::post('delete/', [CategoryController::class, 'delete_category']);
        });

        Route::group(['prefix' => 'sub-category'], function () {
            Route::get('/{id}', [CategoryController::class, 'category']);
            Route::get('create/{id}', [CategoryController::class, 'category_create']);
            Route::post('create/{id?}', [CategoryController::class, 'category_store']);
            Route::get('edit/{id}', [CategoryController::class, 'category_edit']);
            Route::post('edit/{id}', [CategoryController::class, 'category_update']);
            Route::get('view/{id}', [CategoryController::class, 'category_view']);
            Route::post('delete/', [CategoryController::class, 'delete_category']);
        });

        Route::group(['prefix' => 'brand'], function () {
            Route::get('/', [ProductController::class, 'brand']);
            Route::get('create/', [ProductController::class, 'brand_create']);
            Route::post('create/', [ProductController::class, 'brand_store']);
            Route::get('edit/{id}', [ProductController::class, 'brand_edit']);
            Route::post('edit/{id}', [ProductController::class, 'brand_update']);
            Route::get('view/{id}', [ProductController::class, 'brand_view']);
            Route::post('delete/', [ProductController::class, 'delete_brand']);
        });

        Route::group(['prefix' => 'item'], function () {
            Route::get('/', [ProductController::class, 'product']);
            Route::post('display-to-home/', [ProductController::class, 'display_to_home']);
            Route::get('create/', [ProductController::class, 'product_create']);
            Route::post('create/', [ProductController::class, 'product_store']);
            Route::get('edit/{id}', [ProductController::class, 'product_edit']);
            Route::post('edit/{id}', [ProductController::class, 'product_update']);
            Route::post('delete/', [ProductController::class, 'delete_product']);

            Route::prefix('gallery')->group(function () {
                Route::get('create/{product_id}', [ProductController::class, 'gallery_create']);
                Route::post('create/{product_id}', [ProductController::class, 'gallery_store']);
                Route::post('delete/{id}', [ProductController::class, 'delete_image']);
            });
        });
    });

    /****************** product ends ***************************/

    /****************** Meta Tags Starts *************************/
    Route::group(['prefix' => 'heading-section'], function () {
        Route::get('/{section}/', [TagController::class,'sectionHeading'])->name('heading-section');
        Route::post('/{section}/', [TagController::class,'sectionHeadingStore']);
    });
    Route::group(['prefix' => 'tag'], function () {
        Route::get('/{type}/', [TagController::class,'tag']);
        Route::post('/{type}/', [TagController::class,'tag_store']);
    });
    Route::group(['prefix' => 'other-meta-tag'], function () {
        Route::get('/', [TagController::class,'other_meta_tag']);
        Route::post('/', [TagController::class,'other_meta_tag_store']);
    });
 

    /****************** Meta Tags Ends ****************************/

    Route::get('logout', [LoginController::class,'logout']);
});
