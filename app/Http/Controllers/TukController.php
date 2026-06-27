<?php

namespace App\Http\Controllers;

use App\Models\Tuk;
use Illuminate\Http\Request;

class TukController extends Controller
{
    public function index()
    {
        $tuk = Tuk::all();

        return view('tuk.index', compact('tuk'));
    }

    public function create()
    {
        return view('tuk.create');
    }

    public function store(Request $request)
    {
        Tuk::create($request->all());

        return redirect('/tuk')
            ->with('success', 'Data TUK berhasil ditambah');
    }

    public function edit($id)
    {
        $tuk = Tuk::findOrFail($id);

        return view('tuk.edit', compact('tuk'));
    }

    public function update(Request $request, $id)
    {
        $tuk = Tuk::findOrFail($id);

        $tuk->update($request->all());

        return redirect('/tuk');
    }

    public function destroy($id)
    {
        $tuk = Tuk::findOrFail($id);

        $tuk->delete();

        return back();
    }
}