@extends('layouts.app')

@section('content')
<div class="container">
    <div class="details">
        <h2 class="film-title mb-4">{{ $film->title ?? $show->title }}</h2>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
            
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="know-tab" data-bs-toggle="tab" data-bs-target="#know" type="button" role="tab">What to Know</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="cast-tab" data-bs-toggle="tab" data-bs-target="#cast" type="button" role="tab">Cast</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">Reviews</button>
            </li>
        </ul>

        <!-- Main Content -->
        <div class="film-content-wrapper">
            <!-- Your existing content here -->
        </div>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Reviews Tab -->
           
            <!-- What to Know Tab -->
            <div class="tab-pane fade show active" id="know" role="tabpanel">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="card-title">Key Information</h5>
                        
                        <!-- In movie_details.blade.php, inside the "film-poster" div -->
                        <div class="film-poster">
                            <img src="{{ $film->poster ?? $show->poster }}" alt="Poster">
                            @if(isset($film))
                                @if($isInWatchlist)
                                    <form action="{{ route('delete', $watchlistId) }}" method="POST" class="mt-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Remove from Watchlist</button>
                                    </form>
                                @else
                                    <form action="{{ route('add_watch', ['id' => auth()->id(), 'id_watch' => $film->id, 'type' => 'film']) }}" method="POST" class="mt-2">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Add to Watchlist</button>
                                    </form>
                                @endif
                            @elseif(isset($show))
                                @if($isInWatchlist)
                                    <form action="{{ route('delete', $watchlistId) }}" method="POST" class="mt-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Remove from Watchlist</button>
                                    </form>
                                @else
                                    <form action="{{ route('add_watch', ['id' => auth()->id(), 'id_watch' => $show->id, 'type' => 'show']) }}" method="POST" class="mt-2">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Add to Watchlist</button>
                                    </form>
                                @endif
                            @endif
                        </div>
                        <ul class="list-group list-group-flush">
                           <li class="list-group-item"><strong>Release Date:</strong> {{ $film->release_date ?? $show->release_date }}
                           <li class="list-group-item"><strong>Genre:</strong> {{ $film->genre ?? $show->genre }}
                           <li class="list-group-item"><strong>Director:</strong> {{ $film->director ?? $show->director }}
                           <li class="list-group-item"><strong>Production Company:</strong> {{ $film->production_company ?? $show->production_company }}
                           @if (isset($film))
                           <li class="list-group-item"><strong>Duration:</strong> {{ $film->duration }}
                            @elseif (isset($show))
                           <li class="list-group-item"><strong>Number of Seasons:</strong> {{ $show->nbr_seasons }}
                           <li class="list-group-item"><strong>Number of Episodes:</strong> {{ $show->nbr_episodes }}
                             @endif


                        </ul>
                    </div>
                </div>
            </div>

            <!-- Cast Tab -->
            <div class="tab-pane fade" id="cast" role="tabpanel">
                <div class="row row-cols-2 row-cols-md-4 g-4">
                    @php
                        $castList = $film->actors ?? $show->actors ?? collect();
                    @endphp

                    @foreach ($castList as $actor)
                        <div class="col">
                            <div class="card h-100">
                                <a href="{{ route('actor.details', $actor->id) }}">
                                    <img src="{{ asset($actor->image) }}" class="card-img-top" alt="{{ $actor->name }}">
                                </a>
                                <div class="card-body">
                                    <h6 class="card-title mb-0">{{ $actor->name }}</h6>
                                    <small class="text-muted">{{ $actor->pivot->role }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>



            <div class="tab-pane fade" id="reviews" role="tabpanel">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="card-title">User Reviews</h5>
                        
                        @auth
                        <form method="POST" action="{{ route('comments.store') }}" class="mb-3">
                            @csrf
                            <input type="hidden" name="{{ $film ? 'film_id' : 'show_id' }}" value="{{ $film->id ?? $show->id }}">
                            
                            <div class="form-group mb-3">
                                <textarea name="content" class="form-control" rows="3" placeholder="Écrivez votre avis..." required></textarea>
                            </div>
                            
                            <div class="rating mb-3">
                                <select name="rating" class="form-select" required>
                                    <option value="">Choisir une note</option>
                                    @for($i = 5; $i >= 1; $i--)
                                        <option value="{{ $i }}">{{ $i }} ★</option>
                                    @endfor
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                        @endauth

                        <div class="mt-4">
                           @foreach(($comments ?? collect())->sortByDesc('created_at') as $comment)
                                <div class="d-flex align-items-center mb-3 border-bottom pb-3">
                                    <div class="flex-grow-1 ms-3">
                                        <h6>
                                            {{ $comment->user->name }}
                                            @if($comment->rating)
                                            <span class="text-warning">
                                                {{ str_repeat('★', $comment->rating) }}{{ str_repeat('☆', 5 - $comment->rating) }}
                                            </span>
                                            @endif
                                            
                                            @auth
                                            <div class="float-end btn-group">
                                                {{-- Bouton Suppression --}}
                                                @if(Auth::id() === $comment->user_id)
                                                <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce commentaire ?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                                @endif
                                                
                                                {{-- Bouton Signalement --}}
                                                <form method="POST" action="{{ route('comments.report', $comment) }}">
                                                    @csrf
                                                    <button type="submit" 
                                                            class="btn btn-sm btn-outline-danger ms-1"
                                                            {{ $comment->isReportedBy(Auth::id()) ? 'disabled' : '' }}>
                                                        Signaler 
                                                    </button>
                                                </form>
                                            </div>
                                            @endauth
                                        </h6>
                                        <p class="mb-0">{{ $comment->content }}</p>
                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@section('scripts')
<!-- Bootstrap JS (if not already in your layout) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
@endsection