@extends('layouts.app')

@section('content')

<h1>商品情報登録画面</h1>

<div class="row">
        <div class="col-sm-12">
            <a href="{{ route('products.index') }}" class="btn btn-primary" style="margin:20px;">一覧に戻る</a>
        </div>
    </div>

    <!-- form -->
    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
    
    <!-- 商品名 -->
        <div class="form-group">
            <label for="product_name">商品名</label>
            <input type="product_name" class="form-control" id="product_name" name="product_name" value="{{ old('product_name')}}">
        </div>
    <!-- メーカー -->
        <div class="form-group">
            <label for="company_name">メーカー</label>
            <input type="company_name" class="form-control" id="company_name" name="company_name" value="{{ old('company_name')}}">
        </div>
    <!-- 価格 -->
        <div class="form-group">
            <label for="price">価格</label>
            <input type="price" class="form-control" id="price" name="price" value="{{ old('price')}}">
        </div>
    <!-- 在庫数 -->
        <div class="form-group">
            <label for="stock">在庫数</label>
            <input type="stock" class="form-control" id="stock" name="stock" value="{{ old('stock')}}">
        </div>
    <!-- コメント -->
        <div class="form-group">
            <label for="comment">コメント</label>
            <input type="comment" class="form-control" id="comment" name="comment" value="{{ old('comment')}}">
        </div>
    <!-- 商品画像 -->
        <div class="form-group">
            <label for="img_path">商品画像</label>
            <input type="file" class="form-control" id="img_path" name="img_path" value="{{ old('img_path')}}">
        </div>


        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group row mb-0">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary" style="margin:20px;">
                    {{ __('登録') }}
                </button>
            </div>
        </div>
    </form>

@stop