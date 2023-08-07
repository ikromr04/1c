@extends('admin.layouts.master')

@section('title', $page->title)

@section('content')
  <main class="services-page">
    <div class="container">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('admin.home') }}">Главная</a>
        </li>
        <li>
          <a>{{ $page->title }}</a>
        </li>
      </ul>
    </div>
    <div class="container services-container">
      <h1 data-table="texts" data-caption="services-heading" class="services-heading">{{ $page['services-heading'] }}</h1>
      <p data-table="texts" data-caption="services-subheading" class="services-subheading">{{ $page['services-subheading'] }}</p>
      <dl class="services-list">
        <div class="services-item" onclick="window.showFeedbackModal()">
          <dt data-table="texts" data-caption="service-first-title">{{ $page['service-first-title'] }}</dt>
          <dd data-table="texts" data-caption="service-first-text">{{ $page['service-first-text'] }}</dd>
        </div>
        <div class="services-item" onclick="window.showFeedbackModal()">
          <dt data-table="texts" data-caption="service-second-title">{{ $page['service-second-title'] }}</dt>
          <dd data-table="texts" data-caption="service-second-text">{{ $page['service-second-text'] }}</dd>
        </div>
        <div class="services-item" onclick="window.showFeedbackModal()">
          <dt data-table="texts" data-caption="service-third-title">{{ $page['service-third-title'] }}</dt>
          <dd data-table="texts" data-caption="service-third-text">{{ $page['service-third-text'] }}</dd>
        </div>
        <div class="services-item" onclick="window.showFeedbackModal()">
          <dt data-table="texts" data-caption="service-fourth-title">{{ $page['service-fourth-title'] }}</dt>
          <dd data-table="texts" data-caption="service-fourth-text">{{ $page['service-fourth-text'] }}</dd>
        </div>
        <div class="services-item" onclick="window.showFeedbackModal()">
          <dt data-table="texts" data-caption="service-fifth-title">{{ $page['service-fifth-title'] }}</dt>
          <dd data-table="texts" data-caption="service-fifth-text">{{ $page['service-fifth-text'] }}</dd>
        </div>
        <div class="services-item" onclick="window.showFeedbackModal()">
          <dt data-table="texts" data-caption="service-sixth-title">{{ $page['service-sixth-title'] }}</dt>
          <dd data-table="texts" data-caption="service-sixth-text">{{ $page['service-sixth-text'] }}</dd>
        </div>
      </dl>

      <p data-table="texts" data-caption="be-familiar" class="be-familiar">{{ $page['be-familiar'] }}</p>
      <label for="service-file" class="link link--yellow services-download-link">
        <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M11.59 6H10V1C10 0.45 9.55 0 9 0H5C4.45 0 4 0.45 4 1V6H2.41C1.52 6 1.07 7.08 1.7 7.71L6.29 12.3C6.68 12.69 7.31 12.69 7.7 12.3L12.29 7.71C12.92 7.08 12.48 6 11.59 6ZM0 16C0 16.55 0.45 17 1 17H13C13.55 17 14 16.55 14 16C14 15.45 13.55 15 13 15H1C0.45 15 0 15.45 0 16Z" fill="#323232" />
        </svg>
        Изменить файл
      </label>
      <p data-table="texts" data-caption="valid-date" class="services-valid-date">{{ $page['valid-date'] }}</p>
      <form action="{{ route('services.change.file') }}" method="post" onchange="this.submit();" enctype="multipart/form-data">
        @csrf
        <input class="visually-hidden" type="file" name="file" id="service-file" style="position: relative;">
      </form>
    </div>
  </main>
@endsection
