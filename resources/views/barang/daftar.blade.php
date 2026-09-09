<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
</head>
<body>

    <h2>Daftar Barang</h2>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    <br>

    <a href="{{ url('tambah-barang') }}">
        [TAMBAH BARANG]
    </a>

    <br><br>

    <table border="1" cellpadding="8">

        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>

        @foreach ($barangs as $barang)

            <tr>
                <td>{{ $barang->nama }}</td>

                <td>
                    Rp {{ number_format($barang->harga, 0, ',', '.') }}
                </td>

                <td>{{ $barang->stok }}</td>

                <td>
                    {{ $barang->kategori->nama_kategori ?? '-' }}
                </td>

                <td>

                    <a href="{{ route('barang.ubah', $barang) }}">
                        [UBAH]
                    </a>

                    <form
                        action="{{ route('barang.hapus', $barang) }}"
                        method="POST"
                        style="display:inline;"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            onclick="return confirm('Yakin ingin menghapus barang ini?')"
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
