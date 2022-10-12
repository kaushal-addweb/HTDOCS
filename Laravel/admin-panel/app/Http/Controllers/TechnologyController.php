<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use App\Models\Framework;
use Illuminate\Http\Request;
use Datatables;

class TechnologyController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Technology::select('*'))
                ->addColumn('action', 'technologies.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('technologies.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('technologies.create');
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
            'technologyname' => 'required'
        ]);

        $technology = new Technology;
        $technology->technologyname = $request->technologyname;
        if($request->status=='on')
        {
            $technology->status = 'Active';
        }
        else{
            $technology->status = 'InActive';
        }
        $technology->save();
        return redirect()->route('technologies.index')
            ->with('success', 'Technology has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        return view('technologies.show', compact('technology'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        return view('technologies.edit', compact('technology'));
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
            'technologyname' => 'required'
        ]);

        $technology = Technology::find($id);
        $technology->technologyname = $request->technologyname;
        if($request->status=='on')
        {
            $technology->status = 'Active';
        }
        else{
            $technology->status = 'InActive';
        }
        $technology->save();
        return redirect()->route('technologies.index')
            ->with('success', 'Technology Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Technology::where('id', $request->id)->delete();
        return Response()->json($com);
    }
}
