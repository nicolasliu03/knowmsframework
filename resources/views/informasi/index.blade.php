<!DOCTYPE html>
<html>
<head>
    <title>Knowledge Hub</title>
</head>
<body>

<h1>Knowledge Hub</h1>

@if (session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div>
        {{ session('error') }}
    </div>
@endif

<h2>Daftar Informasi</h2>

@forelse ($informasis as $informasi)

    <div>
        <h3>{{ $informasi->judul }}</h3>

        <p>
            <strong>Kategori:</strong>
            {{ $informasi->nama_kategori }}
        </p>

        <p>
            {{ $informasi->ringkasan }}
        </p>

        <a href="/informasi/{{ $informasi->id }}">
            Lihat Selengkapnya
        </a>
    </div>

    <hr>

@empty

    <p>Belum ada informasi.</p>

@endforelse

</body>
</html>
