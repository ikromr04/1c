<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="robots" content="none">
    <meta name="googlebot" content="noindex, nofollow">
    <meta name="yandex" content="none">
    <title>@yield('title') {{$route != 'home' ? '- 1С:Франчайзи' : ''}}</title>
    {{-- Owl carousel --}}
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    {{-- International Telephone Input With Flags and Dial Codes (jquery plugin) --}}
    <link rel="stylesheet" href="{{asset('css/intlTelInput.min.css')}}">
    {{-- Simditor Styles --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/simditor.css')}}">
    {{-- Responsive Touch-enabled Image Lightbox Plugin --}}
    <link rel="stylesheet" href="{{asset('css/simple-lightbox.min.css')}}">
    {{-- App Styles --}}
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    {{-- Admin Styles --}}
    <link rel="stylesheet" href="{{mix('css/admin.css')}}">
  </head>
  <body>
    <div class="modal modal--fail {{session()->has('fail') ? '' : 'hidden'}}">{{session()->get('fail')}}</div>
    <div class="modal modal--success {{session()->has('success') ? '' : 'hidden'}}">{{session()->get('success')}}</div>
    @if ($errors->any())
      <div class="modal modal--fail">
        <ul class="form-errors">
          @foreach ($errors->all() as $error)
            <li class="form-errors__item">{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    {{-- => background decorations --}}
    <ul class="ellipses-list">
      <li class="ellipses-item"></li>
      <li class="ellipses-item"></li>
      <li class="ellipses-item"></li>
      <li class="ellipses-item"></li>
      <li class="ellipses-item"></li>
    </ul>
    {{-- background decorations <= --}}
    @include('admin.layouts.header')
    
    @yield('content')

    @include('admin.layouts.footer')

    @include('admin.layouts.forms')

    @include('admin.layouts.actions')

    <a class="logout-link" href="{{route('logout')}}">Выйти</a>
    
    <!-- JQuery 3.6  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- Owl carousel --}}
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    {{-- International Telephone Input With Flags and Dial Codes (jquery plugin) --}}
    <script src="{{asset('js/intlTelInput-jquery.min.js')}}"></script>
    {{-- Simditor Scripts --}}
    <script type="text/javascript" src="{{asset('js/module.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/hotkeys.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/uploader.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/simditor.js')}}"></script>
    {{-- Responsive Touch-enabled Image Lightbox Plugin --}}
    <script src="{{asset('js/simple-lightbox.min.js')}}"></script>
    {{-- App Scripts --}}
    <script src="{{mix('js/app.js')}}"></script>
    {{-- Admin Scripts --}}
    <script src="{{mix('js/admin.js')}}"></script>
  </body>
</html>