<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kompindiiot;
use App\Models\Indikatoriot;
use App\Models\Subindiiot;
use App\Models\Kompindisteam;
use App\Models\Indikatorsteam;
use App\Models\Subindisteam;
use Yajra\DataTables\Facades\DataTables;
use Dompdf\Options;
use PDF;

class NilaiController extends Controller
{
    // NILAI IOT
    public function nilaiIot()
    {
        $siswa = Siswa::all();

        return view('pages.user.nilai.list', compact('siswa'));
    }

    public function siswaNilaiIot($id)
    {
        $item = Siswa::findOrFail($id);
        $subindi = Subindiiot::all();
        $komp = Kompindiiot::all();

        return view('pages.user.nilai.siswaNilai', compact('item', 'subindi', 'komp'));
    }

    public function masukanNilaiIot($id, $idsub)
    {
        $item = Siswa::findOrFail($id);
        $sub = Subindiiot::findOrFail($idsub);
        // dd($item);

        return view('pages.user.nilai.masukanNilai', compact('item', 'sub'));
    }

    public function masukanNilaiStoreIot(Request $request, $id, $idsub)
    {
        $item = Siswa::findOrFail($id);
        $sub = Subindiiot::findOrFail($idsub);
        $item->subindiiot()->attach($sub, ['skor' => $request->skor]);

        return redirect('/siswaNilaiIot/'.$id.'')->with('success', 'Nilai Berhasil Dimasukan');;
    }

    public function editNilaiIot($id, $idsub)
    {
        $item = Siswa::findOrFail($id);
        $nilai = $item->subindiiot()->findOrFail($idsub);
        $sub = Subindiiot::findOrFail($idsub);

        return view('pages.user.nilai.editNilai', compact('item', 'nilai', 'sub'));
    }

    public function masukanNilaiUpdateIot(Request $request, $id, $idsub)
    {
        $item = Siswa::findOrFail($id);
        $sub = Subindiiot::findOrFail($idsub);
        $item->subindiiot()->updateExistingPivot($sub, ['skor' => $request->skor]);

        return redirect('/siswaNilaiIot/'.$id.'')->with('success', 'Nilai Berhasil Diubah');
    }

    // NILAI STEAM
    public function nilaiSteam()
    {
        $siswa = Siswa::all();

        return view('pages.user.nilai.steam.list', compact('siswa'));
    }

    public function siswaNilaiSteam($id)
    {
        $item = Siswa::findOrFail($id);
        $subindi = Subindisteam::all();
        $komp = Kompindisteam::all();

        return view('pages.user.nilai.steam.siswaNilai', compact('item', 'subindi', 'komp'));
    }

    public function masukanNilaiSteam($id, $idkomp)
    {
        $item = Siswa::findOrFail($id);
        $sub = Subindisteam::findOrFail($idkomp);

        return view('pages.user.nilai.steam.masukanNilai', compact('item', 'sub'));
    }

    public function masukanNilaiStoreSteam(Request $request, $id, $idsub)
    {
        $item = Siswa::findOrFail($id);
        $sub = Subindisteam::findOrFail($idsub);
        $item->subindisteam()->attach($sub, ['skor' => $request->skor]);

        return redirect('/siswaNilaiSteam/'.$id.'')->with('success', 'Nilai Berhasil Dimasukan');;
    }

    public function editNilaiSteam($id, $idsub)
    {
        $item = Siswa::findOrFail($id);
        $nilai = $item->subindisteam()->findOrFail($idsub);
        $sub = Subindisteam::findOrFail($idsub);

        return view('pages.user.nilai.steam.editNilai', compact('item', 'nilai', 'sub'));
    }

    public function masukanNilaiUpdateSteam(Request $request, $id, $idsub)
    {
        $item = Siswa::findOrFail($id);
        $sub = Subindisteam::findOrFail($idsub);
        $item->subindisteam()->updateExistingPivot($sub, ['skor' => $request->skor]);

        return redirect('/siswaNilaiSteam/'.$id.'')->with('success', 'Nilai Berhasil Diubah');
    }

    public function downloadNilai(Request $request, $id)
    {
        $item = Siswa::findOrFail($id);
        $kompiot = Kompindiiot::all();
        $subindiiot = Subindiiot::all();
        $kompsteam = Kompindisteam::all();
        $subindisteam = Subindisteam::all();

        $pdf = PDF::loadview('export.cetakPdf', compact('item', 'kompiot', 'subindiiot', 'kompsteam', 'subindisteam'))->setOption(['defaultFont' => 'sans-serif']);
	    return $pdf->stream();
    }
}
