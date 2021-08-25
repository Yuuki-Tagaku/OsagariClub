<?php

namespace App\Http\Controllers;

use App\Supply;
use App\category;
use Illuminate\Http\Request;
use Illuminate\View\ViewServiceProvider;
use Carbon\Carbon;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Supply $supply)
    {
        $supplies = Supply::paginate(10);

        
        $categories = Category::where("school_id","1")->get();

       
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


        $categories = Category::where("school_id","1")->get();




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

        //写真１ ------------------------------------------
        $supply->image_path1 =$request->file("image_path1");
        if($request->hasfile("image_path1")){
            $path = \Storage::put('/public',$supply->image_path1);
            $path = explode('/',$path);
        }else{
            $path = null;
        }
        $supply->image_path1 = $path[1];
        // 写真２----------------------------------------

        $supply->image_path2 =$request->file("image_path2");
        if($request->hasfile("image_path2")){
            $path = \Storage::put('/public',$supply->image_path2);
            $path = explode('/',$path);
        }else{
            $path = null;
        }
        $supply->image_path2 = $path[1];
        // 写真３-----------------------------------------
        $supply->image_path3 =$request->file("image_path3");
        if($request->hasfile("image_path3")){
            $path = \Storage::put('/public',$supply->image_path3);
            $path = explode('/',$path);
        }else{
            $path = null;
        }
        $supply->image_path3 = $path[1];

        // // 写真４----------------------------------------

        $supply->image_path4 =$request->file("image_path4");
        if($request->hasfile("image_path4")){
            $path = \Storage::put('/public',$supply->image_path4);
            $path = explode('/',$path);
        }else{
            $path = null;
        }
        $supply->image_path4 = $path[1];





        $conditions = [
            1=>"新品・未使用",
            2=>"未使用に近い",
            3=>"目立った汚れなし",
            4=>"やや汚れあり",
            5=>"汚れあり",
            6=>"全体的に状態が悪い",
        ];
        
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

        $supplies = Supply::paginate(10);

        // 検索機能

        // 検索ワードを定義
        $keyword = $request->input("search");
        // カテゴリーIDを定義
        $keycategory = $request->input("category");

        $keycondition = $request->input("condition");


        $categories = Category::where("school_id","1")->get();
        

        $conditions = [
            1=>"新品・未使用",
            2=>"未使用に近い",
            3=>"目立った汚れなし",
            4=>"やや汚れあり",
            5=>"汚れあり",
            6=>"全体的に状態が悪い",
        ];



        // 検索ワードがおさがり名に含まれてるものを検索して表示
        if($keyword){
        $supplies = Supply::where('item','LIKE', "%{$keyword}%")->paginate(10);
        }


        // カテゴリーIDが同じものを検索して表示

       if($keycategory){
        $supplies = Supply::where('category_id', "{$keycategory}")->paginate(10);
        }

        // 綺麗度が同じものを表示
        if($keycondition){
            $supplies = Supply::where('condition', "{$keycondition}")->paginate(10);
        }



        return view("supplies.search",compact("supplies","categories","conditions"));
    }

    public function confirmation (Supply $supply)
    {
        
        return view ("supplies.confirmation",compact("supplies"));
    }
}
