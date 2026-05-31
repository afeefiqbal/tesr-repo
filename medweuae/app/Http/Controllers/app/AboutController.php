<?php

namespace App\Http\Controllers\app;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\KeyFeature;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{ 
    public function about_us()
    {
        $key = "Update";
        $title = "About us";
        $about = AboutUs::first();
        return view('app.about._form',compact('key','title','about'));
    }
    
    public function about_us_store(Request $request)
    {
        if($request->id==0){
            $about = new AboutUs;
        }else{
            $about = AboutUs::find($request->id);
            $about->updated_at = date('Y-m-d h:i:s');
        }
        if ($request->hasFile('home_image')) {
            if (File::exists($about->home_image)) {
                File::delete($about->home_image);
            }
            $about->home_image = uploadFile($request->home_image, 'about-us', 'uploads/about_us/home_image/');
        }
        if ($request->hasFile('image')) {
            if (File::exists($about->image)) {
                File::delete($about->image);
            }
            $about->image = uploadFile($request->image, 'about-us', 'uploads/about_us/image/');
        }
        if ($request->hasFile('mission_image')) {
            if (File::exists($about->mission_image)) {
                File::delete($about->mission_image);
            }
            $about->mission_image = uploadFile($request->mission_image, 'mission-image', 'uploads/about_us/mission_image/');
        }
        if ($request->hasFile('vision_image')) {
            if (File::exists($about->vision_image)) {
                File::delete($about->vision_image);
            }
            $about->vision_image = uploadFile($request->vision_image, 'vision-image', 'uploads/about_us/vision_image/');
        }
        $about->short_title = $request->short_title ?? '';
        $about->title = $request->title ?? '';
        $about->home_description = $request->home_description ?? '';
        $about->description = $request->description ?? '';
        $about->image_attribute = $request->image_attribute ?? '';
        $about->mission_title = $request->mission_title ?? '';
        $about->mission_image_meta_tag = $request->mission_image_meta_tag ?? '';
        $about->mission = $request->mission ?? '';
        $about->vision_title = $request->vision_title ?? '';
        $about->vision_image_meta_tag = $request->vision_image_meta_tag ?? '';
        $about->vision = $request->vision ?? '';
        $about->image_attribute = $request->image_attribute ?? '';
        $about->home_image_attribute = $request->home_image_attribute ?? '';
        if($about->save()){
            session()->flash('success', 'About content has been updated successfully');
            return redirect(sitePrefix().'about-us');
        }else{
            return back()->with('error', 'Error while updating the about content');
        }
    }

    public function key_feature()
    {
        $title = "Key Feature List";
        $featureList = KeyFeature::get();
        return view('app.about.key_feature.list',compact('featureList','title'));
    }

    public function key_feature_create()
    {
        $key = "Add";
        $title = "Add Key Feature";
        return view('app.about.key_feature.form',compact('key','title'));
    }
    
    public function key_feature_store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required',
            'count' => 'required'
        ]);
        $key_feature = new KeyFeature;
        if ($request->hasFile('image')) {
            $key_feature->image = uploadFile($request->image, 'KeyFeature', 'uploads/key_feature/image/');
        }
        $key_feature->image_attribute = ($request->image_attribute)?$request->image_attribute:'';
        $key_feature->title = $validatedData['title'];
        $key_feature->count = $validatedData['count'];
        $sort_order = KeyFeature::orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $key_feature->sort_order = $sort_number;
        if($key_feature->save()){
            session()->flash('message', "Key '".$request->title."' Feature has been updated successfully");
            return redirect(sitePrefix().'about-us/key-feature');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function key_feature_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Key Feature";
        $key_feature = KeyFeature::find($id);
        if($key_feature){
            return view('app.about.key_feature.form', compact('key_feature','title','key'));
        }else{
            return view('app/errors/404');
        }
    }
    
    public function key_feature_update(Request $request, $id)
    {
        $key_feature =  KeyFeature::find($id);
        $validatedData = $request->validate([
            'title'=>'required',
            'count' => 'required'
        ]);     
        if ($request->hasFile('image')) {
            if (File::exists($key_feature->image)) {
                File::delete($key_feature->image);
            }
            $key_feature->image = uploadFile($request->image, 'KeyFeature', 'uploads/key_feature/image/');
        }
        $key_feature->image_attribute = ($request->image_attribute)?$request->image_attribute:'';
        $key_feature->count = $validatedData['count'];
        $key_feature->title = $validatedData['title'];
        $key_feature->updated_at = date('Y-m-d h:i:s');
        if($key_feature->save()){
            session()->flash('message', "Key '".$request->title."' Feature has been updated successfully");
            return redirect(sitePrefix().'about-us/key-feature');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_key_feature(Request $request){
        if(isset($request->id) && $request->id!=NULL){
            $key_feature = KeyFeature::find($request->id);
            if($key_feature){
                $image = $key_feature->image;
                DB::beginTransaction();
                $deleted = $key_feature->delete();
                if($deleted==true){
                    if (File::exists($image)) {
                        File::delete($image);
                    }
                    DB::commit();
                    echo(json_encode(array('status'=>true)));
                }else{
                    echo(json_encode(array('status'=>false,'description'=>'Some error occured,please try after sometime')));
                }
            }else{
                DB::rollBack();
                echo(json_encode(array('status'=>false,'description'=>'Model class not found')));
            }
        }else{
            echo(json_encode(array('status'=>false,'description'=>'Empty value submitted')));
        }
    }
}
