@extends('dashboard.admin')

@section('container')
    <section id="produk" class="p-2 nunito bg-white px-3">
        <div class="text-lg font-extrabold my-3">Produk</div>
        <div class="mt-3 grid gap-5 p-5 md:p-0 grid-cols-1 md:grid-cols-4 lg:grid-cols-4 mn:grid-cols-1">

            @foreach ($produk as $item)
                <div class="h-96 w-full rounded-3xl shadow-lg overflow-hidden grid grid-cols-1">
                    <div class="h-48 overflow-hidden">
                        <img class="object-cover h-full w-full"
                            src="{{ asset('public/productImage/' . json_decode($item->url_foto)[0]) }}" alt="">
                    </div>
                    <div class="bg-white p-3 h-48 relative">
                        <div class="font-bold mb-2  trct">{{ $item->product_name }}</div>
                        <div class="font-normal text-[12px] trct desc">{!! $item->deskripsi !!}</div>
                        <div class="absolute left-[50%] translate-x-[-50%] bottom-5 text-center">
                            <a class="rounded font-bold text-white bg-blue-400 w-10/12 p-2 drop-shadow-xl">Edit</a>
                            <a href="/admin/produk/delete/{{ $item->id }}"
                                class="rounded font-bold text-white bg-red-500 w-10/12 p-2 drop-shadow-xl">Hapus</a>
                        </div>

                    </div>
                </div>
            @endForeach

        </div>

        <form action="/admin/produk" method="POST" class="mt-1" enctype="multipart/form-data">
            @csrf
            <input
                class="custom-file-input inline-block w-full mt-1 md:w-1/5 border-2 border-stone-400 border-solid p-1 rounded-lg"
                type="file" placeholder="Upload Gallery" multiple="true" name="image[]">
            <input class="inline-block mt-1 w-full md:w-1/5 border-2 border-stone-400 border-solid p-2 rounded-lg"
                type="text" placeholder="Nama Produk" name="name">
            <input class="inline-block mt-1 w-full md:w-1/5 border-2 border-stone-400 border-solid p-2 rounded-lg"
                type="number" placeholder="Harga" name="price">
            <select name="category" id=""
                class="inline-block mt-1 w-full md:w-1/5 border-2 border-stone-400 border-solid p-2 rounded-lg">
                @foreach ($kategori as $item)
                    <option value="{{ $item->id }}">{{ $item->categories }}</option>
                @endforeach
            </select>
            <textarea id="deskripsi" name="description" cols="30" rows="10"
                class="inline-block mt-1 w-full border-stone-400 border-2 text-clip border-solid p-2 rounded-lg hidden"
                placeholder="Deskripsi"></textarea>
            <trix-editor input="deskripsi" placeholder="Deskripsi"></trix-editor>
            <textarea name="features" id="fitur" cols="30" rows="10"
                class="inline-block mt-1 w-full border-stone-400 border-2 text-clip border-solid p-2 rounded-lg hidden"
                placeholder="Fitur Produk"></textarea>
            <trix-editor input="fitur" placeholder="Fitur"></trix-editor>
            <textarea name="spec" id="spek" cols="30" rows="10"
                class="inline-block mt-1 w-full border-stone-400 border-2 text-clip border-solid p-2 rounded-lg hidden"
                placeholder="Spesifikasi"></textarea>
            <trix-editor input="spek" placeholder="Spesifikasi"></trix-editor>
            <textarea name="term" id="syarat" cols="30" rows="10"
                class="inline-block mt-1 w-full border-stone-400 border-2 text-clip border-solid p-2 rounded-lg hidden"
                placeholder="Syarat & Ketentuan"></textarea>
            <trix-editor input="syarat" placeholder="Syarat & Ketentuan"></trix-editor>
            <input class="inline-block mt-1 w-full md:w-2/4 cursor-pointer p-2 bg-blue-700 rounded-md font-bold text-white"
                type="submit" value="Tambah">
        </form>
    </section>
@endSection
