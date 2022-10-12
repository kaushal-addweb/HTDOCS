<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Page;
use App\Models\Usermanager;
use Datatables;
use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    public function userCount() {
        $userCount = Usermanager::count();
        $contentpage=Page::count();
        $contact=Contact::count();
        return view('layouts.dashboard', compact('userCount','contentpage','contact'));
  }
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Usermanager::select('*'))
                ->addColumn('action', 'usermanagers.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('usermanagers.index');
    }

    public function admin()
    {
        $users=Usermanager::count('*');
        return view('layouts.dashboard',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usermanagers.create');
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:usermanagers',
            'contact' => 'required|unique:usermanagers',
            'profile_pic' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'address' => 'required',
            'password' => 'required',
            'Verification' => 'required'
        ]);
        $file_name = time() . '.' . request()->profile_pic->getClientOriginalExtension();
        request()->profile_pic->move(public_path('images/'), $file_name);

        $usermanager = new Usermanager;
        $usermanager->first_name = $request->first_name;
        $usermanager->last_name = $request->last_name;
        $usermanager->email = $request->email;
        $usermanager->contact = $request->contact;
        $usermanager->profile_pic = $file_name;
        $usermanager->address = $request->address;
        $usermanager->password = $request->password;
        if($request->Status=='on')
        {
            $usermanager->Status = 'Active';
        }
        else{
            $usermanager->Status = 'InActive';
        }
        $usermanager->Verification = $request->Verification;
        $usermanager->save();
        return redirect()->route('usermanagers.index')
            ->with('success', 'User has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Usermanager $usermanager)
    {
        return view('usermanagers.show', compact('usermanager'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Usermanager $usermanager)
    {
        return view('usermanagers.edit', compact('usermanager'));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'password' => 'required',
            'Verification' => 'required'
        ]);

        $profile_pic = $request->hidden_profile_pic;

        if($request->profile_pic != '')
        {
            $profile_pic = time() . '.' . request()->profile_pic->getClientOriginalExtension();

            request()->profile_pic->move(public_path('images/'), $profile_pic);
        }

        $usermanager = Usermanager::find($id);
        $usermanager->first_name = $request->first_name;
        $usermanager->last_name = $request->last_name;
        $usermanager->email = $request->email;
        $usermanager->contact = $request->contact;
        $usermanager->profile_pic = $profile_pic;
        $usermanager->address = $request->address;
        $usermanager->password = $request->password;
        if($request->Status=='on')
        {
            $usermanager->Status = 'Active';
        }
        else{
            $usermanager->Status = 'InActive';
        }
        $usermanager->Verification = $request->Verification;
        $usermanager->save();
        return redirect()->route('usermanagers.index')
            ->with('success', 'User Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Usermanager::where('id', $request->id)->delete();
        return Response()->json($com);
    }
}
