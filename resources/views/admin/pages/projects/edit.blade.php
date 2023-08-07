@extends('admin.layouts.master')

@section('title', $page->title)

@section('content')
  <main class="edit-project-page">
    <div class="container">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('admin.home') }}">Главная</a>
        </li>
        <li>
          <a href="{{ route('admin.' . $page->route) }}">{{ $page->title }}</a>
        </li>
        <li>
          <a>{{ $project->title }}</a>
        </li>
      </ul>
    </div>

    <section class="our-projects">
      <div class="container">
        <form class="project-item" action="{{ route('projects.update') }}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$project->id}}">
          <div class="project-logo-wrapper">
            <label for="project-logo">
              <img id="image" src="{{ asset('img/companies/' . $project->logo) }}" alt="Логотип проекта" style="object-fit: cover;">
            </label>
            <input class="visually-hidden" name="logo" id="project-logo" type="file" oninput="window.previewProjectLogo()">
            <input type="text" name="title" placeholder="Название проекта" style="width: 100%;" value="{{ old('title') ? old('title') : $project->title }}">
          </div>
          <div class="project-description-wrapper">
            <textarea class="description-title" name="description_title" placeholder="Заголовок описании">{{ old('description_title') ? old('description_title') : $project->description_title }}</textarea>
            <textarea class="description" name="description" placeholder="Описание">{{ old('description') ? old('description') : $project->description }}</textarea>
          </div>
          <div class="project-content-wrapper" style="height: max-content;">
            <div class="project-content">
              <textarea name="content" id="simditor" placeholder="Контент">{{ old('content') ? old('content') : $project->content }}</textarea>
              <div class="btn-wrapper">
                <button type="submit">Редактировать</button>
                <button type="reset" onclick="location.reload()">Сбросить</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
@endsection
