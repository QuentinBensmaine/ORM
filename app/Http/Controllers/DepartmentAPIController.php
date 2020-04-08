<?php

namespace App\Http\Controllers;

use App\Department;
//use Illuminate\Http\Request;

use App\Http\Requests\dept as Request;

class DepartmentAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Department::paginate(5)->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Department::create($request->toArray());
        $e = Department::find($request->emp_no);
        return $e;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return $department;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $no = $request->dept_no;
        Department::where('dept_no', $no)->update([
          'dept_no' => $request->dept_no,
          'dept_name' => $request->dept_name,
        ]);
    return $department;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $e = $department;
        $department->delete();
        return $e->toJson();
    }
}
