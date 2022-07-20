<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(Request $request) {
        return Message::with('author')->paginate(20);
    } 

    public function show(Request $request, $id) {
        return Message::with('author')->find($id);
    }

    public function store(Request $request) {
        $message = Message::create([
            'messages' => $request->message,
            'user_id' => Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
        ]); 
        return $message;
    }

    public function destroy(Request $request, $id) {

        $message = Message::find($id);

        if($message->user_id == Auth::user()->id) {
            Message::destroy($id);

            return "Message deleteed"; 
        } 
        return "Go away";

    }

}
