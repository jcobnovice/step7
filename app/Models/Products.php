<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['company_id', 'product_name', 'price', 'comment', 'created_at', 'updated_at'];

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

    //登録画面
    public function registProducts($products){
        //登録処理
        //$path = 'storage/'. $file_name;
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
    public function searchList($keyword, $company_id){
        $products = DB::table('products')
        ->join('companies', 'company_id', '=', 'companies.id')
        ->select('products.*', 'companies.company_name');
        if($keyword){
            $products -> where('products.product_name', 'like', '%'.$keyword.'%');
        }
        if($company_id){
            $products -> where('products.company_id', '=', $company_id);
        }
        $products = $products -> get();

        return $products;
    }

}
