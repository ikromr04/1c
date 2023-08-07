@props(['project'])

<div class="company-card">
  <img class="company-card-logo" src="{{asset('img/companies/' . $project->logo)}}" alt="{{$project->title}}">
  <div class="company-card-inner">
    <svg class="company-card-svg" width="310" height="320" viewBox="0 0 310 320" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M165.644 118.017C155.908 125.143 145.451 131.228 134.446 136.174C132.597 136.986 124.37 139.958 122.154 140.473C103.613 145.376 84.0986 145.22 65.6425 140.021C47.1863 134.823 30.4635 124.771 17.215 110.914C3.9665 97.0562 -5.32319 79.8992 -9.68687 61.2291C-14.0505 42.5589 -13.3286 23.0584 -7.59627 4.75768C-1.86394 -13.543 8.6692 -29.9746 22.9065 -42.8263C37.1438 -55.678 54.5646 -64.48 73.3552 -68.3157C92.1457 -72.1514 111.619 -70.8806 129.747 -64.6356C147.876 -58.3907 163.996 -47.3998 176.431 -32.8076L206.348 -57.5861C189.718 -77.3012 168.166 -92.2632 143.879 -100.953C119.592 -109.642 93.4348 -111.75 68.0639 -107.062C42.6929 -102.374 19.0116 -91.0572 -0.575823 -74.2605C-20.1632 -57.4638 -34.9591 -35.7855 -43.4612 -11.4265C-51.9633 12.9324 -53.8687 39.1045 -48.9842 64.4323C-44.0996 89.76 -32.599 113.342 -15.6499 132.783C1.29916 152.224 23.093 166.832 47.5189 175.124C71.9448 183.416 98.1328 185.097 123.424 179.995C131.94 178.07 140.303 175.517 148.443 172.358C161.891 166.383 174.703 159.069 186.686 150.527C190.39 147.459 203.779 137.09 207.554 133.963L413.339 -36.4776L388.689 -66.2393L183.189 103.966C180.482 106.207 168.825 115.623 165.644 118.017ZM144.268 56.9736C142.06 58.8025 130.734 68.1829 128.597 69.9528C124.338 73.038 119.883 75.8451 115.262 78.3568C111.576 80.0979 107.729 81.475 103.776 82.4684C95.8176 84.0615 87.5811 83.5324 79.8941 80.9341C72.2071 78.3358 65.3402 73.76 59.9835 67.6663C54.6269 61.5727 50.9692 54.1759 49.378 46.2194C47.7867 38.2628 48.318 30.0268 50.9184 22.3388C53.5189 14.6508 58.0969 7.78184 64.1924 2.42201C70.2878 -2.93779 77.6861 -6.59963 85.6437 -8.19545C93.6013 -9.79127 101.838 -9.26481 109.526 -6.66912C117.214 -4.07341 124.082 0.500133 129.441 6.59197L157.933 -17.0066C148.302 -28.1106 135.901 -36.4642 121.991 -41.2175C108.08 -45.9708 93.1569 -46.9542 78.7397 -44.0674C64.3225 -41.1807 50.9256 -34.5269 39.9124 -24.7832C28.8992 -15.0395 20.6626 -2.55361 16.0407 11.4041C11.4188 25.3618 10.5767 40.2931 13.5998 54.6787C16.623 69.0644 23.4036 82.3909 33.2518 93.3023C43.0999 104.214 55.6641 112.321 69.666 116.798C83.6678 121.276 98.6075 121.964 112.965 118.793C117.98 117.679 122.867 116.046 127.544 113.921C135.523 110.039 143.141 105.457 150.309 100.227C152.731 98.2213 164.555 88.4279 166.835 86.54L373.404 -84.5499L349.815 -113.03L144.268 56.9736ZM57.2107 258.245L27.1514 283.141L-134.842 87.5545L-178.863 124.014L-203.749 93.9679L-129.669 32.6115L57.2107 258.245ZM-199.186 166.176L-175.185 195.154L-142.205 167.839L-16.6555 319.424L12.2642 295.471L-137.287 114.908L-199.186 166.176Z" fill="white"/>
    </svg>
    <p class="company-card-description">{{$project->description}}</p>
    <a class="link link--yellow" href="{{route('projects')}}">Подробнее о проекте</a>
  </div>
</div>
