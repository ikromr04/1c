<footer class="footer">
  <div class="container footer-container">
    <nav class="footer-navigation">
      <dl>
        <div class="footer-products">
          <dt data-table="texts" data-caption="products-heading">{{ $footer['products-heading'] }}</dt>
          @foreach ($footer['products'] as $product)
            <dd>
              <a data-table="products" data-product-id="{{ $product->id }}" class="header-grid-link" href="{{ route('products.read', $product->id) }}">{{ $product->title }}</a>
            </dd>
          @endforeach
        </div>

        <div class="footer-projects">
          <dt>{{ $footer['projects-heading'] }}</dt>
          @foreach ($footer['projects'] as $project)
            <dd>
              <a data-table="projects" data-id="{{ $project->id }}" class="header-grid-link" href="{{ route('projects') }}">{{ $project->title }}</a>
            </dd>
          @endforeach
        </div>

        <div class="footer-site-cards">
          <dt>{{ $footer['site-cards-heading'] }}</dt>
          @foreach ($footer['site-cards'] as $page)
            <dd>
              <a data-table="pages" data-page-id="{{ $page->id }}" data-route="{{ $page->route }}" class="header-grid-link" href="{{ $page->route }}">{{ $page->title }}</a>
            </dd>
          @endforeach
          <dd>
            <a class="header-grid-link" href="{{ route('vacancies') }}">Вакансии</a>
          </dd>
        </div>

        <div class="footer-contacts">
          <dt>{{ $footer['contacts-heading'] }}</dt>
          <dd>
            <a data-table="texts" data-caption="phone" class="header-grid-link" href="tel:{{ str_replace(' ', '', strip_tags($header['phone'])) }}">{!! $header['phone'] !!}</a>
          </dd>
          <dd>
            <a class="header-grid-link" href="tel:+992988992211">+992 988 99 22 11</a>
          </dd>
          {{-- <dd>
            <a data-table="texts" data-caption="email" class="header-grid-link" href="mailto:{{str_replace(' ', '', strip_tags($header['email']))}}">{!! $header['email'] !!}</a>
          </dd> --}}
          <dd>
            <a data-table="texts" data-caption="email-2" class="header-grid-link" href="mailto:{{ str_replace(' ', '', $header['email-2']) }}">{{ $header['email-2'] }}</a>
          </dd>
          <dd>
            <a data-table="texts" data-caption="address" class="header-grid-link no-white-space" target="_blank" href="https://www.google.com/maps/place/%D1%83%D0%BB.+%D0%A8%D0%B0%D0%BC%D1%81%D0%B8+2,+%D0%94%D1%83%D1%88%D0%B0%D0%BD%D0%B1%D0%B5,+%D0%A2%D0%B0%D0%B4%D0%B6%D0%B8%D0%BA%D0%B8%D1%81%D1%82%D0%B0%D0%BD/@38.5781361,68.7500605,280m/data=!3m1!1e3!4m6!3m5!1s0x38b5d22600351db9:0x7ece843d97f3edb4!8m2!3d38.57792!4d68.7511861!16s%2Fg%2F11j95rwwjq?entry=ttu&g_ep=EgoyMDI0MTAyMi4wIKXMDSoASAFQAw%3D%3D">{!! strip_tags($header['address']) !!}</a>
          </dd>
        </div>
      </dl>
    </nav>

    <div class="footer-bottom">
      <img src="{{ asset('img/kit-logo.png') }}" alt="Kit logotype" width="90">
      <div data-table="texts" data-caption="copyright">{{ $footer['copyright'] }}</div>
      <button class="scroll-top-btn" id="top" type="button">
        <span class="scroll-top-text" data-table="buttons" data-caption="scroll-top">{{ $footer['scroll-top'] }}</span>
        <span class="scroll-top-icon">
          <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.41494 6.99461L6.29494 3.11461L10.1749 6.99461C10.5649 7.38461 11.1949 7.38461 11.5849 6.99461C11.9749 6.60461 11.9749 5.97461 11.5849 5.58461L6.99494 0.99461C6.60494 0.60461 5.97494 0.60461 5.58494 0.99461L0.994943 5.58461C0.604942 5.97461 0.604942 6.60461 0.994943 6.99461C1.38494 7.37461 2.02494 7.38461 2.41494 6.99461Z" fill="#1D1D1D" />
          </svg>
        </span>
      </button>
    </div>
  </div>
</footer>
