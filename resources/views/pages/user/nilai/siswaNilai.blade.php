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
                  {{$item->nama}}
                </h1>
                <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                  Daftar Nilai {{$item->nama}}
                </h2>
                <a href="/user/nilaiIot" class="btn btn-secondary mt-2">Input Nilai Siswa Lain</a>
              </div>
              <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                  <li class="breadcrumb-item">
                    <a class="link-fx" href="javascript:void(0)">Tables</a>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">
                    DataTables
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
          <!-- Dynamic Table Full -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">
                <a href="/user/downloadNilai/{{$item->id}}" class="btn btn-primary">Download Nilai</a>
              </h3>
            </div>
            <div class="block-content block-content-full">
              <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
              <h3>PENGETAHUAN</h3>
              <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="tablePengetahuan">
                <thead>
                  <tr>
                    <th colspan="6" class="text-center">PENGETAHUAN</th>
                    <th style="width: 10%;" class="text-center" colspan="2">Aksi</th>
                  </tr>
                  {{-- Menganalisis --}}
                  <tr>
                    <th colspan="2" style="width: 10%" class="text-center"></th>
                    <th class="text-center" colspan="2" style="width: 5px;">Skor</th>
                    <th class="text-center" colspan="2" style="width: 30%;">Deskripsi</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($subindi as $si)
                    @if ($si->indikatoriot_id === 1)
                        <tr>
                            <td class="text-center fs-sm">{{$loop->iteration}}</td>
                            <td class="fw-semibold fs-sm">
                                {{$si->nama}}
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 15%;" colspan="2">
                              @foreach ($item->subindiiot as $ki)
                                @if ($si->id === $ki->pivot->subindiiot_id)
                                    @if ($ki->pivot->skor >= 90)
                                        A
                                    @elseif ($ki->pivot->skor >= 80)
                                        B
                                    @elseif ($ki->pivot->skor >= 70)
                                        C
                                    @else
                                        D
                                    @endif
                                @endif
                              @endforeach
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 30%;" colspan="2">
                              @if ($si->id === 1)
                                @foreach ($item->subindiiot as $ki)
                                  @if ($si->id === $ki->pivot->subindiiot_id)
                                    @if ($ki->pivot->skor >= 90)
                                      Siswa dapat mengambil keputusan berdasarkan data yang tersedia
                                    @elseif ($ki->pivot->skor >= 80)
                                      Siswa dapat mengingat dan mengelompokkan data yang tersedia
                                    @else
                                      Siswa dapat mengingat data yang ada
                                    @endif
                                  @endif
                                @endforeach
                              @endif
                              @if ($si->id === 2)
                                @foreach ($item->subindiiot as $ki)
                                  @if ($si->id === $ki->pivot->subindiiot_id)
                                    @if ($ki->pivot->skor >= 90)
                                      Siswa mampu berpikir kritis sesuai dengan alur permasalahan yang ada
                                    @elseif ($ki->pivot->skor >= 80)
                                      Siswa dapat menyelesaikan masalah sesuai ilustrasi yang diberikan dengan baik
                                    @else
                                      Siswa dapat menentukan masalah dari ilustrasi yang diberikan
                                    @endif
                                  @endif
                                @endforeach
                              @endif
                              @if ($si->id === 3)
                                @foreach ($item->subindiiot as $ki)
                                  @if ($si->id === $ki->pivot->subindiiot_id)
                                    @if ($ki->pivot->skor >= 90)
                                      Siswa mampu membuat pemecahan masalah dalam membuat dan mendesain produk dengan baik
                                    @elseif ($ki->pivot->skor >= 80)
                                      Siswa dapat kreatif dalam merancang hasil produk dan desainnya
                                    @else
                                      Siswa dapat membuat dan mendesain produk dengan baik
                                    @endif
                                  @endif
                                @endforeach
                              @endif
                            </td>
                            <td>
                                @if ($item->subindiiot()->where('subindiiot_id', '=' , $si->id)->exists())
                                    <a href="/user/editNilaiIot/{{$item->id}}/{{$si->id}}" class="btn btn-warning">Edit Nilai</a>
                                @else
                                    <a href="/user/masukanNilaiIot/{{$item->id}}/{{$si->id}}" class="btn btn-primary">Tambah Nilai</a>
                                @endif
                            </td>
                        </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>
              <h3>KETRAMPILAN</h3>
              <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="tablePengetahuan">
                <thead>
                  <tr>
                    <th colspan="6" class="text-center">PENGETAHUAN</th>
                    <th style="width: 10%;" class="text-center" colspan="2">Aksi</th>
                  </tr>
                  {{-- Menganalisis --}}
                  <tr>
                    <th colspan="2" style="width: 10%" class="text-center"></th>
                    <th class="text-center" colspan="2" style="width: 5%;">Skor</th>
                    <th class="text-center" colspan="2" style="width: 30%;">Deskripsi</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($subindi as $si)
                    @if ($si->indikatoriot_id === 2)
                        <tr>
                            <td class="text-center fs-sm">{{$loop->iteration}}</td>
                            <td class="fw-semibold fs-sm">
                                {{$si->nama}}
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 15%;" colspan="2">
                              @foreach ($item->subindiiot as $ki)
                                @if ($si->id === $ki->pivot->subindiiot_id)
                                  @if ($ki->pivot->skor >= 90)
                                      A
                                  @elseif ($ki->pivot->skor >= 80)
                                      B
                                  @elseif ($ki->pivot->skor >= 70)
                                      C
                                  @else
                                      D
                                  @endif
                                @endif
                              @endforeach
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 30%;" colspan="2">
                              @if ($si->id === 4)
                                @foreach ($item->subindiiot as $ki)
                                  @if ($si->id === $ki->pivot->subindiiot_id)
                                    @if ($ki->pivot->skor >= 90)
                                      Siswa dapat menyampaikan pesan dan berbagi informasi dengan orang lain dengan sangat baik melalui hasil karyanya
                                    @elseif ($ki->pivot->skor >= 80)
                                      Siswa dapat menyampaikan pesan dan berbagi informasi dengan orang lain dengan baik
                                    @else
                                      Siswa dapat menyampaikan pesan dan berbagi informasi dengan orang lain
                                    @endif
                                  @endif
                                @endforeach
                              @endif
                              @if ($si->id === 5)
                                @foreach ($item->subindiiot as $ki)
                                  @if ($si->id === $ki->pivot->subindiiot_id)
                                    @if ($ki->pivot->skor >= 90)
                                    Siswa mampu bekerjasama dalam kelompok dengan sangat baik
                                    @elseif ($ki->pivot->skor >= 80)
                                    Siswa mampu bekerjasama dalam kelompok dengan baik.
                                    @else
                                    Siswa dapat bekerjasama dalam kelompok
                                    @endif
                                  @endif
                                @endforeach
                              @endif
                              @if ($si->id === 6)
                                @foreach ($item->subindiiot as $ki)
                                  @if ($si->id === $ki->pivot->subindiiot_id)
                                    @if ($ki->pivot->skor >= 90)
                                    Siswa dapat menyelesaikan masalah yang dihadapi dan menemukan solusi untuk menyelesaikannya
                                    @elseif ($ki->pivot->skor >= 80)
                                    Siswa dapat menyelesaikan masalah yang dihadapi dan berdiskusi untuk mencari solusi
                                    @else
                                    Siswa dapat menyelesaikan masalah yang dihadapi
                                    @endif
                                  @endif
                                @endforeach
                              @endif
                              @if ($si->id === 7)
                                @foreach ($item->subindiiot as $ki)
                                  @if ($si->id === $ki->pivot->subindiiot_id)
                                    @if ($ki->pivot->skor >= 90)
                                    Siswa dapat menyampaikan ide dan mengembangkan gagasan serta menciptakan kreasi baru
                                    @elseif ($ki->pivot->skor >= 80)
                                    Siswa dapat menyampaikan ide dan mengembangkan gagasannya
                                    @else
                                    Siswa dapat menyempaikan ide dan pendapatnya
                                    @endif
                                  @endif
                                @endforeach
                              @endif
                            </td>
                            <td>
                                @if ($item->subindiiot()->where('subindiiot_id', '=' , $si->id)->exists())
                                    <a href="/user/editNilai/{{$item->id}}/{{$si->id}}" class="btn btn-warning">Edit Nilai</a>
                                @else
                                    <a href="/user/masukanNilai/{{$item->id}}/{{$si->id}}" class="btn btn-primary">Tambah Nilai</a>
                                @endif
                            </td>
                        </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>
              <h3>KARAKTER</h3>
              <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="tablePengetahuan">
                <thead>
                  <tr>
                    <th colspan="6" class="text-center">KARAKTER</th>
                    <th style="width: 10%;" class="text-center" colspan="2">Aksi</th>
                  </tr>
                  {{-- Menganalisis --}}
                  <tr>
                    <th colspan="2" style="width: 10%" class="text-center"></th>
                    <th class="text-center" colspan="" style="width: 1px;">Skor</th>
                    <th class="text-center" colspan="4" style="width: 30px;">Deskripsi</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($komp as $koin)
                    @if ($koin->subindiiot_id === 9)
                        <tr>
                            <td class="text-center fs-sm">S</td>
                            <td class="fw-semibold fs-sm">
                                {{$koin->nama}}
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 1px;" colspan="">
                                @foreach ($item->subindiiot as $ki)
                                  @if ($koin->subindiiot_id === $ki->pivot->subindiiot_id)
                                      @if ($ki->pivot->skor >= 90)
                                          A
                                      @elseif ($ki->pivot->skor >= 80)
                                          B
                                      @elseif ($ki->pivot->skor >= 70)
                                          C
                                      @else
                                          D
                                      @endif
                                  @endif
                                @endforeach
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 30px;" colspan="4">
                              @if ($koin->subindiiot_id === 8)
                                @foreach ($item->subindiiot as $ki)
                                  @if ($koin->subindiiot_id === $ki->pivot->subindiiot_id)
                                    @if ($ki->pivot->skor >= 90)
                                      Kebiasaan berdoa sebelum dan sesudah kegiatan sudah membudaya
                                    @elseif ($ki->pivot->skor >= 80)
                                      Kebiasaan berdoa sebelum dan sesudah kegiatan mulai membudaya
                                    @else
                                      Kebiasaan berdoa sebelum dan sesudah kegiatan belum membudaya
                                    @endif
                                  @endif
                                @endforeach
                              @endif
                            </td>
                            <td>
                                @if ($item->subindiiot()->where('subindiiot_id', '=' , $koin->subindiiot_id)->exists())
                                    <a href="/user/editNilai/{{$item->id}}/{{$koin->subindiiot_id}}" class="btn btn-warning">Edit Nilai</a>
                                @else
                                    <a href="/user/masukanNilai/{{$item->id}}/{{$koin->subindiiot_id}}" class="btn btn-primary">Tambah Nilai</a>
                                @endif
                            </td>
                        </tr>
                    @endif
                  @endforeach
                </tbody>
                <tbody>
                  @foreach ($komp as $koin)
                    @if ($koin->subindiiot_id === 10)
                        <tr>
                            <td class="text-center fs-sm">P</td>
                            <td class="fw-semibold fs-sm">
                                {{$koin->nama}}
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 1px;" colspan="">
                                @foreach ($item->subindiiot as $ki)
                                  @if ($koin->subindiiot_id === $ki->pivot->subindiiot_id)
                                      @if ($ki->pivot->skor >= 90)
                                          A
                                      @elseif ($ki->pivot->skor >= 80)
                                          B
                                      @elseif ($ki->pivot->skor >= 70)
                                          C
                                      @else
                                          D
                                      @endif
                                  @endif
                                @endforeach
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 30px;" colspan="4">
                              @if ($koin->subindiiot_id === 9)
                                @foreach ($item->subindiiot as $ki)
                                  @if ($koin->subindiiot_id === $ki->pivot->subindiiot_id)
                                    @if ($ki->pivot->skor >= 90)
                                      Selalu bertutur kata dengan baik sudah membudaya
                                    @elseif ($ki->pivot->skor >= 80)
                                      Selalu bertutur kata dengan baik mulai membudaya
                                    @else
                                      Selalu bertutur kata dengan baik belum membudaya
                                    @endif
                                  @endif
                                @endforeach
                              @endif
                            </td>
                            <td>
                                @if ($item->subindiiot()->where('subindiiot_id', '=' , $koin->subindiiot_id)->exists())
                                    <a href="/user/editNilai/{{$item->id}}/{{$koin->subindiiot_id}}" class="btn btn-warning">Edit Nilai</a>
                                @else
                                    <a href="/user/masukanNilai/{{$item->id}}/{{$koin->subindiiot_id}}" class="btn btn-primary">Tambah Nilai</a>
                                @endif
                            </td>
                        </tr>
                    @endif
                  @endforeach
                </tbody>
                <tbody>
                  @foreach ($komp as $koin)
                    @if ($koin->subindiiot_id === 11)
                        <tr>
                            <td class="text-center fs-sm">E</td>
                            <td class="fw-semibold fs-sm">
                                {{$koin->nama}}
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 1px;" colspan="">
                                @foreach ($item->subindiiot as $ki)
                                  @if ($koin->subindiiot_id === $ki->pivot->subindiiot_id)
                                      @if ($ki->pivot->skor >= 90)
                                          A
                                      @elseif ($ki->pivot->skor >= 80)
                                          B
                                      @elseif ($ki->pivot->skor >= 70)
                                          C
                                      @else
                                          D
                                      @endif
                                  @endif
                                @endforeach
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 30px;" colspan="4">
                              @if ($koin->subindiiot_id === 10)
                                @foreach ($item->subindiiot as $ki)
                                  @if ($koin->subindiiot_id === $ki->pivot->subindiiot_id)
                                    @if ($ki->pivot->skor >= 90)
                                      Semangat selalu mencoba jika gagal sudah membudaya
                                    @elseif ($ki->pivot->skor >= 80)
                                      Semangat selalu mencoba jika gagal mulai membudaya
                                    @else
                                      Semangat selalu mencoba jika gagal belum membudaya
                                    @endif
                                  @endif
                                @endforeach
                              @endif
                            </td>
                            <td>
                                @if ($item->subindiiot()->where('subindiiot_id', '=' , $koin->subindiiot_id)->exists())
                                    <a href="/user/editNilai/{{$item->id}}/{{$koin->subindiiot_id}}" class="btn btn-warning">Edit Nilai</a>
                                @else
                                    <a href="/user/masukanNilai/{{$item->id}}/{{$koin->subindiiot_id}}" class="btn btn-primary">Tambah Nilai</a>
                                @endif
                            </td>
                        </tr>
                    @endif
                  @endforeach
                </tbody>
                <tbody>
                  @foreach ($komp as $koin)
                    @if ($koin->subindiiot_id === 12)
                        <tr>
                            <td class="text-center fs-sm">C</td>
                            <td class="fw-semibold fs-sm">
                                {{$koin->nama}}
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 1px;" colspan="">
                                @foreach ($item->subindiiot as $ki)
                                  @if ($koin->subindiiot_id === $ki->pivot->subindiiot_id)
                                      @if ($ki->pivot->skor >= 90)
                                          A
                                      @elseif ($ki->pivot->skor >= 80)
                                          B
                                      @elseif ($ki->pivot->skor >= 70)
                                          C
                                      @else
                                          D
                                      @endif
                                  @endif
                                @endforeach
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 30px;" colspan="4">
                              @if ($koin->subindiiot_id === 11)
                                @foreach ($item->subindiiot as $ki)
                                  @if ($koin->subindiiot_id === $ki->pivot->subindiiot_id)
                                    @if ($ki->pivot->skor >= 90)
                                      Sikap peduli dengan lingkungan sekitar sudah membudaya
                                    @elseif ($ki->pivot->skor >= 80)
                                      Sikap peduli dengan lingkungan sekitar mulai membudaya
                                    @else
                                      Sikap peduli dengan lingkungan sekitar belum membudaya
                                    @endif
                                  @endif
                                @endforeach
                              @endif
                            </td>
                            <td>
                                @if ($item->subindiiot()->where('subindiiot_id', '=' , $koin->subindiiot_id)->exists())
                                    <a href="/user/editNilai/{{$item->id}}/{{$koin->subindiiot_id}}" class="btn btn-warning">Edit Nilai</a>
                                @else
                                    <a href="/user/masukanNilai/{{$item->id}}/{{$koin->subindiiot_id}}" class="btn btn-primary">Tambah Nilai</a>
                                @endif
                            </td>
                        </tr>
                    @endif
                  @endforeach
                </tbody>
                <tbody>
                  @foreach ($komp as $koin)
                    @if ($koin->subindiiot_id === 13)
                        <tr>
                            <td class="text-center fs-sm">I</td>
                            <td class="fw-semibold fs-sm">
                                {{$koin->nama}}
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 1px;" colspan="">
                                @foreach ($item->subindiiot as $ki)
                                  @if ($koin->subindiiot_id === $ki->pivot->subindiiot_id)
                                      @if ($ki->pivot->skor >= 90)
                                          A
                                      @elseif ($ki->pivot->skor >= 80)
                                          B
                                      @elseif ($ki->pivot->skor >= 70)
                                          C
                                      @else
                                          D
                                      @endif
                                  @endif
                                @endforeach
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 30px;" colspan="4">
                              @if ($koin->subindiiot_id === 12)
                                @foreach ($item->subindiiot as $ki)
                                  @if ($koin->subindiiot_id === $ki->pivot->subindiiot_id)
                                    @if ($ki->pivot->skor >= 90)
                                      Sudah memiliki rasa tanggung jawab terhadap keperluan pribadi
                                    @elseif ($ki->pivot->skor >= 80)
                                      Mulai memiliki rasa tanggung jawab terhadap keperluan pribadi
                                    @else
                                      Belum memiliki rasa tanggung jawab terhadap keperluan pribadi
                                    @endif
                                  @endif
                                @endforeach
                              @endif
                            </td>
                            <td>
                                @if ($item->subindiiot()->where('subindiiot_id', '=' , $koin->subindiiot_id)->exists())
                                    <a href="/user/editNilai/{{$item->id}}/{{$koin->subindiiot_id}}" class="btn btn-warning">Edit Nilai</a>
                                @else
                                    <a href="/user/masukanNilai/{{$item->id}}/{{$koin->subindiiot_id}}" class="btn btn-primary">Tambah Nilai</a>
                                @endif
                            </td>
                        </tr>
                    @endif
                  @endforeach
                </tbody>
                <tbody>
                  @foreach ($komp as $koin)
                    @if ($koin->subindiiot_id === 14)
                        <tr>
                            <td class="text-center fs-sm">A</td>
                            <td class="fw-semibold fs-sm">
                                {{$koin->nama}}
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 1px;" colspan="">
                                @foreach ($item->subindiiot as $ki)
                                  @if ($koin->subindiiot_id === $ki->pivot->subindiiot_id)
                                      @if ($ki->pivot->skor >= 90)
                                          A
                                      @elseif ($ki->pivot->skor >= 80)
                                          B
                                      @elseif ($ki->pivot->skor >= 70)
                                          C
                                      @else
                                          D
                                      @endif
                                  @endif
                                @endforeach
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 30px;" colspan="4">
                              @if ($koin->subindiiot_id === 13)
                                @foreach ($item->subindiiot as $ki)
                                  @if ($koin->subindiiot_id === $ki->pivot->subindiiot_id)
                                    @if ($ki->pivot->skor >= 90)
                                      Sudah bisa menghargai orang lain
                                    @elseif ($ki->pivot->skor >= 80)
                                      Mulai bisa menghargai orang lain
                                    @else
                                      Belum bisa menghargai orang lain
                                    @endif
                                  @endif
                                @endforeach
                              @endif
                            </td>
                            <td>
                                @if ($item->subindiiot()->where('subindiiot_id', '=' , $koin->subindiiot_id)->exists())
                                    <a href="/user/editNilai/{{$item->id}}/{{$koin->subindiiot_id}}" class="btn btn-warning">Edit Nilai</a>
                                @else
                                    <a href="/user/masukanNilai/{{$item->id}}/{{$koin->subindiiot_id}}" class="btn btn-primary">Tambah Nilai</a>
                                @endif
                            </td>
                        </tr>
                    @endif
                  @endforeach
                </tbody>
                <tbody>
                  @foreach ($komp as $koin)
                    @if ($koin->subindiiot_id === 15)
                        <tr>
                            <td class="text-center fs-sm">L</td>
                            <td class="fw-semibold fs-sm">
                                {{$koin->nama}}
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 1px;" colspan="">
                                @foreach ($item->subindiiot as $ki)
                                  @if ($koin->subindiiot_id === $ki->pivot->subindiiot_id)
                                      @if ($ki->pivot->skor >= 90)
                                          A
                                      @elseif ($ki->pivot->skor >= 80)
                                          B
                                      @elseif ($ki->pivot->skor >= 70)
                                          C
                                      @else
                                          D
                                      @endif
                                  @endif
                                @endforeach
                            </td>
                            <td class="d-none d-sm-table-cell text-center" style="width: 30px;" colspan="4">
                              @if ($koin->subindiiot_id === 14)
                                @foreach ($item->subindiiot as $ki)
                                  @if ($koin->subindiiot_id === $ki->pivot->subindiiot_id)
                                    @if ($ki->pivot->skor >= 90)
                                      Taat pada peraturan, menyelesaikan tugas tepat waktu sudah membudaya
                                    @elseif ($ki->pivot->skor >= 80)
                                      Taat pada peraturan, menyelesaikan tugas tepat waktu mulai membudaya
                                    @else
                                      Taat pada peraturan, menyelesaikan tugas tepat waktu belum membudaya
                                    @endif
                                  @endif
                                @endforeach
                              @endif
                            </td>
                            <td>
                                @if ($item->subindiiot()->where('subindiiot_id', '=' , $koin->subindiiot_id)->exists())
                                    <a href="/user/editNilai/{{$item->id}}/{{$koin->subindiiot_id}}" class="btn btn-warning">Edit Nilai</a>
                                @else
                                    <a href="/user/masukanNilai/{{$item->id}}/{{$koin->subindiiot_id}}" class="btn btn-primary">Tambah Nilai</a>
                                @endif
                            </td>
                        </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>
              <a href="/user/nilai" class="btn btn-secondary mt-2">Input Nilai Siswa Lain</a>
            </div>
          </div>
          <!-- Dynamic Table Responsive -->
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
    {{-- <script>
        var datatable = $('#tableSiswa').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'number', name: 'number' },
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
          var $siswanama = $(this).attr('siswa-nama');
          var $siswaid = $(this).attr('siswa-id');
          swal({
            title: "Apakah Kamu Yakin",
            text: "Data Siswa "+$siswanama+" Akan Terhapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
              console.log(willDelete);
            if (willDelete) {
              window.location = "siswa/"+$siswaid+"/delete";
            } else {
              swal("Data "+$siswanama+" Tidak Terhapus");
            }
          });
      })
    </script> --}}
    <script>
        $(document).ready(function () {
            $('#tableSiswa').DataTable();
        });
    </script>
@endpush