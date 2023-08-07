@props(['publication'])

<article class="publication"> 
  <div class="publications-inner">
    <time datetime="{{$publication->created_at}}">{{date("d.m.Y", strtotime($publication->created_at));}}</time>
    <p class="publication-category">{{$publication->category->title}}</p>
    <h2>{{$publication->title}}</h2>
    <div class="publication-content simdit">{!! $publication->content !!}</div>
    @if (session()->has('admin'))
      <a class="link link--yellow" href="{{route('admin.publications.read', $publication->id)}}">Читать далее</a>
    @else  
      <a class="link link--yellow" href="{{route('publications.read', $publication->id)}}">Читать далее</a>
    @endif
  </div>
</article>