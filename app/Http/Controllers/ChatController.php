<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Supply_user;
use App\Chat;
use App\User;
use App\Supply;

class ChatController extends Controller
{
    public function index()
    {
    }

    public function chatroom(Request $request)
    {
        $supply_user_id = $request->input('match');
        $search_supply = Supply_user::Find($supply_user_id);
        $supply_user = Supply_user::all();
        $supply = Supply::all();

        $param = [
            'supply_user' => $supply_user,
            'search_supply' => $search_supply,
            'supply' => $supply,
        ];
        return view('osagariclub.chat', $param);
    }
}
