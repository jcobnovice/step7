@extends('layouts.app')

@section('content')

<h1>商品情報登録画面</h1>

<div class="row">
        <div class="col-sm-12">
            <a href="{{ route('products.index') }}" class="btn btn-primary" style="margin:20px;">一覧に戻る</a>
        </div>
    </div>

    <!-- form -->
    <form method="post" action="{{ route('submit') }}" enctype="multipart/form-data">
        @csrf
        
    <!-- 商品名 -->
        <div class="form-group">
            <label for="product_name">商品名</label>
            <input type="product_name" class="form-control" id="product_name" name="product_name" value="{{ old('product_name') }}">
            @if($errors->has('product_name'))
                <p>{{ $errors->first('product_name') }}</p>
            @endif
        </div>
    <!-- メーカー -->
        <div class="form-group">
            <label for="company_name">メーカー</label>
            <select class="form-control" id="company_name" name="company_name">
            @foreach ($companies as $company)
                <option hidden>選択してください</option>
                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
            @endforeach
            </select>
            @if($errors->has('company_name'))
                <p>{{ $errors->first('company_name') }}</p>
            @endif
        </div>
    <!-- 価格 -->
        <div class="form-group">
            <label for="price">価格</label>
            <input type="price" class="form-control" id="price" name="price" value="{{ old('price') }}">
            @if($errors->has('price'))
                <p>{{ $errors->first('price') }}</p>
            @endif
        </div>
    <!-- 在庫数 -->
        <div class="form-group">
            <label for="stock">在庫数</label>
            <input type="stock" class="form-control" id="stock" name="stock" value="{{ old('stock') }}">
            @if($errors->has('stock'))
                <p>{{ $errors->first('stock') }}</p>
            @endif
        </div>
    <!-- コメント -->
        <div class="form-group">
            <label for="comment">コメント</label>
            <input type="comment" class="form-control" id="comment" name="comment" value="{{ old('comment') }}">
            @if($errors->has('comment'))
                <p>{{ $errors->first('comment') }}</p>
            @endif
        </div>
    <!-- 商品画像 -->
        <div class="form-group">
            <label for="img_path">商品画像</label>
            <input type="file" class="form-control" id="img_path" name="img_path" accept="image/jpg,image/png">
            @if($errors->has('img_path'))
                <p>{{ $errors->first('img_path') }}</p>
            @endif
        </div> 

        
        <div class="form-group row mb-0">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary" style="margin:20px;">
                    {{ __('登録') }}
                </button>
            </div>
        </div>
    </form>

@endsection