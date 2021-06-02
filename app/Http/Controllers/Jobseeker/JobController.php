<?php

namespace App\Http\Controllers\Jobseeker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Crud;
use App\Job;

class JobController extends Controller
{
    use Crud;
    public function index(Request $request){
            $job =Job::paginate(9);
            

            
            return view('jobseeker.job.index',compact('job'));
    }
    public function applyforjob($id){
        return view('jobseeker.job.create',compact('id'));
    }
    public function applyjob(Request $request){
        $request->validate([
            'heading' => ['required', 'string'],
            'coverletter' => ['required', 'string'],
            ]);
         $userid =\Auth::user();
         $job =\App\Job::find(decrypt($request->id));
            $this->store('applies',null,[
                'job_id'=>decrypt($request->id),
                'employer_id'=>$job->user_id,
                'user_id'=>$userid->id,
                'heading'=>$request->heading,
                'cover_letter'=>$request->coverletter,
                'created_at'=>date('y-m-d h:m:s')
                ]);
         return redirect()->route('jobseeker.jobs')->with('success','Your Successfully apply for this position');


    }
    public function applied(){
        $userid = \Auth::user();
        $applied = \DB::select('Call jobapplied('.$userid->id.')');
        return view('jobseeker.job.myappliedjob',compact('applied'));
    }
   
}
