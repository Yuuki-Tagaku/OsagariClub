<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Supply_user;
use App\Chat;
use App\User;
use App\Supply;
use App\Category;

class ChatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $supply = Supply::paginate(10);
        $categories = Category::where('school_id', $user['school_id'])->get();
        $chats = Chat::orderBy('created_at', 'desc')->get();
        $param = [
            "user" => $user,
            "supply" => $supply,
            "categories" => $categories,
            "chats" => $chats,
        ];

        return view('osagariclub.chatIndex', $param);
    }

    public function chatroom(Request $request)
    {

        $user = Auth::user();
        $supply_user_id = $request->input('match');
        $search_supply = Supply_user::Find($supply_user_id);
        $supply_user = Supply_user::all();
        $supply = Supply::all();
        $search_user = User::all();
        $search = Supply::Find($search_supply['supply_id']);
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
        $dayweek =  $today. '('.$week[$toweek].')';
        $yesterday = date('Y年m月d日',strtotime('-1 day'));
        $yesterdayweek = date('w',strtotime('-1 day'));
        $yesterdayweeks =  $yesterday. '('.$week[$yesterdayweek].')';



        $param = [
            'supply_user_id' => $supply_user_id,
            'supply_user' => $supply_user,
            'search_supply' => $search_supply,
            'supply' => $supply,
            'dayweek' => $dayweek,
            'yesterdayweeks' => $yesterdayweeks,
            'user' => $user,
            'search_user' => $search_user,
            'search' => $search,
        ];
        return view('osagariclub.chat', $param);
    }

    public function matcing(Request $request)
    {
        $req_supply_user_id = $request->supply_user_id;

        $supply_user = Supply_user::Find($req_supply_user_id);
        $supply_user->contract = $request->contract;
        $supply_user->save();

        return view('osagariclub.matchiApplying',['supply_user' => $supply_user]);
    }

    public function home(Request $request)
    {
        $user = Auth::user();
        $supply_user_id = $request->input('match');
        $supply_user = Supply_user::Find($supply_user_id);
        $param = [
            'supply_user_id' => $supply_user_id,
            'user' => $user,
            'supply_user' => $supply_user,
        ];
        return view('osagariclub.matchiConfirm', $param);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $supply_user = new Supply_user;
        $supply_user->user_id = $user['id'];
        $supply_user->supply_id = $request->input('supply');
        $supply_user->contract = '1';
        $supply_user->save();

        return redirect(route('chat.room',['match' => $supply_user->id]));
    }
}