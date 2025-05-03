@extends('layouts.app')

@section('content')
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card-header">Hello  {{ Auth::user()->name }} enjoy watching {{$watch->title}}</div>


<video src="{{$watch->src}}" controls autoplay ></video>
            </div></div></div></div>
@endsection