<?php

namespace App\Http\Controllers\Jobseeker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Crud;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use Crud;
    //
    public function index(){
        $user =Auth::user();
        $userdata = User::with('profile')->where('id',$user->id)->first();
       // echo"<pre>";print_r($userdata); exit;
        return view('jobseeker.profile',compact('userdata'));
    }
    public function updateprofile(Request $request){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
           // 'company'=>['required', 'string', 'max:255'],
             'cv' => ['mimes:pdf,doc','max:2048'],
            'username'=>['required', 'string', 'max:255']
            ]);
         
            $data =['first_name'=>$request->first_name, 
            'last_name'=>$request->last_name, 
            'email'=>$request->email,
            'username'=>$request->username, 
           
        ];
        $authuser = Auth::user();
       $this->store('users',['id'=>$authuser->id],$data);

       $profile=\App\Profile::where('user_id',$authuser->id)->first();
       if ($request->hasFile('cv')) {
		        
        $image = $request->file('cv');
        $data['cv'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('uploads/resume/');
        $image->move($destinationPath,$data['cv']);
     }
       if(empty($profile)){
           $myprofile = new Profile();
           $myprofile->skills = json_encode($request->skills);
           $myprofile->experience = $request->exp;
           $myprofile->resume = $data['cv'];
           $myprofile->user_id= $authuser->id;
           $myprofile->age = $request->age;
           $myprofile->save();

       }else{
      
        $myprofile = Profile::where('user_id',$authuser->id)->first();
        @unlink(public_path('uploads/resume/').$myprofile->resume);
        $myprofile->skills = json_encode($request->skills);
        $myprofile->experience = $request->exp;
        $myprofile->resume = $data['cv'];
        $myprofile->user_id= $authuser->id;
        $myprofile->age = $request->age;
        $myprofile->save();

       }
      
       return redirect()->back()->with('success','Profile has been updated successfully');
    }
}
