@extends('layouts.admin')

@section('title')
    Create Sub Indikator Steam
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
                  List Daftar Sub Indikator Steam
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
                    Sub Indikator
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <div class="row">
              <div class="col-xl-12">
                <!-- Default Table -->
                <div class="block block-rounded">
                  <div class="block-header block-header-default">
                    <h3 class="block-title">Sub Indikator</h3>
                    <div class="block-options">
                      <div class="block-options-item">
                        <a href="{{route('subindisteam.create')}}" class="btn btn-primary">Tambah Sub Indikator</a>
                      </div>
                    </div>
                  </div>
                  <div class="block-content">
                    <table class="table table-vcenter" id="tablesubIndikator">
                      <thead>
                        <tr>
                          <th class="text-center" style="width: 20px;">#</th>
                          <th>Indikator</th>
                          <th>Nama</th>
                          <th style="width: 100px;">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- END Default Table -->
              </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
    @include('sweetalert::alert')
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endpush

@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var datatable = $('#tablesubIndikator').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'number', name: 'number' },
                { data: 'indikatorsteam_id', name: 'indikatorsteam_id' },
                { data: 'nama', name: 'nama' },
                {
                    data: 'aksi',
                    name: 'aksi',
                    orderable: false,
                    searcable: false,
                    width: '25%'
                },
            ]
        })
    </script>
    <script>
      $(document).on('click','.hapus', function () {
          var $subindinama = $(this).attr('subindisteam-nama');
          var $subindiid = $(this).attr('subindisteam-id');
          swal({
            title: "Apakah Kamu Yakin",
            text: "Data Sub Indikator "+$subindinama+" Akan Terhapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
              console.log(willDelete);
            if (willDelete) {
              window.location = "subindisteam/"+$subindiid+"/delete";
            } else {
              swal("Data "+$subindinama+" Tidak Terhapus");
            }
          });
      })
    </script>
    <script>
        $(document).ready(function () {
            $('#tablesubIndikator').DataTable();
        });
    </script>
@endpush