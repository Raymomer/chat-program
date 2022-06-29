<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FMessage;

use App\Events\MessageSent;

class ChatsController extends Controller
{
    //

    public function index()
    {
        return view('chat');
    }

    public function fetchMessages()
    {
        return FMessage::with('user')->get();
    }

    public function sendMessage(Request $request)
    {

        $user = $request->input('user_id');
        $message = $request->input('message');

        // broadcast(new MessageSent($user, $message))->toOthers();
    }



    public function Test(Request $requset)
    {
        // broadcast(new MessageSent("Hi"));

        $result = [
            'sender' => "Ray",
            'msg' => "Hi"
        ];
        event(new MessageSent($result));
        return "Event has been sent!";
        // return "ChatsController";
    }
}
