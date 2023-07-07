<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class ProductsController extends Controller
{
    public function index()
    {
        $model = new Products();
        $products = $model->getList();

        return view('list' , ['products' => $products]);
        //$query = Products::query();
        //全件取得
        //$users = $query->get();
        //ページネーション
        //$products = $query->orderBy('id')->paginate(10);
        //return view('list' , ['products' => $products]);
    }

    public function create(Request $request)
    {
        //createに転送
        return view('create');
    }

    public function store(Request $request)
    {
        $products = Products::create();

        //値の登録
        $products->product_name = $request->product_name;

        //保存
        $products->save();

        //一覧にリダイレクト
        return redirect()->to('/products');
    }

    
    public function detail($id)
    {
        
        $model = new Products();
        $products = $model->getDetail($id);

        return view('products.detail' , ['products' => $products]);
    }


    public function edit($id)
    {
        $model = products::find($id);
        $products = $model->getEdit($id);

        return view('products.edit' , ['products' => $products]);
    }
}
