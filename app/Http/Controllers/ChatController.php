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
    }

    public function chatroom(Request $request)
    {
        $supply_user_id = $request->input('match');
        $search_supply = Supply_user::Find($supply_user_id);
        $supply_user = Supply_user::all();
        $supply = Supply::all();
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
        ];
        return view('osagariclub.chat', $param);
    }

    public function matcing(Request $request)
    {
        $req_contract = $request->contract;
        $req_supply_user_id = $request->supply_user_id;

        $supply_user = Supply_user::Find($req_supply_user_id);
        $supply_user->contract = $supply_user['contract'] + $req_contract;
        $supply_user->save();

        return view('osagariclub.matchiApplying',['supply_user' => $supply_user]);
    }

    public function home(Request $request)
    {
        $supply_user_id = $request->input('match');
        return view('osagariclub.matchiConfirm', ['supply_user_id' => $supply_user_id]);
    }

    public function edit(Request $request)
    {
        $supply_id = $request->input('supply');
        $supply = Supply::all();
        foreach($supply as $k => $val) {
            if($val->id == $supply_id) {
                $school_id = $val->user->school_id;
            }
        }
        $supply_user = Supply_user::where('supply_id', $supply_id)->get();
        $search_supply = Supply::Find($supply_id);
        $categories = Category::where('school_id',$school_id)->get();
        $param = [
            'supply' => $supply,
            'search_supply' => $search_supply,
            'supply_user' => $supply_user,
            'categories' => $categories,
        ];

        return view('osagariclub.supplyEdit', $param);
    }

    public function branch(Request $request)
    {
        if(!empty($_POST['edit'])) {
            return $this->updata($request);
        } else {
            return $this->destroy($request);
        }
    }

    public function updata($request)
    {
        $supply = Supply::find($request->id);
        $supply->item = $request->item;
        $supply->size = $request->size;
        $supply->category_id = $request->category_id;
        $supply->condition = $request->condition;
        $supply->years_used = $request->years_used;
        $supply->gender = $request->gender;
        $supply->remarks = $request->remarks;

        if($request->hasFile('image_path1')) {
            //画像ファイルが新しく登録された場合
            if(!empty($supply->image_path1)) {
                //ユーザーが画像を登録してた場合
                $delete_image = $supply->image_path1;
                //登録してた画像PATHを変数delete_imageに入れる
                Storage::delete('public/images/supply' .$delete_image);
                //ストレージの中にある画像を削除
            }
            $path = $request->file('image_path1')->store('public/images/supply');
            //画像をストレージの中に保存して画像pathを変数pathに入れる
            $supply->image_path1 = basename($path);
            //テーブルに画像PATHを保存
        }

        if($request->hasFile('image_path2')) {
            //画像ファイルが新しく登録された場合
            if(!empty($supply->image_path2)) {
                //ユーザーが画像を登録してた場合
                $delete_image = $supply->image_path2;
                //登録してた画像PATHを変数delete_imageに入れる
                Storage::delete('public/images/supply' .$delete_image);
                //ストレージの中にある画像を削除
            }
            $path = $request->file('image_path2')->store('public/images/supply');
            //画像をストレージの中に保存して画像pathを変数pathに入れる
            $supply->image_path2 = basename($path);
            //テーブルに画像PATHを保存
        }

        if($request->hasFile('image_path3')) {
            //画像ファイルが新しく登録された場合
            if(!empty($supply->image_path3)) {
                //ユーザーが画像を登録してた場合
                $delete_image = $supply->image_path3;
                //登録してた画像PATHを変数delete_imageに入れる
                Storage::delete('public/images/supply' .$delete_image);
                //ストレージの中にある画像を削除
            }
            $path = $request->file('image_path3')->store('public/images/supply');
            //画像をストレージの中に保存して画像pathを変数pathに入れる
            $supply->image_path3 = basename($path);
            //テーブルに画像PATHを保存
        }

        if($request->hasFile('image_path4')) {
            //画像ファイルが新しく登録された場合
            if(!empty($supply->image_path4)) {
                //ユーザーが画像を登録してた場合
                $delete_image = $supply->image_path4;
                //登録してた画像PATHを変数delete_imageに入れる
                Storage::delete('public/images/supply' .$delete_image);
                //ストレージの中にある画像を削除
            }
            $path = $request->file('image_path4')->store('public/images/supply');
            //画像をストレージの中に保存して画像pathを変数pathに入れる
            $supply->image_path4 = basename($path);
            //テーブルに画像PATHを保存
        }

        if($supply->isDirty()) {
            //userに変更があった場合
            $supply->save();
            return redirect('');
        } else {
            return redirect('');
        }
    }
}
