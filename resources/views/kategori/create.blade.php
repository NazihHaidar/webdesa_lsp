@extends('layout.main')

@section('judul')
Kategori Surat >> Tambah
@endsection

@section('isi')
<style>
.container {
padding: 10px;
}
</style>
<div class="container"><p>Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengetik tombol
    "Simpan"</p> <form method="POST" action="{{ route('kategori.store') }}">
    @csrf

    <!-- ID (Auto Increment, read-only) -->
    <!-- Remove this block from your form -->
    <div class="form-group row">
        <label for="id" class="col-md-2 col-form-label text-md-left">ID (Auto Increment)</label>
        <div class="col-md-9">
            <input id="id" type="text" class="form-control" value="{{ $nextId }}" readonly>
        </div>
    </div>

    <!-- Nama Kategori -->
    <div class="form-group row">
        <label for="nama_kategori" class="col-md-2 col-form-label text-md-left">Nama Kategori</label>
        <div class="col-md-9">
            <input id="nama_kategori" type="text" class="form-control" name="nama_kategori" required>
        </div>
    </div>

    <!-- Keterangan -->
    <div class="form-group row">
        <label for="keterangan" class="col-sm-2 col-form-label text-sm-left">Keterangan</label>
        <div class="col-sm-9">
            <textarea id="keterangan" class="form-control" name="keterangan" rows="4" required></textarea>
        </div>
    </div>
    <tr>
        <td>
            <h3 class="card-title">
                <button type="button" class="btn btn-sm btn-warning" onclick="window.location='/kategori/index'">
                    &laquo; Kembali
                </button>
                <button type="submit" class="btn btn-sm btn-warning">
                    Simpan
                </button>
            </h3>
        </td>
    </tr>
    </form>
    @endsection