<?php

namespace App\Http\Controllers\Employeer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Crud;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use Crud;
    //
    public function index(){
        $userdata =Auth::user();
        return view('employer.profile',compact('userdata'));
    }
    public function updateprofile(Request $request){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'company'=>['required', 'string', 'max:255'],
            'username'=>['required', 'string', 'max:255']
            ]);
          //  echo"<pre>";print_r($request->all()); exit;
            $data =['first_name'=>$request->first_name, 
            'last_name'=>$request->last_name, 
            'email'=>$request->email,
            'username'=>$request->username, 
            'company_name'=>$request->company
        ];
        $authuser = Auth::user();
       $this->store('users',['id'=>$authuser->id],$data);
       return redirect()->back()->with('success','Profile has been updated successfully');
    }
}
