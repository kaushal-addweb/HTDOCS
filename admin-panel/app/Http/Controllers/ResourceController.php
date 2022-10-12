<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Resource;
use App\Models\Technology;
use App\Models\Framework;
use App\Models\Industry;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Http\Request;
use Datatables;

class ResourceController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Resource::select('*'))
                ->addColumn('action', 'resources.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('resources.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $indus = Industry::all();
        $techno = Technology::all();
        $frames = Framework::all();
        $depart = Department::all();
        $rol = Role::all();
        $tem = Team::all();
        return view('resources.create',compact(['indus','techno','frames','depart','rol','tem']));
        //return view('resources.create');
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
            'name' => 'required',
            'industries' => 'required',
            'technologies' => 'required',
            'frameworks' => 'required',
            'department' => 'required',
            'role' => 'required',
            'team' => 'required',
            'dateofjoin' => 'required',
            'dateofbirth' => 'required',
            'personalinfo' => 'required',
            'documents' => 'required',
            'description' => 'required'
        ]);

        $file_name = time() . '.' . request()->documents->getClientOriginalExtension();
        request()->documents->move(public_path('documents/'), $file_name);

        $resource = new Resource;
        $resource->name = $request->name;
        $resource->industries = $request->industries;
        $resource->technologies = $request->technologies;
        $resource->frameworks = $request->frameworks;
        $resource->department = $request->department;
        $resource->role = $request->role;
        $resource->team = $request->team;
        $resource->dateofjoin = $request->dateofjoin;
        $resource->dateofbirth = $request->dateofbirth;
        $resource->personalinfo = $request->personalinfo;
        $resource->documents = $file_name;
        $resource->description = $request->description;

        if($request->status=='on')
        {
            $resource->status = 'Active';
        }
        else{
            $resource->status = 'InActive';
        }
        $resource->save();
        return redirect()->route('resources.index')
            ->with('success', 'Resource has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        return view('resources.show', compact('resource'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        $indus = Industry::all();
        $techno = Technology::all();
        $frames = Framework::all();
        $depart = Department::all();
        $rol = Role::all();
        $tem = Team::all();
        return view('resources.edit', compact(['resource','indus','techno','frames','depart','rol','tem']));
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
            'name' => 'required',
            'industries' => 'required',
            'technologies' => 'required',
            'frameworks' => 'required',
            'department' => 'required',
            'role' => 'required',
            'team' => 'required',
            'dateofjoin' => 'required',
            'dateofbirth' => 'required',
            'personalinfo' => 'required',
            'documents' => 'required',
            'description' => 'required'
        ]);

        $documents = $request->hidden_documents;
        if($request->documents != '')
        {
            $documents = time() . '.' . request()->documents->getClientOriginalExtension();

            request()->documents->move(public_path('documents/'), $documents);
        }

        $resource = Resource::find($id);
        $resource->name = $request->name;
        $resource->industries = $request->industries;
        $resource->technologies = $request->technologies;
        $resource->frameworks = $request->frameworks;
        $resource->department = $request->department;
        $resource->role = $request->role;
        $resource->team = $request->team;
        $resource->dateofjoin = $request->dateofjoin;
        $resource->dateofbirth = $request->dateofbirth;
        $resource->personalinfo = $request->personalinfo;
        $resource->documents = $documents;
        $resource->description = $request->description;
        if($request->status=='on')
        {
            $resource->status = 'Active';
        }
        else{
            $resource->status = 'InActive';
        }
        $resource->save();
        return redirect()->route('resources.index')
            ->with('success', 'Resource Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Resource::where('id', $request->id)->delete();
        return Response()->json($com);
    }
}
