<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ResOfEmp extends Controller
{

    public function index()
    {
        $employees = Employee::all();
        $employees->load('departments');

        return view('ListEmp', ['employees' => $employees]);

        /// api return response()->json(['employees' => $employees]);
    }


    public function create()
    {
        //
        $departments = Department::all();
        return view('AddEmp', ['departments' => $departments,
            'emp'=> null,]);
    }

    public function edit($id)
    {
        //
        $employee = Employee::find($id);
        $departments = Department::all();
        return view('UpdEmp', ['emp'=> $employee,
            'departments' => $departments]);
    }

    public function store(Request $request, Employee $employee, $id = null)
    {
        //
        $this->validate($request, $this->rulesForEmployee);
        $depArray = $request->input('list');
        if(isset($id)){
            $employee = Employee::find($id);
            $Updmessage = 'Сотрудник обновлен';
        }
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->gender = $request->input('exampleRadios') ;
        $employee->salary = (int)$request->input('salary');
        $employee->patronymic = $request->input('patronymic');
        $employee->save();
        $employee->departments()->sync($depArray);


        return redirect('emp/')->with('message', $Updmessage ?? 'Сотрудник успешно добавлен');
    }

    public function showDelete(Request $request, $id)
    {

        $empToTodel = Employee::find($id);
        if ($request->isMethod('post')) {
            //
            Employee::destroy($request->id);
            return redirect('emp/')->with('message', 'Сотрудник удален');
        }
        return view('DelEmp', [
            'emp' => $empToTodel
        ]);
    }

}
