@extends('layouts.master')

@section('title', $page->title)

@section('content')
  <main class="about-page">
    <div class="container">
      <ul class="breadcrumbs">
        <li>
          <a href="{{route('home')}}">Главная</a>
        </li>
        <li>
          <a>{{$page->title}}</a>
        </li>
      </ul>

      <div class="about-grid">
        <section class="how-began">
          <h2>{{$page['how-began-title']}}</h2>
          <p class="how-began-text">{{$page['how-began-text']}}</p>
        </section>

        <section class="mission">
          <h2>{{$page['mission-title']}}</h2>
          <p class="mission-text">{{$page['mission-text']}}</p>
        </section>

        <section class="vision">
          <h2>{{$page['vision-title']}}</h2>
          <p class="vision-text">{{$page['vision-text']}}</p>
        </section>

        <section class="values">
          <h2>{{$page['values-title']}}</h2>
          <ul class="values-list">
            <li>{{$page['values-knowledge']}}</li>
            <li>{{$page['values-client']}}</li>
            <li>{{$page['values-transparency']}}</li>
            <li>{{$page['values-integration']}}</li>
          </ul>
        </section>
      </div>
    </div>

    <section class="success-steps">
      <div class="container success-container">
        <h2>{{$page['success-title']}}</h2>
        <p class="success-subtitle">{{$page['success-subtitle']}}</p>

        <ol class="success-list">
          @foreach ($page['success-steps'] as $key => $step)
            <li><i>{{($key + 1)}}</i>{{$step->text}}</li>
          @endforeach
        </ol>

        <a class="link link--yellow success-projects-link" href="{{route('projects')}}">{{$page['projects-link']}}</a>
        <img class="success-hand-red" src="{{asset('img/hand-red.png')}}" alt="hand">
        <img class="success-hand" src="{{asset('img/hand.png')}}" alt="hand">
      </div>
    </section>

    <section class="team">
      <div class="container team-container">
        <h2>{{$page['team-title']}}</h2>
        <p class="team-subtitle">{{$page['team-subtitle']}}</p>

        <ul class="team-members">
          @foreach ($page['members'] as $member)
            <li>
              <img src="{{asset('img/members/' . $member->avatar)}}" alt="{{$member->name}}">
              <h3>{{$member->name}}</h3>
              <p>{{$member->position}}</p>
            </li>
          @endforeach
        </ul>
      </div>
    </section>

    <section class="certificates">
      <div class="container certificates-container">
        <h2>{{$page['certificates-title']}}</h2>
        <p class="certificates-subtitle">{{$page['certificates-subtitle']}}</p>

        <ul class="certificates-list">
          @foreach ($page['certificates'] as $certificate)
            <li class="certificates-item">
              <a class="certificates-link" href="{{asset('img/certificates/' . $certificate->img)}}">
                <img class="certificates-img" src="{{asset('img/certificates/thumbs/' . $certificate->img)}}" alt="Сертификат" oncontextmenu="return false">
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </section>
  </main>
@endsection