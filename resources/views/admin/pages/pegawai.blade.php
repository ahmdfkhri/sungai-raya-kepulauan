<!DOCTYPE html>
<html>
<head>
    <title>Data Pegawai</title>
</head>
<body>

<h1>Daftar Pegawai</h1>

@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<!-- Form untuk menambahkan data pegawai baru -->
<h2>Tambah Pegawai</h2>
<form action="{{ route('store.pegawai') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="nama_pegawai">Nama Pegawai:</label>
    <input type="text" name="nama_pegawai" required>

    <label for="jabatan">Jabatan:</label>
    <input type="text" name="jabatan" required>

    <label for="foto">Foto:</label>
    <input type="file" name="foto" accept="image/*">

    <label for="level">Level:</label>
    <select name="level" required>
        <option value="staff">Staff</option>
        <option value="sekretaris">Sekretaris</option>
        <option value="camat">Camat</option>
    </select>

    <button type="submit">Tambah</button>
</form>

<!-- Tabel menampilkan semua data pegawai -->
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Pegawai</th>
            <th>Jabatan</th>
            <th>Foto</th>
            <th>Level</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if($pegawaiData->isEmpty())
            <tr>
                <td colspan="8">Tidak ada data yang tersedia.</td>
            </tr>
        @else
            @foreach($pegawaiData as $pegawai)
            <tr>
                <td>{{ $pegawai->id }}</td>
                <td>
                    <form action="{{ route('update.pegawai', $pegawai->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" name="nama_pegawai" value="{{ $pegawai->nama_pegawai }}" required>
                </td>
                <td>
                    <input type="text" name="jabatan" value="{{ $pegawai->jabatan }}" required>
                </td>
                <td>
                    @if($pegawai->foto)
                        <img src="{{ asset($pegawai->foto) }}" alt="Foto {{ $pegawai->nama_pegawai }}" style="width: 50px; height: auto;">
                    @else
                        Tidak ada foto
                    @endif
                </td>
                <td>
                    <select name="level" required>
                        <option value="staff" {{ $pegawai->level === 'staff' ? 'selected' : '' }}>Staff</option>
                        <option value="sekretaris" {{ $pegawai->level === 'sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                        <option value="camat" {{ $pegawai->level === 'camat' ? 'selected' : '' }}>Camat</option>
                    </select>
                </td>
                <td>{{ $pegawai->created_at }}</td>
                <td>{{ $pegawai->updated_at }}</td>
                <td>
                    <button type="submit">Edit</button>
                    </form>
                    <form action="{{ route('delete.pegawai', $pegawai->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>

</body>
</html>
