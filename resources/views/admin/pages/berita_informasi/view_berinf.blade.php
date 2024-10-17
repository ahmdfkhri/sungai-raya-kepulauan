<!DOCTYPE html>
<html>
<head>
    <title>Berita dan Informasi</title>
</head>
<body>

<h1>Daftar Berita dan Informasi</h1>

@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<!-- Tombol untuk menambah data berita dan informasi -->
<h2>
    <a href="{{ route('berinf.create') }}">Tambah Data</a>
</h2>

<!-- Form untuk menambah data berita dan informasi -->
<h2>Tambah Berita dan Informasi</h2>
<form action="{{ route('berinf.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="thumbnail">Thumbnail:</label>
    <input type="file" name="thumbnail" accept="image/*" required>

    <label for="title">Judul:</label>
    <input type="text" name="title" required>

    <label for="category">Kategori:</label>
    <input type="text" name="category" required>

    <label for="views">Views:</label>
    <input type="number" name="views" value="0" required>

    <label for="highlight">Highlight:</label>
    <select name="highlight" required>
        <option value="0">Tidak</option>
        <option value="1">Ya</option>
    </select>

    <button type="submit">Tambah</button>
</form>

<!-- Tabel menampilkan semua data berita dan informasi -->
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Thumbnail</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Views</th>
            <th>Highlight</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if($berinfData->isEmpty())
            <tr>
                <td colspan="9">Tidak ada data yang tersedia.</td>
            </tr>
        @else
            @foreach($berinfData as $berinf)
            <tr>
                <td>{{ $berinf->id }}</td>
                <td>
                    @if($berinf->thumbnail)
                        <img src="{{ asset($berinf->thumbnail) }}" alt="Thumbnail {{ $berinf->title }}" style="width: 50px; height: auto;">
                    @else
                        Tidak ada thumbnail
                    @endif
                </td>
                <td>{{ $berinf->title }}</td>
                <td>{{ $berinf->category }}</td>
                <td>{{ $berinf->views }}</td>
                <td>{{ $berinf->highlight ? 'Ya' : 'Tidak' }}</td>
                <td>{{ $berinf->created_at }}</td>
                <td>{{ $berinf->updated_at }}</td>
                <td>
                    <a href="{{ route('berinf.create', $berinf->id) }}">
                        <button type="button">Edit</button>
                    </a>
                    <form action="{{ route('delete.berinf', $berinf->id) }}" method="POST" style="display:inline;">
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
