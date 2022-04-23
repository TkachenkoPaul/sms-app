<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Sources;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sources = Sources::all();
        $messages = Message::with('admin','source');
        if ($request->has('date') and $request->has('src')) {
            $dates = explode(' - ',$request->input('date'));
            $date['start'] = $dates[0];
            $date['end'] = $dates[1];
            if ($request->input('src') !== '0') {
                $source = $sources->find($request->input('src'));
                $messages = $messages->where('src','=',$request->input('src'));
                $source = $source->name;
            } else {
                $source = 'Все источники';
            }
        } else {
            $date['start'] = Carbon::now()->startOfMonth()->toDateString();
            $date['end'] = Carbon::now()->endOfMonth()->toDateString();
            $source = 'Все источники';
        }

        $messages = $messages->whereBetween('created_at',[$date['start'],$date['end']])->get();
        $header = $source.' '.' c '.$date['start'].' по '.$date['end'];
        // test
        return view('messages',['messages' => $messages,'sources' => $sources,'header' =>$header]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
