{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')
@section('aside')
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" {{ url('/') }}" target="_blank">
        <img src="../assets/img/logo-ct-dark.png" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">  Watch it </span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="{{ url('admin/dashboard') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ url('admin/archive') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-archive-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Archive</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/billing.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
      {{--   <li class="nav-item">
          <a class="nav-link " href="../pages/virtual-reality.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Virtual Reality</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/rtl.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li> --}}
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/profile.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-dark text-sm opacity-10"></i>
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
  {{--   <div class="sidenav-footer mx-3 ">
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
    </div> --}}
  </aside>
@endsection
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Add to Archive</p>
              <button class="btn btn-danger btn-sm ms-auto" onclick="clearForm('myForm')">Empty</button>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ url('/admin/archive/add') }}" id="myForm" method="POST" enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- Toggle Switch -->
            <div class="form-check form-switch mb-4">
                <input class="form-check-input" type="checkbox" id="toggleType" onchange="toggleForm()">
                <label class="form-check-label" for="toggleType">Add a Show (unchecked = Film)</label>
                <input type="hidden" name="media_type" id="media_type" value="film">
              </div>
              
  
            <!-- Common Fields -->
            <p class="text-uppercase text-sm">Basic Information</p>
            <div class="row">
              <div class="col-md-6">
                <label class="form-control-label">Title</label>
                <input class="form-control" type="text" name="title">
              </div>
              <div class="col-md-6">
                <label class="form-control-label">Release Date</label>
                <input class="form-control" type="date" name="release_date">
              </div>
              <div class="col-md-6">
                <label class="form-control-label">Genre</label>
                <input class="form-control" type="text" name="genre">
              </div>
              <div class="col-md-6">
                <label class="form-control-label">Director</label>
                <input class="form-control" type="text" name="director">
              </div>
              <div class="col-md-6">
                <label class="form-control-label">Production Company</label>
                <input class="form-control" type="text" name="production_company">
              </div>
              <div class="col-md-6">
                <label class="form-control-label">Main Leads</label>
                <input class="form-control" type="text" name="main_leads">
              </div>
            </div>
  
            <hr class="horizontal dark">
  
           
            <div id="filmFields">
              <p class="text-uppercase text-sm">Film Details</p>
              <div class="row">
                <div class="col-md-6">
                  <label class="form-control-label">Duration in mins</label>
                  <input class="form-control" type="number" name="duration">
                </div>
                <div class="col-md-6">
                    <label class="form-control-label d-block mb-2">Upload Trailer Video</label>
                    <div class="input-group">
                      <label class="input-group-text bg-gradient-primary text-white" for="src">
                        <i class="fas fa-upload me-2"></i> Choose Video
                      </label>
                      <input class="form-control" type="file" name="trailer" id="src" accept="video/*" hidden onchange="updateVideoLabel(this)">
                     
                    </div>
                  </div>
                  
                  <script>
                    function updateVideoLabel(input) {
                      const fileName = input.files.length > 0 ? input.files[0].name : "No file chosen";
                      document.getElementById("video-file-name").textContent = fileName;
                    }
                  </script>
              </div>
            </div>
  
            <!-- Show-specific fields -->
            <div id="showFields" style="display: none;">
              <p class="text-uppercase text-sm">Show Details</p>
              <div class="row">
                <div class="col-md-6">
                  <label class="form-control-label">Number of Seasons</label>
                  <input class="form-control" type="number" name="nbr_seasons">
                </div>
                <div class="col-md-6">
                  <label class="form-control-label">Number of Episodes</label>
                  <input class="form-control" type="number" name="nbr_episodes">
                </div>
              </div>
            </div>
  
            <hr class="horizontal dark">
  
            <!-- Shared Additional Info -->
            <p class="text-uppercase text-sm">Additional Information</p>
            <div class="row">
              <div class="col-md-6">
                <label class="form-control-label">Rating</label>
                <input class="form-control" type="text" name="rating">
              </div>
              <div class="col-md-6">
                <label class="form-control-label">Country</label>
                <input class="form-control" type="text" name="country">
              </div>
              <div class="col-md-6">
                <label class="form-control-label">Language</label>
                <input class="form-control" type="text" name="language">
              </div>
              <div class="col-md-6">
                <label class="form-control-label d-block mb-2">Upload Poster</label>
                <div class="input-group">
                  <label class="input-group-text bg-gradient-primary text-white" for="posterInput">
                    <i class="fas fa-upload me-2"></i> Choose image
                  </label>
                  <input class="form-control" type="file" name="poster" id="posterInput" accept="image/*" hidden onchange="updatePosterLabel(this)">
                </div>
              </div>
              <script>
                function updatePosterLabel(input) {
                  const label = input.previousElementSibling;
                  const fileName = input.files[0] ? input.files[0].name : 'Choose image';
                  label.innerHTML = `<i class="fas fa-upload me-2"></i> ${fileName}`;
                }
                
  function clearForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return;

    form.reset(); // Resets all fields to default values
  }


              </script>
                            
              <div class="col-md-12">
                <label class="form-control-label">Plot Summary</label>
                <textarea class="form-control" name="plot_summary" rows="3"></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
  </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function toggleForm() {
      const isShow = document.getElementById('toggleType').checked;
      document.getElementById('filmFields').style.display = isShow ? 'none' : 'block';
      document.getElementById('showFields').style.display = isShow ? 'block' : 'none';
      const checkbox = document.getElementById('toggleType');
    const mediaTypeInput = document.getElementById('media_type');
    mediaTypeInput.value = checkbox.checked ? 'show' : 'film';
    }
  </script>
@endsection
