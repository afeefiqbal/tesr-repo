<?php

namespace App\Http\Controllers\app;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogHeading;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function list()
    {
        $title = "Blog List";
        $blogList = Blog::get();
        return view('app.blog.list', compact('blogList', 'title'));
    }
    public function create()
    {
        $key = "Create";
        $title = "Add Blog";
        return view('app.blog.form', compact('key', 'title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'short_url'=>'required',
            'description'=>'required',
            'posted_date' => 'required',
            'list_description' => 'required'
        ]);
        $blog = new Blog;
        if ($request->hasFile('image')) {
            $blog->image = uploadFile($request->image, 'blog', 'uploads/blog/image/');
        }
        if ($request->hasFile('banner')) {
            $blog->banner = uploadFile($request->banner, 'blog', 'uploads/blog/banner/');
        }
        $blog->title = $validatedData['title'];
        $blog->short_url = $validatedData['short_url'];
        $blog->description = $validatedData['description'];
        $blog->list_description = ($request->list_description)?$request->list_description:'';
        $blog->image_meta_tag = ($request->image_meta_tag)?$request->image_meta_tag:'';
        $blog->posted_date = $validatedData['posted_date'];
        $blog->banner_attribute = ($request->banner_attribute)?$request->banner_attribute:'';
        $blog->meta_title = ($request->meta_title) ? $request->meta_title : '';
        $blog->meta_description = ($request->meta_description) ? $request->meta_description : '';
        $blog->meta_keyword = ($request->meta_keyword) ? $request->meta_keyword : '';
        $blog->other_meta_tag = ($request->other_meta_tag) ? $request->other_meta_tag : '';
        $blog->author = ($request->author) ? $request->author : '';
        if ($blog->save()) {
            session()->flash('success', 'Blog "' . $request->title . '" has been added successfully');
            return redirect(sitePrefix().'blog/');
        } else {
            return back()->with('message', 'Error while creating blog');
        }
    }

    public function edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Blog Update";
        $blog = Blog::find($id);
        if ($blog != null) {
            return view('app.blog.form', compact('key', 'blog', 'title'));
        } else {
            return view('app.error.404');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'short_url'=>'required',
            'description' => 'required',
            'posted_date' => 'required',
            'list_description' => 'required'
        ]);
        $blog = Blog::find($id);
        if ($request->hasFile('image')) {
            if (File::exists($blog->image)) {
                File::delete($blog->image);
            }
            $blog->image = uploadFile($request->image, 'blog', 'uploads/blog/image/');
        }
        if ($request->hasFile('banner')) {
            if (File::exists($blog->banner)) {
                File::delete($blog->banner);
            }
            $blog->banner = uploadFile($request->banner, 'blog', 'uploads/blog/banner/');
        }
        $blog->title = $validatedData['title'];
        $blog->short_url = $validatedData['short_url'];
        $blog->description = $validatedData['description'];
        $blog->list_description = ($request->list_description)?$request->list_description:'';
        $blog->image_meta_tag = ($request->image_meta_tag)?$request->image_meta_tag:'';
        $blog->posted_date = $validatedData['posted_date'];
        $blog->banner_attribute = ($request->banner_attribute)?$request->banner_attribute:'';
        $blog->meta_title = ($request->meta_title) ? $request->meta_title : '';
        $blog->meta_description = ($request->meta_description) ? $request->meta_description : '';
        $blog->meta_keyword = ($request->meta_keyword) ? $request->meta_keyword : '';
        $blog->other_meta_tag = ($request->other_meta_tag) ? $request->other_meta_tag : '';
        $blog->author = ($request->author) ? $request->author : '';
        $blog->updated_at = date('Y-m-d h:i:s');
        if ($blog->save()) {
            session()->flash('success', 'Blog "' . $request->title . '" has been updated successfully');
            return redirect(sitePrefix().'blog/');
        } else {
            return back()->with('message', 'Error while updating blog');
        }
    }
    public function delete(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $blog = Blog::find($request->id);
            if ($blog) {
                if (File::exists($blog->image)) {
                    File::delete($blog->image);
                }
                if (File::exists($blog->banner)) {
                    File::delete($blog->banner);
                }
                $deleted = $blog->delete();
                if ($deleted == true) {
                    echo (json_encode(array('status' => true)));
                } else {
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        }
    }
}
