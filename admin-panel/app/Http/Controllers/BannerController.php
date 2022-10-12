<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Datatables;

class BannerController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Banner::select('*'))
                ->addColumn('action', 'banners.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('banners.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banners.create');
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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'description' => 'required'
        ]);

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/'), $file_name);

        $banner = new Banner;
        $banner->title = $request->title;
        $banner->image = $file_name;
        $banner->description = $request->description;
            if($request->status=='on')
            {
                $banner->status = 'Active';
            }
            else{
                $banner->status = 'InActive';
            }
        $banner->save();
        return redirect()->route('banners.index')
            ->with('success', 'Banner has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view('banners.show', compact('banner'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('banners.edit', compact('banner'));
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
            'description' => 'required'
        ]);

        $image = $request->hidden_image;

        if($request->image != '')
        {
            $image = time() . '.' . request()->image->getClientOriginalExtension();

            request()->image->move(public_path('images/'), $image);
        }

        $banner = Banner::find($id);
        $banner->title = $request->title;
        $banner->image = $image;
        $banner->description = $request->description;
        if($request->status=='on')
            {
                $banner->status = 'Active';
            }
            else{
                $banner->status = 'InActive';
            }
        $banner->save();
        return redirect()->route('banners.index')
            ->with('success', 'Banner Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Banner::where('id', $request->id)->delete();
        return Response()->json($com);
    }
}
