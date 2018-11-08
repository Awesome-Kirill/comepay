<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $rulesForEmployee= [
        'first_name' => 'required',
        'last_name'=> 'required',
        //'patronymic' => 'required',
        'list' => 'required|exists:departments,id'
    ];

    protected $rulesForDepartment= [
        'name' => 'required|unique:departments'
    ];
}
