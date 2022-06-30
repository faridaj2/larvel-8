@extends('layout/template')

@section('container')
    <div class="w-full">
       <b class="text-left w-full font-bold mt-10">Harapan Teknik</b> <br>
       <p> merupakan perusahan dalam bidang produksi dan distribusi perlengkapan cuci mobil & motor, berdiri sejak tahun 2009 sampai sekarang. Kami memiliki kualifikasi tingkat tinggi dan memiliki tim solid yang dapat diandalkan.</p>
       <br>
       <b class="text-left w-full font-bold mt-10">Alamat</b> <br>
       <p>Jl.harapan dalam no.11 , tugu selatan , koja , jakarta utara kodepos 14260</p>
       <br>
       <b class="text-left w-full font-bold mt-10">Hubungi Kami di :</b> <br>
       <p>
        Facebook : <a href="https://www.facebook.com/profile.php?id=100076186383359">facebook.com/profile.php?id=100076186383359</a>  <br>
        Instagram : <a href="https://instagram.com/carwashteknik_id">instagram.com/carwashteknik_id</a>  <br>
        WhatsApp : <a href="https://api.whatsapp.com/send?phone=6281383565644">0813 8356 5644</a>
       </p>
       
    </div>

    <div class="text-left w-full font-bold mt-10">Gallery</div>
    <!-- Start Slideshow -->
    <div class="rounded w-full  grid grid-cols-1 md:grid-cols-3 gap-5 mt-5">
        @foreach ($galeri as $item)
            <div class="rounded overflow-hidden relative shadow-lg">
                <img class="w-full h-52 object-cover" src="{{ asset('/public/galeri/' . $item->image) }}" alt="">
                <div
                    class="bg-gradient-to-r from-yellow-500/40 to-transparent w-1/2 px-2 font-bold text-white absolute top-3 left-3 rounded">
                    {{ $item->caption }}</div>
            </div>
        @endforeach
    </div>
@endSection
