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


    public function test()
    {
        $login = 'login';
        $password = 'password';
        $from = 'sms';
        $filename = "/home/tkachenko/www/sms-app/public/test.txt";
        $file = fopen($filename,'a');
        $messages = Message::where('state','=','В очереди')->limit(20)->get();
            foreach ($messages as $message) {
                $apiURL = 'https://smsc.lugacom.com:8444/smsc?login='.$login.'&password='.$password.'&to=38'.$message->phone.'&content='.$message->message.'&from='.$from;
                fwrite($file,Carbon::now()->format('Y-m-d H:i:s').' - '.$apiURL."\n");
                // $cURLConnection = curl_init();
                // curl_setopt($cURLConnection, CURLOPT_URL, $apiURL);
                // curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
                // curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYPEER, 0);
                // $apiResponse = json_decode(curl_exec($cURLConnection),1);
                // curl_close($cURLConnection);
                // $smsResponse = Sms::where('id','=',$sms->id)->update(['message_state' => $apiResponse['status'],'message_id' => $apiResponse['id_message'],'message_date' => Carbon::now()->format('Y-m-d H:i:s')]);
            }
        fclose($file);
        dump('log test');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sources = Sources::all();
        $groups = Groups::all();
        $messages = Message::with('admin', 'source', 'group');
        $sources = Sources::all();
        $info = array();
        foreach ($sources as $source) {
            $apiURL = 'https://smsc.lugacom.com:8444/balance?login='.$source->login.'&password='.$source->password;
            $cURLConnection = curl_init();
            curl_setopt($cURLConnection, CURLOPT_URL, $apiURL);
            curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYPEER, 0);
            $apiResponse = json_decode(curl_exec($cURLConnection),1);
            curl_close($cURLConnection);
            $data['name'] = $source->name;
            $data['count'] = $apiResponse['sms_count'];
            $info[] = $data;
        }
        dump($info);
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

        return view('messages', ['messages' => $messages, 'sources' => $sources,
        'groups' => $groups, 'header' => $header, 'inQueue' => $inQueue,'info'=> $info]);
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
