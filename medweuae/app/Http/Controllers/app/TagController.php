<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MetaTag;
use App\Models\ExtraTag;
use App\Models\SectionHeading;

class TagController extends Controller
{
    public function tag($type)
    {
        $type = trim(ucfirst($type));
        $key = "Update";
        $title = "Update '".$type."'";
        $tag = MetaTag::where('page_name',$type)->first();
        return view('app.tags.tags_form',compact('key','title','tag','type'));
        
    }
    
    public function tag_store(Request $request)
    {
        $type_array = array('Home','About','Product','Blog','Contact','Privacy','Terms');
        if(in_array($request->page_name,$type_array)){
            $validatedData = $request->validate([
                'page_name' => 'required|min:2',               
            ]);
            if($request->id==0){
                $tag = new MetaTag;
            }else{
                $tag = MetaTag::find($request->id);
                $tag->updated_at = date('Y-m-d h:i:s');
            }
            $tag->page_name = $validatedData['page_name'];
            $tag->meta_title = ($request->meta_title)?$request->meta_title:'';
            $tag->meta_description = ($request->meta_description)?$request->meta_description:'';
            $tag->meta_keyword = ($request->meta_keyword)?$request->meta_keyword:'';
            $tag->other_meta_tag = isset($request->other_meta_tag)?$request->other_meta_tag:'';
            if($tag->save()){
                session()->flash('success', "Meta details added for '".$request->page_name."' has been updated successfully");
                return redirect(sitePrefix().'tag/'.strtolower($request->page_name));
            }else{
                return back()->with('error', 'Error while updating the tag content');
            }
        }else{
            abort(403, 'You are requested type '.$request->page_name.' does not exist'); 
        }
    }
    
    public function other_meta_tag()
    {
        $key = "Update";
        $title = "Update Extra Tags";
        $tag = ExtraTag::first();
        return view('app.tags.extra_tag_form',compact('key','title','tag'));
    }
    
    public function other_meta_tag_store(Request $request)
    {
        $validatedData = $request->validate([
            'header_tag' => 'required|min:2',
        ]);
        if($request->id==0){
            $tag = new ExtraTag;
        }else{
            $tag = ExtraTag::find($request->id);
            $tag->updated_at = date('Y-m-d h:i:s');
        }
        $tag->header_tag = $validatedData['header_tag'];
        $tag->footer_tag = isset($request->footer_tag)?$request->footer_tag:'';  
        $tag->body_tag = isset($request->body_tag)?$request->body_tag:'';  
        if($tag->save()){
            session()->flash('message', 'Tag content has been updated successfully');
            return redirect(sitePrefix().'other-meta-tag/');
        }else{
            return back()->with('message', 'Error while updating the tag content');
        }
    }

    public function sectionHeading($section)
    {
        $section = trim(ucfirst($section));
        $key = "Update";
        $title = "Update '".$section."'";
        $heading = SectionHeading::where('section',$section)->first();
        return view('app.section_heading._form',compact('key','title','heading','section'));
    }
    
    public function sectionHeadingStore(Request $request)
    {
        $type_array = array('Fproduct', 'Blog', 'Whychooseus');
        if(in_array($request->section,$type_array)){
            $validatedData = $request->validate([
                'section' => 'required|min:2',               
            ]);
            if($request->id==0){
                $tag = new SectionHeading;
            }else{
                $tag = SectionHeading::find($request->id);
                $tag->updated_at = date('Y-m-d h:i:s');
            }
            $tag->section = $validatedData['section'];
            $tag->short_title = $request->short_title??'';
            $tag->title = $request->title??'';
            $tag->description = $request->description??'';
            if($tag->save()){
                return redirect()->route('heading-section', strtolower($request->section))->withSuccess('"'.$request->section.'" heading has been updated successfully');
            }else{
                return back()->with('error', 'Error while updating the section heading');
            }
        }else{
            abort(403, 'You are requested section '.$request->type.' does not exist'); 
        }
    }
}
