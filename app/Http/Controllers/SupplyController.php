<?php

namespace App\Http\Controllers;

use App\Supply;
use Illuminate\Http\Request;
use Illuminate\View\ViewServiceProvider;
use Carbon\Carbon;
use App\Category;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $supplies = Supply::paginate(10);

        $categories = Category::where('school_id', '1')->get();

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

        $categories = [
            1=>"体育",
            2=>"図工"
        ];



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
        $supply = new Supply();
        $supply->user_id =1;
        $supply->category_id =$request->input("category_id");
        $supply->item = $request->input("item");
        $supply->size = $request->input("size");
        $supply->condition =$request->input("condition");
        $supply->years_used = $request->input("years_used");
        $supply->gender =$request->input("gender");
        $supply->remarks =$request->input("remarks");
        $supply->image_path1 =$request->file("image_path1");
        if($request->hasfile("image_path1")){
            $path = \Storage::put('/public',$supply->image_path1);
            $path = explode('/',$path);
        }else{
            $path = null;
        }


        $conditions = [
            1=>"新品・未使用",
            2=>"未使用に近い",
            3=>"目立った汚れなし",
            4=>"やや汚れあり",
            5=>"汚れあり",
            6=>"全体的に状態が悪い",
        ];
        $supply->image_path1 = $path[1];




        $supply->save();
        return redirect()->route("supplies.show",[$supply->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function show(Supply $supply)
    {
        return view("supplies.show",compact("supply"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function edit(Supply $supply)
    {
        return view ("supplies.edit",compact("supply"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supply $supply)
    {
        $supply->user_id =1;
        $supply->category_id =1;
        $supply->item = $request->input("item");
        $supply->size = $request->input("size");
        $supply->condition =$request->input("condition");
        $supply->years_used = $request->input("years_used");
        $supply->gender =$request->input("gender");
        $supply->remarks =$request->input("remarks");
        $supply->image_path1 =$request->file("image_path1");
        if($request->hasfile("image_path1")){
            $path = \Storage::put('/public',$supply->image_path1);
            $path = explode('/',$path);
        }else{
            $path = null;
        }

        $supply->save();
        return view ("supplies.show",compact("supply"));
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
