<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Models\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\Group;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Groups::with('admin')->get();
        return view('groups',['data' => $data]);
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
    public function store(StoreGroupRequest $request)
    {
        $group = new Groups();
        $group->name = $request->input('name');
        $group->desc = $request->input('desc');
        $group->aid = Auth::user()->id;
        $group->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function show(Groups $groups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function edit(Groups $groups,$id)
    {
        $group = $groups::find($id)->with('admin');
        return view('groupsNew');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Groups $groups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groups $groups, $id)
    {
        $group = $groups->find($id);
        $group->delete();
        return redirect()->back();
    }
}
