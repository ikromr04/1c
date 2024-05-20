@extends('layouts.master')

@section('title', 'Вакансии')

@section('content')
  <div class="modal modal--fail {{ session()->has('fail') ? '' : 'hidden' }}">{{ session()->get('fail') }}</div>
  <div class="modal modal--success {{ session()->has('success') ? '' : 'hidden' }}">{{ session()->get('success') }}</div>

  <main class="projects-page">
    <div class="container">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home') }}">Главная</a>
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
            <li class="project-item project-item--vacancy content-hidden">
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
                    <div class="lds-spinner" style="transform: scale(0.8)">
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                      <div></div>
                    </div>
                    Добавить резюме
                    <input class="visually-hidden" type="file" name="cv" onchange="window.sendCV(this)">
                  </label>
                </form>
              </div>
              <div class="project-btn-wrapper">
                <button type="button" onclick="window.toggleProjectContent(this.closest('li'))"></button>
              </div>
            </li>
          @endforeach
        </ul>

        <p style="margin-top: 32px; margin-bottom: 16px;">Если Вы не нашли подходящую вакансию, прикрепите своё резюме для Резерва:</p>
        <form action="{{ route('vacancies.send') }}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="title" value="title">
          <label class="button" style="max-width: max-content;
          background: radial-gradient(269.69% 100% at 50% 100%, rgba(230, 36, 43, 0.2) 0%, rgba(239, 105, 27, 0.2) 37.5%, rgba(255, 221, 0, 0.2) 100%), linear-gradient(0deg, #FFDD00, #FFDD00), #FFFFFF;
          height: 40px; margin-bottom: 32px">
            <div class="lds-spinner" style="transform: scale(0.8)">
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
            </div>
            Прикрепить резюме
            <input class="visually-hidden" type="file" name="cv" onchange="window.sendCV(this)">
          </label>
        </form>
      </div>
    </section>
  </main>
@endsection
