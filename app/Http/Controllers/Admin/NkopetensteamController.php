<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subindisteam;
use App\Models\Kompindisteam;
use App\Http\Requests\kompindiRequest;
use Yajra\DataTables\Facades\DataTables;

class NkopetensteamController extends Controller
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
            $query = Kompindisteam::query();

            return Datatables::of($query)
                ->addColumn('aksi', function($item) {
                    return '
                        <a href="' . route('nkopetensteam.edit', $item->id) . '" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <button class="btn btn-danger btn-sm hapus" kompindisteam-id="' . $item->id . '" kompindisteam-nama="' . $item->nama . '">
                            Delete
                        </button>
                    ';
                })
                ->addColumn('number', function($item) {
                    static $count = 0;
                    return ++$count;
                })
                ->editColumn('subindisteam_id', function($item) {
                    return $item->subindisteam->nama;
                })
                ->rawColumns(['aksi', 'number', 'subindisteam_id'])
                ->make();
        }

        return view('pages.admin.kompindisteam.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subindi = Subindisteam::all();

        return view('pages.admin.kompindisteam.create', compact('subindi'));
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
        Kompindisteam::create($data);

        return redirect()->route('nkopetensteam.index')->with('success', 'Data Berhasil Dimasukan');
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
        //
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
        //
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
}
