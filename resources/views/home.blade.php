@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card-header">Hello again {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="content service"><img src="img/todo.svg" alt=""> <a
                            href="{{ route('todolist', Auth::user()->id) }}">Your todo list</a><br>
                    </div>
                    <div class="content service"><img src="img/2.png" alt=""> <a
                            href="{{ route('profile', Auth::user()->id) }}">Edit your profile</a>
                    </div>
                    <div class="content service"><img src="img/question.png" alt=""> <a
                            href="{{ route('quiz', Auth::user()->id) }}">Let us know you better</a>
                    </div>
                    <div class="content service"><img src="img/movie.svg" alt=""> <a
                        href="{{ route('watch', Auth::user()->id) }}">Wanna watch somthing today ?</a>
                </div>
                    <div class="content service"><img src="img/resume.webp" alt=""> <a
                        href="{{ route('quiz', Auth::user()->id) }}">Check what you have for today</a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
