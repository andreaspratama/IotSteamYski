<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Indikator;
use App\Models\Subindi;
use App\Http\Requests\SubindiRequest;
use Yajra\DataTables\Facades\DataTables;

class SubindiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Subindi::query();

            return Datatables::of($query)
                ->addColumn('aksi', function($item) {
                    return '
                        <a href="' . route('subindi.edit', $item->id) . '" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <button class="btn btn-danger btn-sm hapus" subindi-id="' . $item->id . '" subindi-nama="' . $item->nama . '">
                            Delete
                        </button>
                    ';
                })
                ->addColumn('number', function($item) {
                    static $count = 0;
                    return ++$count;
                })
                ->editColumn('indikator_id', function($item) {
                    return $item->indikator->nama;
                })
                ->rawColumns(['aksi', 'number', 'indikator_id'])
                ->make();
        }

        return view('pages.admin.subindi.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $indi = Indikator::all();

        return view('pages.admin.subindi.create', compact('indi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubindiRequest $request)
    {
        $data = $request->all();
        Subindi::create($data);

        return redirect()->route('subindi.index')->with('success', 'Data Berhasil Dimasukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $si = Subindi::findOrFail($id);
        $indi = Indikator::all();

        return view('pages.admin.subindi.edit', compact('si', 'indi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Subindi::findOrFail($id);
        $item->update($data);

        return redirect()->route('subindi.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function del($id)
    {
        $item = Subindi::findOrFail($id);
        $item->delete();

        return redirect()->route('subindi.index')->with('success', 'Data Berhasil Dihapus');
    }
}
