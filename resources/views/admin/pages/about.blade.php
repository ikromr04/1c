@extends('admin.layouts.master')

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
          <h2 data-table="texts" data-caption="how-began-title">{{$page['how-began-title']}}</h2>
          <div class="how-began-text-wrap">
            <p data-table="texts" data-caption="how-began-text" class="how-began-text">{{$page['how-began-text']}}</p>
            <form class="how-began-form hidden" action="{{route('texts')}}" method="post">
              @csrf
              <input name="caption" type="hidden" value="how-began-text">
              <textarea class="how-began-textarea" name="text">{{$page['how-began-text']}}</textarea>
              <div class="how-began-btn-wrapper">
                <button type="submit">Редактировать</button>
                <button type="button" onclick="location.reload()">Отмена</button>
              </div>
            </form>
          </div>
        </section>

        <section class="mission">
          <h2 data-table="texts" data-caption="mission-title">{{$page['mission-title']}}</h2>
          <p data-table="texts" data-caption="mission-text" class="mission-text">{{$page['mission-text']}}</p>
        </section>

        <section class="vision">
          <h2 data-table="texts" data-caption="vision-title">{{$page['vision-title']}}</h2>
          <p data-table="texts" data-caption="vision-text" class="vision-text">{{$page['vision-text']}}</p>
        </section>

        <section class="values">
          <h2 data-table="texts" data-caption="values-title">{{$page['values-title']}}</h2>
          <ul class="values-list">
            <li data-table="texts" data-caption="values-knowledge">{{$page['values-knowledge']}}</li>
            <li data-table="texts" data-caption="values-client">{{$page['values-client']}}</li>
            <li data-table="texts" data-caption="values-transparency">{{$page['values-transparency']}}</li>
            <li data-table="texts" data-caption="values-integration">{{$page['values-integration']}}</li>
          </ul>
        </section>
      </div>
    </div>

    <section class="success-steps">
      <div class="container success-container">
        <h2 data-table="texts" data-caption="success-title">{!! $page['success-title'] !!}</h2>
        <div data-table="texts" data-caption="success-subtitle" class="success-subtitle">{!! $page['success-subtitle'] !!}</div>

        <ol class="success-list">
          @foreach ($page['success-steps'] as $key => $step)
            <li><i>{{($key + 1)}}</i>
              <div data-table="success-steps" data-id="{{$step->id}}">{{$step->text}}</div>
            </li>
          @endforeach
        </ol>

        <a data-table="texts" data-caption="projects-link" class="link link--yellow success-projects-link" href="{{route('admin.projects')}}">{{$page['projects-link']}}</a>
        <img class="success-hand-red" src="{{asset('img/hand-red.png')}}" alt="hand">
        <img class="success-hand" src="{{asset('img/hand.png')}}" alt="hand">
      </div>
    </section>

    <section class="team">
      <div class="container team-container">
        <h2 data-table="texts" data-caption="team-title">{{$page['team-title']}}</h2>
        <div data-table="texts" data-caption="team-subtitle" class="team-subtitle">{{$page['team-subtitle']}}</div>

        <ul class="team-members">
          @foreach ($page['members'] as $member)
            <li data-table="members" data-id="{{$member->id}}" data-name="{{$member->name}}" data-position="{{$member->position}}" data-src="{{asset('img')}}">
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
        <h2 data-table="texts" data-caption="certificates-title">{{$page['certificates-title']}}</h2>
        <p data-table="texts" data-caption="certificates-subtitle" class="certificates-subtitle">{{$page['certificates-subtitle']}}</p>

        <ul class="certificates-list">
          @foreach ($page['certificates'] as $certificate)
            <li class="certificates-item">
              <a data-table="certificates" data-id="{{$certificate->id}}" data-img="{{$certificate->img}}" data-src="{{asset('img')}}" class="certificates-link" href="{{asset('img/certificates/' . $certificate->img)}}">
                <img class="certificates-img" src="{{asset('img/certificates/thumbs/' . $certificate->img)}}" alt="Сертификат">
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </section>
  </main>
@endsection