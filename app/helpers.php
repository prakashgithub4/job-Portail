<?php
if (!function_exists('greeting')) {
    function greeting($name)
    {
        return 'Welcome ' . $name;
    }
}
if (!function_exists('countapplicent')) {
    function countapplicent($id)
    {
       $count =\App\Apply::where('job_id',$id)->count();
       return $count;
    }
}
?>