@extends('layouts.app')

@section('content')
<div class="bg-gray-900 py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-white mb-2">{{ $watch->title }}</h1>
                <div class="flex items-center space-x-4 text-gray-400">
                    <span>{{ $watch->release_date->format('Y') }}</span>
                    <span>{{ $watch->genre }}</span>
                    @if($watch->rating)
                        <span class="text-yellow-400">
                            <i class="fas fa-star mr-1"></i> {{ $watch->rating }}
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="bg-black rounded-lg overflow-hidden aspect-video mb-6">
                <video 
                    src="{{ asset($watch->src) }}" 
                    controls 
                    autoplay
                    class="w-full h-full"
                ></video>
            </div>
            
            <div class="bg-gray-800 rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">About</h2>
                <p class="text-gray-300">{{ $watch->plot_summary }}</p>
                
                @if($watch->main_leads)
                    <div class="mt-6">
                        <h3 class="font-medium mb-2">Starring:</h3>
                        <p>{{ $watch->main_leads }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection