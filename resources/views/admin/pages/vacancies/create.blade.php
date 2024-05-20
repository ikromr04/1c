@extends('admin.layouts.master')

@section('title', 'Вакансии')

@section('content')
  <main class="create-project-page">
    <div class="container">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('admin.home') }}">Главная</a>
        </li>
        <li>
          <a href="{{ route('admin.vacancies') }}">Вакансии</a>
        </li>
        <li>
          <a>Добавить</a>
        </li>
      </ul>
    </div>

    <section class="our-projects">
      <div class="container">
        <form class="project-item project-item--form" action="{{ route('vacancies.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="project-description-wrapper" style="width: 100%; height: 240px">
            <div class="project-content">
              <textarea class="description" id="desc" name="description" placeholder="Описание">{{ old('description') }}</textarea>
            </div>
          </div>
          <div class="project-content-wrapper" style="height: max-content;">
            <div class="project-content">
              <textarea name="content" id="simditor" placeholder="Контент">{{ old('content') }}</textarea>
              <div class="btn-wrapper">
                <button type="submit">Добавить</button>
                <button type="reset">Сбросить</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
@endsection
