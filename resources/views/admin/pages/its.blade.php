@extends('admin.layouts.master')

@section('title', $page->title)

@section('content')
  <main class="its-page">
    <div class="container">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('admin.home') }}">Главная</a>
        </li>
        <li>
          <a>{{ $page->title }}</a>
        </li>
      </ul>

      <section class="its-introduction">
        <div class="its-introduction-left">
          <h2 data-table="texts" data-caption="its-introduction-heading">{{ $page['its-introduction-heading'] }}</h2>
          <p data-table="texts" data-caption="its-introduction-p1">{!! $page['its-introduction-p1'] !!}</p>
          <p data-table="texts" data-caption="its-introduction-p2">{!! $page['its-introduction-p2'] !!}</p>
          <p data-table="texts" data-caption="its-introduction-p3">{!! $page['its-introduction-p3'] !!}</p>
          <p data-table="texts" data-caption="its-introduction-p4">{!! $page['its-introduction-p4'] !!}</p>
        </div>
        <div class="its-introduction-right">
          <p data-table="texts" data-caption="its-introduction-warning">{{ $page['its-introduction-warning'] }}</p>
        </div>
      </section>

      <section class="its-benefits">
        <h2 data-table="texts" data-caption="its-benefits-heading">{{ $page['its-benefits-heading'] }}</h2>
        <p data-table="texts" data-caption="its-benefits-subheading">{{ $page['its-benefits-subheading'] }}</p>
        <ul class="its-benefits-list">
          <li data-table="texts" data-caption="its-benefits-item1" class="its-benefits-item">{{ $page['its-benefits-item1'] }}</li>
          <li data-table="texts" data-caption="its-benefits-item2" class="its-benefits-item">{{ $page['its-benefits-item2'] }}</li>
          <li data-table="texts" data-caption="its-benefits-item3" class="its-benefits-item">{{ $page['its-benefits-item3'] }}</li>
        </ul>
      </section>

      <section class="its-price">
        <h2 data-table="texts" data-caption="its-price-heading">{{ $page['its-price-heading'] }}</h2>
        <p data-table="texts" data-caption="its-price-subheading">{{ $page['its-price-subheading'] }}</p>
        <ul class="its-price-list">
          <li class="its-price-item">
            <p data-table="texts" data-caption="its-item-price1" class="its-item-price">{{ $page['its-item-price1'] }}</p>
            <div class="its-price-inner">
              <dl class="price-definition-list">
                <div data-table="texts" data-caption="its-price-validity1">{!! $page['its-price-validity1'] !!}</div>
                <div data-table="texts" data-caption="its-price-users1">{!! $page['its-price-users1'] !!}</div>
              </dl>
              <button type="button" onclick="window.showFeedbackModal()"></button>
            </div>
          </li>
          <li class="its-price-item">
            <p data-table="texts" data-caption="its-item-price2" class="its-item-price">{{ $page['its-item-price2'] }}</p>
            <div class="its-price-inner">
              <dl class="price-definition-list">
                <div data-table="texts" data-caption="its-price-validity2">{!! $page['its-price-validity2'] !!}</div>
                <div data-table="texts" data-caption="its-price-users2">{!! $page['its-price-users2'] !!}</div>
              </dl>
              <button type="button" onclick="window.showFeedbackModal()"></button>
            </div>
          </li>
          <li class="its-price-item">
            <p data-table="texts" data-caption="its-item-price3" class="its-item-price">{{ $page['its-item-price3'] }}</p>
            <div class="its-price-inner">
              <dl class="price-definition-list">
                <div data-table="texts" data-caption="its-price-validity3">{!! $page['its-price-validity3'] !!}</div>
                <div data-table="texts" data-caption="its-price-users3">{!! $page['its-price-users3'] !!}</div>
              </dl>
              <button type="button" onclick="window.showFeedbackModal()"></button>
            </div>
          </li>
          <li class="its-price-item">
            <p data-table="texts" data-caption="its-item-price4" class="its-item-price">{{ $page['its-item-price4'] }}</p>
            <div class="its-price-inner">
              <dl class="price-definition-list">
                <div data-table="texts" data-caption="its-price-validity4">{!! $page['its-price-validity4'] !!}</div>
                <div data-table="texts" data-caption="its-price-users4">{!! $page['its-price-users4'] !!}</div>
              </dl>
              <button type="button" onclick="window.showFeedbackModal()"></button>
            </div>
          </li>
          <li class="its-price-item">
            <p data-table="texts" data-caption="its-item-price5" class="its-item-price">{{ $page['its-item-price5'] }}</p>
            <div class="its-price-inner">
              <dl class="price-definition-list">
                <div data-table="texts" data-caption="its-price-validity5">{!! $page['its-price-validity5'] !!}</div>
                <div data-table="texts" data-caption="its-price-users5">{!! $page['its-price-users5'] !!}</div>
              </dl>
              <button type="button" onclick="window.showFeedbackModal()"></button>
            </div>
          </li>
          <li class="its-price-item">
            <p data-table="texts" data-caption="its-item-price6" class="its-item-price">{{ $page['its-item-price6'] }}</p>
            <div class="its-price-inner">
              <dl class="price-definition-list">
                <div data-table="texts" data-caption="its-price-validity6">{!! $page['its-price-validity6'] !!}</div>
                <div data-table="texts" data-caption="its-price-users6">{!! $page['its-price-users6'] !!}</div>
              </dl>
              <button type="button" onclick="window.showFeedbackModal()"></button>
            </div>
          </li>
        </ul>
      </section>
    </div>
  </main>
@endsection
