<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\School;

class UserController extends Controller
{
    public function index()
    {
        return view('osagariclub.index');
    }

    public function edit(Request $request)
    {
        $request->session()->put('session', 'user_edit');
        $user = Auth::user();

        return view('osagariclub.userEdit', ['user' => $user]);
    }

    public function branch(Request $request)
    {
        $value = $request->session()->get('session');
         // セッションに情報が入っていればページを表示、入っていなければ戻る
        if(isset($value) && $value == "user_edit"){
            $request->session()->forget('session');
            if(!empty($_POST['edit'])) {
                //editボタンを押された場合はupdataの処理を実行する
                return $this->updata($request);
            } else {
                //deleteボタンを押された場合はdestroyの処理を実行する
                return $this->destroy($request);
            }
        }else{
            return redirect("/");
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
            return redirect('/user/edit/confirm');
        } else {
            return redirect();
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

        return redirect()->route('user.delete');
    }

    public function delete(Request $request)
    {
        return view('osagariclub.userDelete');
    }

    public function add()
    {
        return view('osagariclub.userCreate');
    }

    public function create(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->school_id = $request->school_id;
        $user->password = Hash::make($request->password);
        if($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('public/images/user');
            //画像をストレージの中に保存して画像pathを変数pathに入れる
            $user->image_path = basename($path);
            //テーブルに画像PATHを保存
        }
        $user->appleal = $request->appleal;
        $user->save();

        Auth::guard()->login($user);
        return redirect('/welcome');
    }

    public function welcome()
    {
        return view('osagariclub.welcome');
    }

    public function login()
    {
        return view('osagariclub.userLogin');
    }

    public function signin(Request $request)
    {
        //フォームに入力されたメールアドレス情報取得
        $email    = $request->email;
        //フォームに入力されたパスワード情報取得
        $password = $request->password;

        //ログイン処理
        if(Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect("/search");
        } else {
            return redirect('/user/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function show(Request $request)
    {
        // セッションを取得
        $value = $request->session()->get('session');
        // セッションに１が入っていればページを表示、入っていなければ戻る
        if(isset($value) && $value == "search"){
            $user = Auth::user();
            $request->session()->put('session', 'show_user');
            $request->session()->put('session', 'search');
            return view('osagariclub.user', ['user' => $user]);
        }else{
            return redirect("/");
        }
    }

    public function confirm()
    {
        return view('osagariclub.userEditConfirm');
    }

    public function passreset()
    {
        return view('osagariclub.passReset');
    }

    public function pass_forget()
    {
        return view('osagariclub.passForget');
    }
}
