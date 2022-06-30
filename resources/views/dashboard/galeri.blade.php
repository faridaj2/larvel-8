@extends('dashboard.admin')

@section('container')
    <section id="Gallery" class="p-2 nunito bg-white px-3">
        <div class="text-lg font-extrabold my-3">Gallery</div>

        <div class="">
            @if (sizeOf($galeri) == 0)
                Tidak ada galeri
            
                
            @endif
            @foreach ($galeri as $item)
                <div class="bg-white rounded-md shadow-md relative">
                    <img class="max-h-[300px] object-contain" src="{{ asset('/public/galeri/' . $item->image) }}"
                        alt="">
                    <div class=" absolute top-2 left-3 w-full">
                        <span class="text-white bg-black p-2">{{ $item->caption }}</span>
                        <a href="/admin/galeri/delete/{{ $item->id }}"><i
                                class="fa-solid fa-trash text-white hover:text-stone-200 bg-black p-2"></i></a>
                    </div>
                </div>
            @endforeach
        </div>

        <form action="/admin/galeri" method="POST" enctype="multipart/form-data" class="mt-1">
            @csrf
            <input
                class="custom-file-input inline-block w-full mb-1 md:w-1/4 border-2 border-stone-400 border-solid p-1 rounded-lg"
                type="file" placeholder="Upload Gallery" name="image">
            <input class="inline-block w-full md:w-1/4 border-2 border-stone-400 border-solid p-2 rounded-lg" type="text"
                placeholder="Caption" name="caption" accept="image/png, image/gif, image/jpeg">
            <input class="inline-block w-full md:w-2/4 cursor-pointer p-2 bg-blue-700 rounded-md font-bold text-white mt-1"
                type="submit" value="Tambah">
        </form>
    </section>
@endSection
