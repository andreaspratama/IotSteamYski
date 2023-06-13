<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nilai {{$item->nama}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'new_font';
            src: url('app/public.assets/font/Poppins-Medium.ttf');
        }

        .header {
            font: new_font;
        }

        .line-title {
            border: 0;
            border-style: unset;
            border-top: 2px solid #000;
        }
    </style>
</head>
<body>
    <?php
        $logos = storage_path("app/public/assets/logo/logo.png")
    ?>
    <img src="{{$logos}}" alt="" style="position: absolute; width: 60px; height: auto; line-height: 1.6">
    <table style="width: 100%" class="header">
        <tr>
            <td align="center">
                <span style="font-weight: bold">
                    Yayasan Sekolah Kristen Indonesia
                    <br>
                    SD Kristen 2 YSKI
                    <br>
                    Jl Dokter Cipto No.109
                </span>
            </td>
        </tr>
    </table>

    <hr class="line-title" style="margin-top: 15px">

    <table style="margin-top: 0px; width: 60%; position:absolute;">
      <tr>
          <td style="font-weight: bold; width:128px; font-size:14px">Nama Siswa</td>
          <td style="font-weight: bold; width:10px; font-size:14px">:</td>
          <td style="font-weight: bold; font-size:14px">{{$item->nama}}</td>
      </tr>
      <tr>
          <td style="font-weight: bold; font-size:14px">Nomor Induk</td>
          <td style="font-weight: bold; font-size:14px">:</td>
          <td style="font-weight: bold; font-size:14px">{{$item->nisn}}</td>
      </tr>
      <tr>
          <td style="font-weight: bold; font-size:14px">Kelas</td>
          <td style="font-weight: bold; font-size:14px">:</td>
          <td style="font-weight: bold; font-size:14px">{{$item->kelas}}</td>
          {{-- @if ($item->unit == 'K1')
              <td style="font-weight: bold; font-size:14px">SD Kristen 1 YSKI</td>
          @elseif($item->unit == 'K2')
              <td style="font-weight: bold; font-size:14px">SD Kristen 2 YSKI</td>
          @elseif($item->unit == 'K3')
              <td style="font-weight: bold; font-size:14px">SD Kristen 3 YSKI</td>
          @endif --}}
      </tr>
    </table>

    <h3 style="margin-top: 100px">PENGETAHUAN</h3>
    <table class="table table-bordered table-striped table-vcenter js-dataTable-fulid="tableKetrampilan">
      <thead>
                <tr style="background-color: #3366cc; color: #fff">
                  <th colspan="7" class="text-center">PENGETAHUAN</th>
                </tr>
                {{-- Komunikasi --}}
                <tr>
                  <th colspan="2" style="width: 10%" class="text-center"></th>
                  <th class="text-center" colspan="1" style="width: 5%;">Skor</th>
                  <th class="text-center" colspan="4" style="width: 30%;">Deskripsi</th>
                </tr>
      </thead>
      <tbody>
        @foreach ($subindi as $si)
          @if ($si->indikator_id === 1)
              <tr>
                  <td class="text-center fs-sm" style="width: 1px">{{$loop->iteration}}</td>
                  <td class="fw-semibold fs-sm" style="width: 15px">
                      {{$si->nama}}
                  </td>
                  <td class="d-none d-sm-table-cell text-center" style="width: 15px;" colspan="1">
                    @foreach ($item->subindi as $ki)
                      @if ($si->id === $ki->pivot->subindi_id)
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
                  <td class="d-none d-sm-table-cell text-center" style="width: 30%;" colspan="4">
                    @if ($si->id === 1)
                      @foreach ($item->subindi as $ki)
                        @if ($si->id === $ki->pivot->subindi_id)
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
                      @foreach ($item->subindi as $ki)
                        @if ($si->id === $ki->pivot->subindi_id)
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
                      @foreach ($item->subindi as $ki)
                        @if ($si->id === $ki->pivot->subindi_id)
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
              </tr>
          @endif
        @endforeach
      </tbody>
    </table>
    <h3 style="margin-top: 40px">KETRAMPILAN</h3>
    <table class="table table-bordered table-striped table-vcenter js-dataTable-fulid="tableKetrampilan">
      <thead>
                <tr style="background-color: #3366cc; color: #fff">
                  <th colspan="7" class="text-center">KETRAMPILAN</th>
                </tr>
                {{-- Komunikasi --}}
                <tr>
                  <th colspan="2" style="width: 5%" class="text-center"></th>
                  <th class="text-center" colspan="1" style="width: 5%;">Skor</th>
                  <th class="text-center" colspan="4" style="width: 30%;">Deskripsi</th>
                </tr>
      </thead>
      <tbody>
        @foreach ($subindi as $si)
          @if ($si->indikator_id === 2)
              <tr>
                  <td class="text-center fs-sm" style="width: 1px">{{$loop->iteration}}</td>
                  <td class="fw-semibold fs-sm" style="width: 15px">
                      {{$si->nama}}
                  </td>
                  <td class="d-none d-sm-table-cell text-center" style="width: 15px;" colspan="1">
                    @foreach ($item->subindi as $ki)
                      @if ($si->id === $ki->pivot->subindi_id)
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
                  <td class="d-none d-sm-table-cell text-center" style="width: 30%;" colspan="4">
                    @if ($si->id === 4)
                      @foreach ($item->subindi as $ki)
                        @if ($si->id === $ki->pivot->subindi_id)
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
                      @foreach ($item->subindi as $ki)
                        @if ($si->id === $ki->pivot->subindi_id)
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
                      @foreach ($item->subindi as $ki)
                        @if ($si->id === $ki->pivot->subindi_id)
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
                      @foreach ($item->subindi as $ki)
                        @if ($si->id === $ki->pivot->subindi_id)
                          @if ($ki->pivot->skor >= 90)
                          Siswa dapat menyampaiakn ide dan mengembangkan gagasan serta menciptakan kreasi baru
                          @elseif ($ki->pivot->skor >= 80)
                          Siswa dapat menyampaiakn ide dan mengembangkan gagasannya
                          @else
                          Siswa dapat menyempaikan ide dan pendapatnya
                          @endif
                        @endif
                      @endforeach
                    @endif
                  </td>
              </tr>
          @endif
        @endforeach
      </tbody>
    </table>
    <h3 style="margin-top: 40px">KARAKTER</h3>
    <table class="table table-bordered table-striped table-vcenter js-dataTable-fulid="tableKetrampilan">
      <thead>
                <tr style="background-color: #3366cc; color: #fff">
                  <th colspan="7" class="text-center">KARAKTER</th>
                </tr>
                {{-- Komunikasi --}}
                <tr>
                  <th colspan="2" style="width: 10%" class="text-center"></th>
                  <th class="text-center" colspan="1" style="width: 5%;">Skor</th>
                  <th class="text-center" colspan="3" style="width: 30%;">Deskripsi</th>
                </tr>
      </thead>
      <tbody>
        @foreach ($komp as $koin)
          @if ($koin->subindi_id === 8)
              <tr>
                  <td class="text-center fs-sm" style="width: 1px">S</td>
                  <td class="fw-semibold fs-sm"style="width: 10px">
                      {{$koin->nama}}
                  </td>
                  <td class="d-none d-sm-table-cell text-center" style="width: 15px;">
                      @foreach ($item->subindi as $ki)
                        @if ($koin->subindi_id === $ki->pivot->subindi_id)
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
                  <td class="d-none d-sm-table-cell text-center" style="width: 15%;" colspan="4">
                    @if ($koin->subindi_id === 8)
                      @foreach ($item->subindi as $ki)
                        @if ($koin->subindi_id === $ki->pivot->subindi_id)
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
              </tr>
          @endif
        @endforeach
      </tbody>
      <tbody>
        @foreach ($komp as $koin)
          @if ($koin->subindi_id === 9)
              <tr>
                  <td class="text-center fs-sm">P</td>
                  <td class="fw-semibold fs-sm">
                      {{$koin->nama}}
                  </td>
                  <td class="d-none d-sm-table-cell text-center" style="width: 15%;">
                      @foreach ($item->subindi as $ki)
                        @if ($koin->subindi_id === $ki->pivot->subindi_id)
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
                  <td class="d-none d-sm-table-cell text-center" style="width: 15%;" colspan="4">
                    @if ($koin->subindi_id === 9)
                      @foreach ($item->subindi as $ki)
                        @if ($koin->subindi_id === $ki->pivot->subindi_id)
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
              </tr>
          @endif
        @endforeach
      </tbody>
      <tbody>
        @foreach ($komp as $koin)
          @if ($koin->subindi_id === 10)
              <tr>
                  <td class="text-center fs-sm">E</td>
                  <td class="fw-semibold fs-sm">
                      {{$koin->nama}}
                  </td>
                  <td class="d-none d-sm-table-cell text-center" style="width: 15%;">
                      @foreach ($item->subindi as $ki)
                        @if ($koin->subindi_id === $ki->pivot->subindi_id)
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
                  <td class="d-none d-sm-table-cell text-center" style="width: 15%;" colspan="4">
                    @if ($koin->subindi_id === 10)
                      @foreach ($item->subindi as $ki)
                        @if ($koin->subindi_id === $ki->pivot->subindi_id)
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
              </tr>
          @endif
        @endforeach
      </tbody>
      <tbody>
        @foreach ($komp as $koin)
          @if ($koin->subindi_id === 11)
              <tr>
                  <td class="text-center fs-sm">C</td>
                  <td class="fw-semibold fs-sm">
                      {{$koin->nama}}
                  </td>
                  <td class="d-none d-sm-table-cell text-center" style="width: 15%;">
                      @foreach ($item->subindi as $ki)
                        @if ($koin->subindi_id === $ki->pivot->subindi_id)
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
                  <td class="d-none d-sm-table-cell text-center" style="width: 15%;" colspan="4">
                    @if ($koin->subindi_id === 11)
                      @foreach ($item->subindi as $ki)
                        @if ($koin->subindi_id === $ki->pivot->subindi_id)
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
              </tr>
          @endif
        @endforeach
      </tbody>
      <tbody>
        @foreach ($komp as $koin)
          @if ($koin->subindi_id === 12)
              <tr>
                  <td class="text-center fs-sm">I</td>
                  <td class="fw-semibold fs-sm">
                      {{$koin->nama}}
                  </td>
                  <td class="d-none d-sm-table-cell text-center" style="width: 15%;">
                      @foreach ($item->subindi as $ki)
                        @if ($koin->subindi_id === $ki->pivot->subindi_id)
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
                  <td class="d-none d-sm-table-cell text-center" style="width: 15%;" colspan="4">
                    @if ($koin->subindi_id === 12)
                      @foreach ($item->subindi as $ki)
                        @if ($koin->subindi_id === $ki->pivot->subindi_id)
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
              </tr>
          @endif
        @endforeach
      </tbody>
      <tbody>
        @foreach ($komp as $koin)
          @if ($koin->subindi_id === 13)
              <tr>
                  <td class="text-center fs-sm">A</td>
                  <td class="fw-semibold fs-sm">
                      {{$koin->nama}}
                  </td>
                  <td class="d-none d-sm-table-cell text-center" style="width: 15%;">
                      @foreach ($item->subindi as $ki)
                        @if ($koin->subindi_id === $ki->pivot->subindi_id)
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
                  <td class="d-none d-sm-table-cell text-center" style="width: 15%;" colspan="4">
                    @if ($koin->subindi_id === 13)
                      @foreach ($item->subindi as $ki)
                        @if ($koin->subindi_id === $ki->pivot->subindi_id)
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
              </tr>
          @endif
        @endforeach
      </tbody>
      <tbody>
        @foreach ($komp as $koin)
          @if ($koin->subindi_id === 14)
              <tr>
                  <td class="text-center fs-sm">L</td>
                  <td class="fw-semibold fs-sm">
                      {{$koin->nama}}
                  </td>
                  <td class="d-none d-sm-table-cell text-center" style="width: 15%;">
                      @foreach ($item->subindi as $ki)
                        @if ($koin->subindi_id === $ki->pivot->subindi_id)
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
                  <td class="d-none d-sm-table-cell text-center" style="width: 15%;" colspan="4">
                    @if ($koin->subindi_id === 14)
                      @foreach ($item->subindi as $ki)
                        @if ($koin->subindi_id === $ki->pivot->subindi_id)
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
              </tr>
          @endif
        @endforeach
      </tbody>
    </table>

    <footer>
          <?php
            $foto = storage_path("app/public/" . Auth::user()->guru->ttd)
          ?>
          <p style="text-align:right; font-size:14px">Semarang, 23 Juni 2023</p>
           <table style="width: 50%; position:absolute; font-size:14px" align="left">
              <tr>
                  <td>Mengetahui Orang Tua,</td>
              </tr>
              <tr>
                  <td>
                      <br>
                      <br>
                      <br>
                      .......................................
                  </td>
              </tr>
            </table>
            <table style="position: absolute; width: 100%; font-size:14px; margin-right: -350px">
                  <tr>
                      <td style="padding-left: 580px">Wali Kelas</td>
                  </tr>
                  <tr>
                      <td><img src="{{$foto}}" alt="" style="margin-top:10px; width: 80px; padding-left: 580px"></td>
                  </tr>
                  <tr>
                      <td align="right" style="padding-right: 0px">{{Auth::user()->name}}</td>
                  </tr>
            </table>
      <div class="ttd mt-5" style="text-align: right">
          
          {{-- <span class="guru" style="width: 50%; background-color: red; position:absolute">
              
              <p style="margin-top: 15px; margin-right: 30px">Wali Kelas</p>
              <p style="margin-right: 25px"><img src="{{$foto}}" alt=""></p>
              <p style="margin-top: -15px; margin-right: 30px">{{Auth::user()->name}}</p>
          </span>
          <span class="ortu" style="width: 30%; position:absolute; background-color:aqua; height: 30%" align="right">
              <p style="margin-top: 15px; margin-right: 30px">Wali Kelas</p>
              <p style="margin-right: 25px"><img src="{{$foto}}" alt=""></p>
              <p style="margin-top: -15px; margin-right: 30px">{{Auth::user()->name}}</p>
          </span> --}}
      </div>
    </footer>
</body>
</html>