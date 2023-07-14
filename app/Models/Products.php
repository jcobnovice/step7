<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;

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

    //編集画面
    //public function getEdit($id) {
        //productテーブルからデータを取得
        //$products = DB::table('products')
        //->join('companies', 'company_id', '=', 'companies.id')
        //->select('products.*', 'companies.company_name')
        //->where('products.id', '=', $id)
        //->first();

        //return $products;
    //}

    //登録画面
    public function registProducts($products,$file_name){
        //登録処理
        $path = 'storage/'. $file_name;
            
            DB::table('products')->insert([
                'company_name' => $products->company_id,
                'product_name' =>$prducts->product_name,
                'price' => $products->price,
                'stock' => $products->stock,
                'comment' => $products->comment,
                'img_path' => $path,
                'created_at',
                'updated_at',
            ]);
    }
}
