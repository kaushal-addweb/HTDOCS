<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Datatables;

class DepartmentController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Department::select('*'))
                ->addColumn('action', 'departments.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('departments.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'departmentname' => 'required',
            'description' => 'required'
        ]);

        $department = new Department();
        $department->departmentname = $request->departmentname;
        $department->description = $request->description;
        if($request->status=='on')
        {
        $department->status = 'Active';
        }
        else{
            $department->status = 'InActive';
        }
        $department->save();
        return redirect()->route('departments.index')
            ->with('success', 'Department has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('departments.show', compact('department'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'departmentname' => 'required',
            'description' => 'required'
        ]);

        $department = Department::find($id);
        $department->departmentname = $request->departmentname;
        $department->description = $request->description;
        if($request->status=='on')
        {
        $department->status = 'Active';
        }
        else{
            $department->status = 'InActive';
        }
        $department->save();
        return redirect()->route('departments.index')
            ->with('success', 'Department Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Department::where('id', $request->id)->delete();
        return Response()->json($com);
    }
}
