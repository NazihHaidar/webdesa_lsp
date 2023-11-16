@extends('layout.main')

@section('judul')
Arsip Surat
@endsection

@section('isi')
<style>
.container {
padding: 10px;
}
</style>
<div class="container"><p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. Klik "Lihat" pada kolom aksi
    untuk menampilkan surat. </p>
    <form method="GET"> <div class="form-group row"> <label for="" class="col-sm-2 col-form-label">
        Cari Surat
        </label>
        <div class="col-sm-8">
            <input type="text" name="cari" id="cari" class="form-control" placeholder="search" autofocus="true">
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
            </form>
        </div> 
        <div class="card"> <table class="table table-sm table-bordered table-striped">
            <thead>
            <tr>
            <th>Nomor Surat</th>
            <th>Kategori</th>
            <th>Judul</th>
            <th>Waktu Pengarsipan</th>
            <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach($arsipSurat as $surat)
                <tr>
                    <td>{{ $surat->no_surat }}</td>
                    <td>{{ $surat->kategori->nama_kategori }}</td>
                    <td>{{ $surat->judul }}</td>
                    <td>{{ $surat->created_at }}</td>
                    <td>
                        <form action="{{ route('surat.destroy', $surat->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                        <form action="{{ route('surat.unduh', $surat->no_surat) }}" method="GET" style="display: inline;">
                            @csrf
                            <button class="btn btn-warning" type="submit">Unduh</button>
                        </form>
                        <form action="{{ route('surat.lihat', $surat->id) }}" method="GET" style="display: inline;">
                            @csrf
                            <button class="btn btn-primary" type="submit">Lihat</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <h3 class="card-title">
            <button class="btn btn-secondary" type="button" onclick="window.location='/surat/create'">
                Arsipkan Surat
            </button>
        </h3>
@endsection