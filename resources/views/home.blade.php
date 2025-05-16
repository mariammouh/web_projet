@extends('layouts.app')

@section('content')
   <!-- Movies Section -->
<section class="mb-14">
    <div class="flex justify-between items-center mb-8">
        <h2 class="section-title text-2xl font-bold inline-block relative">
            Movies
        </h2>
        <a href="{{ route('browse', 'movies') }}" class="text-sm font-medium text-purple-300 hover:text-purple-200 flex items-center">
          View All <i class="fas fa-chevron-right ml-1 text-xs"></i>
        </a>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
        @foreach($movies as $movie)
            @include('components.content-card', ['item' => $movie])
        @endforeach
    </div>
</section>

<!-- Series Section -->
<section class="mb-14">
    <div class="flex justify-between items-center mb-8">
        <h2 class="section-title text-2xl font-bold inline-block relative">
            Series
        </h2>
        <a href="{{ route('browse', 'series') }}" class="text-sm font-medium text-purple-300 hover:text-purple-200 flex items-center">
          View All <i class="fas fa-chevron-right ml-1 text-xs"></i>
        </a>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
        @foreach($series as $show)
            @include('components.content-card', ['item' => $show])
        @endforeach
    </div>
</section>

<!-- K-Drama Section -->
<section class="mb-14">
    <div class="flex justify-between items-center mb-8">
        <h2 class="section-title text-2xl font-bold inline-block relative">
            K-Drama Collection
        </h2>
        <a  href="{{ route('browse', 'kdrama') }}" class="text-sm font-medium text-purple-300 hover:text-purple-200 flex items-center">
          View All <i class="fas fa-chevron-right ml-1 text-xs"></i>
        </a>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
        @foreach($kdramas as $show)
            @include('components.content-card', ['item' => $show])
        @endforeach
    </div>
</section>

<!-- Anime Section -->
<section class="mb-14">
    <div class="flex justify-between items-center mb-8">
        <h2 class="section-title text-2xl font-bold inline-block relative">
            Anime
        </h2>
       <a href="{{ route('browse', 'anime') }}" class="text-sm font-medium text-purple-300 hover:text-purple-200 flex items-center">
          View All <i class="fas fa-chevron-right ml-1 text-xs"></i>
       </a>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
        @foreach($anime['all'] as $item)
            @include('components.content-card', ['item' => $item])
        @endforeach
    </div>
</section>
@endsection