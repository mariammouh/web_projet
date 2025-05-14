@extends('layouts.admin')
@section('aside')
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
     <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" {{ url('/') }}" target="_blank">
        <img src="../assets/img/logo.jpeg" width="50px" height="100px" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">StreamMuse</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
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
          <a class="nav-link " href="../pages/tables.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Archive</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../pages/billing.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">users</span>
          </a>
        </li>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/profile.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/sign-in.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/sign-up.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-50 mx-auto" src="../assets/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
            <h6 class="mb-0">Need help?</h6>
            <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
          </div>
        </div>
      </div>
      <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
      <a class="btn btn-primary btn-sm mb-0 w-100" href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
    </div>
  </aside>
<<<<<<< HEAD
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">users</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">users</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
           <thead>
    <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contenu</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Film/Show</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Signalements</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th> <!-- Nouvelle colonne -->
    </tr>
</thead>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
=======

  @endsection
@section('content')
>>>>>>> e9c79c21b25cc1bfbaac2ce0e993a8a33ce6a98b
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-8">
                      <br> 
                      <br> 
                      <br> 
              </div>
            </div>

        </div>
        <div class="card mt-4">
  <div class="card-header">
    <h6>Ajouter un nouvel utilisateur</h6>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.users.store') }}">
      @csrf
      <p class="text-uppercase text-sm">User Information</p>
      <div class="row">
        <!-- Nom -->
        <div class="col-md-6">
          <div class="form-group">
            <label for="name" class="form-control-label">Nom</label>
            <input type="text" name="name" class="form-control" required>
          </div>
        </div>
        <!-- Email -->
        <div class="col-md-6">
          <div class="form-group">
            <label for="email" class="form-control-label">Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
        </div>
        <!-- Mot de passe -->
        <div class="col-md-6">
          <div class="form-group">
            <label for="password" class="form-control-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" required>
          </div>
        </div>
      </div>

      <hr class="horizontal dark">

      <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
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
                nom :<h6 class="mb-3 text-sm">{{ $user->name }}</h6>
                  <span class="mb-2 text-xs">Email Address:
                    <span class="text-dark ms-sm-2 font-weight-bold">{{ $user->email }}</span>
                  </span>
                  <span class="text-xs">Created At:
                    <span class="text-dark ms-sm-2 font-weight-bold">{{ $user->created_at->format('d/m/Y H:i') }}</span>
                  </span>
                </div>
                <div class="ms-auto text-end">
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Tu es sûre de vouloir supprimer cet utilisateur ?')" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0">
        <i class="far fa-trash-alt me-2"></i>Delete
    </button>
</form>
<a class="btn btn-link text-primary px-3 mb-0" data-bs-toggle="collapse" href="#watchlist-{{ $user->id }}" role="button" aria-expanded="false" aria-controls="watchlist-{{ $user->id }}">
    <i class="fas fa-film me-2"></i>Watchlist
</a>

                </div>
              </li>
              <div class="collapse" id="watchlist-{{ $user->id }}">
  <div class="card card-body bg-light mt-2">
    <h6 class="text-primary">Watchlist de {{ $user->name }} :</h6>
    @if($user->watchLists->count() > 0)
  @php
    $films = $user->watchLists->filter(fn($w) => $w->film);
    $shows = $user->watchLists->filter(fn($w) => $w->show);
  @endphp

  @if($films->count() > 0)
    <h6 class="text-primary">🎬 Films</h6>
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
    <p class="text-muted">Aucun média trouvé pour cet utilisateur.</p>
  @endif
@else
  <p class="text-muted">Aucune watchlist disponible pour cet utilisateur.</p>
@endif

  </div>
</div>

            @endforeach
          @else
            <li class="list-group-item border-0 p-4 bg-gray-100 border-radius-lg text-center text-danger">
              Aucun utilisateur trouvé.
            </li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</div>
    @endsection