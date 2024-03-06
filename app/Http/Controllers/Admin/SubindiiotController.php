<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Indikatoriot;
use App\Models\Subindiiot;
use App\Http\Requests\SubindiiotRequest;
use Yajra\DataTables\Facades\DataTables;

class SubindiiotController extends Controller
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
            $query = Subindiiot::query();

            return Datatables::of($query)
                ->addColumn('aksi', function($item) {
                    return '
                        <a href="' . route('subindiiot.edit', $item->id) . '" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <button class="btn btn-danger btn-sm hapus" subindiiot-id="' . $item->id . '" subindiiot-nama="' . $item->nama . '">
                            Delete
                        </button>
                    ';
                })
                ->addColumn('number', function($item) {
                    static $count = 0;
                    return ++$count;
                })
                ->editColumn('indikatoriot_id', function($item) {
                    return $item->indikatoriot->nama;
                })
                ->rawColumns(['aksi', 'number', 'indikatoriot_id'])
                ->make();
        }

        return view('pages.admin.subindiiot.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $indi = Indikatoriot::all();

        return view('pages.admin.subindiiot.create', compact('indi'));
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
        Subindiiot::create($data);

        return redirect()->route('subindiiot.index')->with('success', 'Data Berhasil Dimasukan');
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
        $si = Subindiiot::findOrFail($id);
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
        $item = Subindiiot::findOrFail($id);
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
        $item = Subindiiot::findOrFail($id);
        $item->delete();

        return redirect()->route('subindiiot.index')->with('success', 'Data Berhasil Dihapus');
    }
}
