<?php

namespace App\Http\Controllers\app;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function banner($type)
    {
        $type = trim(ucfirst($type));
        $key = "Update";
        $title = "Update Banner - ".$type;
        $banner = Banner::where('type',$type)->first();
        return view('app.banner.banner_form',compact('key','title','banner','type'));
    }
    
    public function banner_store(Request $request)
    {
        $type_array = array('About','Project','Blog','Contact','Privacy','Terms');
        if(in_array($request->type,$type_array)){
            if($request->id==0){
                $banner = new Banner;
                $validatedData = $request->validate([
                    'title'=>'required',
                    'type' => 'required',
                    'banner' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                    'banner_meta_tag' => 'required|min:2'
                ]);
            }else{
                $validatedData = $request->validate([
                    'title'=>'required',
                    'type' => 'required',
                    'banner_meta_tag' => 'required|min:2'
                ]);
                $banner = Banner::find($request->id);
                $banner->updated_at = date('Y-m-d h:i:s');
            }
            if ($request->hasFile('banner')) {
                if (File::exists($banner->banner)) {
                    File::delete($banner->banner);
                }
                $banner->banner = uploadFile($request->banner, strtolower($request->type), 'uploads/banner/'.strtolower($request->type).'/banner/');
            }
            $banner->title = $validatedData['title'];
            $banner->type = $validatedData['type'];
            $banner->banner_meta_tag = $validatedData['banner_meta_tag'];
            if($banner->save()){
                session()->flash('success', $request->type.' banner has been updated successfully');
                return redirect(sitePrefix().'banner/'.strtolower($request->type));
            }else{
                return back()->with('error', 'Error while updating the '.$request->type);
            }
        }else{
            abort(403, 'You are requested type '.$request->type.' does not exist'); 
        }
    }

    public function banner_delete(Request $request){
        if($request->type){
            $typeData = explode('/',$request->type);
            $type = $typeData[0];
            $banner_webp = $typeData[1];
            $banner = Banner::where('type',$type)->first();
            $removalFile = $banner->$banner_webp;
            $banner->$banner_webp=NULL;
            if($banner->save()){
                if (File::exists($banner->banner)) {
                    File::delete($banner->banner);
                }
                return response()->json([
                    'status' => true,
                    'success' => 'File has been removed'
                ]);    
            }else{
                return response()->json([
                    'status' => false,
                    'success' => 'Unable to remove the file'
                ]);
            }
        }else{
            return response()->json([
                'status' => false,
                'success' => 'Unable to find the file'
            ]);
        }
    }
}
