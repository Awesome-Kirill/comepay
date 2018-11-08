<?php

namespace App\Http\Controllers;

use App\Department;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ResOfDepartment extends Controller
{

    public function index()
    {
        /// api return response()->json(['allDep' => $allDep]);
        $allDep = Department::all();
        $allDep->load('employee');

        return view('ListOfDepartments',[
            'allDep' => $allDep
        ]);
    }


    public function create()
    {

        return view('AddDepartments');
    }


    public function store(Request $request,Department $department, $id = null)
    {
        $this->validate($request, $this->rulesForDepartment);

        if(isset($id)){
            $department = Department::find($id);
            $Updmessage = 'Департамент обновлен';
        }
        //$department = new Department();
        $department->name = $request->name;
        $department->save();
        return redirect('dep/')->with('message', $Updmessage ?? 'Сотрудник успешно добавлен');

    }


    public function edit($id)
    {
        //
        $department = Department::find($id);

        return view('UpdDep', ['dep'=> $department]);
    }

    public function destroy(Request $request, $id)
    {
        if(count(Department::find($id)->employee)){
            return redirect('dep/')
                ->withErrors('В этом департаменте есть работники')
                ->withInput();
        }

        if ($request->isMethod('post')) {
            Department::destroy($request->id);
            return redirect('dep/')->with('message', 'Департамент успешно удален');
        }
        return view('DelEmp');
    }
}
