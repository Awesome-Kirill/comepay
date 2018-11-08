<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::all();
        $employees->load('departments');
       // dd($employees);
        return response()->json($employees, 200);

    }


    public function create(Request $request, Employee $employee)
    {

        $validator = Validator::make($request->all(), $this->rulesForEmployee);

        if ($validator->fails()) {

            return response()->json(['erorrs'=> $validator->errors()], 400);
        }

        $depArray = $request->input('list');



        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->gender = $request->input('gender') ;
        $employee->salary = (int)$request->input('salary');
        $employee->patronymic = $request->input('patronymic');
        $employee->save();
        $employee->departments()->sync($depArray);


        return response()->json(['id'=> $employee], 200);
    }




    public function edit(Request $request, $id)
    {

        $employee = Employee::find($id);
        $validator = Validator::make($request->all(), $this->rulesForEmployee);

        if ($validator->fails()) {

            return response()->json(['erorrs'=> $validator->errors()], 400);
        }

        $depArray = $request->input('list');
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->gender = $request->input('gender') ;
        $employee->salary = (int)$request->input('salary');
        $employee->patronymic = $request->input('patronymic');
        $employee->save();
        $employee->departments()->sync($depArray);


        return response()->json(['id'=> $employee], 200);
    }


    public function destroy(Request $request, $id)
    {
        if(!Employee::find($id)){
            return response()->json(['erorrs' => 'Employee not find'], 400);

        }

        Employee::destroy($id);
        return  response()->json(['data' => 'Employee  successful delete'], 200);
    }
}
