<x-admin-base>
  <h1 class="text-3xl font-bold">
    Tambah Pegawai
  </h1>
  <div class="w-full md:w-1/2 md:m-4">
    <form action="{{ route('pegawai.add') }}" method="post" class="flex flex-col gap-2" enctype="multipart/form-data">
      @csrf
      <label for="name" class="text-sm text-gray-500">Nama Pegawai</label>
      <input type="text" name="name" class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white border-x-0 border-t-0 border-2 p-1"/>
      <label for="image" class="text-sm text-gray-500">Tambah Foto</label>
      <input type="file" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar">
      <button class="p-2 bg-blue-700 text-white text-sm rounded-md " type="submit">Tambahkan</button>
    </form>
  </div>
  <hr class="h-1 my-8 bg-gray-200 border-0 dark:bg-gray-700 w-full">
  <h1 class="text-3xl font-bold mb-4">
    Daftar Pegawai
  </h1>

  <div class="grid gap-4 grid-cols-[repeat(auto-fit,minmax(240px,1fr))] justify-items-center">
    @foreach ($employees as $e)
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <a href="{{ $e->image }}">
        <img class="rounded-t-lg" src="{{ $e->image }}" alt="" />
      </a>
      <div class="p-5">
        <form action="{{ route('pegawai.update', $e->id) }}" method="post" class="flex flex-col gap-2" enctype="multipart/form-data">
          @csrf
          <label for="name" class="text-sm text-gray-500">Nama Pegawai</label>
          <input type="text" name="name" value="{{ $e->name }}" class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white border-x-0 border-t-0 border-2 p-1"/>
          <label for="image" class="text-sm text-gray-500">Ganti Foto</label>
          <input type="file" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar">
          <button class="p-2 bg-blue-700 text-white text-sm rounded-md " type="submit">Perbarui</button>
          <div>
            Terakhir di  perbarui:
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
              {{ \Carbon\Carbon::parse($e->updated_at)->locale('id')->translatedFormat('d F Y, h:m:s') }}
            </p>
          </div>
          <div>
            Dibuat pada:
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
              {{ \Carbon\Carbon::parse($e->created_at)->locale('id')->translatedFormat('d F Y, h:m:s') }}
            </p>
          </div>
        </form>
        <form action="{{ route('pegawai.delete', $e->id) }}" method="post">
          @csrf
          <button class="p-2 bg-red-700 text-white text-sm rounded-md" type="submit">Hapus</button>
        </form>
      </div>
    </div>
    @endforeach
  </div>
  <div class="m-6">
    {{ $employees->links('pagination::tailwind') }}
  </div>
</x-admin-base>
