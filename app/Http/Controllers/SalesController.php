<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function purchase(Request $request)
    {
        // トランザクション開始
        DB::beginTransaction();

        try {
            // 登録処理呼び出し
            $productId = $request->input('product_id');
            $quantity = $request->input('quantity', 1);

            $product = Products::find($productId);

            if (!$product) {
                return response()->json(['message' => '商品が存在しません']);
            }
            if ($product->stock < $quantity) {
                return response()->json(['message' => '商品が在庫不足です']);
            }

            $sales = new Sale();
            $sales->productdec($productId);
            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
        }
        
        return response()->json(['message' => '購入成功']);
    }
}
