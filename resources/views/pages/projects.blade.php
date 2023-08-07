@extends('layouts.master')

@section('title', $page->title)

@section('content')
  <main class="projects-page">
    <div class="container">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home') }}">Главная</a>
        </li>
        <li>
          <a>{{ $page->title }}</a>
        </li>
      </ul>
    </div>
    <section class="our-projects">
      <div class="container">
        <h1 class="our-projects-heading">{{ $page['our-projects-heading'] }}</h1>
        <p class="our-projects-subheading">{{ $page['our-projects-subheading'] }}</p>

        <ul class="our-projects-list">
          @foreach ($page['projects'] as $project)
            <li class="project-item content-hidden">
              <div class="project-logo-wrapper">
                <img src="{{ asset('img/companies/' . $project->logo) }}" alt="{{ $project->title }}">
              </div>
              <div class="project-description-wrapper">
                <h3>{{ $project->description_title }}</h3>
                <p>{{ $project->description }}</p>
              </div>
              <div class="project-content-wrapper">
                <div class="project-content">{!! $project->content !!}</div>
              </div>
              <div class="project-btn-wrapper">
                <button type="button" onclick="window.toggleProjectContent(this.closest('li'))"></button>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </section>

    <section class="companies">
      <div class="container companies-container">
        <h2 class="companies-title">{{ $home['companies-title'] }}</h2>
        <div class="owl-carousel companies-carousel">
          @foreach ($home['companies'] as $company)
            <a class="company" href="{{ $company->site }}" target="_blank" tabindex="-1">
              <img class="company-logo" src="{{ asset('img/companies/' . $company->logo) }}" alt="{{ $company->title }}">
              <h3 class="company-title">{{ $company->title }}</h3>
              {{-- <p class="company-category">{{ $company->category }}</p> --}}
            </a>
          @endforeach
        </div>
      </div>
    </section>
  </main>
@endsection
