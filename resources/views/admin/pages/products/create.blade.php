@extends('admin.layouts.master')

@section('title', 'Новый продукт')

@section('content')
  <main class="create-product-page">
    <div class="container">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('admin.home') }}">Главная</a>
        </li>
        <li>
          <a>{{ $productPage->title }}</a>
        </li>
        <li>
          <a>Добавить новый продукт</a>
        </li>
      </ul>

      <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        <dl class="product-item">
          <dt class="product-head">
            @csrf
            <div class="pic-wrapper">
              <label for="picture">
                <img class="picture" src="{{ asset('img/products/default.png') }}" alt="Картинка продукта">
              </label>
              <input class="visually-hidden" id="picture" type="file" name="picture" onchange="window.previewProductPicture()">
            </div>
            <input class="product-title-input" type="text" name="title" placeholder="Название продукта" value="{{ old('title') }}" required>
            <textarea class="" name="description" data-type="simditor">{!! old('description') !!}</textarea>
          </dt>
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
          <button type="submit">Добавить</button>
        </div>
      </form>
    </div>
  </main>
@endsection
