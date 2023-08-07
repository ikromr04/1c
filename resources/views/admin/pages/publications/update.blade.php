@extends('admin.layouts.master')

@section('content')
  <main class="publications-create-page">
    <div class="container">
      <form class="publications-create-form" action="{{route('publications.update')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$publication->id}}">
        <select name="category">
          @php
            !old('category') ? $old = $publication->category->id : $old = old('category');
          @endphp
          @foreach ($categories as $category)
            <option value="{{$category->id}}" {{$old == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
          @endforeach
        </select>
        <label>Автор:
          <input type="text" name="author" placeholder="Имя автора" value="{{old('author') ? old('author') : $publication->author}}">
        </label>
        <textarea name="title" placeholder="Заголовок публикации">{{old('title') ? old('title') : $publication->title}}</textarea>
        <textarea name="content" id="simditor">{{old('content') ? old('content') : $publication->content}}</textarea>
        <div class="btn-wrapper">
          <button type="submit">Редактировать</button>
          <button type="reset" onclick="location.reload()">Сбросить</button>
        </div>
      </form>
    </div>
  </main>
@endsection