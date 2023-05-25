<?php

namespace App\Http\Controllers;

use App\Models\Orang;
use Illuminate\Http\Request;

class OrangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('orang.index')->with([
            'orang' => Orang::all()
        ]);
    }
    public function create() {
        return view('orang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
        ],[
            'nama.required' => 'Nama harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
        ]);
        Orang::create($data);
        return redirect()->route('orang')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function edit(Orang $orang)
    {
        return view('orang.edit')->with([
            'orang' => $orang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orang $orang)
    {
        $data = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
        ],[
            'nama.required' => 'Nama harus diisi',
            'kelas.required' => 'Kelas harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
        ]);
        $orang->update($data);
        return redirect('/orang')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orang $orang)
    {
        $orang->delete();
        return redirect('/orang')->with('successDelete', 'Data berhasil dihapus');
    }
}
