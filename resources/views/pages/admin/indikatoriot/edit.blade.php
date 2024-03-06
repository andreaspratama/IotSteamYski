@extends('layouts.admin')

@section('title')
    Edit Indikator IoT
@endsection

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
          <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
              <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-2">
                  Edit Indikator {{$item->nama}}
                </h1>
                {{-- <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                  Carefully designed elements that will ensure a great experience for your users.
                </h2> --}}
              </div>
              <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                  <li class="breadcrumb-item">
                    @if (Auth::user()->role === 'ADMIN')
                    <a class="link-fx" href="{{route('dashboardAdmin')}}">Dashboard</a>
                    {{-- <a class="nav-main-link active" href="{{route('dashboardAdmin')}}">
                      <i class="nav-main-link-icon si si-speedometer"></i>
                      <span class="nav-main-link-name">Dashboard</span>
                    </a> --}}
                    @else
                      <a class="link-fx" href="{{route('dashboardUser')}}">Dashboard</a>
                      {{-- <a class="nav-main-link active" href="{{route('dashboardUser')}}">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                      </a> --}}
                    @endif
                  </li>
                  <li class="breadcrumb-item" aria-current="page">
                    Indikator
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
          <!-- Floating Labels -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Indikator</h3>
            </div>
            <div class="block-content block-content-full">
              <form action="{{route('indikatoriot.update', $item->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-lg-12 col-xl-12">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="John Doe" value="{{$item->nama}}">
                        <label for="nama">Nama</label>
                        @error('nama')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-danger" type="reset">Reset</button>
                        <a href="{{route('indikatoriot.index')}}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
              </form>
            </div>
          </div>
          <!-- END Floating Labels -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
    @include('sweetalert::alert')
@endsection