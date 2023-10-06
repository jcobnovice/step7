@extends('layouts.app')

@section('content')
<h1>商品情報一覧画面</h1>

<a href="{{ route('products.create') }}" class="btn btn-primary" style="margin:20px;">新規登録</a>
    
    <div class="search">
        <form id="searchform" action="{{ route('search') }}" method="GET">
        @csrf
        <!-- 検索フォーム -->
        <div calss="product_name.serch">
            <label for="product_name">{{ __('商品名') }}</label>
            <div class="form-control">    
                <input id="keyword" type="text" name="keyword" placeholder="キーワード" value="{{ old('product_name') }}">
            </div>
        </div>
    
        <div class="company_name.serch">
            <label for="company_name">{{ __('メーカー') }}<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
            <select class="form-control" id="company_name" name="company_name">
                <option hidden></option>
                @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="price.search">
            <label for="price">{{ __('価格') }}</label>
            <div class="form-control">
                <p>{{ __('上限') }}</p>
                <input type="number" name="max_price" id="max_price">
            </div>
            <div class="form-control">
                <p>{{ __('下限') }}</p>
                <input type="number" name="min_price" id="min_price">
            </div>
        </div>

        <div class="stock.serach">
            <label for="stock">{{ __('在庫数') }}</label>
            <div class="form-control">
                <p>{{ __('上限') }}</p>
                <input type="number" name="max_stock" id="max_stock">
            </div>
            <div class="form-control">
                <p>{{ __('下限') }}</p>
                <input type="number" name="min_stock" id="min_stock">
            </div>
        </div>
    
        <div class="form-group row mb-0">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary" style="margin:20px;" id="serachbutton">
                    {{ __('検索') }}
                </button>
            </div>
        </div>
        </form>
    </div> 


    <table class="table table-striped productstable" id="sorter">
        <thead>
            <tr>
                <th>ID</th>
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
                <td>{{ $product->id }}</td>
                <td><img src="{{asset('/storage/sample/'.$product->img_path)}}" ait="" width="50" height="100"></td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->company_name }}</td>
                <td><a href="{{ route('products.detail', ['id' => $product->id]) }}" class="btn btn-primary">詳細表示</a></td>
                <td>
                    <form action="{{ route('delete', ['id' => $product->id]) }}" method="POST">
                    @csrf
                        <input type="submit" class="btn btn-danger deletebutton" value="削除" data-id="{{ $product->id }}">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    <table>
@endsection
