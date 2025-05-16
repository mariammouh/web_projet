<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>StreamMuse | Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Playfair+Display:wght@700&display=swap"
      rel="stylesheet"
    />
    <!-- Add Font Awesome for the home icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        overflow: hidden;
      }

      /* Home Icon */
      .home-icon {
          position: absolute;
          top: 30px;
          left: 30px;
          color: #fff;
          font-size: 1.5rem;
          opacity: 0.8;
          transition: all 0.3s ease;
          z-index: 10;
      }

      .home-icon:hover {
          color: #e444c1;
          opacity: 1;
          transform: scale(1.1);
      }

      .bg-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url("/img/imgbck1.png");
        background-size: cover;
        background-position: center;
        opacity: 0.3;
        z-index: -1;
      }

      /* Layout */
      .register-wrapper {
        width: 100%;
        max-width: 1200px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1.5rem;
        padding: 20px;
      }

      /* Branding Section */
      .branding {
        text-align: center;
        animation: fadeIn 1.5s ease;
        margin-bottom: 0.5rem;
      }

      .app-title {
        font-family: "Playfair Display", serif;
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        background: linear-gradient(45deg, #fff 65%, #e444c1 35%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 0.3rem;
      }

      .tagline {
        font-size: clamp(0.9rem, 1.2vw, 1.1rem);
        font-weight: 300;
        margin-bottom: 0.2rem;
        opacity: 0.9;
      }

      .subtagline {
        font-size: clamp(0.8rem, 1vw, 0.9rem);
        font-weight: 300;
        font-style: italic;
        opacity: 0.7;
      }

      /* Form Styles */
      .register-form {
        background: rgba(15, 15, 26, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        padding: 1.8rem;
        width: 100%;
        max-width: 400px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        animation: slideUp 1s ease;
      }

      .form-header {
        text-align: center;
        margin-bottom: 1rem;
      }

      .form-header h2 {
        font-size: 1.6rem;
        background: linear-gradient(45deg, #e444c1, #a30481);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 0.3rem;
      }

      .form-header p {
        font-size: 0.85rem;
        opacity: 0.8;
      }

      /* Input Fields */
      .input-group {
        margin-bottom: 1rem;
        position: relative;
      }

      .input-group label {
        display: block;
        font-size: 0.85rem;
        margin-bottom: 0.3rem;
        opacity: 0.9;
      }

      .input-group input {
        width: 100%;
        padding: 0.7rem 1rem;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: #fff;
        font-size: 0.95rem;
        transition: all 0.3s ease;
      }

      .input-group input:focus {
        outline: none;
        border-color: rgba(228, 68, 193, 0.5);
        background: rgba(228, 68, 193, 0.03);
        box-shadow: 0 0 0 2px rgba(228, 68, 193, 0.2);
      }

      /* Error Styles */
      .input-error {
        border-color: rgba(255, 0, 0, 0.5) !important;
      }
      
      .error-message {
        color: #ff3860;
        font-size: 0.8rem;
        margin-top: 0.25rem;
        display: block;
      }

      /* Password Strength */
      .password-strength {
        height: 3px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 2px;
        margin-top: 0.3rem;
        overflow: hidden;
      }

      .strength-bar {
        height: 100%;
        width: 0%;
        background: #e444c1;
        transition: width 0.3s ease;
      }

      /* Terms Checkbox */
      .terms {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
        font-size: 0.75rem;
        opacity: 0.8;
      }

      .terms input {
        accent-color: #e444c1;
      }

      .terms a {
        color: #e444c1;
        text-decoration: none;
        transition: opacity 0.3s ease;
      }

      .terms a:hover {
        opacity: 0.8;
        text-decoration: underline;
      }

      /* Submit Button */
      .register-btn {
        width: 100%;
        padding: 0.8rem;
        background: linear-gradient(45deg, #e444c1, #a30481);
        border: none;
        border-radius: 8px;
        color: #fff;
        font-size: 0.95rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
      }

      .register-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(228, 68, 193, 0.6);
      }

      /* Login Link */
      .login-link {
        text-align: center;
        margin-top: 1rem;
        font-size: 0.85rem;
        opacity: 0.8;
      }

      .login-link a {
        color: #e444c1;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
      }

      .login-link a:hover {
        opacity: 0.9;
        text-decoration: underline;
      }

      /* Animations */
      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(-20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      @keyframes slideUp {
        from {
          opacity: 0;
          transform: translateY(30px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      /* Responsive Adjustments */
      @media (max-width: 768px) {
        .register-form {
          padding: 1.5rem;
        }
      }

      @media (max-width: 480px) {
        .register-form {
          padding: 1.2rem;
        }
        
        .app-title {
          font-size: 2.2rem;
        }
        
        .home-icon {
            top: 20px;
            left: 20px;
            font-size: 1.3rem;
        }
      }
    </style>
</head>
<body>
    <!-- Home Icon -->
    <a href="{{ url('/') }}" class="home-icon" title="Return to Home">
        <i class="fas fa-home"></i>
    </a>

    <!-- Background Image (defined in CSS) -->
    <div class="bg-image"></div>

    <!-- Main Content -->
    <div class="register-wrapper">
      <!-- Branding Section -->
      <div class="branding">
        <h1 class="app-title">StreamMuse</h1>
        <p class="tagline">Guiding you to stories worth watching</p>
        <p class="subtagline">Where stories live, and viewers belong</p>
      </div>

      <!-- Registration Form -->
      <div class="register-form">
        <div class="form-header">
          <h2>Create Account</h2>
          <p>Join the stream unlock your next watch</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="input-group">
            <label for="name">Full Name</label>
            <input
              type="text"
              id="name"
              name="name"
              value="{{ old('name') }}"
              placeholder="Enter your full name"
              required
              autocomplete="name"
              autofocus
              class="@error('name') input-error @enderror"
            />
            @error('name')
              <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="input-group">
            <label for="email">Email Address</label>
            <input
              type="email"
              id="email"
              name="email"
              value="{{ old('email') }}"
              placeholder="Enter your email"
              required
              autocomplete="email"
              class="@error('email') input-error @enderror"
            />
            @error('email')
              <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="input-group">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Create a password"
              required
              autocomplete="new-password"
              class="@error('password') input-error @enderror"
            />
            <div class="password-strength">
              <div class="strength-bar" id="strengthBar"></div>
            </div>
            @error('password')
              <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="input-group">
            <label for="password-confirm">Confirm Password</label>
            <input
              type="password"
              id="password-confirm"
              name="password_confirmation"
              placeholder="Confirm your password"
              required
              autocomplete="new-password"
            />
          </div>

          <div class="terms">
            <input type="checkbox" id="terms" required />
            <label for="terms"
              >I agree to the <a href="#">Terms</a> and
              <a href="#">Privacy Policy</a></label
            >
          </div>

          <button type="submit" class="register-btn">Sign Up Now</button>

          <div class="login-link">
            Already have an account? <a href="{{ route('login') }}">Sign in</a>
          </div>
        </form>
      </div>
    </div>

    <script>
      // Password strength indicator
      const passwordInput = document.getElementById("password");
      const strengthBar = document.getElementById("strengthBar");

      passwordInput.addEventListener("input", function () {
        const password = this.value;
        let strength = 0;

        if (password.length > 7) strength += 1;
        if (password.length > 11) strength += 1;
        if (/[A-Z]/.test(password)) strength += 1;
        if (/[0-9]/.test(password)) strength += 1;
        if (/[^A-Za-z0-9]/.test(password)) strength += 1;

        const width = (strength / 5) * 100;
        strengthBar.style.width = `${width}%`;
        strengthBar.style.background =
          width < 40
            ? "#ff3860"
            : width < 70
            ? "#e444c1"
            : width < 90
            ? "#c13ce4"
            : "#a30481";
      });
    </script>
  </body>
</html>