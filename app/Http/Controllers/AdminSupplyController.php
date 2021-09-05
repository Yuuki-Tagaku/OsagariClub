<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supply;
use App\Category;

class AdminSupplyController extends Controller
{
    /*==================================
    検索フォームのみ表示(show)
    ==================================*/
    public function search(Request $request)
    {
        //フォームを機能させるために各情報を取得し、viewに返す
        //viewのnameの部分
        $items = $request->input('item');
        $categoryId = $request->input('category_id');
        $size = $request->input('size');
        $years_used = $request->input('year_used');
        $gender = $request->input('gender');
        $conditions = $request->input('conditions');

        $categories = Category::find('1');

        //検索フォームからの値で検索したいものを返したい
        //カラム名、フォームで入力された値
        /*$supply = Supply::where('item', 'like', '%'.$items.'%')
            ->orwhere('category_id', $categoryId)
            ->orwhere('size', 'like', '%'.$size.'%')
            ->orwhere('years_used', 'like', '%'.$years_used.'%')
            ->orwhere('gender', $gender)
            ->orwhere('condition', $conditions)
            ->get();*/

        $query = Supply::query();
        if ($items != null) {
            $query->orwhere('item', 'like', '%' . $items . '%');
        }
        if ($categoryId != null) {
            $query->orwhere('category_id', $categoryId);
        }
        if ($size != null) {
            $query->orwhere('size', 'like', '%' . $size . '%');
        }
        if ($years_used != null) {
            $query->orwhere('years_used', 'like', '%' . $years_used . '%');
        }
        if ($gender != null) {
            $query->orwhere('gender', $gender);
        }
        if ($conditions != null) {
            $query->orwhere('conditions', $conditionsx);
        }
        $supply = $query->get();

        $param = ["categories" => $categories, "supply" => $supply];

        return view('osagariclub.supplylist', $param);
    }

    public function edit(Request $request)
    {
        $items = $request->input('item');
        $categoryId = $request->input('category_id');
        $size = $request->input('size');
        $years_used = $request->input('year_used');
        $gender = $request->input('gender');
        $conditions = $request->input('conditions');

        $categories = Category::find('1');
        $query = Supply::query();
        if ($items != null) {
            $query->orwhere('item', 'like', '%' . $items . '%');
        }
        if ($categoryId != null) {
            $query->orwhere('category_id', $categoryId);
        }
        if ($size != null) {
            $query->orwhere('size', 'like', '%' . $size . '%');
        }
        if ($years_used != null) {
            $query->orwhere('years_used', 'like', '%' . $years_used . '%');
        }
        if ($gender != null) {
            $query->orwhere('gender', $gender);
        }
        if ($conditions != null) {
            $query->orwhere('conditions', $conditionsx);
        }
        $supply = $query->get();
        $param = ["categories" => $categories, "supply" => $supply];

        return view('osagariclub.supplylistdetail', $param);
    }
}
