<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        $kategoriList = Kategori::all();
        $cari = $request->input('cari');

        if ($cari) {
            $arsipSurat = Surat::where('judul', 'like', '%' . $cari . '%')->get();
        } else {
            $arsipSurat = Surat::all();
        }

        return view('surat.index', ['arsipSurat' => $arsipSurat], compact('kategoriList'));
    }
    public function create()
    {
        $kategori = Kategori::all();
        return view('surat.create', compact('kategori'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'no_surat' => 'required',
            'kategori_id' => 'required',
            'judul' => 'required',
            'file_surat' => 'required',
        ]);

        $fileSuratPath = $request->file_surat->store('surat_files', 'public');

        Surat::create([
            'no_surat' => $request->no_surat,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'file_surat' => $fileSuratPath,
        ]);

        return redirect()->route('index')->with('success', 'Surat berhasil disimpan.');
    }
    public function destroy($id)
    {
        $surat = Surat::find($id);

        if (!$surat) {
            return redirect()->back()->with('error', 'Surat tidak ditemukan');
        }

        $surat->delete();
        
        return redirect()->back()->with('success', 'Surat berhasil dihapus');
    }
    public function unduh($no_surat)
    {
        // ambil data surat
        $surat = Surat::where('no_surat', $no_surat)->first();

        if (!$surat) {
            return redirect()->back()->with('error', 'Surat tdk ditemukan');
        }
        // Ambil isi file PDF
        $file = Storage::disk('public')->get($surat->file_surat);
        //Make objek respon
        $response = Response::make($file, 200);
        //Penentuan header respon
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'inline; filename="' . $surat->judul . '.pdf"');

        return $response;
    }
    public function lihat($id){
        $surat = Surat::find($id);
        return view('surat.lihat', ['surat' => $surat]);
    }
    public function lihatPDFByJudul($judul)
    {
        $surat = Surat::where('judul', $judul)->first();

        if ($surat) {
            $filePath = public_path('storage/' . $surat->file_surat);

            if (file_exists($filePath)) {
                return response()->file($filePath, ['Content-Type' => 'application/pdf']);
            } else {
                return response()->json(['error' => 'File not found at path: ' . $filePath], 404);
            }
        }

        return response()->json(['error' => 'Surat not found'], 404);
    }
    public function editFile(Request $request, $no_surat)
    {
        // Validasi request
        $request->validate([
            'newFile' => 'required',
        ]);

        // Ambil data surat yang akan diubah
        $surat = Surat::where('no_surat', $no_surat)->first();

        if (!$surat) {
            // Tangani kasus jika surat tidak ditemukan
            return redirect()->back()->with('error', 'Surat tidak ditemukan.');
        }

        // Tangani unggah file
        if ($request->hasFile('newFile')) {
            $file = $request->file('newFile');
            $fileName = $no_surat . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('surat_files', $fileName, 'public');

            // Perbarui record surat dengan nama file baru
            $surat->file_surat = $fileName;
            $surat->save();

            return redirect()->back()->with('success', 'File berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'File tidak diberikan.');
    }
}