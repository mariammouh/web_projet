<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Watch it</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Bootstrap JS et Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    
        .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 85%;
            height: 100%;
            font-size: 18px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            margin-inline-start: 20%;

        }

        .service {
            display: inline-flex;
            border-left: 4px solid #3498db;
            border-right: 4px solid #3498db;
            width: 100%;
            margin: 10%;
        }
.content img{
    max-width: 50%;
            max-height: 50%;
}
        .title img {
            margin-inline-end: 50%;
            margin-left: 0%
        }

        ul {
            display: flex;

        }

        .card-body li {

            font-size: 18px;
            border-left: 4px solid #3498db;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;

            width: 100%;
        }
form input,textarea{
    color: gray;
}
        .list .action {
            padding-top: 15px;
            margin-inline-start: 60%;
        }

        .list {
            display: inline-flex;

            width: 100%;
        }

   

        .title {
            font-size: 1em;
            margin-inline-start: 10%;
        }
        .content .title  img {
            max-width: 50%;
            max-height: 50%;
            margin-inline-start: 0%;
        }
        .complete {
            background-color: green;
            margin: 10px;

        }

        .delete {
            background-color: red;

        }

        button.submit {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
          
            margin: 10px;
        }


        button.complete {
            background-color: #008CBA;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-inline-start: 160%;
        }


        button.delete {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 5px;
            margin-top: 10px;
            margin-inline-start: 270%;
        }

        input[type="text"] {
            width: 70%;
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
            font-size: 16px;
            margin-right: 10px;
        }

        .card-body input,
        textarea {
            margin: 10px;

        }

        .txt {
            padding-top: 15px;
        }
        label{
            margin-inline: 5%;
        }
        .profile{
            width: 30%;
            height: 30%;
        }
        form label{
            color: #000;
        }
        form span {
            font-style: italic;
          
            font-weight: 500;
        }
        .film{
            border-left: 4px solid #a830f7;
            border-right: 4px solid #a830f7;
            width: 100%;
            margin-inline-start: 0%;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
           
         }
         .film img{
            height: 300px;

left: 0%;border-radius: 5px;
         }
         .film button{
            width: fit-content;
         }
         .show{
            border-left: 4px solid #f84e37;
            border-right: 4px solid #f84e37;
            width: 100%;
            margin-inline-start: 0%;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
           
         }
         .show img {
            width: 300px;
         }
         /* Style for film card container */
.film-card {
    display: flex;
    border: 1px solid #ccc;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style for film poster */
.film-poster img {
    width: 150px;
    height: auto;
    object-fit: cover;
}

/* Style for film details */
.film-details {
    padding: 20px;
}

/* Style for film title */
.film-title {
    margin-top: 0;
    font-size: 24px;
    color: #333;
}

/* Style for film info */
.film-info {
    margin-bottom: 10px;
    font-size: 16px;
    color: #666;
}

/* Style for add to watchlist button */
.add-to-watchlist-btn {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-left: 5px;
            margin-top: 10px;
            margin-inline-start: 80%;
}
.remove-to-watchlist-btn{
    padding: 10px 20px;
    background-color: #d63838;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-left: 5px;
            margin-top: 10px;
            margin-inline-start: 80%;
}
.add-to-watchlist-btn:hover {
    background-color: #0056b3;
}
.rating .star,input {
    background: transparent;
    border: none;
    color: gold;
    text-shadow: #000 5px;
    font-size: 20px;
}
.rating .star::after{
    color: rgb(31, 27, 8);
}
.rating {
    width: auto;
    display: inline-block;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
}

.rating  option {
    display: inline-block;
    padding: 5px;
}
.del {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 5px;
            margin-top: 10px;
            margin-inline-start: 270%;
        }
    </style>
    <link rel="stylesheet" href="css/app.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Watch it 
                <a class="navbar-brand" href="{{ url('/') }}">
                   Mini projects
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
