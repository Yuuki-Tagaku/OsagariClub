<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\ChatCreated;
use App\Supply_user;
use App\Chat;

class ChatController extends Controller
{
    public function index() {
        $chats = Chat::orderBy('id', 'desc')->get();
        return $chats;
    }

    public function create(Request $request) {
        $chats = new Chat();
        $chats->supply_user_id = $request->id;
        $chats->chat = $request->chat;
        $chats->user_id = $request->user_id;
        $chats->save();
        event(new ChatCreated($chats));
    }
}
