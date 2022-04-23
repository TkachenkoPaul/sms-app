<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSourceRequest;
use App\Models\Sources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sources = Sources::all();
        return view('sources',['sources' => $sources]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSourceRequest $request)
    {
        $source = new Sources();
        $source->name = $request->input('name');
        $source->login = $request->input('login');
        $source->password = $request->input('password');
        $source->desc = $request->input('desc');
        $source->aid = Auth::user()->id;
        $source->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sources  $sources
     * @return \Illuminate\Http\Response
     */
    public function show(Sources $sources)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sources  $sources
     * @return \Illuminate\Http\Response
     */
    public function edit(Sources $sources, $id)
    {
        $source = $sources->find($id);
        return view('source',['source' => $source]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sources  $sources
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSourceRequest $request, Sources $sources,$id)
    {
        $source = $sources->find($id);
        $source->name = $request->input('name');
        $source->login = $request->input('login');
        $source->password = $request->input('password');
        $source->desc = $request->input('desc');
        $source->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sources  $sources
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sources $sources)
    {
        //
    }
}
