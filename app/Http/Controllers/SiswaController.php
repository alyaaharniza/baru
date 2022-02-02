<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|:30',
            'nim' => 'required|max:10',
            'jurusan' => 'required'
        ]);

        Siswa::create($request->all());

        return redirect('/siswas')->with('status', 'Data Berhasil Disimpan');
    }


    public function edit(Siswa $siswa)
    {
        return view('siswa/edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama'=> 'required|max:30',
            'nim' => 'required|max:10',
            'jurusan' => 'required'
        ]);

        Siswa::where('id', $siswa->id)
        -> update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan
        ]);
        return redirect('/siswas')->with('status','Data berhasil di edit');
    }

    
    public function destroy(Siswa $siswa)
    {
        $siswa::destroy($siswa->id);
        return redirect('/siswas')->with('status', 'Data Berhasil Dihapus');
    }
}
