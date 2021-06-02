<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $appends =['allapplicent'];
    public function getAllApplicentAttribute()
    {
        $data = countapplicent($this->id);
        return $data;
    }
}
