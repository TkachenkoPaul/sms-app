<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Imports\SubscribersImport;
use App\Models\Groups;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Groups $groups)
    {
        $group = $groups->find($id);
        $subscribers = Subscriber::where('gid', '=', $id)->with('admin', 'group')->get();

        return view('subscribers', ['subscribers' => $subscribers, 'group' => $group]);
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriberRequest $request)
    {
        $subscriber = new Subscriber();
        $subscriber->name = $request->input('name');
        $subscriber->phone = $request->input('phone');
        $subscriber->desc = $request->input('desc');
        $subscriber->aid = Auth::user()->id;
        $subscriber->gid = $request->input('gid');
        $subscriber->save();

        return redirect()->back();
    }

    /**
     * import new subscribers from excel file.
     *
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $array = (new SubscribersImport())->toArray($request->file('file'));
        $array = array_slice($array[0], 5);
        $insertData = [];
        foreach ($array as $arr) {
            $data['name'] = $arr[1];
            $data['phone'] = intval($arr[2]);
            $data['desc'] = 'excel import';
            $data['aid'] = Auth::user()->id;
            $data['gid'] = $request->input('gid');
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $insertData[] = $data;
        }
        Subscriber::insert($insertData);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $subscriber, $id)
    {
        $subscriber = $subscriber->find($id);
        $groups = Groups::all();

        return view('subscriber', ['subscriber' => $subscriber, 'groups' => $groups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubscriberRequest $request, Subscriber $subscriber, $id)
    {
        $subscriber = $subscriber->find($id);
        $subscriber->name = $request->input('name');
        $subscriber->phone = $request->input('phone');
        $subscriber->desc = $request->input('desc');
        $subscriber->gid = $request->input('gid');
        $subscriber->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber, $id)
    {
        $item = $subscriber->find($id);
        $item->delete();

        return redirect()->back();
    }
}
