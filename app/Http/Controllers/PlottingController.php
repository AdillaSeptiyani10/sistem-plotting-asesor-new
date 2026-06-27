<?php

namespace App\Http\Controllers;

use App\Models\Plotting;
use App\Models\Asesor;
use App\Models\Peserta;
use Illuminate\Http\Request;

class PlottingController extends Controller
{
    public function index()
    {
        $plotting = Plotting::with('asesor', 'peserta')->get();

        return view('plotting.index', compact('plotting'));
    }

    public function create()
    {
        $asesor = Asesor::all();
        $peserta = Peserta::all();

        return view('plotting.create', compact('asesor', 'peserta'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'asesor_id' => 'required',
            'peserta_id' => 'required',
            'tanggal' => 'required',
            'lokasi' => 'required'
        ]);

        // cek apakah asesor sudah punya jadwal di tanggal tersebut
        $cek = Plotting::where('asesor_id', $request->asesor_id)
                        ->where('tanggal', $request->tanggal)
                        ->first();

        // jika bentrok
        if ($cek) {

            return back()
                ->with('error', 'Asesor sudah memiliki jadwal pada tanggal tersebut!')
                ->withInput();
        }

        // simpan plotting
        Plotting::create([
            'asesor_id' => $request->asesor_id,
            'peserta_id' => $request->peserta_id,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi
        ]);

        return redirect('/plotting')
            ->with('success', 'Plotting berhasil ditambahkan');
    }

    public function edit($id)
    {
        $plotting = Plotting::findOrFail($id);
        $asesor = Asesor::all();
        $peserta = Peserta::all();

        return view('plotting.edit', compact('plotting', 'asesor', 'peserta'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'asesor_id' => 'required',
            'peserta_id' => 'required',
            'tanggal' => 'required',
            'lokasi' => 'required'
        ]);

        // cek apakah asesor sudah punya jadwal di tanggal tersebut (kecuali data ini sendiri)
        $cek = Plotting::where('asesor_id', $request->asesor_id)
                        ->where('tanggal', $request->tanggal)
                        ->where('id', '!=', $id)
                        ->first();

        // jika bentrok
        if ($cek) {
            return back()
                ->with('error', 'Asesor sudah memiliki jadwal pada tanggal tersebut!')
                ->withInput();
        }

        // update plotting
        $plotting = Plotting::findOrFail($id);
        $plotting->update([
            'asesor_id' => $request->asesor_id,
            'peserta_id' => $request->peserta_id,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi
        ]);

        return redirect('/plotting')
            ->with('success', 'Plotting berhasil diupdate');
    }

    public function destroy($id)
    {
        $plotting = Plotting::findOrFail($id);
        $plotting->delete();

        return back()->with('success', 'Data plotting berhasil dihapus');
    }
}