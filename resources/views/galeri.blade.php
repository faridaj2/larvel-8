@extends('layout.template')

@section('container')
    <div class="rounded w-full  grid grid-cols-1 md:grid-cols-3 gap-5 mt-5">
        <div class="rounded overflow-hidden relative shadow-lg">
            @foreach ($galeri as $item)
                
           

            <img class="w-full h-52 object-cover" src="{{ asset('/public/galeri/'.$item->image) }}" alt="">
            <div
                class="bg-gradient-to-r from-yellow-500/40 to-transparent w-1/2 px-2 font-bold text-white absolute top-3 left-3 rounded">{{ $item->caption }}</div>
        </div>
        @endforeach
    </div>
@endSection
