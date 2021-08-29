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
        $items = $request->input('item');
        $categoryId = $request->input('category_id');
        $size = $request->input('size');
        $years_used = $request->input('year_used');
        $gender = $request->input('gender');
        $conditions = $request->input('conditions');

        $categories = Category::find('1');

        if (!empty($item)) {
            $supply = Supply::where('item', $request->input)->get();
            $param = ['input' => $request->input, 'item' => $item];

            return view('osagariclub.supplylist', $param);
        }
    }
}
