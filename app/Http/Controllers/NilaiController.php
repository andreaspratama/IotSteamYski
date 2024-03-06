<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kompindiiot;
use App\Models\Indikatoriot;
use App\Models\Subindiiot;
use Yajra\DataTables\Facades\DataTables;
use Dompdf\Options;
use PDF;

class NilaiController extends Controller
{
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
        $komp = Kompindiiot::findOrFail(($idsub));

        return view('pages.user.nilai.masukanNilai', compact('item', 'sub', 'komp'));
    }

    public function masukanNilaiStoreIot(Request $request, $id, $idsub)
    {
        $item = Siswa::findOrFail($id);
        $sub = Subindiiot::findOrFail($idsub);
        $item->subindiiot()->attach($sub, ['skor' => $request->skor]);

        return redirect('/user/siswaNilaiIot/'.$id.'')->with('success', 'Nilai Berhasil Dimasukan');;
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

        return redirect('/user/siswaNilaiIot/'.$id.'')->with('success', 'Nilai Berhasil Diubah');
    }

    public function downloadNilai(Request $request, $id)
    {
        $item = Siswa::findOrFail($id);
        $komp = Kompindiiot::all();
        $subindi = Subindiiot::all();

        $pdf = PDF::loadview('export.cetakPdf', compact('item', 'komp', 'subindi'));
	    return $pdf->stream();
    }
}
