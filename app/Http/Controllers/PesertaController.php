<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $peserta = Peserta::all();

        return view('peserta.index', compact('peserta'));
    }

    public function create()
    {
        return view('peserta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jurusan' => 'required'
        ]);

        Peserta::create($request->all());

        return redirect('/peserta');
    }

    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);

        return view('peserta.edit', compact('peserta'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jurusan' => 'required'
        ]);

        $peserta = Peserta::findOrFail($id);
        $peserta->update($request->all());

        return redirect('/peserta')->with('success', 'Data peserta berhasil diupdate');
    }

    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return back()->with('success', 'Data peserta berhasil dihapus');
    }
}