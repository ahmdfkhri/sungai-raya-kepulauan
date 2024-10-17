<!DOCTYPE html>
<html>
<head>
    <title>Edit Visi & Misi</title>
</head>
<body>

<h1>Edit Visi & Misi</h1>

@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<!-- Form untuk menambahkan data -->
<h3>Tambah Data</h3>
<form id="addVMForm" onsubmit="event.preventDefault(); addData();">
    @csrf
    <div>
        <label for="tipe">Tipe:</label>
        <select name="tipe" id="tipe" required>
            <option value="visi">Visi</option>
            <option value="misi">Misi</option>
        </select>
    </div>
    <div>
        <label for="desc">Deskripsi:</label>
        <input type="text" name="desc" id="desc" required>
    </div>
    <button type="submit">Tambah</button>
</form>

<!-- Tabel menampilkan semua data -->
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipe</th>
            <th>Deskripsi</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if($vmData->isEmpty())
            <tr>
                <td colspan="6">Tidak ada data yang tersedia.</td>
            </tr>
        @else
            @foreach($vmData as $vm)
            <tr>
                <td>{{ $vm->id }}</td>
                <td>
                    <select name="tipe[{{ $vm->id }}]">
                        <option value="visi" {{ $vm->tipe == 'visi' ? 'selected' : '' }}>Visi</option>
                        <option value="misi" {{ $vm->tipe == 'misi' ? 'selected' : '' }}>Misi</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="desc[{{ $vm->id }}]" value="{{ $vm->desc }}">
                </td>
                <td>{{ $vm->created_at }}</td>
                <td>{{ $vm->updated_at }}</td>
                <td>
                    <!-- Tombol Edit dan Delete -->
                    <button onclick="editData({{ $vm->id }})">Edit</button>
                    <form action="{{ route('delete.vm', $vm->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                    <button onclick="submitForm({{ $vm->id }})">Simpan</button>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>

<script>
    function addData() {
        const tipe = document.getElementById('tipe').value;
        const desc = document.getElementById('desc').value;

        // Kirim data ke server untuk menambahkan entri baru
        fetch('/add-vm', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Token CSRF untuk Laravel
            },
            body: JSON.stringify({tipe: tipe, desc: desc})
        })
        .then(response => {
            if (response.ok) {
                alert('Data berhasil ditambahkan!');
                location.reload(); // Reload halaman untuk menampilkan data terbaru
            } else {
                alert('Gagal menambahkan data!');
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function submitForm(id) {
        // Ambil nilai dari input
        const tipe = document.querySelector(`select[name="tipe[${id}]"]`).value;
        const desc = document.querySelector(`input[name="desc[${id}]"]`).value;

        // Kirim data ke server
        fetch(`/update-vm/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Token CSRF untuk Laravel
            },
            body: JSON.stringify({tipe: tipe, desc: desc})
        })
        .then(response => {
            if (response.ok) {
                alert('Data berhasil diperbarui!');
                location.reload(); // Reload halaman untuk menampilkan data terbaru
            } else {
                alert('Gagal memperbarui data!');
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>

</body>
</html>
