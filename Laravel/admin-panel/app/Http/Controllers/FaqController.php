<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Datatables;

class FaqController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Faq::select('*'))
                ->addColumn('action', 'faqs.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('faqs.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faqs.create');
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
            'question' => 'required',
            'answer' => 'required'
        ]);

        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        if($request->status=='on')
        {
            $faq->status = 'Active';
        }
        else{
            $faq->status = 'InActive';
        }
        $faq->save();
        return redirect()->route('faqs.index')
            ->with('success', 'Faq has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        return view('faqs.show', compact('faq'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('faqs.edit', compact('faq'));
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
            'question' => 'required',
            'answer' => 'required'
        ]);

        $faq = Faq::find($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        if($request->status=='on')
        {
            $faq->status = 'Active';
        }
        else{
            $faq->status = 'InActive';
        }
        $faq->save();
        return redirect()->route('faqs.index')
            ->with('success', 'Faq Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Faq::where('id', $request->id)->delete();
        return Response()->json($com);
    }
}
