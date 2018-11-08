<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use App\Employee;

class Table extends Controller
{

    public function index()
    {

        $allDepartment = Department::all();
        $allEmployees = Employee::all();
        $allEmployees->load('departments');

        return view('All',[
            'allEmployees' => $allEmployees,
            'allDepartment' => $allDepartment
        ]);

        /// api return response()->json(['allEmployees' => $allEmployees, 'allDepartment' => $allDepartment]);

    }


}
