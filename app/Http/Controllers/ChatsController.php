<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FMessage;

use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

use Pusher\Pusher;

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
        $result = [
            'sender' => "Ray",
            'msg' => "Hi"
        ];
        event(new MessageSent($result));
        return "Event has been sent!";
    }

    public function AuthChat(Request $request)
    {
        if (Auth::check()) {
            // return Auth::check();
            return "check";
        }
        return "check fasle";
    }
}
