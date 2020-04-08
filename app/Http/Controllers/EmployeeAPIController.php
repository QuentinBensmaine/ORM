<?php

namespace App\Http\Controllers;

use App\Employee;
// use Illuminate\Http\Request;

use App\Http\Requests\tentative as Request;

class EmployeeAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employee::paginate(5)->toJson();
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Employee::create($request->toArray());
        $e = Employee::find($request->emp_no);
        return $e;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return $employee;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
  
      $no = $request->emp_no;
          Employee::where('emp_no', $no)->update([
            'emp_no' => $request->emp_no,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
            'hire_date' => $request->hire_date,
            'gender' => $request->gender,
          ]);
      return $employee;
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $e = $employee;
        $employee->delete();
        return $e->toJson();
    }
}
