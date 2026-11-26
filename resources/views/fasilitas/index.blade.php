<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fasilitas dan Area</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Perpustakaan Digital</h1>
        <p>Fasilitas dan Area</p>

        {{-- BARU: info user + tombol logout --}}
        <form class="inline" method="POST" action="/logout">
            @csrf
            <span>{{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
            <button type="submit" class="btn btn-hapus">Logout</button>
        </form>
    </header>

    <main>
        @if (session('ok'))
            <div class="alert alert-ok">{{ session('ok') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-err">
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2>Daftar Area Baca</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Area</th>
                    <th>Lantai</th>
                    <th>Tipe</th>
                    <th>Stopkontak</th>
                    <th>Wifi</th>
                    <th>Status</th>
                    {{-- UBAH: kolom Aksi hanya untuk admin & pustakawan --}}
                    @if (auth()->user()->hasRole('admin', 'pustakawan'))
                        <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($rows as $r)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $r->kode_area }}</td>
                    <td>{{ $r->nama_area }}</td>
                    <td>{{ $r->nomor_lantai }}</td>
                    <td>{{ $r->tipe }}</td>
                    <td>{{ $r->stopkontak ? 'Ya' : 'Tidak' }}</td>
                    <td>{{ $r->wifi ? 'Ya' : 'Tidak' }}</td>
                    <td>
                        <span class="badge badge-{{ strtolower($r->status) }}">{{ $r->status }}</span>
                    </td>

                    @if (auth()->user()->hasRole('admin', 'pustakawan'))
                    <td>
                        {{-- Edit: admin & pustakawan --}}
                        <a href="{{ route('fasilitas.edit', $r) }}" class="btn btn-edit">Edit</a>

                        {{-- Hapus: admin saja --}}
                        @if (auth()->user()->hasRole('admin'))
                            <form class="inline" method="POST" action="{{ route('fasilitas.destroy', $r) }}"
                                  onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-hapus">Hapus</button>
                            </form>
                        @endif
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="{{ auth()->user()->hasRole('admin', 'pustakawan') ? 9 : 8 }}">Belum ada data.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- UBAH: form Tambah hanya untuk admin & pustakawan --}}
        @if (auth()->user()->hasRole('admin', 'pustakawan'))
        <h2>Tambah Area Baru</h2>
        <form method="POST" action="{{ route('fasilitas.store') }}">
            @csrf

            <label>Kode Area</label>
            <input type="text" name="kode_area" placeholder="contoh: A-001" value="{{ old('kode_area') }}">

            <label>Nama Area</label>
            <input type="text" name="nama_area" placeholder="contoh: Bilik 1" value="{{ old('nama_area') }}">

            <label>Nomor Lantai</label>
            <input type="number" name="nomor_lantai" placeholder="contoh: 2" value="{{ old('nomor_lantai') }}">

            <label>Tipe</label>
            <select name="tipe">
                <option value="Meja">Meja</option>
                <option value="Bilik">Bilik</option>
            </select>

            <label>Stopkontak</label>
            <select name="stopkontak">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
            </select>

            <label>Wifi</label>
            <select name="wifi">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
            </select>

            <label>Status</label>
            <select name="status">
                <option value="Tersedia">Tersedia</option>
                <option value="Terpakai">Terpakai</option>
            </select>

            <br><br>
            <button type="submit" class="btn btn-simpan">Simpan</button>
        </form>
        @endif
    </main>
</body>
</html>