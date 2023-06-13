<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use App\Http\Requests\GuruRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class GuruController extends Controller
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
            $query = Guru::query();

            return Datatables::of($query)
                ->addColumn('aksi', function($item) {
                    return '
                        <a href="' . route('guru.edit', $item->id) . '" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <button class="btn btn-danger btn-sm hapus" guru-id="' . $item->id . '" guru-nama="' . $item->nama . '">
                            Delete
                        </button>
                    ';
                })
                ->addColumn('number', function($item) {
                    static $count = 0;
                    return ++$count;
                })
                ->addColumn('ttd', function ($user) {
                    return '<img src="'. asset('storage/'. $user->ttd) .'" style="width:70px; height:auto;" />';
                })
                ->rawColumns(['aksi', 'number', 'ttd'])
                ->make();
        }

        return view('pages.admin.guru.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuruRequest $request)
    {
        // Insert ke table user
        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('guru123**');
        $user->role = 'USER';
        $user->save();

        // Insert ke table guru
        $request->request->add(['user_id' => $user->id]);
        $guru = $request->all();
        $guru['ttd'] = request()->file('ttd')->store('assets/gttd', 'public');
        Guru::create($guru);
        
        return redirect()->route('guru.index')->with('success', 'Data Berhasil Ditambah');
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
        $item = Guru::findOrFail($id);

        return view('pages.admin.guru.edit', compact('item'));
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
        $guru = Guru::findOrFail($id);
        $s = ('public/'.$guru->ttd);
        // dd($s);

        if(request('ttd')) {
            Storage::disk('local')->delete($s);
            $image = request()->file('ttd')->store('assets/gttd', 'public');
        } elseif($guru->ttd) {
            $image = $guru->ttd;
        } else {
            $image = null;
        }

        $guru->nama = $request->nama;
        $guru->email = $request->email;
        $guru->kelas = $request->kelas;
        $guru->ttd = $image;
        $guru->save();

        $update_guru = $guru->user_id;
        $uguru = User::findOrFail($update_guru);
        $uguru->name = $request->nama;
        $uguru->email = $request->email;
        $uguru->save();

        return redirect()->route('guru.index')->with('success', 'Data Berhasil Diubah');
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
        $item = Guru::findOrFail($id);
        $item->delete();

        return redirect()->route('guru.index')->with('success', 'Data Berhasil Dihapus');
    }
}
