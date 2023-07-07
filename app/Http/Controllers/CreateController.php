<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companies;

class CreateController extends Controller
{
    public function index()
    {
        $query = companies::query();
        //全件取得
        //$users = $query->get();
        //ページネーション
        $companies = $query->orderBy('id','desc')->paginate(10);
        return view('list')->with('companies',$companies);
    }

    public function create()
    {
        //createに転送
        return view('create');
    }

    public function store(Request $request)
    {
        $companies = companies::create();

        //値の登録
        $companies->companies_name = $request->companies_name;

        //保存
        $companies->save();

        //一覧にリダイレクト
        //return redirect(route('products'));
    }

    public function redirectPath()
    {
        return 'http://localhost:8888/step7/public/products';
        
    }
}
