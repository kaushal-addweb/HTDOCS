<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Datatables;

class PageController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Page::select('*'))
                ->addColumn('action', 'pages.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('pages.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
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
            'title' => 'required',
            'body' => 'required',
            'slug' => 'required'
        ]);

        $page = new Page();
        $page->title = $request->title;
        $page->body = $request->body;
        $page->slug = $request->slug;
        if($request->status=='on')
        {
            $page->status = 'Active';
        }
        else{
            $page->status = 'InActive';
        }
        $page->save();
        return redirect()->route('pages.index')
            ->with('success', 'Page has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('pages.show', compact('page'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('pages.edit', compact('page'));
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
            'title' => 'required',
            'body' => 'required',
            'slug' => 'required'
        ]);

        $page = Page::find($id);
        $page->title = $request->title;
        $page->body = $request->body;
        $page->slug = $request->slug;
        if($request->status=='on')
        {
            $page->status = 'Active';
        }
        else{
            $page->status = 'InActive';
        }
        $page->save();
        return redirect()->route('pages.index')
            ->with('success', 'Page Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Page::where('id', $request->id)->delete();
        return Response()->json($com);
    }
}
