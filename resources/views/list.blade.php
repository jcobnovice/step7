@extends('layouts.app')

@section('content')
<h1>商品情報一覧画面</h1>

<a href="{{ route('products.create') }}" class="btn btn-primary" style="margin:20px;">新規登録</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>商品画像</th>
                <th>商品名</th>
                <th>価格</th>
                <th>在庫数</th>
                <th>メーカー名</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->company_id }}</td>
                <td><img src="{{asset('/storage/img/'.$product->img_path)}}" ait=""></td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->company_name }}</td>
                <td><a href="{{ route('products.detail', $product->id) }}" class="btn btn-primary">詳細表示</a></td>
                <td><button type="button" class="btn btn-danger">削除</button></td>
            </tr>
        @endforeach
        </tbody>
    <table>
@endsection
