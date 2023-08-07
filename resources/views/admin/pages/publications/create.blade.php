@extends('admin.layouts.master')

@section('content')
  <main class="publications-create-page">
    <div class="container">
      <form class="publications-create-form" action="{{route('publications.create')}}" method="post">
        @csrf
        <select name="category">
          <option value="" disabled {{old('category') ? '' : 'selected'}}>Выберите категорию</option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}" {{old('category') ? (old('category') == $category->id ? 'selected' : '') : ''}}>{{$category->title}}</option>
          @endforeach
        </select>
        <label>Автор:
          <input type="text" name="author" placeholder="Имя автора" value="{{old('author')}}">
        </label>
        <textarea name="title" placeholder="Заголовок публикации">{{old('title')}}</textarea>
        <textarea name="content" id="simditor">{{old('content')}}</textarea>
        <div class="btn-wrapper">
          <button type="submit">Добавить</button>
          <button type="reset" onclick="location.reload()">Сбросить</button>
        </div>
      </form>
    </div>
  </main>
@endsection