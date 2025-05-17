@extends('layouts.app')

@section('content')
<div class="flex items-center mb-6">
<a href="{{ route('home') }}" 
   class="group flex items-center transition-all duration-300"
   title="Back to Home">
   
   <!-- Animated Circle Background -->
   <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-800/50 group-hover:bg-purple-600/20 transition-all duration-300 mr-2">
      <!-- Animated Arrow -->
      <i class="fas fa-arrow-left text-xl text-gray-300 group-hover:text-purple-400 transform group-hover:-translate-x-1 transition-all duration-300"></i>
   </div>
   
   <!-- Optional Text (hidden on mobile) -->
   <span class="text-gray-400 group-hover:text-purple-300 text-sm font-medium hidden sm:block transition-colors duration-300">
      Home
   </span>
</a>
  
</div>
<div class="container mx-auto px-8 py-10">
    <h1 class="text-2xl font-bold mb-8">
        @if($query || $genre)
            Search Results
            @if($query) for "{{ $query }}" @endif
            @if($genre) in {{ $genre }} @endif
        @else
           Stream Library
        @endif
        @if($type !== 'all')
            <span class="text-purple-400">({{ ucfirst($type) }})</span>
        @endif
    </h1>
    
    <div class="mb-6 flex flex-wrap gap-4">
        <!-- Type Filter -->
        <div class="flex items-center">
            <label for="type" class="mr-2 text-gray-300">Type:</label>
            <select name="type" id="type" class="bg-gray-700 text-white rounded px-3 py-1" onchange="updateSearch()">
                <option value="all" {{ $type === 'all' ? 'selected' : '' }}>All</option>
                <option value="movie" {{ $type === 'movie' ? 'selected' : '' }}>Movies</option>
                <option value="series" {{ $type === 'series' ? 'selected' : '' }}>Series</option>
                <option value="kdrama" {{ $type === 'kdrama' ? 'selected' : '' }}>K-Dramas</option>
                <option value="anime" {{ $type === 'anime' ? 'selected' : '' }}>Anime</option>
            </select>
        </div>
        
        <!-- Genre Filter -->
        <div class="flex items-center">
            <label for="genre" class="mr-2 text-gray-300">Genre:</label>
            <select name="genre" id="genre" class="bg-gray-700 text-white rounded px-3 py-1" onchange="updateSearch()">
                <option value="">All Genres</option>
                @foreach($genres as $g)
                    <option value="{{ $g }}" {{ $genre === $g ? 'selected' : '' }}>{{ $g }}</option>
                @endforeach
            </select>
        </div>
        
        <!-- Search Box -->
        <div class="flex-1 max-w-md">
            <form id="searchForm" action="{{ route('search') }}" method="GET">
                <input type="hidden" name="type" id="hiddenType" value="{{ $type }}">
                <input type="hidden" name="genre" id="hiddenGenre" value="{{ $genre }}">
                <div class="relative">
                    <input type="text" name="query" value="{{ $query }}" 
                           class="w-full bg-gray-700 text-white rounded px-4 py-1 pr-8" 
                           placeholder="Search by title...">
                    <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2">
                        <i class="fas fa-search text-gray-400"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    @if($results->isEmpty())
        <div class="text-center py-12">
            <i class="fas fa-search text-4xl text-gray-500 mb-4"></i>
            <p class="text-gray-400">No results found for your search.</p>
          
        </div>
    @else
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
            @foreach($results as $item)
                @include('components.content-card', ['item' => $item])
            @endforeach
        </div>
        
        @if(isset($pagination))
            <div class="mt-8">
                {{ $pagination->links() }}
            </div>
        @endif
    @endif
</div>

<script>
    function updateSearch() {
        document.getElementById('hiddenType').value = document.getElementById('type').value;
        document.getElementById('hiddenGenre').value = document.getElementById('genre').value;
        document.getElementById('searchForm').submit();
    }
</script>
@endsection