@extends('layouts.app')

@section('content')
<h1>商品情報一覧画面</h1>

<a href="{{ route('products.create') }}" class="btn btn-primary" style="margin:20px;">新規登録</a>
    
    <!-- 検索フォーム -->
    <form action="{{ route('search') }}" method="GET">
        @csrf
    <div class="search">    
            <label for="product_name">{{ __('商品名') }}</label>
            <input type="text" name="keyword" placeholder="キーワード" value="{{ old('product_name') }}">
    </div>  

    <div class="company_name.serch">
        <label for="company_name">{{ __('メーカー') }}</label>
        <span class="badge badge-danger ml-2">{{ __('必須') }}</span>
        <select class="form-control" id="company_name" name="company_name">
            @foreach ($companies as $company)
                <option hidden>選択してください</option>
                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group row mb-0">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary" style="margin:20px;">
                {{ __('検索') }}
            </button>
        </div>
    </div>
    </form>

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
                <td><img src="{{asset('/storage/sample/'.$product->img_path)}}" ait="" width="50" height="100"></td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->company_name }}</td>
                <td>
                    <a href="{{ route('products.detail', ['id' => $product->id]) }}" class="btn btn-primary">詳細表示</a>
                </td>
                <td>
                <form action="{{ route('delete', ['id' => $product->id]) }}" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-danger" value="削除" onclick='return confirm("本当に削除しますか？")'>
                </form>
                </td>
        @endforeach
        </tbody>
    <table>
@endsection
