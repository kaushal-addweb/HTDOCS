<?php

namespace App\Http\Controllers;

use App\Models\Framework;
use App\Models\Portfolio;
use App\Models\Technology;
use Illuminate\Http\Request;
use Datatables;

class PortfolioController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Portfolio::select('*'))
                ->addColumn('action', 'portfolios.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('portfolios.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Technology::all();
        $frames = Framework::all();
        return view('portfolios.create',compact(['users','frames']));
        //return view('portfolios.create');
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
            'technology' => 'required',
            'framework' => 'required',
            'project_name' => 'required',
            'project_duration' => 'required',
            'team_size' => 'required',
            'description' => 'required',
            'links' => 'required'
        ]);

        $portfolio = new Portfolio;
        $portfolio->technology = $request->technology;
        $portfolio->framework = $request->framework;
        $portfolio->project_name = $request->project_name;
        $portfolio->project_duration = $request->project_duration;
        $portfolio->team_size = $request->team_size;
        $portfolio->description = $request->description;
        $portfolio->links = $request->links;
        if($request->status=='on')
        {
            $portfolio->status = 'Active';
        }
        else{
            $portfolio->status = 'InActive';
        }
        $portfolio->save();
        return redirect()->route('portfolios.index')
            ->with('success', 'Portfolio has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        return view('portfolios.show', compact('portfolio'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        $edittech = Technology::all();
        $frames1 = Framework::all();
        return view('portfolios.edit', compact(['edittech','frames1','portfolio']));
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
            'technology' => 'required',
            'framework' => 'required',
            'project_name' => 'required',
            'project_duration' => 'required',
            'team_size' => 'required',
            'description' => 'required',
            'links' => 'required'
        ]);

        $portfolio = Portfolio::find($id);
        $portfolio->technology = $request->technology;
        $portfolio->framework = $request->framework;
        $portfolio->project_name = $request->project_name;
        $portfolio->project_duration = $request->project_duration;
        $portfolio->team_size = $request->team_size;
        $portfolio->description = $request->description;
        $portfolio->links = $request->links;
        if($request->status=='on')
        {
            $portfolio->status = 'Active';
        }
        else{
            $portfolio->status = 'InActive';
        }
        $portfolio->save();
        return redirect()->route('portfolios.index')
            ->with('success', 'Portfolio Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Portfolio::where('id', $request->id)->delete();
        return Response()->json($com);
    }
}
