@extends('admin.layouts.master')

@section('title', $product->title)

@section('content')
  <main class="products-page">
    <div class="container">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('admin.home') }}">Главная</a>
        </li>
        <li>
          <a>{{ $productPage->title }}</a>
        </li>
        <li>
          <a data-table="products" data-product-id="{{ $product->id }}">{{ $product->title }}</a>
        </li>
      </ul>

      <dl class="product-item">
        <dt class="product-head">
          <div class="pic-wrapper">
            <img class="picture" src="{{ asset('img/products/' . $product->picture) }}" alt="{{ $product->title }}">
          </div>
          <h1>{{ $product->title }}</h1>
          <div class="product-description">{!! $product->description !!}</div>
        </dt>
        @foreach ($product->contents as $content)
          <dd class="product-content">{!! $content->content !!}</dd>
        @endforeach
      </dl>
    </div>
  </main>
@endsection
