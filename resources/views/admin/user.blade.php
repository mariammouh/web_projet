@extends('layouts.admin')

@section('aside')
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
<div class="sidenav-header h-200">
  <a class="navbar-brand m-2 p-3 pb flex items-center" href="{{ url('/') }}" target="_blank">
    <img src="{{ asset('img/LogoD.png') }}" width="auto" height="auto" style="max-width: 100%; max-height: 200px;" alt="main_logo">
    
  </a>
</div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/archive') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Archive</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ url('admin/users') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Users</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
@endsection

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-lg-8">
      <br><br><br>
    </div>
  </div>

  <div class="row"> 
    <div class="col-md-12 mt-4">
      <div class="card">
        <div class="card-header pb-0 px-3">
          <h6 class="mb-0">User Information</h6>
        </div>
        <div class="card-body pt-4 p-3">
          <ul class="list-group">
            @if($users->count() > 0)
              @foreach($users as $user)
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    Name: <h6 class="mb-3 text-sm">{{ $user->name }}</h6>
                    <span class="mb-2 text-xs">Email Address:
                      <span class="text-dark ms-sm-2 font-weight-bold">{{ $user->email }}</span>
                    </span>
                    <span class="text-xs">Created At:
                      <span class="text-dark ms-sm-2 font-weight-bold">{{ $user->created_at->format('d/m/Y H:i') }}</span>
                    </span>
                  </div>
                  <div class="ms-auto text-end">
                    <div class="d-inline">
                      <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0">
                          <i class="far fa-trash-alt me-2"></i>Delete
                        </button>
                      </form>

                      <form action="{{ route('show_list', $user->id) }}" method="GET" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-link text-primary px-3 mb-0">
                          <i class="fas fa-film me-2" style="display: inline;"></i>Watchlist
                        </button>
                      </form>
                    </div>
                  </div>
                </li>

                <div class="collapse" id="watchlist-{{ $user->id }}">
                  <div class="card card-body bg-light mt-2">
                    <h6 class="text-primary">{{ $user->name }}'s Watchlist:</h6>
                    @if($user->watchLists->count() > 0)
                      @php
                        $films = $user->watchLists->filter(fn($w) => $w->film);
                        $shows = $user->watchLists->filter(fn($w) => $w->show);
                      @endphp

                      @if($films->count() > 0)
                        <h6 class="text-primary">🎬 Movies</h6>
                        <ul class="list-group mb-3">
                          @foreach($films as $watch)
                            <li class="list-group-item">
                              {{ $watch->film->title }}
                            </li>
                          @endforeach
                        </ul>
                      @endif

                      @if($shows->count() > 0)
                        <h6 class="text-success">📺 Shows</h6>
                        <ul class="list-group">
                          @foreach($shows as $watch)
                            <li class="list-group-item">
                              {{ $watch->show->title }}
                            </li>
                          @endforeach
                        </ul>
                      @endif

                      @if($films->count() == 0 && $shows->count() == 0)
                        <p class="text-muted">No media found for this user.</p>
                      @endif
                    @else
                      <p class="text-muted">No watchlist available for this user.</p>
                    @endif
                  </div>
                </div>
              @endforeach
            @else
              <li class="list-group-item border-0 p-4 bg-gray-100 border-radius-lg text-center text-danger">
                No users found.
              </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
