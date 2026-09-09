<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
</head>
<body>

    <h2>Daftar Kategori</h2>

    {{-- Pesan berhasil --}}
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Pesan gagal --}}
    @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    <br>

    <a href="{{ url('tambah-kategori') }}">
        [TAMBAH KATEGORI]
    </a>

    <br><br>

    <table border="1" cellpadding="8">

        <tr>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>

        @foreach ($kategoris as $kategori)

            <tr>

                <td>
                    {{ $kategori->nama_kategori }}
                </td>

                <td>
                    {{ $kategori->deskripsi }}
                </td>

                <td>

                    {{-- Tombol Ubah --}}
                    <a href="{{ route('kategori.ubah', $kategori) }}">
                        [UBAH]
                    </a>

                    &nbsp;

                    {{-- Tombol Hapus --}}
                    <form
                        action="{{ route('kategori.hapus', $kategori) }}"
                        method="POST"
                        style="display:inline;"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            onclick="return confirm('Yakin ingin menghapus kategori ini?')"
                        >
                            [HAPUS]
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

    </table>

</body>
</html>
