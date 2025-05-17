<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>StreamMuse | Welcome</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Playfair+Display:wght@700&display=swap"
      rel="stylesheet"
    />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
      /* Base Styles */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "Montserrat", sans-serif;
        background-color: #0f0f1a;
        color: #fff;
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
      }

      /* Subtle Film Grain Texture */
      body::after {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="400" height="400" opacity="0.03"><filter id="noise"><feTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="4" stitchTiles="stitch"/></filter><rect width="100%" height="100%" filter="url(%23noise)"/></svg>');
        z-index: -1;
        pointer-events: none;
      }

      /* Hero Carousel */
      .hero-carousel {
        position: relative;
        height: 100vh;
        overflow: hidden;
      }

      .carousel-slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        opacity: 0;
        transition: opacity 1.5s ease;
      }

      .slide-1 {
        background-image: url("{{ asset('/img/FirstWelcome.png') }}");
      }
      .slide-2 {
        background-image: url("{{ asset('/img/SecondWelcome.png') }}");
      }
      .slide-3 {
        background-image: url("{{ asset('/img/LastWelcome.png') }}");
      }

      .carousel-slide.active {
        opacity: 1;
      }

      .slide-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(
          to bottom,
          rgba(15, 15, 26, 0.2) 0%,
          rgba(15, 15, 26, 0.8) 100%
        );
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 0 2rem;
      }

      .carousel-nav {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 1rem;
        z-index: 10;
      }

      .carousel-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.4);
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .carousel-dot.active {
        background: #e444c1;
        transform: scale(1.2);
      }

      .carousel-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 50px;
        height: 50px;
        background: rgba(15, 15, 26, 0.5);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        z-index: 10;
        transition: all 0.3s ease;
      }

      .carousel-arrow:hover {
        background: rgba(228, 68, 193, 0.5);
      }

      .arrow-left {
        left: 2rem;
      }

      .arrow-right {
        right: 2rem;
      }

      /* Navigation */
      .navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.5rem 2rem;
        z-index: 100;
        background: rgba(15, 15, 26, 0);
        transition: all 0.3s ease;
      }

      .navbar.scrolled {
        background: rgba(15, 15, 26, 0.9);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      }

      .logo {
        font-family: "Playfair Display", serif;
        font-size: 1.8rem;
        font-weight: 700;
        background: linear-gradient(45deg, #fff 65%, #e444c1 35%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
      }

      .auth-buttons {
        display: flex;
        gap: 1rem;
      }

      .btn {
        padding: 0.6rem 1.2rem;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
      }

      .btn-outline {
        border: 1px solid #e444c1;
        color: #e444c1;
      }

      .btn-outline:hover {
        background: rgba(228, 68, 193, 0.1);
      }

      .btn-primary {
        background: linear-gradient(45deg, #e444c1, #a30481);
        color: #fff;
      }

      .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(228, 68, 193, 0.4);
      }

      /* Hero Content */
      .hero-content {
        max-width: 800px;
        margin: 0 auto;
        transform: translateY(-50px);
        opacity: 0;
        transition: all 1s ease;
      }

      .hero-content.active {
        transform: translateY(0);
        opacity: 1;
      }

      .hero-title {
        font-family: "Playfair Display", serif;
        font-size: clamp(2.5rem, 5vw, 4rem);
        margin-bottom: 1.5rem;
        background: linear-gradient(45deg, #fff 65%, #e444c1 35%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        line-height: 1.2;
      }

      .hero-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        margin-bottom: 2rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
      }

      /* Call to Action */
      .cta-section {
        padding: 3rem 2rem;
        text-align: center;
        background: rgba(15, 15, 26, 0.9);
        position: relative;
      }

      /* Projector Light Effect */
      .cta-section::before {
        content: "";
        position: absolute;
        top: -50px;
        left: 50%;
        transform: translateX(-50%);
        width: 150%;
        height: 100px;
        background: radial-gradient(
          ellipse at center,
          rgba(228, 68, 193, 0.15) 0%,
          transparent 70%
        );
        pointer-events: none;
      }

      .cta-title {
        font-family: "Playfair Display", serif;
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        background: linear-gradient(45deg, #fff 65%, #e444c1 35%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
      }

      .cta-text {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 2rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
      }

      /* Responsive Adjustments */
      @media (max-width: 768px) {
        .carousel-arrow {
          width: 40px;
          height: 40px;
        }

        .arrow-left {
          left: 1rem;
        }

        .arrow-right {
          right: 1rem;
        }

        .hero-title {
          font-size: 2.5rem;
        }
      }

      @media (max-width: 480px) {
        .navbar {
          padding: 1rem;
        }

        .auth-buttons {
          flex-direction: column;
          gap: 0.5rem;
        }

        .btn {
          padding: 0.5rem 1rem;
          font-size: 0.9rem;
        }

        .hero-title {
          font-size: 2rem;
        }

        .hero-subtitle {
          font-size: 1rem;
        }
      }
    </style>
</head>
<body>
    <!-- Hero Carousel -->
    <div class="hero-carousel">
      <!-- Slide 1 -->
      <div class="carousel-slide slide-1 active">
        <div class="slide-overlay">
          <div class="hero-content active">
            <h1 class="hero-title">Selected Screen Favorites</h1>
            <p class="hero-subtitle">
              Discover films and series made for your taste
            </p>
          </div>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-slide slide-2">
        <div class="slide-overlay">
          <div class="hero-content">
            <h1 class="hero-title">Where Stories Come Alive</h1>
            <p class="hero-subtitle">
              Immerse yourself in cinematic journeys crafted just for you
            </p>
          </div>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-slide slide-3">
        <div class="slide-overlay">
          <div class="hero-content">
            <h1 class="hero-title">Streamlined Picks Just for You</h1>
            <p class="hero-subtitle">
              Let StreamMuse guide you to stories worth watching
            </p>
          </div>
        </div>
      </div>

      <!-- Carousel Navigation -->
      <div class="carousel-arrow arrow-left" onclick="prevSlide()">
        <svg
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path d="M15 18l-6-6 6-6" />
        </svg>
      </div>
      <div class="carousel-arrow arrow-right" onclick="nextSlide()">
        <svg
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path d="M9 18l6-6-6-6" />
        </svg>
      </div>

      <div class="carousel-nav">
        <div class="carousel-dot active" onclick="goToSlide(0)"></div>
        <div class="carousel-dot" onclick="goToSlide(1)"></div>
        <div class="carousel-dot" onclick="goToSlide(2)"></div>
      </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar" id="navbar">
      <div class="logo">StreamMuse</div>
      <div class="auth-buttons">
        <a href="{{ route('login') }}" class="btn btn-outline">Sign In</a>
        <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
      </div>
    </nav>

    <!-- Call to Action Section -->
    <section class="cta-section">
      <h2 class="cta-title">Ready to Begin Your Journey?</h2>
      <p class="cta-text">
        Join StreamMuse today and unlock a world of carefully selected films and
        series that match your unique preferences.
      </p>
    </section>

    <script>
      // Carousel Functionality
      let currentSlide = 0;
      const slides = document.querySelectorAll(".carousel-slide");
      const dots = document.querySelectorAll(".carousel-dot");
      const heroContents = document.querySelectorAll(".hero-content");

      function showSlide(n) {
        // Hide all slides
        slides.forEach((slide) => slide.classList.remove("active"));
        heroContents.forEach((content) => content.classList.remove("active"));
        dots.forEach((dot) => dot.classList.remove("active"));

        // Show current slide
        slides[n].classList.add("active");
        heroContents[n].classList.add("active");
        dots[n].classList.add("active");
        currentSlide = n;
      }

      function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
      }

      function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
      }

      function goToSlide(n) {
        showSlide(n);
      }

      // Auto-advance carousel
      let slideInterval = setInterval(nextSlide, 6000);

      // Pause on hover
      const carousel = document.querySelector(".hero-carousel");
      carousel.addEventListener("mouseenter", () =>
        clearInterval(slideInterval)
      );
      carousel.addEventListener("mouseleave", () => {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 6000);
      });

      // Navbar scroll effect
      window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
          document.getElementById("navbar").classList.add("scrolled");
        } else {
          document.getElementById("navbar").classList.remove("scrolled");
        }
      });
    </script>
</body>
</html>