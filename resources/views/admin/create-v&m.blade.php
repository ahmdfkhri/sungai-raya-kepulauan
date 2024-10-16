@section('content')
<div class="container">
    <h1>Buat Data Visi & Misi</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tipe">Tipe</label>
            <select name="tipe" id="tipe" class="form-control">
                <option value="visi">Visi</option>
                <option value="misi">Misi</option>
            </select>
        </div>

        <div class="form-group">
            <label for="desc">Deskripsi</label>
            <textarea name="desc" id="desc" class="form-control" rows="5">{{ old('desc') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
