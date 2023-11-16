@extends('layout.main')

@section('judul')
    Kategori Surat
@endsection

@section('isi')
    <style>
        .container {
            padding: 10px;
        }
    </style>
    <div class="container"><p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.
        Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.
    </p>
    <form method="GET">
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">
                    Cari Kategori
                </label>
                <div class="col-sm-8">
                    <input type="text" name="cari" id="cari" class="form-control" placeholder="search" autofocus="true">
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
    </form></div>
<div class="card">
    <table class="table table-sm table-bordered table-striped">
        <thead>
            <tr>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategori as $kategori)
                <tr>
                    <td>{{ $kategori->id }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td>{{ $kategori->keterangan }}</td>
                    <td>
                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                        <a class="btn btn-primary" href="{{ route('kategori.edit', $kategori->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
<h3 class="card-title">
        <button class="btn btn-success" onclick="window.location='/kategori/create/'">
                [+] Tambah Kategori Baru
        </button>
</h3>
@endsection