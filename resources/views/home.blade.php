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
                   
                    <div class="content service"><img src="img/2.png" alt=""> <a
                            href="{{ route('profile', Auth::user()->id) }}">Edit your profile</a>
                    </div>

               
                    <div class="content service"><img src="img/movie.svg" alt=""> <a
                        href="{{ route('watch', Auth::user()->id) }}">Wanna watch somthing today ?</a>
                </div>

            
                </div>
            </div>
        </div>
    </div>
@endsection
