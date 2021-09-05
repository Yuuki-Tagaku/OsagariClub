<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function search(Request $request)
    {
        //フォームを機能させるために各情報を取得し、viewに返す
        //viewのnameの部分
        $names = $request->input('name');
        $emails = $request->input('email');

        $query = User::query();
        if ($names != null) {
            $query->orwhere('name', 'like', '%' . $names . '%');
        }
        if ($emails != null) {
            $query->orwhere('email', 'like', '%' . $emails . '%');
        }

        $user = $query->get();

        $param = ["user" => $user];

        return view('osagariclub.userlist', $param);
    }

    public function update(Request $request)
    {
        //フォームを機能させるために各情報を取得し、viewに返す
        //viewのnameの部分
        $names = $request->input('name');
        $emails = $request->input('email');
        $query = User::query();
        if ($names != null) {
            $query->orwhere('name', 'like', '%' . $names . '%');
        }
        if ($emails != null) {
            $query->orwhere('email', 'like', '%' . $emails . '%');
        }
        $user = $query->get();
        $param = ["user" => $user];
        return view('osagariclub.userlistdetail', $param);
    }
}
