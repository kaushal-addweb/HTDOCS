<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Datatables;


class ContactController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Contact::select('*'))
                ->addColumn('action', 'contacts.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('contacts.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
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
            'email' => 'required|email',
            'contactinfo' => 'required',
            'description' => 'required'
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->contactinfo = $request->contactinfo;
        $contact->description = $request->description;
        $contact->save();
        return redirect()->route('contacts.index')
            ->with('success', 'Contact has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
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
            'email' => 'required|email',
            'contactinfo' => 'required',
            'description' => 'required'
        ]);

        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->contactinfo = $request->contactinfo;
        $contact->description = $request->description;
        $contact->save();
        return redirect()->route('contacts.index')
            ->with('success', 'Contact Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Contact::where('id', $request->id)->delete();
        return Response()->json($com);
    }
}
