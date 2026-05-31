<?php

namespace App\Http\Controllers\app;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGallery;
use App\Models\ProductBrand;
use DB;

class ProductController extends Controller
{
    public function product()
    {
        $title = "Product";
        $productList = Product::get();
        $categoryList = ProductCategory::where('status','Active')->get();
        return view('app.product.product.list',compact('productList','title','categoryList'));
    }

    public function display_to_home(Request $request){
        $state = $request->state;
        if($state=='true'){
            $status = "Yes";
        }else{
            $status = "No";
        }
        $product = Product::find($request->id);
        if($product){
            $product->display_to_home = $status;
            if($product->save()){
                echo(json_encode(array('status'=>true,'message'=>'Successfully updated')));        
            }else{
                echo(json_encode(array('status'=>false,'message'=>'Error while updating the content')));    
            }
        }else{
            echo(json_encode(array('status'=>false,'message'=>'Invalid Product')));
      } 
    }

    public function product_create()
    {
        $key = "Create";
        $title = "Create Product";
        $categories = ProductCategory::where('status','Active')->get();
        $brands = ProductBrand::where('status','Active')->get();
        return view('app.product.product.form',compact('key','title','categories','brands'));        
    }

    public function product_store(Request $request)
    {
        DB::beginTransaction();
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'short_url'=>'required',
            'home_description' => 'required',
            'price'=>'required',
            'category_id' => 'required'
        ]);
        $productShortExist = Product::where('short_url',$request->short_url)->count();
        if($productShortExist>0){
            return back()->withInput($request->input())->withErrors("Short url '".$request->short_url."' already exist");
        }else{
            $product = new Product;
            if ($request->hasFile('thumbnail_image')) {
                $product->thumbnail_image = uploadFile($request->thumbnail_image, $request->title, 'uploads/product/thumbnail_image/');
            }
            if ($request->hasFile('banner')) {
                $product->banner = uploadFile($request->banner, $request->title, 'uploads/product/banner/');
            }
            if ($request->hasFile('brochure')) {
                $product->brochure = uploadFile($request->brochure, $request->title, 'uploads/product/brochure/');
            }
            $product->title = $validatedData['title'];
            $product->short_url = $validatedData['short_url'];
            $product->home_description = ($request->home_description)?$request->home_description:'';
            $product->description = ($request->description)?$request->description:'';
            $product->alternate_description = ($request->alternate_description)?$request->alternate_description:'';
            $product->price = ($request->price)?$request->price:'';
            $product->brand = ($request->brand)?$request->brand:'';
            $product->availablity = ($request->availablity)?$request->availablity:'';
            $product->category_id = $validatedData['category_id'];
            $product->thumbnail_image_attribute = ($request->thumbnail_image_attribute)?$request->thumbnail_image_attribute:'';
            $product->banner_attribute = ($request->banner_attribute)?$request->banner_attribute:'';
            $product->meta_title = ($request->meta_title) ? $request->meta_title : '';
            $product->meta_description = ($request->meta_description) ? $request->meta_description : '';
            $product->meta_keyword = ($request->meta_keyword) ? $request->meta_keyword : '';
            $product->other_meta_tag = ($request->other_meta_tag) ? $request->other_meta_tag : '';
            $sort_order = Product::latest()->first();
            if ($sort_order) {
                $sort_number = ($sort_order->sort_order + 1);
            } else {
                $sort_number = 1;
            }
            $product->sort_order = $sort_number;
            if($product->save()){
                session()->flash('success', "Product '".$product->title."' has been added successfully");
                DB::commit();
                return redirect(sitePrefix().'product/item');
            }else{
                DB::rollBack();
                return back()->withInput($request->input())->withErrors("Error while updating the product");  
            }
        }
    }
    
    public function product_edit(Request $request, $id)
    {
        $key = "Update";
        $product = Product::find($id);
        if($product){
            $title = "Update Product";
            $categories = ProductCategory::where('status','Active')->get();
            $brands = ProductBrand::where('status','Active')->get();
            return view('app.product.product.form',compact('key','title','categories','product','brands'));
        }else{
            return view('app.error.404');  
        }
      
    }

    public function product_update(Request $request, $id)
    {
        DB::beginTransaction();
        $productShortExist = Product::where([['short_url',$request->short_url],['id','!=',$id]])->count();
        if($productShortExist>0){
            return back()->withInput($request->input())->withErrors("Short url '".$request->short_url."' already exist");
        }else{
            $product =  Product::find($id);
            if($product!=NULL){
                $validatedData = $request->validate([
                    'title' => 'required|min:2|max:255',
                    'short_url'=>'required',
                    'home_description' => 'required',
                    'price'=>'required',
                    'category_id' => 'required'
                ]);
                if ($request->hasFile('thumbnail_image')) {
                    if (File::exists($product->thumbnail_image)) {
                        File::delete($product->thumbnail_image);
                    }
                    $product->thumbnail_image = uploadFile($request->thumbnail_image, $request->short_url, 'uploads/product/thumbnail_image/');
                }
                if ($request->hasFile('banner')) {
                    if (File::exists($product->banner)) {
                        File::delete($product->banner);
                    }
                    $product->banner = uploadFile($request->banner, $request->short_url, 'uploads/product/banner/');
                }
                if ($request->hasFile('brochure')) {
                    if (File::exists($product->brochure)) {
                        File::delete($product->brochure);
                    }
                    $product->brochure = uploadFile($request->brochure, $request->title, 'uploads/product/brochure/');
                }
                $product->title = $validatedData['title'];
                $product->short_url = $validatedData['short_url'];
                $product->home_description = ($request->home_description)?$request->home_description:'';
                $product->description = ($request->description)?$request->description:'';
                $product->alternate_description = ($request->alternate_description)?$request->alternate_description:'';
                $product->price = ($request->price)?$request->price:'';
                $product->brand = ($request->brand)?$request->brand:'';
                $product->availablity = ($request->availablity)?$request->availablity:'';
                $product->category_id = $validatedData['category_id'];
                $product->thumbnail_image_attribute = ($request->thumbnail_image_attribute)?$request->thumbnail_image_attribute:'';
                $product->banner_attribute = ($request->banner_attribute)?$request->banner_attribute:'';
                $product->meta_title = ($request->meta_title) ? $request->meta_title : '';
                $product->meta_description = ($request->meta_description) ? $request->meta_description : '';
                $product->meta_keyword = ($request->meta_keyword) ? $request->meta_keyword : '';
                $product->other_meta_tag = ($request->other_meta_tag) ? $request->other_meta_tag : '';
                $product->updated_at = date('Y-m-d h:i:s');
                if($product->save()){
                    session()->flash('success', "Product '".$product->title."' has been updated successfully");
                    DB::commit();
                    return redirect(sitePrefix().'product/item');
                }else{
                    DB::rollBack();
                    return back()->withInput($request->input())->withErrors("Error while updating the product");    
                }
            }else{
                DB::rollBack();
                return back()->withInput($request->input())->withErrors("Product not found");
            }
        }               
    }

    public function delete_product(Request $request){
        if (isset($request->id) && $request->id != null) {
            $product = Product::find($request->id);
            if ($product) {
                if (File::exists($product->banner)) {
                    File::delete($product->banner);
                }
                $deleted = $product->delete();
                if ($deleted == true) {
                    echo (json_encode(array('status' => true)));
                } else {
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function gallery_create($product_id)
    {
        $product = Product::find($product_id);
        if($product){
            $key = "Create";
            $title = "Create Gallery";
            $files = ProductGallery::where('product_id', $product_id)->get();
            return view('app.product.gallery.form', compact('key', 'title', 'product', 'files'));
        }else{
            return view('app.error.404');
        }

    }

    public function gallery_store(Request $request)
    {
        $product = Product::find($request->product_id);
        if($product!=NULL){
            if ($request->hasFile('images')) {
                $location = 'uploads/product/'.$request->product_id.'/gallery/';
                if (!File::exists(public_path($location))) {
                    mkdir(public_path($location), 0777, true);
                }
                $success = array();
                $failed = array();
                $i=0;
                foreach($request->file('images') as $file){
                    $image = uploadFile($file, 'product-gallery', 'uploads/product/'.$request->product_id.'/image/');
                    $product_gallery = new ProductGallery;
                    $product_gallery->product_id = $request->product_id;
                    $product_gallery->image = $image;
                    if($product_gallery->save()){
                        $success[]=1;
                    }
                    $i++;
                }
                if(count($success)==$i){
                    $fileValid = true;
                }else{
                    $fileValid = false;   
                }
                if ($fileValid==true) {
                    session()->flash('success', "Gallery has been added successfully");
                } else {
                    return back()->with('error', 'Error while creating the Gallery');
                }
            }else{
                session()->flash('error', "Please upload any file..!");
            }
        }else{
            session()->flash('error', "Product not found");
        }
        return redirect(sitePrefix() . 'product/item/gallery/create/' .$request->product_id);
    }

    public function delete_image(Request $request, $id)
    {
        if (isset($id) && $id != null) {
            $product_gallery = ProductGallery::find($id);
            if ($product_gallery) {
                if (File::exists($product_gallery->image)) {
                    File::delete($product_gallery->image);
                }
                $deleted = $product_gallery->delete();
                if ($deleted == true) {
                    echo (json_encode(array('status' => true)));
                } else {
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function brand()
    {
        $title = "Brand List";
        $brandList = ProductBrand::get();
        return view('app.product.brand.list', compact('brandList', 'title'));
    }
    public function brand_create()
    {
        $key = "Create";
        $title = "Create Brand";
        return view('app.product.brand.form', compact('key', 'title'));
    }
    public function brand_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
        ]);
        $brand = new ProductBrand;
        $brand->title = $validatedData['title'];
        if ($brand->save()) {
            session()->flash('success', "Product brand '" . $request->title . "' has been added successfully");
            return redirect(sitePrefix().'product/brand');
        } else {
            return back()->with('error', 'Error while creating the brand');
        }
    }

    public function brand_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Brand";
        $brand = ProductBrand::find($id);
        if ($brand) {
            return view('app.product.brand.form', compact('key', 'brand', 'title'));
        } else {
            return view('app.error.404');
        }
    }

    public function brand_update(Request $request, $id)
    {
        $brand = ProductBrand::find($id);
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',            
        ]);
        $brand->title = $validatedData['title'];
        $brand->updated_at = date('Y-m-d h:i:s');
        if ($brand->save()) {
            session()->flash('success', "Product brand '" . $request->title . "' has been updated successfully");
            return redirect(sitePrefix().'product/brand');
        } else {
            return back()->with('error', 'Error while updating the brand');
        }
    }

    public function delete_brand(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $brand = ProductBrand::find($request->id);
            if ($brand) {
                if (File::exists($brand->image)) {
                    File::delete($brand->image);
                }
                $deleted = $brand->delete();
                if ($deleted == true) {
                    echo (json_encode(array('status' => true)));
                } else {
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }
}


