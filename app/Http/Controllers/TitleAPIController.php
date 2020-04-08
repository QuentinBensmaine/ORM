<?php

namespace App\Http\Controllers;

use App\Title;
use App\Employee;
// use Illuminate\Http\Request;

use App\Http\Requests\title as Request;

class TitleAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function index(Employee $employee)
    {
        return $employee->titles;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employee $employee)
    {
        $title = $employee->titles->where('to_date', '>', now())->first();
        $title->update(['to_date'=> date_format(now(), 'Y-m-d')]);
        
        $new_title = new Title();
        $new_title->emp_no = $employee->emp_no;
        $new_title->title = $request->title;
        $new_title->from_date = date_format(now(), 'Y-m-d');
        $new_title->to_date = date_format('9999-01-01', 'Y-m-d');
        $new_title->save();
    }

    /**
     * Display the specified resource.
     * @param  \App\Employee  $employee
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function show( Employee  $employee, $title)
    {
        return $employee->titles()->orderBy('to_date', 'desc')->skip($title - 1)->take(1)->get();
    }

    /**
     * @param Employee $employee
     * @return Title
     */
    public function current (Employee $employee)
    {
        return $employee->titles()->orderBy('to_date','desc')->first();
    }

}
