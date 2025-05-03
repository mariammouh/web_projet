@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                
                    <div class="card">
                        <div class="card-header">{{ __('Top watching') }}</div>
                        @foreach ($allList as $film)
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
                                        @if (!empty($film->duration))
                                            <p class="film-info"><strong>Duration:</strong> {{ $film->duration }}</p>
                                        @else
                                        <p class="film-info"><strong>Nombre of seasons :</strong> {{ $film->nbr_seasons }} </p>
                                        <p class="film-info"><strong>Nombre of episodes :</strong> {{ $film->nbr_episodes }}

                                        @endif
                                        <p class="film-info"><strong>Main Leads:</strong> {{ $film->main_leads }}</p>
                                        <p class="film-info"><strong>Plot Summary:</strong> {{ $film->plot_summary }}</p>
                                        <p class="film-info"><strong>Rating:</strong> {{ $film->rating }}</p>
                                        <p class="film-info"><strong>Country:</strong> {{ $film->country }}</p>
                                        <p class="film-info"><strong>Language:</strong> {{ $film->language }}</p>
                                       

                                        <form
                                            action="{{ route('add_watch', ['id' => Auth::user()->id, 'id_watch' => $film->id, 'type' => 'film']) }}"
                                            method="post">
                                            @csrf
                                            <button type="submit" class="add-to-watchlist-btn">Add to Watchlist</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card">



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
