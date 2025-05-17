<div class="content-card bg-gray-800 rounded-lg overflow-hidden group">
    @if($item instanceof \App\Models\Film)
        <a href="{{ route('film.details', $item->id) }}">
    @else
        <a href="{{ route('show.details', $item->id) }}">
    @endif
        <img src="{{ asset($item->poster) }}" alt="{{ $item->title }}" class="w-full h-80 object-cover">
        <div class="p-3">
            <h3 class="font-semibold truncate">{{ $item->title }}</h3>
            <div class="flex justify-between items-center mt-2">
                <span class="text-yellow-400 text-sm flex items-center">
                    <i class="fas fa-star mr-1"></i> {{ $item->rating ?? 'N/A' }}
                </span>
                <span class="text-gray-400 text-xs">
                    @if($item instanceof \App\Models\Film)
                        Movie
                    @else
                        {{ ucfirst($item->type) }}
                    @endif
                </span>
            </div>
            <!-- Add genre display -->
            <div class="mt-2">
                @foreach(explode(', ', $item->genre) as $genre)
                    <span class="inline-block bg-gray-700 rounded-full px-2 py-1 text-xs text-gray-300 mr-1 mb-1">
                        {{ trim($genre) }}
                    </span>
                @endforeach
            </div>
        </div>
    </a>
</div>