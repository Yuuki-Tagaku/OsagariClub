<?php

namespace App\Http\Controllers;

use App\Supply;
use App\Category;
use App\School;
use App\Supply_user;
use Illuminate\Http\Request;
use Illuminate\View\ViewServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Supply $supply)
    {

        $categories = Category::where('school_id', '1')->get();
        // ログインしているユーザーを定義
        $user = Auth::user();
        // ユーザーが作ったおさがりを取得する
        // 認証されているユーザーが作ったおさがりを取得
        $supplies = Supply::where("user_id",$user["id"])->paginate(10);
        $categories = Category::where("school_id",$user["school_id"])->get();

        return view ("supplies.index",compact("supplies","categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conditions = [
            1=>"新品・未使用",
            2=>"未使用に近い",
            3=>"目立った汚れなし",
            4=>"やや汚れあり",
            5=>"汚れあり",
            6=>"全体的に状態が悪い",
        ];

        $genders = [
            1=>"男",
            2=>"女"
        ];

        $user = Auth::user();

        $categories = category::where("school_id",$user["school_id"])->get();

        return view ("supplies.create",compact("conditions","genders","categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $supply = new Supply();
        $supply->user_id =$user["id"];
        $supply->category_id =$request->input("category_id");
        $supply->item = $request->input("item");
        $supply->size = $request->input("size");
        $supply->condition =$request->input("condition");
        $supply->years_used = $request->input("years_used");
        $supply->gender =$request->input("gender");
        $supply->remarks =$request->input("remarks");

        //写真１ ------------------------------------------
        // 修正箇所：下の一文は後から再代入するのであれば宣言はいらない。必須なのでif文もいらない
        // $supply->image_path2 =$request->file("image_path2");
        $path = $request->file('image_path1')->store('public/images/supply');
        //画像をストレージの中に保存して画像pathを変数pathに入れる
        $supply->image_path1 = basename($path);
        //テーブルに画像PATHを保存
    // 写真２----------------------------------------
        $supply->image_path2 =$request->file("image_path2");
        if($request->hasfile("image_path2")){
            $path = $request->file('image_path2')->store('public/images/supply');
            //画像をストレージの中に保存して画像pathを変数pathに入れる
            $supply->image_path2 = basename($path);
            //テーブルに画像PATHを保存
        }else{
            $path = null;
        }
        $supply->image_path2 = $path[1];
        // 写真３-----------------------------------------
        $supply->image_path3 =$request->file("image_path3");
        if($request->hasfile("image_path3")){
            $path = $request->file('image_path3')->store('public/images/supply');
            //画像をストレージの中に保存して画像pathを変数pathに入れる
            $supply->image_path2 = basename($path);
            //テーブルに画像PATHを保存
        }else{
            $path = null;
        }
        $supply->image_path3 = $path[1];
        // // 写真４----------------------------------------
        $supply->image_path4 =$request->file("image_path4");
        if($request->hasfile("image_path4")){
            $path = $request->file('image_path4')->store('public/images/supply');
            //画像をストレージの中に保存して画像pathを変数pathに入れる
            $supply->image_path2 = basename($path);
            //テーブルに画像PATHを保存
        }else{
            $path = null;
        }
        $supply->image_path4 = $path[1];

        $supply->save();
        return redirect('/supply/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('supply');
        $supply_user = Supply_user::where('supply_id', $search)
                                ->where('user_id', $user['id'])->get();
        $supply = Supply::find($search);
        return view("supplies.show",compact("supply","supply_user","user"));
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
                Storage::delete('public/images/supply/' .$delete_image);
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
                Storage::delete('public/images/supply/' .$delete_image);
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
                Storage::delete('public/images/supply/' .$delete_image);
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
                Storage::delete('public/images/supply/' .$delete_image);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supply $supply)
    {
        
    }

    public function search (Supply $suppl,Request $request)
    {
        $user = Auth::user();
        // 検索機能
        // 検索ワードを定義
        $keyword = $request->input("search_word");
        // カテゴリーIDを定義
        $keycategory = $request->input("search_category");
        // カテゴリー検索用配列
        $categories = Category::where('school_id', '1')->get();
        //ペジネーション時の検索ワード保持用パラメータ
        $param = [
            'keyword' => $keyword,
            'keycategory' => $keycategory,
        ];

        //検索結果表示のもの。フリーワード検索は最初のif文。カテゴリーボタンを押された時は2個目のif文。最初にページに推移してきたときは全おさがり情報。
        if(!empty($keyword)){
            $supplies = Supply::where('item', 'like', '%'.$keyword.'%')
                            ->orWhere('size', 'like', '%'.$keyword.'%')
                            ->orWhere('condition', $keyword)
                            ->orWhere('years_used', 'like', '%'.$keyword.'%')
                            ->orWhere('gender', $keyword)
                            ->orWhere('remarks', 'like', '%'.$keyword.'%')
                            ->paginate(10);
        } elseif(!empty($keycategory)) {
            $supplies = Supply::WhereHas('category', function($query) use ($keycategory) {
                                $query->where('id', $keycategory);
                            })
                            ->paginate(10);
        } else {
            $supplies = Supply::paginate(10);
        }

        return view("supplies.search",compact("supplies","categories","keycategory","param"));
    }

    public function confirmation (Supply $supply)
    {
        return view ("supplies.confirmation",compact("supplies"));
    }
}
