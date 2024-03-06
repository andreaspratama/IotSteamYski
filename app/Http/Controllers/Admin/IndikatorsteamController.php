<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Indikatorsteam;
use App\Http\Requests\IndikatorRequest;
use Yajra\DataTables\Facades\DataTables;

class IndikatorsteamController extends Controller
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
            $query = Indikatorsteam::query();

            return Datatables::of($query)
                ->addColumn('aksi', function($item) {
                    return '
                        <a href="' . route('indikatorsteam.edit', $item->id) . '" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <button class="btn btn-danger btn-sm hapus" indikatorsteam-id="' . $item->id . '" indikatorsteam-nama="' . $item->nama . '">
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

        return view('pages.admin.indikatorsteam.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.indikatorsteam.create');
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
        Indikatorsteam::create($data);

        return redirect()->route('indikatorsteam.index')->with('success', 'Data Berhasil Dimasukan');
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
        $item = Indikatorsteam::findOrFail($id);

        return view('pages.admin.indikatorsteam.edit', compact('item'));
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
        $item = Indikatorsteam::findOrFail($id);
        $item->update($data);

        return redirect()->route('indikatorsteam.index')->with('success', 'Data Berhasil Diubah');
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
        $item = Indikatorsteam::findOrFail($id);
        $item->delete();

        return redirect()->route('indikatorsteam.index')->with('success', 'Data Berhasil Dihapus');
    }
}
