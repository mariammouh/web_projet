<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>StreamMuse | Sign In</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Playfair+Display:wght@700&display=swap"
        rel="stylesheet"
    />
    <!-- Add Font Awesome for the home icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* CSS Reset */
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
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* Background Image */
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

        /* Main Container */
        .login-container {
            width: 90%;
            max-width: 1200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem;
        }

        /* Hero Section with Title */
        .hero {
            text-align: center;
            animation: fadeIn 1.5s ease;
        }

        .app-title {
            font-family: "Playfair Display", serif;
            font-size: 5rem;
            font-weight: 700;
            background: linear-gradient(45deg, #fff 65%, #e444c1 35%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 0.5rem;
            letter-spacing: 1px;
        }

        .tagline {
            font-size: 1.2rem;
            font-weight: 300;
            margin-bottom: 0.3rem;
            opacity: 0.9;
        }

        .subtagline {
            font-size: 1rem;
            font-weight: 300;
            font-style: italic;
            opacity: 0.7;
        }

        /* Login Form */
        .form-container {
            background: rgba(15, 15, 26, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            animation: slideUp 1s ease;
        }

        .form-container h2 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .form-container p {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-bottom: 1.5rem;
        }

        .input-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .input-group label {
            display: block;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            opacity: 0.9;
        }

        .input-group input {
            width: 100%;
            padding: 0.8rem 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            outline: none;
            border-color: rgba(206, 3, 67, 0.5);
            background: rgba(255, 215, 0, 0.03);
        }

        .input-error {
            border-color: rgba(255, 0, 0, 0.5) !important;
        }

        .error-message {
            color: #ff3860;
            font-size: 0.8rem;
            margin-top: 0.25rem;
            display: block;
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            opacity: 0.9;
            cursor: pointer;
        }

        .remember input {
            accent-color: #e444c1;
        }

        .signin-btn {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(45deg, #e444c1, #a30481);
            border: none;
            border-radius: 8px;
            color: #0f0f1a;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .signin-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(243, 118, 191, 0.952);
        }

        .signup-link {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .signup-link a {
            color: #ff00dd;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .signup-link a:hover {
            opacity: 0.9;
            text-decoration: underline;
        }

        .forgot-password {
            display: block;
            margin-top: 0.5rem;
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
            .app-title {
                font-size: 3.5rem;
            }

            .form-container {
                padding: 2rem;
            }
        }

        @media (max-width: 480px) {
            .app-title {
                font-size: 2.8rem;
            }

            .form-container {
                padding: 1.5rem;
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

    <!-- Background Image -->
    <div class="bg-image"></div>

    <!-- Main Content -->
    <div class="login-container">
        <!-- Hero Section -->
        <div class="hero">
            <h1 class="app-title">StreamMuse</h1>
            <p class="tagline">Guiding you to stories worth watching</p>
            <p class="subtagline">Where stories live, and viewers belong</p>
        </div>

        <!-- Login Form -->
        <div class="form-container">
            <h2>Sign In</h2>
            <p>Enter your email and password to begin</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        required
                        autocomplete="email"
                        autofocus
                        class="@error('email') input-error @enderror"
                    />
                    @error('email')
                        <span class="error-message">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="••••••••"
                        required
                        autocomplete="current-password"
                        class="@error('password') input-error @enderror"
                    />
                    @error('password')
                        <span class="error-message">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="options">
                    <label class="remember">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} /> Remember me
                    </label>
                </div>

                <button type="submit" class="signin-btn">Sign In</button>

                <div class="signup-link">
                    Don't have an account? <a href="{{ route('register') }}">Sign up</a>
                 
                </div>
            </form>
        </div>
    </div>
</body>
</html>