@extends('layout.main')

@section('judul')
Arsip Surat>>Lihat
@endsection

@section('isi')
<style>
.container {
padding: 10px;
}
.pdf-viewer {
width: 100%;
height:500px;
border: 1px solid #ccc;
}
</style>
<div class="container">
    <p>Nomor: {{ $surat->no_surat }}</p> 
    <p>Kategori: {{ $surat->kategori->nama_kategori }}</p> 
    <p>Judul: {{ $surat->judul }}</p>
    <p>Waktu Unggah: {{ $surat->created_at }}</p> 
    <tr>
        <td>
            <h3 class="card-title">
                <button type="button" class="btn btn-sm btn-warning" onclick="window.location='/surat/index'">
                    &laquo; Kembali
                </button>
                <form action="{{ route('surat.unduh', $surat->no_surat) }}" method="GET" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-warning">
                        Unduh
                    </button>
                </form>
                <button type="submit" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editFileModal">
                    Edit/Ganti File
                </button>
            </h3>
        </td>
    </tr>
    <iframe class="pdf-viewer" src="{{ route('surat.lihatPDFByJudul', $surat->judul) }}" frameborder="0"></iframe> 
</div>
<div class="modal fade" id="editFileModal" tabindex="-1" role="dialog" aria-labelledby="editFileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFileModalLabel">Edit/Ganti File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('surat.editFile', $surat->no_surat) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="newFile" accept=".pdf">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection