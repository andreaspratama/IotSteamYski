<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kompindi;
use App\Models\Indikator;
use App\Models\Subindi;
use Yajra\DataTables\Facades\DataTables;
use Dompdf\Options;
use PDF;

class NilaiController extends Controller
{
    public function nilai()
    {
        $siswa = Siswa::all();
        // if(request()->ajax())
        // {
        //     $query = Siswa::query();

        //     return Datatables::of($query)
        //         ->addColumn('aksi', function($item) {
        //             return '
        //                 <a href="' . route('siswaNilai', $item->id) . '" class="btn btn-success btn-sm">
        //                     Nilai
        //                 </a>
        //             ';
        //         })
        //         ->addColumn('number', function($item) {
        //             static $count = 0;
        //             return ++$count;
        //         })
        //         ->rawColumns(['aksi', 'number'])
        //         ->make();
        // }

        return view('pages.user.nilai.list', compact('siswa'));
    }

    public function siswaNilai($id)
    {
        $item = Siswa::findOrFail($id);
        $subindi = Subindi::all();
        $komp = Kompindi::all();

        return view('pages.user.nilai.siswaNilai', compact('item', 'subindi', 'komp'));
    }

    public function masukanNilai($id, $idsub)
    {
        $item = Siswa::findOrFail($id);
        $sub = Subindi::findOrFail($idsub);
        $komp = Kompindi::findOrFail(($idsub));

        return view('pages.user.nilai.masukanNilai', compact('item', 'sub', 'komp'));
    }

    public function masukanNilaiStore(Request $request, $id, $idsub)
    {
        $item = Siswa::findOrFail($id);
        $sub = Subindi::findOrFail($idsub);
        $item->subindi()->attach($sub, ['skor' => $request->skor]);

        return redirect('/user/siswaNilai/'.$id.'')->with('success', 'Nilai Berhasil Dimasukan');;
    }

    public function editNilai($id, $idsub)
    {
        $item = Siswa::findOrFail($id);
        $nilai = $item->subindi()->findOrFail($idsub);
        $sub = Subindi::findOrFail($idsub);

        return view('pages.user.nilai.editNilai', compact('item', 'nilai', 'sub'));
    }

    public function masukanNilaiUpdate(Request $request, $id, $idsub)
    {
        $item = Siswa::findOrFail($id);
        $sub = Subindi::findOrFail($idsub);
        $item->subindi()->updateExistingPivot($sub, ['skor' => $request->skor]);

        return redirect('/user/siswaNilai/'.$id.'')->with('success', 'Nilai Berhasil Diubah');
    }

    public function downloadNilai(Request $request, $id)
    {
        $item = Siswa::findOrFail($id);
        $komp = Kompindi::all();
        $subindi = Subindi::all();

        $pdf = PDF::loadview('export.cetakPdf', compact('item', 'komp', 'subindi'));
	    return $pdf->stream();
    }
}
