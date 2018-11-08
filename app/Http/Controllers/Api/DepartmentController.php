<?php

namespace App\Http\Controllers\Api;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class DepartmentController extends Controller
{

    public function index()
    {
        $departmentsWhithCount = Department::departmentWhithCountMax();
        return response()->json(['data' => $departmentsWhithCount], 200);
    }


    public function create(Request $request, Department $department)
    {


        $validator = Validator::make($request->all(), $this->rulesForDepartment);

        if ($validator->fails()) {

            return response()->json(['erorrs'=> $validator->errors()], 400);
        }
        $department->name = $request->name;
        $department->save();

        return response()->json(['id'=> $department], 200);

    }


    public function store(Request $request)
    {
        $allDep = Department::all();
        // Жадно загрузить
        //$allDep->load('employee');
        return response()->json(compact('allDep'), 200);
    }




    public function edit(Request $request,Department $department, $id)
    {

        if(!Department::find($id)){
            return response()->json(['erorrs'=> 'Department not found'], 400);
        } else{
            $department = Department::find($id);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:departments'
        ]);

        if ($validator->fails()) {
            return response()->json(['erorrs'=> $validator->errors()], 400);
        }
        $department->name = $request->name;
        $department->save();

        return response()->json(['data'=>'Department update','id'=> $department], 200);

    }



    public function destroy(Request $request, $id)
    {
        if(!Department::find($id)){
            return response()->json(['erorrs' => 'Department not find'], 400);
        }

        if(count(Department::find($id)->employee)){
            return response()->json(['erorrs' => 'This Department have employee, delete not available '], 400);
        }
        Department::destroy($id);
        return  response()->json(['data' => 'Department successful delete'], 200);


    }
}
