@extends('layouts.master')

@section('title', $publication->title)

@section('meta-tags')
  @php
  //remove tags and slice body
  $share_text = preg_replace('#<[^>]+>#', ' ', $publication->content);
  $share_text = mb_strlen($share_text) < 170 ? $share_text : mb_substr($share_text, 0, 166) . '...';
  @endphp
  <meta name="description" content="{{ $share_text }}">
  <meta property="og:description" content="{{ $share_text }}">
  <meta property="og:title" content="{{ $publication->title }}" />
  <meta property="og:image:alt" content="{{ $publication->title }}">
  <meta name="twitter:title" content="{{ $publication->title }}">
@endsection

@section('content')
  <main class="publications-read-page">
    <div class="container">
      <ul class="breadcrumbs">
        <li>
          <a href="{{route('home')}}">Главная</a>
        </li>
        <li>
          <a href="{{route('publications')}}">{{$publication['page']}}</a>
        </li>
        <li>
          <a href="{{route('publications')}}?category={{$publication->category_id}}">{{$publication->category->title}}</a>
        </li>
        <li>
          <a>{{$publication->title}}</a>
        </li>
      </ul>
    </div>

    <section class="read-publication">
      <div class="container">
        <time datetime="{{$publication->created_at}}">{{date("d.m.Y", strtotime($publication->created_at));}}</time>
        <p class="publication-category">Автор: {{$publication->author}}</p>
        <h1>{{$publication->title}}</h1>
        <div class="simdit">{!! $publication->content !!}</div>
        <a class="link publication-link" href="{{route('publications')}}">Вернуться ко всем публикациям</a>
      </div>
    </section>

    <section class="publications-carousel">
      <div class="container">
        <div class="owl-carousel">
          @foreach ($publications as $publication)
            <x-publication :publication="$publication" />
          @endforeach
        </div>
      </div>
    </section>
  </main>
@endsection
