<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
        $message = new Message();
        $message->content = $request->content;
        $message->save();

        return redirect('/messages');
    }

    public function index()
    {
        $messages = Message::all();
        return view('messages.index', ['messages' => $messages]);
    }
}
