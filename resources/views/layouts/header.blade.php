  <!-- Top Bar -->
  <section class="top-bar bg-white" id="btt">
      <div class="container">
          <div class="row">
              <div class="col-md-6">
                  <div class="bar-left">
                      <ul class="list-unstyled list-inline">
                          <li class="list-inline-item"> <strong>{{ now()->format('l') }}
                                  {{ now()->toFormattedDateString() }}</strong></li>
                      </ul>
                  </div>
              </div>
              <div class="col-md-6 text-end">
                  <div class="bar-social text-right">
                      <ul class="list-unstyled list-inline">
                          <li class="list-inline-item">
                              <a href="#"><i class="fab fa-facebook"></i></a>
                          </li>
                          <li class="list-inline-item">
                              <a href="#"><i class="fab fa-twitter"></i></a>
                          </li>
                          <li class="list-inline-item">
                              <a href="#"><i class="fab fa-linkedin"></i></a>
                          </li>
                          <li class="list-inline-item">
                              <a href="#"><i class="fab fa-google-plus"></i></a>
                          </li>
                      </ul>

                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- End Top Bar -->

  <!-- Logo Area -->
  <section class="logo-area bg-white">
      <div class="container">
          <div class="row align-items-center py-4">
              <div class="col-md-6">
                  <div class="logo">
                      <a href="{{ url('/') }}"><img src="{{ asset('images/TopNews-logo-1.png') }}" alt=""
                              class="img-fluid"></a>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="logo text-right">
                      <a href=""><img src="{{ asset('images/top_banner.jpg') }}" alt=""
                              class="img-fluid" /></a>
                  </div>
              </div>
              {{-- livewire header component for multiple countries --}}
              @if (config('services.multiple_countries'))
                  @livewire('header')
              @endif

          </div>
      </div>
  </section>
  <!-- End Logo Area -->

  <section class="navbar-expand-md navbar-bg">
      <div class="container">
          <nav class="navbar">
              <div class="container-fluid">
                  <a class="navbar-brand" href="#"><img src="{{ asset('images/TopNews-logo-1.png') }}"
                          alt=""></a>
                  <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
                      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                      aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon bg-white"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          <li class="nav-item">
                              <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                          </li>
                          @foreach (App\Models\News::categories(false) as $category)
                              <li class="nav-item text-capitalize">
                                  <a class="nav-link @if (request()->category === $category) active @endif"
                                      href="{{ route('page', $category) }}">{{ $category }}</a>
                              </li>
                          @endforeach
                      </ul>
                      <form class="d-flex" action="{{ route('search') }}" method="get" role="search">
                          <input class="form-control form-control-sm me-2" type="search" name="q"
                              placeholder="Search" aria-label="Search" value="{{ request()->q }}" required>
                          <button class="btn btn-sm btn-danger" type="submit">Search</button>
                      </form>
                  </div>
              </div>

          </nav>
      </div>
  </section>
