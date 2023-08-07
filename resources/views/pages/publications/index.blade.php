@extends('layouts.master')

@section('title', $page->title)

@section('content')
  <main class="publications-page">
    <div class="container">
      <ul class="breadcrumbs">
        <li>
          <a href="{{route('home')}}">Главная</a>
        </li>
        <li>
          <a>{{$page->title}}</a>
        </li>
      </ul>
    </div>
    <section class="publications">
      <div class="container publications-container">
        <div class="publications-head">
          <h1>{{$page['publications-heading'] }}</h1>
          <ul class="publications-navigation">
            <li>
              <a class="publications-navigation-link {{isset($category) ? '' : 'current'}}" href="{{route('publications')}}">{!! $page['publications-all'] !!}</a>
            </li>
            <li>
              <a class="publications-navigation-link {{(isset($category) && $category == 1) ? 'current' : ''}}" href="{{route('publications')}}?category=1">{!! $page['publications-news'] !!}</a>
            </li>
            <li>
              <a class="publications-navigation-link {{(isset($category) && $category == 2) ? 'current' : ''}}" href="{{route('publications')}}?category=2">{!! $page['publications-article'] !!}</a>
            </li>
          </ul>
        </div>

        <ul class="publications-list">
          @foreach ($page['publications'] as $publication)
            <li>
              <x-publication :publication="$publication" />
            </li>
          @endforeach
        </ul>

        {{$page['publications']->withQueryString()->links('components/pagination')}}
      </div>
    </section>
  </main>
@endsection