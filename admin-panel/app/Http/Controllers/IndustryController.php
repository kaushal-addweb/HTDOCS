<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;
use Datatables;

class IndustryController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Industry::select('*'))
                ->addColumn('action', 'industries.action')
                ->rawColumns(['action','status'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('industries.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('industries.create');
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
            'industryname' => 'required'
        ]);

        $industry = new Industry;
        $industry->industryname = $request->industryname;
        if($request->status=='on')
        {
            $industry->status = 'Active';
        }
        else{
            $industry->status = 'InActive';
        }
        $industry->save();
        return redirect()->route('industries.index')
            ->with('success', 'Industry has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Industry $industry)
    {
        return view('industries.show', compact('industry'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Industry $industry)
    {
        return view('industries.edit', compact('industry'));
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
            'industryname' => 'required'
        ]);

        $industry = Industry::find($id);
        $industry->industryname = $request->industryname;
        if($request->status=='on')
        {
            $industry->status = 'Active';
        }
        else{
            $industry->status = 'InActive';
        }
        $industry->save();
        return redirect()->route('industries.index')
            ->with('success', 'Industry Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Industry::where('id', $request->id)->delete();
        return Response()->json($com);
    }
}
