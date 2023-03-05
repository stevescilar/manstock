@extends('layouts.master_home')

@section('home_content')
        <!-- ======= About Us Section ======= -->
        <section id="about-us" class="about-us">
          <div class="container" data-aos="fade-up">
    
            <div class="section-title">
              <h2>About Us</strong></h2>
            </div>
    
            <div class="row content">
              <div class="col-lg-6" data-aos="fade-right">
                <img src="{{ asset('frontend/assets/img/about.png')}}" alt="" style="width:500px">
                {{-- <h2>Eum ipsam laborum deleniti velitena</h2>
                <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee trave</h3> --}}
              </div>
              <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                  culpa qui officia deserunt mollit anim id est laborum
                </p>
                <ul>
                  <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
                  <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
                  <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in</li>
                </ul>
                <p class="font-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua.
                </p>
              </div>
            </div>
    
          </div>
        </section><!-- End About Us Section -->
    
        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
          <div class="container" data-aos="fade-up">
    
            <div class="section-title">
              <h2>What we Offer</strong></h2>
              <p>We  Offer The Best Services</p>
            </div>
    
            <div class="row">
              @foreach($services as $service)
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="{{ $service->image }}" alt="image" height="100px" width="100px">
                  <div class="card-body">
                    <h5 class="card-title">{{ $service->name }}</h5>
                    <p class="card-text">{{ $service->desc }}</p>
                    <a href="#" class="btn btn-primary">check more</a>
                  </div>
                  <br> 
                </div>
                <br />
              </div>
              <br />
              @endforeach
              <br />
             
    
            </div>
    {{--nfjk  --}}
          </div>
        </section><!-- End Services Sectinon -->
    
        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
          <div class="container">
    
            <div class="section-title" data-aos="fade-up">
              <h2>Portfolio</h2>
            </div>
    
            <div class="row" data-aos="fade-up">
              <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                  <li data-filter="*" class="filter-active">All</li>
                  <li data-filter=".filter-app">App</li>
                  <li data-filter=".filter-card">Card</li>
                  <li data-filter=".filter-web">Web</li>
                </ul>
              </div>
            </div>
    
            <div class="row portfolio-container" data-aos="fade-up">
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="{{ asset('frontend/assets/img/portfolio/portfolio-1.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 1</h4>
                  <p>App</p>
                  <a href="{{ asset('frontend/assets/img/portfolio/portfolio-1.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="{{ asset('frontend/assets/img/portfolio/portfolio-2.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Web 3</h4>
                  <p>Web</p>
                  <a href="{{ asset('frontend/assets/img/portfolio/portfolio-2.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="{{ asset('frontend/assets/img/portfolio/portfolio-3.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 2</h4>
                  <p>App</p>
                  <a href="{{ asset('frontend/assets/img/portfolio/portfolio-3.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <img src="{{ asset('frontend/assets/img/portfolio/portfolio-4.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Card 2</h4>
                  <p>Card</p>
                  <a href="{{ asset('frontend/assets/img/portfolio/portfolio-4.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="{{ asset('frontend/assets/img/portfolio/portfolio-5.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Web 2</h4>
                  <p>Web</p>
                  <a href="{{ asset('frontend/assets/img/portfolio/portfolio-5.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="{{ asset('frontend/assets/img/portfolio/portfolio-6.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 3</h4>
                  <p>App</p>
                  <a href="{{ asset('frontend/assets/img/portfolio/portfolio-6.jpg')}}" data-gall="portfolioGallery" class="venobox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Card 1</h4>
                  <p>Card</p>
                  <a href="assets/img/portfolio/portfolio-7.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Card 3</h4>
                  <p>Card</p>
                  <a href="assets/img/portfolio/portfolio-8.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Web 3</h4>
                  <p>Web</p>
                  <a href="assets/img/portfolio/portfolio-9.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
    
            </div>
    
          </div>
        </section><!-- End Portfolio Sectijnon -->
    
            <!-- ======= Our Clients Section ======= -->
        <section id="clients" class="clients">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>Clients</h2>
            </div>

            <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

              @foreach ($brands as $brand)
              <div class="col-lg-3 col-md-4 col-6">
                <div class="client-logo">
                  <img src="{{ $brand->brand_image }}" class="img-fluid" alt="">
                </div>
              </div>
              @endforeach
            </div>

          </div>
        </section><!-- End Our Clients Section -->
    
@endsection