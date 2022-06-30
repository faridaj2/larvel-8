@extends('layout.template')

@section('container')
    @php
    $img = json_decode($post->url_foto);
    @endphp
    <div>
        <div class="font-bold text-stone-700 py-2 pt-7">{{ $post->product_name }}</div>
        <div class="bg-black rounded-t-md overflow-hidden shadow border-8 border-white">
            <img id="image" class="w-full h-96 object-contain"
                src="{{ asset('/public/productImage/' . json_decode($post->url_foto)[0]) }}" alt="" />
        </div>
        <div class="flex justify-center shadow border-8 border-white rounded-b-md">
            <div class="mt-3 px-7 relative flex h-[100px] overflow-x-scroll">

                @foreach ($img as $img)
                    <img class="opacity-70 hover:opacity-100" onclick="ganti(this)"
                        src="{{ asset('/public/productImage/' . $img) }}" alt="" />
                @endforeach
            </div>
        </div>
        <div class="flex justify-between py-5">
            <div class="text-white font-bold bg-blue-500 p-2 rounded-xl shadow px-4 hover:bg-blue-700">
                Rp. {{ $post->harga }}
            </div>

            @php
                $url = url()->current();
                $brg = $post->product_name;
                $msg = "Halo%2C%20saya%20ingin%20membeli%20barang%20*".$brg."*.%0AApakah%20Barang%20Tersedia%3F%0A" . $url;
            @endphp
            <a href="https://wa.me/6281237469396?text={{ $msg }}" class="text-white font-bold bg-blue-500 p-2 rounded-xl shadow px-4 hover:bg-blue-700">
                Pesan Sekarang
            </a>
        </div>
    </div>
    <div class="">
        <div class="font-bold text-stone-700 py-2 pt-7">Detail Produk</div>
        <hr />
        <div class="mt-2 grid grid-cols-4 lg:grid-cols-4 gap-1">
            <button onclick="tab(deskripsi)"
                class="tabBtn text-[12px] border rounded-md border-solid p-1 text-stone-400 hover:bg-blue-500 hover:text-white border-stone-400 active">
                Deskripsi
            </button>
            <button onclick="tab(fitur)"
                class="tabBtn text-[12px] border rounded-md border-solid p-1 text-stone-400 hover:bg-blue-500 hover:text-white border-stone-400">
                Fitur Produk
            </button>
            <button onclick="tab(spesifikasi)"
                class="tabBtn text-[12px] border rounded-md border-solid p-1 text-stone-400 hover:bg-blue-500 hover:text-white border-stone-400">
                Spesifikasi
            </button>
            <button onclick="tab(syarat)"
                class="tabBtn text-[12px] border rounded-md border-solid p-1 text-stone-400 hover:bg-blue-500 hover:text-white border-stone-400">
                Syarat & Ketentuan
            </button>
        </div>
        <div class="h-[6px] w-full bg-blue-300 my-3"></div>
        <div class="produk">

            <div id="deskripsi" class="text-sm nunito">
                {!! $post->deskripsi !!}
            </div>
            <div id="fitur" class="text-sm nunito hidden">
                {!! $post['fitur'] !!}

            </div>
            <div id="spesifikasi" class="text-sm nunito hidden">
                {!! $post['spek'] !!}
            </div>
            <div id="syarat" class="text-sm nunito hidden">
                {!! $post['syarat'] !!}
            </div>

        </div>
    </div>
    <div class="pt-10 col-span-2">
        <div class="font-bold text-stone-700 py-2 pt-7">
            {{ $kategori_detail }}


        </div>
        <div class="mt-3 grid gap-5 p-5 md:p-0 grid-cols-1 md:grid-cols-4 lg:grid-cols-4 mn:grid-cols-1">
            @foreach ($kategori_isi->product as $item)
                <div class="h-96 w-full rounded shadow-lg overflow-hidden grid grid-cols-1">
                    <div class="h-48 overflow-hidden">
                        <img class="object-cover h-full w-full" src="{{ asset('/public/productImage/'. json_decode($item->url_foto)[0])  }}" alt="" />
                    </div>
                    <div class="bg-white p-3 h-48 relative">
                        <div class="font-bold mb-2 trct">
                            {{ $item->product_name }}
                        </div>
                        <div class="font-normal text-[12px] trct desc nunito">
                            {!! $item->deskripsi !!}
                        </div>
                        <a href="/detail/{{ $item->slug_name }}"
                            class="absolute left-[50%] translate-x-[-50%] bottom-5 text-center rounded font-bold text-white bg-blue-400 w-11/12 p-2 hover:bg-blue-700 transition duration-500 drop-shadow-xl">
                            Detail
                    </a>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
    <script>
        let slider = document.querySelector('#image')

        function ganti(me) {
            slider.src = me.src
        }
        slider.addEventListener('click', function() {
            slider.classList.toggle('object-cover')
        });

        function tab(me) {
            document.querySelector('#deskripsi').classList.add('hidden');
            document.querySelector('#fitur').classList.add('hidden');
            document.querySelector('#spesifikasi').classList.add('hidden');
            document.querySelector('#syarat').classList.add('hidden');
            me.classList.remove('hidden');
        }

        let tabBtn = document.getElementsByClassName('tabBtn');

        for (let i = 0; i < tabBtn.length; i++) {
            const element = tabBtn[i];
            tabBtn[i].addEventListener("click", function() {
                for (let i = 0; i < tabBtn.length; i++) {
                    tabBtn[i].classList.remove('active');

                }
                tabBtn[i].classList.add('active');
            })

        }
    </script>
@endSection
