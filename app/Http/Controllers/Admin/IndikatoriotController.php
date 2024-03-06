<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Indikatoriot;
use App\Http\Requests\IndikatorRequest;
use Yajra\DataTables\Facades\DataTables;

class IndikatoriotController extends Controller
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
            $query = Indikatoriot::query();

            return Datatables::of($query)
                ->addColumn('aksi', function($item) {
                    return '
                        <a href="' . route('indikatoriot.edit', $item->id) . '" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <button class="btn btn-danger btn-sm hapus" indikatoriot-id="' . $item->id . '" indikatoriot-nama="' . $item->nama . '">
                            Delete
                        </button>
                    ';
                })
                ->addColumn('number', function($item) {
                    static $count = 0;
                    return ++$count;
                })
                ->rawColumns(['aksi', 'number'])
                ->make();
        }

        return view('pages.admin.indikatoriot.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.indikatoriot.create');
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
        Indikatoriot::create($data);

        return redirect()->route('indikatoriot.index')->with('success', 'Data Berhasil Dimasukan');
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
        $item = Indikatoriot::findOrFail($id);

        return view('pages.admin.indikatoriot.edit', compact('item'));
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
        $item = Indikatoriot::findOrFail($id);
        $item->update($data);

        return redirect()->route('indikatoriot.index')->with('success', 'Data Berhasil Diubah');
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
        $item = Indikatoriot::findOrFail($id);
        $item->delete();

        return redirect()->route('indikatoriot.index')->with('success', 'Data Berhasil Dihapus');
    }
}
