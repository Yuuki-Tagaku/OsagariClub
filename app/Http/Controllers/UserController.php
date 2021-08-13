<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\School;

class UserController extends Controller
{

    public function edit(Request $request)
    {
        $user = User::Find('1');
        return view('osagariclub.userEdit', ['user' => $user]);
    }

    public function branch(Request $request)
    {
        if(!empty($_POST['edit'])) {
            //editボタンを押された場合はupdataの処理を実行する
            return $this->updata($request);
        } elseif(!empty($_POST['delete'])) {
            //deleteボタンを押された場合はdestroyの処理を実行する
            return $this->destroy($request);
        }
    }

    public function updata($request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)) {
            //passwordの値が入力されている場合
            if(!password_verify($request->password, $user->password)) {
                //DBに登録されてるハッシュ化される前のパスワードと入力されたパスワードが違う場合
                $user->password = Hash::make($request->password);
                //入力されたパスワードをハッシュ化してDBに登録
            }
        }
        if($request->hasFile('image_path')) {
            //画像ファイルが新しく登録された場合
            if(!empty($user->image_path)) {
                //ユーザーが画像を登録してた場合
                $delete_image = $user->image_path;
                //登録してた画像PATHを変数delete_imageに入れる
                Storage::delete('public/images/user' .$delete_image);
                //ストレージの中にある画像を削除
            }
            $path = $request->file('image_path')->store('public/images/user');
            //画像をストレージの中に保存して画像pathを変数pathに入れる
            $user->image_path = basename($path);
            //テーブルに画像PATHを保存
        }
        $user->appleal = $request->appleal;

        if($user->isDirty()) {
            //userに変更があった場合
            $user->save();
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    public function destroy($request)
    {
        $user = User::find($request->id);
        $delete_image = $user->image_path;
        //テーブルにある画像パスを変数delete_imageに入れる
        Storage::delete('public/images/user' . $delete_image);
        //ストレージにある画像データを削除
        $user->delete();

        return redirect('/');
    }
}
