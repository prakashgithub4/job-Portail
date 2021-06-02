<?php

namespace App\Http\Controllers\Employeer;
use App\Mail\Registermail;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\User as Employer;
use App\Apply;



class AuthController extends Controller
{
    public function index(){
        $total_jobs = \App\Job::where('user_id',\Auth::user()->id)->count();
        $total_applications =\App\Apply::where('employer_id',\Auth::user()->id)->count();
        return view('employer.dashbord',compact('total_jobs','total_applications'));
    }
    public function register(){
      return view('employer.registration');
    }
    public function saveemployeer(Request $request){

       
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'company'=>['required', 'string', 'max:255'],
            'username'=>['required', 'string', 'max:255','unique:users']
            ]);

           
            $employer = new Employer();
            $employer->first_name=$request->fname;
            $employer->last_name=$request->lname;
            $employer->email = $request->email;
            $employer->password =Hash::make($request->password);
            $employer->company_name = $request->company;
            $employer->username = $request->username;
            $employer->user_type = 1;
            $employer->save();
          
            Mail::to($request->email)->send(new Registermail($employer->id));
            return redirect()->back()->with('success','Employer has been register successfully Please check your Mail and verify!');;

    }
    public function varifyuser($id){
       $user = Employer::find(decrypt($id));
       $user->email_verified_at = date('Y-m-d h:m:s');
       $user->save();
       return redirect('employer/login')->with('success','User verified Successfully');
    }

    public function logout(){
    	if (\Auth::check()) {
           // The user is logged in...
    		\Auth::logout();
    		 return redirect('employer/login')->with('success', 'Employer is logout successfully');
          }
    }
    public function loginemployer(Request $request){
     
           
              $login_array=array(
                 'username'=>$request->username,
                 'password'=>$request->password,
                 'user_type'=>1
                     );
             
               
                if (\Auth::attempt($login_array)) {
                    $user =\App\User::where('username',$request->username)->first();
                  
                     if(empty($user->email_verified_at)){
                      return redirect('employer/login')->with('error', 'Employer is not yet verified');
                     }
                   return redirect('employer/dashbord');
                     
               }else{
               
                  return redirect('employer/login')->with('error', 'Invalid User name or password');
               }
    }
    
}
