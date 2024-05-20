@extends('admin.layouts.master')

@section('title', 'Вакансии')

@section('content')
  <main class="projects-page">
    <div class="container">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('admin.home') }}">Главная</a>
        </li>
        <li>
          <a>Вакансии</a>
        </li>
      </ul>
    </div>

    <section class="our-projects">
      <div class="container">
        <h1 class="our-projects-heading">Наши вакансии</h1>
        <p class="our-projects-subheading">Сопровождение всех ниже указанных вакансий
          продолжается по сей день.</p>

        <ul class="our-projects-list">
          @foreach ($page['vacancies'] as $vacancy)
            <li data-table="vacancy" data-id="{{ $vacancy->id }}" class="project-item project-item--vacancy content-hidden">
              <div class="project-description-wrapper">
                <div class="project-content">{!! $vacancy->description !!}</div>
              </div>
              <div class="project-content-wrapper">
                <div class="project-content">{!! $vacancy->content !!}</div>
                <form action="{{ route('vacancies.send') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="title" value="title">
                  <label class="button" style="max-width: max-content;
                  background: radial-gradient(269.69% 100% at 50% 100%, rgba(230, 36, 43, 0.2) 0%, rgba(239, 105, 27, 0.2) 37.5%, rgba(255, 221, 0, 0.2) 100%), linear-gradient(0deg, #FFDD00, #FFDD00), #FFFFFF;
                  height: 40px; margin-bottom: 32px">
                    Добавить резюме
                    <input class="visually-hidden" type="file" name="cv" onchange="this.closest('form').submit()">
                  </label>
                </form>
              </div>
              <div class="project-btn-wrapper">
                <button type="button" onclick="window.toggleProjectContent(this.closest('li'))"></button>
              </div>
            </li>
          @endforeach
          <li class="project-item project-item--add-vacancy">
            <a href="{{ route('admin.vacancies.create') }}">+ Добавить</a>
          </li>
        </ul>
      </div>
    </section>
  </main>
@endsection
