@extends('layouts.admin')

@section('title')
    List Nilai
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
                    Masukan Nilai
                </h1>
            </div>
            <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item">
                    <a class="link-fx" href="javascript:void(0)">{{$item->nama}}</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    Nilai
                </li>
                </ol>
            </nav>
            </div>
        </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">

            <!-- Labels on top -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                <h3 class="block-title">Masukan Nilai {{$item->nama}}</h3>
                </div>
                <div class="block-content block-content-full">
                <div class="row">
                    </div>
                    <div class="col-lg-12 space-y-5">
                        <!-- Form Labels on top - Default Style -->
                        <form action="/masukanNilaiStoreIot/{{$item->id}}/{{$sub->id}}" method="POST">
                            @csrf 
                            <div class="mb-4">
                                <label class="form-label" for="example-ltf-email">Kompetensi</label>
                                <input type="email" class="form-control" id="example-ltf-email" name="kompeten" placeholder="Your Email.." value="{{$sub->nama}}" disabled>
                                </div>
                                <div class="mb-4">
                                <label class="form-label" for="bisa">Nilai</label>
                                <input type="text" class="form-control" id="bisa" name="skor">
                                </div>
                            </div>
                            <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/siswaNilaiIot/{{$item->id}}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                        <!-- END Form Labels on top - Default Style -->
                    </div>
                </div>
                </div>
            </div>
            <!-- END Labels on top -->

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
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tableSiswa').DataTable();
        });
    </script>
@endpush