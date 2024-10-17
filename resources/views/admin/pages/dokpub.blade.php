<!DOCTYPE html>
<html>
<head>
    <title>Dokumen Publik</title>
</head>
<body>

<h1>Daftar Dokumen Publik</h1>

@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<form action="{{ route('store.dokpub') }}" method="POST">
    @csrf
    <label for="judul">Judul:</label>
    <input type="text" id="judul" name="judul" required>
    
    <label for="tahun">Tahun:</label>
    <input type="number" id="tahun" name="tahun" min="1900" max="2099" step="1" required>
    
    <button type="submit">Tambah Data</button>
</form>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Tahun</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if($dokpubData->isEmpty())
            <tr>
                <td colspan="6">Tidak ada data yang tersedia.</td>
            </tr>
        @else
            @foreach($dokpubData as $dokpub)
            <tr>
                <td>{{ $dokpub->id }}</td>
                <td>
                    <input type="text" name="judul[{{ $dokpub->id }}]" value="{{ $dokpub->judul }}">
                </td>
                <td>
                    <input type="number" name="tahun[{{ $dokpub->id }}]" value="{{ $dokpub->tahun }}" min="1900" max="2099" step="1">
                </td>
                <td>{{ $dokpub->created_at }}</td>
                <td>{{ $dokpub->updated_at }}</td>
                <td>
                    <button onclick="submitForm({{ $dokpub->id }})">Edit</button>
                    <form action="{{ route('delete.dokpub', $dokpub->id) }}" method="POST" style="display:inline;">
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

<script>
    function submitForm(id) {
        const judul = document.querySelector(`input[name="judul[${id}]"]`).value;
        const tahun = document.querySelector(`input[name="tahun[${id}]"]`).value;

        fetch(`/update-dokpub/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ judul: judul, tahun: tahun })
        })
        .then(response => {
            if (response.ok) {
                alert('Data berhasil diperbarui!');
                location.reload();
            } else {
                alert('Gagal memperbarui data!');
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>

</body>
</html>