<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Datatables;

class RoleController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Role::select('*'))
                ->addColumn('action', 'roles.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('roles.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
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
            'rolename' => 'required',
            'description' => 'required'
        ]);

        $role = new Role();
        $role->rolename = $request->rolename;
        $role->description = $request->description;
        if($request->status=='on')
        {
            $role->status = 'Active';
        }
        else{
            $role->status = 'InActive';
        }
        $role->save();
        return redirect()->route('roles.index')
            ->with('success', 'Role has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
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
            'rolename' => 'required',
            'description' => 'required'
        ]);

        $role = Role::find($id);
        $role->rolename = $request->rolename;
        $role->description = $request->description;
        if($request->status=='on')
        {
            $role->status = 'Active';
        }
        else{
            $role->status = 'InActive';
        }
        $role->save();
        return redirect()->route('roles.index')
            ->with('success', 'Role Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Role::where('id', $request->id)->delete();
        return Response()->json($com);
    }
}
