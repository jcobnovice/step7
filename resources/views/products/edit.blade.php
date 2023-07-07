@extends('layouts.app')

@section('content')
<h1>商品情報編集画面</h1>

    <a class="btn btn-primary" style="margin:20px;" onClick="history.back()">詳細へ戻る</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>商品情報id</th>
                    <th>商品名</th>
                    <th>メーカー</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>コメント</th>
                    <th>商品画像</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $products->id }}</td>
                    <td>{{ $products->product_name }}</td>
                    <td>{{ $products->company_name }}</td>
                    <td>{{ $products->price }}</td>
                    <td>{{ $products->stock }}</td>
                    <td>{{ $products->comment }}</td>
                    <td>{{ $products->img_path }}</td>
                    <td><a href="" class="btn btn-primary">更新</a></td>
                </tr>
            </tbody>
        </table>
@endsection
