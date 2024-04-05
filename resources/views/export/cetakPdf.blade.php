<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nilai {{$item->nama}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'Poppins', sans-serif;
        }

        .header {
            font-family: 'Poppins', sans-serif;
            line-height: 1;
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
                    Jl. dr. Cipto No.109 Semarang
                </span>
            </td>
        </tr>
    </table>

    <hr class="line-title" style="margin-top: 10px">

    <table style="margin-top: -10px; width: 60%; position:absolute; font-family: 'Poppins', sans-serif; line-height: 1">
      <tr>
          <td style="font-weight: bold; width:128px; font-size:14px">Nama Siswa</td>
          <td style="font-weight: bold; width:10px; font-size:14px">:</td>
          <td style="font-weight: bold; font-size:14px">{{$item->nama}}</td>
      </tr>
      <tr>
          <td style="font-weight: bold; font-size:14px">NISN</td>
          <td style="font-weight: bold; font-size:14px">:</td>
          <td style="font-weight: bold; font-size:14px">{{$item->nisn}}</td>
      </tr>
      <tr>
          <td style="font-weight: bold; font-size:14px">Kelas</td>
          <td style="font-weight: bold; font-size:14px">:</td>
          <td style="font-weight: bold; font-size:14px">{{$item->kelas}}</td>
      </tr>
      <tr>
        <td style="font-weight: bold; font-size:14px">Tahun Pelajaran</td>
        <td style="font-weight: bold; font-size:14px">:</td>
        <td style="font-weight: bold; font-size:14px">2023 / 2024</td>
    </tr>
    </table>

    {{-- IOT --}}
    <h3 style="margin-top: 80px; font-family: 'Poppins', sans-serif;">IoT</h3>

    <table class="table table-bordered table-striped table-vcenter js-dataTable-fulid="tableKetrampilan" style="margin-top: 0px;">
      <thead>
                <tr style="background-color: #3366cc; color: #fff; font-size: 22px">
                  <th colspan="7" class="text-center" style="vertical-align: center;">PENGETAHUAN</th>
                </tr>
                {{-- Komunikasi --}}
                <tr>
                  <th colspan="" style="width: 10%" class="text-center">No</th>
                  <th colspan="" style="width: 10%" class="text-center">Indikator</th>
                  <th class="text-center" colspan="1" style="width: 5%;">Skor</th>
                  <th class="text-center" colspan="4" style="width: 30%;">Deskripsi</th>
                </tr>
      </thead>
      <tbody>
        @foreach ($subindiiot as $si)
          @if ($si->indikatoriot_id === 1)
              <tr style="font-size: 15px">
                  <td class="text-center fs-sm" style="width: 1px">{{$loop->iteration}}</td>
                  <td class="fw-semibold fs-sm" style="width: 15px">
                      {{$si->nama}}
                  </td>
                  <td class="d-none d-sm-table-cell text-center" style="width: 15px;" colspan="1">
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
                  <td class="d-none d-sm-table-cell text-center" style="width: 30%;" colspan="4">
                    @if ($si->id === 16)
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
                    @if ($si->id === 17)
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
                    @if ($si->id === 18)
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
              </tr>
          @endif
        @endforeach
      </tbody>
    </table>
    <!--<h3 style="margin-top: 40px">KETRAMPILAN</h3>-->
    <?php
        $i=0;
        $nomor = $i++;
    ?>
    <table class="table table-bordered table-striped table-vcenter js-dataTable-fulid="tableKetrampilan" style="margin-top: 5px">
      <thead>
                <tr style="background-color: #3366cc; color: #fff">
                  <th colspan="7" class="text-center" style="font-size: 25px">KETRAMPILAN</th>
                </tr>
                {{-- Komunikasi --}}
                <tr>
                  <th colspan="" style="width: 10%" class="text-center">No</th>
                  <th colspan="" style="width: 10%" class="text-center">Indikator</th>
                  <th class="text-center" colspan="1" style="width: 5%;">Skor</th>
                  <th class="text-center" colspan="4" style="width: 30%;">Deskripsi</th>
                </tr>
      </thead>
      <tbody>
        @foreach ($subindiiot as $si)
          @if ($si->indikatoriot_id === 2)
              <tr style="font-size: 15px">
                  <td class="text-center fs-sm" style="width: 1px">{{$loop->iteration}}</td>
                  <td class="fw-semibold fs-sm" style="width: 15px">
                      {{$si->nama}}
                  </td>
                  <td class="d-none d-sm-table-cell text-center" style="width: 15px;" colspan="1">
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
                  <td class="d-none d-sm-table-cell text-center" style="width: 30%;" colspan="4">
                    @if ($si->id === 19)
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
                    @if ($si->id === 20)
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
                    @if ($si->id === 21)
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
                    @if ($si->id === 22)
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
              </tr>
          @endif
        @endforeach
      </tbody>
    </table>

    {{-- STEAM --}}
    <h3 style="margin-top: 50px; font-family: 'Poppins', sans-serif;">STEAM</h3>
    <table class="table table-bordered table-striped table-vcenter js-dataTable-fulid="tableKetrampilan" style="margin-top: 0px">
      <thead>
                <tr style="background-color: #3366cc; color: #fff; font-size: 22px">
                  <th colspan="7" class="text-center">PENGETAHUAN</th>
                </tr>
                {{-- Komunikasi --}}
                <tr>
                  <th colspan="" style="width: 10%" class="text-center">No</th>
                  <th colspan="" style="width: 10%" class="text-center">Indikator</th>
                  <th class="text-center" colspan="1" style="width: 5%;">Skor</th>
                  <th class="text-center" colspan="4" style="width: 30%;">Deskripsi</th>
                </tr>
      </thead>
      <tbody>
        @foreach ($subindisteam as $si)
          @if ($si->indikatorsteam_id === 1)
              <tr style="font-size: 15px">
                  <td class="text-center fs-sm" style="width: 1px">{{$loop->iteration}}</td>
                  <td class="fw-semibold fs-sm" style="width: 15px">
                      {{$si->nama}}
                  </td>
                  <td class="d-none d-sm-table-cell text-center" style="width: 15px;" colspan="1">
                    @foreach ($item->subindisteam as $ki)
                      @if ($si->id === $ki->pivot->subindisteam_id)
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
                    @if ($si->id === 15)
                      @foreach ($item->subindisteam as $ki)
                        @if ($si->id === $ki->pivot->subindisteam_id)
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
                    @if ($si->id === 16)
                      @foreach ($item->subindisteam as $ki)
                        @if ($si->id === $ki->pivot->subindisteam_id)
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
                    @if ($si->id === 17)
                      @foreach ($item->subindisteam as $ki)
                        @if ($si->id === $ki->pivot->subindisteam_id)
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
    <!--<h3 style="margin-top: 40px">KETRAMPILAN</h3>-->
    <?php
        $i=0;
        $nomor = $i++;
    ?>
    <table class="table table-bordered table-striped table-vcenter js-dataTable-fulid="tableKetrampilan" style="margin-top: 5px">
      <thead>
                <tr style="background-color: #3366cc; color: #fff">
                  <th colspan="7" class="text-center" style="font-size: 25px">KETRAMPILAN</th>
                </tr>
                {{-- Komunikasi --}}
                <tr>
                  <th colspan="" style="width: 10%" class="text-center">No</th>
                  <th colspan="" style="width: 10%" class="text-center">Indikator</th>
                  <th class="text-center" colspan="1" style="width: 5%;">Skor</th>
                  <th class="text-center" colspan="4" style="width: 30%;">Deskripsi</th>
                </tr>
      </thead>
      <tbody>
        @foreach ($subindisteam as $si)
          @if ($si->indikatorsteam_id === 2)
              <tr style="font-size: 15px">
                  <td class="text-center fs-sm" style="width: 1px">{{$loop->iteration}}</td>
                  <td class="fw-semibold fs-sm" style="width: 15px">
                      {{$si->nama}}
                  </td>
                  <td class="d-none d-sm-table-cell text-center" style="width: 15px;" colspan="1">
                    @foreach ($item->subindisteam as $ki)
                      @if ($si->id === $ki->pivot->subindisteam_id)
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
                    @if ($si->id === 18)
                      @foreach ($item->subindisteam as $ki)
                        @if ($si->id === $ki->pivot->subindisteam_id)
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
                    @if ($si->id === 19)
                      @foreach ($item->subindisteam as $ki)
                        @if ($si->id === $ki->pivot->subindisteam_id)
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
                    @if ($si->id === 20)
                      @foreach ($item->subindisteam as $ki)
                        @if ($si->id === $ki->pivot->subindisteam_id)
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
                    @if ($si->id === 21)
                      @foreach ($item->subindisteam as $ki)
                        @if ($si->id === $ki->pivot->subindisteam_id)
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
                  <td>Mengetahui Orang Tua</td>
              </tr>
              <tr>
                  @if (Auth::user()->name === 'Benedycta Julyta Caltha Edwita, S.Pd')
                    <td>
                      <br>
                      <br>
                      <br>
                      .......................................
                    </td>
                  @else
                    <td>
                      <br>
                      <br>
                      <br>
                      <br>
                      .......................................
                    </td>
                  @endif

              </tr>
            </table>
            <table style="position: absolute; width: 100%; font-size:14px; margin-right: -350px">
                  <tr>
                      <td style="padding-left: 580px">Guru Pengampu</td>
                  </tr>
                  <tr>
                      <td><img src="{{$foto}}" alt="" style="margin-top:0px; width: 80px; padding-left: 580px"></td>
                  </tr>
                  <tr>
                      @if (Auth::user()->name === 'Liem Nathaniel')
                        <td align="right" style="padding-right: 30px">{{Auth::user()->name}}</td>
                      @else
                        <td align="right" style="padding-right: 0px">{{Auth::user()->name}}</td>  
                      @endif
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