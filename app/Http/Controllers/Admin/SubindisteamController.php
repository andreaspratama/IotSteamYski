<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Indikatorsteam;
use App\Models\Subindisteam;
use App\Http\Requests\SubindisteamRequest;
use Yajra\DataTables\Facades\DataTables;

class SubindisteamController extends Controller
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
            $query = Subindisteam::query();

            return Datatables::of($query)
                ->addColumn('aksi', function($item) {
                    return '
                        <a href="' . route('subindisteam.edit', $item->id) . '" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <button class="btn btn-danger btn-sm hapus" subindisteam-id="' . $item->id . '" subindisteam-nama="' . $item->nama . '">
                            Delete
                        </button>
                    ';
                })
                ->addColumn('number', function($item) {
                    static $count = 0;
                    return ++$count;
                })
                ->editColumn('indikatorsteam_id', function($item) {
                    return $item->indikatorsteam->nama;
                })
                ->rawColumns(['aksi', 'number', 'indikatorsteam_id'])
                ->make();
        }

        return view('pages.admin.subindisteam.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $indi = Indikatorsteam::all();

        return view('pages.admin.subindisteam.create', compact('indi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Subindisteam::create($data);

        return redirect()->route('subindisteam.index')->with('success', 'Data Berhasil Dimasukan');
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
        $si = Subindisteam::findOrFail($id);
        $indi = Indikatoriot::all();

        return view('pages.admin.subindiiot.edit', compact('si', 'indi'));
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
        $item = Subindisteam::findOrFail($id);
        $item->update($data);

        return redirect()->route('subindiiot.index')->with('success', 'Data Berhasil Diubah');
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
        $item = Subindisteam::findOrFail($id);
        $item->delete();

        return redirect()->route('subindiiot.index')->with('success', 'Data Berhasil Dihapus');
    }
}
