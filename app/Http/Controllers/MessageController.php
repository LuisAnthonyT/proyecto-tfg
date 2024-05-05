<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateMessageRequest;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $messages = $user->receivedMessages()->orderBy('created_at', 'desc')->get();
        return view ('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trainer = Auth::user()->trainer;
        $athletes = $trainer->athletes;

        return view ('messages.create', compact('athletes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateMessageRequest $request)
    {
        try {
            $user = Auth::user();

            $message = new Message();
            $message->receiver_id = $request->get('receiver_id');
            $message->sender_id = $user->id;
            $message->subject = $request->get('subject');
            $message->text = $request->get('text');
            $message->save();

            return redirect()->route('messages_sent');

        } catch (\Exception $e){
            Log::error('Error al enviar el mensaje: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error al enviar el mensaje');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        $message = Message::findOrFail($message->id);
        $message->readed = true;
        $message->save();

        return view ('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $user = Auth::user();

        if ($message->sender_id == $user->id ) {
            Message::findOrFail($message->id)->delete();
            return redirect()->route('messages_sent');

        } else {
            Message::findOrFail($message->id)->delete();
            return redirect()->route('messages.index');
        }
    }

    public function showMessagesSent ()
    {
        $user = Auth::user();
        $messages = $user->sentMessages()->orderBy('created_at', 'desc')->get();
        return view ('messages.messages_sent', compact('messages'));
    }
}
