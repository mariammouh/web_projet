@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset($actor->image) }}" alt="{{ $actor->name }}" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-8">
            <h2>{{ $actor->name }}</h2>
            <p><strong>Date de naissance :</strong> {{ $actor->birth_date ?? 'Inconnue' }}</p>
            <p><strong>Nationalité :</strong> {{ $actor->nationality ?? 'Inconnue' }}</p>
        </div>
    </div>
</div>
@endsection
