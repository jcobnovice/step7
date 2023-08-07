<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\Companies;
use App\Http\Requests\ProductsRequest;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    //一覧画面表示
    public function index()
    {
        //インスタンス生成
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

    //登録処理
    public function registSubmit(ProductsRequest $request) {
        // トランザクション開始
        DB::beginTransaction();
    
        try {
            // 登録処理呼び出し
            $products = new Products();
            $products -> registProducts($request);
            $products -> save();
            dd('aaa');
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
        $model = new Companies();
        $companies = $model->getCreate();
        return view('products.create',['companies' => $companies]);
    }

    //詳細機能
    public function detail($id)
    {
        
        $model = new Products();
        $products = $model->getDetail($id);

        return view('products.detail' , ['products' => $products]);
    }

    //編集機能
    public function edit($id)
    {
        $model = products::find($id);
        $products = $model->getDetail($id);

        return view('products.edit' , ['products' => $products]);
    }

    //検索機能
    public function search(Request $request){
        $model = new Products();
        $products = $model->searchList($request);

        $article = new Companies();
        $companies = $article->getCompanyList();

        return view('list' , ['products' => $products] , ['companies' => $companies]);
    }

    //削除機能
    public function delete($id)
    {   
        $products = Products::find($id);
        
        $products->delete();
        
        return redirect()->route('products.index');
    }
}
