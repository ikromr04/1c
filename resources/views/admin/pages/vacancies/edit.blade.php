@extends('admin.layouts.master')

@section('title', 'Вакансии')

@section('content')
  <main class="edit-project-page">
    <div class="container">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('admin.home') }}">Главная</a>
        </li>
        <li>
          <a href="{{ route('admin.vacancies') }}">Вакансии</a>
        </li>
        <li>
          <a>Редактирование</a>
        </li>
      </ul>
    </div>

    <section class="our-projects">
      <div class="container">
        <form class="project-item project-item--form" action="{{ route('vacancies.update') }}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{ $vacancy->id }}">
          <div class="project-description-wrapper" style="width: 100%; height: 240px">
            <div class="project-content">
              <textarea class="description" id="desc" name="description" placeholder="Описание">{{ old('description') ? old('description') : $vacancy->description }}</textarea>
            </div>
          </div>
          <div class="project-content-wrapper" style="height: max-content;">
            <div class="project-content">
              <textarea name="content" id="simditor" placeholder="Контент">{{ old('content') ? old('content') : $vacancy->content }}</textarea>
              <div class="btn-wrapper">
                <button type="submit">Сохранить</button>
                <button type="reset" onclick="location.reload()">Сбросить</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
@endsection
