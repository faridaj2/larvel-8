@extends('dashboard.admin')

@section('container')
    <section id="slide-show" class="p-2 nunito bg-white px-3">
        <div class="text-lg font-extrabold my-3">Slide Show</div>

        @foreach ($slide as $item)
            <div class="relative mb-2 rounded-md shadow-md overflow-hidden">

                <img class="max-h-[300px] object-contain" src="{{ asset('/public/slide/' . $item->nama) }}" alt="">

                <div class="absolute top-3 right-3">

                    <a href="/admin/delete/{{ $item->id }}" class="text-white bg-yellow-400 rounded hover:bg-yellow-600 p-2 m-2"><i
                            class="fa-solid fa-trash"></i></a>
                </div>
            </div>
        @endforeach
        <div>
            <ul id="slideText" class="list-decimal pl-5">

            </ul>
            <form class="overflow-hidden flex gap-2 rounded" action="/admin" method="POST" enctype="multipart/form-data">
                @csrf
                <label id=""
                    class=" p-2 custom-file-input inline-block w-1/2 text-sm rounded-lg border border-stone-300 cursor-pointer "
                    for="file_input">Upload file</label>
                <input class="hidden" id="file_input" onchange="fileUp(this)" type="file"
                    accept="image/png, image/gif, image/jpeg" name="gambar[]" multiple="true">
                <input class="inline-block cursor-pointer p-2 bg-blue-700 rounded-md font-bold text-white" type="submit">


            </form>
        </div>

    </section>
@endSection
