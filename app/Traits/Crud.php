<?php 
namespace App\Traits;
use Illuminate\Http\Request;
use DB;


trait Crud{
    public function store($table,$id=[],$data){
        if(!empty($id)){
           $update = DB::table($table)->where($id)->update($data);
           return $update;
          
        }else{
            DB::table($table)->insert($data);
        }
   
    }
}
