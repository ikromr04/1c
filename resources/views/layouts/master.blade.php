<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="icon" href="{{ asset('favicon/icon.svg') }}" type="image/svg+xml">
  <link rel="apple-touch-icon" href="{{ asset('favicon/180x180.png') }}">
  <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">

  <meta name="keywords" content="1C-Franchasee, 1C-Franchasee TJ, 1C, 1C в Таджикистане, 1C-Franchasee Tajikistan, автоматизация, бухгалтерия" />
  <meta property="og:site_name" content="1C-Franchasee">
  <meta property="og:type" content="object" />
  <meta name="twitter:card" content="summary_large_image">
  @hasSection('meta-tags')
    @yield('meta-tags')
  @else
    <meta name="description" content="Автоматизируем ваши бизнес-процессы. Наша компания является официальным партнером фирмы «1С» и имеет статус «1С:Франчайзи».">
    <meta property="og:description" content="Автоматизируем ваши бизнес-процессы. Наша компания является официальным партнером фирмы «1С» и имеет статус «1С:Франчайзи».">
    <meta property="og:title" content="1C-Franchasee" />
    <meta property="og:image" content="{{ asset('img/favicons/logo.svg') }}">
    <meta property="og:image:alt" content="Логотип компании">
    <meta name="twitter:title" content="1C-Franchasee">
    <meta name="twitter:image" content="{{ asset('img/favicons/logo.svg') }}">
  @endif

  <title>@yield('title') {{ $route != 'home' ? '- 1С:Франчайзи' : '' }}</title>
  {{-- Owl carousel --}}
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
  {{-- International Telephone Input With Flags and Dial Codes (jquery plugin) --}}
  <link rel="stylesheet" href="{{ asset('css/intlTelInput.min.css') }}">
  {{-- Responsive Touch-enabled Image Lightbox Plugin --}}
  <link rel="stylesheet" href="{{ asset('css/simple-lightbox.min.css') }}">
  {{-- App Styles --}}
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123986695-65"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-123986695-65');
  </script>
  <!-- Yandex.Metrika counter -->
  <script type="text/javascript">
    (function(m, e, t, r, i, k, a) {
      m[i] = m[i] || function() {
        (m[i].a = m[i].a || []).push(arguments)
      };
      m[i].l = 1 * new Date();
      k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(88518976, "init", {
      clickmap: true,
      trackLinks: true,
      accurateTrackBounce: true,
      webvisor: true
    });
  </script>
  <noscript>
    <div><img src="https://mc.yandex.ru/watch/88518976" style="position:absolute; left:-9999px;" alt="" /></div>
  </noscript>
  <!-- /Yandex.Metrika counter -->
  {!! htmlScriptTagJsApi() !!}
</head>

<body oncontextmenu="return false">
  {{-- => background decorations --}}
  <ul class="ellipses-list">
    <li class="ellipses-item"></li>
    <li class="ellipses-item"></li>
    <li class="ellipses-item"></li>
    <li class="ellipses-item"></li>
    <li class="ellipses-item"></li>
  </ul>
  {{-- background decorations <= --}}
  @include('layouts.header')

  @yield('content')

  @include('layouts.footer')

  <!-- JQuery 3.6  -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  {{-- Owl carousel --}}
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  {{-- International Telephone Input With Flags and Dial Codes (jquery plugin) --}}
  <script src="{{ asset('js/intlTelInput-jquery.min.js') }}"></script>
  {{-- Responsive Touch-enabled Image Lightbox Plugin --}}
  <script src="{{ asset('js/simple-lightbox.min.js') }}"></script>
  {{-- App Scripts --}}
  <script src="{{ mix('js/app.js') }}"></script>
  <script type="text/JavaScript">
    function killCopy(e) {
                return false
              }
              function reEnable(){
                return true
              }
              document.onselectstart = new Function ("return false")
                if (window.sidebar) {
                  document.onmousedown = killCopy;
                  document.onclick = reEnable;
                }
            </script>
</body>

</html>
