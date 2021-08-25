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
        $chats = Chat::orderBy('id', 'asc')->get();
        return $chats;
    }

    public function create(Request $request) {
        $week = [
            '日', //0
            '月', //1
            '火', //2
            '水', //3
            '木', //4
            '金', //5
            '土', //6
        ];
        $today = date('Y年m月d日');
        $toweek = date('w');

        $chats = new Chat();
        $chats->supply_user_id = $request->id;
        $chats->chat = $request->chat;
        $chats->user_id = $request->user_id;
        $chats->created_day = $today. '('.$week[$toweek].')';
        $chats->created_time = date('H:m');
        $chats->save();
        event(new ChatCreated($chats));
    }
}
