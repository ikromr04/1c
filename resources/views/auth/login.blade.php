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
    <title>1С:Франчайзинг | Вход</title>
    {{-- App Styles --}}
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
  </head>
  <body>
    {{-- =>> background decorations --}}
    <ul class="ellipses-list">
      <li class="ellipses-item"></li>
      <li class="ellipses-item"></li>
      <li class="ellipses-item"></li>
      <li class="ellipses-item"></li>
      <li class="ellipses-item"></li>
    </ul>
    {{-- <<= background decorations --}}
    <main class="login-page">
      <div class="container login-container">
        <form class="feedback-form" action="{{route('auth.check')}}" method="post">
          @csrf
          <label class="feedback-label">
            <input class="feedback-input" name="login" type="text" placeholder="Логин" autofocus autocomplete="off">
          </label>
          <label class="feedback-label">
            <input class="feedback-input" name="password" type="password" placeholder="Пароль" autocomplete="off">
          </label>
          @if (session('fail'))
            <p class="txt-center">{{session('fail')}}</p>
          @endif
          <div class="feedback-btn-wrap">
            <button class="feedback-form-btn feedback-submit-btn">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.88004 2.04977C13.06 2.44977 15.55 4.93976 15.95 8.11977C16.01 8.62977 16.44 8.99977 16.94 8.99977C16.98 8.99977 17.02 8.99977 17.06 8.98977C17.61 8.91977 18 8.41977 17.93 7.86977C17.42 3.77977 14.21 0.569766 10.12 0.0597656C9.57004 -0.000234421 9.07004 0.389766 9.01004 0.939766C8.94004 1.48977 9.33004 1.98977 9.88004 2.04977ZM10.26 4.15977C9.73004 4.01977 9.18004 4.33977 9.04004 4.87977C8.90004 5.41977 9.22004 5.95977 9.76004 6.09977C10.81 6.36977 11.63 7.18977 11.91 8.24977C12.03 8.69977 12.43 8.99977 12.88 8.99977C12.96 8.99977 13.05 8.98977 13.13 8.96977C13.66 8.82977 13.98 8.27977 13.85 7.74977C13.38 5.97977 12.01 4.60977 10.26 4.15977ZM16.23 12.2598L13.69 11.9698C13.08 11.8998 12.48 12.1098 12.05 12.5398L10.21 14.3798C7.38004 12.9398 5.06004 10.6298 3.62004 7.78977L5.47004 5.93976C5.90004 5.50977 6.11004 4.90977 6.04004 4.29977L5.75004 1.77977C5.63004 0.769766 4.78004 0.00976562 3.76004 0.00976562H2.03004C0.900041 0.00976562 -0.0399593 0.949766 0.0300407 2.07977C0.560041 10.6198 7.39004 17.4398 15.92 17.9698C17.05 18.0398 17.99 17.0998 17.99 15.9698V14.2398C18 13.2298 17.24 12.3798 16.23 12.2598Z" fill="white"/>
              </svg>
              Войти
            </button>
          </div>
        </form>
      </div>
    </main>
    <!-- JQuery 3.6  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- App Scripts --}}
    <script src="{{mix('js/app.js')}}"></script>
  </body>
</html>