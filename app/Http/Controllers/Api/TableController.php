<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\Department;
class TableController extends Controller
{
    //
    public function index()
    {
        $employees = Employee::all();

        return response()->json($employees, 200);

    }
}
