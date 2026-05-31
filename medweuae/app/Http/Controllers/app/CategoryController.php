<?php

namespace App\Http\Controllers\app;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use DB;

class CategoryController extends Controller
{
    public function category($id=NULL)
    {
        $type = ($id==NULL)?'Category':'Sub-category';
        $title = $type." List";
        if($id!=NULL){
            $categoryList = ProductCategory::where('parent_id',$id)->get();
        }else{
            $categoryList = ProductCategory::whereNull('parent_id')->get();
        }
        return view('app.product.category.list',compact('categoryList','title','id','type'));
    }

    public function category_create($id=NULL)
    {
        $type = ($id==NULL)?'Category':'Sub-category';
        $key = "Create";
        $title = "Create ".$type;
        return view('app.product.category.form',compact('key','title','id','type'));
    }
    
    public function category_store(Request $request)
    {
        $type = ($request->parent_id==NULL)?'Category':'Sub-category';
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',            
            'short_url' => 'required',
        ]);
        $categoryExist = ProductCategory::where('short_url', $request->short_url)->count();
        if($categoryExist>0){
            return back()->withInput($request->input())->withErrors($type. " shorturl '".$request->short_url."' already exist");
        }else{
            $category = new ProductCategory;
            $category->title = $validatedData['title'];
            if($request->parent_id!=NULL){
                $category->parent_id = $request->parent_id;
            }
            $category->short_url = $validatedData['short_url'];
            if($category->save()){
                session()->flash('success', $type. " '".$category->title."' has been added successfully");
                if($request->parent_id!=NULL){
                    return redirect(sitePrefix().'product/'.strtolower($type).'/'.$request->parent_id);
                }else{
                    return redirect(sitePrefix().'product/'.strtolower($type));
                }
            }else{
                return back()->withInput($request->input())->withErrors("Error while updating the content");
            }
        }
    }
    
    public function category_edit(Request $request, $id)
    {
        $key = "Update";
        $category = ProductCategory::find($id);
        if($category){
            $id = $category->parent_id;
            $type = ($category->parent_id==NULL)?'Category':'Sub-category';
            $title = "Update ".$type;
            return view('app.product.category.form', compact('key','category','title','type', 'id'));
        }else{
            return view('app.error.404'); 
        }
    }
    
    public function category_update(Request $request, $id)
    {
        $type = ($request->parent_id==NULL)?'Category':'Sub-category';
        $category =  ProductCategory::find($id);
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'short_url' => 'required',
        ]);
        $categoryExist = ProductCategory::where([['short_url',$request->short_url],['id','!=',$id]])->count();
        if($categoryExist>0){
            return back()->withInput($request->input())->withErrors($type. " shorturl '".$request->short_url."' already exist");
        }else{
            $category->title = $validatedData['title'];
            if($request->parent_id!=NULL){
                $category->parent_id = $request->parent_id;
            }
            $category->short_url = $validatedData['short_url'];
            $category->updated_at = date('Y-m-d h:i:s');
            if($category->save()){
                session()->flash('message', $type. " '".$category->title."' has been updated successfully");
                if($request->parent_id!=NULL){
                    return redirect(sitePrefix().'product/'.strtolower($type).'/'.$request->parent_id);
                }else{
                    return redirect(sitePrefix().'product/'.strtolower($type));
                }
            }else{
                return back()->withInput($request->input())->withErrors("Error while updating the content");
            }
        }
    }

    public function delete_category(Request $request){
        if(isset($request->id) && $request->id!=NULL){
            $category = ProductCategory::find($request->id);
            $message = "Some error occured, Please try after sometime";
            if($category){
                $childExist = ProductCategory::where('parent_id',$category->id)->count();
                if($childExist>0){
                    $flag=false;
                    $message = "Not allowed : Category '".$category->title."' has child categories";
                }else{
                    $portfolioExist = Product::where('category_id',$category->id)->count();
                    if($portfolioExist>0){
                        $flag = false;
                        $message = "Not allowed : Category '".$category->title."' tagged with products";
                    }else{
                        $flag = true;
                    }
                }
                if($flag==true){
                    $category->delete();
                    echo(json_encode(array('status'=>true)));
                }else{
                    echo(json_encode(array('status'=>false,'message'=>$message)));
                }
            }else{
                echo(json_encode(array('status'=>false,'message'=>'Model class not found')));
            }
        }else{
            echo(json_encode(array('status'=>false,'message'=>'Empty value submitted')));
        }
    }
}


