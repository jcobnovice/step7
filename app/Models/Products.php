<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['company_id', 'product_name', 'price', 'comment', 'img_path', 'created_at', 'updated_at'];

    //一覧画面表示
    public function getList() {
        //productテーブルからデータを取得
        $products = DB::table('products')
        ->join('companies', 'company_id', '=', 'companies.id')
        ->select('products.*', 'companies.company_name')
        ->get();

        return $products;
    }

    //詳細画面・編集画面
    public function getDetail($id) {
        //productテーブルからデータを取得
        $products = DB::table('products')
        ->join('companies', 'company_id', '=', 'companies.id')
        ->select('products.*', 'companies.company_name')
        ->where('products.id', '=', $id)
        ->first();

        return $products;
    }

    //登録機能
    public function registProducts($products, $file_name){
        //登録処理　画像あり
        DB::table('products')->insert([
            'product_name' => $products->product_name,
            'company_id' => $products->company_name,
            'price' => $products->price,
            'stock' => $products->stock,
            'comment' => $products->comment,
            'img_path' => $file_name,
            'created_at' => NOW(),
            'updated_at'=> NOW(),
        ]);
    }
    
    public function registProductsOnly($products){
        //登録処理　画像無し
        DB::table('products')->insert([
            'product_name' => $products->product_name,
            'company_id' => $products->company_name,
            'price' => $products->price,
            'stock' => $products->stock,
            'comment' => $products->comment,
            'created_at' => NOW(),
            'updated_at'=> NOW(),
        ]);
    }

    //商品一覧画面の検索機能
    public function searchList($request){
        $keyword = $request->input('keyword');
        $company = $request->input('company_name');

        $products= DB::table('products')
            ->join('companies','company_id','=','companies.id')
            ->select('products.*','companies.company_name');

        if($keyword){
            $products->where('products.product_name', 'LIKE', '%'.$keyword.'%');
        }

        if($company){
            $products->orwhere('products.company_id', '=', $company);
        }   
        
        $products= $products->get();

        // $products=DB::table('products')
        //    ->join('companies','company_id','=','companies.id')
        //    ->select('products.*','companies.company_name')
        //    ->where('products.product_name', 'like', '%'.$keyword.'%')
        //    ->orwhere('products.company_id', '=', $company_id)
        //    ->get();

        return $products;
    }

    //更新（編集）機能
    public function updateProducts($products, $id, $file_name)
    {
        //更新処理　画像あり
        DB::table('products')
            ->where('id', '=', $id)
            ->update([
                'product_name' => $products->product_name,
                'company_id' => $products->company_name,
                'price' => $products->price,
                'stock' => $products->stock,
                'comment' => $products->comment,
                'img_path' => $file_name,
                'updated_at'=> NOW(),
            ]);
    }

    public function updateProductsOnly($products, $id)
    {
        //更新処理　画像無し
        DB::table('products')
            ->where('id', '=', $id)
            ->update([
                'product_name' => $products->product_name,
                'company_id' => $products->company_name,
                'price' => $products->price,
                'stock' => $products->stock,
                'comment' => $products->comment,
                'updated_at'=> NOW(),
            ]);
    }

}
