@extends('dashboard.admin')

@section('container')
<section id="info" class="p-2 nunito bg-white px-3">
    <div class="text-lg font-extrabold my-3">Info Perusahaan</div>
    <div>
        <form action="#">
            
            <input class="inline-block mt-1 md:w-10/12 cursor-pointer p-2 border-blue-700 border-2 border-solid rounded-md font-bold " type="text" placeholder="Nama Perusahaan">
            <input class="inline-block mt-1 cursor-pointer p-2 bg-blue-700 rounded-md font-bold text-white" type="submit" value="Simpan">
        </form>
        <form action="#">
            <textarea name="" id="" cols="30" rows="10" class="inline-block mt-1 w-full border-stone-400 border-2 text-clip border-solid p-2 rounded-lg" placeholder="Tentang Perusahaan"></textarea>
            <textarea name="" id="" cols="30" rows="10" class="inline-block mt-1 w-full border-stone-400 border-2 text-clip border-solid p-2 rounded-lg" placeholder="Kontak Kami"></textarea>
            <input class="inline-block mt-1 cursor-pointer p-2 bg-blue-700 rounded-md font-bold text-white" type="submit" value="Simpan">
        </form>
    </div>
   
</section>
@endSection