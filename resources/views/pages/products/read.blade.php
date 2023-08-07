@extends('layouts.master')

@section('title', $product->title)

@section('meta-tags')
  @php
  //remove tags and slice body
  $share_text = preg_replace('#<[^>]+>#', ' ', $product->description);
  $share_text = mb_strlen($share_text) < 170 ? $share_text : mb_substr($share_text, 0, 166) . '...';
  @endphp
  <meta name="description" content="{{ $share_text }}">
  <meta property="og:description" content="{{ $share_text }}">
  <meta property="og:title" content="{{ $product->title }}" />
  <meta property="og:image" content="{{ asset('img/products/' . $product->picture) }}">
  <meta property="og:image:alt" content="{{ $product->title }}">
  <meta name="twitter:title" content="{{ $product->title }}">
  <meta name="twitter:image" content="{{ asset('img/products/' . $product->picture) }}">
@endsection

@section('content')
  <main class="products-page">
    <div class="container">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home') }}">Главная</a>
        </li>
        <li>
          <a>{{ $productPage->title }}</a>
        </li>
        <li>
          <a>{{ $product->title }}</a>
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
