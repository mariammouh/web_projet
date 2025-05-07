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
                        <div class="film-poster">
                        <img src="{{ $film->poster ?? $show->poster }}" alt="Poster">
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
                    <div class="col">
                        <div class="card h-100">
                            <img src="actor1.jpg" class="card-img-top" alt="Actor">
                            <div class="card-body">
                                <h6 class="card-title mb-0">John Smith</h6>
                                <small class="text-muted">Main Character</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="actor2.jpg" class="card-img-top" alt="Actor">
                            <div class="card-body">
                                <h6 class="card-title mb-0">Jane Doe</h6>
                                <small class="text-muted">Supporting Role</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="reviews" role="tabpanel">
                <div class="card border-0">
                    <div class="card-body">
                        <h5 class="card-title">User Reviews</h5>
                        <form class="mb-3">
                            <div class="form-group">
                                <textarea class="form-control" rows="3" placeholder="Write your review..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit Review</button>
                        </form>
                        
                        <div class="mt-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-grow-1 ms-3">
                                    <h6>John Doe <span class="text-warning">★★★★☆</span></h6>
                                    <p class="mb-0">This movie was absolutely fantastic!</p>
                                </div>
                            </div>
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