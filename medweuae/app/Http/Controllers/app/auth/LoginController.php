<?php

    namespace App\Http\Controllers\app\auth;

    use Illuminate\Foundation\Auth\AuthenticatesUsers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;
    use App\Models\Admin;

    class LoginController extends Controller
    {
        use AuthenticatesUsers;
        protected $redirectTo = '/admin/dashboard';

        public function __construct()
        {
            $this->middleware('guest:admin', ['except' => ['logout']]);
        }

        public function showLoginForm()
        {
            return view('app.auth.login');
        }
        public function username()
        {
            return 'username';
        }
        protected function sendFailedLoginResponse(Request $request)
        {
            return redirect()->back()->withInput($request->only($this->username(), 'remember'))->withErrors([
                    $this->username() => 'Incorrect username/password',
                ]);
        }
        public function authenticated(Request $request, $user)
        {
            if ($user->status!='Active') {
                Auth::logout();
        
                return redirect()->back()->withInput($request->only($this->username(), 'remember'))->withErrors([
                    $this->username() => 'Your account is inactive',
                ]);
            }
        }
        protected function guard()
        {
            return Auth::guard('admin');
        }
        public function forgot_password(Request $request){
            $email_username = Admin::where('email',$request->email)->orWhere('username',$request->email)->first();
            if($email_username){
                $token = bin2hex(random_bytes(64));
                $email_username->token = $token;
                $link = url('/admin/reset-password/'.$token);
                DB::beginTransaction();
                if($email_username->save()){
                    if(ForgotMail($email_username)){
                        DB::commit();
                        echo json_encode(array('status'=>true,'message'=>'Password reset link has been sent to your registred email ID'));
                    }else{
                        DB::rollBack();
                        echo json_encode(array('status'=>false,'message'=>"Some network error occurred while senting the password reset link, Please try after some time"));
                    }
                }else{
                    DB::rollBack();
                    echo json_encode(array('status'=>false,'message'=>"Some error occurred, Please try after some time..!"));
                }
            }else{
                echo json_encode(array('status'=>false,'message'=>"Username/Email '".$request->email."' doesn't match with our records"));
            }
        }
        public function reset_password($token){
            if($token){
                $user = Admin::where('token',$token)->first();
                if($user){
                    return view('app.auth.reset_password',compact('user'));
                }else{
                    abort(404,"Token doesn't match with any entries");
                }
            }else{
                abort(404,'Token not found');
            }
        }
        public function reset_password_store(Request $request){
            if($request->id){
                $admin = Admin::find($request->id);
                if($admin->token!=NULL){
                    $admin->password = Hash::make($request['password']);
                    $admin->token = NULL;
                    if($admin->save()){
                        echo json_encode(array('status'=>true,'message'=>'Password has been reset successfully, Please sign-in using your new password'));
                    }else{
                        echo json_encode(array('status'=>false,'message'=>"Some error occurred, Please try after some time..!"));
                    }
                }else{
                    echo json_encode(array('status'=>false,'message'=>"Admin not requested for password reset"));
                }
            }else{
                echo json_encode(array('status'=>false,'message'=>"Admin not found"));
            }
        }
        public function logout()
        {
        	Auth::logout();
        	return redirect('/admin');
        }
    }
