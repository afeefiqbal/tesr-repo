<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    public function list()
    {
        $title = "Admin List";
        $adminList = Admin::get();
        return view('app.admin.admin_list',compact('adminList','title'));

    }
    public function create()
    {        
        $key = "Create";
        $title = "Add Admin";
        return view('app.admin.admin_form',compact('key','title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:255',
            'email_id' => 'required|email',
            'username' => 'required',
            'password' => 'required|string',
        ]);
        $adminInput = new Admin;
        $adminInput->name = $validatedData['name'];
        $adminInput->email = $validatedData['email_id'];
        $adminInput->username = $validatedData['username'];
        $adminInput->password = Hash::make($validatedData['password']);
        $adminInput->phone_number = isset($request->phone_number)?$request->phone_number:'';
        if ($request->hasFile('profile_image')) {
            $adminInput->profile_image = uploadFile($request->profile_image, 'admin', 'uploads/admin/profile_image/');
        }
        $usernameData = Admin::where('username',$validatedData['username'])->count();
        if($usernameData==0){
            $emailData = Admin::where('email',$validatedData['email_id'])->count();
            if($emailData==0){
                if($adminInput->save()){
                    session()->flash('message', 'Admin "'.$adminInput->name.'" has been added successfully');
                    return redirect(sitePrefix().'administration');
                }else{
                    return back()->with('message', 'Error while creating admin');
                }
            }else{
                return back()->withInput($request->input())->withErrors("E-mail ID '".$validatedData['email_id']."' has been already taken");
            }
        }else{
            return back()->withInput($request->input())->withErrors("Username '".$validatedData['username']."' has been already taken");
        }
    }

    public function edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Admin Update";
        $admin = Admin::find($id);
        if($admin!=NULL){
            return view('app.admin.admin_form', compact('key','admin','title'));
        }else{
            return view('app.errors.404');
        }
    }

    public function view(Request $request, $id)
    {
        $key = "View";
        $admin = Admin::find($id);
        if($admin!=NULL){
            $title = "Admin View - ".$admin->name;
            return view('app.admin.admin_view', compact('key','admin','title'));
        }else{
            return view('app.errors.404');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:255',
            'email_id' => 'required|email',
            'username'=>'required'
        ]);
        $adminInput = Admin::find($id);
        $adminInput->name = $validatedData['name'];
        $adminInput->email = $validatedData['email_id'];
        $adminInput->phone_number = isset($request->phone_number)?$request->phone_number:'';
        if ($request->hasFile('profile_image')) {
            if (File::exists($adminInput->profile_image)) {
                File::delete($adminInput->profile_image);
            }
            $adminInput->profile_image = uploadFile($request->profile_image, 'admin', 'uploads/admin/profile_image/');
        }
        $emailData = Admin::where([['email',$validatedData['email_id']],['id','!=',$id]])->count();
        if($emailData==0){
            $usernameData = Admin::where([['username',$validatedData['username']],['id','!=',$id]])->count();
            if($usernameData==0){
                $adminInput->username = $validatedData['username'];
                if($adminInput->save()){
                    session()->flash('message', 'Admin "'.$adminInput->name.'" has been updated successfully');
                    return redirect(sitePrefix().'administration');
                }else{
                    return back()->with('message', 'Error while updating admin');
                }
            }else{
                return back()->withInput($request->input())->withErrors("E-mail ID '".$validatedData['email_id']."' has been already taken");
            }
        }else{
            return back()->withInput($request->input())->withErrors("E-mail ID '".$validatedData['email_id']."' has been already taken");
        }
    }
    public function reset_password($id)
    {
        $admin = Admin::find($id);
        if($admin!=NULL){
            $key = "Reset Password - ".$admin->name;
            $title = "Reset Password - ".$admin->name;
            return view('app.admin.reset_password',compact('key','title','admin'));
        }else{
           return view('app.errors.404');
        }
    }

    public function reset_password_store(Request $request ,$id)
    {
        $validatedData = $request->validate([
            'password' => 'required|min:2',
            'confirm_password' => 'required|min:2',
        ]);
        if($validatedData['password']==$validatedData['confirm_password']){
            $admin = Admin::find($id);
            $admin->password = Hash::make($validatedData['password']);
            if($admin->save()){
                session()->flash('message', 'Password has been updated successfully');
                return redirect(sitePrefix().'admin/reset_password/'.$id);
            }else{
                return back()->with('message', 'Error while reseting the password');
            }
        }else{
            return back()->withInput($request->input())->withErrors("Password mis-match");
        }
    }
    public function delete_admin(Request $request){
        if(isset($request->id) && $request->id!=NULL){
            $admin = Admin::find($request->id);
            if($admin){
                if($admin->id==1){
                    return response()->json([
                        'status' => false,
                        'message' => "Not permitted to delete the 'Super Admin' user"
                    ]);
                }else{
                    $deleted = $admin->delete();
                    if($deleted==true){
                        echo(json_encode(array('status'=>true)));
                    }else{
                        echo(json_encode(array('status'=>false,'message'=>'Some error occurred,please try after sometime')));
                    }
                }
            }else{
                echo(json_encode(array('status'=>false,'message'=>'Model class not found')));
            }
        }
    }
}
