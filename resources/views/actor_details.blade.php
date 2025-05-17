@extends('layouts.app')

@section('content')
<div class="bg-gray-900 min-h-screen">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-b from-gray-800 to-gray-900">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row gap-8">
            <!-- Actor Image -->
            <div class="w-full md:w-1/3 lg:w-1/4 relative">
                <img src="{{ asset($actor->image) }}" 
                     alt="{{ $actor->name }}" 
                     class="rounded-xl shadow-2xl transform hover:scale-105 transition-transform duration-300">
            </div>

            <!-- Actor Info -->
            <div class="w-full md:w-2/3 lg:w-3/4 text-gray-100">
                <h1 class="text-4xl lg:text-5xl font-bold mb-4">{{ $actor->name }}</h1>
                
                <!-- Metadata -->
                <div class="flex flex-wrap gap-4 mb-8">
                    @if($actor->birth_date)
                    <div class="flex items-center bg-gray-800 px-4 py-2 rounded-full">
                        <i class="bi bi-balloon mr-2 text-indigo-400"></i>
                        {{ \Carbon\Carbon::parse($actor->birth_date)->format('d M Y') }}
                    </div>
                    @endif
                    
                    @if($actor->nationality)
                    <div class="flex items-center bg-gray-800 px-4 py-2 rounded-full">
                        <i class="bi bi-globe mr-2 text-indigo-400"></i>
                        {{ $actor->nationality }}
                    </div>
                    @endif
                </div>

                <!-- Bio Section -->
                <div class="bg-gray-800 p-6 rounded-xl mb-8">
                    <h3 class="text-2xl font-semibold mb-4">Biographie</h3>
                    <p class="text-gray-300 leading-relaxed">
                        {{ $actor->bio ?? 'Aucune biographie disponible pour le moment.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filmography Section -->
    <div class="container mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-gray-100 mb-8 border-b border-gray-700 pb-2">
            Filmographie <span class="text-indigo-400">({{ $actor->films->count() }})</span>
        </h2>

        @if($actor->films->isNotEmpty())
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($actor->films as $film)
            <a href="{{ route('film.details', $film->id) }}" 
               class="group bg-gray-800 rounded-xl overflow-hidden hover:bg-gray-700 transition-colors shadow-lg">
                <div class="aspect-[2/3] relative">
                    <img src="{{ asset($film->poster) }}" 
                         alt="{{ $film->title }}" 
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform">
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-gray-900">
                        <span class="text-sm font-medium bg-indigo-600 text-white px-3 py-1 rounded-full">
                            {{ $film->pivot->role ?? 'Rôle non spécifié' }}
                        </span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-100 truncate">{{ $film->title }}</h3>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-sm text-gray-400">
                            {{ date('Y', strtotime($film->release_date)) }}
                        </span>
                        <span class="text-sm text-indigo-400">
                            {{ $film->genre }}
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div class="bg-gray-800 rounded-xl p-6 text-center">
            <p class="text-gray-400 text-lg">
                <i class="bi bi-film mr-2"></i>
                Aucune apparition connue dans des films ou séries
            </p>
        </div>
        @endif
    </div>
</div>

@section('styles')
<style>
    .aspect-\[2\/3\] {
        aspect-ratio: 2/3;
    }
</style>
@endsection

@section('scripts')
<script src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
<script src="https://unpkg.com/alpinejs" defer></script>
@endsection

@endsection