<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
use Illuminate\Support\Facades\DB;


class Department extends Model
{
    //

    public function maxSalary()
    {
        return $this->employee->max('salary');
    }
    public function employee()
    {
        return $this->belongsToMany('App\Employee', 'departments_employees');
    }

    public static function departmentWhithCountMax()
    {
        return DB::table('departments')
            ->select('departments.id', 'departments.name', DB::raw('MAX(employees.salary) as max_sallary'), DB::raw('COUNT(employee_id) as count'))
            ->leftJoin('departments_employees', 'departments.id', '=' , 'departments_employees.department_id')
            ->leftJoin('employees', 'departments_employees.employee_id', '=', 'employees.id')
            ->groupBy('departments.name')

            ->get();
    }
}
