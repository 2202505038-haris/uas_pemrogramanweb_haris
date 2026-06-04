<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Tambahkan ini di sini

class AlatController extends Controller
{
    public function index()
    {
        $alat = Alat::latest()->paginate(10);
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

        // Simpan ke database
        Alat::create($request->all());

        // Redirect ke halaman utama
        return redirect()->route('alat.index')->with('success', 'Data alat berhasil ditambahkan');
    }
    public function update(Request $request, Alat $alat)
    {
        $request->validate([
            'nama_alat' => 'required', // sesuaikan field database kamu
        ]);

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