@extends('admin.layouts.master')

@section('title', $product->title)

@section('content')
  <main class="edit-product-page">
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

      <form action="{{ route('products.update') }}" method="post" enctype="multipart/form-data">
        <dl class="product-item">
          <dt class="product-head">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <div class="pic-wrapper">
              <label for="picture">
                <img class="picture" src="{{ asset('img/products/' . $product->picture) }}" alt="Картинка продукта">
              </label>
              <input class="visually-hidden" id="picture" type="file" name="picture" onchange="window.previewProductPicture()">
            </div>
            <input class="product-title-input" type="text" name="title" placeholder="Название продукта" value="{{ old('title') ? old('title') : $product->title }}" required>
            <textarea class="" name="description" data-type="simditor">{!! old('description') ? old('description') : $product->description !!}</textarea>
          </dt>
          @foreach ($product->contents as $content)
            <dd class="product-content">
              <input type="hidden" data-name="content-id" value="{{ $content->id }}">
              <button class="product-content-delete" type="button" onclick="window.deleteProductContent(this.parentElement, {{ $content->id }})">x</button>
              <textarea data-name="content-editable" data-type="simditor">{!! $content->content !!}</textarea>
            </dd>
          @endforeach
          <template id="product-content">
            <dd class="product-content">
              <button class="product-content-delete" type="button" onclick="this.parentElement.remove()">x</button>
              <textarea data-name="content" data-type="simditor"></textarea>
            </dd>
          </template>
        </dl>
        <button class="add-product-content" type="button" onclick="window.addNewProductContent()">+</button>
        <div class="btn-wrapper">
          <button type="reset" onclick="location.reload()">Сбросить</button>
          <button type="submit">Редактировать</button>
        </div>
      </form>
    </div>
  </main>
@endsection
