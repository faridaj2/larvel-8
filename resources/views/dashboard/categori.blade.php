@extends('dashboard.admin')

@section('container')
<section id="kategori" class="p-2 nunito bg-white px-3">
    <div class="text-lg font-extrabold my-3">Kategori</div>
    @foreach ($kategori as $item)
        
    
    <div class="flex justify-between bg-white shadow-md p-2 rounded-md my-2">
        <p>{{ $item->categories }}</p>
        <a href="/admin/kategori/delete/{{ $item->id }}"><i class="fa-solid fa-trash text-blue-500 hover:text-blue-700"></i></a>
    </div>
    @endforeach

    <form action="/admin/kategori/" method="POST" class="">
        @csrf
        <input class="inline-block w-1/2 border-2 border-stone-400 border-solid p-2 rounded-lg" type="text"
            placeholder="Tambah Kategori" name="kategori">
        <input class="blocl w-1/3 cursor-pointer p-2 bg-blue-700 rounded-md font-bold text-white" type="submit"
            value="Tambah" name="submit">
    </form>
</section>
@endSection