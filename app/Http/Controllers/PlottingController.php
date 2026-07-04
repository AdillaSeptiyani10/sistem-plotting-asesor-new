<?php

namespace App\Http\Controllers;

use App\Models\Plotting;
use App\Models\Asesor;
use App\Models\Tuk;
use Illuminate\Http\Request;

class PlottingController extends Controller
{
    public function index()
    {
        $plotting = Plotting::with('asesor', 'tuk')->get();
        return view('plotting.index', compact('plotting'));
    }

    public function create()
    {
        $asesor = Asesor::all();
        $tuk    = Tuk::all();
        return view('plotting.create', compact('asesor', 'tuk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'asesor_id'         => 'required',
            'jumlah_peserta'    => 'required|integer|min:1',
            'tuk_id'            => 'required',
            'skema_sertifikasi' => 'required',
            'holding'           => 'required',
            'metode_kegiatan'   => 'required',
            'tanggal'           => 'required|date',
            'waktu_asesmen'     => 'nullable',
            'waktu_selesai'     => 'nullable',
            'approver_h4'       => 'nullable|email',
            'spt_h2'            => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'status'            => 'nullable|in:Pending,Disetujui,Ditolak',
            'tgl_diajukan'      => 'nullable|date',
            'tgl_direspon'      => 'nullable|date',
            'asesor_pengganti'  => 'nullable',
            'progres'           => 'nullable|in:Belum,Proses,Selesai',
            'kinerja_asesor'    => 'nullable',
            'tgl_pleno'         => 'nullable|date',
            'terbit_sertifikat' => 'nullable',
            'catatan_asesmen'   => 'nullable',
        ]);

        $cek = Plotting::with('tuk')
                        ->where('asesor_id', $request->asesor_id)
                        ->where('tanggal', $request->tanggal)
                        ->first();

        if ($cek) {
            $namaAsesor = $cek->asesor->nama;
            $tanggal    = \Carbon\Carbon::parse($cek->tanggal)->format('d M Y');
            $namaTuk    = $cek->tuk ? $cek->tuk->nama_tuk : '-';
            return back()
                ->with('error', "Jadwal bentrok! Asesor <strong>{$namaAsesor}</strong> sudah dijadwalkan pada tanggal <strong>{$tanggal}</strong> di TUK <strong>{$namaTuk}</strong>. Silakan pilih tanggal atau asesor lain.")
                ->withInput();
        }

        $sptPath = null;
        if ($request->hasFile('spt_h2')) {
            $sptPath = $request->file('spt_h2')->store('spt', 'public');
        }

        Plotting::create([
            'asesor_id'         => $request->asesor_id,
            'jumlah_peserta'    => $request->jumlah_peserta,
            'tuk_id'            => $request->tuk_id,
            'skema_sertifikasi' => $request->skema_sertifikasi,
            'holding'           => $request->holding,
            'metode_kegiatan'   => $request->metode_kegiatan,
            'tanggal'           => $request->tanggal,
            'waktu_asesmen'     => $request->waktu_asesmen,
            'waktu_selesai'     => $request->waktu_selesai,
            'approver_h4'       => $request->approver_h4,
            'spt_h2'            => $sptPath,
            'status'            => $request->status ?? 'Pending',
            'tgl_diajukan'      => $request->tgl_diajukan,
            'tgl_direspon'      => $request->tgl_direspon,
            'asesor_pengganti'  => $request->asesor_pengganti,
            'progres'           => $request->progres ?? 'Belum',
            'kinerja_asesor'    => $request->kinerja_asesor,
            'tgl_pleno'         => $request->tgl_pleno,
            'terbit_sertifikat' => $request->has('terbit_sertifikat') ? 1 : 0,
            'catatan_asesmen'   => $request->catatan_asesmen,
        ]);

        return redirect()->route('plotting.index')
            ->with('success', 'Plotting berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $plotting = Plotting::findOrFail($id);
        $asesor   = Asesor::all();
        $tuk      = Tuk::all();
        return view('plotting.edit', compact('plotting', 'asesor', 'tuk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'asesor_id'         => 'required',
            'jumlah_peserta'    => 'required|integer|min:1',
            'tuk_id'            => 'required',
            'skema_sertifikasi' => 'required',
            'holding'           => 'required',
            'metode_kegiatan'   => 'required',
            'tanggal'           => 'required|date',
            'waktu_asesmen'     => 'nullable',
            'waktu_selesai'     => 'nullable',
            'approver_h4'       => 'nullable|email',
            'spt_h2'            => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'status'            => 'nullable|in:Pending,Disetujui,Ditolak',
            'tgl_diajukan'      => 'nullable|date',
            'tgl_direspon'      => 'nullable|date',
            'asesor_pengganti'  => 'nullable',
            'progres'           => 'nullable|in:Belum,Proses,Selesai',
            'kinerja_asesor'    => 'nullable',
            'tgl_pleno'         => 'nullable|date',
            'terbit_sertifikat' => 'nullable',
            'catatan_asesmen'   => 'nullable',
        ]);

        $cek = Plotting::with('tuk')
                        ->where('asesor_id', $request->asesor_id)
                        ->where('tanggal', $request->tanggal)
                        ->where('id', '!=', $id)
                        ->first();

        if ($cek) {
            $namaAsesor = $cek->asesor->nama;
            $tanggal    = \Carbon\Carbon::parse($cek->tanggal)->format('d M Y');
            $namaTuk    = $cek->tuk ? $cek->tuk->nama_tuk : '-';
            return back()
                ->with('error', "Jadwal bentrok! Asesor <strong>{$namaAsesor}</strong> sudah dijadwalkan pada tanggal <strong>{$tanggal}</strong> di TUK <strong>{$namaTuk}</strong>. Silakan pilih tanggal atau asesor lain.")
                ->withInput();
        }

        $plotting = Plotting::findOrFail($id);

        $sptPath = $plotting->spt_h2;
        if ($request->hasFile('spt_h2')) {
            if ($sptPath && \Storage::disk('public')->exists($sptPath)) {
                \Storage::disk('public')->delete($sptPath);
            }
            $sptPath = $request->file('spt_h2')->store('spt', 'public');
        }

        $plotting->update([
            'asesor_id'         => $request->asesor_id,
            'jumlah_peserta'    => $request->jumlah_peserta,
            'tuk_id'            => $request->tuk_id,
            'skema_sertifikasi' => $request->skema_sertifikasi,
            'holding'           => $request->holding,
            'metode_kegiatan'   => $request->metode_kegiatan,
            'tanggal'           => $request->tanggal,
            'waktu_asesmen'     => $request->waktu_asesmen,
            'waktu_selesai'     => $request->waktu_selesai,
            'approver_h4'       => $request->approver_h4,
            'spt_h2'            => $sptPath,
            'status'            => $request->status ?? 'Pending',
            'tgl_diajukan'      => $request->tgl_diajukan,
            'tgl_direspon'      => $request->tgl_direspon,
            'asesor_pengganti'  => $request->asesor_pengganti,
            'progres'           => $request->progres ?? 'Belum',
            'kinerja_asesor'    => $request->kinerja_asesor,
            'tgl_pleno'         => $request->tgl_pleno,
            'terbit_sertifikat' => $request->has('terbit_sertifikat') ? 1 : 0,
            'catatan_asesmen'   => $request->catatan_asesmen,
        ]);

        return redirect()->route('plotting.index')
            ->with('success', 'Plotting berhasil diupdate.');
    }

    public function destroy($id)
    {
        $plotting = Plotting::findOrFail($id);
        if ($plotting->spt_h2 && \Storage::disk('public')->exists($plotting->spt_h2)) {
            \Storage::disk('public')->delete($plotting->spt_h2);
        }
        $plotting->delete();
        return back()->with('success', 'Data plotting berhasil dihapus.');
    }
}
