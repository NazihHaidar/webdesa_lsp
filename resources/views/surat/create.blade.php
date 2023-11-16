@extends('layout.main')

@section('judul')
Arsip Surat >> Unggah
@endsection

@section('isi')
<style>
.container {
padding: 10px;
}
</style>
<div class="container"> <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan. </p> <p>Catatan :</p>
    <p>* Gunakan file berformat PDF</p> </div> 
    <form method="POST" action="{{ route('surat.store') }}" enctype="multipart/form-data">
    @csrf
        <table class="table table-sm table-striped">
        <!-- No Surat -->
        <div class="form-group row">
            <label for="no_surat" class="col-md-2 col-form-label text-md-left">No Surat</label>
            <div class="col-md-9">
                <input type="text" name="no_surat" class="form-control" required>
            </div>
        </div>
        <!-- Kategori -->
        <div class="form-group row">
            <label for="kategori" class="col-md-2 col-form-label text-md-left">Kategori</label>
            <div class="col-md-9">
                <select name="kategori_id" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($kategori as $category)
                    <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- Judul -->
        <div class="form-group row">
            <label for="judul" class="col-md-2 col-form-label text-md-left">Judul</label>
            <div class="col-md-9">
                <input type="text" name="judul" class="form-control" required>
            </div>
        </div>
        <!-- File PDF -->
        <div class="form-group row">
            <label for="file_surat" class="col-md-2 col-form-label text-md-left">File Surat (PDF)</label>
            <div class="col-md-9">
                <input type="file" name="file_surat" accept=".pdf" class="form-control-file" required>
            </div>
        </div>
        <tr>
            <td>
                <h3 class="card-title">
                    <button type="button" class="btn btn-sm btn-warning" onclick="window.location='/surat/index'">
                        &laquo; Kembali
                    </button>
                    <button type="submit" class="btn btn-sm btn-warning">
                        Simpan
                    </button>
                </h3>
            </td>
        </tr>
        </table>
        </form>

        @endsection