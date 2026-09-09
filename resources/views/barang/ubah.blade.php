<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Barang</title>
</head>
<body>

    <h2>Ubah Barang</h2>

    {{-- Pesan error --}}
    @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    {{-- Validasi --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('update-barang') }}">

        @csrf
        @method('PUT')

        <input
            type="hidden"
            name="id"
            value="{{ $barang->id }}"
        >

        <table>

            <tr>
                <td>Nama Barang</td>
                <td>
                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama', $barang->nama) }}"
                    >
                </td>
            </tr>

            <tr>
                <td>Harga</td>
                <td>
                    <input
                        type="number"
                        name="harga"
                        value="{{ old('harga', $barang->harga) }}"
                    >
                </td>
            </tr>

            <tr>
                <td>Stok</td>
                <td>
                    <input
                        type="number"
                        name="stok"
                        value="{{ old('stok', $barang->stok) }}"
                    >
                </td>
            </tr>

            <tr>
                <td>Kategori</td>
                <td>
                    <select name="kategori_id">

                        @foreach ($kategoris as $kategori)

                            <option
                                value="{{ $kategori->id }}"
                                {{ old('kategori_id', $barang->kategori_id) == $kategori->id ? 'selected' : '' }}
                            >
                                {{ $kategori->nama_kategori }}
                            </option>

                        @endforeach

                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input
                        type="submit"
                        value="Simpan Perubahan"
                    >
                </td>
            </tr>

        </table>

    </form>

    <br>

    <a href="{{ url('daftar-barang') }}">
        [KEMBALI]
    </a>

</body>
</html>
