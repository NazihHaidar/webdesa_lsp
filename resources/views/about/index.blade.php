@extends('layout.main')

@section('judul')
    About
@endsection

@section('isi')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 20px;
        }
        .photo {
            width: 150px;
            height: 200px;
            border: 2px solid #333;
            margin-right: 20px;
        }
        .info {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="photo">
            <img src="{{ asset('images/2131730053.jpg') }}" alt="Profil Photo" style="width:100%; height:100%;">
        </div>
        <div class="info">
            <p>Nama    : Mu'ammar Nazih Haidar</p>
            <p>Prodi   : D3-MI PSDKU Kediri</p>
            <p>NIM     : 2131730053</p>
            <p>Tanggal : 13 November 2023</p>
        </div>
    </div>
</body>
</html>
@endsection