<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('jobseeker/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(["prefix"=>"employer",'namespace'=>'Employeer'],function(){
    Route::get('/dashbord','AuthController@index')->name('employeer')->middleware('employer');
    Route::get('/registration','AuthController@register');
    Route::post('/saveemployeer','AuthController@saveemployeer');
    Route::get('/vaerfyuser/{id}','AuthController@varifyuser');
    Route::get('/login',function(){
        return view('employer.login');
    });
    Route::post('/employeer','AuthController@loginemployer')->name('employer.login');
    Route::get('/logout','AuthController@logout')->middleware('employer');

  
   
});

Route::group(['prefix'=>'employers','namespace'=>'Employeer','middleware'=>'employer'],function(){
Route::get('/profile','ProfileController@index')->name('employer.profile.info');
  /* profile */
Route::post('profile/update','ProfileController@updateprofile')->name('employer.profile');
Route::get('/jobs','JobController@index')->name('jobs');
Route::get('create-job','JobController@createjob')->name('employer.job.create');
Route::post('save-job','JobController@save')->name('employer.job.save');
Route::get('edit-job/{id?}','JobController@createjob')->name('employer.job.edit');
Route::post('search-job/','JobController@index')->name('search');
Route::get('candidate/','JobController@searchcandidate')->name('candidate');
Route::post('candidate-search','JobController@candidatesearch')->name('filter.candidate');
});

/*Job Seeker */
Route::group(['prefix'=>'jobseeker','namespace'=>'Jobseeker'],function(){
    //Route::get('/dashbord','AuthController@index')->name('jobseeker.dashbord');
  
    // Route::get('/dashbord','JobController@applied')->name('jobseeker.dashbord');
    Route::get('/dashbord','JobController@index')->middleware('jobseeker')->name('jobseeker.dashbord');

    Route::get('register','AuthController@register');
    Route::post('/saveuser','AuthController@saveuser')->name('create.job.seeker');
    Route::get('/login',function(){
        return view('jobseeker.login');
    });


    Route::get('/profile','ProfileController@index')->middleware('jobseeker')->name('jobseeker.profile.info');
    Route::post('/login','AuthController@loginjobseeker')->name('job.seeker.login');
    Route::post('profile/update','ProfileController@updateprofile')->middleware('jobseeker')->name('jobseeker.profile');
    Route::get('/logout','AuthController@logout')->middleware('jobseeker');
    Route::get('/jobs','JobController@index')->middleware('jobseeker')->name('jobseeker.jobs');
    Route::get('/apply/{id}','JobController@applyforjob')->middleware('jobseeker')->name('jobseeker.apply');
    Route::post('/submit/application','JobController@applyjob')->middleware('jobseeker')->name('jobseeker.application');

    Route::get('/my_applied_job','JobController@applied')->middleware('jobseeker')->name('jobseeker.myjobs');
    
});
