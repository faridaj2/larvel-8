<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harapan Teknik | {{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,700;0,800;1,500&display=swap"
        rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
</head>

<body>
    <!-- Navigasi -->
    <nav class="shadow-xl bg-white">
        <div
            class="container w-11/12 md:w-10/12 px-2 flex justify-between items-center text-color1 font-bold mx-auto py-3 my-2 mt-0">
            <span><a href="/"><img style="height: 50px" src="{{ asset('logo.png') }}" alt=""></a></span>
            <div class="hidden md:flex gap-3 font-normal items-center">
                <a href="/" class="@if ($title == 'Home') nav-active @endIf">Beranda</a>
                <a href="/produk" class="@if ($title == 'Produk') nav-active @endIf">Produk</a>
                <a href="/galeri" class="@if ($title == 'Galeri') nav-active @endIf">Galeri</a>
                <a href="/about" class="@if ($title == 'Tentang') nav-active @endIf">Tentang</a>
            </div>
            <button onclick="navBuka()" class="w-7  py-3 my-2 flex flex-col gap-1 md:hidden">
                <div class="bg-color1 h-[3px] w-full origin-right duration-75 "></div>
                <div class="bg-color1 h-[3px] w-full origin-right duration-75 "></div>
            </button>
        </div>
    </nav>

    <div id="navTutup"
        class="fixed z-[1000] w-full h-full top-0 bg-stone-400/50 backdrop-blur-sm duration-75 -left-full">
        <div class="w-1/2 h-full bg-white shadow-s1">
            <div class="text-[10px] text-center text-color1 p-3 shadow-sm"><b>HARAPAN TEKNIK</b></div>
            <div class="text-sm text-stone-700 pt-4 ">
                <b class="pl-4 text-[12px]">Menu</b>
                <ul class="font-normal text-stone-600 text-[10px] w-full">
                    <li class="m-2 py-1 mr-0 @if ($title == 'Home') menu-active @endIf"><a class="pl-4"
                            href="/">Beranda</a></li>
                    <li class="m-2 py-1 mr-0 @if ($title == 'Produk') menu-active @endIf"><a class="pl-4"
                            href="/produk">Produk</a></li>
                    <li class="m-2 py-1 mr-0 @if ($title == 'Galeri') menu-active @endIf"><a class="pl-4"
                            href="/galeri">Galeri</a></li>
                    <li class="m-2 py-1 mr-0 @if ($title == 'Tentang') menu-active @endIf"><a class="pl-4"
                            href="/about">Tentang</a></li>
                </ul>

            </div>
            <hr>
            <div class="text-sm text-stone-700 pt-4 ">
                <b class="pl-4 text-[12px]">Kategori</b>
                <ul class="font-normal text-stone-600 text-[10px] w-full">
                    @foreach ($kategori as $kate)
                        <li class="m-2 py-1 mr-0"><a class="pl-4" href="/kategori/{{ $kate->slug }}">{{ $kate->categories }}</a></li>
                    @endforeach

                </ul>

            </div>
        </div>
    </div>
    <!-- End Navigation -->

    <div class="">

        <div class=" text-stone-600">
            <!-- Start Slideshow -->

            <div class="overflow-hidden rounded w-full relative">
                <figure id="slider" class="flex duration-75 left-0">
                    @foreach ($slide as $item)
                        <img class="w-full hidden" src="{{ asset('public/slide/' . $item->nama) }}" alt="">
                    @endforeach
                </figure>
                <div
                    class="font-extrabold md:text-[50px] flex absolute top-[50%] translate-y-[-50%] w-full justify-between text-white px-4">
                    <button class="opacity-50 hover:opacity-100" onclick="left()">&#9664</button>
                    <button class="opacity-50 hover:opacity-100" onclick="right()">&#9654</button>
                </div>
            </div>

            <!-- EndSlide -->

            <!-- Content -->
            <section>
                <div class="container w-11/12 md:w-10/12 lg:1/2 my-3 mx-auto text-stone-600">
                    @yield('container')
                </div>
            </section>
            <!-- End Content -->





        </div>
        <!-- Footer -->
        <footer class=" px-2 text-center py-2 shadow-2xl md:flex justify-center gap-2 bg-stone-900 text-stone-300">
            <div class="mb-10 md:mb-0 md:w-1/3 md:text-left">
                <div class="font-bold mb-2 text-sm">Tentang Kami</div>
                <div class="text-[10px] font-medium"><b>Harapan Teknik</b> merupakan perusahan dalam bidang produksi dan distribusi perlengkapan cuci mobil & motor, berdiri sejak tahun 2009 sampai sekarang. <br> Kami memiliki kualifikasi tingkat tinggi dan memiliki tim solid yang dapat diandalkan.</div>
            </div>
            <div class="md:text-left">
                <div class="font-bold mb-2 text-sm">Kontak Kami</div>
                <div class="text-[10px] font-medium">
                    <div>
                        <a href="https://www.facebook.com/profile.php?id=100076186383359" class="inline-block  mr-1"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="white" viewBox="0 0 24 24">
                                <path
                                    d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
                            </svg>
                        </a>
                        <a href="https://instagram.com/carwashteknik_id" class="inline-block  mr-1"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="white" viewBox="0 0 24 24">
                                <path
                                    d="M15.233 5.488c-.843-.038-1.097-.046-3.233-.046s-2.389.008-3.232.046c-2.17.099-3.181 1.127-3.279 3.279-.039.844-.048 1.097-.048 3.233s.009 2.389.047 3.233c.099 2.148 1.106 3.18 3.279 3.279.843.038 1.097.047 3.233.047 2.137 0 2.39-.008 3.233-.046 2.17-.099 3.18-1.129 3.279-3.279.038-.844.046-1.097.046-3.233s-.008-2.389-.046-3.232c-.099-2.153-1.111-3.182-3.279-3.281zm-3.233 10.62c-2.269 0-4.108-1.839-4.108-4.108 0-2.269 1.84-4.108 4.108-4.108s4.108 1.839 4.108 4.108c0 2.269-1.839 4.108-4.108 4.108zm4.271-7.418c-.53 0-.96-.43-.96-.96s.43-.96.96-.96.96.43.96.96-.43.96-.96.96zm-1.604 3.31c0 1.473-1.194 2.667-2.667 2.667s-2.667-1.194-2.667-2.667c0-1.473 1.194-2.667 2.667-2.667s2.667 1.194 2.667 2.667zm4.333-12h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm.952 15.298c-.132 2.909-1.751 4.521-4.653 4.654-.854.039-1.126.048-3.299.048s-2.444-.009-3.298-.048c-2.908-.133-4.52-1.748-4.654-4.654-.039-.853-.048-1.125-.048-3.298 0-2.172.009-2.445.048-3.298.134-2.908 1.748-4.521 4.654-4.653.854-.04 1.125-.049 3.298-.049s2.445.009 3.299.048c2.908.133 4.523 1.751 4.653 4.653.039.854.048 1.127.048 3.299 0 2.173-.009 2.445-.048 3.298z" />
                            </svg>
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=6281383565644" class="inline-block  mr-1"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="white" viewBox="0 0 24 24">
                                <path
                                    d="M12.036 5.339c-3.635 0-6.591 2.956-6.593 6.589-.001 1.483.434 2.594 1.164 3.756l-.666 2.432 2.494-.654c1.117.663 2.184 1.061 3.595 1.061 3.632 0 6.591-2.956 6.592-6.59.003-3.641-2.942-6.593-6.586-6.594zm3.876 9.423c-.165.463-.957.885-1.337.942-.341.051-.773.072-1.248-.078-.288-.091-.657-.213-1.129-.417-1.987-.858-3.285-2.859-3.384-2.991-.099-.132-.809-1.074-.809-2.049 0-.975.512-1.454.693-1.653.182-.2.396-.25.528-.25l.38.007c.122.006.285-.046.446.34.165.397.561 1.372.611 1.471.049.099.083.215.016.347-.066.132-.099.215-.198.33l-.297.347c-.099.099-.202.206-.087.404.116.198.513.847 1.102 1.372.757.675 1.395.884 1.593.983.198.099.314.083.429-.05.116-.132.495-.578.627-.777s.264-.165.446-.099 1.156.545 1.354.645c.198.099.33.149.38.231.049.085.049.482-.116.945zm3.088-14.762h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-6.967 19.862c-1.327 0-2.634-.333-3.792-.965l-4.203 1.103 1.125-4.108c-.694-1.202-1.059-2.566-1.058-3.964.002-4.372 3.558-7.928 7.928-7.928 2.121.001 4.112.827 5.609 2.325s2.321 3.491 2.32 5.609c-.002 4.372-3.559 7.928-7.929 7.928z" />
                            </svg>
                        </a><br>
                        <a href="mailto:Carwashteknik@gmail.com">Carwashteknik@gmail.com</a>
                    </div>
                </div>
            </div>
            <div class="md:text-left">
                <div class="font-bold mb-2 text-sm">Alamat</div>
                <div class="text-[10px] font-medium">
                    <b>HARAPAN TEKNIK</b>
                    <p><b>Jl. Harapan Dalam no. 11 Tugu Selatan</b>
                        <br>Koja , Jakarta Utara <br>
                        Kode Pos : 14260
                    </p>
                </div>
            </div>

        </footer>
        <!-- End Footer -->
        <script src="{{ asset('js/script.js') }}"></script>
        <script>
            let indexOf = 0;
            let slider = document.querySelector('#slider');
            slider.children[0].classList.remove('hidden');

            function right() {
                indexOf += 1;
                for (let i = 0; i < slider.children.length; i++) {
                    slider.children[i].classList.add('hidden');
                }
                if (indexOf >= slider.children.length) {
                    indexOf = 0;
                }
                slider.children[indexOf].classList.remove('hidden');
            }

            function left() {
                indexOf -= 1;
                for (let i = 0; i < slider.children.length; i++) {
                    slider.children[i].classList.add('hidden');
                }
                if (indexOf == -1) {
                    indexOf = slider.children.length - 1;
                }
                slider.children[indexOf].classList.remove('hidden');
            }

            setInterval(right, 5000);
        </script>
</body>

</html>
