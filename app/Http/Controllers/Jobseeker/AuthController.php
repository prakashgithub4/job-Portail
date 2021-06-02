<?php

namespace App\Http\Controllers\Jobseeker;
use App\Mail\Registermail;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\User as Employer;




class AuthController extends Controller
{
    public function index(){
        $total_jobs = \App\Job::count();
        return view('jobseeker.dashbord',compact('total_jobs'));
    }
    public function register(){
      return view('jobseeker.registration');
    }
    public function saveuser(Request $request){

       
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'company'=>['required', 'string', 'max:255'],
            'username'=>['required', 'string', 'max:255','unique:users']
            ]);

        
            $employer = new Employer();
            $employer->first_name=$request->fname;
            $employer->last_name=$request->lname;
            $employer->email = $request->email;
            $employer->password =Hash::make($request->password);
            $employer->username = $request->username;
            $employer->user_type = 2;
            $employer->save();
          
            Mail::to($request->email)->send(new Registermail($employer->id));
            return redirect()->back()->with('success','Jobseeker has been register successfully Please check your Mail and verify!');;

    }
    public function varifyuser($id){
       $user = Employer::find(decrypt($id));
       $user->email_verified_at = date('Y-m-d h:m:s');
       $user->save();
       return redirect('jobseeker/login')->with('success','User verified Successfully');
    }

    public function logout(){
    	if (\Auth::check()) {
           // The user is logged in...
    		\Auth::logout();
    		 return redirect('jobseeker/login')->with('success', 'Jobseeker is logout successfully');
          }
    }
    public function loginjobseeker(Request $request){
     
           
              $login_array=array(
                 'username'=>$request->username,
                 'password'=>$request->password,
                 'user_type'=>2
                     );
             
               
                if (\Auth::attempt($login_array)) {
                    $user =\App\User::where('username',$request->username)->first();
                  
                     if(empty($user->email_verified_at)){
                      return redirect('jobseeker/login')->with('error', 'Employer is not yet verified');
                     }
                   return redirect('jobseeker/dashbord');
                     
               }else{
               
                  return redirect('jobseeker/login')->with('error', 'Invalid User name or password');
               }
    }
    
}
