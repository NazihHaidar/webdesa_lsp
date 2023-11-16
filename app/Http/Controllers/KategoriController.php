<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Surat;
use Illuminate\Http\Request;



class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->input('cari');

        if ($cari) {
            $kategori = Kategori::where('nama_kategori', 'like', '%' . $cari . '%')->get();
        } else {
            $kategori = Kategori::all();
        }

        return view('kategori.index', ['kategori' => $kategori]);
    }
    public function create()
    {
        $nextId = Kategori::max('id') + 1;
        return view('kategori.create', compact('nextId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil disimpan.');
    }
    public function destroy($id)
    {
        Kategori::find($id)->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        $data = [
            'id' => $id,
            'nama_kategori' => $kategori->nama_kategori,
            'keterangan' => $kategori->keterangan,
        ];

        return view('kategori.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);

        $kategori = Kategori::find($id);

        if (!$kategori) {
            return redirect()->route('kategori.index')->with('error', 'Kategori not found.');
        }

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->keterangan = $request->keterangan;
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }
}
