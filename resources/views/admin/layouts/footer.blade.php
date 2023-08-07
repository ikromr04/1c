<footer class="footer">
  <div class="container footer-container">
    <nav class="footer-navigation">
      <dl>
        <div class="footer-products">
          <dt data-table="texts" data-caption="products-heading">{{$footer['products-heading']}}</dt>
          @foreach ($footer['products'] as $product)
            <dd>
              <a data-table="products" data-product-id="{{$product->id}}" class="header-grid-link" href="{{route('products.read', $product->id)}}">{{$product->title}}</a>
            </dd>
          @endforeach
        </div>

        <div class="footer-projects">
          <dt>{{$footer['projects-heading']}}</dt>
          @foreach ($footer['projects'] as $project)
            <dd>
              <a data-table="projects" data-id="{{$project->id}}" class="header-grid-link" href="{{route('projects')}}">{{$project->title}}</a>
            </dd>
          @endforeach
        </div>

        <div class="footer-site-cards">
          <dt>{{$footer['site-cards-heading']}}</dt>
          @foreach ($footer['site-cards'] as $page)
            <dd>
              <a data-table="pages" data-page-id="{{$page->id}}" data-route="{{$page->route}}" class="header-grid-link" href="{{$page->route}}">{{$page->title}}</a>
            </dd>
          @endforeach
        </div>

        <div class="footer-contacts">
          <dt>{{$footer['contacts-heading']}}</dt>
          <dd>
            <a data-table="texts" data-caption="phone" class="header-grid-link" href="tel:{{str_replace(' ', '', strip_tags($header['phone']))}}">{!! $header['phone'] !!}</a>
          </dd>
          {{-- <dd>
            <a data-table="texts" data-caption="email" class="header-grid-link" href="mailto:{{str_replace(' ', '', strip_tags($header['email']))}}">{!! $header['email'] !!}</a>
          </dd> --}}
          <dd>
            <a data-table="texts" data-caption="email-2" class="header-grid-link" href="mailto:{{str_replace(' ', '', $header['email-2'])}}">{{$header['email-2']}}</a>
          </dd>
          <dd>
            <a data-table="texts" data-caption="address" class="header-grid-link no-white-space" target="_blank" href="http://maps.google.com/?q={{str_replace(' ', '', strip_tags($header['address']))}}">{!! strip_tags($header['address']) !!}</a>
          </dd>
        </div>
      </dl>
    </nav>

    <div class="footer-bottom">
      <img src="{{asset('img/orien-logo.png')}}" alt="orien logotype">
      <div data-table="texts" data-caption="copyright">{{$footer['copyright']}}</div>
      <button class="scroll-top-btn" id="top" type="button">
        <span class="scroll-top-text" data-table="buttons" data-caption="scroll-top">{{$footer['scroll-top']}}</span>
        <span class="scroll-top-icon">
          <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.41494 6.99461L6.29494 3.11461L10.1749 6.99461C10.5649 7.38461 11.1949 7.38461 11.5849 6.99461C11.9749 6.60461 11.9749 5.97461 11.5849 5.58461L6.99494 0.99461C6.60494 0.60461 5.97494 0.60461 5.58494 0.99461L0.994943 5.58461C0.604942 5.97461 0.604942 6.60461 0.994943 6.99461C1.38494 7.37461 2.02494 7.38461 2.41494 6.99461Z" fill="#1D1D1D"/>
          </svg>
        </span>
      </button>
    </div>
  </div>
</footer>
