<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamMuse - {{ $title ?? 'Home' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
        <link rel="icon" href="{{ asset('img/LogoD.png') }}" type="image/png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0f172a;
            color: #f8fafc;
        }
        .nav-glass {
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }
        .content-card {
            transition: all 0.3s ease;
        }
        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(124, 58, 237, 0.2);
        }
        .section-title::after {
            content: "";
            position: absolute;
            bottom: -6px;
            left: 2px;
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, #7c3aed 0%, #a855f7 100%);
            border-radius: 3px;
        }
    </style>
</head>
<body class="min-h-screen">
    @include('partials.navbar')
    
    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>
<!-- Scripts Section -->
@stack('scripts')
    <!-- End of content -->



</body>
</html>