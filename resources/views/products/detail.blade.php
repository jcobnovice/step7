@extends('layouts.app')

@section('content')
<h1>商品情報詳細画面</h1>

    <a href="{{ route('products.index') }}" class="btn btn-primary" style="margin:20px;">一覧に戻る</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>商品情報id</th>
                    <th>商品画像</th>
                    <th>商品名</th>
                    <th>メーカー</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>コメント</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $products->id }}</td>
                    <td>{{ $products->img_path }}</td>
                    <td>{{ $products->product_name }}</td>
                    <td>{{ $products->company_name }}</td>
                    <td>{{ $products->price }}</td>
                    <td>{{ $products->stock }}</td>
                    <td>{{ $products->comment }}</td>
                    <td><a href="{{ route('products.edit', $products->id) }}" class="btn btn-primary">編集</a></td>
                </tr>
            </tbody>
        </table>
@endsection