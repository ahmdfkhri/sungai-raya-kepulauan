<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data->id ? 'Edit Berita dan Informasi' : 'Tambah Berita dan Informasi' }}</title>
    <script>
        function addContent() {
            const contentList = document.getElementById('content-list');
            const newIndex = contentList.children.length;

            const newContentDiv = document.createElement('div');
            newContentDiv.innerHTML = `
                <label for="content_values_${newIndex}">Values</label>
                <input type="text" id="content_values_${newIndex}" name="content_values[${newIndex}]" required>

                <label for="content_type_${newIndex}">Type</label>
                <select id="content_type_${newIndex}" name="content_type[${newIndex}]" required>
                    <option value="teks">Teks</option>
                    <option value="foto">Foto</option>
                </select>

                <label for="content_order_${newIndex}">Order</label>
                <input type="number" id="content_order_${newIndex}" name="content_order[${newIndex}]" required>
                
                <button type="button" onclick="removeContent(this)">Hapus</button>
            `;
            contentList.appendChild(newContentDiv);
        }

        function removeContent(button) {
            const contentDiv = button.parentElement;
            contentDiv.remove();
        }
    </script>
</head>
<body>
    <h1>{{ $data->id ? 'Edit Berita dan Informasi' : 'Tambah Berita dan Informasi' }}</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('berinf.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
        
        <div>
            <label for="thumbnail">Thumbnail</label>
            <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
        </div>
        <div>
            <label for="title">Judul</label>
            <input type="text" id="title" name="title" value="{{ old('title', $data->title) }}" required>
        </div>
        <div>
            <label for="category">Kategori</label>
            <input type="text" id="category" name="category" value="{{ old('category', $data->category) }}" required>
        </div>
        <div>
            <label for="views">Views</label>
            <input type="number" id="views" name="views" value="{{ old('views', $data->views ?? 0) }}" required>
        </div>
        <div>
            <label for="highlight">Highlight</label>
            <select id="highlight" name="highlight" required>
                <option value="0" {{ ($data->highlight ?? 0) == 0 ? 'selected' : '' }}>Tidak</option>
                <option value="1" {{ ($data->highlight ?? 0) == 1 ? 'selected' : '' }}>Ya</option>
            </select>
        </div>

        <h2>Content</h2>
        <div id="content-list">
            @foreach($data->contents as $content)
                <div>
                    <label for="content_values_{{ $content->id }}">Values</label>
                    <input type="text" id="content_values_{{ $content->id }}" name="content_values[{{ $content->id }}]" value="{{ $content->values }}" required>

                    <label for="content_type_{{ $content->id }}">Type</label>
                    <select id="content_type_{{ $content->id }}" name="content_type[{{ $content->id }}]" required>
                        <option value="teks" {{ $content->type == 'teks' ? 'selected' : '' }}>Teks</option>
                        <option value="foto" {{ $content->type == 'foto' ? 'selected' : '' }}>Foto</option>
                    </select>

                    <label for="content_order_{{ $content->id }}">Order</label>
                    <input type="number" id="content_order_{{ $content->id }}" name="content_order[{{ $content->id }}]" value="{{ $content->order }}" required>
                    
                    <button type="button" onclick="removeContent(this)">Hapus</button>
                </div>
            @endforeach
        </div>

        <button type="button" onclick="addContent()">Tambah Content</button>
        <button type="submit">{{ $data->id ? 'Perbarui' : 'Simpan' }}</button>
    </form>
</body>
</html>
