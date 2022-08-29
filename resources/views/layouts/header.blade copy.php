  <!-- Top Bar -->
  <section class="top-bar bg-white" id="btt">
      <div class="container">
          <div class="row">
              <div class="col-md-8">
                  <div class="bar-left">
                      <ul class="list-unstyled list-inline">
                          <li class="list-inline-item"><i class="bi bi-clock"></i> <strong>{{now()->format('g:i A')}} </strong> {{now()->format('l')}} {{now()->toFormattedDateString()}}</li>
                      </ul>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="bar-social text-right">

                      <ul class="list-unstyled list-inline">
                          <li class="list-inline-item"><a href="#"><i class="top-bar-text-style">
                                      <strong>Login</strong> </i> </a></li>
                          <li class="list-inline-item"><a href="#"><i class="top-bar-text-style"> <strong>|</strong>
                                  </i> </a></li>
                          <li class="list-inline-item"><a href="#"><i class="top-bar-text-style">
                                      <strong>Register</strong> </i> </a></li>
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
          <div class="row py-4">
              <div class="col-md-6">
                  <div class="logo">
                      <a href=""><img src="{{asset('images/TopNews-logo-1.png')}}" alt="" class="img-fluid"></a>
                  </div>
              </div>
              <div class="col-md-6">
              </div>
          </div>
      </div>
  </section>
  <!-- End Logo Area -->

  <section class="navbar-expand-lg navbar-bg">
      <div class="container">
          <nav class="navbar">
              <div class="container-fluid">
                  <a class="navbar-brand" href="#"><img src="{{asset('images/TopNews-logo-1.png')}}" alt=""></a>
                  <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon bg-white"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          <li class="nav-item">
                              <a class="nav-link" aria-current="page" href="#">Home</a>
                          </li>

                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle color-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Pages
                              </a>
                              <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="#">About Us</a></li>
                                  <li><a class="dropdown-item" href="#">Category</a></li>

                                  <li><a class="dropdown-item" href="#">Contact Us</a></li>
                                  <li><a class="dropdown-item" href="#">Faqs</a></li>
                              </ul>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Sports</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Business</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Politics</a>
                          </li>
                      </ul>
                      <form class="d-flex" role="search">
                          <input class="form-control form-control-sm me-2" type="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-sm" type="submit">Search</button>
                      </form>
                  </div>
              </div>

          </nav>
      </div>
  </section>