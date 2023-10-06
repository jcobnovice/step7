<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $dates =  ['created_at', 'updated_at'];
    protected $fillable = ['product_id', 'created_at', 'updated_at'];

    //在庫減算処理
    public function productdec($productId){

        $products = DB::table('products')
        ->where('id', '=', $productId)
        ->decrement('stock', 1);

        DB::table('sales')->insert([
            'product_id' => $productId,
            'created_at' => NOW(),
            'updated_at'=> NOW(),
        ]);

        return $products;
    }
}
