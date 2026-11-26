<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Area</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Perpustakaan Digital</h1>
        <p>Fasilitas dan Area</p>
    </header>

    <main>
        @if ($errors->any())
            <div class="alert alert-err">
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2>Edit Area</h2>
        <form method="POST" action="{{ route('fasilitas.update', $row) }}">
            @csrf
            @method('PUT')

            <label>Kode Area</label>
            <input type="text" name="kode_area" value="{{ old('kode_area', $row->kode_area) }}">

            <label>Nama Area</label>
            <input type="text" name="nama_area" value="{{ old('nama_area', $row->nama_area) }}">

            <label>Nomor Lantai</label>
            <input type="number" name="nomor_lantai" value="{{ old('nomor_lantai', $row->nomor_lantai) }}">

            <label>Tipe</label>
            <select name="tipe">
                @foreach (['Meja', 'Bilik'] as $t)
                    <option value="{{ $t }}" @selected(old('tipe', $row->tipe) == $t)>{{ $t }}</option>
                @endforeach
            </select>

            <label>Stopkontak</label>
            <select name="stopkontak">
                <option value="1" @selected($row->stopkontak)>Ya</option>
                <option value="0" @selected(!$row->stopkontak)>Tidak</option>
            </select>

            <label>Wifi</label>
            <select name="wifi">
                <option value="1" @selected($row->wifi)>Ya</option>
                <option value="0" @selected(!$row->wifi)>Tidak</option>
            </select>

            <label>Status</label>
            <select name="status">
                @foreach (['Tersedia', 'Terpakai', 'Perawatan'] as $s)
                    <option value="{{ $s }}" @selected(old('status', $row->status) == $s)>{{ $s }}</option>
                @endforeach
            </select>

            <br><br>
            <button type="submit" class="btn btn-simpan">Simpan</button>
            <a href="{{ route('fasilitas.index') }}" class="btn btn-batal">Batal</a>
        </form>
    </main>
</body>
</html>