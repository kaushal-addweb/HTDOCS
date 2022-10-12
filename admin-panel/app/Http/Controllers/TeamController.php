<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Datatables;

class TeamController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Team::select('*'))
                ->addColumn('action', 'teams.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('teams.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
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
            'teamname' => 'required',
            'description' => 'required'
        ]);

        $team = new Team();
        $team->teamname = $request->teamname;
        $team->description = $request->description;
        if($request->status=='on')
        {
            $team->status = 'Active';
        }
        else{
            $team->status = 'InActive';
        }
        $team->save();
        return redirect()->route('teams.index')
            ->with('success', 'Team has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
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
            'teamname' => 'required',
            'description' => 'required'
        ]);

        $team = Team::find($id);
        $team->teamname = $request->teamname;
        $team->description = $request->description;
        if($request->status=='on')
        {
            $team->status = 'Active';
        }
        else{
            $team->status = 'InActive';
        }
        $team->save();
        return redirect()->route('teams.index')
            ->with('success', 'Team Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Team::where('id', $request->id)->delete();
        return Response()->json($com);
    }
}
