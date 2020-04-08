<?php

namespace App\Http\Controllers;

use App\Salary;
use App\Employee;
// use Illuminate\Http\Request;

use App\Http\Requests\salary as Request;

class SalaryAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function index(Employee $employee)
    {
        return $employee->salaries;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Employee  $employee
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employee $employee)
    {
        $salary= $employee->salaries->where('to_date', '>', now())->first();
        $salary->update(['to_date'=> date_format(now(), 'Y-m-d')]);
        
        $new_salary= new Salary();
        $new_salary->emp_no = $employee->emp_no;
        $new_salary->salary= $request->salary;
        $new_salary->from_date = date_format(now(), 'Y-m-d');
        $new_salary->to_date = date_format('9999-01-01', 'Y-m-d');
        $new_salary->save();
    }

    /**
     * Display the specified resource.
     * @param  \App\Employee  $employee
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show( Employee  $employee, $salary)
    {
        return $employee->salaries()->orderBy('to_date', 'desc')->skip($salary- 1)->take(1)->get();
    }

    /**
     * @param Employee $employee
     * @return Salary
     */
    public function current (Employee $employee)
    {
        return $employee->salaries()->orderBy('to_date','desc')->first();
    }

}
