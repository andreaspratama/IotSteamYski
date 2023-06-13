@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="content">
          <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
            <div class="flex-grow-1 mb-1 mb-md-0">
              <h1 class="h3 fw-bold mb-2">
                Dashboard
              </h1>
              {{-- <h2 class="h2 fw-medium fw-medium text-muted mb-0">
                Welcome <a class="fw-semibold" href="be_pages_generic_profile.html">John</a>, everything looks great.
              </h2> --}}
              <h2 style="margin-top: 210px; text-align: center">Selamat Datang, {{Auth::user()->name}}</h2>
            </div>
          </div>
        </div>
        <!-- END Hero -->
    </main>
    <!-- END Main Container -->
@endsection