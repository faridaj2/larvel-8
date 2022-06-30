<!--This template is based on: https://dribbble.com/shots/6531694-Marketing-Dashboard by Gregoire Vella -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Replace with your tailwind.css once created-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/trix.css') }}">



    <style>

    </style>

</head>

<body class="flex bg-black h-screen  font-sans">

    <!-- Side bar-->
    <div id="sidebar" class="h-full w-16 menu bg-white text-white px-4 flex items-center nunito fixed shadow">

        <ul class="list-reset ">
            <li class="my-2 md:my-0">
                <a href="/admin"
                    class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                    <i class="fa-solid fa-images mr-3"></i><span
                        class="w-full inline-block pb-1 md:pb-0 text-sm">SlideShow</span>
                </a>
            </li>
            <li class="my-2 md:my-0">
                <a href="/admin/kategori"
                    class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                    <i class="fa-solid fa-list mr-3"></i><span
                        class="w-full inline-block pb-1 md:pb-0 text-sm">kategori</span>
                </a>
            </li>
            <li class="my-2 md:my-0">
                <a href="/admin/produk"
                    class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                    <i class="fa-solid fa-bag-shopping mr-3"></i><span
                        class="w-full inline-block pb-1 md:pb-0 text-sm">Produk</span>
                </a>
            </li>
            <li class="my-2 md:my-0">
                <a href="/admin/galeri"
                    class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                    <i class="fa-solid fa-images mr-3"></i><span
                        class="w-full inline-block pb-1 md:pb-0 text-sm">galeri</span>
                </a>
            </li>
            <li class="my-2 md:my-0">
                <a href="/logout"
                    class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                    <i class="fa-solid fa-user mr-3"></i><span class="w-full inline-block pb-1 md:pb-0 text-sm">Log
                        out</span>
                </a>
            </li>


        </ul>

    </div>




    <!-- Content -->
    <div class="pl-16 shadow rounded-xl">
        <div class="block bg-white shadow-lg rounded-lg m-2">
            @yield('container')
        </div>
    </div>


    <!-- / Content -->


    <script>
        function fileUp(me) {
            document.querySelector('#slideText').innerHTML = '';
            for (let i = 0; i < me.files.length; i++) {
                const element = me.files[i].name;
                document.querySelector('#slideText').innerHTML += '<li>' + element + '</li>';

            }
        }
    </script>
    <script src="{{ asset('dist/trix.js') }}"></script>


</body>

</html>
