@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Back button and title -->
    <div class="flex items-center mb-8">
        <a href="{{ route('home') }}" class="mr-4 text-gray-300 hover:text-white">
            <i class="fas fa-arrow-left text-2xl"></i>
        </a>
        <h1 class="text-3xl font-bold">{{ $title }}</h1>
    </div>
    
    <!-- Content grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6">
        @foreach($content as $item)
            @include('components.content-card', ['item' => $item])
        @endforeach
    </div>
    
    <!-- Pagination -->
    <div class="mt-8">
        {{ $content->links() }}
    </div>
</div>
@endsection