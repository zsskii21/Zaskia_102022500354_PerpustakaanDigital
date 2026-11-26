<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Fasilitas & Area</title>
</head>
<body>
    <h1>Fasilitas & Area Perpustakaan</h1>

    @if (session('ok'))
        <p style="color:green">{{ session('ok') }}</p>
    @endif
    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('fasilitas.store') }}">
        @csrf
        <input name="kode_area" placeholder="Kode area" value="{{ old('kode_area') }}">
        <input name="nama_area" placeholder="Nama area" value="{{ old('nama_area') }}">
        <input type="number" name="nomor_lantai" placeholder="Lantai" value="{{ old('nomor_lantai') }}">
        <select name="tipe">
            <option value="Meja Baca">Meja Baca</option>
            <option value="Bilik">Bilik</option>
        </select>
        <select name="stopkontak"><option value="1">Stopkontak: Ada</option><option value="0">Tidak</option></select>
        <select name="wifi"><option value="1">WiFi: Ada</option><option value="0">Tidak</option></select>
        <select name="status">
            <option value="Tersedia">Tersedia</option>
            <option value="Terpakai">Terpakai</option>
            <option value="Perawatan">Perawatan</option>
        </select>
        <button type="submit">Tambah</button>
    </form>

    <table border="1" cellpadding="6">
        <tr>
            <th>Kode</th><th>Nama</th><th>Lantai</th><th>Tipe</th>
            <th>Stopkontak</th><th>WiFi</th><th>Status</th><th>Aksi</th>
        </tr>
        @foreach ($rows as $r)
        <tr>
            <td>{{ $r->kode_area }}</td>
            <td>{{ $r->nama_area }}</td>
            <td>{{ $r->nomor_lantai }}</td>
            <td>{{ $r->tipe }}</td>
            <td>{{ $r->stopkontak ? 'Ada' : 'Tidak' }}</td>
            <td>{{ $r->wifi ? 'Ada' : 'Tidak' }}</td>
            <td>{{ $r->status }}</td>
            <td>
                <a href="{{ route('fasilitas.edit', $r) }}">Edit</a>
                <form method="POST" action="{{ route('fasilitas.destroy', $r) }}" style="display:inline"
                      onsubmit="return confirm('Hapus data ini?')">
                    @csrf @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>