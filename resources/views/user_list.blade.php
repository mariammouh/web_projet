@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-7xl mx-auto">

            <div class="flex justify-between items-center mb-8">
                <h1 class="section-title text-2xl font-bold inline-block relative text-white">
                    Your watch list
                </h1>
            </div>

            @if (session('status'))
                <div class="bg-green-500 text-white p-4 rounded mb-6" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Check if the list is empty using forelse --}}
            @forelse($allList as $item)
            @empty
                {{-- Message to display if the watch list is empty --}}
                <p class="text-white text-center text-lg">Your watch list is empty.</p>
            @endforelse

            {{-- If list is NOT empty, display the grid and loop through items --}}
            @if ($allList->isNotEmpty())
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                    @foreach($allList as $item)
                        @php
                            $detailUrl = '#'; // Default fallback URL

                            // Determine the correct route and ID based on whether it's a film or show
                            // Assuming $item has either film_id OR show_id
                            if (isset($item->film_id) && !is_null($item->film_id)) {
                                // It's a film item
                                $detailUrl = route('film.details', $item->film_id); // Use film_id for the route
                            } elseif (isset($item->show_id) && !is_null($item->show_id)) {
                                // It's a show item
                                $detailUrl = route('show.details', $item->show_id); // Use show_id for the route
                            }
                            // If neither ID is present, detailUrl remains '#'
                        @endphp

                        {{-- Use the card structure from the second example --}}
                        {{-- Link the entire card to the detail URL --}}
                        <a href="{{ $detailUrl }}" class="block group relative rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                            {{-- Display the poster (assuming $item->poster exists) --}}
                            <img src="{{ $item->poster ?? asset('images/placeholder.png') }}" alt="{{ $item->title ?? 'No Title' }}" class="w-full h-auto object-cover">

                            {{-- Overlay for hover effect --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                            {{-- Title displayed at the bottom on hover --}}
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                <h3 class="text-base font-semibold">{{ $item->title ?? 'Unknown Title' }}</h3>
                                {{-- Add other relevant info if needed, e.g., year, rating --}}
                            </div>
                        </a>

                    @endforeach
                </div>
            @endif

            {{-- The rating and watch forms from the original code were complex and not part of the simple card style.
                 If you need those functionalities, they would typically go on the detail page itself,
                 or you'd need a different card design that accommodates buttons/forms.
                 For this request focusing on the simple card grid display and linking, they are omitted here.
            --}}

        </div>
    </div>
@endsection