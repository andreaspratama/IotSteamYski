@extends('layouts.admin')

@section('title')
    Edit Nilai
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
                    Edit Nilai
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
                <h3 class="block-title">Edit Nilai {{$item->nama}}</h3>
                </div>
                <div class="block-content block-content-full">
                <div class="row">
                    </div>
                    <div class="col-lg-12 space-y-5">
                        <!-- Form Labels on top - Default Style -->
                        <form action="/user/masukanNilaiUpdateIot/{{$item->id}}/{{$sub->id}}" method="POST">
                            @csrf
                                {{-- @if ($komp->subindi_id === 8)
                                    <div class="mb-4">
                                    <label class="form-label" for="example-ltf-email">Kompetensi</label>
                                    <input type="email" class="form-control" id="example-ltf-email" name="kompeten" placeholder="Your Email.." value="{{$komp->nama}}" disabled>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bb">Belum Berkembang</label>
                                        <input type="text" class="form-control" id="bb" name="bb" value="{{$nilai->pivot->bb}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="mb">Mulai Berkembang</label>
                                        <input type="text" class="form-control" id="mb" name="mb" value="{{$nilai->pivot->mb}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="b">Berkembang</label>
                                        <input type="text" class="form-control" id="b" name="b" value="{{$nilai->pivot->b}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bsh">Berkembang Sesuai Harapan</label>
                                        <input type="text" class="form-control" id="bsh" name="bsh" value="{{$nilai->pivot->bsh}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bsb">Berkembang Sangat Baik</label>
                                        <input type="text" class="form-control" id="bsb" name="bsb" value="{{$nilai->pivot->bsb}}">
                                    </div>
                                @elseif($komp->subindi_id === 9)
                                    <div class="mb-4">
                                    <label class="form-label" for="example-ltf-email">Kompetensi</label>
                                    <input type="email" class="form-control" id="example-ltf-email" name="kompeten" placeholder="Your Email.." value="{{$komp->nama}}" disabled>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bb">Belum Berkembang</label>
                                        <input type="text" class="form-control" id="bb" name="bb" value="{{$nilai->pivot->bb}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="mb">Mulai Berkembang</label>
                                        <input type="text" class="form-control" id="mb" name="mb" value="{{$nilai->pivot->mb}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="b">Berkembang</label>
                                        <input type="text" class="form-control" id="b" name="b" value="{{$nilai->pivot->b}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bsh">Berkembang Sesuai Harapan</label>
                                        <input type="text" class="form-control" id="bsh" name="bsh" value="{{$nilai->pivot->bsh}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bsb">Berkembang Sangat Baik</label>
                                        <input type="text" class="form-control" id="bsb" name="bsb" value="{{$nilai->pivot->bsb}}">
                                    </div>
                                @elseif($komp->subindi_id === 10)
                                    <div class="mb-4">
                                    <label class="form-label" for="example-ltf-email">Kompetensi</label>
                                    <input type="email" class="form-control" id="example-ltf-email" name="kompeten" placeholder="Your Email.." value="{{$komp->nama}}" disabled>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bb">Belum Berkembang</label>
                                        <input type="text" class="form-control" id="bb" name="bb" value="{{$nilai->pivot->bb}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="mb">Mulai Berkembang</label>
                                        <input type="text" class="form-control" id="mb" name="mb" value="{{$nilai->pivot->mb}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="b">Berkembang</label>
                                        <input type="text" class="form-control" id="b" name="b" value="{{$nilai->pivot->b}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bsh">Berkembang Sesuai Harapan</label>
                                        <input type="text" class="form-control" id="bsh" name="bsh" value="{{$nilai->pivot->bsh}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bsb">Berkembang Sangat Baik</label>
                                        <input type="text" class="form-control" id="bsb" name="bsb" value="{{$nilai->pivot->bsb}}">
                                    </div>
                                @elseif($komp->subindi_id === 11)
                                    <div class="mb-4">
                                    <label class="form-label" for="example-ltf-email">Kompetensi</label>
                                    <input type="email" class="form-control" id="example-ltf-email" name="kompeten" placeholder="Your Email.." value="{{$komp->nama}}" disabled>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bb">Belum Berkembang</label>
                                        <input type="text" class="form-control" id="bb" name="bb" value="{{$nilai->pivot->bb}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="mb">Mulai Berkembang</label>
                                        <input type="text" class="form-control" id="mb" name="mb" value="{{$nilai->pivot->mb}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="b">Berkembang</label>
                                        <input type="text" class="form-control" id="b" name="b" value="{{$nilai->pivot->b}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bsh">Berkembang Sesuai Harapan</label>
                                        <input type="text" class="form-control" id="bsh" name="bsh" value="{{$nilai->pivot->bsh}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bsb">Berkembang Sangat Baik</label>
                                        <input type="text" class="form-control" id="bsb" name="bsb" value="{{$nilai->pivot->bsb}}">
                                    </div>
                                @elseif($komp->subindi_id === 12)
                                    <div class="mb-4">
                                    <label class="form-label" for="example-ltf-email">Kompetensi</label>
                                    <input type="email" class="form-control" id="example-ltf-email" name="kompeten" placeholder="Your Email.." value="{{$komp->nama}}" disabled>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bb">Belum Berkembang</label>
                                        <input type="text" class="form-control" id="bb" name="bb" value="{{$nilai->pivot->bb}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="mb">Mulai Berkembang</label>
                                        <input type="text" class="form-control" id="mb" name="mb" value="{{$nilai->pivot->mb}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="b">Berkembang</label>
                                        <input type="text" class="form-control" id="b" name="b" value="{{$nilai->pivot->b}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bsh">Berkembang Sesuai Harapan</label>
                                        <input type="text" class="form-control" id="bsh" name="bsh" value="{{$nilai->pivot->bsh}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bsb">Berkembang Sangat Baik</label>
                                        <input type="text" class="form-control" id="bsb" name="bsb" value="{{$nilai->pivot->bsb}}">
                                    </div>
                                @elseif($komp->subindi_id === 13)
                                    <div class="mb-4">
                                    <label class="form-label" for="example-ltf-email">Kompetensi</label>
                                    <input type="email" class="form-control" id="example-ltf-email" name="kompeten" placeholder="Your Email.." value="{{$komp->nama}}" disabled>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bb">Belum Berkembang</label>
                                        <input type="text" class="form-control" id="bb" name="bb" value="{{$nilai->pivot->bb}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="mb">Mulai Berkembang</label>
                                        <input type="text" class="form-control" id="mb" name="mb" value="{{$nilai->pivot->mb}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="b">Berkembang</label>
                                        <input type="text" class="form-control" id="b" name="b" value="{{$nilai->pivot->b}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bsh">Berkembang Sesuai Harapan</label>
                                        <input type="text" class="form-control" id="bsh" name="bsh" value="{{$nilai->pivot->bsh}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bsb">Berkembang Sangat Baik</label>
                                        <input type="text" class="form-control" id="bsb" name="bsb" value="{{$nilai->pivot->bsb}}">
                                    </div>
                                @elseif($komp->subindi_id === 14)
                                    <div class="mb-4">
                                    <label class="form-label" for="example-ltf-email">Kompetensi</label>
                                    <input type="email" class="form-control" id="example-ltf-email" name="kompeten" placeholder="Your Email.." value="{{$komp->nama}}" disabled>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bb">Belum Berkembang</label>
                                        <input type="text" class="form-control" id="bb" name="bb" value="{{$nilai->pivot->bb}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="mb">Mulai Berkembang</label>
                                        <input type="text" class="form-control" id="mb" name="mb" value="{{$nilai->pivot->mb}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="b">Berkembang</label>
                                        <input type="text" class="form-control" id="b" name="b" value="{{$nilai->pivot->b}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bsh">Berkembang Sesuai Harapan</label>
                                        <input type="text" class="form-control" id="bsh" name="bsh" value="{{$nilai->pivot->bsh}}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="bsb">Berkembang Sangat Baik</label>
                                        <input type="text" class="form-control" id="bsb" name="bsb" value="{{$nilai->pivot->bsb}}">
                                    </div>
                                @else --}}
                                    <div class="mb-4">
                                    <label class="form-label" for="example-ltf-email">Kompetensi</label>
                                    <input type="email" class="form-control" id="example-ltf-email" name="kompeten" placeholder="Your Email.." value="{{$sub->nama}}" disabled>
                                    </div>
                                    <div class="mb-4">
                                    <label class="form-label" for="bisa">Skor</label>
                                    <input type="text" class="form-control" id="bisa" name="skor" value="{{$nilai->pivot->skor}}">
                                    </div>
                                {{-- @endif --}}
                            <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/user/siswaNilaiIot/{{$item->id}}" class="btn btn-secondary">Batal</a>
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