<?php

namespace App\Http\Controllers;

use App\Models\Framework;
use Illuminate\Http\Request;
use Datatables;

class FrameworkController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Framework::select('*'))
                ->addColumn('action', 'frameworks.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('frameworks.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frameworks.create');
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
            'frameworkname' => 'required'
        ]);

        $framework = new Framework;
        $framework->frameworkname = $request->frameworkname;
        if($request->status=='on')
        {
            $framework->status = 'Active';
        }
        else{
            $framework->status = 'InActive';
        }
        $framework->save();
        return redirect()->route('frameworks.index')
            ->with('success', 'Framework has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Framework $framework)
    {
        return view('frameworks.show', compact('framework'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Framework $framework)
    {
        return view('frameworks.edit', compact('framework'));
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
            'frameworkname' => 'required'
        ]);

        $framework = Framework::find($id);
        $framework->frameworkname = $request->frameworkname;
        if($request->status=='on')
        {
            $framework->status = 'Active';
        }
        else{
            $framework->status = 'InActive';
        }
        $framework->save();
        return redirect()->route('frameworks.index')
            ->with('success', 'Framework Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Framework::where('id', $request->id)->delete();
        return Response()->json($com);
    }
}
