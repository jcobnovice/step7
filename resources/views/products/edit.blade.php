@extends('layouts.app')

@section('content')
<h1>商品情報編集画面</h1>

<a class="btn btn-primary" style="margin:20px;" onClick="history.back()">詳細へ戻る</a>
    
    <!-- form -->
    <form method="post" action="{{ route('update', ['id' => $products->id]) }}" enctype="multipart/form-data">
        @csrf
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
                    <td>
                        {{ $products->id }}
                    </td>
                    <!-- 商品名 -->
                    <td>
                        <input type="product_name" class="form-control" id="product_name" name="product_name" value="{{ $products->product_name }}" >
                        @if($errors->has('product_name'))
                            <p>{{ $errors->first('product_name') }}</p>
                        @endif
                    </td>
                    <!-- メーカー -->
                    <td>
                        <select class="form-control" id="company_name" name="company_name">
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                        @endforeach
                        </select>
                        @if($errors->has('company_name'))
                            <p>{{ $errors->first('company_name') }}</p>
                        @endif
                    </td>
                    <!-- 価格 -->
                    <td>
                        <input type="price" class="form-control" id="price" name="price" value="{{ $products->price }}" >
                        @if($errors->has('price'))
                            <p>{{ $errors->first('price') }}</p>
                        @endif
                    </td>
                    <!-- 在庫数 -->
                    <td>
                        <input type="stock" class="form-control" id="stock" name="stock" value="{{ $products->stock }}" >
                        @if($errors->has('stock'))
                            <p>{{ $errors->first('stock') }}</p>
                        @endif
                    </td>
                    <!-- コメント -->
                    <td>
                        <input type="comment" class="form-control" id="comment" name="comment" value="{{ $products->comment }}" >
                        @if($errors->has('comment'))
                            <p>{{ $errors->first('comment') }}</p>
                        @endif
                    </td>
                    <!-- 商品画像 -->
                    <td>
                        <input type="file" class="form-control" id="img_path" name="img_path">
                        @if($errors->has('img_path'))
                            <p>{{ $errors->first('img_path') }}</p>
                        @endif
                        <img src="{{asset('/storage/sample/'.$products->img_path)}}" ait="" width="50" height="100">
                    </td>

                    <!-- 更新ボタン -->
                    <td>
                        <input type="submit" class="btn btn-primary" value="更新">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
@endsection
