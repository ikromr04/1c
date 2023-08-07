@extends('layouts.master')

@section('title', $page->title)

@section('content')
  <main class="its-page">
    <div class="container">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home') }}">Главная</a>
        </li>
        <li>
          <a>{{ $page->title }}</a>
        </li>
      </ul>

      <section class="its-introduction">
        <div class="its-introduction-left">
          <h2>{{ $page['its-introduction-heading'] }}</h2>
          <p>{!! $page['its-introduction-p1'] !!}</p>
          <p>{!! $page['its-introduction-p2'] !!}</p>
          <p>{!! $page['its-introduction-p3'] !!}</p>
          <p>{!! $page['its-introduction-p4'] !!}</p>
        </div>
        <div class="its-introduction-right">
          <p>{{ $page['its-introduction-warning'] }}</p>
        </div>
      </section>

      <section class="its-benefits">
        <h2>{{ $page['its-benefits-heading'] }}</h2>
        <p>{{ $page['its-benefits-subheading'] }}</p>
        <ul class="its-benefits-list">
          <li class="its-benefits-item">{{ $page['its-benefits-item1'] }}</li>
          <li class="its-benefits-item">{{ $page['its-benefits-item2'] }}</li>
          <li class="its-benefits-item">{{ $page['its-benefits-item3'] }}</li>
        </ul>
      </section>

      <section class="its-price">
        <h2>{{ $page['its-price-heading'] }}</h2>
        <p>{{ $page['its-price-subheading'] }}</p>
        <ul class="its-price-list">
          <li class="its-price-item">
            <p class="its-item-price">{{ $page['its-item-price1'] }}</p>
            <div class="its-price-inner">
              <dl class="price-definition-list">
                <div>{!! $page['its-price-validity1'] !!}</div>
                <div>{!! $page['its-price-users1'] !!}</div>
              </dl>
              <button type="button" onclick="window.showFeedbackModal()"></button>
            </div>
          </li>
          <li class="its-price-item">
            <p class="its-item-price">{{ $page['its-item-price2'] }}</p>
            <div class="its-price-inner">
              <dl class="price-definition-list">
                <div>{!! $page['its-price-validity2'] !!}</div>
                <div>{!! $page['its-price-users2'] !!}</div>
              </dl>
              <button type="button" onclick="window.showFeedbackModal()"></button>
            </div>
          </li>
          <li class="its-price-item">
            <p class="its-item-price">{{ $page['its-item-price3'] }}</p>
            <div class="its-price-inner">
              <dl class="price-definition-list">
                <div>{!! $page['its-price-validity3'] !!}</div>
                <div>{!! $page['its-price-users3'] !!}</div>
              </dl>
              <button type="button" onclick="window.showFeedbackModal()"></button>
            </div>
          </li>
          <li class="its-price-item">
            <p class="its-item-price">{{ $page['its-item-price4'] }}</p>
            <div class="its-price-inner">
              <dl class="price-definition-list">
                <div>{!! $page['its-price-validity4'] !!}</div>
                <div>{!! $page['its-price-users4'] !!}</div>
              </dl>
              <button type="button" onclick="window.showFeedbackModal()"></button>
            </div>
          </li>
          <li class="its-price-item">
            <p class="its-item-price">{{ $page['its-item-price5'] }}</p>
            <div class="its-price-inner">
              <dl class="price-definition-list">
                <div>{!! $page['its-price-validity5'] !!}</div>
                <div>{!! $page['its-price-users5'] !!}</div>
              </dl>
              <button type="button" onclick="window.showFeedbackModal()"></button>
            </div>
          </li>
          <li class="its-price-item">
            <p class="its-item-price">{{ $page['its-item-price6'] }}</p>
            <div class="its-price-inner">
              <dl class="price-definition-list">
                <div>{!! $page['its-price-validity6'] !!}</div>
                <div>{!! $page['its-price-users6'] !!}</div>
              </dl>
              <button type="button" onclick="window.showFeedbackModal()"></button>
            </div>
          </li>
        </ul>
      </section>
    </div>
  </main>
@endsection
