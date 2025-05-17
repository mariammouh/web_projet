@extends('layouts.app')

@section('content')

<div class="bg-gray-900 min-h-screen">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-b from-gray-800 to-gray-900">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row gap-8">
            <!-- Poster + Actions -->
            <div class="w-full md:w-1/3 lg:w-1/4 relative">
                <img src="{{ $film->poster ?? $show->poster }}" 
                     alt="Poster" 
                     class="rounded-xl shadow-2xl transform hover:scale-105 transition-transform duration-300">

            <!-- Watchlist Button -->
            <div class="mt-6">
                @auth
                    @php
                        $watchEntry = $film 
                            ? App\Models\watch_list::where('user_id', Auth::id())->where('film_id', $film->id)->first()
                            : App\Models\watch_list::where('user_id', Auth::id())->where('show_id', $show->id)->first();
                    @endphp

                    @if($watchEntry)
                        <form method="POST" action="{{ route('delete', $watchEntry->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg flex items-center justify-center space-x-2 transition-colors">
                                <i class="bi bi-bookmark-dash"></i>
                                <span>Remove from Watchlist</span>
                            </button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('add_watch', [
                            'id' => Auth::id(),
                            'id_watch' => $film->id ?? $show->id,
                            'type' => $film ? 'film' : 'show'
                        ]) }}">
                            @csrf
                            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg flex items-center justify-center space-x-2 transition-colors">
                                <i class="bi bi-bookmark-plus"></i>
                                <span>Add to Watchlist</span>
                            </button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>

        <!-- Main Content -->
        <div class="w-full md:w-2/3 lg:w-3/4 text-gray-100">
            <h1 class="text-4xl lg:text-5xl font-bold mb-4">{{ $film->title ?? $show->title }}</h1>
            
            <!-- Metadata -->
            <div class="flex flex-wrap gap-4 mb-8">
                
                <div class="flex items-center bg-gray-800 px-4 py-2 rounded-full">
                    <i class="bi bi-clock mr-2 text-indigo-400"></i>
                    {{ $film->duration ?? $show->nbr_seasons . ' Seasons' }}
                </div>
                <div class="flex items-center bg-gray-800 px-4 py-2 rounded-full">
                    <i class="bi bi-tags mr-2 text-indigo-400"></i>
                    {{ $film->genre ?? $show->genre }}
                </div>
            </div>

            <!-- Tab Navigation -->
            <div x-data="{ activeTab: 'details' }">
                <nav class="border-b border-gray-700 mb-8">
                    <div class="flex space-x-8">
                        <button @click="activeTab = 'details'" 
                                :class="activeTab === 'details' ? 'border-indigo-500 text-indigo-400' : 'border-transparent text-gray-400 hover:text-gray-300'" 
                                class="pb-4 px-1 border-b-2 font-medium text-lg focus:outline-none transition-colors">
                            Details
                        </button>
                        <button @click="activeTab = 'cast'" 
                                :class="activeTab === 'cast' ? 'border-indigo-500 text-indigo-400' : 'border-transparent text-gray-400 hover:text-gray-300'" 
                                class="pb-4 px-1 border-b-2 font-medium text-lg focus:outline-none transition-colors">
                            Cast
                        </button>
                        <button @click="activeTab = 'reviews'" 
                                :class="activeTab === 'reviews' ? 'border-indigo-500 text-indigo-400' : 'border-transparent text-gray-400 hover:text-gray-300'" 
                                class="pb-4 px-1 border-b-2 font-medium text-lg focus:outline-none transition-colors">
                            Reviews
                        </button>
                    </div>
                </nav>

                <!-- Tab Content -->
                <div class="relative overflow-hidden">
                    <!-- Details Tab -->
                    <div x-show="activeTab === 'details'" 
                         x-transition:enter="transition transform duration-500" 
                         x-transition:enter-start="translate-x-full opacity-0" 
                         x-transition:enter-end="translate-x-0 opacity-100" 
                         x-transition:leave="transition transform duration-500" 
                         x-transition:leave-start="translate-x-0 opacity-100" 
                         x-transition:leave-end="-translate-x-full opacity-0" 
                         class="space-y-6">
                        <div class="bg-gray-800 p-6 rounded-xl">
                            <h3 class="text-2xl font-semibold mb-4">Plot Summary</h3>
                            <p class="text-gray-300 leading-relaxed">
                                {{ $film->plot_summary ?? $show->plot_summary }}
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gray-800 p-6 rounded-xl">
                                <h3 class="text-2xl font-semibold mb-4">Production Info</h3>
                                <div class="space-y-3">
                                    <p><span class="font-medium text-indigo-400">Director:</span> {{ $film->director ?? $show->director }}</p>
                                    <p><span class="font-medium text-indigo-400">Studio:</span> {{ $film->production_company ?? $show->production_company }}</p>
                                    <p><span class="font-medium text-indigo-400">Country:</span> {{ $film->country ?? $show->country }}</p>
                                    <p><span class="font-medium text-indigo-400">Language:</span> {{ $film->language ?? $show->language }}</p>

                                    @if($show)
                                        <p><span class="font-medium text-indigo-400">Episodes:</span> {{ $show->nbr_episodes }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="bg-gray-800 p-6 rounded-xl">
                                <h3 class="text-2xl font-semibold mb-4">Main Cast</h3>
                                <div class="flex flex-wrap gap-4">
                                    @foreach(($film->actors ?? $show->actors ?? collect())->take(1) as $actor)
                                        <div class="flex items-center space-x-3">
                                            <img src="{{ asset($actor->image) }}" 
                                                 class="w-12 h-12 rounded-full object-cover"
                                                 alt="{{ $actor->name }}">
                                            <div>
                                                <p class="font-medium">{{ $actor->name }}</p>
                                                <p class="text-sm text-gray-400">{{ $actor->pivot->role }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cast Tab -->
                    <div x-show="activeTab === 'cast'" 
                         x-transition:enter="transition transform duration-500" 
                         x-transition:enter-start="translate-x-full opacity-0" 
                         x-transition:enter-end="translate-x-0 opacity-100" 
                         x-transition:leave="transition transform duration-500" 
                         x-transition:leave-start="translate-x-0 opacity-100" 
                         x-transition:leave-end="-translate-x-full opacity-0" 
                         class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($film->actors ?? $show->actors ?? collect() as $actor)
                            <a href="{{ route('actor.details', $actor->id) }}" 
                               class="group bg-gray-800 p-4 rounded-xl hover:bg-gray-700 transition-colors">
                                <div class="aspect-square relative overflow-hidden rounded-lg mb-4">
                                    <img src="{{ asset($actor->image) }}" 
                                         alt="{{ $actor->name }}"
                                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform">
                                </div>
                                <h4 class="font-semibold text-lg">{{ $actor->name }}</h4>
                                <p class="text-indigo-400 text-sm">{{ $actor->pivot->role }}</p>
                            </a>
                        @endforeach
                    </div>

                    <!-- Reviews Tab -->
                    <div x-show="activeTab === 'reviews'" 
                         x-transition:enter="transition transform duration-500" 
                         x-transition:enter-start="translate-x-full opacity-0" 
                         x-transition:enter-end="translate-x-0 opacity-100" 
                         x-transition:leave="transition transform duration-500" 
                         x-transition:leave-start="translate-x-0 opacity-100" 
                         x-transition:leave-end="-translate-x-full opacity-0" 
                         class="space-y-8">
                        @auth
                        <div class="bg-gray-800 p-6 rounded-xl">
                            <h3 class="text-2xl font-semibold mb-6">Write a Review</h3>
                            <form method="POST" action="{{ route('comments.store') }}">
                                @csrf
                                <input type="hidden" name="{{ $film ? 'film_id' : 'show_id' }}" value="{{ $film->id ?? $show->id }}">
                                
                                <div class="mb-6">
                                    <textarea name="content" 
                                              class="w-full bg-gray-700 rounded-lg p-4 text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                              rows="4"
                                              placeholder="Share your thoughts..."></textarea>
                                </div>
                                
                                <div class="flex flex-wrap gap-6 items-center justify-between">
                                    <select name="rating" 
                                            class="bg-gray-700 rounded-lg px-4 py-2 text-gray-100 focus:ring-2 focus:ring-indigo-500">
                                        <option value="">Select Rating</option>
                                        @for($i = 5; $i >= 1; $i--)
                                            <option value="{{ $i }}">{{ $i }} ★</option>
                                        @endfor
                                    </select>
            
                                    <button type="submit" 
                                            class="bg-indigo-600 hover:bg-indigo-700 px-8 py-3 rounded-lg font-semibold transition-colors">
                                        Submit Review
                                    </button>
                                </div>
                            </form>
                        </div>
                        @endauth

                        <!-- Reviews List -->
                        <div class="space-y-6">
                            @foreach(($comments ?? collect())->sortByDesc('created_at') as $comment)
                            <div class="bg-gray-800 p-6 rounded-xl">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center">
                                            <span class="text-lg">{{ strtoupper(substr($comment->user->name, 0, 1)) }}</span>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold">{{ $comment->user->name }}</h4>
                                            <p class="text-sm text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    @auth
                                    <form method="POST" action="{{ route('comments.report', $comment) }}">
                                        @csrf
                                        <button type="submit" 
                                                class="text-red-400 hover:text-red-300 text-sm"
                                                {{ $comment->isReportedBy(Auth::id()) ? 'disabled' : '' }}>
                                            Report 
                                        </button>
                                    </form>
                                    @endauth
                                </div>
                                
                                @if($comment->rating)
                                <div class="mb-4">
                                    <div class="text-indigo-400">
                                        @for($i = 0; $i < $comment->rating; $i++)
                                            ★
                                        @endfor
                                    </div>
                                </div>
                                @endif
                                
                                <p class="text-gray-300 leading-relaxed">{{ $comment->content }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>

<script src="https://unpkg.com/alpinejs" defer></script>

@endsection
@endsection