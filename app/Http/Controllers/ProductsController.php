<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\Companies;
use App\Http\Requests\ProductsRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    //一覧画面表示
    public function index()
    {
        //インスタンス生成
        $model = new Products();
        $products = $model->getList();

        $article = new Companies();
        $companies = $article->getCompanyList();

        return view('list' , ['products' => $products] , ['companies' => $companies]);
    }

    //登録処理
    public function registSubmit(ProductsRequest $request) {
        
        if($request->img_path){
            $file_name = $request->file('img_path')->getClientOriginalName();
            $request->file('img_path')->storeAs('public/sample/', $file_name);
        }

        // トランザクション開始
        DB::beginTransaction();
    
        try {
            // 登録処理呼び出し
            $products = new Products();

            if($request->img_path){
                $products -> registProducts($request, $file_name);
            } else {
                $products -> registProductsOnly($request);
            }
            
            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
    
        // 処理が完了したらregistにリダイレクト
        return redirect(route('products.create'));
    }

    //登録機能
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

        $model = new Companies();
        $companies = $model->getCreate();

        return view('products.edit' , ['products' => $products] , ['companies' => $companies]);
    }

    //編集処理
    public function updateSubmit(UpdateRequest $request, $id) {
        
        if($request->img_path){
            $file_name = $request->file('img_path')->getClientOriginalName();
            $request->file('img_path')->storeAs('public/sample/', $file_name);
        }

        // トランザクション開始
        DB::beginTransaction();
    
        try {
            // 登録処理呼び出し
            $products = new Products();

            if($request->img_path){
                $products -> updateProducts($request, $id, $file_name);
            } else {
                $products -> updateProductsOnly($request, $id);
            }
            
            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
    
        // 処理が完了したらregistにリダイレクト
        return redirect(route('products.edit', $id));
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
