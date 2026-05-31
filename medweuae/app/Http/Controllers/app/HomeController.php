<?php

namespace app\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\MetaData;
use App\Models\HomeBanner;
use App\Models\WhyChooseUs;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\ProjectCategory;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        $title = "Dashboard";
        return view('app.landing', compact('title'));
    }

    public function slider_list()
    {
        $title = "Slider List";
        $sliderList = HomeBanner::get();
        return view('app.home.slider.slider_list', compact('sliderList', 'title'));
    }

    public function slider_create()
    {
        $key = "Create";
        $title = "Create Slider";
        return view('app.home.slider.slider_form', compact('key', 'title'));
    }

    public function slider_store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required',
            'image_meta_tag' => 'required|min:5',
        ]);
        $slider = new HomeBanner;
        if ($request->hasFile('image')) {
            $slider->image = uploadFile($request->image, 'home-slider', 'uploads/home/slider/image/');
        }
        $sort_order = HomeBanner::orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $slider->title = $request->title ?? '';
        $slider->sub_title = $request->sub_title ?? '';
        $slider->description = $request->description ?? '';
        $slider->image_meta_tag = $validatedData['image_meta_tag'];
        $slider->button_url = ($request->button_url)?$request->button_url:'';
        $slider->button_text = ($request->button_text)?$request->button_text:'';
        $slider->sort_order = $sort_number;
        if ($slider->save()) {
            session()->flash('message', "'Slider' has been added successfully");
            return redirect(sitePrefix().'home/slider');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function slider_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Banner";
        $slider = HomeBanner::find($id);
        if ($slider) {
            return view('app.home.slider.slider_form',
                compact('key', 'slider', 'title'));
        } else {
            return view('app.errors.404');
        }
    }

    public function slider_update(Request $request, $id)
    {
        $slider = HomeBanner::find($id);
        $validatedData = $request->validate([
            'title' => 'required',
            'image_meta_tag' => 'required|min:5',
        ]);
        if ($request->hasFile('image')) {
            if (File::exists($slider->image)) {
                File::delete($slider->image);
            }
            $slider->image = uploadFile($request->image, 'home-slider', 'uploads/home/slider/image/');
        }
        $slider->title = $request->title ?? '';
        $slider->sub_title = $request->sub_title ?? '';
        $slider->description = $request->description ?? '';
        $slider->image_meta_tag = $validatedData['image_meta_tag'];
        $slider->button_text = ($request->button_text)?$request->button_text:'';
        $slider->button_url = ($request->button_url)?$request->button_url:'';
        $slider->updated_at = date('Y-m-d h:i:s');
        if ($slider->save()) {
            session()->flash('message', "'Slider' has been updated successfully");
            return redirect(sitePrefix().'home/slider');
        } else {
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_slider(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $slider = HomeBanner::find($request->id);
            if ($slider) {
                $slider->sort_order = null;
                $slider->save();
                if (File::exists($slider->image)) {
                    File::delete($slider->image);
                }
                $deleted = $slider->delete();
                if ($deleted == true) {
                    return response()->json(['status' => true]);
                } else {
                    return response()->json(['status' => false, 'message' => 'Some error occurred,please try after sometime']);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

    public function list()
    {
        $title = "Why choose us";
        $list = WhyChooseUs::get();
        return view('app.home.why_choose_us.list.list',compact('list','title'));
    }

    public function list_create()
    {
        $key = "Add";
        $title = "Add";
        return view('app.home.why_choose_us.list.form',compact('key','title'));
    }
    
    public function list_store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        $list = new WhyChooseUs;
        if ($request->hasFile('image')) {
            $list->image = uploadFile($request->image, 'list', 'uploads/why-choose-us/image/');
        }
        if ($request->hasFile('hover_image')) {
            $list->hover_image = uploadFile($request->hover_image, 'list', 'uploads/why-choose-us/hover_image/');
        }
        $list->title = $validatedData['title'];
        $list->description = $validatedData['description'];
        $list->image_attribute = ($request->image_attribute)??'';
        $list->hover_image_attribute = ($request->hover_image_attribute)??'';
        $sort_order = WhyChooseUs::orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $list->sort_order = $sort_number;
        if($list->save()){
            session()->flash('success', "Why choose us '".$request->title."' has been added successfully");
            return redirect(sitePrefix().'home/why-choose-us');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function list_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update";
        $list = WhyChooseUs::find($id);
        if($list){
            return view('app.home.why_choose_us.list.form', compact('list','title','key'));
        }else{
            return view('app/errors/404');
        }
    }
    
    public function list_update(Request $request, $id)
    {
        $list =  WhyChooseUs::find($id);
        $validatedData = $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        if ($request->hasFile('image')) {
            if (File::exists($list->image)) {
                File::delete($list->image);
            }
            $list->image = uploadFile($request->image, 'list', 'uploads/why-choose-us/list/image/');
        }
        if ($request->hasFile('hover_image')) {
            if (File::exists($list->hover_image)) {
                File::delete($list->hover_image);
            }
            $list->hover_image = uploadFile($request->hover_image, 'list', 'uploads/why-choose-us/list/hover_image/');
        }
        $list->image_attribute = ($request->image_attribute)??'';
        $list->hover_image_attribute = ($request->hover_image_attribute)??'';
        $list->title = $validatedData['title'];
        $list->description = $validatedData['description'];
        $list->updated_at = date('Y-m-d h:i:s');
        if($list->save()){
            session()->flash('success', "Why choose us '".$request->title."' has been updated successfully");
            return redirect(sitePrefix().'home/why-choose-us');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_list(Request $request){
        if(isset($request->id) && $request->id!=NULL){
            $list = WhyChooseUs::find($request->id);
            if($list){
                $image = $list->image;
                DB::beginTransaction();
                $deleted = $list->delete();
                if($deleted==true){
                    DB::commit();
                    echo(json_encode(array('status'=>true)));
                }else{
                    echo(json_encode(array('status'=>false,'message'=>'Some error occured,please try after sometime')));
                }
            }else{
                DB::rollBack();
                echo(json_encode(array('status'=>false,'message'=>'Model class not found')));
            }
        }else{
            echo(json_encode(array('status'=>false,'message'=>'Empty value submitted')));
        }
    }

    public function testimonial()
    {
        $title = "Testimonial List";
        $testimonialList = Testimonial::get();
        return view('app.home.testimonial.list',compact('testimonialList','title'));
    }

    public function testimonial_create()
    {
        $key = "Add";
        $title = "Add Testimonial";
        return view('app.home.testimonial.form',compact('key','title'));
    }
    
    public function testimonial_store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required',
            'designation'=>'required',
            'message'=>'required',
        ]);
        $testimonial = new Testimonial;
        $testimonial->title = $validatedData['title'];
        $testimonial->designation = $validatedData['designation'];
        $testimonial->message = $validatedData['message'];
        $sort_order = Testimonial::orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        if ($request->hasFile('image')) {
            $testimonial->image = uploadFile($request->image, 'list', 'uploads/testimonial/image/');
        }
        $testimonial->image_attribute = ($request->image_attribute)?$request->image_attribute:'';
        $testimonial->sort_order = $sort_number;
        if($testimonial->save()){
            session()->flash('message', 'Testimonial has been added successfully');
            return redirect(sitePrefix().'home/testimonial');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function testimonial_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Testimonial";
        $testimonial = Testimonial::find($id);
        if($testimonial){
            return view('app.home.testimonial.form', compact('testimonial','title','key'));
        }else{
            return view('app/errors/404');
        }
    }
    
    public function testimonial_update(Request $request, $id)
    {
        $testimonial =  Testimonial::find($id);
        $validatedData = $request->validate([
            'title'=>'required',
            'designation'=>'required',
            'message'=>'required',
        ]);
        $testimonial->title = $validatedData['title'];
        $testimonial->designation = $validatedData['designation'];
        $testimonial->message = $validatedData['message'];
        $testimonial->updated_at = date('Y-m-d h:i:s');
        if ($request->hasFile('image')) {
            if (File::exists($testimonial->image)) {
                File::delete($testimonial->image);
            }
            $testimonial->image = uploadFile($request->image, 'list', 'uploads/testimonial/image/');
        }
        $testimonial->image_attribute = ($request->image_attribute)?$request->image_attribute:'';
        if($testimonial->save()){
            session()->flash('message', 'Testimonial has been updated successfully');
            return redirect(sitePrefix().'home/testimonial');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_testimonial(Request $request){
        if(isset($request->id) && $request->id!=NULL){
            $testimonial = Testimonial::find($request->id);
            if($testimonial){
                DB::beginTransaction();
                $deleted = $testimonial->delete();
                if($deleted==true){
                    DB::commit();
                    echo(json_encode(array('status'=>true)));
                }else{
                    echo(json_encode(array('status'=>false,'message'=>'Some error occured,please try after sometime')));
                }
            }else{
                DB::rollBack();
                echo(json_encode(array('status'=>false,'message'=>'Model class not found')));
            }
        }else{
            echo(json_encode(array('status'=>false,'message'=>'Empty value submitted')));
        }
    }

    public function brand()
    {
        $title = "Brand List";
        $brandList = Client::get();
        return view('app.home.brand.list', compact('brandList', 'title'));
    }
    public function brand_create()
    {
        $key = "Create";
        $title = "Create Brand";
        return view('app.home.brand.form', compact('key', 'title'));
    }
    public function brand_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
        ]);
        $brand = new Client;
        if ($request->hasFile('image')) {
            $brand->image = uploadFile($request->image, 'brand', 'uploads/brand/image/');
        }
        $brand->title = $validatedData['title'];
        $brand->image_meta_tag = ($request->image_meta_tag)?$request->image_meta_tag:'';
        if ($brand->save()) {
            session()->flash('success', "Client '" . $request->title . "' has been added successfully");
            return redirect(sitePrefix().'home/brand');
        } else {
            return back()->with('error', 'Error while creating the brand');
        }
    }

    public function brand_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Brand";
        $brand = Client::find($id);
        if ($brand) {
            return view('app.home.brand.form', compact('key', 'brand', 'title'));
        } else {
            return view('app.error.404');
        }
    }

    public function brand_update(Request $request, $id)
    {
        $brand = Client::find($id);
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',            
        ]);
        if ($request->hasFile('image')) {
            if (File::exists($brand->image)) {
                File::delete($brand->image);
            }
            $brand->image = uploadFile($request->image, 'brand', 'uploads/brand/image/');
        }
        $brand->title = $validatedData['title'];
        $brand->image_meta_tag = ($request->image_meta_tag)?$request->image_meta_tag:'';
        $brand->updated_at = date('Y-m-d h:i:s');
        if ($brand->save()) {
            session()->flash('success', "Client '" . $request->title . "' has been updated successfully");
            return redirect(sitePrefix().'home/brand');
        } else {
            return back()->with('error', 'Error while updating the brand');
        }
    }

    public function delete_brand(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $brand = Client::find($request->id);
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

    public function sort_order(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $table = $request->table;
            $appPrefix = 'App';
            $model = $appPrefix . '\\Models\\' . $table;
            if ($request->extra != NULL) {
                $sortOrder = $model::where([['sort_order', '=', $request->sort_order], [$request->extra, '=', $request->extra_key], ['id', '!=', $request->id]])->count();
            } else {
                $sortOrder = $model::where([['sort_order', '=', $request->sort_order], ['id', '!=', $request->id]])->count();
            }
            if ($sortOrder) {
                return response()->json(['status' => false, 'message' => 'Sort order "' . $request->sort_order . '" has been already taken']);
            } else {
                $data = $model::find($request->id);
                $data->sort_order = $request->sort_order;
                if ($data->save()) {
                    return response()->json(['status' => true, 'message' => 'Sort order updated successfully']);
                } else {
                    return response()->json(['status' => false, 'message' => 'Error while updating the sort order']);
                }
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

    public function status_change(Request $request)
    {
        $table = $request->table;
        $state = $request->state;
        $primary_key = $request->primary_key;
        if ($state == 'true') {
            $status = "Active";
        } else {
            $status = "Inactive";
        }
        $appPrefix = 'App';
        $model = $appPrefix . '\\Models\\' . $table;
        $data = $model::find($primary_key);
        $data->status = $status;
        if ($data->save()) {
            echo "1";
        } else {
            echo "2";
        }
    }
}
