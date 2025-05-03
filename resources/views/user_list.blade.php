@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card-header"> <h1>Your watch list </h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 
                    @if (!$allList->contains('id'))

                    @foreach ($allList as $film)
                        <div class=" film">
                            <div class="film-card">
                                <div class="film-poster">
                                    <img src="{{ $film->poster }}" alt="Film Poster">
                                </div>
                                <div class="film-details">
                                    <h2 class="film-title">{{ $film->title }}</h2>
                                    <p class="film-info"><strong>Genre:</strong> {{ $film->genre }}</p>
                                    <p class="film-info"><strong>Director:</strong> {{ $film->director }}</p>
                                    <p class="film-info"><strong>Duration:</strong> {{ $film->duration }}</p>
                                    <p class="film-info"><strong>Main Leads:</strong> {{ $film->main_leads }}</p>
                                    <p class="film-info"><strong>Plot Summary:</strong> {{ $film->plot_summary }}</p>
                                    <p class="film-info"><strong>What is your rating ?</strong> @if($film->rating_user!==null) {{__('last time you rate it '.$film->rating_user.' stars')}} @endif</p>
                                    <form action="{{route('submit_rating',$film->id)}}" method="post">
                                        @csrf
                                        @method("POST")
                                        <select class="rating" name="rating_stare" draggable="none">
                                            <option  class="star" value="1">★</option>
                                            <option  class="star" value="2">★</option>
                                            <option  class="star" value="3">★</option>
                                            <option  class="star" value="4">★</option>
                                            <option  class="star" value="5">★</option>
                                        </select>
                                        
                                        <button type="submit" class="submit" >Submit Rating</button>
                                    </form>
                                    <form action="{{route('display',['id_watch'=>$film->film_id,"id_watch"])}}" method="POST">
                                        @csrf
                                        <button type="submit" class="submit" >Watch</button>
                                    </form>
                                   
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif


                    {{-- </div>
                                </div>
                            </div>
                        </div> --}}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
