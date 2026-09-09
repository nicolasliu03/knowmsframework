<form action="/update-kategori" method="POST"
      onsubmit="return confirm('Apakah Anda yakin ingin menyimpan perubahan?')">

    @csrf
    @method('PUT')

    <input
        type="hidden"
        name="id"
        value="{{ $kategori->id }}"
    >
    <div>
        <label>Nama Kategori</label>
        <br>
        <input
            type="text"
            name="nama_kategori"
            value="{{ $kategori->nama_kategori }}"
        >
    </div>
    <div>
        <label>Deskripsi</label>
        <br>
        <textarea name="deskripsi">{{ $kategori->deskripsi }}</textarea>
    </div>

    <button type="submit">Simpan Perubahan</button>

</form>
