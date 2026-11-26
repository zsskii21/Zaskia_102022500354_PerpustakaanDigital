<?php

namespace App\Http\Controllers;

use App\Models\FasilitasArea;
use Illuminate\Http\Request;

class FasilitasAreaController extends Controller
{
    public function index()
    {
        $rows = FasilitasArea::latest()->get();
        return view('fasilitas.index', compact('rows'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_area'    => 'required|unique:fasilitas_area,kode_area',
            'nama_area'    => 'required',
            'nomor_lantai' => 'required|integer',
            'tipe'         => 'required',
            'stopkontak'   => 'required|boolean',
            'wifi'         => 'required|boolean',
            'status'       => 'required',
        ]);

        FasilitasArea::create($data);

        return redirect()->route('fasilitas.index')
            ->with('ok', 'Data berhasil ditambahkan.');
    }

    public function edit(FasilitasArea $fasilita)
    {
        return view('fasilitas.edit', ['row' => $fasilita]);
    }

    public function update(Request $request, FasilitasArea $fasilita)
    {
        $data = $request->validate([
            'kode_area'    => 'required|unique:fasilitas_area,kode_area,' . $fasilita->id,
            'nama_area'    => 'required',
            'nomor_lantai' => 'required|integer',
            'tipe'         => 'required',
            'stopkontak'   => 'required|boolean',
            'wifi'         => 'required|boolean',
            'status'       => 'required',
        ]);

        $fasilita->update($data);

        return redirect()->route('fasilitas.index')
            ->with('ok', 'Data berhasil diubah.');
    }

    public function destroy(FasilitasArea $fasilita)
    {

        $fasilita->delete();

        return redirect()->route('fasilitas.index')
            ->with('ok', 'Data berhasil dihapus.');
    }
}