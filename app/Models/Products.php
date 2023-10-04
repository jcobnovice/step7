<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['company_id', 'product_name', 'price', 'stock', 'comment', 'img_path', 'created_at', 'updated_at'];

    //一覧画面表示
    public function getList() {
        //productテーブルからデータを取得
        $products = DB::table('products')
        ->join('companies', 'company_id', '=', 'companies.id')
        ->select('products.*', 'products.price', 'products.stock', 'companies.company_name')
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
        $maxprice = $request->input('max_price');
        $minprice = $request->input('min_price');
        $maxstock = $request->input('max_stock');
        $minstock = $request->input('min_stock');

        $products= DB::table('products')
            ->join('companies','company_id','=','companies.id')
            ->select('products.*','companies.company_name');

        //商品名検索
        if($keyword){
            $products->where('products.product_name', 'LIKE', '%'.$keyword.'%');
        }
        //メーカー名検索
        if($company){
            $products->where('products.company_id', '=', $company);
        }

        //価格上限
        if($maxprice){
            $products->where('price','<',$maxprice);
        }
        //価格下限
        if($minprice){
            $products->where('price','>',$minprice);
        }
        
        //在庫数上限
        if($maxstock){
            $products->where('stock','<',$maxstock);
        }
        //在庫数下限
        if($minstock){
            $products->where('stock','>',$minstock);
        }
        
        $products= $products->get();

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
