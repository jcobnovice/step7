<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Http\Requests\ProductsRequest;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $model = new Products();
        $products = $model->getList();
        $companies = $model->getList();

        return view('list' , ['products' => $products] , ['companies' => $companies]);
        //$query = Products::query();
        //全件取得
        //$users = $query->get();
        //ページネーション
        //$products = $query->orderBy('id')->paginate(10);
        //return view('list' , ['products' => $products]);
    }

    public function store(ProductsRequest $request) {

        // トランザクション開始
        DB::beginTransaction();
    
        try {
            // 登録処理呼び出し
            $request = new Products();
            $request->registProducts($products,$file_name);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
    
        // 処理が完了したらregistにリダイレクト
        return redirect(route('products.create'));
    }

    public function create(Request $request)
    {
        $model = new Products();
        $companies = $model->getList();
        return view('products.create',['companies' => $companies]);
    }

    //public function store(Request $request)
    //{
        //$products = Products::create();

        //値の登録
        //$products->product_name = $request->product_name;

        //保存
        //$products->save();

        //一覧にリダイレクト
        //return redirect()->to('/products');
    //}

    
    public function detail($id)
    {
        
        $model = new Products();
        $products = $model->getDetail($id);

        return view('products.detail' , ['products' => $products]);
    }


    public function edit($id)
    {
        $model = products::find($id);
        $products = $model->getDetail($id);

        return view('products.edit' , ['products' => $products]);
    }
}
