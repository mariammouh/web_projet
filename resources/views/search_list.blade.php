@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                
                <div class="card-body">

                    <form action="{{ route('search', Auth::user()->id) }}" method="post">
                        @csrf
                        <input type="text" name="search" id="" value="{{$query}}">
                        <button type="submit"  class="submit">search</button>
                    </form>
                    <br />
                    
                    <div class="card">
                        <div class="card-header"><h1>{{ __('Our film') }}</h1></div>
                        @foreach ($allFilms as $film)
                            <div class=" film">
                                <div class="film-card">
                                    <div class="film-poster">
                                        <img src="{{ $film->poster }}" alt="Film Poster">
                                    </div>
                                    <div class="film-details">
                                        <h2 class="film-title">{{ $film->title }}</h2>
                                        <p class="film-info"><strong>Release Date:</strong> {{ $film->release_date }}</p>
                                        <p class="film-info"><strong>Genre:</strong> {{ $film->genre }}</p>
                                        <p class="film-info"><strong>Director:</strong> {{ $film->director }}</p>
                                        <p class="film-info"><strong>Production Company:</strong>
                                            {{ $film->production_company }}</p>
                                        <p class="film-info"><strong>Duration:</strong> {{ $film->duration }}</p>
                                        <p class="film-info"><strong>Main Leads:</strong> {{ $film->main_leads }}</p>
                                        <p class="film-info"><strong>Plot Summary:</strong> {{ $film->plot_summary }}</p>
                                        <p class="film-info"><strong>Rating:</strong> {{ $film->rating }}</p>
                                        <p class="film-info"><strong>Country:</strong> {{ $film->country }}</p>
                                        <p class="film-info"><strong>Language:</strong> {{ $film->language }}</p>
                                          @csrf
                                                <a href="{{ route('film.details', $film->id) }}" class="btn btn-primary">Details</a>

                                      
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card">

                        @foreach ($allShows as $film)
                            <div class=" show">
                                <div class="film-card">
                                    <div class="film-poster">
                                        <img src="{{ $film->poster }}" alt="show Poster">
                                    </div>
                                    <div class="film-details">
                                        <h2 class="film-title">{{ $film->title }}</h2>
                                        <p class="film-info"><strong>Release Date:</strong> {{ $film->release_date }}</p>
                                        <p class="film-info"><strong>Genre:</strong> {{ $film->genre }}</p>
                                        <p class="film-info"><strong>Director:</strong> {{ $film->director }}</p>
                                        <p class="film-info"><strong>Production Company:</strong>
                                            {{ $film->production_company }}</p>
                                        <p class="film-info"><strong>Nombre of seasons :</strong> {{ $film->nbr_seasons }}
                                        </p>
                                        <p class="film-info"><strong>Nombre of episodes :</strong>
                                            {{ $film->nbr_episodes }}
                                        </p>

                                        <p class="film-info"><strong>Main Leads:</strong> {{ $film->main_leads }}</p>
                                        <p class="film-info"><strong>Plot Summary:</strong> {{ $film->plot_summary }}</p>
                                        <p class="film-info"><strong>Rating:</strong> {{ $film->rating }}</p>
                                        <p class="film-info"><strong>Country:</strong> {{ $film->country }}</p>
                                        <p class="film-info"><strong>Language:</strong> {{ $film->language }}</p>
                                        @php
                                        $item = $allList->first(function ($item) use ($film) {
                                            return $item->show_id == $film->id && $item->user_id == Auth::user()->id;
                                        });
                                    @endphp
                                    
                                    @if ($item)
                                        <form action="{{ route('delete', [$item->id]) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="remove-to-watchlist-btn">Remove from watch list</button>
                                        </form>
                                        @else
                                            <form
                                                action="{{ route('add_watch', ['id' => Auth::user()->id, 'id_watch' => $film->id, 'type' => 'show']) }}"
                                                method="post">
                                                @csrf
                                                <a href="{{ route('show.details', $film->id) }}" class="btn btn-primary">Details</a>

                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

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
