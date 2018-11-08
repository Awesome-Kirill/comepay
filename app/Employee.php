<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;
class Employee extends Model
{
    //
    public function departments()
    {
        return $this->belongsToMany('App\Department', 'departments_employees');
    }
}
