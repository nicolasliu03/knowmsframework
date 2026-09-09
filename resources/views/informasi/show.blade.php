<!DOCTYPE html>
<html>
<head>
    <title>{{ $informasi->judul }}</title>
</head>
<body>

<h1>{{ $informasi->judul }}</h1>

<p>
    <strong>Kategori:</strong>
    {{ $informasi->nama_kategori ?? '-' }}
</p>

<p>
    <strong>Ringkasan:</strong>
    {{ $informasi->ringkasan }}
</p>

<p>
    <strong>Isi Informasi:</strong>
</p>

<p>
    {{ $informasi->isi }}
</p>

@if ($informasi->sumber)
    <p>
        <strong>Sumber:</strong>
        {{ $informasi->sumber }}
    </p>
@endif

<p>
    <strong>Status:</strong>
    {{ $informasi->status }}
</p>

<hr>

<a href="/informasi">
    Kembali ke Daftar Informasi
</a>

</body>
</html>
