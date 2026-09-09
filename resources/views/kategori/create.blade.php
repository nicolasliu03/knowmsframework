<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
</head>
<body>

    <h2>Tambah Kategori</h2>

    {{-- Pesan error --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('simpan-kategori') }}">
        @csrf

        <table>

            <tr>
                <td>Nama Kategori</td>
                <td>
                    <input
                        type="text"
                        name="nama_kategori"
                        value="{{ old('nama_kategori') }}"
                    >
                </td>
            </tr>

            <tr>
                <td>Deskripsi</td>
                <td>
                    <textarea name="deskripsi">{{ old('deskripsi') }}</textarea>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" value="Simpan">
                </td>
            </tr>

        </table>
    </form>

    <br>

    <a href="{{ url('daftar-kategori') }}">
        [KEMBALI]
    </a>

</body>
</html>
