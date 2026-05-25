<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Tambahkan ini di sini

class AlatController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil keyword dari input name="search"
        $keyword = $request->get('search');
        
        // 2. Buat query dasar menggunakan model Alat
        $query = Alat::query();

        // 3. Jika input pencarian tidak kosong, lakukan penyaringan data
        if (!empty($keyword)) {
            $query->where('nama_alat', 'LIKE', "%{$keyword}%")
                  ->orWhere('merek', 'LIKE', "%{$keyword}%")
                  ->orWhere('lokasi', 'LIKE', "%{$keyword}%")
                  ->orWhere('status', 'LIKE', "%{$keyword}%"); // Tambahan agar status bisa dicari
        }

        // 4. Urutkan dari yang terbaru dan batasi 10 data per halaman
        $alat = $query->latest()->paginate(10);

        // 5. Kembalikan ke halaman view utama dengan membawa data yang sudah disaring
        return view('alat.index', compact('alat'));
    }

    public function cetakPDF()
    {
        $alat = Alat::all();
        $pdf = Pdf::loadView('admin.alat_pdf', compact('alat'));
        return $pdf->stream('laporan-inventaris-alat.pdf');
    }

    public function edit(Alat $alat)
    {
        return view('alat.edit', compact('alat'));
    }

    public function create()
    {
        // Menampilkan halaman form tambah data
        return view('alat.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_alat' => 'required', // sesuaikan field database kamu
        ]);

        // Simpan ke database (otomatis memasukkan semua input termasuk foto & status)
        Alat::create($request->all());

        // Redirect ke halaman utama
        return redirect()->route('alat.index')->with('success', 'Data alat berhasil ditambahkan');
    }

    public function update(Request $request, Alat $alat)
    {
        $request->validate([
            'nama_alat' => 'required', // sesuaikan field database kamu
        ]);

        // Update ke database (otomatis memperbarui semua input termasuk foto & status)
        $alat->update($request->all());

        return redirect()->route('alat.index')->with('success', 'Data alat berhasil diperbarui');
    }

    public function destroy(Alat $alat)
    {
        $alat->delete();
        return redirect()->route('alat.index')->with('success', 'Data alat berhasil dihapus');
    }

    public function show(Alat $alat)
    {
        return view('alat.show', compact('alat'));
    }
}