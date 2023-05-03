<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{$title}}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        *{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="h-[100vh] overflow-x-hidden">
    <nav class="flex flex-row bg-[#B2A4FF] py-4 px-6 items-center rounded-b-[20px] justify-between fixed w-[100vw] shadow-lg">
        <a href="/">
            <img class="w-44" src="{{asset('assets/logo.png')}}" alt="logo milky way">
        </a>
        <div class="">
            <a class="hover:underline mx-5 text-[20px]" href="">Beranda</a>
            <a class="hover:underline mx-5 text-[20px]" href="">Profile</a>
            <a class="hover:underline mx-5 text-[20px]" href="">Produk</a>
            <a class="hover:underline mx-5 text-[20px]" href="">Partner Kami</a>
        </div>
        <div>

        </div>
    </nav>
    @if (session()->has('message'))
        <div class="bg-green-500 p-2 w-[100vw] absolute mt-[94px] text-center text-white">
            {{session('message')}}
        </div>
    @endif
    <img class="w-16 absolute right-0 top-40" src="{{asset('assets/image 4.png')}}" alt="">
    <img class="w-28 absolute right-0 bottom-0" src="{{asset('assets/image 1.png')}}" alt="">
    <img class="w-16 absolute left-0 top-40" src="{{asset('assets/image 2.png')}}" alt="">
    <img class="w-16 absolute left-0 bottom-10" src="{{asset('assets/image 3.png')}}" alt="">
    <div class="flex h-[100%]">
        <div class="flex-1 bg-[#BAB6CF] pt-32">
            @yield('content-left')
        </div>
        <div class="flex-1 bg-[#E4E5EA] pt-32">
            @yield('content-right')
        </div>
    </div>
    @yield('modal')
</body>
</html>