<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        $asesor = Asesor::all();
        return view('asesor.index', compact('asesor'));
    }

    public function create()
    {
        return view('asesor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
        ]);

        Asesor::create($request->only('nama', 'email', 'no_hp'));

        return redirect('/asesor')->with('success', 'Data asesor berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $asesor = Asesor::findOrFail($id);
        return view('asesor.edit', compact('asesor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
        ]);

        $asesor = Asesor::findOrFail($id);
        $asesor->update($request->only('nama', 'email', 'no_hp'));

        return redirect('/asesor')->with('success', 'Data asesor berhasil diupdate.');
    }

    public function destroy($id)
    {
        $asesor = Asesor::findOrFail($id);
        $asesor->delete();
        return back()->with('success', 'Data asesor berhasil dihapus.');
    }
}
