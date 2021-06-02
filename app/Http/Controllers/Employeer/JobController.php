<?php

namespace App\Http\Controllers\Employeer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Crud;
use App\Job;
class JobController extends Controller
{
    use Crud;
    public function index(Request $request){
        if(empty($request->search)){
            $job =Job::where('user_id',\Auth::user()->id)->paginate(9);
            return view('employer.job.index',compact('job'));
        }else{
            $job =Job::query();
            $job= $job->where('title','like',$request->search);
            $job= $job->orWhere('experiance',$request->search);
            $job= $job->orWhere('skills','like','%'.$request->search.'%');
            $job = $job->paginate(9);
            
            return view('employer.job.index',compact('job'));
            
            
        }
       
    }
    public function createjob($id = null){

       if(empty($id)){
        return view('employer.job.create');
       }else{
           $ids=decrypt($id);
           $job =Job::find($ids);
           return view('employer.job.create',compact('job'));
       }
       
    }
    public function save(Request $request){
        $request->validate([
            //'title' => ['required', 'string', 'max:255'],
           // 'description' => ['required', 'string'],
            'skills.*' => ['required', 'string', 'max:255'],
            'experiance'=>['required', 'string'],
            ]);
            $userid=\Auth::user();
            if(empty($request->id)){
                $this->store('jobs',null,[
                    'title'=>$request->title, 
                    'description'=>$request->description, 
                    'skills'=>implode(",",$request->skills), 
                    'user_id'=>$userid->id,
                    'experiance'=>$request->experiance,
                    'created_at'=>date('Y-m-d')
                    ]);
                    return redirect()->route('jobs')->with('success','Job Created Successfully');
            }else{
                $this->store('jobs',['id'=>$request->id],[
                    'title'=>$request->title, 
                    'description'=>$request->description, 
                    'skills'=>@implode(",",$request->skills), 
                    'user_id'=>$userid->id,
                    'experiance'=>$request->experiance,
                    'created_at'=>date('Y-m-d')
                    ]);
                    return redirect()->route('jobs')->with('success','Job Updated Successfully');
            }
           
            
    }
    public function searchcandidate(){

        return view('employer.candidate');
    }
    public function candidatesearch(Request $request){
       $data = $request->all();
     
       $search = \App\User::query()
                         ->select(\DB::raw("CONCAT(users.first_name,' ',users.last_name) AS name"),"jobs.title","profiles.experience","profiles.resume","profiles.age")
                         ->join('profiles','profiles.user_id','=','users.id')
                         ->join('applies','applies.user_id','=','profiles.user_id')
                         ->join('jobs','jobs.id','=','applies.job_id');
                         if(!empty($data['title'])){
                            $search= $search->where('jobs.title',"like","%".$data['title']."%");
                            $search=  $search->get();
                         }else if(!empty($data['exp'])){
                            $search= $search ->where('profiles.experience',$data['exp']);
                            $search=  $search->get();
                         }else if(!empty($data['skill'])){
                            $search=  $search->where('profiles.skills','like',"%".json_encode($data['skill'])."%");
                            $search=  $search->get();
                         }
                        
                         
                        
                         
        if(!empty($search)){
            return response()->json(["data"=>$search]);
        }else{
            return response()->json(["data"=>"No Records found in the table"]);
        }
    
    }
   
}
