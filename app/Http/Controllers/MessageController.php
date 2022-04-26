<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Groups;
use App\Models\Message;
use App\Models\Sources;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $groups = Groups::all();
        $messages = Message::with('admin', 'source','group');
        if ($request->has('date') and $request->has('src')) {
            $dates = explode(' - ', $request->input('date'));
            $date['start'] = $dates[0];
            $date['end'] = $dates[1];
            if ($request->input('src') !== '0') {
                $source = $sources->find($request->input('src'));
                $messages = $messages->where('src', '=', $request->input('src'));
                $source = $source->name;
            } else {
                $source = 'Все источники';
            }
        } else {
            $date['start'] = Carbon::now()->toDateString().' 00:00:00';
            $date['end'] = Carbon::now()->toDateString().' 23:59:59';
            $source = 'Все источники';
        }
        // $inQueue = Message::where('state', '=', 'В очереди')->count();

        $messages = $messages->whereBetween('created_at', [$date['start'], $date['end']])->get();
        $inQueue = $messages->where('state', '=', 'В очереди')->count();
        $header = $source.' '.' c '.$date['start'].' по '.$date['end'];

        return view('messages', ['messages' => $messages, 'sources' => $sources, 'groups' => $groups, 'header' => $header, 'inQueue' => $inQueue]);
    }

    public function indexAjax(Request $request)
    {
        if ($request->ajax()) {
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request)
    {
        $subscribers = Subscriber::where('gid', '=', $request->input('gid'))->get();
        $insertData = [];
        foreach ($subscribers as $subscriber) {
            $data['name'] = $subscriber->name;
            $data['phone'] = $subscriber->phone;
            $data['message'] = $request->input('message');
            $data['src'] = $request->input('src');
            $data['gid'] = $request->input('gid');
            $data['aid'] = Auth::user()->id;
            $data['state'] = 'В очереди';
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $insertData[] = $data;
        }
        Message::insert($insertData);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
    }
}
